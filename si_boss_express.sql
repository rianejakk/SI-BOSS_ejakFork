-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Des 2021 pada 03.14
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

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
-- Struktur dari tabel `administrator`
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
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `administrator`
--

INSERT INTO `administrator` (`id_user_admin`, `nama`, `jenis_kelamin`, `alamat`, `no_hp`, `foto`, `id_level`, `id_terminal`, `email`, `password`) VALUES
(30, 'Muhammad Khoirul Rosikin', 'LAKI - LAKI', 'Jl. Dharmawangsa', '085808241204', '', 2, 1, 'mkhoirulr97@gmail.com', 'Khoirulrosikin97'),
(41, 'Admin', 'LAKI - LAKI', 'Jl. Suwandak', '085808241204', '', 1, 1, 'admin@gmail.com', 'Admin123'),
(42, 'Alvin Pradana Antony', 'LAKI - LAKI', 'Jl. Sudirman', '0987654321', '', 1, 1, 'alvin@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bus`
--

CREATE TABLE `bus` (
  `id_bus` int(3) NOT NULL,
  `nama_bus` varchar(15) NOT NULL,
  `detail_bus` varchar(30) NOT NULL,
  `status_bus` varchar(15) NOT NULL,
  `jumlah_kursi` int(3) NOT NULL,
  `foto_bus` varchar(50) NOT NULL,
  `id_jenis` int(3) NOT NULL,
  `id_rute` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bus`
--

INSERT INTO `bus` (`id_bus`, `nama_bus`, `detail_bus`, `status_bus`, `jumlah_kursi`, `foto_bus`, `id_jenis`, `id_rute`) VALUES
(2, 'Pahala Kencana', 'sfsdfsfsdf', 'Operasiona', 60, '', 1, 1),
(3, 'Pahala Kencana', 'sfsdfsfsdf', 'Operasional', 60, '', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_bus`
--

CREATE TABLE `jenis_bus` (
  `id_jenis` int(3) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `fasilitas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_bus`
--

INSERT INTO `jenis_bus` (`id_jenis`, `jenis`, `fasilitas`) VALUES
(1, 'Patas', 'Wifi, TV, AC'),
(3, 'eksekutif', '-'),
(5, 's', 's');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(1) NOT NULL,
  `level` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `level`) VALUES
(1, 'admin'),
(2, 'staff');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(3) NOT NULL,
  `nik_user` char(17) NOT NULL,
  `waktu_pemesanan` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_bayar` int(6) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penumpang`
--

CREATE TABLE `penumpang` (
  `nik_penumpang` char(17) NOT NULL,
  `nama_penumpang` varchar(30) NOT NULL,
  `jenis_kelamin_penumpang` varchar(12) NOT NULL,
  `no_hp_penumpang` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penumpang`
--

INSERT INTO `penumpang` (`nik_penumpang`, `nama_penumpang`, `jenis_kelamin_penumpang`, `no_hp_penumpang`) VALUES
('', '3509030907020005', 'Laki - Laki', '085808241204'),
('3509030907020006', 'Budi Santoso', 'Laki - Laki', '085808241204'),
('3509030907020007', 'Budi Santoso', 'Perempuan', '085808241204');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rute`
--

CREATE TABLE `rute` (
  `id_rute` int(3) NOT NULL,
  `pemberangkatan` int(3) NOT NULL,
  `waktu_berangkat` time NOT NULL,
  `tujuan` int(3) NOT NULL,
  `waktu_tiba` time NOT NULL,
  `harga` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rute`
--

INSERT INTO `rute` (`id_rute`, `pemberangkatan`, `waktu_berangkat`, `tujuan`, `waktu_tiba`, `harga`) VALUES
(1, 1, '22:00:00', 2, '00:00:00', 90000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `terminal`
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
-- Dumping data untuk tabel `terminal`
--

INSERT INTO `terminal` (`id_terminal`, `nama_terminal`, `detail_alamat_terminal`, `provinsi_terminal`, `kabupaten_terminal`, `kecamatan_terminal`) VALUES
(1, 'Tawang Alun', 'Jl. Dharmawangsa', 'Jawa Timur', 'Jember', 'Kecamatan'),
(2, 'Wonorejo', 'Jl. Wonorejo', 'Jawa Timur', 'Lumajang', 'Wonorejo'),
(3, 'Bungurasih', 'Jl. Semolowaru', 'Jawa Timur', 'Surabaya', 'Sukolilo'),
(5, 'Tawang Alun', 'Jl. Suwandak', '35', '3509', '3509170');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(3) NOT NULL,
  `id_pemesanan` int(3) NOT NULL,
  `id_bus` int(3) NOT NULL,
  `nik_penumpang` char(17) NOT NULL,
  `jumlah_kursi_pesan` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
  `password_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nik_user`, `nama_user`, `tempat_lahir_user`, `tanggal_lahir_user`, `jenis_kelamin_user`, `alamat_user`, `no_hp_user`, `foto_user`, `email_user`, `password_user`) VALUES
('', 'raflialfajar', '', '0000-00-00', '', '', '', '', 'rafli@gmail.com', '$2y$10$v3T3lZpYWP4fEBkAaiRbp.XyBqDg99aZVFp58J19cUiRDbFXjoBn6'),
('3509030907020005', 'Muhammad Khoirul Rosikin', 'Jember', '2002-07-09', 'Laki - Laki', 'Jember', '085808241204', '', 'khoirul@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id_user_admin`),
  ADD KEY `id_terminal` (`id_terminal`),
  ADD KEY `id_level` (`id_level`);

--
-- Indeks untuk tabel `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id_bus`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_rute` (`id_rute`);

--
-- Indeks untuk tabel `jenis_bus`
--
ALTER TABLE `jenis_bus`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_user` (`nik_user`),
  ADD KEY `nik_user` (`nik_user`);

--
-- Indeks untuk tabel `penumpang`
--
ALTER TABLE `penumpang`
  ADD PRIMARY KEY (`nik_penumpang`);

--
-- Indeks untuk tabel `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id_rute`),
  ADD KEY `pemberangkatan` (`pemberangkatan`),
  ADD KEY `tujuan` (`tujuan`);

--
-- Indeks untuk tabel `terminal`
--
ALTER TABLE `terminal`
  ADD PRIMARY KEY (`id_terminal`);

--
-- Indeks untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `id_pemesanan` (`id_pemesanan`),
  ADD KEY `id_bus` (`id_bus`),
  ADD KEY `nik_penumpang` (`nik_penumpang`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nik_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id_user_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `bus`
--
ALTER TABLE `bus`
  MODIFY `id_bus` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis_bus`
--
ALTER TABLE `jenis_bus`
  MODIFY `id_jenis` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rute`
--
ALTER TABLE `rute`
  MODIFY `id_rute` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `terminal`
--
ALTER TABLE `terminal`
  MODIFY `id_terminal` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(3) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `administrator_ibfk_1` FOREIGN KEY (`id_terminal`) REFERENCES `terminal` (`id_terminal`),
  ADD CONSTRAINT `administrator_ibfk_2` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);

--
-- Ketidakleluasaan untuk tabel `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_bus` (`id_jenis`),
  ADD CONSTRAINT `bus_ibfk_2` FOREIGN KEY (`id_rute`) REFERENCES `rute` (`id_rute`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`);

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`nik_user`) REFERENCES `user` (`nik_user`);

--
-- Ketidakleluasaan untuk tabel `rute`
--
ALTER TABLE `rute`
  ADD CONSTRAINT `rute_ibfk_1` FOREIGN KEY (`pemberangkatan`) REFERENCES `terminal` (`id_terminal`),
  ADD CONSTRAINT `rute_ibfk_2` FOREIGN KEY (`tujuan`) REFERENCES `terminal` (`id_terminal`);

--
-- Ketidakleluasaan untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`id_bus`) REFERENCES `bus` (`id_bus`),
  ADD CONSTRAINT `tiket_ibfk_3` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`),
  ADD CONSTRAINT `tiket_ibfk_4` FOREIGN KEY (`nik_penumpang`) REFERENCES `penumpang` (`nik_penumpang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
