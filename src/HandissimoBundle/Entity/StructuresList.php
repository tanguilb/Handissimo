<?php

namespace HandissimoBundle\Entity;

/**
 * StructuresList
 */
class StructuresList
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
     * @var string
     */
    private $logoMdph;


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
     * @return StructuresList
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
     * Set logoMdph
     *
     * @param string $logoMdph
     *
     * @return StructuresList
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
     * @var array
     */
    private $structureType;


    /**
     * Set structureType
     *
     * @param array $structureType
     *
     * @return StructuresList
     */
    public function setStructureType($structureType)
    {
        $this->structureType = $structureType;

        return $this;
    }

    /**
     * Get structureType
     *
     * @return array
     */
    public function getStructureType()
    {
        return $this->structureType;
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $organizationsStructure;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->organizationsStructure = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add organizationsStructure
     *
     * @param \HandissimoBundle\Entity\Organizations $organizationsStructure
     *
     * @return StructuresList
     */
    public function addOrganizationsStructure(\HandissimoBundle\Entity\Organizations $organizationsStructure)
    {
        $this->organizationsStructure[] = $organizationsStructure;

        return $this;
    }

    /**
     * Remove organizationsStructure
     *
     * @param \HandissimoBundle\Entity\Organizations $organizationsStructure
     */
    public function removeOrganizationsStructure(\HandissimoBundle\Entity\Organizations $organizationsStructure)
    {
        $this->organizationsStructure->removeElement($organizationsStructure);
    }

    /**
     * Get organizationsStructure
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrganizationsStructure()
    {
        return $this->organizationsStructure;
    }
}
