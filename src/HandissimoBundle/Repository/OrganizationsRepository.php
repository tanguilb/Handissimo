<?php

namespace HandissimoBundle\Repository;

use Doctrine\ORM\EntityRepository;

class OrganizationsRepository extends EntityRepository
{

    public function getByOrganizationsName($keyword, $age, $postal)
    {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();
        $query->addSelect('o');
        $query->from('HandissimoBundle:Organizations', 'o');
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

        if ($keyword !== null && $postal !== null && $age !== null) {
            $query->where($ormodule);
            $query->andWhere($andmodule);
            $query->andWhere('o.postal = :postaldata');
            $query->setParameter('data', $keyword);
            $query->setParameter('age', $age);
            $query->setParameter('postaldata', $postal);
        }elseif ($keyword == null && $postal == null && $age !== null) {
            $query->andWhere($andmodule);
            $query->setParameter('age', $age);
        }elseif ($keyword == null && $age == null && $postal !== null) {
            $query->andWhere('o.postal = :postaldata');
            $query->setParameter('postaldata', $postal);
        }elseif ($keyword !== null && $age == null && $postal == null) {
            $query->where($ormodule);
            $query->setParameter('data', $keyword);
        }elseif ($keyword !== null && $postal !== null && $age == null) {
            $query->where($ormodule);
            $query->andWhere('o.postal = :postaldata');
            $query->setParameter('data', $keyword);
            $query->setParameter('postaldata', $postal);
        }elseif ($keyword == null && $postal !== null && $age !== null) {
            $query->andWhere($andmodule);
            $query->andWhere('o.postal = :postaldata');
            $query->setParameter('age', $age);
            $query->setParameter('postaldata', $postal);
        }elseif ($keyword !== null && $postal == null && $age !== null) {
            $query->where($ormodule);
            $query->andWhere($andmodule);
            $query->setParameter('data', $keyword);
            $query->setParameter('age', $age);
        }
        return $query->getQuery()->getResult();
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

    public function getBySearchAdvanced($disabilitytypes, $structurestypes, $needs)
    {
        $query = $this->createQueryBuilder('o');
        $query->addSelect('o');
        $query->from('HandissimoBundle:Organizations', 'o');
        $query->innerJoin('o.needs', 'n');
        $query->innerJoin('o.disabilityTypes', 'dt');
        $query->innerJoin('o.structuretype', 'st');

            if ($disabilitytypes !== null && $structurestypes !== null && $needs !== null) {
                $query->where('o.needs = :needsdata');
                $query->andWhere('o.disabilityTypes = :disabilityTypesdata' );
                $query->andWhere('o.structuretype = :structuretypedata');
                $query->setParameter('needsdata', $needs);
                $query->setParameter('disabilityTypesdata', $disabilitytypes);
                $query->setParameter('structuretypedata', $structurestypes);
            }elseif ($disabilitytypes !== null && $structurestypes !== null && $needs == null) {
                $query->andWhere('o.disabilityTypes = :disabilityTypesdata' );
                $query->andWhere('o.structuretype = :structuretypedata');
                $query->setParameter('disabilityTypesdata', $disabilitytypes);
                $query->setParameter('structuretypedata', $structurestypes);
            }elseif ($disabilitytypes !== null && $structurestypes == null && $needs !== null) {
                $query->where('o.needs = :needsdata');
                $query->andWhere('o.disabilityTypes = :disabilityTypesdata' );
                $query->setParameter('needsdata', $needs);
                $query->setParameter('disabilityTypesdata', $disabilitytypes);
            }elseif ($disabilitytypes == null && $structurestypes !== null && $needs !== null) {
                $query->where('o.needs = :needsdata');
                $query->andWhere('o.structuretype = :structuretypedata');
                $query->setParameter('needsdata', $needs);
                $query->setParameter('structuretypedata', $structurestypes);
            }elseif ($disabilitytypes !== null && $structurestypes == null && $needs == null) {
                $query->andWhere('o.disabilityTypes = :disabilityTypesdata' );
                $query->setParameter('disabilityTypesdata', $disabilitytypes);
            }elseif ($disabilitytypes == null && $structurestypes !== null && $needs == null) {
                $query->andWhere('o.structuretype = :structuretypedata');
                $query->setParameter('structuretypedata', $structurestypes);
            }elseif ($disabilitytypes == null && $structurestypes == null && $needs !== null) {
                $query->where('o.needs = :needsdata');
                $query->setParameter('needsdata', $needs);
            }
        return $query->getQuery()->getResult();
    }

}