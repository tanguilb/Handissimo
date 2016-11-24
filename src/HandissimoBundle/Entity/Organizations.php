<?php

namespace HandissimoBundle\Entity;

/**
 * Organizations
 */
class Organizations
{
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->name;
    }

    // GENERATE CODE
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

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
    private $phoneNumber;

    /**
     * @var string
     */
    private $mail;

    /**
     * @var string
     */
    private $website;

    /**
     * @var string
     */
    private $blog;

    /**
     * @var string
     */
    private $facebook;

    /**
     * @var string
     */
    private $twitter;

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

    /**
     * @var \HandissimoBundle\Entity\StructuresTypes
     */
    private $structuretype;

    /**
     * @var \HandissimoBundle\Entity\Pictures
     */
    private $picture;

    /**
     * @var \HandissimoBundle\Entity\Society
     */
    private $societies;


    /**
     * Set structuretype
     *
     * @param \HandissimoBundle\Entity\StructuresTypes $structuretype
     *
     * @return Organizations
     */
    public function setStructuretype(\HandissimoBundle\Entity\StructuresTypes $structuretype = null)
    {
        $this->structuretype = $structuretype;

        return $this;
    }

    /**
     * Get structuretype
     *
     * @return \HandissimoBundle\Entity\StructuresTypes
     */
    public function getStructuretype()
    {
        return $this->structuretype;
    }

    /**
     * Set picture
     *
     * @param \HandissimoBundle\Entity\Pictures $picture
     *
     * @return Organizations
     */
    public function setPicture(\HandissimoBundle\Entity\Pictures $picture = null)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return \HandissimoBundle\Entity\Pictures
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set societies
     *
     * @param \HandissimoBundle\Entity\Society $societies
     *
     * @return Organizations
     */
    public function setSocieties(\HandissimoBundle\Entity\Society $societies = null)
    {
        $this->societies = $societies;

        return $this;
    }

    /**
     * Get societies
     *
     * @return \HandissimoBundle\Entity\Society
     */
    public function getSocieties()
    {
        return $this->societies;
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $stafforganizations;


    /**
     * Add stafforganization
     *
     * @param \HandissimoBundle\Entity\Staff $stafforganization
     *
     * @return Organizations
     */
    public function addStafforganization(\HandissimoBundle\Entity\Staff $stafforganization)
    {
        $this->stafforganizations[] = $stafforganization;

        return $this;
    }

    /**
     * Remove stafforganization
     *
     * @param \HandissimoBundle\Entity\Staff $stafforganization
     */
    public function removeStafforganization(\HandissimoBundle\Entity\Staff $stafforganization)
    {
        $this->stafforganizations->removeElement($stafforganization);
    }

    /**
     * Get stafforganizations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStafforganizations()
    {
        return $this->stafforganizations;
    }
    /**
     * @var float
     */
    private $latitude;

    /**
     * @var float
     */
    private $longitude;


    /**
     * Set latitude
     *
     * @param float $latitude
     *
     * @return Organizations
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     *
     * @return Organizations
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Organizations
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
     * Set mail
     *
     * @param string $mail
     *
     * @return Organizations
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set website
     *
     * @param string $website
     *
     * @return Organizations
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set blog
     *
     * @param string $blog
     *
     * @return Organizations
     */
    public function setBlog($blog)
    {
        $this->blog = $blog;

        return $this;
    }

    /**
     * Get blog
     *
     * @return string
     */
    public function getBlog()
    {
        return $this->blog;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     *
     * @return Organizations
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get facebook
     *
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     *
     * @return Organizations
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Get twitter
     *
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return Organizations
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
}