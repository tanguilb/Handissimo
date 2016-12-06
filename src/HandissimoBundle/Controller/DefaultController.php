<?php

namespace HandissimoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('HandissimoBundle:Default:index.html.twig');
    }

    public function searchAction()
    {
        return $this->render('front/search.html.twig');
    }

    public function researchAction(Request $request)
    {
        $form = $this->createForm('HandissimoBundle\Form\ResearchType');
        $form->handleRequest($request);
        return $this->render('front/research.html.twig', array('form' => $form->createView()));
    }
}
