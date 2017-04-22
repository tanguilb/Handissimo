<?php

namespace HandissimoBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Application\Sonata\UserBundle\Entity\User;
use HandissimoBundle\Entity\Organizations;
use HandissimoBundle\Entity\Needs;


class OrganizationsRepository extends EntityRepository
{

    public function getNearBy($lat, $long, $age, $need, $disability, $structure)
    {

        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();
        $query->select('o');
        $query->from('HandissimoBundle:Organizations', 'o');
        $query->leftJoin('o.needs', 'n');
        $query->leftJoin('o.disabilityTypes', 'dt');
        $query->leftJoin('o.orgaStructure', 'sl');
        if($lat !== null and $long !== null)
        {
        $query->addSelect('Geo(:lat, :long, o.latitude, o.longitude) as distance');
        $query->having('distance <= 10');
        $query->setParameter('lat', $lat);
        $query->setParameter('long', $long);
        $query->orderBy('distance');
        }
       // echo $query->getQuery()->getSQL();;die();


        if ($age !== null) {
            $andmodule = $query->expr()->andX();
            $andmodule->add($query->expr()->lte('o.agemini', ':age'));
            $andmodule->add($query->expr()->gte('o.agemaxi', ':age'));
            $query->andWhere($andmodule);
            $query->setParameter('age', $age);
        }
        if($need !== null){

            $ormodule = $query->expr()->orX();
            $ormodule->add($query->expr()->eq('n.needName', ':need'));
            $query->orWhere($ormodule);
            $query->setParameter('need', $need->getNeedName());


        }
        if($disability !== null){
            $ormodule = $query->expr()->orX();
            $ormodule->add($query->expr()->eq('dt.disabilityName', ':disability'));
            $query->orWhere($ormodule);
            $query->setParameter('disability', $disability->getDisabilityName());

        }
        if($structure !== null){
            $ormodule = $query->expr()->orX();
            $ormodule->add($query->expr()->eq('sl.name', ':structure'));
            $query->orWhere($ormodule);
            $query->setParameter('structure', $structure->getName());
        }
        //echo $query->getQuery()->getSQL();;die();
        $query->distinct();

        return $query->getQuery()->getResult();

    }

    public function getByFilters($result, $needs)
    {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();
        $query->select('o');
        $query->from('HandissimoBundle:Organizations', 'o');
        $query->leftJoin('o.needs', 'n');
        $query->where('o.id = :id');
        $query->setParameter('id', $result);
        $query->andWhere('n.needName = :need');
        $query->setParameter('need', $needs);
        return $query->getQuery()->getResult();

    }

    public function getBySearchEngine($location, $age, $need, $disability, $structure)
    {
        $em =$this->getEntityManager();
        $query = $em->createQueryBuilder();
        $query->select('o');
        $query->from('HandissimoBundle:Organizations', 'o', 'o.postal');
        $query->leftJoin('o.needs', 'n');
        $query->leftJoin('o.disabilityTypes', 'dt');
        $query->leftJoin('o.orgaStructure', 'sl');

        if($location !== null){
            $ormodule = $query->expr()->orX();
            $ormodule->add($query->expr()->eq('o.postal', ':location'));
            $query->having($query->expr()->gte('o.postal', ':location'));
            $query->where($ormodule);
            $query->setParameter('location', $location);


        }
        if ($age !== null) {
            $andmodule = $query->expr()->andX();
            $andmodule->add($query->expr()->lte('o.agemini', ':age'));
            $andmodule->add($query->expr()->gte('o.agemaxi', ':age'));
            $query->andWhere($andmodule);
            $query->setParameter('age', $age);
        }
        if($need !== null){
            $ormodule = $query->expr()->orX();
            $ormodule->add($query->expr()->eq('n.needName', ':need'));
            $query->andWhere($ormodule);
            $query->setParameter('need', $need);

        }
        if($disability !== null){
            $ormodule = $query->expr()->orX();
            $ormodule->add($query->expr()->eq('dt.disabilityName', ':disability'));
            $query->andWhere($ormodule);
            $query->setParameter('disability', $disability);

        }
        if($structure !== null){
            $ormodule = $query->expr()->orX();
            $ormodule->add($query->expr()->eq('sl.name', ':structure'));
            $query->andWhere($ormodule);
            $query->setParameter('structure', $structure);
        }


        //echo $query->getQuery()->getSQL();;die();
        return $query->getQuery()->getResult();
    }



    public function getByOrganizations($keyword)
    {
        $query = $this->createQueryBuilder('o')
                ->select('o.name')
                ->where('o.name LIKE :organizationData')
                ->setParameter('organizationData', '%' . $keyword . '%')
                ->getQuery();
        return $query->getResult();
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

    public function getByAge($data)
    {
        $data = "%" . $data . "%";
        $qb = $this->createQueryBuilder('o')
            ->select('o')
            ->where("o.agemaxi > :data")
            ->andWhere("o.agemini < :data")
            ->andWhere('o.agemini < :data < o.agemaxi')
            ->setParameter('data', $data)
            ->getQuery();
        return $qb->getResult();
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

    public function getEmailByOrganization($id)
    {
        $query = $this->createQueryBuilder('o')
            ->select('o.mail')
            ->where('o.id =' .$id)
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
            ->select('o.name')
            ->where('o.name like :data')
            ->setParameter(':data', '%' . $profileSearch . '%')
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
}