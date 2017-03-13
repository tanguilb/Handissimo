<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 13/03/17
 * Time: 11:55
 */

namespace HandissimoBundle\Admin;


use Doctrine\ORM\EntityRepository;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class SecondaryNeedsAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('needName', 'text',
                array(
                    'label' => 'Types de services',
                    'required' => false
                ))
            ->add('organizationsneeds',EntityType::class,array (
                'class' => 'HandissimoBundle:SecondaryNeeds',
                'choice_label' => 'needName',
                'label' => false,
                'expanded' => true,
                'multiple' => true,
                'by_reference' => true,
                'disabled' => true,
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('sn')
                        ->orderBy('sn.needName', 'ASC');
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