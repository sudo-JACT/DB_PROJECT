-- Adminer 5.5.0 MariaDB 12.3.2-MariaDB-ubu2404 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `proddb`;

SET NAMES utf8mb4;

CREATE TABLE `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `publication_date` date DEFAULT NULL,
  `image_path` text DEFAULT NULL,
  `descr` text DEFAULT NULL,
  `linky` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

INSERT INTO `album` (`id`, `name`, `publication_date`, `image_path`, `descr`, `linky`) VALUES
(1,	'From Mars to Sirius',	'2005-09-27',	'../imgs/albums/from_mars_to_sirius.jpg',	NULL,	NULL),
(2,	'The Way of All Flesh',	'2008-10-13',	'../imgs/albums/the_way_of_all_flesh.jpg',	NULL,	NULL),
(3,	'Lateralus',	'2001-05-15',	'../imgs/albums/lateralus.jpeg',	NULL,	NULL),
(4,	'Meta',	'2016-10-28',	'../imgs/albums/meta.jpg',	NULL,	NULL),
(5,	'Turbe Sarde',	'2023-12-15',	'../imgs/albums/turbe-sarde.webp',	NULL,	NULL),
(6,	'Maps of Non-Existent Places',	'2012-06-08',	'../imgs/albums/non-existent.jpeg',	NULL,	NULL),
(7,	'Mesmer',	'2017-03-24',	'../imgs/albums/Mesmer.jpg',	NULL,	NULL),
(8,	'Count Your Blessings Repented',	'2026-07-10',	'../imgs/albums/Count_Your_Blessings_Repented.jpg',	NULL,	NULL),
(9,	'Exhibition Of Prowess',	'2024-09-20',	'../imgs/albums/Exhibition_Of_Prowess.jpg',	NULL,	NULL),
(10,	'Fatalism',	'2023-09-01',	'../imgs/albums/Fatalism.jpg',	NULL,	NULL),
(11,	'Hard Feelings',	'2018-03-23',	'	../imgs/albums/Hard_Feelings.webp',	NULL,	NULL),
(12,	'Destrier',	'2015-08-07',	'../imgs/albums/Destrier.jpg',	NULL,	NULL),
(13,	'The Darkest Place I\'ve Ever Been',	'2025-04-25',	'../imgs/albums/The_darkest_Place_Ive_Ever_Been.jpg',	NULL,	NULL)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `name` = VALUES(`name`), `publication_date` = VALUES(`publication_date`), `image_path` = VALUES(`image_path`), `descr` = VALUES(`descr`), `linky` = VALUES(`linky`);

CREATE TABLE `artist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `bday` date DEFAULT NULL,
  `image_path` text DEFAULT NULL,
  `bio` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

INSERT INTO `artist` (`id`, `name`, `bday`, `image_path`, `bio`) VALUES
(1,	'Dario Moccia',	'1990-08-29',	'../imgs/artists/dario-moccia.jpg_large',	NULL)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `name` = VALUES(`name`), `bday` = VALUES(`bday`), `image_path` = VALUES(`image_path`), `bio` = VALUES(`bio`);

CREATE TABLE `band` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `creation_date` date NOT NULL,
  `image_path` text DEFAULT NULL,
  `descr` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

INSERT INTO `band` (`id`, `name`, `creation_date`, `image_path`, `descr`) VALUES
(1,	'Gojira',	'1996-01-01',	'../imgs/bands/gojira.jpg',	NULL),
(2,	'TOOL',	'1990-01-01',	'../imgs/bands/tool.webp',	NULL),
(3,	'Car Bomb',	'2000-01-01',	'../imgs/bands/carbomb.jpg',	NULL),
(4,	'Dario Moccia',	'1990-08-29',	'../imgs/artists/dario-moccia.jpeg',	NULL),
(5,	'Thank You Scientist',	'2001-01-01',	'../imgs/bands/thank_you_scientist.jpg',	NULL),
(6,	'Northlane',	'2009-01-01',	'../imgs/bands/Northlane.jpg',	NULL),
(7,	'Agent Fresco',	'2008-01-01',	'../imgs/bands/Agent_Fresco.jpg',	NULL),
(8,	'Blessthefall',	'2002-01-01',	'../imgs/bands/Blessthefall.jpg',	NULL),
(9,	'Bring Me The Horizon',	'2004-01-01',	'../imgs/bands/Bring_Me_The_Horizon.jpg',	NULL),
(10,	'Kublai Khan TX',	'2009-01-01',	'../imgs/bands/Kublai_Khan TX.webp',	NULL),
(11,	'Landmvrks',	'2014-01-01',	'../imgs/bands/Landmvrks.jpg',	NULL),
(12,	'Polaris',	'2012-01-01',	'../imgs/bands/Polaris.jpg',	NULL)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `name` = VALUES(`name`), `creation_date` = VALUES(`creation_date`), `image_path` = VALUES(`image_path`), `descr` = VALUES(`descr`);

