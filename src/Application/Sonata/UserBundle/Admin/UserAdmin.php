<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 09/02/17
 * Time: 10:40
 */

namespace Application\Sonata\UserBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\UserBundle\Admin\Model\UserAdmin as BaseUserAdmin;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserAdmin extends BaseUserAdmin
{
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
                ->with('General')
                    ->add('userType', ChoiceType::class, array(
                        'choices' => array(
                            'Personne concerné par le handicap' => "je suis un particulier, concerné par le handicap",
                            'Professionnel(le)' => "Je suis un professionnel",
                            'Autre' => "Autre"
                        ),
                        'multiple' => false,
                        'choices_as_values' => true,
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