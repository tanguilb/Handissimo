<?php

namespace HandissimoBundle\Controller;


use HandissimoBundle\Entity\DisabilityTypes;
use HandissimoBundle\Entity\Organizations;
use HandissimoBundle\Repository\DisabilityTypesRepository;
use HandissimoBundle\Repository\NeedsRepository;
use HandissimoBundle\Repository\OrganizationsRepository;
use HandissimoBundle\Repository\StaffRepository;
use HandissimoBundle\Repository\StructuresListRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use HandissimoBundle\Form\AdvancedSearchType;
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

            $rlat = $lat[0]['latitude'];
            $rlong = $long[0]['longitude'];

            $result = $em->getRepository('HandissimoBundle:Organizations')->getNearBy($rlat, $rlong/*, $age, $need, $disability, $structure*/);

           // $result = $em->getRepository('HandissimoBundle:Organizations')->getBySearchEngine($location, $age, $need, $disability, $structure);
            $this->get('session')->set('result', $result);
            $paginator = $this->get('knp_paginator');
            $pagination = $paginator->paginate($result, $request->query->getInt('page', 1), 10);
            $this->get('session')->set('pagination', $pagination);
            $pagination->setUsedRoute('research_action');

            return $this->redirectToRoute('research_action');
        }
        $carousel = $this->getDoctrine()->getRepository('HandissimoBundle:Media')->getLastOrganizations(6);
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

        $repository = $this->getDoctrine()->getRepository('HandissimoBundle:Media');
        $pictures = $repository->findByFirstPicture(1);

        $result = $session->get('result');
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($result, $request->query->getInt('page', 1), 10);

        return $this->render('front/search.html.twig', array(
            'picture' => $pictures,
            'location' => $session->get('location'),
            'age' => $session->get('age'),
            'need' => $session->get('need'),
            'disability' => $session->get('disability'),
            'structure' => $session->get('structure'),
            'pagination' => $pagination,
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

}