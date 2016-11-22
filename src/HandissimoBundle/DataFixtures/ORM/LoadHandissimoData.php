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
use HandissimoBundle\Entity\Pictures;
use HandissimoBundle\Entity\Society;
use HandissimoBundle\Entity\Staff;
use HandissimoBundle\Entity\StaffTypes;
use HandissimoBundle\Entity\StructuresTypes;
use HandissimoBundle\Form\StaffType;


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
        $need2->setNeedName('Need name 2');
        $manager->persist($need2);

        $need3 = new Needs();
        $need3->setNeedName('Need name 3');
        $manager->persist($need3);

        $need4 = new Needs();
        $need4->setNeedName('Need name 4');
        $manager->persist($need4);


        $society = new Society();
        $society->setSocietyName('nom de la societé');
        $society->setLogo('logo');
        $society->setAddress('45 av charles de gaules');
        $society->setPostal('69003');
        $society->setCity('lyon');
        $society->setPhoneNumber('02.01.09.56.54');
        $society->setMail('contact@society.com');
        $society->setSocietyTwitter('www.twitter.com');
        $society->setSocietyFacebook('www.facebook.com');
        $society->setWebsite('www.monsite.fr');
        $manager->persist($society);

        $society = new Society();
        $society->setSocietyName('nom de la societé');
        $society->setLogo('logo');
        $society->setAddress('45 av charles de gaules');
        $society->setPostal('69003');
        $society->setCity('lyon');
        $society->setPhoneNumber('02.01.09.56.54');
        $society->setMail('contact@society.com');
        $society->setSocietyTwitter('www.twitter.com');
        $society->setSocietyFacebook('www.facebook.com');
        $society->setWebsite('www.monsite.fr');
        $manager->persist($society);

        $society = new Society();
        $society->setSocietyName('nom de la societé');
        $society->setLogo('logo');
        $society->setAddress('45 av charles de gaules');
        $society->setPostal('69003');
        $society->setCity('lyon');
        $society->setPhoneNumber('02.01.09.56.54');
        $society->setMail('contact@society.com');
        $society->setSocietyTwitter('www.twitter.com');
        $society->setSocietyFacebook('www.facebook.com');
        $society->setWebsite('www.monsite.fr');
        $manager->persist($society);

        $society = new Society();
        $society->setSocietyName('nom de la societé');
        $society->setLogo('logo');
        $society->setAddress('45 av charles de gaules');
        $society->setPostal('69003');
        $society->setCity('lyon');
        $society->setPhoneNumber('02.01.09.56.54');
        $society->setMail('contact@society.com');
        $society->setSocietyTwitter('www.twitter.com');
        $society->setSocietyFacebook('www.facebook.com');
        $society->setWebsite('www.monsite.fr');
        $manager->persist($society);



        $staffType1 = new StaffTypes();
        $staffType1->setSecteur('staff type 1');
        $manager->persist($staffType1);

        $staffType2 = new StaffTypes();
        $staffType2->setSecteur('staff type 2');
        $manager->persist($staffType2);

        $staffType3 = new StaffTypes();
        $staffType3->setSecteur('staff type 3');
        $manager->persist($staffType3);

        $staffType4 = new StaffTypes();
        $staffType4->setSecteur('staff type 4');
        $manager->persist($staffType4);

        $structuretype1 = new StructuresTypes();
        $structuretype1->setStructuresType('structure type 1');
        $structuretype1->setLogoMdph('logo 1');
        $manager->persist($structuretype1);

        $structuretype2 = new StructuresTypes();
        $structuretype2->setStructuresType('structure type 2');
        $structuretype2->setLogoMdph('logo 2');
        $manager->persist($structuretype2);

        $structuretype3 = new StructuresTypes();
        $structuretype3->setStructuresType('structure type 3');
        $structuretype3->setLogoMdph('logo 3');
        $manager->persist($structuretype3);

        $structureType4 = new StructuresTypes();
        $structureType4->setStructuresType('structure type 4');
        $structureType4->setLogoMdph('logo 4');
        $manager->persist($structureType4);
        
        
        $manager->flush();
    }
}