<?php

namespace HandissimoBundle\Entity;

/**
 * Staff
 */
class Staff
{

    public function __toString()
    {
        return $this->jobs;
    }

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $jobs;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->organizations = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $organizations;


    /**
     * Add organization
     *
     * @param \HandissimoBundle\Entity\Organizations $organization
     *
     * @return Staff
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
