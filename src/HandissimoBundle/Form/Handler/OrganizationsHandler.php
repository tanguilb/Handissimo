<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 01/06/17
 * Time: 13:32
 */

namespace HandissimoBundle\Form\Handler;


use Application\Sonata\UserBundle\Entity\User;
use Doctrine\ORM\EntityManager;
use HandissimoBundle\Entity\Organizations;
use HandissimoBundle\Entity\Participation;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

class OrganizationsHandler
{
    protected $form;
    protected $request;
    protected $em;
    protected $container;
    protected $organization;
    protected $version;

    public function __construct(Form $form, Request $request, EntityManager $em, ContainerInterface $container, Organizations $organization)
    {
        $this->form             = $form;
        $this->request          = $request;
        $this->em               = $em;
        $this->container        = $container;
        $this->organization     = $organization;
    }

    public function process()
    {
        $this->form->handleRequest($this->request);
        if ($this->request->isMethod('post')) {
            if ($this->form->isValid()){
                $this->onSuccess();
                return true;
            }
            return false;
        }
        return false;
    }

    public function onSuccess()
    {
        if (!$this->container->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN'))
        {
            $this->organization->setUser($this->container->get('security.token_storage')->getToken()->getUser());
            $this->organization->setUserType($this->container->get('security.token_storage')->getToken()->getUser()->getUserType());
        }
        $lastDate = $this->container->get('security.token_storage')->getToken()->getUser()->getLastDate();
        $participation = $this->container->get('security.token_storage')->getToken()->getUser()->getParticipation();

        $participate = $this->container->get('Handissimo.participation');
        $participationByDay = $participate->searchUserParticipation($lastDate, $participation);
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $user->setLastDate($participationByDay[0]);
        $user->setParticipation($participationByDay[1]);

        /**
         * Set All contribution for the user in a array
         * Saving the organizations name
         */
        $organizationName = $this->organization->getName();

        $arrayContribution = [];
        if ($this->container->get('security.token_storage')->getToken()->getUser()->getContribution() != null) {
            $arrayContribution = $this->container->get('security.token_storage')->getToken()->getUser()->getContribution();
            if (array_key_exists($organizationName, $arrayContribution) == true) {
                $arrayContribution[$organizationName] += 1;
            } else {
                $arrayContribution[$organizationName] = 1;
            }
        } else {
            $arrayContribution[$organizationName] = 1;
        }
        $user->setContribution($arrayContribution);

        /**
         * Saving all disabilities for organizations_audit
         */
        if ($this->organization->getDisabilityTypes() !== null) {
            $allDisabilities = $this->organization->getDisabilityTypes();
            $disabilitiesId = "";
            foreach ($allDisabilities as $oneDisability) {
                $disabilitiesId .= $oneDisability->getId() . " ";
            }
            $disabilitiesArray = explode(" ", $disabilitiesId);
            $disabilities = array_filter($disabilitiesArray);
            $this->organization->setDisabilities($disabilities);
        }

        /**
         * Saving all primary needs for organizations_audit
         */
        if ($this->organization->getNeeds() !== null) {
            $allPrimaryNeeds = $this->organization->getNeeds();
            $primaryNeedsId = "";
            foreach ($allPrimaryNeeds as $onePrimaryNeed) {
                $primaryNeedsId .= $onePrimaryNeed->getId() . " ";
            }
            $primaryNeedsArray = explode(" ", $primaryNeedsId);
            $primaryNeeds = array_filter($primaryNeedsArray);
            $this->organization->setPrimaryNeeds($primaryNeeds);
        }

        /**
         * Saving all secondary needs for organizations_audit
         */
        if ($this->organization->getSecondneeds() !== null) {
            $allSecondaryNeeds = $this->organization->getSecondneeds();
            $secondaryNeedsId = "";
            foreach ($allSecondaryNeeds as $oneSecondaryNeed) {
                $secondaryNeedsId .= $oneSecondaryNeed->getId() . " ";
            }
            $secondaryNeedsArray = explode(" ", $secondaryNeedsId);
            $secondaryNeeds = array_filter($secondaryNeedsArray);
            $this->organization->setSecondaryNeeds($secondaryNeeds);
        }

        /**
         * Saving all medical jobs for organizations_audit
         */
        if ($this->organization->getStafforganizations() !== null) {
            $allMedicalJobs = $this->organization->getStafforganizations();
            $medicalJobsId = "";
            foreach ($allMedicalJobs as $oneMedicalJob) {
                $medicalJobsId .= $oneMedicalJob->getId() . " ";
            }
            $medicalJobsArray = explode(" ", $medicalJobsId);
            $medicalJobs = array_filter($medicalJobsArray);
            $this->organization->setMedicalJob($medicalJobs);
        }

        /**
         * Saving all social jobs for organization_audit
         */
        if ($this->organization->getSocialstaffs() !== null) {
            $allSocialJobs = $this->organization->getSocialstaffs();
            $socialJobsId = "";
            foreach ($allSocialJobs as $oneSocialJob) {
                $socialJobsId .= $oneSocialJob->getId() . " ";
            }
            $socialJobsArray = explode(" ", $socialJobsId);
            $socialJobs = array_filter($socialJobsArray);
            $this->organization->setSocialJob($socialJobs);
        }

        /**
         * Saving all other jobs for organization_audit
         */
        if ($this->organization->getOtherjobs() !== null) {
            $allCommunJobs = $this->organization->getOtherjobs();
            $communJobsId = "";
            foreach ($allCommunJobs as $oneCommunJob) {
                $communJobsId .= $oneCommunJob->getId() . " ";
            }
            $communJobsArray = explode(" ", $communJobsId);
            $communJobs = array_filter($communJobsArray);
            $this->organization->setCommunJob($communJobs);
        }

        $this->organization->setChecked(0);
        $this->em->persist($user);
        $this->em->persist($this->form->getData());
        $this->em->flush();
    }

}