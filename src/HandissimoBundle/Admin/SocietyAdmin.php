<?php

namespace HandissimoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class SocietyAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                    ->add('societyname', 'text', array(
                    'label' => 'Nom de la société',
                    'required' => true
                    ))
                    ->add('address', 'text', array(
                        'label' => 'Adresse',
                        'required' => true
                    ))
                    ->add('postal', 'text', array(
                        'label' => 'Code postale',
                        'required' => true
                    ))
                    ->add('city', 'text', array(
                        'label' => 'Ville',
                        'required' => true
                    ))
                    ->add('phone_number', 'text', array(
                        'label' => 'téléphone',
                        'required' => true
                    ))
                    ->add('mail', 'text', array(
                        'label' => 'Adresse mail',
                        'required' => false
                    ))
                    ->add('society_facebook', 'text', array(
                        'label' => 'Page facebook',
                        'required' => false
                    ))
                    ->add('society_twitter', 'text', array(
                        'label' => 'Page twitter',
                        'required' => false
                    ))
                    ->add('website', 'text', array(
                        'label' => 'Site internet',
                        'required' => false
                    ))
                    ->add('logo', 'file', array(
                        'label' => 'Logo de profile',
                        'required' => false
    ));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('societyname');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('societyname');
    }
}