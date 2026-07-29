-- MariaDB dump 10.19-11.1.2-MariaDB, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: proddb
-- ------------------------------------------------------
-- Server version	12.2.2-MariaDB-ubu2404

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `album`
--

DROP TABLE IF EXISTS `album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `publication_date` date DEFAULT NULL,
  `image_path` text DEFAULT NULL,
  `descr` text DEFAULT NULL,
  `linky` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album`
--

LOCK TABLES `album` WRITE;
/*!40000 ALTER TABLE `album` DISABLE KEYS */;
INSERT INTO `album` VALUES
(1,'From Mars to Sirius','2005-09-27','../imgs/albums/from_mars_to_sirius.jpg',NULL,NULL),
(2,'The Way of All Flesh','2008-10-13','../imgs/albums/the_way_of_all_flesh.jpg',NULL,NULL),
(3,'Lateralus','2001-05-15','../imgs/albums/lateralus.jpeg',NULL,NULL),
(4,'Meta','2016-10-28','../imgs/albums/meta.jpg',NULL,NULL),
(5,'Turbe Sarde','2023-12-15','../imgs/albums/turbe-sarde.webp',NULL,NULL),
(6,'Maps of Non-Existent Places','2012-06-08','../imgs/albums/non-existent.jpeg',NULL,NULL),
(7,'Mesmer','2017-03-24','../imgs/albums/Mesmer.jpg',NULL,NULL),
(8,'Count Your Blessings Repented','2026-07-10','../imgs/albums/Count_Your_Blessings_Repented.jpg',NULL,NULL),
(9,'Exhibition Of Prowess','2024-09-20','../imgs/albums/Exhibition_Of_Prowess.jpg',NULL,NULL),
(10,'Fatalism','2023-09-01','../imgs/albums/Fatalism.jpg',NULL,NULL),
(11,'Hard Feelings','2018-03-23','	../imgs/albums/Hard_Feelings.webp',NULL,NULL),
(12,'Destrier','2015-08-07','../imgs/albums/Destrier.jpg',NULL,NULL),
(13,'The Darkest Place I\'ve Ever Been','2025-04-25','../imgs/albums/The_darkest_Place_Ive_Ever_Been.jpg',NULL,NULL),
(14,'Songs for the Deaf','2002-08-27','../imgs/albums/song_for_the_deaf.jpeg','Hell Yeah',NULL);
/*!40000 ALTER TABLE `album` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artist`
--

DROP TABLE IF EXISTS `artist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `bday` date DEFAULT NULL,
  `image_path` text DEFAULT NULL,
  `bio` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artist`
--

LOCK TABLES `artist` WRITE;
/*!40000 ALTER TABLE `artist` DISABLE KEYS */;
INSERT INTO `artist` VALUES
(1,'Dario Moccia','1990-08-29','../imgs/artists/dario-moccia.jpg_large',NULL);
/*!40000 ALTER TABLE `artist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `band`
--

DROP TABLE IF EXISTS `band`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `band` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `creation_date` date NOT NULL,
  `image_path` text DEFAULT NULL,
  `descr` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `band`
--

LOCK TABLES `band` WRITE;
/*!40000 ALTER TABLE `band` DISABLE KEYS */;
INSERT INTO `band` VALUES
(1,'Gojira','1996-01-01','../imgs/bands/gojira.jpg',NULL),
(2,'TOOL','1990-01-01','../imgs/bands/tool.webp',NULL),
(3,'Car Bomb','2000-01-01','../imgs/bands/carbomb.jpg',NULL),
(4,'Dario Moccia','1990-08-29','../imgs/artists/dario-moccia.jpeg',NULL),
(5,'Thank You Scientist','2001-01-01','../imgs/bands/thank_you_scientist.jpg','Just a bunch of guys'),
(6,'Northlane','2009-01-01','../imgs/bands/Northlane.jpg',NULL),
(7,'Agent Fresco','2008-01-01','../imgs/bands/Agent_Fresco.jpg',NULL),
(8,'Blessthefall','2002-01-01','../imgs/bands/Blessthefall.jpg',NULL),
(9,'Bring Me The Horizon','2004-01-01','../imgs/bands/Bring_Me_The_Horizon.jpg',NULL),
(10,'Kublai Khan TX','2009-01-01','../imgs/bands/Kublai_Khan TX.webp',NULL),
(11,'Landmvrks','2014-01-01','../imgs/bands/Landmvrks.jpg',NULL),
(12,'Polaris','2012-01-01','../imgs/bands/Polaris.jpg',NULL),
(13,'Queens of the Stone Age','1996-01-01','../imgs/bands/queens.jpeg','A bunch of guys');
/*!40000 ALTER TABLE `band` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS `genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genre`
--

LOCK TABLES `genre` WRITE;
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` VALUES
(1,'Metal'),
(2,'Prog'),
(3,'Alt'),
(4,'Slam'),
(5,'Groove');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ispartof`
--

DROP TABLE IF EXISTS `ispartof`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ispartof` (
  `album_id` int(11) DEFAULT NULL,
  `song_id` int(11) DEFAULT NULL,
  `num` int(11) NOT NULL CHECK (`num` > 0),
  KEY `album_id` (`album_id`),
  KEY `song_id` (`song_id`),
  CONSTRAINT `1` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`),
  CONSTRAINT `2` FOREIGN KEY (`song_id`) REFERENCES `song` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ispartof`
--

LOCK TABLES `ispartof` WRITE;
/*!40000 ALTER TABLE `ispartof` DISABLE KEYS */;
INSERT INTO `ispartof` VALUES
(2,1,8);
/*!40000 ALTER TABLE `ispartof` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `band_id` int(11) DEFAULT NULL,
  `artist_id` int(11) DEFAULT NULL,
  KEY `band_id` (`band_id`),
  KEY `artist_id` (`artist_id`),
  CONSTRAINT `1` FOREIGN KEY (`band_id`) REFERENCES `band` (`id`),
  CONSTRAINT `2` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `published`
--

DROP TABLE IF EXISTS `published`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `published` (
  `band_id` int(11) DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL,
  KEY `band_id` (`band_id`),
  KEY `album_id` (`album_id`),
  CONSTRAINT `1` FOREIGN KEY (`band_id`) REFERENCES `band` (`id`),
  CONSTRAINT `2` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `published`
--

LOCK TABLES `published` WRITE;
/*!40000 ALTER TABLE `published` DISABLE KEYS */;
INSERT INTO `published` VALUES
(1,1),
(1,2),
(3,4),
(2,3),
(4,5),
(5,6),
(6,7),
(9,8),
(10,9),
(12,10),
(8,11),
(7,12),
(11,13),
(13,14);
/*!40000 ALTER TABLE `published` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sale`
--

DROP TABLE IF EXISTS `sale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sale` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `album_id` (`album_id`),
  CONSTRAINT `1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `2` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sale`
--

LOCK TABLES `sale` WRITE;
/*!40000 ALTER TABLE `sale` DISABLE KEYS */;
/*!40000 ALTER TABLE `sale` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `song`
--

DROP TABLE IF EXISTS `song`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `song` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `duration` time NOT NULL,
  `descr` text DEFAULT NULL,
  `linky` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `song`
--

LOCK TABLES `song` WRITE;
/*!40000 ALTER TABLE `song` DISABLE KEYS */;
INSERT INTO `song` VALUES
(1,'The Art of Dying','00:00:10','Peak','https://youtu.be/iJqVjglvnoc?si=2Ln42_SN5VbKKol8');
/*!40000 ALTER TABLE `song` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `soundlike`
--

DROP TABLE IF EXISTS `soundlike`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `soundlike` (
  `album_id` int(11) DEFAULT NULL,
  `genre_id` int(11) DEFAULT NULL,
  KEY `album_id` (`album_id`),
  KEY `genre_id` (`genre_id`),
  CONSTRAINT `1` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`),
  CONSTRAINT `2` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `soundlike`
--

LOCK TABLES `soundlike` WRITE;
/*!40000 ALTER TABLE `soundlike` DISABLE KEYS */;
INSERT INTO `soundlike` VALUES
(1,1),
(1,2),
(1,5);
/*!40000 ALTER TABLE `soundlike` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `passwd` text NOT NULL,
  `email` text NOT NULL,
  `bday` date NOT NULL,
  `image_path` text DEFAULT NULL,
  `isadmin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES
(1,'imdonkey','*91D9861DFC07DD967611B8C96953474EF270AD5E','lol@lmao.com','2005-05-14','./imgs/users/imdonkey.jpeg',1),
(2,'Bonz','*A4B6157319038724E3560894F7F932C8886EBFCF','idk@gmail.com','2000-01-01','./imgs/users/bonza.jpeg',1),
(3,'idk','*78206C4A13995561F9E4D7E835F1A668F3866F4E','idk@idk.com','2025-07-28','',0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-07-30  0:39:40
