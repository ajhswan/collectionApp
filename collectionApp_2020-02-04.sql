# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.29)
# Database: collectionApp
# Generation Time: 2020-02-04 09:50:51 +0000
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
  `supplier_name` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `details` varchar(200) DEFAULT NULL,
  `ccy` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `receiptRecord` WRITE;
/*!40000 ALTER TABLE `receiptRecord` DISABLE KEYS */;

INSERT INTO `receiptRecord` (`id`, `supplier_name`, `date`, `amount`, `details`, `ccy`)
VALUES
	(1,'Apple Store','2020-02-03',1000,'New Macbook Pro 2017','GBP'),
	(2,'Starbucks','2020-01-27',3.5,'Coffee with client','GBP'),
	(3,'MicroSoft','2020-02-03',250,'Annual software subscription','GBP');

/*!40000 ALTER TABLE `receiptRecord` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table supplierRecord
# ------------------------------------------------------------

DROP TABLE IF EXISTS `supplierRecord`;

CREATE TABLE `supplierRecord` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(100) DEFAULT NULL,
  `supplier_ref` char(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `supplierRecord` WRITE;
/*!40000 ALTER TABLE `supplierRecord` DISABLE KEYS */;

INSERT INTO `supplierRecord` (`id`, `supplier_name`, `supplier_ref`)
VALUES
	(1,'Apple Store','S000001');

/*!40000 ALTER TABLE `supplierRecord` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
