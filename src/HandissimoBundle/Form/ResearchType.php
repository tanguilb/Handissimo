<?php

namespace HandissimoBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('keyword', SearchType::class, array(
                'attr' => array('autocomplete' => 'off', 'maxlength' => 10),
                'required' => false,
                'label' => false))
            ->add('age', SearchType::class, array(
                'attr' => array('autocomplete' => 'off'),
                'required' => false,
                'label' => false))
            ->add('postal', SearchType::class, array(
                'attr' => array('autocomplete' => 'off'),
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