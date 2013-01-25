<?php

namespace AlphaLemon\AlphaLemonCmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AlLanguage
 *
 * @ORM\Table(name="al_language")
 * @ORM\Entity
 */
class AlLanguage
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=5, nullable=false)
     */
    private $language;

    /**
     * @var string
     *
     * @ORM\Column(name="main_language", type="string", length=1, nullable=false)
     */
    private $mainLanguage;

    /**
     * @var integer
     *
     * @ORM\Column(name="to_delete", type="integer", nullable=false)
     */
    private $toDelete;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return AlLanguage
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    
        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set mainLanguage
     *
     * @param string $mainLanguage
     * @return AlLanguage
     */
    public function setMainLanguage($mainLanguage)
    {
        $this->mainLanguage = $mainLanguage;
    
        return $this;
    }

    /**
     * Get mainLanguage
     *
     * @return string 
     */
    public function getMainLanguage()
    {
        return $this->mainLanguage;
    }

    /**
     * Set toDelete
     *
     * @param integer $toDelete
     * @return AlLanguage
     */
    public function setToDelete($toDelete)
    {
        $this->toDelete = $toDelete;
    
        return $this;
    }

    /**
     * Get toDelete
     *
     * @return integer 
     */
    public function getToDelete()
    {
        return $this->toDelete;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return AlLanguage
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}