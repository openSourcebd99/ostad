-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for blog
CREATE DATABASE IF NOT EXISTS `blog` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `blog`;

-- Dumping structure for table blog.contact
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `email` varchar(180) NOT NULL,
  `subject` varchar(190) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table blog.contact: ~2 rows (approximately)
INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
	(1, 'Alex', 'alex@gmail.com', 'Science', 'Created For Ostad Web Development With PHP &amp; Laravel| All Rights ReservedCreated For Ostad Web Development With PHP &amp; Laravel| All Rights ReservedCreated For Ostad Web Development With PHP &amp; Laravel| All Rights Reserved'),
	(2, 'John', 'john@gmail.com', 'Test', 'This is for actually testing purpose');

-- Dumping structure for table blog.post
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `category` varchar(150) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table blog.post: ~0 rows (approximately)
INSERT INTO `post` (`id`, `title`, `category`, `photo`, `description`, `user_id`, `create_at`) VALUES
	(1, 'LoRa is a physical proprietary', 'Nature', 'road-1072823_960_720.jpg', 'LoRa is a physical proprietary radio communication technique. It is based on spread spectrum modulation techniques derived from chirp spread spectrum technology. It was developed by Cycleo, a company of Grenoble, France, later acquired by Semtech. LoRaWAN defines the communication protocol and system architecture', 1, '2023-04-03 07:23:45'),
	(2, 'New UK plan to reach net zero goal faces criticism', 'Industries', '20230403101525_news.JPG', 'The government was forced to publish this &quot;Powering up Britain&quot; strategy after the High Court judged last July that its current plan was not detailed enough to show how the UK would meet its goal to reduce its greenhouse gas emissions to net zero by 2050.', 1, '2023-04-03 08:15:25');

-- Dumping structure for table blog.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(180) NOT NULL,
  `password` varchar(150) NOT NULL,
  `user_role` char(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table blog.users: ~1 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_role`) VALUES
	(1, 'Anna', 'anna@gmail.com', '123', '1');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
