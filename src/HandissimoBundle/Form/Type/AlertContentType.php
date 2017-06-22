<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 16/06/17
 * Time: 08:51
 */

namespace HandissimoBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AlertContentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('choice', ChoiceType::class, array(
                'label' => 'Choix',
                'choices' => array(
                    'Information erronée' => 'Information erronée',
                    'Fautes d\'orthographe' => 'Fautes d\'orthographe',
                    'Contenu dégradé' => 'Contenu dégradé',
                    'Contenu inapproprié' => 'Contenu inapproprié',
                    'Autre' => 'Autre'
                ),
            ))
            ->add('description', TextareaType::class, array(
                'label' => 'Description'
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HandissimoBundle\Entity\AlertContent'
        ));
    }

    public function getBlockPrefix()
    {
        return 'handissimo_alert_content';
    }

    public function getName()
    {
        return 'alert_content';
    }
}