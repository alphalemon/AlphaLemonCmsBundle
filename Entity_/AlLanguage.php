<?php

namespace AlphaLemon\AlphaLemonCmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AlLanguage
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class AlLanguage
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="language_name", type="string", length=5)
     */
    private $language_name;

    /**
     * @var boolean
     *
     * @ORM\Column(name="main_language", type="boolean")
     */
    private $main_language;

    /**
     * @var boolean
     *
     * @ORM\Column(name="to_delete", type="boolean")
     */
    private $to_delete;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $created_at;


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
     * Set language_name
     *
     * @param string $languageName
     * @return AlLanguage
     */
    public function setLanguageName($languageName)
    {
        $this->language_name = $languageName;
    
        return $this;
    }

    /**
     * Get language_name
     *
     * @return string 
     */
    public function getLanguageName()
    {
        return $this->language_name;
    }

    /**
     * Set main_language
     *
     * @param boolean $mainLanguage
     * @return AlLanguage
     */
    public function setMainLanguage($mainLanguage)
    {
        $this->main_language = $mainLanguage;
    
        return $this;
    }

    /**
     * Get main_language
     *
     * @return boolean 
     */
    public function getMainLanguage()
    {
        return $this->main_language;
    }

    /**
     * Set to_delete
     *
     * @param boolean $toDelete
     * @return AlLanguage
     */
    public function setToDelete($toDelete)
    {
        $this->to_delete = $toDelete;
    
        return $this;
    }

    /**
     * Get to_delete
     *
     * @return boolean 
     */
    public function getToDelete()
    {
        return $this->to_delete;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return AlLanguage
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
}
