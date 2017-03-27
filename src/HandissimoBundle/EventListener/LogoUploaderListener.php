<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 23/03/17
 * Time: 09:59
 */

namespace HandissimoBundle\EventListener;


use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use HandissimoBundle\Entity\Organizations;
use HandissimoBundle\Services\Upload\FileUploader;

class LogoUploaderListener
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
        $logos = $repository->getLogoStructureById($id);

        foreach($logos as $logo)
        {
            if($logo['structureLogo'] !== null and $entity->getStructureLogo() == null)
            {
                $entity->setStructureLogo($logo['structureLogo']);
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

        $file = $entity->getStructureLogo();

        if(!$file instanceof UploadedFile)
        {
            return;
        }

        $fileName = $this->uploader->upload($file);

        $entity->setStructureLogo($fileName);
    }

    public function postLoad(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if(!$entity instanceof Organizations)
        {
            return;
        }

        if($fileName = $entity->getStructureLogo())
        {
            $entity->setStructureLogo(new File($this->uploader->getTargetDir().'/'.$fileName));
        }
    }

}