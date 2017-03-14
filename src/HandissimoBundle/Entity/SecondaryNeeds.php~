<?php

namespace HandissimoBundle\Entity;

/**
 * SecondaryNeeds
 */
class SecondaryNeeds
{

    public function __toString()
    {
        return $this->needName;
    }

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $needName;


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
     * Set needName
     *
     * @param string $needName
     *
     * @return SecondaryNeeds
     */
    public function setNeedName($needName)
    {
        $this->needName = $needName;

        return $this;
    }

    /**
     * Get needName
     *
     * @return string
     */
    public function getNeedName()
    {
        return $this->needName;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $organizationsneeds;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->organizationsneeds = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add organizationsneed
     *
     * @param \HandissimoBundle\Entity\Organizations $organizationsneed
     *
     * @return SecondaryNeeds
     */
    public function addOrganizationsneed(\HandissimoBundle\Entity\Organizations $organizationsneed)
    {
        $this->organizationsneeds[] = $organizationsneed;

        return $this;
    }

    /**
     * Remove organizationsneed
     *
     * @param \HandissimoBundle\Entity\Organizations $organizationsneed
     */
    public function removeOrganizationsneed(\HandissimoBundle\Entity\Organizations $organizationsneed)
    {
        $this->organizationsneeds->removeElement($organizationsneed);
    }

    /**
     * Get organizationsneeds
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrganizationsneeds()
    {
        return $this->organizationsneeds;
    }
}
