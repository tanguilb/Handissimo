<?php

namespace HandissimoBundle\Repository;

use Doctrine\ORM\EntityRepository;

class OrganizationsRepository extends EntityRepository
{
    public function getByMulti($organizationData)
    {
        $query = $this->createQueryBuilder('o')
            ->Select('o.name', 'n.needName', 'dt.disabilityName', 'st.structurestype')
            ->innerJoin('o.needs', 'n')
            ->innerJoin('o.structuretype', 'st')
            ->innerJoin('o.disabilityTypes', 'dt')
            ->where('o.name = :data')
            ->orWhere('n.needName = :data')
            ->orWhere('dt.disabilityName = :data')
            ->orWhere('st.structurestype = :data')
            ->orWhere('o.postal = :data')

            ->setParameter('data', $organizationData)
            ->getQuery();
        return $query->getResult();

    }

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