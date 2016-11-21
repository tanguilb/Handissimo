<?php

namespace HandissimoBundle\Controller;

use HandissimoBundle\Entity\DisabilityTypes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Disabilitytype controller.
 *
 */
class DisabilityTypesController extends Controller
{
    /**
     * Lists all disabilityType entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $disabilityTypes = $em->getRepository('HandissimoBundle:DisabilityTypes')->findAll();

        return $this->render('disabilitytypes/index.html.twig', array(
            'disabilityTypes' => $disabilityTypes,
        ));
    }

    /**
     * Creates a new disabilityType entity.
     *
     */
    public function newAction(Request $request)
    {
        $disabilityType = new DisabilityTypes();
        $form = $this->createForm('HandissimoBundle\Form\DisabilityTypesType', $disabilityType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($disabilityType);
            $em->flush($disabilityType);

            return $this->redirectToRoute('disabilitytypes_show', array('id' => $disabilityType->getId()));
        }

        return $this->render('disabilitytypes/new.html.twig', array(
            'disabilityType' => $disabilityType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a disabilityType entity.
     *
     */
    public function showAction(DisabilityTypes $disabilityType)
    {
        $deleteForm = $this->createDeleteForm($disabilityType);

        return $this->render('disabilitytypes/show.html.twig', array(
            'disabilityType' => $disabilityType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing disabilityType entity.
     *
     */
    public function editAction(Request $request, DisabilityTypes $disabilityType)
    {
        $deleteForm = $this->createDeleteForm($disabilityType);
        $editForm = $this->createForm('HandissimoBundle\Form\DisabilityTypesType', $disabilityType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('disabilitytypes_edit', array('id' => $disabilityType->getId()));
        }

        return $this->render('disabilitytypes/edit.html.twig', array(
            'disabilityType' => $disabilityType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a disabilityType entity.
     *
     */
    public function deleteAction(Request $request, DisabilityTypes $disabilityType)
    {
        $form = $this->createDeleteForm($disabilityType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($disabilityType);
            $em->flush($disabilityType);
        }

        return $this->redirectToRoute('disabilitytypes_index');
    }

    /**
     * Creates a form to delete a disabilityType entity.
     *
     * @param DisabilityTypes $disabilityType The disabilityType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DisabilityTypes $disabilityType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('disabilitytypes_delete', array('id' => $disabilityType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
