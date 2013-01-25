<?php

namespace AlphaLemon\AlphaLemonCmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AlBlock
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class AlBlock
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
     * @var integer
     *
     * @ORM\Column(name="page_id", type="integer")
     */
    private $page_id;

    /**
     * @var integer
     *
     * @ORM\Column(name="language_id", type="integer")
     */
    private $language_id;

    /**
     * @var string
     *
     * @ORM\Column(name="slot_name", type="string", length=255)
     */
    private $slot_name;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="internal_javascript", type="text")
     */
    private $internal_javascript;

    /**
     * @var string
     *
     * @ORM\Column(name="external_javascript", type="text")
     */
    private $external_javascript;

    /**
     * @var string
     *
     * @ORM\Column(name="internal_stylesheet", type="text")
     */
    private $internal_stylesheet;

    /**
     * @var string
     *
     * @ORM\Column(name="external_stylesheet", type="text")
     */
    private $external_stylesheet;

    /**
     * @var boolean
     *
     * @ORM\Column(name="to_delete", type="boolean")
     */
    private $to_delete;

    /**
     * @var integer
     *
     * @ORM\Column(name="content_position", type="integer")
     */
    private $content_position;

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
     * Set page_id
     *
     * @param integer $pageId
     * @return AlBlock
     */
    public function setPageId($pageId)
    {
        $this->page_id = $pageId;
    
        return $this;
    }

    /**
     * Get page_id
     *
     * @return integer 
     */
    public function getPageId()
    {
        return $this->page_id;
    }

    /**
     * Set language_id
     *
     * @param integer $languageId
     * @return AlBlock
     */
    public function setLanguageId($languageId)
    {
        $this->language_id = $languageId;
    
        return $this;
    }

    /**
     * Get language_id
     *
     * @return integer 
     */
    public function getLanguageId()
    {
        return $this->language_id;
    }

    /**
     * Set slot_name
     *
     * @param string $slotName
     * @return AlBlock
     */
    public function setSlotName($slotName)
    {
        $this->slot_name = $slotName;
    
        return $this;
    }

    /**
     * Get slot_name
     *
     * @return string 
     */
    public function getSlotName()
    {
        return $this->slot_name;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return AlBlock
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return AlBlock
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set internal_javascript
     *
     * @param string $internalJavascript
     * @return AlBlock
     */
    public function setInternalJavascript($internalJavascript)
    {
        $this->internal_javascript = $internalJavascript;
    
        return $this;
    }

    /**
     * Get internal_javascript
     *
     * @return string 
     */
    public function getInternalJavascript()
    {
        return $this->internal_javascript;
    }

    /**
     * Set external_javascript
     *
     * @param string $externalJavascript
     * @return AlBlock
     */
    public function setExternalJavascript($externalJavascript)
    {
        $this->external_javascript = $externalJavascript;
    
        return $this;
    }

    /**
     * Get external_javascript
     *
     * @return string 
     */
    public function getExternalJavascript()
    {
        return $this->external_javascript;
    }

    /**
     * Set internal_stylesheet
     *
     * @param string $internalStylesheet
     * @return AlBlock
     */
    public function setInternalStylesheet($internalStylesheet)
    {
        $this->internal_stylesheet = $internalStylesheet;
    
        return $this;
    }

    /**
     * Get internal_stylesheet
     *
     * @return string 
     */
    public function getInternalStylesheet()
    {
        return $this->internal_stylesheet;
    }

    /**
     * Set external_stylesheet
     *
     * @param string $externalStylesheet
     * @return AlBlock
     */
    public function setExternalStylesheet($externalStylesheet)
    {
        $this->external_stylesheet = $externalStylesheet;
    
        return $this;
    }

    /**
     * Get external_stylesheet
     *
     * @return string 
     */
    public function getExternalStylesheet()
    {
        return $this->external_stylesheet;
    }

    /**
     * Set to_delete
     *
     * @param boolean $toDelete
     * @return AlBlock
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
     * Set content_position
     *
     * @param integer $contentPosition
     * @return AlBlock
     */
    public function setContentPosition($contentPosition)
    {
        $this->content_position = $contentPosition;
    
        return $this;
    }

    /**
     * Get content_position
     *
     * @return integer 
     */
    public function getContentPosition()
    {
        return $this->content_position;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return AlBlock
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
