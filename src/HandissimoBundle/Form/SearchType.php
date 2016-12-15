<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 12/12/16
 * Time: 21:39
 */

namespace HandissimoBundle\Form;


use HandissimoBundle\HandissimoBundle;
use HandissimoBundle\Repository\DisabilityTypesRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            /**
             * @var DisabilityTypesRepository
             */
            ->add('disabilitytypes', 'entity', array(
                'empty_value' => 'Sélectionner un type de handicaps',
                'class' => 'HandissimoBundle:DisabilityTypes',
                'choice_label' => 'disabilityName',
                'label' => 'Type de handicaps',
                /*'query_builder' => function(\src\Handissimo\Repository\DisabilitypesRepository $r) {
                    return $r->getBySelectDisability();
                }*/
            ))
            ->add('needs', 'entity', array(
                'empty_value' => 'Sélectionner un type de besoins',
                'class' => 'HandissimoBundle\Entity\Needs',
                'choice_label' => 'needName',
                'label' => 'Type de besoins'
            ))
            ->add('structurestypes', 'entity', array(
                'empty_value' => 'Sélectionner un type de structures',
                'class' => 'HandissimoBundle\Entity\StructuresTypes',
                'choice_label' => 'structurestype',
                'label' => 'Type de Structures'
            ));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array());
    }

    public function getBlockPrefix()
    {
        return 'handissimo_search';
    }
}