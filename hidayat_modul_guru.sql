# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 10.1.25-MariaDB)
# Database: hidayati_pesantren
# Generation Time: 2017-09-12 15:33:08 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table ms_guru
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ms_guru`;

CREATE TABLE `ms_guru` (
  `id_guru` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `no_reg` int(11) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `nama_arab` varchar(50) DEFAULT NULL,
  `no_ptk` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `nig` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `tempat_lahir` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jns_kelamin` char(1) CHARACTER SET latin1 DEFAULT NULL,
  `no_kk` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `no_ktp` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `kewarganegaraan` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `alamat` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `no_telepon` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `status_nikah` char(1) DEFAULT NULL,
  `nama_ayah` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `nama_ibu` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `nama_pasangan` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `tgl_pasangan` date DEFAULT NULL,
  `jml_anak` int(11) DEFAULT NULL,
  `akademik` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `status` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `pendidikan_terakhir` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `mengajar_start` date DEFAULT NULL,
  `mengajar_end` date DEFAULT NULL,
  `id_alumni` int(11) DEFAULT NULL,
  `no_sk` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `tgl_sk` date DEFAULT NULL,
  `file_sk` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `gapok` float DEFAULT NULL,
  `masa_abdi` int(11) DEFAULT NULL,
  `sertifikasi` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `file_sertifikasi` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `materi_diampu` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `userid` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `recdate` datetime DEFAULT NULL,
  `status_aktif` tinyint(1) DEFAULT '1',
  `is_delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_guru`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ms_guru` WRITE;
/*!40000 ALTER TABLE `ms_guru` DISABLE KEYS */;

INSERT INTO `ms_guru` (`id_guru`, `no_reg`, `nama_lengkap`, `nama_arab`, `no_ptk`, `nig`, `tempat_lahir`, `tanggal_lahir`, `jns_kelamin`, `no_kk`, `no_ktp`, `kewarganegaraan`, `alamat`, `no_telepon`, `email`, `status_nikah`, `nama_ayah`, `nama_ibu`, `nama_pasangan`, `tgl_pasangan`, `jml_anak`, `akademik`, `status`, `pendidikan_terakhir`, `mengajar_start`, `mengajar_end`, `id_alumni`, `no_sk`, `tgl_sk`, `file_sk`, `gapok`, `masa_abdi`, `sertifikasi`, `file_sertifikasi`, `materi_diampu`, `userid`, `recdate`, `status_aktif`, `is_delete`)
VALUES
	(1,NULL,'توفيق','توفيق','','','',NULL,'l','','dd','','','','',NULL,'','','',NULL,0,'','s',NULL,NULL,NULL,0,'',NULL,NULL,NULL,0,'',NULL,'','admin','2017-09-01 06:30:20',1,0),
	(2,NULL,'gfdsg','توفيق','','','',NULL,'l','','gg','','','','',NULL,'','','',NULL,0,'','s',NULL,NULL,NULL,0,'',NULL,NULL,NULL,0,'',NULL,'','admin','2017-09-01 06:37:36',1,0),
	(3,NULL,'gfdsg','توفيق','','','',NULL,'l','','gg','','','','',NULL,'','','',NULL,0,'','s',NULL,NULL,NULL,0,'',NULL,NULL,NULL,0,'',NULL,'','admin','2017-09-01 06:37:50',1,0),
	(4,NULL,'PRKBeZX7uD','هدايت','B8WqLmYZaa','4qXQYyrzhL','IRKayZWK9M','0000-00-00','l','ARlU4cZX6M','JdDikx85eC','OVoy48DJRO','P2nj3t8unw','AenmE7INaw','2F9Kx8KKTv',NULL,'Sj6kYalvuA','vFi6ePdl8b','sYp2uz9PDb','0000-00-00',0,'5K8uLXuSQX','s',NULL,'0000-00-00','0000-00-00',0,'AmX1i14VlV','0000-00-00',NULL,NULL,0,'aDbK1bon19',NULL,'353TQimwoU','admin','2017-09-01 09:38:21',1,0),
	(5,NULL,'RoGA9ca34y','IV6AyZ5rKt','WJJvfk6TIH','ew7Jtadsro','KwAkP9QuvA','0000-00-00','l','t0nifm1TTl','DMRCpossh1','5cieQEhvrz','OqYkE1uXMr','yQJnN14XrJ','ctucLndjtg',NULL,'4mOgCXQany','kx9MwrYFQd','UCZiLlk4Xr','2017-09-01',2,'EralqZGcCw','m',NULL,'2017-09-01','2017-09-01',0,'taRPDvA4Lw','2017-09-25',NULL,NULL,8,'6jD84jaN8W',NULL,'wrdwsdya9h','admin','2017-09-01 09:43:11',1,0),
	(6,NULL,'RoGA9ca34y','IV6AyZ5rKt','WJJvfk6TIH','ew7Jtadsro','KwAkP9QuvA','2017-09-11','l','t0nifm1TTl','DMRCpossh1','5cieQEhvrz','OqYkE1uXMr','yQJnN14XrJ','ctucLndjtg',NULL,'4mOgCXQany','kx9MwrYFQd','UCZiLlk4Xr','2017-09-01',2,'EralqZGcCw','m',NULL,'2017-09-01','2017-09-01',0,'taRPDvA4Lw','2017-09-25',NULL,NULL,8,'6jD84jaN8W',NULL,'wrdwsdya9h','admin','2017-09-01 09:43:38',1,0),
	(7,NULL,'kPcDgttpQc','JoRJexVhAf','moBNEqlYST','I3RhlZJJPW','jBi0ZyWyKZ','2017-09-01','l','UagvwQRiOF','9xeBE7bvwQ','2QHQaPw2Do','77Rfw0Btiw','8Acc5LH5NJ','V2O0ODs067',NULL,'xpdMCTz8ye','Wy3UeEGHPm','x6tiSiMZFJ','2017-09-01',0,'ui4b3NV0M4','m',NULL,'2017-09-01','2017-09-01',0,'38ICHxoezf','2017-09-01',NULL,NULL,6,'kiddh1TUtx',NULL,'hf3FQsFeEC','admin','2017-09-01 18:08:14',1,0),
	(8,NULL,'kalakdf','هنا','','','',NULL,'l','','90000','','','','',NULL,'','','',NULL,0,'','s',NULL,NULL,NULL,0,'',NULL,NULL,NULL,0,'',NULL,'','admin','2017-09-01 18:11:30',1,0),
	(9,NULL,'هنا','هنا','','','',NULL,'p','','90000','','','','',NULL,'','','',NULL,0,'','s',NULL,NULL,NULL,0,'',NULL,NULL,NULL,0,'',NULL,'','admin','2017-09-01 18:11:48',1,0),
	(10,12,'J8E9vsZ4EW','QRD6DH2fg0','mivhemZKSV','eBTP1OQD0m','L3ImTJ6KB6',NULL,'l','qJgywsY3Du','85ZoWRXWgR','HJpH8G7X4f','Qe4E7kcfrJ','HEXdsu6VV0','RwdK3mv29a',NULL,'1gLnuVXnOP','uiqF65Sopc','rxEVykeELM',NULL,0,'Z0UK2bNrUx','',NULL,NULL,NULL,0,'0L9a96Xp1z',NULL,NULL,NULL,0,'qFgBGPdSlW',NULL,'gB5ZWHcNRt','admin','2017-09-02 11:49:05',1,0),
	(11,13,'A63wzcbBLN','wQgzHuafQq','nTPpcz6Jcz','de3yXy3P9P','HPDZlrNliz',NULL,'l','ySa2fg9wis','K5IF4nRBTe','IJYmhs45O9','DOMVJOkSwj','RwtJSI8loO','ytPlGscw30',NULL,'UNO7pcxcrr','fLzqxzVdUO','MvFMvHpi1k',NULL,0,'zJjVWlXtGw','',NULL,NULL,NULL,0,'vvbmYFM2Ui',NULL,NULL,NULL,0,'3Tq7GSIFbN',NULL,'PuRJyFAbrS','admin','2017-09-02 11:50:15',1,0),
	(12,14,'j6J5HM2dTB','o0N2AuqxS8','4XI5InSPDw','kV0KJxbebu','ZUhMLMxN5y',NULL,'l','t2KdeFt6q7','kQAkr5rRHM','BSiOx5swRV','KcoBRyYvGE','ADdfMipdip','jU3Igy8bhn',NULL,'Xv5rU8uuQA','UQT9jeAwff','DApuZAKSFU',NULL,0,'mEMfxxQVw5','',NULL,NULL,NULL,0,'19oO8B3CUX',NULL,NULL,NULL,0,'sM0sB2bWE5',NULL,'s2ki9J2GWY','admin','2017-09-02 11:52:20',1,0),
	(13,15,'eNumxD5dAS','adYO7SkUV3','jm023lv4wM','qyIlvyULjh','C1lhSR61vd',NULL,'l','ESK3W3CeBW','d57ZuaIwkA','8hzMlUdT2U','to8mxuqoXP','LDxrlP7jag','YTFQoz9kJi',NULL,'R86XHjLKtT','YmcFK7c1fz','fXqWd0r3yE',NULL,0,'lWb4q0MdCW','',NULL,NULL,NULL,0,'HGWVBYMmka',NULL,NULL,NULL,0,'d4WrClj1Wl',NULL,'Hoaz6OWzV5','admin','2017-09-02 11:53:03',1,0),
	(14,16,'WvP7taaoyN','WPCGU3Nmcd','8TZVBlnBCn','899KIDO0G3','I5OBjbOjU2',NULL,'l','0szvFYURiB','BxfD0Yj38F','od2sDYEXzI','9rjdkjK6Kg','Ibu1EdP2Ak','Tohdl7h2ta',NULL,'SdkmBDF1bb','BGLjN3UWNd','XroHMrRAZ0',NULL,5,'KEDilw1Sm4','',NULL,NULL,NULL,0,'ptHDOiPNuo',NULL,NULL,NULL,0,'uqCsPTACNv',NULL,'JsElC25us3','admin','2017-09-02 11:53:28',1,0),
	(15,17,'fJUEsgd5eu','fT0fMSFBE9','VUz3T1WUPX','WKyWbXelyD','FGbkWouRkl',NULL,'l','JWFPa4O22s','UtakwAwHqh','L8izBXgesM','l5MHdxjypz','9opsaNjRBV','a3jVfylZbQ','s','5ioTZ8NLZU','Ncw8pdNCtC','Vn4gBLwCY5',NULL,0,'5Say2piHF9','Pengabdian',NULL,NULL,NULL,0,'ksiEQ0LZgR',NULL,NULL,NULL,7,'r5aVzLS5tR',NULL,'ZUv6Cl8ehR','admin','2017-09-02 12:16:53',1,0),
	(16,18,'xI4fGl1RAG','YK0tvS1afR','raAS91Uu9I','sCsMKfgxyX','CM1WUAV4aI',NULL,'l','Wu68X7LVFV','HMS8tAI7lv','VaebMbk7Pd','I3Q8L0seRT','wVraIFgpfz','Dq5px2CrMz','s','QkRiipwcrb','ZNvCkvGuJM','2v3krFEOGs',NULL,2,'3tH6JuF0nl','',NULL,NULL,NULL,0,'CvNPCzSlXY',NULL,NULL,NULL,0,'dSYayfL0XE',NULL,'7cTV0Z4DsJ','admin','2017-09-02 12:19:01',1,0),
	(17,19,'n9HKeD9ezn','fqXSzHqRDU','Cv8JapoHJX','D7BkZ0FRZX','GZPVFoOBOv',NULL,'l','u4MeCCh5WN','EPGiJRMqgL','DuZoJTAqpX','hV1n8WghXv','I8lJUBtSVg','gmCiTrZhoC','s','ncmPrRRCSD','rJVviBrtH4','O2JC4skKh7',NULL,0,'p1KPgItzsZ','',NULL,NULL,NULL,0,'SEEhmNfsIo',NULL,NULL,NULL,0,'eq5KBVAgeT',NULL,'CMHd8lr2do','admin','2017-09-02 12:32:27',1,0),
	(18,20,'AWlVGXAl8d','iB8aKEHqJW','rOf65FBEEU','lkpnWp4Q0u','3kp5R4fMYa',NULL,'l','7ImNdd2sst','lJyS2ZVPfh','iAQUPt59uH','ZYo6wjmgRw','3nbpbmVFkN','seXAZ5qZcG','s','etsni8YnqX','Lomir1WfOr','oO0cVya79Q',NULL,2,'sM6Rx2qswo','',NULL,NULL,NULL,0,'HWskjj1LJb',NULL,NULL,NULL,0,'oYLT9KuDOV',NULL,'Ribuol0cUj','admin','2017-09-02 12:33:51',1,0),
	(19,NULL,'V7yflphhKf','OgZVGnrBZT','Yj10zJilbu','Y5v2RyxoZ2','R5NtXkR4AZ','2017-09-26','l','DLfa7PloA4','j6Jv2p3qn9','Fl9EmpY367','sMyyzxVLHa','vXK9TUBsXH','QCZgRR5VtO','s','YsXJLmLM2n','7JAzwjmaxr','STdGltIlvf',NULL,0,'gPLxS0EzIc','s',NULL,NULL,NULL,24,'FdKhgYiRMP',NULL,NULL,NULL,0,'OSCobSbbqE',NULL,'yWJ7jjMzUo','admin','2017-09-02 18:40:54',1,0),
	(20,21,'rGeM252l2k','sgOCqVM8tk','ZQoiykN4Tx','0MMYH8NGNR','GJaCwKreZ2',NULL,'l','GFKdNyz1jq','VzVgszSFBg','2OC3EQBRmc','cikKpmc6rf','DJcSsA2Jjz','1prxbnggfs','s','qIJD7F5Eoy','dT0YAg9PiI','tM1HnuQLnB',NULL,0,'3gmYYqBG36','',NULL,NULL,NULL,8,'uGInQmnIMD',NULL,NULL,NULL,0,'daVPkL7I1B',NULL,'gfRHUJais9','admin','2017-09-02 18:42:26',1,0),
	(21,22,'0GI3LgEfhl','IdMTkxWKzE','Fmg6AdltZB','WnqdoS0HrM','lGcECJZzpL',NULL,'l','9oq1VxeQTn','MN3DJJhyP3','QzBII9JXE8','9VqYveVI8b','3gvTuKDjv2','xHq0mvNGTX','s','CR0TZXsbmf','ppawKZCGix','DzXItjYtqq',NULL,0,'5gdo5aGMt5','',NULL,'2017-09-01',NULL,0,'e7Unusf9c0',NULL,NULL,NULL,0,'cxmPJFkuML',NULL,'HA7XAGczon','admin','2017-09-02 18:46:40',1,0),
	(22,23,'nPYjlM7JJc','0btbh8nsOd','wqMR4CCkmx','X07iEoPYZI','ScNKpSqBUi',NULL,'l','jKDkhz4zbF','6HXrEwLMHh','xW6QZ1tILH','z5JdxkBVxB','tv4C4oy2FX','MGDABhQUGi','s','yooVJ7vKn8','opHu2doPF2','2Spnj4xbUH',NULL,0,'88GWwyyhM5','',NULL,'2017-09-01',NULL,0,'87eu9SoPOO',NULL,NULL,NULL,0,'wXqNFmTiEi',NULL,'sTf87yqjwP','admin','2017-09-02 18:54:38',1,0),
	(23,24,'IXdsmmW1NJ','oepli1gjzZ','h8XGl3ArbV','dmCtruZWph','INmYLx94zI',NULL,'l','nUxO6v3sYv','Gpt1UmASmO','bkXgkBd9Eq','U975mwY6ku','7MNPkqFvkQ','Ds9qJlGjCc','s','GrZ02Ojwsj','oU8o21R18h','EjfGHKV1gB',NULL,0,'DhlEve8l8U','',NULL,'2017-09-01',NULL,0,'X6Gw9GOD56',NULL,NULL,NULL,0,'pj5d0Vcl0H',NULL,'3n3egR4Si3','admin','2017-09-02 19:01:30',1,0),
	(24,25,'MiqCxnxjsz','uFpy7ZpLvd','TbAKrHisHs','hoI26xet9b','xzqxVbxJhc',NULL,'l','e3GaBDqVQS','dmYW4gxO3B','fYJRZBT2IQ','vAD3GRI3sP','sLjYkGGA9d','lxI1reL7FO','s','ln7t4mpGSG','VEMWNXxi7Y','CbFX5tmCZn',NULL,0,'QYwvas8VXR','',NULL,'2017-09-01',NULL,0,'2qu8cqbtI1',NULL,NULL,NULL,0,'BJnZ0kuuur',NULL,'PZQv7a9nzF','admin','2017-09-02 19:01:53',1,0),
	(25,26,'XeIJoIqfcP','vDjCTDdKCl','nTiaIDNSr1','WDHtVIgrDG','NMOmxabasM',NULL,'l','2P9Yhh63oA','2PIGuKQQaV','33svK1d5Co','FEQwLA5FGi','Zm6m2z2ZXu','wHUmxf1gOV','s','eEU0ZhgDYk','rNPYgO5HBk','YqlmGpuL3R',NULL,2,'GrlPPgobZA','',NULL,'2017-09-01',NULL,0,'l3T2JDzWKv',NULL,NULL,NULL,0,'f45cAaZYqo',NULL,'edTbhR82oF','admin','2017-09-02 19:24:43',1,0),
	(26,27,'XeIJoIqfcP','vDjCTDdKCl','nTiaIDNSr1','WDHtVIgrDG','NMOmxabasM',NULL,'l','2P9Yhh63oA','2PIGuKQQaV','33svK1d5Co','FEQwLA5FGi','Zm6m2z2ZXu','wHUmxf1gOV','s','eEU0ZhgDYk','rNPYgO5HBk','YqlmGpuL3R',NULL,2,'GrlPPgobZA','',NULL,'2017-09-01',NULL,0,'l3T2JDzWKv',NULL,NULL,NULL,0,'f45cAaZYqo',NULL,'edTbhR82oF','admin','2017-09-02 19:26:57',1,0),
	(27,28,'XeIJoIqfcP','vDjCTDdKCl','nTiaIDNSr1','WDHtVIgrDG','NMOmxabasM',NULL,'l','2P9Yhh63oA','2PIGuKQQaV','33svK1d5Co','FEQwLA5FGi','Zm6m2z2ZXu','wHUmxf1gOV','s','eEU0ZhgDYk','rNPYgO5HBk','YqlmGpuL3R',NULL,2,'GrlPPgobZA','',NULL,'2017-09-01',NULL,0,'l3T2JDzWKv',NULL,NULL,NULL,0,'f45cAaZYqo',NULL,'edTbhR82oF','admin','2017-09-02 20:10:06',1,0),
	(28,29,'XeIJoIqfcP','vDjCTDdKCl','nTiaIDNSr1','WDHtVIgrDG','NMOmxabasM',NULL,'l','2P9Yhh63oA','2PIGuKQQaV','33svK1d5Co','FEQwLA5FGi','Zm6m2z2ZXu','wHUmxf1gOV','s','eEU0ZhgDYk','rNPYgO5HBk','YqlmGpuL3R',NULL,2,'GrlPPgobZA','',NULL,'2017-09-01',NULL,0,'l3T2JDzWKv',NULL,NULL,NULL,0,'f45cAaZYqo',NULL,'edTbhR82oF','admin','2017-09-02 20:13:24',1,0),
	(29,30,'Tj8pBY8bjm','dG0cyePhd8','L0qEr6r7Gx','tGnRdv04cG','V1cEabUzED',NULL,'l','9WQBMYQHVD','KTiooez6sn','OxhTemsi3l','JNACUGxTV8','rLv5ywSnP4','4SdTzoYbP7','s','MLLYhY33iZ','gcOjTOnSkX','J4cA9ilelC',NULL,8,'r2FF1hDsNj','',NULL,'2017-09-01',NULL,0,'BiJGCQY8bs',NULL,NULL,NULL,6,'3kF51xi0F2',NULL,'mdlBmkh8Hu','admin','2017-09-02 20:41:58',1,0),
	(30,31,'Tj8pBY8bjm','dG0cyePhd8','L0qEr6r7Gx','tGnRdv04cG','V1cEabUzED',NULL,'l','9WQBMYQHVD','KTiooez6sn','OxhTemsi3l','JNACUGxTV8','rLv5ywSnP4','4SdTzoYbP7','s','MLLYhY33iZ','gcOjTOnSkX','J4cA9ilelC',NULL,8,'r2FF1hDsNj','',NULL,'2017-09-01',NULL,0,'BiJGCQY8bs',NULL,NULL,NULL,6,'3kF51xi0F2',NULL,'mdlBmkh8Hu','admin','2017-09-02 20:42:55',1,0),
	(31,32,'Tj8pBY8bjm','dG0cyePhd8','L0qEr6r7Gx','tGnRdv04cG','V1cEabUzED',NULL,'l','9WQBMYQHVD','KTiooez6sn','OxhTemsi3l','JNACUGxTV8','rLv5ywSnP4','4SdTzoYbP7','s','MLLYhY33iZ','gcOjTOnSkX','J4cA9ilelC',NULL,8,'r2FF1hDsNj','',NULL,'2017-09-01',NULL,0,'BiJGCQY8bs',NULL,NULL,NULL,6,'3kF51xi0F2',NULL,'mdlBmkh8Hu','admin','2017-09-02 20:43:15',1,0),
	(32,33,'PGZah9obz6','iHiLpIJnkJ','OCx4WX9mXf','K6vZpUkRz2','D36i8svGrR',NULL,'l','RpKwwGoVfu','jIGWUKAGpY','llcpNpZ0ki','8vLplsEqwo','sYR5dNETKf','Oonea39TTG','s','qQTLPrLrIO','1y25yPMdlb','u5fcoOLhQc',NULL,0,'mJkkjcjUbj','','w6Mzq0KbUl','2017-09-01',NULL,0,'ptXJyqfq44',NULL,NULL,NULL,0,'UJgaFEEfZX',NULL,'OY1fGiZXYb','admin','2017-09-02 20:44:18',1,0),
	(33,34,'VrHLUvNlJE','g1tLuvERmX','olkIYL9Jjc','Gw15JdLGqf','c435VNbZQu',NULL,'l','1NIFoLcHYG','zQiWdlgGOB','mO5DFV1tNH','cBfhYPjBbH','6czolzfvd3','wqeCKvNajU','s','WBfaUSQLdf','hTDAZ4Tvc7','YMRVW7XGyh',NULL,0,'408AOELVwK','','w6Mzq0KbUl','2017-09-01',NULL,0,'cxryI8OuGh',NULL,NULL,NULL,0,'bGED0lPWGx',NULL,'crdDDDCvkj','admin','2017-09-02 20:45:34',1,0),
	(36,37,'RsQjhbhkpz','yHMWVJrast','jiFQmYfBjt','0LjABMNmas','3CrGBVWVuo',NULL,'l','06MAffF29g','zlwRoX9Q4Q','R2cwsZeUkA','obBIBfiwGD','rQ5JyucIhP','uR7DLQ0Wdx','s','IGKnzvf4We','YA5o8qxlVk','AwmSB0OY6Q',NULL,0,'NNH9HB5MYK','','w6Mzq0KbUl','2017-09-01',NULL,0,'ncXVEI11CS',NULL,NULL,NULL,0,'ghJW092XJ4',NULL,'rxZshVah1a','admin','2017-09-02 20:48:52',1,0),
	(37,38,'qWNM1xd8hg','xCOJmJoTiq','M6AW8GMIcv','W5GOEscg1O','EIUYDBCk3Q',NULL,'l','khW0MJ6utK','xKEWouwdIb','yhYDQ8uyMX','OUJam9D63F','RXjXlSSP5s','zEnKPrM9Z6','s','TmNnI699ZR','IcgkAnDaZq','x7N4w7HqLY',NULL,0,'0PfOO5rbcn','','w6Mzq0KbUl','2017-09-01',NULL,0,'RVAU1UAl8w',NULL,NULL,NULL,0,'AMYLPhMSRG',NULL,'wIBxF8pOvN','admin','2017-09-02 20:50:01',1,0),
	(38,39,'8ONhQk5b1R','xlgVgcPueU','uvRZWIfxqp','RTQ7kI9MTZ','avQgIIfCbf',NULL,'l','9eIpg6LZRI','IBrkwrs3H5','6z3JJIO0M9','tZAPJOnD5B','MJZK3j7omo','CEVuzLkfYq','s','124qeu6pZt','zDMTtUzfFQ','t2a7C8Y5vh',NULL,0,'xNcRMVTeKx','','w6Mzq0KbUl','2017-09-01',NULL,0,'Dd4lIu7mrj',NULL,NULL,NULL,0,'lguw1Ffbtk',NULL,'CpNAoZGnmh','admin','2017-09-02 20:50:57',1,0),
	(39,40,'ip15cFQCMa','WvLTEwYfcR','YU6cqM2jXZ','z2Jt1nVDgS','feVfzv6V6W',NULL,'l','c2CpGW7erF','w8vGSYynIL','6BqcMFkEF2','sqC74I06ej','FkypIiyjZ7','SPd4ZAaVJc','s','81OAHXBDch','p5HgS7imit','HvJJJu9cf7',NULL,0,'GwbkweEnCK','',NULL,NULL,NULL,0,'lzbBB9K8q2',NULL,NULL,NULL,0,'hkCbGGKnDc',NULL,'0pMGU0bcvZ','admin','2017-09-03 05:11:03',1,0),
	(40,41,'HjM31Et5sj','KHLXCTSmpx','MOEiy4HlVp','25QT5gj797','mjAmUvW5fo',NULL,'l','G4R1avh8PB','L1txdNYgeP','Uarn6gjs63','eDK94uZfmN','RbcyDFz2ML','vnoaMJcvNf','s','Qj21CX4QZp','sGKjD87cyn','5LdLtCjw82',NULL,0,'xND17UKYRK','',NULL,NULL,NULL,0,'DOmQ0yr5kI',NULL,NULL,NULL,0,'1WQfE59M9Y',NULL,'GTS1PuwKvB','admin','2017-09-03 05:14:07',1,0),
	(41,42,'0O5s6CZ3S3','FIx0etfLVq','WTb4jzKdRn','GzEeP5CaEG','ZMkx91rvhb',NULL,'l','r7njpj4yer','OQ5OTNXj1z','8qQ9zlQeTz','Li9oHH4IQE','MibveQcesW','cvsBo0gv7F','s','RM8ZLpNcmY','c6qh4Mdokl','fI1esTBKZa',NULL,0,'XmIo5AN7bQ','',NULL,NULL,NULL,0,'v7ruxbEFNV',NULL,NULL,NULL,0,'wr4nt2rGhE',NULL,'dMYHmxr2UF','admin','2017-09-03 05:14:22',1,0),
	(42,43,'CTHgDUJRtB','VZeJufB31g','xNdRjl2di7','UIs5Dd9jQo','2YWps1CiNt',NULL,'l','F79PSFdu3f','q5n78UaC6B','IvCNkpsBEm','OGuJ0wmunQ','706SyWNQAy','vjhJTBU0JM','s','0Bh2dH9EQ6','vf8bIxg8tv','VMmxyxEf74',NULL,0,'n6OaGrk3d4','',NULL,NULL,NULL,4,'pzH3l2rfR2',NULL,NULL,NULL,0,'JF02Ert6Yi',NULL,'sBVkav7TSd','admin','2017-09-03 05:15:15',1,0),
	(43,44,'UXJvzbiLdr','DyKvuUue6N','hQw4Enrgye','MZkIe5OeV4','5uO5hm2Mhd',NULL,'l','q5fKWDPKNi','x7azvXVxmv','fZQwTYb0Wd','TUSElTVWxr','U38dvv54u2','vRGwA2gLQw','s','R87Q9JdyE8','MRVMwVwFGc','IAa6mj49Nw',NULL,6,'EfZQyGHwdu','',NULL,NULL,NULL,0,'VUylRRhQDg',NULL,NULL,NULL,0,'k0Ez9oysLC',NULL,'v98sSUn6zO','admin','2017-09-03 05:15:26',1,0),
	(44,45,'ibEbaLThz6','PhGNB7jomE','qxby6sdNzf','dRQYyBLQFR','LThzNMYV3m',NULL,'l','thNNRctvU9','6raQkzEO8k','DP0jxLtdpD','j6Xxpiujro','OC0WW7C3UQ','BqrnA9NGFw','s','2m5BEGO3Ph','1JO8NrQvNX','HCGtHJcBTX',NULL,0,'Iw6iYpKtul','',NULL,NULL,NULL,0,'rvpNsS2HrF',NULL,NULL,NULL,0,'0KldQRnttB',NULL,'Q1KERxJXpZ','admin','2017-09-03 05:38:21',1,0),
	(45,46,'ibEbaLThz6','PhGNB7jomE','qxby6sdNzf','dRQYyBLQFR','LThzNMYV3m',NULL,'l','thNNRctvU9','6raQkzEO8k','DP0jxLtdpD','j6Xxpiujro','OC0WW7C3UQ','BqrnA9NGFw','s','2m5BEGO3Ph','1JO8NrQvNX','HCGtHJcBTX',NULL,0,'Iw6iYpKtul','',NULL,NULL,NULL,0,'rvpNsS2HrF',NULL,NULL,NULL,0,'0KldQRnttB',NULL,'Q1KERxJXpZ','admin','2017-09-03 05:38:52',1,0),
	(46,47,'4VnRILEkoa','bipm5I0trV','6PqLevZRVS','5t1n8pM47B','Ea9KNZB6fM',NULL,'l','NmwC9J8NeW','XuGCR3Mh1W','SYuJH3w8lj','B9IhMr8Xkp','7fiNLEf2Bu','p3U6czgfr5','s','iYlplWNJ55','e9JeaZwH2Q','1SNEurpHOD',NULL,0,'186pQHzvbn','',NULL,NULL,NULL,0,'z0qZvppFGg',NULL,NULL,NULL,0,'6MN1T0rbbv',NULL,'qDHUaNpTRT','admin','2017-09-03 05:39:05',1,0),
	(47,48,'PYopZXGkWx','FOFUF33J0D','vmUtmiumwZ','W632U6IrMP','q9SxZQYsG9',NULL,'l','N2tK0xCB87','aHcA8K4SqJ','B5LDmP4trf','t9bZ7Z9g9t','kAujxkLe7X','B9LfM3tsm7','s','3FBtrwV5Sw','k1uklYcfXq','xCtEXc3Z26',NULL,1,'3j84awazEo','m','xQKzbZy2Hg',NULL,NULL,0,'APvqJHEKGp',NULL,NULL,NULL,0,'TbAlOmNTAK',NULL,'cuCa9ngpGl','admin','2017-09-03 06:23:23',1,0),
	(48,49,'Oz4YFL5K0P','T2XkjqXAaH','yAIhKR7ThQ','WIJMggXbaZ','KO9vjGlr8E',NULL,'l','AUXPRdv8oE','zzZMPzrVKq','bhfr8JLeJK','2X3MLtDu8A','lLx5UUveMd','NTAjOel7pd','s','5Soz8sI3EV','Q06Bo2S9kw','rl8wmfrJPQ',NULL,0,'HBx79L5n49','m','xQKzbZy2Hg',NULL,NULL,0,'tebGf7KXC5',NULL,NULL,NULL,0,'BTo1NGg0e6',NULL,'ovaXim5u13','admin','2017-09-03 06:25:05',1,0),
	(49,50,'LROZOnmMAN','JjJLY9cumt','mnQEyoECF1','5AfKzn30R0','m20qNaBGh5',NULL,'l','n0vOXRiyFd','2OHVdksnpu','YadVOzGCSM','45bXXLvPuf','vJAj5aKqrp','1ASKqM2BAW','s','VsgeSBaKNd','4bBuONBaR3','hdemti51CH',NULL,0,'QSDuGucnAt','m','xQKzbZy2Hg',NULL,NULL,0,'bXRveHFaKv',NULL,NULL,NULL,8,'yNADoGx2Y5',NULL,'gO7Tt0hl71','admin','2017-09-03 06:28:16',1,0),
	(50,51,'u5Vu3pauwn','IOmS1TEml9','sGUTuvJ7NJ','4k5BVoBiAD','Hj1pyRqoHF',NULL,'l','YlR6rvlei0','96AnEql81Q','tzWwA7P533','JgI5WMUs1q','6KGMSHqZo0','rkaHWu6Ndd','s','xgd4r1CiqC','rGqP6kcsXh','fFJyER9jHm',NULL,0,'KCPvTTlTOt','m','xQKzbZy2Hg',NULL,NULL,0,'PW42mPEdEG',NULL,NULL,NULL,8,'viL0KBhO3T',NULL,'3OZLMn1AGm','admin','2017-09-03 06:29:01',1,0),
	(51,52,'ljMdkABEtC','YSNIIKdXVC','awGQuVDfRI','DQ8S3Afc7s','5XQONnGw6J',NULL,'l','8C1aLENyLM','9xIxOja9ty','7nSLY8c5fJ','5Yj0Okil0a','hxbSZn2hM7','QLKcSqh4OE','s','aiqA9XtyXu','aK0OhConzj','KNaaOh325j',NULL,0,'5DCgmOqXAk','m','xQKzbZy2Hg',NULL,NULL,90,'34S0YN8zDs',NULL,NULL,NULL,3,'CrAJksb9kT',NULL,'nwuJ2xNOpz','admin','2017-09-03 06:32:21',1,0),
	(52,53,'mgGlPsJnSj','5jyry9IPQV','wLcXpSNC5Q','tOLfeozcpD','cFVsg2JctD',NULL,'l','MrhPka3TT5','OV3cuo4FuK','R1GKHszyuM','GgU9thKAru','MHuVcxvyyR','D6xZDBLEkX','s','AfCji932BW','gTqvrG6dvn','eFuey1IQYj',NULL,0,'AjCMrpKlZM','m','xQKzbZy2Hg',NULL,NULL,0,'Rp7kltu1uR','2017-09-27',NULL,NULL,0,'DYJeb5sGkb',NULL,'vGQ2Kme7hO','admin','2017-09-03 06:47:12',1,0),
	(53,54,'YvCv0GW8PI','R3pmN1Ddk2','chXne2Sl8r','uR9PDGU1yM','zHc09Crz4p',NULL,'l','QHA1rwNLDS','DENObdQ1gn','18D7wYhoyF','P56glJgpRL','brSyOql7AO','0QwGZio5F4','s','R0qAm1c6hk','qkIWDEDc84','Justcuie5E',NULL,0,'XhAVBu1kdR','m','xQKzbZy2Hg',NULL,NULL,0,'LuXoWi7IC7','2017-09-27','030917064843fnS',NULL,0,'WBJBD1msnG','030917064843LYFu','hn0HwXpFpj','admin','2017-09-03 06:48:43',1,0),
	(54,55,'LKRvkHZo5C','rn7ICGkoSB','RAf2KH4WeE','isr3U6ahb3','eUYeo38oRv',NULL,'l','DNXXTzV2r6','TfHvMhlJND','6nRgw8ykB4','mE2x09rjvy','BVxQ97yBdq','CyptvFnT3O','s','8OONdOVYf2','zHV3GXBvMu','F8hiltcGT4',NULL,0,'gXV82iiahD','Pengabdian',NULL,NULL,NULL,0,'JZAXjKp6Hn',NULL,NULL,NULL,0,'M246yCL8uF',NULL,'gAXnGYinsV','admin','2017-09-03 09:45:57',1,0),
	(55,56,'RfLviShSV1','2RFe6cw8dB','fX6lc6PGcC','CoXn2HDNIP','MT2BoHotHv',NULL,'l','7bREuFH9Ee','TyKcmrdPcw','6cxdLuyiOw','hz6Lbt2aVe','cqpSwGHoIH','AyPL0IFWIU','s','CbIxBfvMt4','SlGJpRqTRh','yBbl6dxWpm',NULL,0,'x1qLUxx7Y2','Pengabdian',NULL,NULL,NULL,0,'6G79cgT1bE',NULL,'030917094637ylB',NULL,0,'mHY2J9nEHF','030917094637zHxH.pdf','oQIHv0HyX5','admin','2017-09-03 09:46:37',1,0),
	(56,57,'aK2Wj10eZE','lg5HZFKaGU','k7SZcg9Db3','G9Wuv6BGkV','HmircD4TsR',NULL,'l','pgAaVlU9bJ','8YEoIm9Qh5','XLsAN7OqLN','oKwkFAUMrm','OFzH3RVWLw','DqXwgzld6u','s','7pqHMBkxR5','4i3XdcShxD','BGlhUK5VXH',NULL,0,'JJ5QcXHEX2','Pengabdian',NULL,NULL,NULL,0,'Qe8qCWZrQi',NULL,'0309170948076NV',NULL,0,'aachlfNkzt','030917094807iDwk.pdf','K0W4RZcCCE','admin','2017-09-03 09:48:07',1,0),
	(57,58,'HSN46OZTGD','K0WpuN1zKE','w8hRbVnibS','i7U3MkYVw3','tkgSwUTBgP',NULL,'l','yJeNwfyit8','od91W3dPZ9','2wXZ73h0NM','JtQf0zJTrm','XmkazIY625','gfI1cr2REG','s','YkK0du6hRo','ERz5jrW5Df','POfqYwhzN0',NULL,0,'IrvkuDudEw','Pengabdian',NULL,NULL,NULL,0,'1ypwH0Okxu',NULL,'030917094911zy9x.pdf',NULL,0,'vKWqYs3HVm','0309170949115JmI.pdf','eqyfI3VurI','admin','2017-09-03 09:49:11',1,0),
	(58,59,'vRnomZckBe','RJSgctkZNL','DKLUPrOQhL','cetvKHUKye','uORG4EDC7U',NULL,'l','wLYwZqf3vE','YKhkRZDDID','ph9Wj0DjU5','YS7CEfZv4E','5LMCl8PFNt','rDtXDcRMfx','s','SL0JdZdFuN','QXUKP9l3tD','pnpsJmtTEz',NULL,1,'JkVrVEugtZ','Pengabdian',NULL,NULL,NULL,0,'G42OXqzblB',NULL,'030917095018vMDC.pdf',NULL,0,'VoI0HUDED9','030917095018mj1h.pdf','y1aXb6aRkx','admin','2017-09-03 09:50:18',1,0),
	(59,60,'62E0rZzE3O','BexnXfJmtT','yl1ebLWHkm','6gGV4OXgCI','dDySHlOBer',NULL,'l','phHlYfU44z','Cdv6tLqLlh','TDTdAiFuq4','hh7bwwPFoA','YVCteADRBv','EfB0vNTrtg','s','Ejgg3IQ2dv','QJAlrUU42u','HBoEsgsyJG',NULL,4,'hxu6hfH70k','Pengabdian','1FnEPoSsK1',NULL,NULL,0,'BsFqy3B8r0',NULL,'030917095356YLDa.pdf',NULL,0,'rEinKpSmkZ','030917095356VGWY.pdf','PojVm1D6x4','admin','2017-09-03 09:53:56',1,0),
	(60,61,'yH4op0dRch','fezw1uY24C','5wsS159oxO','lqEstRHv9M','f37kxSXhVe',NULL,'l','iynbeSmUx4','ErbwO56grX','5rHaDzDKil','5Wro4yFYKQ','B505ZzPRq9','DwK2O5bjV9','s','bGEvgiW8HJ','lGz31f8Z1t','sF5UaccHgG',NULL,0,'mo9ytwnlhy','Pengabdian',NULL,NULL,NULL,0,'qinETS7KSJ',NULL,NULL,90000,0,'8CTSsd1etD',NULL,'L8n7zRODJb','admin','2017-09-03 15:12:23',1,0),
	(61,62,'juminem','fezw1uY24C','5wsS159oxO','lqEstRHv9M','f37kxSXhVe',NULL,'l','iynbeSmUx4','ErbwO56grX','5rHaDzDKil','','B505ZzPRq9','DwK2O5bjV9','s','bGEvgiW8HJ','lGz31f8Z1t','sF5UaccHgG',NULL,0,'mo9ytwnlhy','Pengabdian',NULL,NULL,NULL,0,'qinETS7KSJ',NULL,'030917151302JdCK.',90000,0,'8CTSsd1etD','0309171513023R4L.','L8n7zRODJb','admin','2017-09-12 17:29:02',1,0),
	(62,63,'NofGm9hhRL','BUxM1k7JRJ','dvm9CzC7Jj','7wMRhMqKHz','O5rBYckuGZ',NULL,'l','6gRSXjvrSr','PTkH1SlLaW','ryceLnc3n4','3ARidJpbky','RdAlMHWCQB','6Nz0Mhd8ho','s','43tbwYmtQN','Xo5mUnWS6C','AseVnip3Bi',NULL,0,'WoTluqtb0h','',NULL,NULL,NULL,0,'5Eo5nww89i',NULL,'0809171502542aeI.',0,0,'O6oB1KUvAd','080917150254xszy.','PkY8RvjgLA','admin','2017-09-08 15:02:54',1,1),
	(63,64,'ZQ2ZoObv5m','xd7bvDsxHY','5G9Azd2KnY','JMKoOneWdp','XO9bTHYo7R',NULL,'l','1eso1apOaU','RuEzf3lIN0','FE3MbAYs9o','gxZAtYPvNf','lGdVsAqDXy','yKWwnQzERG','s','XKeVhwSxxX','3FcVE7FnZr','iTKBixK1uk',NULL,0,'gZvGrjTcXX','',NULL,NULL,NULL,0,'9q5pe4uwNJ',NULL,'080917161029Qmom.',0,73,'zgxc9sHIIJ','080917161029UKjG.','Nt61W05SYZ','admin','2017-09-08 16:10:29',1,0),
	(64,65,'0n6YoSKPvk','AkBmnvGCjV','rglumtkQkO','VquUAKL6yT','XbvLWzWtWv',NULL,'l','I81cymw1Hr','GMEB1zZfiO','gXxdJaEsLu','HPo7gQuNAf','QmeMqk1BCj','Be1l9l2QzC','s','2JjXsE7YJc','jpDtqgOFcw','6rLkktyuoR',NULL,0,'porq5VRPJY','',NULL,NULL,NULL,0,'U6rFSW2AWK',NULL,'0809171611469D99.',0,0,'TQA6NmoNJn','080917161146Y9n9.','8xz3A4CQwN','admin','2017-09-08 16:11:46',1,0),
	(65,66,'iWAM0ubBXB','XdrBEQNysh','BXVcaZuZjC','97chcywcKO','esuFqF4xD1','2017-09-20','l','m9LtT9nXV4','dL25OTx5ke','ZNtVVrgOST','aJRsW4Mr2S','O2NBM4JKnf','UDGjJa2WFU','s','rN1ROj5CJz','0JqxNauX3l','BEqDv2tUej','2017-09-13',1,'WUkwWBuqe4','Pengabdian','kTa5ij32LL',NULL,NULL,0,'uOUjV3avyN','2017-09-12','090917125202b2kI.pdf',0,0,'0K3OMwkFHs','0909171252025ciu.pdf','TTl4fSRGjU','admin','2017-09-09 12:52:02',1,0),
	(66,67,'WGvvOclne7','sT4xKhFgY3','3qyYS8iRIQ','dpYb5yBTvo','DfWPl1Hc5r','2017-09-20','l','Bi3gzt6r0Z','xSufO0zhWm','h2zHfaZsv1','UtGzlXuJna','f9vczeFi3x','hKbMUakSBa','s','LMwtsCX52H','iZLpl4ZKe7','Mo2JZNOCUW','2017-08-30',1,'LNSmyV4NLp','Tetap','JOrOJX5wDU','2017-08-30','2017-09-28',8,'iqOcmUJ7n3','2017-09-03','090917143150RUlK.pdf',0,2,'8W56ftVFLH','090917143150iBvY.jpg','Fb2thyMrHQ','admin','2017-09-09 14:31:50',1,0),
	(67,68,'yH4op0dRch','fezw1uY24C','5wsS159oxO','lqEstRHv9M','f37kxSXhVe',NULL,'l','iynbeSmUx4','ErbwO56grX','5rHaDzDKil','','B505ZzPRq9','DwK2O5bjV9','s','bGEvgiW8HJ','lGz31f8Z1t','',NULL,0,'mo9ytwnlhy','Pengabdian',NULL,NULL,NULL,0,'qinETS7KSJ',NULL,'090917182501y4yt.',90000,0,'','090917182501QiuO.pdf','L8n7zRODJb','admin','2017-09-09 18:25:01',1,0),
	(68,69,'kartoyo','RpWM7H9Hdj','AXR3pDI2Ay','se1aSsWeGf','Mk5BsFEOIF','2017-09-14','l','Br87Mec8cL','T4E9ONT3XQ','fTVuIAoyx7','','zvBZKuFkWh','y3LTqz3c65','s','XKs2UFSXlx','RsHfWn5Ze8','bt8BRpT4bm','2017-09-05',0,'oXjvCYkwkz','Pengabdian','S5JB2oZvXJ',NULL,NULL,0,'c0hJVr5Alw','2017-09-20','0909171951069taR.jpg',0,0,'k5WFIJXto9','090917195106qdih.jpg','NDPijiYuzH','admin','2017-09-12 17:28:45',1,1),
	(69,70,'hoream','رمضان','8TLunnx8Q0','e17kUc6IT2','hdiayat','2017-09-30','l','hqTmqfzaMH','zNtRbNqvgl','G1UBBTV4jB','','CtVjoqeuXX','pY3R3p0y82','s','Bd99XXvhb8','3XMLOAZlbZ','pt0iiMcF0E','2017-09-13',2,'N0HKPC9zu1','Tetap',NULL,NULL,NULL,0,'6H3YI1CNB3','2017-09-26','120917154249Hiao.',3,0,'BXRvJ6WMlg','1209171542494ckG.','Zp8PoHpYj5','admin','2017-09-12 15:42:49',1,1),
	(70,71,'hoream','رمضان','8TLunnx8Q0','e17kUc6IT2','hdiayat','2017-09-30','l','hqTmqfzaMH','zNtRbNqvgl','G1UBBTV4jB','','CtVjoqeuXX','pY3R3p0y82','s','Bd99XXvhb8','3XMLOAZlbZ','pt0iiMcF0E','2017-09-13',1,'N0HKPC9zu1','Tetap',NULL,NULL,NULL,0,'6H3YI1CNB3','2017-09-26','120917155938FcxY.',3,0,'BXRvJ6WMlg','120917155938jlg0.','Zp8PoHpYj5','admin','2017-09-12 15:59:38',1,1),
	(71,72,'hoream','رمضان','8TLunnx8Q0','e17kUc6IT2','hdiayat','2017-09-30','l','hqTmqfzaMH','zNtRbNqvgl','G1UBBTV4jB','','CtVjoqeuXX','pY3R3p0y82','s','Bd99XXvhb8','3XMLOAZlbZ','pt0iiMcF0E','2017-09-13',2,'N0HKPC9zu1','Tetap','4MVA12mpRT',NULL,NULL,5,'6H3YI1CNB3','2017-09-26','1209171703595JEU.jpg',30000000,5,'isertifikasi','120917170359hOeD.jpg','Zp8PoHpYj5','admin','2017-09-12 17:05:04',1,1);

/*!40000 ALTER TABLE `ms_guru` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ms_guru_family
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ms_guru_family`;

