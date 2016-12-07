<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 05/12/16
 * Time: 14:23
 */

namespace HandissimoBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('keyword',
                      'text',
                      array('required' => false, 'attr' => array('autocomplete' => 'off')))
               ->add('age',
                      'text',
                       array('required' => false, 'attr' => array('autocomplete' => 'off')))
                ->add('postal',
                      'text',
                       array('required' => false, 'attr' => array('autocomplete' => 'off')))
                ->add('save', SubmitType::class,
                        array('label' => 'appuie'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array());
    }

    public function getBlockPrefix()
    {
        return 'handissimobundle_research';
    }
}