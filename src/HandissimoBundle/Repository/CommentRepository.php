<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 22/05/17
 * Time: 14:36
 */

namespace HandissimoBundle\Repository;


use Doctrine\ORM\EntityRepository;

class CommentRepository extends EntityRepository
{
    public function getCommentsByUser($user)
    {
        $qb = $this->createQueryBuilder('c')
            ->select('c')
            ->where('c.author = :user')
            ->setParameter('user', $user)
            ->orderBy('c.parutionDate', 'DESC')
            ->getQuery();
        return $qb->getResult();
    }
}