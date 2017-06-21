<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 21/06/17
 * Time: 10:45
 */

namespace HandissimoBundle\Services\Revisions;


use Doctrine\ORM\EntityManager;
use Swift_Mailer;
use Symfony\Component\DependencyInjection\ContainerInterface;

class MailerParticipation
{
    protected $em;
    protected $mailer;
    protected $container;
    protected $message;

    public function __construct(EntityManager $em, Swift_Mailer $mailer, ContainerInterface $container, \Swift_Message $message)
    {
        $this->em        = $em;
        $this->mailer    = $mailer;
        $this->container = $container;
        $this->message   = $message;
    }

    public function sendEmailParticipation($organizationName)
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $participation = $user->getParticipation();
        $message = \Swift_Message::newInstance();
        if ($participation == 1)
        {

            $message
                ->setFrom('handissimo@gmail.com')
                ->setTo('handissimo@gmail.com')
                ->setBody(
                    $this->renderView(
                        'Emails/newParticipation.html.twig',
                        array(
                            'user' => $user,
                            'organizationName' => $organizationName,
                            )
                    ),
                    'text/html'
                );
        }
        $this->mailer->send($message);

    }
}