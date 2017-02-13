<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 09/02/17
 * Time: 10:40
 */

namespace Application\Sonata\UserBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;
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
                ->with('General', array('class' => 'col-md-6'))->end()
                ->with('Social', array('class' => 'col-md-6'))->end()
            ->end()
            ->tab('Security')
                ->with('Status', array('class' => 'col-md-4'))->end()
                ->with('Groups', array('class' => 'col-md-4'))->end()
                ->with('Keys', array('class' => 'col-md-4'))->end()
                ->with('Roles', array('class' => 'col-md-12'))->end()
            ->end()
        ;
        $formMapper
            ->tab('User')
                ->with('General')
                    ->add('userType', ChoiceType::class, array(
                        'choices' => array(
                            'utilisateur' => "Je suis une personne handicapée ou sa famille",
                            'professionnel' => "Je suis un professionnel (médecin, assistante sociale...)",
                            'gestionnaire' => "Je suis un gestionnaire (association, fondation, autre)",
                            'structure' => "Je suis un administrateur de structure"
                        ),
                        'multiple' => false,
                        'expanded' => true
                    ))
                    ->add('organizationsuser', EntityType::class, array(
                            'class' => 'HandissimoBundle\Entity\Organizations',
                            'label' => 'Structures',
                            'required' => false
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
                ->remove('realRoles')
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