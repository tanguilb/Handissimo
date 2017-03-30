<?php

namespace HandissimoBundle\Entity;

/**
 * StructureType
 */
class StructureType
{

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
     * @return StructureType
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
    private $structure;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->structure = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add structure
     *
     * @param \HandissimoBundle\Entity\StructuresList $structure
     *
     * @return StructureType
     */
    public function addStructure(\HandissimoBundle\Entity\StructuresList $structure)
    {
        $this->structure[] = $structure;

        return $this;
    }

    /**
     * Remove structure
     *
     * @param \HandissimoBundle\Entity\StructuresList $structure
     */
    public function removeStructure(\HandissimoBundle\Entity\StructuresList $structure)
    {
        $this->structure->removeElement($structure);
    }

    /**
     * Get structure
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStructure()
    {
        return $this->structure;
    }
}
