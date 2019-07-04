-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 04, 2019 at 01:08 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sensasiq`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbabsen`
--

CREATE TABLE `tbabsen` (
  `id_absen` int(80) NOT NULL,
  `id_jadwal` int(20) NOT NULL,
  `id_qr` int(80) NOT NULL,
  `nim` int(20) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbabsen`
--

INSERT INTO `tbabsen` (`id_absen`, `id_jadwal`, `id_qr`, `nim`, `waktu`) VALUES
(16, 10, 46, 6969, '2019-06-30 11:02:43'),
(17, 8, 46, 1121, '2019-06-30 11:03:00'),
(18, 10, 46, 1610302, '2019-06-30 11:03:48'),
(20, 5, 55, 1121, '2019-07-01 11:48:01'),
(23, 7, 56, 1121, '2019-07-01 12:08:37'),
(24, 7, 57, 1121, '2019-07-01 12:09:02'),
(25, 7, 57, 1121, '2019-07-01 12:09:15'),
(26, 5, 59, 1121, '2019-07-02 08:17:00'),
(27, 5, 59, 1121, '2019-07-02 08:17:52'),
(28, 7, 60, 1121, '2019-07-02 08:29:54'),
(29, 5, 61, 1121, '2019-07-02 08:38:42'),
(30, 5, 62, 1121, '2019-07-02 08:42:27'),
(31, 5, 62, 1121, '2019-07-02 08:43:03'),
(32, 5, 62, 1121, '2019-07-02 08:43:46'),
(33, 5, 62, 1121, '2019-07-02 08:48:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbdosen`
--

CREATE TABLE `tbdosen` (
  `nip` int(20) NOT NULL,
  `nama_dosen` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbdosen`
--

INSERT INTO `tbdosen` (`nip`, `nama_dosen`, `password`) VALUES
(6969, 'Ardi Sanjaya', 'b11d5ece6353d17f85c5ad30e0a02360'),
(15120001, 'elga asfa', 'b11d5ece6353d17f85c5ad30e0a02360'),
(15120002, 'M tri anwarudin', 'b11d5ece6353d17f85c5ad30e0a02360'),
(15120003, 'leon prastya', 'b11d5ece6353d17f85c5ad30e0a02360'),
(15120004, 'indra lady', 'b11d5ece6353d17f85c5ad30e0a02360'),
(15120005, 'angel paramita', 'b11d5ece6353d17f85c5ad30e0a02360'),
(15120006, 'iqbal haqiqi', 'b11d5ece6353d17f85c5ad30e0a02360'),
(15120007, 'reza darmawan', 'b11d5ece6353d17f85c5ad30e0a02360'),
(15120008, 'hari purnomo', 'b11d5ece6353d17f85c5ad30e0a02360'),
(15120009, 'helmy ayu', 'b11d5ece6353d17f85c5ad30e0a02360'),
(15120010, 'indah andira', 'b11d5ece6353d17f85c5ad30e0a02360');

-- --------------------------------------------------------

--
-- Table structure for table `tbjadwal`
--

CREATE TABLE `tbjadwal` (
  `id_jadwal` int(20) NOT NULL,
  `id_matkul` int(20) NOT NULL,
  `id_kelas` int(20) NOT NULL,
  `nip` int(20) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbjadwal`
--

INSERT INTO `tbjadwal` (`id_jadwal`, `id_matkul`, `id_kelas`, `nip`, `waktu`) VALUES
(5, 1, 1, 6969, '2019-06-19 18:00:00'),
(7, 2, 2, 6969, '2019-06-29 09:30:00'),
(8, 6, 3, 15120003, '2019-06-22 02:00:00'),
(9, 11, 5, 15120006, '2019-06-22 09:00:00'),
(10, 13, 3, 15120005, '2019-06-22 04:00:00'),
(11, 5, 2, 15120002, '2019-06-22 02:00:00'),
(12, 4, 4, 15120004, '2019-06-22 10:00:00'),
(13, 9, 5, 15120007, '2019-06-22 04:00:00'),
(14, 7, 2, 15120004, '2019-06-22 05:00:00'),
(15, 1, 7, 15120001, '2019-06-22 03:00:00'),
(16, 4, 7, 15120001, '2019-06-19 00:00:00'),
(17, 12, 5, 15120002, '2019-06-26 00:00:00'),
(18, 14, 3, 15120003, '2019-06-28 00:00:00'),
(19, 10, 3, 15120003, '2019-06-28 00:00:00'),
(20, 13, 5, 15120004, '2019-06-12 00:00:00'),
(21, 4, 3, 15120003, '2019-06-27 00:00:00'),
(22, 2, 1, 15120008, '2019-06-19 12:00:00'),
(23, 3, 1, 15120009, '2019-06-30 14:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbkelas`
--

CREATE TABLE `tbkelas` (
  `id_kelas` int(20) NOT NULL,
  `nama_kelas` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbkelas`
--

INSERT INTO `tbkelas` (`id_kelas`, `nama_kelas`) VALUES
(1, '3A'),
(2, '3B'),
(3, '1A'),
(4, '1B'),
(5, '1C'),
(6, '2A'),
(7, '2B');

-- --------------------------------------------------------

--
-- Table structure for table `tbmahasiswa`
--

CREATE TABLE `tbmahasiswa` (
  `nim` int(20) NOT NULL,
  `nama_mahasiswa` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_kelas` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbmahasiswa`
--

INSERT INTO `tbmahasiswa` (`nim`, `nama_mahasiswa`, `password`, `device_id`, `id_kelas`) VALUES
(666, 'Levi Ackerman', 'fae0b27c451c728867a567e8c1bb4e53', '6afaa4921f8fa092', 6),
(1121, 'Eren Yeager', '3a15c7d0bbe60300a39f76f8a5ba6896', NULL, 5),
(2110, 'Reza Darmawan', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 4),
(6000, 'Fery Setiawan', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 3),
(6600, 'Elga Asfa', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2),
(6969, 'Emma Goldman', '1121', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(8100, 'Muhammad Tri Anwarruddin', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 1),
(1610303, 'budi', 'sembarang', '987654567', 5),
(1610304, 'sali', 'sembarang', '78987654456', 2),
(1610306, 'lely', 'sembarang', '3456765434', 3),
(1610307, 'caca', 'sembarang', '4567654', 7),
(1610308, 'icha', 'sembarang', '95678965', 7),
(1610309, 'ayu', 'sembarang', '5467896756454', 4),
(1610310, 'sari', 'sembarang', '354657687', 2),
(3253433, 'Proudhon', 'insureksi', '2325345', 1),
(16010301, 'adi', 'sembarang', '4567898765', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbmatkul`
--

CREATE TABLE `tbmatkul` (
  `id_matkul` int(20) NOT NULL,
  `nama_matkul` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbmatkul`
--

INSERT INTO `tbmatkul` (`id_matkul`, `nama_matkul`) VALUES
(1, 'Algoritma Pemrograman I'),
(2, 'Jaringan Komputer II'),
(3, 'B. indonesia'),
(4, 'B.inggris'),
(5, 'IPS'),
(6, 'IPA'),
(7, 'Agama'),
(8, 'B.jawa'),
(9, 'B.sunda'),
(10, 'WEB'),
(11, 'Database'),
(12, 'Sistem terdistribusi'),
(13, 'PKN'),
(14, 'Pancasila');

-- --------------------------------------------------------

--
-- Table structure for table `tbqr`
--

CREATE TABLE `tbqr` (
  `id_qr` int(80) NOT NULL,
  `nip` int(20) NOT NULL,
  `qr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbqr`
--

INSERT INTO `tbqr` (`id_qr`, `nip`, `qr`) VALUES
(45, 6969, '4993cba4a9075df608e036938e8911d6'),
(46, 6969, '4c005d446727145f6579e8d81d8fac66'),
(47, 6969, '702a26450927312a773e7bcf722911d1'),
(48, 6969, '2-3B-6969-1561912458'),
(49, 6969, '7-2-3B-6969-1561977103'),
(50, 6969, '7-2-3B-6961561977973'),
(51, 6969, '5-1-3A-6961561979709'),
(52, 6969, '7-2-3B-6961561980001'),
(53, 6969, '5-1-3A-6961561980898'),
(54, 6969, '5-1-3A-6961561981660'),
(55, 6969, '5-1-3A-6969-1561981672'),
(56, 6969, '7-2-3B-6969-1561982911'),
(57, 6969, '7-2-3B-6961561982967'),
(58, 6969, '5-1-3A-6961562055390'),
(59, 6969, '5-1-3A-6961562055479'),
(60, 6969, '7-2-3B-6969-1562056189'),
(61, 6969, '5-1-3A-6961562056749'),
(62, 6969, '5-1-3A-6961562057335');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbabsen`
--
ALTER TABLE `tbabsen`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_qr` (`id_qr`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `tbdosen`
--
ALTER TABLE `tbdosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tbjadwal`
--
ALTER TABLE `tbjadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_matkul` (`id_matkul`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `tbkelas`
--
ALTER TABLE `tbkelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tbmahasiswa`
--
ALTER TABLE `tbmahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `tbmahasiswa_ibfk_1` (`id_kelas`);

--
-- Indexes for table `tbmatkul`
--
ALTER TABLE `tbmatkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indexes for table `tbqr`
--
ALTER TABLE `tbqr`
  ADD PRIMARY KEY (`id_qr`),
  ADD KEY `nip` (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbabsen`
--
ALTER TABLE `tbabsen`
  MODIFY `id_absen` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbjadwal`
--
ALTER TABLE `tbjadwal`
  MODIFY `id_jadwal` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbkelas`
--
ALTER TABLE `tbkelas`
  MODIFY `id_kelas` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbmatkul`
--
ALTER TABLE `tbmatkul`
  MODIFY `id_matkul` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbqr`
--
ALTER TABLE `tbqr`
  MODIFY `id_qr` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbabsen`
--
ALTER TABLE `tbabsen`
  ADD CONSTRAINT `tbabsen_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `tbjadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbabsen_ibfk_2` FOREIGN KEY (`id_qr`) REFERENCES `tbqr` (`id_qr`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbjadwal`
--
ALTER TABLE `tbjadwal`
  ADD CONSTRAINT `tbjadwal_ibfk_1` FOREIGN KEY (`id_matkul`) REFERENCES `tbmatkul` (`id_matkul`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbjadwal_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `tbkelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbjadwal_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `tbdosen` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbmahasiswa`
--
ALTER TABLE `tbmahasiswa`
  ADD CONSTRAINT `tbmahasiswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tbkelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbqr`
--
ALTER TABLE `tbqr`
  ADD CONSTRAINT `tbqr_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tbdosen` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
