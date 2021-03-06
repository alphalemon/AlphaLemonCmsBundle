<?php
/**
 * This file is part of the AlphaLemon CMS Application and it is distributed
 * under the GPL LICENSE Version 2.0. To use this application you must leave
 * intact this copyright notice.
 *
 * Copyright (c) AlphaLemon <webmaster@alphalemon.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * For extra documentation and help please visit http://www.alphalemon.com
 *
 * @license    GPL LICENSE Version 2.0
 *
 */

namespace AlphaLemon\AlphaLemonCmsBundle\Core\Listener\Page;

use AlphaLemon\AlphaLemonCmsBundle\Core\Event\Content\Page\BeforeAddPageCommitEvent;
use AlphaLemon\AlphaLemonCmsBundle\Core\Content\Seo\AlSeoManager;
use AlphaLemon\AlphaLemonCmsBundle\Core\Repository\Factory\AlFactoryRepositoryInterface;
use AlphaLemon\AlphaLemonCmsBundle\Core\Exception\General\InvalidArgumentException;

/**
 * Listen to the onBeforeAddPageCommit event to add the page's seo attributes, when
 * a new page is added
 *
 * @author AlphaLemon <webmaster@alphalemon.com>
 *
 * @api
 */
class AddSeoListener
{
    private $seoManager;
    private $languageRepository;

    /**
     * Constructor
     *
     * @param \AlphaLemon\AlphaLemonCmsBundle\Core\Content\Seo\AlSeoManager                        $seoManager
     * @param \AlphaLemon\AlphaLemonCmsBundle\Core\Repository\Factory\AlFactoryRepositoryInterface $factoryRepository
     *
     * @api
     */
    public function __construct(AlSeoManager $seoManager, AlFactoryRepositoryInterface $factoryRepository)
    {
        $this->seoManager = $seoManager;
        $this->languageRepository = $factoryRepository->createRepository('Language');
    }

    /**
     * Adds the page's seo attributes when a new page is added, for each language of
     * the site
     *
     * @param  \AlphaLemon\AlphaLemonCmsBundle\Core\Event\Content\Page\BeforeAddPageCommitEvent $event
     * @return boolean
     * @throws \InvalidArgumentException
     * @throws \AlphaLemon\AlphaLemonCmsBundle\Core\Listener\Page\Exception
     *
     * @api
     */
    public function onBeforeAddPageCommit(BeforeAddPageCommitEvent $event)
    {
        if ($event->isAborted()) {
            return;
        }

        $pageManager = $event->getContentManager();
        $pageRepository = $pageManager->getPageRepository();
        $values = $event->getValues();

        if (!is_array($values)) {
            throw new InvalidArgumentException('The parameter "values" must be an array');
        }

        try {
            $languages = $this->languageRepository->activeLanguages();
            if (count($languages)) {
                $result = true;
                $idPage = $pageManager->get()->getId();
                $this->seoManager->getSeoRepository()->setConnection($pageRepository->getConnection());
                $pageRepository->startTransaction();
                foreach ($languages as $alLanguage) {
                    $seoManagerValues = array_merge($values, array('PageId' => $idPage, 'LanguageId' => $alLanguage->getId(), 'CreatedAt'       => date("Y-m-d H:i:s")));
                    if (!$alLanguage->getMainLanguage() && array_key_exists('Permalink', $seoManagerValues)) $seoManagerValues['Permalink'] = $alLanguage->getLanguageName() . '-' . $seoManagerValues['Permalink'];
                    $this->seoManager->set(null);
                    $result = $this->seoManager->save($seoManagerValues);

                    if (false === $result) break;
                }

                if (false !== $result) {
                    $pageRepository->commit();
                
                    return;
                }
                
                $pageRepository->rollBack();
                $event->abort();
            }
        } catch (\Exception $e) {
            $event->abort();

            if (isset($pageRepository) && $pageRepository !== null) {
                $pageRepository->rollBack();
            }

            throw $e;
        }
    }
}
