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

    public function ajaxAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $id = $request->get('organizations_id');
            $conn = $this->get('database_connection');
            $em = $this->getDoctrine()->getManager();
            $query = $em->getRepository('HandissimoBundle:Organizations')->geocoder() . $id;
            $rows = $conn->fetchAll($query);
            return new JsonResponse(array('data' => json_encode($rows)));
        }
        return new Response("Erreur, ce n'est pas une requête Ajax", 400);
    }

}
