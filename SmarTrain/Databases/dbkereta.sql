-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2020 at 06:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbkereta`
--

-- --------------------------------------------------------

--
-- Table structure for table `kereta`
--

CREATE TABLE `kereta` (
  `id_ka` int(11) NOT NULL,
  `nama_ka` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `jam_berangkat` time NOT NULL,
  `jam_tiba` time NOT NULL,
  `asal` varchar(50) NOT NULL,
  `ke` varchar(50) NOT NULL,
  `harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kereta`
--

INSERT INTO `kereta` (`id_ka`, `nama_ka`, `kelas`, `tgl`, `jam_berangkat`, `jam_tiba`, `asal`, `ke`, `harga`) VALUES
(1001, 'Songgoriti', 'Ekonomi', '2020-02-01', '11:10:00', '13:10:00', 'Malang', 'Sidoarjo', 40000),
(1002, 'Jayabaya', 'Eksekutif', '2020-02-01', '15:10:00', '01:10:00', 'Malang', 'Jakarta', 350000),
(1003, 'Bima', 'Eksekutif', '2020-02-01', '14:25:00', '21:49:00', 'Malang', 'Yogyakarta', 495000),
(1004, 'Malioboro Ekspress', 'Eksekutif', '2020-02-02', '20:05:00', '03:14:00', 'Malang', 'Yogyakarta', 270000),
(1005, 'Songgoriti', 'Ekonomi', '2020-02-02', '06:10:00', '07:49:00', 'Sidoarjo', 'Malang', 40000),
(1006, 'Jayabaya', 'Eksekutif', '2020-02-02', '01:10:00', '15:10:00', 'Jakarta', 'Malang', 350000),
(1007, 'Bima', 'Eksekutif', '2020-02-03', '14:25:00', '21:49:00', 'Malang', 'Jakarta', 495000),
(1008, 'Malioboro Ekspress', 'Eksekutif', '2020-02-03', '10:05:00', '14:14:00', 'Yogyakarta', 'Malang', 270000),
(1009, 'Songgoriti', 'Ekonomi', '2020-02-03', '11:10:00', '14:10:00', 'Malang', 'Surabaya', 40000),
(1010, 'Mutiara Selatan', 'Eksekutif', '2020-02-03', '16:00:00', '08:16:00', 'Malang', 'Bandung', 510000),
(1011, 'Malabar', 'Ekonomi', '2020-02-04', '17:00:00', '09:36:00', 'Malang', 'Bandung', 495000),
(1012, 'Majapahit', 'Ekonomi', '2020-02-04', '09:00:00', '17:50:00', 'Malang', 'Semarang Tawang', 120000),
(1013, 'Matarmaja', 'Ekonomi', '2020-02-04', '06:10:00', '17:49:00', 'Malang', 'Semarang Tawang', 290000),
(1014, 'Majapahit', 'Ekonomi', '2020-02-04', '04:35:00', '13:40:00', 'Semarang Tawang', 'Malang', 260000),
(1015, 'Majapahit', 'Ekonomi', '2020-02-04', '04:35:00', '13:40:00', 'Semarang Tawang', 'Malang', 315000),
(1016, 'Songgoriti', 'Eksekutif', '2020-02-04', '11:10:00', '13:04:00', 'Malang', 'Sidoarjo', 40000),
(1017, 'Songgoriti', 'Ekonomi', '2020-02-04', '06:12:00', '07:49:00', 'Sidoarjo', 'Malang', 40000),
(1018, 'Songgoriti', 'Ekonomi', '2020-02-05', '06:10:00', '07:49:00', 'Sidoarjo', 'Malang', 40000),
(1019, 'Songgoriti', 'Ekonomi', '2020-02-05', '11:10:00', '14:10:00', 'Malang', 'Surabaya', 40000),
(1020, 'Jayabaya', 'Eksekutif', '2020-02-05', '11:10:00', '13:04:00', 'Malang', 'Sidoarjo', 40000),
(1021, 'Jayabaya', 'Eksekutif', '2020-02-05', '15:10:00', '01:10:00', 'Malang', 'Jakarta', 350000),
(1022, 'Bima', 'Eksekutif', '2020-02-05', '14:25:00', '21:49:00', 'Malang', 'Yogyakarta', 495000),
(1023, 'Malioboro Ekspress', 'Eksekutif', '2020-02-06', '20:05:00', '03:14:00', 'Malang', 'Yogyakarta', 270000),
(1024, 'Jayabaya', 'Eksekutif', '2020-02-06', '01:10:00', '15:10:00', 'Jakarta', 'Malang', 350000),
(1025, 'Bima', 'Eksekutif', '2020-02-06', '14:25:00', '21:49:00', 'Malang', 'Jakarta', 495000),
(1026, 'Malioboro Ekspress', 'Eksekutif', '2020-02-06', '10:05:00', '14:14:00', 'Yogyakarta', 'Malang', 270000),
(1027, 'Mutiara Selatan', 'Ekseskutif', '2020-02-06', '16:00:00', '08:16:00', 'Malang', 'Bandung', 510000),
(1028, 'Malabar', 'Ekonomi', '2020-02-07', '17:00:00', '09:36:00', 'Malang', 'Bandung', 495000),
(1029, 'Majapahit', 'Ekonomi', '2020-02-07', '09:00:00', '17:50:00', 'Malang', 'Semarang Tawang', 120000),
(1030, 'Matarmaja', 'Ekonomi', '2020-02-07', '06:10:00', '17:49:00', 'Malang', 'Semarang Tawang', 290000),
(1031, 'Majapahit', 'Ekonomi', '2020-02-07', '04:35:00', '13:40:00', 'Semarang Tawang', 'Malang', 260000),
(1032, 'Majapahit', 'Ekonomi', '2020-02-07', '04:35:00', '13:40:00', 'Semarang Tawang', 'Malang', 315000);

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `ktp` varchar(50) NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `jkelamin` varchar(10) NOT NULL,
  `tgl` date NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `asal` varchar(20) NOT NULL,
  `tujuan` varchar(20) NOT NULL,
  `id_ka` int(11) NOT NULL,
  `no_duduk` int(11) NOT NULL,
  `gerbong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `id`, `nama`, `ktp`, `no_tlp`, `jkelamin`, `tgl`, `kelas`, `asal`, `tujuan`, `id_ka`, `no_duduk`, `gerbong`) VALUES
