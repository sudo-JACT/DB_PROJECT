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
  `price` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album`
--

LOCK TABLES `album` WRITE;
/*!40000 ALTER TABLE `album` DISABLE KEYS */;
INSERT INTO `album` VALUES
(1,'From Mars to Sirius','2005-09-27','../imgs/albums/from_mars_to_sirius.jpg','From Mars to Sirius is the third studio album by French heavy metal band Gojira. It is a concept album addressing environmental issues and the rebirth of a dead planet through a space travel storyline, with the underlying theme of a transition from war to peace. From Mars to Sirius was released in 2005 to critical acclaim. It has since been ranked amongst the Rolling Stone\'s 100 Greatest Metal Albums of All Time.','https://youtu.be/z70ch7cE8ak?si=j9UGRA1hsdV4v1ue',25.32),
(2,'The Way of All Flesh','2008-10-13','../imgs/albums/the_way_of_all_flesh.jpg','\'The Way of All Flesh\' is the fourth studio album by the French band Gojira, released on October 13, 2008, in Europe by Listenable Records and the following day in North America by Prosthetic Records','https://youtu.be/Kf4eR4FVKzE?si=haCxLAXFWctaLWu_',22.99),
(3,'Lateralus','2001-05-15','../imgs/albums/lateralus.jpeg','Lateralus is the third studio album by the American band Tool, released on May 15, 2001, by Volcano II. In January 2001, the band announced that the album’s title was to be Systema Encéphale, but the following month they revealed that the actual title was Lateralus, contradicting what the media had already reported as the title of the new album.','https://youtu.be/3BXyEUOuNds?si=U1iaMrrrc5X7DZXT',32),
(4,'Meta','2016-10-28','../imgs/albums/meta.jpg','Meta is the third album by the American band Car Bomb. The album was produced by Gojira\'s Joseph Duplantier and guitarist Greg Kubacki and released independently on digital and CD formats on 28 October 2016','https://youtu.be/bUVcnsiRQ4M?si=R2i3CJeie4-CNYRi',36.8),
(5,'Turbe Sarde','2023-12-15','../imgs/albums/turbe-sarde.webp','\'Turbe Sarde\' is a song released in 2023, written primarily by Venz (Vincenzo Vespertilli) and Dario Moccia, produced in collaboration with Mr. Distruzione Musica and featuring Mike Lennon','https://youtu.be/omnjIOuBEoY?si=DXwoqR3LDZsQTJKS',5.5),
(6,'Maps of Non-Existent Places','2012-06-08','../imgs/albums/non-existent.jpeg','Maps of Non-Existent Places is the debut full-length album by progressive rock band Thank You Scientist. This is the only album to feature Greg Colacino on bass and Russ Lynch on violin, viola and mandolin.','https://youtu.be/IEYP_ExqR48?si=KjoKS_bgguLyujpH',34.85),
(7,'Mesmer','2017-03-24','../imgs/albums/Mesmer.jpg','Mesmer is the fourth studio album by Australian heavy metal band Northlane. It was released on 24 March 2017 through UNFD, with no announcement prior to the release. It was produced by David Bendeth and recorded at The Barber Shop Studio in Hopatcong. It follows the group\'s slight departure from their metalcore roots and towards a more alternative and experimental sound, as established on their previous release, Node. It peaked at No. 3 on the ARIA Albums Chart. It is the last Northlane album to feature their founding bassist Alex Milovic as a member of the band.','https://youtu.be/anQ836BXbYw?si=1xKLYc0I2PsP7SGO',44.63),
(8,'Count Your Blessings Repented','2026-07-10','../imgs/albums/Count_Your_Blessings_Repented.jpg','Count Your Blessings | Repented is a fully re-recorded, 20th-anniversary studio edition of the British rock band Bring Me The Horizon\'s debut album, Count Your Blessings. Originally released in 2006 during the band\'s early deathcore phase, the album was re-envisioned, modernized, and released on July 10, 2026, through Sony/RCA','https://youtu.be/yPFZu_-PbyM?si=4KjwMASJ9eiHNZXT',26.99),
(9,'Exhibition Of Prowess','2024-09-20','../imgs/albums/Exhibition_Of_Prowess.jpg','Exhibition of Prowess is the fifth studio album by the American metalcore band Kublai Khan TX, released on September 20, 2024, through Rise Records','https://youtu.be/91sH04HAlDE?si=5t99Tu_YpxbFk51N',25.9),
(10,'Fatalism','2023-09-01','../imgs/albums/Fatalism.jpg','Fatalism is the third studio album by Australian metalcore band Polaris. The band produced and recorded the album in Melbourne in 2022 with Lance Prenc engineering and Alpha Wolf guitarist Scottie Simpson on vocal recording duties. The album was released on 1 September 2023 under Resist Records and SharpTone Records. It is the band\'s final album with lead guitarist Ryan Siew, after his death on 19 June 2023, with his recordings completed beforehand and released posthumously','https://youtu.be/ZGQAMsGncGQ?si=KYWVME0j7TAENILq',45.87),
(11,'Hard Feelings','2018-03-23','../imgs/albums/Hard_Feelings.webp','Hard Feelings is the sixth studio album by the American metalcore band Blessthefall. The album was released on March 23, 2018, through Rise Records. It was produced by Tyler Smyth and the band themselves. It is their first album to be released after the band signed to Rise Records in 2018. It is also the last album to feature the band\'s founding drummer Matt Traynor before he left the band in August 2018','https://youtu.be/IgTi5u1HxUI?si=vlcKsptfg_x69mox',13.99),
(12,'Destrier','2015-08-07','../imgs/albums/Destrier.jpg','Destrier is the second album by rock band Agent Fresco','https://youtu.be/7WFxRmZoRN8?si=rBVkNGOXPa4PoPfJ',24.75),
(13,'The Darkest Place I\'ve Ever Been','2025-04-25','../imgs/albums/The_darkest_Place_Ive_Ever_Been.jpg','The Darkest Place I\'ve Ever Been is a metalcore and concept album released by the French band Landmvrks on April 25, 2025, via Arising Empire','https://youtu.be/xqB-elk9lZU?si=fcSyRyGON4vJ53mS',25.3),
(14,'Songs for the Deaf','1996-02-07','../imgs/albums/song_for_the_deaf.jpeg','Songs for the Deaf is the third studio album by the American rock band Queens of the Stone Age, released on August 27, 2002, by Interscope Records. It features many guest musicians, and was the last Queens of the Stone Age album to feature Nick Oliveri on bass. It was also the first Queens of the Stone Age album to feature Dave Grohl on drums, with the second being …Like Clockwork in 2013, where he would feature on half of the track list. Songs for the Deaf is a loose concept album, taking the listener on a drive through the California desert from Los Angeles to Joshua Tree, tuning into radio stations from towns along the way such as Banning and Chino Hills.','https://www.youtube.com/watch?v=uo3l2vDZTjc',23.99);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artist`
--

