<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 16/03/17
 * Time: 14:30
 */

namespace HandissimoBundle\EventListener;

use Doctrine\ORM\EntityManager;
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
        $id = $entity->getId();
        $em = $args->getObjectManager();
        $repository = $em->getRepository('HandissimoBundle:Organizations');
        $brochures = $repository->getBrochuresById($id);
        foreach($brochures as $brochure) {

            if ($brochure['brochures'] !== null and $entity->getBrochures() == null) {
                $entity->setBrochures($brochure['brochures']);
            }
            $this->uploadFile($entity);
        }
    }

    private function uploadFile($entity)
    {
        if(!$entity instanceof Organizations)
        {
            return;
        }

        $file = $entity->getBrochures();

        if(!$file instanceof UploadedFile)
        {
            return;
        }

        $fileName = $this->uploader->upload($file);

        $entity->setBrochures($fileName);
    }

    public function postLoad(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if(!$entity instanceof Organizations)
        {
            return;
        }

        if($fileName = $entity->getBrochures())
        {
            $entity->setBrochures(new File($this->uploader->getTargetDir().'/'.$fileName));
        }
    }

}