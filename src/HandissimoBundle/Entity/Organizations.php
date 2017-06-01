<?php

namespace HandissimoBundle\Entity;

use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Organizations
 */
class Organizations
{
    public function __toString()
    {
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
    private $address;

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
    private $freeplace;

    /**
     * @var string
     */
    private $organizationDescription;

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
    private $profilPicture;


    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $disabilityTypes;



    /**
     * @var float
     */
    private $latitude;

    /**
     * @var float
     */
    private $longitude;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->disabilityTypes = new ArrayCollection();
        $this->stafforganizations = new ArrayCollection();
        $this->media = new ArrayCollection();
        $this->needs = new ArrayCollection();
        $this->updateDatetime = new \DateTime();
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
     * Set address
     *
     * @param string $address
     *
     * @return Organizations
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
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
     * Set PhoneNumber
     *
     * @param string $PhoneNumber
     *
     * @return Organizations
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get PhoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
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
     * @var integer
     */
    private $agemini;

    /**
     * @var integer
     */
    private $agemaxi;


    /**
     * Set agemini
     *
     * @param integer $agemini
     *
     * @return Organizations
     */
    public function setAgemini($agemini)
    {
        $this->agemini = $agemini;

        return $this;
    }

    /**
     * Get agemini
     *
     * @return integer
     */
    public function getAgemini()
    {
        return $this->agemini;
    }

    /**
     * Set agemaxi
     *
     * @param integer $agemaxi
     *
     * @return Organizations
     */
    public function setAgemaxi($agemaxi)
    {
        $this->agemaxi = $agemaxi;

        return $this;
    }

    /**
     * Get agemaxi
     *
     * @return integer
     */
    public function getAgemaxi()
    {
        return $this->agemaxi;
    }

    /**
     * @var string
     */
    private $directorName;

    /**
     * @var string
     */
    private $accomodation;

    /**
     * @var string
     */
    private $accomodationDescription;

    /**
     * Set directorName
     *
     * @param string $directorName
     *
     * @return Organizations
     */
    public function setDirectorName($directorName)
    {
        $this->directorName = $directorName;

        return $this;
    }

    /**
     * Get directorName
     *
     * @return string
     */
    public function getDirectorName()
    {
        return $this->directorName;
    }

    /**
     * Set accomodation
     *
     * @param string $accomodation
     *
     * @return Organizations
     */
    public function setAccomodation($accomodation)
    {
        $this->accomodation = $accomodation;

        return $this;
    }

    /**
     * Get accomodation
     *
     * @return string
     */
    public function getAccomodation()
    {
        return $this->accomodation;
    }

    /**
     * Set accomodationDescription
     *
     * @param string $accomodationDescription
     *
     * @return Organizations
     */
    public function setAccomodationDescription($accomodationDescription)
    {
        $this->accomodationDescription = $accomodationDescription;

        return $this;
    }

    /**
     * Get accomodationDescription
     *
     * @return string
     */
    public function getAccomodationDescription()
    {
        return $this->accomodationDescription;
    }

    /**
     * @var string
     */
    private $user;


    /**
     * Set user
     *
     * @param string $user
     *
     * @return Organizations
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * @var string
     */
    private $userType;


    /**
     * Set userType
     *
     * @param string $userType
     *
     * @return Organizations
     */
    public function setUserType($userType)
    {
        $this->userType = $userType;

        return $this;
    }

    /**
     * Get userType
     *
     * @return string
     */
    public function getUserType()
    {
        return $this->userType;
    }

    /**
     * @var boolean
     */
    private $statut;


    /**
     * Set statut
     *
     * @param boolean $statut
     *
     * @return Organizations
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return boolean
     */
    public function getStatut()
    {
        return $this->statut;
    }
    /**
     * @var boolean
     */
    private $replay;


    /**
     * Set replay
     *
     * @param boolean $replay
     *
     * @return Organizations
     */
    public function setReplay($replay)
    {
        $this->replay = $replay;

        return $this;
    }

    /**
     * Get replay
     *
     * @return boolean
     */
    public function getReplay()
    {
        return $this->replay;
    }
    /**
     * @var string
     */
    private $addressComplement;


    /**
     * Set addressComplement
     *
     * @param string $addressComplement
     *
     * @return Organizations
     */
    public function setAddressComplement($addressComplement)
    {
        $this->addressComplement = $addressComplement;

        return $this;
    }

    /**
     * Get addressComplement
     *
     * @return string
     */
    public function getAddressComplement()
    {
        return $this->addressComplement;
    }

    /**
     * Get reset value statut when organizations is edit
     *
     */
    public function resetStatut()
    {
        return $this->setStatut(0);
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $comments;


    /**
     * Add comment
     *
     * @param \HandissimoBundle\Entity\Comment $comment
     *
     * @return Organizations
     */
    public function addComment(\HandissimoBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \HandissimoBundle\Entity\Comment $comment
     */
    public function removeComment(\HandissimoBundle\Entity\Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }
    /**
     * @var string
     */
    private $dayDescription;

    /**
     * @var string
     */
    private $transport;

    /**
     * @var string
     */
    private $receptionDescription;

    /**
     * @var string
     */
    private $cost;

    /**
     * @var string
     */
    private $inscription;


    /**
     * Set dayDescription
     *
     * @param string $dayDescription
     *
     * @return Organizations
     */
    public function setDayDescription($dayDescription)
    {
        $this->dayDescription = $dayDescription;

        return $this;
    }

    /**
     * Get dayDescription
     *
     * @return string
     */
    public function getDayDescription()
    {
        return $this->dayDescription;
    }

    /**
     * Set transport
     *
     * @param string $transport
     *
     * @return Organizations
     */
    public function setTransport($transport)
    {
        $this->transport = $transport;

        return $this;
    }

    /**
     * Get transport
     *
     * @return string
     */
    public function getTransport()
    {
        return $this->transport;
    }

    /**
     * Set receptionDescription
     *
     * @param string $receptionDescription
     *
     * @return Organizations
     */
    public function setReceptionDescription($receptionDescription)
    {
        $this->receptionDescription = $receptionDescription;

        return $this;
    }

    /**
     * Get receptionDescription
     *
     * @return string
     */
    public function getReceptionDescription()
    {
        return $this->receptionDescription;
    }

    /**
     * Set cost
     *
     * @param string $cost
     *
     * @return Organizations
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return string
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set inscription
     *
     * @param string $inscription
     *
     * @return Organizations
     */
    public function setInscription($inscription)
    {
        $this->inscription = $inscription;

        return $this;
    }

    /**
     * Get inscription
     *
     * @return string
     */
    public function getInscription()
    {
        return $this->inscription;
    }
    /**
     * @var string
     */
    private $interventionZone;


    /**
     * Set interventionZone
     *
     * @param string $interventionZone
     *
     * @return Organizations
     */
    public function setInterventionZone($interventionZone)
    {
        $this->interventionZone = $interventionZone;

        return $this;
    }

    /**
     * Get interventionZone
     *
     * @return string
     */
    public function getInterventionZone()
    {
        return $this->interventionZone;
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $socialstaffs;


    /**
     * Add socialstaff
     *
     * @param \HandissimoBundle\Entity\SocialStaff $socialstaff
     *
     * @return Organizations
     */
    public function addSocialstaff(\HandissimoBundle\Entity\SocialStaff $socialstaff)
    {
        $this->socialstaffs[] = $socialstaff;

        return $this;
    }

    /**
     * Remove socialstaff
     *
     * @param \HandissimoBundle\Entity\SocialStaff $socialstaff
     */
    public function removeSocialstaff(\HandissimoBundle\Entity\SocialStaff $socialstaff)
    {
        $this->socialstaffs->removeElement($socialstaff);
    }

    /**
     * Get socialstaffs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSocialstaffs()
    {
        return $this->socialstaffs;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $secondneeds;


    /**
     * Add secondneed
     *
     * @param \HandissimoBundle\Entity\SecondaryNeeds $secondneed
     *
     * @return Organizations
     */
    public function addSecondneed(\HandissimoBundle\Entity\SecondaryNeeds $secondneed)
    {
        $this->secondneeds[] = $secondneed;

        return $this;
    }

    /**
     * Remove secondneed
     *
     * @param \HandissimoBundle\Entity\SecondaryNeeds $secondneed
     */
    public function removeSecondneed(\HandissimoBundle\Entity\SecondaryNeeds $secondneed)
    {
        $this->secondneeds->removeElement($secondneed);
    }

    /**
     * Get secondneeds
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSecondneeds()
    {
        return $this->secondneeds;
    }
    /**
     * @var string
     */
    private $opendaysYear;


    /**
     * Set opendaysYear
     *
     * @param string $opendaysYear
     *
     * @return Organizations
     */
    public function setOpendaysYear($opendaysYear)
    {
        $this->opendaysYear = $opendaysYear;

        return $this;
    }

    /**
     * Get opendaysYear
     *
     * @return string
     */
    public function getOpendaysYear()
    {
        return $this->opendaysYear;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $otherjobs;


    /**
     * Add otherjob
     *
     * @param \HandissimoBundle\Entity\OtherJob $otherjob
     *
     * @return Organizations
     */
    public function addOtherjob(\HandissimoBundle\Entity\OtherJob $otherjob)
    {
        $this->otherjobs[] = $otherjob;

        return $this;
    }

    /**
     * Remove otherjob
     *
     * @param \HandissimoBundle\Entity\OtherJob $otherjob
     */
    public function removeOtherjob(\HandissimoBundle\Entity\OtherJob $otherjob)
    {
        $this->otherjobs->removeElement($otherjob);
    }

    /**
     * Get otherjobs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOtherjobs()
    {
        return $this->otherjobs;
    }
    /**
     * @var string
     */
    private $commentStaff;


    /**
     * Set commentStaff
     *
     * @param string $commentStaff
     *
     * @return Organizations
     */
    public function setCommentStaff($commentStaff)
    {
        $this->commentStaff = $commentStaff;

        return $this;
    }

    /**
     * Get commentStaff
     *
     * @return string
     */
    public function getCommentStaff()
    {
        return $this->commentStaff;
    }

    /**
     * @var string
     */
    private $society;


    /**
     * Set society
     *
     * @param string $society
     *
     * @return Organizations
     */
    public function setSociety($society)
    {
        $this->society = $society;

        return $this;
    }

    /**
     * Get society
     *
     * @return string
     */
    public function getSociety()
    {
        return $this->society;
    }

    /**
     * @var \HandissimoBundle\Entity\StructuresList
     */
    private $orgaStructure;


    /**
     * Set orgaStructure
     *
     * @param \HandissimoBundle\Entity\StructuresList $orgaStructure
     *
     * @return Organizations
     */
    public function setOrgaStructure(\HandissimoBundle\Entity\StructuresList $orgaStructure = null)
    {
        $this->orgaStructure = $orgaStructure;

        return $this;
    }

    /**
     * Get orgaStructure
     *
     * @return \HandissimoBundle\Entity\StructuresList
     */
    public function getOrgaStructure()
    {
        return $this->orgaStructure;
    }

    /**
     * @var string
     */
    private $structureLogo;

    /**
     * @var string
     */
    private $societyLogo;


    /**
     * Set structureLogo
     *
     * @param string $structureLogo
     *
     * @return Organizations
     */
    public function setStructureLogo($structureLogo)
    {
        $this->structureLogo = $structureLogo;

        return $this;
    }

    /**
     * Get structureLogo
     *
     * @return string
     */
    public function getStructureLogo()
    {
        return $this->structureLogo;
    }

    /**
     * Set societyLogo
     *
     * @param string $societyLogo
     *
     * @return Organizations
     */
    public function setSocietyLogo($societyLogo)
    {
        $this->societyLogo = $societyLogo;

        return $this;
    }

    /**
     * Get societyLogo
     *
     * @return string
     */
    public function getSocietyLogo()
    {
        return $this->societyLogo;
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $media;


    /**
     * Add medium
     *
     * @param \HandissimoBundle\Entity\Media $media
     *
     * @return Organizations
     */
    public function addMedium(\HandissimoBundle\Entity\Media $medium)
    {
        $this->media[] = $medium;
        $medium->setOrganizationsImg($this);

        return $this;
    }

    /**
     * Remove medium
     *
     * @param \HandissimoBundle\Entity\Media $medium
     */
    public function removeMedium(\HandissimoBundle\Entity\Media $medium)
    {
        $this->media->removeElement($medium);
    }

    /**
     * Get media
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMedia()
    {
        return $this->media;
    }



    /**
     * @var boolean
     */
    private $orientationMdph;

    /**
     * @var string
     */
    private $freeDescription;


    /**
     * Set orientationMdph
     *
     * @param boolean $orientationMdph
     *
     * @return Organizations
     */
    public function setOrientationMdph($orientationMdph)
    {
        $this->orientationMdph = $orientationMdph;

        return $this;
    }

    /**
     * Get orientationMdph
     *
     * @return boolean
     */
    public function getOrientationMdph()
    {
        return $this->orientationMdph;
    }

    /**
     * Set freeDescription
     *
     * @param string $freeDescription
     *
     * @return Organizations
     */
    public function setFreeDescription($freeDescription)
    {
        $this->freeDescription = $freeDescription;

        return $this;
    }

    /**
     * Get freeDescription
     *
     * @return string
     */
    public function getFreeDescription()
    {
        return $this->freeDescription;
    }

    /**
     * Add medium
     *
     * @param \HandissimoBundle\Entity\Media $medium
     *
     * @return Organizations
     */
    public function addMedia(\HandissimoBundle\Entity\Media $medium)
    {
        $this->media[] = $medium;

        return $this;
    }

    /**
     * Remove medium
     *
     * @param \HandissimoBundle\Entity\Media $medium
     */
    public function removeMedia(\HandissimoBundle\Entity\Media $medium)
    {
        $this->media->removeElement($medium);
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $needs;


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
     * @var string
     */
    private $brochureName;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * Set brochureName
     *
     * @param string $brochureName
     *
     * @return Organizations
     */
    public function setBrochureName($brochureName)
    {
        $this->brochureName = $brochureName;

        return $this;
    }

    /**
     * Get brochureName
     *
     * @return string
     */
    public function getBrochureName()
    {
        return $this->brochureName;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Organizations
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    private $brochureFile;

    public function setBrochureFile(File $brochure=null)
    {
        $this->brochureFile = $brochure;
        if ($brochure){
            $this->updatedAt = new \DateTimeImmutable();
        }
        return $this;
    }

    public function getBrochureFile()
    {
        return $this->brochureFile;
    }
    /**
     * @var \DateTime
     */
    private $societyLogoUpdatedAt;

    /**
     * Set societyLogoUpdatedAt
     *
     * @param \DateTime $societyLogoUpdatedAt
     *
     * @return Organizations
     */
    public function setSocietyLogoUpdatedAt($societyLogoUpdatedAt)
    {
        $this->societyLogoUpdatedAt = $societyLogoUpdatedAt;

        return $this;
    }

    /**
     * Get societyLogoUpdatedAt
     *
     * @return \DateTime
     */
    public function getSocietyLogoUpdatedAt()
    {
        return $this->societyLogoUpdatedAt;
    }

    private $societyLogoFile;

    public function setSocietyLogoFile(File $societyLogoFile=null)
    {
        $this->societyLogoFile = $societyLogoFile;
        if ($societyLogoFile){
            $this->societyLogoUpdatedAt = new \DateTimeImmutable();
        }
        return $this;
    }

    public function getSocietyLogoFile()
    {
        return $this->societyLogoFile;
    }
    /**
     * @var \DateTime
     */
    private $structureLogoUpdatedAt;


    /**
     * Set structureLogoUpdatedAt
     *
     * @param \DateTime $structureLogoUpdatedAt
     *
     * @return Organizations
     */
    public function setStructureLogoUpdatedAt($structureLogoUpdatedAt)
    {
        $this->structureLogoUpdatedAt = $structureLogoUpdatedAt;

        return $this;
    }

    /**
     * Get structureLogoUpdatedAt
     *
     * @return \DateTime
     */
    public function getStructureLogoUpdatedAt()
    {
        return $this->structureLogoUpdatedAt;
    }

    private $structureLogoFile;

    public function setStructureLogoFile(File $structureLogoFile=null)
    {
        $this->structureLogoFile = $structureLogoFile;
        if ($structureLogoFile){
            $this->structureLogoUpdatedAt = new \DateTimeImmutable();
        }
        return $this;
    }

    public function getStructureLogoFile()
    {
        return $this->structureLogoFile;
    }

    private $firstPicture;

    private $firstPictureFile;

    private $firstPictureUpdateAt;

    public function getFirstPicture()
    {
        return $this->firstPicture;
    }

    public function setFirstPicture($firstPicture)
    {
        $this->firstPicture = $firstPicture;

        return $this;
    }
    public function setFirstPictureFile(File $firstPictureFile=null)
    {
        $this->firstPictureFile = $firstPictureFile;
        if($firstPictureFile) {
            $this->firstPictureUpdateAt = new \DateTimeImmutable();
        }
        return $this;
    }

    public function getFirstPictureFile()
    {
        return $this->firstPictureFile;
    }

    /**
     * Set firstPictureUpdatedAt
     *
     * @param \DateTime $firstPictureUpdatedAt
     *
     * @return Organizations
     */
    public function setFirstPictureUpdatedAt($firstPictureUpdatedAt)
    {
        $this->firstPictureUpdateAt = $firstPictureUpdatedAt;

        return $this;
    }

    /**
     * Get firstPictureUpdatedAt
     *
     * @return \DateTime
     */
    public function getFirstPictureUpdatedAt()
    {
        return $this->firstPictureUpdateAt;
    }
    /**
     * @var array
     */
    private $disabilities;

    /**
     * @var array
     */
    private $primaryNeeds;

    /**
     * @var array
     */
    private $secondaryNeeds;

    /**
     * @var array
     */
    private $medicalJob;

    /**
     * @var array
     */
    private $socialJob;

    /**
     * @var array
     */
    private $communJob;


    /**
     * Set firstPictureUpdateAt
     *
     * @param \DateTime $firstPictureUpdateAt
     *
     * @return Organizations
     */
    public function setFirstPictureUpdateAt($firstPictureUpdateAt)
    {
        $this->firstPictureUpdateAt = $firstPictureUpdateAt;

        return $this;
    }

    /**
     * Get firstPictureUpdateAt
     *
     * @return \DateTime
     */
    public function getFirstPictureUpdateAt()
    {
        return $this->firstPictureUpdateAt;
    }

    /**
     * Set disabilities
     *
     * @param array $disabilities
     *
     * @return Organizations
     */
    public function setDisabilities($disabilities)
    {
        $this->disabilities = $disabilities;

        return $this;
    }

    /**
     * Get disabilities
     *
     * @return array
     */
    public function getDisabilities()
    {
        return $this->disabilities;
    }

    /**
     * Set primaryNeeds
     *
     * @param array $primaryNeeds
     *
     * @return Organizations
     */
    public function setPrimaryNeeds($primaryNeeds)
    {
        $this->primaryNeeds = $primaryNeeds;

        return $this;
    }

    /**
     * Get primaryNeeds
     *
     * @return array
     */
    public function getPrimaryNeeds()
    {
        return $this->primaryNeeds;
    }

    /**
     * Set secondaryNeeds
     *
     * @param array $secondaryNeeds
     *
     * @return Organizations
     */
    public function setSecondaryNeeds($secondaryNeeds)
    {
        $this->secondaryNeeds = $secondaryNeeds;

        return $this;
    }

    /**
     * Get secondaryNeeds
     *
     * @return array
     */
    public function getSecondaryNeeds()
    {
        return $this->secondaryNeeds;
    }

    /**
     * Set medicalJob
     *
     * @param array $medicalJob
     *
     * @return Organizations
     */
    public function setMedicalJob($medicalJob)
    {
        $this->medicalJob = $medicalJob;

        return $this;
    }

    /**
     * Get medicalJob
     *
     * @return array
     */
    public function getMedicalJob()
    {
        return $this->medicalJob;
    }

    /**
     * Set socialJob
     *
     * @param array $socialJob
     *
     * @return Organizations
     */
    public function setSocialJob($socialJob)
    {
        $this->socialJob = $socialJob;

        return $this;
    }

    /**
     * Get socialJob
     *
     * @return array
     */
    public function getSocialJob()
    {
        return $this->socialJob;
    }

    /**
     * Set communJob
     *
     * @param array $communJob
     *
     * @return Organizations
     */
    public function setCommunJob($communJob)
    {
        $this->communJob = $communJob;

        return $this;
    }

    /**
     * Get communJob
     *
     * @return array
     */
    public function getCommunJob()
    {
        return $this->communJob;
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $userOrg;


    /**
     * Add userOrg
     *
     * @param \Application\Sonata\UserBundle\Entity\User $userOrg
     *
     * @return Organizations
     */
    public function addUserOrg(\Application\Sonata\UserBundle\Entity\User $userOrg)
    {
        $this->userOrg[] = $userOrg;

        return $this;
    }

    /**
     * Remove userOrg
     *
     * @param \Application\Sonata\UserBundle\Entity\User $userOrg
     */
    public function removeUserOrg(\Application\Sonata\UserBundle\Entity\User $userOrg)
    {
        $this->userOrg->removeElement($userOrg);
    }

    /**
     * Get userOrg
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserOrg()
    {
        return $this->userOrg;
    }
}
