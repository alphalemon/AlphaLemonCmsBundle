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

use AlphaLemon\AlphaLemonCmsBundle\Model\AlUser;
use AlphaLemon\AlphaLemonCmsBundle\Model\AlUserQuery;
use AlphaLemon\AlphaLemonCmsBundle\Core\Repository\Repository\UserRepositoryInterface;
use AlphaLemon\AlphaLemonCmsBundle\Core\Exception\Content\General\InvalidParameterTypeException;

/**
 *  Implements the UserRepositoryInterface to work with Doctrine
 *
 *  @author alphalemon <webmaster@alphalemon.com>
 */
class AlUserRepositoryDoctrine extends Base\AlDoctrineRepository implements UserRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function getRepositoryObjectClassName()
    {
        return '\AlphaLemon\AlphaLemonCmsBundle\Model\AlUser';
    }

    /**
     * {@inheritdoc}
     */
    public function setRepositoryObject($object = null)
    {
        if (null !== $object && !$object instanceof AlUser) {
            throw new InvalidParameterTypeException('AlUserRepositoryDoctrine accepts only AlUser Doctrine objects');
        }

        return parent::setRepositoryObject($object);
    }

    /**
     * {@inheritdoc}
     */
    public function fromPK($id)
    {
        return AlUserQuery::create()
                          ->findPk($id);
    }
    
    /**
     * {@inheritdoc}
     */
    public function fromUserName($userName)
    {
        return AlUserQuery::create()
                          ->filterByUserName($userName)
                          ->findOne();
    }

    /**
     * {@inheritdoc}
     */
    public function activeUsers()
    {
        return AlUserQuery::create()
                          ->find();
    }
}
