<?php

namespace HandissimoBundle\Controller;

use HandissimoBundle\Repository\OrganizationsRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AjaxAutocompleteController extends Controller
{

    public function updateDataAction(Request $request, $keyword)
    {
        /**
         * @var $repository OrganizationsRepository
         */
        if ($request->isXmlHttpRequest()) {
            $repository = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations');
            $data = $repository->getByOrganizations($keyword);
            return new JsonResponse(array("data" => json_encode($data)));
        }else {
            throw new HttpException('500', 'Invalid call');
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
        }else {
            throw new HttpException('500', 'Invalid call');
        }
    }

    public function ageAction($agedata)
    {
        $repository = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations');
        $age = $repository->getByAge($agedata);
        return $this->render(':front:research.html.twig', array(
            'age' => $age
        ));
    }
}