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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class NewOpinionController extends Controller
{
    /**
     * Renders the "new" form
     *
     * @Route("/", "opinion_new")
     * @Method("GET")
     */
    public function newAction()
    {
        $opinion = new Opinion();
        $form = $this->createCreateForm($opinion);

        return $this->render('opinion:new.html.twig',
            array(
                'opinion' => $opinion,
                'form' => $form->createView()
            )
        );
    }

    /**
     * Creates a new opinion entity.
     *
     * @Route("/ajax", name="opinion_create")
     * @Method("POST")
     *
     */
    public function createAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            return new JsonResponse(array('message' => 'You can access this only using Ajax!'), 400);
        }

        $opinion = new Opinion();
        $form = $this->createForm('HandissimoBundle\Form\OpinionType', $opinion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            var_dump($opinion);
            $em->persist($opinion);
            $em->flush();

            return new JsonResponse(array('message' => 'Success!'), 200);
        }

        $response = new JsonResponse(
            array(
                'message' => 'Error',
                'form' => $this->renderView('front/opinion-button.html.twig',
                    array(
                        'opinion' => $opinion,
                        'form' => $form->createView(),
                    ))), 400);

        return $response;

        /*return $this->render('front/opinion-button.html.twig', array(
            'opinion' => $opinion,
            'form' => $form->createView(),
        ));*/
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