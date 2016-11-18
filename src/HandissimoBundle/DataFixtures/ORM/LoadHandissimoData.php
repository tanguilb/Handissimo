<?php
/**
 * Created by PhpStorm.
 * User: gianni
 * Date: 18/11/16
 * Time: 10:18
 */
namespace HandissimoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use HandissimoBundle\Entity\Handissimo;

class LoadData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $userAdmin = new User();
        $userAdmin->setUsername('admin');
        $userAdmin->setPassword('test');

        $manager->persist($userAdmin);
        $manager->flush();
    }
}