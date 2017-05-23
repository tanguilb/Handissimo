<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 27/03/17
 * Time: 12:25
 */

namespace HandissimoBundle\Controller;


use HandissimoBundle\Entity\Solution;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use HandissimoBundle\Form\Handler;

class ProfileController extends Controller
{
    public function profileSearchAction(Request $request)
    {
        $form = $this->createForm('HandissimoBundle\Form\Type\ProfileSearchType');
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $result ="";
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData()['profileSearch'];

            $result = $em->getRepository('HandissimoBundle:Organizations')->getByOrganizationsProfile($data);
            return $this->render(':front/profile:profile-search.html.twig', array(
                'form' => $form->createView(),
                'result' => $result,
                'profileSearch' => $data,
            ));
        }
        return $this->render(':front/profile:profile-search.html.twig', array(
            'form' => $form->createView(),
            'result' => $result,
        ));
    }

    public function solutionFormAction()
    {
        return $this->render('front/profile/profile-solution.html.twig');
    }

    public function profileCommentAction()
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser()->getUsernameCanonical();
        $comments = $this->getDoctrine()->getRepository('HandissimoBundle:Comment')->getCommentsByUser($user);

        return $this->render(':front/profile:profile-comment.html.twig', array(
            'comments' => $comments
        ));
    }
}