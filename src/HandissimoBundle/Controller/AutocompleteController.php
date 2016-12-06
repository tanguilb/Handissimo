<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 28/11/16
 * Time: 16:52
 */

namespace HandissimoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use HandissimoBundle\Entity\Organizations;

class AutocompleteController extends Controller
{
    public function indexAction()
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('HandissimoBundle:Organizations');

        $listOrganization = $repository->findBy(
            array(),                      // Critere
            array('id' => 'desc'),        // Tri
            null,                         // Limite
            null                          // Offset
        );


        return $this->render('front/research.html.twig', array(
            'listOrganization' => $listOrganization,
        ));
    }
}