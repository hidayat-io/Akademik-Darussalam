-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2018 at 06:11 PM
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
-- Dumping data for table `infaq_temp`
--

INSERT INTO `infaq_temp` (`id_donatur`, `saldo`, `recuser`, `recdate`) VALUES
(3, 7500000, 'admin', '2017-12-12 07:37:57'),
(5, 3500000, 'admin', '2017-12-12 07:33:32');

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
(265, 'admin', '2017-12-02 15:27:32', '::1'),
(266, 'admin', '2017-12-02 20:15:24', '::1'),
(267, 'admin', '2017-12-11 14:59:43', '::1'),
(268, 'admin', '2017-12-11 16:32:21', '::1'),
(269, 'admin', '2017-12-12 06:31:06', '::1'),
(270, 'admin', '2017-12-12 06:45:25', '::1'),
(271, 'admin', '2017-12-12 07:27:48', '::1'),
(272, 'admin', '2017-12-13 08:06:11', '::1'),
(273, 'admin', '2017-12-13 11:29:08', '::1'),
(274, 'admin', '2017-12-13 14:04:01', '::1'),
(275, 'admin', '2017-12-13 15:08:03', '::1'),
(276, 'admin', '2017-12-13 15:08:28', '::1'),
(277, 'admin', '2017-12-13 15:08:43', '::1'),
(278, 'admin', '2017-12-13 21:53:53', '::1'),
(279, 'admin', '2017-12-14 14:04:26', '::1'),
(280, 'admin', '2017-12-22 03:31:50', '::1'),
(281, 'admin', '2017-12-22 06:33:25', '::1'),
(282, 'admin', '2017-12-23 14:22:15', '::1'),
(283, 'admin', '2017-12-28 07:39:18', '::1'),
(284, 'admin', '2017-12-29 03:35:16', '::1'),
(285, 'admin', '2017-12-29 06:42:50', '::1'),
(286, 'admin', '2018-01-04 14:58:57', '::1'),
(287, 'admin', '2018-01-04 16:03:43', '::1'),
(288, 'admin', '2018-01-04 17:08:51', '::1');

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
(1, 'MP04', 2, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'd', 'admin', '2017-12-02 00:00:00'),
(2, 'MP02', 2, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'a', 'admin', '2017-12-02 00:00:00'),
(4, 'MP01', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'b', 'admin', '2017-12-13 00:00:00'),
(5, 'MP02', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'd', 'admin', '2017-12-02 00:00:00'),
(6, 'MP01', 2, 'Mana jawaban yang benar?!!', 'ini jawaban yang benar!!', 'ini juga jawaban yang benar!!', 'a dan b benar!!', 'semua salah!!', 'c', 'admin', '2017-12-02 00:00:00'),
(7, 'MP05', 4, 'ini adalah soal salah', 'iya soal itu memang salah', 'soal itu benar', 'soal ini sedikit benarnya', 'ini soal asalan', 'd', 'admin', '2017-12-13 00:00:00'),
(10, 'MP05', 4, 'ertert', 'tert', 'eerter', 'tert', 'erter', 'c', 'admin', '2017-12-13 00:00:00'),
(11, 'MP05', 4, 'ini adalah soal salah', 'iya soal itu memang salah', 'soal itu benar', 'soal ini sedikit benarnya', 'ini soal asalan', 'd', 'admin', '2017-12-13 00:00:00'),
(12, 'MP05', 4, 'ini adalah soal salah', 'iya soal itu memang salah', 'soal itu benar', 'soal ini sedikit benarnya', 'ini soal asalan', 'd', 'admin', '2017-12-13 00:00:00'),
(13, 'MP01', 2, 'Mana jawaban yang benar?!!', 'ini jawaban yang benar!!', 'ini juga jawaban yang benar!!', 'a dan b benar!!', 'semua salah!!', 'c', 'admin', '2017-12-02 00:00:00'),
(14, 'MP01', 2, 'Mana jawaban yang benar?!!', 'ini jawaban yang benar!!', 'ini juga jawaban yang benar!!', 'a dan b benar!!', 'semua salah!!', 'c', 'admin', '2017-12-02 00:00:00'),
(15, 'MP01', 2, 'Mana jawaban yang benar?!!', 'ini jawaban yang benar!!', 'ini juga jawaban yang benar!!', 'a dan b benar!!', 'semua salah!!', 'c', 'admin', '2017-12-02 00:00:00'),
(16, 'MP01', 2, 'Mana jawaban yang benar?!!', 'ini jawaban yang benar!!', 'ini juga jawaban yang benar!!', 'a dan b benar!!', 'semua salah!!', 'c', 'admin', '2017-12-02 00:00:00'),
(17, 'MP01', 2, 'Mana jawaban yang benar?!!', 'ini jawaban yang benar!!', 'ini juga jawaban yang benar!!', 'a dan b benar!!', 'semua salah!!', 'c', 'admin', '2017-12-02 00:00:00'),
(18, 'MP04', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'd', 'admin', '2017-12-02 00:00:00'),
(19, 'MP04', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'd', 'admin', '2017-12-02 00:00:00'),
(20, 'MP04', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'd', 'admin', '2017-12-02 00:00:00'),
(21, 'MP04', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'd', 'admin', '2017-12-02 00:00:00'),
(22, 'MP02', 2, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'a', 'admin', '2017-12-02 00:00:00'),
(23, 'MP02', 2, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'a', 'admin', '2017-12-02 00:00:00'),
(24, 'MP02', 2, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'a', 'admin', '2017-12-02 00:00:00'),
(25, 'MP02', 2, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'a', 'admin', '2017-12-02 00:00:00'),
(26, 'MP02', 2, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'a', 'admin', '2017-12-02 00:00:00'),
(27, 'MP02', 2, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'a', 'admin', '2017-12-02 00:00:00'),
(28, 'MP02', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'd', 'admin', '2017-12-02 00:00:00'),
(29, 'MP02', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'd', 'admin', '2017-12-02 00:00:00'),
(30, 'MP02', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'd', 'admin', '2017-12-02 00:00:00'),
(31, 'MP02', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'd', 'admin', '2017-12-02 00:00:00'),
(32, 'MP02', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'd', 'admin', '2017-12-02 00:00:00'),
(33, 'MP02', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'd', 'admin', '2017-12-02 00:00:00'),
(34, 'MP02', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'd', 'admin', '2017-12-02 00:00:00'),
(35, 'MP04', 2, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'd', 'admin', '2017-12-02 00:00:00'),
(36, 'MP04', 3, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'd', 'admin', '2017-12-02 00:00:00'),
(37, 'MP04', 3, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'd', 'admin', '2017-12-02 00:00:00'),
(38, 'MP04', 2, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'd', 'admin', '2017-12-02 00:00:00'),
(39, 'MP04', 2, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'd', 'admin', '2017-12-02 00:00:00'),
(40, 'MP04', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'd', 'admin', '2017-12-02 00:00:00'),
(41, 'MP01', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'b', 'admin', '2017-12-13 00:00:00'),
(42, 'MP01', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'b', 'admin', '2017-12-13 00:00:00'),
(43, 'MP01', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'b', 'admin', '2017-12-13 00:00:00'),
(44, 'MP01', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'b', 'admin', '2017-12-13 00:00:00'),
(45, 'MP01', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'b', 'admin', '2017-12-13 00:00:00'),
(46, 'MP01', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'b', 'admin', '2017-12-13 00:00:00'),
(47, 'MP01', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'b', 'admin', '2017-12-13 00:00:00'),
(48, 'MP01', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'b', 'admin', '2017-12-13 00:00:00'),
(49, 'MP01', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'b', 'admin', '2017-12-13 00:00:00'),
(50, 'MP05', 4, 'ini adalah soal salah', 'iya soal itu memang salah', 'soal itu benar', 'soal ini sedikit benarnya', 'ini soal asalan', 'd', 'admin', '2017-12-13 00:00:00'),
(51, 'MP05', 4, 'ini adalah soal salah', 'iya soal itu memang salah', 'soal itu benar', 'soal ini sedikit benarnya', 'ini soal asalan', 'd', 'admin', '2017-12-13 00:00:00'),
(52, 'MP05', 4, 'ini adalah soal salah', 'iya soal itu memang salah', 'soal itu benar', 'soal ini sedikit benarnya', 'ini soal asalan', 'd', 'admin', '2017-12-13 00:00:00'),
(53, 'MP05', 4, 'ini adalah soal salah', 'iya soal itu memang salah', 'soal itu benar', 'soal ini sedikit benarnya', 'ini soal asalan', 'd', 'admin', '2017-12-13 00:00:00'),
(54, 'MP05', 4, 'ini adalah soal salah', 'iya soal itu memang salah', 'soal itu benar', 'soal ini sedikit benarnya', 'ini soal asalan', 'd', 'admin', '2017-12-13 00:00:00'),
(55, 'MP05', 4, 'ini adalah soal salah', 'iya soal itu memang salah', 'soal itu benar', 'soal ini sedikit benarnya', 'ini soal asalan', 'd', 'admin', '2017-12-13 00:00:00'),
(56, 'MP05', 4, 'ini adalah soal salah', 'iya soal itu memang salah', 'soal itu benar', 'soal ini sedikit benarnya', 'ini soal asalan', 'd', 'admin', '2017-12-13 00:00:00'),
(57, 'MP05', 4, 'ini adalah soal salah', 'iya soal itu memang salah', 'soal itu benar', 'soal ini sedikit benarnya', 'ini soal asalan', 'd', 'admin', '2017-12-13 00:00:00'),
(58, 'MP04', 2, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'd', 'admin', '2017-12-02 00:00:00'),
(59, 'MP04', 2, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'd', 'admin', '2017-12-02 00:00:00'),
(60, 'MP04', 2, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'd', 'admin', '2017-12-02 00:00:00'),
(61, 'MP04', 4, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'd', 'admin', '2017-12-02 00:00:00'),
(62, 'MP04', 2, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'd', 'admin', '2017-12-02 00:00:00'),
(63, 'MP04', 6, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'd', 'admin', '2017-12-02 00:00:00'),
(64, 'MP04', 5, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'd', 'admin', '2017-12-02 00:00:00'),
(65, 'MP04', 2, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'd', 'admin', '2017-12-02 00:00:00'),
(66, 'MP04', 2, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'd', 'admin', '2017-12-02 00:00:00'),
(67, 'MP04', 2, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'd', 'admin', '2017-12-02 00:00:00'),
(68, 'MP01', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'b', 'admin', '2017-12-13 00:00:00'),
(69, 'MP01', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'b', 'admin', '2017-12-13 00:00:00'),
(70, 'MP01', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'b', 'admin', '2017-12-13 00:00:00'),
(71, 'MP01', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'b', 'admin', '2017-12-13 00:00:00'),
(72, 'MP01', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'b', 'admin', '2017-12-13 00:00:00'),
(73, 'MP01', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'b', 'admin', '2017-12-13 00:00:00'),
(74, 'MP01', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'b', 'admin', '2017-12-13 00:00:00'),
(75, 'MP01', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'b', 'admin', '2017-12-13 00:00:00'),
(76, 'MP01', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'b', 'admin', '2017-12-13 00:00:00');

