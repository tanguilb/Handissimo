<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 16/03/17
 * Time: 15:16
 */

namespace HandissimoBundle\Services\Geocode;


class Geocoder
{
    public function transformAddressGeocode($address)
    {
        $geocoder = "https://maps.googleapis.com/maps/api/geocode/json?address=%s&key=AIzaSyAT1ybqTsqE0Nzit6xL7PfZWcgnLmThfXc";
        $query = sprintf($geocoder, urlencode($address));
        $result = json_decode(file_get_contents($query));
        if ($result->results == null)
        {
            return $json = null;
        }
            $json = $result->results[0];

            return $json;



    }
}