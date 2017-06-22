<?php

namespace HandissimoBundle\Form\Type;


use Doctrine\ORM\EntityRepository;
use HandissimoBundle\Form\MediaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;


class OrganizationsType extends AbstractType
{


    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'label' => 'Nom de la structure * : ',
                'required' => true,
            ))
            ->add('structureLogoFile', VichImageType::class, array(
                'label' => 'Vous pouvez télécharger ici votre logo :',
                'required' => false,
                'download_link' => false,
            ))
            ->add('society', TextType::class, array(
                'label' => "Nom de l'organisme gestionnaire :",
                'required' => false,
            ))
            ->add('societyLogoFile', VichImageType::class, array(
                'label' => 'Télécharger le logo de votre organisme gestionnaire :',
                'required' => false,
                'download_link' => false
            ))
            ->add('address', TextType::class, array(
                'label' => 'Adresse postale :',
                'required' => false,
            ))
            ->add('addressComplement', TextType::class, array(
                'label' => 'Complément d\'adresse :',
                'required' => false,
            ))
            ->add('postal', TextType::class, array(
                'label' => 'Code postal :',
                'required' => false,
            ))
            ->add('city', TextType::class, array(
                'label' => 'Ville :',
                'required' => false,
            ))
            ->add('phone_number', TextType::class, array(
                'label' => 'Telephone :',
                'required' => false,
            ))
            ->add('mail', TextType::class, array(
                'label' => 'Email de contact :',
                'required' => false,
            ))
            ->add('directorName', TextType::class, array(
                'label' => 'Nom du responsable :',
                'required' => false,
            ))
            ->add('website', TextType::class, array(
                'label' => 'Site web :',
                'required' => false,
            ))
            ->add('facebook', TextType::class, array(
                'label' => 'Page Facebook :',
                'required' => false,
            ))
            ->add('brochureFile', VichFileType::class, array(
                'label' => 'Télécharger des documents :',
                'required' => false,
                'download_link' => false
            ))
            ->add('orgaStructure', EntityType::class, array(
                'class' => 'HandissimoBundle\Entity\StructuresList',
                'label' => 'Choisissez votre type de structure',
                'choice_label' => 'name',
                'expanded' => true,
                'empty_value' => 'Je ne sais pas',
                'required' => false,
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('sl')
                        ->orderBy('sl.name', 'ASC');
                },
            ))
            ->add('disabilitytypes', EntityType::class, array(
                'class' => 'HandissimoBundle\Entity\DisabilityTypes',
                'choice_label' => 'disabilityName',
                'choice_value' => 'id',
                'label' => 'Handicap des personnes accompagnées',
                'multiple' => true,
                'expanded' => true,
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('d')
                        ->orderBy('d.disabilityName', 'ASC');
                },
            ))
            ->add('agemini', IntegerType::class, array(
                'label' => 'De :',
                'required' => false,
            ))
            ->add('agemaxi', IntegerType::class, array(
                'label' => 'à :',
                'required' => false,
            ))
            ->add('freeplace', IntegerType::class, array(
                'label' => 'Nombre de personnes accompagnées :',
                'required' => false,
            ))
            ->add('organizationDescription', CKEditorType::class, array(
                'label' => "En utilisant des mots simples et des phrases courtes et en reprenant vos réponses précédentes, merci de décrire à qui s'adresse la structure, combien de personnes sont accompagnées, quel est leur handicap, quel degré d'autonomie est nécessaire pour être accompagné :",
                'required' => false,
                'config' => array(
                'uiColor' => '#ffffff')))
            ->add('interventionZone', TextType::class, array(
                'label' => "Quelle est votre zone d’intervention ? Quelles sont les conditions de résidence pour accéder à la structure ?",
                'required' => false,
            ))
            ->add('needs', EntityType::class, array(
                'class' => 'HandissimoBundle\Entity\Needs',
                'choice_label' => 'needName',
                'label' => 'Services/prestations principaux proposés par la structure :',
                'multiple' => true,
                'expanded' => true,
                'query_builder' => function(EntityRepository $er){
                    return $er->createQueryBuilder('n')
                        ->orderBy('n.needName', 'ASC');
                },
            ))
            ->add('secondneeds', EntityType::class, array(
                'class' => 'HandissimoBundle\Entity\SecondaryNeeds',
                'choice_label' => 'needName',
                'label' => 'Services/prestations secondaires proposés par la structure :',
                'multiple' => true,
                'expanded' => true,
                'query_builder' => function(EntityRepository $er){
                    return $er->createQueryBuilder('sn')
                        ->orderBy('sn.needName');
                },
            ))
            ->add('workingDescription', CKEditorType::class, array(
                'label' => 'En utilisant des mots simples et des phrases courtes, merci de décrire ce que propose votre structure :',
                'required' => false,
                'config' => array(
                    'uiColor' => '#ffffff',
                ),
            ))
            ->add('school', ChoiceType::class, array(
                'choices' => array(
                    'oui' => '1',
                    'non' => '0'
                ),
                'expanded' => true,
                'empty_data' => false,
                'choices_as_values' => true,
                'required' => true,
                'label' => 'Proposez-vous de la scolarisation ?'
            ))
            ->add('schoolDescription', CKEditorType::class, array(
                'label' => false,
                'required' => false,

                'config' => array(
                    'uiColor' => '#ffffff',
                    'placeholder' => 'Si oui, précisez : Nombre d’heure de « classe » ? Dans les murs ou à l’extérieur ? Combien de groupes/unités ? Combien de jeunes par groupe ? '
                        )
            ))
            ->add('dayDescription', CKEditorType::class, array(
                'label' => "Description d’une journée/semaine/intervention type, le cas échéant",
                'required' => false,
                'config' => array(
                    'uiColor' => '#ffffff',
                )
            ))
            ->add('receptionDescription', CKEditorType::class, array(
                'label' => "Qu'est-il prévu pour les familles ?",
                'required' => false,
                'config' => array(
                    'uiColor' => '#ffffff',
                    'placeholder' =>
                        'Avant d’arriver dans la structure et une fois au sein de la structure ? Est-il possible de visiter ? Y a-t-il des réunions d’information ? Des rencontres entre parents ? A quelle fréquence ?'
                )
            ))
            ->add('teamMembersNumber', IntegerType::class, array(
                'label' => 'Combien y a-t-il de personnes dans l\'équipe ?',
                'required' => false,
            ))
            ->add('stafforganizations', EntityType::class, array(
                'class' => 'HandissimoBundle:Staff',
                'choice_label' => 'jobs',
                'label' => 'Personnel de soins :',
                'multiple' => true,
                'expanded' => true,
                'query_builder' => function(EntityRepository $er){
                    return $er->createQueryBuilder('s')
                        ->orderBy('s.jobs', 'ASC');
                },
            ))
            ->add('socialstaffs', EntityType::class, array(
                'class' => 'HandissimoBundle:SocialStaff',
                'choice_label' => 'socialJobs',
                'label' => 'Personnel éducatif et social :',
                'multiple' => true,
                'expanded' =>true,
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('ss')
                        ->orderBy('ss.socialJobs', 'ASC');
                },
            ))
            ->add('otherjobs', EntityType::class, array(
                'class' => 'HandissimoBundle:OtherJob',
                'choice_label' => 'name',
                'choice_value' => 'id',
                'label' => 'Autres métiers :',
                'multiple' => true,
                'expanded' =>true,
                'query_builder' => function(EntityRepository $er){
                    return $er->createQueryBuilder('ot')
                        ->orderBy('ot.name');
                },
            ))
            ->add('commentStaff', CKEditorType::class, array(
                'label' => 'Commentaire éventuel sur l’équipe :',
                'required' => false,
                'config' => array(
                    'uiColor' => '#ffffff',
                )
            ))
            ->add('update_datetime', DateTimeType::class, array(
                'label' => false,
                'pattern' => 'dd MMM y G',
                'attr' => array('style' => 'display:none'),
                'data' => new \DateTime(),
            ))
            ->add('inscription', CKEditorType::class, array(
                'label' => 'Si oui, précisez la procèdure d\'admission, si non, précisez les modalités d\'inscription',
                'required' => false,
                'config' => array(
                    'uiColor' => '#ffffff',
                )
            ))
            ->add('orientationMdph', ChoiceType::class, array(
                'choices' => array(
                    'oui' => '1',
                    'non' => '0'
                ),
                'expanded' => true,
                'empty_value' => false,
                'choices_as_values' => true,
                'label' => 'Notification Mdph',
                'required' => true

            ))
            ->add('openhours', TextType::class, array(
                'label' => 'Heures d\'ouverture :',
                'required' => false
            ))
            ->add('opendays', ChoiceType::class, array(
                'label' => 'Jours d\'ouverture :',
                'required' => false,
                'choices' => array('Lundi' => 'Lundi', 'Mardi' => 'Mardi', 'Mercredi' => 'Mercredi', 'Jeudi' => 'Jeudi', 'Vendredi' => 'Vendredi', 'Samedi' => 'Samedi', 'Dimanche' => 'Dimanche'),
                'multiple' => true,
                'expanded' => true
            ))
            ->add('opendaysYear', ChoiceType::class, array(
                'label' => 'Jours d\'ouverture par an :',
                'required' => false,
                'choices' => array(
                    'Toute l’année' => 'Toute l’année',
                    'Sur le temps scolaire' => 'Sur le temps scolaire',
                    'Sur le temps scolaire et en partie pendant les vacances scolaires' => 'Sur le temps scolaire et en partie pendant les vacances scolaires',
                    'Pendant les vacances scolaires uniquement' => 'Pendant les vacances scolaires uniquement',
                    'Les week-ends' => 'Les week-ends'),
                'multiple' => true,
                'expanded' => true
            ))
            ->add('cost' , CKEditorType::class, array(
                'label' => 'Combien ça coûte pour l\'usager ?',
                'required' => false,
                'config' => array(
                    'uiColor' => '#ffffff',
                )
            ))
            ->add('transport' , CKEditorType::class, array(
                'label' => 'Transports : Comment accéder à la structure ? Les transports sont-ils organisés ? Financés ?',
                'required' => false,
                'config' => array(
                    'uiColor' => '#ffffff',
                )
            ))
            ->add('firstPictureFile', VichImageType::class, array(
                'required' => false,
                'label' => 'Ajouter une image qui s\'affichera par défaut sur la page de résultat',
                'download_link' => false,

            ))
            ->add('media', CollectionType::class, array(
                'entry_type' => MediaType::class,
                'label' => 'Ajouter d\'autres images qui apparaitront sur la fiche de votre structure',
                'allow_add' => true,
                'allow_delete' => true,
                'delete_empty' => true,
                'prototype' => true,
                'by_reference' => false,
                'required' => false,
            ))
            ->add('freeDescription', CKEditorType::class, array(
                'label' => 'Souhaitez-vous mettre en avant une information spécifique sur la fiche de votre structure ?',
                'required' => false,
                'config' => array(
                    'uiColor' => '#ffffff',
                )
            ));

        $builder->get('school')
            ->addModelTransformer(new CallbackTransformer(
                function ($schoolAsBoolean){
                    return $schoolAsBoolean ? "1" : "0";
                },
                function ($schoolAsString){
                    return $schoolAsString === "1" ? true : false;
                }
            ));
        $builder->get('orientationMdph')
            ->addModelTransformer(new CallbackTransformer(
                function ($orientationMdphAsBoolean){
                    return $orientationMdphAsBoolean ? "1" : "0";
                },
                function ($orientationMdphAsString){
                    return $orientationMdphAsString === "1" ? true : false;
                }
            ));

    ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HandissimoBundle\Entity\Organizations',
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
