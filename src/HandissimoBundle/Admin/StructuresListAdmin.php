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
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class StructuresListAdmin extends AbstractAdmin
{
    protected $parentAssociationMapping = 'StructuresTypes';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', TextType::class, array(
                'label' => 'Liste des structures',
                'action' => array(
                    'allow_delete' => true
                )
            ))
            ->add('structurelists',EntityType::class,array (
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
            ));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add( 'name' , null, array (
                'label' => 'Types de structures',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('sl')
                        ->orderBy('sl.name', 'ASC');
                },
            ));
    }
}