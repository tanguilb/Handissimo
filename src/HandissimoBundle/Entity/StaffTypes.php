<?php

namespace HandissimoBundle\Entity;

/**
 * StaffTypes
 */
class StaffTypes
{
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
}

