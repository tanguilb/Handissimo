<?php

namespace HandissimoBundle\Form;


use Sonata\AdminBundle\Form\Type\Filter\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('keyword', 'text',
                    array('attr' => array('autocomplete' => 'off'),
                    'required' => false,
                    'label' => false,
                    ))
            ->add('age', 'text',
                    array('attr' => array('autocomplete' => 'off'),
                    'required' => false,
                    'label' => false
                    ))
            ->add('postal', 'text',
                    array('attr' => array('autocomplete' => 'off'),
                    'required' => false,
                    'label' => false))
            /*->add('disabilitytypes', EntityType::class, array(
                'empty_value' => 'Sélectionner un type de handicaps',
                'class' => 'HandissimoBundle:DisabilityTypes',
                'choice_label' => 'disabilityName',
                'label' => 'Type de handicaps',
                'expanded' => false,
                'multiple' => true,
                'required' => false
            ))*/
            ->add('disabilitytypes', CollectionType::class, array(
                'label' => 'Type de handicaps',
                ' ' => true,
                //'expanded' => false,
                //'multiple' => true,
                'required' => false
            ))
            ->add('needs', EntityType::class, array(
                'empty_value' => 'Sélectionner un type de besoins',
                'class' => 'HandissimoBundle\Entity\Needs',
                'property' => 'needName',
                'label' => 'Type de besoins',
                'expanded' => false,
                'multiple' => true,
                'required' => false
            ))
            ->add('structurestypes', EntityType::class, array(
                'empty_value' => 'Sélectionner un type de structures',
                'class' => 'HandissimoBundle\Entity\StructuresTypes',
                'property' => 'structurestype',
                'label' => 'Type de Structures',
                'expanded' => false,
                'multiple' => true,
                'required' => false
            ))
            ->add('save', SubmitType::class,
                    array('label' => 'Rechercher'));
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
        return 'research_action';
    }
}