<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 08/03/17
 * Time: 15:47
 */

namespace HandissimoBundle\Form\Handler;


use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

class SolutionHandler
{
    protected $form;
    protected $em;
    protected $request;

    public function __construct(Form $form, Request $request, EntityManager $em)
    {
        $this->form     = $form;
        $this->request  =$request;
        $this->em       = $em;
    }

    public function process()
    {
        $this->form->handleRequest($this->request);
        if ($this->form->isValid() && $this->request->isMethod('post')) {
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