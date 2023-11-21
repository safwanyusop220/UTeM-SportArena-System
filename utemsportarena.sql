-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for utemsportarena_db
CREATE DATABASE IF NOT EXISTS `utemsportarena_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `utemsportarena_db`;

-- Dumping structure for table utemsportarena_db.administrator
CREATE TABLE IF NOT EXISTS `administrator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table utemsportarena_db.administrator: ~0 rows (approximately)
/*!40000 ALTER TABLE `administrator` DISABLE KEYS */;
INSERT INTO `administrator` (`id`, `email`, `password`) VALUES
	(1, 'admin@utem.edu.my', '111111'),
	(2, 'admin@admin', '111111');
/*!40000 ALTER TABLE `administrator` ENABLE KEYS */;

-- Dumping structure for table utemsportarena_db.booking
CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bookingBy` varchar(50) DEFAULT NULL,
  `sportName` varchar(50) DEFAULT NULL,
  `sportVenue` varchar(50) DEFAULT NULL,
  `facility_id` int(11) DEFAULT NULL,
  `dateTime` date DEFAULT NULL,
  `timeSlots` time DEFAULT NULL,
  `studMatric` varchar(50) DEFAULT NULL,
  `studId` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  `studFaculty` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=300 DEFAULT CHARSET=latin1;

-- Dumping data for table utemsportarena_db.booking: ~85 rows (approximately)
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
INSERT INTO `booking` (`id`, `bookingBy`, `sportName`, `sportVenue`, `facility_id`, `dateTime`, `timeSlots`, `studMatric`, `studId`, `status`, `studFaculty`) VALUES
	(202, 'Azri Awi', 'Sepak Takraw', 'Sepak Takraw Court', 6, '2022-01-01', '20:00:00', 'B031910161', '22', 'Reject', NULL),
	(203, 'Azri Awi', 'Volley Ball', 'Volley Ball Court Pusat Sukan', 7, '2022-01-01', '20:00:00', 'B031910161', '22', 'Reject', NULL),
	(204, 'Azri Awi', 'Futsal', 'Futsal Court Pusat Sukan', 8, '2022-02-01', '20:00:00', 'B031910161', '22', 'Approved', NULL),
	(205, 'Azri Awi', 'Kayak', 'Tasik Utama Utem', 9, '2022-03-01', '20:00:00', 'B031910161', '22', 'Reject', NULL),
	(206, 'Azri Awi', 'BasketBall', 'Basketball Court Pusat Sukan', 5, '2022-03-18', '20:00:00', 'B031910161', '22', 'Reject', NULL),
	(207, 'Azri Awi', 'Cycling', 'Pejabat Pusat Sukan', 2, '2022-03-23', '20:00:00', 'B031910161', '22', 'Approved', NULL),
	(208, 'Azri Awi', 'BasketBall', 'Basketball Court Pusat Sukan', 5, '2022-04-10', '20:00:00', 'B031910161', '22', 'Reject', NULL),
	(209, 'Azri Awi', 'Kayak', 'Tasik Utama Utem', 9, '2022-04-02', '20:00:00', 'B031910161', '22', 'Approved', NULL),
	(210, 'Putra Alif', 'Cycling', 'Pejabat Pusat Sukan', 2, '2022-05-09', '20:00:00', 'B031910124', '21', 'Approved', NULL),
	(211, 'Azri Awi', 'Cycling', 'Pejabat Pusat Sukan', 2, '2022-05-07', '20:00:00', 'B031910161', '22', 'Approved', NULL),
	(212, 'Putra Alif', 'Volley Ball', 'Volley Ball Court Pusat Sukan', 7, '2022-05-27', '20:00:00', 'B031910124', '21', 'Reject', NULL),
	(213, 'Azri Awi', 'Badminton', 'Court Badminton Lestari', 1, '2022-11-07', '20:00:00', 'B031910161', '22', 'Reject', NULL),
	(214, 'Azri Awi', 'Cycling', 'Pejabat Pusat Sukan', 2, '2022-05-08', '20:00:00', 'B031910161', '22', 'Approved', NULL),
	(215, 'Azri Awi', 'Hockey', 'Astro Turf Pusat Sukan', 3, '2022-06-02', '20:00:00', 'B031910161', '22', 'Approved', NULL),
	(216, 'Azri Awi', 'Hockey', 'Astro Turf Pusat Sukan', 3, '2022-06-23', '20:00:00', 'B031910161', '22', 'Reject', NULL),
	(217, 'Azri Awi', 'Archery', 'Padang Memanah UTeM', 4, '2022-08-24', '20:00:00', 'B031910161', '22', 'Approved', NULL),
	(218, 'Azri Awi', 'Archery', 'Padang Memanah UTeM', 4, '2022-08-17', '20:00:00', 'B031910161', '22', 'Approved', NULL),
	(219, 'Azri Awi', 'Archery', 'Padang Memanah UTeM', 4, '2022-06-23', '20:00:00', 'B031910161', '22', 'Approved', NULL),
	(220, 'zaki armindo', 'Hockey', 'Astro Turf Pusat Sukan', 3, '2022-06-10', '20:00:00', 'B031910455', '28', 'Approved', 'FTMK'),
	(221, 'zaki armindo', 'Sepak Takraw', 'Sepak Takraw Court', 6, '2022-06-09', '16:00:00', 'B031910455', '28', 'Approved', 'FTMK'),
	(223, 'zaki armindo', 'Archery', 'Padang Memanah UTeM', 4, '2022-07-16', '20:00:00', 'B031910455', '28', 'Approved', 'FTMK'),
	(224, 'zaki armindo', 'Hockey', 'Astro Turf Pusat Sukan', 3, '2022-08-09', '20:00:00', 'B031910455', '28', 'Approved', 'FTMK'),
	(225, 'zaki armindo', 'Archery', 'Padang Memanah UTeM', 4, '2022-06-09', '20:00:00', 'B031910455', '28', 'Approved', 'FTMK'),
	(226, 'zaki armindo', 'Hockey', 'Astro Turf Pusat Sukan', 3, '2022-06-30', '20:00:00', 'B031910455', '28', 'Approved', 'FTMK'),
	(227, 'Azri Awi', 'Badminton', 'Court Badminton Lestari', 1, '2022-06-14', '20:00:00', 'B031910161', '22', 'Approved', 'FKP'),
	(228, 'Azri Awi', 'Badminton', 'Court Badminton Lestari', 1, '2022-08-17', '20:00:00', 'B031910161', '22', 'Approved', 'FKP'),
	(229, 'Azri Awi', 'Badminton', 'Court Badminton Lestari', 1, '2022-06-13', '20:00:00', 'B031910161', '22', 'Reject', 'FKP'),
	(230, 'Azri Awi', 'Badminton', 'Court Badminton Lestari', 1, '2022-06-14', '20:00:00', 'B031910161', '22', 'Approved', 'FKP'),
	(231, 'Azri Awi', 'Badminton', 'Court Badminton Lestari', 1, '2022-06-22', '20:00:00', 'B031910161', '22', 'Approved', 'FKP'),
	(232, 'Nur Afiqah', 'Volley Ball', 'Volley Ball Court Pusat Sukan', 7, '2022-06-17', '20:00:00', 'B031910067', '30', 'Reject', 'FKEKK'),
	(233, 'Nur Afiqah', 'Futsal', 'Futsal Court Pusat Sukan', 8, '2022-06-17', '20:00:00', 'B031910067', '30', 'Approved', 'FKEKK'),
	(234, 'Nur Afiqah', 'Volley Ball', 'Volley Ball Court Pusat Sukan', 7, '2022-06-22', '20:00:00', 'B031910067', '30', 'Reject', 'FKEKK'),
	(235, 'Nur Afiqah', 'BasketBall', 'Basketball Court Pusat Sukan', 5, '2022-06-20', '20:00:00', 'B031910067', '30', 'Approved', 'FKEKK'),
	(236, 'Nur Afiqah', 'Archery', 'Padang Memanah UTeM', 4, '2022-06-21', '20:00:00', 'B031910067', '30', 'Approved', 'FKEKK'),
	(237, 'Azri Awi', 'Badminton', 'Court Badminton Lestari', 1, '2022-06-22', '20:00:00', 'B031910161', '22', 'Approved', 'FKP'),
	(241, 'Azri Awi', 'Badminton', 'Court Badminton Lestari', 1, '2022-06-22', '20:00:00', 'B031910161', '22', 'Approved', 'FKP'),
	(242, 'Azri Awi', 'Badminton', 'Court Badminton Lestari', 1, '2022-06-22', '20:00:00', 'B031910161', '22', 'Reject', 'FKP'),
	(243, 'Azri Awi', 'Badminton', 'Court Badminton Lestari', 1, '2022-06-25', '20:00:00', 'B031910161', '22', 'Approved', 'FKP'),
	(244, 'Abdillah Safwan Bin Yusop', 'Ping Pong', 'Gelanggang Ping Pong', 10, '2022-06-23', '18:00:00', 'B031910120', '37', 'Approved', 'FPTT'),
	(245, 'MUHAMMAD RIDHWAN BIN RAZALEE', 'BasketBall', 'Basketball Court Pusat Sukan', 5, '2022-08-19', '20:00:00', 'B031910197', '34', 'Approved', 'FTMK'),
	(246, 'MUHAMMAD RIDHWAN BIN RAZALEE', 'BasketBall', 'Basketball Court Pusat Sukan', 5, '2022-08-19', '20:00:00', 'B031910197', '34', 'Approved', 'FTMK'),
	(247, 'MUHAMMAD RIDHWAN BIN RAZALEE', 'BasketBall', 'Basketball Court Pusat Sukan', 5, '2022-07-21', '20:00:00', 'B031910197', '34', 'Approved', 'FTMK'),
	(248, 'MUHAMMAD RIDHWAN BIN RAZALEE', 'BasketBall', 'Basketball Court Pusat Sukan', 5, '2022-07-21', '20:00:00', 'B031910197', '34', 'Approved', 'FTMK'),
	(250, 'MUHAMMAD RIDHWAN BIN RAZALEE', 'Badminton', 'Gelanggang Badminton', 11, '2022-07-06', '20:00:00', 'B031910197', '34', 'Approved', 'FTMK'),
	(251, 'MUHAMMAD RIDHWAN BIN RAZALEE', 'Badminton', 'Gelanggang Badminton', 11, '2022-07-15', '20:00:00', 'B031910197', '34', 'Approved', 'FTMK'),
	(252, 'MUHAMMAD RIDHWAN BIN RAZALEE', 'BasketBall', 'Basketball Court Pusat Sukan', 5, '2022-07-14', '20:00:00', 'B031910197', '34', 'Approved', 'FKE'),
	(253, 'MUHAMMAD RIDHWAN BIN RAZALEE', 'BasketBall', 'Basketball Court Pusat Sukan', 5, '2022-07-06', '20:00:00', 'B031910197', '34', 'Approved', 'FKE'),
	(254, 'MUHAMMAD RIDHWAN BIN RAZALEE', 'BasketBall', 'Basketball Court Pusat Sukan', 5, '2022-07-18', '20:00:00', 'B031910197', '34', 'Approved', 'FKM'),
	(255, 'MUHAMMAD RIDHWAN BIN RAZALEE', 'BasketBall', 'Basketball Court Pusat Sukan', 5, '2022-07-08', '20:00:00', 'B031910197', '34', 'Pending', 'FPTT'),
	(256, 'MUHAMMAD RIDHWAN BIN RAZALEE', 'BasketBall', 'Basketball Court Pusat Sukan', 5, '2022-07-04', '20:00:00', 'B031910197', '34', 'Approved', 'FPTT'),
	(257, 'MUHAMMAD RIDHWAN BIN RAZALEE', 'BasketBall', 'Basketball Court Pusat Sukan', 5, '2022-07-11', '20:00:00', 'B031910197', '34', 'Approved', 'FKM'),
	(258, 'MUHAMMAD RIDHWAN BIN RAZALEE', 'BasketBall', 'Basketball Court Pusat Sukan', 5, '2022-07-11', '20:00:00', 'B031910197', '34', 'Approved', 'FKM'),
	(259, 'AHMAD FIRDAUS BIN MOHAMAD', 'Badminton', 'Gelanggang Badminton', 11, '2022-07-12', '16:00:00', 'B031910133', '36', 'Approved', 'FPTT'),
	(260, 'Abdillah Safwan Bin Yusop', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-01', '20:00:00', 'B031910120', '37', 'Approved', 'FTMK'),
	(261, 'Abdillah Safwan Bin Yusop', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-02', '20:00:00', 'B031910120', '37', 'Reject', 'FTMK'),
	(263, 'Abdillah Safwan Bin Yusop', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-03', '20:00:00', 'B031910120', '37', 'Approved', 'FTMK'),
	(264, 'Abdillah Safwan Bin Yusop', 'Gimnasium Lelaki', 'Gimnasium', 15, '2022-08-04', '20:00:00', 'B031910120', '37', 'Approved', 'FTMK'),
	(265, 'Abdillah Safwan Bin Yusop', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-05', '20:00:00', 'B031910120', '37', 'Approved', NULL),
	(266, 'Abdillah Safwan Bin Yusop', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-03', '20:00:00', 'B031910120', '37', 'Approved', NULL),
	(267, 'Abdillah Safwan Bin Yusop', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-09', '20:00:00', 'B031910120', '37', 'Approved', NULL),
	(268, 'Abdillah Safwan Bin Yusop', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-29', '20:00:00', 'B031910120', '37', 'Approved', NULL),
	(269, 'Abdillah Safwan Bin Yusop', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-09', '20:00:00', 'B031910120', '37', 'Approved', NULL),
	(270, 'Abdillah Safwan Bin Yusop', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-25', '20:00:00', 'B031910120', '37', 'Approved', NULL),
	(271, 'Abdillah Safwan Bin Yusop', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-24', '20:00:00', 'B031910120', '37', 'Approved', NULL),
	(272, 'Abdillah Safwan Bin Yusop', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-25', '20:00:00', 'B031910120', '37', 'Pending', NULL),
	(273, 'NUR AFIQAH BINTI HALIM', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-24', '20:00:00', 'B031910067', '38', 'Approved', NULL),
	(274, 'NUR AFIQAH BINTI HALIM', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-23', '20:00:00', 'B031910067', '38', 'Approved', NULL),
	(275, 'NUR AFIQAH BINTI HALIM', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-01', '20:00:00', 'B031910067', '38', 'Approved', NULL),
	(276, 'NUR AFIQAH BINTI HALIM', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-29', '20:00:00', 'B031910067', '38', 'Pending', NULL),
	(277, 'NUR AFIQAH BINTI HALIM', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-30', '20:00:00', 'B031910067', '38', 'Approved', NULL),
	(278, 'NUR AFIQAH BINTI HALIM', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-08', '20:00:00', 'B031910067', '38', 'Approved', NULL),
	(279, 'NUR AFIQAH BINTI HALIM', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-09', '20:00:00', 'B031910067', '38', 'Approved', NULL),
	(280, 'NOR ADZEEZUL ASRIE BIN NORAFANDI', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-10', '20:00:00', 'B031910012', '32', 'Approved', NULL),
	(281, 'NOR ADZEEZUL ASRIE BIN NORAFANDI', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-08', '20:00:00', 'B031910012', '32', 'Approved', NULL),
	(282, 'NOR ADZEEZUL ASRIE BIN NORAFANDI', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-12', '20:00:00', 'B031910012', '32', 'Approved', NULL),
	(283, 'NOR ADZEEZUL ASRIE BIN NORAFANDI', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-12', '20:00:00', 'B031910012', '32', 'Approved', NULL),
	(284, 'NOR ADZEEZUL ASRIE BIN NORAFANDI', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-22', '20:00:00', 'B031910012', '32', 'Approved', NULL),
	(285, 'AIMAN FARIS BIN MAZRI', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-15', '20:00:00', 'B031910126', '35', 'Approved', NULL),
	(286, 'AIMAN FARIS BIN MAZRI', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-15', '20:00:00', 'B031910126', '35', 'Approved', NULL),
	(287, 'AIMAN FARIS BIN MAZRI', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-18', '20:00:00', 'B031910126', '35', 'Approved', NULL),
	(288, 'AIMAN FARIS BIN MAZRI', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-18', '20:00:00', 'B031910126', '35', 'Approved', NULL),
	(289, 'AIMAN FARIS BIN MAZRI', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-19', '20:00:00', 'B031910126', '35', 'Approved', NULL),
	(290, 'AHMAD FIRDAUS BIN MOHAMAD', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-05', '20:00:00', 'B031910133', '36', 'Approved', NULL),
	(291, 'AHMAD FIRDAUS BIN MOHAMAD', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-10', '20:00:00', 'B031910133', '36', 'Approved', NULL),
	(292, 'AHMAD FIRDAUS BIN MOHAMAD', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-22', '20:00:00', 'B031910133', '36', 'Approved', NULL),
	(293, 'AHMAD FIRDAUS BIN MOHAMAD', 'Badminton', 'Gelanggang Badminton', 11, '2022-08-23', '20:00:00', 'B031910133', '36', 'Approved', NULL),
	(294, 'AIMAN FARIS BIN MAZRI', 'Cycling', 'Pejabat Pusat Sukan UTeM', 2, '2022-10-21', '20:00:00', 'B031910126', '35', 'Pending', NULL),
	(295, 'ABDILLAH SAFWAN', 'Badminton', 'Gelanggang Badminton', 11, '2022-07-14', '20:00:00', 'B031910120', '37', 'Approved', NULL),
	(296, 'ABDILLAH SAFWAN', 'Badminton', 'Gelanggang Badminton', 11, '2022-09-15', '20:00:00', 'B031910120', '37', 'Pending', NULL),
	(297, 'ABDILLAH SAFWAN', 'Badminton', 'Gelanggang Badminton', 11, '2022-09-16', '20:00:00', 'B031910120', '37', 'Pending', NULL),
	(298, 'ABDILLAH SAFWAN', 'BasketBall', 'Basketball Court Pusat Sukan', 5, '2023-04-17', '18:00:00', 'B031910120', '37', 'Pending', NULL),
	(299, 'ABDILLAH SAFWAN', 'Ping Pong', 'Gelanggang Ping Pong', 10, '2023-04-21', '16:00:00', 'B031910120', '37', 'Approved', NULL);
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;

-- Dumping structure for table utemsportarena_db.facility
CREATE TABLE IF NOT EXISTS `facility` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sportName` varchar(50) DEFAULT NULL,
  `sportVenue` varchar(50) DEFAULT NULL,
  `sportTimeStart` varchar(50) DEFAULT NULL,
  `sportTimeEnd` varchar(50) DEFAULT NULL,
  `sportImage` varchar(50) DEFAULT NULL,
  `totalFacility` int(11) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `sportTheme` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Opened',
  `reason` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table utemsportarena_db.facility: ~12 rows (approximately)
