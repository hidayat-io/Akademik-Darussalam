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

/*Data for the table `group` */

insert  into `group`(`group_id`,`group_name`) values (1,'Administrator'),(2,'Guru'),(3,'Akademik');

/*Data for the table `group_daftar_user` */

insert  into `group_daftar_user`(`user_id`,`group_id`) values ('admin',1);

/*Data for the table `group_hak_akses` */

insert  into `group_hak_akses`(`group_id`,`modul_id`,`add`,`edit`,`delete`) values (1,1,1,1,1),(1,2,1,1,1),(1,3,1,1,1),(1,4,1,1,1),(1,5,1,1,1),(1,6,1,1,1),(1,7,1,1,1),(1,8,1,1,1),(1,9,1,1,1),(1,10,1,1,1),(1,11,1,1,1),(1,12,1,1,1),(1,14,1,1,1),(1,15,1,1,1),(1,16,1,1,1),(1,17,1,1,1),(1,18,1,1,1),(1,19,1,1,1),(1,20,1,1,1),(1,21,1,1,1),(1,22,1,1,1),(1,23,1,1,1),(1,24,1,1,1),(1,25,1,1,1),(1,26,1,1,1),(1,27,1,1,1),(1,28,1,1,1),(1,29,1,1,1),(1,30,1,1,1);

/*Data for the table `histori_master_biaya` */

/*Data for the table `infaq_temp` */

/*Data for the table `login_history` */

