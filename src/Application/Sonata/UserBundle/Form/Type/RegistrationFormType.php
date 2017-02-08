<?php

/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 08/02/17
 * Time: 12:17
 */

namespace Application\Sonata\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('simpleUser', CheckboxType::class, array(
            'label' => 'Je suis une personne handicapée ou sa famille',
            'required' => false
        ))
            ->add('professionnal', CheckboxType::class, array(
                'label' => 'Je suis un professionnel (médecin, assistant social ...)',
                'required' => false
            ))
            ->add('gestionnaire', CheckboxType::class, array(
                'label' => 'Je suis un gestionnaire (association, fondation, autre)',
                'required' => false
            ))
            ->add('structure', CheckboxType::class, array(
                'label' => 'Je suis un administrateur structure',
                'required' => false
            ));
    }

}