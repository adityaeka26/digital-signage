-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2019 at 06:59 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitalsignage`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `kode_dosen` varchar(5) NOT NULL,
  `foto_dosen` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `kode_ruangan` varchar(25) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`kode_dosen`, `foto_dosen`, `username`, `password`, `kode_ruangan`, `nama_dosen`) VALUES
('adr', 'foto_adr.jpg', 'adr', 'de7c54d99428fb909bef013577070f0d', 'e1', 'Andrian Rakhmatsyah'),
('aeb', 'foto_aeb.jpg', 'aeb', 'f5b443d5efd16a1c2902e388f0f1b9eb', 'e1', 'Aditya Eka Bagaskara'),
('ryj', 'foto_ryj.jpg', 'ryj', 'd59a9e3439e998263636c14168ae18b0', 'e1', 'Rahmat Yasirandi');

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `kode_hari` varchar(15) NOT NULL,
  `nama_hari` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`kode_hari`, `nama_hari`) VALUES
('h1', 'Senin'),
('h2', 'Selasa'),
('h3', 'Rabu'),
('h4', 'Kamis'),
('h5', 'Jumat'),
('h6', 'Sabtu');

-- --------------------------------------------------------

--
-- Table structure for table `jam_mulai`
--

CREATE TABLE `jam_mulai` (
  `kode_jam_mulai` varchar(15) NOT NULL,
  `jam_mulai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `jam_mulai`
--

