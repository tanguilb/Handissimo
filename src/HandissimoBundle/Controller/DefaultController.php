<?php

namespace HandissimoBundle\Controller;

use HandissimoBundle\Entity\AlertContent;
use HandissimoBundle\Entity\Organizations;
use HandissimoBundle\Entity\Solution;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
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

    public function standardPageAction(Organizations $organization, $id)
    {
        $arraypicture = array();
        $firstPicture = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations')->getFirstPicture($id);
        if($firstPicture->getFirstPicture() !== null)
        {
            array_push($arraypicture, 'uploads/first_image/' . $firstPicture->getFirstPicture());
        } elseif ($organization->getOrgaStructure() !== null) {
            if ($organization->getOrgaStructure()->getType() !==null ) {
                if ($organization->getOrgaStructure()->getType()->getPicture() !== null) {
                    array_push($arraypicture, 'uploads/etablissement/' . $organization->getOrgaStructure()->getType()->getPicture());
                } else {
                    array_push($arraypicture, 'images/Etablissement.jpeg');
                }
            } else {
                array_push($arraypicture, 'images/Etablissement.jpeg');
            }
        } else {
            array_push($arraypicture, 'images/Etablissement.jpeg');
        }

        $picture = $this->getDoctrine()->getRepository('HandissimoBundle:Media')->getImageByOrganizations($id);

        foreach ($picture as $pictures)
        {
            array_push($arraypicture, 'uploads/image/' . $pictures->getFileName());
        }

        $user = $this->getUser();
        $emuser = $this->getDoctrine()->getRepository('ApplicationSonataUserBundle:User');
        $usero = $emuser->getOrganizationsByUser($id);

        $comment = new Comment();
        $comment->setOrganizationsComment($organization);
        $form = $this->createForm('HandissimoBundle\Form\Type\CommentType', $comment);

        $alertContent = new AlertContent();
        $alertForm = $this->createForm('HandissimoBundle\Form\Type\AlertContentType', $alertContent);

        $formHandler = new Handler\CommentHandler($form, $this->get('request'), $this->get('doctrine.orm.default_entity_manager'));
        $alertFormHandler = new Handler\AlertContentHandler($alertForm, $this->get('request'), $this->get('doctrine.orm.default_entity_manager'), $this->get('service_container'), $alertContent, $organization);

        if ($formHandler->process()) {

            return $this->redirectToRoute('structure_page', array('id' => $organization->getId()));
        } else if ($alertFormHandler->process()) {
            return new JsonResponse(array('message' => 'Votre message a bien été envoyé. Merci !'), 200);
        }

        $comments = $organization->getComments();

        return $this->render(':front:organizationPage.html.twig', array(
            'form' => $form->createView(),
            'pictures' => $arraypicture,
            'user' => $user,
            'usero' => $usero,
            'organization' => $organization,
            'comments' => $comments,
            //'alertForm' => $alertForm
        ));
    }

    public function viewPreviewAction($data)
    {
        var_dump($data);
        return $this->render('front/preview.html.twig', array(
            'data' => $data,
        ));
    }
}
