<?php

namespace HandissimoBundle\Controller;

use HandissimoBundle\Entity\Organizations;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function searchAction(Request $request)
    {
        $form = $this->createForm('HandissimoBundle\Form\SearchType');
        $form->handleRequest($request);

        return $this->render('front/search.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function aboutAction(){
        return $this->render('front/about.html.twig');
    }
    public function standardPageAction(Organizations $organization){
        $user = $this->getUser();
        $organization = $this->get('templating')
            ->render('front/organizationPage.html.twig', array(
                'organization' => $organization,
                'user' => $user));

        return new Response($organization);

    }
}
