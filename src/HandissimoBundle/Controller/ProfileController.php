<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 27/03/17
 * Time: 12:25
 */

namespace HandissimoBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends Controller
{
    public function profileSearchAction(Request $request)
    {
        $form = $this->createForm('HandissimoBundle\Form\Type\ProfileSearchType');
        $form->handleRequest($request);

        /*if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
        }*/
        return $this->render(':front/profile:profile-search.html.twig', array(
            'form' => $form->createView()
        ));
    }
}