<?php

namespace AlphaLemon\AlphaLemonCmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AlBlock
 *
 * @ORM\Table(name="al_block")
 * @ORM\Entity
 */
class AlBlock
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
     * @var integer
     *
     * @ORM\Column(name="page_id", type="integer", nullable=false)
     */
    private $pageId;

    /**
     * @var integer
     *
     * @ORM\Column(name="language_id", type="integer", nullable=false)
     */
    private $languageId;

    /**
     * @var string
     *
     * @ORM\Column(name="slot_name", type="string", length=255, nullable=false)
     */
    private $slotName;

    /**
     * @var string
     *
     * @ORM\Column(name="class_name", type="string", length=255, nullable=false)
     */
    private $className;

    /**
     * @var string
     *
     * @ORM\Column(name="html_content", type="text", nullable=false)
     */
    private $htmlContent;

    /**
     * @var string
     *
     * @ORM\Column(name="internal_javascript", type="text", nullable=false)
     */
    private $internalJavascript;

    /**
     * @var string
     *
     * @ORM\Column(name="external_javascript", type="text", nullable=false)
     */
    private $externalJavascript;

    /**
     * @var string
     *
     * @ORM\Column(name="internal_stylesheet", type="text", nullable=false)
     */
    private $internalStylesheet;

    /**
     * @var string
     *
     * @ORM\Column(name="external_stylesheet", type="text", nullable=false)
     */
    private $externalStylesheet;

    /**
     * @var integer
     *
     * @ORM\Column(name="to_delete", type="integer", nullable=false)
     */
    private $toDelete;

    /**
     * @var integer
     *
     * @ORM\Column(name="content_position", type="integer", nullable=false)
     */
    private $contentPosition;

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
     * Set pageId
     *
     * @param integer $pageId
     * @return AlBlock
     */
    public function setPageId($pageId)
    {
        $this->pageId = $pageId;
    
        return $this;
    }

    /**
     * Get pageId
     *
     * @return integer 
     */
    public function getPageId()
    {
        return $this->pageId;
    }

    /**
     * Set languageId
     *
     * @param integer $languageId
     * @return AlBlock
     */
    public function setLanguageId($languageId)
    {
        $this->languageId = $languageId;
    
        return $this;
    }

    /**
     * Get languageId
     *
     * @return integer 
     */
    public function getLanguageId()
    {
        return $this->languageId;
    }

    /**
     * Set slotName
     *
     * @param string $slotName
     * @return AlBlock
     */
    public function setSlotName($slotName)
    {
        $this->slotName = $slotName;
    
        return $this;
    }

    /**
     * Get slotName
     *
     * @return string 
     */
    public function getSlotName()
    {
        return $this->slotName;
    }

    /**
     * Set className
     *
     * @param string $className
     * @return AlBlock
     */
    public function setClassName($className)
    {
        $this->className = $className;
    
        return $this;
    }

    /**
     * Get className
     *
     * @return string 
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * Set htmlContent
     *
     * @param string $htmlContent
     * @return AlBlock
     */
    public function setHtmlContent($htmlContent)
    {
        $this->htmlContent = $htmlContent;
    
        return $this;
    }

    /**
     * Get htmlContent
     *
     * @return string 
     */
    public function getHtmlContent()
    {
        return $this->htmlContent;
    }

    /**
     * Set internalJavascript
     *
     * @param string $internalJavascript
     * @return AlBlock
     */
    public function setInternalJavascript($internalJavascript)
    {
        $this->internalJavascript = $internalJavascript;
    
        return $this;
    }

    /**
     * Get internalJavascript
     *
     * @return string 
     */
    public function getInternalJavascript()
    {
        return $this->internalJavascript;
    }

    /**
     * Set externalJavascript
     *
     * @param string $externalJavascript
     * @return AlBlock
     */
    public function setExternalJavascript($externalJavascript)
    {
        $this->externalJavascript = $externalJavascript;
    
        return $this;
    }

    /**
     * Get externalJavascript
     *
     * @return string 
     */
    public function getExternalJavascript()
    {
        return $this->externalJavascript;
    }

    /**
     * Set internalStylesheet
     *
     * @param string $internalStylesheet
     * @return AlBlock
     */
    public function setInternalStylesheet($internalStylesheet)
    {
        $this->internalStylesheet = $internalStylesheet;
    
        return $this;
    }

    /**
     * Get internalStylesheet
     *
     * @return string 
     */
    public function getInternalStylesheet()
    {
        return $this->internalStylesheet;
    }

    /**
     * Set externalStylesheet
     *
     * @param string $externalStylesheet
     * @return AlBlock
     */
    public function setExternalStylesheet($externalStylesheet)
    {
        $this->externalStylesheet = $externalStylesheet;
    
        return $this;
    }

    /**
     * Get externalStylesheet
     *
     * @return string 
     */
    public function getExternalStylesheet()
    {
        return $this->externalStylesheet;
    }

    /**
     * Set toDelete
     *
     * @param integer $toDelete
     * @return AlBlock
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
     * Set contentPosition
     *
     * @param integer $contentPosition
     * @return AlBlock
     */
    public function setContentPosition($contentPosition)
    {
        $this->contentPosition = $contentPosition;
    
        return $this;
    }

    /**
     * Get contentPosition
     *
     * @return integer 
     */
    public function getContentPosition()
    {
        return $this->contentPosition;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return AlBlock
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