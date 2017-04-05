<?php

namespace HandissimoBundle\Form\Type;


use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
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
            ))
            ->add('structureLogo', FileType::class, array(
                'label' => 'Vous pouvez télécharger ici votre logo :',
                'required' => false,
                'data_class' => null,
            ))
            ->add('society', TextType::class, array(
                'label' => "Nom de l'organisme gestionnaire :",
                'required' => false,
            ))
            ->add('societyLogo', FileType::class, array(
                'label' => 'Télécharger le logo de votre organisme gestionnaire :',
                'required' => false,
                'data_class' => null,
            ))
            ->add('address', TextType::class, array(
                'label' => 'Adresse postal :',
                'required' => true,
            ))
            ->add('addressComplement', TextType::class, array(
                'label' => 'Complément d\'adresse :',
                'required' => false,
            ))
            ->add('postal', TextType::class, array(
                'label' => 'Code postal :',
                'required' => true,
            ))
            ->add('city', TextType::class, array(
                'label' => 'Ville :',
                'required' => true,
            ))
            ->add('phone_number', TextType::class, array(
                'label' => 'Telephone :',
                'required' => true,
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
                'required' => true,

            ))
            ->add('disabilitytypes', EntityType::class, array(
                'class' => 'HandissimoBundle\Entity\DisabilityTypes',
                'choice_label' => 'disabilityName',
                'choice_value' => 'id',
                'label' => 'Handicap des personnes accompagnées',
                'multiple' => true,
                'expanded' => true,
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
            ))
            ->add('secondneeds', EntityType::class, array(
                'class' => 'HandissimoBundle\Entity\SecondaryNeeds',
                'choice_label' => 'needName',
                'label' => 'Services/prestations secondaires proposés par la structure :',
                'multiple' => true,
                'expanded' => true,
            ))
            ->add('workingDescription', CKEditorType::class, array(
                'label' => 'En utilisant des mots simples et des phrases courtes et en reprenant vos réponses précédentes, merci de décrire ce que propose votre structure aux personnes accompagnées (en "hiérarchisant" le cœur de votre travail et les activités annexes) :',
                'required' => false,
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
                    'oui' => 'oui',
                    'non' => 'non'
                ))
            )
            ->add('accomodationDescription', CKEditorType::class, array(
                'label' => false,
                'required' => false,
                'config' => array(
                    'uiColor' => '#ffffff',
                    'extraPlugins' => 'confighelper',
                    'placeholder' =>
                        'Si oui : Quel type d’accueil ? Hébergement ? Accueil de jour ? ...',
                ),
            ))
            ->add('school', ChoiceFieldMaskType::class, array(
                'choices' => array(
                    'oui' => 'oui',
                    'non' => 'non',
                ),
                'map' => array(
                    'oui' => array('schoolDescription')
                ),
            ))
            ->add('schoolDescription', CKEditorType::class, array(
                'label' => false,
                'required' => false,
                'config' => array(
                    'uiColor' => '#ffffff',
                    'extraPlugins' => 'confighelper',
                    'placeholder' => 'Si oui, précisez : Nombre d’heure de « classe » ? Dans les murs ou à l’extérieur ? Combien de groupes/unités ? Combien de jeunes par groupe ? '
                        )
            ))
            ->add('dayDescription', CKEditorType::class, array(
                'label' => "Description d’une journée/semaine/intervention type",
                'required' => false,
                'config' => array(
                    'uiColor' => '#ffffff',
                )
            ))
            ->add('receptionDescription', CKEditorType::class, array(
                'label' => false,
                'required' => false,
                'config' => array(
                    'uiColor' => '#ffffff',
                    'extraPlugins' => 'confighelper',
                    'placeholder' =>
                        'Avant d’arriver dans la structure et une fois au sein de la structure ? Est-il possible de visiter ? Y a-t-il des réunions d’information ? Des rencontres entre parents ? A quelle fréquence ?'
                )
            ))
            ->add('teamMembersNumber', IntegerType::class, array(
                'label' => 'Combien y a-t-il de personne dans l\'équipe ?',
                'required' => false,
            ))
            ->add('stafforganizations', EntityType::class, array(
                'class' => 'HandissimoBundle:Staff',
                'choice_label' => 'jobs',
                'label' => 'Personnel de soins :',
                'multiple' => true,
                'expanded' => true,
            ))
            ->add('socialstaffs', EntityType::class, array(
                'class' => 'HandissimoBundle:SocialStaff',
                'choice_label' => 'socialJobs',
                'label' => 'Personnel éducatif et social :',
                'multiple' => true,
                'expanded' =>true,
            ))
            ->add('otherjobs', EntityType::class, array(
                'class' => 'HandissimoBundle:OtherJob',
                'choice_label' => 'name',
                'label' => 'Autres métiers :',
                'multiple' => true,
                'expanded' =>true,
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
                'config' => array(
                    'uiColor' => '#ffffff',
                )
            ))
            /*->add('orientationMdph', ChoiceType::class, array(
                'label' => 'Orientation MDPH',
                'required' => false,
                'choices' => array(
                    1 => 'oui',
                    0 => 'non'
                ),
                'expanded' => true
            ))*/
            ->add('orientationMdph', BooleanType::class, array(
                'compound' => boolval(true)

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
                'label' => 'Combien ça coûte ?',
                'required' => false,
                'config' => array(
                    'uiColor' => '#ffffff',
                )
            ))
            ->add('transport' , CKEditorType::class, array(
                'label' => 'Transports :',
                'required' => false,
                'config' => array(
                    'uiColor' => '#ffffff',
                    'extraPlugins' => 'confighelper',
                    'placeholder' => 'Comment accéder à la structure ? Les transports sont-ils organisés ? Financés ?'
                )
            ))
        ;

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $data = $event->getData();
            $form = $event->getForm();

        });
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
