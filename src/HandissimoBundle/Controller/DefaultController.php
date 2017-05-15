<?php

namespace HandissimoBundle\Controller;

use HandissimoBundle\Entity\Organizations;
use HandissimoBundle\Entity\Solution;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use HandissimoBundle\Entity\Comment;
use HandissimoBundle\Form\Handler;

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
        $organizationsId = $organization->getId();
        $arraypicture = array();
        $firstPicture = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations')->getFirstPicture($organizationsId);
        if($firstPicture->getFirstPicture() !== null)
        {
            array_push($arraypicture, 'uploads/first_image/' . $firstPicture->getFirstPicture());
        } else {
            if($organization->getOrgaStructure()->getId() === 1)
            {
                array_push($arraypicture, 'images/etablissement/Etablissemt_enfants_OK.png');
            }elseif($organization->getOrgaStructure()->getId() === 2)
            {
                array_push($arraypicture, 'images/etablissement/Etablissemt_Adulte_OK.png');
            }
            elseif($organization->getOrgaStructure()->getId() === 3)
            {
                array_push($arraypicture, 'images/etablissement/Reseau_entraide_OK.png');
            }
            elseif($organization->getOrgaStructure()->getId() === 4)
            {
                array_push($arraypicture, 'images/etablissement/Administration_OK.png');
            }
            elseif($organization->getOrgaStructure()->getId() === 5)
            {
                array_push($arraypicture, 'images/etablissement/Centre_ressources_OK.png');
            }
            elseif($organization->getOrgaStructure()->getId() === 6)
            {
                array_push($arraypicture, 'images/etablissement/Etablissemt_Petiteenfance_OK.png');
            }
            elseif($organization->getOrgaStructure()->getId() === 7)
            {
                array_push($arraypicture, 'images/etablissement/Ecole_OK.png');
            }
            elseif($organization->getOrgaStructure()->getId() === 8)
            {
                array_push($arraypicture, 'images/etablissement/Equipe_mobile_OK.png');
            }
            elseif($organization->getOrgaStructure()->getId() === 9)
            {
                array_push($arraypicture, 'images/etablissement/Service_enfants.png');
            }
            elseif($organization->getOrgaStructure()->getId() === 10)
            {
                array_push($arraypicture, 'images/etablissement/Service_adultes.png');
            }
            elseif($organization->getOrgaStructure()->getId() === 11)
            {
                array_push($arraypicture, 'images/etablissement/Hopitaux_OK.png');
            }
            else {
            array_push($arraypicture, 'images/etablissement/Etablissement.jpeg');
            }
        }
        $picture = $this->getDoctrine()->getRepository('HandissimoBundle:Media')->getImageByOrganizations($organizationsId);

        foreach ($picture as $pictures)
        {
            array_push($arraypicture, 'uploads/image/' . $pictures->getFileName());
        }

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
            'pictures' => $arraypicture,
            'user' => $user,
            'organization' => $organization,
            'comments' => $comments,
        ));
    }

}
