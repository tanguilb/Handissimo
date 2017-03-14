<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 08/03/17
 * Time: 15:47
 */

namespace HandissimoBundle\Upload;


use HandissimoBundle\Entity\Media;


class ResizePictures
{

    public function resize(Media $file)
    {
        $webPath = $file->getFile()->getClientOriginalName();
        var_dump($webPath);
        $origin = imagecreatefromjpeg($webPath);
        $widthOrigin = imagesx($origin);
        $heightOrigin = imagesy($origin);
        $proportion = $widthOrigin/$heightOrigin;
        $x = 300*$proportion;
        $targetDir = imagecreatetruecolor($x, 300);
        $widthTargetDir = imagesx($targetDir);
        $heightTargetDir = imagesy($targetDir);
        imagecopyresampled($targetDir, $origin, 0, 0, 0, 0, $widthTargetDir, $heightTargetDir, $widthOrigin, $heightOrigin);
        imagejpeg($targetDir, $webPath);
    }
}