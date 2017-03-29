<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 29/03/17
 * Time: 13:33
 */
/*
namespace HandissimoBundle\Form\Type;

use Doctrine\ORM\EntityRepository;
use Sonata\CoreBundle\Form\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StructureTypeType extends AbstractType
{
    public function formBuilder(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', EntityType::class, array(
                'class' => 'HandissimoBundle\Entity\StructureType',
                'expanded' => true,
                'choice_label' => 'name',
            ));
    }
}