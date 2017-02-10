<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 10/02/17
 * Time: 14:09
 */

namespace HandissimoBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;

class SocietyAdminController extends Controller
{
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();

        $organizations = $em->getRepository('HandissimoBundle:Organizations')->findAll();
        $society = $em->getRepository('HandissimoBundle:Society')->findAll();

        $datagrid = $this->admin->getDatagrid();
        $formView = $datagrid->getForm()->createView();


        return $this->render('admin/society.list.html.twig', array(
            'society' => $society,
            'organizations' => $organizations,
            'action' => 'list',
            'form' => $formView,
            'datagrid' => $datagrid,
            'csrf_token' => $this->getCsrfToken('sonata.batch'),
        ), null);
    }

}