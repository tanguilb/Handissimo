<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 14/12/16
 * Time: 17:48
 */

namespace HandissimoBundle\Controller;


use Doctrine\Common\Persistence\ObjectManager;
use HandissimoBundle\Entity\Organizations;
use HandissimoBundle\Repository\OrganizationsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AddressController extends Controller
{
    public function transformAction (Request $request/*, Organizations $organizations*/)
    {


        $geocoder = "https://maps.googleapis.com/maps/api/geocode/json?address=%s&key=AIzaSyAT1ybqTsqE0Nzit6xL7PfZWcgnLmThfXc";
        $em = $this->getDoctrine()->getManager();
        /**
         * @var $repository OrganizationsRepository
         */

        $addressElem = $em->getRepository('HandissimoBundle:Organizations')->getAdressElement();
        var_dump($addressElem);

        /* $em = $this->container->get('doctrine.orm.entity_manager');
         $organizations = new Organizations();


         foreach($organizations as $organization) {
             if(strlen($organization->getLatitude()) == 0 && strlen($organization->getLongitude()) == 0){

                 $addresse = $organization->getAddress();
                 $addresse .= $organization->getPostal();
                 $addresse .= $organization->getCity();

                 var_dump($addresse);
             }

         }*/


        foreach ($addressElem as $address) {
            $organisation = $em->getRepository('HandissimoBundle:Organizations')->find($address['id']);
            if (strlen($address['latitude']) == 0 && strlen($address['longitude']) == 0) {
                $addresse = $address['address'];
                $addresse .= ' ' . $address['postal'];
                $addresse .= ' ' . $address['city'];

                $query = sprintf($geocoder, urlencode($addresse));
                $result = json_decode(file_get_contents($query));
                $json = $result->results[0];


                $address['latitude'] = (float) $json->geometry->location->lat;
                $address['longitude'] = (float) $json->geometry->location->lng;



                $organisation->setLatitude($address['latitude']);
                $organisation->setLongitude($address['longitude']);




            }
            $em->persist($organisation);



        }

        $em->flush();


    }

}