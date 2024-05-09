-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 02:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizzaps`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `username`, `password`) VALUES
(1, 'darto', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftar_kuis`
--

CREATE TABLE `tb_daftar_kuis` (
  `quiz_id` int(11) NOT NULL,
  `nama_kuis` varchar(255) NOT NULL,
  `jumlah_soal` int(50) NOT NULL,
  `jumlah_hasil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_daftar_kuis`
--

INSERT INTO `tb_daftar_kuis` (`quiz_id`, `nama_kuis`, `jumlah_soal`, `jumlah_hasil`) VALUES
(3, 'Sistem Operasi', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil_3`
--

CREATE TABLE `tb_hasil_3` (
  `id` int(11) NOT NULL,
  `npm` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `jawaban_benar` int(11) NOT NULL,
  `jawaban_salah` int(11) NOT NULL,
  `skor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_hasil_3`
--

INSERT INTO `tb_hasil_3` (`id`, `npm`, `nama`, `kelas`, `jawaban_benar`, `jawaban_salah`, `skor`) VALUES
(3, 2147483647, 'Arya Ulya Krisna', '2IA21', 5, 0, 100);

-- --------------------------------------------------------

--
-- Table structure for table `tb_soal_3`
--

CREATE TABLE `tb_soal_3` (
  `id` int(11) NOT NULL,
  `soal` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jawaban1` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jawaban2` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jawaban3` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jawaban_benar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_soal_3`
--

INSERT INTO `tb_soal_3` (`id`, `soal`, `jawaban1`, `jawaban2`, `jawaban3`, `jawaban_benar`) VALUES
(1, 'dalam proteki hardware terdapat mode operai yaitu\r\n', 'user mode\r\n', 'monitor mode\r\n', 'semua jawaban benar\r\n', 3),
(2, 'sasaran system operasi adalah\r\n', 'kenyamanan\r\n', 'semua jawaban benar\r\n', 'efisien\r\n', 2),
(3, 'pada lapisan-lapisan dalam sistem operasi yang berfungsi untuk menyederhanakan akses I/O pada level atas adalah\r\n', 'Memory & Drum management\r\n', 'User Management\r\n', 'I/O management\r\n', 3),
(4, 'Pada generasi berapa komputer dapat melakukan multiprogramming?\r\n', 'ke-1\r\n', 'ke-2\r\n', 'ke-3\r\n', 3),
(5, 'Seperangkat program yang memantau dan mengatur pemakaian sumber daya komputer disebut\r\n', 'sistem operasi\r\n', 'dark sistem\r\n', 'sistem berkas\r\n', 1),
(6, 'sdafsdfsd', 'asdfsdf', 'adfasdf', 'asdfsd', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tb_daftar_kuis`
--
ALTER TABLE `tb_daftar_kuis`
  ADD PRIMARY KEY (`quiz_id`),
  ADD UNIQUE KEY `nama_kuis` (`nama_kuis`);

--
-- Indexes for table `tb_hasil_3`
--
ALTER TABLE `tb_hasil_3`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `npm` (`npm`);

--
-- Indexes for table `tb_soal_3`
--
ALTER TABLE `tb_soal_3`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_daftar_kuis`
--
ALTER TABLE `tb_daftar_kuis`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_hasil_3`
--
ALTER TABLE `tb_hasil_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_soal_3`
--
ALTER TABLE `tb_soal_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
