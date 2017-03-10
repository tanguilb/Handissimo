<?php

namespace HandissimoBundle\Entity;

/**
 * SocialStaff
 */
class SocialStaff
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $socialJobs;


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
     * Set socialJobs
     *
     * @param string $socialJobs
     *
     * @return SocialStaff
     */
    public function setSocialJobs($socialJobs)
    {
        $this->socialJobs = $socialJobs;

        return $this;
    }

    /**
     * Get socialJobs
     *
     * @return string
     */
    public function getSocialJobs()
    {
        return $this->socialJobs;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $socialstafforganizations;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->socialstafforganizations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add socialstafforganization
     *
     * @param \HandissimoBundle\Entity\Organizations $socialstafforganization
     *
     * @return SocialStaff
     */
    public function addSocialstafforganization(\HandissimoBundle\Entity\Organizations $socialstafforganization)
    {
        $this->socialstafforganizations[] = $socialstafforganization;

        return $this;
    }

    /**
     * Remove socialstafforganization
     *
     * @param \HandissimoBundle\Entity\Organizations $socialstafforganization
     */
    public function removeSocialstafforganization(\HandissimoBundle\Entity\Organizations $socialstafforganization)
    {
        $this->socialstafforganizations->removeElement($socialstafforganization);
    }

    /**
     * Get socialstafforganizations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSocialstafforganizations()
    {
        return $this->socialstafforganizations;
    }
}
