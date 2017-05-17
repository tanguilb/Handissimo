<?php

namespace HandissimoBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Application\Sonata\UserBundle\Entity\User;
use HandissimoBundle\Entity\Organizations;

class OrganizationsRepository extends EntityRepository
{
    public function getNearBy($lat, $long, $age, $need, $disability, $structure)
    {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();
        $query->select('o.name');
        $query->addSelect('o.id', 'o.postal', 'o.address', 'o.phoneNumber', 'o.website', 'o.mail', 'o.city', 'o.facebook', 'o.twitter', 'o.latitude', 'o.longitude', 'o.firstPicture');
        $query->from('HandissimoBundle:Organizations', 'o');
        $query->leftJoin('o.needs', 'n');
        $query->leftJoin('o.disabilityTypes', 'dt');
        $query->leftJoin('o.orgaStructure', 'sl');
        $query->leftJoin('sl.type', 'st');
        $query->addSelect('st.picture as picture');

        if($lat !== null and $long !== null)
        {
            $query->addSelect('Geo(:lat, :long, o.latitude, o.longitude) as distance');
            $query->having('distance <= 10');
            $query->setParameter('lat', $lat);
            $query->setParameter('long', $long);
            $query->orderBy('distance');
        }
        if ($age !== null) {
            $andmodule = $query->expr()->andX();
            $andmodule->add($query->expr()->lte('o.agemini', ':age'));
            $andmodule->add($query->expr()->gte('o.agemaxi', ':age'));
            $query->andWhere($andmodule);
            $query->setParameter('age', $age);
        }
        if($need !== null){
            $ormodule = $query->expr()->andX();
            $ormodule->add($query->expr()->eq('n.needName', ':need'));
            $query->andWhere($ormodule);
            $query->setParameter('need', $need->getNeedName());
        }
        if ($disability !== null){
            if (count($disability) <= 1) {
                foreach ($disability as $value) {
                    if ($value !== null) {
                        $ormodule = $query->expr()->andX();
                        $ormodule->add($query->expr()->eq('dt.disabilityName', ':disability'));
                        $query->andWhere($ormodule);
                        $query->setParameter('disability', $value->getDisabilityName());
                    }
                }
            } else {
                foreach ($disability as $key => $value) {
                    if ($value !== null) {
                        $ormodule = $query->expr()->orX();
                        $ormodule->add($query->expr()->eq('dt.disabilityName', ':disability'.$key));
                        $query->orWhere($ormodule);
                        $query->setParameter('disability'.$key, $value->getDisabilityName());
                    }
                }
            }
        }
        if($structure !== null){
            if (count($structure) <= 1) {
                foreach ($structure as $value) {
                    if ($value !== null) {
                        $ormodule = $query->expr()->andX();
                        $ormodule->add($query->expr()->eq('sl.name', ':structure'));
                        $query->andWhere($ormodule);
                        $query->setParameter('structure', $value->getName());
                    }
                }
            } else {
                foreach ($structure as $key => $value) {
                    if ($value !== null) {
                        $ormodule = $query->expr()->orX();
                        $ormodule->add($query->expr()->eq('sl.name', ':structure'.$key));
                        $query->orWhere($ormodule);
                        $query->setParameter('structure'.$key, $value->getName());
                    }
                }
            }
        }
        $query->distinct();
        //echo $query->getQuery()->getSQL();die();
        return $query->getQuery()->getResult();
    }

    public function getByCity($postalcode)
    {
        $query = $this->createQueryBuilder('o')
            ->select('o.city')
            ->where('o.city LIKE :citydata')
            ->groupBy('o.city')
            ->setParameter('citydata',  '%' . $postalcode . '%')
            ->orderBy('o.postal')
            ->getQuery();
        return $query->getResult();
    }

