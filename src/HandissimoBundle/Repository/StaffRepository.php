<?php

namespace HandissimoBundle\Repository;


use Doctrine\ORM\EntityRepository;

class StaffRepository extends EntityRepository
{
    public function getByStaff($keyword)
    {
        $query = $this->createQueryBuilder('s')
            ->select('s.jobs')
            ->where('s.jobs LIKE :staffdata')
            ->setParameter('staffdata', '%' . $keyword . '%')
            ->getQuery();
        return $query->getResult();
    }
}
