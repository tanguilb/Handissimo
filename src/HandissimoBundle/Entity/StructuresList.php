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
     * @var \HandissimoBundle\Entity\StructuresTypes
     */
    private $structurelists;


    /**
     * Set structurelists
     *
     * @param \HandissimoBundle\Entity\StructuresTypes $structurelists
     *
     * @return StructuresList
     */
    public function setStructurelists(\HandissimoBundle\Entity\StructuresTypes $structurelists = null)
    {
        $this->structurelists = $structurelists;

        return $this;
    }

    /**
     * Get structurelists
     *
     * @return \HandissimoBundle\Entity\StructuresTypes
     */
    public function getStructurelists()
    {
        return $this->structurelists;
    }
}
