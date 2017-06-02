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
        $query = 'SELECT * FROM organizations_audit WHERE organizations_audit.id = ' . $organisationId . ' ORDER BY organizations_audit.update_datetime DESC';
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

    public function viewDetailOldAction(Organizations $organizations, $rev)
    {
        //var_dump($rev);
        $organisationId = $organizations->getId();
        $auditReader = $this->container->get('simplethings_entityaudit.reader');
        //$test = $auditReader->findEntitiesChangedAtRevision(10);
        $test = $auditReader->getCurrentRevision(Organizations::class, $organisationId);
        //$test = $auditReader->findRevisions(Organizations::class, $organisationId);

        //$test = $auditReader->getEntityValues("name",Organizations::class);
        //$test = $auditReader->getEntityValues(Organizations::class, $organizations);
        //$test = $auditReader->isLoadAuditedCollections();
        //$test = $auditReader->findRevisions(Organizations::class,$organisationId);
        //var_dump($test);die();

        //$result = $auditReader->getEntityHistory(Organizations::class, $organisationId);
        //$result = $auditReader->diff(Organizations::class, $organisationId, 3,6);
        $diff = $auditReader->diff(Organizations::class, $organisationId, $rev, $test);
        /* traitement des données sur le handicap */
        $disabilityOld = $diff['disabilities']['old'];
        $disabilityNew = $diff['disabilities']['new'];
        $disabilitySame = $diff['disabilities']['same'];
        $disabilityS = array();
        $disabilityO = array();
        $disabilityN = array();
        $emDisability = $this->getDoctrine()->getRepository('HandissimoBundle:DisabilityTypes');
        $emNeeds = $this->getDoctrine()->getRepository('HandissimoBundle:Needs');
        if (!empty($disabilityOld))
        {
            foreach ($disabilityOld as $disabilitiesO)
            {
                $disabO = $emDisability->getDisability($disabilitiesO);
                array_push($disabilityO, $disabO);
            }
        }
        if (!empty($disabilityNew))
        {
            foreach ($disabilityNew as $disabilitiesN)
            {
                $disabN = $emDisability->getDisability($disabilitiesN);
                array_push($disabilityO, $disabN);
            }

        }
        if(!empty($disabilitySame))
        {
            foreach ($disabilitySame as $disabilitiesS)
            {

                $disabS = $emDisability->getDisability($disabilitiesS);
                array_push($disabilityS, $disabS);
            }
        }

        /* traitement des données sur les besoins primaires */
        var_dump($diff);
        $needsOld = $diff['primaryNeeds']['old'];
        $needsNew = $diff['primaryNeeds']['new'];
        $needsSame = $diff['primaryNeeds']['same'];
        $needsO = array();
        $needsN = array();
        $needsS = array();
        if(!empty($needsOld))
        {
            foreach ($needsOld as $needO)
            {
                $oldNeed = $emNeeds->getNeedsById($needO);
                array_push($needsO, $oldNeed);
            }
        }
        if(!empty($needsNew))
        {
            foreach ($needsNew as $needN)
            {
                $newNeed = $emNeeds->getNeedsById($needN);
                array_push($needsN, $newNeed);
            }
        }
        if(!empty($needsSame))
        {
            foreach ($needsSame as $needS)
            {
                $sameNeed = $emNeeds->getNeedsById($needS);
                array_push($needsS, $sameNeed);
            }
        }
        return $this->render(':front/profile:profile-view-old-detail.html.twig', array(
            'diff' => $diff,
            'disabilityS' => $disabilityS,
            'disabilityO' => $disabilityO,
            'disabilityN' => $disabilityN,
            'needsS' => $needsS,
            'needsN' => $needsN,
            'needsO' =>  $needsO,
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