<?php

/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 05/12/16
 * Time: 14:53
 */

namespace HandissimoBundle\Repository;
use Doctrine\ORM\EntityRepository;

class OrganizationsRepository extends EntityRepository
{
   public function getByOrganizationsName($keyword/*, $postaldata*/)
    {
        $query = $this->createQueryBuilder('o')
            ->select('o.name', 'n.needName', 'dt.disabilityName','st.structurestype')
            ->innerJoin('o.needs', 'n')
            ->innerJoin('o.disabilityTypes', 'dt')
            ->innerJoin('o.structuretype', 'st')
            ->select('o.name', 'n.needName', 'dt.disabilityName','st.structurestype')
            ->where('o.name like :data')
            ->orWhere('n.needName like :data')
            ->orWhere('dt.disabilityName like :data')
            ->orWhere('st.structurestype like :data')
           // ->andwhere('o.postal = :postaldata')
            //->orderBy('o.name', 'ASC')
            ->setParameter('data', $keyword)
           // ->setParameter('postaldata', $postaldata )
            ->getQuery();

        dump($query->getSQL());die;
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