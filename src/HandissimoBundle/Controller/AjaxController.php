<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 05/12/16
 * Time: 14:40
 */

namespace HandissimoBundle\Controller;


use HandissimoBundle\Repository\OrganizationsRepository;
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

    public function autoCompleteAction(Request $request, $organizationData, $needsData, $disabilityData)
    {
        if ($request->isXmlHttpRequest())
        {
            /**
             * @var $repository OrganizationsRepository
             */
            $repository = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations');
            $data = $repository->DisabilityGetByOrganizations($organizationData, $needsData, $disabilityData);
            return new JsonResponse(array("data" => json_encode($data)));
        } else {
            throw new HttpException("500", "Invalid Call");
        }
    }
}