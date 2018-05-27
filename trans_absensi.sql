/*
SQLyog Community v13.0.1 (32 bit)
MySQL - 10.1.30-MariaDB : Database - hidayati_pesantren2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`hidayati_pesantren2` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `hidayati_pesantren2`;

/*Table structure for table `trans_absensi_d` */

DROP TABLE IF EXISTS `trans_absensi_d`;

CREATE TABLE `trans_absensi_d` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_absen_header` int(11) NOT NULL,
  `noreg_santri` varchar(15) NOT NULL DEFAULT '',
  `absensi` char(1) NOT NULL DEFAULT '' COMMENT 'H : hadir ; I : Ijin ; S : Sakit ; A : Alpa',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Table structure for table `trans_absensi_h` */

DROP TABLE IF EXISTS `trans_absensi_h`;

CREATE TABLE `trans_absensi_h` (
  `id_absen_header` int(11) NOT NULL AUTO_INCREMENT,
  `id_jadwal` int(11) DEFAULT NULL,
  `tgl_absensi` date NOT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `remark` varchar(150) DEFAULT NULL,
  `upd_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_by` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_absen_header`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
