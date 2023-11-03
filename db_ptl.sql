-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2023 at 02:28 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ptl`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `nama`, `keterangan`) VALUES
(4, 'A1', 'Loa Janan Ilir\r\n'),
(5, 'A2', 'Palaran\r\n'),
(6, 'A3', 'Samarinda Ilir\r\n'),
(7, 'A4', 'Samarinda Kota\r\n'),
(8, 'A5', 'Samarinda Seberang\r\n'),
(9, 'A6', 'Samarinda Ulu\r\n'),
(10, 'A7', 'Samarinda Utara\r\n'),
(11, 'A8', 'Sambutan\r\n'),
(12, 'A9', 'Sungai Kunjang\r\n'),
(13, 'A10', 'Sungai Pinang\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `alternatif_id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `alternatif_id`, `kriteria_id`, `number`) VALUES
(99, 4, 9, 20),
(100, 4, 10, 347),
(101, 4, 11, 11),
(102, 4, 12, 3612),
(103, 4, 13, 5385),
(104, 4, 14, 4),
(105, 4, 15, 39),
(106, 5, 9, 39),
(107, 5, 10, 381),
(108, 5, 11, 22),
(109, 5, 12, 1901),
(110, 5, 13, 2607),
(111, 5, 14, 2),
(112, 5, 15, 23),
(113, 6, 9, 172),
(114, 6, 10, 282),
(115, 6, 11, 36),
(116, 6, 12, 2438),
(117, 6, 13, 8547),
(118, 6, 14, 1),
(119, 6, 15, 20),
(120, 7, 9, 230),
(121, 7, 10, 400),
(122, 7, 11, 25),
(123, 7, 12, 782),
(124, 7, 13, 8054),
(125, 7, 14, 4),
(126, 7, 15, 19),
(127, 8, 9, 987),
(128, 8, 10, 435),
(129, 8, 11, 46),
(130, 8, 12, 2959),
(131, 8, 13, 7960),
(132, 8, 14, 3),
(133, 8, 15, 22),
(134, 9, 9, 638),
(135, 9, 10, 186),
(136, 9, 11, 8),
(137, 9, 12, 4653),
(138, 9, 13, 3471),
(139, 9, 14, 1),
(140, 9, 15, 61),
(141, 10, 9, 75),
(142, 10, 10, 230),
(143, 10, 11, 11),
(144, 10, 12, 719),
(145, 10, 13, 9977),
(146, 10, 14, 4),
(147, 10, 15, 64),
(148, 11, 9, 453),
(149, 11, 10, 294),
(150, 11, 11, 13),
(151, 11, 12, 4765),
(152, 11, 13, 2461),
(153, 11, 14, 5),
(154, 11, 15, 44),
(155, 12, 9, 867),
(156, 12, 10, 408),
(157, 12, 11, 40),
(158, 12, 12, 771),
(159, 12, 13, 6010),
(160, 12, 14, 2),
(161, 12, 15, 85),
(162, 13, 9, 721),
(163, 13, 10, 505),
(164, 13, 11, 49),
(165, 13, 12, 2320),
(166, 13, 13, 2010),
(167, 13, 14, 2),
(168, 13, 15, 76);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `kriteria` varchar(50) NOT NULL,
  `bobot` varchar(5) NOT NULL,
  `atribut` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `kriteria`, `bobot`, `atribut`) VALUES
(9, 'C1', '6', 0),
(10, 'C2', '4', 0),
(11, 'C3', '3', 0),
(12, 'C4', '3', 1),
(13, 'C5', '5', 1),
(14, 'C6', '2', 0),
(15, 'C7', '4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
