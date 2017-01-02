-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: localhost    Database: handissimo
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `acl_classes`
--

DROP TABLE IF EXISTS `acl_classes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl_classes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class_type` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_69DD750638A36066` (`class_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_classes`
--

LOCK TABLES `acl_classes` WRITE;
/*!40000 ALTER TABLE `acl_classes` DISABLE KEYS */;
/*!40000 ALTER TABLE `acl_classes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acl_entries`
--

DROP TABLE IF EXISTS `acl_entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl_entries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class_id` int(10) unsigned NOT NULL,
  `object_identity_id` int(10) unsigned DEFAULT NULL,
  `security_identity_id` int(10) unsigned NOT NULL,
  `field_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ace_order` smallint(5) unsigned NOT NULL,
  `mask` int(11) NOT NULL,
  `granting` tinyint(1) NOT NULL,
  `granting_strategy` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `audit_success` tinyint(1) NOT NULL,
  `audit_failure` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_46C8B806EA000B103D9AB4A64DEF17BCE4289BF4` (`class_id`,`object_identity_id`,`field_name`,`ace_order`),
  KEY `IDX_46C8B806EA000B103D9AB4A6DF9183C9` (`class_id`,`object_identity_id`,`security_identity_id`),
  KEY `IDX_46C8B806EA000B10` (`class_id`),
  KEY `IDX_46C8B8063D9AB4A6` (`object_identity_id`),
  KEY `IDX_46C8B806DF9183C9` (`security_identity_id`),
  CONSTRAINT `FK_46C8B8063D9AB4A6` FOREIGN KEY (`object_identity_id`) REFERENCES `acl_object_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_46C8B806DF9183C9` FOREIGN KEY (`security_identity_id`) REFERENCES `acl_security_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_46C8B806EA000B10` FOREIGN KEY (`class_id`) REFERENCES `acl_classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_entries`
--

