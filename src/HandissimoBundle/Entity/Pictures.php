<?php

namespace HandissimoBundle\Entity;

/**
 * Pictures
 */
class Pictures
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $pictureName;

    /**
     * @var \DateTime
     */
    private $update;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set pictureName
     *
     * @param string $pictureName
     *
     * @return Pictures
     */
    public function setPictureName($pictureName)
    {
        $this->pictureName = $pictureName;

        return $this;
    }

    /**
     * Get pictureName
     *
     * @return string
     */
    public function getPictureName()
    {
        return $this->pictureName;
    }

    /**
     * Set update
     *
     * @param \DateTime $update
     *
     * @return Pictures
     */
    public function setUpdate($update)
    {
        $this->update = $update;

        return $this;
    }

    /**
     * Get update
     *
     * @return \DateTime
     */
    public function getUpdate()
    {
        return $this->update;
    }
}

