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
    }
    /**
     * @var string
     */
    private $title;

    /**
     * @var boolean
     */
    private $like;

    /**
     * @var boolean
     */
    private $dislike;


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
     * Set like
     *
     * @param boolean $like
     *
     * @return Comment
     */
    public function setLike($like)
    {
        $this->like = $like;

        return $this;
    }

    /**
     * Get like
     *
     * @return boolean
     */
    public function getLike()
    {
        return $this->like;
    }

    /**
     * Set dislike
     *
     * @param boolean $dislike
     *
     * @return Comment
     */
    public function setDislike($dislike)
    {
        $this->dislike = $dislike;

        return $this;
    }

    /**
     * Get dislike
     *
     * @return boolean
     */
    public function getDislike()
    {
        return $this->dislike;
    }
}
