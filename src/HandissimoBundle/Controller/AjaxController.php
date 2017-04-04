<?php

namespace HandissimoBundle\Controller;


use HandissimoBundle\Entity\DisabilityTypes;
use HandissimoBundle\Entity\Organizations;
use HandissimoBundle\Repository\DisabilityTypesRepository;
use HandissimoBundle\Repository\NeedsRepository;
use HandissimoBundle\Repository\OrganizationsRepository;
use HandissimoBundle\Repository\StaffRepository;
use HandissimoBundle\Repository\StructuresListRepository;
use HandissimoBundle\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use HandissimoBundle\Form\AdvancedSearchType;

class AjaxController extends Controller
{
    public function researchAction(Request $request)
    {
        $form = $this->createForm('HandissimoBundle\Form\ResearchType');
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();

        $formAdvancedResearch = $this->createForm(AdvancedSearchType::class);
        $formAdvancedResearch->handleRequest($request);
        $repository = $this->getDoctrine()->getRepository('HandissimoBundle:Media');
        $pictures = $repository->findByFirstPicture(1);

        if ($form->isSubmitted() && $form->isValid()){

            $data = $form->getData();
            $age = $form->getData()['age'];

            /**
             * @var $repository OrganizationsRepository
             */
            $result = $em->getRepository('HandissimoBundle:Organizations')->getByOrganizationName($data, $age);
            $paginator  = $this->get('knp_paginator');
            $pagination = $paginator->paginate($result, $request->query->getInt('page', 1), 4);
            return $this->render('front/search.html.twig', array(
                'picture' => $pictures,
                'result' => $result,
                'keyword' => $data,
                'age' => $age,
                'pagination' => $pagination,
                'form' => $formAdvancedResearch->createView(),
            ));

        } elseif ($formAdvancedResearch->isSubmitted() && $formAdvancedResearch->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $data = $formAdvancedResearch->getData();
            $age = $form->getData()['age'];

            /**
             * @var $repository OrganizationsRepository
             */
            $result = $em->getRepository('HandissimoBundle:Organizations')->getByMultipleCriterias($data, $age);
            $paginator  = $this->get('knp_paginator');
            $pagination = $paginator->paginate($result, $request->query->getInt('page', 1), 4);
            return $this->render('front/search.html.twig', array(
                'result' => $result,
                'picture' => $pictures,
                'keyword' => $data,
                'age' => $age,
                'pagination' => $pagination,
                'form' => $formAdvancedResearch->createView(),
            ));
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

    public function autoCompleteAction(Request $request, $keyword)
    {
        if ($request->isXmlHttpRequest())
        {
            /**
             * @var $repository OrganizationsRepository
             */
            $repository = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations');
            $organization = $repository->getByOrganizations($keyword);

            /**
             * @var $repository NeedsRepository
             */
            $repository = $this->getDoctrine()->getRepository('HandissimoBundle:Needs');
            $needs = $repository->getByNeeds($keyword);

            /**
             * @var $repository DisabilityTypesRepository
             */
            $repository = $this->getDoctrine()->getRepository('HandissimoBundle:DisabilityTypes');
            $disability = $repository->getByDisability($keyword);

            /**
             * @var $repository StructuresListRepository
             */
            $repository = $this->getDoctrine()->getRepository('HandissimoBundle:StructuresList');
            $structure = $repository->getByStructure($keyword);

            /**
             * @var $repository StaffRepository
             */
            $repository = $this->getDoctrine()->getRepository('HandissimoBundle:Staff');
            $staff = $repository->getByStaff($keyword);


            $data =  array_merge($organization, $needs, $disability, $structure, $staff);

            return new JsonResponse(array("data" => json_encode($data)));
        } else {
            throw new HttpException("500", "Invalid Call");
        }
    }
    public function postalAction(Request $request, $postalcode)
    {
        /**
         * @var $repository OrganizationsRepository
         */
        if ($request->isXmlHttpRequest()) {

            $repository = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations');
            $postal = $repository->getByPostal($postalcode);

           /* $repository = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations');
            $city = $repository->getByCity($postalcode);*/

           // $data =  array_merge($postal, $city);

            return new JsonResponse(array("data" => json_encode($postal)));
        } else {
            throw new HttpException('500', 'Invalid call');
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