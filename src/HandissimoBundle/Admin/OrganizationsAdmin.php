<?php

namespace HandissimoBundle\Admin;

use Doctrine\ORM\EntityRepository;
use HandissimoBundle\Entity\StructuresList;
use HandissimoBundle\Entity\StructuresTypes;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use HandissimoBundle\Entity\Organizations;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\CoreBundle\Form\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\CallbackTransformer;

class OrganizationsAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $em =$this->getConfigurationPool()->getContainer()->get('doctrine.orm.entity_manager');
        $listmache = $em->getRepository('HandissimoBundle:StructuresTypes')->getClassName();
        $formMapper
            ->tab('Identité')
                ->with('Information', array('class' => 'col-md-12', 'description' =>'Avant de remplir une fiche, merci de vérifier si la fiche n’existe pas déjà'))
                ->end()
                ->with('Identité', array('class' => 'col-md-6'))
                    ->add('name', TextType::class, array(
                        'label' => 'Nom de la structure',
                        'required' => true
                    ))
                    ->add('societies', EntityType::class, array(
                        'class' => 'HandissimoBundle:Society',
                        'choice_label' => 'society_name',
                        'label' => 'Nom de l\'organisme gestionnaire',
                        'required' => false,
                        'help' => 'Si différent du nom de la structure'
                    ))
                    ->add('address', TextType::class, array(
                        'label' => 'Adresse postale',
                        'required' => true
                    ))
                    ->add('addressComplement', TextType::class, array(
                        'label' => 'Complement d\'adresse',
                        'required' => false
                    ))
                    ->add('postal', TextType::class, array(
                        'label' => 'Code postal',
                        'required' => true,
                    ))
                    ->add('city', TextType::class, array(
                        'label' => 'Ville',
                        'required' => true
                    ))
                    ->add('phone_number', TextType::class, array(
                        'label' => 'Téléphone',
                        'required' => true
                    ))
                    ->add('mail', TextType::class, array(
                        'label' => 'E-mail de contact',
                        'required' => false
                    ))
                    ->add('director_name', TextType::class, array(
                        'label' => 'Nom du responsable',
                        'required' => false
                    ))
                    ->add('website', TextType::class, array(
                        'label' => 'Site internet',
                        'required' => false
                    ))
                    ->add('facebook', TextType::class, array(
                        'label' => 'Facebook',
                        'required' => false
                    ))
                    ->add('brochure', FileType::class, array(
                        'label' => 'Télécharger des documents',
                        'required' => false,
                        'data_class' => null
                    ))
                ->end()
                ->with('Choississez votre type de structure', array('class' => 'col-md-6'))
                    ->add('orgaStructure', EntityType::class, array(
                        'class' => 'HandissimoBundle:StructuresList',
                        'label' => 'Etablissements et services spécialisés sur orientation de la MDPH',
                        'query_builder' => function(EntityRepository $er) {
                            return $er->createQueryBuilder('sl')
                                ->orderBy('sl.name', 'ASC');
                        },
                        'expanded' => true
                    ))
                ->end()
            ->end()
            ->tab('Public ciblé')
                ->with('C\'est pour qui ?', array('class' => 'col-md-12'))
                    ->add('disabilitytypes', EntityType::class, array(
                        'class' => 'HandissimoBundle:DisabilityTypes',
                        'choice_label' => 'disabilityName',
                        'label' => 'Handicap des personnes accompagnées',
                        'multiple' => true,
                        'expanded' => true,
                        'query_builder' => function(EntityRepository $er) {
                            return $er->createQueryBuilder('dt')
                                ->orderBy('dt.disabilityName', 'ASC');
                        },
                    ))
                    ->add('agemini', IntegerType::class, array(
                        'label' => 'Âge minimum',
                        'required' => false
                    ))
                    ->add('agemaxi', IntegerType::class, array(
                        'label' => 'Âge maximum',
                        'required' => false
                    ))
                    ->add('freeplace', IntegerType::class, array(
                        'label' => 'Nombre de personnes accompagnées',
                        'required' => false
                    ))
                    ->add('organization_description', CKEditorType::class, array(
                            'label' => 'En utilisant des mots simples et des phrases courtes et en reprenant vos réponses précédentes, merci de décrire à qui s\'adresse la structure, combien de personnes sont accompagnées, quel est leur handicap, quel degré d\'autonomie est nécessaire pour être accompagné.',
                            'required' => false)
                    )
                    ->add('interventionZone', TextType::class, array(
                        'label' => "Quelle est votre zone d’intervention ? Quelles sont les conditions de résidence pour accéder à la structure ?",
                        'required' => false
                    ))
                ->end()
            ->end()
            ->tab('Les services proposés')
                ->with('Qu’est-ce qui est proposé ?')
                    ->add('needs', EntityType::class, array(
                        'class' => 'HandissimoBundle:Needs',
                        'choice_label' => 'needName',
                        'help' => 'Vous devez cocher 5 cases maximum',
                        'label' => 'Services/prestations principaux proposés par la structure',
                        'multiple' => true,
                        'expanded' => true,
                        'query_builder' => function(EntityRepository $er) {
                            return $er->createQueryBuilder('n')
                                ->orderBy('n.needName', 'ASC');
                        },
                    ))
                    ->add('secondneeds', EntityType::class, array(
                        'class' => 'HandissimoBundle:SecondaryNeeds',
                        'choice_label' => 'needName',
                        'help' => 'Vous devez cocher 5 cases maximum',
                        'label' => 'Services/prestations secondaires proposés par la structure',
                        'multiple' => true,
                        'expanded' => true,
                        'query_builder' => function(EntityRepository $er) {
                            return $er->createQueryBuilder('sn')
                                ->orderBy('sn.needName', 'ASC');
                        },
                    ))
                    ->add('working_description', CKEditorType::class, array(
                        'label' => 'En utilisant des mots simples et des phrases courtes et en reprenant vos réponses précédentes, merci de décrire ce que propose votre structure aux personnes accompagnées (en "hiérarchisant" le cœur de votre travail et les activités annexes)',
                        'required' => false,
                        'help' => 'Description limitée à 1000 caractères',
                        'config' => array(
                            'extraPlugins' => 'confighelper',
                            'placeholder' =>
                                'Exemple 1: Les résidents habitent à la MAS, c’est leur lieu de vie. L’équipe s’occupe des soins nécessaires, de l’aide à la vie quotidienne, propose des activités dans les locaux ou à l’extérieur. Les activités ont pour objectif de faire progresser les résidents dans leur capacité de communication, leur ouverture sur le monde, le développement de leurs compétences. <br /> <br /> 
                                 Exemple 2 : L’association Une souris verte a pour objectif de sensibiliser aux différences et d’inclure les jeunes enfants en situation de handicap dans la société. Pour cela, l’association développe 4 actions principales : <ul> <li> l’accueil des enfants en situation de handicap parmi les autres dans trois structures d’accueil. </li> <li> l’accompagnement des familles d’enfants en situation de handicap, grâce à des rencontres et des espaces d’informations documentation </li> <li> la formation des acteurs et professionnels de santé. </li> <li> la sensibilisation à la différence </li> </ul>
                                 Exemple 3 : L\'établissement comprend un internat et des lieux d’accueil de jour. L’établissement assure : l’hébergement, la scolarité et une formation, les soins, les apprentissages liés à l’autonomie dans la vie quotidienne, des activités et les transports associés. Les jeunes y passent la journée, pour certains ils restent dormir. Exceptionnellement les jeunes peuvent être accueillis aussi le week-end.'
                        ),
                    ))
                ->end()
                ->with('Proposez-vous de l\'accueil', array('class' => 'col-md-6'))
                    ->add('accomodation', ChoiceFieldMaskType::class, array(
                        'choices' => array(
                            'oui' => 'oui',
                            'non' => 'non'
                        ),
                        'map' => array(
                            'oui' => array('accomodation_description'),
                        ),
                        'label' => false,
                        'required' => false
                    ))
                    ->add('accomodation_description', CKEditorType::class, array(
                        'label' => false,
                        'required' => false,
                        'help' => 'Description limitée à 600 caractères',
                        'config' => array(
                            'extraPlugins' => 'confighelper',
                            'placeholder' =>
                                'Si oui : Quel type d’accueil ? Hébergement ? Accueil de jour ? ...'
                        )
                    ))
                ->end()
                ->with('Proposez-vous de la scolarisation ?', array('class' => 'col-md-6'))
                    ->add('school', ChoiceFieldMaskType::class, array(
                        'choices' => array(
                            'oui' => 'oui',
                            'non' => 'non'
                        ),
                        'map' => array(
                            'oui' => array('school_description'),
                        ),
                        'label' => false,
                        'required' => false
                    ))
                    ->add('school_description', CKEditorType::class, array(
                        'label' => false,
                        'required' => false,
                        'help' => 'Description limitée à 600 caractères',
                        'config' => array(
                            'extraPlugins' => 'confighelper',
                            'placeholder' =>
                                'Si oui, précisez : Nombre d’heure de « classe » ? Dans les murs ou à l’extérieur ? Combien de groupes/unités ? Combien de jeunes par groupe ? '
                        )
                    ))
                ->end()
                ->with('Description d’une journée type :')
                    ->add('dayDescription' , CKEditorType::class, array(
                        'label' => false,
                        'help' => 'Description limitée à 1000 caractères',
                        'required' => false
                    ))
                ->end()
                ->with('Qu\'est-il prévu pour les familles ?')
                    ->add('receptionDescription' , CKEditorType::class, array(
                        'label' => false,
                        'help' => 'Description limitée à 600 caractères',
                        'required' => false,
                        'config' => array(
                            'extraPlugins' => 'confighelper',
                            'placeholder' =>
                                'Avant d’arriver dans la structure et une fois au sein de la structure ? Est-il possible de visiter ? Y a-t-il des réunions d’information ? Des rencontres entre parents ? A quelle fréquence ?'
                        )
                    ))
                ->end()
            ->end()
            ->tab('L\'équipe')
                ->with(' ')
                    ->add('team_members_number', IntegerType::class, array(
                        'label' => 'Combien y a-t-il de personne dans l\'équipe ?',
                        'required' => false
                    ))
                    ->add('Stafforganizations', EntityType::class, array(
                        'class' => 'HandissimoBundle:Staff',
                        'choice_label' => 'jobs',
                        'label' => 'Personnel de soins',
                        'multiple' => true,
                        'expanded' => true,
                        'query_builder' => function(EntityRepository $er) {
                            return $er->createQueryBuilder('s')
                                ->orderBy('s.jobs', 'ASC');
                        },
                    ))
                    ->add('socialstaffs', EntityType::class, array(
                        'class' => 'HandissimoBundle:SocialStaff',
                        'choice_label' => 'socialJobs',
                        'label' => 'Personnel éducatif et social',
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
                        'label' => 'Autres métiers',
                        'multiple' => true,
                        'expanded' =>true,
                        'query_builder' => function(EntityRepository $er) {
                            return $er->createQueryBuilder('oj')
                                ->orderBy('oj.name', 'ASC');
                        },
                    ))
                    ->add('commentStaff', CKEditorType::class, array(
                        'label' => 'Commentaire éventuel sur l’équipe',
                        'help' => 'Description limitée à 400 caractères',
                        'required' => false
                    ))
                ->end()
            ->end()
            ->tab('Informations pratiques')
                ->with(' ')
                    ->add('openhours', TextType::class, array(
                        'label' => 'Heures d\'ouverture',
                        'required' => false
                    ))
                    ->add('opendays', ChoiceFieldMaskType::class, array(
                        'label' => 'Jours d\'ouverture',
                        'required' => false,
                        'choices' => array('Lundi' => 'Lundi', 'Mardi' => 'Mardi', 'Mercredi' => 'Mercredi', 'Jeudi' => 'Jeudi', 'Vendredi' => 'Vendredi', 'Samedi' => 'Samedi', 'Dimanche' => 'Dimanche'),
                        'multiple' => true,
                        'expanded' => true
                    ))
                    ->add('opendaysYear', ChoiceFieldMaskType::class, array(
                        'label' => 'Jours d\'ouverture par an',
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
                    ->add('update_datetime', DateTimeType::class, array(
                        'label' => false,
                        'pattern' => 'dd MMM y G',
                        'attr' => array('style' => 'display:none'),
                        'data' => new \DateTime(),
                    ))
                    ->add('inscription', CKEditorType::class, array(
                        'label' => 'Comment s’inscrire ?',
                        'help' => 'Description limitée à 400 caractères',
                        'required' => false
                    ))
                    ->add('cost' , CKEditorType::class, array(
                        'label' => 'Combien ça coûte ?',
                        'help' => 'Description limitée à 400 caractères',
                        'required' => false
                    ))
                    ->add('transport' , CKEditorType::class, array(
                        'label' => 'Comment accéder à la structure ? Les transports sont-ils organisés ? Financés ?',
                        'help' => 'Description limitée à 400 caractères',
                        'required' => false
                    ))
                ->end()
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('postal');
}

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier( 'name' , null, array ( 'label' => 'Nom de l\'organisation') )
            ->add( 'address' , null, array ( 'label' => 'Adresse') )
            ->add( 'postal' , null, array ( 'label' => 'Code postale') )
            ->add( 'city' , null, array ( 'label' => 'Ville') )
            ->add( 'phone_number' , null, array ( 'label' => 'Téléphone') )
            ->add( 'mail' , null, array ( 'label' => 'Adresse e-mail') )
            ->add('update_datetime', 'date', array('label' => 'date de modification'));
    }
}