insert  into `login_history`(`id`,`user_id`,`time`,`ip_addr`) values (52,NULL,'2017-05-23 07:36:32','::1'),(53,NULL,'2017-05-24 00:50:36','::1'),(54,NULL,'2017-05-24 02:17:38','::1'),(55,NULL,'2017-05-24 02:18:31','::1'),(56,'admin','2017-05-24 02:20:56','::1'),(57,'admin','2017-05-24 02:37:50','::1'),(58,'admin','2017-05-24 02:45:53','::1'),(59,'admin','2017-05-24 03:19:35','::1'),(60,'admin','2017-05-24 03:28:36','111.68.118.242'),(61,'admin','2017-05-25 10:35:40','115.178.214.252'),(62,'admin','2017-05-26 16:09:36','112.215.170.36'),(63,'admin','2017-05-29 15:12:29','::1'),(64,'admin','2017-05-29 15:16:19','::1'),(65,'admin','2017-05-29 16:20:59','::1'),(66,'admin','2017-05-29 16:24:07','::1'),(67,'admin','2017-05-29 16:26:22','::1'),(68,'admin','2017-05-29 17:13:19','::1'),(69,'admin','2017-05-29 17:32:30','::1'),(70,'admin','2017-05-30 13:42:50','::1'),(71,'admin','2017-05-30 14:06:24','::1'),(72,'admin','2017-05-30 16:43:06','::1'),(73,'admin','2017-06-01 03:44:26','::1'),(74,'admin','2017-06-01 03:44:26','::1'),(75,'admin','2017-06-02 16:03:47','::1'),(76,'admin','2017-06-02 16:08:23','::1'),(77,'admin','2017-06-03 02:19:38','::1'),(78,'admin','2017-06-03 13:37:29','::1'),(79,'admin','2017-06-03 17:05:05','::1'),(80,'admin','2017-06-06 13:57:03','::1'),(81,'admin','2017-06-07 15:45:18','::1'),(82,'admin','2017-06-07 16:46:15','::1'),(83,'admin','2017-06-07 21:20:34','::1'),(84,'admin','2017-06-08 13:35:28','::1'),(85,'admin','2017-06-08 16:17:32','::1'),(86,'admin','2017-06-08 16:33:57','::1'),(87,'admin','2017-06-09 15:05:13','::1'),(88,'admin','2017-06-11 04:08:00','::1'),(89,'admin','2017-06-11 15:45:31','::1'),(90,'admin','2017-06-13 13:54:52','::1'),(91,'admin','2017-06-13 14:19:20','::1'),(92,'admin','2017-06-14 15:14:49','::1'),(93,'admin','2017-06-19 04:02:26','::1'),(94,'admin','2017-06-19 09:16:07','::1'),(95,'admin','2017-07-03 11:38:22','::1'),(96,'admin','2017-07-03 15:29:10','::1'),(97,'admin','2017-07-04 01:52:50','::1'),(98,'admin','2017-07-04 05:08:12','::1'),(99,'admin','2017-07-04 16:17:47','111.68.118.242'),(100,'admin','2017-07-04 16:38:47','112.215.171.170'),(101,'admin','2017-07-04 17:28:47','112.215.171.170'),(102,'admin','2017-07-04 18:36:44','114.124.144.219'),(103,'admin','2017-07-04 22:52:28','114.124.242.95'),(104,'admin','2017-07-05 00:07:55','112.215.171.170'),(105,'admin','2017-07-05 06:29:53','114.124.209.11'),(106,'admin','2017-07-05 07:22:00','115.85.78.178'),(107,'admin','2017-07-05 14:05:16','115.85.78.178'),(108,'admin','2017-07-05 15:35:09','115.85.78.178'),(109,'admin','2017-07-05 16:31:21','114.124.209.155'),(110,'admin','2017-07-05 18:35:12','112.215.235.7'),(111,'admin','2017-07-05 19:50:48','114.124.169.58'),(112,'admin','2017-07-06 07:38:08','111.68.118.242'),(113,'admin','2017-07-06 08:29:30','112.215.152.92'),(114,'admin','2017-07-06 09:12:01','115.85.78.178'),(115,'admin','2017-07-06 11:45:30','115.85.78.178'),(116,'admin','2017-07-06 14:29:56','111.68.118.242'),(117,'admin','2017-07-06 19:04:26','114.124.241.173'),(118,'admin','2017-07-07 09:10:39','::1'),(119,'admin','2017-07-07 13:01:40','::1'),(120,'admin','2017-07-07 22:17:34','::1'),(121,'admin','2017-07-08 20:39:10','::1'),(122,'admin','2017-07-08 21:08:41','::1'),(123,'admin','2017-07-09 01:19:07','::1'),(124,'admin','2017-07-09 01:20:00','::1'),(125,'admin','2017-07-09 03:28:45','::1'),(126,'admin','2017-07-09 08:37:08','::1'),(127,'admin','2017-07-09 10:34:11','::1'),(128,'admin','2017-07-09 10:39:12','::1'),(129,'admin','2017-07-09 20:46:42','::1'),(130,'admin','2017-07-10 17:29:18','::1'),(131,'admin','2017-07-11 21:53:33','::1'),(132,'admin','2017-07-11 21:54:09','::1'),(133,'admin','2017-07-12 21:56:25','::1'),(134,'admin','2017-07-12 22:00:00','::1'),(135,'admin','2017-07-12 22:31:01','::1'),(136,'admin','2017-07-13 00:47:06','::1'),(137,'admin','2017-07-13 20:23:29','::1'),(138,'admin','2017-07-14 17:48:38','::1'),(139,'admin','2017-07-14 21:33:10','::1'),(140,'admin','2017-07-14 22:35:34','::1'),(141,'admin','2017-07-15 12:55:18','127.0.0.1'),(142,'admin','2017-07-15 13:05:33','127.0.0.1'),(143,'admin','2017-07-15 19:08:42','127.0.0.1'),(144,'admin','2017-07-15 22:57:07','127.0.0.1'),(145,'admin','2017-07-15 23:22:36','127.0.0.1'),(146,'admin','2017-07-16 10:19:26','::1'),(147,'admin','2017-07-16 14:23:22','::1'),(148,'admin','2017-07-16 16:02:50','::1'),(149,'admin','2017-07-16 21:50:13','::1'),(150,'admin','2017-07-17 08:02:43','::1'),(151,'admin','2017-07-17 09:44:13','::1'),(152,'admin','2017-07-17 11:50:52','::1'),(153,'admin','2017-07-17 13:10:52','::1'),(154,'admin','2017-07-19 21:45:58','::1'),(155,'admin','2017-07-20 21:22:08','::1'),(156,'admin','2017-07-21 10:13:52','::1'),(157,'admin','2017-07-21 13:36:41','::1'),(158,'admin','2017-07-22 19:21:42','::1'),(159,'admin','2017-07-22 20:42:19','::1'),(160,'admin','2017-07-23 10:29:00','::1'),(161,'admin','2017-07-23 16:16:10','::1'),(162,'admin','2017-07-23 16:18:39','::1'),(163,'admin','2017-07-23 19:10:05','::1'),(164,'admin','2017-07-24 00:20:39','::1'),(165,'admin','2017-07-25 09:58:00','::1'),(166,'admin','2017-07-25 20:09:14','::1'),(167,'admin','2017-07-25 20:27:07','::1'),(168,'admin','2017-07-25 23:03:04','::1'),(169,'admin','2017-07-25 23:09:26','::1'),(170,'admin','2017-07-26 21:50:07','::1'),(171,'admin','2017-07-27 11:34:37','::1'),(172,'admin','2017-07-27 17:33:44','::1'),(173,'admin','2017-07-27 20:50:28','::1'),(174,'admin','2017-07-27 22:29:51','::1'),(175,'admin','2017-07-27 22:53:24','::1'),(176,'admin','2017-07-30 19:45:08','::1'),(177,'admin','2017-07-30 19:58:23','::1'),(178,'admin','2017-08-01 10:40:10','::1'),(179,'admin','2017-08-01 14:21:01','::1'),(180,'admin','2017-08-01 21:46:40','::1'),(181,'admin','2017-08-03 22:00:13','::1'),(182,'admin','2017-08-03 23:34:18','::1'),(183,'admin','2017-08-04 00:07:24','::1'),(184,'admin','2017-08-04 00:09:15','::1'),(185,'admin','2017-08-04 00:59:27','::1'),(186,'admin','2017-08-04 15:00:14','::1'),(187,'admin','2017-08-05 19:50:13','::1'),(188,'admin','2017-08-05 23:11:58','::1'),(189,'admin','2017-08-06 21:22:58','::1'),(190,'admin','2017-08-06 22:07:52','::1'),(191,'admin','2017-08-06 22:08:10','::1'),(192,'admin','2017-08-06 22:16:34','::1'),(193,'admin','2017-08-07 20:37:32','::1'),(194,'admin','2017-08-08 22:00:41','::1'),(195,'admin','2017-08-08 22:57:02','::1'),(196,'admin','2017-08-09 23:20:28','::1'),(197,'admin','2017-08-10 21:18:07','::1'),(198,'admin','2017-08-11 23:15:47','::1'),(199,'admin','2017-08-12 06:24:06','::1'),(200,'admin','2017-08-12 11:00:29','::1'),(201,'admin','2017-08-13 10:43:29','::1'),(202,'admin','2017-08-13 15:40:47','::1'),(203,'admin','2017-08-13 18:42:08','::1');

