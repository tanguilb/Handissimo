<?php
/**
 * Created by PhpStorm.
 * User: axcel
 * Date: 21/11/16
 * Time: 16:00
 */

namespace HandissimoBundle\Controller;

use HandissimoBundle\Entity\Opinion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class NewOpinionController extends Controller
{
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
        }

        return $this->render('front/opinion-button.html.twig', array(
            'opinion' => $opinion,
            'form' => $form->createView(),
        ));
    }
}