-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2021 at 10:29 PM
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
  `foto` varchar(50) DEFAULT NULL,
  `id_level` int(1) NOT NULL,
  `id_terminal` int(3) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id_user_admin`, `nama`, `jenis_kelamin`, `alamat`, `no_hp`, `foto`, `id_level`, `id_terminal`, `email`, `password`) VALUES
(30, 'Muhammad Khoirul Rosikin', 'Laki-laki', 'Jl. Dharmawangsa', '085808241204', 'irul.jpg', 2, 1, 'mkhoirulr97@gmail.com', 'Khoirulrosikin97'),
(41, 'Admin', 'Laki-laki', 'Jl. Suwandak', '085808241204', '', 1, 1, 'admin@gmail.com', 'Admin123'),
(42, 'Alvin Pradana Antony', 'Laki-laki', 'Jl. Sudirman', '0987654321', '', 2, 3, 'alvin@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id_bus` int(3) NOT NULL,
  `nama_bus` varchar(15) NOT NULL,
  `harga` int(7) NOT NULL,
  `status_bus` varchar(15) NOT NULL,
  `jumlah_kursi` int(3) NOT NULL,
  `foto_bus` varchar(50) NOT NULL,
  `tanggal_pemberangkatan` date NOT NULL,
  `id_jenis` int(3) NOT NULL,
  `id_rute` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id_bus`, `nama_bus`, `harga`, `status_bus`, `jumlah_kursi`, `foto_bus`, `tanggal_pemberangkatan`, `id_jenis`, `id_rute`) VALUES
(4, 'Pahala Kencana', 50000, 'Operasional', 50, '', '2021-12-13', 1, 2),
(5, 'AKAS', 100000, 'Pemeliharaan', 60, '', '2021-12-14', 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bus`
--

