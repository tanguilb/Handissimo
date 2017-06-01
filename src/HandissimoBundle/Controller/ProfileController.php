<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 27/03/17
 * Time: 12:25
 */

namespace HandissimoBundle\Controller;


use Doctrine\ORM\Query\Expr\Select;
use HandissimoBundle\Entity\Organizations;
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

    public function organizationsVersionAction(Organizations $organizations)
    {
        $organisationId = $organizations->getId();
        $em = $this->getDoctrine()->getManager();
        $query = 'SELECT * FROM organizations_audit WHERE organizations_audit.id = ' . $organisationId;
        $statement = $em->getConnection()->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();

        return $this->render(':front/profile:profile-version.html.twig', array(
            'result' => $result,
        ));
    }

    public function listOrganizationsAction(Request $request)
    {
        $organizationsHistory = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations')->findAllOrganizations();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($organizationsHistory, $request->query->getInt('page', 1), 50);

        return $this->render(':front/profile:profile-list.html.twig', array(
            'pagination' => $pagination

        ));
    }

    public function viewDetailAction(Organizations $organizations)
    {
        $organisationId = $organizations->getId();
        $auditReader = $this->container->get('simplethings_entityaudit.reader');
        //$test = $auditReader->findEntitiesChangedAtRevision(10);
        //$test = $auditReader->getCurrentRevision(Organizations::class, $organisationId);
        //$test = $auditReader->getEntityValues("name",Organizations::class);
        //$test = $auditReader->isLoadAuditedCollections();
        //var_dump($test);die();
        //$test = $auditReader->findRevisions(Organizations::class,$organisationId);
        //$result = $auditReader->getEntityHistory(Organizations::class, $organisationId);
        $result = $auditReader->diff(Organizations::class, $organisationId, 3,6);

        return $this->render(':front/profile:profile-view-detail.html.twig', array(
            'result' => $result
        ));
    }

    public function viewCurrentOrganizationsAction(Organizations $organizations)
    {
        $organisationId = $organizations->getId();
        $result = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations')->find($organisationId);

        return $this->render(':front/profile:profile-view-detail.html.twig', array(
            'result' => $result
        ));
    }
}