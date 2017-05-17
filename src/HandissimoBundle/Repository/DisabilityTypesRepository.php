<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 15/05/17
 * Time: 13:38
 */

namespace HandissimoBundle\Repository;


use Doctrine\ORM\EntityRepository;

class DisabilityTypesRepository extends EntityRepository
{
    public function getByDisability($disability)
    {
        $qb = $this->createQueryBuilder('d')
            ->select('d.disabilityName')
            ->where('d.disabilityName LIKE :namedata')
            ->setParameter('namedata', '%'.$disability.'%')
            ->getQuery();
        return $qb->getResult();
    }
}