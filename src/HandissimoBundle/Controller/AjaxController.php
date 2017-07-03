<?php

namespace HandissimoBundle\Controller;


use HandissimoBundle\Entity\AlertContent;
use HandissimoBundle\Entity\Organizations;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Class AjaxController
 * @package HandissimoBundle\Controller
 */
class AjaxController extends Controller
{
    /**
     * @param Request $request
     * @param $city
     * @return JsonResponse
     */
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

    /**
     * @param Request $request
     * @param $profileSearch
     * @return JsonResponse
     * @throws \HttpException
     */
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

    /**
     * @param Request $request
     * @param $organizationSearch
     * @return JsonResponse
     * @throws \HttpException
     */
    public function organizationNameSearchAction(Request $request, $organizationSearch)
    {
        if ($request->isXmlHttpRequest())
        {
            $repository = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations');
            $organization = $repository->getSearchProfile($organizationSearch);

            return new JsonResponse(array("data" => json_encode($organization)));
        } else {
            throw new \HttpException('500', 'Invalid call');
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     * @throws \HttpException
     */
    public function emailAction(Request $request, $id)
    {
        if($request->isXmlHttpRequest())
        {
            $repository = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations');
            $email = $repository->getEmailByOrganization($id);

            return new JsonResponse(array("data" => json_encode($email)));
        } else {
            throw new \HttpException('500', 'Invalid call');
        }
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function previewAction(Request $request)
    {
        if($request->isXmlHttpRequest())
        {
            $values = $request->request->get('value');
            $this->get('session')->set('values', $values);

            return new Response();
        } else {
            throw  new HttpException('500', 'Invalid call');
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @param $rev
     * @return JsonResponse
     */
    public function revertVersionAction(Request $request, $id, $rev)
    {
        if ($request->isXmlHttpRequest()){
            $var = json_decode($request->request->get('data'), true);
            $organizations = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations')->find($id);
            $result = $this->container->get('handissimo.revert_version')->revertOldVersion($organizations, $var);

            return new JsonResponse($this->generateUrl('handissimo_profile_list_organizations'));
        } else {
            throw  new HttpException('500', 'Invalid call');
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function addPinsAction(Request $request, $id)
    {
        if ($request->isXmlHttpRequest()) {
            $rev = $request->request->get('rev');
            $em = $this->getDoctrine()->getManager();
            $query = 'UPDATE organizations_audit SET pins = 1 WHERE organizations_audit.id = ' .$id. ' AND organizations_audit.rev = ' .$rev;
            $statement = $em->getConnection()->prepare($query);
            $statement->execute();
            return new JsonResponse();
        } else {
            throw  new HttpException('500', 'Invalid call');
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function removePinsAction(Request $request, $id)
    {
        if ($request->isXmlHttpRequest()) {
            $rev = $request->request->get('rev');
            $em = $this->getDoctrine()->getManager();
            $query = 'UPDATE organizations_audit SET pins = 0 WHERE organizations_audit.id = ' .$id. ' AND organizations_audit.rev = ' .$rev;
            $statement = $em->getConnection()->prepare($query);
            $statement->execute();
            return new JsonResponse();
        } else {
            throw  new HttpException('500', 'Invalid call');
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function addAlertAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $form = $request->request->get('form');
            $organization = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations')->find($form['id']);
            $user = $this->container->get('security.token_storage')->getToken()->getUsername();
            $organizationName = $organization->getName();
            $alertContent = new AlertContent();
            $em = $this->getDoctrine()->getManager();
            $alertContent->setOrganization($organizationName);
            $alertContent->setDescription($form['description']);
            $alertContent->setChoice($form['choice']);
            $alertContent->setUser($user);
            $em->persist($alertContent);
            $em->flush();

            $mail = \Swift_Message::newInstance();
            $mail
                ->setFrom('handissimo@gmail.com')
                ->setTo('handissimo@gmail.com')
                ->setSubject('Un message vous a été envoyé')
                ->setBody(
                    $this->renderView('email/alertContentMail.html.twig', array(
                        'organizationName' => $organizationName
                    ))
                )
                ->setContentType('text/html');

            $this->get('mailer')->send($mail);
            return new JsonResponse();
        } else {
            throw  new HttpException('500', 'Invalid call');
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function addCheckedAction(Request $request, $id)
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $organization = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations')->find($id);
            $organization->setChecked(1);
            $em->persist($organization);
            $em->flush();
            return new JsonResponse();
        } else {
            throw  new HttpException('500', 'Invalid call');
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function removeCheckedAction(Request $request, $id)
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $organization = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations')->find($id);
            $organization->setChecked(0);
            $em->persist($organization);
            $em->flush();
            return new JsonResponse();
        } else {
            throw  new HttpException('500', 'Invalid call');
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function addCheckedVersionAction(Request $request, $id)
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $organization = $this->getDoctrine()->getRepository('HandissimoBundle:Organizations')->find($id);
            $organization->setChecked(1);
            $em->persist($organization);
            $em->flush();
            return new JsonResponse($this->generateUrl('handissimo_profile_list_organizations'));
        } else {
            throw  new HttpException('500', 'Invalid call');
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function addCheckedCommentAction(Request $request, $id)
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $comment = $this->getDoctrine()->getRepository('HandissimoBundle:Comment')->find($id);
            $comment->setRereading(1);
            $em->persist($comment);
            $em->flush();
            return new JsonResponse();
        } else {
            throw  new HttpException('500', 'Invalid call');
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function removeCheckedCommentAction(Request $request, $id)
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $comment = $this->getDoctrine()->getRepository('HandissimoBundle:Comment')->find($id);
            $comment->setRereading(0);
            $em->persist($comment);
            $em->flush();
            return new JsonResponse();
        } else {
            throw  new HttpException('500', 'Invalid call');
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function removePublicationCommentAction(Request $request, $id)
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $comment = $this->getDoctrine()->getRepository('HandissimoBundle:Comment')->find($id);
            $comment->setStatusComment(0);
            $em->persist($comment);
            $em->flush();
            return new JsonResponse();
        } else {
            throw  new HttpException('500', 'Invalid call');
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function addPublicationCommentAction(Request $request, $id)
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $comment = $this->getDoctrine()->getRepository('HandissimoBundle:Comment')->find($id);
            $comment->setStatusComment(1);
            $em->persist($comment);
            $em->flush();
            return new JsonResponse();
        } else {
            throw  new HttpException('500', 'Invalid call');
        }
    }
}