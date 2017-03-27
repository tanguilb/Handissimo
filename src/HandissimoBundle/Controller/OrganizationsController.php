<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 27/03/17
 * Time: 09:38
 */

namespace HandissimoBundle\Controller;

use Exporter\Handler;
use HandissimoBundle\Form\Handler\OrganizationsHandler;
use HandissimoBundle\Entity\Organizations;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class OrganizationsController extends Controller
{
    public function newAction(Request $request)
    {
        $organizations = new Organizations();
        $form = $this->createForm('HandissimoBundle\Form\Type\OrganizationsType', $organizations);

        $formHandler = new OrganizationsHandler($form, $request, $this->get('doctrine.orm.default_entity_manager'));
        if($formHandler->process())
        {
            $this->addFlash('notice', 'Vous avez bien enregistrer vos informations');
            return $this->redirectToRoute('handissimobundle_organizations');
        }

        return $this->render(':front:organizationForm.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}