    public function getByPostal($postalcode)
    {
        $query = $this->createQueryBuilder('o')
            ->select('o.postal')
            ->where('o.postal LIKE :postaldata')
            ->groupBy('o.postal')
            ->setParameter('postaldata',  '%' . $postalcode . '%')
            ->orderBy('o.postal')
            ->getQuery();
        return $query->getResult();
    }

    public function getByUser(User $user)
    {
        $query = $this->createQueryBuilder('o')
            ->join('o.userorg', 'u')
            ->where('u.id = ?1')
            ->setParameter(1, $user->getId())
            ->getQuery();
        return $query->getResult();
    }

    public function getByNonUser()
    {
        $query = $this->createQueryBuilder('o')
            ->where('o.userorg =' .null)
            ->getQuery();
        return $query->getResult();

    }

    public function getBrochuresById($id)
    {
        $query = $this->createQueryBuilder('o')
            ->select('o.brochures')
            ->where('o.id =' . $id)
            ->getQuery();
        return $query->getResult();
    }

    public function getLogoStructureById($id)
    {
        $query = $this->createQueryBuilder('o')
            ->select('o.structureLogo')
            ->where('o.id =' . $id)
            ->getQuery();
        return $query->getResult();
    }

    public function getLogoSocietyById($id)
    {
        $query = $this->createQueryBuilder('o')
            ->select('o.societyLogo')
            ->where('o.id =' . $id)
            ->getQuery();
        return $query->getResult();
    }

    public function getSearchProfile($profileSearch)
    {
        $qb = $this->createQueryBuilder('o')
            ->select('o.name', 'o.city')
            ->where('o.name like :data')
            ->setParameter(':data', '%' . $profileSearch . '%')
            ->setMaxResults(10)
            ->getQuery();
        return $qb->getResult();
    }


    public function getByOrganizationsProfile($data)
    {
        $qb = $this->createQueryBuilder('o')
            ->select('o')
            ->where('o.name like :organizationData')
            ->setParameter('organizationData', '%'. $data . '%')
            ->getQuery();
        return $qb->getResult();
    }

    public function getAllOrganizations()
    {
        $qb = $this->createQueryBuilder('o')
            ->select('count(o.id)')
            ->getQuery();
        return $qb->getSingleScalarResult();
    }

    public function getMediaByOrganizations($id)
    {
        $qb = $this->createQueryBuilder('o')
            ->join('o.media', 'm')
            ->select('m.fileName')
            ->addSelect('m.id')
            ->addSelect('m.thumbnails')
            ->where('m.organizationsImg =' . $id)
            ->getQuery();
        return $qb->getResult();
    }

    public function getEmailByOrganization($id)
    {
        $query = $this->createQueryBuilder('o')
            ->select('o.mail')
            ->where('o.id =' .$id)
            ->getQuery();
        return $query->getResult();
    }

    public function getFirstPictureByOrrganizations($limit)
    {
        $query = $this->createQueryBuilder('o')
            ->orderBy('o.id', 'DESC')
            ->setMaxResults($limit)
            ->getQuery();
        return $query->getResult();

    }

    public function getFirstPicture($id)
    {
        $query = $this->createQueryBuilder('o')
            ->where('o.id = ' .$id)
            ->getQuery();
        return $query->getSingleResult();
    }

    public function getByName($name, $city)
    {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();
        $query->select('o');
        $query->from('HandissimoBundle:Organizations', 'o');
        $query->where('o.name = ?1');
        $query->setParameter(1, $name);
        if ($city !== "null")
        {
            $ormodule = $query->expr()->andX();
            $ormodule->add($query->expr()->eq('o.city', ':city'));
            $query->andWhere($ormodule);
            $query->setParameter('city', $city);

        }
        return $query->getQuery()->getSingleResult();
    }

   /* public function sortByResult($id, $distance, $needs, $disability, $structure)
    {
        $query = $this->createQueryBuilder('o')
            ->leftJoin('o.needs', 'n')
            ->leftJoin('o.disabilityTypes', 'dt')
            ->leftJoin('o.orgaStructure', 'sl')
            ->addSelect()
    }*/


}