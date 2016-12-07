<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 05/12/16
 * Time: 17:48
 */

namespace HandissimoBundle\Repository;


use Doctrine\ORM\EntityRepository;

class NeedsRepository extends EntityRepository
{

    public function getByNeeds($keyword)
    {
        $query = $this->createQueryBuilder('n')
            ->select('n.needName')
            ->where('n.needName LIKE :needsData')
            ->setParameter('needsData', '%' . $keyword . '%')
            ->getQuery();
        return $query->getResult();

    }
}