/*Data for the table `modul` */

insert  into `modul`(`modul_id`,`parent`,`nama_modul`,`url`,`icon`,`sequence`) values (1,0,'Pendaftaran','pendaftaran','fa fa-pencil-square-o',1),(2,0,'Pembayaran','#','icon-calculator',2),(3,0,'Data Santri','#','icon-graduation',3),(4,0,'Data Guru','#','icon-user',4),(5,0,'Akademik','#','icon-grid',5),(6,0,'Rapor','#','icon-book-open',6),(7,0,'Master Data','#','fa fa-database',7),(8,0,'Infaq','infaq','glyphicon glyphicon-import',8),(9,0,'Tabungan Siswa','tabungan','icon-wallet',9),(10,0,'Laporan','#','glyphicon glyphicon-list-alt',10),(11,2,'Uang Bulanan','#','glyphicon glyphicon-minus',1),(12,2,'Uang Semester','#','glyphicon glyphicon-minus',2),(14,3,'Daftar Santri Aitam','aitam','glyphicon glyphicon-minus',0),(15,3,'Daftar Santri TMI','tmi','glyphicon glyphicon-minus',0),(16,4,'Daftar Guru / Karyawan','#','glyphicon glyphicon-minus',0),(17,4,'Beban Kerja','#','glyphicon glyphicon-minus',0),(18,4,'Pembagian Tugas','#','glyphicon glyphicon-minus',0),(19,5,'Kurikulum','kurikulum','glyphicon glyphicon-minus',1),(20,5,'Jadwal Pelajaran','#','glyphicon glyphicon-minus',2),(21,5,'Jadwal Guru','#','glyphicon glyphicon-minus',3),(22,5,'RPP','#','glyphicon glyphicon-minus',4),(23,5,'Absensi','#','glyphicon glyphicon-minus',6),(24,5,'Nilai','#','glyphicon glyphicon-minus',5),(25,7,'Data Pelajaran','mata_pelajaran','glyphicon glyphicon-minus',2),(26,7,'Data Kelas','kelas','glyphicon glyphicon-minus',6),(27,7,'Data Kamar','kamar','glyphicon glyphicon-minus',4),(28,7,'Data Gedung','gedung','glyphicon glyphicon-minus',3),(29,7,'Data Bidang Studi','bidstudi','glyphicon glyphicon-minus',1),(30,7,'Data Bagian','bagian','glyphicon glyphicon-minus',5);

