-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 30, 2019 at 09:47 AM
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
(21, 4, 3, 15120003, '2019-06-27 00:00:00');

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
  `device_id` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kelas` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbmahasiswa`
--

INSERT INTO `tbmahasiswa` (`nim`, `nama_mahasiswa`, `password`, `device_id`, `id_kelas`) VALUES
(1121, 'Eren Yeager', '7813d1590d28a7dd372ad54b5d29d033', '81dc9bdb52d04dc20036dbd8313ed055', 5),
(6969, 'Emma Goldman', '1121', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(1610302, 'Tri Anwarruddin', '1234', 'iilergowgn43oigo', 1),
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
  MODIFY `id_absen` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbjadwal`
--
ALTER TABLE `tbjadwal`
  MODIFY `id_jadwal` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `id_qr` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
