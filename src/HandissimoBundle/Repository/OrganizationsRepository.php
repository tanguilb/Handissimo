<?php

namespace HandissimoBundle\Repository;

use Doctrine\ORM\EntityRepository;

class OrganizationsRepository extends EntityRepository
{
    /*public function getByAge($data)
    {
        $data = "%" . $data . "%";
        $qb = $this->createQueryBuilder('o')
            //->select('o')
            //->where("o.agemaxi > :data")
            //->setParameter('data', '%' . $data . '%')
           // ->andWhere("o.agemini < :data")
            //->setParameter('data', '%' . $data . '%')
            //->andWhere('o.agemini < ?3 < o.agemaxi')
            //->orderBy('o.name', 'ASC')
            //->setParameter(3, '%' . $data . '%')

            ->getQuery();

        return $qb->getResult();
    }*/

    public function getByOrganizations($keyword)
    {
        $query = $this->createQueryBuilder('o')

            ->select('o.name')
            ->where('o.name LIKE :data')
            ->setParameter('data', '%' . $keyword . '%')
            ->orderBy('o.name', 'ASC')
            ->getQuery();
        return $query->getResult();
    }

    public function getByCity($postalcode)
    {
        $query = $this->createQueryBuilder('o')
            ->select('o.postal')
            ->where('o.postal LIKE :postaldata')
            ->setParameter('postaldata',  '%' . $postalcode . '%')
            ->orderBy('o.postal')
            ->getQuery();
        return $query->getResult();
    }
}