LOCK TABLES `acl_entries` WRITE;
/*!40000 ALTER TABLE `acl_entries` DISABLE KEYS */;
/*!40000 ALTER TABLE `acl_entries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acl_object_identities`
--

DROP TABLE IF EXISTS `acl_object_identities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl_object_identities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_object_identity_id` int(10) unsigned DEFAULT NULL,
  `class_id` int(10) unsigned NOT NULL,
  `object_identifier` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `entries_inheriting` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_9407E5494B12AD6EA000B10` (`object_identifier`,`class_id`),
  KEY `IDX_9407E54977FA751A` (`parent_object_identity_id`),
  CONSTRAINT `FK_9407E54977FA751A` FOREIGN KEY (`parent_object_identity_id`) REFERENCES `acl_object_identities` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_object_identities`
--

LOCK TABLES `acl_object_identities` WRITE;
/*!40000 ALTER TABLE `acl_object_identities` DISABLE KEYS */;
/*!40000 ALTER TABLE `acl_object_identities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acl_object_identity_ancestors`
--

DROP TABLE IF EXISTS `acl_object_identity_ancestors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl_object_identity_ancestors` (
  `object_identity_id` int(10) unsigned NOT NULL,
  `ancestor_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`object_identity_id`,`ancestor_id`),
  KEY `IDX_825DE2993D9AB4A6` (`object_identity_id`),
  KEY `IDX_825DE299C671CEA1` (`ancestor_id`),
  CONSTRAINT `FK_825DE2993D9AB4A6` FOREIGN KEY (`object_identity_id`) REFERENCES `acl_object_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_825DE299C671CEA1` FOREIGN KEY (`ancestor_id`) REFERENCES `acl_object_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_object_identity_ancestors`
--

LOCK TABLES `acl_object_identity_ancestors` WRITE;
/*!40000 ALTER TABLE `acl_object_identity_ancestors` DISABLE KEYS */;
/*!40000 ALTER TABLE `acl_object_identity_ancestors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acl_security_identities`
--

DROP TABLE IF EXISTS `acl_security_identities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl_security_identities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `identifier` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `username` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8835EE78772E836AF85E0677` (`identifier`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_security_identities`
--

LOCK TABLES `acl_security_identities` WRITE;
/*!40000 ALTER TABLE `acl_security_identities` DISABLE KEYS */;
/*!40000 ALTER TABLE `acl_security_identities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disability_types`
--

DROP TABLE IF EXISTS `disability_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disability_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `disability_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disability_types`
--

LOCK TABLES `disability_types` WRITE;
/*!40000 ALTER TABLE `disability_types` DISABLE KEYS */;
INSERT INTO `disability_types` VALUES (1,'Troubles des apprentissages / retard scolaire'),(2,'Troubles dys, dyslexie, troubles du langage, dyspraxie, dysphasie, hyperactivité (TDAH)'),(3,'Troubles du comportement'),(4,'Déficience intellectuelle, retard mental'),(5,'Autisme, TED'),(6,'Handicap moteur, Infirmité motrice cérébrale (IMC)'),(7,'Handicap psychique'),(8,'Epilepsie'),(10,'Polyhandicap'),(11,'Accidentés de la vie, traumas crâniens, cérébrolésés, AVC'),(12,'Maladies dégénératives, Parkinson, Alzheimer, Sclérose en plaques'),(13,'Surdité / malentendant/ déficience auditive'),(14,'Malvoyant / aveugle / cécité'),(15,'essai');
/*!40000 ALTER TABLE `disability_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disability_types_has_organizations`
--

DROP TABLE IF EXISTS `disability_types_has_organizations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disability_types_has_organizations` (
  `organizations_id` int(11) NOT NULL,
  `disability_types_id` int(11) NOT NULL,
  PRIMARY KEY (`organizations_id`,`disability_types_id`),
  KEY `IDX_2AED979886288A55` (`organizations_id`),
  KEY `IDX_2AED9798C7E5B70` (`disability_types_id`),
  CONSTRAINT `FK_2AED979886288A55` FOREIGN KEY (`organizations_id`) REFERENCES `organizations` (`id`),
  CONSTRAINT `FK_2AED9798C7E5B70` FOREIGN KEY (`disability_types_id`) REFERENCES `disability_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disability_types_has_organizations`
--

LOCK TABLES `disability_types_has_organizations` WRITE;
/*!40000 ALTER TABLE `disability_types_has_organizations` DISABLE KEYS */;
INSERT INTO `disability_types_has_organizations` VALUES (1,1),(1,5),(2,11),(3,1),(4,4),(4,7),(5,2),(6,3),(7,4),(8,5),(9,5),(10,3),(11,6);
/*!40000 ALTER TABLE `disability_types_has_organizations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fos_group`
--

DROP TABLE IF EXISTS `fos_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fos_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_4B019DDB5E237E06` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fos_group`
--

LOCK TABLES `fos_group` WRITE;
/*!40000 ALTER TABLE `fos_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `fos_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fos_user`
--

DROP TABLE IF EXISTS `fos_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `date_of_birth` datetime DEFAULT NULL,
  `firstname` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `biography` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_uid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `twitter_uid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `gplus_uid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gplus_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gplus_data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `two_step_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fos_user`
--

LOCK TABLES `fos_user` WRITE;
/*!40000 ALTER TABLE `fos_user` DISABLE KEYS */;
INSERT INTO `fos_user` VALUES (2,'dev','dev','tangui8@hotmail.com','tangui8@hotmail.com',1,'o2l1ljx5ahw4w48ggscs4o88gcwgo0k','5mqNcAZTMhZ7nnjW9Qxt5gkICLvPCqUyazPvrviW838sNQnAVZc+keLIC16CmB1CHRAMZz5BAjQ9zGK7qSi7vQ==','2016-12-20 09:44:54',0,0,NULL,NULL,NULL,'a:4:{i:0;s:10:\"ROLE_ADMIN\";i:1;s:22:\"ROLE_ALLOWED_TO_SWITCH\";i:2;s:16:\"ROLE_SUPER_ADMIN\";i:3;s:11:\"ROLE_EDITOR\";}',0,NULL,'2016-12-15 11:49:54','2016-12-20 09:44:54',NULL,'Tangui','Le Bourdonnec',NULL,NULL,'m',NULL,NULL,NULL,NULL,NULL,'null',NULL,NULL,'null',NULL,NULL,'null',NULL,NULL);
/*!40000 ALTER TABLE `fos_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fos_user_user_group`
--

DROP TABLE IF EXISTS `fos_user_user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fos_user_user_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `IDX_B3C77447A76ED395` (`user_id`),
  KEY `IDX_B3C77447FE54D947` (`group_id`),
  CONSTRAINT `FK_B3C77447A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_B3C77447FE54D947` FOREIGN KEY (`group_id`) REFERENCES `fos_group` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fos_user_user_group`
--

LOCK TABLES `fos_user_user_group` WRITE;
/*!40000 ALTER TABLE `fos_user_user_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `fos_user_user_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `needs`
--

DROP TABLE IF EXISTS `needs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `needs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `need_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `needs`
--

LOCK TABLES `needs` WRITE;
/*!40000 ALTER TABLE `needs` DISABLE KEYS */;
INSERT INTO `needs` VALUES (1,'Crèche, accueil petite enfance, garderie'),(2,'Soutien à la scolarité'),(3,'Scolarisation adaptée'),(4,'Accompagnement pour devenir plus autonome'),(5,'Aide pour la socialisation / l’insertion sociale / l’insertion professionnelle'),(6,'Soutien à la vie quotidienne (se lever, manger, se laver, sortir, gérer ses papiers, …) / aide à domicile'),(7,'Hébergement / lieu de vie / internat'),(8,'Accueil de jour / institut de jour'),(9,'Soins'),(10,'Travail adapté / ESAT / accompagnement à l’emploi'),(11,'Aide aux aidants/ soutien parental / répit'),(12,'Rencontre entre familles / réseau / associations de parents ou de personnes handicapées'),(13,'Week-end / vacances'),(14,'Loisirs adaptés / bien-être'),(15,'Internat');
/*!40000 ALTER TABLE `needs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `needs_has_organizations`
--

DROP TABLE IF EXISTS `needs_has_organizations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `needs_has_organizations` (
  `organizations_id` int(11) NOT NULL,
  `needs_id` int(11) NOT NULL,
  PRIMARY KEY (`organizations_id`,`needs_id`),
  KEY `IDX_8EE48C7686288A55` (`organizations_id`),
  KEY `IDX_8EE48C76ADCC5296` (`needs_id`),
  CONSTRAINT `FK_8EE48C7686288A55` FOREIGN KEY (`organizations_id`) REFERENCES `organizations` (`id`),
  CONSTRAINT `FK_8EE48C76ADCC5296` FOREIGN KEY (`needs_id`) REFERENCES `needs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `needs_has_organizations`
--

LOCK TABLES `needs_has_organizations` WRITE;
/*!40000 ALTER TABLE `needs_has_organizations` DISABLE KEYS */;
INSERT INTO `needs_has_organizations` VALUES (1,3),(2,12),(3,11),(4,4),(5,3),(6,5),(7,3),(8,2),(9,3),(10,5),(11,7);
/*!40000 ALTER TABLE `needs_has_organizations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organizations`
--

DROP TABLE IF EXISTS `organizations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `structurestypes_id` int(11) DEFAULT NULL,
  `pictures_id` int(11) DEFAULT NULL,
  `societies_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blog` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `freeplace` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `organization_description` text COLLATE utf8_unicode_ci NOT NULL,
  `serve_description` text COLLATE utf8_unicode_ci,
  `openhours` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `opendays` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `team_members_number` int(11) DEFAULT NULL,
  `team_description` text COLLATE utf8_unicode_ci,
  `update_datetime` datetime DEFAULT NULL,
  `working_description` text COLLATE utf8_unicode_ci,
  `school` tinyint(1) DEFAULT NULL,
  `school_description` text COLLATE utf8_unicode_ci,
  `activities` text COLLATE utf8_unicode_ci,
  `place_description` text COLLATE utf8_unicode_ci,
  `doc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profil_picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `agemini` int(11) DEFAULT NULL,
  `agemaxi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_427C1C7FBB72E0AA` (`structurestypes_id`),
  KEY `IDX_427C1C7FBC415685` (`pictures_id`),
  KEY `IDX_427C1C7F3FB29001` (`societies_id`),
  CONSTRAINT `FK_427C1C7F3FB29001` FOREIGN KEY (`societies_id`) REFERENCES `society` (`id`),
  CONSTRAINT `FK_427C1C7FBB72E0AA` FOREIGN KEY (`structurestypes_id`) REFERENCES `structures_types` (`id`),
  CONSTRAINT `FK_427C1C7FBC415685` FOREIGN KEY (`pictures_id`) REFERENCES `pictures` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organizations`
--

LOCK TABLES `organizations` WRITE;
/*!40000 ALTER TABLE `organizations` DISABLE KEYS */;
INSERT INTO `organizations` VALUES (1,1,NULL,1,'Test','17 rue Delandine','69003','Lyon',45.7462776,4.8268312,'05-05-05-05-05','aa@bb.com','bb.com','cc.com','ggg','jjjj','56','gqjj','jskqtj','10-14','jkddh',88,'azzehh',NULL,'miudd',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,1,NULL,1,'college fou fou','13 rue dumenge','69004','Lyon',45.7768548,4.8343287,'0236569587','fou@gmail.com',NULL,NULL,NULL,NULL,NULL,'fdsfds',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,13,NULL,1,'bzzzzz','12 rue du mail','69004','Lyon',45.7769988,4.8332256,'0235649856','bzz@gmail.com',NULL,NULL,NULL,NULL,NULL,'fdsffds',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,1,NULL,2,'les ninja club','13 rue de nuit','69004','Lyon',45.7779946,4.8340773,'0236359845','ninja@gmail.com',NULL,NULL,NULL,NULL,NULL,'dsgsdgsgsd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,1,NULL,1,'essat','18 rue de dunkerque','75010','Paris',48.8807625,2.3551264,'fsfdsd','fdsfsdgds','sf',NULL,NULL,NULL,NULL,'fdsfdsg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,1,NULL,1,'test','20 rue des pyrénées','75020','Paris',48.8492262,2.4065908,'0650322445','tangui8@hotmail.com',NULL,NULL,NULL,NULL,NULL,'fdsdggfdsfsdg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,1,NULL,1,'essai 3','25 rue des pyrénées','75020','Paris',48.8491022,2.4059383,'0687302514','essai@gmail.com',NULL,NULL,NULL,NULL,NULL,'fdsgsdgsggs',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,1,NULL,1,'esssai 4','4 avenue général leclerc','69160','Tassin la demi Lune',45.7622513,4.7784157,'0526354569','essai4@gmail.com',NULL,NULL,NULL,NULL,NULL,'fdsddsgdsgs',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,1,NULL,1,'autre test','74 rue bossuet','69006','Lyon',45.7678107,4.8517982,'05 65452536','test@gmail.com',NULL,NULL,NULL,NULL,NULL,'fdsgsg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,1,NULL,1,'test sonata','15 rue dumenge','69004','Lyon',45.7767431,4.8347131,'0562356585','dev@gmail.com',NULL,NULL,NULL,NULL,NULL,'fsdfdsd','fdss',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,1,NULL,1,'faketest','18 rue dumenge','69004','Lyon',45.7766282,4.8352459,'0652569656','elize@gmail.com',NULL,NULL,NULL,NULL,NULL,'fsdsf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `organizations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organizations_has_staff`
--

DROP TABLE IF EXISTS `organizations_has_staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organizations_has_staff` (
  `organizations_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  PRIMARY KEY (`organizations_id`,`staff_id`),
  KEY `IDX_91A6CDCE86288A55` (`organizations_id`),
  KEY `IDX_91A6CDCED4D57CD` (`staff_id`),
  CONSTRAINT `FK_91A6CDCE86288A55` FOREIGN KEY (`organizations_id`) REFERENCES `organizations` (`id`),
  CONSTRAINT `FK_91A6CDCED4D57CD` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organizations_has_staff`
--

LOCK TABLES `organizations_has_staff` WRITE;
/*!40000 ALTER TABLE `organizations_has_staff` DISABLE KEYS */;
INSERT INTO `organizations_has_staff` VALUES (1,3),(2,28),(3,3),(4,1),(4,16),(4,34),(5,2),(6,4),(7,5),(8,5),(9,4),(10,6),(11,2);
/*!40000 ALTER TABLE `organizations_has_staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `picture_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pictures`
--

LOCK TABLES `pictures` WRITE;
/*!40000 ALTER TABLE `pictures` DISABLE KEYS */;
/*!40000 ALTER TABLE `pictures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `society`
--

DROP TABLE IF EXISTS `society`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `society` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `societyname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `society_twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `society_facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `society`
--

LOCK TABLES `society` WRITE;
/*!40000 ALTER TABLE `society` DISABLE KEYS */;
INSERT INTO `society` VALUES (1,'Gestionnaire1','yryyy','56 rue test','66666','Test','1234567890','ddd','jjjj','fff','yyyy'),(2,'Gestiionnaire 2',NULL,'56 rue de la gestion','69005','Lyon','0236596584','gest@gmail.com','gest@twitter','gest@facebook','gest.com');
/*!40000 ALTER TABLE `society` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stafftypes_id` int(11) DEFAULT NULL,
  `jobs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `others` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_426EF392A64CC59C` (`stafftypes_id`),
  CONSTRAINT `FK_426EF392A64CC59C` FOREIGN KEY (`stafftypes_id`) REFERENCES `staff_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (1,1,'Aides soignantes',NULL),(2,1,'Auxiliaire puéricultrice',NULL),(3,1,'Avéjiste',NULL),(4,1,'Diététicien',NULL),(5,1,'Infirmier',NULL),(6,1,'infirmier coordonateur',NULL),(7,1,'Instructeur en locomotion',NULL),(8,1,'kinésithérapeute',NULL),(9,1,'médecin',NULL),(10,1,'médecin de rééducation',NULL),(11,1,'médecin psychiatre',NULL),(12,1,'neuropsychologue',NULL),(13,1,'orthophoniste',NULL),(14,1,'ortho-prothésiste',NULL),(15,1,'orthoptiste',NULL),(16,1,'pédiatre',NULL),(17,1,'pédicure-podologue',NULL),(18,1,'pédo-psychiatre',NULL),(19,1,'podo-orthéstites',NULL),(20,1,'psychologue',NULL),(21,1,'psychomotricien',NULL),(22,1,'puéricultrice',NULL),(23,2,'Aide médico-psychologique',NULL),(24,2,'animateur socio-culturel',NULL),(25,2,'assistante de service social',NULL),(26,2,'auxilaire de vie scolaire',NULL),(27,2,'auxiliaire de vie',NULL),(28,2,'auxiliaire de vie sociale',NULL),(29,2,'coach',NULL),(30,2,'conseiller du travail',NULL),(31,2,'conseiller en économie sociale et familiale',NULL),(32,2,'documentaliste',NULL),(33,2,'éducateur/moniteur éducateur',NULL),(34,2,'éducateur jeunes enfant',NULL),(35,2,'éducateur sportif en APA',NULL),(36,2,'educateur technique spécialisé',NULL),(37,2,'enseignant',NULL),(38,2,'Formateur',NULL),(39,1,'pedopsychiatre',NULL);
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_types`
--

DROP TABLE IF EXISTS `staff_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secteur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_types`
--

LOCK TABLES `staff_types` WRITE;
/*!40000 ALTER TABLE `staff_types` DISABLE KEYS */;
INSERT INTO `staff_types` VALUES (1,'Personnel de soins'),(2,'Personnel éducatif et social');
/*!40000 ALTER TABLE `staff_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `structures_types`
--

DROP TABLE IF EXISTS `structures_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `structures_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `structurestype` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo_mdph` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `structures_types`
--

LOCK TABLES `structures_types` WRITE;
/*!40000 ALTER TABLE `structures_types` DISABLE KEYS */;
INSERT INTO `structures_types` VALUES (1,'Institut de réadaptation / préorientation',NULL),(2,'Centre Rééducation Professionnelle (C.R.P)',NULL),(3,'Etablissement et Service d\'Aide par le Travail (E.S.A.T.)',NULL),(4,'Etablissement expérimental',NULL),(5,'Institut Médico-Educatif (I.M.E.), Institut d’éducation motrice (I.E.M), Institut médico-pédagogique (I.M.P), Institut médico professionnel (IMpro)',NULL),(6,'Établissement pour polyhandicapés',NULL),(7,'Foyer d\'Accueil Médicalisé (F.A.M.)',NULL),(8,'Foyer de Vie pour Handicapés',NULL),(9,'Foyer d’hébergement pour Handicapés',NULL),(10,'Institut pour déficients auditifs',NULL),(11,'Institut pour personnes aveugles',NULL),(12,'Institut Thérapeutique Éducatif et Pédagogique (I.T.E.P.)',NULL),(13,'Maison d\'Accueil Spécialisée (M.A.S.)',NULL),(14,'Service d‘accompagnement à la Vie Sociale (S.A.V.S.)',NULL),(15,'Service d\'accompagnement médico-social pour adultes handicapés (S.A.M.S.A.H)',NULL),(16,'Service d\'Éducation Spéciale et de Soins à Domicile (S.E.S.S.A.D)',NULL),(17,'Associations de parents',NULL),(18,'Crèches / garderies',NULL),(19,'Ecoles',NULL),(20,'Service d\'aide à domicile',NULL),(21,'Espace Dynamique et d\'Insertion EDI',NULL);
/*!40000 ALTER TABLE `structures_types` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-02  9:44:18
