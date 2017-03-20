<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 05/12/16
 * Time: 17:50
 */

namespace HandissimoBundle\Repository;


use Doctrine\ORM\EntityRepository;

class StructuresTypesRepository extends EntityRepository
{
    /*public function getByStructure($keyword)
    {
        $query = $this->createQueryBuilder('s')
            ->select('s.structurestype')
            ->where('s.structurestype LIKE :structureData')
            ->setParameter('structureData', '%' . $keyword . '%')
            ->getQuery();
        return $query->getResult();

    }*/

}