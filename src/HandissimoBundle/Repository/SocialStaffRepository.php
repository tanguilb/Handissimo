<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 15/06/17
 * Time: 15:53
 */

namespace HandissimoBundle\Repository;


class SocialStaffRepository extends \Doctrine\ORM\EntityRepository
{
    public function findSocialStaffById($id)
    {
        $query = $this->createQueryBuilder('so')
            ->select('so.socialJobs')
            ->where('so.id = ' .$id)
            ->getQuery();
        return $query->getSingleScalarResult();
    }
}