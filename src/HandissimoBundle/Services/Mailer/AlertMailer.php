<?php

namespace HandissimoBundle\Services\Mailer;

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;

class AlertMailer
{
    protected $mailer;
    protected $templating;
    private $from = "handissimo@gmail.com";

    public function __construct(\Swift_Mailer $mailer, EngineInterface $templating)
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

    public function alertContactMessage()
    {
        $subject = "Un message vous a été envoyé";
        $template = "app/Ressources/views/email/alertContact.html.twig";
        $to = "david.ducruet74@gmail.com";
        $body = $this->templating->renderView('alertContact.html.twig');
        $this->sendMessage($to, $subject, $body);
    }
}