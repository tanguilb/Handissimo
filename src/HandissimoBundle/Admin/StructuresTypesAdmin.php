<?php

namespace HandissimoBundle\Admin;

use Doctrine\ORM\EntityRepository;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\CoreBundle\Form\Type\CollectionType;
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

            ));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier( 'structurestype' , null, array (
                'label' => 'Types de structures',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('st')
                        ->orderBy('st.structurestype', 'ASC');
                },
            ));
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
