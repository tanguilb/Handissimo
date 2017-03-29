<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 29/03/17
 * Time: 11:49
 */
/*
namespace HandissimoBundle\Form\Type;


use Doctrine\ORM\EntityRepository;
use Sonata\CoreBundle\Form\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StructuresListType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('name', CollectionType::class, array(
                'entry_type' => StructureTypeType::class,

            ))





        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
 /*   public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HandissimoBundle\Entity\StructuresList',
        ));
    }

}