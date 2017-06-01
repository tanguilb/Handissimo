<?php

/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 01/06/17
 * Time: 10:56
 */
namespace Application\Sonata\UserBundle\Repository;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    public function getOrganizationsByUser($id)
    {
        $query = $this->createQueryBuilder('uo')
            ->innerJoin('uo.organizationsUser', 'o')
            ->where('o.id =' .$id)
            ->getQuery();
        return $query->getResult();
    }

}