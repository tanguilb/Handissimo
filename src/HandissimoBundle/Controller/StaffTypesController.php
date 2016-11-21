<?php

namespace HandissimoBundle\Controller;

use HandissimoBundle\Entity\StaffTypes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Stafftype controller.
 *
 */
class StaffTypesController extends Controller
{
    /**
     * Lists all staffType entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $staffTypes = $em->getRepository('HandissimoBundle:StaffTypes')->findAll();

        return $this->render('stafftypes/index.html.twig', array(
            'staffTypes' => $staffTypes,
        ));
    }

    /**
     * Creates a new staffType entity.
     *
     */
    public function newAction(Request $request)
    {
        $staffType = new StaffTypes();
        $form = $this->createForm('HandissimoBundle\Form\StaffTypesType', $staffType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($staffType);
            $em->flush($staffType);

            return $this->redirectToRoute('stafftypes_show', array('id' => $staffType->getId()));
        }

        return $this->render('stafftypes/new.html.twig', array(
            'staffType' => $staffType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a staffType entity.
     *
     */
    public function showAction(StaffTypes $staffType)
    {
        $deleteForm = $this->createDeleteForm($staffType);

        return $this->render('stafftypes/show.html.twig', array(
            'staffType' => $staffType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing staffType entity.
     *
     */
    public function editAction(Request $request, StaffTypes $staffType)
    {
        $deleteForm = $this->createDeleteForm($staffType);
        $editForm = $this->createForm('HandissimoBundle\Form\StaffTypesType', $staffType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('stafftypes_edit', array('id' => $staffType->getId()));
        }

        return $this->render('stafftypes/edit.html.twig', array(
            'staffType' => $staffType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a staffType entity.
     *
     */
    public function deleteAction(Request $request, StaffTypes $staffType)
    {
        $form = $this->createDeleteForm($staffType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($staffType);
            $em->flush($staffType);
        }

        return $this->redirectToRoute('stafftypes_index');
    }

    /**
     * Creates a form to delete a staffType entity.
     *
     * @param StaffTypes $staffType The staffType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(StaffTypes $staffType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('stafftypes_delete', array('id' => $staffType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
