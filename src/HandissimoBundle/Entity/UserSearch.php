<?php

namespace HandissimoBundle\Entity;

/**
 * UserSearch
 */
class UserSearch
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $location;

    /**
     * @var int
     */
    private $age;

    /**
     * @var string
     */
    private $need;

    /**
     * @var string
     */
    private $disability;

    /**
     * @var string
     */
    private $structure;

    /**
     * @var int
     */
    private $numberResult;

    /**
     * @var int
     */
    private $countRepetition = 1;


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
     * Set location
     *
     * @param string $location
     *
     * @return UserSearch
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return UserSearch
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set need
     *
     * @param string $need
     *
     * @return UserSearch
     */
    public function setNeed($need)
    {
        $this->need = $need;

        return $this;
    }

    /**
     * Get need
     *
     * @return string
     */
    public function getNeed()
    {
        return $this->need;
    }

    /**
     * Set disability
     *
     * @param string $disability
     *
     * @return UserSearch
     */
    public function setDisability($disability)
    {
        $this->disability = $disability;

        return $this;
    }

    /**
     * Get disability
     *
     * @return string
     */
    public function getDisability()
    {
        return $this->disability;
    }

    /**
     * Set structure
     *
     * @param string $structure
     *
     * @return UserSearch
     */
    public function setStructure($structure)
    {
        $this->structure = $structure;

        return $this;
    }

    /**
     * Get structure
     *
     * @return string
     */
    public function getStructure()
    {
        return $this->structure;
    }

    /**
     * Set numberResult
     *
     * @param integer $numberResult
     *
     * @return UserSearch
     */
    public function setNumberResult($numberResult)
    {
        $this->numberResult = $numberResult;

        return $this;
    }

    /**
     * Get numberResult
     *
     * @return int
     */
    public function getNumberResult()
    {
        return $this->numberResult;
    }

    /**
     * Set countRepetition
     *
     * @param integer $countRepetition
     *
     * @return UserSearch
     */
    public function setCountRepetition($countRepetition)
    {
        $this->countRepetition = $countRepetition;

        return $this;
    }

    /**
     * Get countRepetition
     *
     * @return int
     */
    public function getCountRepetition()
    {
        return $this->countRepetition;
    }
}
