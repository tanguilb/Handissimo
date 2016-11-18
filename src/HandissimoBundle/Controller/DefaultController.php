<?php

namespace HandissimoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
}
