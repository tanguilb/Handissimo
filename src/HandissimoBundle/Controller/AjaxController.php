<?php

namespace HandissimoBundle\Controller;


use HandissimoBundle\Entity\DisabilityTypes;
use HandissimoBundle\Entity\Organizations;
use HandissimoBundle\Entity\OrganizationsBis;
use HandissimoBundle\Repository\DisabilityTypesRepository;
use HandissimoBundle\Repository\NeedsRepository;
use HandissimoBundle\Repository\OrganizationsRepository;
use HandissimoBundle\Repository\StaffRepository;
use HandissimoBundle\Repository\StructuresTypesRepository;
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

        $formAdvancedResearch = $this->createForm(AdvancedSearchType::class/*, $searchAdvanced, array('organizationsRepository' => ($em->getRepository('HandissimoBundle:Organizations')))  */);
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
                'picture' => $pictures,
                'result' => $result,
                'keyword' => $data,
                'age' => $age,
                'pagination' => $pagination,
                'form' => $formAdvancedResearch->createView(),
            ));
        }
        return $this->render('front/index.html.twig', array(
            'form' => $form->createView(),
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
             * @var $repository StructuresTypesRepository
             */
            $repository = $this->getDoctrine()->getRepository('HandissimoBundle:StructuresTypes');
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

}