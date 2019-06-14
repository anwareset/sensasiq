-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 14, 2019 at 11:15 AM
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
(6969, 'Ardick Sanjaya Ea', '89a4b5bd7d02ad1e342c960e6a98365c');

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
(5, 1, 1, 6969, '2019-06-19 08:00:00'),
(7, 2, 2, 6969, '2019-06-29 09:30:00');

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
(2, '3B');

-- --------------------------------------------------------

--
-- Table structure for table `tbmahasiswa`
--

CREATE TABLE `tbmahasiswa` (
  `nim` int(20) NOT NULL,
  `nama_mahasiswa` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_id` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kelas` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbmahasiswa`
--

INSERT INTO `tbmahasiswa` (`nim`, `nama_mahasiswa`, `password`, `device_id`, `id_kelas`) VALUES
(1610302, 'Tri Anwarruddin', '1234', 'iilergowgn43oigo', 1),
(3253433, 'Proudhon', 'insureksi', '2325345', 1);

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
(2, 'Jaringan Komputer II');

-- --------------------------------------------------------

--
-- Table structure for table `tbqr`
--

CREATE TABLE `tbqr` (
  `id_qr` int(80) NOT NULL,
  `nip` int(20) NOT NULL,
  `qr` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL
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
  MODIFY `id_absen` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbjadwal`
--
ALTER TABLE `tbjadwal`
  MODIFY `id_jadwal` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbkelas`
--
ALTER TABLE `tbkelas`
  MODIFY `id_kelas` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbmatkul`
--
ALTER TABLE `tbmatkul`
  MODIFY `id_matkul` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbqr`
--
ALTER TABLE `tbqr`
  MODIFY `id_qr` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbabsen`
--
ALTER TABLE `tbabsen`
  ADD CONSTRAINT `tbabsen_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `tbjadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbabsen_ibfk_2` FOREIGN KEY (`id_qr`) REFERENCES `tbqr` (`id_qr`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbabsen_ibfk_3` FOREIGN KEY (`nim`) REFERENCES `tbmahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

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
