-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 06, 2024 at 02:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `publications`
--

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `doc_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `publication_date` date NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `form_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `language` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `race` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `addressOf` varchar(50) NOT NULL,
  `nameOfcurator` varchar(50) NOT NULL,
  `addressCurator` varchar(50) NOT NULL,
  `schedule_meeting` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `metropolitan` varchar(50) NOT NULL,
  `publisher_name` varchar(50) NOT NULL,
  `publisher_address` varchar(50) NOT NULL,
  `publisher_email` varchar(50) NOT NULL,
  `date_submitted` date NOT NULL,
  `publication_date` date NOT NULL,
  `publisher_telephone` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`form_id`, `title`, `language`, `province`, `race`, `first_name`, `last_name`, `address`, `addressOf`, `nameOfcurator`, `addressCurator`, `schedule_meeting`, `start_date`, `metropolitan`, `publisher_name`, `publisher_address`, `publisher_email`, `date_submitted`, `publication_date`, `publisher_telephone`, `user_id`) VALUES
(1, 'miss', 'English', 'Gauteng', 'african', 'Khensani', 'Manganye', '56 mbell street zandspruit honeydew 2040', '', '', '', 'Appointment', '2024-09-04', 'johannesburg', 'constance', '76 soweto', 'constance@gmail.com', '2024-09-06', '2024-09-13', 781542585, NULL),
(2, 'mrs', 'Afrikaans', 'Western Cape', 'white', 'joyce', 'smith', '345 freedom park', '', '', '', 'Termination', '2024-09-18', 'cape Town', 'kutlwano', '23 thembisa', 'kutlwano@gmail.com', '2024-09-18', '2024-09-27', 781542585, NULL),
(3, 'mrs', 'Afrikaans', 'Western Cape', 'white', 'joyce', 'smith', '345 freedom park', '', '', '', 'Termination', '2024-09-18', 'cape Town', 'kutlwano', '23 thembisa', 'kutlwano@gmail.com', '2024-09-18', '2024-09-27', 781542585, NULL),
(4, 'mrs', 'Afrikaans', 'Western Cape', 'white', 'joyce', 'smith', '345 freedom park', '', '', '', 'Appointment', '2024-09-05', 'cape Town', 'kutlwano', '23 thembisa', 'kutlwano@gmail.com', '2024-09-09', '2024-09-13', 609330637, NULL),
(5, 'mrs', 'Afrikaans', 'Western Cape', 'white', 'joyce', 'smith', '345 freedom park', '', '', '', 'Appointment', '2024-09-05', 'cape Town', 'kutlwano', '23 thembisa', 'kutlwano@gmail.com', '2024-09-09', '2024-09-13', 609330637, NULL),
(6, 'mrs', 'Afrikaans', 'Western Cape', 'white', 'joyce', 'smith', '345 freedom park', '', '', '', 'Appointment', '2024-09-04', 'cape Town', 'kutlwano', '23 thembisa', 'kutlwano@gmail.com', '2024-09-06', '2024-09-13', 609330637, NULL),
(7, 'miss', 'Afrikaans', 'Limpopo', 'white', 'pontso', 'mogala', '232 sosha', '', '', '', 'Appointment', '2024-09-06', 'johannesburg', 'Thapelo', '87 cosmo city', 'thapelo@gmail.com', '2024-09-09', '2024-09-10', 79817898, NULL),
(8, 'mr', 'English', 'Limpopo', 'african', 'Tshepo', 'muntswu', '67 bopape', '', '', '', 'Appointment', '2024-09-05', 'vhembe', 'lerato', '98 mackenzi', 'lerato@gmail.com', '2024-09-06', '2024-09-09', 809656475, NULL),
(9, 'mrs', 'English', 'Gauteng', 'white', 'Grace', 'Handricks', '87 makula', '', '', '', 'Appointment', '2024-09-06', 'pretoria', 'kutlwano', '76 soweto', 'kutlwano@gmail.com', '2024-09-09', '2024-09-13', 608659487, NULL),
(10, 'miss', 'English', 'Limpopo', 'african', 'Gloria', 'phundulu', '243 motale', '', '', '', 'Appointment', '2024-09-09', 'vhembe', 'modjadji', '567 soweto', 'modjadji@gmail.com', '2024-09-09', '2024-09-13', 761489568, NULL),
(11, 'miss', 'English', 'Limpopo', 'african', 'kutlwano', 'vusani', '432', '', '', '', 'Appointment', '2024-09-06', 'johannesburg', 'constance', '76 soweto', 'constance@gmail.com', '2024-09-09', '2024-09-13', 792514785, NULL),
(12, 'mrs', 'English', 'Mpumalanga', 'african', 'Luthando', 'Ndlovu', '67 bopape', '', '', '', 'Appointment', '2024-09-20', 'mbombela', 'lukhona', '657 scrall', 'lukhona@gmai.com', '2024-09-13', '2024-09-20', 809656475, NULL),
(13, 'mr', 'English', 'Free State', 'african', 'Thabo', 'motloung', '765 maseru', '', '', '', 'Appointment', '2024-09-12', 'bloemfontein', 'Nthati', '980 sganda', 'nthati@gmail.com', '2024-09-18', '2024-09-27', 754869585, NULL),
(14, 'Mr', 'English', 'Limpopo', 'african', 'Austin', 'Baloyi', '866 malamulele', '', '', '', 'Appointment', '2024-10-02', 'malamulele', 'Gift', '23 thembisa', 'gift@gmail.com', '2024-10-11', '2024-10-31', 781425686, NULL),
(15, 'miss', 'English', 'Gauteng', 'african', 'Mapula', 'Moyeng', '78 wolf', '', '', '', 'Appointment', '2024-09-10', 'pretoria', 'mpho', '52 zandspruit', 'mpho@gmail.co', '2024-09-17', '2024-09-24', 602890637, NULL),
(16, 'mr', 'English', 'Limpopo', 'african', 'peter', 'mofamadi', '78 lukau', '', '', '', 'Appointment', '2024-09-05', 'vhembe', 'Rotondwa', '65 mabopane', 'rotondwa@gmail.com', '2024-09-06', '2024-09-09', 608659487, NULL),
(17, 'miss', 'English', 'Limpopo', 'african', 'Khensani', 'Manganye', '56 mbell street zandspruit honeydew 2040', '', '', '', 'Appointment', '2024-09-18', 'johannesburg', 'constance', '76 soweto', 'constance@gmail.com', '2024-09-18', '2024-09-17', 761489568, NULL),
(18, 'miss', 'English', 'Limpopo', 'african', 'Khensani', 'Manganye', '67 bopape', '', '', '', 'Appointment', '2024-09-05', 'vhembe', 'modjadji', '23 thembisa', 'modjadji@gmail.com', '2024-09-06', '2024-09-20', 792514785, NULL),
(19, 'miss', 'English', 'Limpopo', 'african', 'joyce', 'sebanda', '232 sosha', '', '', '', 'Appointment', '2024-09-06', 'vhembe', 'constance', '76 soweto', 'constance@gmail.com', '2024-09-09', '2024-09-13', 608659487, NULL),
(20, 'miss', 'English', 'Limpopo', 'african', 'joyce', 'phundulu', '345 freedom park', '', '', '', 'Appointment', '2024-09-12', 'johannesburg', 'constance', '76 soweto', 'constance@gmail.com', '2024-09-26', '2024-09-27', 761489568, NULL),
(21, '87', 'Afrikaans', 'Gauteng', 'Curatorship', 'Luthando', 'sebanda', '232 sosha', 'Curator', 'pontso', '3245 mbell', 'Appointment', '2024-09-13', 'johannesburg', 'kutlwano', '657 scrall', 'kutlwano@gmail.com', '2024-09-26', '2024-10-10', 792514785, NULL),
(22, '87', 'Afrikaans', 'Gauteng', 'Curatorship', 'Luthando', 'sebanda', '232 sosha', 'Curator', 'pontso', '3245 mbell', 'Appointment', '2024-09-13', 'johannesburg', 'kutlwano', '657 scrall', 'kutlwano@gmail.com', '2024-09-26', '2024-10-10', 792514785, NULL),
(23, '878', 'Afrikaans', 'North West', 'Minor', 'mpho', 'senokoane', '232 sosha', 'Tutor', 'pontso', '3245 mbell', 'Appointment', '2024-09-13', 'mbombela', 'modjadji', '567 soweto', 'modjadji@gmail.com', '2024-09-13', '2024-09-20', 608659487, NULL),
(24, '878', 'Afrikaans', 'North West', 'Minor', 'mpho', 'senokoane', '232 sosha', 'Tutor', 'pontso', '3245 mbell', 'Appointment', '2024-09-13', 'mbombela', 'modjadji', '567 soweto', 'modjadji@gmail.com', '2024-09-13', '2024-09-20', 608659487, NULL),
(25, '45', 'English', 'Gauteng', 'Minor', 'makahadzi', 'malwela', '87 nzhelele', 'Tutor', 'kabelo', '457 soweto', 'Termination', '2024-09-09', 'johannesburg', 'Thapelo', '87 cosmo city', 'thapelo@gmail.com', '2024-09-10', '2024-09-16', 608659487, NULL),
(26, '45', 'English', 'Gauteng', 'Minor', 'makahadzi', 'malwela', '87 nzhelele', 'Tutor', 'kabelo', '457 soweto', 'Termination', '2024-09-09', 'johannesburg', 'Thapelo', '87 cosmo city', 'thapelo@gmail.com', '2024-09-10', '2024-09-16', 608659487, NULL),
(27, '45', 'English', 'Gauteng', 'Minor', 'makahadzi', 'malwela', '87 nzhelele', 'Tutor', 'kabelo', '457 soweto', 'Termination', '2024-09-09', 'johannesburg', 'Thapelo', '87 cosmo city', 'thapelo@gmail.com', '2024-09-10', '2024-09-16', 608659487, NULL),
(28, '45', 'English', 'Gauteng', 'Minor', 'makahadzi', 'malwela', '87 nzhelele', 'Tutor', 'kabelo', '457 soweto', 'Termination', '2024-09-09', 'johannesburg', 'Thapelo', '87 cosmo city', 'thapelo@gmail.com', '2024-09-10', '2024-09-16', 608659487, NULL),
(29, '45', 'English', 'Gauteng', 'Minor', 'makahadzi', 'malwela', '87 nzhelele', 'Tutor', 'kabelo', '457 soweto', 'Termination', '2024-09-09', 'johannesburg', 'Thapelo', '87 cosmo city', 'thapelo@gmail.com', '2024-09-10', '2024-09-16', 608659487, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password`
--

CREATE TABLE `password` (
  `resert_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `resertToken` varchar(255) NOT NULL,
  `expiry_date` datetime NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `token_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `expiry_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp(),
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `password`, `created_date`, `updated_date`, `role`) VALUES
(1, 'Pontsho', 'Mogala', 'mogalaps@gmail.com', '$2y$10$V7pgNJbQYQ/VrvM6q2sAz..EP2GwOrCoQBHIZ22Pb6LuHMU4abTuS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'admin'),
(2, 'Nkhensani', 'manganye', 'manganyes@gmail.com', '$2y$10$FS8GNE52kXdRp0n5Hpx9euxBa.qlm/52nvYWPBDW03zIhvBL3th4m', '2024-08-31 21:39:33', '0000-00-00 00:00:00', 'editor'),
(3, 'Relebogile', 'mothapo', 'mothapo@gmail.com', '$2y$10$n5VuUM0a6z.HnwjFCti7a.IOeAtmMH/d566H9UlWHQ4kME3RzLcwS', '2024-08-31 21:43:15', '0000-00-00 00:00:00', 'client'),
(4, 'Gift', 'Ramothopa', 'ramothopa@gmail.com', '$2y$10$QQzFEjWB.pGIpDOutMzvfe2FPF3U7hnHhteKr0egH6U5uaJTQgmIO', '2024-08-31 22:32:48', '0000-00-00 00:00:00', 'admin'),
(5, 'Pontsho', 'Mogala', 'mogala@gmail.com', '$2y$10$5klAujtDSMh6HP/iQ5gJ/O1fKeVrdzNM5x5e9c988E4Gk4QF0aqhi', '2024-09-02 09:51:48', '0000-00-00 00:00:00', 'admin'),
(6, 'Ntsako', 'Manganye', 'ntsako@gmail.com', '$2y$10$Vtb3tlJZpW5W6klLAFECVO3HWYNm2XLiUIuViiNaBsL88X0Tkamv2', '2024-09-03 15:58:04', '2024-09-03 15:58:04', 'client'),
(7, 'Luthando', 'Ndlovu', 'luthando@gmail.com', '$2y$10$Vx4NN./CIfTZwJR4UgGkP.JytvnBHVZDmsv8UhMguysMQEaV0RX32', '2024-09-04 06:19:38', '2024-09-04 06:19:38', 'client'),
(8, 'Khensani', 'Manganye', 'khensanikk109@gmail.com', '$2y$10$EleLdLU9gBEb3SnEKjZc3eENCxacdPQJoJkAomgMJSPOdwqV6k6pi', '2024-09-04 11:35:01', '2024-09-04 11:35:01', 'client'),
(9, 'joyce', 'sebanda', 'sebandanj@gmail.com', '$2y$10$xdjvLNmXnR8MEjEAdZy2o.E26yFziitmViWNEQTaU0Dl0tbEOTYzW', '2024-09-05 08:56:55', '2024-09-05 08:56:55', 'client'),
(10, 'joyce', 'phundulu', 'phundulu@gmail.com', '$2y$10$BnVVT7oxLgA.srMpYZ1dpumslycPz2b/c0SajCLX7Xq.qjyZcuYUK', '2024-09-05 09:05:51', '2024-09-05 09:05:51', 'client'),
(11, 'mpho', 'manganye', 'manganye@gmail.com', '$2y$10$yuGGSPVDWZNKl.Sjc3Iaz.f6AY559TZOhroZb8.BA4IVttGFDfcMa', '2024-09-05 14:14:29', '2024-09-05 14:14:29', 'client'),
(12, 'lerato', 'sebanda', 'phundulusg@gmail.com', '$2y$10$gyKhnLn666QNyvff7MGIleDUAiR2.SP0kgtst3eu7wR3mYtAgR5mK', '2024-09-05 14:21:04', '2024-09-05 14:21:04', 'admin'),
(13, 'ntsako', 'sebanda', 'ntsakost@gmail.com', '$2y$10$Kd0JS1LeZPoyqJk7atdOSOwNjtXDRjhwdRz3qiJkmWKaRngBzCf1y', '2024-09-05 14:22:43', '2024-09-05 14:22:43', 'editor'),
(14, 'Luthando', 'manganye', 'luthandojoyce@gmail.com', '$2y$10$UxZ8fIPG5VUug1/8IL.YpOJQPLVlKqC/mUVBAhjYwbMVS7vmKoGXq', '2024-09-06 09:08:16', '2024-09-06 09:08:16', 'client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`doc_id`),
  ADD KEY `FOREIGN KEY` (`form_id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`form_id`),
  ADD KEY `FOREIGN KEY` (`user_id`);

--
-- Indexes for table `password`
--
ALTER TABLE `password`
  ADD PRIMARY KEY (`resert_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`token_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
