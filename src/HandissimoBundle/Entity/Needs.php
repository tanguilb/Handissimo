<?php

namespace HandissimoBundle\Entity;

/**
 * Needs
 */
class Needs
{
    public function __toString()
    {
       return $this->needName;
    }

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $needName;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $structures;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->structures = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set needName
     *
     * @param string $needName
     *
     * @return Needs
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
     * Add structure
     *
     * @param \HandissimoBundle\Entity\Organizations $structure
     *
     * @return Needs
     */
    public function addStructure(\HandissimoBundle\Entity\Organizations $structure)
    {
        $this->structures[] = $structure;

        return $this;
    }

    /**
     * Remove structure
     *
     * @param \HandissimoBundle\Entity\Organizations $structure
     */
    public function removeStructure(\HandissimoBundle\Entity\Organizations $structure)
    {
        $this->structures->removeElement($structure);
    }

    /**
     * Get structures
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStructures()
    {
        return $this->structures;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $organizations;


    /**
     * Add organization
     *
     * @param \HandissimoBundle\Entity\Organizations $organization
     *
     * @return Needs
     */
    public function addOrganization(\HandissimoBundle\Entity\Organizations $organization)
    {
        $this->organizations[] = $organization;

        return $this;
    }

    /**
     * Remove organization
     *
     * @param \HandissimoBundle\Entity\Organizations $organization
     */
    public function removeOrganization(\HandissimoBundle\Entity\Organizations $organization)
    {
        $this->organizations->removeElement($organization);
    }

    /**
     * Get organizations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrganizations()
    {
        return $this->organizations;
    }
}
