-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 03:49 PM
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
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `psw` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `email`, `psw`) VALUES
(1, 'kel4pbo', 'kel4pbo@gmail.com', '$2y$10$ZvLNHB5g9pdPHm14FWl20eOwID7v0kSGjfCR/MCHPTs9VCiSzhMf2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil`
--

CREATE TABLE `tb_hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_kuis` int(11) NOT NULL,
  `npm` int(8) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `kelas` int(5) NOT NULL,
  `jumlah_benar` int(11) NOT NULL,
  `jumlah_salah` int(11) NOT NULL,
  `skor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_hasil`
--

INSERT INTO `tb_hasil` (`id_hasil`, `id_kuis`, `npm`, `nama`, `kelas`, `jumlah_benar`, `jumlah_salah`, `skor`) VALUES
(4, 7, 50422280, 'Arya Ulya Krisna', 2, 5, 0, 100);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kuis`
--

CREATE TABLE `tb_kuis` (
  `id_kuis` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nama_kuis` varchar(60) NOT NULL,
  `jumlah_soal` int(3) NOT NULL,
  `jumlah_hasil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kuis`
--

INSERT INTO `tb_kuis` (`id_kuis`, `id_admin`, `nama_kuis`, `jumlah_soal`, `jumlah_hasil`) VALUES
(1, 1, 'Sistem Operasi', 5, 0),
(6, 1, 'Algoritma &amp; Pemrograman', 7, 0),
(7, 1, 'Pemrograman Berbasis Objek', 5, 1),
(8, 1, 'Bisnis Informatika', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_soal`
--

CREATE TABLE `tb_soal` (
  `id_soal` int(11) NOT NULL,
  `id_kuis` int(11) NOT NULL,
  `soal` varchar(225) NOT NULL,
  `jawaban1` varchar(225) NOT NULL,
  `jawaban2` varchar(225) NOT NULL,
  `jawaban3` varchar(225) NOT NULL,
  `jawaban_benar` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_soal`
--

INSERT INTO `tb_soal` (`id_soal`, `id_kuis`, `soal`, `jawaban1`, `jawaban2`, `jawaban3`, `jawaban_benar`) VALUES
(3, 1, 'Dalam proteksi hardware terdapat mode operasi yaitu', 'user mode', 'monitor mode', 'semua jawaban benar', 1),
(5, 1, 'Sasaran sistem operasi adalah', 'kenyamanan', 'semua jawaban benar', 'efisien', 2),
(6, 1, 'Pada lapisan-lapisan dalam sistem operasi yang berfungsi untuk menyederhanakan akses I/O pada level atas adalah', 'Memory management', 'User Management', 'I/O Management', 3),
(7, 1, 'Pada generasi berapa komputer dapat melakukan multiprogramming?', 'ke-1', 'ke-2', 'ke-3', 3),
(8, 1, 'Seperangkat program yang memantau dan mengatur pemakaian sumber daya komputer disebut', 'sistem operasi', 'dark sistem', 'wing system', 1),
(9, 6, 'Di bawah ini yang termasuk ke tipe data primitif adalah', 'String', 'Integer', 'Array', 2),
(10, 6, 'Dalam Java, bagaimana cara menginisialisasi sebuah array?', 'int[] arr = {1, 2, 3};', 'array arr = {1, 2, 3};', 'arr Array = {1, 2, 3};', 1),
(11, 6, 'Apa itu polymorphism pada java?', 'kemampuan sebuah objek untuk mengakses data dari objek lain', 'kemampuan sebuah objek yang dapat memiliki banyak bentuk', 'kemampuan sebuah objek untuk terhubung dengan basis data', 2),
(12, 6, 'Apa yang dimaksud dengan exception handling dalam java?', 'cara menangani kejadian tak terduga pada program', 'cara membuat program menjadi lebih cepat', 'cara menangani input dari pengguna', 1),
(13, 6, 'Bagaimana cara membuat objek pada java', 'Dengan mendefinisikan variabel tanpa inisialisasi', 'Dengan menggunakan operator new', 'Dengan menggunakan operator this', 2),
(14, 6, 'Apa yang dimaksud dengan JDK pada java', 'Java Design Kit', 'Java Debugging Kit', 'Java Development Kit', 3),
(15, 6, 'Berikut ini yang termasuk ke dalam jenis - jenis percabangan pada java', 'if-else', 'for', 'while', 1),
(16, 7, 'Java dipelopori oleh ... pada tahun ...', 'James Gosling dan Patrick, 1991', 'White Paper, 1991', 'James Gosling, 1995', 1),
(17, 7, 'Awal Java dikenal dengan nama ...', 'Jawa', 'OAK', 'JDK', 2),
(18, 7, 'Yang termasuk kelemahan java ialah ...', 'Penggunaan memori yang besar', 'Sederhana', 'Tidak Dinamis', 1),
(19, 7, 'Yang termasuk kriteria java menurut white paper ialah ...', 'Robust', 'Sederhana', 'Tidak Dinamis', 1),
(20, 7, 'Yang termasuk keunggulan Java ialah ...', 'Sederhana', 'Robust', 'Tidak Dinamis', 1),
(21, 8, 'Yang TIDAK mempengaruhi Indikator Kesalahan Penempatan Tenaga Kerja adalah', 'Tenaga kerja tidak produktif', 'Biaya rendah', 'Timbul Konflik dan Biaya tinggi', 2),
(22, 8, 'Tujuan Menarik SDM Eksternal adalah untuk', 'Memperoleh gagasan atau ide baru', 'Mencegah persaingan yang negatif', 'Jawaban A dan B benar', 3),
(23, 8, 'Struktur organisasi Fungsional meliputi di bawah ini, kecuali', 'Kewenangan ditentukan oleh pola hubungan antar berbagai fungsi manajemen.', 'Dibentuk berdasarkan divisi yang terkait erat dengan produk-produk perusahaan.', 'Dibuat dengan membentuk bagian pemasaran, operasional, produksi, keuangan, SDM.', 2),
(24, 8, 'Di bawah ini mana yang termasuk tipe model bisnis e-commerce', 'Penjualan online ( langsung tanpa melalui perantara )', 'Sistem tender elektronik dan Lelang online', 'Jawaban benar semua', 3),
(25, 8, 'Seorang atau sekelompok orang atau perusahaan kecil yang bergerak di bidang jasa pembuatan atau perbaikan perangkat lunak (software) disebut ...', 'Software House', 'Support Online system', 'Salah semua', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- Indexes for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD UNIQUE KEY `npm` (`npm`);

--
-- Indexes for table `tb_kuis`
--
ALTER TABLE `tb_kuis`
  ADD PRIMARY KEY (`id_kuis`),
  ADD UNIQUE KEY `nama_kuis` (`nama_kuis`);

--
-- Indexes for table `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kuis`
--
ALTER TABLE `tb_kuis`
  MODIFY `id_kuis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_soal`
--
ALTER TABLE `tb_soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
