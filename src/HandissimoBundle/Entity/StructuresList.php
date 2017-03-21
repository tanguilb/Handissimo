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
     * @var \HandissimoBundle\Entity\Organizations
     */
    private $organizationsStructure;


    /**
     * Set organizationsStructure
     *
     * @param \HandissimoBundle\Entity\Organizations $organizationsStructure
     *
     * @return StructuresList
     */
    public function setOrganizationsStructure(\HandissimoBundle\Entity\Organizations $organizationsStructure = null)
    {
        $this->organizationsStructure = $organizationsStructure;

        return $this;
    }

    /**
     * Get organizationsStructure
     *
     * @return \HandissimoBundle\Entity\Organizations
     */
    public function getOrganizationsStructure()
    {
        return $this->organizationsStructure;
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
}
