<?php

namespace HandissimoBundle\Controller;

use HandissimoBundle\Entity\Organizations;
use HandissimoBundle\Entity\SecondaryNeeds;
use HandissimoBundle\Entity\Solution;
use HandissimoBundle\Entity\StructuresList;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use HandissimoBundle\Entity\Comment;
use HandissimoBundle\Form\Handler;
use Symfony\Component\HttpKernel\Exception\HttpException;

class DefaultController extends Controller
{
    public function aboutAction(){
        return $this->render('front/about.html.twig');
    }

    public function noticeAction()
    {
        return $this->render(':front:legal-notice.html.twig');
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * This function manages the page solution with the form and flash message
     */
    public function structureAction(Request $request)
    {

        $solution = new Solution();
        $form = $this->createForm('HandissimoBundle\Form\Type\SolutionType', $solution);

        $formHandler = new Handler\SolutionHandler($form, $request, $this->get('doctrine.orm.default_entity_manager'), $this->get('service_container'));

        if ($formHandler->process()) {
            $this->addFlash('notice', 'Votre message a bien été envoyé');
            return $this->redirectToRoute('handissimo_structure');
        }

        return $this->render(':front:structurePage.html.twig', array(
            'form' => $form->createView()
        ));
    }


    public function standardPageAction(Organizations $organization){
        $repository = $this->getDoctrine()->getRepository('HandissimoBundle:Media');
        //$pictures = $repository->findByCaroussel(1);
        $organizationsId = $organization->getId();
        $pictures = $repository->getImageByOrganizations($organizationsId);

        $user = $this->getUser();
        $comment = new Comment();
        $comment->setOrganizationsComment($organization);
        $form = $this->createForm('HandissimoBundle\Form\Type\CommentType', $comment);

        $formHandler = new Handler\CommentHandler($form, $this->get('request'), $this->get('doctrine.orm.default_entity_manager'));

        if ($formHandler->process()) {

            return $this->redirectToRoute('structure_page', array('id' => $organization->getId()));
        }

        $comments = $organization->getComments();
        return $this->render(':front:organizationPage.html.twig', array(
            'form' => $form->createView(),
            'pictures' => $pictures,
            'user' => $user,
            'organization' => $organization,
            'comments' => $comments,
        ));


        //return new Response($organization);
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

}
