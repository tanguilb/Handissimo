<?php

namespace HandissimoBundle\Entity;

use Symfony\Component\HttpFoundation\File\File;

/**
 * Brochures
 */
class Brochures
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $brochureName;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var int
     */
    private $brochureSize;

    /**
     * @var File
     */
    private $brochureFile;

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
     * Set brochureName
     *
     * @param string $brochureName
     *
     * @return Brochures
     */
    public function setBrochureName($brochureName)
    {
        $this->brochureName = $brochureName;

        return $this;
    }

    /**
     * Get brochureName
     *
     * @return string
     */
    public function getBrochureName()
    {
        return $this->brochureName;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Brochures
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set brochureSize
     *
     * @param integer $brochureSize
     *
     * @return Brochures
     */
    public function setBrochureSize($brochureSize)
    {
        $this->brochureSize = $brochureSize;

        return $this;
    }

    /**
     * Get brochureSize
     *
     * @return int
     */
    public function getBrochureSize()
    {
        return $this->brochureSize;
    }

    public function setBrochureFile(File $brochureFile = null)
    {
        $this->brochureFile = $brochureFile;
        return $this;
    }
}
