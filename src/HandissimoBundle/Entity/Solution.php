<?php

namespace HandissimoBundle\Entity;

/**
 * Solution
 */
class Solution
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $mail;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $solutionName;

    /**
     * @var string
     */
    private $societyName;

    /**
     * @var bool
     */
    private $honor;


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
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Solution
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Solution
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Solution
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Solution
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set solutionName
     *
     * @param string $solutionName
     *
     * @return Solution
     */
    public function setSolutionName($solutionName)
    {
        $this->solutionName = $solutionName;

        return $this;
    }

    /**
     * Get solutionName
     *
     * @return string
     */
    public function getSolutionName()
    {
        return $this->solutionName;
    }

    /**
     * Set societyName
     *
     * @param string $societyName
     *
     * @return Solution
     */
    public function setSocietyName($societyName)
    {
        $this->societyName = $societyName;

        return $this;
    }

    /**
     * Get societyName
     *
     * @return string
     */
    public function getSocietyName()
    {
        return $this->societyName;
    }

    /**
     * Set honor
     *
     * @param boolean $honor
     *
     * @return Solution
     */
    public function setHonor($honor)
    {
        $this->honor = $honor;

        return $this;
    }

    /**
     * Get honor
     *
     * @return bool
     */
    public function getHonor()
    {
        return $this->honor;
    }
}
