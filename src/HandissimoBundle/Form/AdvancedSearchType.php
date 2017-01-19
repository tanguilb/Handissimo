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
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdvancedSearchType extends AbstractType
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

            ->add('disabilitytypes', EntityType::class, array(
                'empty_value' => 'Sélectionner un type de handicaps',
                'class' => 'HandissimoBundle:DisabilityTypes',
                'property' => 'disabilityName',
                'label' => 'Type de handicaps',
                'expanded' => false,
                'required' => false,
                /*'query_builder' => function (EntityRepository $er) use {
                    return $er->createQueryBuilder('dt')
                        ->orderBy('dt.disabilityName', 'ASC');
                }*/
            ))
            ->add('needs', EntityType::class, array(
                'empty_value' => 'Sélectionner un type de besoins',
                'class' => 'HandissimoBundle\Entity\Needs',
                'property' => 'needName',
                'label' => 'Type de besoins',
                'expanded' => false,
                'required' => false
            ))
            ->add('structurestypes', EntityType::class, array(
                'empty_value' => 'Sélectionner un type de structures',
                'class' => 'HandissimoBundle\Entity\StructuresTypes',
                'property' => 'structurestype',
                'label' => 'Type de Structures',
                'expanded' => false,
                'required' => false
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'Rechercher'));
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