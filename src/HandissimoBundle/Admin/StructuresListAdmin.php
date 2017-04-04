<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 14/03/17
 * Time: 14:34
 */

namespace HandissimoBundle\Admin;


use Doctrine\ORM\EntityRepository;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class StructuresListAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', TextType::class, array(
                'label' => 'Liste des structures'
            ))
            ->add('type', EntityType::class, array(
                'class' => 'HandissimoBundle:StructureType',
                'choice_label' => 'name',
                'label' => 'Type de structure',
                'required' => true,
                'expanded' => true,
                'by_reference' => true,

            ));
            /*->add('structurelists',EntityType::class,array (
                'class' => 'HandissimoBundle:StructuresList',
                'choice_label' => 'name',
                'label' => false,
                'expanded' => true,
                'by_reference' => true,
                'disabled' => true,
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('sl')
                        ->orderBy('sl.name', 'ASC');
                },
            ));*/
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier( 'name' , null, array (
                'label' => 'Types de structures',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('sl')
                        ->orderBy('sl.name', 'ASC');
                },
            ));
    }
}