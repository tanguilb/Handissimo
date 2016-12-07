<?php

namespace HandissimoBundle\Repository;

use Doctrine\ORM\EntityRepository;

class OrganizationsRepository extends EntityRepository
{
  /*  public function getByOrganizations($organizationData)
    {
        $organizationData = "%" . $organizationData . "%";
        $query = $this->createQueryBuilder('o')
            //->innerJoin('o.needs', 'n')
            //->innerJoin('o.disabilityTypes', 'dt')
            ->addSelect('o.name'/*, 'n.needName', 'dt.disabilityName')
            ->where('o.name LIKE :organizationData')
           // ->orWhere('n.needName LIKE :dataneeds')
           // ->orWhere('dt.disabilityName Like :disabilityData')
            ->orderBy('o.name', 'ASC')
            ->setParameter('organizationData', $organizationData)
            //->setParameter('dataneeds', '%' .$needsData . '%' )
            //->setParameter('disabilityData', '%' .$disabilityData . '%')
            ->getQuery();
        return $query->getResult();

    }*/

    public function getByOrganizations($keyword)
    {
        $query = $this->createQueryBuilder('o')
                ->select('o.name')
                ->where('o.name LIKE :organizationData')
                ->setParameter('organizationData', '%' . $keyword . '%')
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

    public function getByAge($data){
    $data = "%" . $data . "%";
    $qb = $this->createQueryBuilder('o')
        ->select('o')
        ->where("o.agemaxi > :data")
        ->andWhere("o.agemini < :data")
        ->andWhere('o.agemini < :data < o.agemaxi')
        ->setParameter('data', $data)
        ->getQuery();
    return $qb->getResult();
}

}