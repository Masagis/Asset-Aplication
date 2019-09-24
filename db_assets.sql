-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2019 at 12:42 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

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
-- Table structure for table `tb_asset`
--

CREATE TABLE `tb_asset` (
  `id_asset` varchar(18) NOT NULL,
  `nopol` varchar(25) NOT NULL,
  `kete_aset` varchar(25) NOT NULL,
  `tgl_perolehan` date NOT NULL,
  `hrg_baku` int(12) NOT NULL,
  `umur_ekonomis` int(12) NOT NULL,
  `nilai_sisa` int(12) NOT NULL,
  `nilai_susut` int(128) NOT NULL,
  `kategori` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_asset`
--

INSERT INTO `tb_asset` (`id_asset`, `nopol`, `kete_aset`, `tgl_perolehan`, `hrg_baku`, `umur_ekonomis`, `nilai_sisa`, `nilai_susut`, `kategori`) VALUES
('R2-001', 'BE 7789 MB', 'Yamaha Lexi-S', '2019-04-16', 1000, 10, 500, 0, 'R2'),
('R2-002', 'fg 8388 kj', 'Yamaha NMAX 155', '2019-08-26', 23000000, 10, 5000000, 0, 'R2'),
('R2-003', 'BE 7965 MA', 'Yamaha Aerox 155 VVA', '2019-06-04', 10000, 10, 5000, 0, 'R2'),
('R2-004', 'BE 3333 Mc', 'Honda PCX 150', '2019-07-17', 2000, 5, 300, 0, 'R2'),
('R2-005', 'BH 4333 MV', 'Honda Vario 150 eSP', '2019-09-10', 10000000, 10, 3000000, 0, 'R2'),
('R4-001', 'BE 3231 MB', 'Honda Jazz MT', '2019-07-10', 120000000, 8, 4000000, 0, 'R4'),
('R4-002', 'BE 1246 IKJ', 'Toyota Fortuner', '2019-05-08', 750000000, 7, 4500000, 0, 'R4');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` varchar(18) NOT NULL,
  `kete_kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kete_kategori`) VALUES
('R2', 'Motor'),
('R4', 'Mobil');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyusutan`
--

CREATE TABLE `tb_penyusutan` (
  `id_penyusutan` varchar(64) NOT NULL,
  `nama_penyusutan` varchar(128) NOT NULL,
  `qty` int(12) NOT NULL,
  `tgl_perolehan` date NOT NULL,
  `hrg_perolehan` int(12) NOT NULL,
  `umur_ekonomis` int(12) NOT NULL,
  `nilai_sisa` int(12) NOT NULL,
  `nilai_susut` int(25) NOT NULL,
  `id_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `level` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `level`) VALUES
(1, 'admin@gmail.com', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_asset`
--
ALTER TABLE `tb_asset`
  ADD PRIMARY KEY (`id_asset`),
  ADD KEY `kategori` (`kategori`);

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
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_asset`
--
ALTER TABLE `tb_asset`
  ADD CONSTRAINT `tb_asset_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
