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

/*Table structure for table `ms_bidang_study` */

DROP TABLE IF EXISTS `ms_bidang_study`;

CREATE TABLE `ms_bidang_study` (
  `id_bidang` varchar(10) DEFAULT NULL,
  `nama_bidang` varchar(50) DEFAULT NULL,
  `kategori` varchar(10) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ms_bidang_study` */

insert  into `ms_bidang_study`(`id_bidang`,`nama_bidang`,`kategori`,`userid`,`recdate`) values ('BS01','IPA','UTAMA','admin','2017-08-19 00:00:00'),('BS02','IPS','UTAMA','admin','2017-08-19 00:00:00'),('BS03','ILMU PASTI','UTAMA','admin','2017-08-13 00:00:00'),('BSSORE01','PELAJARAN SORE','SORE','admin','2017-08-19 00:00:00');

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

insert  into `ms_fisik_santri`(`no_registrasi`,`gol_darah`,`tinggi_badan`,`berat_badan`,`khitan`,`kondisi_pendidikan`,`ekonomi_keluarga`,`situasi_rumah`,`dekat_dengan`,`hidup_beragama`,`pengelihatan_mata`,`kaca_mata`,`pendengaran`,`operasi`,`sebab`,`kecelakaan`,`akibat`,`alergi`,`thn_fisik`,`kelainan_fisik`) values ('T38170001','A',160,55,'SUDAH','SEDANG','CUKUP','PERKAMPUNGAN','PASAR','BAIK','BAIK','TIDAK','BAIK','TIDAK','-','TIDAK','-','-','2017-07-01','-'),('T3817002','A',345,345,'SUDAH','KETAT','MAMPU','PERKOTAAN','MASJID','BAIK','BAIK','TIDAK','BAIK','TIDAK','34534','TIDAK','34534','34543','2017-08-15','345345'),('CAArray170001',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL);

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

insert  into `ms_kecakapan_santri`(`no_registrasi`,`bid_studi`,`olahraga`,`kesenian`,`keterampilan`,`lain_lain`) values ('T38170001','MATEMATIKA','LARI','MENYANYI','-','-');

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

insert  into `ms_kelas`(`kode_kelas`,`tingkat`,`nama`,`tipe_kelas`,`userid`,`recdate`) values ('KR1B',1,'KELAS 1B','REGULER','admin','2017-08-05'),('KR1A',1,'KELAS 1A','INTENSIF','admin','2017-08-25'),('KR2A',2,'KELAS 2 A','REGULER','admin','2017-08-05'),('KR2B',2,'KELAS 2B','REGULER','admin','2017-08-05'),('KR3A',3,'KELAS 3A','REGULER','admin','2017-08-08'),('KR1C',1,'KELAS 1C','REGULER','admin','2017-08-25');

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

insert  into `ms_keluarga`(`no_registrasi`,`kategori`,`nama`,`nik`,`binbinti`,`jenis_kelamin`,`status`,`tgl_wafat`,`umur`,`hari`,`sebab_wafat`,`status_perkawinan`,`pendapatan_ibu`,`sebab_tdk_bekerja`,`keahlian`,`status_rumah`,`kondisi_rumah`,`jml_asuh`,`pekerjaan`,`pend_terakhir`,`agama`,`suku`,`kewarganegaraan`,`ormas`,`orpol`,`kedukmas`,`thn_lulus`,`no_stambuk_alumni`,`tempat_lahir`,`tgl_lahir_keluarga`,`hub_kel`,`keterangan`,`ktp`) values ('T38170001','AYAH','ASEP SANJAYA',2147483647,'ROJAK','P','','0000-00-00',0,'','','',0,'','','','',0,'KARYAWAN SWASTA','SMA/SMK','ISLAM','743872333738739','INDONESIA','-','-','-','2000-01-01',1234,'GARUT','1978-06-05','','','3LFs.jpg');

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

insert  into `ms_mata_pelajaran`(`id_matpal`,`nama_matpal`,`id_bidang`,`status`,`userid`,`recdate`) values ('MPEK','EKONOMI','BS02','1','admin','2017-08-19 00:00:00'),('MPSO','SOSIOLOGI','BS02','1','admin','2017-08-19 00:00:00'),('MP03','KIMIA','BS01','0','admin','2017-08-19 00:00:00'),('MP02','BIOLOGI','BS01','1','admin','2017-08-19 00:00:00'),('MP01','FISIKA','BS01','1','admin','2017-08-19 00:00:00'),('MPGEO','GEOGRAFI','BS02','1','admin','2017-08-19 00:00:00'),('MPSJ','SEJARAH','BS02','1','admin','2017-08-19 00:00:00'),('MP04','BERHITUNG','BS03','1','admin','2017-08-13 00:00:00'),('MP05','MATEMATIKA','BS03','1','admin','2017-08-13 00:00:00'),('MPNI','NISAIYYAH','BS02','1','admin','2017-08-19 00:00:00'),('MPSSORE','SEJARAH','BSSORE01','1','admin','2017-08-19 00:00:00'),('MPEKSORE2','EKONOMI','BSSORE01','1','admin','2017-08-19 00:00:00');

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

insert  into `ms_penyakit`(`no_registrasi`,`nama_penyakit`,`thn_penyakit`,`kategori_penyakit`,`tipe_penyakit`,`lamp_bukti`) values ('T38170001','AAYAN',2010,'KRONIS','TIDAK MENULAR','3JCn.jpeg'),('T38170001','BATUK',2010,'TIDAK KRONIS','TIDAK MENULAR','lAro.jpeg');

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

insert  into `ms_santri`(`kategori`,`no_registrasi`,`no_stambuk`,`thn_masuk`,`rayon`,`kamar`,`bagian`,`kel_sekarang`,`nisn`,`nisnlokal`,`nama_lengkap`,`nama_arab`,`nama_panggilan`,`hobi`,`uang_jajan_perbulan`,`no_kk`,`nik`,`tempat_lahir`,`tgl_lahir`,`konsulat`,`nama_sekolah`,`kelas_sekolah`,`alamat_sekolah`,`suku`,`kewarganegaraan`,`jalan`,`no_rumah`,`dusun`,`desa`,`kecamatan`,`kabupaten`,`provinsi`,`kd_pos`,`no_tlp`,`no_hp`,`email`,`fb`,`dibesarkan_di`,`lamp_ijazah`,`lamp_photo`,`lamp_akta_kelahiran`,`lamp_kk`,`lamp_skhun`,`lamp_transkip_nilai`,`lamp_skkb`,`lamp_surat_kesehatan`) values ('TMI','CT38170003',0,'2017-07-25',NULL,NULL,NULL,NULL,11223344,55667788,'BEJO','أتاا','BEJO','NGOPI',1000000,113345587,3355777,'TANJUNG ENIM','1989-07-10','KONSULAT 1',NULL,NULL,NULL,'SUMATERA','INDONESIA','PERUMAHAN MEDANG','NO3 RT 003 RW 013','MEDANG','PAGEDANGAN','LEGOK','TANGERANG SELAT','BANTEN',523314,21558877,2147483647,'faritno@me.com','faritno@faceboo','TANJUNG EN','CoWhmFmcJ0nt3S5jbf5s.pdf','5tzrpZTl8IQ06C1aEcx1.jpg','rAt6IRPZixfk4BkPnuaJ.pdf','2bmJoaZ3jpFr8ls4HZZG.pdf','lLkvUG5fKbl8HfIS7kgG.PDF','QqBicZPU3YxgKSNz7Dey.pdf','vKUpKarTdnVbJkW1EuzD.pdf','NQrIxQDvHtJIDcQzbYyM.pdf'),('TMI','CT38170004',0,'2017-07-25',NULL,NULL,NULL,NULL,11223344,55667788,'SANTI','اشسغلا','SANTI','NGOPI',1000000,113345587,3355777,'TANJUNG ENIM','1989-07-10','KONSULAT 1',NULL,NULL,NULL,'SUMATERA','INDONESIA','PERUMAHAN MEDANG','NO3 RT 003 RW 013','MEDANG','PAGEDANGAN','LEGOK','TANGERANG SELAT','BANTEN',523314,21558877,2147483647,'faritno@me.com','faritno@faceboo','TANJUNG EN','CoWhmFmcJ0nt3S5jbf5s.pdf','5tzrpZTl8IQ06C1aEcx1.jpg','rAt6IRPZixfk4BkPnuaJ.pdf','2bmJoaZ3jpFr8ls4HZZG.pdf','lLkvUG5fKbl8HfIS7kgG.PDF','QqBicZPU3YxgKSNz7Dey.pdf','vKUpKarTdnVbJkW1EuzD.pdf','NQrIxQDvHtJIDcQzbYyM.pdf'),('TMI','CT38170005',0,'2017-07-25',NULL,NULL,NULL,NULL,11223344,55667788,'RARA','فغع','RARA','NGOPI',1000000,113345587,3355777,'TANJUNG ENIM','1989-07-10','KONSULAT 1',NULL,NULL,NULL,'SUMATERA','INDONESIA','PERUMAHAN MEDANG','NO3 RT 003 RW 013','MEDANG','PAGEDANGAN','LEGOK','TANGERANG SELAT','BANTEN',523314,21558877,2147483647,'faritno@me.com','faritno@faceboo','TANJUNG EN','CoWhmFmcJ0nt3S5jbf5s.pdf','5tzrpZTl8IQ06C1aEcx1.jpg','rAt6IRPZixfk4BkPnuaJ.pdf','2bmJoaZ3jpFr8ls4HZZG.pdf','lLkvUG5fKbl8HfIS7kgG.PDF','QqBicZPU3YxgKSNz7Dey.pdf','vKUpKarTdnVbJkW1EuzD.pdf','NQrIxQDvHtJIDcQzbYyM.pdf'),('TMI','CT38170006',0,'2017-07-25',NULL,NULL,NULL,NULL,11223344,55667788,'RERE','ناهلات','RERE','NGOPI',1000000,113345587,3355777,'TANJUNG ENIM','1989-07-10','KONSULAT 1',NULL,NULL,NULL,'SUMATERA','INDONESIA','PERUMAHAN MEDANG','NO3 RT 003 RW 013','MEDANG','PAGEDANGAN','LEGOK','TANGERANG SELAT','BANTEN',523314,21558877,2147483647,'faritno@me.com','faritno@faceboo','TANJUNG EN','CoWhmFmcJ0nt3S5jbf5s.pdf','5tzrpZTl8IQ06C1aEcx1.jpg','rAt6IRPZixfk4BkPnuaJ.pdf','2bmJoaZ3jpFr8ls4HZZG.pdf','lLkvUG5fKbl8HfIS7kgG.PDF','QqBicZPU3YxgKSNz7Dey.pdf','vKUpKarTdnVbJkW1EuzD.pdf','NQrIxQDvHtJIDcQzbYyM.pdf'),('TMI','CT38170007',0,'2017-07-25',NULL,NULL,NULL,NULL,11223344,55667788,'SARAH','ناهلات','SARAH','NGOPI',1000000,113345587,3355777,'TANJUNG ENIM','1989-07-10','KONSULAT 1',NULL,NULL,NULL,'SUMATERA','INDONESIA','PERUMAHAN MEDANG','NO3 RT 003 RW 013','MEDANG','PAGEDANGAN','LEGOK','TANGERANG SELAT','BANTEN',523314,21558877,2147483647,'faritno@me.com','faritno@faceboo','TANJUNG EN','CoWhmFmcJ0nt3S5jbf5s.pdf','5tzrpZTl8IQ06C1aEcx1.jpg','rAt6IRPZixfk4BkPnuaJ.pdf','2bmJoaZ3jpFr8ls4HZZG.pdf','lLkvUG5fKbl8HfIS7kgG.PDF','QqBicZPU3YxgKSNz7Dey.pdf','vKUpKarTdnVbJkW1EuzD.pdf','NQrIxQDvHtJIDcQzbYyM.pdf'),('TMI','CT38170008',0,'2017-07-25',NULL,NULL,NULL,NULL,11223344,55667788,'MUHTAR','خحها','MUHTAR','NGOPI',1000000,113345587,3355777,'TANJUNG ENIM','1989-07-10','KONSULAT 1',NULL,NULL,NULL,'SUMATERA','INDONESIA','PERUMAHAN MEDANG','NO3 RT 003 RW 013','MEDANG','PAGEDANGAN','LEGOK','TANGERANG SELAT','BANTEN',523314,21558877,2147483647,'faritno@me.com','faritno@faceboo','TANJUNG EN','CoWhmFmcJ0nt3S5jbf5s.pdf','5tzrpZTl8IQ06C1aEcx1.jpg','rAt6IRPZixfk4BkPnuaJ.pdf','2bmJoaZ3jpFr8ls4HZZG.pdf','lLkvUG5fKbl8HfIS7kgG.PDF','QqBicZPU3YxgKSNz7Dey.pdf','vKUpKarTdnVbJkW1EuzD.pdf','NQrIxQDvHtJIDcQzbYyM.pdf'),('TMI','CT38170009',0,'2017-07-25',NULL,NULL,NULL,NULL,11223344,55667788,'AHDIAN','حغغفىلا ت','AHDIAN','NGOPI',1000000,113345587,3355777,'TANJUNG ENIM','1989-07-10','KONSULAT 1',NULL,NULL,NULL,'SUMATERA','INDONESIA','PERUMAHAN MEDANG','NO3 RT 003 RW 013','MEDANG','PAGEDANGAN','LEGOK','TANGERANG SELAT','BANTEN',523314,21558877,2147483647,'faritno@me.com','faritno@faceboo','TANJUNG EN','CoWhmFmcJ0nt3S5jbf5s.pdf','5tzrpZTl8IQ06C1aEcx1.jpg','rAt6IRPZixfk4BkPnuaJ.pdf','2bmJoaZ3jpFr8ls4HZZG.pdf','lLkvUG5fKbl8HfIS7kgG.PDF','QqBicZPU3YxgKSNz7Dey.pdf','vKUpKarTdnVbJkW1EuzD.pdf','NQrIxQDvHtJIDcQzbYyM.pdf'),('TMI','CT38170010',0,'2017-07-25',NULL,NULL,NULL,NULL,11223344,55667788,'AGUNG','يسب تار','AGUNG','NGOPI',1000000,113345587,3355777,'TANJUNG ENIM','1989-07-10','KONSULAT 1',NULL,NULL,NULL,'SUMATERA','INDONESIA','PERUMAHAN MEDANG','NO3 RT 003 RW 013','MEDANG','PAGEDANGAN','LEGOK','TANGERANG SELAT','BANTEN',523314,21558877,2147483647,'faritno@me.com','faritno@faceboo','TANJUNG EN','CoWhmFmcJ0nt3S5jbf5s.pdf','5tzrpZTl8IQ06C1aEcx1.jpg','rAt6IRPZixfk4BkPnuaJ.pdf','2bmJoaZ3jpFr8ls4HZZG.pdf','lLkvUG5fKbl8HfIS7kgG.PDF','QqBicZPU3YxgKSNz7Dey.pdf','vKUpKarTdnVbJkW1EuzD.pdf','NQrIxQDvHtJIDcQzbYyM.pdf'),('TMI','T38170001',1,'2017-07-10','GD01','K01','B01','KR1A',123456789,1234567890,'RUDI HERMAWAN','قعيه اثقةشصشى','RUDI','OLAHRAGE',300000,2147483647,2147483647,'GARUT','2004-03-08','SINDANG',NULL,NULL,NULL,'SUNDA','INDONESIA','JL. LANCAR JAYA','NO.18 007/008','KEJAYAAN','MAJU TERUS','KECAMATAN1','KABUPATEN1','JAWA BARAT',11876,24765984,2147483647,'rudi@gmail.com','rudi@facebook','garut',NULL,'mnWyWkatVr4JTzcE0abP.jpg',NULL,NULL,NULL,NULL,NULL,NULL);

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

/*Table structure for table `ms_tahun_ajaran` */

DROP TABLE IF EXISTS `ms_tahun_ajaran`;

CREATE TABLE `ms_tahun_ajaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deskripsi` varchar(9) CHARACTER SET latin1 DEFAULT NULL COMMENT 'yyyy/yyyy',
  `kategori` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `ms_tahun_ajaran` */

insert  into `ms_tahun_ajaran`(`id`,`deskripsi`,`kategori`) values (1,'2015-2016','UTAMA'),(2,'2016-2017','UTAMA'),(3,'2017-2018','UTAMA'),(4,'2018-2019','UTAMA'),(5,'2015-2016','SORE'),(6,'2016-2017','SORE'),(7,'2017-2018','SORE'),(8,'2018-2019','SORE');

/*Table structure for table `trans_jadwal_pelajaran` */

DROP TABLE IF EXISTS `trans_jadwal_pelajaran`;

CREATE TABLE `trans_jadwal_pelajaran` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `santri` varchar(5) DEFAULT NULL COMMENT 'PUTRA/PUTRI',
  `id_thn_ajar` int(11) DEFAULT NULL,
  `semester` char(1) DEFAULT NULL,
  `kode_kelas` varchar(10) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `jam` char(2) DEFAULT NULL,
  `hari` varchar(20) DEFAULT NULL,
  `id_mapel` varchar(10) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL,
  KEY `id_jadwal` (`id_jadwal`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `trans_jadwal_pelajaran` */

insert  into `trans_jadwal_pelajaran`(`id_jadwal`,`santri`,`id_thn_ajar`,`semester`,`kode_kelas`,`id_guru`,`jam`,`hari`,`id_mapel`,`userid`,`recdate`) values (1,'PUTRA',3,'1','KR1A',0,'I','senin','MPNI',NULL,NULL),(2,'PUTRI',3,'1','KR1A',0,'II','selasa','MPSJ',NULL,NULL),(3,'PUTRA',3,'1','KR1A',0,'II','rabu','MPNI',NULL,NULL),(4,'PUTRA',3,'1','KR1B',0,'I','senin','MPNI',NULL,NULL),(5,'PUTRA',3,'1','KR1B',0,'II','selasa','MPSJ',NULL,NULL),(6,'PUTRA',3,'1','KR1B',0,'II','rabu','MPNI',NULL,NULL);

/*Table structure for table `trans_kurikulum` */

DROP TABLE IF EXISTS `trans_kurikulum`;

CREATE TABLE `trans_kurikulum` (
  `id_thn_ajar` varchar(9) NOT NULL,
  `tingkat` varchar(10) NOT NULL,
  `tipe_kelas` varchar(10) NOT NULL,
  `id_mapel` varchar(10) NOT NULL,
  `sm_1` varchar(10) DEFAULT NULL,
  `sm_2` varchar(10) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id_thn_ajar`,`tingkat`,`id_mapel`,`tipe_kelas`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `trans_kurikulum` */

insert  into `trans_kurikulum`(`id_thn_ajar`,`tingkat`,`tipe_kelas`,`id_mapel`,`sm_1`,`sm_2`,`userid`,`recdate`) values ('3','1','INTENSIF','MPEK','2','0','admin','2017-09-02 00:00:00'),('3','1','INTENSIF','MPSO','2','0','admin','2017-09-02 00:00:00'),('3','1','INTENSIF','MP02','0','3','admin','2017-09-02 00:00:00'),('3','1','INTENSIF','MP01','0','3','admin','2017-09-02 00:00:00'),('3','1','INTENSIF','MPGEO','0','0','admin','2017-09-02 00:00:00'),('3','1','INTENSIF','MPSJ','0','0','admin','2017-09-02 00:00:00'),('3','1','INTENSIF','MP04','0','0','admin','2017-09-02 00:00:00'),('3','1','INTENSIF','MP05','0','0','admin','2017-09-02 00:00:00'),('3','1','INTENSIF','MPNI','0','0','admin','2017-09-02 00:00:00'),('3','1','REGULER','MPEK','0','0','admin','2017-09-02 00:00:00'),('3','1','REGULER','MPSO','0','0','admin','2017-09-02 00:00:00'),('3','1','REGULER','MP02','1','0','admin','2017-09-02 00:00:00'),('3','1','REGULER','MP01','1','0','admin','2017-09-02 00:00:00'),('3','1','REGULER','MPGEO','4','0','admin','2017-09-02 00:00:00'),('3','1','REGULER','MPSJ','4','0','admin','2017-09-02 00:00:00'),('3','1','REGULER','MP04','0','5','admin','2017-09-02 00:00:00'),('3','1','REGULER','MP05','0','5','admin','2017-09-02 00:00:00'),('3','1','REGULER','MPNI','0','0','admin','2017-09-02 00:00:00'),('3','2','REGULER','MPEK','0','0','admin','2017-09-02 00:00:00'),('3','2','REGULER','MPSO','0','0','admin','2017-09-02 00:00:00'),('3','2','REGULER','MP02','0','0','admin','2017-09-02 00:00:00'),('3','2','REGULER','MP01','0','0','admin','2017-09-02 00:00:00'),('3','2','REGULER','MPGEO','0','0','admin','2017-09-02 00:00:00'),('3','2','REGULER','MPSJ','0','0','admin','2017-09-02 00:00:00'),('3','2','REGULER','MP04','0','0','admin','2017-09-02 00:00:00'),('3','2','REGULER','MP05','0','0','admin','2017-09-02 00:00:00'),('3','2','REGULER','MPNI','0','0','admin','2017-09-02 00:00:00'),('3','3','REGULER','MPEK','0','0','admin','2017-09-02 00:00:00'),('3','3','REGULER','MPSO','0','0','admin','2017-09-02 00:00:00'),('3','3','REGULER','MP02','0','0','admin','2017-09-02 00:00:00'),('3','3','REGULER','MP01','0','0','admin','2017-09-02 00:00:00'),('3','3','REGULER','MPGEO','0','0','admin','2017-09-02 00:00:00'),('3','3','REGULER','MPSJ','0','0','admin','2017-09-02 00:00:00'),('3','3','REGULER','MP04','0','0','admin','2017-09-02 00:00:00'),('3','3','REGULER','MP05','0','0','admin','2017-09-02 00:00:00'),('3','3','REGULER','MPNI','0','0','admin','2017-09-02 00:00:00'),('7','1','INTENSIF','MPSSORE','1','1','admin','2017-08-25 00:00:00'),('7','1','INTENSIF','MPEKSORE2','0','0','admin','2017-08-25 00:00:00'),('7','1','REGULER','MPSSORE','0','0','admin','2017-08-25 00:00:00'),('7','1','REGULER','MPEKSORE2','2','2','admin','2017-08-25 00:00:00'),('7','2','REGULER','MPSSORE','3','3','admin','2017-08-25 00:00:00'),('7','2','REGULER','MPEKSORE2','3','3','admin','2017-08-25 00:00:00'),('7','3','REGULER','MPSSORE','1','1','admin','2017-08-25 00:00:00'),('7','3','REGULER','MPEKSORE2','2','2','admin','2017-08-25 00:00:00');

DROP TABLE IF EXISTS `ms_donatur`;

CREATE TABLE `ms_donatur` (
  `id_donatur` int(11) NOT NULL AUTO_INCREMENT,
  `nama_donatur` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telpon` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kategori` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'AITAM AR RAHMAH/AITAM ISLAH /AITAM BAITUL ZAKAT',
  `userid` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id_donatur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `ms_donatur` */

insert  into `ms_donatur`(`id_donatur`,`nama_donatur`,`alamat`,`telpon`,`kategori`,`userid`,`recdate`) values (3,'DONATUR34','JALAN33','03454578','AITAM_ISLAH ','admin','2017-09-16 00:00:00'),(4,'DONATUR4','ALAMAT4','0545454','AITAM_AR_RAHMAH','admin','2017-09-16 00:00:00');

DROP TABLE IF EXISTS `ms_config`;

CREATE TABLE `ms_config` (
  `id_config` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_statistik` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NPSN` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jenis_lembaga` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userid` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id_config`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `ms_config` */

insert  into `ms_config`(`id_config`,`nomor_statistik`,`NPSN`,`nama`,`jenis_lembaga`,`userid`,`recdate`) values (1,'510232051432','69937270 - 69937240','TMI - Pondok Pesantren Darussalam','Mu\'allimin','admin','2017-09-16 00:00:00');

DROP TABLE IF EXISTS `ms_semester`;

CREATE TABLE `ms_semester` (
  `id_semester` int(11) NOT NULL AUTO_INCREMENT,
  `semester` int(11) DEFAULT NULL,
  `bulan` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_semester`),
  KEY `id` (`id_semester`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `ms_semester` */

insert  into `ms_semester`(`id_semester`,`semester`,`bulan`) values (30,2,'SEPTEMBER'),(31,2,'OKTOBER'),(32,2,'NOVEMBER'),(33,2,'DESEMBER'),(34,1,'JANUARI'),(35,1,'FEBRUARI'),(36,1,'MARET');

/*Data for the table `ms_minggu` */

CREATE TABLE `ms_minggu` (
  `id_minggu` int(11) NOT NULL,
  `minggu` varchar(5) NOT NULL,
  `urut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Dumping data for table `ms_minggu`
--


INSERT INTO `ms_minggu` (`id_minggu`, `minggu`, `urut`) VALUES
(1, 'I', 1),
(2, 'II', 2),
(3, 'III', 3),
(4, 'IV', 4);

/*Perubahan table trans_rpp*/

ALTER TABLE `hidayati_pesantren`.`trans_rpp`   
  CHANGE `id_kelas_dtl` `santri` VARCHAR(45) NULL,
  CHANGE `id_mapel` `semester` VARCHAR(2) NULL,
  ADD COLUMN `kode_kelas` VARCHAR(10) NULL AFTER `semester`,
  ADD COLUMN `id_mapel` VARCHAR(10) NULL AFTER `kode_kelas`;

/*Perubahan table trans_rpp_detail*/

ALTER TABLE `hidayati_pesantren`.`trans_rpp_detail`   
  CHANGE `tanggal` `hari` VARCHAR(10) NULL,
  CHANGE `materi_pokok` `hissos` VARCHAR(45) CHARSET latin1 COLLATE latin1_swedish_ci NULL,
  CHANGE `alokasi_waktu` `materi_pokok` VARCHAR(100) NULL,
  ADD COLUMN `alokasi_waktu` VARCHAR(11) NULL AFTER `materi_pokok`;

ALTER TABLE `hidayati_pesantren`.`ms_kelas`   
  ADD COLUMN `kapasitas` INT(2) NULL AFTER `tipe_kelas`;

ALTER TABLE `hidayati_pesantren`.`ms_kamar`   
  ADD COLUMN `kapasitas` INT(3) NULL AFTER `nama`;


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;