<?php

namespace HandissimoBundle\Repository;


use Application\Sonata\UserBundle\Entity\User;
use HandissimoBundle\Entity\Media;
use HandissimoBundle\Entity\Organizations;

/**
 * MediaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MediaRepository extends \Doctrine\ORM\EntityRepository
{
    public function getByUsers($userId)
    {
        $query = $this->createQueryBuilder('m')
            ->where('m.user = ?1')
           // ->where('m.caroussel = ?2')
            ->setParameter(1, $userId)
            //->setParameter(2, $caroussel)
            ->getQuery();
        return $query->getResult();
    }

    public function getLastOrganizations($limit)
    {
        $qb = $this->createQueryBuilder('m')
            ->orderBy('m.id', 'DESC')
            //->where('m.firstPicture = 1')
           // ->groupBy('m.webPath')
            ->setMaxResults($limit)
            ->getQuery();
        return $qb->getResult();
    }

    public function getImageByOrganizations($organizationsId)
    {
        $qb = $this->createQueryBuilder('m')
            ->join('m.organizationsImg', 'o')
            //->addSelect('o.firstPicture')
           // ->where('m.caroussel = 1')
            ->andWhere('m.organizationsImg = ?1')
            ->setParameter(1, $organizationsId)
            ->getQuery();
        return $qb->getResult();
    }

}