--
-- Dumping data for table `ms_biaya_komponen`
--

INSERT INTO `ms_biaya_komponen` (`id_komponen`, `nama_komponen`, `tipe`, `userid`, `recdate`) VALUES
(4, 'TTRY', 'B', 'admin', NULL);

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
(4, 'DONATUR4', 'ALAMAT4', '0545454', 'AITAM_AR_RAHMAH', 'admin', '2017-09-16 00:00:00'),
(5, 'PEJUANG SUBUH', 'JAKARTA PUSAT', '021559889', 'AITAM_ISLAH ', 'admin', '2017-12-12 00:00:00');

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
(80, 0, 'udin', 'سصثبي', '', '510232051432MP04080', 'Bandung', '1952-06-17', 'l', 'dfgdf', '3634534', 'indonesia', 'dfg', '43534534', '', 'm', 'suhaidi', 'dfg', 'fgdg', '2017-12-18', 0, '', 'Pengabdian', NULL, NULL, NULL, 45345, '', NULL, NULL, 34234, 0, '', NULL, 'MP04', 'admin', '2017-12-13 15:56:30', 1, 0);

--
-- Dumping data for table `ms_guru_family`
--

INSERT INTO `ms_guru_family` (`id`, `id_guru`, `nama_anak`, `pendidikan`, `tanggal_lahir`) VALUES
(31, 53, 'anak', 'pendi', '2017-09-02'),
(32, 58, 'adong', 'Sarjana Muda', '1989-02-01'),
(33, 59, 'adong', 'Sarjana Muda', '1989-02-01'),
(34, 65, 'fdsafdsa', 'fsms', '2017-09-01'),
(35, 66, 'fdsaf', 'rrr', '2017-09-02'),
(38, 70, NULL, NULL, '0000-00-00'),
(80, 71, 'ds', 'ff', '2017-09-01'),
(81, 71, 'zz', 'zz', '2017-08-27'),
(82, 78, 'dfg', 'dfg', '2017-12-12');

