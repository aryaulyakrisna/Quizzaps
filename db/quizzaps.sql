-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2024 at 02:59 AM
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
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `username`, `password`) VALUES
(1, 'kel4pbo', '$2y$10$ZvLNHB5g9pdPHm14FWl20eOwID7v0kSGjfCR/MCHPTs9VCiSzhMf2');

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
(3, 'Sistem Operasi', 5, 1),
(40, 'Algoritma dan Pemrograman', 7, 0),
(41, 'Pemrograman Berbasis Objek', 5, 0),
(42, 'Bisnis Informatika 2', 5, 0);

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
-- Table structure for table `tb_hasil_40`
--

CREATE TABLE `tb_hasil_40` (
  `id` int(11) NOT NULL,
  `npm` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `jawaban_benar` int(11) NOT NULL,
  `jawaban_salah` int(11) NOT NULL,
  `skor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil_41`
--

CREATE TABLE `tb_hasil_41` (
  `id` int(11) NOT NULL,
  `npm` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `jawaban_benar` int(11) NOT NULL,
  `jawaban_salah` int(11) NOT NULL,
  `skor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil_42`
--

CREATE TABLE `tb_hasil_42` (
  `id` int(11) NOT NULL,
  `npm` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `jawaban_benar` int(11) NOT NULL,
  `jawaban_salah` int(11) NOT NULL,
  `skor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
(1, 'Dalam proteksi hardware terdapat mode operasi yaitu', 'user mode', 'monitor mode', 'semua jawaban benar', 1),
(2, 'Sasaran sIstem operasi adalah', 'kenyamanan', 'semua jawaban benar', 'efisien', 2),
(3, 'Pada lapisan-lapisan dalam sistem operasi yang berfungsi untuk menyederhanakan akses I/O pada level atas adalah', 'Memory &amp; Drum management', 'User Management', 'I/O Management', 3),
(4, 'Pada generasi berapa komputer dapat melakukan multiprogramming?\r\n', 'ke-1\r\n', 'ke-2\r\n', 'ke-3\r\n', 3),
(5, 'Seperangkat program yang memantau dan mengatur pemakaian sumber daya komputer disebut', 'sistem operasi', 'dark sistem', 'wing system', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_soal_40`
--

CREATE TABLE `tb_soal_40` (
  `id` int(11) NOT NULL,
  `soal` varchar(255) NOT NULL,
  `jawaban1` varchar(255) NOT NULL,
  `jawaban2` varchar(225) NOT NULL,
  `jawaban3` varchar(225) NOT NULL,
  `jawaban_benar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_soal_40`
--

INSERT INTO `tb_soal_40` (`id`, `soal`, `jawaban1`, `jawaban2`, `jawaban3`, `jawaban_benar`) VALUES
(2, 'Di bawah ini yang termasuk ke tipe data primitif adalah', 'String', 'Integer', 'Array', 2),
(3, 'Dalam Java, bagaimana cara menginisialisasi sebuah array?', 'int[] arr = {1, 2, 3};', 'array arr = {1, 2, 3};', 'arr Array = {1, 2, 3};', 1),
(4, 'Apa itu polymorphism pada java', 'kemampuan sebuah objek untuk mengakses data dari objek lain', 'kemampuan sebuah objek yang dapat memiliki banyak bentuk', 'kemampuan sebuah objek untuk terhubung dengan basis data', 2),
(5, 'Apa yang dimaksud dengan exception handling dalam java?', 'cara menangani kejadian tak terduga pada program', 'cara membuat program menjadi lebih cepat', 'cara menangani input dari pengguna', 1),
(6, 'Bagaimana cara membuat objek pada java', 'Dengan mendefinisikan variabel tanpa inisialisasi', 'Dengan menggunakan operator new', 'Dengan menggunakan operator this', 2),
(7, 'Apa yang dimaksud dengan JDK pada java', 'Java Design Kit', 'Java Debugging Kit', 'Java Development Kit ', 3),
(8, 'Berikut ini yang termasuk ke dalam jenis - jenis percabangan pada java', 'if-else', 'for', 'while', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_soal_41`
--

CREATE TABLE `tb_soal_41` (
  `id` int(11) NOT NULL,
  `soal` varchar(255) NOT NULL,
  `jawaban1` varchar(255) NOT NULL,
  `jawaban2` varchar(225) NOT NULL,
  `jawaban3` varchar(225) NOT NULL,
  `jawaban_benar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_soal_41`
--

INSERT INTO `tb_soal_41` (`id`, `soal`, `jawaban1`, `jawaban2`, `jawaban3`, `jawaban_benar`) VALUES
(1, 'Java dipelopori oleh ... pada tahun ...', 'James Gosling dan Patrick, 1991', 'White Paper, 1991', 'James Gosling, 1995', 1),
(2, 'Awal Java dikenal dengan nama ...', 'Jawa', 'OAK', 'JDK', 2),
(3, 'Yang termasuk kelemahan java ialah ...', 'Penggunaan memori yang besar', 'Sederhana', 'Tidak Dinamis', 1),
(4, 'Yang termasuk kriteria java menurut white paper ialah ...', 'Robust', 'Sederhana', 'Tidak Dinamis', 1),
(5, 'Yang termasuk keunggulan Java ialah ...', 'Sederhana', 'Robust', 'Tidak Dinamis', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_soal_42`
--

CREATE TABLE `tb_soal_42` (
  `id` int(11) NOT NULL,
  `soal` varchar(255) NOT NULL,
  `jawaban1` varchar(255) NOT NULL,
  `jawaban2` varchar(225) NOT NULL,
  `jawaban3` varchar(225) NOT NULL,
  `jawaban_benar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_soal_42`
--

INSERT INTO `tb_soal_42` (`id`, `soal`, `jawaban1`, `jawaban2`, `jawaban3`, `jawaban_benar`) VALUES
(1, 'Yang TIDAK mempengaruhi Indikator Kesalahan Penempatan Tenaga Kerja adalah', 'Tenaga kerja tidak produktif', 'Biaya rendah', 'Timbul Konflik dan Biaya tinggi', 2),
(2, 'Tujuan Menarik SDM Eksternal adalah untuk', 'Memperoleh gagasan atau ide baru', 'Mencegah persaingan yang negatif', 'Jawaban A dan B benar', 3),
(3, 'Struktur organisasi Fungsional meliputi di bawah ini, kecuali', 'Kewenangan ditentukan oleh pola hubungan antar berbagai fungsi manajemen.', 'Dibentuk berdasarkan divisi yang terkait erat dengan produk-produk perusahaan.', 'Dibuat dengan membentuk bagian pemasaran, operasional, produksi, keuangan, SDM.', 2),
(4, 'Di bawah ini mana yang termasuk tipe model bisnis e-commerce', 'Penjualan online ( langsung tanpa melalui perantara )', 'Sistem tender elektronik dan Lelang online', 'Jawaban benar semua', 3),
(5, 'Seorang atau sekelompok orang atau perusahaan kecil yang bergerak di bidang jasa pembuatan atau perbaikan perangkat lunak (software)., disebu', 'Software House', 'Support Online system', 'Salah semua', 1);

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
-- Indexes for table `tb_hasil_40`
--
ALTER TABLE `tb_hasil_40`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `npm` (`npm`);

--
-- Indexes for table `tb_hasil_41`
--
ALTER TABLE `tb_hasil_41`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `npm` (`npm`);

--
-- Indexes for table `tb_hasil_42`
--
ALTER TABLE `tb_hasil_42`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `npm` (`npm`);

--
-- Indexes for table `tb_soal_3`
--
ALTER TABLE `tb_soal_3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_soal_40`
--
ALTER TABLE `tb_soal_40`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_soal_41`
--
ALTER TABLE `tb_soal_41`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_soal_42`
--
ALTER TABLE `tb_soal_42`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_daftar_kuis`
--
ALTER TABLE `tb_daftar_kuis`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tb_hasil_3`
--
ALTER TABLE `tb_hasil_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_hasil_40`
--
ALTER TABLE `tb_hasil_40`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_hasil_41`
--
ALTER TABLE `tb_hasil_41`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_hasil_42`
--
ALTER TABLE `tb_hasil_42`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_soal_3`
--
ALTER TABLE `tb_soal_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_soal_40`
--
ALTER TABLE `tb_soal_40`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_soal_41`
--
ALTER TABLE `tb_soal_41`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_soal_42`
--
ALTER TABLE `tb_soal_42`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
