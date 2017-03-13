<?php

namespace HandissimoBundle\Admin;


use Doctrine\ORM\EntityRepository;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class NeedsAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('needName', 'text',
                array(
                    'label' => 'Types de services',
                    'required' => false
                ))
            ->add('organizations',EntityType::class,array (
                'class' => 'HandissimoBundle:Needs',
                'choice_label' => 'needName',
                'label' => false,
                'expanded' => true,
                'multiple' => true,
                'by_reference' => true,
                'disabled' => true,
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('n')
                        ->orderBy('n.needName', 'ASC');
                },
            ));
        }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('needName', null,
                array(
                    'label' => 'Types de services'
                ));
    }
}