--
-- Dumping data for table `ms_guru_gapok`
--

INSERT INTO `ms_guru_gapok` (`id_gapok`, `id_guru`, `nominal`, `userid`, `recdate`) VALUES
(4, 80, 34234, 'admin', '2017-12-13 15:56:30');

--
-- Dumping data for table `ms_guru_jabatan`
--

INSERT INTO `ms_guru_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Majelis Guru'),
(2, 'Sekertariat Pondok'),
(3, 'Database & Publikasi'),
(4, 'Adm & Tata Usaha');

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
-- Dumping data for table `ms_infaq`
--

INSERT INTO `ms_infaq` (`id_infaq`, `id_donatur`, `tgl_infaq`, `tipe`, `nominal`, `keterangan`, `userid`, `recdate`) VALUES
(52, 5, '2017-12-12', 'o', 1500000, 'untuk ini', 'admin', NULL),
(51, 5, '2017-12-12', 'i', 5000000, 'saldo awal', 'admin', NULL),
(53, 3, '2017-12-12', 'i', 7500000, 'sld awal', 'admin', NULL);

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
('A3917002', NULL, NULL, NULL, NULL, NULL),
('T39170019', '', '', '', '', '');

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
('TMI', 'T39170019', 20, 2017, NULL, NULL, NULL, NULL, '11223344', '51023205143239170019', 'AHDIAN', 'حغغفىلا ت', 'AHDIAN', 'NGOPI', 1000000, 113345587, 3355777, 'TANJUNG ENIM', '1989-07-10', 'KONSULAT 1', NULL, NULL, NULL, 'SUMATERA', 'INDONESIA', 'PERUMAHAN MEDANG', 'NO3 RT 003 RW 013', 'MEDANG', 'PAGEDANGAN', 'LEGOK', 'TANGERANG SELAT', 'BANTEN', 523314, 21558877, 2147483647, 'faritno@me.com', 'faritno@faceboo', 'TANJUNG EN', 'CoWhmFmcJ0nt3S5jbf5s.pdf', '5tzrpZTl8IQ06C1aEcx1.jpg', 'rAt6IRPZixfk4BkPnuaJ.pdf', '2bmJoaZ3jpFr8ls4HZZG.pdf', 'lLkvUG5fKbl8HfIS7kgG.PDF', 'QqBicZPU3YxgKSNz7Dey.pdf', 'vKUpKarTdnVbJkW1EuzD.pdf', 'NQrIxQDvHtJIDcQzbYyM.pdf');

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
(13, 'T39170017', 17000, '2017-12-23 15:43:45', 'admin');

--
-- Dumping data for table `santri_saldo`
--

INSERT INTO `santri_saldo` (`no_registrasi`, `saldo`, `recuser`, `recdate`) VALUES
('T38170001', 656167, 'admin', '2017-12-23 14:39:37'),
('T39170001', 171100, 'admin', '2017-10-21 15:52:01'),
('T39170002', 221000, 'admin', '2017-10-21 15:52:06'),
('T39170014', 3500, 'admin', '2017-12-23 14:39:37'),
('T39170017', 510000, 'admin', '2017-12-23 15:43:45');

--
-- Dumping data for table `sequence`
--

INSERT INTO `sequence` (`nama_field`, `nomor_terakhir`, `remark`) VALUES
('Stambuk_TMI', '20', NULL),
('noreg_TMI', 'T39170019', NULL),
('noreg_CalonTMI', 'CT39170028', NULL),
('noreg_CalonAITAM', 'CA39170006', NULL),
('noreg_AITAM', 'A39170003', NULL),
('no_reg_guru', '1', NULL);

--
-- Dumping data for table `trans_banksoaldt`
--

INSERT INTO `trans_banksoaldt` (`id_hd`, `id_soal`) VALUES
(2, 30),
(2, 28),
(2, 5),
(3, 6),
(3, 13),
(3, 14),
(3, 15),
(5, 2),
(5, 23),
(5, 24),
(6, 19),
(6, 20),
(6, 21),
(6, 40);

--
-- Dumping data for table `trans_banksoalhd`
--

INSERT INTO `trans_banksoalhd` (`id`, `kode_soal`, `kurikulum`, `semester`, `id_matpal`, `tingkat`, `user_id`, `recdate`) VALUES
(2, '4/1/MP02/1', NULL, NULL, NULL, NULL, 'admin', '2017-12-23 19:25:31'),
(3, '3/1/MP01/2', 3, 1, 'MP01', 2, 'admin', '2017-12-23 19:32:08'),
(5, '3/1/MP02/2', 3, 1, 'MP02', 2, 'admin', '2017-12-23 19:47:00'),
(6, '4/1/MP04/1', 4, 1, 'MP04', 1, 'admin', '2017-12-23 19:47:44');

--
-- Dumping data for table `trans_jadwal_pelajaran`
--

INSERT INTO `trans_jadwal_pelajaran` (`id_jadwal`, `santri`, `id_thn_ajar`, `semester`, `kode_kelas`, `id_guru`, `jam`, `hari`, `id_mapel`, `userid`, `recdate`) VALUES
(250, 'PUTRI', 3, '1', 'KR1A', 80, 'II', 'KAMIS', 'MPSO', 'admin', '2017-12-23 00:00:00'),
(251, 'PUTRI', 3, '1', 'KR1A', 80, 'I', 'SELASA', 'MPSO', 'admin', '2017-12-23 00:00:00'),
(245, 'PUTRA', 3, '1', 'KR1A', 80, 'II', 'SELASA', 'MPEK', 'admin', '2017-12-23 00:00:00'),
(249, 'PUTRI', 3, '1', 'KR1A', 80, 'IV', 'SENIN', 'MPEK', 'admin', '2017-12-23 00:00:00'),
(248, 'PUTRI', 3, '1', 'KR1A', 80, 'II', 'RABU', 'MPEK', 'admin', '2017-12-23 00:00:00'),
(254, 'PUTRA', 3, '2', 'KR1A', 80, 'VI', 'KAMIS', 'MP01', 'admin', '2017-12-23 00:00:00'),
(255, 'PUTRA', 3, '2', 'KR1A', 80, 'V', 'SABTU', 'MP01', 'admin', '2017-12-23 00:00:00'),
(253, 'PUTRA', 3, '1', 'KR1B', 80, 'II', 'SELASA', 'MP01', 'admin', '2017-12-23 00:00:00'),
(243, 'PUTRA', 3, '2', 'KR1B', 80, 'I', 'SENIN', 'MP04', 'admin', '2017-12-23 00:00:00'),
(229, 'PUTRA', 7, '1', 'KR1A', 2, 'SUBUH', 'SELASA', 'TJDRORI', 'admin', '2017-09-23 00:00:00'),
(227, 'PUTRA', 7, '1', 'KR1A', 1, 'SORE', 'SENIN', 'MPSSORE', 'admin', '2017-09-23 00:00:00'),
(228, 'PUTRA', 7, '1', 'KR1A', 3, 'MAHGRIB', 'RABU', 'SLMTFQ', 'admin', '2017-09-23 00:00:00'),
(226, 'PUTRA', 7, '1', 'KR1A', 3, 'SORE', 'KAMIS', 'JRMYH', 'admin', '2017-09-23 00:00:00'),
(222, 'PUTRI', 7, '1', 'KR1A', 2, 'SUBUH', 'SENIN', 'MPSSORE', 'admin', '2017-09-23 00:00:00'),
(223, 'PUTRI', 7, '1', 'KR1A', 3, 'SORE', 'SELASA', 'TJDRORI', 'admin', '2017-09-23 00:00:00'),
(224, 'PUTRI', 7, '1', 'KR1A', 2, 'MAHGRIB', 'SABTU', 'SLMTFQ', 'admin', '2017-09-23 00:00:00'),
(225, 'PUTRI', 7, '1', 'KR1A', 1, 'SORE', 'JUMAT', 'JRMYH', 'admin', '2017-09-23 00:00:00'),
(247, 'PUTRI', 3, '2', 'KR1A', 80, 'VI', 'SELASA', 'MP01', 'admin', '2017-12-23 00:00:00');

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
(21, 'T39170017', '2017-11-23', 'i', 10000, '', 'admin'),
(22, 'T39170014', '2017-12-23', 'o', 3500, NULL, 'admin'),
(23, 'T38170001', '2017-12-23', 'o', 3500, NULL, 'admin'),
(24, 'T39170017', '2017-12-23', 'i', 500000, 'dari bapaknya', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
