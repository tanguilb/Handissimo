<?php

namespace HandissimoBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Application\Sonata\UserBundle\Entity\User;

class OrganizationsRepository extends EntityRepository
{

   /* public function getByLocalisation()
    {
        $manager = $this->getEntityManager();
        $queryBuilder = $manager->createQueryBuilder();
        $queryBuilder
            ->select("id, ST_AsText(things.geometry) as geometry")
            ->from("geometryOfThings", "things")
            ->where(
                $queryBuilder->expr()->eq(
                    sprintf("ST_Intersects(things.geometry, ST_SetSRID(ST_GeomFromGeoJSON('%s'), 4326))", $geoJsonPolygon),
                    $queryBuilder->expr()->literal(true)
                )
            );
        return $queryBuilder->getQuery()->getResult();
    }*/
    public function getNearBy( $minLat, $minLong, $maxLat, $maxLong, $age, $need, $disability, $structure)
    {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();
        $query->select('o');
        $query->from('HandissimoBundle:Organizations', 'o');
        $query->leftJoin('o.needs', 'n');
        $query->leftJoin('o.disabilityTypes', 'dt');
        $query->leftJoin('o.orgaStructure', 'sl');

        if($minLat !== null and $maxLat !== null and $maxLong !== null and $minLong !== null)
        {
            $andmodule = $query->expr()->andX();
            $andmodule->add($query->expr()->gte('o.latitude', ':minLat'));
            $query->setParameter('minLat', $minLat);
            $andmodule->add($query->expr()->lte ('o.latitude', ':maxLat'));
            $query->setParameter('maxLat', $maxLat);

            $query->andWhere($andmodule);
            // $query->setParameters(array('minLat' => $minLat, 'maxLat' => $maxLat));
            $andmoduleBis = $query->expr()->andX();
            $andmoduleBis->add($query->expr()->gte('o.longitude', ':minLong'));
            $query->setParameter('minLong', $minLong);
            $andmoduleBis->add($query->expr()->lte('o.longitude', ':maxLong'));
            $query->setParameter('maxLong', $maxLong);

            $query->andWhere($andmoduleBis);
            $query->orderBy('o.latitude');
        }
       // $query->setParameters(array('minLong' => $minLong, 'maxLong' => $maxLong));
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

        return $query->getQuery()->getResult();
           /* $query = $this->createQueryBuilder('o')
                ->select('o')
                ->from('HandissimoBundle:Organizations', 'o')
                ->where('o.latitude > :minLat')
                ->andWhere('o.latitude < :maxLat')
                ->andWhere('o.longitude > :minLong')
                ->andWhere('o.longitude < : maxLong')
                ->setParameters(array('minLat' => $minLat, 'maxLat' => $maxLat, 'minLong' => $minLong, 'maxLong' => $maxLong))
                ->orderBy($lat + $long, 'ASC')
                ->getQuery();
            return $query->getResult();

           public static function getNearby($lat, $lng, $type = 'cities', $limit = 50, $distance = 50, $unit = 'km')
{
    // radius of earth; @note: the earth is not perfectly spherical, but this is considered the 'mean radius'
    if ($unit == 'km') $radius = 6371.009; // in kilometers
    elseif ($unit == 'mi') $radius = 3958.761; // in miles

    // latitude boundaries
    $maxLat = (float) $lat + rad2deg($distance / $radius);
    $minLat = (float) $lat - rad2deg($distance / $radius);

    // longitude boundaries (longitude gets smaller when latitude increases)
    $maxLng = (float) $lng + rad2deg($distance / $radius / cos(deg2rad((float) $lat)));
    $minLng = (float) $lng - rad2deg($distance / $radius / cos(deg2rad((float) $lat)));

    // get results ordered by distance (approx)
    $nearby = (array) FrontendDB::getDB()->retrieve('SELECT *
                                                    FROM cities
                                                    WHERE lat > ? AND lat < ? AND lng > ? AND lng < ?
                                                    ORDER BY ABS(lat - ?) + ABS(lng - ?) ASC
                                                    LIMIT ?;',
                                                    array($minLat, $maxLat, $minLng, $maxLng, (float) $lat, (float) $lng, (int) $limit));

    return $nearby;*/

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
            $query->orWhere($andmodule);
            $query->setParameter('age', $age);
        }
        if($need !== null){
            $ormodule = $query->expr()->orX();
            $ormodule->add($query->expr()->eq('n.needName', ':need'));
            $query->orWhere($ormodule);
            $query->setParameter('need', $need);

        }
        if($disability !== null){
            $ormodule = $query->expr()->orX();
            $ormodule->add($query->expr()->eq('dt.disabilityName', ':disability'));
            $query->orWhere($ormodule);
            $query->setParameter('disability', $disability);

        }
        if($structure !== null){
            $ormodule = $query->expr()->orX();
            $ormodule->add($query->expr()->eq('sl.name', ':structure'));
            $query->orWhere($ormodule);
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