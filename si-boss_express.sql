-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2021 at 03:53 AM
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
-- Database: `si-boss express`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(3) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(12) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email_admin` varchar(20) NOT NULL,
  `no_hp_admin` varchar(15) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `NIK` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id_bus` int(3) NOT NULL,
  `nama_bus` varchar(15) NOT NULL,
  `gambar_bus` blob NOT NULL,
  `detail` varchar(30) NOT NULL,
  `harga` int(6) NOT NULL,
  `id_fasilitas` int(3) NOT NULL,
  `id_jenis` int(3) NOT NULL,
  `id_waktu` int(3) NOT NULL,
  `id_rute` int(3) NOT NULL,
  `id_terminal` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_detail_pemesanan` int(3) NOT NULL,
  `id_pemesanan` int(3) NOT NULL,
  `id_bus` int(3) NOT NULL,
  `jumlah_penumpang` int(2) NOT NULL,
  `sub_total` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(3) NOT NULL,
  `fasilitas` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bus`
--

CREATE TABLE `jenis_bus` (
  `id_jenis` int(3) NOT NULL,
  `jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(3) NOT NULL,
  `nama_penumpang` varchar(30) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `total_bayar` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penumpang`
--

CREATE TABLE `penumpang` (
  `id_penumpang` int(3) NOT NULL,
  `nama_penumpang` varchar(30) NOT NULL,
  `no_hp_penumpang` varchar(15) NOT NULL,
  `email_penumpang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `id_rute` int(3) NOT NULL,
  `rute` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `terminal`
--

CREATE TABLE `terminal` (
  `id_terminal` int(3) NOT NULL,
  `terminal` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `waktu_pemberangkatan`
--

CREATE TABLE `waktu_pemberangkatan` (
  `id_waktu` int(3) NOT NULL,
  `waktu_berangkat` time(6) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_tiba` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id_bus`),
  ADD UNIQUE KEY `id_fasilitas` (`id_fasilitas`),
  ADD UNIQUE KEY `id_jenis` (`id_jenis`),
  ADD UNIQUE KEY `id_waktu` (`id_waktu`),
  ADD UNIQUE KEY `id_rute` (`id_rute`),
  ADD UNIQUE KEY `id_terminal` (`id_terminal`);

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id_detail_pemesanan`),
  ADD UNIQUE KEY `id_pemesanan` (`id_pemesanan`),
  ADD UNIQUE KEY `id_bus` (`id_bus`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `jenis_bus`
--
ALTER TABLE `jenis_bus`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `penumpang`
--
ALTER TABLE `penumpang`
  ADD PRIMARY KEY (`id_penumpang`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id_rute`);

--
-- Indexes for table `terminal`
--
ALTER TABLE `terminal`
  ADD PRIMARY KEY (`id_terminal`);

--
-- Indexes for table `waktu_pemberangkatan`
--
ALTER TABLE `waktu_pemberangkatan`
  ADD PRIMARY KEY (`id_waktu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
