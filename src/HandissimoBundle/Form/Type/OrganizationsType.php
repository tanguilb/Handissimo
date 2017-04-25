<?php

namespace HandissimoBundle\Form\Type;


use HandissimoBundle\Form\MediaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
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
            ->add('name', TextType::class, array(
                'label' => 'Nom de la structure :',
                'required' => true,
                'attr' => array(
                    'class' => 'stat',
                ),
            ))
            ->add('structureLogo', FileType::class, array(
                'label' => 'Vous pouvez télécharger ici votre logo :',
                'required' => false,
                'data_class' => null,
                'attr' => array(
                    'class' => 'stat',
                ),
            ))
            ->add('society', TextType::class, array(
                'label' => "Nom de l'organisme gestionnaire :",
                'required' => false,
                'attr' => array(
                    'class' => 'stat',
                ),
            ))
            ->add('societyLogo', FileType::class, array(
                'label' => 'Télécharger le logo de votre organisme gestionnaire :',
                'required' => false,
                'data_class' => null,
            ))
            ->add('address', TextType::class, array(
                'label' => 'Adresse postal :',
                'required' => false,
                'attr' => array(
                    'class' => 'stat',
                ),
            ))
            ->add('addressComplement', TextType::class, array(
                'label' => 'Complément d\'adresse :',
                'required' => false,
            ))
            ->add('postal', TextType::class, array(
                'label' => 'Code postal :',
                'required' => false,
                'attr' => array(
                    'class' => 'stat',
                ),
            ))
            ->add('city', TextType::class, array(
                'label' => 'Ville :',
                'required' => false,
                'attr' => array(
                    'class' => 'stat',
                ),
            ))
            ->add('phone_number', TextType::class, array(
                'label' => 'Telephone :',
                'required' => false,
                'attr' => array(
                    'class' => 'stat',
                ),
            ))
            ->add('mail', TextType::class, array(
                'label' => 'Email de contact :',
                'required' => false,
                'attr' => array(
                    'class' => 'stat',
                ),
            ))
            ->add('directorName', TextType::class, array(
                'label' => 'Nom du responsable :',
                'required' => false,
                'attr' => array(
                    'class' => 'stat',
                ),
            ))
            ->add('website', TextType::class, array(
                'label' => 'Site web :',
                'required' => false,
            ))
            ->add('facebook', TextType::class, array(
                'label' => 'Page Facebook :',
                'required' => false,
            ))
            ->add('brochures', FileType::class, array(
                'label' => 'Télécharger des documents :',
                'data_class' => null,
                'required' => false,
            ))
            ->add('orgaStructure', EntityType::class, array(
                'class' => 'HandissimoBundle\Entity\StructuresList',
                'label' => false,
                'choice_label' => 'name',
                'expanded' => true,
                'required' => false,
                'attr' => array(
                    'class' => 'stat',
                ),
            ))
            ->add('disabilitytypes', EntityType::class, array(
                'class' => 'HandissimoBundle\Entity\DisabilityTypes',
                'choice_label' => 'disabilityName',
                'choice_value' => 'id',
                'label' => 'Handicap des personnes accompagnées',
                'multiple' => true,
                'expanded' => true,
                'attr' => array(
                    'class' => 'stat',
                ),
            ))
            ->add('agemini', IntegerType::class, array(
                'label' => 'De :',
                'required' => false,
                'attr' => array(
                    'class' => 'stat',
                ),
            ))
            ->add('agemaxi', IntegerType::class, array(
                'label' => 'à :',
                'required' => false,
                'attr' => array(
                    'class' => 'stat',
                ),
            ))
            ->add('freeplace', IntegerType::class, array(
                'label' => 'Nombre de personnes accompagnées :',
                'required' => false,
                'attr' => array(
                    'class' => 'stat',
                ),
            ))
            ->add('organizationDescription', CKEditorType::class, array(
                'label' => "En utilisant des mots simples et des phrases courtes et en reprenant vos réponses précédentes, merci de décrire à qui s'adresse la structure, combien de personnes sont accompagnées, quel est leur handicap, quel degré d'autonomie est nécessaire pour être accompagné :",
                'required' => false,
                'attr' => array(
                    'class' => 'stat',
                ),
                'config' => array(
                'uiColor' => '#ffffff')))
            ->add('interventionZone', TextType::class, array(
                'label' => "Quelle est votre zone d’intervention ? Quelles sont les conditions de résidence pour accéder à la structure ?",
                'required' => false,
                'attr' => array(
                    'class' => 'stat',
                ),
            ))
            ->add('needs', EntityType::class, array(
                'class' => 'HandissimoBundle\Entity\Needs',
                'choice_label' => 'needName',
                'label' => 'Services/prestations principaux proposés par la structure :',
                'multiple' => true,
                'expanded' => true,
                'attr' => array(
                    'class' => 'stat',
                ),
            ))
            ->add('secondneeds', EntityType::class, array(
                'class' => 'HandissimoBundle\Entity\SecondaryNeeds',
                'choice_label' => 'needName',
                'label' => 'Services/prestations secondaires proposés par la structure :',
                'multiple' => true,
                'expanded' => true,
                'attr' => array(
                    'class' => 'stat',
                ),
            ))
            ->add('workingDescription', CKEditorType::class, array(
                'label' => 'En utilisant des mots simples et des phrases courtes, merci de décrire ce que propose votre structure :',
                'required' => false,
                'attr' => array(
                    'class' => 'stat',
                ),
                'config' => array(
                    'uiColor' => '#ffffff',
                    'extraPlugins' => 'confighelper',
                    'placeholder' =>
                        'Exemple 1: Les résidents habitent à la MAS, c’est leur lieu de vie. L’équipe s’occupe des soins nécessaires, de l’aide à la vie quotidienne, propose des activités dans les locaux ou à l’extérieur. Les activités ont pour objectif de faire progresser les résidents dans leur capacité de communication, leur ouverture sur le monde, le développement de leurs compétences. <br /> <br /> 
                                 Exemple 2 : L’association Une souris verte a pour objectif de sensibiliser aux différences et d’inclure les jeunes enfants en situation de handicap dans la société. Pour cela, l’association développe 4 actions principales : <ul> <li> l’accueil des enfants en situation de handicap parmi les autres dans trois structures d’accueil. </li> <li> l’accompagnement des familles d’enfants en situation de handicap, grâce à des rencontres et des espaces d’informations documentation </li> <li> la formation des acteurs et professionnels de santé. </li> <li> la sensibilisation à la différence </li> </ul>
                                 Exemple 3 : L\'établissement comprend un internat et des lieux d’accueil de jour. L’établissement assure : l’hébergement, la scolarité et une formation, les soins, les apprentissages liés à l’autonomie dans la vie quotidienne, des activités et les transports associés. Les jeunes y passent la journée, pour certains ils restent dormir. Exceptionnellement les jeunes peuvent être accueillis aussi le week-end.'
                ),
            ))
            ->add('accomodation', ChoiceType::class, array(
                'choices' => array(
                    'oui' => '1',
                    'non' => '0'
                ),
                'expanded' => true,
                'empty_data' => false,
                'required' => true,
                'choices_as_values' => true,
                'attr' => array(
                    'class' => 'stat',
                ),
                'label' => 'Proposez-vous de l’accueil ?'
            ))
            ->add('accomodationDescription', CKEditorType::class, array(
                'label' => false,
                'required' => false,
                'attr' => array(
                    'class' => 'stat',
                ),
                'config' => array(
                    'uiColor' => '#ffffff',
                    'extraPlugins' => 'confighelper',
                    'placeholder' =>
                        'Si oui : Quel type d’accueil ? Hébergement ? Accueil de jour ? ...',
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
                'attr' => array(
                    'class' => 'stat',
                ),
                'label' => 'Proposez-vous de la scolarisation ?'
            ))
            ->add('schoolDescription', CKEditorType::class, array(
                'label' => false,
                'required' => false,
                'attr' => array(
                    'class' => 'stat',
                ),
                'config' => array(
                    'uiColor' => '#ffffff',
                    'extraPlugins' => 'confighelper',
                    'placeholder' => 'Si oui, précisez : Nombre d’heure de « classe » ? Dans les murs ou à l’extérieur ? Combien de groupes/unités ? Combien de jeunes par groupe ? '
                        )
            ))
            ->add('dayDescription', CKEditorType::class, array(
                'label' => "Description d’une journée/semaine/intervention type, le cas échéant",
                'required' => false,
                'attr' => array(
                    'class' => 'stat',
                ),
                'config' => array(
                    'uiColor' => '#ffffff',
                )
            ))
            ->add('receptionDescription', CKEditorType::class, array(
                'label' => "Qu'est-il prévu pour les familles ?",
                'required' => false,
                'attr' => array(
                    'class' => 'stat',
                ),
                'config' => array(
                    'uiColor' => '#ffffff',
                    'extraPlugins' => 'confighelper',
                    'placeholder' =>
                        'Avant d’arriver dans la structure et une fois au sein de la structure ? Est-il possible de visiter ? Y a-t-il des réunions d’information ? Des rencontres entre parents ? A quelle fréquence ?'
                )
            ))
            ->add('teamMembersNumber', IntegerType::class, array(
                'label' => 'Combien y a-t-il de personnes dans l\'équipe ?',
                'required' => false,
                'attr' => array(
                    'class' => 'stat',
                ),
            ))
            ->add('stafforganizations', EntityType::class, array(
                'class' => 'HandissimoBundle:Staff',
                'choice_label' => 'jobs',
                'label' => 'Personnel de soins :',
                'multiple' => true,
                'expanded' => true,
                'attr' => array(
                    'class' => 'stat',
                ),
            ))
            ->add('socialstaffs', EntityType::class, array(
                'class' => 'HandissimoBundle:SocialStaff',
                'choice_label' => 'socialJobs',
                'label' => 'Personnel éducatif et social :',
                'multiple' => true,
                'expanded' =>true,
                'attr' => array(
                    'class' => 'stat',
                ),
            ))
            ->add('otherjobs', EntityType::class, array(
                'class' => 'HandissimoBundle:OtherJob',
                'choice_label' => 'name',
                'label' => 'Autres métiers :',
                'multiple' => true,
                'expanded' =>true,
                'attr' => array(
                    'class' => 'stat',
                ),
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
                'label' => 'Comment s’inscrire ?',
                'required' => false,
                'attr' => array(
                    'class' => 'stat',
                ),
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
                'label' => 'Orientation Mdph',
                'attr' => array(
                    'class' => 'stat',
                ),
                'required' => true

            ))
            ->add('openhours', TextType::class, array(
                'label' => 'Heures d\'ouverture :',
                'attr' => array(
                    'class' => 'stat',
                ),
                'required' => false
            ))
            ->add('opendays', ChoiceType::class, array(
                'label' => 'Jours d\'ouverture :',
                'required' => false,
                'choices' => array('Lundi' => 'Lundi', 'Mardi' => 'Mardi', 'Mercredi' => 'Mercredi', 'Jeudi' => 'Jeudi', 'Vendredi' => 'Vendredi', 'Samedi' => 'Samedi', 'Dimanche' => 'Dimanche'),
                'multiple' => true,
                'attr' => array(
                    'class' => 'stat',
                ),
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
                'attr' => array(
                    'class' => 'stat',
                ),
                'expanded' => true
            ))
            ->add('cost' , CKEditorType::class, array(
                'label' => 'Combien ça coûte ?',
                'required' => false,
                'attr' => array(
                    'class' => 'stat',
                ),
                'config' => array(
                    'uiColor' => '#ffffff',
                )
            ))
            ->add('transport' , CKEditorType::class, array(
                'label' => 'Transports :',
                'required' => false,
                'attr' => array(
                    'class' => 'stat',
                ),
                'config' => array(
                    'uiColor' => '#ffffff',
                    'extraPlugins' => 'confighelper',
                    'placeholder' => 'Comment accéder à la structure ? Les transports sont-ils organisés ? Financés ?'
                )
            ))
            ->add('media', collectionType::class, array(
                'entry_type' => MediaType::class,
                'label' => 'Images',
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false,
                'required' => false,
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
        $builder->get('accomodation')
            ->addModelTransformer(new CallbackTransformer(
                function ($accomodationAsBoolean){
                    return $accomodationAsBoolean ? "1" : "0";
                },
                function ($accomodationAsString){
                    return $accomodationAsString === "1" ? true : false;
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
