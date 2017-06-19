<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 15/06/17
 * Time: 15:46
 */

namespace HandissimoBundle\Repository;


class StaffRepository extends \Doctrine\ORM\EntityRepository
{
    public function findMedicalStaffById($id)
    {
        $query = $this->createQueryBuilder('ms')
            ->select('ms.jobs')
            ->where('ms.id = ' .$id)
            ->getQuery();
        return $query->getSingleScalarResult();
    }

}