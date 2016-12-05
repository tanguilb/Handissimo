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

class ResearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('keyword',
                      'text',
                      array('attr' => array('autocomplete' => 'off')))
                ->add('age')
                ->add('town',
                      'text',
                      array('attr' => array('autocomplete' => 'off')));
    }

    public function getBlockPrefix()
    {
        return 'handissimobundle_research';
    }
}