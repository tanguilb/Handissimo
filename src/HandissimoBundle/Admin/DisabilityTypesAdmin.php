<?php

namespace HandissimoBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class DisabilityTypesAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('disabilityName', 'text',
                array(
                    'label' => 'Type de handicaps',
                    'required' => false
                ))
            ->add('organizations',EntityType::class,array (
                'class' => 'HandissimoBundle:DisabilityTypes',
                'choice_label' => 'disabilityName',
                'label' => false,
                'expanded' => true,
                'by_reference' => true,
                'disabled' => true
            ));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('disabilityName', null,
                array(
                    'label' => 'Type de handicaps'
                ));
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection
            ->remove('');
    }
}