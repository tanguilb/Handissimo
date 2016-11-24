<?php

namespace HandissimoBundle\Repository;


use Doctrine\ORM\EntityRepository;

class DisabilityTypesRepository extends EntityRepository
{
    /*public function deleteLink ($object)
    {
        $conn = $this->_em->getConnection();
        $disId = $object->getId();

        $sql = "DELETE from disability_types_has_organizations where disability_types_id = $disId";
        $stmt = $conn->prepare($sql);

        $stmt->execute();
    }

    public function addLink ($object) {

        $conn = $this->_em->getConnection();
        $disId = $object->getId();

        foreach ($object->getOrganizations() as $organizations) {
            $orgId = $organizations->getId();
            $sql = "INSERT into disability_types_has_organizations (disability_types_id,organizations_id) VALUES ($orgId,$disId)";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        }
    }*/
}