<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 21/06/17
 * Time: 10:45
 */

namespace HandissimoBundle\Services\Revisions;


use Swift_Mailer;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Bundle\TwigBundle\TwigEngine;

class MailerParticipation
{
    protected $mailer;
    protected $container;
    protected $templating;

    public function __construct(Swift_Mailer $mailer, ContainerInterface $container, TwigEngine $templating)
    {
        $this->mailer     = $mailer;
        $this->container  = $container;
        $this->templating = $templating;
    }

    public function sendEmailParticipation()
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $contributions = $user->getContribution();
        $participation = 0;
        foreach($contributions as $organizationName => $contribution)
        {
            $participation += $contribution;
        }
        $template ="";

        if ($participation == 1)
        {
            $template = 'email/newParticipation.html.twig';
        } elseif($participation == 10 or $participation == 20 or $participation == 50)
        {
            $template = 'email/graduateParticipation.html.twig';
        }
        if($participation == 1 or $participation == 10 or $participation == 20 or $participation == 50)
        {
        $message = \Swift_Message::newInstance();
        $message
            ->setFrom('handissimo@gmail.com')
            ->setTo('handissimo@gmail.com')
            ->setBody(
                $this->templating->render(
                    $template,
                    array(
                        'user' => $user,
                        'participation' => $participation,
                        'contributions' => $contributions,
                    )
                ),
                'text/html'
            );

            return $this->mailer->send($message);
        } else {
            return null;
        }


    }
}