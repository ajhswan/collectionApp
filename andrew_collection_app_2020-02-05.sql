# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.29)
# Database: andrew_collection_app
# Generation Time: 2020-02-05 14:46:15 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table receiptRecord
# ------------------------------------------------------------

DROP TABLE IF EXISTS `receiptRecord`;

CREATE TABLE `receiptRecord` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(255) NOT NULL DEFAULT '',
  `date` date NOT NULL,
  `amount` float(6,2) NOT NULL,
  `details` varchar(255) NOT NULL DEFAULT '',
  `ccy` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `receiptRecord` WRITE;
/*!40000 ALTER TABLE `receiptRecord` DISABLE KEYS */;

INSERT INTO `receiptRecord` (`id`, `supplier_name`, `date`, `amount`, `details`, `ccy`)
VALUES
	(1,'Apple Store','2020-02-03',1000.00,'New Macbook Pro 2017','GBP'),
	(2,'Starbucks','2020-01-27',3.50,'Coffee with client','GBP'),
	(3,'Microsoft','2020-02-03',250.00,'Annual software subscription','GBP');

/*!40000 ALTER TABLE `receiptRecord` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
