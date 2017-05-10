<?php

namespace HandissimoBundle\Services\Mailer;

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Application\Sonata\UserBundle\Entity\User;

class AlertMailer
{
    protected $mailer;
    protected $templating;
    private $from = "handissimo@gmail.com";

    public function __construct($mailer, EngineInterface $templating)
    {
        $this->mailer = $mailer;
        $templating->templating = $templating;
    }

    protected function sendMessage($to, $subject, $body)
    {
       $mail = \Swift_Message::newInstance();
       $mail
           ->setFrom($this->from)
           ->setTo($to)
           ->setSubject($subject)
           ->setBody($body)
           ->setContentType('text/html');

       $this->mailer->send($mail);
    }

    public function alertContactMessage(User $user)
    {
        $subject = "Un message vous a été envoyé";
        $template = "app/Ressources/views/email/alertContact.html.twig";
        $to = "david.ducruet74@gmail.com";
        $body = $this->templating->render($template, array('user' => $user));
        $this->sendMessage($to, $subject, $body);
    }
}