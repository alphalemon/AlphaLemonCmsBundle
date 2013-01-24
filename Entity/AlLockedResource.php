<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AlphaLemon\AlphaLemonCmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="al_locked_resource")
*/
class AlLockedResource
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=32)
     */
    protected $resource_name;

    /**
     * @ORM\Column(type="integer")
     */
    protected $user_id;

    /**
     * @ORM\Column(type="time")
     */
    protected $created_at;

    /**
     * @ORM\Column(type="time")
     */
    protected $updated_at;

    /**
     * Set resource_name
     *
     * @param string $resourceName
     * @return AlLockedResource
     */
    public function setResourceName($resourceName)
    {
        $this->resource_name = $resourceName;
    
        return $this;
    }

    /**
     * Get resource_name
     *
     * @return string 
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Set user_id
     *
     * @param integer $userId
     * @return AlLockedResource
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;
    
        return $this;
    }

    /**
     * Get user_id
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return AlLockedResource
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    
        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return AlLockedResource
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
    
        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
}