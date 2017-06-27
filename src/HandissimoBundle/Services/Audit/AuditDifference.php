<?php

/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 06/06/17
 * Time: 09:31
 */

namespace HandissimoBundle\Services\Audit;

use Doctrine\ORM\EntityManager;

class AuditDifference
{
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function differenceBetweenOrganizations($diff, $entity)
    {
        $differenceOld = $diff['old'];
        $differenceNew = $diff['new'];
        $differenceSame = $diff['same'];
        $diffSame = array();
        $diffOld = array();
        $diffNew = array();
        $resultArray = array();
        $result = $this->em->getRepository($entity);

        if (!empty($differenceOld))
        {
            foreach ($differenceOld as $diffO)
            {
                $differenceO = $result->find($diffO);
                array_push($diffOld, $differenceO);
            }
        }
        if (!empty($differenceNew))
        {
            foreach ($differenceNew as $diffN)
            {
                $differenceN = $result->find($diffN);
                array_push($diffNew, $differenceN);
            }
        }
        if(!empty($differenceSame))
        {
            foreach ($differenceSame as $diffS)
            {
                $differenceS = $result->find($diffS);
                array_push($diffSame, $differenceS);
            }
        }
        $resultArray['new'] = $diffNew;
        $resultArray['old'] = $diffOld;
        $resultArray['same'] = $diffSame;
        return $resultArray;
    }
}