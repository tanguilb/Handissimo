<?php

namespace HandissimoBundle\Form;


use HandissimoBundle\Entity\DisabilityTypes;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('disabilitytypes', EntityType::class, array(
                'empty_value' => 'Sélectionner un type de handicaps',
                'class' => 'HandissimoBundle:DisabilityTypes',
                'property' => 'disabilityName',
                'label' => 'Type de handicaps',
            ))
            ->add('needs', EntityType::class, array(
                'empty_value' => 'Sélectionner un type de besoins',
                'class' => 'HandissimoBundle\Entity\Needs',
                'property' => 'needName',
                'label' => 'Type de besoins'
            ))
            ->add('structurestypes', EntityType::class, array(
                'empty_value' => 'Sélectionner un type de structures',
                'class' => 'HandissimoBundle\Entity\StructuresTypes',
                'property' => 'structuretype',
                'label' => 'Type de Structures'
            ))
            ->add('save', SubmitType::class,
                array('label' => 'Recherche Avancée'));
    }

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