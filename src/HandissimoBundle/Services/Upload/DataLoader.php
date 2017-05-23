<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 21/05/17
 * Time: 10:52
 */

namespace HandissimoBundle\Services\Upload;

use Doctrine\ORM\EntityManager;
use HandissimoBundle\Entity\Organizations;
use Symfony\Component\DependencyInjection\ContainerInterface;


class DataLoader
{

    protected $em;
    protected $container;

    public function __construct(EntityManager $em, ContainerInterface $container)
    {
        $this->em = $em;
        $this->container = $container;
    }

    public function loadAction($name)
    {
        $string = file_get_contents($this->container->get('kernel')->getRootDir()."/../".$name);
        $contents = json_decode($string, true);
        foreach ($contents as $content){
            $organizationsEntity = new Organizations();
            $organizationsEntity->setName("ULIS ".$content['name']);
            $organizationsEntity->setAddress($content['address']);
            //$organizationsEntity->setAddressComplement($content['addressComplement']);
            $organizationsEntity->setPostal($content['postal']);
            $organizationsEntity->setCity($content['city']);
            $organizationsEntity->setPhoneNumber($content['phoneNumber']);
            $organizationsEntity->setMail($content['email']);
            //$organizationsEntity->setWebsite($content['website']);
            $organizationsEntity->setAgemini(6);
            $organizationsEntity->setAgemaxi(12);
            $organizationsEntity->setOrgaStructure($this->em->getReference('HandissimoBundle:StructuresList', 114));
            //$organizationsEntity->setFreeplace($test['freeplace']);
            //$organizationsEntity->setDirectorName($test['directorName']);
            $this->em->persist($organizationsEntity);
        }
        $this->em->flush();
        //$this->render(":front:about.html.twig");
    }

}