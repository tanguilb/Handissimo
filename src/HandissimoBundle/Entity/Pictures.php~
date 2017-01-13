<?php

namespace HandissimoBundle\Entity;

/**
 * Pictures
 */
class Pictures
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $pictureName;

    /**
     * @var \DateTime
     */
    private $update;


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
     * Set pictureName
     *
     * @param string $pictureName
     *
     * @return Pictures
     */
    public function setPictureName($pictureName)
    {
        $this->pictureName = $pictureName;

        return $this;
    }

    /**
     * Get pictureName
     *
     * @return string
     */
    public function getPictureName()
    {
        return $this->pictureName;
    }

    /**
     * Set update
     *
     * @param \DateTime $update
     *
     * @return Pictures
     */
    public function setUpdate($update)
    {
        $this->update = $update;

        return $this;
    }

    /**
     * Get update
     *
     * @return \DateTime
     */
    public function getUpdate()
    {
        return $this->update;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $organizationpicture;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->organizationpicture = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add organizationpicture
     *
     * @param \HandissimoBundle\Entity\Organizations $organizationpicture
     *
     * @return Pictures
     */
    public function addOrganizationpicture(\HandissimoBundle\Entity\Organizations $organizationpicture)
    {
        $this->organizationpicture[] = $organizationpicture;

        return $this;
    }

    /**
     * Remove organizationpicture
     *
     * @param \HandissimoBundle\Entity\Organizations $organizationpicture
     */
    public function removeOrganizationpicture(\HandissimoBundle\Entity\Organizations $organizationpicture)
    {
        $this->organizationpicture->removeElement($organizationpicture);
    }

    /**
     * Get organizationpicture
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrganizationpicture()
    {
        return $this->organizationpicture;
    }
}
