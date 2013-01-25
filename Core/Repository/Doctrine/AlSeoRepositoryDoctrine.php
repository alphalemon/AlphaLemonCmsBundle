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

namespace AlphaLemon\AlphaLemonCmsBundle\Core\Repository\Doctrine;

use AlphaLemon\AlphaLemonCmsBundle\Entity\AlSeo;
use AlphaLemon\AlphaLemonCmsBundle\Core\Repository\Repository\SeoRepositoryInterface;
use AlphaLemon\AlphaLemonCmsBundle\Core\Exception\Content\General\InvalidParameterTypeException;

/**
 *  Implements the SeoRepositoryInterface to work with Doctrine
 *
 *  @author alphalemon <webmaster@alphalemon.com>
 */
class AlSeoRepositoryDoctrine extends Base\AlDoctrineRepository implements SeoRepositoryInterface
{
    public function __construct(\Doctrine\Bundle\DoctrineBundle\Registry $doctrine)
    {
        parent::__construct($doctrine);
        
        $this->repository = $this->doctrine->getRepository('AlphaLemonCmsBundle:AlSeo');
    }
    /**
     * {@inheritdoc}
     */
    protected function bindFromArray(array $values)
    {
        $this->modelObject->setResourceName($values['ResourceName']);
        $this->modelObject->setUserId($values['UserId']);
    }
    
    /**
     * {@inheritdoc}
     */
    public function getRepositoryObjectClassName()
    {
        return '\AlphaLemon\AlphaLemonCmsBundle\Entity\AlSeo';
    }

    /**
     * {@inheritdoc}
     */
    public function setRepositoryObject($object = null)
    {
        if (null !== $object && !$object instanceof AlSeo) {
            throw new InvalidParameterTypeException('AlSeoRepositoryDoctrine accepts only AlSeo Doctrine objects.');
        }

        return parent::setRepositoryObject($object);
    }

    /**
     * {@inheritdoc}
     */
    public function fromPK($id)
    {
        return $this->repository
            ->findOneBy(array("id" => $id));
        
        //AlSeoQuery::create()->findPk($id);
    }

    /**
     * {@inheritdoc}
     */
    public function fromPageAndLanguage($languageId, $pageId)
    {
        return $this->repository
            ->findOneBy(array("pageId" => $pageId, "languageId" => $languageId, "toDelete" => 0));
        /*
        return AlSeoQuery::create()
                    ->filterByPageId($pageId)
                    ->filterByLanguageId($languageId)
                    ->filterByToDelete(0)
                    ->findOne();*/
    }

    /**
     * {@inheritdoc}
     */
    public function fromPermalink($permalink)
    {//echo "fromPermalink";exit;
        if (null === $permalink) {
            return null;
        }

        if (!is_string($permalink)) {
            throw new \InvalidArgumentException('The permalink must be a string. The seo attribute cannot be retrieved');
        }
        
        return $this->repository
            ->findOneBy(array("permalink" => $permalink, "toDelete" => 0));
        

        return AlSeoQuery::create('a')
                    //->joinWith('a.AlPage')
                    //->joinWith('a.AlLanguage')
                    ->filterByPermalink($permalink)
                    ->filterByToDelete(0)
                    ->findOne();
    }

    /**
     * {@inheritdoc}
     */
    public function fromPageId($pageId)
    {
        return $this->repository
            ->findOneBy(array("pageId" => $pageId, "toDelete" => 0));
        
        return AlSeoQuery::create()
                    ->filterByPageId($pageId)
                    ->filterByToDelete(0)
                    ->find();
    }

    /**
     * {@inheritdoc}
     */
    public function fromLanguageId($languageId)
    {
        return $this->repository
            ->findOneBy(array("languageId" => $languageId, "toDelete" => 0));
        
        return AlSeoQuery::create()
                    ->filterByLanguageId($languageId)
                    ->filterByToDelete(0)
                    ->find();
    }

    /**
     * {@inheritdoc}
     */
    public function fromPageIdWithLanguages($pageId)
    {echo "fromPageIdWithLanguages";exit;
        return AlSeoQuery::create()
                    ->joinAlLanguage()
                    ->filterByPageId($pageId)
                    ->filterByToDelete(0)
                    ->orderByLanguageId()
                    ->find();
    }

    /**
     * {@inheritdoc}
     */
    public function fetchSeoAttributesWithPagesAndLanguages()
    {echo "fetchSeoAttributesWithPagesAndLanguages";exit;
        return AlSeoQuery::create('a')
                    ->joinWith('a.AlPage')
                    ->joinWith('a.AlLanguage')
                    ->filterByToDelete(0)
                    ->orderByPageId()
                    ->orderByLanguageId()
                    ->find();
    }

    /**
     * {@inheritdoc}
     */
    public function fromLanguageName($languageName)
    {echo "fromLanguageName";exit;
        return AlSeoQuery::create('a')
                    ->joinWith('a.AlLanguage')
                    ->where('AlLanguage.languageName = ?', $languageName)
                    ->filterByToDelete(0)
                    ->find();
    }
}