CREATE TABLE `jenis_bus` (
  `id_jenis` int(3) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `fasilitas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_bus`
--

INSERT INTO `jenis_bus` (`id_jenis`, `jenis`, `fasilitas`) VALUES
(1, 'Patas', 'Wifi, TV, AC'),
(3, 'Eksekutif', 'TV, AC');

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
(1, 'Admin'),
(2, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(3) NOT NULL,
  `id_pemesanan` int(3) NOT NULL,
  `nama_pengirim` varchar(30) NOT NULL,
  `nama_bank` varchar(20) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `bayar` int(9) NOT NULL,
  `waktu_pembayaran` datetime NOT NULL,
  `bukti_pembayaran` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pemesanan`, `nama_pengirim`, `nama_bank`, `no_rekening`, `bayar`, `waktu_pembayaran`, `bukti_pembayaran`) VALUES
(2, 2, 'Khoirul', 'BRI', 'sfsadf', 600000, '2021-12-15 03:48:24', 'sfd');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(3) NOT NULL,
  `nik_user` char(17) NOT NULL,
  `id_bus` int(3) NOT NULL,
  `waktu_pemesanan` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jumlah_kursi_pesan` int(3) NOT NULL,
  `total_bayar` int(6) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `nik_user`, `id_bus`, `waktu_pemesanan`, `jumlah_kursi_pesan`, `total_bayar`, `status`) VALUES
(2, '3509030907020005', 5, '2021-12-15 09:47:28', 6, 600000, 'Belum Bayar');

-- --------------------------------------------------------

--
-- Table structure for table `penumpang`
--

CREATE TABLE `penumpang` (
  `nik_penumpang` char(17) NOT NULL,
  `nama_penumpang` varchar(30) NOT NULL,
  `jenis_kelamin_penumpang` varchar(12) NOT NULL,
  `no_hp_penumpang` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penumpang`
--

INSERT INTO `penumpang` (`nik_penumpang`, `nama_penumpang`, `jenis_kelamin_penumpang`, `no_hp_penumpang`) VALUES
('3509030907020002', 'Muhammad Khoirul Rosikin', 'Laki - Laki', '085808241204'),
('3509030907020006', 'Budi Santoso', 'Laki - Laki', '085808241204'),
('3509030907020007', 'Budi Santoso', 'Perempuan', '085808241204'),
('3509030907020009', 'Yuliana Dewi', 'Perempuan', '085808241209');

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `id_rute` int(3) NOT NULL,
  `pemberangkatan` int(3) NOT NULL,
  `waktu_berangkat` time NOT NULL,
  `tujuan` int(3) NOT NULL,
  `waktu_tiba` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`id_rute`, `pemberangkatan`, `waktu_berangkat`, `tujuan`, `waktu_tiba`) VALUES
(1, 1, '22:00:00', 2, '00:00:00'),
(2, 1, '21:00:00', 2, '00:00:00'),
(3, 2, '00:00:00', 2, '21:00:00'),
(5, 1, '21:00:00', 3, '00:00:00'),
(7, 2, '00:00:00', 3, '07:00:00'),
(8, 3, '21:00:00', 2, '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `terminal`
--

CREATE TABLE `terminal` (
  `id_terminal` int(3) NOT NULL,
  `nama_terminal` varchar(15) NOT NULL,
  `detail_alamat_terminal` varchar(50) NOT NULL,
  `provinsi_terminal` varchar(20) NOT NULL,
  `kabupaten_terminal` varchar(20) NOT NULL,
  `kecamatan_terminal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `terminal`
--

INSERT INTO `terminal` (`id_terminal`, `nama_terminal`, `detail_alamat_terminal`, `provinsi_terminal`, `kabupaten_terminal`, `kecamatan_terminal`) VALUES
(1, 'Tawang Alun', 'Jl. Dharmawangsa', 'Jawa Timur', 'Jember', 'Kecamatan'),
(2, 'Wonorejo', 'Jl. Wonorejo', 'Jawa Timur', 'Lumajang', 'Wonorejo'),
(3, 'Bungurasih', 'Jl. Semolowaru', 'Jawa Timur', 'Surabaya', 'Sukolilo'),
(9, 'Minakjinggo', 'Jl. Suwandak', '35', '3513', '3513150'),
(10, 'Damarwulan', 'Jl. Suwandak', '35', '3509', '3509160');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(3) NOT NULL,
  `id_pemesanan` int(3) NOT NULL,
  `nik_penumpang` char(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `id_pemesanan`, `nik_penumpang`) VALUES
(3, 2, '3509030907020002');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nik_user` char(17) NOT NULL,
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`nik_user`, `nama_user`, `tempat_lahir_user`, `tanggal_lahir_user`, `jenis_kelamin_user`, `alamat_user`, `no_hp_user`, `foto_user`, `email_user`, `password_user`) VALUES
('3509030907020005', 'Muhammad Khoirul Rosikin', 'Jember', '2002-07-09', 'Laki-laki', 'Jember', '085808241204', 'irul.jpg', 'mkhoirulr97@gmail.com', 'Khoirulrosikin97'),
('3509030907020015', 'Muhammad Khoirul ', 'Jember', '2021-12-06', 'Laki-laki', 'Jl. Suwandak', '6285230894000', '', 'mkhoirulr97@gmail.com', 'Khoirulrosikin97');

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
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `nik_user` (`nik_user`),
  ADD KEY `id_bus` (`id_bus`);

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
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `id_pemesanan` (`id_pemesanan`),
  ADD KEY `nik_penumpang` (`nik_penumpang`);

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
  MODIFY `id_user_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id_bus` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jenis_bus`
--
ALTER TABLE `jenis_bus`
  MODIFY `id_jenis` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id_rute` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `terminal`
--
ALTER TABLE `terminal`
  MODIFY `id_terminal` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`nik_user`) REFERENCES `user` (`nik_user`),
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`id_bus`) REFERENCES `bus` (`id_bus`);

--
-- Constraints for table `rute`
--
ALTER TABLE `rute`
  ADD CONSTRAINT `rute_ibfk_1` FOREIGN KEY (`pemberangkatan`) REFERENCES `terminal` (`id_terminal`),
  ADD CONSTRAINT `rute_ibfk_2` FOREIGN KEY (`tujuan`) REFERENCES `terminal` (`id_terminal`);

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_3` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`),
  ADD CONSTRAINT `tiket_ibfk_4` FOREIGN KEY (`nik_penumpang`) REFERENCES `penumpang` (`nik_penumpang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