CREATE TABLE `genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

INSERT INTO `genre` (`id`, `name`) VALUES
(1,	'Metal'),
(2,	'Prog'),
(3,	'Alt'),
(4,	'Slam'),
(5,	'Groove')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `name` = VALUES(`name`);

CREATE TABLE `ispartof` (
  `album_id` int(11) DEFAULT NULL,
  `song_id` int(11) DEFAULT NULL,
  `num` int(11) NOT NULL CHECK (`num` > 0),
  KEY `album_id` (`album_id`),
  KEY `song_id` (`song_id`),
  CONSTRAINT `1` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`),
  CONSTRAINT `2` FOREIGN KEY (`song_id`) REFERENCES `song` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;


CREATE TABLE `members` (
  `band_id` int(11) DEFAULT NULL,
  `artist_id` int(11) DEFAULT NULL,
  KEY `band_id` (`band_id`),
  KEY `artist_id` (`artist_id`),
  CONSTRAINT `1` FOREIGN KEY (`band_id`) REFERENCES `band` (`id`),
  CONSTRAINT `2` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;


CREATE TABLE `published` (
  `band_id` int(11) DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL,
  KEY `band_id` (`band_id`),
  KEY `album_id` (`album_id`),
  CONSTRAINT `1` FOREIGN KEY (`band_id`) REFERENCES `band` (`id`),
  CONSTRAINT `2` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

INSERT INTO `published` (`band_id`, `album_id`) VALUES
(1,	1),
(1,	2),
(3,	4),
(2,	3),
(4,	5),
(5,	6),
(6,	7),
(9,	8),
(10,9),
(12,10),
(8,	11),
(7,	12),
(11,13)
ON DUPLICATE KEY UPDATE `band_id` = VALUES(`band_id`), `album_id` = VALUES(`album_id`);

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


CREATE TABLE `song` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `duration` time NOT NULL,
  `descr` text DEFAULT NULL,
  `linky` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;


CREATE TABLE `soundlike` (
  `album_id` int(11) DEFAULT NULL,
  `genre_id` int(11) DEFAULT NULL,
  KEY `album_id` (`album_id`),
  KEY `genre_id` (`genre_id`),
  CONSTRAINT `1` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`),
  CONSTRAINT `2` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

INSERT INTO `soundlike` (`album_id`, `genre_id`) VALUES
(1,	1),
(1,	2),
(1,	5)
ON DUPLICATE KEY UPDATE `album_id` = VALUES(`album_id`), `genre_id` = VALUES(`genre_id`);

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `passwd` text NOT NULL,
  `email` text NOT NULL,
  `bday` date NOT NULL,
  `image_path` text DEFAULT NULL,
  `isadmin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

INSERT INTO `user` (`id`, `username`, `passwd`, `email`, `bday`, `image_path`, `isadmin`) VALUES
(1,	'imdonkey',	'*91D9861DFC07DD967611B8C96953474EF270AD5E',	'lol@lmao.com',	'2005-05-14',	'./imgs/users/imdonkey.jpeg',	1),
(2,	'Bonz',	'*A4B6157319038724E3560894F7F932C8886EBFCF',	'idk@gmail.com',	'2000-01-01',	'./imgs/users/bonza.jpeg',	1),
(3,	'idk',	'*78206C4A13995561F9E4D7E835F1A668F3866F4E',	'idk@idk.com',	'2025-07-28',	'',	0)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `username` = VALUES(`username`), `passwd` = VALUES(`passwd`), `email` = VALUES(`email`), `bday` = VALUES(`bday`), `image_path` = VALUES(`image_path`), `isadmin` = VALUES(`isadmin`);

-- 2026-07-29 10:55:12 UTC