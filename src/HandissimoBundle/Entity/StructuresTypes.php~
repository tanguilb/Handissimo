<?php

namespace HandissimoBundle\Entity;

/**
 * StructuresTypes
 */
class StructuresTypes
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $structuresType;

    /**
     * @var string
     */
    private $logoMdph;

    /**
     * @var \HandissimoBundle\Entity\Organizations
     */
    private $structures;


    /**
     * Set id
     *
     * @param integer $id
     *
     * @return StructuresTypes
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set structuresType
     *
     * @param string $structuresType
     *
     * @return StructuresTypes
     */
    public function setStructuresType($structuresType)
    {
        $this->structuresType = $structuresType;

        return $this;
    }

    /**
     * Get structuresType
     *
     * @return string
     */
    public function getStructuresType()
    {
        return $this->structuresType;
    }

    /**
     * Set logoMdph
     *
     * @param string $logoMdph
     *
     * @return StructuresTypes
     */
    public function setLogoMdph($logoMdph)
    {
        $this->logoMdph = $logoMdph;

        return $this;
    }

    /**
     * Get logoMdph
     *
     * @return string
     */
    public function getLogoMdph()
    {
        return $this->logoMdph;
    }

    /**
     * Set structures
     *
     * @param \HandissimoBundle\Entity\Organizations $structures
     *
     * @return StructuresTypes
     */
    public function setStructures(\HandissimoBundle\Entity\Organizations $structures = null)
    {
        $this->structures = $structures;

        return $this;
    }

    /**
     * Get structures
     *
     * @return \HandissimoBundle\Entity\Organizations
     */
    public function getStructures()
    {
        return $this->structures;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $organizationtype;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->organizationtype = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add organizationtype
     *
     * @param \HandissimoBundle\Entity\Organizations $organizationtype
     *
     * @return StructuresTypes
     */
    public function addOrganizationtype(\HandissimoBundle\Entity\Organizations $organizationtype)
    {
        $this->organizationtype[] = $organizationtype;

        return $this;
    }

    /**
     * Remove organizationtype
     *
     * @param \HandissimoBundle\Entity\Organizations $organizationtype
     */
    public function removeOrganizationtype(\HandissimoBundle\Entity\Organizations $organizationtype)
    {
        $this->organizationtype->removeElement($organizationtype);
    }

    /**
     * Get organizationtype
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrganizationtype()
    {
        return $this->organizationtype;
    }
}
