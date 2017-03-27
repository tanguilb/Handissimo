<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 27/03/17
 * Time: 09:41
 */

namespace HandissimoBundle\Form\Handler;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Form;

class OrganizationsHandler
{
    protected $form;
    protected $em;
    protected $request;

    public function __construct(Form $form, Request $request, EntityManager $em)
    {
        $this->form = $form;
        $this->request = $request;
        $this->em = $em;
    }

    public function process()
    {
        $this->form->HandleRequest($this->request);
        if($this->request->isMethod('post'))
        {
            if($this->form->isValid()){
                $this->onSuccess();
                return true;
            } else {
                return false;
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