/*!40000 ALTER TABLE `facility` DISABLE KEYS */;
INSERT INTO `facility` (`id`, `sportName`, `sportVenue`, `sportTimeStart`, `sportTimeEnd`, `sportImage`, `totalFacility`, `location`, `sportTheme`, `status`, `reason`) VALUES
	(2, 'Cycling', 'Pejabat Pusat Sukan UTeM', '14:00', '20:00', '../images/sports/cycling.jpeg', 56, '2.318180,102.321160', 'Outdoor', 'Available', 'maintenance'),
	(3, 'Hockey', 'Astro Turf Pusat Sukan', '14:00', '20:00', '../images/sports/hockey.jpeg', 1, '2.316939,102.319964', 'Outdoor', 'Available', 'maintenance'),
	(4, 'Archery', 'Padang Memanah UTeM', '14:00', '20:00', '../images/sports/archery.jpeg', 2, '2.319000,102.318457', 'Outdoor', 'Available', 'maintenance'),
	(5, 'BasketBall', 'Basketball Court Pusat Sukan', '14:00', '20:00', '../images/sports/basketball.jpeg', 1, '2.319335,102.318821', 'Outdoor', 'Available', 'maintenance'),
	(6, 'Sepak Takraw', 'Sepak Takraw Court', '14:00', '20:00', '../images/sports/sepak-takraw.jpeg', 2, '2.319249,102.319049', 'Outdoor', 'Available', 'maintenance'),
	(7, 'Volley Ball', 'Volley Ball Court Pusat Sukan', '14:30', '20:00', '../images/sports/volleyball.jpeg', 2, '2.318989,102.319967', 'Outdoor', 'Available', 'maintenance'),
	(8, 'Futsal', 'Futsal Court Pusat Sukan', '14:00', '20:00', '../images/sports/futsal.jpeg', 2, '2.319080,102.321632', 'Outdoor', 'Unavailable', 'Reserve for Sukan Intitusi Pengajian tinggi (SUKIPT) Event'),
	(10, 'Ping Pong', 'Gelanggang Ping Pong', '14:00', '19:00', '../images/sports/pingpong.jpg', 1, '2.316572,102.320672', 'Indoor', 'Unavailable', 'Reserve for Sukan Intitusi Pengajian tinggi (SUKIPT) Event'),
	(11, 'Badminton', 'Gelanggang Badminton', '14:00', '17:00', '../images/sports/court_badminton.jpg', 4, '2.316893,102.320688', 'Indoor', 'Available', 'maintenance'),
	(14, 'Gimnasium (W)', 'Gimnasium Pusat Sukan', '14:00', '19:00', '../images/sports/gymnasium_wanita.jpg', 1, '2.317483,102.321257', 'Indoor', 'Unavailable', 'Repairs for gym equipment  and regular maintenance'),
	(15, 'Gimnasium (L)', 'Gimnasium Pusat Sukan', '14:00', '19:00', '../images/sports/gym_lelaki.jpg', 1, '2.317483,102.321257', 'Indoor', 'Available', 'maintenance'),
	(16, 'Tennis', 'Tennis court Pusat Sukan', '08:00', '19:00', '../images/sports/tennis.jpeg', 6, '2.316911,102.319362', 'Outdoor', 'Available', 'maintenance');
