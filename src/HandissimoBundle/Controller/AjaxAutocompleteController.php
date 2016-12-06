<?php

namespace HandissimoBundle\Controller;

use HandissimoBundle\Repository\OrganizationsRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AjaxAutocompleteController extends Controller
{

    public function updateDataAction(Request $request, $keyword/*, $dataneeds, $disabilityData*/)
    {
        /**
         * @var $repository OrganizationsRepository
         */
        if ($request->isXmlHttpRequest()) {
            $repository = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations');
            $data = $repository->getByOrganizations($keyword/*, $dataneeds, $disabilityData*/);
            return new JsonResponse(array("data" => json_encode($data)));
        }else {
            throw new HttpException('500', 'Invalid call');
        }
    }
}