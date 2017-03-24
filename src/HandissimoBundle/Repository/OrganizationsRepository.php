<?php

namespace HandissimoBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Application\Sonata\UserBundle\Entity\User;

class OrganizationsRepository extends EntityRepository
{

    public function getByOrganizationName($data, $age)
    {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();
        $query->select('o');
        $query->from('HandissimoBundle:Organizations', 'o');
        $query->innerJoin('o.needs', 'n');
        $query->innerJoin('o.disabilityTypes', 'dt');
        $query->innerJoin('o.orgaStructure', 'sl');
       // $query->innerJoin('o.stafforganizations', 's');
        // define data structure
        $fields =array(
            "keyword" => array(
                'o'=>'name',
                'dt'=>'disabilityName',
                'sl'=>'name',
                'n'=>'needName',
                /*'s'=>'jobs'*/),
            "postal" => array(
                'o' => 'postal',
               // 'o' => 'city'
            ),
        );

        if ($age !== null) {
            $andmodule = $query->expr()->andX();
            $andmodule->add($query->expr()->lte('o.agemini', ':age'));
            $andmodule->add($query->expr()->gte('o.agemaxi', ':age'));
            $query->andWhere($andmodule);
            $query->setParameter('age', $age);
        }

        // search data from form
        foreach($fields as $item => $value) {
            if (!is_null($data[$item])) {
                $ormodule = $query->expr()->orX();
                foreach ($value as $key => $fieldName) {
                    $ormodule->add($query->expr()->eq($key . '.' . $fieldName, ':' . $item));
                    $ormodule->add($query->expr()->isNull($key . '.' . $fieldName));
                }
                $query->andWhere($ormodule);
                $query->setParameter($item, $data[$item]);

            }
        }
        //echo $query->getQuery()->getSQL();;die();
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
            ->select('o.city')
            ->where('o.city LIKE :citydata')
            ->groupBy('o.city')
            ->setParameter('citydata',  '%' . $postalcode . '%')
            ->orderBy('o.postal')
            ->getQuery();
        return $query->getResult();
    }

    public function getByPostal($postalcode)
    {
        $query = $this->createQueryBuilder('o')
            ->select('o.postal')
            ->where('o.postal LIKE :postaldata')
            ->groupBy('o.postal')
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

    public function getByMultipleCriterias($data, $age)
    {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();
        $query->select('o');
        $query->from('HandissimoBundle:Organizations', 'o');
        $query->innerJoin('o.needs', 'n');
        $query->innerJoin('o.disabilityTypes', 'dt');
        $query->innerJoin('o.orgaStructure', 'sl');
        $query->innerJoin('o.stafforganizations', 's');

        // define data structure
        $fields =array(
            "keyword" => array(
                'o'=>'name',
                'dt'=>'disabilityName',
                'sl'=>'name',
                'n'=>'needName',
                's'=>'jobs'),
            "postal" => array(
                'o' => 'postal',
               // 'o' => 'city'
            ),
            "disabilitytypes" => array(
                'dt'=>'id',
            ),
            "orgaStructure" => array(
                'sl'=>'id',
            ),
            "needs" => array(
                'n'=>'id',
            )
        );

        if ($age !== null) {
            $andmodule = $query->expr()->andX();
            $andmodule->add($query->expr()->lte('o.agemini', ':age'));
            $andmodule->add($query->expr()->gte('o.agemaxi', ':age'));
            $query->andWhere($andmodule);
            $query->setParameter('age', $age);
        }

        // search data from form
        foreach($fields as $item => $value) {
            if (!is_null($data[$item])) {
                $ormodule = $query->expr()->orX();
                foreach ($value as $key => $fieldName) {
                    $ormodule->add($query->expr()->eq($key . '.' . $fieldName, ':' . $item));
                    $ormodule->add($query->expr()->isNull($key . '.' . $fieldName));
                }
                $query->andWhere($ormodule);
                $query->setParameter($item, $data[$item]);
            }
        }
        //echo $query->getQuery()->getSQL();;die();
        return $query->getQuery()->getResult();
    }

    public function getByUser(User $user)
    {
        $query = $this->createQueryBuilder('o')
            ->join('o.userorg', 'u')
            ->where('u.id = ?1')
            ->setParameter(1, $user->getId())
            ->getQuery();
        return $query->getResult();
    }

    public function getByNonUser()
    {
        $query = $this->createQueryBuilder('o')
            ->where('o.userorg =' .null)
            ->getQuery();
        return $query->getResult();

    }

    public function getEmailByOrganization($id)
    {
        $query = $this->createQueryBuilder('o')
            ->select('o.mail')
            ->where('o.id =' .$id)
            ->getQuery();
        return$query->getResult();
    }
}