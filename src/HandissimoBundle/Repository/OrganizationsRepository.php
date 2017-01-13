<?php

namespace HandissimoBundle\Repository;

use Application\Sonata\UserBundle\ApplicationSonataUserBundle;
use Doctrine\ORM\EntityRepository;
use Application\Sonata\UserBundle\Entity\User;

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

    public function getByUser(User $user)
    {
        $query = $this->createQueryBuilder('o')
            ->join('o.userOrg', 'u')
            ->where('u.id = ?1')
            ->setParameter(1, $user->getId());
            //->getQuery()

        $query->getQuery()->getSQL();;die();
        return $query->getResult();
    }

}