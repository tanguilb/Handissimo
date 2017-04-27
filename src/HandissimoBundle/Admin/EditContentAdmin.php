<?php

namespace HandissimoBundle\Admin;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class EditContentAdmin extends AbstractAdmin
{
    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('howToUse')
            ->add('whoAreWe')
            ->add('howToHelpUs')
            //->add('home')
            ->add('_action', null, array(
                'actions' => array(
                    'edit' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab('Comment ça marche')
                ->with('Comment ça marche')
                    ->add('howToUse', CKEditorType::class, array(
                        'label' => false,
                        'config_name' => 'admin_config'
                    ))
                ->end()
            ->end()
            ->tab('Qui sommes nous')
                ->with('Qui sommes nous')
                    ->add('whoAreWe', CKEditorType::class, array(
                        'label' => false,
                        'config_name' => 'admin_config'
                    ))
                ->end()
            ->end()
            ->tab('Comment nous aider')
                ->with('Comment nous aider')
                    ->add('howToHelpUs', CKEditorType::class, array(
                        'label' => false,
                        'config_name' => 'admin_config'
                    ))
                ->end()
            ->end()
            ->tab('page d\'accueil')
                ->with('page d\'accueil')
                    ->add('home')
                ->end()
            ->end()
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('howToUse')
            ->add('home')
        ;
    }
}
