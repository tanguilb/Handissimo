<?php

namespace HandissimoBundle\Repository;

use Doctrine\ORM\EntityRepository;

class OrganizationsRepository extends EntityRepository
{
    /*public function getByOrganizationsName($keyword/*, $postal)
    {
        $query = $this->createQueryBuilder('o')
            //->addselect('o.name', 'n.needName', 'dt.disabilityName','st.structurestype', 's.jobs', 'o.postal')
            ->innerJoin('o.stafforganizations', 's')
            ->innerJoin('o.needs', 'n')
            ->innerJoin('o.disabilityTypes', 'dt')
            ->innerJoin('o.structuretype', 'st')
            ->where('o.name = :data')
            ->orWhere('n.needName = :data')
            ->orWhere('dt.disabilityName = :data')
            ->orWhere('st.structurestype = :data')
            ->orWhere('s.jobs = :data')
            //->andWhere('o.postal = :postaldata')
            //->orderBy('o.name', 'ASC')
            ->setParameter('data', $keyword['keyword'])
            //->setParameter('postaldata', $postal)
            ->getQuery();

        //dump($query->getSQL());die;
        return $query->getResult();
    }*/

    public function getByOrganizationsName($keyword, $age, $postal)
    {
        $query = $this->createQueryBuilder('o');
        $query->innerJoin('o.stafforganizations', 's');
        $query->innerJoin('o.needs', 'n');
        $query->innerJoin('o.disabilityTypes', 'dt');
        $query->innerJoin('o.structuretype', 'st');

        $ormodule = $query->expr()->orX();
        $ormodule->add($query->expr()->eq('o.name', ':data'));
        $ormodule->add($query->expr()->eq('n.needName', ':data'));
        $ormodule->add($query->expr()->eq('dt.disabilityName', ':data'));
        $ormodule->add($query->expr()->eq('st.structurestype', ':data'));
        $ormodule->add($query->expr()->eq('s.jobs', ':data'));

        $andmodule = $query->expr()->andX();
        $andmodule->add($query->expr()->lte('o.agemini', ':age'));
        $andmodule->add($query->expr()->gte('o.agemaxi', ':age'));

        $query->where($ormodule);
        $query->andWhere($andmodule);
        $query->andWhere('o.postal = :postaldata');
        $query->setParameter('data', $keyword['keyword']);
        $query->setParameter('age', $age['age']);
        $query->setParameter('postaldata', $postal['postal']);
        $query->getQuery()

            ->getResult();
                //dump($query->getDQL());die;
            //return $query->getResult();
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

    public function getByAge($data)
    {
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