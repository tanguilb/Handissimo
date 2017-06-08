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

    public function replayAction(Request $request, $id, $data)
    {
        if ($request->isXmlHttpRequest()){
            $organizations = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations')->find($id);
            $em = $this->getDoctrine()->getManager();
            if ($organizations->getReplay() == 0 && $data == 1){
                $organizations->setReplay(1);
                $em->persist($organizations);
                $em->flush();
                return new JsonResponse($this->generateUrl('handissimo_profile_view_current_organization', array(
                    'id' => $id
                )));
            }
        }
        return false;
    }

    public function validateAction(Request $request, $id, $data)
    {
        if ($request->isXmlHttpRequest()){
            $organizations = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations')->find($id);
            $em = $this->getDoctrine()->getManager();
            if ($organizations->getValidate() == 0 && $data == 1){
                $organizations->setValidate(1);
                $em->persist($organizations);
                $em->flush();
                return new JsonResponse($this->generateUrl('handissimo_profile_view_current_organization', array(
                    'id' => $id
                )));
            }
        }
        return false;
    }
}