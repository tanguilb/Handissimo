<?php
/**
 * Created by PhpStorm.
 * User: axcel
 * Date: 15/12/16
 * Time: 16:44
 */

namespace HandissimoBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;


class OpinionAdmin extends AbstractAdmin
{
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add( 'firstName' , null, array ( 'label' => 'Prénom') )
            ->add( 'lastName' , null, array ( 'label' => 'Nom') )
            ->add( 'eMail' , null, array ( 'label' => 'Adresse e-mail') )
            ->add( 'creationDate' , null, array ( 'label' => 'Date du message') )
            ->add('_action', null, array('actions' => array('show' => array())));
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add( 'creationDate' , null, array ( 'label' => 'Date du message') )
            ->add( 'firstName' , null, array ( 'label' => 'Prénom') )
            ->add( 'lastName' , null, array ( 'label' => 'Nom') )
            ->add( 'eMail' , null, array ( 'label' => 'Adresse e-mail') )
            ->add( 'message', null, array('label' => 'Message'));
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
    }
}