/*!40000 ALTER TABLE `facility` ENABLE KEYS */;

-- Dumping structure for table utemsportarena_db.staff
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staffName` varchar(50) DEFAULT NULL,
  `staffEmail` varchar(50) DEFAULT NULL,
  `staffId` varchar(50) DEFAULT NULL,
  `staffOffice` varchar(50) DEFAULT NULL,
  `staffNum` varchar(50) DEFAULT NULL,
  `staffPassword` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT 'staff',
  `status` varchar(50) DEFAULT 'Approved',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- Dumping data for table utemsportarena_db.staff: ~8 rows (approximately)
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` (`id`, `staffName`, `staffEmail`, `staffId`, `staffOffice`, `staffNum`, `staffPassword`, `role`, `status`) VALUES
	(33, 'staff', 'staff', 'staff', 'FKM', 'staff', 'staff', 'staff', 'Pending'),
	(34, 'Ahmad Hazim', 'hazim@staff.utem.edu.my', 'PS10023', NULL, '0147384751', '111111', 'staff', 'Approved'),
	(35, 'Muhd Ridhwan', 'ridhwan@staff.utem.edu.my', 'PU30901', 'FKM', '0198487295', '111111', 'staff', 'Approved'),
	(36, 'Muhd Syafiq', 'syafiq@staff.utem.edu.my', 'PU30903', NULL, '0197465218', '111111', 'staff', 'Approved'),
	(37, 'MOHD FAIRUZ AZWAD BIN MOHD ZAUWAWI', 'mfairuzazwad@utem.edu.my', '02101', NULL, '06-2701454', '111111', 'staff', 'Approved'),
	(38, 'SITI SARAH BINTI BUJANG', 'sitisarah@utem.edu.my', '02108', NULL, '06-2701456', '111111', 'staff', 'Approved'),
	(39, 'RAZALI BIN YAAKOB', 'razaliyaakob@utem.edu.my', '02109', NULL, '06-2701455', '111111', 'staff', 'Approved'),
	(40, 'AHMAD AFFENDAY BIN MOHAMED SANI', 'affendy@utem.edu.my', '02110', NULL, '06-2701461', '111111', 'staff', 'Approved'),
	(41, 'MOHD HADZREN REDZA BIN NORHIDZAM AMIN AKBAR', 'HADZREN', '02112', NULL, '06-2701466', '111111', 'staff', 'Pending'),
	(42, 'NORASHIKIN BINTI HASHIM', 'norashikinhashim@utem.edu.my', '02104', NULL, '06-2701465', '111111', 'staff', 'Pending');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;

