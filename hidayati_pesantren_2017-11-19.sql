# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 10.1.25-MariaDB)
# Database: hidayati_pesantren
# Generation Time: 2017-11-19 16:19:23 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table santri_limit_harian
# ------------------------------------------------------------

DROP TABLE IF EXISTS `santri_limit_harian`;

CREATE TABLE `santri_limit_harian` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `no_reg` varchar(10) DEFAULT NULL,
  `limit` int(11) DEFAULT NULL,
  `up_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `up_by` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `no_reg` (`no_reg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `santri_limit_harian` WRITE;
/*!40000 ALTER TABLE `santri_limit_harian` DISABLE KEYS */;

INSERT INTO `santri_limit_harian` (`id`, `no_reg`, `limit`, `up_time`, `up_by`)
VALUES
	(7,'T39170001',5000,'2017-10-21 22:52:01','admin'),
	(8,'T39170002',7000,'2017-10-21 22:52:06','admin'),
	(9,'T38170001',18000,'2017-10-21 22:52:14','admin');

/*!40000 ALTER TABLE `santri_limit_harian` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table santri_saldo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `santri_saldo`;

CREATE TABLE `santri_saldo` (
  `no_registrasi` varchar(10) NOT NULL,
  `saldo` float DEFAULT NULL,
  `recuser` varchar(20) DEFAULT NULL,
  `recdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`no_registrasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `santri_saldo` WRITE;
/*!40000 ALTER TABLE `santri_saldo` DISABLE KEYS */;

INSERT INTO `santri_saldo` (`no_registrasi`, `saldo`, `recuser`, `recdate`)
VALUES
	('T38170001',548667,'admin','2017-10-21 22:52:14'),
	('T39170001',171100,'admin','2017-10-21 22:52:01'),
	('T39170002',221000,'admin','2017-10-21 22:52:06');

/*!40000 ALTER TABLE `santri_saldo` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table trans_tabungan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `trans_tabungan`;

CREATE TABLE `trans_tabungan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_registrasi` varchar(15) DEFAULT NULL,
  `tgl_tabungan` date DEFAULT NULL,
  `tipe` char(1) DEFAULT NULL,
  `nominal` double DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  KEY `pk` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `trans_tabungan` WRITE;
/*!40000 ALTER TABLE `trans_tabungan` DISABLE KEYS */;

INSERT INTO `trans_tabungan` (`id`, `no_registrasi`, `tgl_tabungan`, `tipe`, `nominal`, `keterangan`, `userid`)
VALUES
	(3,'T39170001','2017-10-14','i',10,'test','admin'),
	(4,'','2017-10-14','i',0,'','admin'),
	(5,'T39170002','2017-10-14','i',1000,'oke','admin'),
	(6,'T39170001','2017-10-14','i',1,'f','admin'),
	(7,'T39170001','2017-10-14','i',2323,'ff','admin'),
	(8,'T38170001','2017-10-21','i',11,'ff','admin'),
	(9,'T38170001','2017-10-21','i',213213,'fds','admin'),
	(10,'T39170001','2017-10-21','i',1000,'ok','admin'),
	(11,'T38170001','2017-10-21','i',999,'fsasdf','admin'),
	(13,'T39170002','2017-10-21','i',50000,'fds','admin'),
	(14,'T39170002','2017-10-21','i',80000,'test','admin'),
	(15,'T39170002','2017-10-21','i',90000,'sdf','admin'),
	(16,'T39170001','2017-10-21','i',100,'fds','admin'),
	(17,'T38170001','2017-10-21','i',334444,'test','admin');

/*!40000 ALTER TABLE `trans_tabungan` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
