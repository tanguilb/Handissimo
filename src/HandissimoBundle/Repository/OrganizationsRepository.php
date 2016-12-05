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
    public function DisabilityGetByOrganizations($organizationData/*, $needsData, $disabilityData*/)
    {
        $query = $this->createQueryBuilder('o')
           // ->innerJoin('o.needs', 'n')
            //->innerJoin('o.disabilityTypes', 'dt')
            ->select('o.name')
            ->where('o.name LIKE :data')
            //->orWhere('n.needName LIKE :dataneeds')
            //->orWhere('dt.disabilityName Like :disabilityData')
            ->orderBy('o.name', 'ASC')
            ->setParameter('data', '%' . $organizationData . '%')
            //->setParameter('dataneeds', '%' .$needsData . '%' )
            //->setParameter('disabilityData', '%' .$disabilityData . '%')
            ->getQuery();
        return $query->getResult();

    }

}