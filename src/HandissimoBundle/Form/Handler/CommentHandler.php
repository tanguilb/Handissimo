<?php

/**
 * Created by PhpStorm.
 * User: david
 * Date: 08/03/17
 * Time: 14:28
 */
namespace HandissimoBundle\Form\Handler;

use Doctrine\ORM\EntityManager;
use HandissimoBundle\Entity\Comment;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

class CommentHandler
{
    protected $form;
    protected $request;
    protected $em;

    public function __construct(Form $form, Request $request, EntityManager $em)
    {
        $this->form     = $form;
        $this->request  = $request;
        $this->em       = $em;
    }

    public function process()
    {
        if ( $this->request->getMethod() == 'POST' ) {
            $this->form->submit($this->request);
            if ( $this->form->isValid() ) {
                $this->onSuccess($this->form->getData());

                return true;
            }
        }
        return false;
    }

    public function onSuccess(Comment $comment)
    {
        $this->em->persist($comment);
        $this->em->flush();
    }
}