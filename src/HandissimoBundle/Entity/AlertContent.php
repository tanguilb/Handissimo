<?php

namespace HandissimoBundle\Entity;

/**
 * AlertContent
 */
class AlertContent
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var array
     */
    private $choice;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $user;

    /**
     * @var \DateTime
     */
    private $sendingDate;


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
     * Set choice
     *
     * @param array $choice
     *
     * @return AlertContent
     */
    public function setChoice($choice)
    {
        $this->choice = $choice;

        return $this;
    }

    /**
     * Get choice
     *
     * @return array
     */
    public function getChoice()
    {
        return $this->choice;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return AlertContent
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set user
     *
     * @param string $user
     *
     * @return AlertContent
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set sendingDate
     *
     * @param \DateTime $sendingDate
     *
     * @return AlertContent
     */
    public function setSendingDate($sendingDate)
    {
        $this->sendingDate = $sendingDate;

        return $this;
    }

    /**
     * Get sendingDate
     *
     * @return \DateTime
     */
    public function getSendingDate()
    {
        return $this->sendingDate;
    }
}
