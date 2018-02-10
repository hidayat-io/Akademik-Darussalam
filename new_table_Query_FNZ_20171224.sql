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

/*Table structure for table `ms_banksoal` */

DROP TABLE IF EXISTS `ms_banksoal`;

CREATE TABLE `ms_banksoal` (
  `id_soal` int(11) NOT NULL AUTO_INCREMENT,
  `id_matpal` varchar(10) DEFAULT NULL,
  `tingkat` int(2) DEFAULT NULL,
  `soal` varchar(200) DEFAULT NULL,
  `jwb_a` varchar(50) DEFAULT NULL,
  `jwb_b` varchar(50) DEFAULT NULL,
  `jwb_c` varchar(50) DEFAULT NULL,
  `jwb_d` varchar(50) DEFAULT NULL,
  `jwb_benar` varchar(2) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL,
  KEY `id_soal` (`id_soal`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

/*Data for the table `ms_banksoal` */

insert  into `ms_banksoal`(`id_soal`,`id_matpal`,`tingkat`,`soal`,`jwb_a`,`jwb_b`,`jwb_c`,`jwb_d`,`jwb_benar`,`userid`,`recdate`) values (1,'MP04',2,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','d','admin','2017-12-02 00:00:00'),(2,'MP02',2,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','a','admin','2017-12-02 00:00:00'),(4,'MP01',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','b','admin','2017-12-13 00:00:00'),(5,'MP02',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','d','admin','2017-12-02 00:00:00'),(6,'MP01',2,'Mana jawaban yang benar?!!','ini jawaban yang benar!!','ini juga jawaban yang benar!!','a dan b benar!!','semua salah!!','c','admin','2017-12-02 00:00:00'),(7,'MP05',4,'ini adalah soal salah','iya soal itu memang salah','soal itu benar','soal ini sedikit benarnya','ini soal asalan','d','admin','2017-12-13 00:00:00'),(10,'MP05',4,'ertert','tert','eerter','tert','erter','c','admin','2017-12-13 00:00:00'),(11,'MP05',4,'ini adalah soal salah','iya soal itu memang salah','soal itu benar','soal ini sedikit benarnya','ini soal asalan','d','admin','2017-12-13 00:00:00'),(12,'MP05',4,'ini adalah soal salah','iya soal itu memang salah','soal itu benar','soal ini sedikit benarnya','ini soal asalan','d','admin','2017-12-13 00:00:00'),(13,'MP01',2,'Mana jawaban yang benar?!!','ini jawaban yang benar!!','ini juga jawaban yang benar!!','a dan b benar!!','semua salah!!','c','admin','2017-12-02 00:00:00'),(14,'MP01',2,'Mana jawaban yang benar?!!','ini jawaban yang benar!!','ini juga jawaban yang benar!!','a dan b benar!!','semua salah!!','c','admin','2017-12-02 00:00:00'),(15,'MP01',2,'Mana jawaban yang benar?!!','ini jawaban yang benar!!','ini juga jawaban yang benar!!','a dan b benar!!','semua salah!!','c','admin','2017-12-02 00:00:00'),(16,'MP01',2,'Mana jawaban yang benar?!!','ini jawaban yang benar!!','ini juga jawaban yang benar!!','a dan b benar!!','semua salah!!','c','admin','2017-12-02 00:00:00'),(17,'MP01',2,'Mana jawaban yang benar?!!','ini jawaban yang benar!!','ini juga jawaban yang benar!!','a dan b benar!!','semua salah!!','c','admin','2017-12-02 00:00:00'),(18,'MP04',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','d','admin','2017-12-02 00:00:00'),(19,'MP04',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','d','admin','2017-12-02 00:00:00'),(20,'MP04',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','d','admin','2017-12-02 00:00:00'),(21,'MP04',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','d','admin','2017-12-02 00:00:00'),(22,'MP02',2,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','a','admin','2017-12-02 00:00:00'),(23,'MP02',2,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','a','admin','2017-12-02 00:00:00'),(24,'MP02',2,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','a','admin','2017-12-02 00:00:00'),(25,'MP02',2,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','a','admin','2017-12-02 00:00:00'),(26,'MP02',2,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','a','admin','2017-12-02 00:00:00'),(27,'MP02',2,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','a','admin','2017-12-02 00:00:00'),(28,'MP02',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','d','admin','2017-12-02 00:00:00'),(29,'MP02',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','d','admin','2017-12-02 00:00:00'),(30,'MP02',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','d','admin','2017-12-02 00:00:00'),(31,'MP02',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','d','admin','2017-12-02 00:00:00'),(32,'MP02',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','d','admin','2017-12-02 00:00:00'),(33,'MP02',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','d','admin','2017-12-02 00:00:00'),(34,'MP02',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','d','admin','2017-12-02 00:00:00'),(35,'MP04',2,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','d','admin','2017-12-02 00:00:00'),(36,'MP04',3,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','d','admin','2017-12-02 00:00:00'),(37,'MP04',3,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','d','admin','2017-12-02 00:00:00'),(38,'MP04',2,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','d','admin','2017-12-02 00:00:00'),(39,'MP04',2,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','d','admin','2017-12-02 00:00:00'),(40,'MP04',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','d','admin','2017-12-02 00:00:00'),(41,'MP01',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','b','admin','2017-12-13 00:00:00'),(42,'MP01',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','b','admin','2017-12-13 00:00:00'),(43,'MP01',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','b','admin','2017-12-13 00:00:00'),(44,'MP01',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','b','admin','2017-12-13 00:00:00'),(45,'MP01',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','b','admin','2017-12-13 00:00:00'),(46,'MP01',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','b','admin','2017-12-13 00:00:00'),(47,'MP01',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','b','admin','2017-12-13 00:00:00'),(48,'MP01',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','b','admin','2017-12-13 00:00:00'),(49,'MP01',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','b','admin','2017-12-13 00:00:00'),(50,'MP05',4,'ini adalah soal salah','iya soal itu memang salah','soal itu benar','soal ini sedikit benarnya','ini soal asalan','d','admin','2017-12-13 00:00:00'),(51,'MP05',4,'ini adalah soal salah','iya soal itu memang salah','soal itu benar','soal ini sedikit benarnya','ini soal asalan','d','admin','2017-12-13 00:00:00'),(52,'MP05',4,'ini adalah soal salah','iya soal itu memang salah','soal itu benar','soal ini sedikit benarnya','ini soal asalan','d','admin','2017-12-13 00:00:00'),(53,'MP05',4,'ini adalah soal salah','iya soal itu memang salah','soal itu benar','soal ini sedikit benarnya','ini soal asalan','d','admin','2017-12-13 00:00:00'),(54,'MP05',4,'ini adalah soal salah','iya soal itu memang salah','soal itu benar','soal ini sedikit benarnya','ini soal asalan','d','admin','2017-12-13 00:00:00'),(55,'MP05',4,'ini adalah soal salah','iya soal itu memang salah','soal itu benar','soal ini sedikit benarnya','ini soal asalan','d','admin','2017-12-13 00:00:00'),(56,'MP05',4,'ini adalah soal salah','iya soal itu memang salah','soal itu benar','soal ini sedikit benarnya','ini soal asalan','d','admin','2017-12-13 00:00:00'),(57,'MP05',4,'ini adalah soal salah','iya soal itu memang salah','soal itu benar','soal ini sedikit benarnya','ini soal asalan','d','admin','2017-12-13 00:00:00'),(58,'MP04',2,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','d','admin','2017-12-02 00:00:00'),(59,'MP04',2,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','d','admin','2017-12-02 00:00:00'),(60,'MP04',2,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','d','admin','2017-12-02 00:00:00'),(61,'MP04',4,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','d','admin','2017-12-02 00:00:00'),(62,'MP04',2,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','d','admin','2017-12-02 00:00:00'),(63,'MP04',6,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','d','admin','2017-12-02 00:00:00'),(64,'MP04',5,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','d','admin','2017-12-02 00:00:00'),(65,'MP04',2,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','d','admin','2017-12-02 00:00:00'),(66,'MP04',2,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','d','admin','2017-12-02 00:00:00'),(67,'MP04',2,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','d','admin','2017-12-02 00:00:00'),(68,'MP01',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','b','admin','2017-12-13 00:00:00'),(69,'MP01',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','b','admin','2017-12-13 00:00:00'),(70,'MP01',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','b','admin','2017-12-13 00:00:00'),(71,'MP01',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','b','admin','2017-12-13 00:00:00'),(72,'MP01',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','b','admin','2017-12-13 00:00:00'),(73,'MP01',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','b','admin','2017-12-13 00:00:00'),(74,'MP01',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','b','admin','2017-12-13 00:00:00'),(75,'MP01',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','b','admin','2017-12-13 00:00:00'),(76,'MP01',1,'Mana jawaban yang benar?','ini jawaban yang benar','ini juga jawaban yang benar','a dan b benar','semua salah','b','admin','2017-12-13 00:00:00');

/*Table structure for table `trans_banksoaldt` */

DROP TABLE IF EXISTS `trans_banksoaldt`;

CREATE TABLE `trans_banksoaldt` (
  `id_hd` int(11) DEFAULT NULL,
  `id_soal` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `trans_banksoaldt` */

insert  into `trans_banksoaldt`(`id_hd`,`id_soal`) values (2,30),(2,28),(2,5),(3,6),(3,13),(3,14),(3,15),(5,2),(5,23),(5,24),(6,19),(6,20),(6,21),(6,40);

/*Table structure for table `trans_banksoalhd` */

DROP TABLE IF EXISTS `trans_banksoalhd`;

CREATE TABLE `trans_banksoalhd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_soal` varchar(25) NOT NULL,
  `kurikulum` int(11) DEFAULT NULL,
  `semester` int(2) DEFAULT NULL,
  `id_matpal` varchar(10) DEFAULT NULL,
  `tingkat` int(1) DEFAULT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  `recdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `trans_banksoalhd` */

insert  into `trans_banksoalhd`(`id`,`kode_soal`,`kurikulum`,`semester`,`id_matpal`,`tingkat`,`user_id`,`recdate`) values (2,'4/1/MP02/1',NULL,NULL,NULL,NULL,'admin','2017-12-24 02:25:31'),(3,'3/1/MP01/2',3,1,'MP01',2,'admin','2017-12-24 02:32:08'),(5,'3/1/MP02/2',3,1,'MP02',2,'admin','2017-12-24 02:47:00'),(6,'4/1/MP04/1',4,1,'MP04',1,'admin','2017-12-24 02:47:44');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
