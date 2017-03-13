<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 13/03/17
 * Time: 09:41
 */

namespace HandissimoBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class SocialStaffAdmin extends AbstractAdmin
{
    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('socialJobs', 'text',
                array(
                    'label' => 'Métiers',
                    'required' => false
                ));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('socialJobs', null,
                array(
                    'label' => 'Métiers'
                ));
    }
}