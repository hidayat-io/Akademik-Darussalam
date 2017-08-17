
DROP TABLE IF EXISTS `ms_jabatan_guru`;

CREATE TABLE `ms_jabatan_guru` (
  `id_jabatan` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `ms_jabatan_guru` WRITE;
/*!40000 ALTER TABLE `ms_jabatan_guru` DISABLE KEYS */;

INSERT INTO `ms_jabatan_guru` (`id_jabatan`, `nama_jabatan`)
VALUES
	(1,'Majelis Guru'),
	(2,'Sekertariat Pondok'),
	(3,'Database & Publikasi'),
	(4,'Adm & Tata Usaha');