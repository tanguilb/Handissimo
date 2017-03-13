<?php

namespace HandissimoBundle\Admin;

use Doctrine\ORM\EntityRepository;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class OrganizationsAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Information', array('class' => 'col-md-12', 'description' =>'Avant de remplir une fiche, merci de vérifier si la fiche n’existe pas déjà'))
            ->end()
            ->with('Identité', array('class' => 'col-md-6'))
                ->add('name', 'text', array(
                    'label' => 'Nom de la structure',
                    'required' => true
                ))
                ->add('societies', EntityType::class, array(
                    'class' => 'HandissimoBundle:Society',
                    'choice_label' => 'society_name',
                    'label' => 'Non de l\'organisme gestionnaire'
                ))
                ->add('structuretype', EntityType::class, array(
                    'class' => 'HandissimoBundle:StructuresTypes',
                    'choice_label' => 'structurestype',
                    'label' => 'Type de structure',
                    'multiple' => false,
                    'by_reference' => true,
                    'placeholder' => 'Choississez votre type de structure',
                    'expanded' => false,
                    'empty_data' => null,
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('st')
                            ->orderBy('st.structurestype', 'ASC');
                    },
                ))
                ->add('address', 'text', array(
                    'label' => 'Adresse postale',
                    'required' => true
                ))
                ->add('postal', 'text', array(
                    'label' => 'Code postal',
                    'required' => true,
                ))
                ->add('city', 'text', array(
                    'label' => 'Ville',
                    'required' => true
                ))
                ->add('phone_number', 'text', array(
                    'label' => 'Téléphone',
                    'required' => true
                ))
                ->add('mail', 'text', array(
                    'label' => 'E-mail de contact',
                    'required' => false
                ))
                ->add('website', 'text', array(
                    'label' => 'Site internet',
                    'required' => false
                ))
                ->add('director_name', 'text', array(
                    'label' => 'Nom du directeur',
                    'required' => 'false'
                ))
                ->add('openhours', 'text', array(
                    'label' => 'Heures d\'ouverture',
                    'required' => false
                ))
                ->add('opendays', 'sonata_type_choice_field_mask', array(
                    'label' => 'Jours d\'ouverture',
                    'required' => false,
                    'choices' => array('Lundi' => 'Lundi', 'Mardi' => 'Mardi', 'Mercredi' => 'Mercredi', 'Jeudi' => 'Jeudi', 'Vendredi' => 'Vendredi', 'Samedi' => 'Samedi', 'Dimanche' => 'Dimanche'),
                    'multiple' => true,
                    'expanded' => true
                ))
                ->add('update_datetime', 'datetime', array(
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

                ->add('agemini', 'integer', array(
                    'label' => 'Âge minimum',
                    'required' => false
                ))
                ->add('agemaxi', 'integer', array(
                    'label' => 'Âge maximum',
                    'required' => false
                ))
                ->add('freeplace', 'text', array(
                    'label' => 'Nombre de personnes accompagnées',
                    'required' => false
                ))
            ->end()
            ->with(" ", array('class' => 'col-md-12'))
                ->add('organization_description', 'ckeditor', array(
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
                ->add('working_description', 'ckeditor', array(
                    'label' => 'En utilisant des mots simples et des phrases courtes et en reprenant vos réponses précédentes, merci de décrire ce que propose votre structure aux personnes accompagnées (en "hiérarchisant" le cœur de votre travail et les activités annexes)',
                    'required' => false
                ))
                ->add('team_members_number', 'text', array(
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
                ->add('school', 'sonata_type_choice_field_mask', array(
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
                ->add('school_description', 'ckeditor', array(
                    'label' => 'Si oui, précisez : Nombre d’heure de « classe » ? Dans les murs ou à l’extérieur ? Combien de groupes/unités ? Combien de jeunes par groupe ? ',
                    'required' => false,
                    'help' => 'Description limitée à 600 caractères',
                    'attr' => array('maxlength => 600')
                ))
            ->end()
            ->with('Proposez-vous de l\'accueil', array('class' => 'col-md-6'))
                ->add('accomodation', 'sonata_type_choice_field_mask', array(
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
                ->add('accomodation_description', 'ckeditor', array(
                    'label' => 'Si oui : Quel type d’accueil ? Hébergement ? Accueil de jour ? ...',
                    'required' => false,
                    'help' => 'Description limitée à 600 caractères',
                    'attr' => array('maxlength => 600')
                ))
            ->end()
            ->with('Comment s’inscrire ?')
                ->add('inscription', 'ckeditor', array(
                    'label' => false,
                    'help' => 'Description limitée à 400 caractères',
                    'required' => false,
                    'attr' => array('maxlength => 400')
                ))
            ->end()
            ->with('Combien ça coûte ?')
                ->add('cost' , 'ckeditor', array(
                    'label' => false,
                    'help' => 'Description limitée à 400 caractères',
                    'required' => false,
                    'attr' => array('maxlength => 400')
                ))
            ->end()
            ->with('Qu\'est-il prévu pour les familles ?')
            ->add('receptionDescription' , 'ckeditor', array(
                'label' => 'Avant d’arriver dans la structure et une fois au sein de la structure ? Est-il possible de visiter ? Y a-t-il des réunions d’information ? Des rencontres entre parents ? A quelle fréquence ?',
                'help' => 'Description limitée à 600 caractères',
                'required' => false,
                'attr' => array('maxlength => 600')
            ))
            ->end()
            ->with('Transports')
            ->add('transport' , 'ckeditor', array(
                'label' => 'Comment accéder à la structure ? Les transports sont-ils organisés ? Financés ?',
                'help' => 'Description limitée à 400 caractères',
                'required' => false,
                'attr' => array('maxlength => 400')
            ))
            ->end()
            ->with('Description d’une journée type :')
            ->add('dayDescription' , 'ckeditor', array(
                'label' => false,
                'help' => 'Description limitée à 1000 caractères',
                'required' => false,
                'attr' => array('maxlength => 1000')
            ))
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
