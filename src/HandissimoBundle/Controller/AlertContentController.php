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

    public function createAction(Request $request, $id)
    {
        $alertContent = new AlertContent();
        $alertForm = $this->createForm('HandissimoBundle\Form\Type\AlertContentType', $alertContent);
        $alertForm->handleRequest($request);
        $organization = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations')->find($id);
        $user = $this->container->get('security.token_storage')->getToken()->getUsername();


        if ($alertForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if ($user != null) {
                $alertContent->setUser($user);
            } else {
                $alertContent->setUser("Anonyme");
            }
            $alertContent->setOrganization($organization->getName());
            $em->persist($alertContent);
            $em->flush();

            return new JsonResponse(array('message' => 'Votre message a bien été envoyé. Merci !'), 200);
        }

        $response = new JsonResponse(
            array(
                'message' => 'Error',
                'alertForm' => $this->renderView('front/alertContent.html.twig',
                    array(
                        'alertContent' => $alertContent,
                        'alertForm' => $alertForm->createView(),
                        'organization' => $organization
                    ))), 400);

        return $response;
    }
}