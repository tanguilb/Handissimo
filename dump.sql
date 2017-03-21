-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: handissimo
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_classes`
--

LOCK TABLES `acl_classes` WRITE;
/*!40000 ALTER TABLE `acl_classes` DISABLE KEYS */;
INSERT INTO `acl_classes` VALUES (10,'Application\\Sonata\\UserBundle\\Admin\\Model\\GroupAdmin'),(9,'Application\\Sonata\\UserBundle\\Admin\\Model\\UserAdmin'),(21,'Application\\Sonata\\UserBundle\\Entity\\Group'),(20,'Application\\Sonata\\UserBundle\\Entity\\User'),(2,'HandissimoBundle\\Admin\\DisabilityTypesAdmin'),(7,'HandissimoBundle\\Admin\\NeedsAdmin'),(8,'HandissimoBundle\\Admin\\OpinionAdmin'),(1,'HandissimoBundle\\Admin\\OrganizationsAdmin'),(3,'HandissimoBundle\\Admin\\SocietyAdmin'),(5,'HandissimoBundle\\Admin\\StaffAdmin'),(6,'HandissimoBundle\\Admin\\StaffTypesAdmin'),(4,'HandissimoBundle\\Admin\\StructuresTypesAdmin'),(14,'HandissimoBundle\\Entity\\DisabilityTypes'),(22,'HandissimoBundle\\Entity\\Group'),(19,'HandissimoBundle\\Entity\\Needs'),(13,'HandissimoBundle\\Entity\\Organizations'),(15,'HandissimoBundle\\Entity\\Society'),(17,'HandissimoBundle\\Entity\\Staff'),(18,'HandissimoBundle\\Entity\\StaffTypes'),(16,'HandissimoBundle\\Entity\\StructuresTypes'),(12,'Sonata\\UserBundle\\Admin\\Entity\\GroupAdmin'),(11,'Sonata\\UserBundle\\Admin\\Entity\\UserAdmin');
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
) ENGINE=InnoDB AUTO_INCREMENT=282 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_entries`
--

