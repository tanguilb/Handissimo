<?php

/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 18/05/17
 * Time: 14:22
 */

namespace HandissimoBundle\Services\Search;

use Doctrine\ORM\EntityManager;

class SortSearch
{
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    public function sortSearchResult($result, $need, $disability, $structure)
    {
        $finalResult = array();
        foreach ($result as $results)
        {
            $value = 0;
            $orga = $this->em->getRepository('HandissimoBundle:Organizations')->find($results['id']);
            if ($need !== null)
            {
                if(!empty($orga->getNeeds()->getValues()))
                {
                    foreach($orga->getNeeds()->getValues() as $needs)
                    {
                        for($i = 0; $i < count($need); $i++)
                        {
                            if($needs->getNeedName() === $need[$i]->getNeedName())
                            {
                                $value ++;
                            }
                        }
                    }

                }
            }
            if ($disability !== null)
            {
                if(!empty($orga->getDisabilityTypes()->getValues()))
                {
                    foreach ($orga->getDisabilityTypes()->getValues() as $disabilities)
                    {
                        for ($i = 0 ; $i < count($disability); $i++ )
                        {
                            if($disabilities->getDisabilityName() === $disability[$i]->getDisabilityName())
                            {
                                $value ++;
                            }
                        }
                    }
                }
            }

            if ($structure !== null)
            {
                if ($orga->getOrgaStructure()->getName() === $structure->getName())
                {
                    $value++;
                }
            }
            $results['correspondance']=$value;
            array_push($finalResult, $results);

        }


        foreach ($finalResult as $key => $item) {
            if(isset($item['correspondance']))
            {
                $corr[$key] = $item['correspondance'];
            }
            if(isset($item['distance'])){
                $dist[$key] = $item['distance'];
            }
        }

        if(isset($corr) and isset($dist)){
            array_multisort($corr, SORT_DESC, $dist, SORT_ASC, $finalResult);
        } elseif(isset($corr) and !isset($dist))
        {
            array_multisort($corr, SORT_DESC, $finalResult);
        }
        return $finalResult;
    }

}