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

use AlphaLemon\AlphaLemonCmsBundle\Entity\AlLockedResource;
use AlphaLemon\AlphaLemonCmsBundle\Model\AlLockedResourceQuery;
use AlphaLemon\AlphaLemonCmsBundle\Core\Repository\Repository\LockedResourceRepositoryInterface;
use AlphaLemon\AlphaLemonCmsBundle\Core\Exception\Content\General\InvalidParameterTypeException;

/**
 *  Implements the UserRepositoryInterface to work with Doctrine
 *
 *  @author alphalemon <webmaster@alphalemon.com>
 */
class AlLockedResourceRepositoryDoctrine extends Base\AlDoctrineRepository implements LockedResourceRepositoryInterface
{
    public function __construct(\Doctrine\Bundle\DoctrineBundle\Registry $doctrine)
    {
        parent::__construct($doctrine);
        
        $this->repository = $this->doctrine->getRepository('AlphaLemonCmsBundle:AlLockedResource');
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
    protected function getRepositoryName()
    {
        return 'AlphaLemonCmsBundle:AlLockedResource';
    }
    
    /**
     * {@inheritdoc}
     */
    public function getRepositoryObjectClassName()
    {
        return '\AlphaLemon\AlphaLemonCmsBundle\Entity\AlLockedResource';
    }

    /**
     * {@inheritdoc}
     */
    public function setRepositoryObject($object = null)
    {
        if (null !== $object && !$object instanceof AlLockedResource) {
            throw new InvalidParameterTypeException('AlLockedResourceRepositoryDoctrine accepts only AlLockedResource Doctrine objects');
        }

        return parent::setRepositoryObject($object);
    }
    
    /**
     * {@inheritdoc}
     */
    public function fromResourceName($resource)
    {
        return $this->repository
            ->findOneBy(array("resourceName" => $resource));
    }
    
    /**
     * {@inheritdoc}
     */
    public function fromResourceNameByUser($userId, $resource)
    {
        return $this->repository
            ->findOneBy(array("userId" => $userId, "resourceName" => $resource));
    }
    
    /**
     * {@inheritdoc}
     */
    public function freeLockedResource($resource)
    {
        $lockedResource = $this->fromResourceName($resource);
        
        $this->remove($lockedResource);
    }
    
    /**
     * {@inheritdoc}
     */
    public function removeExpiredResources($expiredTime)
    {
        $resources = $this->repository
            ->createQueryBuilder('a')
            ->where('a.updatedAt <= :expiredTime')
            ->setParameter('expiredTime', new \DateTime('@' . $expiredTime))
            ->getQuery()
            ->getResult()
        ;
        
        foreach($resources as $resource) {
            $this->remove($resource);
        }
    }
    
    /**
     * {@inheritdoc}
     */
    public function freeUserResource($userId)
    {
        $lockedResource = $this->repository
            ->findOneBy(array("userId" => $userId));
        
        $this->remove($lockedResource);
    }
    
    /**
     * {@inheritdoc}
     */
    public function fetchResources($userId = null)
    {
        $query = $this->repository
            ->createQueryBuilder('a');
        
        if (null !== $userId) {
            $query
                ->where('a.userId <= :userId')
                ->setParameter('userId', $userId)
            ;
        }
        
        $resources = $query
            ->getQuery()
            ->getResult()
        ;
        
        return $resources;
    }
    
    
}