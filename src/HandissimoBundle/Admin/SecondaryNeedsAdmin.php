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
use Symfony\Component\Form\Extension\Core\Type\TextType;

class SecondaryNeedsAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('needName', TextType::class,
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
            ->addIdentifier('needName', null,
                array(
                    'label' => 'Types de services',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('sn')
                            ->orderBy('sn.needName', 'ASC');
                    },
                ));
    }
}