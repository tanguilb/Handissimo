<?php

namespace HandissimoBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class NeedsAdmin extends admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('needName', 'text',
                array(
                    'label' => 'Type de services'
                ))
            ->add('organizations',EntityType::class,array (
            'class' => 'HandissimoBundle:Needs',
            'choice_label' => 'needName',
            'label' => 'Type de services',
            'expanded' => true,
            'multiple' => true,
            'by_reference' => true,
                ));
    }
}