<?php

namespace AlphaLemon\AlphaLemonCmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AlSeo
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class AlSeo
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
     * @ORM\Column(name="language_id", type="integer")
     */
    private $language_id;

    /**
     * @var integer
     *
     * @ORM\Column(name="page_id", type="integer")
     */
    private $page_id;

    /**
     * @var string
     *
     * @ORM\Column(name="permalink", type="string", length=255)
     */
    private $permalink;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_title", type="string", length=255)
     */
    private $meta_title;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_description", type="text")
     */
    private $meta_description;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_keywords", type="text")
     */
    private $meta_keywords;

    /**
     * @var string
     *
     * @ORM\Column(name="sitemap_changefreq", type="string", length=255)
     */
    private $sitemap_changefreq;

    /**
     * @var string
     *
     * @ORM\Column(name="sitemap_lastmod", type="string", length=255)
     */
    private $sitemap_lastmod;

    /**
     * @var string
     *
     * @ORM\Column(name="sitemap_priority", type="string", length=255)
     */
    private $sitemap_priority;

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
     * Set language_id
     *
     * @param integer $languageId
     * @return AlSeo
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
     * Set page_id
     *
     * @param integer $pageId
     * @return AlSeo
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
     * Set permalink
     *
     * @param string $permalink
     * @return AlSeo
     */
    public function setPermalink($permalink)
    {
        $this->permalink = $permalink;
    
        return $this;
    }

    /**
     * Get permalink
     *
     * @return string 
     */
    public function getPermalink()
    {
        return $this->permalink;
    }

    /**
     * Set meta_title
     *
     * @param string $metaTitle
     * @return AlSeo
     */
    public function setMetaTitle($metaTitle)
    {
        $this->meta_title = $metaTitle;
    
        return $this;
    }

    /**
     * Get meta_title
     *
     * @return string 
     */
    public function getMetaTitle()
    {
        return $this->meta_title;
    }

    /**
     * Set meta_description
     *
     * @param string $metaDescription
     * @return AlSeo
     */
    public function setMetaDescription($metaDescription)
    {
        $this->meta_description = $metaDescription;
    
        return $this;
    }

    /**
     * Get meta_description
     *
     * @return string 
     */
    public function getMetaDescription()
    {
        return $this->meta_description;
    }

    /**
     * Set meta_keywords
     *
     * @param string $metaKeywords
     * @return AlSeo
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->meta_keywords = $metaKeywords;
    
        return $this;
    }

    /**
     * Get meta_keywords
     *
     * @return string 
     */
    public function getMetaKeywords()
    {
        return $this->meta_keywords;
    }

    /**
     * Set sitemap_changefreq
     *
     * @param string $sitemapChangefreq
     * @return AlSeo
     */
    public function setSitemapChangefreq($sitemapChangefreq)
    {
        $this->sitemap_changefreq = $sitemapChangefreq;
    
        return $this;
    }

    /**
     * Get sitemap_changefreq
     *
     * @return string 
     */
    public function getSitemapChangefreq()
    {
        return $this->sitemap_changefreq;
    }

    /**
     * Set sitemap_lastmod
     *
     * @param string $sitemapLastmod
     * @return AlSeo
     */
    public function setSitemapLastmod($sitemapLastmod)
    {
        $this->sitemap_lastmod = $sitemapLastmod;
    
        return $this;
    }

    /**
     * Get sitemap_lastmod
     *
     * @return string 
     */
    public function getSitemapLastmod()
    {
        return $this->sitemap_lastmod;
    }

    /**
     * Set sitemap_priority
     *
     * @param string $sitemapPriority
     * @return AlSeo
     */
    public function setSitemapPriority($sitemapPriority)
    {
        $this->sitemap_priority = $sitemapPriority;
    
        return $this;
    }

    /**
     * Get sitemap_priority
     *
     * @return string 
     */
    public function getSitemapPriority()
    {
        return $this->sitemap_priority;
    }

    /**
     * Set to_delete
     *
     * @param boolean $toDelete
     * @return AlSeo
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
     * @return AlSeo
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
