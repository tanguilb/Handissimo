<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 08/03/17
 * Time: 15:47
 */

namespace HandissimoBundle\Upload;


use Symfony\Component\HttpFoundation\File\UploadedFile;


class UploadAndResizePictures
{
    private $targetDirectory;

    public function __construct($targetDirectory)
    {
        $this->targetDirectory = $targetDirectory;
    }

    public function resize($file, $y, $min)
    {
        $origin = imagecreatefromjpeg($this->targetDirectory.'/'.$file);
        $widthOrigin = imagesx($origin);
        $heightOrigin = imagesy($origin);
        $proportion = $widthOrigin/$heightOrigin;
        $x = $y*$proportion;
        $targetDir = imagecreatetruecolor($x, $y);
        $widthTargetDir = imagesx($targetDir);
        $heightTargetDir = imagesy($targetDir);
        imagecopyresampled($targetDir, $origin, 0, 0, 0, 0, $widthTargetDir, $heightTargetDir, $widthOrigin, $heightOrigin);
        imagejpeg($targetDir, $this->targetDirectory."/".$min.$file);
    }
}