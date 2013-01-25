<?php

namespace AlphaLemon\AlphaLemonCmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AlPage
 *
 * @ORM\Table(name="al_page")
 * @ORM\Entity
 */
class AlPage
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
     * @ORM\Column(name="page_name", type="string", length=255, nullable=false)
     */
    private $pageName;

    /**
     * @var string
     *
     * @ORM\Column(name="template_name", type="string", length=255, nullable=true)
     */
    private $templateName;

    /**
     * @var integer
     *
     * @ORM\Column(name="is_home", type="integer", nullable=false)
     */
    private $isHome;

    /**
     * @var integer
     *
     * @ORM\Column(name="is_published", type="integer", nullable=false)
     */
    private $isPublished;

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
     * Set pageName
     *
     * @param string $pageName
     * @return AlPage
     */
    public function setPageName($pageName)
    {
        $this->pageName = $pageName;
    
        return $this;
    }

    /**
     * Get pageName
     *
     * @return string 
     */
    public function getPageName()
    {
        return $this->pageName;
    }

    /**
     * Set templateName
     *
     * @param string $templateName
     * @return AlPage
     */
    public function setTemplateName($templateName)
    {
        $this->templateName = $templateName;
    
        return $this;
    }

    /**
     * Get templateName
     *
     * @return string 
     */
    public function getTemplateName()
    {
        return $this->templateName;
    }

    /**
     * Set isHome
     *
     * @param integer $isHome
     * @return AlPage
     */
    public function setIsHome($isHome)
    {
        $this->isHome = $isHome;
    
        return $this;
    }

    /**
     * Get isHome
     *
     * @return integer 
     */
    public function getIsHome()
    {
        return $this->isHome;
    }

    /**
     * Set isPublished
     *
     * @param integer $isPublished
     * @return AlPage
     */
    public function setIsPublished($isPublished)
    {
        $this->isPublished = $isPublished;
    
        return $this;
    }

    /**
     * Get isPublished
     *
     * @return integer 
     */
    public function getIsPublished()
    {
        return $this->isPublished;
    }

    /**
     * Set toDelete
     *
     * @param integer $toDelete
     * @return AlPage
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
     * @return AlPage
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