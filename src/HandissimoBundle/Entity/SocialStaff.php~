<?php

namespace HandissimoBundle\Entity;

/**
 * SocialStaff
 */
class SocialStaff
{
    public function __toString()
    {
        return $this->socialJobs;
    }

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
    private $socialstafforga;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->socialstafforga = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add socialstafforga
     *
     * @param \HandissimoBundle\Entity\Organizations $socialstafforga
     *
     * @return SocialStaff
     */
    public function addSocialstafforga(\HandissimoBundle\Entity\Organizations $socialstafforga)
    {
        $this->socialstafforga[] = $socialstafforga;

        return $this;
    }

    /**
     * Remove socialstafforga
     *
     * @param \HandissimoBundle\Entity\Organizations $socialstafforga
     */
    public function removeSocialstafforga(\HandissimoBundle\Entity\Organizations $socialstafforga)
    {
        $this->socialstafforga->removeElement($socialstafforga);
    }

    /**
     * Get socialstafforga
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSocialstafforga()
    {
        return $this->socialstafforga;
    }
}