/*Data for the table `ms_bagian` */

insert  into `ms_bagian`(`kode_bagian`,`nama`,`userid`,`recdate`) values ('B01','BAGIAN 01','admin','2017-08-05'),('B02','BAGIAN 02','admin','2017-08-05'),('B03','BAGIAN 03','admin','2017-08-05');

/*Data for the table `ms_banksoal` */

/*Data for the table `ms_bebanguru` */

/*Data for the table `ms_biaya` */

/*Data for the table `ms_bidang_study` */

insert  into `ms_bidang_study`(`id_bidang`,`nama_bidang`,`userid`,`recdate`) values ('BS01','IPA','admin','2017-08-06 00:00:00'),('BS02','IPS','admin','2017-08-13 00:00:00'),('BS03','ILMU PASTI','admin','2017-08-13 00:00:00');

/*Data for the table `ms_family` */

/*Data for the table `ms_fisik_santri` */

insert  into `ms_fisik_santri`(`no_registrasi`,`gol_darah`,`tinggi_badan`,`berat_badan`,`khitan`,`kondisi_pendidikan`,`ekonomi_keluarga`,`situasi_rumah`,`dekat_dengan`,`hidup_beragama`,`pengelihatan_mata`,`kaca_mata`,`pendengaran`,`operasi`,`sebab`,`kecelakaan`,`akibat`,`alergi`,`thn_fisik`,`kelainan_fisik`) values ('CT38170001','A',175,75,'SUDAH','KETAT','CUKUP','PERKOTAAN','SEKOLAH','BAIK','SEDANG','YA','BAIK','TIDAK','-','TIDAK','-','DINGIN','0000-00-00','-'),('T38170001','A',160,55,'SUDAH','SEDANG','CUKUP','PERKAMPUNGAN','PASAR','BAIK','BAIK','TIDAK','BAIK','TIDAK','-','TIDAK','-','-','2017-07-01','-'),('T3817002','A',345,345,'SUDAH','KETAT','MAMPU','PERKOTAAN','MASJID','BAIK','BAIK','TIDAK','BAIK','TIDAK','34534','TIDAK','34534','34543','2017-08-15','345345');

/*Data for the table `ms_gapok` */

/*Data for the table `ms_gedung` */

insert  into `ms_gedung`(`kode_gedung`,`nama`,`userid`,`recdate`) values ('GD02','GEDUNG 02','admin','2017-08-05'),('GD03','GEDUNG 03','admin','2017-08-05'),('GD01','GEDUNG 01','admin','2017-08-05');

/*Data for the table `ms_guru` */

/*Data for the table `ms_histori_biaya` */

/*Data for the table `ms_infaq` */

/*Data for the table `ms_kamar` */

insert  into `ms_kamar`(`kode_kamar`,`nama`,`userid`,`recdate`) values ('K02','KAMAR 02','admin','2017-08-05'),('K01','KAMAR 01','admin','2017-08-05'),('K03','KAMAR 03','admin','2017-08-05');

/*Data for the table `ms_kecakapan_santri` */

insert  into `ms_kecakapan_santri`(`no_registrasi`,`bid_studi`,`olahraga`,`kesenian`,`keterampilan`,`lain_lain`) values ('T38170001','MATEMATIKA','LARI','MENYANYI','-','-'),('CT38170001','FISIKA','RENANG','MENARI','MEMASAK','-'),('CT38170001','KIMIA 3','1','1','2','W');

/*Data for the table `ms_kelas` */

insert  into `ms_kelas`(`kode_kelas`,`tingkat`,`nama`,`tipe_kelas`,`userid`,`recdate`) values ('KR1B',1,'KELAS 1B','REGULER','admin','2017-08-05'),('KR1A',1,'KELAS 1A','REGULER','admin','2017-08-05'),('KR2A',2,'KELAS 2 A','REGULER','admin','2017-08-05'),('KR2B',2,'KELAS 2B','REGULER','admin','2017-08-05'),('KR3A',3,'KELAS 3A','REGULER','admin','2017-08-08');

