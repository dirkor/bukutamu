-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2016 at 08:48 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bukutamu`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktifitas`
--

CREATE TABLE IF NOT EXISTS `aktifitas` (
  `kodeAktivitas` int(11) NOT NULL,
  `id_tamu` bigint(20) NOT NULL,
  `tujuan` varchar(250) DEFAULT NULL,
  `aksi` varchar(10) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aktifitas`
--

INSERT INTO `aktifitas` (`kodeAktivitas`, `id_tamu`, `tujuan`, `aksi`, `time`) VALUES
(2, 123456789, 'Menemui Pimpinan', 'masuk', '2016-08-21 15:11:17'),
(3, 123456789, 'Ke gedung A', 'masuk', '2016-08-21 15:10:44'),
(4, 111111, 'ke Gedung B', 'masuk', '2016-08-21 15:44:36'),
(5, 2222222, 'awkmdlkasd', 'masuk', '2016-08-21 15:49:39'),
(6, 33333333, 'lasnd asdkjlakl asdk', 'masuk', '2016-08-21 15:50:28'),
(7, 823748103, 'Ke gedung ABC', 'masuk', '2016-08-21 15:54:06'),
(8, 767219313, 'Santai-santai', 'masuk', '2016-08-21 16:03:28'),
(9, 1234567890, 'asdfg', 'masuk', '2016-08-21 16:05:06'),
(10, 123456789, 'akakakaka', 'masuk', '2016-08-24 02:26:57'),
(11, 111111, 'gedung XXX', 'masuk', '2016-08-24 02:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE IF NOT EXISTS `tamu` (
  `id_tamu` bigint(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `notelp` bigint(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tamu`
--

INSERT INTO `tamu` (`id_tamu`, `nama`, `gender`, `alamat`, `notelp`) VALUES
(111111, 'Dirko', 'xx', 'xx', 1234),
(444444, 'Orang Baru', '', '', 0),
(2222222, 'GGGGGGG', 'xx', 'xx', 1234),
(33333333, 'AAAAAAAA', 'xx', 'xx', 1234),
(123456789, 'Mawar', 'perempuan', 'jln. xxxxx', 85208520852),
(767219313, 'Ria', 'xx', 'xx', 1234),
(823748103, 'Ruindunan', 'xx', 'xx', 1234),
(987987987, 'HHHHHHHH', 'xx', 'xx', 1234),
(1234567890, 'qwerty', 'xx', 'xx', 1234);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktifitas`
--
ALTER TABLE `aktifitas`
  ADD PRIMARY KEY (`kodeAktivitas`),
  ADD KEY `id_tamu` (`id_tamu`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id_tamu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktifitas`
--
ALTER TABLE `aktifitas`
  MODIFY `kodeAktivitas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `aktifitas`
--
ALTER TABLE `aktifitas`
  ADD CONSTRAINT `aktifitas_ibfk_1` FOREIGN KEY (`id_tamu`) REFERENCES `tamu` (`id_tamu`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
