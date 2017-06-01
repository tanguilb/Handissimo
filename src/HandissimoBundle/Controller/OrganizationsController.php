<?php

namespace HandissimoBundle\Controller;

use HandissimoBundle\Entity\Media;
use HandissimoBundle\Entity\Organizations;
use HandissimoBundle\Entity\StructuresList;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Organization controller.
 *
 */
class OrganizationsController extends Controller
{
    /**
     * Creates a new organization entity.
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {

        $em = $this->getDoctrine();
        $structuresType = $em->getRepository('HandissimoBundle:StructureType')->findAll();
        $structuresList = $em->getRepository('HandissimoBundle:StructuresList')->findAll();
        $organization = new Organizations();
        $form = $this->createForm('HandissimoBundle\Form\Type\OrganizationsType', $organization);
        $form->handleRequest($request);
        $organization->setUser($this->container->get('security.token_storage')->getToken()->getUser());
        $organization->setUserType($this->container->get('security.token_storage')->getToken()->getUser()->getUserType());

        if ($form->isSubmitted() && $form->isValid()) {
            /**
             * Saving all disabilities for organizations_audit
             */
            $allDisabilities = $organization->getDisabilityTypes();
            $disabilitiesId="";
            foreach ($allDisabilities as $oneDisability){
                $disabilitiesId .= $oneDisability->getId() . " ";
            }
            $disabilitiesArray = explode(" ", $disabilitiesId);
            $disabilities = array_filter($disabilitiesArray);
            $organization->setDisabilities($disabilities);

            /**
             * Saving all primary needs for organizations_audit
             */
            $allPrimaryNeeds = $organization->getNeeds();
            $primaryNeedsId="";
            foreach ($allPrimaryNeeds as $onePrimaryNeed){
                $primaryNeedsId .= $onePrimaryNeed->getId() . " ";
            }
            $primaryNeedsArray = explode(" ", $primaryNeedsId);
            $primaryNeeds = array_filter($primaryNeedsArray);
            $organization->setPrimaryNeeds($primaryNeeds);

            /**
             * Saving all secondary needs for organizations_audit
             */
            $allSecondaryNeeds = $organization->getSecondneeds();
            $secondaryNeedsId="";
            foreach ($allSecondaryNeeds as $oneSecondaryNeed){
                $secondaryNeedsId .= $oneSecondaryNeed->getId() . " ";
            }
            $secondaryNeedsArray = explode(" ", $secondaryNeedsId);
            $secondaryNeeds = array_filter($secondaryNeedsArray);
            $organization->setSecondaryNeeds($secondaryNeeds);

            /**
             * Saving all medical jobs for organizations_audit
             */
            $allMedicalJobs = $organization->getStafforganizations();
            $medicalJobsId="";
            foreach ($allMedicalJobs as $oneMedicalJob){
                $medicalJobsId .= $oneMedicalJob->getId() . " ";
            }
            $medicalJobsArray = explode(" ", $medicalJobsId);
            $medicalJobs = array_filter($medicalJobsArray);
            $organization->setMedicalJob($medicalJobs);

            /**
             * Saving all social jobs for organization_audit
             */
            $allSocialJobs = $organization->getSocialstaffs();
            $socialJobsId="";
            foreach ($allSocialJobs as $oneSocialJob){
                $socialJobsId .= $oneSocialJob->getId() . " ";
            }
            $socialJobsArray = explode(" ", $socialJobsId);
            $socialJobs = array_filter($socialJobsArray);
            $organization->setSocialJob($socialJobs);

            /**
             * Saving all other jobs for organization_audit
             */
            $allCommunJobs = $organization->getOtherjobs();
            $communJobsId="";
            foreach ($allCommunJobs as $oneCommunJob){
                $communJobsId .= $oneCommunJob->getId() . " ";
            }
            $communJobsArray = explode(" ", $communJobsId);
            $communJobs = array_filter($communJobsArray);
            $organization->setCommunJob($communJobs);

            $em = $this->getDoctrine()->getManager();
            $em->persist($organization);
            $em->flush();
            $this->addFlash('notice', 'La fiche a bien été créé');
            return $this->redirectToRoute('sonata_user_profile_edit');
        }
        return $this->render('organizations/new.html.twig', array(
            'organization' => $organization,
            'structureType' => $structuresType,
            'structureList' => $structuresList,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing organization entity.
     * @param Request $request
     * @param Organizations $organization
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, Organizations $organization)
    {
        $em = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations');
        $pictures = $em->getMediaByOrganizations($organization->getId());
        $deleteForm = $this->createDeleteForm($organization);
        $editForm = $this->createForm('HandissimoBundle\Form\Type\OrganizationsType', $organization);
        $editForm->handleRequest($request);
        $organization->setUser($this->container->get('security.token_storage')->getToken()->getUser());
        $organization->setUserType($this->container->get('security.token_storage')->getToken()->getUser()->getUserType());
        $user = $this->getUser();
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('edit', 'La fiche a été éditée');
            return $this->redirectToRoute('organizations_edit', array('id' => $organization->getId()));
        }
        if ($organization->getUserorg() !== null){
            foreach ($this->container->get('security.token_storage')->getToken()->getRoles() as $role)
            {
                if($this->container->get('security.token_storage')->getToken()->getUser()->getId() === $organization->getUserorg()->getId() or $role->getRole() === "ROLE_SUPER_ADMIN")
                {
                    return $this->render('organizations/edit.html.twig', array(
                        'pictures' => $pictures,
                        'user' => $user,
                        'organization' => $organization,
                        'edit_form' => $editForm->createView(),
                        'delete_form' => $deleteForm->createView(),
                    ));
                } else {
                    return $this->render(':front/profile:profile-dont-edit.html.twig');
                }
            }
        } else
        {
            return $this->render('organizations/edit.html.twig', array(
                'pictures' => $pictures,
                'user' => $user,
                'organization' => $organization,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            ));
        }
    }

    /**
     * Deletes a organization entity.
     * @param Request $request
     * @param Organizations $organization
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Request $request, Organizations $organization)
    {
        $form = $this->createDeleteForm($organization);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($organization);
            $em->flush();
        }
        return $this->redirectToRoute('research_action');
    }

    /**
     * Creates a form to delete a organization entity.
     *
     * @param Organizations $organization The organization entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Organizations $organization)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('organizations_delete', array('id' => $organization->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


}
