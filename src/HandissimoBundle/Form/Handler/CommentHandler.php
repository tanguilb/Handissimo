<?php

/**
 * Created by PhpStorm.
 * User: david
 * Date: 08/03/17
 * Time: 14:28
 */
namespace HandissimoBundle\Form\Handler;

use Doctrine\ORM\EntityManager;
use ReCaptcha\ReCaptcha;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

class CommentHandler
{
    protected $form;
    protected $request;
    protected $em;
    protected $container;

    public function __construct(Form $form, Request $request, EntityManager $em)
    {
        $this->form             = $form;
        $this->request          = $request;
        $this->em               = $em;
    }

    public function process()
    {
        $recaptcha = new ReCaptcha('6Lc8vBYUAAAAAI-Rfhi1KUJUS0XIUN6kp4lEb-o5');
        $resp = $recaptcha->verify($this->request->get('g-recaptcha-response'), $this->request->getClientIp());
        $this->form->handleRequest($this->request);
        if ($this->request->isMethod('post')) {
            if (!$resp->isSuccess() && $this->form->isValid()) {
                return false;
            }else {
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