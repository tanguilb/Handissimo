<?php

namespace HandissimoBundle\Admin;

use Doctrine\ORM\EntityRepository;
use HandissimoBundle\Entity\StructuresTypes;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\CoreBundle\Form\Type\CollectionType;
use Sonata\AdminBundle\Form\Type\ModelType;
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
            ->add('orgastructuretype', CollectionType::class, array(
                'label' => false,
                'required' => true,
                'type_options' => array(
                    'delete' => true,

                ),
                'by_reference' => false),
                array(
                    'edit' => 'inline',
                    'inline' => 'table',
                    'sortable' => 'position'

            ))
            /*->add('orgastructuretype',EntityType::class, array (
                'class' => 'HandissimoBundle:StructuresTypes',
                'choice_label' => 'structurestype',
                'label' => false,
                'expanded' => true,
                'by_reference' => true,
                'required' => false,
                'disabled' => true,
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('st')
                        ->orderBy('st.structurestype', 'ASC');
                },
            ))*/;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier( 'structurestype' , null, array (
                'label' => 'Types de structures') );

    }

    public function prePersist($orgastructuretype)
    {
        foreach ($orgastructuretype->getOrgastructuretype() as $structureslist) {
            $structureslist->setStructurelists($orgastructuretype);
        }
    }

    public function preUpdate($orgastructuretype)
    {
        foreach ($orgastructuretype->getOrgastructuretype() as $structureslist) {
            $structureslist->setStructurelists($orgastructuretype);
        }
    }
}
