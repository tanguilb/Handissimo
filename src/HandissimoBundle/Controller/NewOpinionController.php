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
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class NewOpinionController extends Controller
{
    /**
     * Renders the "new" form
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $opinion = new Opinion();
        $form = $this->createForm('HandissimoBundle\Form\OpinionType', $opinion);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($opinion);
            $em->flush();
        }
        return $this->render('front/opinion-button.html.twig',
            array(
                'opinion' => $opinion,
                'form' => $form->createView()
            )
        );
    }

    public function createAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            return new JsonResponse(array('message' => 'Désolé, vous ne pouvez pas accéder à ce service.'), 400);
        }
        $opinion = new Opinion();
        $form = $this->createForm('HandissimoBundle\Form\OpinionType', $opinion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($opinion);
            $em->flush();

            return new JsonResponse(array('message' => 'Votre avis a bien été envoyé. Merci !'), 200);
        }
        $response = new JsonResponse(
            array(
                'form' => $this->renderView('front/opinion-button.html.twig',
                    array(
                        'opinion' => $opinion,
                        'form' => $form->createView(),
                    ))), 400);

        return $response;
    }
}