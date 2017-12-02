-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2017 at 08:57 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hidayati_pesantren`
--
CREATE DATABASE IF NOT EXISTS `hidayati_pesantren` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hidayati_pesantren`;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `group_id` int(11) UNSIGNED NOT NULL,
  `group_name` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`group_id`, `group_name`) VALUES
(1, 'Administrator'),
(2, 'Guru'),
(3, 'Akademik');

-- --------------------------------------------------------

--
-- Table structure for table `group_daftar_user`
--

CREATE TABLE `group_daftar_user` (
  `user_id` varchar(15) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_daftar_user`
--

INSERT INTO `group_daftar_user` (`user_id`, `group_id`) VALUES
('admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `group_hak_akses`
--

CREATE TABLE `group_hak_akses` (
  `group_id` int(11) NOT NULL,
  `modul_id` int(11) NOT NULL,
  `add` tinyint(1) DEFAULT '0',
  `edit` tinyint(1) DEFAULT '0',
  `delete` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_hak_akses`
--

INSERT INTO `group_hak_akses` (`group_id`, `modul_id`, `add`, `edit`, `delete`) VALUES
(1, 1, 1, 1, 1),
(1, 2, 1, 1, 1),
(1, 3, 1, 1, 1),
(1, 4, 1, 1, 1),
(1, 5, 1, 1, 1),
(1, 6, 1, 1, 1),
(1, 7, 1, 1, 1),
(1, 8, 1, 1, 1),
(1, 9, 1, 1, 1),
(1, 10, 1, 1, 1),
(1, 11, 1, 1, 1),
(1, 12, 1, 1, 1),
(1, 14, 1, 1, 1),
(1, 15, 1, 1, 1),
(1, 16, 1, 1, 1),
(1, 17, 1, 1, 1),
(1, 18, 1, 1, 1),
(1, 19, 1, 1, 1),
(1, 20, 1, 1, 1),
(1, 21, 1, 1, 1),
(1, 22, 1, 1, 1),
(1, 23, 1, 1, 1),
(1, 24, 1, 1, 1),
(1, 25, 1, 1, 1),
(1, 26, 1, 1, 1),
(1, 27, 1, 1, 1),
(1, 28, 1, 1, 1),
(1, 29, 1, 1, 1),
(1, 30, 1, 1, 1),
(1, 31, 1, 1, 1),
(1, 32, 1, 1, 1),
(1, 33, 1, 1, 1),
(1, 34, 1, 1, 1),
(1, 35, 1, 1, 1),
(1, 36, 1, 1, 1),
(1, 37, 1, 1, 1),
(1, 38, 1, 1, 1),
(1, 39, 1, 1, 1),
(1, 40, 1, 1, 1),
(1, 41, 1, 1, 1),
(1, 42, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `histori_master_biaya`
--

CREATE TABLE `histori_master_biaya` (
  `id` int(11) NOT NULL,
  `tgl_update` date DEFAULT NULL,
  `user_id` varchar(10) DEFAULT NULL,
  `nominal` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `infaq_temp`
--

CREATE TABLE `infaq_temp` (
  `keytrans` varchar(1) NOT NULL,
  `saldo` float DEFAULT NULL,
  `recuser` varchar(50) DEFAULT NULL,
  `recdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_addr` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `modul_id` int(11) UNSIGNED NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `nama_modul` varchar(30) DEFAULT NULL,
  `url` varchar(30) DEFAULT NULL,
  `icon` varchar(30) DEFAULT NULL,
  `sequence` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`modul_id`, `parent`, `nama_modul`, `url`, `icon`, `sequence`) VALUES
(1, 0, 'Pendaftaran', '#', 'fa fa-pencil-square-o', 1),
(2, 0, 'Pembayaran', '#', 'icon-calculator', 2),
(3, 0, 'Data Santri', '#', 'icon-graduation', 3),
(4, 0, 'Data Guru', '#', 'icon-user', 4),
(5, 0, 'Akademik', '#', 'icon-grid', 5),
(6, 0, 'Rapor', '#', 'icon-book-open', 6),
(7, 0, 'Master Data', '#', 'fa fa-database', 7),
(8, 0, 'Infaq', 'infaq', 'glyphicon glyphicon-import', 8),
(9, 0, 'Tabungan Siswa', 'tabungan', 'icon-wallet', 9),
(10, 0, 'Laporan', '#', 'glyphicon glyphicon-list-alt', 10),
(11, 2, 'Uang Bulanan', '#', 'glyphicon glyphicon-minus', 1),
(12, 2, 'Uang Semester', '#', 'glyphicon glyphicon-minus', 2),
(14, 3, 'Daftar Santri Aitam', 'datasantri/aitam', 'glyphicon glyphicon-minus', 2),
(15, 3, 'Daftar Santri TMI', 'datasantri', 'glyphicon glyphicon-minus', 1),
(16, 4, 'Daftar Guru / Karyawan', 'guru', 'glyphicon glyphicon-minus', 0),
(17, 4, 'Beban Kerja', '#', 'glyphicon glyphicon-minus', 0),
(18, 4, 'Pembagian Tugas', '#', 'glyphicon glyphicon-minus', 0),
(19, 5, 'Kurikulum Utama', 'kurikulum', 'glyphicon glyphicon-minus', 1),
(20, 5, 'Jadwal Pelajaran Utama', 'jadwal_pelajaran', 'glyphicon glyphicon-minus', 3),
(21, 5, 'Jadwal Guru', '#', 'glyphicon glyphicon-minus', 5),
(22, 5, 'RPP', 'rpp', 'glyphicon glyphicon-minus', 6),
(23, 5, 'Absensi', '#', 'glyphicon glyphicon-minus', 7),
(24, 5, 'Nilai', '#', 'glyphicon glyphicon-minus', 8),
(25, 7, 'Data Pelajaran', 'mata_pelajaran', 'glyphicon glyphicon-minus', 2),
(26, 7, 'Data Kelas', 'kelas', 'glyphicon glyphicon-minus', 6),
(27, 7, 'Data Kamar', 'kamar', 'glyphicon glyphicon-minus', 4),
(28, 7, 'Data Gedung', 'gedung', 'glyphicon glyphicon-minus', 3),
(29, 7, 'Data Bidang Studi', 'bidstudi', 'glyphicon glyphicon-minus', 1),
(30, 7, 'Data Bagian', 'bagian', 'glyphicon glyphicon-minus', 5),
(31, 5, 'Kurikulum Sore', 'kurikulumsore', 'glyphicon glyphicon-minus', 2),
(32, 7, 'Komponen Biaya', 'komponen', 'glyphicon glyphicon-minus', 6),
(33, 7, 'Data Donatur', 'donatur', 'glyphicon glyphicon-minus', 7),
(34, 7, 'Config', 'msconfig', 'glyphicon glyphicon-minus', 9),
(35, 5, 'Jadwal Pelajaran Sore & kitab', 'jadwal_pelajaran_sore', 'glyphicon glyphicon-minus', 4),
(36, 7, 'Semester', 'semester', 'glyphicon glyphicon-minus', 10),
(37, 7, 'Data Jabatan Guru', 'jabatan_guru', 'glyphicon glyphicon-minus', 8),
(38, 1, 'Pendaftaran TMI', 'pendaftaran', 'fa fa-pencil-square-o', 1),
(39, 1, 'Pendaftaran AITAM', 'pendaftaran/aitam', 'fa fa-pencil-square-o', 2),
(40, 0, 'Bank Soal', '#', 'glyphicon glyphicon-book ', 11),
(41, 40, 'Data Soal', 'datasoal', 'glyphicon glyphicon-minus', 1),
(42, 40, 'Soal Ujian', 'soalujian', 'glyphicon glyphicon-minus', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ms_bagian`
--

CREATE TABLE `ms_bagian` (
  `kode_bagian` varchar(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_banksoal`
--

CREATE TABLE `ms_banksoal` (
  `id_soal` int(11) NOT NULL,
  `id_matpal` varchar(10) DEFAULT NULL,
  `tingkat` int(2) DEFAULT NULL,
  `soal` varchar(200) DEFAULT NULL,
  `jwb_a` varchar(50) DEFAULT NULL,
  `jwb_b` varchar(50) DEFAULT NULL,
  `jwb_c` varchar(50) DEFAULT NULL,
  `jwb_d` varchar(50) DEFAULT NULL,
  `jwb_benar` varchar(2) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_bebanguru`
--

CREATE TABLE `ms_bebanguru` (
  `id_guru` int(11) DEFAULT NULL,
  `jml_beban` int(11) DEFAULT NULL,
  `id_thn_ajar` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_biaya`
--

CREATE TABLE `ms_biaya` (
  `id` int(11) NOT NULL,
  `kategori` varchar(8) DEFAULT NULL,
  `nama_item` varchar(25) DEFAULT NULL,
  `nominal` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_biaya_komponen`
--

CREATE TABLE `ms_biaya_komponen` (
  `id_komponen` int(10) NOT NULL,
  `nama_komponen` varchar(20) DEFAULT NULL,
  `tipe` varchar(5) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_bidang_study`
--

CREATE TABLE `ms_bidang_study` (
  `id_bidang` varchar(10) DEFAULT NULL,
  `nama_bidang` varchar(50) DEFAULT NULL,
  `kategori` varchar(10) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_config`
--

CREATE TABLE `ms_config` (
  `id_config` int(11) NOT NULL,
  `nomor_statistik` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NPSN` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jenis_lembaga` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userid` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ms_config`
--

INSERT INTO `ms_config` (`id_config`, `nomor_statistik`, `NPSN`, `nama`, `jenis_lembaga`, `userid`, `recdate`) VALUES
(1, '510232051432', '69937270 - 69937240', 'TMI - Pondok Pesantren Darussalam', 'Mu\'allimin', 'admin', '2017-09-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ms_donatur`
--

CREATE TABLE `ms_donatur` (
  `id_donatur` int(11) NOT NULL,
  `nama_donatur` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telpon` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kategori` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'AITAM AR RAHMAH/AITAM ISLAH /AITAM BAITUL ZAKAT',
  `userid` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ms_family`
--

CREATE TABLE `ms_family` (
  `id` int(11) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `nama_anak` varchar(50) DEFAULT NULL,
  `tanggal_lahir` varchar(10) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_fisik_santri`
--

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
  `thn_fisik` year(4) DEFAULT NULL,
  `kelainan_fisik` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_gapok`
--

CREATE TABLE `ms_gapok` (
  `id_gapok` int(11) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `tahun` varchar(5) DEFAULT NULL,
  `nominal` float DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_gedung`
--

CREATE TABLE `ms_gedung` (
  `kode_gedung` varchar(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_guru`
--

CREATE TABLE `ms_guru` (
  `id_guru` int(11) UNSIGNED NOT NULL,
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
  `is_delete` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ms_guru_family`
--

CREATE TABLE `ms_guru_family` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `nama_anak` varchar(50) DEFAULT NULL,
  `pendidikan` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_guru_gapok`
--

CREATE TABLE `ms_guru_gapok` (
  `id_gapok` int(11) UNSIGNED NOT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `nominal` float DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_guru_jabatan`
--

CREATE TABLE `ms_guru_jabatan` (
  `id_jabatan` int(11) UNSIGNED NOT NULL,
  `nama_jabatan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_guru_pendidikan`
--

CREATE TABLE `ms_guru_pendidikan` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `nama_pendidikan` varchar(50) DEFAULT NULL,
  `tempat` varchar(50) DEFAULT NULL,
  `lulus` varchar(10) DEFAULT NULL,
  `kategori` char(1) DEFAULT NULL COMMENT 'f = formal ; n = non formal',
  `file_lampiran` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_guru_sk`
--

CREATE TABLE `ms_guru_sk` (
  `id_sk` int(11) UNSIGNED NOT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `no_sk` varchar(25) DEFAULT NULL,
  `tgl_sk` date DEFAULT NULL,
  `file_sk` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_guru_struktural`
--

CREATE TABLE `ms_guru_struktural` (
  `id_jabatan` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_histori_biaya`
--

CREATE TABLE `ms_histori_biaya` (
  `idhist` int(11) DEFAULT NULL,
  `id_biaya` int(11) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL,
  `nominal` float DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_infaq`
--

CREATE TABLE `ms_infaq` (
  `id_infaq` int(11) NOT NULL,
  `keytrans` varchar(1) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tgl_infaq` date NOT NULL,
  `tipe` varchar(20) DEFAULT NULL,
  `nominal` float DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_kamar`
--

CREATE TABLE `ms_kamar` (
  `kode_kamar` varchar(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `kapasitas` int(3) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_kecakapan_santri`
--

CREATE TABLE `ms_kecakapan_santri` (
  `no_registrasi` varchar(15) DEFAULT NULL,
  `bid_studi` varchar(15) DEFAULT NULL,
  `olahraga` varchar(15) DEFAULT NULL,
  `kesenian` varchar(15) DEFAULT NULL,
  `keterampilan` varchar(15) DEFAULT NULL,
  `lain_lain` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_kelas`
--

CREATE TABLE `ms_kelas` (
  `kode_kelas` varchar(10) DEFAULT NULL,
  `tingkat` int(11) DEFAULT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `tipe_kelas` varchar(10) DEFAULT NULL,
  `kapasitas` int(2) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_kelas_d`
--

CREATE TABLE `ms_kelas_d` (
  `id_kelas_dtl` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_kelas_h`
--

CREATE TABLE `ms_kelas_h` (
  `id_kelas` int(11) DEFAULT NULL,
  `nama_kelas` varchar(50) DEFAULT NULL,
  `type_kelas` varchar(10) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_keluarga`
--

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
  `thn_lulus` year(4) DEFAULT NULL,
  `no_stambuk_alumni` int(11) DEFAULT NULL,
  `tempat_lahir` varchar(15) DEFAULT NULL,
  `tgl_lahir_keluarga` date DEFAULT NULL,
  `hub_kel` varchar(25) DEFAULT NULL,
  `keterangan` varchar(25) DEFAULT NULL,
  `ktp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_mata_pelajaran`
--

CREATE TABLE `ms_mata_pelajaran` (
  `id_matpal` varchar(10) DEFAULT NULL,
  `nama_matpal` varchar(25) DEFAULT NULL,
  `id_bidang` varchar(10) DEFAULT NULL,
  `status` varchar(8) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_minggu`
--

CREATE TABLE `ms_minggu` (
  `id_minggu` int(11) NOT NULL,
  `minggu` varchar(5) NOT NULL,
  `urut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_penyakit`
--

CREATE TABLE `ms_penyakit` (
  `no_registrasi` varchar(15) DEFAULT NULL,
  `nama_penyakit` varchar(15) DEFAULT NULL,
  `thn_penyakit` year(4) DEFAULT NULL,
  `kategori_penyakit` varchar(15) DEFAULT NULL,
  `tipe_penyakit` varchar(15) DEFAULT NULL,
  `lamp_bukti` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_santri`
--

CREATE TABLE `ms_santri` (
  `kategori` varchar(15) DEFAULT NULL,
  `no_registrasi` varchar(15) CHARACTER SET latin1 NOT NULL COMMENT 'YY masehi  + YY hijriyah + xxxx',
  `no_stambuk` int(11) DEFAULT NULL,
  `thn_masuk` year(4) DEFAULT NULL,
  `rayon` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `kamar` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `bagian` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `kel_sekarang` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `nisn` varchar(25) DEFAULT NULL,
  `nisnlokal` varchar(25) DEFAULT NULL,
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
  `lamp_surat_kesehatan` varchar(25) CHARACTER SET latin1 DEFAULT NULL COMMENT 'File Upload'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ms_santri_pengeluaran`
--

CREATE TABLE `ms_santri_pengeluaran` (
  `no_registrasi` varchar(15) DEFAULT NULL,
  `nominal` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_semester`
--

CREATE TABLE `ms_semester` (
  `id_semester` int(11) NOT NULL,
  `semester` int(11) DEFAULT NULL,
  `bulan` varchar(20) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `ms_semester`
--

INSERT INTO `ms_semester` (`id_semester`, `semester`, `bulan`) VALUES
(30, 2, 'SEPTEMBER'),
(31, 2, 'OKTOBER'),
(32, 2, 'NOVEMBER'),
(33, 2, 'DESEMBER'),
(34, 1, 'JANUARI'),
(35, 1, 'FEBRUARI'),
(36, 1, 'MARET');

-- --------------------------------------------------------

--
-- Table structure for table `ms_tabungan`
--

CREATE TABLE `ms_tabungan` (
  `no_registrasi` varchar(15) DEFAULT NULL,
  `tgl_tabungan` date DEFAULT NULL,
  `tipe` varchar(6) DEFAULT NULL,
  `nominal` double DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `userid` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_tahun_ajaran`
--

CREATE TABLE `ms_tahun_ajaran` (
  `id` int(11) NOT NULL,
  `deskripsi` varchar(9) CHARACTER SET latin1 DEFAULT NULL COMMENT 'yyyy/yyyy',
  `kategori` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ms_tarbiyatul`
--

CREATE TABLE `ms_tarbiyatul` (
  `id_tarbiyatul` int(11) DEFAULT NULL,
  `id_thn_ajar` int(11) DEFAULT NULL,
  `id_dtl_kelas` int(11) DEFAULT NULL,
  `hissoh` varchar(50) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `user` varchar(100) NOT NULL DEFAULT '',
  `menu` varchar(25) NOT NULL DEFAULT '',
  `query` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `santri_limit_harian`
--

CREATE TABLE `santri_limit_harian` (
  `id` int(11) UNSIGNED NOT NULL,
  `no_reg` varchar(10) DEFAULT NULL,
  `limit` int(11) DEFAULT NULL,
  `up_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `up_by` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `santri_saldo`
--

CREATE TABLE `santri_saldo` (
  `no_registrasi` varchar(10) NOT NULL,
  `saldo` float DEFAULT NULL,
  `recuser` varchar(20) DEFAULT NULL,
  `recdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sequence`
--

CREATE TABLE `sequence` (
  `nama_field` varchar(20) NOT NULL DEFAULT '',
  `nomor_terakhir` varchar(15) DEFAULT NULL,
  `remark` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabungan_temp`
--

CREATE TABLE `tabungan_temp` (
  `no_registrasi` varchar(10) NOT NULL,
  `saldo` float DEFAULT NULL,
  `recuser` varchar(20) DEFAULT NULL,
  `recdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trans_absensi`
--

CREATE TABLE `trans_absensi` (
  `id_jadwal` int(11) DEFAULT NULL,
  `no_register` varchar(15) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `absensi` varchar(10) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trans_jadwal_pelajaran`
--

CREATE TABLE `trans_jadwal_pelajaran` (
  `id_jadwal` int(11) NOT NULL,
  `santri` varchar(5) NOT NULL COMMENT 'PUTRA/PUTRI',
  `id_thn_ajar` int(11) NOT NULL,
  `semester` char(1) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `jam` char(15) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `id_mapel` varchar(10) NOT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trans_kurikulum`
--

CREATE TABLE `trans_kurikulum` (
  `id_thn_ajar` varchar(9) NOT NULL,
  `tingkat` varchar(10) NOT NULL,
  `tipe_kelas` varchar(10) NOT NULL,
  `id_mapel` varchar(10) NOT NULL,
  `sm_1` varchar(10) DEFAULT NULL,
  `sm_2` varchar(10) DEFAULT NULL,
  `kategori` varchar(25) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trans_pedidikan`
--

CREATE TABLE `trans_pedidikan` (
  `id` int(11) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `tempat` varchar(50) DEFAULT NULL,
  `lulus` varchar(10) DEFAULT NULL,
  `STATUS` varchar(10) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trans_pembayaran`
--

CREATE TABLE `trans_pembayaran` (
  `tipe` varchar(20) DEFAULT NULL,
  `no_registrasi` varchar(15) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `nominal` double DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trans_pembiayaan_siswa`
--

CREATE TABLE `trans_pembiayaan_siswa` (
  `no_registrasi` varchar(15) DEFAULT NULL,
  `pembiaya` varchar(10) DEFAULT NULL,
  `biaya_perbulan_min` double DEFAULT NULL,
  `biaya_perbulan_max` double DEFAULT NULL,
  `penghasilan` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trans_rpp`
--

CREATE TABLE `trans_rpp` (
  `id_rpp` int(11) NOT NULL,
  `id_thn_ajar` int(11) DEFAULT NULL,
  `santri` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `semester` varchar(2) CHARACTER SET latin1 DEFAULT NULL,
  `kode_kelas` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `id_mapel` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `userid` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `recdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trans_rpp_detail`
--

CREATE TABLE `trans_rpp_detail` (
  `id_rpp_dtl` int(11) NOT NULL,
  `id_rpp` int(11) DEFAULT NULL,
  `bulan` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `minggu` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `hari` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `hissos` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `materi_pokok` varchar(100) DEFAULT NULL,
  `alokasi_waktu` varchar(11) CHARACTER SET latin1 DEFAULT NULL,
  `TIU` varchar(50) DEFAULT NULL,
  `jns_tagihan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trans_tabungan`
--

CREATE TABLE `trans_tabungan` (
  `id` int(11) NOT NULL,
  `no_registrasi` varchar(15) DEFAULT NULL,
  `tgl_tabungan` date DEFAULT NULL,
  `tipe` char(1) DEFAULT NULL,
  `nominal` double DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(15) NOT NULL DEFAULT '',
  `password` varchar(15) DEFAULT NULL,
  `nama_lengkap` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `password`, `nama_lengkap`) VALUES
('admin', '61abf45697b7432', 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `group_daftar_user`
--
ALTER TABLE `group_daftar_user`
  ADD PRIMARY KEY (`group_id`,`user_id`);

--
-- Indexes for table `group_hak_akses`
--
ALTER TABLE `group_hak_akses`
  ADD UNIQUE KEY `group_modul` (`group_id`,`modul_id`);

--
-- Indexes for table `histori_master_biaya`
--
ALTER TABLE `histori_master_biaya`
  ADD KEY `id` (`id`);

--
-- Indexes for table `infaq_temp`
--
ALTER TABLE `infaq_temp`
  ADD PRIMARY KEY (`keytrans`);

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`modul_id`);

--
-- Indexes for table `ms_banksoal`
--
ALTER TABLE `ms_banksoal`
  ADD KEY `id_soal` (`id_soal`);

--
-- Indexes for table `ms_biaya`
--
ALTER TABLE `ms_biaya`
  ADD KEY `id` (`id`);

--
-- Indexes for table `ms_biaya_komponen`
--
ALTER TABLE `ms_biaya_komponen`
  ADD PRIMARY KEY (`id_komponen`);

--
-- Indexes for table `ms_config`
--
ALTER TABLE `ms_config`
  ADD PRIMARY KEY (`id_config`);

--
-- Indexes for table `ms_donatur`
--
ALTER TABLE `ms_donatur`
  ADD PRIMARY KEY (`id_donatur`);

--
-- Indexes for table `ms_guru`
--
ALTER TABLE `ms_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `ms_guru_family`
--
ALTER TABLE `ms_guru_family`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_guru_gapok`
--
ALTER TABLE `ms_guru_gapok`
  ADD PRIMARY KEY (`id_gapok`);

--
-- Indexes for table `ms_guru_jabatan`
--
ALTER TABLE `ms_guru_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `ms_guru_pendidikan`
--
ALTER TABLE `ms_guru_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_guru_sk`
--
ALTER TABLE `ms_guru_sk`
  ADD PRIMARY KEY (`id_sk`);

--
-- Indexes for table `ms_guru_struktural`
--
ALTER TABLE `ms_guru_struktural`
  ADD UNIQUE KEY `key` (`id_guru`,`id_jabatan`);

--
-- Indexes for table `ms_infaq`
--
ALTER TABLE `ms_infaq`
  ADD PRIMARY KEY (`id_infaq`);

--
-- Indexes for table `ms_santri`
--
ALTER TABLE `ms_santri`
  ADD PRIMARY KEY (`no_registrasi`);

--
-- Indexes for table `ms_semester`
--
ALTER TABLE `ms_semester`
  ADD PRIMARY KEY (`id_semester`),
  ADD KEY `id` (`id_semester`);

--
-- Indexes for table `ms_tabungan`
--
ALTER TABLE `ms_tabungan`
  ADD KEY `pk` (`id`);

--
-- Indexes for table `ms_tahun_ajaran`
--
ALTER TABLE `ms_tahun_ajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`user`,`menu`);

--
-- Indexes for table `santri_limit_harian`
--
ALTER TABLE `santri_limit_harian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_reg` (`no_reg`);

--
-- Indexes for table `santri_saldo`
--
ALTER TABLE `santri_saldo`
  ADD PRIMARY KEY (`no_registrasi`);

--
-- Indexes for table `sequence`
--
ALTER TABLE `sequence`
  ADD PRIMARY KEY (`nama_field`);

--
-- Indexes for table `tabungan_temp`
--
ALTER TABLE `tabungan_temp`
  ADD PRIMARY KEY (`no_registrasi`);

--
-- Indexes for table `trans_jadwal_pelajaran`
--
ALTER TABLE `trans_jadwal_pelajaran`
  ADD PRIMARY KEY (`id_jadwal`,`santri`,`id_thn_ajar`,`semester`,`kode_kelas`,`id_guru`,`jam`,`hari`,`id_mapel`);

--
-- Indexes for table `trans_kurikulum`
--
ALTER TABLE `trans_kurikulum`
  ADD PRIMARY KEY (`id_thn_ajar`,`tingkat`,`id_mapel`,`tipe_kelas`);

--
-- Indexes for table `trans_rpp`
--
ALTER TABLE `trans_rpp`
  ADD KEY `id_rpp` (`id_rpp`);

--
-- Indexes for table `trans_rpp_detail`
--
ALTER TABLE `trans_rpp_detail`
  ADD KEY `id_rpp_dtl` (`id_rpp_dtl`);

--
-- Indexes for table `trans_tabungan`
--
ALTER TABLE `trans_tabungan`
  ADD KEY `pk` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `group_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `histori_master_biaya`
--
ALTER TABLE `histori_master_biaya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;
--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `modul_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `ms_banksoal`
--
ALTER TABLE `ms_banksoal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ms_biaya`
--
ALTER TABLE `ms_biaya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ms_biaya_komponen`
--
ALTER TABLE `ms_biaya_komponen`
  MODIFY `id_komponen` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ms_config`
--
ALTER TABLE `ms_config`
  MODIFY `id_config` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ms_donatur`
--
ALTER TABLE `ms_donatur`
  MODIFY `id_donatur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ms_guru`
--
ALTER TABLE `ms_guru`
  MODIFY `id_guru` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `ms_guru_family`
--
ALTER TABLE `ms_guru_family`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `ms_guru_gapok`
--
ALTER TABLE `ms_guru_gapok`
  MODIFY `id_gapok` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ms_guru_jabatan`
--
ALTER TABLE `ms_guru_jabatan`
  MODIFY `id_jabatan` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ms_guru_pendidikan`
--
ALTER TABLE `ms_guru_pendidikan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `ms_guru_sk`
--
ALTER TABLE `ms_guru_sk`
  MODIFY `id_sk` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `ms_infaq`
--
ALTER TABLE `ms_infaq`
  MODIFY `id_infaq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `ms_semester`
--
ALTER TABLE `ms_semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `ms_tabungan`
--
ALTER TABLE `ms_tabungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ms_tahun_ajaran`
--
ALTER TABLE `ms_tahun_ajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `santri_limit_harian`
--
ALTER TABLE `santri_limit_harian`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `trans_jadwal_pelajaran`
--
ALTER TABLE `trans_jadwal_pelajaran`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;
--
-- AUTO_INCREMENT for table `trans_rpp`
--
ALTER TABLE `trans_rpp`
  MODIFY `id_rpp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `trans_rpp_detail`
--
ALTER TABLE `trans_rpp_detail`
  MODIFY `id_rpp_dtl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;
--
-- AUTO_INCREMENT for table `trans_tabungan`
--
ALTER TABLE `trans_tabungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
