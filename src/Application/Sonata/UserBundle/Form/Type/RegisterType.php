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
            ->add('userType', CheckboxType::class, array(
                'value' => array(
                    "Je suis une personne handicapée ou sa famille" => null,
                    "Je suis un professionnel(médecin, assistante social ...)" => false,
                    "Je suis un gestionnaire (association, fondation, autre)" => true,

                )
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