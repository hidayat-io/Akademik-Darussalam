-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2017 at 08:59 PM
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

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`id`, `user_id`, `time`, `ip_addr`) VALUES
(52, NULL, '2017-05-23 00:36:32', '::1'),
(53, NULL, '2017-05-23 17:50:36', '::1'),
(54, NULL, '2017-05-23 19:17:38', '::1'),
(55, NULL, '2017-05-23 19:18:31', '::1'),
(56, 'admin', '2017-05-23 19:20:56', '::1'),
(57, 'admin', '2017-05-23 19:37:50', '::1'),
(58, 'admin', '2017-05-23 19:45:53', '::1'),
(59, 'admin', '2017-05-23 20:19:35', '::1'),
(60, 'admin', '2017-05-23 20:28:36', '111.68.118.242'),
(61, 'admin', '2017-05-25 03:35:40', '115.178.214.252'),
(62, 'admin', '2017-05-26 09:09:36', '112.215.170.36'),
(63, 'admin', '2017-05-29 08:12:29', '::1'),
(64, 'admin', '2017-05-29 08:16:19', '::1'),
(65, 'admin', '2017-05-29 09:20:59', '::1'),
(66, 'admin', '2017-05-29 09:24:07', '::1'),
(67, 'admin', '2017-05-29 09:26:22', '::1'),
(68, 'admin', '2017-05-29 10:13:19', '::1'),
(69, 'admin', '2017-05-29 10:32:30', '::1'),
(70, 'admin', '2017-05-30 06:42:50', '::1'),
(71, 'admin', '2017-05-30 07:06:24', '::1'),
(72, 'admin', '2017-05-30 09:43:06', '::1'),
(73, 'admin', '2017-05-31 20:44:26', '::1'),
(74, 'admin', '2017-05-31 20:44:26', '::1'),
(75, 'admin', '2017-06-02 09:03:47', '::1'),
(76, 'admin', '2017-06-02 09:08:23', '::1'),
(77, 'admin', '2017-06-02 19:19:38', '::1'),
(78, 'admin', '2017-06-03 06:37:29', '::1'),
(79, 'admin', '2017-06-03 10:05:05', '::1'),
(80, 'admin', '2017-06-06 06:57:03', '::1'),
(81, 'admin', '2017-06-07 08:45:18', '::1'),
(82, 'admin', '2017-06-07 09:46:15', '::1'),
(83, 'admin', '2017-06-07 14:20:34', '::1'),
(84, 'admin', '2017-06-08 06:35:28', '::1'),
(85, 'admin', '2017-06-08 09:17:32', '::1'),
(86, 'admin', '2017-06-08 09:33:57', '::1'),
(87, 'admin', '2017-06-09 08:05:13', '::1'),
(88, 'admin', '2017-06-10 21:08:00', '::1'),
(89, 'admin', '2017-06-11 08:45:31', '::1'),
(90, 'admin', '2017-06-13 06:54:52', '::1'),
(91, 'admin', '2017-06-13 07:19:20', '::1'),
(92, 'admin', '2017-06-14 08:14:49', '::1'),
(93, 'admin', '2017-06-18 21:02:26', '::1'),
(94, 'admin', '2017-06-19 02:16:07', '::1'),
(95, 'admin', '2017-07-03 04:38:22', '::1'),
(96, 'admin', '2017-07-03 08:29:10', '::1'),
(97, 'admin', '2017-07-03 18:52:50', '::1'),
(98, 'admin', '2017-07-03 22:08:12', '::1'),
(99, 'admin', '2017-07-04 09:17:47', '111.68.118.242'),
(100, 'admin', '2017-07-04 09:38:47', '112.215.171.170'),
(101, 'admin', '2017-07-04 10:28:47', '112.215.171.170'),
(102, 'admin', '2017-07-04 11:36:44', '114.124.144.219'),
(103, 'admin', '2017-07-04 15:52:28', '114.124.242.95'),
(104, 'admin', '2017-07-04 17:07:55', '112.215.171.170'),
(105, 'admin', '2017-07-04 23:29:53', '114.124.209.11'),
(106, 'admin', '2017-07-05 00:22:00', '115.85.78.178'),
(107, 'admin', '2017-07-05 07:05:16', '115.85.78.178'),
(108, 'admin', '2017-07-05 08:35:09', '115.85.78.178'),
(109, 'admin', '2017-07-05 09:31:21', '114.124.209.155'),
(110, 'admin', '2017-07-05 11:35:12', '112.215.235.7'),
(111, 'admin', '2017-07-05 12:50:48', '114.124.169.58'),
(112, 'admin', '2017-07-06 00:38:08', '111.68.118.242'),
(113, 'admin', '2017-07-06 01:29:30', '112.215.152.92'),
(114, 'admin', '2017-07-06 02:12:01', '115.85.78.178'),
(115, 'admin', '2017-07-06 04:45:30', '115.85.78.178'),
(116, 'admin', '2017-07-06 07:29:56', '111.68.118.242'),
(117, 'admin', '2017-07-06 12:04:26', '114.124.241.173'),
(118, 'admin', '2017-07-07 02:10:39', '::1'),
(119, 'admin', '2017-07-07 06:01:40', '::1'),
(120, 'admin', '2017-07-07 15:17:34', '::1'),
(121, 'admin', '2017-07-08 13:39:10', '::1'),
(122, 'admin', '2017-07-08 14:08:41', '::1'),
(123, 'admin', '2017-07-08 18:19:07', '::1'),
(124, 'admin', '2017-07-08 18:20:00', '::1'),
(125, 'admin', '2017-07-08 20:28:45', '::1'),
(126, 'admin', '2017-07-09 01:37:08', '::1'),
(127, 'admin', '2017-07-09 03:34:11', '::1'),
(128, 'admin', '2017-07-09 03:39:12', '::1'),
(129, 'admin', '2017-07-09 13:46:42', '::1'),
(130, 'admin', '2017-07-10 10:29:18', '::1'),
(131, 'admin', '2017-07-11 14:53:33', '::1'),
(132, 'admin', '2017-07-11 14:54:09', '::1'),
(133, 'admin', '2017-07-12 14:56:25', '::1'),
(134, 'admin', '2017-07-12 15:00:00', '::1'),
(135, 'admin', '2017-07-12 15:31:01', '::1'),
(136, 'admin', '2017-07-12 17:47:06', '::1'),
(137, 'admin', '2017-07-13 13:23:29', '::1'),
(138, 'admin', '2017-07-14 10:48:38', '::1'),
(139, 'admin', '2017-07-14 14:33:10', '::1'),
(140, 'admin', '2017-07-14 15:35:34', '::1'),
(141, 'admin', '2017-07-15 05:55:18', '127.0.0.1'),
(142, 'admin', '2017-07-15 06:05:33', '127.0.0.1'),
(143, 'admin', '2017-07-15 12:08:42', '127.0.0.1'),
(144, 'admin', '2017-07-15 15:57:07', '127.0.0.1'),
(145, 'admin', '2017-07-15 16:22:36', '127.0.0.1'),
(146, 'admin', '2017-07-16 03:19:26', '::1'),
(147, 'admin', '2017-07-16 07:23:22', '::1'),
(148, 'admin', '2017-07-16 09:02:50', '::1'),
(149, 'admin', '2017-07-16 14:50:13', '::1'),
(150, 'admin', '2017-07-17 01:02:43', '::1'),
(151, 'admin', '2017-07-17 02:44:13', '::1'),
(152, 'admin', '2017-07-17 04:50:52', '::1'),
(153, 'admin', '2017-07-17 06:10:52', '::1'),
(154, 'admin', '2017-07-19 14:45:58', '::1'),
(155, 'admin', '2017-07-20 14:22:08', '::1'),
(156, 'admin', '2017-07-21 03:13:52', '::1'),
(157, 'admin', '2017-07-21 06:36:41', '::1'),
(158, 'admin', '2017-07-22 12:21:42', '::1'),
(159, 'admin', '2017-07-22 13:42:19', '::1'),
(160, 'admin', '2017-07-23 03:29:00', '::1'),
(161, 'admin', '2017-07-23 09:16:10', '::1'),
(162, 'admin', '2017-07-23 09:18:39', '::1'),
(163, 'admin', '2017-07-23 12:10:05', '::1'),
(164, 'admin', '2017-07-23 17:20:39', '::1'),
(165, 'admin', '2017-07-25 02:58:00', '::1'),
(166, 'admin', '2017-07-25 13:09:14', '::1'),
(167, 'admin', '2017-07-25 13:27:07', '::1'),
(168, 'admin', '2017-07-25 16:03:04', '::1'),
(169, 'admin', '2017-07-25 16:09:26', '::1'),
(170, 'admin', '2017-07-26 14:50:07', '::1'),
(171, 'admin', '2017-07-27 04:34:37', '::1'),
(172, 'admin', '2017-07-27 10:33:44', '::1'),
(173, 'admin', '2017-07-27 13:50:28', '::1'),
(174, 'admin', '2017-07-27 15:29:51', '::1'),
(175, 'admin', '2017-07-27 15:53:24', '::1'),
(176, 'admin', '2017-07-30 12:45:08', '::1'),
(177, 'admin', '2017-07-30 12:58:23', '::1'),
(178, 'admin', '2017-08-01 03:40:10', '::1'),
(179, 'admin', '2017-08-01 07:21:01', '::1'),
(180, 'admin', '2017-08-01 14:46:40', '::1'),
(181, 'admin', '2017-08-03 15:00:13', '::1'),
(182, 'admin', '2017-08-03 16:34:18', '::1'),
(183, 'admin', '2017-08-03 17:07:24', '::1'),
(184, 'admin', '2017-08-03 17:09:15', '::1'),
(185, 'admin', '2017-08-03 17:59:27', '::1'),
(186, 'admin', '2017-08-04 08:00:14', '::1'),
(187, 'admin', '2017-08-05 12:50:13', '::1'),
(188, 'admin', '2017-08-05 16:11:58', '::1'),
(189, 'admin', '2017-08-06 14:22:58', '::1'),
(190, 'admin', '2017-08-06 15:07:52', '::1'),
(191, 'admin', '2017-08-06 15:08:10', '::1'),
(192, 'admin', '2017-08-06 15:16:34', '::1'),
(193, 'admin', '2017-08-07 13:37:32', '::1'),
(194, 'admin', '2017-08-08 15:00:41', '::1'),
(195, 'admin', '2017-08-08 15:57:02', '::1'),
(196, 'admin', '2017-08-09 16:20:28', '::1'),
(197, 'admin', '2017-08-10 14:18:07', '::1'),
(198, 'admin', '2017-08-11 16:15:47', '::1'),
(199, 'admin', '2017-08-11 23:24:06', '::1'),
(200, 'admin', '2017-08-12 04:00:29', '::1'),
(201, 'admin', '2017-08-13 03:43:29', '::1'),
(202, 'admin', '2017-08-13 08:40:47', '::1'),
(203, 'admin', '2017-08-13 11:42:08', '::1'),
(204, 'admin', '2017-08-13 13:33:51', '::1'),
(205, 'admin', '2017-08-13 14:08:37', '::1'),
(206, 'admin', '2017-08-13 15:57:39', '::1'),
(207, 'admin', '2017-08-13 22:30:47', '::1'),
(208, 'admin', '2017-08-14 13:26:16', '::1'),
(209, 'admin', '2017-08-14 15:44:47', '::1'),
(210, 'admin', '2017-08-16 14:15:52', '::1'),
(211, 'admin', '2017-08-17 07:17:18', '::1'),
(212, 'admin', '2017-08-19 13:14:48', '::1'),
(213, 'admin', '2017-08-20 15:24:45', '::1'),
(214, 'admin', '2017-08-21 13:14:00', '::1'),
(215, 'admin', '2017-08-23 13:20:27', '::1'),
(216, 'admin', '2017-08-25 14:58:49', '::1'),
(217, 'admin', '2017-08-26 15:08:56', '::1'),
(218, 'admin', '2017-09-02 07:06:35', '::1'),
(219, 'admin', '2017-09-02 07:10:41', '::1'),
(220, 'admin', '2017-09-03 15:23:44', '::1'),
(221, 'admin', '2017-09-08 07:56:38', '::1'),
(222, 'admin', '2017-09-09 10:44:17', '::1'),
(223, 'admin', '2017-09-10 13:26:24', '::1'),
(224, 'admin', '2017-09-15 14:04:34', '::1'),
(225, 'admin', '2017-09-15 14:48:00', '::1'),
(226, 'admin', '2017-09-15 16:11:58', '::1'),
(227, 'admin', '2017-09-15 16:14:32', '::1'),
(228, 'admin', '2017-09-15 16:15:25', '::1'),
(229, 'admin', '2017-09-16 13:26:05', '::1'),
(230, 'admin', '2017-09-19 16:08:59', '::1'),
(231, 'admin', '2017-09-23 13:39:30', '::1'),
(232, 'admin', '2017-09-23 14:09:23', '::1'),
(233, 'admin', '2017-09-23 19:16:36', '::1'),
(234, 'admin', '2017-09-29 13:45:03', '::1'),
(235, 'admin', '2017-09-30 15:06:53', '::1'),
(236, 'admin', '2017-10-02 15:54:16', '::1'),
(237, 'admin', '2017-10-02 16:13:12', '::1'),
(238, 'admin', '2017-10-13 14:54:53', '::1'),
(239, 'admin', '2017-10-16 14:14:39', '::1'),
(240, 'admin', '2017-10-19 14:48:17', '::1'),
(241, 'admin', '2017-10-20 13:43:15', '::1'),
(242, 'admin', '2017-10-20 14:46:37', '::1'),
(243, 'admin', '2017-10-21 14:54:44', '::1'),
(244, 'admin', '2017-10-26 15:47:33', '::1'),
(245, 'admin', '2017-10-30 14:18:48', '::1'),
(246, 'admin', '2017-11-01 14:31:16', '::1'),
(247, 'admin', '2017-11-04 14:15:16', '::1'),
(248, 'admin', '2017-11-04 16:54:05', '::1'),
(249, 'admin', '2017-11-05 15:38:19', '::1'),
(250, 'admin', '2017-11-07 10:31:59', '::1'),
(251, 'admin', '2017-11-07 13:29:54', '::1'),
(252, 'admin', '2017-11-08 03:54:59', '::1'),
(253, 'admin', '2017-11-08 15:24:32', '::1'),
(254, 'admin', '2017-11-09 14:34:10', '::1'),
(255, 'admin', '2017-11-10 14:02:36', '::1'),
(256, 'admin', '2017-11-12 13:10:57', '::1'),
(257, 'admin', '2017-11-13 14:31:35', '::1'),
(258, 'admin', '2017-11-21 15:01:47', '::1'),
(259, 'admin', '2017-11-21 15:05:50', '::1'),
(260, 'admin', '2017-11-23 15:02:40', '::1'),
(261, 'admin', '2017-11-23 16:01:28', '::1'),
(262, 'admin', '2017-11-23 16:28:03', '::1'),
(263, 'admin', '2017-11-23 17:52:04', '::1'),
(264, 'admin', '2017-11-23 17:53:58', '::1'),
(265, 'admin', '2017-12-02 15:27:32', '::1');

--
-- Dumping data for table `ms_bagian`
--

INSERT INTO `ms_bagian` (`kode_bagian`, `nama`, `userid`, `recdate`) VALUES
('B01', 'BAGIAN 01', 'admin', '2017-08-05'),
('B02', 'BAGIAN 02', 'admin', '2017-08-05'),
('B03', 'BAGIAN 03', 'admin', '2017-08-05');

--
-- Dumping data for table `ms_banksoal`
--

INSERT INTO `ms_banksoal` (`id_soal`, `id_matpal`, `tingkat`, `soal`, `jwb_a`, `jwb_b`, `jwb_c`, `jwb_d`, `jwb_benar`, `userid`, `recdate`) VALUES
(1, 'MP04', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'd', 'admin', '2017-12-02 00:00:00'),
(2, 'MP02', 2, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'a', 'admin', '2017-12-02 00:00:00'),
(4, 'MPEK', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'b', 'admin', '2017-12-02 00:00:00'),
(5, 'MP02', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'd', 'admin', '2017-12-02 00:00:00'),
(6, 'MP01', 2, 'Mana jawaban yang benar?!!', 'ini jawaban yang benar!!', 'ini juga jawaban yang benar!!', 'a dan b benar!!', 'semua salah!!', 'c', 'admin', '2017-12-02 00:00:00'),
(7, 'MP05', 4, 'asfas', 'asfas', 'asf', 'asf', 'asf', 'b', 'admin', '2017-12-02 00:00:00');

