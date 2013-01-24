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

use AlphaLemon\AlphaLemonCmsBundle\Model\AlRole;
use AlphaLemon\AlphaLemonCmsBundle\Model\AlRoleQuery;
use AlphaLemon\AlphaLemonCmsBundle\Core\Repository\Repository\RoleRepositoryInterface;
use AlphaLemon\AlphaLemonCmsBundle\Core\Exception\Content\General\InvalidParameterTypeException;

/**
 *  Implements the UserRepositoryInterface to work with Doctrine
 *
 *  @author alphalemon <webmaster@alphalemon.com>
 */
class AlRoleRepositoryDoctrine extends Base\AlDoctrineRepository implements RoleRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function getRepositoryObjectClassName()
    {
        return '\AlphaLemon\AlphaLemonCmsBundle\Model\AlRole';
    }

    /**
     * {@inheritdoc}
     */
    public function setRepositoryObject($object = null)
    {
        if (null !== $object && !$object instanceof AlRole) {
            throw new InvalidParameterTypeException('AlRoleRepositoryDoctrine accepts only AlRole Doctrine objects');
        }

        return parent::setRepositoryObject($object);
    }

    /**
     * {@inheritdoc}
     */
    public function fromPK($id)
    {
        return AlRoleQuery::create()
                          ->findPk($id);
    }
    
    /**
     * {@inheritdoc}
     */
    public function fromRoleName($roleName)
    {
        return AlRoleQuery::create()
                          ->filterByRole($roleName)
                          ->findOne();
    }

    /**
     * {@inheritdoc}
     */
    public function activeRoles()
    {
        return AlRoleQuery::create()
                          ->find();
    }
}
