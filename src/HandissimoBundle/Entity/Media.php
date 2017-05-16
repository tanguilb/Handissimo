<?php

namespace HandissimoBundle\Entity;

use Symfony\Component\HttpFoundation\File\File;

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

    private $imageFile;

    public function setImageFile(File $image=null)
    {
        $this->imageFile = $image;
        if ($image){
            $this->updated = new \DateTimeImmutable();
        }
        return $this;
    }


  /*  public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }*/

    public function getimageFile()
    {
        return $this->imageFile;
    }

    public function upload()
    {
        if(null === $this->getImageFile())
        {
            return;
        }

        $this->getimageFile()->move(
            self::PATH_TO_UPLOAD_FILE,
            $this->getimageFile()->getClientOriginalName()
        );

        if($this->getimageFile()->getClientOriginalExtension() == 'jpeg' or $this->getimageFile()->getClientOriginalExtension() == 'jpg' or $this->getimageFile()->getClientOriginalExtension() == 'JPG' or $this->getimageFile()->getClientOriginalExtension() == 'JPEG'){
        // resize image in thumbnials and for caroussel
        $origin = imagecreatefromjpeg(self::PATH_TO_UPLOAD_FILE.'/'.$this->getimageFile()->getClientOriginalName());
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

        imagejpeg($targetDir, self::PATH_TO_UPLOAD_FILE."/mini-".$this->getimageFile()->getClientOriginalName());
        imagejpeg($targetDir1, self::PATH_TO_UPLOAD_FILE."/".$this->getimageFile()->getClientOriginalName());

        $this->thumbnails = self::PATH_TO_UPLOAD_FILE.'/mini-'.$this->getimageFile()->getClientOriginalName();
        $this->webPath = self::PATH_TO_UPLOAD_FILE.'/'.$this->getimageFile()->getClientOriginalName();

        $this->fileName = $this->getimageFile()->getClientOriginalName();

        $this->setImageFile(null);
        } elseif($this->getimageFile()->getClientOriginalExtension() == 'png' or $this->getimageFile()->getClientOriginalExtension() == 'PNG') {
            $origin = imagecreatefrompng(self::PATH_TO_UPLOAD_FILE.'/'.$this->getimageFile()->getClientOriginalName());
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

            imagepng($targetDir, self::PATH_TO_UPLOAD_FILE."/mini-".$this->getimageFile()->getClientOriginalName());
            imagepng($targetDir1, self::PATH_TO_UPLOAD_FILE."/".$this->getimageFile()->getClientOriginalName());

            $this->thumbnails = self::PATH_TO_UPLOAD_FILE.'/mini-'.$this->getimageFile()->getClientOriginalName();
            $this->webPath = self::PATH_TO_UPLOAD_FILE.'/'.$this->getimageFile()->getClientOriginalName();

            $this->fileName = $this->getimageFile()->getClientOriginalName();

            $this->setImageFile(null);
        }

    }

    public function removeFile()
    {
        $file = $this->getWebPath();

        return unlink($file);
    }

    public function removeThumbnails()
    {
        $file = $this->getThumbnails();

        return unlink($file);
    }


    public function lifecycleFileRemove()
    {
        $this->removeFile();
    }

    public function lifecycleThumbnailsRemove()
    {
        $this->removeThumbnails();
    }

    public function lifecycleFileUpload()
    {
        $this->upload();
    }


    public function refreshUpdated()
    {
        $this->setUpdated( new \DateTime());
        $this->upload();
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
     * @var \HandissimoBundle\Entity\Organizations
     */
    private $organizationsImg;

    /**
     * Set organizationsImg
     *
     * @param \HandissimoBundle\Entity\Organizations $organizationsImg
     *
     * @return Media
     */
    public function setOrganizationsImg(\HandissimoBundle\Entity\Organizations $organizationsImg = null)
    {
        $this->organizationsImg = $organizationsImg;

        return $this;
    }

    /**
     * Get organizationsImg
     *
     * @return \HandissimoBundle\Entity\Organizations
     */
    public function getOrganizationsImg()
    {
        return $this->organizationsImg;
    }
}
