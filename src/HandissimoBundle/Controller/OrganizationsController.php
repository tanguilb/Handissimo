<?php

namespace HandissimoBundle\Controller;

use Application\Sonata\UserBundle\Entity\User;
use Doctrine\ORM\EntityManager;
use HandissimoBundle\Entity\Organizations;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Organization controller.
 *
 */
class OrganizationsController extends Controller
{

    /**
     * Creates a new organization entity.
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $organization = new Organizations();
        $form = $this->createForm('HandissimoBundle\Form\Type\OrganizationsType', $organization);
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $userGrade = $user->getGrade();

        $lastDate = $user->getLastDate();
        $participation = $user->getParticipation();
        $date = date('Y-m-d H:i:s');
        $lastDateSec = strtotime($lastDate);
        $dateSec = strtotime($date);
        $diff = $dateSec - $lastDateSec;

        if($userGrade === 'Novice'){
            $nbParticipation = 20;
        } elseif ($userGrade === 'Confirmé'){
            $nbParticipation = 50;
        } elseif ($userGrade === 'Expert'){
            $nbParticipation = 500;
        } else {
            $nbParticipation = 10;
        }
        if ($diff < 48600){
            if($participation < $nbParticipation){
                $formHandler = new \HandissimoBundle\Form\Handler\OrganizationsHandler($form, $request, $this->get('doctrine.orm.default_entity_manager'), $this->get('service_container'), $organization, $nbParticipation);
                if ($formHandler->process()){
                    $this->addFlash('notice', 'Bravo, La fiche a été mise en ligne.');
                    $mailer = $this->container->get('handissimo.mailer.participation');
                    $sendMail = $mailer->sendEmailParticipation();
                    return $this->redirectToRoute('sonata_user_profile_edit');
                }
            } else {
                return $this->render('front/profile/profile-participation-edit.html.twig', array('nbParticipation' => $nbParticipation, 'userGrade' => $userGrade));
            }
        } elseif($diff > 48600)
        {
            $formHandler = new \HandissimoBundle\Form\Handler\OrganizationsHandler($form, $request, $this->get('doctrine.orm.default_entity_manager'), $this->get('service_container'), $organization);
            if ($formHandler->process()){
                $this->addFlash('notice', 'Bravo, la fiche a été mise en ligne.');
                $mailer = $this->container->get('handissimo.mailer.participation');
                $sendMail = $mailer->sendEmailParticipation();
                return $this->redirectToRoute('sonata_user_profile_edit');
            }
        }
        return $this->render('organizations/new.html.twig', array(
            'organization' => $organization,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing organization entity.
     * @param Request $request
     * @param Organizations $organization
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, Organizations $organization)
    {
        $em = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations');
        $pictures = $em->getMediaByOrganizations($organization->getId());
        $deleteForm = $this->createDeleteForm($organization);
        $editForm = $this->createForm('HandissimoBundle\Form\Type\OrganizationsType', $organization);
        $user = $this->getUser();
        $formHandler = new \HandissimoBundle\Form\Handler\OrganizationsHandler($editForm, $request, $this->get('doctrine.orm.default_entity_manager'), $this->get('service_container'), $organization);
        if ($formHandler->process()){
            $this->addFlash('edit', 'Vos modifications ont bien été prises en compte. Merci pour votre participation.');
            $mailer = $this->container->get('handissimo.mailer.participation');
            $sendMail = $mailer->sendEmailParticipation();
            return $this->redirectToRoute('sonata_user_profile_edit');
        }

        $emuser = $this->getDoctrine()->getRepository('ApplicationSonataUserBundle:User');
        $usero = $emuser->getOrganizationsByUser($organization->getId());

        if (!empty($usero)){
            foreach ($usero as $userid)
            {
                foreach ($this->container->get('security.token_storage')->getToken()->getRoles() as $role)
                {
                    if($this->container->get('security.token_storage')->getToken()->getUser()->getId() === $userid->getId() or $role->getRole() === "ROLE_SUPER_ADMIN")
                    {
                        return $this->render('organizations/edit.html.twig', array(
                            'pictures' => $pictures,
                            'user' => $user,
                            'usero' => $usero,
                            'organization' => $organization,
                            'edit_form' => $editForm->createView(),
                            'delete_form' => $deleteForm->createView(),
                        ));
                    }
                }
            }
            return $this->render(':front/profile:profile-dont-edit.html.twig');
        }

        $userGrade = $user->getGrade();

        $lastDate = $user->getLastDate();
        $participation = $user->getParticipation();
        $date = date('Y-m-d H:i:s');
        $lastDateSec = strtotime($lastDate);
        $dateSec = strtotime($date);
        $diff = $dateSec - $lastDateSec;

        if($userGrade === 'Novice'){
            $nbParticipation = 20;
        } elseif ($userGrade === 'Confirmé'){
            $nbParticipation = 50;
        } elseif ($userGrade === 'Expert'){
            $nbParticipation = 500;
        } else {
            $nbParticipation = 10;
        }
        if ($diff < 4860){
            if($participation < $nbParticipation){
                $formHandler = new \HandissimoBundle\Form\Handler\OrganizationsHandler($editForm, $request, $this->get('doctrine.orm.default_entity_manager'), $this->get('service_container'), $organization);
                if ($formHandler->process()){
                    $this->addFlash('notice', 'La fiche a bien été créé');
                    $mailer = $this->container->get('handissimo.mailer.participation');
                    $sendMail = $mailer->sendEmailParticipation();
                    return $this->redirectToRoute('sonata_user_profile_edit');
                }
            } else {
                return $this->render('front/profile/profile-dont-edit.html.twig');
            }
        } elseif($diff > 48600)
        {
            $formHandler = new \HandissimoBundle\Form\Handler\OrganizationsHandler($editForm, $request, $this->get('doctrine.orm.default_entity_manager'), $this->get('service_container'), $organization);
            if ($formHandler->process()){
                $this->addFlash('notice', 'La fiche a bien été créé');
                $mailer = $this->container->get('handissimo.mailer.participation');
                $sendMail = $mailer->sendEmailParticipation();
                return $this->redirectToRoute('sonata_user_profile_edit');
            }
        }

        return $this->render('organizations/edit.html.twig', array(
            'pictures' => $pictures,
            'user' => $user,
            'organization' => $organization,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a organization entity.
     * @param Request $request
     * @param Organizations $organization
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Request $request, Organizations $organization)
    {
        $form = $this->createDeleteForm($organization);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($organization);
            $em->flush();
        }
        return $this->redirectToRoute('sonata_user_profile_show');
    }

    /**
     * Creates a form to delete a organization entity.
     *
     * @param Organizations $organization The organization entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Organizations $organization)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('organizations_delete', array('id' => $organization->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}