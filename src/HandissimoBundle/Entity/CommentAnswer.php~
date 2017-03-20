<?php

namespace HandissimoBundle\Entity;

/**
 * CommentAnswer
 */
class CommentAnswer
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $author;

    /**
     * @var \DateTime
     */
    private $parutionDate;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $title;

    /**
     * @var bool
     */
    private $statusComment;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set author
     *
     * @param string $author
     *
     * @return CommentAnswer
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set parutionDate
     *
     * @param \DateTime $parutionDate
     *
     * @return CommentAnswer
     */
    public function setParutionDate($parutionDate)
    {
        $this->parutionDate = $parutionDate;

        return $this;
    }

    /**
     * Get parutionDate
     *
     * @return \DateTime
     */
    public function getParutionDate()
    {
        return $this->parutionDate;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return CommentAnswer
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return CommentAnswer
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set statusComment
     *
     * @param boolean $statusComment
     *
     * @return CommentAnswer
     */
    public function setStatusComment($statusComment)
    {
        $this->statusComment = $statusComment;

        return $this;
    }

    /**
     * Get statusComment
     *
     * @return bool
     */
    public function getStatusComment()
    {
        return $this->statusComment;
    }
    /**
     * @var integer
     */
    private $likeAnswer;

    /**
     * @var integer
     */
    private $dislikeAnswer;


    /**
     * Set likeAnswer
     *
     * @param integer $likeAnswer
     *
     * @return CommentAnswer
     */
    public function setLikeAnswer($likeAnswer)
    {
        $this->likeAnswer = $likeAnswer;

        return $this;
    }

    /**
     * Get likeAnswer
     *
     * @return integer
     */
    public function getLikeAnswer()
    {
        return $this->likeAnswer;
    }

    /**
     * Set dislikeAnswer
     *
     * @param integer $dislikeAnswer
     *
     * @return CommentAnswer
     */
    public function setDislikeAnswer($dislikeAnswer)
    {
        $this->dislikeAnswer = $dislikeAnswer;

        return $this;
    }

    /**
     * Get dislikeAnswer
     *
     * @return integer
     */
    public function getDislikeAnswer()
    {
        return $this->dislikeAnswer;
    }
    /**
     * @var \HandissimoBundle\Entity\Comment
     */
    private $commentanswers;


    /**
     * Set commentanswers
     *
     * @param \HandissimoBundle\Entity\Comment $commentanswers
     *
     * @return CommentAnswer
     */
    public function setCommentanswers(\HandissimoBundle\Entity\Comment $commentanswers = null)
    {
        $this->commentanswers = $commentanswers;

        return $this;
    }

    /**
     * Get commentanswers
     *
     * @return \HandissimoBundle\Entity\Comment
     */
    public function getCommentanswers()
    {
        return $this->commentanswers;
    }

    public function __construct()
    {
        $this->parutionDate = new \DateTime();
    }
    /**
     * @var boolean
     */
    private $activate;


    /**
     * Set activate
     *
     * @param boolean $activate
     *
     * @return CommentAnswer
     */
    public function setActivate($activate)
    {
        $this->activate = $activate;

        return $this;
    }

    /**
     * Get activate
     *
     * @return boolean
     */
    public function getActivate()
    {
        return $this->activate;
    }
}
