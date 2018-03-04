-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2018 at 06:00 PM
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
(288, 'admin', '2018-01-04 17:08:51', '::1'),
(289, 'admin', '2018-01-06 13:13:03', '::1'),
(290, 'admin', '2018-01-08 03:28:03', '::1'),
(291, 'admin', '2018-01-08 16:21:04', '::1'),
(292, 'admin', '2018-01-09 06:27:38', '::1'),
(293, 'admin', '2018-01-10 00:54:58', '::1'),
(294, 'admin', '2018-01-11 03:33:48', '::1'),
(295, 'admin', '2018-01-11 07:14:06', '::1'),
(296, 'admin', '2018-01-12 01:33:08', '::1'),
(297, 'admin', '2018-01-12 06:28:30', '::1'),
(298, 'admin', '2018-01-12 06:46:32', '::1'),
(299, 'admin', '2018-01-12 10:03:57', '::1'),
(300, 'admin', '2018-01-12 14:57:48', '::1'),
(301, 'admin', '2018-01-13 05:56:09', '::1'),
(302, 'admin', '2018-01-14 07:54:09', '::1'),
(303, 'admin', '2018-01-14 11:40:11', '::1'),
(304, 'admin', '2018-01-15 02:28:29', '::1'),
(305, 'admin', '2018-01-15 15:10:14', '::1'),
(306, 'admin', '2018-01-16 02:07:21', '::1'),
(307, 'admin', '2018-01-18 03:42:17', '::1'),
(308, 'admin', '2018-01-20 03:56:53', '::1'),
(309, 'admin', '2018-01-24 15:22:38', '::1'),
(310, 'admin', '2018-01-25 15:05:05', '::1'),
(311, 'admin', '2018-01-27 06:26:33', '::1'),
(312, 'admin', '2018-01-30 05:04:42', '::1'),
(313, 'admin', '2018-01-30 14:13:42', '::1'),
(314, 'admin', '2018-02-01 02:37:05', '::1'),
(315, 'admin', '2018-02-01 07:55:44', '::1'),
(316, 'admin', '2018-02-02 06:08:32', '::1'),
(317, 'admin', '2018-02-04 13:38:17', '::1'),
(318, 'admin', '2018-02-06 01:16:25', '::1'),
(319, 'admin', '2018-02-07 02:06:06', '::1'),
(320, 'admin', '2018-02-07 08:09:06', '::1'),
(321, 'admin', '2018-02-12 06:15:51', '::1'),
(322, 'admin', '2018-02-13 07:25:21', '::1'),
(323, 'admin', '2018-02-13 15:45:04', '::1'),
(324, 'admin', '2018-02-13 22:07:22', '::1'),
(325, 'admin', '2018-02-15 03:20:43', '::1'),
(326, 'admin', '2018-02-17 12:22:51', '::1');

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
(76, 'MP01', 1, 'Mana jawaban yang benar?', 'ini jawaban yang benar', 'ini juga jawaban yang benar', 'a dan b benar', 'semua salah', 'b', 'admin', '2017-12-13 00:00:00'),
(77, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2018-01-08 00:00:00');

--
-- Dumping data for table `ms_bebanguru`
--

INSERT INTO `ms_bebanguru` (`id_guru`, `jml_beban`, `id_thn_ajar`, `semester`, `userid`, `recdate`) VALUES
(33, 15, 3, 2, 'admin', '2018-01-09 07:09:04'),
(72, 20, 3, 2, 'admin', '2018-01-08 16:57:04');

--
-- Dumping data for table `ms_biaya`
--

INSERT INTO `ms_biaya` (`id`, `kategori`, `nama_item`, `nominal`) VALUES
(82, 'S', '11', 275000),
(83, 'S', '12', 150000),
(84, 'S', '13', 170000),
(85, 'S', '14', 300000),
(86, 'S', '15', 50000),
(125, 'B', '8', 400000),
(126, 'B', '9', 200000),
(127, 'B', '16', 250000);

--
-- Dumping data for table `ms_biaya_komponen`
--

INSERT INTO `ms_biaya_komponen` (`id_komponen`, `nama_komponen`, `tipe`, `isActive`, `userid`, `recdate`) VALUES
(8, 'MAKAN', 'B', 1, 'admin', '2018-01-12 06:05:13'),
(9, 'INFAQ', 'B', 1, 'admin', '2018-01-12 06:05:15'),
(11, 'LISTRIK', 'S', 1, 'admin', '2018-01-12 06:05:17'),
(12, 'OPPD & KESEHATAN', 'S', 1, 'admin', '2018-01-12 06:05:19'),
(13, 'EVALUASI BELAJAR', 'S', 1, 'admin', '2018-01-12 06:05:21'),
(14, 'PEMBANGUNAN PONDOK', 'S', 1, 'admin', '2018-01-12 06:05:23'),
(15, 'FIGUR', 'S', 1, 'admin', '2018-01-12 06:05:25'),
(16, 'ALAT TULIS', 'B', 1, 'admin', '2018-01-20 04:24:39');

--
-- Dumping data for table `ms_biaya_potongan`
--

INSERT INTO `ms_biaya_potongan` (`id_potongan`, `nama_potongan`, `persen`, `nominal`, `userid`, `rec_date`) VALUES
(51, 'SANTRI LOKAL', 10, 300000, 'admin', '2018-01-24 15:52:58'),
(52, 'ANAK GURU', 30, 500000, 'admin', '2018-01-24 15:53:20');

--
-- Dumping data for table `ms_bidang_study`
--

INSERT INTO `ms_bidang_study` (`id_bidang`, `nama_bidang`, `kategori`, `userid`, `recdate`) VALUES
('BS01', 'IPA', 'UTAMA', 'admin', '2017-08-19 00:00:00'),
('BS02', 'IPS', 'UTAMA', 'admin', '2017-08-19 00:00:00'),
('BS03', 'ILMU PASTI', 'UTAMA', 'admin', '2017-08-13 00:00:00'),
('BSSORE01', 'PELAJARAN SORE', 'SORE', 'admin', '2017-08-19 00:00:00'),
('KTBSLF', 'KITAB SALAF', 'KITAB', 'admin', '2017-09-23 00:00:00'),
('BDBAHASA', 'BAHASA', 'UTAMA', 'admin', '2018-01-20 00:00:00');

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
('A39170001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('A3917002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('T39180001', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0000, '');

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

INSERT INTO `ms_guru` (`id_guru`, `no_reg`, `nama_lengkap`, `nama_arab`, `no_ptk`, `nig`, `tempat_lahir`, `tanggal_lahir`, `jns_kelamin`, `no_kk`, `no_ktp`, `kewarganegaraan`, `alamat`, `no_telepon`, `email`, `status_nikah`, `nama_ayah`, `nama_ibu`, `nama_pasangan`, `tgl_pasangan`, `jml_anak`, `akademik`, `status`, `pendidikan_terakhir`, `mengajar_start`, `mengajar_end`, `id_alumni`, `no_sk`, `tgl_sk`, `file_sk`, `gapok`, `masa_abdi`, `sertifikasi`, `file_sertifikasi`, `materi_diampu`, `userid`, `recdate`, `status_aktif`, `is_delete`, `is_pengajar`) VALUES
(1, 3, 'توفيق', 'توفيق', '', '', '', NULL, 'l', '', 'dd', '', '', '', '', NULL, '', '', '', NULL, 0, '', 's', NULL, NULL, NULL, 0, '', NULL, NULL, NULL, 0, '', NULL, '', 'admin', '2017-09-01 06:30:20', 1, 0, 0),
(2, 4, 'gfdsg', 'توفيق', '', '', '', NULL, 'l', '', 'gg', '', '', '', '', NULL, '', '', '', NULL, 0, '', 's', NULL, NULL, NULL, 0, '', NULL, NULL, NULL, 0, '', NULL, '', 'admin', '2017-09-01 06:37:36', 1, 0, 0),
(3, 5, 'gfdsg', 'توفيق', '', '', '', NULL, 'l', '', 'gg', '', '', '', '', NULL, '', '', '', NULL, 0, '', 's', NULL, NULL, NULL, 0, '', NULL, NULL, NULL, 0, '', NULL, '', 'admin', '2017-09-01 06:37:50', 1, 0, 0),
(4, 6, 'PRKBeZX7uD', 'هدايت', 'B8WqLmYZaa', '4qXQYyrzhL', 'IRKayZWK9M', '0000-00-00', 'l', 'ARlU4cZX6M', 'JdDikx85eC', 'OVoy48DJRO', 'P2nj3t8unw', 'AenmE7INaw', '2F9Kx8KKTv', NULL, 'Sj6kYalvuA', 'vFi6ePdl8b', 'sYp2uz9PDb', '0000-00-00', 0, '5K8uLXuSQX', 's', NULL, '0000-00-00', '0000-00-00', 0, 'AmX1i14VlV', '0000-00-00', NULL, NULL, 0, 'aDbK1bon19', NULL, '353TQimwoU', 'admin', '2017-09-01 09:38:21', 1, 0, 0),
(5, 7, 'RoGA9ca34y', 'IV6AyZ5rKt', 'WJJvfk6TIH', 'ew7Jtadsro', 'KwAkP9QuvA', '0000-00-00', 'l', 't0nifm1TTl', 'DMRCpossh1', '5cieQEhvrz', 'OqYkE1uXMr', 'yQJnN14XrJ', 'ctucLndjtg', NULL, '4mOgCXQany', 'kx9MwrYFQd', 'UCZiLlk4Xr', '2017-09-01', 2, 'EralqZGcCw', 'm', NULL, '2017-09-01', '2017-09-01', 0, 'taRPDvA4Lw', '2017-09-25', NULL, NULL, 8, '6jD84jaN8W', NULL, 'wrdwsdya9h', 'admin', '2017-09-01 09:43:11', 1, 0, 0),
(6, 8, 'RoGA9ca34y', 'IV6AyZ5rKt', 'WJJvfk6TIH', 'ew7Jtadsro', 'KwAkP9QuvA', '2017-09-11', 'l', 't0nifm1TTl', 'DMRCpossh1', '5cieQEhvrz', 'OqYkE1uXMr', 'yQJnN14XrJ', 'ctucLndjtg', NULL, '4mOgCXQany', 'kx9MwrYFQd', 'UCZiLlk4Xr', '2017-09-01', 2, 'EralqZGcCw', 'm', NULL, '2017-09-01', '2017-09-01', 0, 'taRPDvA4Lw', '2017-09-25', NULL, NULL, 8, '6jD84jaN8W', NULL, 'wrdwsdya9h', 'admin', '2017-09-01 09:43:38', 1, 0, 0),
(7, 9, 'kPcDgttpQc', 'JoRJexVhAf', 'moBNEqlYST', 'I3RhlZJJPW', 'jBi0ZyWyKZ', '2017-09-01', 'l', 'UagvwQRiOF', '9xeBE7bvwQ', '2QHQaPw2Do', '77Rfw0Btiw', '8Acc5LH5NJ', 'V2O0ODs067', NULL, 'xpdMCTz8ye', 'Wy3UeEGHPm', 'x6tiSiMZFJ', '2017-09-01', 0, 'ui4b3NV0M4', 'm', NULL, '2017-09-01', '2017-09-01', 0, '38ICHxoezf', '2017-09-01', NULL, NULL, 6, 'kiddh1TUtx', NULL, 'hf3FQsFeEC', 'admin', '2017-09-01 18:08:14', 1, 0, 0),
(8, 10, 'kalakdf', 'هنا', '', '', '', NULL, 'l', '', '90000', '', '', '', '', NULL, '', '', '', NULL, 0, '', 's', NULL, NULL, NULL, 0, '', NULL, NULL, NULL, 0, '', NULL, 'PuRJyFAbrS', 'admin', '2017-09-01 18:11:30', 1, 0, 1),
(10, 12, 'J8E9vsZ4EW', 'QRD6DH2fg0', 'mivhemZKSV', 'eBTP1OQD0m', 'L3ImTJ6KB6', NULL, 'l', 'qJgywsY3Du', '85ZoWRXWgR', 'HJpH8G7X4f', 'Qe4E7kcfrJ', 'HEXdsu6VV0', 'RwdK3mv29a', NULL, '1gLnuVXnOP', 'uiqF65Sopc', 'rxEVykeELM', NULL, 0, 'Z0UK2bNrUx', '', NULL, NULL, NULL, 0, '0L9a96Xp1z', NULL, NULL, NULL, 0, 'qFgBGPdSlW', NULL, 'gB5ZWHcNRt', 'admin', '2017-09-02 11:49:05', 1, 0, 0),
(11, 13, 'A63wzcbBLN', 'wQgzHuafQq', 'nTPpcz6Jcz', 'de3yXy3P9P', 'HPDZlrNliz', NULL, 'l', 'ySa2fg9wis', 'K5IF4nRBTe', 'IJYmhs45O9', 'DOMVJOkSwj', 'RwtJSI8loO', 'ytPlGscw30', NULL, 'UNO7pcxcrr', 'fLzqxzVdUO', 'MvFMvHpi1k', NULL, 0, 'zJjVWlXtGw', '', NULL, NULL, NULL, 0, 'vvbmYFM2Ui', NULL, NULL, NULL, 0, '3Tq7GSIFbN', NULL, 'PuRJyFAbrS', 'admin', '2017-09-02 11:50:15', 1, 0, 1),
(12, 14, 'j6J5HM2dTB', 'o0N2AuqxS8', '4XI5InSPDw', 'kV0KJxbebu', 'ZUhMLMxN5y', NULL, 'l', 't2KdeFt6q7', 'kQAkr5rRHM', 'BSiOx5swRV', 'KcoBRyYvGE', 'ADdfMipdip', 'jU3Igy8bhn', NULL, 'Xv5rU8uuQA', 'UQT9jeAwff', 'DApuZAKSFU', NULL, 0, 'mEMfxxQVw5', '', NULL, NULL, NULL, 0, '19oO8B3CUX', NULL, NULL, NULL, 0, 'sM0sB2bWE5', NULL, 's2ki9J2GWY', 'admin', '2017-09-02 11:52:20', 1, 0, 0),
(13, 15, 'eNumxD5dAS', 'adYO7SkUV3', 'jm023lv4wM', 'qyIlvyULjh', 'C1lhSR61vd', NULL, 'l', 'ESK3W3CeBW', 'd57ZuaIwkA', '8hzMlUdT2U', 'to8mxuqoXP', 'LDxrlP7jag', 'YTFQoz9kJi', NULL, 'R86XHjLKtT', 'YmcFK7c1fz', 'fXqWd0r3yE', NULL, 0, 'lWb4q0MdCW', '', NULL, NULL, NULL, 0, 'HGWVBYMmka', NULL, NULL, NULL, 0, 'd4WrClj1Wl', NULL, 'Hoaz6OWzV5', 'admin', '2017-09-02 11:53:03', 1, 0, 1),
(14, 16, 'WvP7taaoyN', 'WPCGU3Nmcd', '8TZVBlnBCn', '899KIDO0G3', 'I5OBjbOjU2', NULL, 'l', '0szvFYURiB', 'BxfD0Yj38F', 'od2sDYEXzI', '9rjdkjK6Kg', 'Ibu1EdP2Ak', 'Tohdl7h2ta', NULL, 'SdkmBDF1bb', 'BGLjN3UWNd', 'XroHMrRAZ0', NULL, 5, 'KEDilw1Sm4', '', NULL, NULL, NULL, 0, 'ptHDOiPNuo', NULL, NULL, NULL, 0, 'uqCsPTACNv', NULL, 'JsElC25us3', 'admin', '2017-09-02 11:53:28', 1, 0, 1),
(15, 17, 'fJUEsgd5eu', 'fT0fMSFBE9', 'VUz3T1WUPX', 'WKyWbXelyD', 'FGbkWouRkl', NULL, 'l', 'JWFPa4O22s', 'UtakwAwHqh', 'L8izBXgesM', 'l5MHdxjypz', '9opsaNjRBV', 'a3jVfylZbQ', 's', '5ioTZ8NLZU', 'Ncw8pdNCtC', 'Vn4gBLwCY5', NULL, 0, '5Say2piHF9', 'Pengabdian', NULL, NULL, NULL, 0, 'ksiEQ0LZgR', NULL, NULL, NULL, 7, 'r5aVzLS5tR', NULL, 'ZUv6Cl8ehR', 'admin', '2017-09-02 12:16:53', 1, 0, 0),
(16, 18, 'xI4fGl1RAG', 'YK0tvS1afR', 'raAS91Uu9I', 'sCsMKfgxyX', 'CM1WUAV4aI', NULL, 'l', 'Wu68X7LVFV', 'HMS8tAI7lv', 'VaebMbk7Pd', 'I3Q8L0seRT', 'wVraIFgpfz', 'Dq5px2CrMz', 's', 'QkRiipwcrb', 'ZNvCkvGuJM', '2v3krFEOGs', NULL, 2, '3tH6JuF0nl', '', NULL, NULL, NULL, 0, 'CvNPCzSlXY', NULL, NULL, NULL, 0, 'dSYayfL0XE', NULL, '7cTV0Z4DsJ', 'admin', '2017-09-02 12:19:01', 1, 0, 0),
(17, 19, 'n9HKeD9ezn', 'fqXSzHqRDU', 'Cv8JapoHJX', 'D7BkZ0FRZX', 'GZPVFoOBOv', NULL, 'l', 'u4MeCCh5WN', 'EPGiJRMqgL', 'DuZoJTAqpX', 'hV1n8WghXv', 'I8lJUBtSVg', 'gmCiTrZhoC', 's', 'ncmPrRRCSD', 'rJVviBrtH4', 'O2JC4skKh7', NULL, 0, 'p1KPgItzsZ', '', NULL, NULL, NULL, 0, 'SEEhmNfsIo', NULL, NULL, NULL, 0, 'eq5KBVAgeT', NULL, 'CMHd8lr2do', 'admin', '2017-09-02 12:32:27', 1, 0, 1),
(18, 20, 'AWlVGXAl8d', 'iB8aKEHqJW', 'rOf65FBEEU', 'lkpnWp4Q0u', '3kp5R4fMYa', NULL, 'l', '7ImNdd2sst', 'lJyS2ZVPfh', 'iAQUPt59uH', 'ZYo6wjmgRw', '3nbpbmVFkN', 'seXAZ5qZcG', 's', 'etsni8YnqX', 'Lomir1WfOr', 'oO0cVya79Q', NULL, 2, 'sM6Rx2qswo', '', NULL, NULL, NULL, 0, 'HWskjj1LJb', NULL, NULL, NULL, 0, 'oYLT9KuDOV', NULL, 'Ribuol0cUj', 'admin', '2017-09-02 12:33:51', 1, 0, 0),
(20, 21, 'rGeM252l2k', 'sgOCqVM8tk', 'ZQoiykN4Tx', '0MMYH8NGNR', 'GJaCwKreZ2', NULL, 'l', 'GFKdNyz1jq', 'VzVgszSFBg', '2OC3EQBRmc', 'cikKpmc6rf', 'DJcSsA2Jjz', '1prxbnggfs', 's', 'qIJD7F5Eoy', 'dT0YAg9PiI', 'tM1HnuQLnB', NULL, 0, '3gmYYqBG36', '', NULL, NULL, NULL, 8, 'uGInQmnIMD', NULL, NULL, NULL, 0, 'daVPkL7I1B', NULL, 'gfRHUJais9', 'admin', '2017-09-02 18:42:26', 1, 0, 1),
(21, 22, '0GI3LgEfhl', 'IdMTkxWKzE', 'Fmg6AdltZB', 'WnqdoS0HrM', 'lGcECJZzpL', NULL, 'l', '9oq1VxeQTn', 'MN3DJJhyP3', 'QzBII9JXE8', '9VqYveVI8b', '3gvTuKDjv2', 'xHq0mvNGTX', 's', 'CR0TZXsbmf', 'ppawKZCGix', 'DzXItjYtqq', NULL, 0, '5gdo5aGMt5', '', NULL, '2017-09-01', NULL, 0, 'e7Unusf9c0', NULL, NULL, NULL, 0, 'cxmPJFkuML', NULL, 'HA7XAGczon', 'admin', '2017-09-02 18:46:40', 1, 0, 0),
(22, 23, 'nPYjlM7JJc', '0btbh8nsOd', 'wqMR4CCkmx', 'X07iEoPYZI', 'ScNKpSqBUi', NULL, 'l', 'jKDkhz4zbF', '6HXrEwLMHh', 'xW6QZ1tILH', 'z5JdxkBVxB', 'tv4C4oy2FX', 'MGDABhQUGi', 's', 'yooVJ7vKn8', 'opHu2doPF2', '2Spnj4xbUH', NULL, 0, '88GWwyyhM5', '', NULL, '2017-09-01', NULL, 0, '87eu9SoPOO', NULL, NULL, NULL, 0, 'wXqNFmTiEi', NULL, 'sTf87yqjwP', 'admin', '2017-09-02 18:54:38', 1, 0, 0),
(23, 24, 'IXdsmmW1NJ', 'oepli1gjzZ', 'h8XGl3ArbV', 'dmCtruZWph', 'INmYLx94zI', NULL, 'l', 'nUxO6v3sYv', 'Gpt1UmASmO', 'bkXgkBd9Eq', 'U975mwY6ku', '7MNPkqFvkQ', 'Ds9qJlGjCc', 's', 'GrZ02Ojwsj', 'oU8o21R18h', 'EjfGHKV1gB', NULL, 0, 'DhlEve8l8U', '', NULL, '2017-09-01', NULL, 0, 'X6Gw9GOD56', NULL, NULL, NULL, 0, 'pj5d0Vcl0H', NULL, '3n3egR4Si3', 'admin', '2017-09-02 19:01:30', 1, 0, 1),
(24, 25, 'MiqCxnxjsz', 'uFpy7ZpLvd', 'TbAKrHisHs', 'hoI26xet9b', 'xzqxVbxJhc', NULL, 'l', 'e3GaBDqVQS', 'dmYW4gxO3B', 'fYJRZBT2IQ', 'vAD3GRI3sP', 'sLjYkGGA9d', 'lxI1reL7FO', 's', 'ln7t4mpGSG', 'VEMWNXxi7Y', 'CbFX5tmCZn', NULL, 0, 'QYwvas8VXR', '', NULL, '2017-09-01', NULL, 0, '2qu8cqbtI1', NULL, NULL, NULL, 0, 'BJnZ0kuuur', NULL, 'PZQv7a9nzF', 'admin', '2017-09-02 19:01:53', 1, 0, 0),
(25, 26, 'XeIJoIqfcP', 'vDjCTDdKCl', 'nTiaIDNSr1', 'WDHtVIgrDG', 'NMOmxabasM', NULL, 'l', '2P9Yhh63oA', '2PIGuKQQaV', '33svK1d5Co', 'FEQwLA5FGi', 'Zm6m2z2ZXu', 'wHUmxf1gOV', 's', 'eEU0ZhgDYk', 'rNPYgO5HBk', 'YqlmGpuL3R', NULL, 2, 'GrlPPgobZA', '', NULL, '2017-09-01', NULL, 0, 'l3T2JDzWKv', NULL, NULL, NULL, 0, 'f45cAaZYqo', NULL, 'edTbhR82oF', 'admin', '2017-09-02 19:24:43', 1, 0, 0),
(26, 27, 'XeIJoIqfcP', 'vDjCTDdKCl', 'nTiaIDNSr1', 'WDHtVIgrDG', 'NMOmxabasM', NULL, 'l', '2P9Yhh63oA', '2PIGuKQQaV', '33svK1d5Co', 'FEQwLA5FGi', 'Zm6m2z2ZXu', 'wHUmxf1gOV', 's', 'eEU0ZhgDYk', 'rNPYgO5HBk', 'YqlmGpuL3R', NULL, 2, 'GrlPPgobZA', '', NULL, '2017-09-01', NULL, 0, 'l3T2JDzWKv', NULL, NULL, NULL, 0, 'f45cAaZYqo', NULL, 'edTbhR82oF', 'admin', '2017-09-02 19:26:57', 1, 0, 1),
(27, 28, 'XeIJoIqfcP', 'vDjCTDdKCl', 'nTiaIDNSr1', 'WDHtVIgrDG', 'NMOmxabasM', NULL, 'l', '2P9Yhh63oA', '2PIGuKQQaV', '33svK1d5Co', 'FEQwLA5FGi', 'Zm6m2z2ZXu', 'wHUmxf1gOV', 's', 'eEU0ZhgDYk', 'rNPYgO5HBk', 'YqlmGpuL3R', NULL, 2, 'GrlPPgobZA', '', NULL, '2017-09-01', NULL, 0, 'l3T2JDzWKv', NULL, NULL, NULL, 0, 'f45cAaZYqo', NULL, 'edTbhR82oF', 'admin', '2017-09-02 20:10:06', 1, 0, 0),
(28, 29, 'XeIJoIqfcP', 'vDjCTDdKCl', 'nTiaIDNSr1', 'WDHtVIgrDG', 'NMOmxabasM', NULL, 'l', '2P9Yhh63oA', '2PIGuKQQaV', '33svK1d5Co', 'FEQwLA5FGi', 'Zm6m2z2ZXu', 'wHUmxf1gOV', 's', 'eEU0ZhgDYk', 'rNPYgO5HBk', 'YqlmGpuL3R', NULL, 2, 'GrlPPgobZA', '', NULL, '2017-09-01', NULL, 0, 'l3T2JDzWKv', NULL, NULL, NULL, 0, 'f45cAaZYqo', NULL, 'edTbhR82oF', 'admin', '2017-09-02 20:13:24', 1, 0, 1),
(29, 30, 'Tj8pBY8bjm', 'dG0cyePhd8', 'L0qEr6r7Gx', 'tGnRdv04cG', 'V1cEabUzED', NULL, 'l', '9WQBMYQHVD', 'KTiooez6sn', 'OxhTemsi3l', 'JNACUGxTV8', 'rLv5ywSnP4', '4SdTzoYbP7', 's', 'MLLYhY33iZ', 'gcOjTOnSkX', 'J4cA9ilelC', NULL, 8, 'r2FF1hDsNj', '', NULL, '2017-09-01', NULL, 0, 'BiJGCQY8bs', NULL, NULL, NULL, 6, '3kF51xi0F2', NULL, 'mdlBmkh8Hu', 'admin', '2017-09-02 20:41:58', 1, 0, 1),
(30, 31, 'Tj8pBY8bjm', 'dG0cyePhd8', 'L0qEr6r7Gx', 'tGnRdv04cG', 'V1cEabUzED', NULL, 'l', '9WQBMYQHVD', 'KTiooez6sn', 'OxhTemsi3l', 'JNACUGxTV8', 'rLv5ywSnP4', '4SdTzoYbP7', 's', 'MLLYhY33iZ', 'gcOjTOnSkX', 'J4cA9ilelC', NULL, 8, 'r2FF1hDsNj', '', NULL, '2017-09-01', NULL, 0, 'BiJGCQY8bs', NULL, NULL, NULL, 6, '3kF51xi0F2', NULL, 'mdlBmkh8Hu', 'admin', '2017-09-02 20:42:55', 1, 0, 0),
(31, 32, 'Tj8pBY8bjm', 'dG0cyePhd8', 'L0qEr6r7Gx', 'tGnRdv04cG', 'V1cEabUzED', NULL, 'l', '9WQBMYQHVD', 'KTiooez6sn', 'OxhTemsi3l', 'JNACUGxTV8', 'rLv5ywSnP4', '4SdTzoYbP7', 's', 'MLLYhY33iZ', 'gcOjTOnSkX', 'J4cA9ilelC', NULL, 8, 'r2FF1hDsNj', '', NULL, '2017-09-01', NULL, 0, 'BiJGCQY8bs', NULL, NULL, NULL, 6, '3kF51xi0F2', NULL, 'mdlBmkh8Hu', 'admin', '2017-09-02 20:43:15', 1, 0, 1),
(32, 33, 'PGZah9obz6', 'iHiLpIJnkJ', 'OCx4WX9mXf', 'K6vZpUkRz2', 'D36i8svGrR', NULL, 'l', 'RpKwwGoVfu', 'jIGWUKAGpY', 'llcpNpZ0ki', '8vLplsEqwo', 'sYR5dNETKf', 'Oonea39TTG', 's', 'qQTLPrLrIO', '1y25yPMdlb', 'u5fcoOLhQc', NULL, 0, 'mJkkjcjUbj', '', 'w6Mzq0KbUl', '2017-09-01', NULL, 0, 'ptXJyqfq44', NULL, NULL, NULL, 0, 'UJgaFEEfZX', NULL, 'OY1fGiZXYb', 'admin', '2017-09-02 20:44:18', 1, 0, 1),
(33, 34, 'VrHLUvNlJE', 'g1tLuvERmX', 'olkIYL9Jjc', 'Gw15JdLGqf', 'c435VNbZQu', NULL, 'l', '1NIFoLcHYG', 'zQiWdlgGOB', 'mO5DFV1tNH', 'cBfhYPjBbH', '6czolzfvd3', 'wqeCKvNajU', 's', 'WBfaUSQLdf', 'hTDAZ4Tvc7', 'YMRVW7XGyh', NULL, 0, '408AOELVwK', '', 'w6Mzq0KbUl', '2017-09-01', NULL, 0, 'cxryI8OuGh', NULL, NULL, NULL, 0, 'bGED0lPWGx', NULL, 'crdDDDCvkj', 'admin', '2017-09-02 20:45:34', 1, 0, 1),
(36, 37, 'RsQjhbhkpz', 'yHMWVJrast', 'jiFQmYfBjt', '0LjABMNmas', '3CrGBVWVuo', NULL, 'l', '06MAffF29g', 'zlwRoX9Q4Q', 'R2cwsZeUkA', 'obBIBfiwGD', 'rQ5JyucIhP', 'uR7DLQ0Wdx', 's', 'IGKnzvf4We', 'YA5o8qxlVk', 'AwmSB0OY6Q', NULL, 0, 'NNH9HB5MYK', '', 'w6Mzq0KbUl', '2017-09-01', NULL, 0, 'ncXVEI11CS', NULL, NULL, NULL, 0, 'ghJW092XJ4', NULL, 'rxZshVah1a', 'admin', '2017-09-02 20:48:52', 1, 0, 1),
(37, 38, 'qWNM1xd8hg', 'xCOJmJoTiq', 'M6AW8GMIcv', 'W5GOEscg1O', 'EIUYDBCk3Q', NULL, 'l', 'khW0MJ6utK', 'xKEWouwdIb', 'yhYDQ8uyMX', 'OUJam9D63F', 'RXjXlSSP5s', 'zEnKPrM9Z6', 's', 'TmNnI699ZR', 'IcgkAnDaZq', 'x7N4w7HqLY', NULL, 0, '0PfOO5rbcn', '', 'w6Mzq0KbUl', '2017-09-01', NULL, 0, 'RVAU1UAl8w', NULL, NULL, NULL, 0, 'AMYLPhMSRG', NULL, 'wIBxF8pOvN', 'admin', '2017-09-02 20:50:01', 1, 0, 1),
(38, 39, '8ONhQk5b1R', 'xlgVgcPueU', 'uvRZWIfxqp', 'RTQ7kI9MTZ', 'avQgIIfCbf', NULL, 'l', '9eIpg6LZRI', 'IBrkwrs3H5', '6z3JJIO0M9', 'tZAPJOnD5B', 'MJZK3j7omo', 'CEVuzLkfYq', 's', '124qeu6pZt', 'zDMTtUzfFQ', 't2a7C8Y5vh', NULL, 0, 'xNcRMVTeKx', '', 'w6Mzq0KbUl', '2017-09-01', NULL, 0, 'Dd4lIu7mrj', NULL, NULL, NULL, 0, 'lguw1Ffbtk', NULL, 'CpNAoZGnmh', 'admin', '2017-09-02 20:50:57', 1, 0, 1),
(39, 40, 'ip15cFQCMa', 'WvLTEwYfcR', 'YU6cqM2jXZ', 'z2Jt1nVDgS', 'feVfzv6V6W', NULL, 'l', 'c2CpGW7erF', 'w8vGSYynIL', '6BqcMFkEF2', 'sqC74I06ej', 'FkypIiyjZ7', 'SPd4ZAaVJc', 's', '81OAHXBDch', 'p5HgS7imit', 'HvJJJu9cf7', NULL, 0, 'GwbkweEnCK', '', NULL, NULL, NULL, 0, 'lzbBB9K8q2', NULL, NULL, NULL, 0, 'hkCbGGKnDc', NULL, '0pMGU0bcvZ', 'admin', '2017-09-03 05:11:03', 1, 0, 1),
(40, 41, 'HjM31Et5sj', 'KHLXCTSmpx', 'MOEiy4HlVp', '25QT5gj797', 'mjAmUvW5fo', NULL, 'l', 'G4R1avh8PB', 'L1txdNYgeP', 'Uarn6gjs63', 'eDK94uZfmN', 'RbcyDFz2ML', 'vnoaMJcvNf', 's', 'Qj21CX4QZp', 'sGKjD87cyn', '5LdLtCjw82', NULL, 0, 'xND17UKYRK', '', NULL, NULL, NULL, 0, 'DOmQ0yr5kI', NULL, NULL, NULL, 0, '1WQfE59M9Y', NULL, 'GTS1PuwKvB', 'admin', '2017-09-03 05:14:07', 1, 0, 0),
(41, 42, '0O5s6CZ3S3', 'FIx0etfLVq', 'WTb4jzKdRn', 'GzEeP5CaEG', 'ZMkx91rvhb', NULL, 'l', 'r7njpj4yer', 'OQ5OTNXj1z', '8qQ9zlQeTz', 'Li9oHH4IQE', 'MibveQcesW', 'cvsBo0gv7F', 's', 'RM8ZLpNcmY', 'c6qh4Mdokl', 'fI1esTBKZa', NULL, 0, 'XmIo5AN7bQ', '', NULL, NULL, NULL, 0, 'v7ruxbEFNV', NULL, NULL, NULL, 0, 'wr4nt2rGhE', NULL, 'dMYHmxr2UF', 'admin', '2017-09-03 05:14:22', 1, 0, 0),
(42, 43, 'CTHgDUJRtB', 'VZeJufB31g', 'xNdRjl2di7', 'UIs5Dd9jQo', '2YWps1CiNt', NULL, 'l', 'F79PSFdu3f', 'q5n78UaC6B', 'IvCNkpsBEm', 'OGuJ0wmunQ', '706SyWNQAy', 'vjhJTBU0JM', 's', '0Bh2dH9EQ6', 'vf8bIxg8tv', 'VMmxyxEf74', NULL, 0, 'n6OaGrk3d4', '', NULL, NULL, NULL, 4, 'pzH3l2rfR2', NULL, NULL, NULL, 0, 'JF02Ert6Yi', NULL, 'sBVkav7TSd', 'admin', '2017-09-03 05:15:15', 1, 0, 0),
(43, 44, 'UXJvzbiLdr', 'DyKvuUue6N', 'hQw4Enrgye', 'MZkIe5OeV4', '5uO5hm2Mhd', NULL, 'l', 'q5fKWDPKNi', 'x7azvXVxmv', 'fZQwTYb0Wd', 'TUSElTVWxr', 'U38dvv54u2', 'vRGwA2gLQw', 's', 'R87Q9JdyE8', 'MRVMwVwFGc', 'IAa6mj49Nw', NULL, 6, 'EfZQyGHwdu', '', NULL, NULL, NULL, 0, 'VUylRRhQDg', NULL, NULL, NULL, 0, 'k0Ez9oysLC', NULL, 'v98sSUn6zO', 'admin', '2017-09-03 05:15:26', 1, 0, 0),
(44, 45, 'ibEbaLThz6', 'PhGNB7jomE', 'qxby6sdNzf', 'dRQYyBLQFR', 'LThzNMYV3m', NULL, 'l', 'thNNRctvU9', '6raQkzEO8k', 'DP0jxLtdpD', 'j6Xxpiujro', 'OC0WW7C3UQ', 'BqrnA9NGFw', 's', '2m5BEGO3Ph', '1JO8NrQvNX', 'HCGtHJcBTX', NULL, 0, 'Iw6iYpKtul', '', NULL, NULL, NULL, 0, 'rvpNsS2HrF', NULL, NULL, NULL, 0, '0KldQRnttB', NULL, 'Q1KERxJXpZ', 'admin', '2017-09-03 05:38:21', 1, 0, 0),
(45, 46, 'ibEbaLThz6', 'PhGNB7jomE', 'qxby6sdNzf', 'dRQYyBLQFR', 'LThzNMYV3m', NULL, 'l', 'thNNRctvU9', '6raQkzEO8k', 'DP0jxLtdpD', 'j6Xxpiujro', 'OC0WW7C3UQ', 'BqrnA9NGFw', 's', '2m5BEGO3Ph', '1JO8NrQvNX', 'HCGtHJcBTX', NULL, 0, 'Iw6iYpKtul', '', NULL, NULL, NULL, 0, 'rvpNsS2HrF', NULL, NULL, NULL, 0, '0KldQRnttB', NULL, 'Q1KERxJXpZ', 'admin', '2017-09-03 05:38:52', 1, 0, 0),
(46, 47, '4VnRILEkoa', 'bipm5I0trV', '6PqLevZRVS', '5t1n8pM47B', 'Ea9KNZB6fM', NULL, 'l', 'NmwC9J8NeW', 'XuGCR3Mh1W', 'SYuJH3w8lj', 'B9IhMr8Xkp', '7fiNLEf2Bu', 'p3U6czgfr5', 's', 'iYlplWNJ55', 'e9JeaZwH2Q', '1SNEurpHOD', NULL, 0, '186pQHzvbn', '', NULL, NULL, NULL, 0, 'z0qZvppFGg', NULL, NULL, NULL, 0, '6MN1T0rbbv', NULL, 'qDHUaNpTRT', 'admin', '2017-09-03 05:39:05', 1, 0, 1),
(47, 48, 'PYopZXGkWx', 'FOFUF33J0D', 'vmUtmiumwZ', 'W632U6IrMP', 'q9SxZQYsG9', NULL, 'l', 'N2tK0xCB87', 'aHcA8K4SqJ', 'B5LDmP4trf', 't9bZ7Z9g9t', 'kAujxkLe7X', 'B9LfM3tsm7', 's', '3FBtrwV5Sw', 'k1uklYcfXq', 'xCtEXc3Z26', NULL, 1, '3j84awazEo', 'm', 'xQKzbZy2Hg', NULL, NULL, 0, 'APvqJHEKGp', NULL, NULL, NULL, 0, 'TbAlOmNTAK', NULL, 'cuCa9ngpGl', 'admin', '2017-09-03 06:23:23', 1, 0, 1),
(48, 49, 'Oz4YFL5K0P', 'T2XkjqXAaH', 'yAIhKR7ThQ', 'WIJMggXbaZ', 'KO9vjGlr8E', NULL, 'l', 'AUXPRdv8oE', 'zzZMPzrVKq', 'bhfr8JLeJK', '2X3MLtDu8A', 'lLx5UUveMd', 'NTAjOel7pd', 's', '5Soz8sI3EV', 'Q06Bo2S9kw', 'rl8wmfrJPQ', NULL, 0, 'HBx79L5n49', 'm', 'xQKzbZy2Hg', NULL, NULL, 0, 'tebGf7KXC5', NULL, NULL, NULL, 0, 'BTo1NGg0e6', NULL, 'ovaXim5u13', 'admin', '2017-09-03 06:25:05', 1, 0, 1),
(49, 50, 'LROZOnmMAN', 'JjJLY9cumt', 'mnQEyoECF1', '5AfKzn30R0', 'm20qNaBGh5', NULL, 'l', 'n0vOXRiyFd', '2OHVdksnpu', 'YadVOzGCSM', '45bXXLvPuf', 'vJAj5aKqrp', '1ASKqM2BAW', 's', 'VsgeSBaKNd', '4bBuONBaR3', 'hdemti51CH', NULL, 0, 'QSDuGucnAt', 'm', 'xQKzbZy2Hg', NULL, NULL, 0, 'bXRveHFaKv', NULL, NULL, NULL, 8, 'yNADoGx2Y5', NULL, 'gO7Tt0hl71', 'admin', '2017-09-03 06:28:16', 1, 0, 1),
(50, 51, 'u5Vu3pauwn', 'IOmS1TEml9', 'sGUTuvJ7NJ', '4k5BVoBiAD', 'Hj1pyRqoHF', NULL, 'l', 'YlR6rvlei0', '96AnEql81Q', 'tzWwA7P533', 'JgI5WMUs1q', '6KGMSHqZo0', 'rkaHWu6Ndd', 's', 'xgd4r1CiqC', 'rGqP6kcsXh', 'fFJyER9jHm', NULL, 0, 'KCPvTTlTOt', 'm', 'xQKzbZy2Hg', NULL, NULL, 0, 'PW42mPEdEG', NULL, NULL, NULL, 8, 'viL0KBhO3T', NULL, '3OZLMn1AGm', 'admin', '2017-09-03 06:29:01', 1, 0, 1),
(51, 52, 'ljMdkABEtC', 'YSNIIKdXVC', 'awGQuVDfRI', 'DQ8S3Afc7s', '5XQONnGw6J', NULL, 'l', '8C1aLENyLM', '9xIxOja9ty', '7nSLY8c5fJ', '5Yj0Okil0a', 'hxbSZn2hM7', 'QLKcSqh4OE', 's', 'aiqA9XtyXu', 'aK0OhConzj', 'KNaaOh325j', NULL, 0, '5DCgmOqXAk', 'm', 'xQKzbZy2Hg', NULL, NULL, 90, '34S0YN8zDs', NULL, NULL, NULL, 3, 'CrAJksb9kT', NULL, 'nwuJ2xNOpz', 'admin', '2017-09-03 06:32:21', 1, 0, 1),
(52, 53, 'mgGlPsJnSj', '5jyry9IPQV', 'wLcXpSNC5Q', 'tOLfeozcpD', 'cFVsg2JctD', NULL, 'l', 'MrhPka3TT5', 'OV3cuo4FuK', 'R1GKHszyuM', 'GgU9thKAru', 'MHuVcxvyyR', 'D6xZDBLEkX', 's', 'AfCji932BW', 'gTqvrG6dvn', 'eFuey1IQYj', NULL, 0, 'AjCMrpKlZM', 'm', 'xQKzbZy2Hg', NULL, NULL, 0, 'Rp7kltu1uR', '2017-09-27', NULL, NULL, 0, 'DYJeb5sGkb', NULL, 'vGQ2Kme7hO', 'admin', '2017-09-03 06:47:12', 1, 0, 1),
(53, 54, 'YvCv0GW8PI', 'R3pmN1Ddk2', 'chXne2Sl8r', 'uR9PDGU1yM', 'zHc09Crz4p', NULL, 'l', 'QHA1rwNLDS', 'DENObdQ1gn', '18D7wYhoyF', 'P56glJgpRL', 'brSyOql7AO', '0QwGZio5F4', 's', 'R0qAm1c6hk', 'qkIWDEDc84', 'Justcuie5E', NULL, 0, 'XhAVBu1kdR', 'm', 'xQKzbZy2Hg', NULL, NULL, 0, 'LuXoWi7IC7', '2017-09-27', '030917064843fnS', NULL, 0, 'WBJBD1msnG', '030917064843LYFu', 'hn0HwXpFpj', 'admin', '2017-09-03 06:48:43', 1, 0, 0),
(54, 55, 'LKRvkHZo5C', 'rn7ICGkoSB', 'RAf2KH4WeE', 'isr3U6ahb3', 'eUYeo38oRv', NULL, 'l', 'DNXXTzV2r6', 'TfHvMhlJND', '6nRgw8ykB4', 'mE2x09rjvy', 'BVxQ97yBdq', 'CyptvFnT3O', 's', '8OONdOVYf2', 'zHV3GXBvMu', 'F8hiltcGT4', NULL, 0, 'gXV82iiahD', 'Pengabdian', NULL, NULL, NULL, 0, 'JZAXjKp6Hn', NULL, NULL, NULL, 0, 'M246yCL8uF', NULL, 'gAXnGYinsV', 'admin', '2017-09-03 09:45:57', 1, 0, 0),
(55, 56, 'RfLviShSV1', '2RFe6cw8dB', 'fX6lc6PGcC', 'CoXn2HDNIP', 'MT2BoHotHv', NULL, 'l', '7bREuFH9Ee', 'TyKcmrdPcw', '6cxdLuyiOw', 'hz6Lbt2aVe', 'cqpSwGHoIH', 'AyPL0IFWIU', 's', 'CbIxBfvMt4', 'SlGJpRqTRh', 'yBbl6dxWpm', NULL, 0, 'x1qLUxx7Y2', 'Pengabdian', NULL, NULL, NULL, 0, '6G79cgT1bE', NULL, '030917094637ylB', NULL, 0, 'mHY2J9nEHF', '030917094637zHxH.pdf', 'oQIHv0HyX5', 'admin', '2017-09-03 09:46:37', 1, 0, 0),
(56, 57, 'aK2Wj10eZE', 'lg5HZFKaGU', 'k7SZcg9Db3', 'G9Wuv6BGkV', 'HmircD4TsR', NULL, 'l', 'pgAaVlU9bJ', '8YEoIm9Qh5', 'XLsAN7OqLN', 'oKwkFAUMrm', 'OFzH3RVWLw', 'DqXwgzld6u', 's', '7pqHMBkxR5', '4i3XdcShxD', 'BGlhUK5VXH', NULL, 0, 'JJ5QcXHEX2', 'Pengabdian', NULL, NULL, '2018-01-18', 0, 'Qe8qCWZrQi', NULL, '0309170948076NV', NULL, 0, 'aachlfNkzt', '030917094807iDwk.pdf', 'K0W4RZcCCE', 'admin', '2017-09-03 09:48:07', 1, 0, 0),
(57, 58, 'HSN46OZTGD', 'K0WpuN1zKE', 'w8hRbVnibS', 'i7U3MkYVw3', 'tkgSwUTBgP', NULL, 'l', 'yJeNwfyit8', 'od91W3dPZ9', '2wXZ73h0NM', 'JtQf0zJTrm', 'XmkazIY625', 'gfI1cr2REG', 's', 'YkK0du6hRo', 'ERz5jrW5Df', 'POfqYwhzN0', NULL, 0, 'IrvkuDudEw', 'Pengabdian', NULL, NULL, NULL, 0, '1ypwH0Okxu', NULL, '030917094911zy9x.pdf', NULL, 0, 'vKWqYs3HVm', '0309170949115JmI.pdf', 'eqyfI3VurI', 'admin', '2017-09-03 09:49:11', 1, 0, 1),
(58, 59, 'vRnomZckBe', 'RJSgctkZNL', 'DKLUPrOQhL', 'cetvKHUKye', 'uORG4EDC7U', NULL, 'l', 'wLYwZqf3vE', 'YKhkRZDDID', 'ph9Wj0DjU5', 'YS7CEfZv4E', '5LMCl8PFNt', 'rDtXDcRMfx', 's', 'SL0JdZdFuN', 'QXUKP9l3tD', 'pnpsJmtTEz', NULL, 1, 'JkVrVEugtZ', 'Pengabdian', NULL, NULL, NULL, 0, 'G42OXqzblB', NULL, '030917095018vMDC.pdf', NULL, 0, 'VoI0HUDED9', '030917095018mj1h.pdf', 'y1aXb6aRkx', 'admin', '2017-09-03 09:50:18', 1, 0, 1),
(59, 60, '62E0rZzE3O', 'BexnXfJmtT', 'yl1ebLWHkm', '6gGV4OXgCI', 'dDySHlOBer', NULL, 'l', 'phHlYfU44z', 'Cdv6tLqLlh', 'TDTdAiFuq4', 'hh7bwwPFoA', 'YVCteADRBv', 'EfB0vNTrtg', 's', 'Ejgg3IQ2dv', 'QJAlrUU42u', 'HBoEsgsyJG', NULL, 4, 'hxu6hfH70k', 'Pengabdian', '1FnEPoSsK1', NULL, NULL, 0, 'BsFqy3B8r0', NULL, '030917095356YLDa.pdf', NULL, 0, 'rEinKpSmkZ', '030917095356VGWY.pdf', 'PojVm1D6x4', 'admin', '2017-09-03 09:53:56', 1, 0, 1),
(60, 61, 'yH4op0dRch', 'fezw1uY24C', '5wsS159oxO', 'lqEstRHv9M', 'f37kxSXhVe', NULL, 'l', 'iynbeSmUx4', 'ErbwO56grX', '5rHaDzDKil', '5Wro4yFYKQ', 'B505ZzPRq9', 'DwK2O5bjV9', 's', 'bGEvgiW8HJ', 'lGz31f8Z1t', 'sF5UaccHgG', NULL, 0, 'mo9ytwnlhy', 'Pengabdian', NULL, NULL, NULL, 0, 'qinETS7KSJ', NULL, NULL, 90000, 0, '8CTSsd1etD', NULL, 'L8n7zRODJb', 'admin', '2017-09-03 15:12:23', 1, 0, 1),
(61, 62, 'juminem', 'fezw1uY24C', '5wsS159oxO', 'lqEstRHv9M', 'f37kxSXhVe', NULL, 'l', 'iynbeSmUx4', 'ErbwO56grX', '5rHaDzDKil', '', 'B505ZzPRq9', 'DwK2O5bjV9', 's', 'bGEvgiW8HJ', 'lGz31f8Z1t', 'sF5UaccHgG', NULL, 0, 'mo9ytwnlhy', 'Pengabdian', NULL, NULL, NULL, 0, 'qinETS7KSJ', NULL, '030917151302JdCK.', 90000, 0, '8CTSsd1etD', '0309171513023R4L.', 'L8n7zRODJb', 'admin', '2017-09-12 17:29:02', 1, 0, 1),
(62, 63, 'NofGm9hhRL', 'BUxM1k7JRJ', 'dvm9CzC7Jj', '7wMRhMqKHz', 'O5rBYckuGZ', NULL, 'l', '6gRSXjvrSr', 'PTkH1SlLaW', 'ryceLnc3n4', '3ARidJpbky', 'RdAlMHWCQB', '6Nz0Mhd8ho', 's', '43tbwYmtQN', 'Xo5mUnWS6C', 'AseVnip3Bi', NULL, 0, 'WoTluqtb0h', '', NULL, NULL, NULL, 0, '5Eo5nww89i', NULL, '0809171502542aeI.', 0, 0, 'O6oB1KUvAd', '080917150254xszy.', 'PkY8RvjgLA', 'admin', '2017-09-08 15:02:54', 1, 1, 1),
(63, 64, 'ZQ2ZoObv5m', 'xd7bvDsxHY', '5G9Azd2KnY', 'JMKoOneWdp', 'XO9bTHYo7R', NULL, 'l', '1eso1apOaU', 'RuEzf3lIN0', 'FE3MbAYs9o', 'gxZAtYPvNf', 'lGdVsAqDXy', 'yKWwnQzERG', 's', 'XKeVhwSxxX', '3FcVE7FnZr', 'iTKBixK1uk', NULL, 0, 'gZvGrjTcXX', '', NULL, NULL, NULL, 0, '9q5pe4uwNJ', NULL, '080917161029Qmom.', 0, 73, 'zgxc9sHIIJ', '080917161029UKjG.', 'Nt61W05SYZ', 'admin', '2017-09-08 16:10:29', 1, 0, 1),
(64, 65, '0n6YoSKPvk', 'AkBmnvGCjV', 'rglumtkQkO', '510232051432MP02065', 'XbvLWzWtWv', NULL, 'l', 'I81cymw1Hr', 'GMEB1zZfiO', 'gXxdJaEsLu', '', 'QmeMqk1BCj', 'Be1l9l2QzC', 's', '2JjXsE7YJc', 'jpDtqgOFcw', '6rLkktyuoR', NULL, 0, 'porq5VRPJY', '', NULL, NULL, NULL, 0, 'U6rFSW2AWK', NULL, '0809171611469D99.', 0, 0, 'TQA6NmoNJn', '080917161146Y9n9.', 'MP02', 'admin', '2017-09-30 20:35:24', 1, 0, 1),
(65, 66, 'iWAM0ubBXB', 'XdrBEQNysh', 'BXVcaZuZjC', '97chcywcKO', 'esuFqF4xD1', '2017-09-20', 'l', 'm9LtT9nXV4', 'dL25OTx5ke', 'ZNtVVrgOST', 'aJRsW4Mr2S', 'O2NBM4JKnf', 'UDGjJa2WFU', 's', 'rN1ROj5CJz', '0JqxNauX3l', 'BEqDv2tUej', '2017-09-13', 1, 'WUkwWBuqe4', 'Pengabdian', 'kTa5ij32LL', NULL, NULL, 0, 'uOUjV3avyN', '2017-09-12', '090917125202b2kI.pdf', 0, 0, '0K3OMwkFHs', '0909171252025ciu.pdf', 'TTl4fSRGjU', 'admin', '2017-09-09 12:52:02', 1, 0, 0),
(66, 67, 'WGvvOclne7', 'sT4xKhFgY3', '3qyYS8iRIQ', '510232051432MPSO067', 'DfWPl1Hc5r', '2017-09-20', 'l', 'Bi3gzt6r0Z', 'xSufO0zhWm', 'h2zHfaZsv1', '', 'f9vczeFi3x', 'hKbMUakSBa', 's', 'LMwtsCX52H', 'iZLpl4ZKe7', 'Mo2JZNOCUW', '2017-08-30', 1, 'LNSmyV4NLp', 'Tetap', '85TcfSORAA', NULL, NULL, 8, 'iqOcmUJ7n3', '2017-09-03', '090917143150RUlK.pdf', 0, 2, '8W56ftVFLH', '090917143150iBvY.jpg', 'gfRHUJais9', 'admin', '2017-09-30 20:33:39', 1, 0, 1),
(67, 68, 'sudiro', 'تفضل', '5wsS159oxO', '510232051432MP04068', 'f37kxSXhVe', NULL, 'l', 'iynbeSmUx4', 'ErbwO56grX', '5rHaDzDKil', '', 'B505ZzPRq9', 'DwK2O5bjV9', 's', 'bGEvgiW8HJ', 'lGz31f8Z1t', '', NULL, 0, 'Sarjana', 'Pengabdian', NULL, NULL, NULL, 0, 'qinETS7KSJ', NULL, '090917182501y4yt.', 90000, 0, '', '090917182501QiuO.pdf', 'MP04', 'admin', '2017-09-30 21:16:42', 1, 0, 0),
(68, 69, 'kartoyo', 'RpWM7H9Hdj', 'AXR3pDI2Ay', 'se1aSsWeGf', 'Mk5BsFEOIF', '2017-09-14', 'l', 'Br87Mec8cL', 'T4E9ONT3XQ', 'fTVuIAoyx7', '', 'zvBZKuFkWh', 'y3LTqz3c65', 's', 'XKs2UFSXlx', 'RsHfWn5Ze8', 'bt8BRpT4bm', '2017-09-05', 0, 'oXjvCYkwkz', 'Pengabdian', 'S5JB2oZvXJ', NULL, NULL, 0, 'c0hJVr5Alw', '2017-09-20', '0909171951069taR.jpg', 0, 0, 'k5WFIJXto9', '090917195106qdih.jpg', 'NDPijiYuzH', 'admin', '2017-09-12 17:28:45', 1, 1, 1),
(69, 70, 'hoream', 'رمضان', '8TLunnx8Q0', 'e17kUc6IT2', 'hdiayat', '2017-09-30', 'l', 'hqTmqfzaMH', 'zNtRbNqvgl', 'G1UBBTV4jB', '', 'CtVjoqeuXX', 'pY3R3p0y82', 's', 'Bd99XXvhb8', '3XMLOAZlbZ', 'pt0iiMcF0E', '2017-09-13', 2, 'N0HKPC9zu1', 'Tetap', NULL, NULL, NULL, 0, '6H3YI1CNB3', '2017-09-26', '120917154249Hiao.', 3, 0, 'BXRvJ6WMlg', '1209171542494ckG.', 'Zp8PoHpYj5', 'admin', '2017-09-12 15:42:49', 1, 1, 1),
(70, 71, 'hoream', 'رمضان', '8TLunnx8Q0', 'e17kUc6IT2', 'hdiayat', '2017-09-30', 'l', 'hqTmqfzaMH', 'zNtRbNqvgl', 'G1UBBTV4jB', '', 'CtVjoqeuXX', 'pY3R3p0y82', 's', 'Bd99XXvhb8', '3XMLOAZlbZ', 'pt0iiMcF0E', '2017-09-13', 1, 'N0HKPC9zu1', 'Tetap', NULL, NULL, NULL, 0, '6H3YI1CNB3', '2017-09-26', '120917155938FcxY.', 3, 0, 'BXRvJ6WMlg', '120917155938jlg0.', 'Zp8PoHpYj5', 'admin', '2017-09-12 15:59:38', 1, 1, 1),
(71, 72, 'hoream', 'رمضان', '8TLunnx8Q0', 'e17kUc6IT2', 'hdiayat', '2017-09-30', 'l', 'hqTmqfzaMH', 'zNtRbNqvgl', 'G1UBBTV4jB', '', 'CtVjoqeuXX', 'pY3R3p0y82', 's', 'Bd99XXvhb8', '3XMLOAZlbZ', 'pt0iiMcF0E', '2017-09-13', 2, 'N0HKPC9zu1', 'Tetap', '4MVA12mpRT', NULL, NULL, 5, '6H3YI1CNB3', '2017-09-26', '1209171703595JEU.jpg', 30000000, 5, 'isertifikasi', '120917170359hOeD.jpg', 'Zp8PoHpYj5', 'admin', '2017-09-12 17:05:04', 1, 1, 1),
(72, 73, 'Adong', '', '', '510232051432MPSO073', '', NULL, 'l', '', '009', '', '', '', '', 's', '', '', '', NULL, 0, '', '', NULL, NULL, NULL, 0, '', NULL, NULL, 0, 0, '', NULL, 'MPSO', 'admin', '2017-09-30 20:46:20', 1, 0, 1),
(73, 1, 'ferwe', '', '', '510232051432MTBIN073', '', NULL, 'l', '', '4534', '', '', '', '', 's', '', '', '', NULL, 0, '', '', NULL, NULL, NULL, 0, '', NULL, NULL, 0, 0, '', NULL, 'MTBIN', 'admin', '2018-01-20 11:08:57', 1, 0, 0),
(74, 2, 'jola', 'ert', '', '510232051432MTBIN074', '', NULL, 'l', '', '345', '', '', '', '', 's', '', '', '', NULL, 0, '', '', NULL, NULL, NULL, 0, '', NULL, NULL, 0, 0, '', NULL, 'MTBIN', 'admin', '2018-01-20 11:09:21', 1, 0, 0),
(75, 3, 'joli', '', '', '510232051432MTBIN075', '', NULL, 'l', '', '34534', '', '', '', '', 's', '', '', '', NULL, 0, '', '', NULL, NULL, NULL, 0, '', NULL, NULL, 0, 0, '', NULL, 'MTBIN', 'admin', '2018-01-20 11:10:03', 1, 0, 0);

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
('T39170013', '', '', '', '', ''),
(NULL, NULL, NULL, NULL, NULL, NULL),
('A39170002', NULL, NULL, NULL, NULL, NULL),
('A39170001', NULL, NULL, NULL, NULL, NULL),
('A3917002', NULL, NULL, NULL, NULL, NULL),
('T39170019', '', '', '', '', ''),
('CT38170008', 'DGD', 'DFG', 'DFGDF', 'DFGDFg', 'DFGDFG'),
('A39170003', NULL, NULL, NULL, NULL, NULL),
('T39180001', '', '', '', '', ''),
('A39180001', NULL, NULL, NULL, NULL, NULL);

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
('JRMYH', 'JURUMIYYAH', 'KTBSLF', '1', 'admin', '2017-09-23 00:00:00'),
('MTBHING', 'BAHASA INGGRIS', 'BDBAHASA', '1', 'admin', '2018-01-20 00:00:00'),
('MTBIN', 'BAHASA INDONESIA', 'BDBAHASA', '1', 'admin', '2018-01-20 00:00:00');

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
('T39170014', 'DSFSDFSD', 2017, 'TIDAK KRONIS', 'MENULAR', 'F0c3.jpg'),
('A39170001', 'ALERGI DINGIN', 2014, 'TIDAK KRONIS', 'TIDAK MENULAR', 'erQk.pdf'),
('A39170001', 'BATUK', 2015, 'TIDAK KRONIS', 'TIDAK MENULAR', 'ondl.jpg'),
('A3917002', 'SDFSD', 2017, 'KRONIS', 'TIDAK MENULAR', 'HgW8.pdf'),
('T39180001', 'ETEYRY', 2018, 'KRONIS', 'MENULAR', ''),
('T39180001', '4545646456', 2018, 'KRONIS', 'TIDAK MENULAR', '');

--
-- Dumping data for table `ms_santri`
--

INSERT INTO `ms_santri` (`kategori`, `no_registrasi`, `no_stambuk`, `thn_masuk`, `rayon`, `kamar`, `bagian`, `kel_sekarang`, `nisn`, `nisnlokal`, `nama_lengkap`, `nama_arab`, `nama_panggilan`, `hobi`, `uang_jajan_perbulan`, `no_kk`, `nik`, `tempat_lahir`, `tgl_lahir`, `konsulat`, `nama_sekolah`, `kelas_sekolah`, `alamat_sekolah`, `suku`, `kewarganegaraan`, `jalan`, `no_rumah`, `dusun`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `kd_pos`, `no_tlp`, `no_hp`, `email`, `fb`, `dibesarkan_di`, `lamp_ijazah`, `lamp_photo`, `lamp_akta_kelahiran`, `lamp_kk`, `lamp_skhun`, `lamp_transkip_nilai`, `lamp_skkb`, `lamp_surat_kesehatan`, `aitam`) VALUES
('AITAM_ISLAH', 'A39170003', NULL, NULL, 'GD01', 'K01', 'B02', 'KR1B', '8748353078', '51023205143239170003', 'F DONI AQUILA', NULL, NULL, 'MAKAN', 0, 2147483647, NULL, 'BOGOR', '1995-02-01', NULL, 'SEKOLAH BERSAMA', 'IX A', 'JALAN KESEKOLAH', 'SUNDA', 'INDONESIA', 'JL ARCA BUANA', 'RT003 RW 004', 'KBOGO', 'DBOGO', 'DKECAM', 'DKABPU', 'DPROV', 9888, 2147483647, 2147483647, NULL, NULL, NULL, NULL, '3PioFhOHlOjYs9tz0OnW.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('AITAM_JAMIAH', 'A39180001', NULL, NULL, 'GD02', 'K03', 'B02', 'KR2A', '234234', '51023205143239180001', 'JONI S', NULL, NULL, '23432', 0, 423423423, NULL, '23423', '2017-11-16', NULL, '2342', '234324', '234234', '234234', '23423', '23', '234', '23', '23432', '234', '22342', '23423', 3423, 4234, 4234234, NULL, NULL, NULL, NULL, 'WK815803OJqTon7uPA3Z.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('AITAM_JAMIAH', 'CA39170005', NULL, NULL, '', '', '', '', '87', '5102320514323917002', '8', NULL, NULL, '77', 0, 87, NULL, '87', '2017-11-24', NULL, 'QWEWQ', 'QWEQWE', 'QWE', '7', '87', '87', '87', '8', '78', '78', '7', '87', 8, 7, 78, NULL, NULL, NULL, 'wAIbAV8uDMIi1PfrgHnw.pdf', 'hOcjJRWumBOjLT1mNe1C.jpg', 'ZEnND2ZCwfxKBKWqeKOA.pdf', 'UGYg9GcCHaO0ZIHIzTRS.pdf', NULL, NULL, NULL, NULL, NULL),
('AITAM_ISLAH', 'CA39170006', NULL, NULL, '', '', '', '', '324234', '51023205143239170002', '234234234', NULL, NULL, '23423', 0, 23423, NULL, '4234', '2017-11-16', NULL, '23423', '234234', '23423', '234234', '234234', '324234', '234', '324', '234', '234', '324234', '4234', 234, 23423, 23423, NULL, NULL, NULL, NULL, 'LeotDs03X1VAhPXjg9Bs.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('TMI', 'CT38170005', 0, 2017, NULL, NULL, NULL, NULL, '11223344', '0', 'RARA', 'فغع', 'RARA', 'NGOPI', 1000000, 113345587, 3355777, 'TANJUNG ENIM', '1989-07-10', 'KONSULAT 1', NULL, NULL, NULL, 'SUMATERA', 'INDONESIA', 'PERUMAHAN MEDANG', 'NO3 RT 003 RW 013', 'MEDANG', 'PAGEDANGAN', 'LEGOK', 'TANGERANG SELAT', 'BANTEN', 523314, 21558877, 2147483647, 'faritno@me.com', 'faritno@faceboo', 'TANJUNG EN', 'CoWhmFmcJ0nt3S5jbf5s.pdf', '5tzrpZTl8IQ06C1aEcx1.jpg', 'rAt6IRPZixfk4BkPnuaJ.pdf', '2bmJoaZ3jpFr8ls4HZZG.pdf', 'lLkvUG5fKbl8HfIS7kgG.PDF', 'QqBicZPU3YxgKSNz7Dey.pdf', 'vKUpKarTdnVbJkW1EuzD.pdf', 'NQrIxQDvHtJIDcQzbYyM.pdf', NULL),
('TMI', 'CT38170006', 0, 2017, NULL, NULL, NULL, NULL, '11223344', '0', 'RERE', 'ناهلات', 'RERE', 'NGOPI', 1000000, 113345587, 3355777, 'TANJUNG ENIM', '1989-07-10', 'KONSULAT 1', NULL, NULL, NULL, 'SUMATERA', 'INDONESIA', 'PERUMAHAN MEDANG', 'NO3 RT 003 RW 013', 'MEDANG', 'PAGEDANGAN', 'LEGOK', 'TANGERANG SELAT', 'BANTEN', 523314, 21558877, 2147483647, 'faritno@me.com', 'faritno@faceboo', 'TANJUNG EN', 'CoWhmFmcJ0nt3S5jbf5s.pdf', '5tzrpZTl8IQ06C1aEcx1.jpg', 'rAt6IRPZixfk4BkPnuaJ.pdf', '2bmJoaZ3jpFr8ls4HZZG.pdf', 'lLkvUG5fKbl8HfIS7kgG.PDF', 'QqBicZPU3YxgKSNz7Dey.pdf', 'vKUpKarTdnVbJkW1EuzD.pdf', 'NQrIxQDvHtJIDcQzbYyM.pdf', NULL),
('TMI', 'CT38170007', 0, 2017, NULL, NULL, NULL, NULL, '11223344', '0', 'SARAH', 'ناهلات', 'SARAH', 'NGOPI', 1000000, 113345587, 3355777, 'TANJUNG ENIM', '1989-07-10', 'KONSULAT 1', NULL, NULL, NULL, 'SUMATERA', 'INDONESIA', 'PERUMAHAN MEDANG', 'NO3 RT 003 RW 013', 'MEDANG', 'PAGEDANGAN', 'LEGOK', 'TANGERANG SELAT', 'BANTEN', 523314, 21558877, 2147483647, 'faritno@me.com', 'faritno@faceboo', 'TANJUNG EN', 'CoWhmFmcJ0nt3S5jbf5s.pdf', '5tzrpZTl8IQ06C1aEcx1.jpg', 'rAt6IRPZixfk4BkPnuaJ.pdf', '2bmJoaZ3jpFr8ls4HZZG.pdf', 'lLkvUG5fKbl8HfIS7kgG.PDF', 'QqBicZPU3YxgKSNz7Dey.pdf', 'vKUpKarTdnVbJkW1EuzD.pdf', 'NQrIxQDvHtJIDcQzbYyM.pdf', NULL),
('TMI', 'CT38170008', 0, 2017, NULL, NULL, NULL, NULL, '11223344', '0', 'MUHTAR', 'خحها', 'MUHTAR', 'NGOPI', 1000000, 113345587, 3355777, 'TANJUNG ENIM', '1989-07-10', 'KONSULAT 1', NULL, NULL, NULL, 'SUMATERA', 'INDONESIA', 'PERUMAHAN MEDANG', 'NO3 RT 003 RW 013', 'MEDANG', 'PAGEDANGAN', 'LEGOK', 'TANGERANG SELATAN', 'BANTEN', 523314, 21558877, 2147483647, 'faritno@me.com', 'faritno@faceboo', 'TANJUNG ENIM', 'CoWhmFmcJ0nt3S5jbf5s.pdf', 'J8PywCgZ7VHjkmGqF8lD.jpg', 'rAt6IRPZixfk4BkPnuaJ.pdf', '2bmJoaZ3jpFr8ls4HZZG.pdf', 'lLkvUG5fKbl8HfIS7kgG.PDF', 'QqBicZPU3YxgKSNz7Dey.pdf', 'vKUpKarTdnVbJkW1EuzD.pdf', 'NQrIxQDvHtJIDcQzbYyM.pdf', 'aitam_jamiah'),
('TMI', 'T38170001', 1, 2017, 'GD01', 'K01', 'B01', 'KR1A', '123456789', '1234567890', 'RUDI HERMAWAN', 'قعيه اثقةشصشى', 'RUDI', 'OLAHRAGE', 300000, 2147483647, 2147483647, 'GARUT', '2004-03-08', 'SINDANG', NULL, NULL, NULL, 'SUNDA', 'INDONESIA', 'JL. LANCAR JAYA', 'NO.18 007/008', 'KEJAYAAN', 'MAJU TERUS', 'KECAMATAN1', 'KABUPATEN1', 'JAWA BARAT', 11876, 24765984, 2147483647, 'rudi@gmail.com', 'rudi@facebook', 'garut', NULL, 'mnWyWkatVr4JTzcE0abP.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('TMI', 'T39170013', 14, 2017, 'GD01', 'K01', 'B01', 'K023', '112233', '2147483647', 'namalengkap nya1', 'namaarab nya1', 'namapanggi', 'hoinya apa', 500000, 123, 321, 'Tempat_lahir', '1990-02-13', 'konsulat1', NULL, NULL, NULL, 'suku1', 'Kewarga1', 'jaln1', 'norUMah1', 'Dusun1', 'desa1', 'kecamatan1', 'kabupaten1', 'provinsi1', 51280, 2155677, 2147483647, 'email1@yahoo.com', 'fb1', 'dfdfdfdfdf', 'MyScl8mlnNJCn7wLGxJu.pdf', 'eWSaMJ2sXheTNvKMrWUW.jpg', 'tMiZ5AUeYPb2H2P4WC3b.pdf', 'EzPpovTpLyAsy30oyjti.jpg', 'S2VAG4eIxziv8HYND4qA.jpg', 'ThG2pY575DBNDV6GfOmO.pdf', 'YLKopMNGWvs1jsF8HNg4.pdf', '55R4fRiOc63MD8M7UM4R.pdf', NULL),
('TMI', 'T39170014', 15, 2017, 'GD02', 'K02', 'B01', 'KR1A', '112233', '2147483647', 'BOBI', 'namaarab nya1', 'namapanggi', 'hoinya apa', 500000, 123, 321, 'Tempat_lahir', '0000-00-00', 'konsulat1', NULL, NULL, NULL, 'suku1', 'Kewarga1', 'jaln1', 'norUMah1', 'Dusun1', 'desa1', 'kecamatan1', 'kabupaten1', 'provinsi1', 51280, 2155677, 2147483647, 'email1@yahoo.com', 'fb1', 'dfdfdfdfdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('TMI', 'T39170019', 20, 2017, NULL, NULL, NULL, NULL, '11223344', '51023205143239170019', 'AHDIAN', 'حغغفىلا ت', 'AHDIAN', 'NGOPI', 1000000, 113345587, 3355777, 'TANJUNG ENIM', '1989-07-10', 'KONSULAT 1', NULL, NULL, NULL, 'SUMATERA', 'INDONESIA', 'PERUMAHAN MEDANG', 'NO3 RT 003 RW 013', 'MEDANG', 'PAGEDANGAN', 'LEGOK', 'TANGERANG SELAT', 'BANTEN', 523314, 21558877, 2147483647, 'faritno@me.com', 'faritno@faceboo', 'TANJUNG EN', 'CoWhmFmcJ0nt3S5jbf5s.pdf', '5tzrpZTl8IQ06C1aEcx1.jpg', 'rAt6IRPZixfk4BkPnuaJ.pdf', '2bmJoaZ3jpFr8ls4HZZG.pdf', 'lLkvUG5fKbl8HfIS7kgG.PDF', 'QqBicZPU3YxgKSNz7Dey.pdf', 'vKUpKarTdnVbJkW1EuzD.pdf', 'NQrIxQDvHtJIDcQzbYyM.pdf', NULL),
('TMI', 'T39180001', 21, 2018, 'GD01', 'K04', 'B02', 'KR1C', '97878', '51023205143239180001', 'JOLA', '', 'ASd', 'ASDA', 234, 234, 2342, '23423', '2018-01-17', '34234', NULL, NULL, NULL, '23423', '2342', '234', '23234', '234', '234', '2342', '4234', '3423', 2342, 234, 234, '', '', '23', NULL, 'GeLr9gHRlMSalNYxAhZ8.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Dumping data for table `ms_santri_donatur`
--

INSERT INTO `ms_santri_donatur` (`no_registrasi`, `id_donatur`) VALUES
('CT38170008', 3),
('A39170003', 3),
('T39180001', 5);

--
-- Dumping data for table `ms_semester`
--

INSERT INTO `ms_semester` (`id_semester`, `semester`, `bulan`) VALUES
(37, 1, '1'),
(39, 1, '2'),
(40, 2, '7'),
(41, 2, '8'),
(42, 2, '9');

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
('T38170001', 0, 'admin', '2018-01-20 10:50:50'),
('T39170001', 171100, 'admin', '2017-10-21 15:52:01'),
('T39170002', 221000, 'admin', '2017-10-21 15:52:06'),
('T39170014', 7000, 'admin', '2018-01-20 10:50:38'),
('T39170017', 0, 'admin', '2018-01-20 10:50:39');

--
-- Dumping data for table `sequence`
--

INSERT INTO `sequence` (`nama_field`, `nomor_terakhir`, `remark`) VALUES
('Stambuk_TMI', '21', NULL),
('noreg_TMI', 'T39180001', NULL),
('noreg_CalonTMI', 'CT39180002', NULL),
('noreg_CalonAITAM', 'CA39180001', NULL),
('noreg_AITAM', 'A39180001', NULL),
('no_reg_guru', '4', NULL);

--
-- Dumping data for table `trans_banksoaldt`
--

INSERT INTO `trans_banksoaldt` (`id_hd`, `id_soal`) VALUES
(7, 20),
(7, 19),
(7, 18);

--
-- Dumping data for table `trans_banksoalhd`
--

INSERT INTO `trans_banksoalhd` (`id`, `kode_soal`, `kurikulum`, `semester`, `id_matpal`, `tingkat`, `user_id`, `recdate`) VALUES
(7, '4/1/MP04/1', 4, 1, 'MP04', 1, 'admin', '2018-01-20 11:07:14');

--
-- Dumping data for table `trans_jadwal_pelajaran`
--

INSERT INTO `trans_jadwal_pelajaran` (`id_jadwal`, `santri`, `id_thn_ajar`, `semester`, `kode_kelas`, `id_guru`, `jam`, `hari`, `id_mapel`, `kategori`, `userid`, `recdate`) VALUES
(316, 'PUTRI', 3, '1', 'KR1A', 61, 'I', 'SELASA', 'MPSO', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
(315, 'PUTRI', 3, '1', 'KR1A', 64, 'II', 'SENIN', 'MPSO', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
(314, 'PUTRI', 3, '1', 'KR1A', 72, 'I', 'SENIN', 'MPEK', 'UTAMA', 'admin', '2018-01-20 00:00:00');

--
-- Dumping data for table `trans_kurikulum`
--

INSERT INTO `trans_kurikulum` (`id_thn_ajar`, `tingkat`, `tipe_kelas`, `id_mapel`, `sm_1`, `sm_2`, `kategori`, `userid`, `recdate`) VALUES
('3', '1', 'REGULER', 'MTBHING', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '1', 'INTENSIF', 'MTBIN', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '3', 'REGULER', 'MTBIN', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '3', 'REGULER', 'MTBHING', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '3', 'REGULER', 'MPNI', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '3', 'REGULER', 'MP05', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '3', 'REGULER', 'MP04', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '3', 'REGULER', 'MPSJ', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '3', 'REGULER', 'MPGEO', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '1', 'REGULER', 'MP04', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '3', 'REGULER', 'MP01', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '3', 'REGULER', 'MP02', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '3', 'REGULER', 'MPSO', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '3', 'REGULER', 'MPEK', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '2', 'REGULER', 'MTBIN', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '2', 'REGULER', 'MTBHING', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '2', 'REGULER', 'MPNI', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '2', 'REGULER', 'MP05', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '2', 'REGULER', 'MP04', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '2', 'REGULER', 'MPSJ', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '2', 'REGULER', 'MPGEO', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '2', 'REGULER', 'MP01', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '2', 'REGULER', 'MP02', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '2', 'REGULER', 'MPSO', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '2', 'REGULER', 'MPEK', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '1', 'REGULER', 'MTBIN', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '1', 'REGULER', 'MPNI', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '1', 'REGULER', 'MP05', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '1', 'INTENSIF', 'MPSO', '2', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '1', 'INTENSIF', 'MP02', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '1', 'INTENSIF', 'MP01', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '1', 'REGULER', 'MPSJ', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '1', 'REGULER', 'MPGEO', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '1', 'REGULER', 'MP01', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '1', 'REGULER', 'MP02', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '1', 'REGULER', 'MPSO', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '1', 'REGULER', 'MPEK', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '1', 'INTENSIF', 'MTBHING', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '1', 'INTENSIF', 'MPNI', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '1', 'INTENSIF', 'MP05', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '1', 'INTENSIF', 'MP04', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '1', 'INTENSIF', 'MPSJ', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '1', 'INTENSIF', 'MPGEO', '0', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00'),
('3', '1', 'INTENSIF', 'MPEK', '1', '0', 'UTAMA', 'admin', '2018-01-20 00:00:00');

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
('A39170001', NULL, 0, 0, 0),
('A3917002', NULL, 0, 0, 0),
('T39180001', '', 0, 0, 0);

--
-- Dumping data for table `trans_rpp`
--

INSERT INTO `trans_rpp` (`id_rpp`, `id_thn_ajar`, `santri`, `id_guru`, `semester`, `kode_kelas`, `id_mapel`, `userid`, `recdate`) VALUES
(7, 3, 'PUTRI', 61, '1', 'KR1A', 'MPSO', 'admin', '2018-02-13 00:00:00'),
(10, 3, 'PUTRI', 72, '1', 'KR1A', 'MPEK', 'admin', '2018-02-15 00:00:00');

--
-- Dumping data for table `trans_rpp_detail`
--

INSERT INTO `trans_rpp_detail` (`id_rpp_dtl`, `id_rpp`, `bulan`, `minggu`, `hari`, `hissos`, `materi_pokok`, `alokasi_waktu`, `TIU`, `jns_tagihan`) VALUES
(37, 10, 'JANUARI', 'I', 'SENIN', 'I', '1', '0', '0', '0'),
(38, 10, 'JANUARI', 'II', 'SENIN', 'I', '0', '0', '0', '0'),
(39, 10, 'JANUARI', 'III', 'SENIN', 'I', '0', '0', '0', '0'),
(40, 10, 'JANUARI', 'IV', 'SENIN', 'I', '0', '0', '0', '0'),
(41, 10, 'FEBRUARI', 'I', 'SENIN', 'I', '0', '0', '0', '0'),
(42, 10, 'FEBRUARI', 'II', 'SENIN', 'I', '0', '0', '0', '0'),
(43, 10, 'FEBRUARI', 'III', 'SENIN', 'I', '0', '0', '0', '0'),
(44, 10, 'FEBRUARI', 'IV', 'SENIN', 'I', '0', '0', '0', '0'),
(45, 10, 'MARET', 'I', 'SENIN', 'I', '0', '0', '0', '0'),
(46, 10, 'MARET', 'II', 'SENIN', 'I', '0', '0', '0', '0'),
(47, 10, 'MARET', 'III', 'SENIN', 'I', '0', '0', '0', '0'),
(48, 10, 'MARET', 'IV', 'SENIN', 'I', '0', '0', '2', '0'),
(85, 7, 'JANUARI', 'I', 'SELASA', 'I', '6', '7', '7', '7'),
(86, 7, 'JANUARI', 'II', 'SELASA', 'I', '6', '5', '5', '5'),
(87, 7, 'JANUARI', 'III', 'SELASA', 'I', '6', '7', '8', '8'),
(88, 7, 'JANUARI', 'IV', 'SELASA', 'I', '7', '6', '5', '4'),
(89, 7, 'FEBRUARI', 'I', 'SELASA', 'I', '5', '6', '7', '2'),
(90, 7, 'FEBRUARI', 'II', 'SELASA', 'I', '8', '3', '7', '7'),
(91, 7, 'FEBRUARI', 'III', 'SELASA', 'I', '6', '5', '5', '6'),
(92, 7, 'FEBRUARI', 'IV', 'SELASA', 'I', '7', '8', '8', '7'),
(93, 7, 'MARET', 'I', 'SELASA', 'I', '4', '5', '6', '7'),
(94, 7, 'MARET', 'II', 'SELASA', 'I', '7', '8', '7', '6'),
(95, 7, 'MARET', 'III', 'SELASA', 'I', '6', '6', '7', '8'),
(96, 7, 'MARET', 'IV', 'SELASA', 'I', '23', '3', '3', '3');

--
-- Dumping data for table `trans_tabungan`
--

INSERT INTO `trans_tabungan` (`id`, `no_registrasi`, `tgl_tabungan`, `tipe`, `nominal`, `keterangan`, `userid`) VALUES
(3, 'T39170001', '2017-10-14', 'i', 10, 'test', 'admin'),
(4, '', '2017-10-14', 'i', 0, '', 'admin'),
(5, 'T39170002', '2017-10-14', 'i', 1000, 'oke', 'admin'),
(6, 'T39170001', '2017-10-14', 'i', 1, 'f', 'admin'),
(7, 'T39170001', '2017-10-14', 'i', 2323, 'ff', 'admin'),
(10, 'T39170001', '2017-10-21', 'i', 1000, 'ok', 'admin'),
(13, 'T39170002', '2017-10-21', 'i', 50000, 'fds', 'admin'),
(14, 'T39170002', '2017-10-21', 'i', 80000, 'test', 'admin'),
(15, 'T39170002', '2017-10-21', 'i', 90000, 'sdf', 'admin'),
(16, 'T39170001', '2017-10-21', 'i', 100, 'fds', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
