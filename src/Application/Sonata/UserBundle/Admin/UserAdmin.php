<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 09/02/17
 * Time: 10:40
 */

namespace Application\Sonata\UserBundle\Admin;

use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\UserBundle\Admin\Model\UserAdmin as BaseUserAdmin;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserAdmin extends BaseUserAdmin
{
    protected $datagridValues = array(
        '_page' => 1,
        '_sort_order' => 'DESC',
        '_sort_by' => 'lastLogin',
    );

    protected function configureFormFields(FormMapper $formMapper)
    {
        parent::configureFormFields($formMapper);
        $formMapper
            ->tab('User')
                ->with('Profile', array('class' => 'col-md-6'))->end()
                ->with('Status', array('class' => 'col-md-6'))->end()
                ->with('Groups', array('class' => 'col-md-6'))->end()
                ->with('General', array('class' => 'col-md-6'))->end()
                ->with('Social', array('class' => 'col-md-6'))->end()

            ->end()
            ->tab('Security')
                ->with('Keys', array('class' => 'col-md-4'))->end()
                ->with('Roles', array('class' => 'col-md-12'))->end()
            ->end()
        ;
        $formMapper
            ->tab('User')
            ->with('Profile')
                ->add('grade', ChoiceType::class, array(
                    'label' => "grade",
                    'choices' => array(
                        'Novice' => 'Novice(plus de 10 contributions)',
                        'Confirmé' => 'Confirmé(plus de 20 contribution)',
                        'Expert' => 'Expert(plus de 50 contributions)',
                    ),
                    'multiple' => false,
                    'required' => false,
            ))
                ->end()
                ->with('General')
                    ->add('userType', ChoiceType::class, array(
                        'label' => 'Type d\'utilisateur',
                        'choices' => array(
                            'Particulier' => "je suis un particulier",
                            'Professionnel(le)' => "Je suis un professionnel",
                            'Autre' => "Autre"
                        ),
                        'multiple' => false,
                        'expanded' => true
                    ))
                    ->add('organizationsUser', EntityType::class, array(
                            'class' => 'HandissimoBundle\Entity\Organizations',
                            'choice_label' => 'name',
                            'label' => 'Structures',
                            'required' => false,
                            'multiple' => true,
                            'placeholder' => 'choisissez la structure',
                    ))

                ->end()
                ->with('Status')
                    ->add('locked', null, array('required' => false))
                    ->add('expired', null, array('required' => false))
                    ->add('enabled', null, array('required' => false))
                    ->add('credentialsExpired', null, array('required' => false))
                    ->end()
                    ->with('Groups')
                    ->add('groups', 'sonata_type_model', array(
                        'choices_as_values' => true,
                        'required' => false,
                        'expanded' => true,
                        'multiple' => true,
                        'choices_as_values' => true
                    ))
                    ->end()
                ->remove('dateOfBirth')
                ->remove('firstname')
                ->remove('lastname')
                ->remove('website')
                ->remove('biography')
                ->remove('locale')
                ->remove('timezone')
                ->remove('phone')
                ->remove('facebookUid')
                ->remove('facebookName')
                ->remove('twitterUid')
                ->remove('twitterName')
                ->remove('gplusUid')
                ->remove('gplusName')
        ->end();
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('username', null, array('label' => 'Nom de l\'utilisateur'))
            ->add('lastLogin', null, array('label' => 'Dernière connexion'))
            ->add('createdAt', null, array('label' => 'Date de création du compte'))
            ->add('enabled', 'boolean', array('editable' => true, 'label' => 'Activé'))
            ->add('locked', 'boolean', array('editable' => true, 'label' => 'Vérouillé'))
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        parent::configureShowFields($showMapper);
        $showMapper
            ->with('General')
                ->add('userType')
            ->end();
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('');
    }



}