<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 30/04/17
 * Time: 15:32
 */

namespace HandissimoBundle\Form\Handler;


use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

class ContactHandler
{
    protected $form;
    protected $em;
    protected $request;
    protected $container;

    public function __construct(Form $form, Request $request, EntityManager $em, ContainerInterface $container)
    {
        $this->form = $form;
        $this->request = $request;
        $this->em = $em;
        $this->container = $container;
    }

    public function process()
    {
        $captchaverify = $this->container->get('handissimo.captchaverify');
        $this->form->handleRequest($this->request);
        if ($this->request->isMethod('post')) {
            if ($captchaverify->verify($this->request->get('g-recaptcha-response')) && $this->form->isValid()) {
                $this->onSuccess();
                return true;
            }
        }
        return false;
    }

    public function onSuccess()
    {
        $this->em->persist($this->form->getData());
        $this->em->flush();
    }
}