<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 16/03/17
 * Time: 15:39
 */

namespace HandissimoBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use HandissimoBundle\Entity\Organizations;
use HandissimoBundle\Services\Geocode\Geocoder;


class GeocoderListener
{

    private $geocoder;

    public function __construct(Geocoder $geocoder)
    {
        $this->geocoder = $geocoder;

    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->geocodeAddress($entity);
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->geocodeAddress($entity);

    }

    private function geocodeAddress($entity)
    {
        if(!$entity instanceof Organizations)
        {
            return;
        }

        $address = $entity->getAddress();
        $address .= ' ' .$entity->getPostal();
        $address .= ' ' .$entity->getCity();

        $json = $this->geocoder->transformAddressGeocode($address);

        if($json == null)
        {
            $latitude = 0;
            $longitude = 0;

        }else {
        $latitude = (float) $json->geometry->location->lat;
        $longitude = (float) $json->geometry->location->lng;
        }
        $entity->setLatitude($latitude);
        $entity->setLongitude($longitude);
    }



}