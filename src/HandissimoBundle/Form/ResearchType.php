<?php

namespace HandissimoBundle\Form;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
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