LOCK TABLES `artist` WRITE;
/*!40000 ALTER TABLE `artist` DISABLE KEYS */;
INSERT INTO `artist` VALUES
(1,'Dario Moccia','1990-08-29','../imgs/artists/dario-moccia.jpg_large',NULL),
(2,'Mario Duplantier','1981-06-19','../imgs/artists/image_2026-07-30_122444506.png','Mario'),
(3,'Joe Duplantier','1976-10-19','../imgs/artists/image_2026-07-30_122958570.png','Joe'),
(4,'idk2','2026-07-30','../imgs/artists/IMG_2441.PNG','');
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
(1,'Gojira','1996-01-01','../imgs/bands/gojira.jpg','Gojira is a French heavy metal band from Ondres. Founded as Godzilla in 1996, the band\'s lineup – brothers Joe (vocals, guitar) and Mario Duplantier (drums), Christian Andreu (guitar), and Jean-Michel Labadie (bass) – has been the same since the band changed its name to Gojira in 2001. Gojira has been known for its progressive and technical death metal styles and lyrics that often feature themes of spirituality, philosophy, and environmentalism. The band has gone \'from the utmost obscurity during the first half of their career to widespread global recognition in the second\''),
(2,'TOOL','1990-01-01','../imgs/bands/tool.webp','Tool is an American rock band formed in Los Angeles in 1990. The group consists of vocalist Maynard James Keenan, guitarist Adam Jones, drummer Danny Carey and bassist Justin Chancellor, who replaced founding member Paul D\'Amour in 1995. Tool has won four Grammy Awards, performed worldwide tours, and produced albums topping charts in several countries'),
(3,'Car Bomb','2000-01-01','../imgs/bands/carbomb.jpg','Car Bomb (stylized as [Car_Bomb]) is an American mathcore band from Rockville Centre, New York that was initially formed in 2000. Their debut album, Centralia, was released through Relapse Records on February 6, 2007'),
(4,'Dario Moccia','1990-08-29','../imgs/artists/dario-moccia.jpeg','Dario Moccia non è un cantante professionista, ma un noto content creator, streamer e fumettista italiano. Le tracce musicali a suo nome presenti sulle piattaforme (come il brano Turbe Sarde o jingle come È l\'ora dello sbusto) nascono da gag, sigle o collaborazioni nate all\'interno delle sue dirette su Twitch e create insieme alla sua community o ad altri artisti per puro spirito di intrattenimento'),
(5,'Thank You Scientist','2001-01-01','../imgs/bands/thank_you_scientist.jpg','Thank You Scientist is an American progressive rock band from Montclair, New Jersey. Their first EP, The Perils of Time Travel, was released in 2011, and their debut studio album, Maps of Non-Existent Places, releasing three years later, was named the \'Revolver Album of the Week\' in October 2014. Their second album, Stranger Heads Prevail, was released in July 2016. Their third album, Terraformer, was released in June 2019. In 2021, they released their second EP, Plague Accommodations'),
(6,'Northlane','2009-01-01','../imgs/bands/Northlane.jpg','Northlane are an Australian metalcore band from Blacktown, formed in 2009. The band comprises guitarists Jon Deiley and Josh Smith, drummer Nic Pettersen and vocalist Marcus Bridge. Northlane have released six studio albums: Discoveries (11 November 2011); Singularity (22 March 2013), which reached No. 3 on the ARIA Albums Chart; Node (24 July 2015), a number-one album; Mesmer (24 March 2017), Alien (2 August 2019) and Obsidian (22 April 2022). At the ARIA Music Awards of 2015 the group won the Best Hard Rock or Heavy Metal Album category for their album Node. At the ARIA Music Awards of 2017, the band won again with Mesmer. The band won the Best Hard Rock or Heavy Metal Album category for the third time at the ARIA Music Awards of 2019 for their 2019 album Alien'),
(7,'Agent Fresco','2008-01-01','../imgs/bands/Agent_Fresco.jpg','Agent Fresco are an Icelandic band that combines pop, alternative, art, and math rock. They formed in 2008, just weeks prior to winning the Músíktilraunir. Their first release was the EP Lightbulb Universe, which won at the Kraumur Awards. The lead singer is Arnór Dan Arnarson. Vignir Rafn Hilmarsson plays bass guitar as well as the electric upright bass, Hrafnkell Örn Guðjónsson plays the drums, and Þórarinn Guðnason plays the guitar and piano/keyboards. In late 2010, Agent Fresco released their first full-length album, A Long Time Listening. Destrier, their second full-length album, followed on 7 August 2015'),
(8,'Blessthefall','2002-01-01','../imgs/bands/Blessthefall.jpg','Blessthefall (stylized as blessthefall prior to 2013 or BLESSTHEFALL since 2013) is an American metalcore and post-hardcore band from Phoenix, Arizona. It was founded in 2004 by guitarist Mike Frisby, drummer Matt Traynor, and bassist/vocalist Jared Warth. Their debut studio album, His Last Walk, with original vocalist Craig Mabbitt, was released in 2006'),
(9,'Bring Me The Horizon','2004-01-01','../imgs/bands/Bring_Me_The_Horizon.jpg','Bring Me the Horizon are a British rock band formed in 2004 in Sheffield, England. The group currently consists of lead vocalist Oli Sykes, drummer Matt Nicholls, guitarist Lee Malia and bassist Matt Kean. They are signed to RCA Records globally and Columbia Records exclusively in the United States.'),
(10,'Kublai Khan TX','2009-01-01','../imgs/bands/Kublai_Khan TX.webp','Kublai Khan is an American metalcore band from Sherman, Texas. The group formed in the summer of 2009, and they have released five albums and two EPs.'),
(11,'Landmvrks','2014-01-01','../imgs/bands/Landmvrks.jpg','Landmvrks (pronounced and originally spelt \'Landmarks\', now stylised in all caps, LANDMVRKS) is a French metalcore band from Marseille, formed in 2014. The band has since released four studio albums and is signed to Arising Empire.'),
(12,'Polaris','2012-01-01','../imgs/bands/Polaris.jpg','Polaris are an Australian metalcore band from Sydney. The band consists of vocalist Jamie Hails, guitarist Rick Schneider, bassist/vocalist Jake Steinhauser and drummer Daniel Furnari.'),
(13,'Queens of the Stone Age','1996-01-01','../imgs/bands/queens.jpeg','Dopo lo scioglimento dei Kyuss');
/*!40000 ALTER TABLE `band` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `user_id` int(11) DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  KEY `user_id` (`user_id`),
  KEY `album_id` (`album_id`),
  CONSTRAINT `1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `2` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`),
  CONSTRAINT `quantity` CHECK (`quantity` > 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES
(1,6,1),
(1,5,1),
(1,3,2),
(1,13,3),
(1,1,1);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
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
(2,1,8),
(2,2,1),
(2,3,2),
(2,4,3),
(2,5,4),
(2,6,5),
(2,7,6),
(2,8,7),
(2,9,10),
(2,10,11),
(2,11,12);
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
  `role` text DEFAULT NULL,
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
INSERT INTO `members` VALUES
(4,1,NULL),
(1,2,'Drummer'),
(1,3,'Vocalist, Guitarist'),
(NULL,4,NULL);
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
  `quantity` int(11) DEFAULT NULL CHECK (`quantity` > 0),
  `dat` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `album_id` (`album_id`),
  CONSTRAINT `1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `2` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sale`
--

LOCK TABLES `sale` WRITE;
/*!40000 ALTER TABLE `sale` DISABLE KEYS */;
INSERT INTO `sale` VALUES
(2,1,10,10,'2026-08-03 10:07:54'),
(3,1,1,1,'2026-08-03 10:13:59'),
(4,1,2,1,'2026-08-03 10:13:59'),
(5,1,4,4,'2026-08-03 10:16:22'),
(6,1,3,3,'2026-08-03 10:16:22');
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `song`
--

