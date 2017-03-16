<?php

namespace HandissimoBundle\Entity;

use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Media
 */
class Media
{
    const PATH_TO_UPLOAD_FILE = 'uploads/image';

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $fileName;

    /**
     * @var \DateTime
     */
    private $updated;

    private $webPath;

    private $file;



    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function upload()
    {
        if(null === $this->getFile())
        {
            return;
        }

        $this->getFile()->move(
            self::PATH_TO_UPLOAD_FILE,
            $this->getFile()->getClientOriginalName()
        );

        // resize image in thumbnials and for caroussel
        $origin = imagecreatefromjpeg(self::PATH_TO_UPLOAD_FILE.'/'.$this->getFile()->getClientOriginalName());
        var_dump($origin);
        $widthOrigin = imagesx($origin);
        $heightOrigin = imagesy($origin);

        $proportion = $widthOrigin/$heightOrigin;

        $x = 50*$proportion;
        $x1 = 300*$proportion;

        $targetDir = imagecreatetruecolor($x, 50);
        $targetDir1 = imagecreatetruecolor($x1, 300);



        $widthTargetDir1 = imagesx($targetDir1);
        $widthTargetDir = imagesx($targetDir);
        $heightTargetDir1 = imagesy($targetDir1);
        $heightTargetDir = imagesy($targetDir);

        imagecopyresampled($targetDir, $origin, 0, 0, 0, 0, $widthTargetDir, $heightTargetDir, $widthOrigin, $heightOrigin);
        imagecopyresampled($targetDir1, $origin, 0, 0, 0, 0, $widthTargetDir1, $heightTargetDir1, $widthOrigin, $heightOrigin);

        imagejpeg($targetDir, self::PATH_TO_UPLOAD_FILE."/mini-".$this->getFile()->getClientOriginalName());
        imagejpeg($targetDir1, self::PATH_TO_UPLOAD_FILE."/".$this->getFile()->getClientOriginalName());

        $this->thumbnails = self::PATH_TO_UPLOAD_FILE.'/mini-'.$this->getFile()->getClientOriginalName();
        $this->webPath = self::PATH_TO_UPLOAD_FILE.'/'.$this->getFile()->getClientOriginalName();

        $this->fileName = $this->getFile()->getClientOriginalName();

        $this->setFile(null);
    }


    public function lifecycleFileUpload()
    {
        $this->upload();
    }


    public function refreshUpdated()
    {
        $this->setUpdated( new \DateTime());
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
     * Set fileName
     *
     * @param string $fileName
     *
     * @return Media
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * Get fileName
     *
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    public function setWebPath($webPath)
    {
        $this->webPath = $webPath;
        return $this;
    }

    public function getWebPath()
    {
        return $this->webPath;
    }
    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return Media
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
     * @var boolean
     */
    private $caroussel;


    /**
     * Set caroussel
     *
     * @param boolean $caroussel
     *
     * @return Media
     */
    public function setCaroussel($caroussel)
    {
        $this->caroussel = $caroussel;

        return $this;
    }

    /**
     * Get caroussel
     *
     * @return boolean
     */
    public function getCaroussel()
    {
        return $this->caroussel;
    }
    /**
     * @var boolean
     */
    private $firstPicture;


    /**
     * Set firstPicture
     *
     * @param boolean $firstPicture
     *
     * @return Media
     */
    public function setFirstPicture($firstPicture)
    {
        $this->firstPicture = $firstPicture;

        return $this;
    }

    /**
     * Get firstPicture
     *
     * @return boolean
     */
    public function getFirstPicture()
    {
        return $this->firstPicture;
    }

    /**
     * @var string
     */
    private $thumbnails;


    /**
     * Set thumbnails
     *
     * @param string $thumbnails
     *
     * @return Media
     */
    public function setThumbnails($thumbnails)
    {
        $this->thumbnails = $thumbnails;

        return $this;
    }

    /**
     * Get thumbnails
     *
     * @return string
     */
    public function getThumbnails()
    {
        return $this->thumbnails;
    }

    /**
     * @var string
     */
    private $organizationsId;


    /**
     * Set organizationsId
     *
     * @param string $organizationsId
     *
     * @return Media
     */
    public function setOrganizationsId($organizationsId)
    {
        $this->organizationsId = $organizationsId;

        return $this;
    }

    /**
     * Get organizationsId
     *
     * @return string
     */
    public function getOrganizationsId()
    {
        return $this->organizationsId;
    }
    /**
     * @var \HandissimoBundle\Entity\Organizations
     */
    private $mediaOrg;


    /**
     * Set mediaOrg
     *
     * @param \HandissimoBundle\Entity\Organizations $mediaOrg
     *
     * @return Media
     */
    public function setMediaOrg(\HandissimoBundle\Entity\Organizations $mediaOrg = null)
    {
        $this->mediaOrg = $mediaOrg;

        return $this;
    }

    /**
     * Get mediaOrg
     *
     * @return \HandissimoBundle\Entity\Organizations
     */
    public function getMediaOrg()
    {
        return $this->mediaOrg;
    }
}
