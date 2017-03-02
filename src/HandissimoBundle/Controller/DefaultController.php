<?php

namespace HandissimoBundle\Controller;

use HandissimoBundle\Entity\Comment;
use HandissimoBundle\Entity\CommentAnswer;
use HandissimoBundle\Entity\Organizations;
use HandissimoBundle\Entity\Solution;
use ReCaptcha\RequestMethod\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use HandissimoBundle\Service\CaptchaVerify;

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

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * This function manages the page solution with the form and flash message
     */
    public function structureAction(Request $request)
    {
        $solution = new Solution();
        $form = $this->createForm('HandissimoBundle\Form\SolutionType', $solution);
        $form->handleRequest($request);
        $captchaverify = $this->container->get('handissimo.captchaverify');
        if ($form->isSubmitted() && $form->isValid() && $captchaverify->verify($request->get('g-recaptcha-response'))){
            $em = $this->getDoctrine()->getManager();
            $em->persist($solution);
            $em->flush();

            $this->addFlash('notice', 'Votre message a bien été envoyé');
            return $this->redirectToRoute('handissimo_structure');
        }
        if($form->isSubmitted() &&  $form->isValid() && !$captchaverify->verify($request->get('g-recaptcha-response'))) {
            $this->addFlash('error', 'Le captcha n\'est pas valide, veuillez recommencer');
        }
        return $this->render(':front:structurePage.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function standardPageAction(Organizations $organization, Request $request)
    {
        $user = $this->getUser();
        $comment = new Comment();
        $comment->setOrganizationsComment($organization);
        $comment->setStatusComment(1);
        $form = $this->createForm('HandissimoBundle\Form\CommentType', $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();

            $this->addFlash('comment', 'Votre commentaire a bien été posté');
            return $this->redirectToRoute('handissimo_organizations_standard_page', array('id' => $organization->getId()));
        }
        $comments = $organization->getComments();
        $organization = $this->get('templating')->render(':front:organizationPage.html.twig', array(
            'form' => $form->createView(),
            'user' => $user,
            'organization' => $organization,
            'comments' => $comments,
        ));
        return new Response($organization);
    }

    public function loadAction()
    {
        $string = file_get_contents($this->get('kernel')->getRootDir()."/../1.json");
        $data = json_decode($string, true);
        $em = $this->getDoctrine()->getManager();

        $tests = $data;
        foreach ($tests as $test){
            $organizationsEntity = new Organizations();
            $organizationsEntity->setName($test['name']);
            $organizationsEntity->setAddress($test['address']);
            $organizationsEntity->setAddressComplement($test['addressComplement']);
            $organizationsEntity->setPostal($test['postal']);
            $organizationsEntity->setCity($test['city']);
            $organizationsEntity->setPhoneNumber($test['phoneNumber']);
            $organizationsEntity->setMail($test['email']);
            $organizationsEntity->setWebsite($test['website']);
            $organizationsEntity->setFreeplace($test['freeplace']);
            $organizationsEntity->setAgemini($test['agemini']);
            $organizationsEntity->setAgemaxi($test['agemaxi']);
            $organizationsEntity->setDirectorName($test['directorName']);
            $em->persist($organizationsEntity);
        }
            $em->flush();
            $this->render(":front:about.html.twig");
    }

    public function commentAnswerAction(Request $request, Organizations $organization)
    {
        $user = $this->getUser();
        $commentAnswer =new CommentAnswer();
        $form = $this->createForm('HandissimoBundle\Form\CommentAnswerType', $commentAnswer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($commentAnswer);
            $em->flush();

            $this->addFlash('comment', 'Votre commentaire a bien été posté');
            return $this->redirectToRoute('handissimo_organizations_standard_page', array('id' => $organization->getId()));
        }
        $commentAnswers = $organization->getComments();
        $organization = $this->get('templating')->render(':front:organizationPage.html.twig', array(
            'form' => $form->createView(),
            'user' => $user,
            'organization' => $organization,
            'commentAnswers' => $commentAnswers,
        ));
        return new Response($organization);
    }

    public function likeAction(Organizations $organization)
    {
        $user = $this->getUser();
        $comment = new Comment();
        $comment->setOrganizationsComment($organization)->getId();
        //var_dump($comment);die();
        //$comment->getLikeComment();
        $comment->setLikeComment(+1);
        $request = $this->get('request');

       if ($request->getMethod() == 'POST') {

            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();
            return $this->redirectToRoute('handissimo_organizations_standard_page', array('id' => $organization->getId()));
        }
        $comments = $organization->getComments();
        return $this->render(':front:organizationPage.html.twig', array(
            'user' => $user,
            'comments' => $comments,
            'organization' => $organization
        ));
        //return new Response($organization);
    }

    public function dislikeAction()
    {

    }
}
