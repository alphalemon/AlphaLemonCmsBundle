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

use AlphaLemon\AlphaLemonCmsBundle\Core\Content\Page\AlPageManager;
use AlphaLemon\AlphaLemonCmsBundle\Entity\AlPage;
use AlphaLemon\AlphaLemonCmsBundle\Core\Repository\Repository\PageRepositoryInterface;
use AlphaLemon\AlphaLemonCmsBundle\Core\Exception\Content\General\InvalidParameterTypeException;

/**
 *  Implements the PageRepositoryInterface to work with Doctrine
 *
 *  @author alphalemon <webmaster@alphalemon.com>
 */
class AlPageRepositoryDoctrine extends Base\AlDoctrineRepository implements PageRepositoryInterface
{
    public function __construct(\Doctrine\Bundle\DoctrineBundle\Registry $doctrine)
    {
        parent::__construct($doctrine);
        
        $this->repository = $this->doctrine->getRepository('AlphaLemonCmsBundle:AlPage');
    }
    /**
     * {@inheritdoc}
     */
    protected function bindFromArray(array $values)
    {
        $this->modelObject->setPageName($values['PageName']);
        $this->modelObject->setTemplateName($values['TemplateName']);        
        $this->modelObject->setIsHome($values['IsHome']);
        $this->modelObject->setIsPublished($values['IsPublished']);
        $this->modelObject->setToDelete($values['ToDelete']);
    }
    
    /**
     * {@inheritdoc}
     */
    protected function getRepositoryName()
    {
        return 'AlphaLemonCmsBundle:AlPage';
    }
    
    /**
     * {@inheritdoc}
     */
    public function getRepositoryObjectClassName()
    {
        return '\AlphaLemon\AlphaLemonCmsBundle\Entity\AlPage';
    }

    /**
     * {@inheritdoc}
     */
    public function setRepositoryObject($object = null)
    {
        if (null !== $object && !$object instanceof AlPage) {
            throw new InvalidParameterTypeException('AlPageRepositoryDoctrine accepts only AlPage Doctrine objects.');
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
    }

    /**
     * {@inheritdoc}
     */
    public function activePages()
    {
        return $this->repository
            ->createQueryBuilder('a')
            ->where('a.id > :minId')
            ->andWhere('a.toDelete = 0')
            ->setParameter('minId', 1)
            ->orderBy('a.pageName')
            ->getQuery()
            ->getResult()
        ;    
                /*
                AlPageQuery::create()
                    ->filterByToDelete(0)
                    ->where('id > 1')
                    ->orderby('PageName')
                    ->find();*/
    }

    /**
     * {@inheritdoc}
     */
    public function fromPageName($pageName)
    {
        if (null === $pageName) {
            return null;
        }

        if (!is_string($pageName)) {
          throw new \InvalidArgumentException('The name of the page must be a string. The page cannot be retrieved');
        }
        
        return $this
            ->repository
            ->findOneBy(
                array('toDelete' => 0, 'pageName' => AlPageManager::slugify($pageName))
            )
        ; 
        /*
        return AlPageQuery::create()
                    ->filterByToDelete(0)
                    ->filterByPageName(AlPageManager::slugify($pageName))
                    ->findOne();*/
    }
    /*
php app/console doctrine:mapping:convert xml ./vendor/alphalemon/alphalemon-cms-bundle/AlphaLemon/AlphaLemonCmsBundle/Resources/config/doctrine/metadata/orm --from-database --force
        php app/console doctrine:mapping:import AlphaLemonCmsBundle annotation
$ php app/console doctrine:generate:entities AlphaLemonCmsBundle*/
    /**
     * {@inheritdoc}
     */
    public function homePage()
    {
        return $this->repository
            ->findOneBy(array('isHome' => 1, 'toDelete' => 0)); 
                
                /*
                AlPageQuery::create()
                    ->filterByIsHome(1)
                    ->filterByToDelete(0)
                    ->findOne();*/
    }

    /**
     * {@inheritdoc}
     */
    public function fromTemplateName($templateName, $once = false)
    {
        $param = array('templateName' => $templateName, 'toDelete' => 0);
                
        return ($once) 
            ?
                $this->repository->findOneBy($param)
            :
                $this->repository->findBy($param)
            ;
            /*    
        $query = AlPageQuery::create()
                    ->filterByTemplateName($templateName)
                    ->filterByToDelete(0);

        return ($once) ? $query->findOne() : $query->find();*/
    }
}
