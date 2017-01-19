<?php

namespace HandissimoBundle\Controller;


use HandissimoBundle\Entity\DisabilityTypes;
use HandissimoBundle\Repository\DisabilityTypesRepository;
use HandissimoBundle\Repository\NeedsRepository;
use HandissimoBundle\Repository\OrganizationsRepository;
use HandissimoBundle\Repository\StaffRepository;
use HandissimoBundle\Repository\StructuresTypesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AjaxController extends Controller
{
    public function researchAction(Request $request)
    {
        $form = $this->createForm('HandissimoBundle\Form\ResearchType');
        $form->handleRequest($request);

        $formAdvancedResearch = $this->createForm('HandissimoBundle\Form\AdvancedSearchType');
        $formAdvancedResearch->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $em = $this->getDoctrine()->getManager();
            $data = $form->getData();
            $age = $form->getData()['age'];

            /**
             * @var $repository OrganizationsRepository
             */
            $result = $em->getRepository('HandissimoBundle:Organizations')->getByOrganizationName($data, $age);
            return $this->render('front/search.html.twig', array(
                'result' => $result,
                'keyword' => $data,
                'age' => $age,
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
            return $this->render('front/search.html.twig', array(
                'result' => $result,
                'keyword' => $data,
                'age' => $age,
                'form' => $formAdvancedResearch->createView(),
            ));
        }
        return $this->render('front/research.html.twig', array(
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
            $data = $repository->getByCity($postalcode);
            return new JsonResponse(array("data" => json_encode($data)));
        } else {
            throw new HttpException('500', 'Invalid call');
        }
    }
}