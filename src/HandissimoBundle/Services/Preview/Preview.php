<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 15/06/17
 * Time: 14:23
 */

namespace HandissimoBundle\Services\Preview;


use Doctrine\ORM\EntityManager;

class Preview
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function findCheckboxValues($values)
    {
        $structureName = [];
        $arrayDisabilityValue = [];
        $arrayNeedsValues = [];
        $arraySecondNeedsValue = [];
        $arrayMedicalStaffValue = [];
        $arraySocialStaff = [];
        $arrayOtherStaffValue = [];

        if($values['structure'] !== "")
        {
            $structureId = $values['structure'];
            $structureName = $this->em->getRepository('HandissimoBundle:StructuresList')->getStrucureById($structureId);
        }
        if($values['disabilitytypes'] !== ""){
        $disabilities = explode(',' ,$values['disabilitytypes']);
            foreach($disabilities as $disability)
            {
                $result = $this->em->getRepository('HandissimoBundle:DisabilityTypes')->getDisability($disability);
                array_push($arrayDisabilityValue, $result);
            }
        }

        if($values['needs'] !== ""){
            $needs = explode(',', $values['needs']);
            foreach ($needs as $need)
            {
                $result = $this->em->getRepository('HandissimoBundle:Needs')->getNeedsById($need);
                array_push($arrayNeedsValues, $result);
            }
        }

        if($values['secondNeeds'] !== "")
        {
            $secondNeeds = explode(',', $values['secondNeeds']);
            foreach ($secondNeeds as $secondNeed)
            {
                $result = $this->em->getRepository('HandissimoBundle:SecondaryNeeds')->findSecondNeedsById($secondNeed);
                array_push($arraySecondNeedsValue, $result);
            }
        }

        if($values['stafforganizations'] !== "")
        {
            $medicalStaff = explode(',', $values['stafforganizations']);
            foreach ($medicalStaff as $medical)
            {
                $result = $this->em->getRepository('HandissimoBundle:Staff')->findMedicalStaffById($medical);
                array_push($arrayMedicalStaffValue, $result);
            }
        }

        if($values['socialstaffs'] !== "")
        {
            $socialStaff = explode(',', $values['socialstaffs']);
            foreach ($socialStaff as $social)
            {
                $result = $this->em->getRepository('HandissimoBundle:SocialStaff')->findSocialStaffById($social);
                array_push($arraySocialStaff, $result);
            }
        }

        if($values['otherjobs'] !== "")
        {
            $otherStaff = explode(',', $values['otherjobs']);
            foreach ($otherStaff as $other)
            {
                $result = $this->em->getRepository('HandissimoBundle:OtherJob')->findOtherJobById($other);
                array_push($arrayOtherStaffValue, $result);
            }

        }

        $arrayValues = [
            'structure' => $structureName,
            'disability' => $arrayDisabilityValue,
            'needs' => $arrayNeedsValues,
            'secondNeeds' => $arraySecondNeedsValue,
            'medicalStaff' => $arrayMedicalStaffValue,
            'socialStaff' => $arraySocialStaff,
            'otherStaff' => $arrayOtherStaffValue
        ];

        return $arrayValues;
    }

}