/*Data for the table `ms_kelas_d` */

/*Data for the table `ms_kelas_h` */

/*Data for the table `ms_keluarga` */

insert  into `ms_keluarga`(`no_registrasi`,`kategori`,`nama`,`nik`,`binbinti`,`jenis_kelamin`,`status`,`tgl_wafat`,`umur`,`hari`,`sebab_wafat`,`status_perkawinan`,`pendapatan_ibu`,`sebab_tdk_bekerja`,`keahlian`,`status_rumah`,`kondisi_rumah`,`jml_asuh`,`pekerjaan`,`pend_terakhir`,`agama`,`suku`,`kewarganegaraan`,`ormas`,`orpol`,`kedukmas`,`thn_lulus`,`no_stambuk_alumni`,`tempat_lahir`,`tgl_lahir_keluarga`,`hub_kel`,`keterangan`,`ktp`) values ('T38170001','AYAH','ASEP SANJAYA',2147483647,'ROJAK','P','','0000-00-00',0,'','','',0,'','','','',0,'KARYAWAN SWASTA','SMA/SMK','ISLAM','743872333738739','INDONESIA','-','-','-','2000-01-01',1234,'GARUT','1978-06-05','','','3LFs.jpg'),('CT38170001','AYAH','MOMON BHAKTI',11223344,'-','P','','0000-00-00',0,'','','',0,'','','','',0,'PEDAGANG','SMP/SLTA','ISLAM','3211554','INDONESIA','ORMAS 1','ORPOL 2','-','0001-01-01',350,'TANJUNG ENIM','0000-00-00','','','x3VC.jpg'),('CT38170001','IBU','NELLY NAWARLI',22355445,'JASIMAH','W','','0000-00-00',0,'','','',0,'','','','',0,'PEDAGANG','SMA/SMK','ISLAM','33225454','INDONESIA','-','-','-','0001-01-01',865,'TANJUNG ENIM','0000-00-00','','','KJVx.png');

/*Data for the table `ms_mata_pelajaran` */

insert  into `ms_mata_pelajaran`(`id_matpal`,`nama_matpal`,`id_bidang`,`status`,`userid`,`recdate`) values ('MPSJ','SEJARAH','BS02','1','admin','2017-08-13 00:00:00'),('MPGEO','GEOGRAFI','BS02','1','admin','2017-08-13 00:00:00'),('MP03','KIMIA','BS01','0','admin','2017-08-06 00:00:00'),('MP02','BIOLOGI','BS01','1','admin','2017-08-06 00:00:00'),('MP01','FISIKA','BS01','1','admin','2017-08-06 00:00:00'),('MPSO','SOSIOLOGI','BS02','1','admin','2017-08-13 00:00:00'),('MPEK','EKONOMI','BS02','1','admin','2017-08-13 00:00:00'),('MPNI','NISAIYYAH','BS02','1','admin','2017-08-13 00:00:00'),('MP04','BERHITUNG','BS03','1','admin','2017-08-13 00:00:00'),('MP05','MATEMATIKA','BS03','1','admin','2017-08-13 00:00:00');

/*Data for the table `ms_penyakit` */

insert  into `ms_penyakit`(`no_registrasi`,`nama_penyakit`,`thn_penyakit`,`kategori_penyakit`,`tipe_penyakit`,`lamp_bukti`) values ('T38170001','AAYAN',2010,'KRONIS','TIDAK MENULAR','3JCn.jpeg'),('T38170001','BATUK',2010,'TIDAK KRONIS','TIDAK MENULAR','lAro.jpeg'),('CT38170001','ALERGI DINGIN',0000,'TIDAK KRONIS','TIDAK MENULAR','OIM4.pdf');

/*Data for the table `ms_santri` */