-- Dumping structure for table utemsportarena_db.staff_request
CREATE TABLE IF NOT EXISTS `staff_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staffName` varchar(50) DEFAULT NULL,
  `staffEmail` varchar(50) DEFAULT NULL,
  `staffId` varchar(50) DEFAULT NULL,
  `staffOffice` varchar(50) DEFAULT NULL,
  `staffNum` varchar(50) DEFAULT NULL,
  `staffPassword` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT 'staff',
  `status` varchar(50) DEFAULT 'Pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- Dumping data for table utemsportarena_db.staff_request: ~15 rows (approximately)
/*!40000 ALTER TABLE `staff_request` DISABLE KEYS */;
INSERT INTO `staff_request` (`id`, `staffName`, `staffEmail`, `staffId`, `staffOffice`, `staffNum`, `staffPassword`, `role`, `status`) VALUES
	(28, 'MOHD FAIRUZ AZWAD BIN MOHD ZAUWAWI', 'mfairuzazwad@utem.edu.my', '02101', NULL, '06-2701454', '111111', 'staff', 'Approved'),
	(29, 'AZRIN BIN SARIMAN', 'azrin.sariman@utem.edu.my', '02102', NULL, '06-2701457', '111111', 'staff', 'Reject'),
	(30, 'ZURAIDAH BINTI ABDULLAH', 'zuraidah@utem.edu.my', '02103', NULL, '06-2701458', '111111', 'staff', 'Reject'),
	(31, 'NORASHIKIN BINTI HASHIM', 'norashikinhashim@utem.edu.my', '02104', NULL, '06-2701465', '111111', 'staff', 'Approved'),
	(32, 'MOHD YUSRI BIN MISRON', 'mohdyusri@utem.edu.my', '02105', NULL, '06-2701464', '111111', 'staff', 'Reject'),
	(33, 'AHMAD RHAFAEE BIN SAMSUDIN', 'rhafaee@utem.edu.my', '02106', NULL, '06-2701459', '111111', 'staff', 'Reject'),
	(34, 'MUHAMMAD ASHRAFF BIN NOR RIZAN', 'ashraff@utem.edu.my', '02107', NULL, '06-2701463', '111111', 'staff', 'Reject'),
	(35, 'SITI SARAH BINTI BUJANG', 'sitisarah@utem.edu.my', '02108', NULL, '06-2701456', '111111', 'staff', 'Approved'),
	(36, 'RAZALI BIN YAAKOB', 'razaliyaakob@utem.edu.my', '02109', NULL, '06-2701455', '111111', 'staff', 'Approved'),
	(37, 'AHMAD AFFENDAY BIN MOHAMED SANI', 'affendy@utem.edu.my', '02110', NULL, '06-2701461', '111111', 'staff', 'Approved'),
	(39, 'MOHD HADZREN REDZA BIN NORHIDZAM AMIN AKBAR', 'hadzren@utem.edu.my', '02111', NULL, '06-2701460', '111111', 'staff', 'Pending'),
	(40, 'NORASIKIN BINTI MD ISA', 'norasikin@utem.edu.my', '02113', NULL, '06-2701462', '111111', 'staff', 'Pending'),
	(41, 'PROFESOR MADYA TS. DR. MOHD SANUSI BIN AZMI', 'sanusi@utem.edu.my', '02114', NULL, '06-2702472', '111111', 'staff', 'Pending'),
	(42, 'NURAISAH BINTI ABDUL WAHAB', 'nuraisah@utem.edu.my', '02115', NULL, '06-2701097', '111111', 'staff', 'Pending'),
	(43, 'MOHD HADZREN REDZA BIN NORHIDZAM AMIN AKBAR', 'nuraisah@utem.edu.my', '02112', NULL, '06-2701466', '111111', 'staff', 'Approved'),
	(44, '354345', '2345234', '34535', NULL, '345345', '345345', 'staff', 'Pending');
