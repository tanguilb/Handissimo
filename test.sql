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
-- Table structure for table `disability_types`
--

DROP TABLE IF EXISTS `disability_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disability_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `disability_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disability_types`
--

LOCK TABLES `disability_types` WRITE;
/*!40000 ALTER TABLE `disability_types` DISABLE KEYS */;
INSERT INTO `disability_types` VALUES (1,'Troubles des apprentissages / retard scolaire'),(2,'Troubles dys, dyslexie, troubles du langage, dyspraxie, dysphasie, hyperactivité (TDAH)'),(3,'Troubles du comportement'),(4,'Déficience intellectuelle, retard mental'),(5,'Autisme, TED'),(6,'Handicap moteur, Infirmité motrice cérébrale (IMC)'),(7,'Handicap psychique'),(8,'Epilepsie'),(10,'Polyhandicap'),(11,'Accidentés de la vie, traumas crâniens, cérébrolésés, AVC'),(12,'Maladies dégénératives, Parkinson, Alzheimer, Sclérose en plaques'),(13,'Surdité / malentendant/ déficience auditive'),(14,'Malvoyant / aveugle / cécité');
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
INSERT INTO `disability_types_has_organizations` VALUES (2,2),(2,3),(2,6),(3,12),(4,14);
/*!40000 ALTER TABLE `disability_types_has_organizations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fos_user`
--

DROP TABLE IF EXISTS `fos_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fos_user`
--

LOCK TABLES `fos_user` WRITE;
/*!40000 ALTER TABLE `fos_user` DISABLE KEYS */;
INSERT INTO `fos_user` VALUES (1,'dev','dev','aaaaaa@mm.com','aaaaaa@mm.com',1,NULL,'$2y$13$DRleXVVIyCSgxna9Tmtf3.WrBhFUJTkkoKIas9Q3Q4dMMd8WK7zjK','2016-12-12 16:13:45',NULL,NULL,'a:1:{i:0;s:10:\"ROLE_ADMIN\";}');
/*!40000 ALTER TABLE `fos_user` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `needs`
--

LOCK TABLES `needs` WRITE;
/*!40000 ALTER TABLE `needs` DISABLE KEYS */;
INSERT INTO `needs` VALUES (1,'Crèche, accueil petite enfance, garderie'),(2,'Soutien à la scolarité'),(3,'Scolarisation adaptée'),(4,'Accompagnement pour devenir plus autonome'),(5,'Aide pour la socialisation / l’insertion sociale / l’insertion professionnelle'),(6,'Soutien à la vie quotidienne (se lever, manger, se laver, sortir, gérer ses papiers, …) / aide à domicile'),(7,'Hébergement / lieu de vie / internat'),(8,'Accueil de jour / institut de jour'),(9,'Soins'),(10,'Travail adapté / ESAT / accompagnement à l’emploi'),(11,'Aide aux aidants/ soutien parental / répit'),(12,'Rencontre entre familles / réseau / associations de parents ou de personnes handicapées'),(13,'Week-end / vacances'),(14,'Loisirs adaptés / bien-être');
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
INSERT INTO `needs_has_organizations` VALUES (2,3),(2,8),(3,6),(3,7),(3,8),(4,13);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organizations`
--

LOCK TABLES `organizations` WRITE;
/*!40000 ALTER TABLE `organizations` DISABLE KEYS */;
INSERT INTO `organizations` VALUES (2,6,NULL,1,'test1','56ssssssss','89875','dddddddddd',NULL,NULL,'fffff','hhhhhhhhhhh','jjjjjjjjjj','eeeeeee','yyyyyyyy','oooooooooooo','45','tttttttttttt','uuuuuuuuuuuuu','tiiiiiiiiiii','zzzzzzzzzzzz',0,'iiiiiiiiiiiiiiiii',NULL,'ppppppppppp',1,'rppppppppppppppp',NULL,NULL,NULL,NULL,10,30),(3,7,NULL,1,'test23','89ouhofhf','321456','dddddddddd',NULL,NULL,'hhFH','fjkhkshsks','hkskhkk','tkhjlflfl','lljljf','qhsssssshsyhs','89',',,,,,,,,,,,,,,,,,,,,','b,sgnwjb,bnsgn',',hs,h,hskk','kkhskhljlljdl',0,'ljljljlll',NULL,'lllmmmmdg',1,'kkdkhllnljljl',NULL,NULL,NULL,NULL,40,60),(4,18,NULL,1,'rahhhhhhhhh','heoughOG','69000','HQFH',NULL,NULL,'lhkophjm','kjhpsmjhpjmh',NULL,NULL,NULL,NULL,NULL,'ldkhj','gjwhghhhh',NULL,NULL,42,'jjgjgjjjjj',NULL,'jfvj<<<j<',1,'fwbfhnj',NULL,NULL,NULL,NULL,50,80);
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
INSERT INTO `organizations_has_staff` VALUES (2,4),(2,5),(2,35),(3,5),(3,7),(3,10),(4,4),(4,38);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `society`
--

