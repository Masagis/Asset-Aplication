-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2019 at 10:34 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_assets`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_susut`
--

CREATE TABLE `detail_susut` (
  `id_detail` int(4) NOT NULL,
  `id_asset` varchar(7) NOT NULL,
  `id_penyusutan` varchar(7) NOT NULL,
  `masa_pakai` int(4) NOT NULL,
  `qty` int(12) NOT NULL,
  `jumlah_penyusutan` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_asset`
--

CREATE TABLE `tb_asset` (
  `id_asset` varchar(7) NOT NULL,
  `nama_asset` varchar(25) NOT NULL,
  `qty` int(12) NOT NULL,
  `tgl_perolehan` date NOT NULL,
  `hrg_perolehan` int(12) NOT NULL,
  `umur_ekonomis` int(12) NOT NULL,
  `nilai_sisa` int(12) NOT NULL,
  `id_kategori` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_asset`
--

INSERT INTO `tb_asset` (`id_asset`, `nama_asset`, `qty`, `tgl_perolehan`, `hrg_perolehan`, `umur_ekonomis`, `nilai_sisa`, `id_kategori`) VALUES
('1', 'motor', 2, '2019-08-26', 300000, 3, 123, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` varchar(5) NOT NULL,
  `Nm_katagori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `Nm_katagori`) VALUES
('1', 'coba'),
('2', 'coba 2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyusutan`
--

CREATE TABLE `tb_penyusutan` (
  `id_penyusutan` varchar(7) NOT NULL,
  `tgl_penyusutan` date NOT NULL,
  `total_penyusutan` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `level`) VALUES
(1, 'admin@gmail.com', 'admin', 1),
(2, 'pimpinan@gmail.com', 'pimpinan', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_susut`
--
ALTER TABLE `detail_susut`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_asset` (`id_asset`),
  ADD KEY `id_penyusutan` (`id_penyusutan`);

--
-- Indexes for table `tb_asset`
--
ALTER TABLE `tb_asset`
  ADD PRIMARY KEY (`id_asset`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_penyusutan`
--
ALTER TABLE `tb_penyusutan`
  ADD PRIMARY KEY (`id_penyusutan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_susut`
--
ALTER TABLE `detail_susut`
  MODIFY `id_detail` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_susut`
--
ALTER TABLE `detail_susut`
  ADD CONSTRAINT `detail_susut_ibfk_1` FOREIGN KEY (`id_asset`) REFERENCES `tb_asset` (`id_asset`),
  ADD CONSTRAINT `detail_susut_ibfk_2` FOREIGN KEY (`id_penyusutan`) REFERENCES `tb_penyusutan` (`id_penyusutan`);

--
-- Constraints for table `tb_asset`
--
ALTER TABLE `tb_asset`
  ADD CONSTRAINT `tb_asset_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
