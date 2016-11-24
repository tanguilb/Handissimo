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
        $organizationAdmin->setName('college notre dame');
        $organizationAdmin->setAddress('3 rue guy degraine');
        $organizationAdmin->setPostal('69001');
        $organizationAdmin->setCity('lyon');
        $organizationAdmin->setPhoneNumber('04.74.86.26.99');
        $organizationAdmin->setMail('organization@gmail.com');
        $organizationAdmin->setWebsite('wwww.monsite.fr');
        $organizationAdmin->setBlog('www.monblog.fr');
        $organizationAdmin->setFacebook('www.facebook.com');
        $organizationAdmin->setTwitter('www.twitter.com');
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
        $organizationAdmin1->setName('hopital velpo');
        $organizationAdmin1->setAddress('3 rue paul santi');
        $organizationAdmin1->setPostal('69002');
        $organizationAdmin1->setCity('lyon');
        $organizationAdmin1->setPhoneNumber('04.78.45.26.41');
        $organizationAdmin1->setMail('organization@gmail.com');
        $organizationAdmin1->setWebsite('wwww.monsite.fr');
        $organizationAdmin1->setBlog('www.monblog.fr');
        $organizationAdmin1->setFacebook('www.facebook.com');
        $organizationAdmin1->setTwitter('www.twitter.com');
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
        $organizationAdmin2->setName('mdph');
        $organizationAdmin2->setAddress('3 rue paul santi');
        $organizationAdmin2->setPostal('69100');
        $organizationAdmin2->setCity('villeurbanne');
        $organizationAdmin2->setPhoneNumber('04.78.45.26.41');
        $organizationAdmin2->setMail('organization@gmail.com');
        $organizationAdmin2->setWebsite('wwww.monsite.fr');
        $organizationAdmin2->setBlog('www.monblog.fr');
        $organizationAdmin2->setFacebook('www.facebook.com');
        $organizationAdmin2->setTwitter('www.twitter.com');
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
        $society->setSocietyname('nom de la societé 1');
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

        $society1 = new Society();
        $society1->setSocietyname('nom de la societé 2');
        $society1->setLogo('logo');
        $society1->setAddress('45 av charles de gaules');
        $society1->setPostal('69003');
        $society1->setCity('lyon');
        $society1->setPhoneNumber('02.01.09.56.54');
        $society1->setMail('contact@society1.com');
        $society1->setSocietyTwitter('www.twitter.com');
        $society1->setSocietyFacebook('www.facebook.com');
        $society1->setWebsite('www.monsite.fr');
        $manager->persist($society1);

        $society2 = new Society();
        $society2->setSocietyname('nom de la societé 3');
        $society2->setLogo('logo');
        $society2->setAddress('45 av charles de gaules');
        $society2->setPostal('69003');
        $society2->setCity('lyon');
        $society2->setPhoneNumber('02.01.09.56.54');
        $society2->setMail('contact@society2.com');
        $society2->setSocietyTwitter('www.twitter.com');
        $society2->setSocietyFacebook('www.facebook.com');
        $society2->setWebsite('www.monsite.fr');
        $manager->persist($society2);

        $society3 = new Society();
        $society3->setSocietyname('nom de la societé 4');
        $society3->setLogo('logo');
        $society3->setAddress('45 av charles de gaules');
        $society3->setPostal('69003');
        $society3->setCity('lyon');
        $society3->setPhoneNumber('02.01.09.56.54');
        $society3->setMail('contact@society3.com');
        $society3->setSocietyTwitter('www.twitter.com');
        $society3->setSocietyFacebook('www.facebook.com');
        $society3->setWebsite('www.monsite.fr');
        $manager->persist($society3);



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
        $structuretype1->setStructurestype('structure type 1');
        $structuretype1->setLogoMdph('logo 1');
        $manager->persist($structuretype1);

        $structuretype2 = new StructuresTypes();
        $structuretype2->setStructurestype('structure type 2');
        $structuretype2->setLogoMdph('logo 2');
        $manager->persist($structuretype2);

        $structuretype3 = new StructuresTypes();
        $structuretype3->setStructurestype('structure type 3');
        $structuretype3->setLogoMdph('logo 3');
        $manager->persist($structuretype3);

        $structureType4 = new StructuresTypes();
        $structureType4->setStructurestype('structure type 4');
        $structureType4->setLogoMdph('logo 4');
        $manager->persist($structureType4);
        
        
        $manager->flush();
    }
}