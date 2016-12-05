<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 05/12/16
 * Time: 14:40
 */

namespace HandissimoBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AjaxController extends Controller
{
    public function researchAction(Request $request)
    {
    $form = $this->createForm('HandissimoBundle\Form\ResearchType', $research);
    $form->handleRequest($request);

    }

    public function autoCompleteAction(Request $request, $data, $needsData, $disabilityData)
    {
        if ($request->isXmlHttpRequest())
        {
            /**
             * @var $repository OrganizationsRepository
             */
            $repository = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations');

        }
    }
}