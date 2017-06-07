<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 07/06/17
 * Time: 14:22
 */

namespace HandissimoBundle\Services\Audit;


use Doctrine\ORM\EntityManager;

class AuditRelation
{
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function extractionOfRelation($results,$entity)
    {
        $research = $this->em->getRepository($entity);
        $array=[];
        if (!empty($results)){
            foreach ($results as $resultId){
                $result = $research->find($resultId);
                array_push($array, $result);
            }
        }
        return $array;
    }

}