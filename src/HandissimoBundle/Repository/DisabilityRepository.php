<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 02/06/17
 * Time: 15:24
 */

namespace HandissimoBundle\Repository;


use Doctrine\ORM\EntityRepository;

class DisabilityRepository extends EntityRepository
{
    public function getDisability($id)
    {
        $query = $this->createQueryBuilder('dt')
            ->select('dt.disabilityName')
            ->where('dt.id = ' .$id)
            ->getQuery();
        return $query->getSingleScalarResult();
    }

}