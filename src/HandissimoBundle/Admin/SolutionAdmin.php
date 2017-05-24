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
use Sonata\AdminBundle\Show\ShowMapper;

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
            ->add('solutionName', null, array(
                'label' => 'Name of the structure'
            ))
            ->add('societyName', null, array(
                'label' => 'Nom de l\'organisme gestionnaire'
            ))
            ->add('messageDate', null, array(
                'label' => 'Date du message'
            ))
            ->add('_action', null, array(
                'actions' => array(
                    'show' => array()
                )
            ));
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('messageDate', null, array(
                'label' => 'Date du message'
            ))
            ->add('lastname', null, array(
                'label' => 'firstname'
            ))
            ->add('firstname', null, array(
                'label' => 'lastname'
            ))
            ->add('mail', null, array(
                'label' => 'Email'
            ))
            ->add('phoneNumber', null, array(
                'label' => 'Numéro de téléphone'
            ))
            ->add('cellphoneNumber', null, array(
                'label' => 'Numéro de portable'
            ))
            ->add('status', null, array(
                'label' => 'Fonction'
            ))
            ->add('solutionName', null, array(
                'label' => 'Nom de la structure'
            ))
            ->add('societyName', null, array(
                'label' => 'Nom de l\'organisme gestionnaire'
            ))
            ->add('message', null, array(
                'label' => 'Message'
            ));
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
    }
}