<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 09/02/17
 * Time: 15:38
 */

namespace HandissimoBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Application\Sonata\UserBundle\Entity\User;
use HandissimoBundle\Repository\Organizations;

class OrganizationsAdminController extends Controller
{
    public function listAction()
    {

        $em = $this->getDoctrine()->getManager();
        $nonUser = $this->getUser()->getOrganizationsuser();
        $user = $this->getUser();

        if ($nonUser == null)
        {
            $organizations = $em->getRepository('HandissimoBundle:Organizations')->findAll();
        } else {
            $organizations = $em->getRepository('HandissimoBundle:Organizations')->getByUser($user);

        }
        $datagrid = $this->admin->getDatagrid();
        $formView = $datagrid->getForm()->createView();

        return $this->render('admin/organizations.list.html.twig', array(
            'organizations' => $organizations,
            'action' => 'list',
            'form' => $formView,
            'datagrid' => $datagrid,
            'csrf_token' => $this->getCsrfToken('sonata.batch'),
        ), null);
    }
}