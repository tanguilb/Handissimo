<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 13/03/17
 * Time: 11:43
 */

namespace HandissimoBundle\Upload;

use HandissimoBundle\Entity\Media;

class MediaRemove
{

    public function remove(Media $media)
    {
        $removeFile = $media->getWebPath();
        $removeThumbnails = $media->getThumbnails();

        unlink($removeFile);
        unlink($removeThumbnails);

        $media->setFile(null);
    }

}