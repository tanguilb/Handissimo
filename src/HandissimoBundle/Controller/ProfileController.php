<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 27/03/17
 * Time: 12:25
 */

namespace HandissimoBundle\Controller;


use HandissimoBundle\Entity\DisabilityTypes;
use HandissimoBundle\Entity\Needs;
use HandissimoBundle\Entity\Organizations;
use HandissimoBundle\Entity\OtherJob;
use HandissimoBundle\Entity\SecondaryNeeds;
use HandissimoBundle\Entity\SocialStaff;
use HandissimoBundle\Entity\Staff;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends Controller
{
    public function profileSearchAction(Request $request)
    {
        if($this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            $form = $this->createForm('HandissimoBundle\Form\Type\ProfileSearchType');
            $form->handleRequest($request);

            $em = $this->getDoctrine()->getManager();
            $results = "";
            $message="";
            if ($form->isSubmitted() && $form->isValid()) {
                $data = $form->getData()['profileSearch'];
                $results = $em->getRepository('HandissimoBundle:Organizations')->getByOrganizationsProfile($data);

                if (count($results) === 1) {
                    return $this->redirectToRoute('structure_page', array('id' => $results[0]->getId()));
                }

                if (count($results) === 0) {
                    $message = "Il n’y a pas de résultat. Vous pouvez créer votre fiche.";
                }
                return $this->render(':front/profile:profile-search.html.twig', array(
                    'form' => $form->createView(),
                    'results' => $results,
                    'profileSearch' => $data,
                    'message' => $message
                ));
            }
            return $this->render(':front/profile:profile-search.html.twig', array(
                'form' => $form->createView(),
                'results' => $results,
                'message' => $message
            ));
        }
        return $this->redirectToRoute('sonata_user_profile_show');
    }

    public function solutionFormAction()
    {
        if($this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return $this->render('front/profile/profile-solution.html.twig');
        }
        return $this->redirectToRoute('sonata_user_profile_show');
    }

    public function listUserCardAction()
    {
        if($this->get('security.authorization_checker')->isGranted('ROLE_USER')) {

            /**
             * Action for recovery all contributions for organizations by user
             */
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            if ($user->getContribution() != null) {
                $contributions = $user->getContribution();
                $contributionsKey = array_keys($contributions);
                $organizations = [];
                $existedOrganizations = [];

                foreach ($contributionsKey as $contribution) {
                    array_push($organizations, $this->getDoctrine()->getRepository('HandissimoBundle:Organizations')->findBy(['name' => $contribution]));
                }
                foreach ($organizations as $organization) {
                    foreach ($organization as $entity) {
                        array_push($existedOrganizations, $entity->getName());
                    }
                }
                $deletedResult = array_diff($contributionsKey, $existedOrganizations);

                return $this->render('front/profile/profile-list-user-card.html.twig', array(
                    'organizations' => $organizations,
                    'deletedResult' => $deletedResult
                ));
            }
        }
        return $this->redirectToRoute('sonata_user_profile_show');
    }

    public function profileCommentAction()
    {
        if($this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            $user = $this->container->get('security.token_storage')->getToken()->getUser()->getUsernameCanonical();
            $comments = $this->getDoctrine()->getRepository('HandissimoBundle:Comment')->getCommentsByUser($user);
            return $this->render(':front/profile:profile-comment.html.twig', array(
                'comments' => $comments
            ));
        }
        return $this->redirectToRoute('sonata_user_profile_show');
    }

    public function organizationsVersionAction($id)
    {
        if($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            $em = $this->getDoctrine()->getManager();
            $query = 'SELECT * FROM organizations_audit WHERE organizations_audit.id = ' . $id . ' ORDER BY organizations_audit.rev DESC';
            $statement = $em->getConnection()->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();

            return $this->render(':front/profile:profile-version.html.twig', array(
                'result' => $result,
            ));
        }
        return $this->redirectToRoute('sonata_user_profile_show');
    }

    public function listOrganizationsAction(Request $request)
    {
        if($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            $organizationsHistory = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations')->findAllOrganizations();
            $paginator = $this->get('knp_paginator');
            $pagination = $paginator->paginate($organizationsHistory, $request->query->getInt('page', 1), 50);

            return $this->render(':front/profile:profile-list.html.twig', array(
                'pagination' => $pagination

            ));
        }
        return $this->redirectToRoute('sonata_user_profile_show');
    }

    public function viewDetailOldAction(Organizations $organizations, $rev)
    {
        if($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            $organisationId = $organizations->getId();
            $auditReader = $this->container->get('simplethings_entityaudit.reader');
            $current = $auditReader->getCurrentRevision(Organizations::class, $organisationId);

            $diff = $auditReader->diff(Organizations::class, $organisationId, $rev, $current);
            $difference = $this->container->get('handissimo.audit_difference');

            $disabilities = $difference->differenceBetweenOrganizations($diff['disabilities'], DisabilityTypes::class);
            $needs = $difference->differenceBetweenOrganizations($diff['primaryNeeds'], Needs::class);
            $secondNeeds = $difference->differenceBetweenOrganizations($diff['secondaryNeeds'], SecondaryNeeds::class);
            $medicalJob = $difference->differenceBetweenOrganizations($diff['medicalJob'], Staff::class);
            $socialJob = $difference->differenceBetweenOrganizations($diff['socialJob'], SocialStaff::class);
            $communJob = $difference->differenceBetweenOrganizations($diff['communJob'], OtherJob::class);

            return $this->render(':front/profile:profile-view-old-detail.html.twig', array(
                'diff' => $diff,
                'disabilities' => $disabilities,
                'needs' => $needs,
                'secondNeeds' =>  $secondNeeds,
                'medicalJob' =>  $medicalJob,
                'socialJob' => $socialJob,
                'communJob' => $communJob,
                'rev' => $rev
            ));

        }
        return $this->redirectToRoute('sonata_user_profile_show');
    }

    public function viewCurrentOrganizationsAction($id)
    {
        if($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            $result = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations')->find($id);

            return $this->render(':front/profile:profile-view-detail.html.twig', array(
                'result' => $result
            ));
        }
        return $this->redirectToRoute('sonata_user_profile_show');
    }

    public function deletionListOrganizationsAction(Request $request)
    {
        if($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
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
        return $this->redirectToRoute('sonata_user_profile_show');
    }

    public function deletionDetailAction($rev)
    {
        if($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            $em = $this->getDoctrine()->getManager();
            $query = 'SELECT * FROM organizations_audit WHERE organizations_audit.rev = ' . $rev . ' ORDER BY organizations_audit.update_datetime DESC';
            $statement = $em->getConnection()->prepare($query);
            $statement->execute();
            $array = $statement->fetchAll();
            $resultSql = $array[0];
            $auditReader = $this->container->get('simplethings_entityaudit.reader');
            $result = $auditReader->find(Organizations::class, $resultSql['id'], $resultSql['rev']);

            $relation = $this->container->get('handissimo.audit_relation');
            $disabilities = $relation->extractionOfRelation($result->getDisabilities(), DisabilityTypes::class);
            $needs = $relation->extractionOfRelation($result->getPrimaryNeeds(), Needs::class);
            $secondaryNeeds = $relation->extractionOfRelation($result->getSecondaryNeeds(), SecondaryNeeds::class);
            $medicalJobs = $relation->extractionOfRelation($result->getMedicalJob(), Staff::class);
            $socialJobs = $relation->extractionOfRelation($result->getSocialJob(), SocialStaff::class);
            $communJobs = $relation->extractionOfRelation($result->getCommunJob(), OtherJob::class);

            return $this->render(':front/profile:profile-detail-deletion.html.twig', array(
                'result' => $result,
                'disabilities' => $disabilities,
                'needs' => $needs,
                'secondaryNeeds' => $secondaryNeeds,
                'medicalJobs' => $medicalJobs,
                'socialJobs' => $socialJobs,
                'communJobs' => $communJobs
            ));
        }
        return $this->redirectToRoute('sonata_user_profile_show');
    }

    public function listOrganizationsByContributorAction(Request $request)
    {
        if($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            $organizationsHistory = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations')->findAllOrganizations();
            $paginator = $this->get('knp_paginator');
            $pagination = $paginator->paginate($organizationsHistory, $request->query->getInt('page', 1), 50);

            return $this->render(':front/profile:profile-list-contributor.html.twig', array(
                'pagination' => $pagination

            ));
        }
        return $this->redirectToRoute('sonata_user_profile_show');
    }

    public function viewDetailByContributorAction($id)
    {
        if($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            $organization = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations')->find($id);
            $name = $organization->getName();
            $contributions = $this->getDoctrine()->getRepository('ApplicationSonataUserBundle:User')->getUserByOrganization();
            $result = [];
            foreach ($contributions as $contribution) {
                $user = $contribution['username'];
                if (array_key_exists($name, $contribution['contribution']) == true) {
                    $result[$user] = $contribution['contribution'][$name];
                }
            }
            return $this->render('front/profile/profile-detail-contributor.html.twig', array(
                'result' => $result,
                'organization' => $organization
            ));
        }
        return $this->redirectToRoute('sonata_user_profile_show');
    }

    public function deleteHistoryAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $em->getConnection()->beginTransaction();

        try {
            $query = 'DELETE FROM organizations_audit WHERE organizations_audit.id = ' .$id. ' AND organizations_audit.pins = 0';
            $statement = $em->getConnection()->prepare($query);
            $statement->execute();
            $em->getConnection()->commit();
            return $this->redirectToRoute('handissimo_profile_version', array('id' => $id));
        } catch (\Exception $exception) {
            $em->getConnection()->rollback();
            throw $exception;
        }
    }

    public function showCommentsAction(Request $request)
    {
        if($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            $comments = $this->getDoctrine()->getRepository('HandissimoBundle:Comment')->getCommentsOrderByDate();
            $paginator = $this->get('knp_paginator');
            $pagination = $paginator->paginate($comments, $request->query->getInt('page', 1), 10);

            return $this->render('front/profile/profile-admin-comment.html.twig', array(
                'pagination' => $pagination
            ));
        }
        return $this->redirectToRoute('sonata_user_profile_show');
    }

    public function desactivateAccountAction($user_id)
    {
        $useManager = $this->container->get('fos_user.user_manager');
        $user = $this->getDoctrine()->getRepository('ApplicationSonataUserBundle:User')->find($user_id);
        $user->setEnabled(0);
        $useManager->updateUser($user);
        return $this->redirectToRoute('index_action');
    }
}