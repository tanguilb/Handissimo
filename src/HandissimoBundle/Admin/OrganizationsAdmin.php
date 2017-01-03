<?php

namespace HandissimoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\Filter\ChoiceType;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class OrganizationsAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('societies', EntityType::class, array(
                'class' => 'HandissimoBundle:Society',
                'choice_label' => 'society_name',
                'label' => 'Organisme Gestionnaire'
            ))
            ->add('name', 'text', array(
                'label' => 'Nom de l\'organisation',
                'required' => true
            ))

            ->add('address', 'text', array(
                'label' => 'Adresse',
                'required' => true
            ))
            ->add('postal', 'text', array(
                'label' => 'Code postale',
                'required' => true,
            ))
            ->add('city', 'text', array(
                'label' => 'Ville',
                'required' => true
            ))
            ->add('phone_number', 'text', array(
                'label' => 'Télephone',
                'required' => true
            ))
            ->add('mail', 'text', array(
                'label' => 'Adresse e-mail',
                'required' => true
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
            ->add('agemini', 'integer', array(
                'label' => 'Age minimum',
                'required' => false
            ))
            ->add('agemaxi', 'integer', array(
                'label' => 'Age maximum',
                'required' => false
            ))
            ->add('freeplace', 'text', array(
                'label' => 'Place(s) disponible(s)',
                'required' => false
            ))
            ->add('organization_description', 'textarea', array(
                'label' => 'Description de la structure',
                'required' => false
            ))
            ->add('serve_description', 'textarea', array(
                'label' => 'Description des services',
                'required' => false
            ))
            ->add('openhours', 'text', array(
                'label' => 'Heures d\'ouverture',
                'required' => false
            ))
            ->add('opendays', 'textarea', array(
                'label' => 'Jours d\'ouverture',
                'required' => false
            ))
            ->add('team_members_number', 'text', array(
                'label' => 'Nombre du personnel',
                'required' => false
            ))
            ->add('team_description', 'textarea', array(
                'label' => 'Description du ou des équipe(s)',
                'required' => false
            ))
            ->add('working_description', 'textarea', array(
                'label' => 'Description du travail effectué',
                'required' => false
            ))
            ->add('school', CheckboxType::class, array(
                'label' => 'Ecole',
                'required' => false
            ))
            ->add('school_description', 'sonata_simple_formatter_type', array(
                'format' => 'markdown',
                'label' => 'Description de l\'école',
                'required' => false
                    ))
            ->add('disabilitytypes',EntityType::class,array (
                'class' => 'HandissimoBundle:DisabilityTypes',
                'choice_label' => 'disabilityName',
                'label' => 'Type de handicaps',
                'multiple' => true
            ))
            ->add('Stafforganizations', EntityType::class, array(
                'class' => 'HandissimoBundle:Staff',
                'choice_label' => 'jobs',
                'label' => 'Métier',
                'multiple' => true
            ))
            ->add('needs', EntityType::class, array(
                'class' => 'HandissimoBundle:Needs',
                'choice_label' => 'needName',
                'label' => 'Type de services',
                'multiple' => true
            ))
            ->add('structuretype', EntityType::class, array(
                'class' => 'HandissimoBundle:StructuresTypes',
                'choice_label' => 'structurestype',
                'label' => 'Type de structures',
                'multiple' => false,
                'by_reference' => true,
                'expanded' => false
            ))
        ;
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
                    ->add( 'address' , null, array ( 'label' => 'Adresse') )
                    ->add( 'postal' , null, array ( 'label' => 'Code postale') )
                    ->add( 'city' , null, array ( 'label' => 'Ville') )
                    ->add( 'phone_number' , null, array ( 'label' => 'Télephone') )
                    ->add( 'mail' , null, array ( 'label' => 'Adresse e-mail') )
        ;
    }
}
