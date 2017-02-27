<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 23/02/17
 * Time: 11:19
 */

namespace HandissimoBundle\Admin;



use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class SolutionAdmin extends AbstractAdmin
{
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('lastname', null, array(
                'label' => 'lastname'
            ))
            ->add('firstname', null, array(
                'label' => 'firstname'
            ))
            ->add('mail', null, array(
                'label' => 'mail'
            ))
            ->add('status', null, array(
                'label' => 'Status'
            ))
            ->add('solutionName', null, array(
                'label' => 'Name of the structure'
            ))
            ->add('societyName', null, array(
                'label' => 'Nom de l\'organisme gestionnaire'
            ));
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
    }
}