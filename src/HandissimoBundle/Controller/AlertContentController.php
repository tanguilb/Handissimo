<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 16/06/17
 * Time: 11:34
 */

namespace HandissimoBundle\Controller;


use HandissimoBundle\Entity\AlertContent;
use HandissimoBundle\Form\Type\AlertContentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class AlertContentController extends Controller
{
    public function newAction(Request $request, $id)
    {
        $alertContent = new AlertContent();
        $alertForm = $this->createForm('HandissimoBundle\Form\Type\AlertContentType', $alertContent);
        $alertForm->handleRequest($request);
        $organization = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations')->find($id);

        return $this->render('front/alertContent.html.twig', array(
            'alertForm' => $alertForm->createView(),
            'alertContent' => $alertContent,
            'organization' => $organization
        ));
    }
}