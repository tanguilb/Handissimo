<?php

/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 08/02/17
 * Time: 12:17
 */

namespace Application\Sonata\UserBundle\Form\Type;

use FOS\UserBundle\Form\Type\RegistrationFormType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegisterType extends RegistrationFormType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        parent::buildForm($builder, $options);

        $builder
            ->add('userType', ChoiceType::class, array(
                'choices' => array(
                    'Particulier' => "je suis un particulier",
                    'Professionnel(le)' => "Je suis un professionnel",
                    'Autre' => "Autre"
                ),
                'multiple' => false,
                'expanded' => true


            ))
            ->add('compact', CheckboxType::class);
    }

    public function setDefaultOption(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'validation_groups' => array('Default', 'Register')
        ));
    }

    public function getName()
    {
        return 'front_user_registration';
    }

}