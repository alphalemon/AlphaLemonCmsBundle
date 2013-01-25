<?php

namespace AlphaLemon\AlphaLemonCmsBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="al_page")
 */
class AlPage
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $page_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $template_name;
    
    /**
     * @ORM\Column(type="boolean")
     */
    protected $is_home;
    
    /**
     * @ORM\Column(type="boolean")
     */
    protected $is_published;
    
    /**
     * @ORM\Column(type="boolean")
     */
    protected $to_delete;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    protected $created_at;

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
     * Set page_name
     *
     * @param string $pageName
     * @return AlPage
     */
    public function setPageName($pageName)
    {
        $this->page_name = $pageName;
    
        return $this;
    }

    /**
     * Get page_name
     *
     * @return string 
     */
    public function getPageName()
    {
        return $this->page_name;
    }

    /**
     * Set template_name
     *
     * @param string $templateName
     * @return AlPage
     */
    public function setTemplateName($templateName)
    {
        $this->template_name = $templateName;
    
        return $this;
    }

    /**
     * Get template_name
     *
     * @return string 
     */
    public function getTemplateName()
    {
        return $this->template_name;
    }

    /**
     * Set is_home
     *
     * @param boolean $isHome
     * @return AlPage
     */
    public function setIsHome($isHome)
    {
        $this->is_home = $isHome;
    
        return $this;
    }

    /**
     * Get is_home
     *
     * @return boolean 
     */
    public function getIsHome()
    {
        return $this->is_home;
    }

    /**
     * Set is_published
     *
     * @param boolean $isPublished
     * @return AlPage
     */
    public function setIsPublished($isPublished)
    {
        $this->is_published = $isPublished;
    
        return $this;
    }

    /**
     * Get is_published
     *
     * @return boolean 
     */
    public function getIsPublished()
    {
        return $this->is_published;
    }

    /**
     * Set to_delete
     *
     * @param boolean $toDelete
     * @return AlPage
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
     * @return AlPage
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