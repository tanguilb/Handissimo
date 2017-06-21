<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 19/06/17
 * Time: 09:37
 */

namespace HandissimoBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\Type\Filter\ChoiceType;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;

class AlertContentAdmin extends AbstractAdmin
{
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('user', null, array('label' => 'Utilisateur'))
            ->add('sendingDate', null, array('label' => 'Date d\'envoi'))
            ->add('choice', ChoiceType::class, array('label' => 'Motif'))
            ->add('_action', null, array('actions' => array('show' => array())));
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('user', null, array('label' => 'Utilisateur'))
            ->add('sendingDate', null, array('label' => 'Date d\'envoi'))
            ->add('organization', null, array('label' => 'Nom de la structure'))
            ->add('choice', ChoiceType::class, array('label' => 'Motif'))
            ->add('description', null, array('label' => 'Description'));
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
    }
}