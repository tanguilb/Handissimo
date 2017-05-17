<?php

namespace HandissimoBundle\Form\Type;


use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('postal', TextType::class, array(
                'label' => false,
                'attr' => array(
                    'autocomplete' => 'off'),
                'required' => false))
            ->add('age', TextType::class,
                array('label' => false, 'attr' => array('autocomplete' => 'off'),
                'required' => false))
            ->add('need', EntityType::class, array(
                'label' => false,
                'required' => false,
                'class' => 'HandissimoBundle\Entity\Needs',
                'query_builder' => function(EntityRepository $er)
                {
                    return $er->createQueryBuilder('n')
                        ->orderBy('n.needName', 'ASC');
                },
                'choice_name' => 'needName',
                'empty_value' => 'Scolarité, soin, établissement…'
            ))
            ->add('disability', EntityType::class, array(
                'label' => false,
                'required' => false,
                'class' => 'HandissimoBundle\Entity\DisabilityTypes',
                'query_builder' => function(EntityRepository $er)
                {
                    return $er->createQueryBuilder('dt')
                        ->orderBy('dt.disabilityName', 'ASC');
                },
                'choice_name' => 'disabilityName',
                'multiple' => true
                //'attr' => array('class' => 'js-example-basic-multiple-responsive', 'multiple' => 'multiple')
            ))
            ->add('structure', EntityType::class, array(
                'label' => false,
                'required' => false,
                'class' => 'HandissimoBundle\Entity\StructuresList',
                'query_builder' => function(EntityRepository $er)
                {
                    return $er->createQueryBuilder('sl')
                        ->orderBy('sl.name', 'ASC');
                },
                'choice_name' => 'name',
                'multiple' => true
                //'attr' => array('class' => 'js-example-basic-multiple-responsive', 'multiple' => 'multiple')
            ))
            ->add('save', SubmitType::class,
                array('label' => 'Trouvez votre solution'));

    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(

        ));
    }

    public function getBlockPrefix()
    {
        return 'research_action';
    }
}