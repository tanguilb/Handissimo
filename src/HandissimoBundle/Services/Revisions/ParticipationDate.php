<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 13/06/17
 * Time: 16:24
 */

namespace HandissimoBundle\Services\Revisions;


use Doctrine\ORM\EntityManager;
use HandissimoBundle\Entity\Participation;

class ParticipationDate
{

    public function searchUserParticipation($lastDate, $participation)
    {
        $array = array();
        $date = date('Y-m-d H:i:s');


        if($lastDate === null and $participation === null)
        {
            $participation = 1;

            array_push($array, $date, $participation);
        } elseif ($lastDate !== null )
        {
            $lastDateSec = strtotime($lastDate);
            $dateSec = strtotime($date);
            $diff = $dateSec - $lastDateSec;
            if ($diff < 48600 and $participation < 10)
            {
                $participation = $participation + 1;
                array_push($array, $lastDate, $participation);
            }
            if ($diff > 48600)
            {
                $participation = 1;
                array_push($array, $date, $participation);
            }


        }
        return $array;

    }

}