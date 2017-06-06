<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 27/03/17
 * Time: 12:25
 */

namespace HandissimoBundle\Controller;


use HandissimoBundle\Entity\Organizations;
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

    public function listUserCardAction()
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser()->getUsernameCanonical();
        $em = $this->getDoctrine()->getManager();

        /**
         * Action for recovery all contributions for organizations by user
         */
        $query = 'SELECT * FROM organizations_audit WHERE organizations_audit.user = "' . $user . '" GROUP BY organizations_audit.id ORDER BY organizations_audit.update_datetime DESC';
        $statement = $em->getConnection()->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $arrayId=[];
        for ($key = 0; $key < count($result); $key++){
            array_push($arrayId, $result[$key]['id']);
        }
        $organizations=[];
        for ($k = 0; $k < count($arrayId); $k++){
            array_push($organizations, $this->getDoctrine()->getRepository('HandissimoBundle:Organizations')->find($arrayId[$k]));
        }

        /**
         * Method for recovery all contributions deleted by user
         */
        $queryTwo = 'SELECT * FROM organizations_audit WHERE organizations_audit.user = "' . $user . '" AND organizations_audit.revtype = "DEL" GROUP BY organizations_audit.id ORDER BY organizations_audit.update_datetime DESC';
        $statementTwo = $em->getConnection()->prepare($queryTwo);
        $statementTwo->execute();
        $deletedOrganizations = $statementTwo->fetchAll();
        $deletedResult =[];
        for ($key = 0; $key < count($deletedOrganizations); $key++){
            array_push($deletedResult, $deletedOrganizations[$key]['name']);
        }

        return $this->render('front/profile/profile-list-user-card.html.twig', array(
            'organizations' => $organizations,
            'deletedResult' => $deletedResult
        ));
    }

    public function profileCommentAction()
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser()->getUsernameCanonical();
        $comments = $this->getDoctrine()->getRepository('HandissimoBundle:Comment')->getCommentsByUser($user);

        return $this->render(':front/profile:profile-comment.html.twig', array(
            'comments' => $comments
        ));
    }

    public function organizationsVersionAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $query = 'SELECT * FROM organizations_audit WHERE organizations_audit.id = ' . $id . ' ORDER BY organizations_audit.update_datetime DESC';
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

    public function viewCurrentOrganizationsAction($id)
    {
        $result = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations')->find($id);

        return $this->render(':front/profile:profile-view-detail.html.twig', array(
            'result' => $result
        ));
    }

    public function deletionListOrganizationsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = 'SELECT * FROM organizations_audit WHERE organizations_audit.revtype = "DEL" ORDER BY organizations_audit.update_datetime DESC';
        $statement = $em->getConnection()->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($result, $request->query->getInt('page', 1), 50);

        return $this->render(':front/profile:profile-list-deletion.html.twig', array(
            'pagination' => $pagination,
        ));
    }

    public function deletionDetailAction($rev)
    {
        $em = $this->getDoctrine()->getManager();
        $query = 'SELECT * FROM organizations_audit WHERE organizations_audit.rev = ' . $rev . ' ORDER BY organizations_audit.update_datetime DESC';
        $statement = $em->getConnection()->prepare($query);
        $statement->execute();
        $array = $statement->fetchAll();
        $resultSql = $array[0];
        $auditReader = $this->container->get('simplethings_entityaudit.reader');
        $result = $auditReader->find(Organizations::class, $resultSql['id'], $resultSql['rev']);

        return $this->render(':front/profile:profile-detail-deletion.html.twig', array(
            'result' => $result,
        ));
    }
}