insert  into `ms_santri`(`kategori`,`no_registrasi`,`no_stambuk`,`thn_masuk`,`rayon`,`kamar`,`bagian`,`kel_sekarang`,`nisn`,`nisnlokal`,`nama_lengkap`,`nama_arab`,`nama_panggilan`,`hobi`,`uang_jajan_perbulan`,`no_kk`,`nik`,`tempat_lahir`,`tgl_lahir`,`konsulat`,`nama_sekolah`,`kelas_sekolah`,`alamat_sekolah`,`suku`,`kewarganegaraan`,`jalan`,`no_rumah`,`dusun`,`desa`,`kecamatan`,`kabupaten`,`provinsi`,`kd_pos`,`no_tlp`,`no_hp`,`email`,`fb`,`dibesarkan_di`,`lamp_ijazah`,`lamp_photo`,`lamp_akta_kelahiran`,`lamp_kk`,`lamp_skhun`,`lamp_transkip_nilai`,`lamp_skkb`,`lamp_surat_kesehatan`) values ('TMI','CT38170001',0,'2017-07-25',NULL,NULL,NULL,NULL,11223344,55667788,'FARITNO ZULIANSYAH','فاريت','FARITNO','NGOPI',1000000,113345587,3355777,'TANJUNG ENIM','1989-07-10','KONSULAT 1',NULL,NULL,NULL,'SUMATERA','INDONESIA','PERUMAHAN MEDANG','NO3 RT 003 RW 013','MEDANG','PAGEDANGAN','LEGOK','TANGERANG SELAT','BANTEN',523314,21558877,2147483647,'faritno@me.com','faritno@faceboo','TANJUNG EN','CoWhmFmcJ0nt3S5jbf5s.pdf','5tzrpZTl8IQ06C1aEcx1.jpg','rAt6IRPZixfk4BkPnuaJ.pdf','2bmJoaZ3jpFr8ls4HZZG.pdf','lLkvUG5fKbl8HfIS7kgG.PDF','QqBicZPU3YxgKSNz7Dey.pdf','vKUpKarTdnVbJkW1EuzD.pdf','NQrIxQDvHtJIDcQzbYyM.pdf'),('TMI','CT38170003',0,'2017-07-25',NULL,NULL,NULL,NULL,11223344,55667788,'BEJO','أتاا','BEJO','NGOPI',1000000,113345587,3355777,'TANJUNG ENIM','1989-07-10','KONSULAT 1',NULL,NULL,NULL,'SUMATERA','INDONESIA','PERUMAHAN MEDANG','NO3 RT 003 RW 013','MEDANG','PAGEDANGAN','LEGOK','TANGERANG SELAT','BANTEN',523314,21558877,2147483647,'faritno@me.com','faritno@faceboo','TANJUNG EN','CoWhmFmcJ0nt3S5jbf5s.pdf','5tzrpZTl8IQ06C1aEcx1.jpg','rAt6IRPZixfk4BkPnuaJ.pdf','2bmJoaZ3jpFr8ls4HZZG.pdf','lLkvUG5fKbl8HfIS7kgG.PDF','QqBicZPU3YxgKSNz7Dey.pdf','vKUpKarTdnVbJkW1EuzD.pdf','NQrIxQDvHtJIDcQzbYyM.pdf'),('TMI','CT38170004',0,'2017-07-25',NULL,NULL,NULL,NULL,11223344,55667788,'SANTI','اشسغلا','SANTI','NGOPI',1000000,113345587,3355777,'TANJUNG ENIM','1989-07-10','KONSULAT 1',NULL,NULL,NULL,'SUMATERA','INDONESIA','PERUMAHAN MEDANG','NO3 RT 003 RW 013','MEDANG','PAGEDANGAN','LEGOK','TANGERANG SELAT','BANTEN',523314,21558877,2147483647,'faritno@me.com','faritno@faceboo','TANJUNG EN','CoWhmFmcJ0nt3S5jbf5s.pdf','5tzrpZTl8IQ06C1aEcx1.jpg','rAt6IRPZixfk4BkPnuaJ.pdf','2bmJoaZ3jpFr8ls4HZZG.pdf','lLkvUG5fKbl8HfIS7kgG.PDF','QqBicZPU3YxgKSNz7Dey.pdf','vKUpKarTdnVbJkW1EuzD.pdf','NQrIxQDvHtJIDcQzbYyM.pdf'),('TMI','CT38170005',0,'2017-07-25',NULL,NULL,NULL,NULL,11223344,55667788,'RARA','فغع','RARA','NGOPI',1000000,113345587,3355777,'TANJUNG ENIM','1989-07-10','KONSULAT 1',NULL,NULL,NULL,'SUMATERA','INDONESIA','PERUMAHAN MEDANG','NO3 RT 003 RW 013','MEDANG','PAGEDANGAN','LEGOK','TANGERANG SELAT','BANTEN',523314,21558877,2147483647,'faritno@me.com','faritno@faceboo','TANJUNG EN','CoWhmFmcJ0nt3S5jbf5s.pdf','5tzrpZTl8IQ06C1aEcx1.jpg','rAt6IRPZixfk4BkPnuaJ.pdf','2bmJoaZ3jpFr8ls4HZZG.pdf','lLkvUG5fKbl8HfIS7kgG.PDF','QqBicZPU3YxgKSNz7Dey.pdf','vKUpKarTdnVbJkW1EuzD.pdf','NQrIxQDvHtJIDcQzbYyM.pdf'),('TMI','CT38170006',0,'2017-07-25',NULL,NULL,NULL,NULL,11223344,55667788,'RERE','ناهلات','RERE','NGOPI',1000000,113345587,3355777,'TANJUNG ENIM','1989-07-10','KONSULAT 1',NULL,NULL,NULL,'SUMATERA','INDONESIA','PERUMAHAN MEDANG','NO3 RT 003 RW 013','MEDANG','PAGEDANGAN','LEGOK','TANGERANG SELAT','BANTEN',523314,21558877,2147483647,'faritno@me.com','faritno@faceboo','TANJUNG EN','CoWhmFmcJ0nt3S5jbf5s.pdf','5tzrpZTl8IQ06C1aEcx1.jpg','rAt6IRPZixfk4BkPnuaJ.pdf','2bmJoaZ3jpFr8ls4HZZG.pdf','lLkvUG5fKbl8HfIS7kgG.PDF','QqBicZPU3YxgKSNz7Dey.pdf','vKUpKarTdnVbJkW1EuzD.pdf','NQrIxQDvHtJIDcQzbYyM.pdf'),('TMI','CT38170007',0,'2017-07-25',NULL,NULL,NULL,NULL,11223344,55667788,'SARAH','ناهلات','SARAH','NGOPI',1000000,113345587,3355777,'TANJUNG ENIM','1989-07-10','KONSULAT 1',NULL,NULL,NULL,'SUMATERA','INDONESIA','PERUMAHAN MEDANG','NO3 RT 003 RW 013','MEDANG','PAGEDANGAN','LEGOK','TANGERANG SELAT','BANTEN',523314,21558877,2147483647,'faritno@me.com','faritno@faceboo','TANJUNG EN','CoWhmFmcJ0nt3S5jbf5s.pdf','5tzrpZTl8IQ06C1aEcx1.jpg','rAt6IRPZixfk4BkPnuaJ.pdf','2bmJoaZ3jpFr8ls4HZZG.pdf','lLkvUG5fKbl8HfIS7kgG.PDF','QqBicZPU3YxgKSNz7Dey.pdf','vKUpKarTdnVbJkW1EuzD.pdf','NQrIxQDvHtJIDcQzbYyM.pdf'),('TMI','CT38170008',0,'2017-07-25',NULL,NULL,NULL,NULL,11223344,55667788,'MUHTAR','خحها','MUHTAR','NGOPI',1000000,113345587,3355777,'TANJUNG ENIM','1989-07-10','KONSULAT 1',NULL,NULL,NULL,'SUMATERA','INDONESIA','PERUMAHAN MEDANG','NO3 RT 003 RW 013','MEDANG','PAGEDANGAN','LEGOK','TANGERANG SELAT','BANTEN',523314,21558877,2147483647,'faritno@me.com','faritno@faceboo','TANJUNG EN','CoWhmFmcJ0nt3S5jbf5s.pdf','5tzrpZTl8IQ06C1aEcx1.jpg','rAt6IRPZixfk4BkPnuaJ.pdf','2bmJoaZ3jpFr8ls4HZZG.pdf','lLkvUG5fKbl8HfIS7kgG.PDF','QqBicZPU3YxgKSNz7Dey.pdf','vKUpKarTdnVbJkW1EuzD.pdf','NQrIxQDvHtJIDcQzbYyM.pdf'),('TMI','CT38170009',0,'2017-07-25',NULL,NULL,NULL,NULL,11223344,55667788,'AHDIAN','حغغفىلا ت','AHDIAN','NGOPI',1000000,113345587,3355777,'TANJUNG ENIM','1989-07-10','KONSULAT 1',NULL,NULL,NULL,'SUMATERA','INDONESIA','PERUMAHAN MEDANG','NO3 RT 003 RW 013','MEDANG','PAGEDANGAN','LEGOK','TANGERANG SELAT','BANTEN',523314,21558877,2147483647,'faritno@me.com','faritno@faceboo','TANJUNG EN','CoWhmFmcJ0nt3S5jbf5s.pdf','5tzrpZTl8IQ06C1aEcx1.jpg','rAt6IRPZixfk4BkPnuaJ.pdf','2bmJoaZ3jpFr8ls4HZZG.pdf','lLkvUG5fKbl8HfIS7kgG.PDF','QqBicZPU3YxgKSNz7Dey.pdf','vKUpKarTdnVbJkW1EuzD.pdf','NQrIxQDvHtJIDcQzbYyM.pdf'),('TMI','CT38170010',0,'2017-07-25',NULL,NULL,NULL,NULL,11223344,55667788,'AGUNG','يسب تار','AGUNG','NGOPI',1000000,113345587,3355777,'TANJUNG ENIM','1989-07-10','KONSULAT 1',NULL,NULL,NULL,'SUMATERA','INDONESIA','PERUMAHAN MEDANG','NO3 RT 003 RW 013','MEDANG','PAGEDANGAN','LEGOK','TANGERANG SELAT','BANTEN',523314,21558877,2147483647,'faritno@me.com','faritno@faceboo','TANJUNG EN','CoWhmFmcJ0nt3S5jbf5s.pdf','5tzrpZTl8IQ06C1aEcx1.jpg','rAt6IRPZixfk4BkPnuaJ.pdf','2bmJoaZ3jpFr8ls4HZZG.pdf','lLkvUG5fKbl8HfIS7kgG.PDF','QqBicZPU3YxgKSNz7Dey.pdf','vKUpKarTdnVbJkW1EuzD.pdf','NQrIxQDvHtJIDcQzbYyM.pdf'),('TMI','T38170001',1,'2017-07-10','GD01','K01','B01','KR1A',123456789,1234567890,'RUDI HERMAWAN','قعيه اثقةشصشى','RUDI','OLAHRAGE',300000,2147483647,2147483647,'GARUT','2004-03-08','SINDANG',NULL,NULL,NULL,'SUNDA','INDONESIA','JL. LANCAR JAYA','NO.18 007/008','KEJAYAAN','MAJU TERUS','KECAMATAN1','KABUPATEN1','JAWA BARAT',11876,24765984,2147483647,'rudi@gmail.com','rudi@facebook','garut',NULL,'mnWyWkatVr4JTzcE0abP.jpg',NULL,NULL,NULL,NULL,NULL,NULL);

