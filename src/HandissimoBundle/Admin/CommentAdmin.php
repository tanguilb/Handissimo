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
            ->add('content', null, array(
                'label' => 'Message'
            ))
            ->add('status', null, array(
                'label' => 'Statut'
            ));
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
    }
}