<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 05/12/16
 * Time: 14:40
 */

namespace HandissimoBundle\Controller;


use HandissimoBundle\Repository\DisabilityTypesRepository;
use HandissimoBundle\Repository\NeedsRepository;
use HandissimoBundle\Repository\OrganizationsRepository;
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

    if ($form->isSubmitted() && $form->isValid()){

        return $this->redirectToRoute('research_home');
    }
    return $this->render('front/research.html.twig', array(
        'form' => $form->createView(),
    ));

    }

    public function autoCompleteAction(Request $request, $organizationData, $needsData, $disabilityData, $structureData)
    {
        if ($request->isXmlHttpRequest())
        {
            /**
             * @var $repository OrganizationsRepository
             */
            $repository = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations');
            $organization = $repository->getByOrganizations($organizationData);

            /**
             * @var $repository NeedsRepository
             */
            $repository = $this->getDoctrine()->getRepository('HandissimoBundle:Needs');
            $needs = $repository->getByNeeds($needsData);

            /**
             * @var $repository DisabilityTypesRepository
             */
            $repository = $this->getDoctrine()->getRepository('HandissimoBundle:DisabilityTypes');
            $disability = $repository->getByDisability($disabilityData);

            /**
             * @var $repository StructuresTypesRepository
             */
            $repository = $this->getDoctrine()->getRepository('HandissimoBundle:StructuresTypes');
            $structure = $repository->getByStructure($structureData);

            $data =  array_merge($organization,$needs, $disability, $structure);

            return new JsonResponse(array("data" => json_encode($data)));
        } else {
            throw new HttpException("500", "Invalid Call");
        }
    }
}