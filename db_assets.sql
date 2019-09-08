-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Sep 2019 pada 15.33
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

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
-- Struktur dari tabel `tb_asset`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` varchar(18) NOT NULL,
  `nopol` varchar(62) NOT NULL,
  `kete_kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penyusutan`
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

--
-- Dumping data untuk tabel `tb_penyusutan`
--

INSERT INTO `tb_penyusutan` (`id_penyusutan`, `nama_penyusutan`, `qty`, `tgl_perolehan`, `hrg_perolehan`, `umur_ekonomis`, `nilai_sisa`, `nilai_susut`, `id_kategori`) VALUES
('', '', 0, '0000-00-00', 0, 0, 0, 16667, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `level` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `level`) VALUES
(1, 'admin@gmail.com', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_asset`
--
ALTER TABLE `tb_asset`
  ADD PRIMARY KEY (`id_asset`),
  ADD KEY `kategori` (`kategori`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_penyusutan`
--
ALTER TABLE `tb_penyusutan`
  ADD PRIMARY KEY (`id_penyusutan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_asset`
--
ALTER TABLE `tb_asset`
  ADD CONSTRAINT `tb_asset_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
