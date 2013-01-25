<?php

namespace AlphaLemon\AlphaLemonCmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AlSlot
 *
 * @ORM\Table(name="al_slot")
 * @ORM\Entity
 */
class AlSlot
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
     * @ORM\Column(name="slot_name", type="string", length=255, nullable=false)
     */
    private $slotName;

    /**
     * @var integer
     *
     * @ORM\Column(name="repeat_contents", type="integer", nullable=false)
     */
    private $repeatContents;



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
     * Set slotName
     *
     * @param string $slotName
     * @return AlSlot
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
     * Set repeatContents
     *
     * @param integer $repeatContents
     * @return AlSlot
     */
    public function setRepeatContents($repeatContents)
    {
        $this->repeatContents = $repeatContents;
    
        return $this;
    }

    /**
     * Get repeatContents
     *
     * @return integer 
     */
    public function getRepeatContents()
    {
        return $this->repeatContents;
    }
}