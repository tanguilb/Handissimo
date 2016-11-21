<?php

namespace HandissimoBundle\Controller;

use HandissimoBundle\Entity\Opinion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Opinion controller.
 *
 */
class OpinionController extends Controller
{
    /**
     * Lists all opinion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $opinions = $em->getRepository('HandissimoBundle:Opinion')->findAll();

        return $this->render('opinion/index.html.twig', array(
            'opinions' => $opinions,
        ));
    }

    /**
     * Creates a new opinion entity.
     *
     */
    public function newAction(Request $request)
    {
        $opinion = new Opinion();
        $form = $this->createForm('HandissimoBundle\Form\OpinionType', $opinion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($opinion);
            $em->flush($opinion);

            return $this->redirectToRoute('opinion_show', array('id' => $opinion->getId()));
        }

        return $this->render('opinion/new.html.twig', array(
            'opinion' => $opinion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a opinion entity.
     *
     */
    public function showAction(Opinion $opinion)
    {
        $deleteForm = $this->createDeleteForm($opinion);

        return $this->render('opinion/show.html.twig', array(
            'opinion' => $opinion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a opinion entity.
     *
     */
    public function deleteAction(Request $request, Opinion $opinion)
    {
        $form = $this->createDeleteForm($opinion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($opinion);
            $em->flush($opinion);
        }

        return $this->redirectToRoute('opinion_index');
    }

    /**
     * Creates a form to delete a opinion entity.
     *
     * @param Opinion $opinion The opinion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Opinion $opinion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('opinion_delete', array('id' => $opinion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
