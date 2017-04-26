<?php

namespace HandissimoBundle\Form\Type;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('postal', TextType::class, array(
                'label' => false,
                'attr' => array(
                    'autocomplete' => 'off'),
                'required' => false))
            ->add('age', TextType::class,
                array('label' => false, 'attr' => array('autocomplete' => 'off'),
                'required' => false))
            ->add('need', EntityType::class, array(
                'label' => false,
                'required' => false,
                'class' => 'HandissimoBundle\Entity\Needs',
                'choice_name' => 'needName',
                'empty_value' => 'Scolarité, emploi, établissement....'
            ))
            ->add('disability', EntityType::class, array(
                'label' => false,
                'required' => false,
                'class' => 'HandissimoBundle\Entity\DisabilityTypes',
                'choice_name' => 'disabilityName',
                'empty_value' => 'Précisez le handicap'
            ))
            ->add('structure', EntityType::class, array(
                'label' => false,
                'required' => false,
                'class' => 'HandissimoBundle\Entity\StructuresList',
                'choice_name' => 'name',
                'empty_value' => 'Précisez le type de structure'
            ))
            ->add('save', SubmitType::class,
                array('label' => 'Trouvez votre solution'));

    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(

        ));
    }

    public function getBlockPrefix()
    {
        return 'research_action';
    }
}