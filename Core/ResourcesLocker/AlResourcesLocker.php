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

namespace AlphaLemon\AlphaLemonCmsBundle\Core\ResourcesLocker;

use AlphaLemon\AlphaLemonCmsBundle\Core\Repository\Factory\AlFactoryRepositoryInterface;
use AlphaLemon\AlphaLemonCmsBundle\Core\ResourcesLocker\Exception\ResourceNotFreeException;
use AlphaLemon\AlphaLemonCmsBundle\Core\Exception\General\RuntimeException;

/**
 * AlResourcesLocker is responsible to manage the locked resources.
 *
 * A user could not lock more that a resource a time
 *
 * @author alphalemon <webmaster@alphalemon.com>
 *
 * @api
 */
class AlResourcesLocker
{
    private $lockedResourceRepository;
    private $expiringTime;

    /**
     * Constructor
     *
     * @param \AlphaLemon\AlphaLemonCmsBundle\Core\Repository\Factory\AlFactoryRepositoryInterface $factoryRepository
     * @param int                                                                                  $expiringTime      The time after a not updated resource is expired
     *
     * @api
     */
    public function __construct(AlFactoryRepositoryInterface $factoryRepository, $expiringTime = 300)
    {
        $this->factoryRepository = $factoryRepository;
        $this->lockedResourceRepository = $this->factoryRepository->createRepository('LockedResource');
        $this->expiringTime = $expiringTime;
    }

    /**
     * Locks a resource for the current user when it is free or updates the expiring
     * time when it is locked by the same user
     *
     * @param  type                     $userId
     * @param  type                     $resourceName
     * @throws ResourceNotFreeException
     * @throws \RuntimeException
     *
     * @api
     */
    public function lockResource($userId, $resourceName)
    {
        $resource = $this->lockedResourceRepository->fromResourceNameByUser($userId, $resourceName);
        if (null === $resource) {
            if ( ! $this->isResourceFree($resourceName)) {
                throw new ResourceNotFreeException('The resource you requested is locked by another user. Please retry in a couple of minutes');
            }

            $resourceClass = $this->lockedResourceRepository->getRepositoryObjectClassName();
            $resource = new $resourceClass();
            $values = array(
                'ResourceName' => $resourceName,
                'UserId' => $userId,
                'CreatedAt' => time(),
                'UpdatedAt' => time(),
            );
        } else {
            $values = array(
                'UpdatedAt' => time(),
            );
        }

        $result = $this->lockedResourceRepository
                       ->setRepositoryObject($resource)
                       ->save($values);
        if (false === $result) {
            throw new RuntimeException('The resource has not been locked due to an error occoured during the saving operation');
        }
    }

    /**
     * Unlocks the resource held by the giving user
     *
     * @param int $userId
     *
     * @api
     */
    public function unlockUserResource($userId)
    {
        return $this->lockedResourceRepository->freeUserResource($userId);
    }

    /**
     * Unlocks the given resource
     *
     * @param string $resourceName
     *
     * @api
     */
    public function unlockResource($resourceName)
    {
        return $this->lockedResourceRepository->freeLockedResource($resourceName);
    }

    /**
     * Unlocks the expired resources
     *
     * @api
     */
    public function unlockExpiredResources()
    {
        $expiredTime = time() - $this->expiringTime;

        return $this->lockedResourceRepository->removeExpiredResources($expiredTime);
    }

    /**
     * Checks whene a resource is free
     *
     * @param  string  $resourceName
     * @return boolean
     *
     * @api
     */
    protected function isResourceFree($resourceName)
    {
        return (null === $this->lockedResourceRepository->fromResourceName($resourceName)) ? true : false;
    }
}
