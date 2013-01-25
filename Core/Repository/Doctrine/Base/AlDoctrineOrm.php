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

namespace AlphaLemon\AlphaLemonCmsBundle\Core\Repository\Doctrine\Base;

use AlphaLemon\AlphaLemonCmsBundle\Core\Repository\Orm\OrmInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\DBAL\Connection;

/**
 *  Implements the OrmInterface for Doctrine Orm
 *
 *  @author alphalemon <webmaster@alphalemon.com>
 */
abstract class AlDoctrineOrm implements OrmInterface
{
    protected $doctrine;
    protected $orm;
    protected $affectedRecords = null;    
    protected static $connection = null;

    /**
     * {@inheritdoc}
     */
    //abstract protected function getRepositoryName();
            
    /**
     * Constructor
     *
     * @param \DoctrinePDO $connection
     */
    public function __construct(\Doctrine\Bundle\DoctrineBundle\Registry $doctrine)
    {
        $this->doctrine = $doctrine;
        $this->orm = $doctrine->getManager();
        //$this->repository = $this->doctrine->getRepository($this->getRepositoryName());
        
        self::$connection = $this->orm->getConnection();
    }

    /**
     * {@ inheritdoc}
     */
    public function setConnection($connection)
    {
        if ( ! $connection instanceof Connection)
        {
            throw new \InvalidArgumentException();
        }
        
        self::$connection = $connection;

        return $this;
    }

    /**
     * {@ inheritdoc}
     */
    public function getConnection()
    {
        return self::$connection;
    }

    /**
     * {@ inheritdoc}
     */
    public function startTransaction()
    {
        self::$connection->beginTransaction();

        return $this;
    }

    /**
     * {@ inheritdoc}
     */
    public function commit()
    {
        self::$connection->commit();

        return $this;
    }

    /**
     * {@ inheritdoc}
     */
    public function rollBack()
    {
        self::$connection->rollBack();

        return $this;
    }

    /**
     * {@ inheritdoc}
     */
    public function getAffectedRecords()
    {
        return $this->affectedRecords;
    }

    /**
     * {@ inheritdoc}
     */
    public function save(array $values, $modelObject = null)
    {
        try {
            if (null !== $modelObject) {
                $this->modelObject = $modelObject;
            }
            
            $this->startTransaction();
            $this->bindFromArray($values);
            $this->orm->persist($this->modelObject);            
            $this->affectedRecords = $this->orm->flush();
            $success = true;
            /*if ($this->affectedRecords == 0) {
                $success = ($this->modelObject->isModified()) ? false : null;
            } else {
                $success = true;
            }*/

            if (false !== $success) {
                $this->commit();
            } else {
                $this->rollBack();
            }

            return $success;
        } catch (\Exception $ex) {
            $this->rollBack();

            throw $ex;
        }
    }
    
    /**
     * {@ inheritdoc}
     */
    public function delete($modelObject = null)
    {
        try {
            $values = array('ToDelete' => 1);

            return $this->save($values, $modelObject);
        } catch (\Exception $ex) {

            throw $ex;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function executeQuery($query)
    {
        throw new \RuntimeException('IMPLEMENT AlDoctrineOrm->executeQuery');
        
        $statement = self::$connection->prepare($query);

        return $statement->execute();
    }
    
    /**
     * Removed the current resource
     * 
     * Compatibility with propel query delete method
     * 
     * @param type $lockedResource
     */
    protected function remove($entity)
    {
        if (null === $entity) {
            return ;
        }
        
        $this->orm->remove($entity);
        $this->orm->flush();
    }
}
