<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 12/06/17
 * Time: 10:00
 */

namespace HandissimoBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use HandissimoBundle\Entity\Organizations;

class StatisticsListener
{

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->getStatistics($entity);
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->getStatistics($entity);
    }

    public function getStatistics($entity)
    {
        if(!$entity instanceof Organizations)
        {
            return;
        }

        $disabilities = $entity->getDisabilityTypes()->getValues();
        $needs = $entity->getNeeds()->getValues();
        $secondNeeds = $entity->getSecondneeds()->getValues();
        $staff = $entity->getStafforganizations()->getValues();
        $socialStaff = $entity->getSocialstaffs()->getValues();
        $otherJob = $entity->getOtherjobs()->getValues();
        $es = $entity->getOpendaysYear();
        $es2 = $entity->getOpendays();
        $stat = 0;

        if ($entity->getAddress() !== null)
        {
            $stat += 3;
        }
        if ($entity->getPostal() !== null)
        {
            $stat += 3;
        }
        if ($entity->getCity() !== null)
        {
            $stat += 3;
        }
        if ($entity->getPhoneNumber() !== null)
        {
            $stat += 2;
        }
        if($entity->getMail() !== null)
        {
            $stat += 2;
        }
        if($entity->getWebsite() !== null)
        {
            $stat += 1;
        }
        if($entity->getFacebook() !== null)
        {
            $stat +=1;
        }
        if($entity->getFreeplace() !== null)
        {
            $stat += 1;
        }
        if($entity->getOrganizationDescription() !== null)
        {
            $stat += 5;
        }
        if ($entity->getOpenhours() !== null)
        {
            $stat += 1;
        }
        if (count($entity->getOpendays()) > 0)
        {
            $stat += 1;
        }
        if ($entity->getTeamMembersNumber() !== null)
        {
            $stat += 1;
        }
        if ($entity->getAgemini() !== null)
        {
            $stat += 4;
        }
        if ($entity->getAgemaxi() !== null)
        {
            $stat += 4;
        }
        if ($entity->getWorkingDescription() !== null)
        {
            $stat += 5;
        }
        if($entity->getDirectorName() !== null)
        {
            $stat += 2;
        }
        if($entity->getDayDescription() !== null)
        {
            $stat += 5;
        }
        if($entity->getTransport() !== null)
        {
            $stat += 1;
        }
        if ($entity->getReceptionDescription() !== null)
        {
            $stat += 5;
        }
        if($entity->getCost() !== null)
        {
            $stat += 2;
        }
        if($entity->getInscription() !== null)
        {
            $stat += 1;
        }
        if($entity->getInterventionZone() !== null)
        {
            $stat += 5;
        }
        if(count($entity->getOpendaysYear()) > 0)
        {
            $stat += 1;
        }
        if($entity->getCommentStaff() !== null)
        {
            $stat += 5;
        }
        if(count($disabilities) > 0)
        {
            $stat += 5;
        }
        if(count($needs) > 0)
        {
            $stat += 5;
        }
        if(count($secondNeeds) > 0)
        {
            $stat += 5;
        }
        if(count($staff) > 0)
        {
            $stat += 5;
        }
        if(count($socialStaff) > 0)
        {
            $stat += 5;
        }
        if(count($otherJob) > 0)
        {
            $stat += 5;
        }
        if($entity->getFirstPicture() !== null)
        {
            $stat += 1;
        }
        if($entity->getOrgaStructure() !== null)
        {
            $stat += 5;
        }

        $entity->setStatistic($stat);
    }

}