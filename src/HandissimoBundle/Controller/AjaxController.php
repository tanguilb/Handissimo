<?php

namespace HandissimoBundle\Controller;


use HandissimoBundle\Entity\Organizations;
use HandissimoBundle\HandissimoBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AjaxController extends Controller
{
    public function searchByCityAction(Request $request, $city)
    {

        if ($request->isXmlHttpRequest()) {
            $repository = $this->getDoctrine()->getRepository('HandissimoBundle:City');
            $location = $repository->getByCity($city);

            $repository = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations');
            $profile = $repository->getSearchProfile($city);

            $data = array_merge($location, $profile);
            return new JsonResponse(array("data" => json_encode($data)));
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

    public function previewAction()
    {
       return $this->render('front/preview.html.twig');
    }

    public function revertVersionAction(Request $request, $id, $rev)
    {
        if ($request->isXmlHttpRequest()){
            $var = json_decode($request->request->get('data'), true);
            $organizations = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations')->find($id);
            $result = $this->container->get('handissimo.revert_version')->revertOldVersion($organizations, $var);

            return new JsonResponse($this->generateUrl('handissimo_profile_list_organizations', array(
                'id' => $id,
                'rev' => $rev,
                'result' => $result
            )));
        }
        return false;

    }

}