/*Data for the table `ms_tabungan` */

/*Data for the table `ms_tarbiyatul` */

/*Data for the table `query` */

/*Data for the table `sequence` */

insert  into `sequence`(`nama_field`,`nomor_terakhir`,`remark`) values ('Stambuk_TMI','1',NULL),('noreg_TMI','T38170001',NULL),('noreg_CalonTMI','CT38170010',NULL);

/*Data for the table `tabungan_temp` */

/*Data for the table `trans_absensi` */

/*Data for the table `trans_jadwwal_pelajaran` */

/*Data for the table `trans_kurikulum` */

insert  into `trans_kurikulum`(`id_thn_ajar`,`kode_kelas`,`id_mapel`,`sm_1`,`sm_2`,`userid`,`recdate`) values (2012,'KR1A','MP03','1','2','admin','2017-08-06 00:00:00');

/*Data for the table `trans_pedidikan` */

/*Data for the table `trans_pembayaran` */

/*Data for the table `trans_pembiayaan_siswa` */

insert  into `trans_pembiayaan_siswa`(`no_registrasi`,`pembiaya`,`biaya_perbulan_min`,`biaya_perbulan_max`,`penghasilan`) values ('CT38170001','AYAH',3500000,6500000,8500000),('T38170001','AYAH',1000000,2000000,3500000),('T3817002','IBU',34534,34543,345);

/*Data for the table `trans_rpp` */

/*Data for the table `trans_rpp_detail` */

/*Data for the table `user` */

insert  into `user`(`user_id`,`password`,`nama_lengkap`) values ('admin','61abf45697b7432','Administrator');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
