<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 23/02/17
 * Time: 11:19
 */

namespace HandissimoBundle\Admin;



use Sonata\AdminBundle\Form\FormMapper;
use Sonata\CoreBundle\Form\Type\BooleanType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class SolutionAdmin extends AbstractAdmin
{

    protected function configureFormFields(FormMapper $formMapper)
    {
       $formMapper
           ->add('honor', BooleanType::class);
    }
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('lastname')
            ->add('firstname')
            ->add('mail')
            ->add('status')
            ->add('solutionName')
            ->add('societyName');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('lastname')
            ->add('firstname')
            ->add('solutionName');
    }
}