<?php

namespace HandissimoBundle\Controller;

use HandissimoBundle\Entity\StructuresTypes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Structurestype controller.
 *
 */
class StructuresTypesController extends Controller
{
    /**
     * Lists all structuresType entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $structuresTypes = $em->getRepository('HandissimoBundle:StructuresTypes')->findAll();

        return $this->render('structurestypes/index.html.twig', array(
            'structuresTypes' => $structuresTypes,
        ));
    }

    /**
     * Creates a new structuresType entity.
     *
     */
    public function newAction(Request $request)
    {
        $structuresType = new StructuresTypes();
        $form = $this->createForm('HandissimoBundle\Form\StructuresTypesType', $structuresType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($structuresType);
            $em->flush($structuresType);

            return $this->redirectToRoute('structurestypes_show', array('id' => $structuresType->getId()));
        }

        return $this->render('structurestypes/new.html.twig', array(
            'structuresType' => $structuresType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a structuresType entity.
     *
     */
    public function showAction(StructuresTypes $structuresType)
    {
        $deleteForm = $this->createDeleteForm($structuresType);

        return $this->render('structurestypes/show.html.twig', array(
            'structuresType' => $structuresType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing structuresType entity.
     *
     */
    public function editAction(Request $request, StructuresTypes $structuresType)
    {
        $deleteForm = $this->createDeleteForm($structuresType);
        $editForm = $this->createForm('HandissimoBundle\Form\StructuresTypesType', $structuresType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('structurestypes_edit', array('id' => $structuresType->getId()));
        }

        return $this->render('structurestypes/edit.html.twig', array(
            'structuresType' => $structuresType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a structuresType entity.
     *
     */
    public function deleteAction(Request $request, StructuresTypes $structuresType)
    {
        $form = $this->createDeleteForm($structuresType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($structuresType);
            $em->flush($structuresType);
        }

        return $this->redirectToRoute('structurestypes_index');
    }

    /**
     * Creates a form to delete a structuresType entity.
     *
     * @param StructuresTypes $structuresType The structuresType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(StructuresTypes $structuresType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('structurestypes_delete', array('id' => $structuresType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
