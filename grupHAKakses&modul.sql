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

/*Data for the table `group_hak_akses` */

insert  into `group_hak_akses`(`group_id`,`modul_id`,`add`,`edit`,`delete`) values (1,1,1,1,1),(1,2,1,1,1),(1,3,1,1,1),(1,4,1,1,1),(1,5,1,1,1),(1,6,1,1,1),(1,7,1,1,1),(1,8,1,1,1),(1,9,1,1,1),(1,10,1,1,1),(1,11,1,1,1),(1,12,1,1,1),(1,14,1,1,1),(1,15,1,1,1),(1,16,1,1,1),(1,17,1,1,1),(1,18,1,1,1),(1,19,1,1,1),(1,20,1,1,1),(1,21,1,1,1),(1,22,1,1,1),(1,23,1,1,1),(1,24,1,1,1),(1,25,1,1,1),(1,26,1,1,1),(1,27,1,1,1),(1,28,1,1,1),(1,29,1,1,1),(1,30,1,1,1),(1,31,1,1,1),(1,32,1,1,1),(1,33,1,1,1),(1,34,1,1,1),(1,35,1,1,1),(1,36,1,1,1);

/*Data for the table `modul` */

insert  into `modul`(`modul_id`,`parent`,`nama_modul`,`url`,`icon`,`sequence`) values (1,0,'Pendaftaran','pendaftaran','fa fa-pencil-square-o',1),(2,0,'Pembayaran','#','icon-calculator',2),(3,0,'Data Santri','#','icon-graduation',3),(4,0,'Data Guru','#','icon-user',4),(5,0,'Akademik','#','icon-grid',5),(6,0,'Rapor','#','icon-book-open',6),(7,0,'Master Data','#','fa fa-database',7),(8,0,'Infaq','infaq','glyphicon glyphicon-import',8),(9,0,'Tabungan Siswa','tabungan','icon-wallet',9),(10,0,'Laporan','#','glyphicon glyphicon-list-alt',10),(11,2,'Uang Bulanan','#','glyphicon glyphicon-minus',1),(12,2,'Uang Semester','#','glyphicon glyphicon-minus',2),(14,3,'Daftar Santri Aitam','aitam','glyphicon glyphicon-minus',0),(15,3,'Daftar Santri TMI','tmi','glyphicon glyphicon-minus',0),(16,4,'Daftar Guru / Karyawan','guru','glyphicon glyphicon-minus',0),(17,4,'Beban Kerja','#','glyphicon glyphicon-minus',0),(18,4,'Pembagian Tugas','#','glyphicon glyphicon-minus',0),(19,5,'Kurikulum Utama','kurikulum','glyphicon glyphicon-minus',1),(20,5,'Jadwal Pelajaran Utama','jadwal_pelajaran','glyphicon glyphicon-minus',3),(21,5,'Jadwal Guru','#','glyphicon glyphicon-minus',5),(22,5,'RPP','rpp','glyphicon glyphicon-minus',6),(23,5,'Absensi','#','glyphicon glyphicon-minus',7),(24,5,'Nilai','#','glyphicon glyphicon-minus',8),(25,7,'Data Pelajaran','mata_pelajaran','glyphicon glyphicon-minus',2),(26,7,'Data Kelas','kelas','glyphicon glyphicon-minus',6),(27,7,'Data Kamar','kamar','glyphicon glyphicon-minus',4),(28,7,'Data Gedung','gedung','glyphicon glyphicon-minus',3),(29,7,'Data Bidang Studi','bidstudi','glyphicon glyphicon-minus',1),(30,7,'Data Bagian','bagian','glyphicon glyphicon-minus',5),(31,5,'Kurikulum Sore','kurikulumsore','glyphicon glyphicon-minus',2),(32,7,'Komponen Biaya','komponen','glyphicon glyphicon-minus',6),(33,7,'Data Donatur','donatur','glyphicon glyphicon-minus',7),(34,7,'Config','msconfig','glyphicon glyphicon-minus',8),(35,5,'Jadwal Pelajaran Sore & kitab','jadwal_pelajaran_sore','glyphicon glyphicon-minus',4),(36,7,'Semester','semester','glyphicon glyphicon-minus',9);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
