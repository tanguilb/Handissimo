<?php

namespace HandissimoBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class SocietyAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                    ->add('societyname', TextType::class, array(
                    'label' => 'Nom de la société',
                    'required' => true
                    ))
                    ->add('address', TextType::class, array(
                        'label' => 'Adresse',
                        'required' => true
                    ))
                    ->add('postal', TextType::class, array(
                        'label' => 'Code postal',
                        'required' => true
                    ))
                    ->add('city', TextType::class, array(
                        'label' => 'Ville',
                        'required' => true
                    ))
                    ->add('phone_number', TextType::class, array(
                        'label' => 'Téléphone',
                        'required' => true
                    ))
                    ->add('mail', TextType::class, array(
                        'label' => 'Adresse e-mail',
                        'required' => false
                    ))
                    ->add('society_facebook', TextType::class, array(
                        'label' => 'Page Facebook',
                        'required' => false
                    ))
                    ->add('society_twitter', TextType::class, array(
                        'label' => 'Page Twitter',
                        'required' => false
                    ))
                    ->add('website', TextType::class, array(
                        'label' => 'Site internet',
                        'required' => false
                    ))
                    ->add('logo', TextType::class, array(
                        'label' => 'Logo de profil',
                        'required' => false
                    ))
                    ->add('userSociety', EntityType::class, array(
                        'class' => 'Application\Sonata\UserBundle\Entity\User',
                        'required' => false


                    ));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('societyname', null,
            array(
                'label' => 'Nom de la société'
            ));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('societyname', null, array('label' => 'Nom de la société'))
            ->add('address', null, array('label' => 'Adresse'))
            ->add('postal', null, array('label' => 'Code postal'))
            ->add('city', null, array('label' => 'Ville'))
            ->add('phone_number', null, array('label' => 'Téléphone'))
            ->add('mail', null, array('label' => 'Adresse e-mail'));
    }
}