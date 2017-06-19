<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 19/06/17
 * Time: 11:01
 */

namespace HandissimoBundle\Form\Handler;


use Doctrine\ORM\EntityManager;
use HandissimoBundle\Entity\AlertContent;
use HandissimoBundle\Entity\Organizations;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

class AlertContentHandler
{
    protected $form;
    protected $request;
    protected $em;
    protected $container;
    protected $alertContent;
    protected $organizations;

    public function __construct(Form $form, Request $request, EntityManager $em, ContainerInterface $container, AlertContent $alertContent, Organizations $organizations)
    {
        $this->form             = $form;
        $this->request          = $request;
        $this->em               = $em;
        $this->container        = $container;
        $this->alertContent     = $alertContent;
        $this->organizations    = $organizations;
    }

    public function process()
    {
        $this->form->handleRequest($this->request);


        if ($this->request->isMethod('post')) {
            if ($this->form->isValid()){
                $this->onSuccess();
                return true;
            }
            return false;
        }
        return false;
    }

    public function onSuccess()
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUsername();
        if ($user != null) {
            $this->alertContent->setUser($user);
        } else {
            $this->alertContent->setUser("Anonyme");
        }
        $this->alertContent->setOrganization($this->organizations->getName());
        $this->em->persist($this->form->getData());
        $this->em->flush();
    }
}