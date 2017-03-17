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


class OpinionAdmin extends AbstractAdmin
{
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add( 'firstName' , null, array ( 'label' => 'Prénom') )
            ->add( 'lastName' , null, array ( 'label' => 'Nom') )
            ->add( 'eMail' , null, array ( 'label' => 'Adresse e-mail') )
            ->add( 'message' , null, array ( 'label' => 'Votre avis') )
        ;
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
    }
}