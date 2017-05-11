<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 30/04/17
 * Time: 14:51
 */

namespace HandissimoBundle\Controller;

use Application\Sonata\UserBundle\Entity\User;
use HandissimoBundle\Entity\Opinion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends Controller
{
    public function newContactAction(Request $request)
    {
        $opinion = new Opinion();
        $form = $this->createForm('HandissimoBundle\Form\Type\OpinionType', $opinion);
        $formHandler = new \HandissimoBundle\Form\Handler\ContactHandler($form, $request, $this->get('doctrine.orm.default_entity_manager'), $this->get('service_container'));

        if($formHandler->process()) {
            $this->addFlash('notice', 'Votre message a bien été envoyé');
            $mail = \Swift_Message::newInstance();
            $mail
                ->setFrom('handissimo@gmail.com')
                ->setTo('handissimo@gmail.com')
                ->setSubject('Un message vous a été envoyé')
                ->setBody(
                    $this->renderView('email/alertContact.html.twig')
                )
                ->setContentType('text/html');

            $this->get('mailer')->send($mail);
            return $this->redirectToRoute('handissimo_contact');
        }
        return $this->render('front/contact.html.twig',
            array(
                'opinion' => $opinion,
                'form' => $form->createView()
            )
        );
    }
}