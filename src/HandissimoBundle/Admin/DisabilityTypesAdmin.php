<?php

namespace HandissimoBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class DisabilityTypesAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('disabilityName', 'text',
                array(
                    'label' => 'Type de handicaps'
                ))
            ->add('organizations',EntityType::class,array (
                'class' => 'HandissimoBundle:DisabilityTypes',
                'choice_label' => 'disabilityName',
                'label' => 'Type de handicaps',
                'expanded' => true,
                'multiple' => true,
                'by_reference' => true,
            ));
    }

    /*protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->
    }*/

    /*public function postUpdate( $object){

        $this->preRemove($object);
        $this->postPersist($object);
    }

    public function postPersist($object){

        $em = $this->modelManager->getEntityManager($object);
        $em->getRepository('HandissimoBundle:DisabilityTypes')->addLink($object);
    }

    public function preRemove ($object) {

        $em = $this->modelManager->getEntityManager($object);
        $em->getRepository('HandissimoBundle:DisabilityTypes')->deleteLink($object);

    }*/
}