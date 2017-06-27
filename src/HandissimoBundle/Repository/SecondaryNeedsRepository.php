<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 15/06/17
 * Time: 15:36
 */

namespace HandissimoBundle\Repository;


class SecondaryNeedsRepository extends \Doctrine\ORM\EntityRepository
{
    public function findSecondNeedsById($id)
    {
        $query = $this->createQueryBuilder('sn')
            ->select('sn.needName')
            ->where('sn.id = ' .$id )
            ->getQuery();
        return $query->getSingleScalarResult();
    }
}