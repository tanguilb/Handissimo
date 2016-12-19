<?php

namespace HandissimoBundle\Form;


use HandissimoBundle\Entity\DisabilityTypes;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    /*public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /*$builder
            ->add('disabilitytypes', EntityType::class, array(
                'empty_value' => 'Sélectionner un type de handicaps',
                'class' => 'HandissimoBundle:DisabilityTypes',
                'choice' => '',
                'label' => 'Type de handicaps',
            ))
            ->add('needs', EntityType::class, array(
                'empty_value' => 'Sélectionner un type de besoins',
                'class' => 'HandissimoBundle\Entity\Needs',
                'choice' => '',
                'label' => 'Type de besoins'
            ))
            ->add('structurestypes', EntityType::class, array(
                'empty_value' => 'Sélectionner un type de structures',
                'class' => 'HandissimoBundle\Entity\StructuresTypes',
                'choice' => '',
                'label' => 'Type de Structures'
            ));
    }*/

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array());
    }

    public function getBlockPrefix()
    {
        return 'handissimo_search';
    }
}