--
-- Dumping data for table `ms_bidang_study`
--

INSERT INTO `ms_bidang_study` (`id_bidang`, `nama_bidang`, `kategori`, `userid`, `recdate`) VALUES
('BS01', 'IPA', 'UTAMA', 'admin', '2017-08-19 00:00:00'),
('BS02', 'IPS', 'UTAMA', 'admin', '2017-08-19 00:00:00'),
('BS03', 'ILMU PASTI', 'UTAMA', 'admin', '2017-08-13 00:00:00'),
('BSSORE01', 'PELAJARAN SORE', 'SORE', 'admin', '2017-08-19 00:00:00'),
('KTBSLF', 'KITAB SALAF', 'KITAB', 'admin', '2017-09-23 00:00:00');

--
-- Dumping data for table `ms_donatur`
--

INSERT INTO `ms_donatur` (`id_donatur`, `nama_donatur`, `alamat`, `telpon`, `kategori`, `userid`, `recdate`) VALUES
(3, 'DONATUR34', 'JALAN33', '03454578', 'AITAM_ISLAH ', 'admin', '2017-09-16 00:00:00'),
(4, 'DONATUR4', 'ALAMAT4', '0545454', 'AITAM_AR_RAHMAH', 'admin', '2017-09-16 00:00:00');

--
-- Dumping data for table `ms_fisik_santri`
--

