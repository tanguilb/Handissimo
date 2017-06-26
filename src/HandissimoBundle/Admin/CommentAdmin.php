<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 27/02/17
 * Time: 14:39
 */

namespace HandissimoBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Sonata\AdminBundle\Show\ShowMapper;

class CommentAdmin extends AbstractAdmin
{
    protected $datagridValues = array(
        '_page' => 1,
        '_sort_order' => 'DESC',
        '_sort_by' => 'parutionDate',
    );

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('author', null, array(
                'label' => 'Auteur'
            ))
            ->add('organizationsComment', EntityType::class, array(
                'class' => 'HandissimoBundle:Organizations',
                'choice_label' => 'name',
                'label' => 'Nom de l\'organisation',
            ))
            ->add('parutionDate', null, array(
                'label' => 'Date de publication'
            ))
            ->add('content', null, array(
                'label' => 'Message'
            ))
            ->add('status_comment', 'boolean', array(
                'editable' => true,
                'label' => 'valider/cacher'
            ))
            ->add('rereading', 'boolean', array('editable' => true, 'label' => 'Relu/non relu'))
            ->add('_action', null, array('actions' => array('show' => array())));

    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('author', null, array('label' => 'Auteur'))
            ->add('organizationsComment', null, array('label' => 'Nom de l\'organisation'))
            ->add('parutionDate', null, array('label' => 'Date de publication'))
            ->add('title', null, array('label' => 'Titre du message'))
            ->add('content', null, array('label' => 'Message'))
            ->add('status_comment', 'boolean', array('label' => 'valider/cacher'))
            ->add('rereading', 'boolean', array('label' => 'Relu/non relu'));
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
    }
}