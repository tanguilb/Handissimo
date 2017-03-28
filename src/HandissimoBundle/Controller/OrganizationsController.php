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
     *
     */
    public function newAction(Request $request)
    {
        $organization = new Organizations();
        $form = $this->createForm('HandissimoBundle\Form\Type\OrganizationsType', $organization);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($organization);
            $em->flush($organization);

            return $this->redirectToRoute('handissimo_organizations_standard_page', array('id' => $organization->getId()));
        }

        return $this->render('organizations/new.html.twig', array(
            'organization' => $organization,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing organization entity.
     *
     */
    public function editAction(Request $request, Organizations $organization)
    {
        $deleteForm = $this->createDeleteForm($organization);
        $editForm = $this->createForm('HandissimoBundle\Form\Type\OrganizationsType', $organization);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('structure_page', array('id' => $organization->getId()));
        }

        return $this->render('organizations/edit.html.twig', array(
            'organization' => $organization,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a organization entity.
     *
     */
    public function deleteAction(Request $request, Organizations $organization)
    {
        $form = $this->createDeleteForm($organization);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($organization);
            $em->flush($organization);
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

    private function draftCopyAction(Organizations $organization)
    {
        $em = $this->getDoctrine()->getManager();
        $copy = clone $organization;
        $em->persist($copy);
        $em->flush();
        return $this->redirectToRoute('handissimo_structure');

    }
}
