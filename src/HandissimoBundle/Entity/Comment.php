<?php

namespace HandissimoBundle\Entity;

/**
 * Comment
 */
class Comment
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
     * @return Comment
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
     * @return Comment
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
     * @return Comment
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
     * Set statusComment
     *
     * @param boolean $statusComment
     *
     * @return Comment
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
     * @var \HandissimoBundle\Entity\Organizations
     */
    private $organizationsComment;


    /**
     * Set organizationsComment
     *
     * @param \HandissimoBundle\Entity\Organizations $organizationsComment
     *
     * @return Comment
     */
    public function setOrganizationsComment(\HandissimoBundle\Entity\Organizations $organizationsComment = null)
    {
        $this->organizationsComment = $organizationsComment;

        return $this;
    }

    /**
     * Get organizationsComment
     *
     * @return \HandissimoBundle\Entity\Organizations
     */
    public function getOrganizationsComment()
    {
        return $this->organizationsComment;
    }

    public function __construct()
    {
        $this->parutionDate = new \DateTime();
        $this->statusComment = 1;
    }

    /**
     * @var string
     */
    private $title;

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Comment
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
     * @var integer
     */
    private $likeComment;

    /**
     * @var integer
     */
    private $dislikeComment;


    /**
     * Set likeComment
     *
     * @param integer $likeComment
     *
     * @return Comment
     */
    public function setLikeComment($likeComment)
    {
        $this->likeComment = $likeComment;

        return $this;
    }

    /**
     * Get likeComment
     *
     * @return integer
     */
    public function getLikeComment()
    {
        return $this->likeComment;
    }

    /**
     * Set dislikeComment
     *
     * @param integer $dislikeComment
     *
     * @return Comment
     */
    public function setDislikeComment($dislikeComment)
    {
        $this->dislikeComment = $dislikeComment;

        return $this;
    }

    /**
     * Get dislikeComment
     *
     * @return integer
     */
    public function getDislikeComment()
    {
        return $this->dislikeComment;
    }

    /**
     * @var boolean
     */
    private $rereading;


    /**
     * Set rereading
     *
     * @param boolean $rereading
     *
     * @return Comment
     */
    public function setRereading($rereading)
    {
        $this->rereading = $rereading;

        return $this;
    }

    /**
     * Get rereading
     *
     * @return boolean
     */
    public function getRereading()
    {
        return $this->rereading;
    }

}
