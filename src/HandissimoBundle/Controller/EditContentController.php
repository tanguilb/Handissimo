<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 30/03/17
 * Time: 16:22
 */

namespace HandissimoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use HandissimoBundle\Entity\EditContent;

class EditContentController extends Controller
{
    public function howToUseAction()
    {
        $repository = $this->GetDoctrine()->getRepository('HandissimoBundle:EditContent');
        $howToUse = $repository->findAll();

        return $this->render(':front:structurePage.html.twig', array(
            'howToUse' => $howToUse,
    ));
    }
}