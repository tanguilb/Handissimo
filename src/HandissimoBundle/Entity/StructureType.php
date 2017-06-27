<?php

namespace HandissimoBundle\Entity;

use Symfony\Component\HttpFoundation\File\File;

/**
 * StructureType
 */
class StructureType
{

    public function __toString()
    {
        return $this->name;
    }
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    private $picture;

    private $pictureFile;

    private $pictureUpdatedAt;


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
     * Set name
     *
     * @param string $name
     *
     * @return StructureType
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $structure;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->structure = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add structure
     *
     * @param \HandissimoBundle\Entity\StructuresList $structure
     *
     * @return StructureType
     */
    public function addStructure(\HandissimoBundle\Entity\StructuresList $structure)
    {
        $this->structure[] = $structure;

        return $this;
    }

    /**
     * Remove structure
     *
     * @param \HandissimoBundle\Entity\StructuresList $structure
     */
    public function removeStructure(\HandissimoBundle\Entity\StructuresList $structure)
    {
        $this->structure->removeElement($structure);
    }

    /**
     * Get structure
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStructure()
    {
        return $this->structure;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }
    public function setPictureFile(File $pictureFile=null)
    {
        $this->pictureFile = $pictureFile;
        if($pictureFile) {
            $this->pictureUpdatedAt = new \DateTimeImmutable();
        }
        return $this;
    }

    public function getPictureFile()
    {
        return $this->pictureFile;
    }

    /**
     * Set pictureUpdatedAt
     *
     * @param \DateTime $pictureUpdatedAt
     *
     * @return StructureType
     */
    public function setPictureUpdatedAt($pictureUpdatedAt)
    {
        $this->pictureUpdatedAt = $pictureUpdatedAt;

        return $this;
    }

    /**
     * Get firstPictureUpdatedAt
     *
     * @return \DateTime
     */
    public function getPictureUpdatedAt()
    {
        return $this->pictureUpdatedAt;
    }
}
