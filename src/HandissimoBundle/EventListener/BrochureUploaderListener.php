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

    private $em;

    public function __construct(FileUploader $uploader, EntityManager $entityManager)
    {
        $this->uploader = $uploader;
        $this->em = $entityManager;
    }

    public function getOrganizations($brochures)
    {
        $org = $this->em;
        var_dump($org);
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();
       // $org = $this->organizations->getBrochure();
       // var_dump($org);

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

        $fileName = $entity->getBrochure();
        //var_dump($fileName);

        if($fileName)
        {
            $entity->setBrochure(new File($this->uploader->getTargetDir().'/'.$fileName));
        }
    }

}