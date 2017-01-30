<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 13/01/17
 * Time: 17:20
 */

namespace HandissimoBundle\Controller;

use HandissimoBundle\Entity\Organizations;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CRUDController extends Controller
{

   /*  public function createAction()
     {
         $request = $this->getRequest();
         // the key used to lookup the template
         $templateKey = 'edit';

         $this->admin->checkAccess('create');

         $class = new \ReflectionClass($this->admin->hasActiveSubClass() ? $this->admin->getActiveSubClass() : $this->admin->getClass());

         if ($class->isAbstract()) {
             return $this->render(
                 'SonataAdminBundle:CRUD:select_subclass.html.twig',
                 array(
                     'base_template' => $this->getBaseTemplate(),
                     'admin' => $this->admin,
                     'action' => 'create',
                 ),
                 null,
                 $request
             );
         }

         $object = $this->admin->getNewInstance();

         $preResponse = $this->preCreate($request, $object);
         if ($preResponse !== null) {
             return $preResponse;
         }

         $this->admin->setSubject($object);

         /** @var $form \Symfony\Component\Form\Form */
   /*  $form = $this->admin->getForm();
     $form->setData($object);
     $form->handleRequest($request);

     if ($form->isSubmitted()) {
         //TODO: remove this check for 4.0
         if (method_exists($this->admin, 'preValidate')) {
             $this->admin->preValidate($object);
         }
         $isFormValid = $form->isValid();

         // persist if the form was valid and if in preview mode the preview was approved
         if ($isFormValid && (!$this->isInPreviewMode($request) || $this->isPreviewApproved($request))) {
             $this->admin->checkAccess('create', $object);
             #$userManager = $this->container->get('fos_user.user_manager');
             #$user = $this->container->get('context.user');
             #$userManager = $session->get('username');

             try {
                 $object = $this->admin->create($object);
                 if ($this->isXmlHttpRequest()) {

                     return $this->renderJson(array(
                         'result' => 'ok',
                         'objectId' => $this->admin->getNormalizedIdentifier($object),
                     ), 200, array());
                 }
                 $this->admin->setUserOrg($this->container->get('security.context')->getToken()->getUser());

                 $this->addFlash(
                     'sonata_flash_success',
                     $this->trans(
                         'flash_create_success',
                         array('%name%' => $this->escapeHtml($this->admin->toString($object))),
                         'SonataAdminBundle'
                     )
                 );

                 // redirect to edit mode
                 return $this->redirectTo($object);
             } catch (ModelManagerException $e) {
                 $this->handleModelManagerException($e);

                 $isFormValid = false;
             }
         }

         // show an error message if the form failed validation
         if (!$isFormValid) {
             if (!$this->isXmlHttpRequest()) {

                 $this->addFlash(
                     'sonata_flash_error',
                     $this->trans(
                         'flash_create_error',
                         array('%name%' => $this->escapeHtml($this->admin->toString($object))),
                         'SonataAdminBundle'
                     )
                 );
             }
         } elseif ($this->isPreviewRequested()) {
             // pick the preview template if the form was valid and preview was requested
             $templateKey = 'preview';
             $this->admin->getShow();
         }
     }

     $formView = $form->createView();
     // set the theme for the current Admin Form

     return $this->render($this->admin->getTemplate($templateKey), array(
         'action' => 'create',
         'form' => $formView,
         'object' => $object,
     ), null);
 }

 public function newAction(Request $request)
 {
     $organization = new Organizations();
     $form = $this->createForm('HandissimoBundle\Form\OrganizationsType', $organization);
     $form->handleRequest($request);

     if ($form->isSubmitted() && $form->isValid()) {
         $em = $this->getDoctrine()->getManager();
         $organization->setUserOrg($this->container->get('security.context')->getToken()->getUser());
         $em->persist($organization);
         $em->flush($organization);

         return $this->redirectToRoute('organizations_show', array('id' => $organization->getId()));
     }

     return $this->render('organizations/new.html.twig', array(
         'organization' => $organization,
         'form' => $form->createView(),
     ));
 }
*/
}