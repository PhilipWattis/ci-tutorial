-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.24-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2012-12-08 03:22:08
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for ci_tutorial
CREATE DATABASE IF NOT EXISTS `ci_tutorial` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ci_tutorial`;


-- Dumping structure for table ci_tutorial.user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `type` enum('user','admin') NOT NULL DEFAULT 'user',
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table ci_tutorial.user: ~2 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`user_id`, `type`, `email`, `password`, `date_added`) VALUES
	(0, 'admin', 'admin@admin.com', 'f93b66c65ce6e535030991739c91675e5e8c0d3c', '0000-00-00 00:00:00'),
	(1, 'user', 'test@test.com', 'test', '0000-00-00 00:00:00'),
	(4, 'user', 'j@j.com', '99033f52aaff9d8241a71c3a0ae37868bb6d8b24', '0000-00-00 00:00:00'),
	(5, 'user', 'asdfasdf', '97167631bd402ecb211a56d1041b4ac14e9759e2', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