CREATE TABLE `ms_guru_family` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_guru` int(11) DEFAULT NULL,
  `nama_anak` varchar(50) DEFAULT NULL,
  `pendidikan` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `ms_guru_family` WRITE;
/*!40000 ALTER TABLE `ms_guru_family` DISABLE KEYS */;

INSERT INTO `ms_guru_family` (`id`, `id_guru`, `nama_anak`, `pendidikan`, `tanggal_lahir`)
VALUES
	(1,17,'arahaf',NULL,'1990-01-27'),
	(2,17,'HH',NULL,'1989-12-01'),
	(3,18,'adistie',NULL,'1990-01-27'),
	(4,18,'ella',NULL,'1989-12-01'),
	(5,28,'farida','sma','2017-09-02'),
	(6,28,'akoe','mts','2017-09-01'),
	(7,29,'farida','sma','2017-09-02'),
	(8,29,'akoe','mts','2017-09-01'),
	(9,30,'farida','sma','2017-09-02'),
	(10,30,'akoe','mts','2017-09-01'),
	(11,31,'farida','sma','2017-09-02'),
	(12,31,'akoe','mts','2017-09-01'),
	(13,32,'farida','sma','2017-09-02'),
	(14,32,'akoe','mts','2017-09-01'),
	(15,33,'farida','sma','2017-09-02'),
	(16,33,'akoe','mts','2017-09-01'),
	(17,34,'farida','sma','2017-09-02'),
	(18,34,'akoe','mts','2017-09-01'),
	(19,36,'farida','sma','2017-09-02'),
	(20,36,'akoe','mts','2017-09-01'),
	(21,37,'farida','sma','2017-09-02'),
	(22,37,'akoe','mts','2017-09-01'),
	(23,38,'farida','sma','2017-09-02'),
	(24,38,'akoe','mts','2017-09-01'),
	(25,47,'anak','pendi','2017-09-02'),
	(26,48,'anak','pendi','2017-09-02'),
	(27,49,'anak','pendi','2017-09-02'),
	(28,50,'anak','pendi','2017-09-02'),
	(29,51,'anak','pendi','2017-09-02'),
	(30,52,'anak','pendi','2017-09-02'),
	(31,53,'anak','pendi','2017-09-02'),
	(32,58,'adong','Sarjana Muda','1989-02-01'),
	(33,59,'adong','Sarjana Muda','1989-02-01'),
	(34,65,'fdsafdsa','fsms','2017-09-01'),
	(35,66,'fdsaf','rrr','2017-09-02'),
	(38,70,NULL,NULL,'0000-00-00'),
	(80,71,'ds','ff','2017-09-01'),
	(81,71,'zz','zz','2017-08-27');

/*!40000 ALTER TABLE `ms_guru_family` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ms_guru_gapok
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ms_guru_gapok`;

