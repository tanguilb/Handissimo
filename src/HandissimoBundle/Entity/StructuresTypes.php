<?php

namespace HandissimoBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * StructuresTypes
 */
class StructuresTypes
{
    public function __toString()
    {
        return $this->structurestype;
    }

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $structurestype;

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
     * Set structurestype
     *
     * @param string $structurestype
     *
     * @return structurestypes
     */
    public function setStructurestype($structurestype)
    {
        $this->structurestype = $structurestype;

        return $this;
    }

    /**
     * Get structurestype
     *
     * @return string
     */
    public function getStructurestype()
    {
        return $this->structurestype;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orgastructuretype = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $orgastructuretype;

    /**
     * Add orgastructuretype
     *
     * @param \HandissimoBundle\Entity\StructuresList $orgastructuretype
     *
     * @return StructuresTypes
     */
    public function addOrgastructuretype(\HandissimoBundle\Entity\StructuresList $orgastructuretype)
    {
        $orgastructuretype->setStructurelists($this);
        $this->orgastructuretype[] = $orgastructuretype;

        return $this;
    }

    /**
     * Remove orgastructuretype
     *
     * @param \HandissimoBundle\Entity\StructuresList $orgastructuretype
     */
    public function removeOrgastructuretype(\HandissimoBundle\Entity\StructuresList $orgastructuretype)
    {
        //$this->orgastructuretype->removeElement($orgastructuretype);
        foreach ($this->orgastructuretype as $k => $v) {
            if ($v->getId() == $orgastructuretype->getId()) {
                unset($this->orgastructuretype[$k]);
            }
        }
    }

    /**
     * Get orgastructuretype
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrgastructuretype()
    {
        return $this->orgastructuretype;
    }


    /**
     * @param $orgastructuretype
     *
     * @return $this
     */
    public function setOrgastructuretype($orgastructuretype)
    {
        $this->orgastructuretype = $orgastructuretype;

        return $this;
    }
}
