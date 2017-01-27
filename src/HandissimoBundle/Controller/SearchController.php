<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 17/01/17
 * Time: 17:09
 */

namespace HandissimoBundle\Controller;


use HandissimoBundle\Form\SearchType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends Controller
{
    public function researchAdvancedAction(Request $request, $disability_types_id, $structurestypes_id, $needs_id)
    {
        $search = New Search();
        $em = $this->getDoctrine()->getManager();
        $disability = $em->getRepository('HandissimoBundle:DisabilityTypes')->findBy($disability_types_id);
        $structure = $em->getRepository('HandissimoBundle:StructuresTypes')->findBy($structurestypes_id);
        $needs = $em->getRepository('HandissimoBundle:Needs')->findBy($needs_id);
        $form = $this->createForm(SearchType::class, $search);


    }

}