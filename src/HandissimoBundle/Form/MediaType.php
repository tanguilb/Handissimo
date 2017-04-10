<?php

namespace HandissimoBundle\Form;

use HandissimoBundle\Form\Type\OrganizationsType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Sonata\DatagridBundle\Filter\FilterInterface;

class MediaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file', FileType::class, array(
                'required' => false,
                'label' => 'Ajouter une image',
            ))
            ->add('caroussel', CheckboxType::class, array(
                'label' => 'Ajouter au caroussel: ',
                'required' => false,
            ))
            ->add('firstPicture', CheckboxType::class, array(
                'label' => 'Définir comme image de présentation: ',
                'required' => false,
            ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HandissimoBundle\Entity\Media'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'handissimobundle_media';
    }


}
