<?php

namespace HandissimoBundle\Controller;


use HandissimoBundle\Entity\Organizations;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AjaxController extends Controller
{
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

    public function organizationNameSearchAction(Request $request, $organizationSearch)
    {
        if ($request->isXmlHttpRequest())
        {
            $repository = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations');
            $organization = $repository->getSearchProfile($organizationSearch);

            return new JsonResponse(array("data" => json_encode($organization)));
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