<?php

namespace HandissimoBundle\Entity;

/**
 * Organizations
 */
class Organizations
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $organizationName;

    /**
     * @var string
     */
    private $adress;

    /**
     * @var string
     */
    private $postal;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $organizationPhoneNumber;

    /**
     * @var string
     */
    private $organizationMail;

    /**
     * @var string
     */
    private $organizationWebsite;

    /**
     * @var string
     */
    private $organizationBlog;

    /**
     * @var string
     */
    private $organizationFacebook;

    /**
     * @var string
     */
    private $organizationTwitter;

    /**
     * @var string
     */
    private $agegroup;

    /**
     * @var string
     */
    private $freeplace;

    /**
     * @var string
     */
    private $organizationDescription;

    /**
     * @var string
     */
    private $serveDescription;

    /**
     * @var string
     */
    private $openhours;

    /**
     * @var string
     */
    private $opendays;

    /**
     * @var integer
     */
    private $teamMembersNumber;

    /**
     * @var string
     */
    private $teamDescription;

    /**
     * @var \DateTime
     */
    private $updateDatetime;

    /**
     * @var string
     */
    private $workingDescription;

    /**
     * @var boolean
     */
    private $school;

    /**
     * @var string
     */
    private $schoolDescription;

    /**
     * @var string
     */
    private $activities;

    /**
     * @var string
     */
    private $placeDescription;

    /**
     * @var string
     */
    private $doc;

    /**
     * @var string
     */
    private $profilPicture;

    /**
     * @var \HandissimoBundle\Entity\Pictures
     */
    private $pictures;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $disabilityTypes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $needs;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $staff;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->disabilityTypes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->needs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->staff = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Organizations
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
     * Set organizationName
     *
     * @param string $organizationName
     *
     * @return Organizations
     */
    public function setOrganizationName($organizationName)
    {
        $this->organizationName = $organizationName;

        return $this;
    }

    /**
     * Get organizationName
     *
     * @return string
     */
    public function getOrganizationName()
    {
        return $this->organizationName;
    }

    /**
     * Set adress
     *
     * @param string $adress
     *
     * @return Organizations
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get adress
     *
     * @return string
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set postal
     *
     * @param string $postal
     *
     * @return Organizations
     */
    public function setPostal($postal)
    {
        $this->postal = $postal;

        return $this;
    }

    /**
     * Get postal
     *
     * @return string
     */
    public function getPostal()
    {
        return $this->postal;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Organizations
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set organizationPhoneNumber
     *
     * @param string $organizationPhoneNumber
     *
     * @return Organizations
     */
    public function setOrganizationPhoneNumber($organizationPhoneNumber)
    {
        $this->organizationPhoneNumber = $organizationPhoneNumber;

        return $this;
    }

    /**
     * Get organizationPhoneNumber
     *
     * @return string
     */
    public function getOrganizationPhoneNumber()
    {
        return $this->organizationPhoneNumber;
    }

    /**
     * Set organizationMail
     *
     * @param string $organizationMail
     *
     * @return Organizations
     */
    public function setOrganizationMail($organizationMail)
    {
        $this->organizationMail = $organizationMail;

        return $this;
    }

    /**
     * Get organizationMail
     *
     * @return string
     */
    public function getOrganizationMail()
    {
        return $this->organizationMail;
    }

    /**
     * Set organizationWebsite
     *
     * @param string $organizationWebsite
     *
     * @return Organizations
     */
    public function setOrganizationWebsite($organizationWebsite)
    {
        $this->organizationWebsite = $organizationWebsite;

        return $this;
    }

    /**
     * Get organizationWebsite
     *
     * @return string
     */
    public function getOrganizationWebsite()
    {
        return $this->organizationWebsite;
    }

    /**
     * Set organizationBlog
     *
     * @param string $organizationBlog
     *
     * @return Organizations
     */
    public function setOrganizationBlog($organizationBlog)
    {
        $this->organizationBlog = $organizationBlog;

        return $this;
    }

    /**
     * Get organizationBlog
     *
     * @return string
     */
    public function getOrganizationBlog()
    {
        return $this->organizationBlog;
    }

    /**
     * Set organizationFacebook
     *
     * @param string $organizationFacebook
     *
     * @return Organizations
     */
    public function setOrganizationFacebook($organizationFacebook)
    {
        $this->organizationFacebook = $organizationFacebook;

        return $this;
    }

    /**
     * Get organizationFacebook
     *
     * @return string
     */
    public function getOrganizationFacebook()
    {
        return $this->organizationFacebook;
    }

    /**
     * Set organizationTwitter
     *
     * @param string $organizationTwitter
     *
     * @return Organizations
     */
    public function setOrganizationTwitter($organizationTwitter)
    {
        $this->organizationTwitter = $organizationTwitter;

        return $this;
    }

    /**
     * Get organizationTwitter
     *
     * @return string
     */
    public function getOrganizationTwitter()
    {
        return $this->organizationTwitter;
    }

    /**
     * Set agegroup
     *
     * @param string $agegroup
     *
     * @return Organizations
     */
    public function setAgegroup($agegroup)
    {
        $this->agegroup = $agegroup;

        return $this;
    }

    /**
     * Get agegroup
     *
     * @return string
     */
    public function getAgegroup()
    {
        return $this->agegroup;
    }

    /**
     * Set freeplace
     *
     * @param string $freeplace
     *
     * @return Organizations
     */
    public function setFreeplace($freeplace)
    {
        $this->freeplace = $freeplace;

        return $this;
    }

    /**
     * Get freeplace
     *
     * @return string
     */
    public function getFreeplace()
    {
        return $this->freeplace;
    }

    /**
     * Set organizationDescription
     *
     * @param string $organizationDescription
     *
     * @return Organizations
     */
    public function setOrganizationDescription($organizationDescription)
    {
        $this->organizationDescription = $organizationDescription;

        return $this;
    }

    /**
     * Get organizationDescription
     *
     * @return string
     */
    public function getOrganizationDescription()
    {
        return $this->organizationDescription;
    }

    /**
     * Set serveDescription
     *
     * @param string $serveDescription
     *
     * @return Organizations
     */
    public function setServeDescription($serveDescription)
    {
        $this->serveDescription = $serveDescription;

        return $this;
    }

    /**
     * Get serveDescription
     *
     * @return string
     */
    public function getServeDescription()
    {
        return $this->serveDescription;
    }

    /**
     * Set openhours
     *
     * @param string $openhours
     *
     * @return Organizations
     */
    public function setOpenhours($openhours)
    {
        $this->openhours = $openhours;

        return $this;
    }

    /**
     * Get openhours
     *
     * @return string
     */
    public function getOpenhours()
    {
        return $this->openhours;
    }

    /**
     * Set opendays
     *
     * @param string $opendays
     *
     * @return Organizations
     */
    public function setOpendays($opendays)
    {
        $this->opendays = $opendays;

        return $this;
    }

    /**
     * Get opendays
     *
     * @return string
     */
    public function getOpendays()
    {
        return $this->opendays;
    }

    /**
     * Set teamMembersNumber
     *
     * @param integer $teamMembersNumber
     *
     * @return Organizations
     */
    public function setTeamMembersNumber($teamMembersNumber)
    {
        $this->teamMembersNumber = $teamMembersNumber;

        return $this;
    }

    /**
     * Get teamMembersNumber
     *
     * @return integer
     */
    public function getTeamMembersNumber()
    {
        return $this->teamMembersNumber;
    }

    /**
     * Set teamDescription
     *
     * @param string $teamDescription
     *
     * @return Organizations
     */
    public function setTeamDescription($teamDescription)
    {
        $this->teamDescription = $teamDescription;

        return $this;
    }

    /**
     * Get teamDescription
     *
     * @return string
     */
    public function getTeamDescription()
    {
        return $this->teamDescription;
    }

    /**
     * Set updateDatetime
     *
     * @param \DateTime $updateDatetime
     *
     * @return Organizations
     */
    public function setUpdateDatetime($updateDatetime)
    {
        $this->updateDatetime = $updateDatetime;

        return $this;
    }

    /**
     * Get updateDatetime
     *
     * @return \DateTime
     */
    public function getUpdateDatetime()
    {
        return $this->updateDatetime;
    }

    /**
     * Set workingDescription
     *
     * @param string $workingDescription
     *
     * @return Organizations
     */
    public function setWorkingDescription($workingDescription)
    {
        $this->workingDescription = $workingDescription;

        return $this;
    }

    /**
     * Get workingDescription
     *
     * @return string
     */
    public function getWorkingDescription()
    {
        return $this->workingDescription;
    }

    /**
     * Set school
     *
     * @param boolean $school
     *
     * @return Organizations
     */
    public function setSchool($school)
    {
        $this->school = $school;

        return $this;
    }

    /**
     * Get school
     *
     * @return boolean
     */
    public function getSchool()
    {
        return $this->school;
    }

    /**
     * Set schoolDescription
     *
     * @param string $schoolDescription
     *
     * @return Organizations
     */
    public function setSchoolDescription($schoolDescription)
    {
        $this->schoolDescription = $schoolDescription;

        return $this;
    }

    /**
     * Get schoolDescription
     *
     * @return string
     */
    public function getSchoolDescription()
    {
        return $this->schoolDescription;
    }

    /**
     * Set activities
     *
     * @param string $activities
     *
     * @return Organizations
     */
    public function setActivities($activities)
    {
        $this->activities = $activities;

        return $this;
    }

    /**
     * Get activities
     *
     * @return string
     */
    public function getActivities()
    {
        return $this->activities;
    }

    /**
     * Set placeDescription
     *
     * @param string $placeDescription
     *
     * @return Organizations
     */
    public function setPlaceDescription($placeDescription)
    {
        $this->placeDescription = $placeDescription;

        return $this;
    }

    /**
     * Get placeDescription
     *
     * @return string
     */
    public function getPlaceDescription()
    {
        return $this->placeDescription;
    }

    /**
     * Set doc
     *
     * @param string $doc
     *
     * @return Organizations
     */
    public function setDoc($doc)
    {
        $this->doc = $doc;

        return $this;
    }

    /**
     * Get doc
     *
     * @return string
     */
    public function getDoc()
    {
        return $this->doc;
    }

    /**
     * Set profilPicture
     *
     * @param string $profilPicture
     *
     * @return Organizations
     */
    public function setProfilPicture($profilPicture)
    {
        $this->profilPicture = $profilPicture;

        return $this;
    }

    /**
     * Get profilPicture
     *
     * @return string
     */
    public function getProfilPicture()
    {
        return $this->profilPicture;
    }

    /**
     * Set pictures
     *
     * @param \HandissimoBundle\Entity\Pictures $pictures
     *
     * @return Organizations
     */
    public function setPictures(\HandissimoBundle\Entity\Pictures $pictures = null)
    {
        $this->pictures = $pictures;

        return $this;
    }

    /**
     * Get pictures
     *
     * @return \HandissimoBundle\Entity\Pictures
     */
    public function getPictures()
    {
        return $this->pictures;
    }

    /**
     * Add disabilityType
     *
     * @param \HandissimoBundle\Entity\DisabilityTypes $disabilityType
     *
     * @return Organizations
     */
    public function addDisabilityType(\HandissimoBundle\Entity\DisabilityTypes $disabilityType)
    {
        $this->disabilityTypes[] = $disabilityType;

        return $this;
    }

    /**
     * Remove disabilityType
     *
     * @param \HandissimoBundle\Entity\DisabilityTypes $disabilityType
     */
    public function removeDisabilityType(\HandissimoBundle\Entity\DisabilityTypes $disabilityType)
    {
        $this->disabilityTypes->removeElement($disabilityType);
    }

    /**
     * Get disabilityTypes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDisabilityTypes()
    {
        return $this->disabilityTypes;
    }

    /**
     * Add need
     *
     * @param \HandissimoBundle\Entity\Needs $need
     *
     * @return Organizations
     */
    public function addNeed(\HandissimoBundle\Entity\Needs $need)
    {
        $this->needs[] = $need;

        return $this;
    }

    /**
     * Remove need
     *
     * @param \HandissimoBundle\Entity\Needs $need
     */
    public function removeNeed(\HandissimoBundle\Entity\Needs $need)
    {
        $this->needs->removeElement($need);
    }

    /**
     * Get needs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNeeds()
    {
        return $this->needs;
    }

    /**
     * Add staff
     *
     * @param \HandissimoBundle\Entity\Staff $staff
     *
     * @return Organizations
     */
    public function addStaff(\HandissimoBundle\Entity\Staff $staff)
    {
        $this->staff[] = $staff;

        return $this;
    }

    /**
     * Remove staff
     *
     * @param \HandissimoBundle\Entity\Staff $staff
     */
    public function removeStaff(\HandissimoBundle\Entity\Staff $staff)
    {
        $this->staff->removeElement($staff);
    }

    /**
     * Get staff
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStaff()
    {
        return $this->staff;
    }
}