LOCK TABLES `song` WRITE;
/*!40000 ALTER TABLE `song` DISABLE KEYS */;
INSERT INTO `song` VALUES
(1,'The Art of Dying','00:00:10','Peak','https://youtu.be/iJqVjglvnoc?si=2Ln42_SN5VbKKol8'),
(2,'Oroborus','00:00:05','Serpent of light, movement of the soul\r\nCrawling stately along the spine\r\nMighty phoenix from the ashes arises\r\nFirebird cycle','https://youtu.be/BfDaJREgrw0?si=_H37MrLlxKkEyNal'),
(3,'Toxic Garbage Island','00:00:04','Mysterious form, soul in the dark\r\nUnder this heavy sealing concrete waves\r\nFollowed by servants, funeral cortège','https://youtu.be/68G3Yfb6PSE?si=b2o18BCWkRlag6nx'),
(4,'A Sight to Behold','00:00:05','Reflecting ourselves in the blood of all the beings we slay\r\nMisunderstand each other, out of control we remain\r\nThere is a mystery, we\'re facing a sight to behold','https://youtu.be/hIPDOOLBSpc?si=BE3cEydbV5frUnxS'),
(5,'Yama\'s Messengers','00:00:04','I\'m scared to death when I see them arrive\r\nInfected eyes, red, staring at me\r\nThe time has come for retribution','https://youtu.be/zzDq3SiO1qY?si=DplRt-xRA5mzPg5g'),
(6,'The Silver Cord','00:00:02','In metaphysical studies and literature, the silver cord, also known as the sutratma or life thread of the antahkarana, refers to a life-giving linkage from the higher self (atma) down to the physical body. It also refers to an extended synthesis of this thread and a second (the consciousness thread, passing from the soul to the physical body) that connects the physical body to the etheric body, onwards to the astral body and finally to the mental body.','https://youtu.be/Wr8vC1FzcLk?si=owu7FEHDdz0hAk2T'),
(7,'All the Tears','00:00:03','Are we left all alone?\r\nMother has no time, but she cares for me\r\nAnd she cries all the tears','https://youtu.be/7CGV5MRK6_k?si=igc6OtlKABddZWR4'),
(8,'Adoration for None','00:00:06','Everyone is doing their best to destroy it\r\nSimplicity\'s forgotten\r\nAnd we all drill the ground','https://youtu.be/xPhmDcmy_YY?si=x2HSjtP1uQbSADUC'),
(9,'Esoteric Surgery','00:00:05','You have the power to heal yourself\r\nAll illness can be healed, the cell regenerates\r\nDisambiguated situation','https://youtu.be/M6se_mW06ow?si=jVjq6O8Qe_frIJ8-'),
(10,'Wolf Down the Earth','00:00:06','First of all, you will eat all the bodies\r\nNo matter they pray for freedom, they\'ll kill you\r\nForward you crush those going backwards','https://youtu.be/Q0bPD6XkyWg?si=xL78bOan2Nu3O9cJ'),
(11,'The Way of All Flesh','00:00:17','Anything that has a shape will crumble away, disappear\r\nWe belong to the circle life of all creation\r\nWe crawl, deny ourselves, refuse this evidence','https://youtu.be/A0UCunCKD2E?si=pE4XM3jXeMJDsf5J');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
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

-- Dump completed on 2026-08-04 18:39:33
