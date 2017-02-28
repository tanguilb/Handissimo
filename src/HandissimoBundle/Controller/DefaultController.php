<?php

namespace HandissimoBundle\Controller;

use HandissimoBundle\Entity\Comment;
use HandissimoBundle\Entity\Organizations;
use HandissimoBundle\Entity\Solution;
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

        if ($form->isSubmitted() && $form->isValid() && $this->captchaverifyAction($request->get('g-recaptcha-response'))){
            $em = $this->getDoctrine()->getManager();
            $em->persist($solution);
            $em->flush();

            $this->addFlash('notice', 'Votre message a bien été envoyé');
            return $this->redirectToRoute('handissimo_structure');
        }
        if($form->isSubmitted() &&  $form->isValid() && !$this->captchaverifyAction($request->get('g-recaptcha-response'))) {
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

    /**
     * @param $recaptcha
     * @return mixed
     * method for test recaptcha form
     */
    public function captchaverifyAction($recaptcha)
    {
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array(
            'secret' => '6Lc8vBYUAAAAAI-Rfhi1KUJUS0XIUN6kp4lEb-o5', 'response' => $recaptcha
        ));
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response);

        return $data->success;
    }

}
