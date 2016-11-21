<?php

namespace HandissimoBundle\Controller;

use HandissimoBundle\Entity\Pictures;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Picture controller.
 *
 */
class PicturesController extends Controller
{
    /**
     * Lists all picture entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pictures = $em->getRepository('HandissimoBundle:Pictures')->findAll();

        return $this->render('pictures/index.html.twig', array(
            'pictures' => $pictures,
        ));
    }

    /**
     * Creates a new picture entity.
     *
     */
    public function newAction(Request $request)
    {
        $picture = new Pictures();
        $form = $this->createForm('HandissimoBundle\Form\PicturesType', $picture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($picture);
            $em->flush($picture);

            return $this->redirectToRoute('pictures_show', array('id' => $picture->getId()));
        }

        return $this->render('pictures/new.html.twig', array(
            'picture' => $picture,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a picture entity.
     *
     */
    public function showAction(Pictures $picture)
    {
        $deleteForm = $this->createDeleteForm($picture);

        return $this->render('pictures/show.html.twig', array(
            'picture' => $picture,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing picture entity.
     *
     */
    public function editAction(Request $request, Pictures $picture)
    {
        $deleteForm = $this->createDeleteForm($picture);
        $editForm = $this->createForm('HandissimoBundle\Form\PicturesType', $picture);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pictures_edit', array('id' => $picture->getId()));
        }

        return $this->render('pictures/edit.html.twig', array(
            'picture' => $picture,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a picture entity.
     *
     */
    public function deleteAction(Request $request, Pictures $picture)
    {
        $form = $this->createDeleteForm($picture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($picture);
            $em->flush($picture);
        }

        return $this->redirectToRoute('pictures_index');
    }

    /**
     * Creates a form to delete a picture entity.
     *
     * @param Pictures $picture The picture entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Pictures $picture)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pictures_delete', array('id' => $picture->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
