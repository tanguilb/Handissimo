<?php

namespace HandissimoBundle\Admin;

use Doctrine\ORM\EntityRepository;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class StructuresTypesAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('structurestype', TextType::class, array(
                'label' => 'Types de structures',
                'required' => false
            ))
            ->add('structures',EntityType::class,array (
                'class' => 'HandissimoBundle:StructuresTypes',
                'choice_label' => 'structurestype',
                'label' => false,
                'expanded' => true,
                'by_reference' => true,
                'disabled' => true,
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('st')
                        ->orderBy('st.structurestype', 'ASC');
                },
            ))
            ->add('logo_mdph', TextType::class, array(
                'label' => 'Logo MDPH',
                'required' => false
            ));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('structurestype', null,
                array(
                    'label' => 'Types de structures'
                ));

    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper ->add( 'structurestype' , null, array ( 'label' => 'Types de structures') );

    }
}
