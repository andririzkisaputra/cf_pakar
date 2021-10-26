-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 17, 2021 at 12:32 PM
-- Server version: 5.7.15-log
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_pakar_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `keahlian`
--

CREATE TABLE `keahlian` (
  `keahlian_id` int(25) NOT NULL,
  `keahlian` varchar(225) NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `modified_on` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keahlian`
--

INSERT INTO `keahlian` (`keahlian_id`, `keahlian`, `created_by`, `modified_on`) VALUES
(9, 'Keahlian 1', '1', '2021-10-17 18:37:34'),
(10, 'Keahlian 2', '1', '2021-10-17 18:53:41'),
(11, 'Keahlian 3', '1', '2021-10-17 18:35:28'),
(12, 'Keahlian 4', '1', '2021-10-17 18:35:22'),
(13, 'Keahlian 5', '1', '2021-10-17 18:34:27');

-- --------------------------------------------------------

--
-- Table structure for table `minat_bakat`
--

CREATE TABLE `minat_bakat` (
  `minat_bakat_id` int(25) NOT NULL,
  `minat_bakat` varchar(225) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `modified_on` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `minat_bakat`
--

INSERT INTO `minat_bakat` (`minat_bakat_id`, `minat_bakat`, `deskripsi`, `created_by`, `modified_on`) VALUES
(51, 'Minat 1', 'Suatu minat yang', '1', '2021-10-17 18:52:31'),
(52, 'Minat 2', 'Sesuatu hal yang akan', '1', '2021-10-17 18:52:21'),
(53, 'Minat 3', 'Hal ini merupakan', '1', '2021-10-17 18:52:12'),
(55, 'Minat 4', 'Minat yang memiliki', '1', '2021-10-17 18:52:04'),
(56, 'Minat 5', 'Minat yang memiliki', '1', '2021-10-17 18:51:50'),
(57, 'Minat 6', 'Minat ini merupakan', '1', '2021-10-17 18:51:43');

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE `rule` (
  `rule_id` int(25) NOT NULL,
  `kode_rule` varchar(25) NOT NULL,
  `minat_bakat_id` varchar(25) NOT NULL,
  `keahlian_id` varchar(25) NOT NULL,
  `nilai` varchar(25) NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `modified_on` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`rule_id`, `kode_rule`, `minat_bakat_id`, `keahlian_id`, `nilai`, `created_by`, `modified_on`) VALUES
(119, 'RL91125', '51', '9', '0.8', '1', '2021-08-26 04:16:43'),
(120, 'RL91125', '51', '10', '0.6', '1', '2021-08-26 04:16:43'),
(121, 'RL91125', '51', '12', '0', '1', '2021-08-26 04:16:43'),
(122, 'RL76461', '52', '12', '0.8', '1', '2021-08-26 04:17:04'),
(123, 'RL76461', '52', '9', '0.6', '1', '2021-08-26 04:17:04'),
(124, 'RL76461', '52', '13', '0.4', '1', '2021-08-26 04:17:04'),
(125, 'RL57304', '53', '13', '0.6', '1', '2021-08-26 04:17:39'),
(126, 'RL57304', '53', '10', '0.6', '1', '2021-08-26 04:17:39'),
(127, 'RL93990', '55', '13', '0.6', '1', '2021-08-26 04:18:11'),
(128, 'RL93990', '55', '12', '0.8', '1', '2021-08-26 04:18:11'),
(129, 'RL93990', '55', '9', '1', '1', '2021-08-26 04:18:11'),
(130, 'RL74459', '56', '11', '0.6', '1', '2021-08-30 11:20:28');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL COMMENT '0 = tidak aktif, 1 = aktif',
  `level` varchar(25) NOT NULL COMMENT '1 = admin',
  `password` text NOT NULL,
  `modified_on` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `status`, `level`, `password`, `modified_on`) VALUES
(1, 'sistem_pakar', '0', '1', '791da83d972fb0ffbb3f319f00309418', '2021-07-20 17:38:5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keahlian`
--
ALTER TABLE `keahlian`
  ADD PRIMARY KEY (`keahlian_id`);

--
-- Indexes for table `minat_bakat`
--
ALTER TABLE `minat_bakat`
  ADD PRIMARY KEY (`minat_bakat_id`);

--
-- Indexes for table `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`rule_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keahlian`
--
ALTER TABLE `keahlian`
  MODIFY `keahlian_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `minat_bakat`
--
ALTER TABLE `minat_bakat`
  MODIFY `minat_bakat_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `rule`
--
ALTER TABLE `rule`
  MODIFY `rule_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
