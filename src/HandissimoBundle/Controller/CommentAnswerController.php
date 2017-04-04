<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 23/03/17
 * Time: 09:42
 */

namespace HandissimoBundle\Controller;


use HandissimoBundle\Entity\Comment;
use HandissimoBundle\Entity\CommentAnswer;
use HandissimoBundle\Entity\Organizations;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CommentAnswerController extends Controller
{
    public function newAction($comment_id, Comment $comment)
    {
        $commentanswers = $this->getCommentanswers($comment_id);

        $commentAnswer = new CommentAnswer();
        $commentAnswer->setCommentanswers($commentanswers);
        $form = $this->createForm('HandissimoBundle\Form\Type\CommentAnswerType', $commentAnswer);

        return $this->render(':front/comment:answer-form.html.twig', array(
            'form' => $form->createView(),
            'commentAnswer' => $commentAnswer,
            'comments' => $comment
        ));
    }

    public function createAction($comment_id, Organizations $organization, Comment $comment)
    {
        $commentanswers = $this->getCommentanswers($comment_id);

        $commentAnswer = new CommentAnswer();
        $commentAnswer->setCommentanswers($commentanswers);
        $form = $this->createForm('HandissimoBundle\Form\Type\CommentAnswerType', $commentAnswer);
        $form->handleRequest();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($commentAnswer);
            $em->flush();

            $this->redirectToRoute('comment_answer', array(
                'id' => $organization->getId(),
                'comment_id' => $commentAnswer->getCommentanswers()->getId() .
                '#commentAnswer-' . $commentAnswer->getId()

            ));
        }
        return $this->render(':front:organizationPage.html.twig', array(
            'organization' => $organization,
            'comment' => $comment,
            'commentAnswer' => $commentAnswer,
            'form' => $form->createView()
        ));
    }

    public function getCommentanswers($comment_id)
    {
        $em = $this->getDoctrine()->getManager();
        $em->getRepository('HandissimoBundle:Comment')->find($comment_id);
    }
}