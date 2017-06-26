<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 27/02/17
 * Time: 14:39
 */

namespace HandissimoBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\CoreBundle\Form\Type\BooleanType;

class CommentAdmin extends AbstractAdmin
{
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('author', null, array(
                'label' => 'Auteur'
            ))
            ->add('parutionDate', null, array(
                'label' => 'Date de publication'
            ))
            ->add('title', null, array(
                'label' => 'Sujet'
            ))
            ->add('statusComment', 'boolean', array(
                'label' => 'Publication',
                'editable' => true
            ))
            ->add('_action', null, array('actions' => array('show' => array())));
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('parutionDate', null, array('label' => 'Date de publication'))
            ->add('author', null, array('label' => 'Auteur'))
            ->add('title', null, array('label' => 'Sujet'))
            ->add('content', null, array('label' => 'Message'))
            ->add('statusComment', null, array('label' => 'Statut'));
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
    }
}