<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 16/03/17
 * Time: 14:30
 */

namespace HandissimoBundle\EventListener;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use HandissimoBundle\Entity\Organizations;
use HandissimoBundle\Services\Upload\FileUploader;

class BrochureUploaderListener
{
    private $uploader;

    public function __construct(FileUploader $uploader)
    {
        $this->uploader = $uploader;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    private function uploadFile($entity)
    {
        if(!$entity instanceof Organizations)
        {
            return;
        }

        $file = $entity->getBrochure();

        if(!$file instanceof UploadedFile)
        {
            return;
        }

        $fileName = $this->uploader->upload($file);

        $entity->setBrochure($fileName);
    }

    public function postLoad(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if(!$entity instanceof Organizations)
        {
            return;
        }

        if($fileName = $entity->getBrochure())
        {
            $entity->setBrochure(new File($this->uploader->getTargetDir().'/'.$fileName));
        }
    }

}