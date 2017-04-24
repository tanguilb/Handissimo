<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 30/03/17
 * Time: 16:22
 */

namespace HandissimoBundle\Controller;

use HandissimoBundle\Entity\Solution;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use HandissimoBundle\Entity\EditContent;
use HandissimoBundle\Form\Handler;
use Symfony\Component\HttpFoundation\Request;

class EditContentController extends Controller
{
    public function howToUseAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('HandissimoBundle:EditContent');
        $howToUse = $repository->findAll();
        $solution = new Solution();
        $form = $this->createForm('HandissimoBundle\Form\Type\SolutionType', $solution);
        $formHandler = new Handler\SolutionHandler($form, $request, $this->get('doctrine.orm.default_entity_manager'), $this->get('service_container'));
        if ($formHandler->process()) {
            $this->addFlash('notice', 'Votre message a bien été envoyé');
            return $this->redirectToRoute('handissimo_structure');
        }
        return $this->render(':front:structurePage.html.twig', array(
            'howToUse' => $howToUse,
            'form' => $form->createView()
        ));
    }
}