<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 13/06/17
 * Time: 16:24
 */

namespace HandissimoBundle\Services\Revisions;


use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ParticipationDate
{
    protected $em;
    protected $container;

    public function __construct(EntityManager $em, ContainerInterface $container)
    {
        $this->em = $em;
        $this->container = $container;
    }

    public function searchUserParticipation()
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $userGrade = $user->getGrade();
        $lastDate = $user->getLastDate();
        $participation = $user->getParticipation();
        $date = date('Y-m-d H:i:s');
        $lastDateSec = strtotime($lastDate);
        $dateSec = strtotime($date);
        $diff = $dateSec - $lastDateSec;
        $array = array();

        if($userGrade === 'Novice'){
            $nbParticipation = 20;
        } elseif ($userGrade === 'Confirmé'){
            $nbParticipation = 50;
        } elseif ($userGrade === 'Expert'){
            $nbParticipation = 500;
        } else {
            $nbParticipation = 10;
        }
        if($lastDate === null and $participation === null)
        {
            $participation = 1;

            array_push($array, $date, $participation);
        } elseif ($lastDate !== null ) {
            if ($diff < 48600){
                if($participation < $nbParticipation){
                    $participation = $participation + 1;
                    array_push($array, $lastDate, $participation);
                }
            } elseif($diff > 48600)
            {
                $participation = 1;
                array_push($array, $date, $participation);
            }
        }
        return $array;
    }

}