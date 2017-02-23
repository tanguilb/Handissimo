<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 23/02/17
 * Time: 09:54
 */

namespace HandissimoBundle\Form;


use Doctrine\DBAL\Types\BooleanType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SolutionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname', TextType::class)
            ->add('firstname', TextType::class)
            ->add('mail', TextType::class)
            ->add('status', TextType::class)
            ->add('solutionName', TextType::class)
            ->add('societyName', TextType::class)
            ->add('honor', BooleanType::class)
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HandissimoBundle\Entity\Solution'
        ));
    }

    public function getBlockPrefix()
    {
        return 'handissimobundle_solution';
    }
}