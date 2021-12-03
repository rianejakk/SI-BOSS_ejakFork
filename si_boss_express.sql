-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 04:15 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_boss_express`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id_user_admin` int(3) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(12) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `id_level` int(1) NOT NULL,
  `id_terminal` int(3) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id_user_admin`, `nama`, `jenis_kelamin`, `alamat`, `no_hp`, `foto`, `id_level`, `id_terminal`, `email`, `password`) VALUES
(29, 'MUHAMMAD KHOIRUL ROSIKIN', 'option1', 'Jl. Dharmawangsa', '085808241204', '', 2, 1, '', ''),
(30, 'MUHAMMAD KHOIRUL ROSIKIN', 'option1', 'Jl. Dharmawangsa', '085808241204', '', 2, 1, 'mkhoirulr97@gmail.com', '00000000'),
(31, 'ALVIN PRADANA ANTONY', 'LAKI - LAKI', 'Jl. Suwandak', '085808241204', '', 2, 1, 'alvin@gmail.com', '00000000');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id_bus` int(3) NOT NULL,
  `nama_bus` varchar(15) NOT NULL,
  `detail_bus` varchar(30) NOT NULL,
  `status_bus` varchar(10) NOT NULL,
  `jumlah_kursi` int(3) NOT NULL,
  `foto_bus` varchar(50) NOT NULL,
  `id_jenis` int(3) NOT NULL,
  `id_rute` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_detail_pemesanan` int(3) NOT NULL,
  `id_pemesanan` int(3) NOT NULL,
  `id_bus` int(3) NOT NULL,
  `jumlah_kursi_pesan` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bus`
--

CREATE TABLE `jenis_bus` (
  `id_jenis` int(3) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `fasilitas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(1) NOT NULL,
  `level` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `level`) VALUES
(1, 'admin'),
(2, 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(3) NOT NULL,
  `nik_user` int(17) NOT NULL,
  `nik_penumpang` int(17) NOT NULL,
  `waktu_pemesanan` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_bayar` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penumpang`
--

CREATE TABLE `penumpang` (
  `nik_penumpang` int(17) NOT NULL,
  `nama_penumpang` varchar(30) NOT NULL,
  `jenis_kelamin_penumpang` varchar(12) NOT NULL,
  `no_hp_penumpang` varchar(15) NOT NULL,
  `email_penumpang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `id_rute` int(3) NOT NULL,
  `pemberangkatan` int(3) NOT NULL,
  `waktu_berangkat` time NOT NULL,
  `tujuan` int(3) NOT NULL,
  `waktu_tiba` time NOT NULL,
  `harga` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `terminal`
--

CREATE TABLE `terminal` (
  `id_terminal` int(3) NOT NULL,
  `nama_terminal` varchar(15) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `kabupaten_terminal` varchar(20) NOT NULL,
  `kecamatan_terminal` varchar(20) NOT NULL,
  `detail_alamat_terminal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `terminal`
--

INSERT INTO `terminal` (`id_terminal`, `nama_terminal`, `provinsi`, `kabupaten_terminal`, `kecamatan_terminal`, `detail_alamat_terminal`) VALUES
(1, 'Tawang Alun', 'Jawa Timur', 'Jember', 'Kecamatan', 'Jl. Dharmawangsa');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nik_user` int(17) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `tempat_lahir_user` varchar(20) NOT NULL,
  `tanggal_lahir_user` date NOT NULL,
  `jenis_kelamin_user` varchar(12) NOT NULL,
  `alamat_user` varchar(50) NOT NULL,
  `no_hp_user` varchar(15) NOT NULL,
  `foto_user` varchar(50) NOT NULL,
  `email_user` varchar(30) NOT NULL,
  `password_user` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id_user_admin`),
  ADD KEY `id_terminal` (`id_terminal`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id_bus`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_rute` (`id_rute`);

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id_detail_pemesanan`),
  ADD KEY `id_pemesanan` (`id_pemesanan`),
  ADD KEY `id_bus` (`id_bus`);

--
-- Indexes for table `jenis_bus`
--
ALTER TABLE `jenis_bus`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_penumpang` (`nik_penumpang`),
  ADD KEY `id_penumpang_2` (`nik_penumpang`),
  ADD KEY `nik_penumpang` (`nik_penumpang`),
  ADD KEY `id_user` (`nik_user`),
  ADD KEY `nik_user` (`nik_user`);

--
-- Indexes for table `penumpang`
--
ALTER TABLE `penumpang`
  ADD PRIMARY KEY (`nik_penumpang`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id_rute`),
  ADD KEY `pemberangkatan` (`pemberangkatan`),
  ADD KEY `tujuan` (`tujuan`);

--
-- Indexes for table `terminal`
--
ALTER TABLE `terminal`
  ADD PRIMARY KEY (`id_terminal`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nik_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id_user_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id_bus` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  MODIFY `id_detail_pemesanan` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_bus`
--
ALTER TABLE `jenis_bus`
  MODIFY `id_jenis` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penumpang`
--
ALTER TABLE `penumpang`
  MODIFY `nik_penumpang` int(17) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id_rute` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terminal`
--
ALTER TABLE `terminal`
  MODIFY `id_terminal` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `nik_user` int(17) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `administrator_ibfk_1` FOREIGN KEY (`id_terminal`) REFERENCES `terminal` (`id_terminal`),
  ADD CONSTRAINT `administrator_ibfk_2` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);

--
-- Constraints for table `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_bus` (`id_jenis`),
  ADD CONSTRAINT `bus_ibfk_2` FOREIGN KEY (`id_rute`) REFERENCES `rute` (`id_rute`);

--
-- Constraints for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `detail_pemesanan_ibfk_1` FOREIGN KEY (`id_bus`) REFERENCES `bus` (`id_bus`),
  ADD CONSTRAINT `detail_pemesanan_ibfk_3` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`nik_user`) REFERENCES `user` (`nik_user`),
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`nik_penumpang`) REFERENCES `penumpang` (`nik_penumpang`);

--
-- Constraints for table `rute`
--
ALTER TABLE `rute`
  ADD CONSTRAINT `rute_ibfk_1` FOREIGN KEY (`pemberangkatan`) REFERENCES `terminal` (`id_terminal`),
  ADD CONSTRAINT `rute_ibfk_2` FOREIGN KEY (`tujuan`) REFERENCES `terminal` (`id_terminal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
