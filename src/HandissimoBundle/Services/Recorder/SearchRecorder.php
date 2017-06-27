<?php

namespace HandissimoBundle\Services\Recorder;

use Doctrine\ORM\EntityManager;
use HandissimoBundle\Entity\UserSearch;

class SearchRecorder
{
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function recordSearchUser($location, $age, $disability, $need, $structure, $numberResult)
    {
        /**
         * Method for saving user searches in database
         */
        $userSearch = new UserSearch();
        $disabilities="";
        if ($disability != null){
            for ($key = 0; $key < count($disability); $key++) {
                if (count($disability) == 0) {
                    $disabilities = $disability;
                }else{
                    $disabilities .= $disability[$key]." ";
                }
            }
        }

        $needs="";
        if ($need != null){
            for ($key = 0; $key < count($need); $key++) {
                if (count($need) == 0) {
                    $needs = $need;
                } else {
                    $needs .= $need[$key] . " ";
                }
            }
        }
        $test = $this->em->getRepository('HandissimoBundle:UserSearch')->findUserSearches($location, $age, $needs, $disabilities, $structure, $numberResult);
        for ($key =0;$key<count($test);$key++) {
            if (
                $location == $test[$key]['location'] &&
                $age == $test[$key]['age'] &&
                $disabilities == $test[$key]['disability'] &&
                $needs == $test[$key]['need'] &&
                $structure == $test[$key]['structure'] &&
                $numberResult == $test[$key]['numberResult']
            ) {
                $id = $test[$key]['id'];
                $updateCount = $this->em->getRepository('HandissimoBundle:UserSearch')->find($id);
                $count = $updateCount->getCountRepetition();
                $updateCount->setCountRepetition($count + 1);
                $this->em->persist($updateCount);
                $this->em->flush();
            }
        }
        if ($test == null ) {
            $userSearch->setLocation($location);
            $userSearch->setAge($age);
            $userSearch->setNeed($needs);
            $userSearch->setDisability($disabilities);
            $userSearch->setStructure($structure);
            $userSearch->setNumberResult($numberResult);
            $this->em->persist($userSearch);
            $this->em->flush();
        }
    }


}