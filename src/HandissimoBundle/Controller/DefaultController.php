<?php

namespace HandissimoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('front/index.html.twig');
    }

    public function searchAction(Request $request)
    {
        $form = $this->createForm('HandissimoBundle\Form\SearchType');
        $form->handleRequest($request);

        return $this->render('front/search.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
