<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 09/02/17
 * Time: 15:38
 */

namespace HandissimoBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;

class OrganizationsAdminController extends Controller
{
    public function listAction()
    {
            $em = $this->getDoctrine()->getManager();

            $organizations = $em->getRepository('HandissimoBundle:Organizations')->findAll();

            $datagrid = $this->admin->getDatagrid();
            $formView = $datagrid->getForm()->createView();


            return $this->render($this->admin->getTemplate('list'), array(
                'organization' => $organizations,
                'action' => 'list',
                'form' => $formView,
                'datagrid' => $datagrid,
                'csrf_token' => $this->getCsrfToken('sonata.batch'),
            ), null);
        }
}