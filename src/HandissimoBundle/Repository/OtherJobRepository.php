<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 15/06/17
 * Time: 15:58
 */

namespace HandissimoBundle\Repository;


class OtherJobRepository extends \Doctrine\ORM\EntityRepository
{
    public function findOtherJobById($id)
    {
        $query = $this->createQueryBuilder('oj')
            ->select('oj.name')
            ->where('oj.id = ' .$id)
            ->getQuery();
        return $query->getSingleScalarResult();

    }

}