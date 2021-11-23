-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 21, 2021 at 02:17 PM
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
  `user_id` int(25) NOT NULL,
  `keahlian` varchar(225) NOT NULL,
  `modified_on` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keahlian`
--

INSERT INTO `keahlian` (`keahlian_id`, `user_id`, `keahlian`, `modified_on`) VALUES
(39, 1, 'Apakah anda mempunyai keberanian untuk melompat?', '2021-10-21 22:15:02'),
(40, 1, 'Apakah anda pandai membaca arah bola?', '2021-10-21 22:12:53'),
(41, 1, 'Apakah anda mempunyai jiwa Ketenangan?', '2021-10-21 22:13:34'),
(42, 1, 'Apakah anda mempunyai jiwa Kepemimpinan di lini belakang?', '2021-10-26 00:51:40'),
(44, 1, 'Apakah anda mampu untuk berlari cepat?', '2021-10-31 20:23:12'),
(45, 1, 'Apakah anda mampu memanfaatkan peluang peluang yang ada?', '2021-10-31 20:23:33'),
(46, 1, 'Apakah anda mempunyai teknik menyundul yang baik?', '2021-10-31 20:23:51'),
(47, 1, 'Apakah anda mampu mencari posisi yang baik dan tidak mudah terbaca lawan?', '2021-10-31 20:24:10'),
(48, 1, 'Apakah anda mampu memperhatikan gerak gerik lawan?', '2021-10-31 20:24:33'),
(49, 1, 'Apakah anda mampu menendang jarak jauh dan jarak pendek?', '2021-10-31 20:24:57'),
(50, 1, 'Apakah anda mampu menguasai daerah pertahanan belakang?', '2021-10-31 20:48:52'),
(51, 1, 'Apakah anda mempunyai jiwa solidaritas pada lini belakang?', '2021-10-31 20:49:12'),
(52, 1, 'Apakah anda mempunyai postur tubuh yang tinggi, besar dan tegap?', '2021-10-31 20:49:30'),
(53, 1, 'Apakah anda mampu merampas bola pada lawan (tekel)?', '2021-10-31 20:49:51'),
(54, 1, 'Apakah anda mempunyai jiwa tanggung jawab pada lini pertahanan belakang? ', '2021-10-31 20:50:09'),
(56, 1, 'Apakah anda mampu mengoper umpan ke teman satu tim degan baik?', '2021-11-01 22:36:58'),
(57, 1, 'Apakah anda mampu mampu menutup pergerakan lawan?', '2021-11-01 22:38:55'),
(58, 1, 'Apakah anda mampu membagi umpan antar penyerang maupun bek?', '2021-11-01 22:40:22'),
(59, 1, 'Apakah anda mampu menendang bola dengan jarak jauh?', '2021-11-01 22:42:11'),
(60, 1, 'Apakah anda mampu menguasai bola yang cukup  lama?  ', '2021-11-01 22:46:10'),
(61, 1, 'Apakah Anda mempunyai stamina bermain yang sangat baik?', '2021-11-01 22:50:01');

-- --------------------------------------------------------

--
-- Table structure for table `minat_bakat`
--

CREATE TABLE `minat_bakat` (
  `minat_bakat_id` int(25) NOT NULL,
  `user_id` int(25) NOT NULL,
  `minat_bakat` varchar(225) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `modified_on` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `minat_bakat`
--

INSERT INTO `minat_bakat` (`minat_bakat_id`, `user_id`, `minat_bakat`, `deskripsi`, `modified_on`) VALUES
(63, 1, 'Penjaga gawang', 'Penjaga gawang pada sepak bola adalah memiliki pemain yang berdiri di bawah mistar gawang sebagai kiper. Seorang kiper punya hak istimewa yakni boleh menangkap bola dengan tangan, sementara pemain lain tidak. Namun, hak istimewa itu hanya boleh dilakukan di kotak penalti miliknya, bukan di kotak penalti lawan. ', '2021-10-21 21:17:44'),
(64, 1, 'Penyerang', 'Penyerang atau forward adalah pemain yang posisinya paling dekat dengan gawang lawan dan tugas utamanya adalah menciptakan gol. Tiga hal utama yang dibutuhkan pemain penyerang adalah teknik, kecepatan dan bakat.\nJika salah satu dari ketiga hal ini kurang, akan lebih sulit untuk menjadi pemain yang handal. Selain itu, naluri dan konsentrasi yang tajam juga diperlukan untuk pemain yang bertugas menyerang. Dalam melakukan tugasnya, pemain penyerang tidak perlu melakukan gerakan sebanyak bek dan gelandang.\nNamun ketika rekan satu timnya memberikan bola, ia harus bisa mengubahnya menjadi gol.\n', '2021-10-21 21:31:18'),
(65, 1, 'Bek / Pemain Bertahan', 'Bek, Pemain bertahan, pemain belakang atau dalam bahasa Inggris disebut Defender adalah pemain yang menempati posisi di daerah pertahanan dan berperan dalam membantu penjaga gawang atau kiper untuk mencegah gol.\nSalah satu tugas seorang bek adalah menjaga dan melindungi kiper saat ia menguasai bola. \nKarena itu, pemain bertahan harus mempertimbangkan penjaga gawang sebagai pemain penting, yang tidak boleh didekati dengan pemain penyerang di tim lawan.\nSelain itu, bek juga memiliki tugas untuk mencegah serangan lawan, serta memblokir tendangan lawan. \n', '2021-10-21 21:28:36'),
(66, 1, 'Gelandang', 'Gelandang, pemain tengah atau dalam bahasa Inggris disebut Midfield adalah pemain yang diposisikan antara bek dan penyerang.\nTugas seorang gelandang adalah untuk menghubungkan antara bek dan penyerang.\nIni untuk mencegah serangan lawan dari mencapai pertahanan dan menggiring bola ke depan, untuk diberikan kepada penyerang ketika tim dalam mode serangan.\nPemain dalam posisi ini umumnya lebih banyak menguras energi.Karena jarak tempuh mereka dalam permainan cukup jauh.', '2021-10-21 21:22:59');

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE `rule` (
  `rule_id` int(25) NOT NULL,
  `user_id` int(25) NOT NULL,
  `minat_bakat_id` int(25) NOT NULL,
  `keahlian_id` int(25) NOT NULL,
  `kode_rule` varchar(25) NOT NULL,
  `nilai` varchar(25) NOT NULL,
  `modified_on` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`rule_id`, `user_id`, `minat_bakat_id`, `keahlian_id`, `kode_rule`, `nilai`, `modified_on`) VALUES
(270, 1, 63, 39, 'RL30901', '0.4', '2021-11-20 20:11:40'),
(271, 1, 63, 40, 'RL30901', '0.6', '2021-11-20 20:11:40'),
(272, 1, 63, 41, 'RL30901', '0.8', '2021-11-20 20:11:40'),
(273, 1, 63, 42, 'RL30901', '1', '2021-11-20 20:11:40'),
(274, 1, 66, 61, 'RL88104', '0.4', '2021-11-20 20:11:52'),
(275, 1, 66, 60, 'RL88104', '0.6', '2021-11-20 20:11:52'),
(276, 1, 66, 59, 'RL88104', '0.8', '2021-11-20 20:11:52'),
(277, 1, 66, 58, 'RL88104', '0.4', '2021-11-20 20:11:52'),
(278, 1, 66, 57, 'RL88104', '0.6', '2021-11-20 20:11:52'),
(279, 1, 66, 56, 'RL88104', '0.8', '2021-11-20 20:11:52'),
(290, 1, 64, 44, 'RL96481', '0.4', '2021-11-20 20:12:47'),
(291, 1, 64, 45, 'RL96481', '0.6', '2021-11-20 20:12:47'),
(292, 1, 64, 46, 'RL96481', '0.8', '2021-11-20 20:12:47'),
(293, 1, 64, 47, 'RL96481', '0.4', '2021-11-20 20:12:47'),
(294, 1, 64, 48, 'RL96481', '0.6', '2021-11-20 20:12:47'),
(295, 1, 64, 49, 'RL96481', '0.8', '2021-11-20 20:12:47'),
(296, 1, 65, 50, 'RL55560', '0.4', '2021-11-20 20:33:41'),
(297, 1, 65, 46, 'RL55560', '0.6', '2021-11-20 20:33:41'),
(298, 1, 65, 48, 'RL55560', '0.8', '2021-11-20 20:33:41'),
(299, 1, 65, 52, 'RL55560', '0.4', '2021-11-20 20:33:41'),
(300, 1, 65, 54, 'RL55560', '0.6', '2021-11-20 20:33:41');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL COMMENT '0 = tidak aktif, 1 = aktif',
  `level` varchar(25) NOT NULL COMMENT '1 = admin, 2 = siswa',
  `password` text NOT NULL,
  `created_on` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `status`, `level`, `password`, `created_on`) VALUES
(1, 'sistem_pakar', '1', '1', '791da83d972fb0ffbb3f319f00309418', '2021-07-20 17:38:5'),
(2, 'saefudin', '1', '2', '985abb6f803d4a5d94afc79912e6b4e1', '2021-10-31 22:42:36'),
(3, 'ali', '1', '2', '985abb6f803d4a5d94afc79912e6b4e1', '2021-10-31 22:49:19'),
(4, 'marlin', '1', '2', '81dc9bdb52d04dc20036dbd8313ed055', '2021-11-19 10:14:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keahlian`
--
ALTER TABLE `keahlian`
  ADD PRIMARY KEY (`keahlian_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `minat_bakat`
--
ALTER TABLE `minat_bakat`
  ADD PRIMARY KEY (`minat_bakat_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`rule_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `minat_bakat_id` (`minat_bakat_id`),
  ADD KEY `keahlian_id` (`keahlian_id`);

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
  MODIFY `keahlian_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `minat_bakat`
--
ALTER TABLE `minat_bakat`
  MODIFY `minat_bakat_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `rule`
--
ALTER TABLE `rule`
  MODIFY `rule_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `keahlian`
--
ALTER TABLE `keahlian`
  ADD CONSTRAINT `keahlian_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `minat_bakat`
--
ALTER TABLE `minat_bakat`
  ADD CONSTRAINT `minat_bakat_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `rule`
--
ALTER TABLE `rule`
  ADD CONSTRAINT `rule_ibfk_1` FOREIGN KEY (`minat_bakat_id`) REFERENCES `minat_bakat` (`minat_bakat_id`),
  ADD CONSTRAINT `rule_ibfk_2` FOREIGN KEY (`keahlian_id`) REFERENCES `keahlian` (`keahlian_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
