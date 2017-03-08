<?php

/**
 * Created by PhpStorm.
 * User: david
 * Date: 08/03/17
 * Time: 14:28
 */
namespace HandissimoBundle\Form\Handler;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

class CommentHandler
{
    protected $form;
    protected $request;
    protected $em;
    protected $container;

    public function __construct(Form $form, Request $request, EntityManager $em, Container $container)
    {
        $this->form             = $form;
        $this->request          = $request;
        $this->em               = $em;
        $this->container        = $container;
    }

    public function process()
    {
        $captchaverify = $this->container->get('handissimo.captchaverify');
        $this->form->handleRequest($this->request);
        if ($this->form->isValid() && $this->request->isMethod('post') && $captchaverify->verify($request->get('g-recaptcha-response'))) {
            $this->onSuccess();
            return true;
        }
        return false;
    }

    public function onSuccess()
    {
        $this->em->persist($this->form->getData());
        $this->em->flush();
    }
}