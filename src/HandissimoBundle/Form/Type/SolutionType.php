<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 23/02/17
 * Time: 09:54
 */

namespace HandissimoBundle\Form\Type;


use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SolutionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname', TextType::class, array(
                'label' => 'Nom'
            ))
            ->add('firstname', TextType::class, array(
                'label' => 'Prénom'
            ))
            ->add('mail', TextType::class, array(
                'label' => 'Email'
            ))
            ->add('phoneNumber', TextType::class, array(
                'label' => 'Téléphone fixe'
            ))
            ->add('cellphoneNumber', TextType::class, array(
                'label' => 'Téléphone portable'
            ))
            ->add('status', TextType::class, array(
                'label' => 'Votre Fonction'
            ))
            ->add('solutionName', TextType::class, array(
                'label' => 'Nom de votre solution'
            ))
            ->add('societyName', TextType::class, array(
                'label' => 'Nom de l\'organisme gestionnaire si existant'
            ))
            ->add('message', TextareaType::class, array(
                'label' => 'Message'
            ))
            ->add('honor', CheckboxType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HandissimoBundle\Entity\Solution'
        ));
    }

    public function getBlockPrefix()
    {
        return 'handissimo_solution';
    }
}