<?php

namespace HandissimoBundle\Entity;

use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Gallery
 */
class Gallery
{

    const SERVER_PATH_TO_IMAGE  = 'images';


    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * Unmapped property to handle file uploads
     */
    private $file;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFile()) {
            return;
        }

        // we use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and target filename as params
        $this->getFile()->move(
            self::SERVER_PATH_TO_IMAGE,
            $this->getFile()->getClientOriginalName()
        );
        $this->webPath = $this->getFile()->getClientOriginalName();

        // set the path property to the filename where you've saved the file
        $this->filename = $this->getFile()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->setFile(null);
    }

    /**
     * Lifecycle callback to upload the file to the server
     */
    public function lifecycleFileUpload()
    {
        $this->upload();
    }

    /**
     * Updates the hash value to force the preUpdate and postUpdate events to fire
     */
    public function refreshUpdated()
    {
        $this->setUpdated(new \DateTime());
    }

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
     * @return Gallery
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
     * @var \DateTime
     */
    private $updated;


    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return Gallery
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }
    /**
     * @var string
     */
    private $user;


    /**
     * Set user
     *
     * @param string $user
     *
     * @return Gallery
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
     * @var string
     */
    private $webPath;


    /**
     * Set webPath
     *
     * @param string $webPath
     *
     * @return Gallery
     */
    public function setWebPath($webPath)
    {
        $this->webPath = $webPath;

        return $this;
    }

    /**
     * Get webPath
     *
     * @return string
     */
    public function getWebPath()
    {
        return $this->webPath;
    }
    /**
     * @var \HandissimoBundle\Entity\Organizations
     */
    private $organizationPictures;


    /**
     * Set organizationPictures
     *
     * @param \HandissimoBundle\Entity\Organizations $organizationPictures
     *
     * @return Gallery
     */
    public function setOrganizationPictures(\HandissimoBundle\Entity\Organizations $organizationPictures = null)
    {
        $this->organizationPictures = $organizationPictures;

        return $this;
    }

    /**
     * Get organizationPictures
     *
     * @return \HandissimoBundle\Entity\Organizations
     */
    public function getOrganizationPictures()
    {
        return $this->organizationPictures;
    }
}
