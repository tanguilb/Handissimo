<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 05/12/16
 * Time: 17:47
 */

namespace HandissimoBundle\Repository;


use Doctrine\ORM\EntityRepository;

class DisabilityTypesRepository extends EntityRepository
{
    public function getByDisability($keyword)
    {
        $query = $this->createQueryBuilder('dt')
            ->select('dt.disabilityName')
            ->where('dt.disabilityName LIKE :disabilityData')
            ->setParameter('disabilityData', '%' . $keyword . '%')
            ->getQuery();
        return $query->getResult();

    }

}