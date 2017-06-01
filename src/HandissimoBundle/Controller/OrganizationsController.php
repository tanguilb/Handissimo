<?php

namespace HandissimoBundle\Controller;

use HandissimoBundle\Entity\Organizations;
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
        $organization = new Organizations();
        $form = $this->createForm('HandissimoBundle\Form\Type\OrganizationsType', $organization);

        $formHandler = new \HandissimoBundle\Form\Handler\OrganizationsHandler($form, $request, $this->get('doctrine.orm.default_entity_manager'), $this->get('service_container'), $organization);
        if ($formHandler->process()){
            $this->addFlash('notice', 'La fiche a bien été créé');
            return $this->redirectToRoute('sonata_user_profile_edit');
        }

        return $this->render('organizations/new.html.twig', array(
            'organization' => $organization,
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
        $user = $this->getUser();
        $formHandler = new \HandissimoBundle\Form\Handler\OrganizationsHandler($editForm, $request, $this->get('doctrine.orm.default_entity_manager'), $this->get('service_container'), $organization);
        if ($formHandler->process()){
            //$this->getDoctrine()->getManager()->flush();
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
