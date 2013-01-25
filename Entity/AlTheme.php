<?php

namespace AlphaLemon\AlphaLemonCmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AlTheme
 *
 * @ORM\Table(name="al_theme")
 * @ORM\Entity
 */
class AlTheme
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
     * @ORM\Column(name="theme_name", type="string", length=255, nullable=false)
     */
    private $themeName;

    /**
     * @var integer
     *
     * @ORM\Column(name="active", type="integer", nullable=true)
     */
    private $active;



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
     * Set themeName
     *
     * @param string $themeName
     * @return AlTheme
     */
    public function setThemeName($themeName)
    {
        $this->themeName = $themeName;
    
        return $this;
    }

    /**
     * Get themeName
     *
     * @return string 
     */
    public function getThemeName()
    {
        return $this->themeName;
    }

    /**
     * Set active
     *
     * @param integer $active
     * @return AlTheme
     */
    public function setActive($active)
    {
        $this->active = $active;
    
        return $this;
    }

    /**
     * Get active
     *
     * @return integer 
     */
    public function getActive()
    {
        return $this->active;
    }
}