<?php

namespace HandissimoBundle\Controller;


use HandissimoBundle\Entity\Organizations;
use HandissimoBundle\Entity\UserSearch;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpFoundation\Session\Session;

class AjaxController extends Controller
{

    public function indexAction(Request $request)
    {
        $form = $this->createForm('HandissimoBundle\Form\Type\ResearchType');
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        if($form->isSubmitted() && $form->isValid())
        {
            //var_dump($form);die();
            $location = $form->getData()['postal'];
            $age = $form->getData()['age'];
            $need = $form->getData()['need'];
            $disability = $form->getData()['disability'];
            //var_dump($disability);
            $structure = $form->getData()['structure'];
            //var_dump($structure);die();
            //var_dump(count($disability));
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
            $this->get('session')->set('result', $result);
            $paginator = $this->get('knp_paginator');
            $pagination = $paginator->paginate($result, $request->query->getInt('page', 1), 50);
            $this->get('session')->set('pagination', $pagination);
            $pagination->setUsedRoute('research_action');

            return $this->redirectToRoute('research_action');
        }
        $carousel = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations')->getFirstPictureByOrrganizations(6);
        $repository = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations');
        $organizations = $repository->findAll();

        $statUser = $this->getDoctrine()->getRepository('ApplicationSonataUserBundle:User')->findAll();
        $statOrganizations = $repository->getAllOrganizations();
        return $this->render('front/index.html.twig', array(
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
        /*$em = $this->getDoctrine()->getManager();
        $userSearch = new UserSearch();

        $location = $session->get('location');
        $age = $session->get('age');
        $disability = $session->get('disability');
        $need = $session->get('need');
        $structure = $session->get('structure');
        $numberResult = $pagination->getTotalItemCount();
        $test = $this->getDoctrine()->getRepository('HandissimoBundle:UserSearch')->findUserSearches($location, $age, $need, $disability, $structure, $numberResult);

        for ($key =0;$key<count($test);$key++) {
            if (
                $session->get('location') == $test[$key]['location'] &&
                $session->get('age') == $test[$key]['age'] &&
                $session->get('disability') == $test[$key]['disability'] &&
                $session->get('need') == $test[$key]['need'] &&
                $session->get('structure') == $test[$key]['structure'] &&
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
            if ($test == null ){
                $userSearch->setLocation($session->get('location'));
                $userSearch->setAge($session->get('age'));
                $userSearch->setNeed($session->get('need'));
                if ($session->get('disability') != null)
                    $userSearch->setDisability($session->get('disability')->getDisabilityName());
                if ($session->get('structure') != null) {
                    $userSearch->setStructure($session->get('structure')->getName());
                }
                $userSearch->setNumberResult($pagination->getTotalItemCount());
                $em->persist($userSearch);
                $em->flush();
            }
*/
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

    public function searchByCityAction(Request $request, $city)
    {
        if ($request->isXmlHttpRequest()) {
            $repository = $this->getDoctrine()->getRepository('HandissimoBundle:City');
            $location = $repository->getByCity($city);

            return new JsonResponse(array("data" => json_encode($location)));
        } else {
            throw  new HttpException('500', 'Invalid call');
        }
    }

    public function searchProfileAction(Request $request, $profileSearch)
    {
        if ($request->isXmlHttpRequest())
        {
            $repository = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations');
            $profile = $repository->getSearchProfile($profileSearch);

            return new JsonResponse(array("data" => json_encode($profile)));
        }else{
            throw new \HttpException('500', 'Invalid call');
        }
    }

    public function emailAction(Request $request, $id)
    {
        if($request->isXmlHttpRequest())
        {
            $repository = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations');
            $email = $repository->getEmailByOrganization($id);

            return new JsonResponse(array("data" => json_encode($email)));
        }else {
            throw new \HttpException('500', 'Invalid call');
        }
    }

}