LOCK TABLES `acl_entries` WRITE;
/*!40000 ALTER TABLE `acl_entries` DISABLE KEYS */;
INSERT INTO `acl_entries` VALUES (1,1,NULL,1,NULL,0,64,1,'all',0,0),(2,1,NULL,2,NULL,1,8224,1,'all',0,0),(3,1,NULL,3,NULL,2,4098,1,'all',0,0),(4,1,NULL,4,NULL,3,4096,1,'all',0,0),(5,2,NULL,5,NULL,0,64,1,'all',0,0),(6,2,NULL,6,NULL,1,8224,1,'all',0,0),(7,2,NULL,7,NULL,2,4098,1,'all',0,0),(8,2,NULL,8,NULL,3,4096,1,'all',0,0),(9,3,NULL,9,NULL,0,64,1,'all',0,0),(10,3,NULL,10,NULL,1,8224,1,'all',0,0),(11,3,NULL,11,NULL,2,4098,1,'all',0,0),(12,3,NULL,12,NULL,3,4096,1,'all',0,0),(13,4,NULL,13,NULL,0,64,1,'all',0,0),(14,4,NULL,14,NULL,1,8224,1,'all',0,0),(15,4,NULL,15,NULL,2,4098,1,'all',0,0),(16,4,NULL,16,NULL,3,4096,1,'all',0,0),(17,5,NULL,17,NULL,0,64,1,'all',0,0),(18,5,NULL,18,NULL,1,8224,1,'all',0,0),(19,5,NULL,19,NULL,2,4098,1,'all',0,0),(20,5,NULL,20,NULL,3,4096,1,'all',0,0),(21,6,NULL,21,NULL,0,64,1,'all',0,0),(22,6,NULL,22,NULL,1,8224,1,'all',0,0),(23,6,NULL,23,NULL,2,4098,1,'all',0,0),(24,6,NULL,24,NULL,3,4096,1,'all',0,0),(25,7,NULL,25,NULL,0,64,1,'all',0,0),(26,7,NULL,26,NULL,1,8224,1,'all',0,0),(27,7,NULL,27,NULL,2,4098,1,'all',0,0),(28,7,NULL,28,NULL,3,4096,1,'all',0,0),(29,8,NULL,29,NULL,0,64,1,'all',0,0),(30,8,NULL,30,NULL,1,8224,1,'all',0,0),(31,8,NULL,31,NULL,2,4098,1,'all',0,0),(32,8,NULL,32,NULL,3,4096,1,'all',0,0),(33,9,NULL,33,NULL,0,64,1,'all',0,0),(34,9,NULL,34,NULL,1,8224,1,'all',0,0),(35,9,NULL,35,NULL,2,4098,1,'all',0,0),(36,9,NULL,36,NULL,3,4096,1,'all',0,0),(37,10,NULL,37,NULL,0,64,1,'all',0,0),(38,10,NULL,38,NULL,1,8224,1,'all',0,0),(39,10,NULL,39,NULL,2,4098,1,'all',0,0),(40,10,NULL,40,NULL,3,4096,1,'all',0,0),(41,11,NULL,41,NULL,0,64,1,'all',0,0),(42,11,NULL,42,NULL,1,8224,1,'all',0,0),(43,11,NULL,43,NULL,2,4098,1,'all',0,0),(44,11,NULL,44,NULL,3,4096,1,'all',0,0),(45,12,NULL,45,NULL,0,64,1,'all',0,0),(46,12,NULL,46,NULL,1,8224,1,'all',0,0),(47,12,NULL,47,NULL,2,4098,1,'all',0,0),(48,12,NULL,48,NULL,3,4096,1,'all',0,0),(49,13,NULL,1,NULL,0,64,1,'all',0,0),(50,13,NULL,2,NULL,1,32,1,'all',0,0),(51,13,NULL,3,NULL,2,4,1,'all',0,0),(52,13,NULL,4,NULL,3,1,1,'all',0,0),(53,14,NULL,5,NULL,0,64,1,'all',0,0),(54,14,NULL,6,NULL,1,32,1,'all',0,0),(55,14,NULL,7,NULL,2,4,1,'all',0,0),(56,14,NULL,8,NULL,3,1,1,'all',0,0),(57,15,NULL,9,NULL,0,64,1,'all',0,0),(58,15,NULL,10,NULL,1,32,1,'all',0,0),(59,15,NULL,11,NULL,2,4,1,'all',0,0),(60,15,NULL,12,NULL,3,1,1,'all',0,0),(61,16,NULL,13,NULL,0,64,1,'all',0,0),(62,16,NULL,14,NULL,1,32,1,'all',0,0),(63,16,NULL,15,NULL,2,4,1,'all',0,0),(64,16,NULL,16,NULL,3,1,1,'all',0,0),(65,17,NULL,17,NULL,0,64,1,'all',0,0),(66,17,NULL,18,NULL,1,32,1,'all',0,0),(67,17,NULL,19,NULL,2,4,1,'all',0,0),(68,17,NULL,20,NULL,3,1,1,'all',0,0),(69,18,NULL,21,NULL,0,64,1,'all',0,0),(70,18,NULL,22,NULL,1,32,1,'all',0,0),(71,18,NULL,23,NULL,2,4,1,'all',0,0),(72,18,NULL,24,NULL,3,1,1,'all',0,0),(73,19,NULL,25,NULL,0,64,1,'all',0,0),(74,19,NULL,26,NULL,1,32,1,'all',0,0),(75,19,NULL,27,NULL,2,4,1,'all',0,0),(76,19,NULL,28,NULL,3,1,1,'all',0,0),(77,20,NULL,33,NULL,4,64,1,'all',0,0),(78,20,NULL,34,NULL,5,32,1,'all',0,0),(79,20,NULL,35,NULL,6,4,1,'all',0,0),(80,20,NULL,36,NULL,7,1,1,'all',0,0),(81,21,NULL,37,NULL,4,64,1,'all',0,0),(82,21,NULL,38,NULL,5,32,1,'all',0,0),(83,21,NULL,39,NULL,6,4,1,'all',0,0),(84,21,NULL,40,NULL,7,1,1,'all',0,0),(85,20,NULL,41,NULL,0,64,1,'all',0,0),(86,20,NULL,42,NULL,1,32,1,'all',0,0),(87,20,NULL,43,NULL,2,4,1,'all',0,0),(88,20,NULL,44,NULL,3,1,1,'all',0,0),(89,21,NULL,45,NULL,0,64,1,'all',0,0),(90,21,NULL,46,NULL,1,32,1,'all',0,0),(91,21,NULL,47,NULL,2,4,1,'all',0,0),(92,21,NULL,48,NULL,3,1,1,'all',0,0),(93,20,119,49,NULL,0,0,1,'all',0,0),(94,20,119,50,NULL,1,140,1,'all',0,0),(95,20,119,51,NULL,2,0,1,'all',0,0),(96,13,13,49,NULL,0,0,1,'all',0,0),(97,13,13,50,NULL,1,128,1,'all',0,0),(98,13,13,51,NULL,2,0,1,'all',0,0),(99,13,14,52,NULL,0,0,1,'all',0,0),(100,13,14,53,NULL,1,0,1,'all',0,0),(101,13,14,54,NULL,2,0,1,'all',0,0),(102,13,14,55,NULL,3,0,1,'all',0,0),(103,13,14,56,NULL,4,0,1,'all',0,0),(104,13,14,57,NULL,5,128,1,'all',0,0),(105,13,14,58,NULL,6,0,1,'all',0,0),(106,13,14,59,NULL,7,0,1,'all',0,0),(107,13,14,45,NULL,8,0,1,'all',0,0),(108,13,14,46,NULL,9,0,1,'all',0,0),(109,13,14,47,NULL,10,0,1,'all',0,0),(110,13,14,48,NULL,11,0,1,'all',0,0),(111,13,14,41,NULL,12,0,1,'all',0,0),(112,13,14,42,NULL,13,0,1,'all',0,0),(113,13,14,43,NULL,14,0,1,'all',0,0),(114,13,14,44,NULL,15,0,1,'all',0,0),(115,13,14,37,NULL,16,0,1,'all',0,0),(116,13,14,38,NULL,17,0,1,'all',0,0),(117,13,14,39,NULL,18,0,1,'all',0,0),(118,13,14,40,NULL,19,0,1,'all',0,0),(119,13,14,33,NULL,20,0,1,'all',0,0),(120,13,14,34,NULL,21,0,1,'all',0,0),(121,13,14,35,NULL,22,0,1,'all',0,0),(122,13,14,36,NULL,23,0,1,'all',0,0),(123,13,14,29,NULL,24,0,1,'all',0,0),(124,13,14,30,NULL,25,0,1,'all',0,0),(125,13,14,31,NULL,26,0,1,'all',0,0),(126,13,14,32,NULL,27,0,1,'all',0,0),(127,13,14,25,NULL,28,0,1,'all',0,0),(128,13,14,26,NULL,29,0,1,'all',0,0),(129,13,14,27,NULL,30,0,1,'all',0,0),(130,13,14,28,NULL,31,0,1,'all',0,0),(131,13,14,21,NULL,32,0,1,'all',0,0),(132,13,14,22,NULL,33,0,1,'all',0,0),(133,13,14,23,NULL,34,0,1,'all',0,0),(134,13,14,24,NULL,35,0,1,'all',0,0),(135,13,14,17,NULL,36,0,1,'all',0,0),(136,13,14,18,NULL,37,0,1,'all',0,0),(137,13,14,19,NULL,38,0,1,'all',0,0),(138,13,14,20,NULL,39,0,1,'all',0,0),(139,13,14,13,NULL,40,0,1,'all',0,0),(140,13,14,14,NULL,41,0,1,'all',0,0),(141,13,14,15,NULL,42,0,1,'all',0,0),(142,13,14,16,NULL,43,0,1,'all',0,0),(143,13,14,9,NULL,44,0,1,'all',0,0),(144,13,14,10,NULL,45,0,1,'all',0,0),(145,13,14,11,NULL,46,0,1,'all',0,0),(146,13,14,12,NULL,47,0,1,'all',0,0),(147,13,14,5,NULL,48,0,1,'all',0,0),(148,13,14,6,NULL,49,0,1,'all',0,0),(149,13,14,7,NULL,50,0,1,'all',0,0),(150,13,14,8,NULL,51,0,1,'all',0,0),(151,13,14,1,NULL,52,0,1,'all',0,0),(152,13,14,2,NULL,53,0,1,'all',0,0),(153,13,14,3,NULL,54,0,1,'all',0,0),(154,13,14,4,NULL,55,0,1,'all',0,0),(155,22,NULL,60,NULL,0,64,1,'all',0,0),(156,22,NULL,61,NULL,1,32,1,'all',0,0),(157,22,NULL,62,NULL,2,4,1,'all',0,0),(158,22,NULL,63,NULL,3,1,1,'all',0,0),(159,22,122,64,NULL,0,128,1,'all',0,0),(160,20,123,52,NULL,2,0,1,'all',0,0),(161,20,123,53,NULL,3,0,1,'all',0,0),(162,20,123,54,NULL,4,0,1,'all',0,0),(163,20,123,55,NULL,5,0,1,'all',0,0),(164,20,123,56,NULL,6,0,1,'all',0,0),(165,20,123,57,NULL,7,0,1,'all',0,0),(166,20,123,58,NULL,8,0,1,'all',0,0),(167,20,123,59,NULL,9,0,1,'all',0,0),(168,20,123,45,NULL,10,0,1,'all',0,0),(169,20,123,46,NULL,11,0,1,'all',0,0),(170,20,123,47,NULL,12,0,1,'all',0,0),(171,20,123,48,NULL,13,0,1,'all',0,0),(172,20,123,41,NULL,14,0,1,'all',0,0),(173,20,123,42,NULL,15,0,1,'all',0,0),(174,20,123,43,NULL,16,0,1,'all',0,0),(175,20,123,44,NULL,17,0,1,'all',0,0),(176,20,123,37,NULL,18,0,1,'all',0,0),(177,20,123,38,NULL,19,0,1,'all',0,0),(178,20,123,39,NULL,20,0,1,'all',0,0),(179,20,123,40,NULL,21,0,1,'all',0,0),(180,20,123,33,NULL,22,0,1,'all',0,0),(181,20,123,34,NULL,23,0,1,'all',0,0),(182,20,123,35,NULL,24,0,1,'all',0,0),(183,20,123,36,NULL,25,0,1,'all',0,0),(184,20,123,29,NULL,26,0,1,'all',0,0),(185,20,123,30,NULL,27,0,1,'all',0,0),(186,20,123,31,NULL,28,0,1,'all',0,0),(187,20,123,32,NULL,29,0,1,'all',0,0),(188,20,123,25,NULL,30,0,1,'all',0,0),(189,20,123,26,NULL,31,0,1,'all',0,0),(190,20,123,27,NULL,32,0,1,'all',0,0),(191,20,123,28,NULL,33,0,1,'all',0,0),(192,20,123,21,NULL,34,0,1,'all',0,0),(193,20,123,22,NULL,35,0,1,'all',0,0),(194,20,123,23,NULL,36,0,1,'all',0,0),(195,20,123,24,NULL,37,0,1,'all',0,0),(196,20,123,17,NULL,38,0,1,'all',0,0),(197,20,123,18,NULL,39,0,1,'all',0,0),(198,20,123,19,NULL,40,0,1,'all',0,0),(199,20,123,20,NULL,41,0,1,'all',0,0),(200,20,123,13,NULL,42,0,1,'all',0,0),(201,20,123,14,NULL,43,0,1,'all',0,0),(202,20,123,15,NULL,44,0,1,'all',0,0),(203,20,123,16,NULL,45,0,1,'all',0,0),(204,20,123,9,NULL,46,0,1,'all',0,0),(205,20,123,10,NULL,47,0,1,'all',0,0),(206,20,123,11,NULL,48,0,1,'all',0,0),(207,20,123,12,NULL,49,0,1,'all',0,0),(208,20,123,5,NULL,50,0,1,'all',0,0),(209,20,123,6,NULL,51,0,1,'all',0,0),(210,20,123,7,NULL,52,0,1,'all',0,0),(211,20,123,8,NULL,53,0,1,'all',0,0),(212,20,123,1,NULL,54,173,1,'all',0,0),(213,20,123,2,NULL,55,173,1,'all',0,0),(214,20,123,3,NULL,56,173,1,'all',0,0),(215,20,123,4,NULL,57,173,1,'all',0,0),(216,20,123,50,NULL,0,173,1,'all',0,0),(217,20,123,51,NULL,1,0,1,'all',0,0),(218,20,125,65,NULL,56,0,1,'all',0,0),(219,20,125,50,NULL,57,0,1,'all',0,0),(220,20,125,51,NULL,58,0,1,'all',0,0),(221,13,124,65,NULL,0,237,1,'all',0,0),(222,13,124,50,NULL,1,0,1,'all',0,0),(223,13,124,51,NULL,2,0,1,'all',0,0),(224,20,125,52,NULL,0,0,1,'all',0,0),(225,20,125,53,NULL,1,0,1,'all',0,0),(226,20,125,54,NULL,2,205,1,'all',0,0),(227,20,125,55,NULL,3,0,1,'all',0,0),(228,20,125,56,NULL,4,0,1,'all',0,0),(229,20,125,57,NULL,5,205,1,'all',0,0),(230,20,125,58,NULL,6,0,1,'all',0,0),(231,20,125,59,NULL,7,0,1,'all',0,0),(232,20,125,45,NULL,8,0,1,'all',0,0),(233,20,125,46,NULL,9,0,1,'all',0,0),(234,20,125,47,NULL,10,0,1,'all',0,0),(235,20,125,48,NULL,11,0,1,'all',0,0),(236,20,125,41,NULL,12,0,1,'all',0,0),(237,20,125,42,NULL,13,0,1,'all',0,0),(238,20,125,43,NULL,14,0,1,'all',0,0),(239,20,125,44,NULL,15,0,1,'all',0,0),(240,20,125,37,NULL,16,0,1,'all',0,0),(241,20,125,38,NULL,17,0,1,'all',0,0),(242,20,125,39,NULL,18,0,1,'all',0,0),(243,20,125,40,NULL,19,0,1,'all',0,0),(244,20,125,33,NULL,20,64,1,'all',0,0),(245,20,125,34,NULL,21,32,1,'all',0,0),(246,20,125,35,NULL,22,4,1,'all',0,0),(247,20,125,36,NULL,23,1,1,'all',0,0),(248,20,125,29,NULL,24,0,1,'all',0,0),(249,20,125,30,NULL,25,0,1,'all',0,0),(250,20,125,31,NULL,26,0,1,'all',0,0),(251,20,125,32,NULL,27,0,1,'all',0,0),(252,20,125,25,NULL,28,0,1,'all',0,0),(253,20,125,26,NULL,29,0,1,'all',0,0),(254,20,125,27,NULL,30,0,1,'all',0,0),(255,20,125,28,NULL,31,0,1,'all',0,0),(256,20,125,21,NULL,32,0,1,'all',0,0),(257,20,125,22,NULL,33,0,1,'all',0,0),(258,20,125,23,NULL,34,0,1,'all',0,0),(259,20,125,24,NULL,35,0,1,'all',0,0),(260,20,125,17,NULL,36,0,1,'all',0,0),(261,20,125,18,NULL,37,0,1,'all',0,0),(262,20,125,19,NULL,38,0,1,'all',0,0),(263,20,125,20,NULL,39,0,1,'all',0,0),(264,20,125,13,NULL,40,0,1,'all',0,0),(265,20,125,14,NULL,41,0,1,'all',0,0),(266,20,125,15,NULL,42,0,1,'all',0,0),(267,20,125,16,NULL,43,0,1,'all',0,0),(268,20,125,9,NULL,44,0,1,'all',0,0),(269,20,125,10,NULL,45,0,1,'all',0,0),(270,20,125,11,NULL,46,0,1,'all',0,0),(271,20,125,12,NULL,47,0,1,'all',0,0),(272,20,125,5,NULL,48,0,1,'all',0,0),(273,20,125,6,NULL,49,0,1,'all',0,0),(274,20,125,7,NULL,50,0,1,'all',0,0),(275,20,125,8,NULL,51,0,1,'all',0,0),(276,20,125,1,NULL,52,205,1,'all',0,0),(277,20,125,2,NULL,53,205,1,'all',0,0),(278,20,125,3,NULL,54,205,1,'all',0,0),(279,20,125,4,NULL,55,205,1,'all',0,0),(280,21,127,51,NULL,0,128,1,'all',0,0),(281,13,128,50,NULL,0,128,1,'all',0,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_object_identities`
--

LOCK TABLES `acl_object_identities` WRITE;
/*!40000 ALTER TABLE `acl_object_identities` DISABLE KEYS */;
INSERT INTO `acl_object_identities` VALUES (1,NULL,1,'admin.organizations',1),(2,NULL,2,'admin.disabilitytypes',1),(3,NULL,3,'admin.society',1),(4,NULL,4,'admin.structures_types',1),(5,NULL,5,'admin.staff',1),(6,NULL,6,'admin.stafftype',1),(7,NULL,7,'admin.needs',1),(8,NULL,8,'admin.opinion',1),(9,NULL,9,'admin.users',1),(10,NULL,10,'admin.groups',1),(11,NULL,11,'sonata.user.admin.user',1),(12,NULL,12,'sonata.user.admin.group',1),(13,NULL,13,'1',1),(14,NULL,13,'2',1),(15,NULL,13,'3',1),(16,NULL,13,'4',1),(17,NULL,13,'5',1),(18,NULL,13,'6',1),(19,NULL,13,'7',1),(20,NULL,13,'8',1),(21,NULL,13,'9',1),(22,NULL,13,'10',1),(23,NULL,13,'11',1),(24,NULL,13,'12',1),(25,NULL,14,'1',1),(26,NULL,14,'2',1),(27,NULL,14,'3',1),(28,NULL,14,'4',1),(29,NULL,14,'5',1),(30,NULL,14,'6',1),(31,NULL,14,'7',1),(32,NULL,14,'8',1),(33,NULL,14,'10',1),(34,NULL,14,'11',1),(35,NULL,14,'12',1),(36,NULL,14,'13',1),(37,NULL,14,'14',1),(38,NULL,14,'15',1),(39,NULL,15,'1',1),(40,NULL,15,'2',1),(41,NULL,16,'1',1),(42,NULL,16,'2',1),(43,NULL,16,'3',1),(44,NULL,16,'4',1),(45,NULL,16,'5',1),(46,NULL,16,'6',1),(47,NULL,16,'7',1),(48,NULL,16,'8',1),(49,NULL,16,'9',1),(50,NULL,16,'10',1),(51,NULL,16,'11',1),(52,NULL,16,'12',1),(53,NULL,16,'13',1),(54,NULL,16,'14',1),(55,NULL,16,'15',1),(56,NULL,16,'16',1),(57,NULL,16,'17',1),(58,NULL,16,'18',1),(59,NULL,16,'19',1),(60,NULL,16,'20',1),(61,NULL,16,'21',1),(62,NULL,17,'1',1),(63,NULL,17,'2',1),(64,NULL,17,'3',1),(65,NULL,17,'4',1),(66,NULL,17,'5',1),(67,NULL,17,'6',1),(68,NULL,17,'7',1),(69,NULL,17,'8',1),(70,NULL,17,'9',1),(71,NULL,17,'10',1),(72,NULL,17,'11',1),(73,NULL,17,'12',1),(74,NULL,17,'13',1),(75,NULL,17,'14',1),(76,NULL,17,'15',1),(77,NULL,17,'16',1),(78,NULL,17,'17',1),(79,NULL,17,'18',1),(80,NULL,17,'19',1),(81,NULL,17,'20',1),(82,NULL,17,'21',1),(83,NULL,17,'22',1),(84,NULL,17,'23',1),(85,NULL,17,'24',1),(86,NULL,17,'25',1),(87,NULL,17,'26',1),(88,NULL,17,'27',1),(89,NULL,17,'28',1),(90,NULL,17,'29',1),(91,NULL,17,'30',1),(92,NULL,17,'31',1),(93,NULL,17,'32',1),(94,NULL,17,'33',1),(95,NULL,17,'34',1),(96,NULL,17,'35',1),(97,NULL,17,'36',1),(98,NULL,17,'37',1),(99,NULL,17,'38',1),(100,NULL,17,'39',1),(101,NULL,18,'1',1),(102,NULL,18,'2',1),(103,NULL,19,'1',1),(104,NULL,19,'2',1),(105,NULL,19,'3',1),(106,NULL,19,'4',1),(107,NULL,19,'5',1),(108,NULL,19,'6',1),(109,NULL,19,'7',1),(110,NULL,19,'8',1),(111,NULL,19,'9',1),(112,NULL,19,'10',1),(113,NULL,19,'11',1),(114,NULL,19,'12',1),(115,NULL,19,'13',1),(116,NULL,19,'14',1),(117,NULL,19,'15',1),(118,NULL,20,'2',1),(119,NULL,20,'3',1),(120,NULL,20,'4',1),(121,NULL,21,'1',1),(122,NULL,22,'1',1),(123,NULL,20,'6',1),(124,NULL,13,'13',1),(125,NULL,20,'8',1),(126,NULL,20,'5',1),(127,NULL,21,'2',1),(128,NULL,13,'14',1);
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
INSERT INTO `acl_object_identity_ancestors` VALUES (1,1),(2,2),(3,3),(4,4),(5,5),(6,6),(7,7),(8,8),(9,9),(10,10),(11,11),(12,12),(13,13),(14,14),(15,15),(16,16),(17,17),(18,18),(19,19),(20,20),(21,21),(22,22),(23,23),(24,24),(25,25),(26,26),(27,27),(28,28),(29,29),(30,30),(31,31),(32,32),(33,33),(34,34),(35,35),(36,36),(37,37),(38,38),(39,39),(40,40),(41,41),(42,42),(43,43),(44,44),(45,45),(46,46),(47,47),(48,48),(49,49),(50,50),(51,51),(52,52),(53,53),(54,54),(55,55),(56,56),(57,57),(58,58),(59,59),(60,60),(61,61),(62,62),(63,63),(64,64),(65,65),(66,66),(67,67),(68,68),(69,69),(70,70),(71,71),(72,72),(73,73),(74,74),(75,75),(76,76),(77,77),(78,78),(79,79),(80,80),(81,81),(82,82),(83,83),(84,84),(85,85),(86,86),(87,87),(88,88),(89,89),(90,90),(91,91),(92,92),(93,93),(94,94),(95,95),(96,96),(97,97),(98,98),(99,99),(100,100),(101,101),(102,102),(103,103),(104,104),(105,105),(106,106),(107,107),(108,108),(109,109),(110,110),(111,111),(112,112),(113,113),(114,114),(115,115),(116,116),(117,117),(118,118),(119,119),(120,120),(121,121),(122,122),(123,123),(124,124),(125,125),(126,126),(127,127),(128,128);
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
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_security_identities`
--

LOCK TABLES `acl_security_identities` WRITE;
/*!40000 ALTER TABLE `acl_security_identities` DISABLE KEYS */;
INSERT INTO `acl_security_identities` VALUES (51,'Application\\Sonata\\UserBundle\\Entity\\User-dev',1),(49,'Application\\Sonata\\UserBundle\\Entity\\User-dev1',1),(65,'Application\\Sonata\\UserBundle\\Entity\\User-users',1),(50,'Application\\Sonata\\UserBundle\\Entity\\User-utilisateur',1),(64,'HandissimoBundle\\Entity\\User-dev',1),(54,'ROLE_ADMIN',0),(5,'ROLE_ADMIN_DISABILITYTYPES_ADMIN',0),(6,'ROLE_ADMIN_DISABILITYTYPES_EDITOR',0),(8,'ROLE_ADMIN_DISABILITYTYPES_GUEST',0),(7,'ROLE_ADMIN_DISABILITYTYPES_STAFF',0),(60,'ROLE_ADMIN_GROUP_ADMIN',0),(61,'ROLE_ADMIN_GROUP_EDITOR',0),(63,'ROLE_ADMIN_GROUP_GUEST',0),(62,'ROLE_ADMIN_GROUP_STAFF',0),(37,'ROLE_ADMIN_GROUPS_ADMIN',0),(38,'ROLE_ADMIN_GROUPS_EDITOR',0),(40,'ROLE_ADMIN_GROUPS_GUEST',0),(39,'ROLE_ADMIN_GROUPS_STAFF',0),(25,'ROLE_ADMIN_NEEDS_ADMIN',0),(26,'ROLE_ADMIN_NEEDS_EDITOR',0),(28,'ROLE_ADMIN_NEEDS_GUEST',0),(27,'ROLE_ADMIN_NEEDS_STAFF',0),(29,'ROLE_ADMIN_OPINION_ADMIN',0),(30,'ROLE_ADMIN_OPINION_EDITOR',0),(32,'ROLE_ADMIN_OPINION_GUEST',0),(31,'ROLE_ADMIN_OPINION_STAFF',0),(1,'ROLE_ADMIN_ORGANIZATIONS_ADMIN',0),(57,'ROLE_ADMIN_ORGANIZATIONS_ALL',0),(2,'ROLE_ADMIN_ORGANIZATIONS_EDITOR',0),(4,'ROLE_ADMIN_ORGANIZATIONS_GUEST',0),(3,'ROLE_ADMIN_ORGANIZATIONS_STAFF',0),(9,'ROLE_ADMIN_SOCIETY_ADMIN',0),(10,'ROLE_ADMIN_SOCIETY_EDITOR',0),(12,'ROLE_ADMIN_SOCIETY_GUEST',0),(11,'ROLE_ADMIN_SOCIETY_STAFF',0),(17,'ROLE_ADMIN_STAFF_ADMIN',0),(18,'ROLE_ADMIN_STAFF_EDITOR',0),(20,'ROLE_ADMIN_STAFF_GUEST',0),(19,'ROLE_ADMIN_STAFF_STAFF',0),(21,'ROLE_ADMIN_STAFFTYPE_ADMIN',0),(22,'ROLE_ADMIN_STAFFTYPE_EDITOR',0),(24,'ROLE_ADMIN_STAFFTYPE_GUEST',0),(23,'ROLE_ADMIN_STAFFTYPE_STAFF',0),(13,'ROLE_ADMIN_STRUCTURES_TYPES_ADMIN',0),(14,'ROLE_ADMIN_STRUCTURES_TYPES_EDITOR',0),(16,'ROLE_ADMIN_STRUCTURES_TYPES_GUEST',0),(15,'ROLE_ADMIN_STRUCTURES_TYPES_STAFF',0),(33,'ROLE_ADMIN_USERS_ADMIN',0),(34,'ROLE_ADMIN_USERS_EDITOR',0),(36,'ROLE_ADMIN_USERS_GUEST',0),(35,'ROLE_ADMIN_USERS_STAFF',0),(52,'ROLE_ALLOWED_TO_SWITCH',0),(59,'ROLE_EDITOR',0),(55,'ROLE_MANAGER',0),(56,'ROLE_SONATA_ADMIN',0),(45,'ROLE_SONATA_USER_ADMIN_GROUP_ADMIN',0),(46,'ROLE_SONATA_USER_ADMIN_GROUP_EDITOR',0),(48,'ROLE_SONATA_USER_ADMIN_GROUP_GUEST',0),(47,'ROLE_SONATA_USER_ADMIN_GROUP_STAFF',0),(41,'ROLE_SONATA_USER_ADMIN_USER_ADMIN',0),(42,'ROLE_SONATA_USER_ADMIN_USER_EDITOR',0),(44,'ROLE_SONATA_USER_ADMIN_USER_GUEST',0),(43,'ROLE_SONATA_USER_ADMIN_USER_STAFF',0),(53,'ROLE_SUPER_ADMIN',0),(58,'ROLE_USER',0);
/*!40000 ALTER TABLE `acl_security_identities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parution_date` datetime NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status_comment` tinyint(1) DEFAULT NULL,
  `organizations_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `like_comment` int(11) DEFAULT NULL,
  `dislike_comment` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9474526C86288A55` (`organizations_id`),
  CONSTRAINT `FK_9474526C86288A55` FOREIGN KEY (`organizations_id`) REFERENCES `organizations` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (1,'dev','2017-02-27 15:00:32','Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.\n\nDonec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.',1,116,'\nMedia heading',30,1),(2,'dev','2017-02-27 15:01:44','Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.\n\nDonec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.',1,116,'\nMedia heading',NULL,NULL),(15,'dev','2017-03-08 16:26:53','ferfbfaebeafe',1,116,'test1',NULL,NULL),(16,'dev','2017-03-08 16:27:08','trzbfnabfba',1,116,'test2',NULL,NULL),(17,'dev','2017-03-09 10:36:14','gggggg',1,116,'test3',NULL,NULL);
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment_answer`
--

DROP TABLE IF EXISTS `comment_answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parution_date` datetime NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_comment` tinyint(1) DEFAULT NULL,
  `like_answer` int(11) DEFAULT NULL,
  `dislike_answer` int(11) DEFAULT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `activate` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_10CE1237F8697D13` (`comment_id`),
  CONSTRAINT `FK_10CE1237F8697D13` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment_answer`
--

LOCK TABLES `comment_answer` WRITE;
/*!40000 ALTER TABLE `comment_answer` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment_answer` ENABLE KEYS */;
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
INSERT INTO `disability_types_has_organizations` VALUES (116,5),(117,3),(188,12);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fos_group`
--

LOCK TABLES `fos_group` WRITE;
/*!40000 ALTER TABLE `fos_group` DISABLE KEYS */;
INSERT INTO `fos_group` VALUES (1,'Société','a:11:{i:0;s:17:\"ROLE_SONATA_ADMIN\";i:1;s:9:\"ROLE_USER\";i:2;s:30:\"ROLE_ADMIN_ORGANIZATIONS_GUEST\";i:3;s:30:\"ROLE_ADMIN_ORGANIZATIONS_STAFF\";i:4;s:31:\"ROLE_ADMIN_ORGANIZATIONS_EDITOR\";i:5;s:30:\"ROLE_ADMIN_ORGANIZATIONS_ADMIN\";i:6;s:24:\"ROLE_ADMIN_SOCIETY_GUEST\";i:7;s:24:\"ROLE_ADMIN_SOCIETY_STAFF\";i:8;s:25:\"ROLE_ADMIN_SOCIETY_EDITOR\";i:9;s:24:\"ROLE_ADMIN_SOCIETY_ADMIN\";i:10;s:11:\"ROLE_EDITOR\";}'),(2,'Structures','a:7:{i:0;s:30:\"ROLE_ADMIN_ORGANIZATIONS_GUEST\";i:1;s:30:\"ROLE_ADMIN_ORGANIZATIONS_STAFF\";i:2;s:31:\"ROLE_ADMIN_ORGANIZATIONS_EDITOR\";i:3;s:30:\"ROLE_ADMIN_ORGANIZATIONS_ADMIN\";i:4;s:28:\"ROLE_ADMIN_ORGANIZATIONS_ALL\";i:5;s:8:\"ROLE_ORG\";i:6;s:10:\"ROLE_ADMIN\";}');
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
  `organizations_id` int(11) DEFAULT NULL,
  `user_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_957A647986288A55` (`organizations_id`),
  CONSTRAINT `FK_957A647986288A55` FOREIGN KEY (`organizations_id`) REFERENCES `organizations` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fos_user`
--

LOCK TABLES `fos_user` WRITE;
/*!40000 ALTER TABLE `fos_user` DISABLE KEYS */;
INSERT INTO `fos_user` VALUES (5,'dev','dev','tangui.lebourdonnec@gmail.com','tangui.lebourdonnec@gmail.com',1,'pvcatcn4ls044c8404ck8wo04gggsgw','nPlXFmvGX6iKCTIy6t9xXVZLVJhZVznN1ygRLBiFp7VEeYYkswCg6S+xbIXVeOdwXwkE7oMfJCG9EHOCtPfOCw==','2017-03-20 16:10:31',0,0,NULL,'niFZXBvBAZqplydnjlsQPH_NMNXSKoDhIstTjd3ljv4','2017-02-14 15:19:49','a:13:{i:0;s:16:\"ROLE_SUPER_ADMIN\";i:1;s:28:\"ROLE_ADMIN_ORGANIZATIONS_ALL\";i:2;s:30:\"ROLE_ADMIN_DISABILITYTYPES_ALL\";i:3;s:22:\"ROLE_ADMIN_SOCIETY_ALL\";i:4;s:31:\"ROLE_ADMIN_STRUCTURES_TYPES_ALL\";i:5;s:20:\"ROLE_ADMIN_STAFF_ALL\";i:6;s:24:\"ROLE_ADMIN_STAFFTYPE_ALL\";i:7;s:20:\"ROLE_ADMIN_NEEDS_ALL\";i:8;s:22:\"ROLE_ADMIN_OPINION_ALL\";i:9;s:31:\"ROLE_SONATA_USER_ADMIN_USER_ALL\";i:10;s:32:\"ROLE_SONATA_USER_ADMIN_GROUP_ALL\";i:11;s:8:\"ROLE_ORG\";i:12;s:19:\"ROLE_ADMIN_USER_ALL\";}',0,NULL,'2017-01-10 10:03:19','2017-03-20 16:10:31',NULL,NULL,NULL,NULL,NULL,'m',NULL,NULL,NULL,NULL,NULL,'null',NULL,NULL,'null',NULL,NULL,'null',NULL,NULL,NULL,'utilisateur',NULL);
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
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated` datetime DEFAULT NULL,
  `web_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnails` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `organizations_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `caroussel` tinyint(1) NOT NULL,
  `first_picture` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `needs`
--

LOCK TABLES `needs` WRITE;
/*!40000 ALTER TABLE `needs` DISABLE KEYS */;
INSERT INTO `needs` VALUES (24,'Accueil petite enfance, garderie'),(25,'Soutien à la scolarité'),(26,'Scolarisation adaptée'),(27,'Formation'),(28,'Accompagnement pour devenir plus autonome'),(29,'Aide pour la socialisation / l’insertion sociale'),(31,'Aide à domicile / Soutien à la vie quotidienne (se lever, manger, se laver, sortir, gérer ses papiers, …)'),(33,'Hébergement / lieu de vie / internat'),(34,'Accueil de jour / institut de jour'),(35,'Soins, rééducation'),(36,'Diagnostic'),(37,'Travail adapté'),(38,'Aide aux aidants/ soutien parental / répit'),(39,'Soutien administratif / conseil / Information'),(40,'Transports adaptés ou médicalisés'),(41,'Entraide / rencontres organisées pour familles / réseau'),(42,'Week-end / vacances'),(43,'Loisirs adaptés / bien-être/ activités culturelles et sportives'),(44,'Aide pour l’insertion professionnelle / accompagnement à l’emploi'),(45,'Information, orientation et coordination de professionnels');
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
INSERT INTO `needs_has_organizations` VALUES (116,31),(116,36),(188,24),(188,38);
/*!40000 ALTER TABLE `needs_has_organizations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opinion`
--

DROP TABLE IF EXISTS `opinion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opinion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `e_mail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opinion`
--

LOCK TABLES `opinion` WRITE;
/*!40000 ALTER TABLE `opinion` DISABLE KEYS */;
/*!40000 ALTER TABLE `opinion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organizations`
--

DROP TABLE IF EXISTS `organizations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blog` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `freeplace` int(11) DEFAULT NULL,
  `organization_description` text COLLATE utf8_unicode_ci,
  `openhours` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `opendays` tinytext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `team_members_number` int(11) DEFAULT NULL,
  `update_datetime` datetime DEFAULT NULL,
  `school` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activities` text COLLATE utf8_unicode_ci,
  `profil_picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `agemini` int(11) DEFAULT NULL,
  `agemaxi` int(11) DEFAULT NULL,
  `team_description` text COLLATE utf8_unicode_ci,
  `working_description` text COLLATE utf8_unicode_ci,
  `school_description` text COLLATE utf8_unicode_ci,
  `place_description` text COLLATE utf8_unicode_ci,
  `director_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `accomodation` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `accomodation_description` text COLLATE utf8_unicode_ci,
  `statut` tinyint(1) DEFAULT NULL,
  `replay` tinyint(1) DEFAULT NULL,
  `address_complement` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `day_description` text COLLATE utf8_unicode_ci,
  `transport` text COLLATE utf8_unicode_ci,
  `reception_description` text COLLATE utf8_unicode_ci,
  `cost` text COLLATE utf8_unicode_ci,
  `inscription` text COLLATE utf8_unicode_ci,
  `intervention_zone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `opendays_year` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `comment_staff` longtext COLLATE utf8_unicode_ci,
  `brochure` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `society` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `structureList_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_427C1C7F12992FBE` (`structureList_id`),
  CONSTRAINT `FK_427C1C7F12992FBE` FOREIGN KEY (`structureList_id`) REFERENCES `structures_list` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=189 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organizations`
--

LOCK TABLES `organizations` WRITE;
/*!40000 ALTER TABLE `organizations` DISABLE KEYS */;
INSERT INTO `organizations` VALUES (116,'OVE - DELTA 01','1327 Avenue Charles de Gaulle','1330','VILLARS-LES-DOMBES',45.9948799,5.0270585,'04 69 85 82 13','nicole.vaillotpol@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,44,NULL,NULL,'a:2:{i:0;s:5:\"Mardi\";i:1;s:8:\"Vendredi\";}',NULL,'2017-03-20 14:58:00',NULL,NULL,NULL,4,16,NULL,NULL,NULL,NULL,'Vaillot Pol Nicole',NULL,NULL,NULL,NULL,'RD 1083 - BP 8','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,'a:0:{}',NULL,NULL,NULL,105),(117,'OVE - CMPP Alfred Binet site Les Andelys','rue Roger Gaudeau','27700','LES ANDELYS',49.242659,1.401851,'02 34 88 16 56','guillaume.fresnais@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,'2017-03-02 16:19:00',NULL,NULL,NULL,0,20,NULL,NULL,NULL,NULL,'Fresnais Guillaume',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(118,'OVE - Itep Evreux','28 bis rue Victor Hugo','27000','Evreux',49.0214456,1.1454058,'','','www.fondation-ove.fr',NULL,NULL,NULL,18,NULL,NULL,NULL,NULL,'2017-02-21 16:56:00',NULL,NULL,NULL,11,20,NULL,NULL,NULL,NULL,'Fresnais Guillaume',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(119,'OVE - CMPP Alfred Binet site de Pont-Audemer','Quai François Mitterrand','27500','Pont-Audemer',49.357909,0.515074,'','','www.fondation-ove.fr',NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,'2017-02-21 16:41:00',NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,'Fresnais Guillaume',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(120,'OVE - Itep Marius Boulogne','677 chemin des Tières','38330','BIVIERS',45.2377738,5.8044884,'04 76 52 31 63','bruno.minssieux@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,59,NULL,NULL,NULL,NULL,'2017-02-21 16:41:00',NULL,NULL,NULL,12,20,NULL,NULL,NULL,NULL,'MINSSIEUX Bruno',NULL,NULL,NULL,NULL,'Château de Franquières','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(121,'OVE - IME Saint-Romme','200 impasse du Château','38940','ROYBON',45.2589495,5.2458696,'04 76 36 22 67','saint.romme@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,33,NULL,NULL,NULL,NULL,'2017-02-21 16:41:00',NULL,NULL,NULL,7,20,NULL,NULL,NULL,NULL,'BRENIER Jean-Christophe',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(122,'OVE - Les Maisons de Crolles','101 rue des Bécasses','38920','CROLLES',45.275246,5.8899015,'04 56 85 20 70','maisonsdecrolles@fondation-ove.fr','http://blog.fondation-ove.fr/maisonsdecrolles/',NULL,NULL,NULL,30,NULL,NULL,NULL,NULL,'2017-02-21 16:41:00',NULL,NULL,NULL,20,65,NULL,NULL,NULL,NULL,'CARRERA Mathilde',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(123,'OVE - Sessad du Turquet','3 rue Paul Sage','38110','La Tour-du-Pin',45.5648378,5.4452294,'06 29 41 43 89','natalie.faure@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,32,NULL,NULL,NULL,NULL,'2017-02-21 16:41:00',NULL,NULL,NULL,6,20,NULL,NULL,NULL,NULL,'BRENIER Jean-Christophe',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(124,'OVE - Sessad de Grenoble','8 Rue Général Ferrié','38100','GRENOBLE',45.1801159,5.7232611,'04 76 12 97 70','sessad.ferrie@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,44,NULL,NULL,NULL,NULL,'2017-02-21 16:41:00',NULL,NULL,NULL,12,20,NULL,NULL,NULL,NULL,'MINSSIEUX Bruno',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(125,'OVE - Sessad Bièvre-Valloire','1 place de l\'Europe','38260','LA COTE SAINT ANDRE',45.39428,5.2581328,'04 76 36 22 67','jchristophe.brenier@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,28,NULL,NULL,NULL,NULL,'2017-02-21 16:42:00',NULL,NULL,NULL,3,16,NULL,NULL,NULL,NULL,'BRENIER Jean-Christophe',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(126,'OVE - Itep de Vienne','75 rue Lafayette','38200','Vienne',45.5272585,4.8952446,'04 69 85 82 23','melanie.tacquard@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,29,NULL,NULL,NULL,NULL,'2017-02-21 16:42:00',NULL,NULL,NULL,6,20,NULL,NULL,NULL,NULL,'TACQUARD Mélanie',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(127,'OVE - IME André Romanet','27/29 chemin Gros Denis','42300','ROANNE',46.021565,4.059009,'04 77 65 84 06','jeanclaude.jaboulay@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,32,NULL,NULL,NULL,NULL,'2017-02-21 16:42:00',NULL,NULL,NULL,6,16,NULL,NULL,NULL,NULL,'Jaboulay Jean Claude',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(128,'OVE - IME Jacques Rochas','10 rue Henri Dunant','42100','SAINT ETIENNE',45.4283357,4.4090533,'04 77 39 21 80','ime.jacquesrochas@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,28,NULL,NULL,NULL,NULL,'2017-02-21 16:42:00',NULL,NULL,NULL,6,14,NULL,NULL,NULL,NULL,'JABOULAY Virginie',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(129,'OVE - IME Château de Taron','Taron','42370','RENAISON',46.0573539,3.925823,'04 77 64 26 22','jeanclaude.jaboulay@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,54,NULL,NULL,NULL,NULL,'2017-02-21 16:42:00',NULL,NULL,NULL,12,20,NULL,NULL,NULL,NULL,'JABOULAY Jean-Claude',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(130,'OVE - IME Celadon','6 chemin des Quatre','42110','FEURS',45.735912,4.2380802,'04 77 64 26 22','jeanclaude.jaboulay@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,'2017-02-21 16:42:00',NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,'Jaboulay Jean Claude',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(131,'OVE - Itep André Romanet','16 Rue Marx Dormoy','42370','ROANNE',46.0403279,4.0686449,'','jeanclaude.jaboulay@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,37,NULL,NULL,NULL,NULL,'2017-02-21 16:43:00',NULL,NULL,NULL,6,13,NULL,NULL,NULL,NULL,'Jaboulay Jean Claude',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(132,'OVE - Itep La Rose des Vents','Château de la Doue','42330','Saint Galmier',45.5893007,4.3209009,'04 77 36 16 30','iteplarosedesvents@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,88,NULL,NULL,NULL,NULL,'2017-02-21 16:43:00',NULL,NULL,NULL,6,18,NULL,NULL,NULL,NULL,'MORTEL philippe',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(133,'OVE - Sessad Sud Forez','11 rue Molière','42160','ANDREZIEUX BOUTHEON',45.527501,4.2698002,'04 77 02 06 00','sessadsud-forez@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,30,NULL,NULL,NULL,NULL,'2017-02-21 16:43:00',NULL,NULL,NULL,5,16,NULL,NULL,NULL,NULL,'JABOULAY Virgine',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(134,'OVE - Sessad André Romanet','11 rue de l\'Eglise','42370','SAINT ANDRE APHCHON',46.0333067,3.9296675,'04 77 72 92 20','jeanclaude.jaboulay@ove.asso.fr','www.fondation-ove.fr',NULL,NULL,NULL,10,NULL,NULL,NULL,NULL,'2017-02-21 16:43:00',NULL,NULL,NULL,4,20,NULL,NULL,NULL,NULL,'Jaboulay Jean Claude',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(136,'OVE - Sessad Roanne','27-29 chemin Grosdenis','42300','ROANNE',46.021565,4.059009,'04 77 72 92 20','jeanclaude.jaboulay@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,30,NULL,NULL,NULL,NULL,'2017-02-21 16:45:00',NULL,NULL,NULL,4,20,NULL,NULL,NULL,NULL,'JABOULAY Jean-Claude',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(137,'OVE - Itep Marx Dormoy','16 Rue Marx Dormoy','42300','ROANNE',46.0403279,4.0686449,'04 77 71 62 82','marx.dormoy@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,37,NULL,NULL,NULL,NULL,'2017-02-21 16:46:00',NULL,NULL,NULL,6,20,NULL,NULL,NULL,NULL,'JABOULAY Jean-Claude',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(138,'OVE - DEAT 42','21 rue Johannot','42000','Saint-Etienne',45.4546133,4.4011366,'06 12 60 62 46','deat42@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,15,NULL,NULL,NULL,NULL,'2017-02-21 16:46:00',NULL,NULL,NULL,14,20,NULL,NULL,NULL,NULL,'JABOULAY Virginie',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(139,'OVE - Itep Institut Lamoricière','7 rue Arsène Leloup','44100','Nantes',47.2113529,-1.5693633,'02 40 71 08 30','','www.fondation-ove.fr',NULL,NULL,NULL,79,NULL,NULL,NULL,NULL,'2017-02-21 16:46:00',NULL,NULL,NULL,3,20,NULL,NULL,NULL,NULL,'MILANESE Delphine',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(140,'OVE - Sessad Jean Duret','7 rue Arsène Leloup','44100','Nantes',47.2113529,-1.5693633,'02 40 71 08 30','','www.fondation-ove.fr',NULL,NULL,NULL,40,NULL,NULL,NULL,NULL,'2017-02-21 16:46:00',NULL,NULL,NULL,3,20,NULL,NULL,NULL,NULL,'MILANESE Delphine',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(141,'OVE - CAFS de Nantes','7 rue Arsène Leloup','44100','Nantes',47.2113529,-1.5693633,'02 40 71 08 30','contact@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,10,NULL,NULL,NULL,NULL,'2017-02-21 16:46:00',NULL,NULL,NULL,3,20,NULL,NULL,NULL,NULL,'DELLAC Sylvie',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(142,'OVE - Itep de Montferrand','1 rue du Franc Rozier','63100','CLERMONT-FERRAND',45.7926344,3.1164723,'04 73 24 17 61','','itep.montferrand.fondation-ove.fr',NULL,NULL,NULL,80,NULL,NULL,NULL,NULL,'2017-02-21 16:46:00',NULL,NULL,NULL,12,20,NULL,NULL,NULL,NULL,'JABOULAY Jean-Claude',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(143,'OVE - Sessad de Montferrand','1 rue du Franc Rozier','63100','CLERMONT FERRAND',45.7926344,3.1164723,'04 73 24 17 61','sessad.montferrand@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,20,NULL,NULL,NULL,NULL,'2017-02-21 16:47:00',NULL,NULL,NULL,12,20,NULL,NULL,NULL,NULL,'JABOULAY Jean-Claude',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(144,'OVE -SEES champagnat','22 rue du professeur Patel','69009','LYON',45.76541,4.7929637,'04 72 54 09 80','yves.beroujon@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,63,NULL,NULL,NULL,NULL,'2017-02-21 16:47:00',NULL,NULL,NULL,4,20,NULL,NULL,NULL,NULL,'Béroujon Yves',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(145,'OVE - Itep Jean Fayard','257 route de Montclair','69480','POMMIERS',45.9554915,4.695876,'04 74 71 22 38','','www.fondation-ove.fr',NULL,NULL,NULL,48,NULL,NULL,NULL,NULL,'2017-02-21 16:47:00',NULL,NULL,NULL,6,14,NULL,NULL,NULL,NULL,'Vaillot Pol Nicole',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(146,'OVE - IME Mathis Jeune','1 rue du Dr Serullaz','69670','VAUGNERAY',45.7338487,4.6626475,'04 78 45 81 25','mathis.jeune@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,46,NULL,NULL,NULL,NULL,'2017-02-21 16:47:00',NULL,NULL,NULL,4,12,NULL,NULL,NULL,NULL,'BRET Yves',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(147,'OVE - SEES Roland Champagnat','22 rue Professeur Patel','69009','LYON',45.76541,4.7929637,'04 72 54 09 80','sees.champagnat@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,65,NULL,NULL,NULL,NULL,'2017-02-21 16:47:00',NULL,NULL,NULL,3,20,NULL,NULL,NULL,NULL,'BEROUJON Yves',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(148,'OVE - IME Yves Farge','5 rue Jean Marie Merle','69120','Vaulx-en-Velin',45.7775188,4.9100592,'04 72 04 96 60','ime.farge@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,75,NULL,NULL,NULL,NULL,'2017-02-21 16:48:00',NULL,NULL,NULL,12,20,NULL,NULL,NULL,NULL,'Marie Eric',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(149,'OVE - Sessad à  visée professionnelle','15 rue du Bocage','69008','Lyon',45.7345962,4.8661516,'06 09 51 90 58','','www.fondation-ove.fr',NULL,NULL,NULL,30,NULL,NULL,NULL,NULL,'2017-02-21 16:48:00',NULL,NULL,NULL,16,20,NULL,NULL,NULL,NULL,'TACQUARD Mélanie',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(150,'OVE - IME Jean-Jacques Rousseau','99 avenue des Martyrs de la Résistance','69200','Vénissieux',45.6900538,4.8656332,'04 78 70 11 55','jeanjacques.rousseau@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,70,NULL,NULL,NULL,NULL,'2017-02-21 16:48:00',NULL,NULL,NULL,12,20,NULL,NULL,NULL,NULL,'BRET Yves',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(151,'OVE - IME Villa Henri Salvat','2 rue de la Damette','69540','Irigny',45.6768875,4.8310815,'04 78 46 22 75','villa.salvat@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,20,NULL,NULL,NULL,NULL,'2017-02-21 16:48:00',NULL,NULL,NULL,12,20,NULL,NULL,NULL,NULL,'BRET Yves',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(152,'OVE - IME Aline Renard','4 rue du Bottet','69140','RILLIEUX',45.8201947,4.9038794,'04 78 97 30 75','','www.fondation-ove.fr',NULL,NULL,NULL,36,NULL,NULL,NULL,NULL,'2017-02-21 16:49:00',NULL,NULL,NULL,6,14,NULL,NULL,NULL,NULL,'Marie Eric',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(153,'OVE - Appartements Jean Lonjaret','20 rue Ducroize','69100','Villeurbanne',45.7584599,4.8950025,'04 72 78 71 00','yves.beroujon@ove.asso.fr','www.ove.asso.fr',NULL,NULL,NULL,15,NULL,NULL,NULL,NULL,'2017-02-21 16:49:00',NULL,NULL,NULL,12,20,NULL,NULL,NULL,NULL,'BEROUJON Yves',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(154,'OVE - SSEFS Recteur Louis','19 rue Marius Grosso','69120','Vaulx-en-Velin',45.7636983,4.9343698,'04 72 78 71 00','ssefs.recteurlouis@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,165,NULL,NULL,NULL,NULL,'2017-02-21 16:49:00',NULL,NULL,NULL,3,20,NULL,NULL,NULL,NULL,'BEROUJON Yves',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(155,'OVE - SSEFIS Primaire','19 rue Marius Grosso','69120','Vaulx-en-Velin',45.7636983,4.9343698,'04 72 78 71 00','yves.beroujon@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,35,NULL,NULL,NULL,NULL,'2017-02-21 16:50:00',NULL,NULL,NULL,3,12,NULL,NULL,NULL,NULL,'BEROUJON Yves',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(156,'OVE - Itep L\'Ecossais','142 rue de l\'Ecossais','69400','LIMAS',45.9785318,4.7300002,'06 46 45 69 88','','www.fondation-ove.fr',NULL,NULL,NULL,16,NULL,NULL,NULL,NULL,'2017-02-21 16:50:00',NULL,NULL,NULL,12,20,NULL,NULL,NULL,NULL,'Vaillot Pol Nicole',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(157,'OVE - Sessad Mathis Jeune','6 rue du Chardonnet','69670','VAUGNERAY',45.7332759,4.6628648,'04 78 45 79 93','eric.marie@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,20,NULL,NULL,NULL,NULL,'2017-02-21 16:50:00',NULL,NULL,NULL,4,20,NULL,NULL,NULL,NULL,'BRET Yves',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(158,'OVE - Sessad Aline Renard','4 Rue Maréchal de Lattre de Tassigny','69140','RILLIEUX',45.8135502,4.9034672,'04 69 85 92 04','eric.marie@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,70,NULL,NULL,NULL,NULL,'2017-02-21 16:50:00',NULL,NULL,NULL,4,20,NULL,NULL,NULL,NULL,'Marie Eric',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(159,'OVE - Sessad Autisme Givors','3 montée de Cras','69702','Givors',45.5819165,4.7717321,'','','www.fondation-ove.fr',NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,'2017-02-21 16:50:00',NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,'BRET Yves',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(160,'OVE - Esat Myriade - Vaulx-en-Velin','21 rue Marius Grosso','69120','Vaulx-en-Velin',45.763621,4.9347373,'04 37 45 37 80','robert.doury@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,63,NULL,NULL,NULL,NULL,'2017-02-21 16:51:00',NULL,NULL,NULL,16,25,NULL,NULL,NULL,NULL,'TACQUARD Mélanie',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(161,'OVE - Sessad Georges Seguin','7 rue Jean-Marie Merle','69120','Vaulx-en-Velin',45.777921,4.9098854,'04 72 04 96 44','eric.marie@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,64,NULL,NULL,NULL,NULL,'2017-02-21 16:51:00',NULL,NULL,NULL,4,20,NULL,NULL,NULL,NULL,'Marie Eric',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(162,'OVE - IME Val-de-Saône','110 rue de la Croix des Hormes','69250','MONTANAY',45.8806812,4.8723929,'04 78 98 13 28','ime.valdesaone@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,53,NULL,NULL,NULL,NULL,'2017-02-21 16:51:00',NULL,NULL,NULL,3,20,NULL,NULL,NULL,NULL,'CLEMENT-LUCAS Anne',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(163,'OVE - MAS Robert Ramel','110 rue de la Croix des Hormes','69250','Montanay',45.8806812,4.8723929,'04 37 92 97 84','anne.clementlucas@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,50,NULL,NULL,NULL,NULL,'2017-02-21 16:51:00',NULL,NULL,NULL,20,60,NULL,NULL,NULL,NULL,'CLEMENT-LUCAS Anne',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(164,'OVE - MAS Autisme','avenue Jean Jaurès','69150','DECINES',45.7709722,4.9606282,'','','www.fondation-ove.fr',NULL,NULL,NULL,40,NULL,NULL,NULL,NULL,'2017-02-21 16:52:00',NULL,NULL,NULL,18,0,NULL,NULL,NULL,NULL,'Marie Eric',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(165,'OVE - Itep de Meyzieu','9 bis rue de la République','69330','MEYZIEU',45.7674342,4.9937888,'06 26 98 21 68','melanie.tacquard@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,30,NULL,NULL,NULL,NULL,'2017-02-21 16:52:00',NULL,NULL,NULL,12,20,NULL,NULL,NULL,NULL,'TACQUARD Mélanie',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(166,'OVE - Sessad Marie Curie','24-26  Avenue Auguste Blanqui','69100','VILLEURBANNE',45.7628254,4.8845502,'','melanie.tacquard@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,10,NULL,NULL,NULL,NULL,'2017-02-21 16:52:00',NULL,NULL,NULL,18,0,NULL,NULL,NULL,NULL,'TACQUARD Mélanie',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(167,'OVE - Foyer d\'hébergement et SAVS renforcé LA CASA','45505 rue du Repos','69007','LYON',45.7440296,4.8519342,'04 78 61 30 50','Sofia.boughezoula@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,20,NULL,NULL,NULL,NULL,'2017-02-21 16:53:00',NULL,NULL,NULL,20,62,NULL,NULL,NULL,NULL,'TACQUARD Mélanie',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(168,'OVE - Centre d\'accueil de jour Les Villanelles','56 rue Pierre Brunier','69300','Caluire-et-Cuire',45.7890052,4.8323549,'04 78 30 59 50','les.villanelles@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,50,NULL,NULL,NULL,NULL,'2017-02-21 16:53:00',NULL,NULL,NULL,18,60,NULL,NULL,NULL,NULL,'TACQUARD Mélanie',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(169,'OVE - IME Le Château','D23 Route du Château','73110','LA ROCHETTE',45.457046,6.12132,'04 79 25 50 75','dominique.martinez@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,54,NULL,NULL,NULL,NULL,'2017-02-21 16:52:00',NULL,NULL,NULL,12,20,NULL,NULL,NULL,NULL,'Bruno MINSSIEUX',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(170,'OVE - Sessad Charléty','20 rue Sébastien Charléty','73490','LA RAVOIRE',45.5627223,5.9677252,'04 79 25 50 75','dominique.martinez@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,28,NULL,NULL,NULL,NULL,'2017-02-21 16:53:00',NULL,NULL,NULL,4,20,NULL,NULL,NULL,NULL,'MINSSIEUX Bruno',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(171,'OVE - Itep d\'Albertville','10 rue des Esserts','73200','Albertville',45.6658549,6.3874458,'04 79 37 25 37','dominique.martinez@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,16,NULL,NULL,NULL,NULL,'2017-02-21 16:54:00',NULL,NULL,NULL,6,20,NULL,NULL,NULL,NULL,'Martinez Dominique',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(172,'OVE - Itep de Chambéry','20 rue Sébastien Charléty','73490','LA RAVOIRE',45.5627223,5.9677252,'04 79 25 50 75','dominique.martinez@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,14,NULL,NULL,NULL,NULL,'2017-02-21 16:54:00',NULL,NULL,NULL,6,20,NULL,NULL,NULL,NULL,'MINSSIEUX Bruno',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(173,'OVE - IME Les Cygnes','45 avenue de la Fontaine Couverte','74200','THONON LES BAINS',46.3650812,6.504661,'04 50 83 09 00','jeanmarc.groff@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,38,NULL,NULL,NULL,NULL,'2017-02-21 16:54:00',NULL,NULL,NULL,12,20,NULL,NULL,NULL,NULL,'GROFF Jean-Marc',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(174,'OVE - IME Guy Yver','939 route de Tamié','74210','FAVERGES',45.741193,6.2989487,'04 50 44 50 15','guy.yver@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,52,NULL,NULL,NULL,NULL,'2017-02-21 16:54:00',NULL,NULL,NULL,12,20,NULL,NULL,NULL,NULL,'Martinez Dominique',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(175,'OVE - DEAT 74','320 avenue des Voirons','74800','La Roche sur Foron',46.0773767,6.2971227,'04 56 81 50 13','bruno.vanderborght@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,51,NULL,NULL,NULL,NULL,'2017-02-21 16:55:00',NULL,NULL,NULL,10,17,NULL,NULL,NULL,NULL,'MORTEL philippe',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(176,'OVE - Esat Myriade - Faverges','150 chemin des Vignes','74210','Faverges',45.7429268,6.2972025,'04 50 44 50 15','colette.domange@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,30,NULL,NULL,NULL,NULL,'2017-02-21 16:55:00',NULL,NULL,NULL,18,60,NULL,NULL,NULL,NULL,'Martinez Dominique',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(177,'OVE - Sessad Clos-Poisat','38 chemin de Froid Lieu','74200','THONON LES BAINS',46.3685463,6.4661879,'04 50 83 09 00','jeanmarc.groff@ove.asso.fr','www.ove.asso.fr',NULL,NULL,NULL,32,NULL,NULL,NULL,NULL,'2017-02-21 16:55:00',NULL,NULL,NULL,6,20,NULL,NULL,NULL,NULL,'GROFF Jean-Marc',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(178,'OVE - Sessad de Faverges','ZAE des Boucheroz','74210','FAVERGES',45.75423,6.278,'04 50 32 64 70','dominique.martinez@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,42,NULL,NULL,NULL,NULL,'2017-02-21 16:55:00',NULL,NULL,NULL,3,20,NULL,NULL,NULL,NULL,'Martinez Dominique',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(179,'OVE - Esat Myriade - Thônes','7 rue du Mont Charvin','74230','THONES',45.8735044,6.3216984,'06 03 11 77 10','colette.domange@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,30,NULL,NULL,NULL,NULL,'2017-02-21 16:53:00',NULL,NULL,NULL,18,60,NULL,NULL,NULL,NULL,'Martinez Dominique',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(180,'OVE - Itep de Beaulieu','8 chemin de Beaulieu','74940','Annecy-le-Vieux',45.9122705,6.156675,'04 57 98 80 60','itep.beaulieu@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,54,NULL,NULL,NULL,NULL,'2017-02-21 16:48:00',NULL,NULL,NULL,10,20,NULL,NULL,NULL,NULL,'VAN DER BORGHT Bruno',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(181,'OVE - Sessad de Beaulieu - Annecy','8 chemin de Beaulieu','74940','Annecy-le-Vieux',45.9122705,6.156675,'04 57 98 80 60','bruno.vanderborght@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,24,NULL,NULL,NULL,NULL,'2017-02-21 16:55:00',NULL,NULL,NULL,4,20,NULL,NULL,NULL,NULL,'VAN DER BORGHT Bruno',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(182,'OVE - Itep du Léman','38 Le Clos Poisat - 38 chemin de Froid-Lieu','74200','Thonon-les-Bains',46.3685183,6.4662279,'04 50 83 09 00','itep.clospoisat@ofondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,14,NULL,NULL,NULL,NULL,'2017-02-21 16:56:00',NULL,NULL,NULL,6,20,NULL,NULL,NULL,NULL,'GROFF Jean-Marc',NULL,NULL,NULL,NULL,'adr. postale : 45 av. de la Fontaine Couverte','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(183,'OVE - Foyer-Appartements de soutien de Faverges','79 rue des Ecoles','74210','FAVERGES',45.7464634,6.2917751,'04 37 45 37 81','dominique.martinez@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,10,NULL,NULL,NULL,NULL,'2017-02-21 16:56:00',NULL,NULL,NULL,20,60,NULL,NULL,NULL,NULL,'Martinez Dominique',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(184,'OVE - FAM Romain Jacob','33 rue Olivier de Serres','75015','PARIS',48.835133,2.2970798,'02 35 70 72 04','contact@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,38,NULL,NULL,NULL,NULL,'2017-02-21 16:56:00',NULL,NULL,NULL,18,60,NULL,NULL,NULL,NULL,'MASSONNAT Géraldine',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(185,'OVE -  CMPP Alfred Binet - Rouen','21 rue Lecanuet','76000','ROUEN',49.4439147,1.0955721,'02 51 60 70 43','gerard.roudergues@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,'2017-02-21 16:57:00',NULL,NULL,NULL,0,20,NULL,NULL,NULL,NULL,'Fresnais Guillaume',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(186,'OVE - Sessad Galilée','30 place Galilée','85300','Challans',46.835859,-1.878871,'02 51 60 70 43','agathe.breton@fondation-ove.fr','www.fondation-ove.fr',NULL,NULL,NULL,37,NULL,NULL,NULL,NULL,'2017-02-21 16:56:00',NULL,NULL,NULL,3,20,NULL,NULL,NULL,NULL,'MILANESE Delphine',NULL,NULL,NULL,NULL,'','dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(187,'OVE - Sessad Henri Michaud','2 rue Béraud','42100','SAINT-ETIENNE',45.4188388,4.3934266,'04 77 81 20 97','abc','www.fondation-ove.fr',NULL,NULL,NULL,12,NULL,NULL,NULL,NULL,'2017-02-21 17:19:00',NULL,NULL,NULL,5,16,NULL,NULL,NULL,NULL,'JABOULAY Virginie',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(188,'test','454 Route de Deyrier','74350','Cruseilles',46.0217109,6.1288618,'06-12-34-56-78','aa@gmail.com','gmsmgdml',NULL,NULL,NULL,0,NULL,NULL,'a:0:{}',NULL,'2017-03-17 16:26:00',NULL,NULL,NULL,4,50,NULL,NULL,NULL,NULL,'mgmmblsbm',NULL,NULL,NULL,NULL,NULL,'dev','utilisateur',NULL,NULL,NULL,NULL,NULL,NULL,'a:0:{}',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `organizations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organizations_has_otherjob`
--

DROP TABLE IF EXISTS `organizations_has_otherjob`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organizations_has_otherjob` (
  `organizations_id` int(11) NOT NULL,
  `other_job_id` int(11) NOT NULL,
  PRIMARY KEY (`organizations_id`,`other_job_id`),
  KEY `IDX_B5C83B4986288A55` (`organizations_id`),
  KEY `IDX_B5C83B493AE674B1` (`other_job_id`),
  CONSTRAINT `FK_B5C83B493AE674B1` FOREIGN KEY (`other_job_id`) REFERENCES `other_job` (`id`),
  CONSTRAINT `FK_B5C83B4986288A55` FOREIGN KEY (`organizations_id`) REFERENCES `organizations` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organizations_has_otherjob`
--

LOCK TABLES `organizations_has_otherjob` WRITE;
/*!40000 ALTER TABLE `organizations_has_otherjob` DISABLE KEYS */;
/*!40000 ALTER TABLE `organizations_has_otherjob` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organizations_has_socialstaff`
--

DROP TABLE IF EXISTS `organizations_has_socialstaff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organizations_has_socialstaff` (
  `organizations_id` int(11) NOT NULL,
  `social_staff_id` int(11) NOT NULL,
  PRIMARY KEY (`organizations_id`,`social_staff_id`),
  KEY `IDX_931D30686288A55` (`organizations_id`),
  KEY `IDX_931D306837CC3E1` (`social_staff_id`),
  CONSTRAINT `FK_931D306837CC3E1` FOREIGN KEY (`social_staff_id`) REFERENCES `social_staff` (`id`),
  CONSTRAINT `FK_931D30686288A55` FOREIGN KEY (`organizations_id`) REFERENCES `organizations` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organizations_has_socialstaff`
--

LOCK TABLES `organizations_has_socialstaff` WRITE;
/*!40000 ALTER TABLE `organizations_has_socialstaff` DISABLE KEYS */;
INSERT INTO `organizations_has_socialstaff` VALUES (116,4);
/*!40000 ALTER TABLE `organizations_has_socialstaff` ENABLE KEYS */;
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
INSERT INTO `organizations_has_staff` VALUES (116,42),(188,48),(188,49),(188,51);
/*!40000 ALTER TABLE `organizations_has_staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `other_job`
--

DROP TABLE IF EXISTS `other_job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `other_job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `other_job`
--

LOCK TABLES `other_job` WRITE;
/*!40000 ALTER TABLE `other_job` DISABLE KEYS */;
INSERT INTO `other_job` VALUES (1,'Assistante /secrétaire'),(2,'Maîtresse de maison'),(3,'Surveillant de nuit');
/*!40000 ALTER TABLE `other_job` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `secondary_needs`
--

DROP TABLE IF EXISTS `secondary_needs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `secondary_needs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `need_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secondary_needs`
--

LOCK TABLES `secondary_needs` WRITE;
/*!40000 ALTER TABLE `secondary_needs` DISABLE KEYS */;
INSERT INTO `secondary_needs` VALUES (1,'Accueil petite enfance, garderie'),(2,'Soutien à la scolarité'),(3,'Scolarisation adaptée'),(4,'Formation'),(5,'Accompagnement pour devenir plus autonome'),(6,'Aide pour la socialisation / l’insertion sociale'),(8,'Aide à domicile / Soutien à la vie quotidienne (se lever, manger, se laver, sortir, gérer ses papiers, …)'),(10,'Hébergement / lieu de vie / internat'),(11,'Accueil de jour / institut de jour'),(12,'Soins, rééducation'),(13,'Diagnostic'),(14,'Travail adapté'),(15,'Aide aux aidants/ soutien parental / répit'),(16,'Soutien administratif / conseil / Information'),(17,'Transports adaptés ou médicalisés'),(18,'Entraide / rencontres organisées pour familles / réseau'),(19,'Week-end / vacances'),(20,'Loisirs adaptés / bien-être/ activités culturelles et sportives'),(21,'Aide pour l’insertion professionnelle / accompagnement à l’emploi'),(22,'Information, orientation et coordination de professionnels');
/*!40000 ALTER TABLE `secondary_needs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `secondaryneeds_has_organizations`
--

DROP TABLE IF EXISTS `secondaryneeds_has_organizations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `secondaryneeds_has_organizations` (
  `organizations_id` int(11) NOT NULL,
  `secondary_needs_id` int(11) NOT NULL,
  PRIMARY KEY (`organizations_id`,`secondary_needs_id`),
  KEY `IDX_B591C49B86288A55` (`organizations_id`),
  KEY `IDX_B591C49B366D8ED0` (`secondary_needs_id`),
  CONSTRAINT `FK_B591C49B366D8ED0` FOREIGN KEY (`secondary_needs_id`) REFERENCES `secondary_needs` (`id`),
  CONSTRAINT `FK_B591C49B86288A55` FOREIGN KEY (`organizations_id`) REFERENCES `organizations` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secondaryneeds_has_organizations`
--

LOCK TABLES `secondaryneeds_has_organizations` WRITE;
/*!40000 ALTER TABLE `secondaryneeds_has_organizations` DISABLE KEYS */;
INSERT INTO `secondaryneeds_has_organizations` VALUES (116,1);
/*!40000 ALTER TABLE `secondaryneeds_has_organizations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_staff`
--

DROP TABLE IF EXISTS `social_staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social_staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `social_jobs` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_staff`
--

LOCK TABLES `social_staff` WRITE;
/*!40000 ALTER TABLE `social_staff` DISABLE KEYS */;
INSERT INTO `social_staff` VALUES (1,'Aide médico-psychologique'),(2,'Animateur socio-culturel'),(3,'Assistante de service social'),(4,'Auxiliaire de vie scolaire'),(5,'Auxiliaire de vie'),(6,'Auxiliaire de vie sociale'),(7,'Coach'),(8,'Conseiller du travail'),(9,'Conseiller en économie sociale et familiale'),(10,'Documentaliste'),(11,'Educateur spécialisé / moniteur éducateur'),(12,'Educateur jeunes enfants'),(13,'Educateur sportif en APA'),(14,'Educateur technique spécialisé'),(15,'Enseignant'),(16,'Formateur');
/*!40000 ALTER TABLE `social_staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solution`
--

DROP TABLE IF EXISTS `solution`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `solution_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `society_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `honor` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solution`
--

LOCK TABLES `solution` WRITE;
/*!40000 ALTER TABLE `solution` DISABLE KEYS */;
INSERT INTO `solution` VALUES (1,'ducruet','david','jhkjfhjl','dfqkjmk:','jsmdkjm','sgegg',1),(2,'frrgg','gthhr','hrharh','hajhah','thhah','hahaa',1),(3,'jj','jj','ll','uuu','uu','uu',1),(4,'ff','nn','ll','nn','nn','nn',1),(5,'zz','zz','zz','z','zz','zz',1),(6,'tt','tt','tt','tt','tt','tt',1),(7,'kk','kk','kk','kk','kk','kk',1),(8,'gg','ff','ff','ff','yy','yy',1),(9,'fg','gh','ghy','hj','klo','hjk',1),(10,'sd','d','gqqhHHH','JOI','IOI','BHIK',1),(11,'dd','gg','hh','hfqhq','hqhfqh','qhqfq',1),(12,'frrgg','hh','hhh','hh','hh','hh',1),(13,'df','ff','ff','hh','hhh','ggg',1);
/*!40000 ALTER TABLE `solution` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jobs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (40,'Aides soignantes'),(41,'Auxiliaire puéricultrice'),(42,'Diététicien'),(43,'Infirmier'),(44,'Infirmier coordonnateur'),(45,'Instructeur en locomotion'),(46,'Kinésithérapeute'),(47,'Médecin généraliste'),(48,'Médecin de rééducation'),(49,'Médecin psychiatre'),(50,'Neuropsychologue'),(51,'Orthophoniste'),(52,'Orthoprothésiste'),(53,'Orthoptiste'),(55,'Pédicure-podologue'),(56,'Pédopsychiatre'),(57,'Podo-orthésiste'),(58,'Psychologue'),(59,'Psychomotricien'),(60,'Puéricultrice'),(61,'Ergothérapeute'),(62,'Médecin pédiatre'),(63,'Médecin phoniatre');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `structures_list`
--

DROP TABLE IF EXISTS `structures_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `structures_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `structure_type` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `structures_list`
--

LOCK TABLES `structures_list` WRITE;
/*!40000 ALTER TABLE `structures_list` DISABLE KEYS */;
INSERT INTO `structures_list` VALUES (81,'Centre Rééducation Professionnelle (C.R.P)','a:1:{i:0;s:67:\"Etablissements et services spécialisés sur orientation de la MDPH\";}'),(82,'Etablissement d’accueil temporaire','a:1:{i:0;s:67:\"Etablissements et services spécialisés sur orientation de la MDPH\";}'),(83,'Etablissement et Service d\'Aide par le Travail (E.S.A.T.)','a:1:{i:0;s:67:\"Etablissements et services spécialisés sur orientation de la MDPH\";}'),(84,'Etablissement expérimental','a:1:{i:0;s:67:\"Etablissements et services spécialisés sur orientation de la MDPH\";}'),(85,'Établissement pour polyhandicapés','a:1:{i:0;s:67:\"Etablissements et services spécialisés sur orientation de la MDPH\";}'),(86,'Foyer d\'Accueil Médicalisé (F.A.M.)','a:1:{i:0;s:67:\"Etablissements et services spécialisés sur orientation de la MDPH\";}'),(87,'Foyer de Vie, Foyer d’hébergement','a:1:{i:0;s:67:\"Etablissements et services spécialisés sur orientation de la MDPH\";}'),(88,'Institut d’éducation motrice (I.E.M)','a:1:{i:0;s:67:\"Etablissements et services spécialisés sur orientation de la MDPH\";}'),(89,'Institut de réadaptation / pré orientation','a:1:{i:0;s:67:\"Etablissements et services spécialisés sur orientation de la MDPH\";}'),(90,'Institut et service pour déficients auditifs (SEFFS, SEES…)','a:1:{i:0;s:67:\"Etablissements et services spécialisés sur orientation de la MDPH\";}'),(91,'Institut médico professionnel (IMpro)','a:1:{i:0;s:67:\"Etablissements et services spécialisés sur orientation de la MDPH\";}'),(92,'Institut Médico-Educatif (I.M.E.)','a:1:{i:0;s:67:\"Etablissements et services spécialisés sur orientation de la MDPH\";}'),(93,'Institut médico-pédagogique (I.M.P)','a:1:{i:0;s:67:\"Etablissements et services spécialisés sur orientation de la MDPH\";}'),(94,'Institut pour personnes aveugles','a:1:{i:0;s:67:\"Etablissements et services spécialisés sur orientation de la MDPH\";}'),(95,'Institut Thérapeutique Éducatif et Pédagogique (I.T.E.P.)','a:1:{i:0;s:67:\"Etablissements et services spécialisés sur orientation de la MDPH\";}'),(96,'Lieu d’accueil temporaire','a:1:{i:0;s:67:\"Etablissements et services spécialisés sur orientation de la MDPH\";}'),(97,'Maison d\'Accueil Spécialisée (M.A.S.)','a:1:{i:0;s:67:\"Etablissements et services spécialisés sur orientation de la MDPH\";}'),(98,'Plateforme de services pour personnes handicapées','a:1:{i:0;s:67:\"Etablissements et services spécialisés sur orientation de la MDPH\";}'),(99,'Pôle de compétences et de prestations externalisées (PCPE)','a:1:{i:0;s:67:\"Etablissements et services spécialisés sur orientation de la MDPH\";}'),(100,'Service d‘accompagnement à la Vie Sociale (S.A.V.S.)','a:1:{i:0;s:67:\"Etablissements et services spécialisés sur orientation de la MDPH\";}'),(101,'Service d\'accompagnement médico-social pour adultes handicapés (S.A.M.S.A.H)','a:1:{i:0;s:67:\"Etablissements et services spécialisés sur orientation de la MDPH\";}'),(102,'Service d\'Éducation Spéciale et de Soins à Domicile (S.E.S.S.A.D) -SPASAD','a:1:{i:0;s:67:\"Etablissements et services spécialisés sur orientation de la MDPH\";}'),(103,'SSIAD','a:1:{i:0;s:67:\"Etablissements et services spécialisés sur orientation de la MDPH\";}'),(104,'Autres','a:5:{i:0;s:67:\"Etablissements et services spécialisés sur orientation de la MDPH\";i:1;s:26:\"Structures en accès libre\";i:2;s:38:\"Petite enfance et scolarité ordinaire\";i:3;s:21:\"Réseaux d’entraide\";i:4;s:59:\"Service d’information, d’orientation et de coordination\";}'),(105,'Centre d’action médico-sociale précoce (CAMSP)','a:1:{i:0;s:26:\"Structures en accès libre\";}'),(106,'Centre médico-psycho-pédagogique (CMPP)','a:1:{i:0;s:26:\"Structures en accès libre\";}'),(107,'Service hospitalier','a:1:{i:0;s:26:\"Structures en accès libre\";}'),(108,'Centres de ressources, centres de références','a:1:{i:0;s:26:\"Structures en accès libre\";}'),(109,'Equipe mobile experte, équipe relais','a:1:{i:0;s:26:\"Structures en accès libre\";}'),(110,'Réseau de professionnels','a:1:{i:0;s:26:\"Structures en accès libre\";}'),(111,'Service d\'aide à domicile (SAD ou SAAD)','a:1:{i:0;s:26:\"Structures en accès libre\";}'),(112,'Habitat alternatif / habitat inclusif','a:1:{i:0;s:26:\"Structures en accès libre\";}'),(113,'Crèche / garderie / structure petite enfance','a:1:{i:0;s:38:\"Petite enfance et scolarité ordinaire\";}'),(114,'ULIS','a:1:{i:0;s:38:\"Petite enfance et scolarité ordinaire\";}'),(115,'Etablissements adaptés ou spécifiques','a:1:{i:0;s:38:\"Petite enfance et scolarité ordinaire\";}'),(116,'Groupement d’entraide mutuelle','a:1:{i:0;s:21:\"Réseaux d’entraide\";}'),(117,'Associations (de parents, d’usagers, de loisirs…)','a:1:{i:0;s:21:\"Réseaux d’entraide\";}'),(118,'Plateforme territoriale d’appui (PTA)','a:1:{i:0;s:59:\"Service d’information, d’orientation et de coordination\";}'),(119,'Plateformes','a:1:{i:0;s:59:\"Service d’information, d’orientation et de coordination\";}'),(120,'Media : site internet, blog, pages ou groupes facebook, radio, presse','a:1:{i:0;s:59:\"Service d’information, d’orientation et de coordination\";}');
/*!40000 ALTER TABLE `structures_list` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-21  9:08:00
