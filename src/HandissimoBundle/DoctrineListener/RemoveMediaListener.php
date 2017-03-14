<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 13/03/17
 * Time: 11:21
 */

namespace HandissimoBundle\DoctrineListener;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use HandissimoBundle\Entity\Media;
use HandissimoBundle\Upload\MediaRemove;

class RemoveMediaListener
{
    private $mediaRemove;

    public function __construct(MediaRemove $mediaRemove)
    {
        $this->mediaRemove = $mediaRemove;
    }

    public function postRemove(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        if (!$entity instanceof Media)
        {
            return;
        }

        $this->mediaRemove->remove($entity);
    }
}