LOCK TABLES `society` WRITE;
/*!40000 ALTER TABLE `society` DISABLE KEYS */;
INSERT INTO `society` VALUES (1,'Gestionnaire1','yryyy','56 rue test','66666','Test','1234567890','ddd','jjjj','fff','yyyy');
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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (1,1,'Aides soignantes',NULL),(2,1,'Auxiliaire puéricultrice',NULL),(3,1,'Avéjiste',NULL),(4,1,'Diététicien',NULL),(5,1,'Infirmier',NULL),(6,1,'infirmier coordonateur',NULL),(7,1,'Instructeur en locomotion',NULL),(8,1,'kinésithérapeute',NULL),(9,1,'médecin',NULL),(10,1,'médecin de rééducation',NULL),(11,1,'médecin psychiatre',NULL),(12,1,'neuropsychologue',NULL),(13,1,'orthophoniste',NULL),(14,1,'ortho-prothésiste',NULL),(15,1,'orthoptiste',NULL),(16,1,'pédiatre',NULL),(17,1,'pédicure-podologue',NULL),(18,1,'pédo-psychiatre',NULL),(19,1,'podo-orthéstites',NULL),(20,1,'psychologue',NULL),(21,1,'psychomotricien',NULL),(22,1,'puéricultrice',NULL),(23,2,'Aide médico-psychologique',NULL),(24,2,'animateur socio-culturel',NULL),(25,2,'assistante de service social',NULL),(26,2,'auxilaire de vie scolaire',NULL),(27,2,'auxiliaire de vie',NULL),(28,2,'auxiliaire de vie sociale',NULL),(29,2,'coach',NULL),(30,2,'conseiller du travail',NULL),(31,2,'conseiller en économie sociale et familiale',NULL),(32,2,'documentaliste',NULL),(33,2,'éducateur/moniteur éducateur',NULL),(34,2,'éducateur jeunes enfant',NULL),(35,2,'éducateur sportif en APA',NULL),(36,2,'educateur technique spécialisé',NULL),(37,2,'enseignant',NULL),(38,2,'Formateur',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `structures_types`
--

LOCK TABLES `structures_types` WRITE;
/*!40000 ALTER TABLE `structures_types` DISABLE KEYS */;
INSERT INTO `structures_types` VALUES (1,'Institut de réadaptation / préorientation',NULL),(2,'Centre Rééducation Professionnelle (C.R.P)',NULL),(3,'Etablissement et Service d\'Aide par le Travail (E.S.A.T.)',NULL),(4,'Etablissement expérimental',NULL),(5,'Institut Médico-Educatif (I.M.E.), Institut d’éducation motrice (I.E.M), Institut médico-pédagogique (I.M.P), Institut médico professionnel (IMpro)',NULL),(6,'Établissement pour polyhandicapés',NULL),(7,'Foyer d\'Accueil Médicalisé (F.A.M.)',NULL),(8,'Foyer de Vie pour Handicapés',NULL),(9,'Foyer d’hébergement pour Handicapés',NULL),(10,'Institut pour déficients auditifs',NULL),(11,'Institut pour personnes aveugles',NULL),(12,'Institut Thérapeutique Éducatif et Pédagogique (I.T.E.P.)',NULL),(13,'Maison d\'Accueil Spécialisée (M.A.S.)',NULL),(14,'Service d‘accompagnement à la Vie Sociale (S.A.V.S.)',NULL),(15,'Service d\'accompagnement médico-social pour adultes handicapés (S.A.M.S.A.H)',NULL),(16,'Service d\'Éducation Spéciale et de Soins à Domicile (S.E.S.S.A.D)',NULL),(17,'Associations de parents',NULL),(18,'Crèches / garderies',NULL),(19,'Ecoles',NULL),(20,'Service d\'aide à domicile',NULL);
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

-- Dump completed on 2016-12-13  9:47:22
