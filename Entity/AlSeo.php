<?php

namespace AlphaLemon\AlphaLemonCmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AlSeo
 *
 * @ORM\Table(name="al_seo")
 * @ORM\Entity
 */
class AlSeo
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
     * @ORM\Column(name="language_id", type="integer", nullable=false)
     */
    private $languageId;

    /**
     * @var integer
     *
     * @ORM\Column(name="page_id", type="integer", nullable=false)
     */
    private $pageId;

    /**
     * @var string
     *
     * @ORM\Column(name="permalink", type="string", length=255, nullable=true)
     */
    private $permalink;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_title", type="text", nullable=false)
     */
    private $metaTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_description", type="text", nullable=false)
     */
    private $metaDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_keywords", type="text", nullable=false)
     */
    private $metaKeywords;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_title_frontend", type="text", nullable=true)
     */
    private $metaTitleFrontend;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_description_frontend", type="text", nullable=true)
     */
    private $metaDescriptionFrontend;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_keywords_frontend", type="text", nullable=true)
     */
    private $metaKeywordsFrontend;

    /**
     * @var string
     *
     * @ORM\Column(name="sitemap_changefreq", type="text", nullable=false)
     */
    private $sitemapChangefreq;

    /**
     * @var string
     *
     * @ORM\Column(name="sitemap_lastmod", type="text", nullable=false)
     */
    private $sitemapLastmod;

    /**
     * @var string
     *
     * @ORM\Column(name="sitemap_priority", type="text", nullable=false)
     */
    private $sitemapPriority;

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
     * Set languageId
     *
     * @param integer $languageId
     * @return AlSeo
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
     * Set pageId
     *
     * @param integer $pageId
     * @return AlSeo
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
     * Set metaTitle
     *
     * @param string $metaTitle
     * @return AlSeo
     */
    public function setMetaTitle($metaTitle)
    {
        $this->metaTitle = $metaTitle;
    
        return $this;
    }

    /**
     * Get metaTitle
     *
     * @return string 
     */
    public function getMetaTitle()
    {
        return $this->metaTitle;
    }

    /**
     * Set metaDescription
     *
     * @param string $metaDescription
     * @return AlSeo
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;
    
        return $this;
    }

    /**
     * Get metaDescription
     *
     * @return string 
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * Set metaKeywords
     *
     * @param string $metaKeywords
     * @return AlSeo
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->metaKeywords = $metaKeywords;
    
        return $this;
    }

    /**
     * Get metaKeywords
     *
     * @return string 
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }

    /**
     * Set metaTitleFrontend
     *
     * @param string $metaTitleFrontend
     * @return AlSeo
     */
    public function setMetaTitleFrontend($metaTitleFrontend)
    {
        $this->metaTitleFrontend = $metaTitleFrontend;
    
        return $this;
    }

    /**
     * Get metaTitleFrontend
     *
     * @return string 
     */
    public function getMetaTitleFrontend()
    {
        return $this->metaTitleFrontend;
    }

    /**
     * Set metaDescriptionFrontend
     *
     * @param string $metaDescriptionFrontend
     * @return AlSeo
     */
    public function setMetaDescriptionFrontend($metaDescriptionFrontend)
    {
        $this->metaDescriptionFrontend = $metaDescriptionFrontend;
    
        return $this;
    }

    /**
     * Get metaDescriptionFrontend
     *
     * @return string 
     */
    public function getMetaDescriptionFrontend()
    {
        return $this->metaDescriptionFrontend;
    }

    /**
     * Set metaKeywordsFrontend
     *
     * @param string $metaKeywordsFrontend
     * @return AlSeo
     */
    public function setMetaKeywordsFrontend($metaKeywordsFrontend)
    {
        $this->metaKeywordsFrontend = $metaKeywordsFrontend;
    
        return $this;
    }

    /**
     * Get metaKeywordsFrontend
     *
     * @return string 
     */
    public function getMetaKeywordsFrontend()
    {
        return $this->metaKeywordsFrontend;
    }

    /**
     * Set sitemapChangefreq
     *
     * @param string $sitemapChangefreq
     * @return AlSeo
     */
    public function setSitemapChangefreq($sitemapChangefreq)
    {
        $this->sitemapChangefreq = $sitemapChangefreq;
    
        return $this;
    }

    /**
     * Get sitemapChangefreq
     *
     * @return string 
     */
    public function getSitemapChangefreq()
    {
        return $this->sitemapChangefreq;
    }

    /**
     * Set sitemapLastmod
     *
     * @param string $sitemapLastmod
     * @return AlSeo
     */
    public function setSitemapLastmod($sitemapLastmod)
    {
        $this->sitemapLastmod = $sitemapLastmod;
    
        return $this;
    }

    /**
     * Get sitemapLastmod
     *
     * @return string 
     */
    public function getSitemapLastmod()
    {
        return $this->sitemapLastmod;
    }

    /**
     * Set sitemapPriority
     *
     * @param string $sitemapPriority
     * @return AlSeo
     */
    public function setSitemapPriority($sitemapPriority)
    {
        $this->sitemapPriority = $sitemapPriority;
    
        return $this;
    }

    /**
     * Get sitemapPriority
     *
     * @return string 
     */
    public function getSitemapPriority()
    {
        return $this->sitemapPriority;
    }

    /**
     * Set toDelete
     *
     * @param integer $toDelete
     * @return AlSeo
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
     * @return AlSeo
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