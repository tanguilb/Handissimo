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

        $origin = imagecreatefromjpeg(self::PATH_TO_UPLOAD_FILE.'/'.$this->getFile()->getClientOriginalName());
        $targetDir = imagecreatetruecolor(100, 100);

        $widthOrigin = imagesx($origin);
        $heightOrigin = imagesy($origin);

        $widthTargetDir = imagesx($targetDir);
        $heightTargetDir = imagesy($targetDir);

        imagecopyresampled($targetDir, $origin, 0, 0, 0, 0, $widthTargetDir, $heightTargetDir, $widthOrigin, $heightOrigin);

        imagejpeg($targetDir, self::PATH_TO_UPLOAD_FILE."/mini-".$this->getFile()->getClientOriginalName());

        $this->thumnbails = self::PATH_TO_UPLOAD_FILE.'/mini-'.$this->getFile()->getClientOriginalName();
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
     * @var string
     */
    private $thumnbails;


    /**
     * Set thumnbails
     *
     * @param string $thumnbails
     *
     * @return Media
     */
    public function setThumnbails($thumnbails)
    {
        $this->thumnbails = $thumnbails;

        return $this;
    }

    /**
     * Get thumnbails
     *
     * @return string
     */
    public function getThumnbails()
    {
        return $this->thumnbails;
    }

}