/*!40000 ALTER TABLE `staff_request` ENABLE KEYS */;

-- Dumping structure for table utemsportarena_db.student
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studName` varchar(50) DEFAULT NULL,
  `studEmail` varchar(50) DEFAULT NULL,
  `studMatric` varchar(50) DEFAULT NULL,
  `studFaculty` varchar(50) DEFAULT NULL,
  `studNum` varchar(50) DEFAULT NULL,
  `studAddress` varchar(50) DEFAULT NULL,
  `studPassword` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT 'student',
  `status` varchar(50) DEFAULT 'Approved',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

-- Dumping data for table utemsportarena_db.student: ~37 rows (approximately)
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` (`id`, `studName`, `studEmail`, `studMatric`, `studFaculty`, `studNum`, `studAddress`, `studPassword`, `role`, `status`) VALUES
	(31, 'MUHAMMAD FIQRI BIN ABDUL RASHID', 'b031910001@student.utem.edu.my', 'B031910001', 'FKE', '011-8886 8963', NULL, '111111', 'student', 'Approved'),
	(32, 'NOR ADZEEZUL ASRIE BIN NORAFANDI', 'b031910012@student.utem.edu.my', 'B031910012', 'FKP', '014-400 3952', NULL, '111111', 'student', 'Approved'),
	(33, 'MUHAMMAD AMIRUL SYAFIQ BIN ZULKEFLI', 'b031910016@student.utem.edu.my', 'B031910016', 'FPTT', '018-822 1848', NULL, '111111', 'student', 'Approved'),
	(34, 'MUHAMMAD RIDHWAN BIN RAZALEE', 'b031910197@student.utem.edu.my', 'B031910197', 'FTMK', '010-297 7750', NULL, '111111', 'student', 'Approved'),
	(35, 'AIMAN FARIS BIN MAZRI', 'b031910126@student.utem.edu.my', 'B031910126', 'FKP', '010-347 3634', NULL, '111111', 'student', 'Approved'),
	(36, 'AHMAD FIRDAUS BIN MOHAMAD', 'b031910133@student.utem.edu.my', 'B031910133', 'FTKEE', '010-788 7106', NULL, '111111', 'student', 'Approved'),
	(37, 'ABDILLAH SAFWAN', 'B031910161@student.utem.edu.my', 'B031910120', 'FTMK', '0138469671', NULL, '111111', 'student', 'Approved'),
	(38, 'NUR AFIQAH BINTI HALIM', 'b031910067@student.utem.edu.my', 'B031910067', 'FTMK', '017-754 6828', NULL, '111111', 'student', 'Approved'),
	(39, 'MUHAMMAD ZULFAHMI BIN ZAMBRI', 'b031910124@student.utem.edu.my', 'B031910124', 'FKM', '018-874 1751', NULL, '111111', 'student', 'Pending'),
	(40, 'MOHAMMAD SYAFIQ BIN ENCHEK MUDA', 'b031910178@student.utem.edu.my', 'B031910178', 'FKEKK', '014-400 7643', NULL, '111111', 'student', 'Pending'),
	(41, 'ABDUL HANNAN BIN YUSOP', 'b031910175@student.utem.edu.my', 'B031910175', 'FPTT', '018-874 0027', NULL, '111111', 'student', 'Pending'),
	(42, 'MUHAMMAD AMIRUDDIN SYAHMI BIN YAAKUP', 'b031910181@student.utem.edu.my', 'B031910181', 'FKM', '018-820 2673', NULL, '111111', 'student', 'Pending'),
	(43, 'test', NULL, NULL, 'FKEKK', NULL, NULL, NULL, 'student', 'Approved'),
	(44, 'test2', NULL, NULL, 'FKP', NULL, NULL, NULL, 'student', 'Approved'),
	(45, 'test3', NULL, NULL, 'FPTT', NULL, NULL, NULL, 'student', 'Approved'),
	(46, 'test4', NULL, NULL, 'FTMK', NULL, NULL, NULL, 'student', 'Approved'),
	(47, 'test5', NULL, NULL, 'FTMK', NULL, NULL, NULL, 'student', 'Approved'),
	(48, 'test6', NULL, NULL, 'FKM', NULL, NULL, NULL, 'student', 'Approved'),
	(49, 'test7', NULL, NULL, 'FKM', NULL, NULL, NULL, 'student', 'Approved'),
	(50, 'test8', NULL, NULL, 'FTMK', NULL, NULL, NULL, 'student', 'Approved'),
	(51, 'test9', NULL, NULL, 'FTMK', NULL, NULL, NULL, 'student', 'Approved'),
	(52, 'test10', NULL, NULL, 'FKP', NULL, NULL, NULL, 'student', 'Approved'),
	(53, 'test11', NULL, NULL, 'FKM', NULL, NULL, NULL, 'student', 'Approved'),
	(54, 'test12', NULL, NULL, 'FKEKK', NULL, NULL, NULL, 'student', 'Approved'),
	(55, 'test13', NULL, NULL, 'FKM', NULL, NULL, NULL, 'student', 'Approved'),
	(56, 'test14', NULL, NULL, 'FKE', NULL, NULL, NULL, 'student', 'Approved'),
	(57, 'test15', NULL, NULL, 'FKE', NULL, NULL, NULL, 'student', 'Approved'),
	(58, 'test16', NULL, NULL, 'FPTT', NULL, NULL, NULL, 'student', 'Approved'),
	(59, 'test17', NULL, NULL, 'FPTT', NULL, NULL, NULL, 'student', 'Approved'),
	(60, 'test18', NULL, NULL, 'FPTT', NULL, NULL, NULL, 'student', 'Approved'),
	(61, 'test19', NULL, NULL, 'FTMK', NULL, NULL, NULL, 'student', 'Approved'),
	(62, 'test20', NULL, NULL, 'FTMK', NULL, NULL, NULL, 'student', 'Approved'),
	(63, 'test21', NULL, NULL, 'FTMK', NULL, NULL, NULL, 'student', 'Approved'),
	(64, 'test22', NULL, NULL, 'FPTT', NULL, NULL, NULL, 'student', 'Approved'),
	(65, 'test23', NULL, NULL, 'FPTT', NULL, NULL, NULL, 'student', 'Approved'),
	(66, 'test24', NULL, NULL, 'FKE', NULL, NULL, NULL, 'student', 'Approved'),
	(67, 'test25', NULL, NULL, NULL, NULL, NULL, NULL, 'student', 'Approved'),
	(68, 'HAFIZUL AIZAD BIN MOHD NOOR', 'b031910185@student.utem.edu.my', 'B031910185', 'FKM', '018-822 4799', NULL, '111111', 'student', 'Pending'),
	(69, 'AIDA SYAFAWATI BINTI ABDULLAH', 'b031910304@student.utem.edu.my', 'B031910304', 'FTMK', '018-872 2971', NULL, '111111', 'student', 'Pending'),
	(70, 'Abdillah Safwan', 'B031910120@student.utem.edu.my', 'B031910120', 'FTMK', '0138469671', NULL, '11111111', 'student', 'Pending');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;

