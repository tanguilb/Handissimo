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
     * @var bool
     */
    private $likeAnswer;

    /**
     * @var bool
     */
    private $dislikeAnswer;


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
     * Set likeAnswer
     *
     * @param boolean $likeAnswer
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
     * @return bool
     */
    public function getLikeAnswer()
    {
        return $this->likeAnswer;
    }

    /**
     * Set dislikeAnswer
     *
     * @param boolean $dislikeAnswer
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
     * @return bool
     */
    public function getDislikeAnswer()
    {
        return $this->dislikeAnswer;
    }
}
