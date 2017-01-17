<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 17/01/17
 * Time: 17:09
 */

namespace HandissimoBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends Controller
{
    public function researchAdvancedAction(Request $request, $keyword)
    {
        $repository = $this->getDoctrine()->getRepository('HandissimoBundle:DisabilityTypes');
        $disability = $repository;
        $repository = $this->getDoctrine()->getRepository('HandissimoBundle:StructuresTypes');
        $structure = $repository;
        $repository = $this->getDoctrine()->getRepository('HandissimoBundle:Needs');
        $needs = $repository;


    }

}