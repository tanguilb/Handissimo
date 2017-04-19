<?php

namespace HandissimoBundle\Entity;

/**
 * City
 */
class City
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $department;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var string
     */
    private $majName;

    /**
     * @var string
     */
    private $simpleName;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $postal;

    /**
     * @var float
     */
    private $longitude;

    /**
     * @var float
     */
    private $latitude;


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
     * Set department
     *
     * @param integer $department
     *
     * @return City
     */
    public function setDepartment($department)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department
     *
     * @return int
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return City
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set majName
     *
     * @param string $majName
     *
     * @return City
     */
    public function setMajName($majName)
    {
        $this->majName = $majName;

        return $this;
    }

    /**
     * Get majName
     *
     * @return string
     */
    public function getMajName()
    {
        return $this->majName;
    }

    /**
     * Set simpleName
     *
     * @param string $simpleName
     *
     * @return City
     */
    public function setSimpleName($simpleName)
    {
        $this->simpleName = $simpleName;

        return $this;
    }

    /**
     * Get simpleName
     *
     * @return string
     */
    public function getSimpleName()
    {
        return $this->simpleName;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return City
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set postal
     *
     * @param integer $postal
     *
     * @return City
     */
    public function setPostal($postal)
    {
        $this->postal = $postal;

        return $this;
    }

    /**
     * Get postal
     *
     * @return int
     */
    public function getPostal()
    {
        return $this->postal;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     *
     * @return City
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     *
     * @return City
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }
}
