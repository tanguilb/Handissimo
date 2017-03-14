<?php

namespace HandissimoBundle\Entity;

/**
 * OtherJob
 */
class OtherJob
{
    public function __toString()
    {
        return $this->name;
    }

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return OtherJob
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $otherjoborga;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->otherjoborga = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add otherjoborga
     *
     * @param \HandissimoBundle\Entity\Organizations $otherjoborga
     *
     * @return OtherJob
     */
    public function addOtherjoborga(\HandissimoBundle\Entity\Organizations $otherjoborga)
    {
        $this->otherjoborga[] = $otherjoborga;

        return $this;
    }

    /**
     * Remove otherjoborga
     *
     * @param \HandissimoBundle\Entity\Organizations $otherjoborga
     */
    public function removeOtherjoborga(\HandissimoBundle\Entity\Organizations $otherjoborga)
    {
        $this->otherjoborga->removeElement($otherjoborga);
    }

    /**
     * Get otherjoborga
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOtherjoborga()
    {
        return $this->otherjoborga;
    }
}
