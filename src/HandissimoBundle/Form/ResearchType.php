<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 05/12/16
 * Time: 14:23
 */

namespace HandissimoBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('keyword',
                      'text',
                      array('attr' => array('autocomplete' => 'off')))
                ->add('age',
                      'text',
                       array('attr' => array('autocomplete' => 'off')))
                ->add('postal',
                      'text',
                       array('attr' => array('autocomplete' => 'off')));
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