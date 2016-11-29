<?php

namespace HandissimoBundle\Entity;

/**
 * StaffTypes
 */
class StaffTypes
{

    public function __toString()
    {
        return $this->secteur;
    }

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $secteur;

    /**
     * @var \HandissimoBundle\Entity\Staff
     */
    private $staff;


    /**
     * Set id
     *
     * @param integer $id
     *
     * @return StaffTypes
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
     * Set secteur
     *
     * @param string $secteur
     *
     * @return StaffTypes
     */
    public function setSecteur($secteur)
    {
        $this->secteur = $secteur;

        return $this;
    }

    /**
     * Get secteur
     *
     * @return string
     */
    public function getSecteur()
    {
        return $this->secteur;
    }

    /**
     * Set staff
     *
     * @param \HandissimoBundle\Entity\Staff $staff
     *
     * @return StaffTypes
     */
    public function setStaff(\HandissimoBundle\Entity\Staff $staff = null)
    {
        $this->staff = $staff;

        return $this;
    }

    /**
     * Get staff
     *
     * @return \HandissimoBundle\Entity\Staff
     */
    public function getStaff()
    {
        return $this->staff;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $stafftypes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stafftypes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add stafftype
     *
     * @param \HandissimoBundle\Entity\Staff $stafftype
     *
     * @return StaffTypes
     */
    public function addStafftype(\HandissimoBundle\Entity\Staff $stafftype)
    {
        $this->stafftypes[] = $stafftype;

        return $this;
    }

    /**
     * Remove stafftype
     *
     * @param \HandissimoBundle\Entity\Staff $stafftype
     */
    public function removeStafftype(\HandissimoBundle\Entity\Staff $stafftype)
    {
        $this->stafftypes->removeElement($stafftype);
    }

    /**
     * Get stafftypes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStafftypes()
    {
        return $this->stafftypes;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $typesstaff;


    /**
     * Add typesstaff
     *
     * @param \HandissimoBundle\Entity\Staff $typesstaff
     *
     * @return StaffTypes
     */
    public function addTypesstaff(\HandissimoBundle\Entity\Staff $typesstaff)
    {
        $this->typesstaff[] = $typesstaff;

        return $this;
    }

    /**
     * Remove typesstaff
     *
     * @param \HandissimoBundle\Entity\Staff $typesstaff
     */
    public function removeTypesstaff(\HandissimoBundle\Entity\Staff $typesstaff)
    {
        $this->typesstaff->removeElement($typesstaff);
    }

    /**
     * Get typesstaff
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTypesstaff()
    {
        return $this->typesstaff;
    }
}
