<?php

namespace HandissimoBundle\Admin;


use Doctrine\ORM\EntityRepository;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class DisabilityTypesAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('disabilityName', TextType::class,
                array(
                    'label' => 'Types de handicaps',
                    'required' => false
                ))
            ->add('organizations',EntityType::class,array (
                'class' => 'HandissimoBundle:DisabilityTypes',
                'choice_label' => 'disabilityName',
                'label' => false,
                'expanded' => true,
                'multiple' => true,
                'by_reference' => true,
                'disabled' => true,
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('dt')
                        ->orderBy('dt.disabilityName', 'ASC');
                },
            ));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('disabilityName', null,
                array(
                    'label' => 'Types de handicaps',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('dt')
                            ->orderBy('dt.disabilityName', 'ASC');
                    },
                ));
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection
            ->remove('');
    }
}