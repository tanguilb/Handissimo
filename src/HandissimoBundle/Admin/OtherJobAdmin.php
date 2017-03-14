<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 14/03/17
 * Time: 10:47
 */

namespace HandissimoBundle\Admin;


use Doctrine\ORM\EntityRepository;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class OtherJobAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', TextType::class,
                array(
                    'label' => 'Métiers',
                    'required' => false
                ))
            ->add('otherjoborga',EntityType::class,array (
                'class' => 'HandissimoBundle:OtherJob',
                'choice_label' => 'name',
                'label' => false,
                'expanded' => true,
                'multiple' => true,
                'by_reference' => true,
                'disabled' => true,
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('oj')
                        ->orderBy('oj.name', 'ASC');
                },
            ));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name', null,
                array(
                    'label' => 'Métiers'
                ));
    }
}