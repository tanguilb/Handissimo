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

    public function getByOrganizations($keyword/*, $dataneeds, $disabilityData*/)
    {
        $query = $this->createQueryBuilder('o')

            //->innerJoin('o.needs', 'n')
            //->innerJoin('o.disabilityTypes', 'dt')
            ->addselect('o.name')
            //->addselect('n.needName')
            //->addselect('dt.disabilityName')
            ->where('o.name LIKE :data')
            ->setParameter('data', '%' . $keyword . '%')
            //->orWhere('n.needName LIKE :dataneeds')
            //->setParameter('dataneeds', '%' .$dataneeds . '%' )
            //->orWhere('dt.disabilityName Like :disabilityData')
            //->setParameter('disabilityData', '%' .$disabilityData . '%')
            ->orderBy('o.name', 'ASC')
            //->orderBy('n.needName', 'ASC')
            //->orderBy('dt.disabilityName')
            ->getQuery();
        return $query->getResult();
    }
}