<?php

namespace HandissimoBundle\Entity;

/**
 * Staff
 */
class Staff
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $jobs;

    /**
     * @var string
     */
    private $others;

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
     * Set jobs
     *
     * @param string $jobs
     *
     * @return Staff
     */
    public function setJobs($jobs)
    {
        $this->jobs = $jobs;

        return $this;
    }

    /**
     * Get jobs
     *
     * @return string
     */
    public function getJobs()
    {
        return $this->jobs;
    }

    /**
     * Set others
     *
     * @param string $others
     *
     * @return Staff
     */
    public function setOthers($others)
    {
        $this->others = $others;

        return $this;
    }

    /**
     * Get others
     *
     * @return string
     */
    public function getOthers()
    {
        return $this->others;
    }

    /**
     * Add structure
     *
     * @param \HandissimoBundle\Entity\Organizations $structure
     *
     * @return Staff
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
}

