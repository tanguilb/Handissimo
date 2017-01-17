<?php

namespace HandissimoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrganizationsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('organizationName')
            ->add('adress')
            ->add('postal')
            ->add('city')
            ->add('organizationPhoneNumber')
            ->add('organizationMail')
            ->add('organizationWebsite')
            ->add('organizationBlog')
            ->add('organizationFacebook')
            ->add('organizationTwitter')
            ->add('agegroup')
            ->add('freeplace')
            ->add('organizationDescription')
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
            ->add('societies')
            ->add('disabilityTypes')
            ->add('needs')
            ->add('stafforganizations')
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
