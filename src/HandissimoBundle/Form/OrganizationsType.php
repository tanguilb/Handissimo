<?php

namespace HandissimoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class OrganizationsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('societies')
            ->add('name')
            ->add('address')
            ->add('postal')
            ->add('city')
            ->add('phoneNumber')
            ->add('mail')
            ->add('website')
            ->add('blog')
            ->add('facebook')
            ->add('twitter')
            ->add('agemini')
            ->add('agemaxi')
            ->add('freeplace')
            ->add('organizationDescription', CKEditorType::class, array(
            'config' => array(
            'uiColor' => '#ffffff')))
            ->add('serveDescription')
            ->add('openhours')
            ->add('opendays')
            ->add('teamMembersNumber')
            ->add('teamDescription')
            ->add('updateDatetime')
            ->add('workingDescription')
            ->add('school')
            ->add('schoolDescription')
            ->add('activities')
            ->add('placeDescription')
            ->add('doc')
            ->add('profilPicture')
            ->add('structuretype')
            ->add('picture')
            ->add('disabilityTypes')
            ->add('needs', EntityType::class, array(
            'class' => 'HandissimoBundle:Needs',
            'choice_label' => 'needName',
            'label' => 'besoin',
            'multiple' => true,
            'expanded' => true,
            ))
            ->add('stafforganizations', EntityType::class, array(
            'class' => 'HandissimoBundle:Staff',
            'placeholder' => 'choisissez',
            'choice_label' => 'jobs',
            'label' => 'Métier',
            'multiple' => false,
            ))

        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HandissimoBundle\Entity\Organizations'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'handissimobundle_organizations';
    }


}
