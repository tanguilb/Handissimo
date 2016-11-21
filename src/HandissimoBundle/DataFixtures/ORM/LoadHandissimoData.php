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
use HandissimoBundle\Entity\DisabilityTypes;
use HandissimoBundle\Entity\Needs;
use HandissimoBundle\Entity\Organizations;

class LoadData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $organizationAdmin = new Organizations();
        //$organizationAdmin->setStructuretypesId('');
        //$organizationAdmin->setPictureId('');
        //$organizationAdmin->setOrganizationId('');
        $organizationAdmin->setOrganizationName('college fou fou fou');
        $organizationAdmin->setAdress('3 rue guy degraine');
        $organizationAdmin->setPostal('69001');
        $organizationAdmin->setCity('lyon');
        $organizationAdmin->setOrganizationPhoneNumber('04.74.86.26.99');
        $organizationAdmin->setOrganizationMail('organization@gmail.com');
        $organizationAdmin->setOrganizationWebsite('wwww.monsite.fr');
        $organizationAdmin->setOrganizationBlog('www.monblog.fr');
        $organizationAdmin->setOrganizationFacebook('www.facebook.com');
        $organizationAdmin->setOrganizationTwitter('www.twitter.com');
        $organizationAdmin->setAgegroup('6-18 ans');
        $organizationAdmin->setFreeplace('5');
        $organizationAdmin->setOrganizationDescription('Ici la description de mon organisation');
        $organizationAdmin->setServeDescription('Information complémentaires');
        $organizationAdmin->setOpenhours('8h-12h et 14h-18h');
        $organizationAdmin->setOpendays('Lundi au vendredi');
        $organizationAdmin->setTeamMembersNumber('8');
        $organizationAdmin->setTeamDescription('Les equipes sont composé de ...');
        //$organizationAdmin->setUpdateDatetime(2000-12-30 12:30:50);
        $organizationAdmin->setWorkingDescription('working description');
        $organizationAdmin->setSchool(1);
        $organizationAdmin->setSchoolDescription('Nous travaillons sur tel ou tel chose');
        $organizationAdmin->setActivities('Les activités pratiquées sont : ....');
        $organizationAdmin->setPlaceDescription('Info sur le lieu');
        $organizationAdmin->setDoc('documentation a telecharger');
        $organizationAdmin->setProfilPicture('image de profil');
        $manager->persist($organizationAdmin);
        

        $organizationAdmin1 = new Organizations();
        //$organizationAdmin1->setStructuretypesId('');
        //$organizationAdmin1->setPictureId('');
        //$organizationAdmin1->setOrganizationId('');
        $organizationAdmin1->setOrganizationName('hopital velpo');
        $organizationAdmin1->setAdress('3 rue paul santi');
        $organizationAdmin1->setPostal('69002');
        $organizationAdmin1->setCity('lyon');
        $organizationAdmin1->setOrganizationPhoneNumber('04.78.45.26.41');
        $organizationAdmin1->setOrganizationMail('organization@gmail.com');
        $organizationAdmin1->setOrganizationWebsite('wwww.monsite.fr');
        $organizationAdmin1->setOrganizationBlog('www.monblog.fr');
        $organizationAdmin1->setOrganizationFacebook('www.facebook.com');
        $organizationAdmin1->setOrganizationTwitter('www.twitter.com');
        $organizationAdmin1->setAgegroup('6-18 ans');
        $organizationAdmin1->setFreeplace('5');
        $organizationAdmin1->setOrganizationDescription('Ici la description de mon organisation');
        $organizationAdmin1->setServeDescription('Information complémentaires');
        $organizationAdmin1->setOpenhours('8h-12h et 14h-18h');
        $organizationAdmin1->setOpendays('Lundi au vendredi');
        $organizationAdmin1->setTeamMembersNumber('8');
        $organizationAdmin1->setTeamDescription('Les equipes sont composé de ...');
        //$organizationAdmin1->setUpdateDatetime(2000-12-30 12:30:50);
        $organizationAdmin1->setWorkingDescription('working description');
        $organizationAdmin1->setSchool(1);
        $organizationAdmin1->setSchoolDescription('Nous travaillons sur tel ou tel chose');
        $organizationAdmin1->setActivities('Les activités pratiquées sont : ....');
        $organizationAdmin1->setPlaceDescription('Info sur le lieu');
        $organizationAdmin1->setDoc('documentation a telecharger');
        $organizationAdmin1->setProfilPicture('image de profil');
        $manager->persist($organizationAdmin1);


        $organizationAdmin2 = new Organizations();
        //$organizationAdmin2->setStructuretypesId('');
        //$organizationAdmin2->setPictureId('');
        //$organizationAdmin2->setOrganizationId('');
        $organizationAdmin2->setOrganizationName('mdph');
        $organizationAdmin2->setAdress('3 rue paul santi');
        $organizationAdmin2->setPostal('69100');
        $organizationAdmin2->setCity('villeurbanne');
        $organizationAdmin2->setOrganizationPhoneNumber('04.78.45.26.41');
        $organizationAdmin2->setOrganizationMail('organization@gmail.com');
        $organizationAdmin2->setOrganizationWebsite('wwww.monsite.fr');
        $organizationAdmin2->setOrganizationBlog('www.monblog.fr');
        $organizationAdmin2->setOrganizationFacebook('www.facebook.com');
        $organizationAdmin2->setOrganizationTwitter('www.twitter.com');
        $organizationAdmin2->setAgegroup('6-18 ans');
        $organizationAdmin2->setFreeplace('5');
        $organizationAdmin2->setOrganizationDescription('Ici la description de mon organisation');
        $organizationAdmin2->setServeDescription('Information complémentaires');
        $organizationAdmin2->setOpenhours('8h-12h et 14h-18h');
        $organizationAdmin2->setOpendays('Lundi au vendredi');
        $organizationAdmin2->setTeamMembersNumber('8');
        $organizationAdmin2->setTeamDescription('Les equipes sont composé de ...');
        //$organizationAdmin2->setUpdateDatetime(2000-12-30 12:30:50);
        $organizationAdmin2->setWorkingDescription('working description');
        $organizationAdmin2->setSchool(1);
        $organizationAdmin2->setSchoolDescription('Nous travaillons sur tel ou tel chose');
        $organizationAdmin2->setActivities('Les activités pratiquées sont : ....');
        $organizationAdmin2->setPlaceDescription('Info sur le lieu');
        $organizationAdmin2->setDoc('documentation a telecharger');
        $organizationAdmin2->setProfilPicture('image de profil');
        $manager->persist($organizationAdmin2);

        $disability1 = new DisabilityTypes();
        $disability1->setDisabilityName('Disability1');
        $manager->persist($disability1);

        $disability2 = new DisabilityTypes();
        $disability2->setDisabilityName('Disability2');
        $manager->persist($disability2);

        $disability3 = new DisabilityTypes();
        $disability3->setDisabilityName('Disability3');
        $manager->persist($disability3);

        $need1 = new Needs();
        $need1->setNeedName('Need name 1');
        $manager->persist($need1);

        $need2 = new Needs();
        $need2->setNeedName('Need name 1');
        $manager->persist($need2);

        $need3 = new Needs();
        $need3->setNeedName('Need name 1');
        $manager->persist($need3);

        $need4 = new Needs();
        $need4->setNeedName('Need name 1');
        $manager->persist($need4);

        $manager->flush();
    }
}