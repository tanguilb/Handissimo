<?php

namespace HandissimoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class OrganizationsAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                    ->add('name', 'text', array(
                        'label' => 'Nom de l\'organisation',
                        'required' => true
                    ))
                    ->add('adress', 'text', array(
                        'label' => 'Adresse',
                        'required' => false
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
                        'label' => 'Telephone',
                        'required' => true
                    ))
                    ->add('mail', 'text', array(
                        'label' => 'Adresse e-mail',
                        'required' => false
                    ))
                    ->add('website', 'text', array(
                        'label' => 'Site internet',
                        'required' => false
                    ))
                    ->add('blog', 'text', array(
                        'label' => 'Blog',
                        'required' => false
                    ))
                    ->add('facebook', 'text', array(
                        'label' => 'Page facebook',
                        'required' => false
                    ))
                    ->add('twitter', 'text', array(
                        'label' => 'Page twitter',
                        'required' => false
                    ))
                    ->add('agegroup', 'text', array(
                        'label' => 'Tranche d\'age',
                        'required' => true
                    ))
                    ->add('freeplace', 'text', array(
                        'label' => 'Place(s) disponible(s)',
                        'required' => true
                    ))
                    ->add('organization_description', 'textarea', array(
                        'label' => 'Description de la structure',
                        'required' => true
                    ))
                    ->add('serve_description', 'textarea', array(
                        'label' => 'Description des services',
                        'required' => true
                    ))
                    ->add('openhours', 'text', array(
                        'label' => 'Heures d\'ouverture',
                        'required' => true
                    ))
                    ->add('opendays', 'textarea', array(
                        'label' => 'Jours d\'ouverture',
                        'required' => true
                    ))
                    ->add('team_members_number', 'text', array(
                        'label' => 'Nombre du personnel',
                        'required' => true
                    ))
                    ->add('team_description', 'textarea', array(
                        'label' => 'Description du ou des équipe(s)',
                        'required' => true
                    ))
                    ->add('working_description', 'textarea', array(
                        'label' => 'Description du travail effectué',
                        'required' => true
                    ))
                    ->add('school', 'text', array(
                        'label' => 'Ecole',
                        'required' => false
                    ))
                    ->add('school_description', 'textarea', array(
                        'label' => 'Description de l\'école',
                        'required' => false


            ));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
                    ->add('name')
                    ->add('postal');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper ->addIdentifier( 'name' , null, array ( 'label' => 'Nom de l\'organisation') )
                    ->add( 'adress' , null, array ( 'label' => 'Adresse') )
                    ->add( 'postal' , null, array ( 'label' => 'Code postale') );
    }
}
