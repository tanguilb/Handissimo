<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 13/03/17
 * Time: 09:41
 */

namespace HandissimoBundle\Admin;


use Doctrine\ORM\EntityRepository;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class SocialStaffAdmin extends AbstractAdmin
{
    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('socialJobs', TextType::class,
                array(
                    'label' => 'Métiers',
                    'required' => false
                ))
            ->add('socialstafforga',EntityType::class,array (
                'class' => 'HandissimoBundle:SocialStaff',
                'choice_label' => 'socialJobs',
                'label' => false,
                'expanded' => true,
                'multiple' => true,
                'by_reference' => true,
                'disabled' => true,
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('ss')
                        ->orderBy('ss.socialJobs', 'ASC');
                },
            ));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('socialJobs', null,
                array(
                    'label' => 'Métiers'
                ));
    }
}