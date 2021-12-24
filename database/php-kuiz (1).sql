-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2021 at 07:20 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-kuiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `j_id` int(11) NOT NULL,
  `j_no` int(11) NOT NULL,
  `j_hari` varchar(64) NOT NULL,
  `jp_1` varchar(64) NOT NULL,
  `jp_2` varchar(64) NOT NULL,
  `jp_3` varchar(64) NOT NULL,
  `jp_4` varchar(64) NOT NULL,
  `jp_5` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`j_id`, `j_no`, `j_hari`, `jp_1`, `jp_2`, `jp_3`, `jp_4`, `jp_5`) VALUES
(1, 1, 'Senin', 'Matematika Wajib', 'Fisika', 'PPKN', 'Sejarah', 'Biologi'),
(2, 2, 'Selasa', 'IPS', 'Olahraga', 'Kewarganegaraan', 'Kalkulus', 'Dasar Pemrograman'),
(3, 3, 'Rabu', 'Struktur Data', 'Agama Islam', 'Kecerdasan Buatan', 'Struktur Data', 'Grafkom'),
(4, 4, 'Kamis', 'IPA', 'Matematika', 'Seni Budaya', 'Ekonomi', 'Akuntansi'),
(5, 5, 'Jumat', 'Bahasa Inggris', 'Bahasa Indonesia', 'Bahasa Jepang', 'PPKN', 'Olahraga');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qid` int(11) NOT NULL,
  `qno` int(11) NOT NULL,
  `question` text NOT NULL,
  `ans1` text NOT NULL,
  `ans2` text NOT NULL,
  `ans3` text NOT NULL,
  `ans4` text NOT NULL,
  `correct_answer` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `qno`, `question`, `ans1`, `ans2`, `ans3`, `ans4`, `correct_answer`) VALUES
(9, 5, 'Berapa hasil pembagian 5 dengan 1', '1', '2', '3', '5', 'd'),
(8, 3, 'Jika x+y=5, dan x=3. Berapakah y?', '1', '2', '3', '4', 'a'),
(7, 2, 'Hasil 1 x 2 x 3', '2', '4', '6', '8', 'c'),
(6, 1, 'Berapa hasil 1+1+1', '1', '2', '3', '4', 'c'),
(5, 4, 'Berapa hasil 2 pangkat 2', '1', '2', '4', '6', 'c'),
(10, 6, 'Berapa jumlah hari pada bulan agustus', '29', '30', '31', '12', 'c'),
(11, 7, 'Berapa Hasil 3 x 3 ', '3', '6', '9', '12', 'c'),
(14, 10, 'Berapa hasil 1 pangkat 2', '1', '3', '9', '11', 'a'),
(12, 8, 'Hasil penjumlahan 1 + 1 + 10', '11', '13', '12', '15', 'c'),
(13, 9, 'Berapa hasil 3 pangkat 2', '21', '18', '10', '9', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `played_on` varchar(225) NOT NULL,
  `score` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `played_on`, `score`) VALUES
(81, 'dsa@gmail.com', '2021-12-22 05:45:34', 1),
(82, 'migel@gmail.com', '2021-12-23 18:31:45', 2),
(83, 'dsad@gmail.com', '2021-12-22 12:22:40', 0),
(84, 'ds@gmail.com', '2021-12-22 14:22:53', 0),
(85, 'qwerty@mail.com', '2021-12-22 16:09:45', 3),
(86, 'sayabaru@gmail.com', '2021-12-22 17:25:42', 0),
(87, 'nilai100@gmail.com', '2021-12-22 17:39:19', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`j_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `j_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
