<?php

namespace HandissimoBundle\Admin;

use Doctrine\ORM\EntityRepository;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class OrganizationsAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
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
                        'label' => 'Nom de l\'organisme gestionnaire'
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
                    ->add('website', TextType::class, array(
                        'label' => 'Site internet',
                        'required' => false
                    ))
                    ->add('director_name', TextType::class, array(
                        'label' => 'Nom du responsable',
                        'required' => false
                    ))
                ->end()
                ->with('Choississez votre type de structure', array('class' => 'col-md-6'))
                    ->add('structuretype', EntityType::class, array(
                        'class' => 'HandissimoBundle:StructuresTypes',
                        'choice_label' => 'structurestype',
                        'label' => 'Un seul choix possible',
                        'multiple' => false,
                        'required' => false,
                        'expanded' => true,
                        'query_builder' => function(EntityRepository $er) {
                            return $er->createQueryBuilder('st')
                                ->orderBy('st.structurestype', 'ASC');
                        },
                    ))
                ->end()
            ->end()
            ->tab('test')
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
                ->add('update_datetime', DateTimeType::class, array(
                    'label' => false,
                    'pattern' => 'dd MMM y G',
                    'attr' => array('style' => 'display:none'),
                    'data' => new \DateTime(),
                ))
            ->end()
            ->with('Handicap des personnes accompagnées', array('class' => 'col-md-6'))
                ->add('disabilitytypes', EntityType::class, array(
                    'class' => 'HandissimoBundle:DisabilityTypes',
                    'choice_label' => 'disabilityName',
                    'label' => false,
                    'multiple' => true,
                    'expanded' => true,
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('dt')
                            ->orderBy('dt.disabilityName', 'ASC');
                    },
                ))
            //->end()

                ->add('agemini', IntegerType::class, array(
                    'label' => 'Âge minimum',
                    'required' => false
                ))
                ->add('agemaxi', IntegerType::class, array(
                    'label' => 'Âge maximum',
                    'required' => false
                ))
                ->add('freeplace', TextType::class, array(
                    'label' => 'Nombre de personnes accompagnées',
                    'required' => false
                ))
            ->end()
            ->with(" ", array('class' => 'col-md-12'))
                ->add('organization_description', CKEditorType::class, array(
                    'label' => 'En utilisant des mots simples et des phrases courtes et en reprenant vos réponses précédentes, merci de décrire à qui s\'adresse la structure, combien de personnes sont accompagnées, quel est leur handicap, quel degré d\'autonomie est nécessaire pour être accompagné.',
                    'required' => false)
                )
            ->end()
            ->with('Services/prestations primaires proposés par la structure', array('class' => 'col-md-6'))
                ->add('needs', EntityType::class, array(
                    'class' => 'HandissimoBundle:Needs',
                    'choice_label' => 'needName',
                    'label' => false,
                    'multiple' => true,
                    'expanded' => true,
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('n')
                            ->orderBy('n.needName', 'ASC');
                    },
                ))
            ->end()
            ->with('Services/prestations secondaires proposés par la structure', array('class' => 'col-md-6'))
                ->add('secondneeds', EntityType::class, array(
                    'class' => 'HandissimoBundle:SecondaryNeeds',
                    'choice_label' => 'needName',
                    'label' => false,
                    'multiple' => true,
                    'expanded' => true,
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('sn')
                            ->orderBy('sn.needName', 'ASC');
                    },
                ))
            ->end()
                ->add('working_description', CKEditorType::class, array(
                    'label' => 'En utilisant des mots simples et des phrases courtes et en reprenant vos réponses précédentes, merci de décrire ce que propose votre structure aux personnes accompagnées (en "hiérarchisant" le cœur de votre travail et les activités annexes)',
                    'required' => false
                ))
                ->add('team_members_number', TextType::class, array(
                    'label' => 'Combien y a-t-il de personne dans l\'équipe ?',
                    'required' => false
                ))
            ->end()
            ->with('Personnel de soins', array('class' => 'col-md-6'))
                ->add('Stafforganizations', EntityType::class, array(
                    'class' => 'HandissimoBundle:Staff',
                    'choice_label' => 'jobs',
                    'label' => false,
                    'multiple' => true,
                    'expanded' => true,
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('s')
                            ->orderBy('s.jobs', 'ASC');
                    },
                ))
            ->end()
            ->with('Personnel éducatif et social', array('class' => 'col-md-6'))
                ->add('socialstaffs', EntityType::class, array(
                    'class' => 'HandissimoBundle:SocialStaff',
                    'choice_label' => 'socialJobs',
                    'label' => false,
                    'multiple' => true,
                    'expanded' =>true,
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('ss')
                            ->orderBy('ss.socialJobs', 'ASC');
                    },
                ))
            ->end()
            ->with("Quelle est votre zone d’intervention ?", array('class' => 'col-md-12'))
                ->add('interventionZone', TextType::class, array(
                    'label' => false,
                    'required' => false
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
                    'label' => 'Si oui, précisez : Nombre d’heure de « classe » ? Dans les murs ou à l’extérieur ? Combien de groupes/unités ? Combien de jeunes par groupe ? ',
                    'required' => false,
                    'help' => 'Description limitée à 600 caractères',
                    'attr' => array('maxlength => 600')
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
                    'label' => 'Si oui : Quel type d’accueil ? Hébergement ? Accueil de jour ? ...',
                    'required' => false,
                    'help' => 'Description limitée à 600 caractères',
                    'attr' => array('maxlength => 600')
                ))
            ->end()
            ->with('Comment s’inscrire ?')
                ->add('inscription', CKEditorType::class, array(
                    'label' => false,
                    'help' => 'Description limitée à 400 caractères',
                    'required' => false,
                    'attr' => array('maxlength => 400')
                ))
            ->end()
            ->with('Combien ça coûte ?')
                ->add('cost' , CKEditorType::class, array(
                    'label' => false,
                    'help' => 'Description limitée à 400 caractères',
                    'required' => false,
                    'attr' => array('maxlength => 400')
                ))
            ->end()
            ->with('Qu\'est-il prévu pour les familles ?')
            ->add('receptionDescription' , CKEditorType::class, array(
                'label' => 'Avant d’arriver dans la structure et une fois au sein de la structure ? Est-il possible de visiter ? Y a-t-il des réunions d’information ? Des rencontres entre parents ? A quelle fréquence ?',
                'help' => 'Description limitée à 600 caractères',
                'required' => false,
                'attr' => array('maxlength => 600')
            ))
            ->end()
            ->with('Transports')
            ->add('transport' , CKEditorType::class, array(
                'label' => 'Comment accéder à la structure ? Les transports sont-ils organisés ? Financés ?',
                'help' => 'Description limitée à 400 caractères',
                'required' => false,
                'attr' => array('maxlength => 400')
            ))
            ->end()
            ->with('Description d’une journée type :')
            ->add('dayDescription' , CKEditorType::class, array(
                'label' => false,
                'help' => 'Description limitée à 1000 caractères',
                'required' => false,
                'attr' => array('maxlength => 1000')
            ))
            ->end()
            ->end()
;
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
