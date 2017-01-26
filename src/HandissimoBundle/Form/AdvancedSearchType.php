<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 19/01/17
 * Time: 14:06
 */

namespace HandissimoBundle\Form;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdvancedSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('keyword', TextType::class,
                array('attr' => array('autocomplete' => 'off'),
                    'required' => false,
                    'label' => false,
                ))
            ->add('age', TextType::class,
                array('attr' => array('autocomplete' => 'off'),
                    'required' => false,
                    'label' => false
                ))
            ->add('postal', TextType::class,
                array('attr' => array('autocomplete' => 'off'),
                    'required' => false,
                    'label' => false))
            ->add('save', SubmitType::class, array(
                'label' => 'Trouver'))
            ->add('structurestypes', EntityType::class, array(
                'empty_value' => 'Type de structure',
                'class' => 'HandissimoBundle\Entity\StructuresTypes',
                'choice_label' => 'structurestype',
                'label' => false,
                'expanded' => false,
                'required' => false,
            ))
            ->add('disabilitytypes', EntityType::class, array(
                'empty_value' => 'Type de handicap',
                'class' => 'HandissimoBundle:DisabilityTypes',
                'choice_label' => 'disabilityName',
                'label' => false,
                'expanded' => false,
                'required' => false,
            ))
            ->add('needs', EntityType::class, array(
                'empty_value' => 'Type de besoin',
                'class' => 'HandissimoBundle\Entity\Needs',
                'choice_label' => 'needName',
                'label' => false,
                'expanded' => false,
                'required' => false,
            ));
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
        ));
    }
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'research_advanced';
    }
}