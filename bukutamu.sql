-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2022 at 07:27 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bukutamu`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('vietafitria', 'vieta');

-- --------------------------------------------------------

--
-- Table structure for table `tamu2`
--

CREATE TABLE `tamu2` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `keperluan` varchar(100) NOT NULL,
  `nohp` varchar(100) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tamu2`
--

INSERT INTO `tamu2` (`id`, `nama`, `instansi`, `email`, `keperluan`, `nohp`, `waktu`) VALUES
(11, 'Silvina Ainul Mardiah', 'Universitas Telkom', 'silvina@gmail.com', 'Rapat', '087653525251', '2022-01-14 06:13:45'),
(12, 'Iqbaal Ramadhan', 'Universitas Gajah Mada', 'iqbaal@gmail.com', 'Magang', '08524362716', '2020-10-08 03:02:09'),
(13, 'Siti Raudlatul Janah', 'Universitas Diponegoro', 'siti@gmail.com', 'Rapat', '08877766721', '2020-10-15 03:04:53'),
(14, 'Sintia Darma Pamuja', 'Universitas Ahmad Dahlan', 'sintia@gmail.com', 'Magang', '085432564321', '2020-10-15 03:07:58'),
(28, 'Hasan Marzuki', 'Universitas Gajah Mada', 'hasan@gmail.com', 'Rapat', '08213456749', '2021-02-14 02:54:47'),
(29, 'Dicky Ilham Feriandy', 'Universitas Pasundan', 'dicky@gmail.com', 'Rapat', '08543245161', '2021-02-14 02:55:46'),
(30, 'Selviana Putri', 'Universitas Diponegoro', 'selvi@gmail.com', 'Rapat', '08756743234', '2021-02-14 02:58:37'),
(31, 'Laila Fithri Rafifah', 'Universitas Ahmad Dahlan', 'laila@gmail.com', 'Magang', '08532456743', '2021-02-14 02:59:33'),
(35, 'Vieta Fitria', 'Universitas Ahmad Dahlan', 'vietafitria00@gmail.com', 'Magang', '08543245161', '2021-02-15 06:53:36'),
(37, 'Siti Aminah', 'Universitas Diponegoro', 'siti@gmail.com', 'Rapat', '08777888973', '2021-03-04 01:58:53'),
(40, 'Rina Agustina', 'Universitas Ahmad Dahlan', 'rinaagustina@gmail.com', 'Magang', '0876446674', '2022-01-13 23:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(123) NOT NULL,
  `password` varchar(567) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(12, 'Vieta Fitria', 'vietafitria07@gmail.com', 'vie.jpg', '$2y$10$O2W3d4Z4U9YhzKND3FFUAu5DHSO4YrOXxJd8RJduHz22jmVhYXA76', 2, 1, 1642058393);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(321) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tamu2`
--
ALTER TABLE `tamu2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tamu2`
--
ALTER TABLE `tamu2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
