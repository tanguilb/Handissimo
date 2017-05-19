<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 18/05/17
 * Time: 14:17
 */

namespace HandissimoBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use HandissimoBundle\Entity\Organizations;
use HandissimoBundle\Entity\UserSearch;

class SearchController extends Controller
{
    public function indexAction(Request $request)
    {
        $form = $this->createForm('HandissimoBundle\Form\Type\ResearchType');
        $formQuick = $this->createForm('HandissimoBundle\Form\Type\OrganizationNameSearchType');

        $form->handleRequest($request);
        $formQuick->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        if($form->isSubmitted() && $form->isValid())
        {
            $location = $form->getData()['postal'];
            $age = $form->getData()['age'];
            $need = $form->getData()['need'];
            $disability = $form->getData()['disability'];
            $structure = $form->getData()['structure'];
            $this->get('session')->set('location', $location);
            $this->get('session')->set('age', $age);
            $this->get('session')->set('need', $need);
            $this->get('session')->set('disability', $disability);
            $this->get('session')->set('structure', $structure);
            $lat = $em->getRepository('HandissimoBundle:City')->getLatitude($location);
            $long = $em->getRepository('HandissimoBundle:City')->getLongitude($location);

            $rlat = null;
            $rlong = null;
            if(!empty($lat) and !empty($long))
            {
                $rlat = $lat[0]['latitude'];
                $rlong = $long[0]['longitude'];
            }
            $result = $em->getRepository('HandissimoBundle:Organizations')->getNearBy($rlat, $rlong, $age, $need, $disability, $structure);

            $sort = $this->container->get('handissimo.sort_research');

            $finalResult = $sort->sortSearchResult($result, $need, $disability, $structure);

            $this->get('session')->set('result', $finalResult);
            $paginator = $this->get('knp_paginator');
            $pagination = $paginator->paginate($result, $request->query->getInt('page', 1), 50);
            $this->get('session')->set('pagination', $pagination);
            $pagination->setUsedRoute('research_action');
            if (count($result) === 1)
            {
                return $this->redirectToRoute('structure_page', array('id' => $result[0]['id']));
            }else {
                return $this->redirectToRoute('research_action');
            }
        } elseif($formQuick->isSubmitted() && $formQuick->isValid()) {
            $structure = $formQuick->getData()['organizationName'];
            $test = preg_split('/[()]/', $structure);
            $result = $em->getRepository('HandissimoBundle:Organizations')->getByName($test[0], $test[1]);
            return $this->redirectToRoute('structure_page', array('id' => $result->getId()));
        }
        $carousel = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations')->getFirstPictureByOrrganizations(6);
        $repository = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations');
        $organizations = $repository->findAll();

        $statUser = $this->getDoctrine()->getRepository('ApplicationSonataUserBundle:User')->findAll();
        $statOrganizations = $repository->getAllOrganizations();
        return $this->render('front/index.html.twig', array(
            'formQuick' => $formQuick->createView(),
            'form' => $form->createView(),
            'carousel' => $carousel,
            'organizations' => $organizations,
            'statUser' => $statUser,
            'statOrganizations' => $statOrganizations
        ));
    }

    public function researchAction(Request $request)
    {
        $session = $request->getSession();

        $result = $session->get('result');
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($result, $request->query->getInt('page', 1), 50);
        $repository = $this->getDoctrine()->getRepository('HandissimoBundle:Media');
        $pictures = $repository->findAll();

        /**
         * Method for saving user searches in database
         */
        $em = $this->getDoctrine()->getManager();
        $userSearch = new UserSearch();

        $location = $session->get('location');
        $age = $session->get('age');
        $disability = $session->get('disability');
        $disabilities="";
        if ($disability != null){
            for ($key = 0; $key < count($disability); $key++) {
                if (count($disability) == 0) {
                    $disabilities = $disability;
                }else{
                    $disabilities .= $disability[$key]." ";
                }
            }
        }

        $need = $session->get('need');
        $structure = $session->get('structure');
        $structures="";
        if ($structure != null){
            for ($key = 0; $key < count($structure); $key++) {
                if (count($structure) == 0) {
                    $structures = $structure;
                } else {
                    $structures .= $structure[$key] . " ";
                }
            }
        }
        $numberResult = $pagination->getTotalItemCount();
        $test = $this->getDoctrine()->getRepository('HandissimoBundle:UserSearch')->findUserSearches($location, $age, $need, $disabilities, $structures, $numberResult);
        for ($key =0;$key<count($test);$key++) {
            if (
                $location == $test[$key]['location'] &&
                $age == $test[$key]['age'] &&
                $disabilities == $test[$key]['disability'] &&
                $need == $test[$key]['need'] &&
                $structures == $test[$key]['structure'] &&
                $pagination->getTotalItemCount() == $test[$key]['numberResult']
            ) {
                $id = $test[$key]['id'];
                $updateCount = $this->getDoctrine()->getRepository('HandissimoBundle:UserSearch')->find($id);
                $count = $updateCount->getCountRepetition();
                $updateCount->setCountRepetition($count + 1);
                $em->persist($updateCount);
                $em->flush();
            }
        }
        if ($test == null ) {
            $userSearch->setLocation($session->get('location'));
            $userSearch->setAge($session->get('age'));
            $userSearch->setNeed($session->get('need'));
            $userSearch->setDisability($disabilities);
            $userSearch->setStructure($structures);
            $userSearch->setNumberResult($pagination->getTotalItemCount());
            $em->persist($userSearch);
            $em->flush();
        }

        return $this->render('front/search.html.twig', array(
            'picture' => $pictures,
            'location' => $session->get('location'),
            'age' => $session->get('age'),
            'need' => $session->get('need'),
            'disability' => $session->get('disability'),
            'structure' => $session->get('structure'),
            'pagination' => $pagination,
            'result' => $result,
        ));
    }

}