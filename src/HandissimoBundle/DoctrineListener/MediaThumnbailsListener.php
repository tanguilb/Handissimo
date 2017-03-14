<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 02/03/17
 * Time: 16:11
 */

namespace HandissimoBundle\DoctrineListener;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use HandissimoBundle\ImageThumnbails;
use HandissimoBundle\Entity\Media;

class MediaThumnbailsListener
{
    private $ImageThumnbails;

    public function __construct(ImageThumnbails $imageThumnbails)
    {
        $this->ImageThumnbails = $imageThumnbails;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        if(!$entity instanceof Media)
        {
            return;
        }

        $this->ImageThumnbails->resizeImage($entity);
    }
}