INSERT INTO `ms_fisik_santri` (`no_registrasi`, `gol_darah`, `tinggi_badan`, `berat_badan`, `khitan`, `kondisi_pendidikan`, `ekonomi_keluarga`, `situasi_rumah`, `dekat_dengan`, `hidup_beragama`, `pengelihatan_mata`, `kaca_mata`, `pendengaran`, `operasi`, `sebab`, `kecelakaan`, `akibat`, `alergi`, `thn_fisik`, `kelainan_fisik`) VALUES
('T38170001', 'A', 160, 55, 'SUDAH', 'SEDANG', 'CUKUP', 'PERKAMPUNGAN', 'PASAR', 'BAIK', 'BAIK', 'TIDAK', 'BAIK', 'TIDAK', '-', 'TIDAK', '-', '-', 2017, '-'),
('T3817002', 'A', 345, 345, 'SUDAH', 'KETAT', 'MAMPU', 'PERKOTAAN', 'MASJID', 'BAIK', 'BAIK', 'TIDAK', 'BAIK', 'TIDAK', '34534', 'TIDAK', '34534', '34543', 2017, '345345'),
('CAArray170001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2017, NULL),
('T39170014', 'A', 1, 1, 'SUDAH', 'KETAT', 'MAMPU', 'PERKOTAAN', 'MASJID', 'SEDANG', 'BAIK', 'TIDAK', 'BAIK', 'TIDAK', '1', 'TIDAK', '1akibat', 'alergi1', 0000, 'kelainan_fisik1'),
('T39170013', 'A', 1, 1, 'SUDAH', 'KETAT', 'MAMPU', 'PERKOTAAN', 'MASJID', 'SEDANG', 'BAIK', 'TIDAK', 'BAIK', 'TIDAK', '1', 'TIDAK', '1akibat', 'alergi1', 2007, 'kelainan_fisik1'),
('A39170002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('CT39170027', 'A', 324, 234, 'SUDAH', 'KETAT', 'MAMPU', 'PERKOTAAN', 'MASJID', 'SEDANG', 'BAIK', 'TIDAK', 'BAIK', 'TIDAK', '23423', 'TIDAK', '423', '234234', 2017, '234'),
('CT39170028', 'A', 234, 234, 'SUDAH', 'KETAT', 'MAMPU', 'PERKOTAAN', 'MASJID', 'BAIK', 'BAIK', 'TIDAK', 'BAIK', 'TIDAK', '4234', 'TIDAK', '234', '234234', 2017, '23423'),
('A39170001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('A3917002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Dumping data for table `ms_gedung`
--

INSERT INTO `ms_gedung` (`kode_gedung`, `nama`, `userid`, `recdate`) VALUES
('GD02', 'GEDUNG 02', 'admin', '2017-08-05'),
('GD03', 'GEDUNG 03', 'admin', '2017-08-05'),
('GD01', 'GEDUNG 01', 'admin', '2017-08-05');

--
-- Dumping data for table `ms_guru`
--

INSERT INTO `ms_guru` (`id_guru`, `no_reg`, `nama_lengkap`, `nama_arab`, `no_ptk`, `nig`, `tempat_lahir`, `tanggal_lahir`, `jns_kelamin`, `no_kk`, `no_ktp`, `kewarganegaraan`, `alamat`, `no_telepon`, `email`, `status_nikah`, `nama_ayah`, `nama_ibu`, `nama_pasangan`, `tgl_pasangan`, `jml_anak`, `akademik`, `status`, `pendidikan_terakhir`, `mengajar_start`, `mengajar_end`, `id_alumni`, `no_sk`, `tgl_sk`, `file_sk`, `gapok`, `masa_abdi`, `sertifikasi`, `file_sertifikasi`, `materi_diampu`, `userid`, `recdate`, `status_aktif`, `is_delete`) VALUES
(1, NULL, 'توفيق', 'توفيق', '', '', '', NULL, 'l', '', 'dd', '', '', '', '', NULL, '', '', '', NULL, 0, '', 's', NULL, NULL, NULL, 0, '', NULL, NULL, NULL, 0, '', NULL, '', 'admin', '2017-09-01 06:30:20', 1, 0),
(2, NULL, 'gfdsg', 'توفيق', '', '', '', NULL, 'l', '', 'gg', '', '', '', '', NULL, '', '', '', NULL, 0, '', 's', NULL, NULL, NULL, 0, '', NULL, NULL, NULL, 0, '', NULL, '', 'admin', '2017-09-01 06:37:36', 1, 0),
(3, NULL, 'gfdsg', 'توفيق', '', '', '', NULL, 'l', '', 'gg', '', '', '', '', NULL, '', '', '', NULL, 0, '', 's', NULL, NULL, NULL, 0, '', NULL, NULL, NULL, 0, '', NULL, '', 'admin', '2017-09-01 06:37:50', 1, 0),
(4, NULL, 'PRKBeZX7uD', 'هدايت', 'B8WqLmYZaa', '4qXQYyrzhL', 'IRKayZWK9M', '0000-00-00', 'l', 'ARlU4cZX6M', 'JdDikx85eC', 'OVoy48DJRO', 'P2nj3t8unw', 'AenmE7INaw', '2F9Kx8KKTv', NULL, 'Sj6kYalvuA', 'vFi6ePdl8b', 'sYp2uz9PDb', '0000-00-00', 0, '5K8uLXuSQX', 's', NULL, '0000-00-00', '0000-00-00', 0, 'AmX1i14VlV', '0000-00-00', NULL, NULL, 0, 'aDbK1bon19', NULL, '353TQimwoU', 'admin', '2017-09-01 09:38:21', 1, 0),
(5, NULL, 'RoGA9ca34y', 'IV6AyZ5rKt', 'WJJvfk6TIH', 'ew7Jtadsro', 'KwAkP9QuvA', '0000-00-00', 'l', 't0nifm1TTl', 'DMRCpossh1', '5cieQEhvrz', 'OqYkE1uXMr', 'yQJnN14XrJ', 'ctucLndjtg', NULL, '4mOgCXQany', 'kx9MwrYFQd', 'UCZiLlk4Xr', '2017-09-01', 2, 'EralqZGcCw', 'm', NULL, '2017-09-01', '2017-09-01', 0, 'taRPDvA4Lw', '2017-09-25', NULL, NULL, 8, '6jD84jaN8W', NULL, 'wrdwsdya9h', 'admin', '2017-09-01 09:43:11', 1, 0),
(6, NULL, 'RoGA9ca34y', 'IV6AyZ5rKt', 'WJJvfk6TIH', 'ew7Jtadsro', 'KwAkP9QuvA', '2017-09-11', 'l', 't0nifm1TTl', 'DMRCpossh1', '5cieQEhvrz', 'OqYkE1uXMr', 'yQJnN14XrJ', 'ctucLndjtg', NULL, '4mOgCXQany', 'kx9MwrYFQd', 'UCZiLlk4Xr', '2017-09-01', 2, 'EralqZGcCw', 'm', NULL, '2017-09-01', '2017-09-01', 0, 'taRPDvA4Lw', '2017-09-25', NULL, NULL, 8, '6jD84jaN8W', NULL, 'wrdwsdya9h', 'admin', '2017-09-01 09:43:38', 1, 0),
(7, NULL, 'kPcDgttpQc', 'JoRJexVhAf', 'moBNEqlYST', 'I3RhlZJJPW', 'jBi0ZyWyKZ', '2017-09-01', 'l', 'UagvwQRiOF', '9xeBE7bvwQ', '2QHQaPw2Do', '77Rfw0Btiw', '8Acc5LH5NJ', 'V2O0ODs067', NULL, 'xpdMCTz8ye', 'Wy3UeEGHPm', 'x6tiSiMZFJ', '2017-09-01', 0, 'ui4b3NV0M4', 'm', NULL, '2017-09-01', '2017-09-01', 0, '38ICHxoezf', '2017-09-01', NULL, NULL, 6, 'kiddh1TUtx', NULL, 'hf3FQsFeEC', 'admin', '2017-09-01 18:08:14', 1, 0),
(8, NULL, 'kalakdf', 'هنا', '', '', '', NULL, 'l', '', '90000', '', '', '', '', NULL, '', '', '', NULL, 0, '', 's', NULL, NULL, NULL, 0, '', NULL, NULL, NULL, 0, '', NULL, '', 'admin', '2017-09-01 18:11:30', 1, 0),
(9, NULL, 'هنا', 'هنا', '', '', '', NULL, 'p', '', '90000', '', '', '', '', NULL, '', '', '', NULL, 0, '', 's', NULL, NULL, NULL, 0, '', NULL, NULL, NULL, 0, '', NULL, '', 'admin', '2017-09-01 18:11:48', 1, 0),
(10, 12, 'J8E9vsZ4EW', 'QRD6DH2fg0', 'mivhemZKSV', 'eBTP1OQD0m', 'L3ImTJ6KB6', NULL, 'l', 'qJgywsY3Du', '85ZoWRXWgR', 'HJpH8G7X4f', 'Qe4E7kcfrJ', 'HEXdsu6VV0', 'RwdK3mv29a', NULL, '1gLnuVXnOP', 'uiqF65Sopc', 'rxEVykeELM', NULL, 0, 'Z0UK2bNrUx', '', NULL, NULL, NULL, 0, '0L9a96Xp1z', NULL, NULL, NULL, 0, 'qFgBGPdSlW', NULL, 'gB5ZWHcNRt', 'admin', '2017-09-02 11:49:05', 1, 0),
(11, 13, 'A63wzcbBLN', 'wQgzHuafQq', 'nTPpcz6Jcz', 'de3yXy3P9P', 'HPDZlrNliz', NULL, 'l', 'ySa2fg9wis', 'K5IF4nRBTe', 'IJYmhs45O9', 'DOMVJOkSwj', 'RwtJSI8loO', 'ytPlGscw30', NULL, 'UNO7pcxcrr', 'fLzqxzVdUO', 'MvFMvHpi1k', NULL, 0, 'zJjVWlXtGw', '', NULL, NULL, NULL, 0, 'vvbmYFM2Ui', NULL, NULL, NULL, 0, '3Tq7GSIFbN', NULL, 'PuRJyFAbrS', 'admin', '2017-09-02 11:50:15', 1, 0),
(12, 14, 'j6J5HM2dTB', 'o0N2AuqxS8', '4XI5InSPDw', 'kV0KJxbebu', 'ZUhMLMxN5y', NULL, 'l', 't2KdeFt6q7', 'kQAkr5rRHM', 'BSiOx5swRV', 'KcoBRyYvGE', 'ADdfMipdip', 'jU3Igy8bhn', NULL, 'Xv5rU8uuQA', 'UQT9jeAwff', 'DApuZAKSFU', NULL, 0, 'mEMfxxQVw5', '', NULL, NULL, NULL, 0, '19oO8B3CUX', NULL, NULL, NULL, 0, 'sM0sB2bWE5', NULL, 's2ki9J2GWY', 'admin', '2017-09-02 11:52:20', 1, 0),
(13, 15, 'eNumxD5dAS', 'adYO7SkUV3', 'jm023lv4wM', 'qyIlvyULjh', 'C1lhSR61vd', NULL, 'l', 'ESK3W3CeBW', 'd57ZuaIwkA', '8hzMlUdT2U', 'to8mxuqoXP', 'LDxrlP7jag', 'YTFQoz9kJi', NULL, 'R86XHjLKtT', 'YmcFK7c1fz', 'fXqWd0r3yE', NULL, 0, 'lWb4q0MdCW', '', NULL, NULL, NULL, 0, 'HGWVBYMmka', NULL, NULL, NULL, 0, 'd4WrClj1Wl', NULL, 'Hoaz6OWzV5', 'admin', '2017-09-02 11:53:03', 1, 0),
(14, 16, 'WvP7taaoyN', 'WPCGU3Nmcd', '8TZVBlnBCn', '899KIDO0G3', 'I5OBjbOjU2', NULL, 'l', '0szvFYURiB', 'BxfD0Yj38F', 'od2sDYEXzI', '9rjdkjK6Kg', 'Ibu1EdP2Ak', 'Tohdl7h2ta', NULL, 'SdkmBDF1bb', 'BGLjN3UWNd', 'XroHMrRAZ0', NULL, 5, 'KEDilw1Sm4', '', NULL, NULL, NULL, 0, 'ptHDOiPNuo', NULL, NULL, NULL, 0, 'uqCsPTACNv', NULL, 'JsElC25us3', 'admin', '2017-09-02 11:53:28', 1, 0),
(15, 17, 'fJUEsgd5eu', 'fT0fMSFBE9', 'VUz3T1WUPX', 'WKyWbXelyD', 'FGbkWouRkl', NULL, 'l', 'JWFPa4O22s', 'UtakwAwHqh', 'L8izBXgesM', 'l5MHdxjypz', '9opsaNjRBV', 'a3jVfylZbQ', 's', '5ioTZ8NLZU', 'Ncw8pdNCtC', 'Vn4gBLwCY5', NULL, 0, '5Say2piHF9', 'Pengabdian', NULL, NULL, NULL, 0, 'ksiEQ0LZgR', NULL, NULL, NULL, 7, 'r5aVzLS5tR', NULL, 'ZUv6Cl8ehR', 'admin', '2017-09-02 12:16:53', 1, 0),
(16, 18, 'xI4fGl1RAG', 'YK0tvS1afR', 'raAS91Uu9I', 'sCsMKfgxyX', 'CM1WUAV4aI', NULL, 'l', 'Wu68X7LVFV', 'HMS8tAI7lv', 'VaebMbk7Pd', 'I3Q8L0seRT', 'wVraIFgpfz', 'Dq5px2CrMz', 's', 'QkRiipwcrb', 'ZNvCkvGuJM', '2v3krFEOGs', NULL, 2, '3tH6JuF0nl', '', NULL, NULL, NULL, 0, 'CvNPCzSlXY', NULL, NULL, NULL, 0, 'dSYayfL0XE', NULL, '7cTV0Z4DsJ', 'admin', '2017-09-02 12:19:01', 1, 0),
(17, 19, 'n9HKeD9ezn', 'fqXSzHqRDU', 'Cv8JapoHJX', 'D7BkZ0FRZX', 'GZPVFoOBOv', NULL, 'l', 'u4MeCCh5WN', 'EPGiJRMqgL', 'DuZoJTAqpX', 'hV1n8WghXv', 'I8lJUBtSVg', 'gmCiTrZhoC', 's', 'ncmPrRRCSD', 'rJVviBrtH4', 'O2JC4skKh7', NULL, 0, 'p1KPgItzsZ', '', NULL, NULL, NULL, 0, 'SEEhmNfsIo', NULL, NULL, NULL, 0, 'eq5KBVAgeT', NULL, 'CMHd8lr2do', 'admin', '2017-09-02 12:32:27', 1, 0),
(18, 20, 'AWlVGXAl8d', 'iB8aKEHqJW', 'rOf65FBEEU', 'lkpnWp4Q0u', '3kp5R4fMYa', NULL, 'l', '7ImNdd2sst', 'lJyS2ZVPfh', 'iAQUPt59uH', 'ZYo6wjmgRw', '3nbpbmVFkN', 'seXAZ5qZcG', 's', 'etsni8YnqX', 'Lomir1WfOr', 'oO0cVya79Q', NULL, 2, 'sM6Rx2qswo', '', NULL, NULL, NULL, 0, 'HWskjj1LJb', NULL, NULL, NULL, 0, 'oYLT9KuDOV', NULL, 'Ribuol0cUj', 'admin', '2017-09-02 12:33:51', 1, 0),
(19, NULL, 'V7yflphhKf', 'OgZVGnrBZT', 'Yj10zJilbu', 'Y5v2RyxoZ2', 'R5NtXkR4AZ', '2017-09-26', 'l', 'DLfa7PloA4', 'j6Jv2p3qn9', 'Fl9EmpY367', 'sMyyzxVLHa', 'vXK9TUBsXH', 'QCZgRR5VtO', 's', 'YsXJLmLM2n', '7JAzwjmaxr', 'STdGltIlvf', NULL, 0, 'gPLxS0EzIc', 's', NULL, NULL, NULL, 24, 'FdKhgYiRMP', NULL, NULL, NULL, 0, 'OSCobSbbqE', NULL, 'yWJ7jjMzUo', 'admin', '2017-09-02 18:40:54', 1, 0),
(20, 21, 'rGeM252l2k', 'sgOCqVM8tk', 'ZQoiykN4Tx', '0MMYH8NGNR', 'GJaCwKreZ2', NULL, 'l', 'GFKdNyz1jq', 'VzVgszSFBg', '2OC3EQBRmc', 'cikKpmc6rf', 'DJcSsA2Jjz', '1prxbnggfs', 's', 'qIJD7F5Eoy', 'dT0YAg9PiI', 'tM1HnuQLnB', NULL, 0, '3gmYYqBG36', '', NULL, NULL, NULL, 8, 'uGInQmnIMD', NULL, NULL, NULL, 0, 'daVPkL7I1B', NULL, 'gfRHUJais9', 'admin', '2017-09-02 18:42:26', 1, 0),
(21, 22, '0GI3LgEfhl', 'IdMTkxWKzE', 'Fmg6AdltZB', 'WnqdoS0HrM', 'lGcECJZzpL', NULL, 'l', '9oq1VxeQTn', 'MN3DJJhyP3', 'QzBII9JXE8', '9VqYveVI8b', '3gvTuKDjv2', 'xHq0mvNGTX', 's', 'CR0TZXsbmf', 'ppawKZCGix', 'DzXItjYtqq', NULL, 0, '5gdo5aGMt5', '', NULL, '2017-09-01', NULL, 0, 'e7Unusf9c0', NULL, NULL, NULL, 0, 'cxmPJFkuML', NULL, 'HA7XAGczon', 'admin', '2017-09-02 18:46:40', 1, 0),
(22, 23, 'nPYjlM7JJc', '0btbh8nsOd', 'wqMR4CCkmx', 'X07iEoPYZI', 'ScNKpSqBUi', NULL, 'l', 'jKDkhz4zbF', '6HXrEwLMHh', 'xW6QZ1tILH', 'z5JdxkBVxB', 'tv4C4oy2FX', 'MGDABhQUGi', 's', 'yooVJ7vKn8', 'opHu2doPF2', '2Spnj4xbUH', NULL, 0, '88GWwyyhM5', '', NULL, '2017-09-01', NULL, 0, '87eu9SoPOO', NULL, NULL, NULL, 0, 'wXqNFmTiEi', NULL, 'sTf87yqjwP', 'admin', '2017-09-02 18:54:38', 1, 0),
(23, 24, 'IXdsmmW1NJ', 'oepli1gjzZ', 'h8XGl3ArbV', 'dmCtruZWph', 'INmYLx94zI', NULL, 'l', 'nUxO6v3sYv', 'Gpt1UmASmO', 'bkXgkBd9Eq', 'U975mwY6ku', '7MNPkqFvkQ', 'Ds9qJlGjCc', 's', 'GrZ02Ojwsj', 'oU8o21R18h', 'EjfGHKV1gB', NULL, 0, 'DhlEve8l8U', '', NULL, '2017-09-01', NULL, 0, 'X6Gw9GOD56', NULL, NULL, NULL, 0, 'pj5d0Vcl0H', NULL, '3n3egR4Si3', 'admin', '2017-09-02 19:01:30', 1, 0),
(24, 25, 'MiqCxnxjsz', 'uFpy7ZpLvd', 'TbAKrHisHs', 'hoI26xet9b', 'xzqxVbxJhc', NULL, 'l', 'e3GaBDqVQS', 'dmYW4gxO3B', 'fYJRZBT2IQ', 'vAD3GRI3sP', 'sLjYkGGA9d', 'lxI1reL7FO', 's', 'ln7t4mpGSG', 'VEMWNXxi7Y', 'CbFX5tmCZn', NULL, 0, 'QYwvas8VXR', '', NULL, '2017-09-01', NULL, 0, '2qu8cqbtI1', NULL, NULL, NULL, 0, 'BJnZ0kuuur', NULL, 'PZQv7a9nzF', 'admin', '2017-09-02 19:01:53', 1, 0),
(25, 26, 'XeIJoIqfcP', 'vDjCTDdKCl', 'nTiaIDNSr1', 'WDHtVIgrDG', 'NMOmxabasM', NULL, 'l', '2P9Yhh63oA', '2PIGuKQQaV', '33svK1d5Co', 'FEQwLA5FGi', 'Zm6m2z2ZXu', 'wHUmxf1gOV', 's', 'eEU0ZhgDYk', 'rNPYgO5HBk', 'YqlmGpuL3R', NULL, 2, 'GrlPPgobZA', '', NULL, '2017-09-01', NULL, 0, 'l3T2JDzWKv', NULL, NULL, NULL, 0, 'f45cAaZYqo', NULL, 'edTbhR82oF', 'admin', '2017-09-02 19:24:43', 1, 0),
(26, 27, 'XeIJoIqfcP', 'vDjCTDdKCl', 'nTiaIDNSr1', 'WDHtVIgrDG', 'NMOmxabasM', NULL, 'l', '2P9Yhh63oA', '2PIGuKQQaV', '33svK1d5Co', 'FEQwLA5FGi', 'Zm6m2z2ZXu', 'wHUmxf1gOV', 's', 'eEU0ZhgDYk', 'rNPYgO5HBk', 'YqlmGpuL3R', NULL, 2, 'GrlPPgobZA', '', NULL, '2017-09-01', NULL, 0, 'l3T2JDzWKv', NULL, NULL, NULL, 0, 'f45cAaZYqo', NULL, 'edTbhR82oF', 'admin', '2017-09-02 19:26:57', 1, 0),
(27, 28, 'XeIJoIqfcP', 'vDjCTDdKCl', 'nTiaIDNSr1', 'WDHtVIgrDG', 'NMOmxabasM', NULL, 'l', '2P9Yhh63oA', '2PIGuKQQaV', '33svK1d5Co', 'FEQwLA5FGi', 'Zm6m2z2ZXu', 'wHUmxf1gOV', 's', 'eEU0ZhgDYk', 'rNPYgO5HBk', 'YqlmGpuL3R', NULL, 2, 'GrlPPgobZA', '', NULL, '2017-09-01', NULL, 0, 'l3T2JDzWKv', NULL, NULL, NULL, 0, 'f45cAaZYqo', NULL, 'edTbhR82oF', 'admin', '2017-09-02 20:10:06', 1, 0),
(28, 29, 'XeIJoIqfcP', 'vDjCTDdKCl', 'nTiaIDNSr1', 'WDHtVIgrDG', 'NMOmxabasM', NULL, 'l', '2P9Yhh63oA', '2PIGuKQQaV', '33svK1d5Co', 'FEQwLA5FGi', 'Zm6m2z2ZXu', 'wHUmxf1gOV', 's', 'eEU0ZhgDYk', 'rNPYgO5HBk', 'YqlmGpuL3R', NULL, 2, 'GrlPPgobZA', '', NULL, '2017-09-01', NULL, 0, 'l3T2JDzWKv', NULL, NULL, NULL, 0, 'f45cAaZYqo', NULL, 'edTbhR82oF', 'admin', '2017-09-02 20:13:24', 1, 0),
(29, 30, 'Tj8pBY8bjm', 'dG0cyePhd8', 'L0qEr6r7Gx', 'tGnRdv04cG', 'V1cEabUzED', NULL, 'l', '9WQBMYQHVD', 'KTiooez6sn', 'OxhTemsi3l', 'JNACUGxTV8', 'rLv5ywSnP4', '4SdTzoYbP7', 's', 'MLLYhY33iZ', 'gcOjTOnSkX', 'J4cA9ilelC', NULL, 8, 'r2FF1hDsNj', '', NULL, '2017-09-01', NULL, 0, 'BiJGCQY8bs', NULL, NULL, NULL, 6, '3kF51xi0F2', NULL, 'mdlBmkh8Hu', 'admin', '2017-09-02 20:41:58', 1, 0),
(30, 31, 'Tj8pBY8bjm', 'dG0cyePhd8', 'L0qEr6r7Gx', 'tGnRdv04cG', 'V1cEabUzED', NULL, 'l', '9WQBMYQHVD', 'KTiooez6sn', 'OxhTemsi3l', 'JNACUGxTV8', 'rLv5ywSnP4', '4SdTzoYbP7', 's', 'MLLYhY33iZ', 'gcOjTOnSkX', 'J4cA9ilelC', NULL, 8, 'r2FF1hDsNj', '', NULL, '2017-09-01', NULL, 0, 'BiJGCQY8bs', NULL, NULL, NULL, 6, '3kF51xi0F2', NULL, 'mdlBmkh8Hu', 'admin', '2017-09-02 20:42:55', 1, 0),
(31, 32, 'Tj8pBY8bjm', 'dG0cyePhd8', 'L0qEr6r7Gx', 'tGnRdv04cG', 'V1cEabUzED', NULL, 'l', '9WQBMYQHVD', 'KTiooez6sn', 'OxhTemsi3l', 'JNACUGxTV8', 'rLv5ywSnP4', '4SdTzoYbP7', 's', 'MLLYhY33iZ', 'gcOjTOnSkX', 'J4cA9ilelC', NULL, 8, 'r2FF1hDsNj', '', NULL, '2017-09-01', NULL, 0, 'BiJGCQY8bs', NULL, NULL, NULL, 6, '3kF51xi0F2', NULL, 'mdlBmkh8Hu', 'admin', '2017-09-02 20:43:15', 1, 0),
(32, 33, 'PGZah9obz6', 'iHiLpIJnkJ', 'OCx4WX9mXf', 'K6vZpUkRz2', 'D36i8svGrR', NULL, 'l', 'RpKwwGoVfu', 'jIGWUKAGpY', 'llcpNpZ0ki', '8vLplsEqwo', 'sYR5dNETKf', 'Oonea39TTG', 's', 'qQTLPrLrIO', '1y25yPMdlb', 'u5fcoOLhQc', NULL, 0, 'mJkkjcjUbj', '', 'w6Mzq0KbUl', '2017-09-01', NULL, 0, 'ptXJyqfq44', NULL, NULL, NULL, 0, 'UJgaFEEfZX', NULL, 'OY1fGiZXYb', 'admin', '2017-09-02 20:44:18', 1, 0),
(33, 34, 'VrHLUvNlJE', 'g1tLuvERmX', 'olkIYL9Jjc', 'Gw15JdLGqf', 'c435VNbZQu', NULL, 'l', '1NIFoLcHYG', 'zQiWdlgGOB', 'mO5DFV1tNH', 'cBfhYPjBbH', '6czolzfvd3', 'wqeCKvNajU', 's', 'WBfaUSQLdf', 'hTDAZ4Tvc7', 'YMRVW7XGyh', NULL, 0, '408AOELVwK', '', 'w6Mzq0KbUl', '2017-09-01', NULL, 0, 'cxryI8OuGh', NULL, NULL, NULL, 0, 'bGED0lPWGx', NULL, 'crdDDDCvkj', 'admin', '2017-09-02 20:45:34', 1, 0),
(36, 37, 'RsQjhbhkpz', 'yHMWVJrast', 'jiFQmYfBjt', '0LjABMNmas', '3CrGBVWVuo', NULL, 'l', '06MAffF29g', 'zlwRoX9Q4Q', 'R2cwsZeUkA', 'obBIBfiwGD', 'rQ5JyucIhP', 'uR7DLQ0Wdx', 's', 'IGKnzvf4We', 'YA5o8qxlVk', 'AwmSB0OY6Q', NULL, 0, 'NNH9HB5MYK', '', 'w6Mzq0KbUl', '2017-09-01', NULL, 0, 'ncXVEI11CS', NULL, NULL, NULL, 0, 'ghJW092XJ4', NULL, 'rxZshVah1a', 'admin', '2017-09-02 20:48:52', 1, 0),
(37, 38, 'qWNM1xd8hg', 'xCOJmJoTiq', 'M6AW8GMIcv', 'W5GOEscg1O', 'EIUYDBCk3Q', NULL, 'l', 'khW0MJ6utK', 'xKEWouwdIb', 'yhYDQ8uyMX', 'OUJam9D63F', 'RXjXlSSP5s', 'zEnKPrM9Z6', 's', 'TmNnI699ZR', 'IcgkAnDaZq', 'x7N4w7HqLY', NULL, 0, '0PfOO5rbcn', '', 'w6Mzq0KbUl', '2017-09-01', NULL, 0, 'RVAU1UAl8w', NULL, NULL, NULL, 0, 'AMYLPhMSRG', NULL, 'wIBxF8pOvN', 'admin', '2017-09-02 20:50:01', 1, 0),
(38, 39, '8ONhQk5b1R', 'xlgVgcPueU', 'uvRZWIfxqp', 'RTQ7kI9MTZ', 'avQgIIfCbf', NULL, 'l', '9eIpg6LZRI', 'IBrkwrs3H5', '6z3JJIO0M9', 'tZAPJOnD5B', 'MJZK3j7omo', 'CEVuzLkfYq', 's', '124qeu6pZt', 'zDMTtUzfFQ', 't2a7C8Y5vh', NULL, 0, 'xNcRMVTeKx', '', 'w6Mzq0KbUl', '2017-09-01', NULL, 0, 'Dd4lIu7mrj', NULL, NULL, NULL, 0, 'lguw1Ffbtk', NULL, 'CpNAoZGnmh', 'admin', '2017-09-02 20:50:57', 1, 0),
(39, 40, 'ip15cFQCMa', 'WvLTEwYfcR', 'YU6cqM2jXZ', 'z2Jt1nVDgS', 'feVfzv6V6W', NULL, 'l', 'c2CpGW7erF', 'w8vGSYynIL', '6BqcMFkEF2', 'sqC74I06ej', 'FkypIiyjZ7', 'SPd4ZAaVJc', 's', '81OAHXBDch', 'p5HgS7imit', 'HvJJJu9cf7', NULL, 0, 'GwbkweEnCK', '', NULL, NULL, NULL, 0, 'lzbBB9K8q2', NULL, NULL, NULL, 0, 'hkCbGGKnDc', NULL, '0pMGU0bcvZ', 'admin', '2017-09-03 05:11:03', 1, 0),
(40, 41, 'HjM31Et5sj', 'KHLXCTSmpx', 'MOEiy4HlVp', '25QT5gj797', 'mjAmUvW5fo', NULL, 'l', 'G4R1avh8PB', 'L1txdNYgeP', 'Uarn6gjs63', 'eDK94uZfmN', 'RbcyDFz2ML', 'vnoaMJcvNf', 's', 'Qj21CX4QZp', 'sGKjD87cyn', '5LdLtCjw82', NULL, 0, 'xND17UKYRK', '', NULL, NULL, NULL, 0, 'DOmQ0yr5kI', NULL, NULL, NULL, 0, '1WQfE59M9Y', NULL, 'GTS1PuwKvB', 'admin', '2017-09-03 05:14:07', 1, 0),
(41, 42, '0O5s6CZ3S3', 'FIx0etfLVq', 'WTb4jzKdRn', 'GzEeP5CaEG', 'ZMkx91rvhb', NULL, 'l', 'r7njpj4yer', 'OQ5OTNXj1z', '8qQ9zlQeTz', 'Li9oHH4IQE', 'MibveQcesW', 'cvsBo0gv7F', 's', 'RM8ZLpNcmY', 'c6qh4Mdokl', 'fI1esTBKZa', NULL, 0, 'XmIo5AN7bQ', '', NULL, NULL, NULL, 0, 'v7ruxbEFNV', NULL, NULL, NULL, 0, 'wr4nt2rGhE', NULL, 'dMYHmxr2UF', 'admin', '2017-09-03 05:14:22', 1, 0),
(42, 43, 'CTHgDUJRtB', 'VZeJufB31g', 'xNdRjl2di7', 'UIs5Dd9jQo', '2YWps1CiNt', NULL, 'l', 'F79PSFdu3f', 'q5n78UaC6B', 'IvCNkpsBEm', 'OGuJ0wmunQ', '706SyWNQAy', 'vjhJTBU0JM', 's', '0Bh2dH9EQ6', 'vf8bIxg8tv', 'VMmxyxEf74', NULL, 0, 'n6OaGrk3d4', '', NULL, NULL, NULL, 4, 'pzH3l2rfR2', NULL, NULL, NULL, 0, 'JF02Ert6Yi', NULL, 'sBVkav7TSd', 'admin', '2017-09-03 05:15:15', 1, 0),
(43, 44, 'UXJvzbiLdr', 'DyKvuUue6N', 'hQw4Enrgye', 'MZkIe5OeV4', '5uO5hm2Mhd', NULL, 'l', 'q5fKWDPKNi', 'x7azvXVxmv', 'fZQwTYb0Wd', 'TUSElTVWxr', 'U38dvv54u2', 'vRGwA2gLQw', 's', 'R87Q9JdyE8', 'MRVMwVwFGc', 'IAa6mj49Nw', NULL, 6, 'EfZQyGHwdu', '', NULL, NULL, NULL, 0, 'VUylRRhQDg', NULL, NULL, NULL, 0, 'k0Ez9oysLC', NULL, 'v98sSUn6zO', 'admin', '2017-09-03 05:15:26', 1, 0),
(44, 45, 'ibEbaLThz6', 'PhGNB7jomE', 'qxby6sdNzf', 'dRQYyBLQFR', 'LThzNMYV3m', NULL, 'l', 'thNNRctvU9', '6raQkzEO8k', 'DP0jxLtdpD', 'j6Xxpiujro', 'OC0WW7C3UQ', 'BqrnA9NGFw', 's', '2m5BEGO3Ph', '1JO8NrQvNX', 'HCGtHJcBTX', NULL, 0, 'Iw6iYpKtul', '', NULL, NULL, NULL, 0, 'rvpNsS2HrF', NULL, NULL, NULL, 0, '0KldQRnttB', NULL, 'Q1KERxJXpZ', 'admin', '2017-09-03 05:38:21', 1, 0),
(45, 46, 'ibEbaLThz6', 'PhGNB7jomE', 'qxby6sdNzf', 'dRQYyBLQFR', 'LThzNMYV3m', NULL, 'l', 'thNNRctvU9', '6raQkzEO8k', 'DP0jxLtdpD', 'j6Xxpiujro', 'OC0WW7C3UQ', 'BqrnA9NGFw', 's', '2m5BEGO3Ph', '1JO8NrQvNX', 'HCGtHJcBTX', NULL, 0, 'Iw6iYpKtul', '', NULL, NULL, NULL, 0, 'rvpNsS2HrF', NULL, NULL, NULL, 0, '0KldQRnttB', NULL, 'Q1KERxJXpZ', 'admin', '2017-09-03 05:38:52', 1, 0),
(46, 47, '4VnRILEkoa', 'bipm5I0trV', '6PqLevZRVS', '5t1n8pM47B', 'Ea9KNZB6fM', NULL, 'l', 'NmwC9J8NeW', 'XuGCR3Mh1W', 'SYuJH3w8lj', 'B9IhMr8Xkp', '7fiNLEf2Bu', 'p3U6czgfr5', 's', 'iYlplWNJ55', 'e9JeaZwH2Q', '1SNEurpHOD', NULL, 0, '186pQHzvbn', '', NULL, NULL, NULL, 0, 'z0qZvppFGg', NULL, NULL, NULL, 0, '6MN1T0rbbv', NULL, 'qDHUaNpTRT', 'admin', '2017-09-03 05:39:05', 1, 0),
(47, 48, 'PYopZXGkWx', 'FOFUF33J0D', 'vmUtmiumwZ', 'W632U6IrMP', 'q9SxZQYsG9', NULL, 'l', 'N2tK0xCB87', 'aHcA8K4SqJ', 'B5LDmP4trf', 't9bZ7Z9g9t', 'kAujxkLe7X', 'B9LfM3tsm7', 's', '3FBtrwV5Sw', 'k1uklYcfXq', 'xCtEXc3Z26', NULL, 1, '3j84awazEo', 'm', 'xQKzbZy2Hg', NULL, NULL, 0, 'APvqJHEKGp', NULL, NULL, NULL, 0, 'TbAlOmNTAK', NULL, 'cuCa9ngpGl', 'admin', '2017-09-03 06:23:23', 1, 0),
(48, 49, 'Oz4YFL5K0P', 'T2XkjqXAaH', 'yAIhKR7ThQ', 'WIJMggXbaZ', 'KO9vjGlr8E', NULL, 'l', 'AUXPRdv8oE', 'zzZMPzrVKq', 'bhfr8JLeJK', '2X3MLtDu8A', 'lLx5UUveMd', 'NTAjOel7pd', 's', '5Soz8sI3EV', 'Q06Bo2S9kw', 'rl8wmfrJPQ', NULL, 0, 'HBx79L5n49', 'm', 'xQKzbZy2Hg', NULL, NULL, 0, 'tebGf7KXC5', NULL, NULL, NULL, 0, 'BTo1NGg0e6', NULL, 'ovaXim5u13', 'admin', '2017-09-03 06:25:05', 1, 0),
(49, 50, 'LROZOnmMAN', 'JjJLY9cumt', 'mnQEyoECF1', '5AfKzn30R0', 'm20qNaBGh5', NULL, 'l', 'n0vOXRiyFd', '2OHVdksnpu', 'YadVOzGCSM', '45bXXLvPuf', 'vJAj5aKqrp', '1ASKqM2BAW', 's', 'VsgeSBaKNd', '4bBuONBaR3', 'hdemti51CH', NULL, 0, 'QSDuGucnAt', 'm', 'xQKzbZy2Hg', NULL, NULL, 0, 'bXRveHFaKv', NULL, NULL, NULL, 8, 'yNADoGx2Y5', NULL, 'gO7Tt0hl71', 'admin', '2017-09-03 06:28:16', 1, 0),
(50, 51, 'u5Vu3pauwn', 'IOmS1TEml9', 'sGUTuvJ7NJ', '4k5BVoBiAD', 'Hj1pyRqoHF', NULL, 'l', 'YlR6rvlei0', '96AnEql81Q', 'tzWwA7P533', 'JgI5WMUs1q', '6KGMSHqZo0', 'rkaHWu6Ndd', 's', 'xgd4r1CiqC', 'rGqP6kcsXh', 'fFJyER9jHm', NULL, 0, 'KCPvTTlTOt', 'm', 'xQKzbZy2Hg', NULL, NULL, 0, 'PW42mPEdEG', NULL, NULL, NULL, 8, 'viL0KBhO3T', NULL, '3OZLMn1AGm', 'admin', '2017-09-03 06:29:01', 1, 0),
(51, 52, 'ljMdkABEtC', 'YSNIIKdXVC', 'awGQuVDfRI', 'DQ8S3Afc7s', '5XQONnGw6J', NULL, 'l', '8C1aLENyLM', '9xIxOja9ty', '7nSLY8c5fJ', '5Yj0Okil0a', 'hxbSZn2hM7', 'QLKcSqh4OE', 's', 'aiqA9XtyXu', 'aK0OhConzj', 'KNaaOh325j', NULL, 0, '5DCgmOqXAk', 'm', 'xQKzbZy2Hg', NULL, NULL, 90, '34S0YN8zDs', NULL, NULL, NULL, 3, 'CrAJksb9kT', NULL, 'nwuJ2xNOpz', 'admin', '2017-09-03 06:32:21', 1, 0),
(52, 53, 'mgGlPsJnSj', '5jyry9IPQV', 'wLcXpSNC5Q', 'tOLfeozcpD', 'cFVsg2JctD', NULL, 'l', 'MrhPka3TT5', 'OV3cuo4FuK', 'R1GKHszyuM', 'GgU9thKAru', 'MHuVcxvyyR', 'D6xZDBLEkX', 's', 'AfCji932BW', 'gTqvrG6dvn', 'eFuey1IQYj', NULL, 0, 'AjCMrpKlZM', 'm', 'xQKzbZy2Hg', NULL, NULL, 0, 'Rp7kltu1uR', '2017-09-27', NULL, NULL, 0, 'DYJeb5sGkb', NULL, 'vGQ2Kme7hO', 'admin', '2017-09-03 06:47:12', 1, 0),
(53, 54, 'YvCv0GW8PI', 'R3pmN1Ddk2', 'chXne2Sl8r', 'uR9PDGU1yM', 'zHc09Crz4p', NULL, 'l', 'QHA1rwNLDS', 'DENObdQ1gn', '18D7wYhoyF', 'P56glJgpRL', 'brSyOql7AO', '0QwGZio5F4', 's', 'R0qAm1c6hk', 'qkIWDEDc84', 'Justcuie5E', NULL, 0, 'XhAVBu1kdR', 'm', 'xQKzbZy2Hg', NULL, NULL, 0, 'LuXoWi7IC7', '2017-09-27', '030917064843fnS', NULL, 0, 'WBJBD1msnG', '030917064843LYFu', 'hn0HwXpFpj', 'admin', '2017-09-03 06:48:43', 1, 0),
(54, 55, 'LKRvkHZo5C', 'rn7ICGkoSB', 'RAf2KH4WeE', 'isr3U6ahb3', 'eUYeo38oRv', NULL, 'l', 'DNXXTzV2r6', 'TfHvMhlJND', '6nRgw8ykB4', 'mE2x09rjvy', 'BVxQ97yBdq', 'CyptvFnT3O', 's', '8OONdOVYf2', 'zHV3GXBvMu', 'F8hiltcGT4', NULL, 0, 'gXV82iiahD', 'Pengabdian', NULL, NULL, NULL, 0, 'JZAXjKp6Hn', NULL, NULL, NULL, 0, 'M246yCL8uF', NULL, 'gAXnGYinsV', 'admin', '2017-09-03 09:45:57', 1, 0),
(55, 56, 'RfLviShSV1', '2RFe6cw8dB', 'fX6lc6PGcC', 'CoXn2HDNIP', 'MT2BoHotHv', NULL, 'l', '7bREuFH9Ee', 'TyKcmrdPcw', '6cxdLuyiOw', 'hz6Lbt2aVe', 'cqpSwGHoIH', 'AyPL0IFWIU', 's', 'CbIxBfvMt4', 'SlGJpRqTRh', 'yBbl6dxWpm', NULL, 0, 'x1qLUxx7Y2', 'Pengabdian', NULL, NULL, NULL, 0, '6G79cgT1bE', NULL, '030917094637ylB', NULL, 0, 'mHY2J9nEHF', '030917094637zHxH.pdf', 'oQIHv0HyX5', 'admin', '2017-09-03 09:46:37', 1, 0),
(56, 57, 'aK2Wj10eZE', 'lg5HZFKaGU', 'k7SZcg9Db3', 'G9Wuv6BGkV', 'HmircD4TsR', NULL, 'l', 'pgAaVlU9bJ', '8YEoIm9Qh5', 'XLsAN7OqLN', 'oKwkFAUMrm', 'OFzH3RVWLw', 'DqXwgzld6u', 's', '7pqHMBkxR5', '4i3XdcShxD', 'BGlhUK5VXH', NULL, 0, 'JJ5QcXHEX2', 'Pengabdian', NULL, NULL, NULL, 0, 'Qe8qCWZrQi', NULL, '0309170948076NV', NULL, 0, 'aachlfNkzt', '030917094807iDwk.pdf', 'K0W4RZcCCE', 'admin', '2017-09-03 09:48:07', 1, 0),
(57, 58, 'HSN46OZTGD', 'K0WpuN1zKE', 'w8hRbVnibS', 'i7U3MkYVw3', 'tkgSwUTBgP', NULL, 'l', 'yJeNwfyit8', 'od91W3dPZ9', '2wXZ73h0NM', 'JtQf0zJTrm', 'XmkazIY625', 'gfI1cr2REG', 's', 'YkK0du6hRo', 'ERz5jrW5Df', 'POfqYwhzN0', NULL, 0, 'IrvkuDudEw', 'Pengabdian', NULL, NULL, NULL, 0, '1ypwH0Okxu', NULL, '030917094911zy9x.pdf', NULL, 0, 'vKWqYs3HVm', '0309170949115JmI.pdf', 'eqyfI3VurI', 'admin', '2017-09-03 09:49:11', 1, 0),
(58, 59, 'vRnomZckBe', 'RJSgctkZNL', 'DKLUPrOQhL', 'cetvKHUKye', 'uORG4EDC7U', NULL, 'l', 'wLYwZqf3vE', 'YKhkRZDDID', 'ph9Wj0DjU5', 'YS7CEfZv4E', '5LMCl8PFNt', 'rDtXDcRMfx', 's', 'SL0JdZdFuN', 'QXUKP9l3tD', 'pnpsJmtTEz', NULL, 1, 'JkVrVEugtZ', 'Pengabdian', NULL, NULL, NULL, 0, 'G42OXqzblB', NULL, '030917095018vMDC.pdf', NULL, 0, 'VoI0HUDED9', '030917095018mj1h.pdf', 'y1aXb6aRkx', 'admin', '2017-09-03 09:50:18', 1, 0),
(59, 60, '62E0rZzE3O', 'BexnXfJmtT', 'yl1ebLWHkm', '6gGV4OXgCI', 'dDySHlOBer', NULL, 'l', 'phHlYfU44z', 'Cdv6tLqLlh', 'TDTdAiFuq4', 'hh7bwwPFoA', 'YVCteADRBv', 'EfB0vNTrtg', 's', 'Ejgg3IQ2dv', 'QJAlrUU42u', 'HBoEsgsyJG', NULL, 4, 'hxu6hfH70k', 'Pengabdian', '1FnEPoSsK1', NULL, NULL, 0, 'BsFqy3B8r0', NULL, '030917095356YLDa.pdf', NULL, 0, 'rEinKpSmkZ', '030917095356VGWY.pdf', 'PojVm1D6x4', 'admin', '2017-09-03 09:53:56', 1, 0),
(60, 61, 'yH4op0dRch', 'fezw1uY24C', '5wsS159oxO', 'lqEstRHv9M', 'f37kxSXhVe', NULL, 'l', 'iynbeSmUx4', 'ErbwO56grX', '5rHaDzDKil', '5Wro4yFYKQ', 'B505ZzPRq9', 'DwK2O5bjV9', 's', 'bGEvgiW8HJ', 'lGz31f8Z1t', 'sF5UaccHgG', NULL, 0, 'mo9ytwnlhy', 'Pengabdian', NULL, NULL, NULL, 0, 'qinETS7KSJ', NULL, NULL, 90000, 0, '8CTSsd1etD', NULL, 'L8n7zRODJb', 'admin', '2017-09-03 15:12:23', 1, 0),
(61, 62, 'juminem', 'fezw1uY24C', '5wsS159oxO', 'lqEstRHv9M', 'f37kxSXhVe', NULL, 'l', 'iynbeSmUx4', 'ErbwO56grX', '5rHaDzDKil', '', 'B505ZzPRq9', 'DwK2O5bjV9', 's', 'bGEvgiW8HJ', 'lGz31f8Z1t', 'sF5UaccHgG', NULL, 0, 'mo9ytwnlhy', 'Pengabdian', NULL, NULL, NULL, 0, 'qinETS7KSJ', NULL, '030917151302JdCK.', 90000, 0, '8CTSsd1etD', '0309171513023R4L.', 'L8n7zRODJb', 'admin', '2017-09-12 17:29:02', 1, 0),
(62, 63, 'NofGm9hhRL', 'BUxM1k7JRJ', 'dvm9CzC7Jj', '7wMRhMqKHz', 'O5rBYckuGZ', NULL, 'l', '6gRSXjvrSr', 'PTkH1SlLaW', 'ryceLnc3n4', '3ARidJpbky', 'RdAlMHWCQB', '6Nz0Mhd8ho', 's', '43tbwYmtQN', 'Xo5mUnWS6C', 'AseVnip3Bi', NULL, 0, 'WoTluqtb0h', '', NULL, NULL, NULL, 0, '5Eo5nww89i', NULL, '0809171502542aeI.', 0, 0, 'O6oB1KUvAd', '080917150254xszy.', 'PkY8RvjgLA', 'admin', '2017-09-08 15:02:54', 1, 1),
(63, 64, 'ZQ2ZoObv5m', 'xd7bvDsxHY', '5G9Azd2KnY', 'JMKoOneWdp', 'XO9bTHYo7R', NULL, 'l', '1eso1apOaU', 'RuEzf3lIN0', 'FE3MbAYs9o', 'gxZAtYPvNf', 'lGdVsAqDXy', 'yKWwnQzERG', 's', 'XKeVhwSxxX', '3FcVE7FnZr', 'iTKBixK1uk', NULL, 0, 'gZvGrjTcXX', '', NULL, NULL, NULL, 0, '9q5pe4uwNJ', NULL, '080917161029Qmom.', 0, 73, 'zgxc9sHIIJ', '080917161029UKjG.', 'Nt61W05SYZ', 'admin', '2017-09-08 16:10:29', 1, 0),
(64, 65, '0n6YoSKPvk', 'AkBmnvGCjV', 'rglumtkQkO', 'VquUAKL6yT', 'XbvLWzWtWv', NULL, 'l', 'I81cymw1Hr', 'GMEB1zZfiO', 'gXxdJaEsLu', 'HPo7gQuNAf', 'QmeMqk1BCj', 'Be1l9l2QzC', 's', '2JjXsE7YJc', 'jpDtqgOFcw', '6rLkktyuoR', NULL, 0, 'porq5VRPJY', '', NULL, NULL, NULL, 0, 'U6rFSW2AWK', NULL, '0809171611469D99.', 0, 0, 'TQA6NmoNJn', '080917161146Y9n9.', '8xz3A4CQwN', 'admin', '2017-09-08 16:11:46', 1, 0),
(65, 66, 'iWAM0ubBXB', 'XdrBEQNysh', 'BXVcaZuZjC', '97chcywcKO', 'esuFqF4xD1', '2017-09-20', 'l', 'm9LtT9nXV4', 'dL25OTx5ke', 'ZNtVVrgOST', 'aJRsW4Mr2S', 'O2NBM4JKnf', 'UDGjJa2WFU', 's', 'rN1ROj5CJz', '0JqxNauX3l', 'BEqDv2tUej', '2017-09-13', 1, 'WUkwWBuqe4', 'Pengabdian', 'kTa5ij32LL', NULL, NULL, 0, 'uOUjV3avyN', '2017-09-12', '090917125202b2kI.pdf', 0, 0, '0K3OMwkFHs', '0909171252025ciu.pdf', 'TTl4fSRGjU', 'admin', '2017-09-09 12:52:02', 1, 0),
(66, 67, 'WGvvOclne7', 'sT4xKhFgY3', '3qyYS8iRIQ', 'dpYb5yBTvo', 'DfWPl1Hc5r', '2017-09-20', 'l', 'Bi3gzt6r0Z', 'xSufO0zhWm', 'h2zHfaZsv1', 'UtGzlXuJna', 'f9vczeFi3x', 'hKbMUakSBa', 's', 'LMwtsCX52H', 'iZLpl4ZKe7', 'Mo2JZNOCUW', '2017-08-30', 1, 'LNSmyV4NLp', 'Tetap', 'JOrOJX5wDU', '2017-08-30', '2017-09-28', 8, 'iqOcmUJ7n3', '2017-09-03', '090917143150RUlK.pdf', 0, 2, '8W56ftVFLH', '090917143150iBvY.jpg', 'Fb2thyMrHQ', 'admin', '2017-09-09 14:31:50', 1, 0),
(67, 68, 'yH4op0dRch', 'fezw1uY24C', '5wsS159oxO', 'lqEstRHv9M', 'f37kxSXhVe', NULL, 'l', 'iynbeSmUx4', 'ErbwO56grX', '5rHaDzDKil', '', 'B505ZzPRq9', 'DwK2O5bjV9', 's', 'bGEvgiW8HJ', 'lGz31f8Z1t', '', NULL, 0, 'mo9ytwnlhy', 'Pengabdian', NULL, NULL, NULL, 0, 'qinETS7KSJ', NULL, '090917182501y4yt.', 90000, 0, '', '090917182501QiuO.pdf', 'L8n7zRODJb', 'admin', '2017-09-15 16:07:08', 1, 0),
(68, 69, 'kartoyo', 'RpWM7H9Hdj', 'AXR3pDI2Ay', 'se1aSsWeGf', 'Mk5BsFEOIF', '2017-09-14', 'l', 'Br87Mec8cL', 'T4E9ONT3XQ', 'fTVuIAoyx7', '', 'zvBZKuFkWh', 'y3LTqz3c65', 's', 'XKs2UFSXlx', 'RsHfWn5Ze8', 'bt8BRpT4bm', '2017-09-05', 0, 'oXjvCYkwkz', 'Pengabdian', 'S5JB2oZvXJ', NULL, NULL, 0, 'c0hJVr5Alw', '2017-09-20', '0909171951069taR.jpg', 0, 0, 'k5WFIJXto9', '090917195106qdih.jpg', 'NDPijiYuzH', 'admin', '2017-09-12 17:28:45', 1, 1),
(69, 70, 'hoream', 'رمضان', '8TLunnx8Q0', 'e17kUc6IT2', 'hdiayat', '2017-09-30', 'l', 'hqTmqfzaMH', 'zNtRbNqvgl', 'G1UBBTV4jB', '', 'CtVjoqeuXX', 'pY3R3p0y82', 's', 'Bd99XXvhb8', '3XMLOAZlbZ', 'pt0iiMcF0E', '2017-09-13', 2, 'N0HKPC9zu1', 'Tetap', NULL, NULL, NULL, 0, '6H3YI1CNB3', '2017-09-26', '120917154249Hiao.', 3, 0, 'BXRvJ6WMlg', '1209171542494ckG.', 'Zp8PoHpYj5', 'admin', '2017-09-12 15:42:49', 1, 1),
(70, 71, 'hoream', 'رمضان', '8TLunnx8Q0', 'e17kUc6IT2', 'hdiayat', '2017-09-30', 'l', 'hqTmqfzaMH', 'zNtRbNqvgl', 'G1UBBTV4jB', '', 'CtVjoqeuXX', 'pY3R3p0y82', 's', 'Bd99XXvhb8', '3XMLOAZlbZ', 'pt0iiMcF0E', '2017-09-13', 1, 'N0HKPC9zu1', 'Tetap', NULL, NULL, NULL, 0, '6H3YI1CNB3', '2017-09-26', '120917155938FcxY.', 3, 0, 'BXRvJ6WMlg', '120917155938jlg0.', 'Zp8PoHpYj5', 'admin', '2017-09-12 15:59:38', 1, 1),
(71, 72, 'hoream', 'رمضان', '8TLunnx8Q0', 'e17kUc6IT2', 'hdiayat', '2017-09-30', 'l', 'hqTmqfzaMH', 'zNtRbNqvgl', 'G1UBBTV4jB', '', 'CtVjoqeuXX', 'pY3R3p0y82', 's', 'Bd99XXvhb8', '3XMLOAZlbZ', 'pt0iiMcF0E', '2017-09-13', 2, 'N0HKPC9zu1', 'Tetap', '4MVA12mpRT', NULL, NULL, 5, '6H3YI1CNB3', '2017-09-26', '1209171703595JEU.jpg', 30000000, 5, 'isertifikasi', '120917170359hOeD.jpg', 'Zp8PoHpYj5', 'admin', '2017-09-12 17:05:04', 1, 1),
(72, NULL, 'fghfghfgh', '', '', '510232051432MP04072', '', NULL, 'l', '', '445', '', '', '', '', 's', '', '', '', NULL, 0, '', '', 'yQw5HoWL0w', NULL, NULL, 0, '', NULL, NULL, 0, 0, '', NULL, 'MP04', 'admin', '2017-11-01 17:40:59', 1, 0),
(73, NULL, '343', '3434', '3434', '510232051432MP04073', '345345', '2017-11-06', 'l', '434', '3433', '345345', '34', '343', '3453', 'm', '3453', '4343', '34', '2017-11-15', 0, '', '', NULL, NULL, NULL, 0, '', NULL, NULL, 0, 0, '', NULL, 'MP04', 'admin', '2017-11-12 16:50:39', 1, 0),
(74, NULL, 'farit', '', '', '510232051432MP04074', '', NULL, 'l', '', '35345', '', '', '', '', 's', '', '', '', NULL, 0, '', '', NULL, NULL, NULL, 0, '', NULL, NULL, 0, 0, '', NULL, 'MP04', 'admin', '2017-11-12 16:51:31', 1, 0);

--
-- Dumping data for table `ms_guru_family`
--

INSERT INTO `ms_guru_family` (`id`, `id_guru`, `nama_anak`, `pendidikan`, `tanggal_lahir`) VALUES
(1, 17, 'arahaf', NULL, '1990-01-27'),
(2, 17, 'HH', NULL, '1989-12-01'),
(3, 18, 'adistie', NULL, '1990-01-27'),
(4, 18, 'ella', NULL, '1989-12-01'),
(5, 28, 'farida', 'sma', '2017-09-02'),
(6, 28, 'akoe', 'mts', '2017-09-01'),
(7, 29, 'farida', 'sma', '2017-09-02'),
(8, 29, 'akoe', 'mts', '2017-09-01'),
(9, 30, 'farida', 'sma', '2017-09-02'),
(10, 30, 'akoe', 'mts', '2017-09-01'),
(11, 31, 'farida', 'sma', '2017-09-02'),
(12, 31, 'akoe', 'mts', '2017-09-01'),
(13, 32, 'farida', 'sma', '2017-09-02'),
(14, 32, 'akoe', 'mts', '2017-09-01'),
(15, 33, 'farida', 'sma', '2017-09-02'),
(16, 33, 'akoe', 'mts', '2017-09-01'),
(17, 34, 'farida', 'sma', '2017-09-02'),
(18, 34, 'akoe', 'mts', '2017-09-01'),
(19, 36, 'farida', 'sma', '2017-09-02'),
(20, 36, 'akoe', 'mts', '2017-09-01'),
(21, 37, 'farida', 'sma', '2017-09-02'),
(22, 37, 'akoe', 'mts', '2017-09-01'),
(23, 38, 'farida', 'sma', '2017-09-02'),
(24, 38, 'akoe', 'mts', '2017-09-01'),
(25, 47, 'anak', 'pendi', '2017-09-02'),
(26, 48, 'anak', 'pendi', '2017-09-02'),
(27, 49, 'anak', 'pendi', '2017-09-02'),
(28, 50, 'anak', 'pendi', '2017-09-02'),
(29, 51, 'anak', 'pendi', '2017-09-02'),
(30, 52, 'anak', 'pendi', '2017-09-02'),
(31, 53, 'anak', 'pendi', '2017-09-02'),
(32, 58, 'adong', 'Sarjana Muda', '1989-02-01'),
(33, 59, 'adong', 'Sarjana Muda', '1989-02-01'),
(34, 65, 'fdsafdsa', 'fsms', '2017-09-01'),
(35, 66, 'fdsaf', 'rrr', '2017-09-02'),
(38, 70, NULL, NULL, '0000-00-00'),
(80, 71, 'ds', 'ff', '2017-09-01'),
(81, 71, 'zz', 'zz', '2017-08-27');

--
-- Dumping data for table `ms_guru_gapok`
--

INSERT INTO `ms_guru_gapok` (`id_gapok`, `id_guru`, `nominal`, `userid`, `recdate`) VALUES
(1, 61, 90000, 'admin', '2017-09-03 15:13:02'),
(2, 69, 3, 'admin', '2017-09-09 19:57:07'),
(3, 71, 30000000, 'admin', '2017-09-12 16:51:40');

--
-- Dumping data for table `ms_guru_jabatan`
--

INSERT INTO `ms_guru_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Majelis Guru'),
(2, 'Sekertariat Pondok'),
(3, 'Database & Publikasi'),
(4, 'Adm & Tata Usaha');

--
-- Dumping data for table `ms_guru_pendidikan`
--

INSERT INTO `ms_guru_pendidikan` (`id`, `id_guru`, `nama_pendidikan`, `tempat`, `lulus`, `kategori`, `file_lampiran`) VALUES
(1, 32, NULL, 'ss', '209', 'f', ''),
(2, 32, NULL, 'ss', '123', 'f', ''),
(3, 32, NULL, 'xx', '111', 'n', ''),
(4, 33, NULL, 'ss', '209', 'f', '020917204521T2Np.pdf'),
(5, 33, NULL, 'ss', '123', 'f', '020917204527iGrJ.pdf'),
(6, 33, NULL, 'xx', '111', 'n', '020917204532haO0.pdf'),
(7, 34, NULL, 'ss', '209', 'f', '020917204521T2Np.pdf'),
(8, 34, NULL, 'ss', '123', 'f', '020917204527iGrJ.pdf'),
(9, 34, NULL, 'xx', '111', 'n', '020917204532haO0.pdf'),
(10, 36, NULL, 'ss', '209', 'f', '020917204521T2Np.pdf'),
(11, 36, NULL, 'ss', '123', 'f', '020917204527iGrJ.pdf'),
(12, 36, NULL, 'xx', '111', 'n', '020917204532haO0.pdf'),
(13, 37, NULL, 'ss', '209', 'f', '020917204521T2Np.pdf'),
(14, 37, NULL, 'ss', '123', 'f', '020917204527iGrJ.pdf'),
(15, 37, NULL, 'xx', '111', 'n', '020917204532haO0.pdf'),
(16, 38, NULL, 'ss', '209', 'f', '020917204521T2Np.pdf'),
(17, 38, NULL, 'ss', '123', 'f', '020917204527iGrJ.pdf'),
(18, 38, NULL, 'xx', '111', 'n', '020917204532haO0.pdf'),
(19, 47, NULL, 'sma', '2019', 'f', '030917062258m5xF.pdf'),
(20, 47, NULL, 'll', '2019', 'n', '030917062309xxjT.pdf'),
(21, 48, NULL, 'sma', '2019', 'f', '030917062258m5xF.pdf'),
(22, 48, NULL, 'll', '2019', 'n', '030917062309xxjT.pdf'),
(23, 49, NULL, 'sma', '2019', 'f', '030917062258m5xF.pdf'),
(24, 49, NULL, 'll', '2019', 'n', '030917062309xxjT.pdf'),
(25, 50, NULL, 'sma', '2019', 'f', '030917062258m5xF.pdf'),
(26, 50, NULL, 'll', '2019', 'n', '030917062309xxjT.pdf'),
(27, 51, NULL, 'sma', '2019', 'f', '030917062258m5xF.pdf'),
(28, 51, NULL, 'll', '2019', 'n', '030917062309xxjT.pdf'),
(29, 52, NULL, 'sma', '2019', 'f', '030917062258m5xF.pdf'),
(30, 52, NULL, 'll', '2019', 'n', '030917062309xxjT.pdf'),
(31, 53, NULL, 'sma', '2019', 'f', '030917062258m5xF.pdf'),
(32, 53, NULL, 'll', '2019', 'n', '030917062309xxjT.pdf'),
(33, 59, NULL, 'STMIK', '2018', 'f', '03091709530146cZ.pdf'),
(34, 59, NULL, 'Course', '2011', 'n', '030917095332Tgbb.pdf'),
(35, 65, NULL, 'fdsaf', '23', 'f', ''),
(36, 65, NULL, 'fdas', '123', 'n', ''),
(37, 66, NULL, 'fdsaf', '123', 'f', ''),
(38, 66, NULL, 'aa', '123', 'n', ''),
(79, 71, 'hahrrr', 'q', '12', 'f', '120917164747yy5x.pdf'),
(80, 71, 'qqqrrrr', 'dd', '123', 'n', '120917160746Yp6D.jpg'),
(81, 68, NULL, 'dafda', '123', 'f', ''),
(82, 68, NULL, 'fff', '111', 'n', ''),
(83, 72, 'aaaaaa', 'sdsdsds', '4544', 'f', ''),
(84, 72, 'aaaaaa', 'fsfsdfs', '7657', 'f', ''),
(85, 72, 'hfghfghfg', 'hfhfghfgh', '0010', 'n', '011117172549SXMo.pdf');

--
-- Dumping data for table `ms_guru_sk`
--

INSERT INTO `ms_guru_sk` (`id_sk`, `id_guru`, `no_sk`, `tgl_sk`, `file_sk`) VALUES
(1, 28, 'h5ZSSpBTlg', '2017-09-08', '020917190119k3fX.pdf'),
(2, 30, 'h5ZSSpBTlg', '2017-09-08', '020917190119k3fX.pdf'),
(3, 31, 'h5ZSSpBTlg', '2017-09-08', '020917190119k3fX.pdf'),
(4, 32, 'h5ZSSpBTlg', '2017-09-08', '020917190119k3fX.pdf'),
(5, 33, 'h5ZSSpBTlg', '2017-09-08', '020917190119k3fX.pdf'),
(6, 34, 'h5ZSSpBTlg', '2017-09-08', '020917190119k3fX.pdf'),
(7, 36, 'h5ZSSpBTlg', '2017-09-08', '020917190119k3fX.pdf'),
(8, 37, 'h5ZSSpBTlg', '2017-09-08', '020917190119k3fX.pdf'),
(9, 38, 'h5ZSSpBTlg', '2017-09-08', '020917190119k3fX.pdf'),
(10, 47, 'vUr8zX0dEA', '2017-08-31', '030917062221mePU.pdf'),
(11, 48, 'vUr8zX0dEA', '2017-08-31', '030917062221mePU.pdf'),
(12, 49, 'vUr8zX0dEA', '2017-08-31', '030917062221mePU.pdf'),
(13, 50, 'vUr8zX0dEA', '2017-08-31', '030917062221mePU.pdf'),
(14, 51, 'vUr8zX0dEA', '2017-08-31', '030917062221mePU.pdf'),
(15, 52, 'vUr8zX0dEA', '2017-08-31', '030917062221mePU.pdf'),
(16, 53, 'vUr8zX0dEA', '2017-08-31', '030917062221mePU.pdf'),
(17, 59, '7ii96jnwpn', '2017-09-02', '030917095349vdvf.pdf'),
(18, 65, 'nF4MYZLw8p', '2017-09-06', ''),
(19, 66, '40YkZCC4zB', '2017-09-14', ''),
(30, 69, 'DzlWe3i6aZ', '2017-09-26', '090917195551mNlX.jpg'),
(31, 70, 'DzlWe3i6aZ', '2017-09-26', '090917195551mNlX.jpg'),
(66, 71, 'sk1', '2017-09-26', '120917165716RXk7.jpg'),
(67, 71, 'sk12', '2017-09-26', '120917165726NKbA.jpg'),
(68, 68, 'EWL2KMLCNm', '2017-09-20', '');

--
-- Dumping data for table `ms_guru_struktural`
--

INSERT INTO `ms_guru_struktural` (`id_jabatan`, `id_guru`) VALUES
(2, 45),
(2, 46),
(3, 46),
(2, 65),
(3, 65),
(4, 65),
(2, 66),
(3, 66);

--
-- Dumping data for table `ms_kamar`
--

INSERT INTO `ms_kamar` (`kode_kamar`, `nama`, `kapasitas`, `userid`, `recdate`) VALUES
('K02', 'KAMAR 02', 150, 'admin', '2017-10-19'),
('K01', 'KAMAR 01', 200, 'admin', '2017-10-19'),
('K03', 'KAMAR 03', 95, 'admin', '2017-10-19'),
('K04', 'KAMAR 4', 100, 'admin', '2017-10-19');

--
-- Dumping data for table `ms_kecakapan_santri`
--

INSERT INTO `ms_kecakapan_santri` (`no_registrasi`, `bid_studi`, `olahraga`, `kesenian`, `keterampilan`, `lain_lain`) VALUES
('T38170001', 'MATEMATIKA', 'LARI', 'MENYANYI', '-', '-'),
('T39170014', 'GF', 'DFGd', 'DFG', 'FGDFG', 'DFGFD'),
('CT38170005', 'HFG', 'HF', 'FDh', 'HFh', 'DFh'),
('CT38170008', 'DGD', 'DFG', 'DFGDF', 'DFGDFg', 'DFGDFG'),
('T39170013', '', '', '', '', ''),
(NULL, NULL, NULL, NULL, NULL, NULL),
('CT39170027', '', '', '', '', ''),
('CT39170028', '2342', '234', '34', '234234', '234324'),
('A39170002', NULL, NULL, NULL, NULL, NULL),
('A39170001', NULL, NULL, NULL, NULL, NULL),
('A3917002', NULL, NULL, NULL, NULL, NULL);

--
-- Dumping data for table `ms_kelas`
--

INSERT INTO `ms_kelas` (`kode_kelas`, `tingkat`, `nama`, `tipe_kelas`, `kapasitas`, `userid`, `recdate`) VALUES
('KR1B', 1, 'KELAS 1B', 'REGULER', 20, 'admin', '2017-10-19'),
('KR1A', 1, 'KELAS 1A', 'INTENSIF', 52, 'admin', '2017-10-19'),
('KR2A', 2, 'KELAS 2 A', 'REGULER', 50, 'admin', '2017-10-19'),
('KR2B', 2, 'KELAS 2B', 'REGULER', 35, 'admin', '2017-10-19'),
('KR3A', 3, 'KELAS 3A', 'REGULER', 40, 'admin', '2017-10-19'),
('KR1C', 1, 'KELAS 1C', 'REGULER', 30, 'admin', '2017-10-19'),
('K023', 1, 'KELAS 1A', 'INTENSIF', 25, 'admin', '2017-10-19');

--
-- Dumping data for table `ms_keluarga`
--

INSERT INTO `ms_keluarga` (`no_registrasi`, `kategori`, `nama`, `nik`, `binbinti`, `jenis_kelamin`, `status`, `tgl_wafat`, `umur`, `hari`, `sebab_wafat`, `status_perkawinan`, `pendapatan_ibu`, `sebab_tdk_bekerja`, `keahlian`, `status_rumah`, `kondisi_rumah`, `jml_asuh`, `pekerjaan`, `pend_terakhir`, `agama`, `suku`, `kewarganegaraan`, `ormas`, `orpol`, `kedukmas`, `thn_lulus`, `no_stambuk_alumni`, `tempat_lahir`, `tgl_lahir_keluarga`, `hub_kel`, `keterangan`, `ktp`) VALUES
('T38170001', 'AYAH', 'ASEP SANJAYA', 2147483647, 'ROJAK', 'P', '', '0000-00-00', 0, '', '', '', 0, '', '', '', '', 0, 'KARYAWAN SWASTA', 0x534d412f534d4b, 0x49534c414d, '743872333738739', 'INDONESIA', '-', '-', '-', 2000, 1234, 'GARUT', '1978-06-05', '', '', '3LFs.jpg'),
('T39170013', 'AYAH', 'MAHMUD', 39248778, 'KURON', 'L', '', '0000-00-00', 0, '', '', '', 0, '', '', '', '', 0, 'PEGAWAI SWASTA', 0x534d412f534d4b, 0x49534c414d, '3248327432', 'INDONESIA', 'FPI', 'PARTAI IND', 'KETUA RT', 0000, 0, 'BANDUNG', '1960-03-17', '', '', 'gygW.pdf'),
('T39170013', 'IBU', 'MARMUT', 9384938, 'MAMET', 'P', '', '0000-00-00', 0, '', '', '', 0, '', '', '', '', 0, 'IBU RUMAH TANGGA', 0x534d502f534c5441, 0x49534c414d, '3297698', 'INDENESIA', 'ORMAS', 'ORPOL', 'KEDUKMAS', 2017, 3253545, 'JOGJA', '1960-02-09', '', '', ''),
('A39170001', 'IBU', 'SUMINAH', 2147483647, 'MUJAROH', 'P', '', '0000-00-00', 0, '', '', 'JANDA', 1500000, 'MALAS', 'MENCUCI', 'KONTRAK', 'PERMANEN', 0, 'TUKANG CUCI', 0x5344, 0x49534c414d, '5345435', 'INDONESIA', 'ORMAS INDONESIA', 'PARINDO', 'IBU RT', 0000, 0, 'BANDUNG', '1969-11-19', '', '', 'Syu7.pdf'),
('A39170001', 'SAUDARA', 'SUTEJO', 98890097, 'SUJEWO', 'L', 'MENIKAH', '0000-00-00', 0, '', '', '', 0, '', '', '', '', 0, 'PEDAGANG', 0x534d412f534d4b, 0x49534c414d, '7987', 'INDONESIA', '', '', '-', 2000, 7887878, 'TANGERANG', '1984-08-16', 'KAKAK KANDUNG', 'REFERENSI', '9sWN.pdf'),
('A3917002', 'SAUDARA', 'WRTR', 787, '87', 'L', 'BELUM MENI', '0000-00-00', 0, '', '', '', 0, '', '', '', '', 0, '87', 0x5344, 0x3837, '87', '8', '', '', '78', 0000, 77, '8', '2017-11-20', '78', '787', '3kLM.pdf');

--
-- Dumping data for table `ms_mata_pelajaran`
--

INSERT INTO `ms_mata_pelajaran` (`id_matpal`, `nama_matpal`, `id_bidang`, `status`, `userid`, `recdate`) VALUES
('MPEK', 'EKONOMI', 'BS02', '1', 'admin', '2017-08-19 00:00:00'),
('MPSO', 'SOSIOLOGI', 'BS02', '1', 'admin', '2017-08-19 00:00:00'),
('MP03', 'KIMIA', 'BS01', '0', 'admin', '2017-08-19 00:00:00'),
('MP02', 'BIOLOGI', 'BS01', '1', 'admin', '2017-08-19 00:00:00'),
('MP01', 'FISIKA', 'BS01', '1', 'admin', '2017-08-19 00:00:00'),
('MPGEO', 'GEOGRAFI', 'BS02', '1', 'admin', '2017-08-19 00:00:00'),
('MPSJ', 'SEJARAH', 'BS02', '1', 'admin', '2017-08-19 00:00:00'),
('MP04', 'BERHITUNG', 'BS03', '1', 'admin', '2017-08-13 00:00:00'),
('MP05', 'MATEMATIKA', 'BS03', '1', 'admin', '2017-08-13 00:00:00'),
('MPNI', 'NISAIYYAH', 'BS02', '1', 'admin', '2017-08-19 00:00:00'),
('MPSSORE', 'SEJARAH', 'BSSORE01', '1', 'admin', '2017-08-19 00:00:00'),
('MPEKSORE2', 'EKONOMI', 'BSSORE01', '1', 'admin', '2017-08-19 00:00:00'),
('TJDRORI', 'TIJAN DARORI', 'KTBSLF', '1', 'admin', '2017-09-23 00:00:00'),
('SLMTFQ', 'SULAM TAUFIQ', 'KTBSLF', '1', 'admin', '2017-09-23 00:00:00'),
('JRMYH', 'JURUMIYYAH', 'KTBSLF', '1', 'admin', '2017-09-23 00:00:00');

--
-- Dumping data for table `ms_minggu`
--

INSERT INTO `ms_minggu` (`id_minggu`, `minggu`, `urut`) VALUES
(1, 'I', 1),
(2, 'II', 2),
(3, 'III', 3),
(4, 'IV', 4);

--
-- Dumping data for table `ms_penyakit`
--

INSERT INTO `ms_penyakit` (`no_registrasi`, `nama_penyakit`, `thn_penyakit`, `kategori_penyakit`, `tipe_penyakit`, `lamp_bukti`) VALUES
('T38170001', 'AAYAN', 2010, 'KRONIS', 'TIDAK MENULAR', '3JCn.jpeg'),
('T38170001', 'BATUK', 2010, 'TIDAK KRONIS', 'TIDAK MENULAR', 'lAro.jpeg'),
('T39170014', 'DSFSDFSD', 2017, 'TIDAK KRONIS', 'MENULAR', 'F0c3.jpg'),
('A39170001', 'ALERGI DINGIN', 2014, 'TIDAK KRONIS', 'TIDAK MENULAR', 'erQk.pdf'),
('A39170001', 'BATUK', 2015, 'TIDAK KRONIS', 'TIDAK MENULAR', 'ondl.jpg'),
('A3917002', 'SDFSD', 2017, 'KRONIS', 'TIDAK MENULAR', 'HgW8.pdf');

--
-- Dumping data for table `ms_santri`
--

INSERT INTO `ms_santri` (`kategori`, `no_registrasi`, `no_stambuk`, `thn_masuk`, `rayon`, `kamar`, `bagian`, `kel_sekarang`, `nisn`, `nisnlokal`, `nama_lengkap`, `nama_arab`, `nama_panggilan`, `hobi`, `uang_jajan_perbulan`, `no_kk`, `nik`, `tempat_lahir`, `tgl_lahir`, `konsulat`, `nama_sekolah`, `kelas_sekolah`, `alamat_sekolah`, `suku`, `kewarganegaraan`, `jalan`, `no_rumah`, `dusun`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `kd_pos`, `no_tlp`, `no_hp`, `email`, `fb`, `dibesarkan_di`, `lamp_ijazah`, `lamp_photo`, `lamp_akta_kelahiran`, `lamp_kk`, `lamp_skhun`, `lamp_transkip_nilai`, `lamp_skkb`, `lamp_surat_kesehatan`) VALUES
('AITAM_ISLAH', 'A39170003', NULL, NULL, 'GD03', 'K04', 'B02', '', '8748353078', '51023205143239170003', 'F DONI', NULL, NULL, 'MAKAN', 0, 2147483647, NULL, 'BOGOR', '1995-02-01', NULL, 'SEKOLAH BERSAMA', 'IX A', 'JALAN KESEKOLAH', 'SUNDA', 'INDONESIA', 'JL ARCA BUANA', 'RT003 RW 004', 'KBOGO', 'DBOGO', 'DKECAM', 'DKABPU', 'DPROV', 9888, 2147483647, 2147483647, NULL, NULL, NULL, NULL, '3PioFhOHlOjYs9tz0OnW.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
('AITAM_JAMIAH', 'CA39170004', NULL, NULL, '', '', '', '', '234234', '510232051432', '23423', NULL, NULL, '23432', 0, 423423423, NULL, '23423', '2017-11-16', NULL, '2342', '234324', '234234', '234234', '23423', '23', '234', '23', '23432', '234', '22342', '23423', 3423, 4234, 4234234, NULL, NULL, NULL, NULL, 'w412KLkqk2SMZsfX6896.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
('AITAM_JAMIAH', 'CA39170005', NULL, NULL, '', '', '', '', '87', '5102320514323917002', '8', NULL, NULL, '77', 0, 87, NULL, '87', '2017-11-24', NULL, 'QWEWQ', 'QWEQWE', 'QWE', '7', '87', '87', '87', '8', '78', '78', '7', '87', 8, 7, 78, NULL, NULL, NULL, 'wAIbAV8uDMIi1PfrgHnw.pdf', 'hOcjJRWumBOjLT1mNe1C.jpg', 'ZEnND2ZCwfxKBKWqeKOA.pdf', 'UGYg9GcCHaO0ZIHIzTRS.pdf', NULL, NULL, NULL, NULL),
('AITAM_ISLAH', 'CA39170006', NULL, NULL, '', '', '', '', '324234', '51023205143239170002', '234234234', NULL, NULL, '23423', 0, 23423, NULL, '4234', '2017-11-16', NULL, '23423', '234234', '23423', '234234', '234234', '324234', '234', '324', '234', '234', '324234', '4234', 234, 23423, 23423, NULL, NULL, NULL, NULL, 'LeotDs03X1VAhPXjg9Bs.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
('TMI', 'CT38170005', 0, 2017, NULL, NULL, NULL, NULL, '11223344', '0', 'RARA', 'فغع', 'RARA', 'NGOPI', 1000000, 113345587, 3355777, 'TANJUNG ENIM', '1989-07-10', 'KONSULAT 1', NULL, NULL, NULL, 'SUMATERA', 'INDONESIA', 'PERUMAHAN MEDANG', 'NO3 RT 003 RW 013', 'MEDANG', 'PAGEDANGAN', 'LEGOK', 'TANGERANG SELAT', 'BANTEN', 523314, 21558877, 2147483647, 'faritno@me.com', 'faritno@faceboo', 'TANJUNG EN', 'CoWhmFmcJ0nt3S5jbf5s.pdf', '5tzrpZTl8IQ06C1aEcx1.jpg', 'rAt6IRPZixfk4BkPnuaJ.pdf', '2bmJoaZ3jpFr8ls4HZZG.pdf', 'lLkvUG5fKbl8HfIS7kgG.PDF', 'QqBicZPU3YxgKSNz7Dey.pdf', 'vKUpKarTdnVbJkW1EuzD.pdf', 'NQrIxQDvHtJIDcQzbYyM.pdf'),
('TMI', 'CT38170006', 0, 2017, NULL, NULL, NULL, NULL, '11223344', '0', 'RERE', 'ناهلات', 'RERE', 'NGOPI', 1000000, 113345587, 3355777, 'TANJUNG ENIM', '1989-07-10', 'KONSULAT 1', NULL, NULL, NULL, 'SUMATERA', 'INDONESIA', 'PERUMAHAN MEDANG', 'NO3 RT 003 RW 013', 'MEDANG', 'PAGEDANGAN', 'LEGOK', 'TANGERANG SELAT', 'BANTEN', 523314, 21558877, 2147483647, 'faritno@me.com', 'faritno@faceboo', 'TANJUNG EN', 'CoWhmFmcJ0nt3S5jbf5s.pdf', '5tzrpZTl8IQ06C1aEcx1.jpg', 'rAt6IRPZixfk4BkPnuaJ.pdf', '2bmJoaZ3jpFr8ls4HZZG.pdf', 'lLkvUG5fKbl8HfIS7kgG.PDF', 'QqBicZPU3YxgKSNz7Dey.pdf', 'vKUpKarTdnVbJkW1EuzD.pdf', 'NQrIxQDvHtJIDcQzbYyM.pdf'),
('TMI', 'CT38170007', 0, 2017, NULL, NULL, NULL, NULL, '11223344', '0', 'SARAH', 'ناهلات', 'SARAH', 'NGOPI', 1000000, 113345587, 3355777, 'TANJUNG ENIM', '1989-07-10', 'KONSULAT 1', NULL, NULL, NULL, 'SUMATERA', 'INDONESIA', 'PERUMAHAN MEDANG', 'NO3 RT 003 RW 013', 'MEDANG', 'PAGEDANGAN', 'LEGOK', 'TANGERANG SELAT', 'BANTEN', 523314, 21558877, 2147483647, 'faritno@me.com', 'faritno@faceboo', 'TANJUNG EN', 'CoWhmFmcJ0nt3S5jbf5s.pdf', '5tzrpZTl8IQ06C1aEcx1.jpg', 'rAt6IRPZixfk4BkPnuaJ.pdf', '2bmJoaZ3jpFr8ls4HZZG.pdf', 'lLkvUG5fKbl8HfIS7kgG.PDF', 'QqBicZPU3YxgKSNz7Dey.pdf', 'vKUpKarTdnVbJkW1EuzD.pdf', 'NQrIxQDvHtJIDcQzbYyM.pdf'),
('TMI', 'CT38170008', 0, 2017, NULL, NULL, NULL, NULL, '11223344', '0', 'MUHTAR', 'خحها', 'MUHTAR', 'NGOPI', 1000000, 113345587, 3355777, 'TANJUNG ENIM', '1989-07-10', 'KONSULAT 1', NULL, NULL, NULL, 'SUMATERA', 'INDONESIA', 'PERUMAHAN MEDANG', 'NO3 RT 003 RW 013', 'MEDANG', 'PAGEDANGAN', 'LEGOK', 'TANGERANG SELAT', 'BANTEN', 523314, 21558877, 2147483647, 'faritno@me.com', 'faritno@faceboo', 'TANJUNG EN', 'CoWhmFmcJ0nt3S5jbf5s.pdf', '5tzrpZTl8IQ06C1aEcx1.jpg', 'rAt6IRPZixfk4BkPnuaJ.pdf', '2bmJoaZ3jpFr8ls4HZZG.pdf', 'lLkvUG5fKbl8HfIS7kgG.PDF', 'QqBicZPU3YxgKSNz7Dey.pdf', 'vKUpKarTdnVbJkW1EuzD.pdf', 'NQrIxQDvHtJIDcQzbYyM.pdf'),
('TMI', 'CT39170027', 0, 2017, NULL, NULL, NULL, NULL, '2342', '', '3423', '2', '423', '234', 4234, 34234, 23423, '2342', '2017-11-16', '234', NULL, NULL, NULL, '234324', '234', '234', '4234', '23423', '23423', '23423', '234', '4234', 4234, 234, 23432, 'af@gm.com', '23234', '234234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('TMI', 'CT39170028', 0, 2017, NULL, NULL, NULL, NULL, '324', '', '2343', '234', '234234', '234', 234, 234, 23423, '324', '2017-11-15', '234', NULL, NULL, NULL, '234234', '23423', '234', '4234', '234', '23423', '32423', '4324', '4234', 432, 234, 23423, '423423@GMIL.CPOM', '234', '23432', NULL, 'CwTp8vzwakyEW8sdlcqs.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
('TMI', 'T38170001', 1, 2017, 'GD01', 'K01', 'B01', 'KR1A', '123456789', '1234567890', 'RUDI HERMAWAN', 'قعيه اثقةشصشى', 'RUDI', 'OLAHRAGE', 300000, 2147483647, 2147483647, 'GARUT', '2004-03-08', 'SINDANG', NULL, NULL, NULL, 'SUNDA', 'INDONESIA', 'JL. LANCAR JAYA', 'NO.18 007/008', 'KEJAYAAN', 'MAJU TERUS', 'KECAMATAN1', 'KABUPATEN1', 'JAWA BARAT', 11876, 24765984, 2147483647, 'rudi@gmail.com', 'rudi@facebook', 'garut', NULL, 'mnWyWkatVr4JTzcE0abP.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
('TMI', 'T39170013', 14, 2017, 'GD01', 'K01', 'B01', 'K023', '112233', '2147483647', 'namalengkap nya1', 'namaarab nya1', 'namapanggi', 'hoinya apa', 500000, 123, 321, 'Tempat_lahir', '1990-02-13', 'konsulat1', NULL, NULL, NULL, 'suku1', 'Kewarga1', 'jaln1', 'norUMah1', 'Dusun1', 'desa1', 'kecamatan1', 'kabupaten1', 'provinsi1', 51280, 2155677, 2147483647, 'email1@yahoo.com', 'fb1', 'dfdfdfdfdf', 'MyScl8mlnNJCn7wLGxJu.pdf', 'eWSaMJ2sXheTNvKMrWUW.jpg', 'tMiZ5AUeYPb2H2P4WC3b.pdf', 'EzPpovTpLyAsy30oyjti.jpg', 'S2VAG4eIxziv8HYND4qA.jpg', 'ThG2pY575DBNDV6GfOmO.pdf', 'YLKopMNGWvs1jsF8HNg4.pdf', '55R4fRiOc63MD8M7UM4R.pdf'),
('TMI', 'T39170014', 15, 2017, 'GD02', 'K02', 'B01', 'KR1A', '112233', '2147483647', 'BOBI', 'namaarab nya1', 'namapanggi', 'hoinya apa', 500000, 123, 321, 'Tempat_lahir', '0000-00-00', 'konsulat1', NULL, NULL, NULL, 'suku1', 'Kewarga1', 'jaln1', 'norUMah1', 'Dusun1', 'desa1', 'kecamatan1', 'kabupaten1', 'provinsi1', 51280, 2155677, 2147483647, 'email1@yahoo.com', 'fb1', 'dfdfdfdfdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('TMI', 'T39170017', 18, 2017, 'GD01', 'K02', 'B01', 'KR1B', '11223344', '2147483647', 'AGUNG', 'يسب تار', 'AGUNG', 'NGOPI', 1000000, 113345587, 3355777, 'TANJUNG ENIM', '1989-07-10', 'KONSULAT 1', NULL, NULL, NULL, 'SUMATERA', 'INDONESIA', 'PERUMAHAN MEDANG', 'NO3 RT 003 RW 013', 'MEDANG', 'PAGEDANGAN', 'LEGOK', 'TANGERANG SELAT', 'BANTEN', 523314, 21558877, 2147483647, 'faritno@me.com', 'faritno@faceboo', 'TANJUNG EN', 'CoWhmFmcJ0nt3S5jbf5s.pdf', '5tzrpZTl8IQ06C1aEcx1.jpg', 'rAt6IRPZixfk4BkPnuaJ.pdf', '2bmJoaZ3jpFr8ls4HZZG.pdf', 'lLkvUG5fKbl8HfIS7kgG.PDF', 'QqBicZPU3YxgKSNz7Dey.pdf', 'vKUpKarTdnVbJkW1EuzD.pdf', 'NQrIxQDvHtJIDcQzbYyM.pdf'),
('TMI', 'T39170019', 20, 2017, 'GD02', 'K03', 'B01', 'KR2A', '11223344', '51023205143239170019', 'AHDIAN', 'حغغفىلا ت', 'AHDIAN', 'NGOPI', 1000000, 113345587, 3355777, 'TANJUNG ENIM', '1989-07-10', 'KONSULAT 1', NULL, NULL, NULL, 'SUMATERA', 'INDONESIA', 'PERUMAHAN MEDANG', 'NO3 RT 003 RW 013', 'MEDANG', 'PAGEDANGAN', 'LEGOK', 'TANGERANG SELAT', 'BANTEN', 523314, 21558877, 2147483647, 'faritno@me.com', 'faritno@faceboo', 'TANJUNG EN', 'CoWhmFmcJ0nt3S5jbf5s.pdf', '5tzrpZTl8IQ06C1aEcx1.jpg', 'rAt6IRPZixfk4BkPnuaJ.pdf', '2bmJoaZ3jpFr8ls4HZZG.pdf', 'lLkvUG5fKbl8HfIS7kgG.PDF', 'QqBicZPU3YxgKSNz7Dey.pdf', 'vKUpKarTdnVbJkW1EuzD.pdf', 'NQrIxQDvHtJIDcQzbYyM.pdf');

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

--
-- Dumping data for table `ms_tahun_ajaran`
--

INSERT INTO `ms_tahun_ajaran` (`id`, `deskripsi`, `kategori`) VALUES
(1, '2015-2016', 'UTAMA'),
(2, '2016-2017', 'UTAMA'),
(3, '2017-2018', 'UTAMA'),
(4, '2018-2019', 'UTAMA'),
(5, '2015-2016', 'SORE'),
(6, '2016-2017', 'SORE'),
(7, '2017-2018', 'SORE'),
(8, '2018-2019', 'SORE');

--
-- Dumping data for table `santri_limit_harian`
--

INSERT INTO `santri_limit_harian` (`id`, `no_reg`, `limit`, `up_time`, `up_by`) VALUES
(7, 'T39170001', 5000, '2017-10-21 15:52:01', 'admin'),
(8, 'T39170002', 7000, '2017-10-21 15:52:06', 'admin'),
(11, 'T38170001', 21000, '2017-11-23 18:03:06', 'admin'),
(12, 'T39170017', 5000, '2017-11-23 18:03:23', 'admin');

--
-- Dumping data for table `santri_saldo`
--

INSERT INTO `santri_saldo` (`no_registrasi`, `saldo`, `recuser`, `recdate`) VALUES
('T38170001', 659667, 'admin', '2017-11-23 18:03:06'),
('T39170001', 171100, 'admin', '2017-10-21 15:52:01'),
('T39170002', 221000, 'admin', '2017-10-21 15:52:06'),
('T39170017', 10000, 'admin', '2017-11-23 18:03:23');

--
-- Dumping data for table `sequence`
--

INSERT INTO `sequence` (`nama_field`, `nomor_terakhir`, `remark`) VALUES
('Stambuk_TMI', '20', NULL),
('noreg_TMI', 'T39170019', NULL),
('noreg_CalonTMI', 'CT39170028', NULL),
('noreg_CalonAITAM', 'CA39170006', NULL),
('noreg_AITAM', 'A39170003', NULL);

--
-- Dumping data for table `trans_jadwal_pelajaran`
--

INSERT INTO `trans_jadwal_pelajaran` (`id_jadwal`, `santri`, `id_thn_ajar`, `semester`, `kode_kelas`, `id_guru`, `jam`, `hari`, `id_mapel`, `userid`, `recdate`) VALUES
(213, 'PUTRI', 3, '1', 'KR1A', 3, 'I', 'SELASA', 'MPSO', 'admin', '2017-09-16 00:00:00'),
(212, 'PUTRI', 3, '1', 'KR1A', 2, 'II', 'KAMIS', 'MPSO', 'admin', '2017-09-16 00:00:00'),
(34, 'PUTRA', 3, '1', 'KR1A', 3, 'I', 'JUMAT', 'MPSO', 'admin', '2017-09-09 00:00:00'),
(33, 'PUTRA', 3, '1', 'KR1A', 2, 'II', 'SENIN', 'MPSO', 'admin', '2017-09-09 00:00:00'),
(32, 'PUTRA', 3, '1', 'KR1A', 1, 'II', 'SELASA', 'MPEK', 'admin', '2017-09-09 00:00:00'),
(31, 'PUTRA', 3, '1', 'KR1A', 1, 'I', 'SENIN', 'MPEK', 'admin', '2017-09-09 00:00:00'),
(211, 'PUTRI', 3, '1', 'KR1A', 1, 'II', 'RABU', 'MPEK', 'admin', '2017-09-16 00:00:00'),
(210, 'PUTRI', 3, '1', 'KR1A', 1, 'IV', 'SENIN', 'MPEK', 'admin', '2017-09-16 00:00:00'),
(145, 'PUTRA', 3, '1', 'KR1B', 3, 'VI', 'SABTU', 'MPGEO', 'admin', '2017-09-16 00:00:00'),
(144, 'PUTRA', 3, '1', 'KR1B', 2, 'V', 'JUMAT', 'MPGEO', 'admin', '2017-09-16 00:00:00'),
(143, 'PUTRA', 3, '1', 'KR1B', 1, 'IV', 'KAMIS', 'MPGEO', 'admin', '2017-09-16 00:00:00'),
(142, 'PUTRA', 3, '1', 'KR1B', 3, 'II', 'RABU', 'MPGEO', 'admin', '2017-09-16 00:00:00'),
(141, 'PUTRA', 3, '1', 'KR1B', 2, 'II', 'SELASA', 'MP01', 'admin', '2017-09-16 00:00:00'),
(140, 'PUTRA', 3, '1', 'KR1B', 1, 'I', 'SENIN', 'MP02', 'admin', '2017-09-16 00:00:00'),
(45, 'PUTRA', 3, '2', 'KR1A', 1, 'I', 'SELASA', 'MP02', 'admin', '2017-09-09 00:00:00'),
(46, 'PUTRA', 3, '2', 'KR1A', 2, 'II', 'SABTU', 'MP02', 'admin', '2017-09-09 00:00:00'),
(47, 'PUTRA', 3, '2', 'KR1A', 2, 'IV', 'RABU', 'MP02', 'admin', '2017-09-09 00:00:00'),
(48, 'PUTRA', 3, '2', 'KR1A', 3, 'V', 'KAMIS', 'MP01', 'admin', '2017-09-09 00:00:00'),
(49, 'PUTRA', 3, '2', 'KR1A', 2, 'V', 'SABTU', 'MP01', 'admin', '2017-09-09 00:00:00'),
(50, 'PUTRA', 3, '2', 'KR1A', 3, 'VI', 'KAMIS', 'MP01', 'admin', '2017-09-09 00:00:00'),
(241, 'PUTRI', 3, '2', 'KR1A', 60, 'II', 'SENIN', 'MP02', 'admin', '2017-09-30 00:00:00'),
(240, 'PUTRI', 3, '2', 'KR1A', 66, 'I', 'SENIN', 'MP02', 'admin', '2017-09-30 00:00:00'),
(239, 'PUTRI', 3, '2', 'KR1A', 62, 'II', 'SENIN', 'MP02', 'admin', '2017-09-30 00:00:00'),
(238, 'PUTRI', 3, '2', 'KR1A', 61, 'V', 'RABU', 'MP01', 'admin', '2017-09-30 00:00:00'),
(237, 'PUTRI', 3, '2', 'KR1A', 3, 'IV', 'SENIN', 'MP01', 'admin', '2017-09-30 00:00:00'),
(146, 'PUTRA', 3, '1', 'KR1B', 1, 'I', 'AHAD', 'MPSJ', 'admin', '2017-09-16 00:00:00'),
(147, 'PUTRA', 3, '1', 'KR1B', 2, 'II', 'SENIN', 'MPSJ', 'admin', '2017-09-16 00:00:00'),
(148, 'PUTRA', 3, '1', 'KR1B', 3, 'II', 'SELASA', 'MPSJ', 'admin', '2017-09-16 00:00:00'),
(149, 'PUTRA', 3, '1', 'KR1B', 1, 'IV', 'RABU', 'MPSJ', 'admin', '2017-09-16 00:00:00'),
(188, 'PUTRA', 3, '2', 'KR1B', 3, 'II', 'SELASA', 'MP05', 'admin', '2017-09-16 00:00:00'),
(187, 'PUTRA', 3, '2', 'KR1B', 2, 'II', 'SENIN', 'MP05', 'admin', '2017-09-16 00:00:00'),
(186, 'PUTRA', 3, '2', 'KR1B', 1, 'I', 'AHAD', 'MP05', 'admin', '2017-09-16 00:00:00'),
(184, 'PUTRA', 3, '2', 'KR1B', 2, 'V', 'JUMAT', 'MP04', 'admin', '2017-09-16 00:00:00'),
(185, 'PUTRA', 3, '2', 'KR1B', 3, 'VI', 'SABTU', 'MP05', 'admin', '2017-09-16 00:00:00'),
(183, 'PUTRA', 3, '2', 'KR1B', 1, 'IV', 'KAMIS', 'MP04', 'admin', '2017-09-16 00:00:00'),
(181, 'PUTRA', 3, '2', 'KR1B', 2, 'II', 'SELASA', 'MP04', 'admin', '2017-09-16 00:00:00'),
(182, 'PUTRA', 3, '2', 'KR1B', 3, 'II', 'RABU', 'MP04', 'admin', '2017-09-16 00:00:00'),
(180, 'PUTRA', 3, '2', 'KR1B', 1, 'I', 'SENIN', 'MP04', 'admin', '2017-09-16 00:00:00'),
(189, 'PUTRA', 3, '2', 'KR1B', 1, 'IV', 'RABU', 'MP05', 'admin', '2017-09-16 00:00:00'),
(229, 'PUTRA', 7, '1', 'KR1A', 2, 'SUBUH', 'SELASA', 'TJDRORI', 'admin', '2017-09-23 00:00:00'),
(227, 'PUTRA', 7, '1', 'KR1A', 1, 'SORE', 'SENIN', 'MPSSORE', 'admin', '2017-09-23 00:00:00'),
(228, 'PUTRA', 7, '1', 'KR1A', 3, 'MAHGRIB', 'RABU', 'SLMTFQ', 'admin', '2017-09-23 00:00:00'),
(226, 'PUTRA', 7, '1', 'KR1A', 3, 'SORE', 'KAMIS', 'JRMYH', 'admin', '2017-09-23 00:00:00'),
(222, 'PUTRI', 7, '1', 'KR1A', 2, 'SUBUH', 'SENIN', 'MPSSORE', 'admin', '2017-09-23 00:00:00'),
(223, 'PUTRI', 7, '1', 'KR1A', 3, 'SORE', 'SELASA', 'TJDRORI', 'admin', '2017-09-23 00:00:00'),
(224, 'PUTRI', 7, '1', 'KR1A', 2, 'MAHGRIB', 'SABTU', 'SLMTFQ', 'admin', '2017-09-23 00:00:00'),
(225, 'PUTRI', 7, '1', 'KR1A', 1, 'SORE', 'JUMAT', 'JRMYH', 'admin', '2017-09-23 00:00:00'),
(236, 'PUTRI', 3, '2', 'KR1A', 2, 'VI', 'SELASA', 'MP01', 'admin', '2017-09-30 00:00:00');

--
-- Dumping data for table `trans_kurikulum`
--

INSERT INTO `trans_kurikulum` (`id_thn_ajar`, `tingkat`, `tipe_kelas`, `id_mapel`, `sm_1`, `sm_2`, `kategori`, `userid`, `recdate`) VALUES
('3', '1', 'INTENSIF', 'MPEK', '2', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '1', 'INTENSIF', 'MPSO', '2', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '1', 'INTENSIF', 'MP02', '0', '3', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '1', 'INTENSIF', 'MP01', '0', '3', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '1', 'INTENSIF', 'MPGEO', '0', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '1', 'INTENSIF', 'MPSJ', '0', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '1', 'INTENSIF', 'MP04', '0', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '1', 'INTENSIF', 'MP05', '0', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '1', 'INTENSIF', 'MPNI', '0', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '1', 'REGULER', 'MPEK', '0', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '1', 'REGULER', 'MPSO', '0', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '1', 'REGULER', 'MP02', '1', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '1', 'REGULER', 'MP01', '1', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '1', 'REGULER', 'MPGEO', '4', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '1', 'REGULER', 'MPSJ', '4', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '1', 'REGULER', 'MP04', '0', '5', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '1', 'REGULER', 'MP05', '0', '5', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '1', 'REGULER', 'MPNI', '0', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '2', 'REGULER', 'MPEK', '0', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '2', 'REGULER', 'MPSO', '0', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '2', 'REGULER', 'MP02', '0', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '2', 'REGULER', 'MP01', '0', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '2', 'REGULER', 'MPGEO', '0', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '2', 'REGULER', 'MPSJ', '0', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '2', 'REGULER', 'MP04', '0', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '2', 'REGULER', 'MP05', '0', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '2', 'REGULER', 'MPNI', '0', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '3', 'REGULER', 'MPEK', '0', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '3', 'REGULER', 'MPSO', '0', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '3', 'REGULER', 'MP02', '0', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '3', 'REGULER', 'MP01', '0', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '3', 'REGULER', 'MPGEO', '0', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '3', 'REGULER', 'MPSJ', '0', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '3', 'REGULER', 'MP04', '0', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '3', 'REGULER', 'MP05', '0', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('3', '3', 'REGULER', 'MPNI', '0', '0', 'UTAMA', 'admin', '2017-09-16 00:00:00'),
('7', '1', 'INTENSIF', 'MPSSORE', '1', '1', NULL, 'admin', '2017-09-23 00:00:00'),
('7', '1', 'INTENSIF', 'MPEKSORE2', '0', '0', NULL, 'admin', '2017-09-23 00:00:00'),
('7', '1', 'REGULER', 'MPSSORE', '0', '0', NULL, 'admin', '2017-09-23 00:00:00'),
('7', '1', 'REGULER', 'MPEKSORE2', '2', '2', NULL, 'admin', '2017-09-23 00:00:00'),
('7', '2', 'REGULER', 'MPSSORE', '3', '3', NULL, 'admin', '2017-09-23 00:00:00'),
('7', '2', 'REGULER', 'MPEKSORE2', '3', '3', NULL, 'admin', '2017-09-23 00:00:00'),
('7', '3', 'REGULER', 'MPSSORE', '1', '1', NULL, 'admin', '2017-09-23 00:00:00'),
('7', '3', 'REGULER', 'MPEKSORE2', '2', '2', NULL, 'admin', '2017-09-23 00:00:00'),
('7', '3', 'REGULER', 'TJDRORI', '0', '0', NULL, 'admin', '2017-09-23 00:00:00'),
('7', '2', 'REGULER', 'TJDRORI', '0', '0', NULL, 'admin', '2017-09-23 00:00:00'),
('7', '1', 'REGULER', 'TJDRORI', '0', '0', NULL, 'admin', '2017-09-23 00:00:00'),
('7', '1', 'INTENSIF', 'TJDRORI', '1', '2', NULL, 'admin', '2017-09-23 00:00:00'),
('7', '1', 'INTENSIF', 'SLMTFQ', '1', '2', NULL, 'admin', '2017-09-23 00:00:00'),
('7', '1', 'INTENSIF', 'JRMYH', '1', '2', NULL, 'admin', '2017-09-23 00:00:00'),
('7', '1', 'REGULER', 'SLMTFQ', '0', '0', NULL, 'admin', '2017-09-23 00:00:00'),
('7', '1', 'REGULER', 'JRMYH', '0', '0', NULL, 'admin', '2017-09-23 00:00:00'),
('7', '2', 'REGULER', 'SLMTFQ', '0', '0', NULL, 'admin', '2017-09-23 00:00:00'),
('7', '2', 'REGULER', 'JRMYH', '0', '0', NULL, 'admin', '2017-09-23 00:00:00'),
('7', '3', 'REGULER', 'SLMTFQ', '0', '0', NULL, 'admin', '2017-09-23 00:00:00'),
('7', '3', 'REGULER', 'JRMYH', '0', '0', NULL, 'admin', '2017-09-23 00:00:00');

--
-- Dumping data for table `trans_pembiayaan_siswa`
--

INSERT INTO `trans_pembiayaan_siswa` (`no_registrasi`, `pembiaya`, `biaya_perbulan_min`, `biaya_perbulan_max`, `penghasilan`) VALUES
('T38170001', 'AYAH', 1000000, 2000000, 3500000),
('T3817002', 'IBU', 34534, 34543, 345),
('CAArray170001', NULL, 0, 0, 0),
('T39170014', 'AYAH', 1000000, 1500000, 2000000),
('T39170013', 'AYAH', 1000000, 1500000, 2000000),
('A39170002', NULL, 0, 0, 0),
(NULL, NULL, 0, 0, 0),
('CT39170027', 'AYAH', 234234, 2342342, 234),
('CT39170028', 'AYAH', 234234, 234234, 234),
('A39170001', NULL, 0, 0, 0),
('A3917002', NULL, 0, 0, 0);

--
-- Dumping data for table `trans_rpp`
--

INSERT INTO `trans_rpp` (`id_rpp`, `id_thn_ajar`, `santri`, `semester`, `kode_kelas`, `id_mapel`, `userid`, `recdate`) VALUES
(7, 3, 'PUTRI', '1', 'KR1A', 'MPEK', 'admin', '2017-11-21 00:00:00');

--
-- Dumping data for table `trans_rpp_detail`
--

INSERT INTO `trans_rpp_detail` (`id_rpp_dtl`, `id_rpp`, `bulan`, `minggu`, `hari`, `hissos`, `materi_pokok`, `alokasi_waktu`, `TIU`, `jns_tagihan`) VALUES
(115, 7, 'JANUARI', 'I', 'SENIN', 'IV', 'بسيبسي', '45', '??????', '??????'),
(116, 7, 'JANUARI', 'I', 'RABU', 'II', '???', '45', 'يسبسيبس', '??????'),
(117, 7, 'JANUARI', 'II', 'SENIN', 'IV', '??????', '45', '??????', 'سيبؤرلا'),
(118, 7, 'JANUARI', 'II', 'RABU', 'II', '???????', '45', '?????', '??????'),
(119, 7, 'JANUARI', 'III', 'RABU', 'II', '??????', '45', '??????', '??????'),
(120, 7, 'JANUARI', 'III', 'SENIN', 'IV', '???????', '45', '???', '??????'),
(121, 7, 'JANUARI', 'IV', 'SENIN', 'IV', '??????', '45', '??????', '??????'),
(122, 7, 'JANUARI', 'IV', 'RABU', 'II', '???????', '45', '??????', '??????'),
(123, 7, 'FEBRUARI', 'I', 'SENIN', 'IV', '???????', '45', '??????', '??????'),
(124, 7, 'FEBRUARI', 'I', 'RABU', 'II', '?????', '45', '??????', '??????'),
(125, 7, 'FEBRUARI', 'II', 'SENIN', 'IV', '???????', '45', '??????', '??????'),
(126, 7, 'FEBRUARI', 'II', 'RABU', 'II', '???????', '45', '??????', 'لاؤرلاؤرلاؤر'),
(127, 7, 'FEBRUARI', 'III', 'SENIN', 'IV', 'ؤلاؤلا', '45', '??????', '??????'),
(128, 7, 'FEBRUARI', 'III', 'RABU', 'II', '???????', '45', 'ؤرلاؤرلا', '??????'),
(129, 7, 'FEBRUARI', 'IV', 'RABU', 'II', '???????', '45', '??????', '?????'),
(130, 7, 'FEBRUARI', 'IV', 'SENIN', 'IV', '???????', '45', '??????', '??????'),
(131, 7, 'MARET', 'I', 'SENIN', 'IV', '???????', '45', '??????', '??????'),
(132, 7, 'MARET', 'I', 'RABU', 'II', '???????', '45', '??????', '?????'),
(133, 7, 'MARET', 'II', 'SENIN', 'IV', '???????', '45', '????????????', '??????'),
(134, 7, 'MARET', 'II', 'RABU', 'II', '???????', '45', '??????', '??????'),
(135, 7, 'MARET', 'III', 'SENIN', 'IV', '???????', '45', '??????', '??????'),
(136, 7, 'MARET', 'III', 'RABU', 'II', '???????', '45', '??????', '??????'),
(137, 7, 'MARET', 'IV', 'SENIN', 'IV', '???????', '45', '??????', '??????'),
(138, 7, 'MARET', 'IV', 'RABU', 'II', '???????', '45', '??????', '??????');

--
-- Dumping data for table `trans_tabungan`
--

INSERT INTO `trans_tabungan` (`id`, `no_registrasi`, `tgl_tabungan`, `tipe`, `nominal`, `keterangan`, `userid`) VALUES
(3, 'T39170001', '2017-10-14', 'i', 10, 'test', 'admin'),
(4, '', '2017-10-14', 'i', 0, '', 'admin'),
(5, 'T39170002', '2017-10-14', 'i', 1000, 'oke', 'admin'),
(6, 'T39170001', '2017-10-14', 'i', 1, 'f', 'admin'),
(7, 'T39170001', '2017-10-14', 'i', 2323, 'ff', 'admin'),
(8, 'T38170001', '2017-10-21', 'i', 11, 'ff', 'admin'),
(9, 'T38170001', '2017-10-21', 'i', 213213, 'fds', 'admin'),
(10, 'T39170001', '2017-10-21', 'i', 1000, 'ok', 'admin'),
(11, 'T38170001', '2017-10-21', 'i', 999, 'fsasdf', 'admin'),
(13, 'T39170002', '2017-10-21', 'i', 50000, 'fds', 'admin'),
(14, 'T39170002', '2017-10-21', 'i', 80000, 'test', 'admin'),
(15, 'T39170002', '2017-10-21', 'i', 90000, 'sdf', 'admin'),
(16, 'T39170001', '2017-10-21', 'i', 100, 'fds', 'admin'),
(17, 'T38170001', '2017-10-21', 'i', 334444, 'test', 'admin'),
(18, 'T38170001', '2017-11-23', 'i', 10000, 'dana baru', 'admin'),
(19, 'T38170001', '2017-11-23', 'i', 1000, '', 'admin'),
(20, 'T38170001', '2017-11-23', 'i', 100000, '559667', 'admin'),
(21, 'T39170017', '2017-11-23', 'i', 10000, '', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