(1, 1234, 'tiya', '188829920111', '087771171221', 'Perempuan', '2020-02-03', 'Ekonomi', 'Malang', 'Surabaya', 1009, 2, 1),
(2, 1234, 'Tiya', '83273271236723', '087771171221', 'Perempuan', '2020-02-03', 'Ekonomi', 'Malang', 'Surabaya', 1009, 1, 2),
(3, 1234, 'rara', '199876901223345', '08123456789', 'Perempuan', '2020-02-03', 'Ekonomi', 'Malang', 'Surabaya', 1009, 2, 3),
(4, 1234, 'rati', '199876901223345', '08123456789', 'Perempuan', '2020-02-03', 'Ekonomi', 'Malang', 'Surabaya', 1009, 2, 3),
(5, 1234, 'rani', '827382738123912', '089231222212', 'Perempuan', '2020-02-01', 'Eksekutif', 'Malang', 'Yogyakarta', 1003, 3, 2),
(6, 1234, 'Budi', '1827187281923', '0822334433222', 'Laki-Laki', '2020-02-01', 'Eksekutif', 'Malang', 'Yogyakarta', 1003, 4, 3),
(7, 1234, 'Budi', '1827187281923', '0822334433222', 'Laki-Laki', '2020-02-01', 'Eksekutif', 'Malang', 'Yogyakarta', 1003, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(12) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Admin', 'Admin', '123admin'),
(2, 'Ranymey', 'Ranymey', '123rany'),
(3, 'Adit', 'Adit12', '123adit'),
(4, 'Rinjani', 'Rinjani', '123rinjani');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kereta`
--
ALTER TABLE `kereta`
  ADD PRIMARY KEY (`id_ka`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`),
  ADD KEY `id_ka` (`id_ka`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kereta`
--
ALTER TABLE `kereta`
  MODIFY `id_ka` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1033;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD CONSTRAINT `pembeli_ibfk_1` FOREIGN KEY (`id_ka`) REFERENCES `kereta` (`id_ka`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