CREATE TABLE `ms_guru_gapok` (
  `id_gapok` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_guru` int(11) DEFAULT NULL,
  `nominal` float DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id_gapok`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `ms_guru_gapok` WRITE;
/*!40000 ALTER TABLE `ms_guru_gapok` DISABLE KEYS */;

INSERT INTO `ms_guru_gapok` (`id_gapok`, `id_guru`, `nominal`, `userid`, `recdate`)
VALUES
	(1,61,90000,'admin','2017-09-03 15:13:02'),
	(2,69,3,'admin','2017-09-09 19:57:07'),
	(3,71,30000000,'admin','2017-09-12 16:51:40');

/*!40000 ALTER TABLE `ms_guru_gapok` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ms_guru_jabatan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ms_guru_jabatan`;

CREATE TABLE `ms_guru_jabatan` (
  `id_jabatan` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `ms_guru_jabatan` WRITE;
/*!40000 ALTER TABLE `ms_guru_jabatan` DISABLE KEYS */;

INSERT INTO `ms_guru_jabatan` (`id_jabatan`, `nama_jabatan`)
VALUES
	(1,'Majelis Guru'),
	(2,'Sekertariat Pondok'),
	(3,'Database & Publikasi'),
	(4,'Adm & Tata Usaha');

/*!40000 ALTER TABLE `ms_guru_jabatan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ms_guru_pendidikan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ms_guru_pendidikan`;

CREATE TABLE `ms_guru_pendidikan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_guru` int(11) DEFAULT NULL,
  `nama_pendidikan` varchar(50) DEFAULT NULL,
  `tempat` varchar(50) DEFAULT NULL,
  `lulus` varchar(10) DEFAULT NULL,
  `kategori` char(1) DEFAULT NULL COMMENT 'f = formal ; n = non formal',
  `file_lampiran` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `ms_guru_pendidikan` WRITE;
/*!40000 ALTER TABLE `ms_guru_pendidikan` DISABLE KEYS */;

INSERT INTO `ms_guru_pendidikan` (`id`, `id_guru`, `nama_pendidikan`, `tempat`, `lulus`, `kategori`, `file_lampiran`)
VALUES
	(1,32,NULL,'ss','209','f',''),
	(2,32,NULL,'ss','123','f',''),
	(3,32,NULL,'xx','111','n',''),
	(4,33,NULL,'ss','209','f','020917204521T2Np.pdf'),
	(5,33,NULL,'ss','123','f','020917204527iGrJ.pdf'),
	(6,33,NULL,'xx','111','n','020917204532haO0.pdf'),
	(7,34,NULL,'ss','209','f','020917204521T2Np.pdf'),
	(8,34,NULL,'ss','123','f','020917204527iGrJ.pdf'),
	(9,34,NULL,'xx','111','n','020917204532haO0.pdf'),
	(10,36,NULL,'ss','209','f','020917204521T2Np.pdf'),
	(11,36,NULL,'ss','123','f','020917204527iGrJ.pdf'),
	(12,36,NULL,'xx','111','n','020917204532haO0.pdf'),
	(13,37,NULL,'ss','209','f','020917204521T2Np.pdf'),
	(14,37,NULL,'ss','123','f','020917204527iGrJ.pdf'),
	(15,37,NULL,'xx','111','n','020917204532haO0.pdf'),
	(16,38,NULL,'ss','209','f','020917204521T2Np.pdf'),
	(17,38,NULL,'ss','123','f','020917204527iGrJ.pdf'),
	(18,38,NULL,'xx','111','n','020917204532haO0.pdf'),
	(19,47,NULL,'sma','2019','f','030917062258m5xF.pdf'),
	(20,47,NULL,'ll','2019','n','030917062309xxjT.pdf'),
	(21,48,NULL,'sma','2019','f','030917062258m5xF.pdf'),
	(22,48,NULL,'ll','2019','n','030917062309xxjT.pdf'),
	(23,49,NULL,'sma','2019','f','030917062258m5xF.pdf'),
	(24,49,NULL,'ll','2019','n','030917062309xxjT.pdf'),
	(25,50,NULL,'sma','2019','f','030917062258m5xF.pdf'),
	(26,50,NULL,'ll','2019','n','030917062309xxjT.pdf'),
	(27,51,NULL,'sma','2019','f','030917062258m5xF.pdf'),
	(28,51,NULL,'ll','2019','n','030917062309xxjT.pdf'),
	(29,52,NULL,'sma','2019','f','030917062258m5xF.pdf'),
	(30,52,NULL,'ll','2019','n','030917062309xxjT.pdf'),
	(31,53,NULL,'sma','2019','f','030917062258m5xF.pdf'),
	(32,53,NULL,'ll','2019','n','030917062309xxjT.pdf'),
	(33,59,NULL,'STMIK','2018','f','03091709530146cZ.pdf'),
	(34,59,NULL,'Course','2011','n','030917095332Tgbb.pdf'),
	(35,65,NULL,'fdsaf','23','f',''),
	(36,65,NULL,'fdas','123','n',''),
	(37,66,NULL,'fdsaf','123','f',''),
	(38,66,NULL,'aa','123','n',''),
	(79,71,'hahrrr','q','12','f','120917164747yy5x.pdf'),
	(80,71,'qqqrrrr','dd','123','n','120917160746Yp6D.jpg'),
	(81,68,NULL,'dafda','123','f',''),
	(82,68,NULL,'fff','111','n','');

/*!40000 ALTER TABLE `ms_guru_pendidikan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ms_guru_sk
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ms_guru_sk`;

CREATE TABLE `ms_guru_sk` (
  `id_sk` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_guru` int(11) DEFAULT NULL,
  `no_sk` varchar(25) DEFAULT NULL,
  `tgl_sk` date DEFAULT NULL,
  `file_sk` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_sk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `ms_guru_sk` WRITE;
/*!40000 ALTER TABLE `ms_guru_sk` DISABLE KEYS */;

INSERT INTO `ms_guru_sk` (`id_sk`, `id_guru`, `no_sk`, `tgl_sk`, `file_sk`)
VALUES
	(1,28,'h5ZSSpBTlg','2017-09-08','020917190119k3fX.pdf'),
	(2,30,'h5ZSSpBTlg','2017-09-08','020917190119k3fX.pdf'),
	(3,31,'h5ZSSpBTlg','2017-09-08','020917190119k3fX.pdf'),
	(4,32,'h5ZSSpBTlg','2017-09-08','020917190119k3fX.pdf'),
	(5,33,'h5ZSSpBTlg','2017-09-08','020917190119k3fX.pdf'),
	(6,34,'h5ZSSpBTlg','2017-09-08','020917190119k3fX.pdf'),
	(7,36,'h5ZSSpBTlg','2017-09-08','020917190119k3fX.pdf'),
	(8,37,'h5ZSSpBTlg','2017-09-08','020917190119k3fX.pdf'),
	(9,38,'h5ZSSpBTlg','2017-09-08','020917190119k3fX.pdf'),
	(10,47,'vUr8zX0dEA','2017-08-31','030917062221mePU.pdf'),
	(11,48,'vUr8zX0dEA','2017-08-31','030917062221mePU.pdf'),
	(12,49,'vUr8zX0dEA','2017-08-31','030917062221mePU.pdf'),
	(13,50,'vUr8zX0dEA','2017-08-31','030917062221mePU.pdf'),
	(14,51,'vUr8zX0dEA','2017-08-31','030917062221mePU.pdf'),
	(15,52,'vUr8zX0dEA','2017-08-31','030917062221mePU.pdf'),
	(16,53,'vUr8zX0dEA','2017-08-31','030917062221mePU.pdf'),
	(17,59,'7ii96jnwpn','2017-09-02','030917095349vdvf.pdf'),
	(18,65,'nF4MYZLw8p','2017-09-06',''),
	(19,66,'40YkZCC4zB','2017-09-14',''),
	(30,69,'DzlWe3i6aZ','2017-09-26','090917195551mNlX.jpg'),
	(31,70,'DzlWe3i6aZ','2017-09-26','090917195551mNlX.jpg'),
	(66,71,'sk1','2017-09-26','120917165716RXk7.jpg'),
	(67,71,'sk12','2017-09-26','120917165726NKbA.jpg'),
	(68,68,'EWL2KMLCNm','2017-09-20','');

/*!40000 ALTER TABLE `ms_guru_sk` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ms_guru_struktural
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ms_guru_struktural`;

CREATE TABLE `ms_guru_struktural` (
  `id_jabatan` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  UNIQUE KEY `key` (`id_guru`,`id_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `ms_guru_struktural` WRITE;
/*!40000 ALTER TABLE `ms_guru_struktural` DISABLE KEYS */;

INSERT INTO `ms_guru_struktural` (`id_jabatan`, `id_guru`)
VALUES
	(2,45),
	(2,46),
	(3,46),
	(2,65),
	(3,65),
	(4,65),
	(2,66),
	(3,66);

/*!40000 ALTER TABLE `ms_guru_struktural` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
