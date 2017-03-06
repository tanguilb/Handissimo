<?php

namespace HandissimoBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use HandissimoBundle\Entity\Comment;
use HandissimoBundle\Entity\CommentAnswer;
use HandissimoBundle\Entity\Organizations;
use HandissimoBundle\Entity\Solution;
use HandissimoBundle\Form\CommentAnswerType;
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
        $form = $this->createForm('HandissimoBundle\Form\CommentType', $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();

            $email = $organization->getMail();

            $this->addFlash('comment', 'Votre commentaire a bien été posté');
            $message = \Swift_Message::newInstance()
                ->setSubject('Nouveau commentaire')
                ->setFrom('dev.wildcodeshool@gmail.com')
                ->setTo('david.ducruet74gmail.com')
                ->setBody(
                    $this->renderView(':email:alertComment.html.twig', array(
                        'organisation' => $organization
                    ))
                );
            $this->get('mailer')->send($message);
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

    /*public function commentAnswerAction(Request $request)
    {
        $commentAnswer =new CommentAnswer();
        $formbis = $this->createForm('HandissimoBundle\Form\CommentAnswerType', $commentAnswer);
        $formbis->handleRequest($request);
        //$commentAnswer->setCommentanswers($comment);
        //$comment->setOrganizationsComment($organization);
        if ($formbis->isSubmitted() && $formbis->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($commentAnswer);
            $em->flush();

            //$this->addFlash('comment', 'Votre commentaire a bien été posté');
            //return $this->redirectToRoute('handissimo_organizations_standard_page', array('id' => $organization->getId()));
        }

        //$commentAnswers = $comment->getComments();
        return $this->render(':front:organizationPage.html.twig', array(
            'form' => $formbis->createView(),
            //'user' => $user,
            //'comments' => $comment,
            //'organization' => $organization,
            //'commentAnswers' => $commentAnswers,
        ));
    }*/

    public function likeAction(Comment $comment)
    {
        //$user = $this->getUser();

        $request = $this->get('request');
        $comment->getId();
        var_dump($comment);

        if ($request->getMethod() == 'POST') {
            $comment->incrementeComment();
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();
            //return $this->redirectToRoute('handissimo_organizations_standard_page', array('id' => $organization->getId()));
        }
        //$comments = $organization->getComments();
        return $this->render(':front:index.html.twig', array(
        //'user' => $user,
        //'comments' => $comments,
        //'organization' => $organization
        ));
    }

    public function dislikeAction()
    {

    }
}
