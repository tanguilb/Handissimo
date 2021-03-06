<?php

namespace HandissimoBundle\Repository;

/**
 * CityRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CityRepository extends \Doctrine\ORM\EntityRepository
{
    public function getLatitude($name)
    {
        $query = $this->createQueryBuilder('c')
            ->select('c.latitude')
            ->addSelect('c.name')
            ->where('c.name = ?1')
            ->setParameter(1, $name)
            ->getQuery();
        return $query->getResult();
    }

    public function getLongitude($name)
    {
        $query = $this->createQueryBuilder('c')
            ->select('c.longitude')
            ->where('c.name = ?1')
            ->setParameter(1,  $name)
            ->getQuery();
        return $query->getResult();
    }

    public function getByCity($city)
    {
      $regex = '^'.$city;
      $qb = $this->createQueryBuilder('c')
          ->select('c.name', 'c.postal')
          ->where('REGEXP(c.name, :regexp) = true')
          ->setParameter('regexp', $regex)
          ->orWhere('c.postal LIKE :postaldata')
          ->setParameter('postaldata', '%'.$city.'%')
          ->groupBy('c.postal', 'c.name')
          ->orderBy('c.name', 'ASC')
          ->setMaxResults(10)
          ->getQuery();
      return $qb->getResult();
    }
}
