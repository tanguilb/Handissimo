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

}