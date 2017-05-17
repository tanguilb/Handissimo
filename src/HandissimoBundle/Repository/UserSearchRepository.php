<?php

namespace HandissimoBundle\Repository;

/**
 * UserSearchRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserSearchRepository extends \Doctrine\ORM\EntityRepository
{
    public function findUserSearches($location, $age, $need, $disabilities, $structures, $numberResult)
    {
        $qb = $this->createQueryBuilder('u');
        $qb->select('u.id', 'u.location', 'u.age', 'u.need', 'u.disability', 'u.structure', 'u.numberResult');

        if ($location !== null){
            $andmodule = $qb->expr()->andX();
            $andmodule->add($qb->expr()->eq('u.location', ':location'));
            $qb->andWhere($andmodule);
            $qb->setParameter('location', $location);
        }

        if ($age !== null){
            $andmodule = $qb->expr()->andX();
            $andmodule->add($qb->expr()->eq('u.age', ':age'));
            $qb->andWhere($andmodule);
            $qb->setParameter('age', $age);
        }

        if ($need !== null){
            $andmodule = $qb->expr()->andX();
            $andmodule->add($qb->expr()->eq('u.need', ':need'));
            $qb->andWhere($andmodule);
            $qb->setParameter('need', $need);
        }

        if ($disabilities !== null){
            $ormodule = $qb->expr()->andX();
            $ormodule->add($qb->expr()->eq('u.disability', ':disability'));
            $qb->andWhere($ormodule);
            $qb->setParameter('disability', $disabilities);
        }

        if ($structures !== null){
            $andmodule = $qb->expr()->andX();
            $andmodule->add($qb->expr()->eq('u.structure', ':structure'));
            $qb->andWhere($andmodule);
            $qb->setParameter('structure', $structures);
        }

        if ($numberResult !== null){
            $andmodule = $qb->expr()->andX();
            $andmodule->add($qb->expr()->eq('u.numberResult', ':numberResult'));
            $qb->andWhere($andmodule);
            $qb->setParameter('numberResult', $numberResult);
        }
        return $qb->getQuery()->getResult();
    }
}
