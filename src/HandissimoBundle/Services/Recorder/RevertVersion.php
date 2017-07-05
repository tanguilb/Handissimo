<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 12/06/17
 * Time: 12:19
 */

namespace HandissimoBundle\Services\Recorder;


use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

class RevertVersion
{
    protected $em;
    protected $container;

    public function __construct(EntityManager $em, ContainerInterface $container)
    {
        $this->em = $em;
        $this->container = $container;
    }

    public function revertOldVersion($entity, $var)
    {
        if (array_key_exists('name', $var) == true) {
            $entity->setName($var['name']);
        }
        if (array_key_exists('address', $var) == true) {
            $entity->setAddress($var['address']);
        }
        if (array_key_exists('adressComplement', $var) == true) {
            $entity->setAddressComplement($var['adressComplement']);
        }
        if (array_key_exists('postal', $var) == true) {
            $entity->setPostal($var['postal']);
        }
        if (array_key_exists('city', $var) == true) {
            $entity->setCity($var['city']);
        }
        if (array_key_exists('phoneNumber', $var) == true) {
            $entity->setPhoneNumber($var['phoneNumber']);
        }
        if (array_key_exists('mail', $var) == true) {
            $entity->setMail($var['mail']);
        }
        if (array_key_exists('website', $var) == true) {
            $entity->setWebsite($var['website']);
        }
        if (array_key_exists('facebook', $var) == true) {
            $entity->setFacebook($var['facebook']);
        }
        if (array_key_exists('agemini', $var) == true) {
            $entity->setAgemini($var['agemini']);
        }
        if (array_key_exists('agemaxi', $var) == true) {
            $entity->setAgemaxi($var['agemaxi']);
        }
        if (array_key_exists('freeplace', $var) == true) {
            $entity->setFreeplace($var['freeplace']);
        }
        if (array_key_exists('organizationDescription', $var) == true) {
            $entity->setOrganizationDescription($var['organizationDescription']);
        }
        if (array_key_exists('openhours', $var) == true) {
            $entity->setOpenhours($var['openhours']);
        }
        if (array_key_exists('opendays', $var) == true) {
            $entity->setOpendays($var['opendays']);
        }
        if (array_key_exists('opendaysYear', $var) == true) {
            $entity->setOpendaysYear($var['opendaysYear']);
        }
        if (array_key_exists('teamMembersNumber', $var) == true) {
            $entity->setTeamMembersNumber($var['teamMembersNumber']);
        }
        if (array_key_exists('workingDescription', $var) == true) {
            $entity->setWorkingDescription($var['workingDescription']);
        }
        if (array_key_exists('school', $var) == true) {
            $entity->setSchool($var['school']);
        }
        if (array_key_exists('schoolDescription', $var) == true) {
            $entity->setSchoolDescription($var['schoolDescription']);
        }
        if (array_key_exists('directorName', $var) == true) {
            $entity->setDirectorName($var['directorName']);
        }
        if (array_key_exists('dayDescription', $var) == true) {
            $entity->setDayDescription($var['dayDescription']);
        }
        if (array_key_exists('transport', $var) == true) {
            $entity->setTransport($var['transport']);
        }
        if (array_key_exists('receptionDescription', $var) == true) {
            $entity->setReceptionDescription($var['receptionDescription']);
        }
        if (array_key_exists('cost', $var) == true) {
            $entity->setCost($var['cost']);
        }
        if (array_key_exists('inscription', $var) == true) {
            $entity->setInscription($var['inscription']);
        }
        if (array_key_exists('user', $var) == true) {
            if (!$this->container->get('security.authorization_checker')->isGranted('ROLE_ADMIN') || !$this->container->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN')){
                $entity->setUser($var['user']);
            }
        }
        if (array_key_exists('commentStaff', $var) == true) {
            $entity->setCommentStaff($var['commentStaff']);
        }
        if (array_key_exists('userType', $var) == true) {
            $entity->setUserType($var['userType']);
        }
        if (array_key_exists('interventionZone', $var) == true) {
            $entity->setInterventionZone($var['interventionZone']);
        }
        if (array_key_exists('society', $var) == true) {
            $entity->setSociety($var['society']);
        }
        if (array_key_exists('orientationMdph', $var) == true) {
            $entity->setOrientationMdph($var['orientationMdph']);
        }
        if (array_key_exists('freeDescription', $var) == true) {
            $entity->setFreeDescription($var['freeDescription']);
        }
        if (array_key_exists('oldDisabilities', $var) == true) {
            $diff = array_diff_assoc($var['oldDisabilities'], $var['newDisabilities']);
            foreach ($diff as $value) {
                $entity->setDisabilities($var['oldDisabilities']);
                $entity->addDisabilityType($this->em->getReference('HandissimoBundle:Disabilitytypes', $value));
            }
        }
        if (array_key_exists('newDisabilities', $var) == true) {
            $diff = array_diff_assoc($var['newDisabilities'], $var['oldDisabilities']);
            foreach ($diff as $value) {
                $entity->setDisabilities($var['oldDisabilities']);
                $entity->removeDisabilityType($this->em->getReference('HandissimoBundle:Disabilitytypes', $value));
            }
        }
        if (array_key_exists('oldPrimaryNeeds', $var) == true) {
            $diff = array_diff_assoc($var['oldPrimaryNeeds'], $var['newPrimaryNeeds']);
            foreach ($diff as $value) {
                $entity->setPrimaryNeeds($var['oldPrimaryNeeds']);
                $entity->addNeed($this->em->getReference('HandissimoBundle:Needs', $value));
            }
        }
        if (array_key_exists('newPrimaryNeeds', $var) == true) {
            $diff = array_diff_assoc($var['newPrimaryNeeds'], $var['oldPrimaryNeeds']);
            foreach ($diff as $value) {
                $entity->setPrimaryNeeds($var['oldPrimaryNeeds']);
                $entity->removeNeed($this->em->getReference('HandissimoBundle:Needs', $value));
            }
        }
        if (array_key_exists('oldSecondaryNeeds', $var) == true) {
            $diff = array_diff_assoc($var['oldSecondaryNeeds'], $var['newSecondaryNeeds']);
            foreach ($diff as $value) {
                $entity->setSecondaryNeeds($var['oldSecondaryNeeds']);
                $entity->addSecondneed($this->em->getReference('HandissimoBundle:SecondaryNeeds', $value));
            }
        }
        if (array_key_exists('newSecondaryNeeds', $var) == true) {
            $diff = array_diff_assoc($var['newSecondaryNeeds'], $var['oldSecondaryNeeds']);
            foreach ($diff as $value) {
                $entity->setSecondaryNeeds($var['oldSecondaryNeeds']);
                $entity->removeSecondneed($this->em->getReference('HandissimoBundle:SecondaryNeeds', $value));
            }
        }
        if (array_key_exists('oldMedicalJob', $var) == true) {
            $diff = array_diff_assoc($var['oldMedicalJob'], $var['newMedicalJob']);
            foreach ($diff as $value) {
                $entity->setMedicalJob($var['oldMedicalJob']);
                $entity->addStafforganization($this->em->getReference('HandissimoBundle:Staff', $value));
            }
        }
        if (array_key_exists('newMedicalJob', $var) == true) {
            $diff = array_diff_assoc($var['newMedicalJob'], $var['oldMedicalJob']);
            foreach ($diff as $value) {
                $entity->setMedicalJob($var['oldMedicalJob']);
                $entity->removeStafforganization($this->em->getReference('HandissimoBundle:Staff', $value));
            }
        }
        if (array_key_exists('oldSocialJob', $var) == true) {
            $diff = array_diff_assoc($var['oldSocialJob'], $var['newSocialJob']);
            foreach ($diff as $value) {
                $entity->setSocialJob($var['oldSocialJob']);
                $entity->addSocialstaff($this->em->getReference('HandissimoBundle:SocialStaff', $value));
            }
        }
        if (array_key_exists('newSocialJob', $var) == true) {
            $diff = array_diff_assoc($var['newSocialJob'], $var['oldSocialJob']);
            foreach ($diff as $value) {
                $entity->setSocialJob($var['oldSocialJob']);
                $entity->removeSocialstaff($this->em->getReference('HandissimoBundle:SocialStaff', $value));
            }
        }
        if (array_key_exists('oldCommunJob', $var) == true) {
            $diff = array_diff_assoc($var['oldCommunJob'], $var['newCommunJob']);
            foreach ($diff as $value) {
                $entity->setCommunJob($var['oldCommunJob']);
                $entity->addOtherjob($this->em->getReference('HandissimoBundle:OtherJob', $value));
            }
        }
        if (array_key_exists('newCommunJob', $var) == true) {
            $diff = array_diff_assoc($var['newCommunJob'], $var['oldCommunJob']);
            foreach ($diff as $value) {
                $entity->setCommunJob($var['oldCommunJob']);
                $entity->removeOtherjob($this->em->getReference('HandissimoBundle:OtherJob', $value));
            }
        }

        $entity->setUpdateDatetime(new \DateTime());
        $entity->setChecked(1);
        $this->em->persist($entity);
        $this->em->flush();
    }
}