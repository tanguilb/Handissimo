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
        return $this->render('front/search.html.twig');
    }
}
