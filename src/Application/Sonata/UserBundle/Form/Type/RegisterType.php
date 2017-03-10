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
use Symfony\Component\Form\Extension\Core\Type\RadioType;
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
                    'utilisateur' => "Je suis une personne en situation de handicap",
                    'famille' => "Je suis un proche, une famille, un aidant",
                    'professionnel' => "Je suis un professionnel",
                ),
                'multiple' => false,
                'expanded' => true


            ));
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