-- Dumping structure for table utemsportarena_db.student_request
CREATE TABLE IF NOT EXISTS `student_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studName` varchar(50) DEFAULT NULL,
  `studEmail` varchar(50) DEFAULT NULL,
  `studMatric` varchar(50) DEFAULT NULL,
  `studFaculty` varchar(50) DEFAULT NULL,
  `studNum` varchar(50) DEFAULT NULL,
  `studPassword` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  `role` varchar(50) DEFAULT 'student',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- Dumping data for table utemsportarena_db.student_request: ~19 rows (approximately)
/*!40000 ALTER TABLE `student_request` DISABLE KEYS */;
INSERT INTO `student_request` (`id`, `studName`, `studEmail`, `studMatric`, `studFaculty`, `studNum`, `studPassword`, `status`, `role`) VALUES
	(10, 'MUHAMMAD FIQRI BIN ABDUL RASHID', 'b031910001@student.utem.edu.my', 'B031910001', 'FTMK', '011-8886 8963', '111111', 'Approved', 'student'),
	(11, 'NOR ADZEEZUL ASRIE BIN NORAFANDI', 'b031910012@student.utem.edu.my', 'B031910012', 'FKP', '014-400 3952', '111111', 'Approved', 'student'),
	(12, 'MUHAMMAD AMIRUL SYAFIQ BIN ZULKEFLI', 'b031910016@student.utem.edu.my', 'B031910016', 'FPTT', '018-822 1848', '111111', 'Approved', 'student'),
	(13, 'NURFILZAH ATIQAH BINTI NOR AZAN', 'b031910046@student.utem.edu.my', 'B031910046', 'FKM', '018-871 4776', '111111', 'Reject', 'student'),
	(14, 'NUR AFIQAH BINTI HALIM', 'b031910067@student.utem.edu.my', 'B031910067', 'FTMK', '017-754 6828', '111111', 'Approved', 'student'),
	(15, 'AMIRUL AIZAT BIN ROSLI', 'b031910118@student.utem.edu.my', 'B031910118', 'FKM', '018-873 0872', '111111', 'Reject', 'student'),
	(16, 'MUHAMMAD ZULFAHMI BIN ZAMBRI', 'b031910124@student.utem.edu.my', 'B031910124', 'FPTT', '018-874 1751', '111111', 'Approved', 'student'),
	(17, 'AIMAN FARIS BIN MAZRI', 'b031910126@student.utem.edu.my', 'B031910126', 'FKP', '010-347 3634', '111111', 'Approved', 'student'),
	(18, 'AHMAD FIRDAUS BIN MOHAMAD', 'b031910133@student.utem.edu.my', 'B031910133', 'FTKEE', '010-788 7106', '111111', 'Approved', 'student'),
	(19, 'WAN MOHAMAD NUR\'AKID BIN WAN MUHAMMAD', 'b031910138@student.utem.edu.my', 'B031910138', 'FKP', '010-918 3297', '111111', 'Approved', 'student'),
	(20, 'MUHAMMAD SYAH FIRDAUS BIN SHAHRUZZAMAN', 'b031910160@student.utem.edu.my', 'B031910160', 'FTMK', '018-626 2944', '111111', 'Reject', 'student'),
	(21, 'ABDUL HANNAN BIN YUSOP', 'b031910175@student.utem.edu.my', 'B031910175', 'FKE', '018-874 0027', '111111', 'Approved', 'student'),
	(22, 'MOHAMMAD SYAFIQ BIN ENCHEK MUDA', 'b031910178@student.utem.edu.my', 'B031910178', 'FPTT', '014-400 7643', '111111', 'Approved', 'student'),
	(23, 'MUHAMMAD AMIRUDDIN SYAHMI BIN YAAKUP', 'b031910181@student.utem.edu.my', 'B031910181', 'FKP', '018-820 2673', '111111', 'Approved', 'student'),
	(24, 'HAFIZUL AIZAD BIN MOHD NOOR', 'b031910185@student.utem.edu.my', 'B031910185', 'FKM', '018-822 4799', '111111', 'Approved', 'student'),
	(25, 'MUHAMMAD RIDHWAN BIN RAZALEE', 'b031910197@student.utem.edu.my', 'B031910197', 'FTMK', '010-297 7750', '111111', 'Approved', 'student'),
	(26, 'PRASANTH A/L MANIKAM', 'b031910227@student.utem.edu.my', 'B031910227', 'FTMK', '018-820 5037', '111111', 'Reject', 'student'),
	(27, 'KHAIRIL NUR AZIZIE BIN SHAFIRUDIN', 'b031910249@student.utem.edu.my', 'B031910249', 'FTMK', '014-400 4311', '111111', 'Approved', 'student'),
	(28, 'AIDA SYAFAWATI BINTI ABDULLAH', 'b031910304@student.utem.edu.my', 'B031910304', 'FTMK', '018-872 2971', '111111', 'Approved', 'student'),
	(29, 'MOHAMAD FARHAN FAIZZUDIN BIN RAZALI', 'b031910340@student.utem.edu.my', 'B031910340', 'FTMK', '018-472 2472', '111111', 'Pending', 'student'),
	(30, 'Abdillah Safwan', 'B031910120@student.utem.edu.my', 'B031910120', 'FTMK', '0138469671', '111111', 'Approved', 'student'),
	(31, 'AKMAL HAKIM BIN ABDULLAH', 'B031910220@student.utem.edu.my', 'B031910220', 'FTMK', '0138469671', '111111', 'Pending', 'student'),
	(32, 'Abdillah Safwan', 'B031910120@student.utem.edu.my', 'B031910120', 'FTMK', '0138469671', '11111111', 'Approved', 'student');
/*!40000 ALTER TABLE `student_request` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
