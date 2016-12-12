<?php
/**
 * Created by PhpStorm.
 * User: axcel
 * Date: 21/11/16
 * Time: 16:00
 */

namespace HandissimoBundle\Controller;

use HandissimoBundle\Entity\Opinion;
use HandissimoBundle\Form\OpinionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class NewOpinionController extends Controller
{
    /**
     * Renders the "new" form
     *
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
                'message' => 'Votre message n\'a pas été envoyé. Merci de réessayer ultérieurement.',
                'form' => $this->renderView('front/opinion-button.html.twig',
                    array(
                        'opinion' => $opinion,
                        'form' => $form->createView(),
                    ))), 400);

        return $response;
    }

    private function createCreateForm(Opinion $opinion)
    {
        $form = $this->createForm(new OpinionType(), $opinion,
            array(
                'action' => $this->generateUrl('opinion_create'),
                'method' => 'POST',
            ));

        return $form;
    }
}