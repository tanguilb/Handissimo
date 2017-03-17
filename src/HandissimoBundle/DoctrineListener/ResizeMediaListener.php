<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 13/03/17
 * Time: 12:10
 */

namespace HandissimoBundle\DoctrineListener;


use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use HandissimoBundle\Entity\Media;
use HandissimoBundle\Upload\ResizePictures;

class ResizeMediaListener
{
    private $resizePictures;

    public function __construct(ResizePictures $resizePictures)
    {
        $this->resizePictures = $resizePictures;
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        var_dump($entity);
        if(!$entity instanceof Media)
        {
            return;
        }

        $this->resizePictures->resize($entity);
    }
}