INSERT INTO `jam_mulai` (`kode_jam_mulai`, `jam_mulai`) VALUES
('jm01', '06:30:00'),
('jm02', '07:00:00'),
('jm03', '07:30:00'),
('jm04', '08:00:00'),
('jm05', '08:30:00'),
('jm06', '09:00:00'),
('jm07', '09:30:00'),
('jm08', '10:00:00'),
('jm09', '10:30:00'),
('jm10', '11:00:00'),
('jm11', '11:30:00'),
('jm12', '12:00:00'),
('jm13', '12:30:00'),
('jm14', '13:00:00'),
('jm15', '13:30:00'),
('jm16', '14:00:00'),
('jm17', '14:30:00'),
('jm18', '15:00:00'),
('jm19', '15:30:00'),
('jm20', '16:00:00'),
('jm21', '16:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `jam_selesai`
--

CREATE TABLE `jam_selesai` (
  `kode_jam_selesai` varchar(15) NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jam_selesai`
--

INSERT INTO `jam_selesai` (`kode_jam_selesai`, `jam_selesai`) VALUES
('js01', '06:30:00'),
('js02', '07:00:00'),
('js03', '07:30:00'),
('js04', '08:00:00'),
('js05', '08:30:00'),
('js06', '09:00:00'),
('js07', '09:30:00'),
('js08', '10:00:00'),
('js09', '10:30:00'),
('js10', '11:00:00'),
('js11', '11:30:00'),
('js12', '12:00:00'),
('js13', '12:30:00'),
('js14', '13:00:00'),
('js15', '13:30:00'),
('js16', '14:00:00'),
('js17', '14:30:00'),
('js18', '15:00:00'),
('js19', '15:30:00'),
('js20', '16:00:00'),
('js21', '16:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `kode_kegiatan` int(15) NOT NULL,
  `nama_kegiatan` varchar(50) NOT NULL,
  `jenis_kegiatan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`kode_kegiatan`, `nama_kegiatan`, `jenis_kegiatan`) VALUES
(1, 'Mengajar', 'tidak dapat ditemui'),
(2, 'Rapat', 'tidak dapat ditemui'),
(3, 'Bimbingan Mahasiswa', 'dapat ditemui'),
(4, 'Responsi', 'dapat ditemui');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_dosen`
--

CREATE TABLE `kegiatan_dosen` (
  `kode_kegiatan_dosen` int(15) NOT NULL,
  `kode_dosen` varchar(5) NOT NULL,
  `kode_kegiatan` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan_dosen`
--

INSERT INTO `kegiatan_dosen` (`kode_kegiatan_dosen`, `kode_dosen`, `kode_kegiatan`) VALUES
(1, 'adr', 1),
(2, 'adr', 1),
(3, 'adr', 2),
(4, 'adr', 2),
(5, 'adr', 3),
(7, 'adr', 4),
(8, 'adr', 4),
(9, 'ryj', 1),
(10, 'ryj', 1),
(11, 'ryj', 4),
(12, 'ryj', 3),
(13, 'ryj', 4),
(14, 'ryj', 1),
(15, 'ryj', 2),
(16, 'aeb', 4),
(17, 'ryj', 2),
(18, 'ryj', 1),
(19, 'ryj', 3),
(20, 'ryj', 4),
(21, 'ryj', 4),
(22, 'ryj', 3),
(23, 'ryj', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_dosen_hari`
--

CREATE TABLE `kegiatan_dosen_hari` (
  `kode_kegiatan_dosen_hari` int(15) NOT NULL,
  `kode_kegiatan_dosen` int(15) NOT NULL,
  `kode_hari` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan_dosen_hari`
--

INSERT INTO `kegiatan_dosen_hari` (`kode_kegiatan_dosen_hari`, `kode_kegiatan_dosen`, `kode_hari`) VALUES
(1, 1, 'h1'),
(2, 2, 'h2'),
(3, 3, 'h3'),
(4, 4, 'h4'),
(5, 5, 'h4'),
(7, 7, 'h6'),
(8, 8, 'h2'),
(9, 9, 'h4'),
(10, 10, 'h3'),
(11, 11, 'h3'),
(12, 12, 'h4'),
(13, 13, 'h5'),
(14, 14, 'h4'),
(15, 15, 'h4'),
(16, 16, 'h4'),
(17, 17, 'h2'),
(18, 18, 'h2'),
(19, 19, 'h2'),
(20, 20, 'h2'),
(21, 21, 'h2'),
(22, 22, 'h2'),
(23, 23, 'h2');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_dosen_jam_mulai`
--

CREATE TABLE `kegiatan_dosen_jam_mulai` (
  `kode_kegiatan_dosen_jam_mulai` int(15) NOT NULL,
  `kode_kegiatan_dosen` int(15) NOT NULL,
  `kode_jam_mulai` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan_dosen_jam_mulai`
--

INSERT INTO `kegiatan_dosen_jam_mulai` (`kode_kegiatan_dosen_jam_mulai`, `kode_kegiatan_dosen`, `kode_jam_mulai`) VALUES
(1, 1, 'jm01'),
(2, 2, 'jm05'),
(3, 3, 'jm03'),
(4, 4, 'jm04'),
(5, 5, 'jm05'),
(7, 7, 'jm07'),
(8, 8, 'jm08'),
(9, 9, 'jm09'),
(10, 10, 'jm10'),
(11, 11, 'jm11'),
(12, 12, 'jm12'),
(13, 13, 'jm13'),
(14, 14, 'jm16'),
(15, 15, 'jm04'),
(16, 16, 'jm05'),
(17, 17, 'jm06'),
(18, 18, 'jm16'),
(19, 19, 'jm01'),
(20, 20, 'jm06'),
(21, 21, 'jm16'),
(22, 22, 'jm19'),
(23, 23, 'jm10');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_dosen_jam_selesai`
--

CREATE TABLE `kegiatan_dosen_jam_selesai` (
  `kode_kegiatan_dosen_jam_selesai` int(15) NOT NULL,
  `kode_kegiatan_dosen` int(15) NOT NULL,
  `kode_jam_selesai` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan_dosen_jam_selesai`
--

INSERT INTO `kegiatan_dosen_jam_selesai` (`kode_kegiatan_dosen_jam_selesai`, `kode_kegiatan_dosen`, `kode_jam_selesai`) VALUES
(1, 1, 'js02'),
(2, 2, 'js06'),
(3, 3, 'js05'),
(4, 4, 'js05'),
(5, 5, 'js07'),
(7, 7, 'js08'),
(8, 8, 'js11'),
(9, 9, 'js12'),
(10, 10, 'js11'),
(11, 11, 'js13'),
(12, 12, 'js16'),
(13, 13, 'js19'),
(14, 14, 'js21'),
(15, 15, 'js10'),
(16, 16, 'js08'),
(17, 17, 'js16'),
(18, 18, 'js17'),
(19, 19, 'js07'),
(20, 20, 'js13'),
(21, 21, 'js19'),
(22, 22, 'js21'),
(23, 23, 'js15');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `kode_ruangan` varchar(25) NOT NULL,
  `nama_ruangan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`kode_ruangan`, `nama_ruangan`) VALUES
('e1', 'E1'),
('e2', 'E2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`kode_dosen`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `kode_ruangan` (`kode_ruangan`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`kode_hari`);

--
-- Indexes for table `jam_mulai`
--
ALTER TABLE `jam_mulai`
  ADD PRIMARY KEY (`kode_jam_mulai`);

--
-- Indexes for table `jam_selesai`
--
ALTER TABLE `jam_selesai`
  ADD PRIMARY KEY (`kode_jam_selesai`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`kode_kegiatan`);

--
-- Indexes for table `kegiatan_dosen`
--
ALTER TABLE `kegiatan_dosen`
  ADD PRIMARY KEY (`kode_kegiatan_dosen`),
  ADD KEY `kode_dosen` (`kode_dosen`),
  ADD KEY `kode_jadwal` (`kode_kegiatan`);

--
-- Indexes for table `kegiatan_dosen_hari`
--
ALTER TABLE `kegiatan_dosen_hari`
  ADD PRIMARY KEY (`kode_kegiatan_dosen_hari`),
  ADD KEY `kode_kegiatan_dosen` (`kode_kegiatan_dosen`),
  ADD KEY `kode_hari` (`kode_hari`);

--
-- Indexes for table `kegiatan_dosen_jam_mulai`
--
ALTER TABLE `kegiatan_dosen_jam_mulai`
  ADD PRIMARY KEY (`kode_kegiatan_dosen_jam_mulai`),
  ADD KEY `kode_kegiatan_dosen` (`kode_kegiatan_dosen`),
  ADD KEY `kode_jam_mulai` (`kode_jam_mulai`);

--
-- Indexes for table `kegiatan_dosen_jam_selesai`
--
ALTER TABLE `kegiatan_dosen_jam_selesai`
  ADD PRIMARY KEY (`kode_kegiatan_dosen_jam_selesai`),
  ADD KEY `kode_kegiatan_dosen` (`kode_kegiatan_dosen`),
  ADD KEY `kode_jam_selesai` (`kode_jam_selesai`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`kode_ruangan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `kode_kegiatan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kegiatan_dosen`
--
ALTER TABLE `kegiatan_dosen`
  MODIFY `kode_kegiatan_dosen` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `kegiatan_dosen_hari`
--
ALTER TABLE `kegiatan_dosen_hari`
  MODIFY `kode_kegiatan_dosen_hari` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `kegiatan_dosen_jam_mulai`
--
ALTER TABLE `kegiatan_dosen_jam_mulai`
  MODIFY `kode_kegiatan_dosen_jam_mulai` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `kegiatan_dosen_jam_selesai`
--
ALTER TABLE `kegiatan_dosen_jam_selesai`
  MODIFY `kode_kegiatan_dosen_jam_selesai` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`kode_ruangan`) REFERENCES `ruangan` (`kode_ruangan`);

--
-- Constraints for table `kegiatan_dosen`
--
ALTER TABLE `kegiatan_dosen`
  ADD CONSTRAINT `kegiatan_dosen_ibfk_1` FOREIGN KEY (`kode_dosen`) REFERENCES `dosen` (`kode_dosen`),
  ADD CONSTRAINT `kegiatan_dosen_ibfk_2` FOREIGN KEY (`kode_kegiatan`) REFERENCES `kegiatan` (`kode_kegiatan`);

--
-- Constraints for table `kegiatan_dosen_hari`
--
ALTER TABLE `kegiatan_dosen_hari`
  ADD CONSTRAINT `kegiatan_dosen_hari_ibfk_1` FOREIGN KEY (`kode_kegiatan_dosen`) REFERENCES `kegiatan_dosen` (`kode_kegiatan_dosen`),
  ADD CONSTRAINT `kegiatan_dosen_hari_ibfk_2` FOREIGN KEY (`kode_hari`) REFERENCES `hari` (`kode_hari`);

--
-- Constraints for table `kegiatan_dosen_jam_mulai`
--
ALTER TABLE `kegiatan_dosen_jam_mulai`
  ADD CONSTRAINT `kegiatan_dosen_jam_mulai_ibfk_1` FOREIGN KEY (`kode_kegiatan_dosen`) REFERENCES `kegiatan_dosen` (`kode_kegiatan_dosen`),
  ADD CONSTRAINT `kegiatan_dosen_jam_mulai_ibfk_2` FOREIGN KEY (`kode_jam_mulai`) REFERENCES `jam_mulai` (`kode_jam_mulai`);

--
-- Constraints for table `kegiatan_dosen_jam_selesai`
--
ALTER TABLE `kegiatan_dosen_jam_selesai`
  ADD CONSTRAINT `kegiatan_dosen_jam_selesai_ibfk_1` FOREIGN KEY (`kode_kegiatan_dosen`) REFERENCES `kegiatan_dosen` (`kode_kegiatan_dosen`),
  ADD CONSTRAINT `kegiatan_dosen_jam_selesai_ibfk_2` FOREIGN KEY (`kode_jam_selesai`) REFERENCES `jam_selesai` (`kode_jam_selesai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
