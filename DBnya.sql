/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.1.25-MariaDB : Database - hidayati_pesantren
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`hidayati_pesantren` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `hidayati_pesantren`;

/*Table structure for table `group` */

DROP TABLE IF EXISTS `group`;

CREATE TABLE `group` (
  `group_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `group` */

insert  into `group`(`group_id`,`group_name`) values (1,'Administrator'),(2,'Guru'),(3,'Akademik');

/*Table structure for table `group_daftar_user` */

DROP TABLE IF EXISTS `group_daftar_user`;

CREATE TABLE `group_daftar_user` (
  `user_id` varchar(15) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`group_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `group_daftar_user` */

insert  into `group_daftar_user`(`user_id`,`group_id`) values ('admin',1);

/*Table structure for table `group_hak_akses` */

DROP TABLE IF EXISTS `group_hak_akses`;

CREATE TABLE `group_hak_akses` (
  `group_id` int(11) NOT NULL,
  `modul_id` int(11) NOT NULL,
  `add` tinyint(1) DEFAULT '0',
  `edit` tinyint(1) DEFAULT '0',
  `delete` tinyint(1) DEFAULT '0',
  UNIQUE KEY `group_modul` (`group_id`,`modul_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `group_hak_akses` */

insert  into `group_hak_akses`(`group_id`,`modul_id`,`add`,`edit`,`delete`) values (1,1,1,1,1),(1,2,1,1,1),(1,3,1,1,1),(1,4,1,1,1),(1,5,1,1,1),(1,6,1,1,1),(1,7,1,1,1),(1,8,1,1,1),(1,9,1,1,1),(1,10,1,1,1),(1,11,1,1,1),(1,12,1,1,1),(1,14,1,1,1),(1,15,1,1,1),(1,16,1,1,1),(1,17,1,1,1),(1,18,1,1,1),(1,19,1,1,1),(1,20,1,1,1),(1,21,1,1,1),(1,22,1,1,1),(1,23,1,1,1),(1,24,1,1,1),(1,25,1,1,1),(1,26,1,1,1),(1,27,1,1,1),(1,28,1,1,1),(1,29,1,1,1),(1,30,1,1,1);

/*Table structure for table `histori_master_biaya` */

DROP TABLE IF EXISTS `histori_master_biaya`;

CREATE TABLE `histori_master_biaya` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_update` date DEFAULT NULL,
  `user_id` varchar(10) DEFAULT NULL,
  `nominal` double DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `histori_master_biaya` */

/*Table structure for table `infaq_temp` */

DROP TABLE IF EXISTS `infaq_temp`;

CREATE TABLE `infaq_temp` (
  `keytrans` varchar(1) NOT NULL,
  `saldo` float DEFAULT NULL,
  `recuser` varchar(50) DEFAULT NULL,
  `recdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`keytrans`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `infaq_temp` */

/*Table structure for table `login_history` */

DROP TABLE IF EXISTS `login_history`;

CREATE TABLE `login_history` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_addr` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=203 DEFAULT CHARSET=utf8;

/*Data for the table `login_history` */

insert  into `login_history`(`id`,`user_id`,`time`,`ip_addr`) values (52,NULL,'2017-05-23 07:36:32','::1'),(53,NULL,'2017-05-24 00:50:36','::1'),(54,NULL,'2017-05-24 02:17:38','::1'),(55,NULL,'2017-05-24 02:18:31','::1'),(56,'admin','2017-05-24 02:20:56','::1'),(57,'admin','2017-05-24 02:37:50','::1'),(58,'admin','2017-05-24 02:45:53','::1'),(59,'admin','2017-05-24 03:19:35','::1'),(60,'admin','2017-05-24 03:28:36','111.68.118.242'),(61,'admin','2017-05-25 10:35:40','115.178.214.252'),(62,'admin','2017-05-26 16:09:36','112.215.170.36'),(63,'admin','2017-05-29 15:12:29','::1'),(64,'admin','2017-05-29 15:16:19','::1'),(65,'admin','2017-05-29 16:20:59','::1'),(66,'admin','2017-05-29 16:24:07','::1'),(67,'admin','2017-05-29 16:26:22','::1'),(68,'admin','2017-05-29 17:13:19','::1'),(69,'admin','2017-05-29 17:32:30','::1'),(70,'admin','2017-05-30 13:42:50','::1'),(71,'admin','2017-05-30 14:06:24','::1'),(72,'admin','2017-05-30 16:43:06','::1'),(73,'admin','2017-06-01 03:44:26','::1'),(74,'admin','2017-06-01 03:44:26','::1'),(75,'admin','2017-06-02 16:03:47','::1'),(76,'admin','2017-06-02 16:08:23','::1'),(77,'admin','2017-06-03 02:19:38','::1'),(78,'admin','2017-06-03 13:37:29','::1'),(79,'admin','2017-06-03 17:05:05','::1'),(80,'admin','2017-06-06 13:57:03','::1'),(81,'admin','2017-06-07 15:45:18','::1'),(82,'admin','2017-06-07 16:46:15','::1'),(83,'admin','2017-06-07 21:20:34','::1'),(84,'admin','2017-06-08 13:35:28','::1'),(85,'admin','2017-06-08 16:17:32','::1'),(86,'admin','2017-06-08 16:33:57','::1'),(87,'admin','2017-06-09 15:05:13','::1'),(88,'admin','2017-06-11 04:08:00','::1'),(89,'admin','2017-06-11 15:45:31','::1'),(90,'admin','2017-06-13 13:54:52','::1'),(91,'admin','2017-06-13 14:19:20','::1'),(92,'admin','2017-06-14 15:14:49','::1'),(93,'admin','2017-06-19 04:02:26','::1'),(94,'admin','2017-06-19 09:16:07','::1'),(95,'admin','2017-07-03 11:38:22','::1'),(96,'admin','2017-07-03 15:29:10','::1'),(97,'admin','2017-07-04 01:52:50','::1'),(98,'admin','2017-07-04 05:08:12','::1'),(99,'admin','2017-07-04 16:17:47','111.68.118.242'),(100,'admin','2017-07-04 16:38:47','112.215.171.170'),(101,'admin','2017-07-04 17:28:47','112.215.171.170'),(102,'admin','2017-07-04 18:36:44','114.124.144.219'),(103,'admin','2017-07-04 22:52:28','114.124.242.95'),(104,'admin','2017-07-05 00:07:55','112.215.171.170'),(105,'admin','2017-07-05 06:29:53','114.124.209.11'),(106,'admin','2017-07-05 07:22:00','115.85.78.178'),(107,'admin','2017-07-05 14:05:16','115.85.78.178'),(108,'admin','2017-07-05 15:35:09','115.85.78.178'),(109,'admin','2017-07-05 16:31:21','114.124.209.155'),(110,'admin','2017-07-05 18:35:12','112.215.235.7'),(111,'admin','2017-07-05 19:50:48','114.124.169.58'),(112,'admin','2017-07-06 07:38:08','111.68.118.242'),(113,'admin','2017-07-06 08:29:30','112.215.152.92'),(114,'admin','2017-07-06 09:12:01','115.85.78.178'),(115,'admin','2017-07-06 11:45:30','115.85.78.178'),(116,'admin','2017-07-06 14:29:56','111.68.118.242'),(117,'admin','2017-07-06 19:04:26','114.124.241.173'),(118,'admin','2017-07-07 09:10:39','::1'),(119,'admin','2017-07-07 13:01:40','::1'),(120,'admin','2017-07-07 22:17:34','::1'),(121,'admin','2017-07-08 20:39:10','::1'),(122,'admin','2017-07-08 21:08:41','::1'),(123,'admin','2017-07-09 01:19:07','::1'),(124,'admin','2017-07-09 01:20:00','::1'),(125,'admin','2017-07-09 03:28:45','::1'),(126,'admin','2017-07-09 08:37:08','::1'),(127,'admin','2017-07-09 10:34:11','::1'),(128,'admin','2017-07-09 10:39:12','::1'),(129,'admin','2017-07-09 20:46:42','::1'),(130,'admin','2017-07-10 17:29:18','::1'),(131,'admin','2017-07-11 21:53:33','::1'),(132,'admin','2017-07-11 21:54:09','::1'),(133,'admin','2017-07-12 21:56:25','::1'),(134,'admin','2017-07-12 22:00:00','::1'),(135,'admin','2017-07-12 22:31:01','::1'),(136,'admin','2017-07-13 00:47:06','::1'),(137,'admin','2017-07-13 20:23:29','::1'),(138,'admin','2017-07-14 17:48:38','::1'),(139,'admin','2017-07-14 21:33:10','::1'),(140,'admin','2017-07-14 22:35:34','::1'),(141,'admin','2017-07-15 12:55:18','127.0.0.1'),(142,'admin','2017-07-15 13:05:33','127.0.0.1'),(143,'admin','2017-07-15 19:08:42','127.0.0.1'),(144,'admin','2017-07-15 22:57:07','127.0.0.1'),(145,'admin','2017-07-15 23:22:36','127.0.0.1'),(146,'admin','2017-07-16 10:19:26','::1'),(147,'admin','2017-07-16 14:23:22','::1'),(148,'admin','2017-07-16 16:02:50','::1'),(149,'admin','2017-07-16 21:50:13','::1'),(150,'admin','2017-07-17 08:02:43','::1'),(151,'admin','2017-07-17 09:44:13','::1'),(152,'admin','2017-07-17 11:50:52','::1'),(153,'admin','2017-07-17 13:10:52','::1'),(154,'admin','2017-07-19 21:45:58','::1'),(155,'admin','2017-07-20 21:22:08','::1'),(156,'admin','2017-07-21 10:13:52','::1'),(157,'admin','2017-07-21 13:36:41','::1'),(158,'admin','2017-07-22 19:21:42','::1'),(159,'admin','2017-07-22 20:42:19','::1'),(160,'admin','2017-07-23 10:29:00','::1'),(161,'admin','2017-07-23 16:16:10','::1'),(162,'admin','2017-07-23 16:18:39','::1'),(163,'admin','2017-07-23 19:10:05','::1'),(164,'admin','2017-07-24 00:20:39','::1'),(165,'admin','2017-07-25 09:58:00','::1'),(166,'admin','2017-07-25 20:09:14','::1'),(167,'admin','2017-07-25 20:27:07','::1'),(168,'admin','2017-07-25 23:03:04','::1'),(169,'admin','2017-07-25 23:09:26','::1'),(170,'admin','2017-07-26 21:50:07','::1'),(171,'admin','2017-07-27 11:34:37','::1'),(172,'admin','2017-07-27 17:33:44','::1'),(173,'admin','2017-07-27 20:50:28','::1'),(174,'admin','2017-07-27 22:29:51','::1'),(175,'admin','2017-07-27 22:53:24','::1'),(176,'admin','2017-07-30 19:45:08','::1'),(177,'admin','2017-07-30 19:58:23','::1'),(178,'admin','2017-08-01 10:40:10','::1'),(179,'admin','2017-08-01 14:21:01','::1'),(180,'admin','2017-08-01 21:46:40','::1'),(181,'admin','2017-08-03 22:00:13','::1'),(182,'admin','2017-08-03 23:34:18','::1'),(183,'admin','2017-08-04 00:07:24','::1'),(184,'admin','2017-08-04 00:09:15','::1'),(185,'admin','2017-08-04 00:59:27','::1'),(186,'admin','2017-08-04 15:00:14','::1'),(187,'admin','2017-08-05 19:50:13','::1'),(188,'admin','2017-08-05 23:11:58','::1'),(189,'admin','2017-08-06 21:22:58','::1'),(190,'admin','2017-08-06 22:07:52','::1'),(191,'admin','2017-08-06 22:08:10','::1'),(192,'admin','2017-08-06 22:16:34','::1'),(193,'admin','2017-08-07 20:37:32','::1'),(194,'admin','2017-08-08 22:00:41','::1'),(195,'admin','2017-08-08 22:57:02','::1'),(196,'admin','2017-08-09 23:20:28','::1'),(197,'admin','2017-08-10 21:18:07','::1'),(198,'admin','2017-08-11 23:15:47','::1'),(199,'admin','2017-08-12 06:24:06','::1'),(200,'admin','2017-08-12 11:00:29','::1'),(201,'admin','2017-08-13 10:43:29','::1'),(202,'admin','2017-08-13 15:40:47','::1');

/*Table structure for table `modul` */

DROP TABLE IF EXISTS `modul`;

CREATE TABLE `modul` (
  `modul_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent` int(11) DEFAULT NULL,
  `nama_modul` varchar(30) DEFAULT NULL,
  `url` varchar(30) DEFAULT NULL,
  `icon` varchar(30) DEFAULT NULL,
  `sequence` int(11) DEFAULT NULL,
  PRIMARY KEY (`modul_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

/*Data for the table `modul` */

insert  into `modul`(`modul_id`,`parent`,`nama_modul`,`url`,`icon`,`sequence`) values (1,0,'Pendaftaran','pendaftaran','fa fa-pencil-square-o',1),(2,0,'Pembayaran','#','icon-calculator',2),(3,0,'Data Santri','#','icon-graduation',3),(4,0,'Data Guru','#','icon-user',4),(5,0,'Akademik','#','icon-grid',5),(6,0,'Rapor','#','icon-book-open',6),(7,0,'Master Data','#','fa fa-database',7),(8,0,'Infaq','infaq','glyphicon glyphicon-import',8),(9,0,'Tabungan Siswa','tabungan','icon-wallet',9),(10,0,'Laporan','#','glyphicon glyphicon-list-alt',10),(11,2,'Uang Bulanan','#','glyphicon glyphicon-minus',1),(12,2,'Uang Semester','#','glyphicon glyphicon-minus',2),(14,3,'Daftar Santri Aitam','aitam','glyphicon glyphicon-minus',0),(15,3,'Daftar Santri TMI','tmi','glyphicon glyphicon-minus',0),(16,4,'Daftar Guru / Karyawan','#','glyphicon glyphicon-minus',0),(17,4,'Beban Kerja','#','glyphicon glyphicon-minus',0),(18,4,'Pembagian Tugas','#','glyphicon glyphicon-minus',0),(19,5,'Kurikulum','kurikulum','glyphicon glyphicon-minus',1),(20,5,'Jadwal Pelajaran','#','glyphicon glyphicon-minus',2),(21,5,'Jadwal Guru','#','glyphicon glyphicon-minus',3),(22,5,'RPP','#','glyphicon glyphicon-minus',4),(23,5,'Absensi','#','glyphicon glyphicon-minus',6),(24,5,'Nilai','#','glyphicon glyphicon-minus',5),(25,7,'Data Pelajaran','mata_pelajaran','glyphicon glyphicon-minus',2),(26,7,'Data Kelas','kelas','glyphicon glyphicon-minus',6),(27,7,'Data Kamar','kamar','glyphicon glyphicon-minus',4),(28,7,'Data Gedung','gedung','glyphicon glyphicon-minus',3),(29,7,'Data Bidang Studi','bidstudi','glyphicon glyphicon-minus',1),(30,7,'Data Bagian','bagian','glyphicon glyphicon-minus',5);

/*Table structure for table `ms_bagian` */

DROP TABLE IF EXISTS `ms_bagian`;

CREATE TABLE `ms_bagian` (
  `kode_bagian` varchar(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ms_bagian` */

insert  into `ms_bagian`(`kode_bagian`,`nama`,`userid`,`recdate`) values ('B01','BAGIAN 01','admin','2017-08-05'),('B02','BAGIAN 02','admin','2017-08-05'),('B03','BAGIAN 03','admin','2017-08-05');

/*Table structure for table `ms_banksoal` */

DROP TABLE IF EXISTS `ms_banksoal`;

CREATE TABLE `ms_banksoal` (
  `id_soal` int(11) DEFAULT NULL,
  `type_soal` varchar(20) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `soal` varchar(50) DEFAULT NULL,
  `jwb_a` varchar(50) DEFAULT NULL,
  `jwb_b` varchar(50) DEFAULT NULL,
  `jwb_c` varchar(50) DEFAULT NULL,
  `jwb_d` varchar(50) DEFAULT NULL,
  `jwb_benar` varchar(2) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ms_banksoal` */

/*Table structure for table `ms_bebanguru` */

DROP TABLE IF EXISTS `ms_bebanguru`;

CREATE TABLE `ms_bebanguru` (
  `id_guru` int(11) DEFAULT NULL,
  `jml_beban` int(11) DEFAULT NULL,
  `id_thn_ajar` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ms_bebanguru` */

/*Table structure for table `ms_biaya` */

DROP TABLE IF EXISTS `ms_biaya`;

CREATE TABLE `ms_biaya` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(8) DEFAULT NULL,
  `nama_item` varchar(25) DEFAULT NULL,
  `nominal` double DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ms_biaya` */

/*Table structure for table `ms_bidang_study` */

DROP TABLE IF EXISTS `ms_bidang_study`;

CREATE TABLE `ms_bidang_study` (
  `id_bidang` varchar(10) DEFAULT NULL,
  `nama_bidang` varchar(50) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ms_bidang_study` */

insert  into `ms_bidang_study`(`id_bidang`,`nama_bidang`,`userid`,`recdate`) values ('BS01','IPA','admin','2017-08-06 00:00:00'),('BS02','IPS','admin','2017-08-13 00:00:00'),('BS03','ILMU PASTI','admin','2017-08-13 00:00:00');

/*Table structure for table `ms_family` */

DROP TABLE IF EXISTS `ms_family`;

CREATE TABLE `ms_family` (
  `id` int(11) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `nama_anak` varchar(50) DEFAULT NULL,
  `tanggal_lahir` varchar(10) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ms_family` */

/*Table structure for table `ms_fisik_santri` */

DROP TABLE IF EXISTS `ms_fisik_santri`;

CREATE TABLE `ms_fisik_santri` (
  `no_registrasi` varchar(15) DEFAULT NULL,
  `gol_darah` varchar(10) DEFAULT NULL,
  `tinggi_badan` int(3) DEFAULT NULL,
  `berat_badan` int(3) DEFAULT NULL,
  `khitan` varchar(5) DEFAULT NULL,
  `kondisi_pendidikan` varchar(6) DEFAULT NULL,
  `ekonomi_keluarga` varchar(6) DEFAULT NULL,
  `situasi_rumah` varchar(13) DEFAULT NULL,
  `dekat_dengan` varchar(15) DEFAULT NULL,
  `hidup_beragama` varchar(6) DEFAULT NULL,
  `pengelihatan_mata` varchar(6) DEFAULT NULL,
  `kaca_mata` varchar(5) DEFAULT NULL,
  `pendengaran` varchar(6) DEFAULT NULL,
  `operasi` varchar(6) DEFAULT NULL,
  `sebab` varchar(30) DEFAULT NULL,
  `kecelakaan` varchar(6) DEFAULT NULL,
  `akibat` varchar(30) DEFAULT NULL,
  `alergi` varchar(15) DEFAULT NULL,
  `thn_fisik` date DEFAULT NULL,
  `kelainan_fisik` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ms_fisik_santri` */

insert  into `ms_fisik_santri`(`no_registrasi`,`gol_darah`,`tinggi_badan`,`berat_badan`,`khitan`,`kondisi_pendidikan`,`ekonomi_keluarga`,`situasi_rumah`,`dekat_dengan`,`hidup_beragama`,`pengelihatan_mata`,`kaca_mata`,`pendengaran`,`operasi`,`sebab`,`kecelakaan`,`akibat`,`alergi`,`thn_fisik`,`kelainan_fisik`) values ('CT38170001','A',175,75,'SUDAH','KETAT','CUKUP','PERKOTAAN','SEKOLAH','BAIK','SEDANG','YA','BAIK','TIDAK','-','TIDAK','-','DINGIN','0000-00-00','-'),('T38170001','A',160,55,'SUDAH','SEDANG','CUKUP','PERKAMPUNGAN','PASAR','BAIK','BAIK','TIDAK','BAIK','TIDAK','-','TIDAK','-','-','2017-07-01','-'),('T3817002','A',345,345,'SUDAH','KETAT','MAMPU','PERKOTAAN','MASJID','BAIK','BAIK','TIDAK','BAIK','TIDAK','34534','TIDAK','34534','34543','2017-08-15','345345');

/*Table structure for table `ms_gapok` */

DROP TABLE IF EXISTS `ms_gapok`;

CREATE TABLE `ms_gapok` (
  `id_gapok` int(11) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `tahun` varchar(5) DEFAULT NULL,
  `nominal` float DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ms_gapok` */

/*Table structure for table `ms_gedung` */

DROP TABLE IF EXISTS `ms_gedung`;

CREATE TABLE `ms_gedung` (
  `kode_gedung` varchar(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ms_gedung` */

insert  into `ms_gedung`(`kode_gedung`,`nama`,`userid`,`recdate`) values ('GD02','GEDUNG 02','admin','2017-08-05'),('GD03','GEDUNG 03','admin','2017-08-05'),('GD01','GEDUNG 01','admin','2017-08-05');

/*Table structure for table `ms_guru` */

DROP TABLE IF EXISTS `ms_guru`;

CREATE TABLE `ms_guru` (
  `id_guru` int(11) DEFAULT NULL,
  `no_reg` varchar(30) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `nama_arab` varchar(50) DEFAULT NULL,
  `no_ptk` varchar(30) DEFAULT NULL,
  `nig` varchar(30) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jns_kelamin` varchar(20) DEFAULT NULL,
  `no_kk` varchar(30) DEFAULT NULL,
  `no_ktp` varchar(20) DEFAULT NULL,
  `kewarganegaraan` varchar(10) DEFAULT NULL,
  `no_rumah` varchar(20) DEFAULT NULL,
  `dusun` varchar(20) DEFAULT NULL,
  `desa` varchar(20) DEFAULT NULL,
  `kecamatan` varchar(20) DEFAULT NULL,
  `propinsi` varchar(20) DEFAULT NULL,
  `kodepos` varchar(10) DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nama_ayah` varchar(50) DEFAULT NULL,
  `nama_ibu` varchar(50) DEFAULT NULL,
  `nama_pasangan` varchar(50) DEFAULT NULL,
  `tgl_pasangan` date DEFAULT NULL,
  `jml_anak` int(11) DEFAULT NULL,
  `akedemik` varchar(50) DEFAULT NULL,
  `STATUS` varchar(20) DEFAULT NULL,
  `pendidikan_terakhir` varchar(30) DEFAULT NULL,
  `alumni` varchar(3) DEFAULT NULL,
  `id_jabatan` varchar(10) DEFAULT NULL,
  `no_sk` varchar(50) DEFAULT NULL,
  `id_gapok` int(11) DEFAULT NULL,
  `masa_abdi` mediumtext,
  `ijazah` varchar(50) DEFAULT NULL,
  `mengajar_sejak` int(11) DEFAULT NULL,
  `sertifikasi` varchar(50) DEFAULT NULL,
  `file_sertifikasi` varchar(50) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ms_guru` */

/*Table structure for table `ms_histori_biaya` */

DROP TABLE IF EXISTS `ms_histori_biaya`;

CREATE TABLE `ms_histori_biaya` (
  `idhist` int(11) DEFAULT NULL,
  `id_biaya` int(11) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL,
  `nominal` float DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ms_histori_biaya` */

/*Table structure for table `ms_infaq` */

DROP TABLE IF EXISTS `ms_infaq`;

CREATE TABLE `ms_infaq` (
  `id_infaq` int(11) NOT NULL AUTO_INCREMENT,
  `keytrans` varchar(1) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tgl_infaq` date NOT NULL,
  `tipe` varchar(20) DEFAULT NULL,
  `nominal` float DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_infaq`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `ms_infaq` */

/*Table structure for table `ms_kamar` */

DROP TABLE IF EXISTS `ms_kamar`;

CREATE TABLE `ms_kamar` (
  `kode_kamar` varchar(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ms_kamar` */

insert  into `ms_kamar`(`kode_kamar`,`nama`,`userid`,`recdate`) values ('K02','KAMAR 02','admin','2017-08-05'),('K01','KAMAR 01','admin','2017-08-05'),('K03','KAMAR 03','admin','2017-08-05');

/*Table structure for table `ms_kecakapan_santri` */

DROP TABLE IF EXISTS `ms_kecakapan_santri`;

CREATE TABLE `ms_kecakapan_santri` (
  `no_registrasi` varchar(15) DEFAULT NULL,
  `bid_studi` varchar(15) DEFAULT NULL,
  `olahraga` varchar(15) DEFAULT NULL,
  `kesenian` varchar(15) DEFAULT NULL,
  `keterampilan` varchar(15) DEFAULT NULL,
  `lain_lain` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ms_kecakapan_santri` */

insert  into `ms_kecakapan_santri`(`no_registrasi`,`bid_studi`,`olahraga`,`kesenian`,`keterampilan`,`lain_lain`) values ('T38170001','MATEMATIKA','LARI','MENYANYI','-','-'),('CT38170001','FISIKA','RENANG','MENARI','MEMASAK','-'),('CT38170001','KIMIA 3','1','1','2','W');

/*Table structure for table `ms_kelas` */

DROP TABLE IF EXISTS `ms_kelas`;

CREATE TABLE `ms_kelas` (
  `kode_kelas` varchar(10) DEFAULT NULL,
  `tingkat` int(11) DEFAULT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `tipe_kelas` varchar(10) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ms_kelas` */

insert  into `ms_kelas`(`kode_kelas`,`tingkat`,`nama`,`tipe_kelas`,`userid`,`recdate`) values ('KR1B',1,'KELAS 1B','REGULER','admin','2017-08-05'),('KR1A',1,'KELAS 1A','REGULER','admin','2017-08-05'),('KR2A',2,'KELAS 2 A','REGULER','admin','2017-08-05'),('KR2B',2,'KELAS 2B','REGULER','admin','2017-08-05'),('KR3A',3,'KELAS 3A','REGULER','admin','2017-08-08');

/*Table structure for table `ms_kelas_d` */

DROP TABLE IF EXISTS `ms_kelas_d`;

CREATE TABLE `ms_kelas_d` (
  `id_kelas_dtl` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ms_kelas_d` */

/*Table structure for table `ms_kelas_h` */

DROP TABLE IF EXISTS `ms_kelas_h`;

CREATE TABLE `ms_kelas_h` (
  `id_kelas` int(11) DEFAULT NULL,
  `nama_kelas` varchar(50) DEFAULT NULL,
  `type_kelas` varchar(10) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ms_kelas_h` */

/*Table structure for table `ms_keluarga` */

DROP TABLE IF EXISTS `ms_keluarga`;

CREATE TABLE `ms_keluarga` (
  `no_registrasi` varchar(15) DEFAULT NULL COMMENT 'YY (hijriyah) + YY ( masehi ) + xxxx',
  `kategori` varchar(10) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `nik` int(10) DEFAULT NULL,
  `binbinti` varchar(25) DEFAULT NULL,
  `jenis_kelamin` varchar(1) DEFAULT NULL COMMENT 'L/P',
  `status` varchar(10) DEFAULT NULL,
  `tgl_wafat` date DEFAULT NULL,
  `umur` int(3) DEFAULT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `sebab_wafat` varchar(25) DEFAULT NULL,
  `status_perkawinan` varchar(25) DEFAULT NULL,
  `pendapatan_ibu` double DEFAULT NULL,
  `sebab_tdk_bekerja` varchar(35) DEFAULT NULL,
  `keahlian` varchar(35) DEFAULT NULL,
  `status_rumah` varchar(20) DEFAULT NULL,
  `kondisi_rumah` varchar(20) DEFAULT NULL,
  `jml_asuh` int(3) DEFAULT NULL,
  `pekerjaan` varchar(25) DEFAULT NULL,
  `pend_terakhir` varbinary(10) DEFAULT NULL,
  `agama` varbinary(10) DEFAULT NULL,
  `suku` varchar(15) DEFAULT NULL,
  `kewarganegaraan` varchar(10) DEFAULT NULL,
  `ormas` varchar(15) DEFAULT NULL,
  `orpol` varchar(10) DEFAULT NULL,
  `kedukmas` varchar(15) DEFAULT NULL,
  `thn_lulus` date DEFAULT NULL,
  `no_stambuk_alumni` int(11) DEFAULT NULL,
  `tempat_lahir` varchar(15) DEFAULT NULL,
  `tgl_lahir_keluarga` date DEFAULT NULL,
  `hub_kel` varchar(25) DEFAULT NULL,
  `keterangan` varchar(25) DEFAULT NULL,
  `ktp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ms_keluarga` */

insert  into `ms_keluarga`(`no_registrasi`,`kategori`,`nama`,`nik`,`binbinti`,`jenis_kelamin`,`status`,`tgl_wafat`,`umur`,`hari`,`sebab_wafat`,`status_perkawinan`,`pendapatan_ibu`,`sebab_tdk_bekerja`,`keahlian`,`status_rumah`,`kondisi_rumah`,`jml_asuh`,`pekerjaan`,`pend_terakhir`,`agama`,`suku`,`kewarganegaraan`,`ormas`,`orpol`,`kedukmas`,`thn_lulus`,`no_stambuk_alumni`,`tempat_lahir`,`tgl_lahir_keluarga`,`hub_kel`,`keterangan`,`ktp`) values ('T38170001','AYAH','ASEP SANJAYA',2147483647,'ROJAK','P','','0000-00-00',0,'','','',0,'','','','',0,'KARYAWAN SWASTA','SMA/SMK','ISLAM','743872333738739','INDONESIA','-','-','-','2000-01-01',1234,'GARUT','1978-06-05','','','3LFs.jpg'),('CT38170001','AYAH','MOMON BHAKTI',11223344,'-','P','','0000-00-00',0,'','','',0,'','','','',0,'PEDAGANG','SMP/SLTA','ISLAM','3211554','INDONESIA','ORMAS 1','ORPOL 2','-','0001-01-01',350,'TANJUNG ENIM','0000-00-00','','','x3VC.jpg'),('CT38170001','IBU','NELLY NAWARLI',22355445,'JASIMAH','W','','0000-00-00',0,'','','',0,'','','','',0,'PEDAGANG','SMA/SMK','ISLAM','33225454','INDONESIA','-','-','-','0001-01-01',865,'TANJUNG ENIM','0000-00-00','','','KJVx.png');

/*Table structure for table `ms_mata_pelajaran` */

DROP TABLE IF EXISTS `ms_mata_pelajaran`;

CREATE TABLE `ms_mata_pelajaran` (
  `id_matpal` varchar(10) DEFAULT NULL,
  `nama_matpal` varchar(25) DEFAULT NULL,
  `id_bidang` varchar(10) DEFAULT NULL,
  `status` varchar(8) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ms_mata_pelajaran` */

insert  into `ms_mata_pelajaran`(`id_matpal`,`nama_matpal`,`id_bidang`,`status`,`userid`,`recdate`) values ('MPSJ','SEJARAH','BS02','1','admin','2017-08-13 00:00:00'),('MPGEO','GEOGRAFI','BS02','1','admin','2017-08-13 00:00:00'),('MP03','KIMIA','BS01','0','admin','2017-08-06 00:00:00'),('MP02','BIOLOGI','BS01','1','admin','2017-08-06 00:00:00'),('MP01','FISIKA','BS01','1','admin','2017-08-06 00:00:00'),('MPSO','SOSIOLOGI','BS02','1','admin','2017-08-13 00:00:00'),('MPEK','EKONOMI','BS02','1','admin','2017-08-13 00:00:00'),('MPNI','NISAIYYAH','BS02','1','admin','2017-08-13 00:00:00'),('MP04','BERHITUNG','BS03','1','admin','2017-08-13 00:00:00'),('MP05','MATEMATIKA','BS03','1','admin','2017-08-13 00:00:00');

/*Table structure for table `ms_penyakit` */

DROP TABLE IF EXISTS `ms_penyakit`;

CREATE TABLE `ms_penyakit` (
  `no_registrasi` varchar(15) DEFAULT NULL,
  `nama_penyakit` varchar(15) DEFAULT NULL,
  `thn_penyakit` year(4) DEFAULT NULL,
  `kategori_penyakit` varchar(15) DEFAULT NULL,
  `tipe_penyakit` varchar(15) DEFAULT NULL,
  `lamp_bukti` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ms_penyakit` */

insert  into `ms_penyakit`(`no_registrasi`,`nama_penyakit`,`thn_penyakit`,`kategori_penyakit`,`tipe_penyakit`,`lamp_bukti`) values ('T38170001','AAYAN',2010,'KRONIS','TIDAK MENULAR','3JCn.jpeg'),('T38170001','BATUK',2010,'TIDAK KRONIS','TIDAK MENULAR','lAro.jpeg'),('CT38170001','ALERGI DINGIN',0000,'TIDAK KRONIS','TIDAK MENULAR','OIM4.pdf');

/*Table structure for table `ms_santri` */

DROP TABLE IF EXISTS `ms_santri`;

CREATE TABLE `ms_santri` (
  `kategori` varchar(15) DEFAULT NULL,
  `no_registrasi` varchar(15) CHARACTER SET latin1 NOT NULL COMMENT 'YY masehi  + YY hijriyah + xxxx',
  `no_stambuk` int(11) DEFAULT NULL,
  `thn_masuk` date DEFAULT NULL,
  `rayon` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `kamar` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `bagian` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `kel_sekarang` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `nisn` int(10) DEFAULT NULL,
  `nisnlokal` int(10) DEFAULT NULL,
  `nama_lengkap` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `nama_arab` varchar(30) DEFAULT NULL,
  `nama_panggilan` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `hobi` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `uang_jajan_perbulan` double DEFAULT NULL,
  `no_kk` int(16) DEFAULT NULL,
  `nik` int(15) DEFAULT NULL COMMENT 'No.Urut + Tahun Hijriyah + Tahun Masehi',
  `tempat_lahir` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `konsulat` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `nama_sekolah` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `kelas_sekolah` varchar(6) CHARACTER SET latin1 DEFAULT NULL,
  `alamat_sekolah` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `suku` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `kewarganegaraan` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `jalan` varchar(50) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Field Alamat, sama dengan data wali atau ortu',
  `no_rumah` varchar(50) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Field Alamat, sama dengan data wali atau ortu',
  `dusun` varchar(15) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Field Alamat, sama dengan data wali atau ortu',
  `desa` varchar(15) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Field Alamat, sama dengan data wali atau ortu',
  `kecamatan` varchar(15) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Field Alamat, sama dengan data wali atau ortu',
  `kabupaten` varchar(15) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Field Alamat, sama dengan data wali atau ortu',
  `provinsi` varchar(15) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Field Alamat, sama dengan data wali atau ortu',
  `kd_pos` int(8) DEFAULT NULL COMMENT 'Field Alamat, sama dengan data wali atau ortu',
  `no_tlp` int(20) DEFAULT NULL COMMENT 'Field Alamat, sama dengan data wali atau ortu',
  `no_hp` int(20) DEFAULT NULL COMMENT 'Field Alamat, sama dengan data wali atau ortu',
  `email` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `fb` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `dibesarkan_di` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `lamp_ijazah` varchar(25) CHARACTER SET latin1 DEFAULT NULL COMMENT 'File Upload',
  `lamp_photo` varchar(25) CHARACTER SET latin1 DEFAULT NULL COMMENT 'File Upload',
  `lamp_akta_kelahiran` varchar(25) CHARACTER SET latin1 DEFAULT NULL COMMENT 'File Upload',
  `lamp_kk` varchar(25) CHARACTER SET latin1 DEFAULT NULL COMMENT 'File Upload',
  `lamp_skhun` varchar(25) CHARACTER SET latin1 DEFAULT NULL COMMENT 'File Upload',
  `lamp_transkip_nilai` varchar(25) CHARACTER SET latin1 DEFAULT NULL COMMENT 'File Upload',
  `lamp_skkb` varchar(25) CHARACTER SET latin1 DEFAULT NULL COMMENT 'File Upload',
  `lamp_surat_kesehatan` varchar(25) CHARACTER SET latin1 DEFAULT NULL COMMENT 'File Upload',
  PRIMARY KEY (`no_registrasi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ms_santri` */

insert  into `ms_santri`(`kategori`,`no_registrasi`,`no_stambuk`,`thn_masuk`,`rayon`,`kamar`,`bagian`,`kel_sekarang`,`nisn`,`nisnlokal`,`nama_lengkap`,`nama_arab`,`nama_panggilan`,`hobi`,`uang_jajan_perbulan`,`no_kk`,`nik`,`tempat_lahir`,`tgl_lahir`,`konsulat`,`nama_sekolah`,`kelas_sekolah`,`alamat_sekolah`,`suku`,`kewarganegaraan`,`jalan`,`no_rumah`,`dusun`,`desa`,`kecamatan`,`kabupaten`,`provinsi`,`kd_pos`,`no_tlp`,`no_hp`,`email`,`fb`,`dibesarkan_di`,`lamp_ijazah`,`lamp_photo`,`lamp_akta_kelahiran`,`lamp_kk`,`lamp_skhun`,`lamp_transkip_nilai`,`lamp_skkb`,`lamp_surat_kesehatan`) values ('TMI','CT38170001',0,'2017-07-25',NULL,NULL,NULL,NULL,11223344,55667788,'FARITNO ZULIANSYAH','فاريت','FARITNO','NGOPI',1000000,113345587,3355777,'TANJUNG ENIM','1989-07-10','KONSULAT 1',NULL,NULL,NULL,'SUMATERA','INDONESIA','PERUMAHAN MEDANG','NO3 RT 003 RW 013','MEDANG','PAGEDANGAN','LEGOK','TANGERANG SELAT','BANTEN',523314,21558877,2147483647,'faritno@me.com','faritno@faceboo','TANJUNG EN','CoWhmFmcJ0nt3S5jbf5s.pdf','5tzrpZTl8IQ06C1aEcx1.jpg','rAt6IRPZixfk4BkPnuaJ.pdf','2bmJoaZ3jpFr8ls4HZZG.pdf','lLkvUG5fKbl8HfIS7kgG.PDF','QqBicZPU3YxgKSNz7Dey.pdf','vKUpKarTdnVbJkW1EuzD.pdf','NQrIxQDvHtJIDcQzbYyM.pdf'),('TMI','T38170001',1,'2017-07-10','GD01','K01','B01','KR1A',123456789,1234567890,'RUDI HERMAWAN','قعيه اثقةشصشى','RUDI','OLAHRAGE',300000,2147483647,2147483647,'GARUT','2004-03-08','SINDANG',NULL,NULL,NULL,'SUNDA','INDONESIA','JL. LANCAR JAYA','NO.18 007/008','KEJAYAAN','MAJU TERUS','KECAMATAN1','KABUPATEN1','JAWA BARAT',11876,24765984,2147483647,'rudi@gmail.com','rudi@facebook','garut',NULL,'mnWyWkatVr4JTzcE0abP.jpg',NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `ms_tabungan` */

DROP TABLE IF EXISTS `ms_tabungan`;

CREATE TABLE `ms_tabungan` (
  `no_registrasi` varchar(15) DEFAULT NULL,
  `tgl_tabungan` date DEFAULT NULL,
  `tipe` varchar(6) DEFAULT NULL,
  `nominal` double DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) DEFAULT NULL,
  KEY `pk` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ms_tabungan` */

/*Table structure for table `ms_tarbiyatul` */

DROP TABLE IF EXISTS `ms_tarbiyatul`;

CREATE TABLE `ms_tarbiyatul` (
  `id_tarbiyatul` int(11) DEFAULT NULL,
  `id_thn_ajar` int(11) DEFAULT NULL,
  `id_dtl_kelas` int(11) DEFAULT NULL,
  `hissoh` varchar(50) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ms_tarbiyatul` */

/*Table structure for table `query` */

DROP TABLE IF EXISTS `query`;

CREATE TABLE `query` (
  `user` varchar(100) NOT NULL DEFAULT '',
  `menu` varchar(25) NOT NULL DEFAULT '',
  `query` text,
  PRIMARY KEY (`user`,`menu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `query` */

/*Table structure for table `sequence` */

DROP TABLE IF EXISTS `sequence`;

CREATE TABLE `sequence` (
  `nama_field` varchar(20) NOT NULL DEFAULT '',
  `nomor_terakhir` varchar(15) DEFAULT NULL,
  `remark` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`nama_field`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `sequence` */

insert  into `sequence`(`nama_field`,`nomor_terakhir`,`remark`) values ('Stambuk_TMI','1',NULL),('noreg_TMI','T38170001',NULL),('noreg_CalonTMI','CT38170002',NULL);

/*Table structure for table `tabungan_temp` */

DROP TABLE IF EXISTS `tabungan_temp`;

CREATE TABLE `tabungan_temp` (
  `no_registrasi` varchar(10) NOT NULL,
  `saldo` float DEFAULT NULL,
  `recuser` varchar(20) DEFAULT NULL,
  `recdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`no_registrasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tabungan_temp` */

/*Table structure for table `trans_absensi` */

DROP TABLE IF EXISTS `trans_absensi`;

CREATE TABLE `trans_absensi` (
  `id_jadwal` int(11) DEFAULT NULL,
  `no_register` varchar(15) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `absensi` varchar(10) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `trans_absensi` */

/*Table structure for table `trans_jadwwal_pelajaran` */

DROP TABLE IF EXISTS `trans_jadwwal_pelajaran`;

CREATE TABLE `trans_jadwwal_pelajaran` (
  `id_jadwal` int(11) DEFAULT NULL,
  `id_thn_ajar` int(11) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `id_dtl_kelas` int(11) DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `hari` varchar(20) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `trans_jadwwal_pelajaran` */

/*Table structure for table `trans_kurikulum` */

DROP TABLE IF EXISTS `trans_kurikulum`;

CREATE TABLE `trans_kurikulum` (
  `id_thn_ajar` int(11) DEFAULT NULL,
  `kode_kelas` varchar(10) DEFAULT NULL,
  `id_mapel` varchar(10) DEFAULT NULL,
  `sm_1` varchar(10) DEFAULT NULL,
  `sm_2` varchar(10) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `trans_kurikulum` */

insert  into `trans_kurikulum`(`id_thn_ajar`,`kode_kelas`,`id_mapel`,`sm_1`,`sm_2`,`userid`,`recdate`) values (2012,'KR1A','MP03','1','2','admin','2017-08-06 00:00:00');

/*Table structure for table `trans_pedidikan` */

DROP TABLE IF EXISTS `trans_pedidikan`;

CREATE TABLE `trans_pedidikan` (
  `id` int(11) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `tempat` varchar(50) DEFAULT NULL,
  `lulus` varchar(10) DEFAULT NULL,
  `STATUS` varchar(10) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `trans_pedidikan` */

/*Table structure for table `trans_pembayaran` */

DROP TABLE IF EXISTS `trans_pembayaran`;

CREATE TABLE `trans_pembayaran` (
  `tipe` varchar(20) DEFAULT NULL,
  `no_registrasi` varchar(15) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `nominal` double DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `trans_pembayaran` */

/*Table structure for table `trans_pembiayaan_siswa` */

DROP TABLE IF EXISTS `trans_pembiayaan_siswa`;

CREATE TABLE `trans_pembiayaan_siswa` (
  `no_registrasi` varchar(15) DEFAULT NULL,
  `pembiaya` varchar(10) DEFAULT NULL,
  `biaya_perbulan_min` double DEFAULT NULL,
  `biaya_perbulan_max` double DEFAULT NULL,
  `penghasilan` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `trans_pembiayaan_siswa` */

insert  into `trans_pembiayaan_siswa`(`no_registrasi`,`pembiaya`,`biaya_perbulan_min`,`biaya_perbulan_max`,`penghasilan`) values ('CT38170001','AYAH',3500000,6500000,8500000),('T38170001','AYAH',1000000,2000000,3500000),('T3817002','IBU',34534,34543,345);

/*Table structure for table `trans_rpp` */

DROP TABLE IF EXISTS `trans_rpp`;

CREATE TABLE `trans_rpp` (
  `id_rpp` int(11) DEFAULT NULL,
  `id_thn_ajar` int(11) DEFAULT NULL,
  `id_kelas_dtl` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `trans_rpp` */

/*Table structure for table `trans_rpp_detail` */

DROP TABLE IF EXISTS `trans_rpp_detail`;

CREATE TABLE `trans_rpp_detail` (
  `id_rpp_dtl` int(11) DEFAULT NULL,
  `id_rpp` int(11) DEFAULT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `minggu` varchar(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `materi_pokok` varchar(100) DEFAULT NULL,
  `alokasi_waktu` time DEFAULT NULL,
  `TIU` varchar(50) DEFAULT NULL,
  `jns_tagihan` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `trans_rpp_detail` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` varchar(15) NOT NULL DEFAULT '',
  `password` varchar(15) DEFAULT NULL,
  `nama_lengkap` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`user_id`,`password`,`nama_lengkap`) values ('admin','61abf45697b7432','Administrator');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
