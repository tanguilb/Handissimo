<?php

namespace HandissimoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\Filter\ChoiceType;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;


class OrganizationsAdmin extends AbstractAdmin
{

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text', array(
                'label' => 'Nom de la structure',
                'required' => true
            ))
            ->add('societies', EntityType::class, array(
                'class' => 'HandissimoBundle:Society',
                'choice_label' => 'society_name',
                'label' => 'Non de l\'organisme gestionnaire'
            ))
            ->add('structuretype', EntityType::class, array(
                'class' => 'HandissimoBundle:StructuresTypes',
                'choice_label' => 'structurestype',
                'label' => 'Type de structure',
                'multiple' => false,
                'by_reference' => true,
                'expanded' => false
            ))
            ->add('address', 'text', array(
                'label' => 'Adresse postale',
                'required' => true
            ))
            ->add('postal', 'text', array(
                'label' => 'Code postal',
                'required' => true,
            ))
            ->add('city', 'text', array(
                'label' => 'Ville',
                'required' => true
            ))
            ->add('phone_number', 'text', array(
                'label' => 'Téléphone',
                'required' => true
            ))
            ->add('mail', 'text', array(
                'label' => 'E-mail de contact',
                'required' => true
            ))
            ->add('website', 'text', array(
                'label' => 'Site internet',
                'required' => false
            ))
            ->add('openhours', 'text', array(
                'label' => 'Heures d\'ouverture',
                'required' => false
            ))
            ->add('opendays', 'ckeditor', array(
                'label' => 'Jours d\'ouverture',
                'required' => false
            ))
            ->add('disabilitytypes',EntityType::class,array (
                'class' => 'HandissimoBundle:DisabilityTypes',
                'choice_label' => 'disabilityName',
                'label' => 'Handicap des personnes accompagnées',
                'multiple' => true
            ))
            ->add('agemini', 'integer', array(
                'label' => 'Âge minimum',
                'required' => false
            ))
            ->add('agemaxi', 'integer', array(
                'label' => 'Âge maximum',
                'required' => false
            ))
            ->add('freeplace', 'text', array(
                'label' => 'Nombre de personnes accompagnées',
                'required' => false
            ))
            ->add('organization_description','ckeditor', array(
                'label' => 'En utilisant des mots simples et des phrases courtes et en reprenant vos réponses précédentes, merci de décrire à qui s\'adresse la structure, combien de personnes sont accompagnées, quel est leur handicap, quel degré d\'autonomie est nécessaire pour être accompagné.',
                'required' => false
            ))
            ->add('needs', EntityType::class, array(
                'class' => 'HandissimoBundle:Needs',
                'choice_label' => 'needName',
                'label' => 'Services/prestations proposés par la structure',
                'multiple' => true
            ))
            ->add('serve_description', 'ckeditor', array(
                'label' => 'En utilisant des mots simples et des phrases courtes et en reprenant vos réponses précédentes, merci de décrire ce que propose votre structure aux personnes accompagnées (en "hiérarchisant" le cœur de votre travail et les activités annexes)',
                'required' => false
            ))
            ->add('team_members_number', 'text', array(
                'label' => 'Combien y a-t-il de personne dans l\'équipe ?',
                'required' => false
            ))
            ->add('Stafforganizations', EntityType::class, array(
                'class' => 'HandissimoBundle:Staff',
                'choice_label' => 'jobs',
                'label' => 'Le personnel',
                'multiple' => true
            ))
            ->add('school', CheckboxType::class, array(
                'label' => 'Proposez-vous de la scolarisation ?',
                'required' => false
            ))







            ->add('working_description', 'ckeditor', array(
                'label' => 'Description du travail effectué',
                'required' => false
            ))

            ->add('school_description', 'ckeditor', array(
                'label' => 'Description de l\'établissement',
                'required' => false,
            ))

            ->add('Stafforganizations', EntityType::class, array(
                'class' => 'HandissimoBundle:Staff',
                'choice_label' => 'jobs',
                'label' => 'Métier',
                'multiple' => true
            ))


            ->add('userOrg', EntityType::class, array(
                'class' => 'Application\Sonata\UserBundle\Entity\User',
                'label' => 'Utilisateur',
                'required' => false
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
                    ->add( 'phone_number' , null, array ( 'label' => 'Téléphone') )
                    ->add( 'mail' , null, array ( 'label' => 'Adresse e-mail') )
        ;
    }




}
