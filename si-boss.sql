-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Des 2021 pada 11.40
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
-- Database: `si-boss`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `password`) VALUES
(12, 'ibnuas', 'ibnu', '$2y$10$2QM6NQ31WDg4XFuLJbkBeuXm4zV/QpCvmwnNkWz4YAQsquPBOLVbC'),
(13, 'rafli', 'rafli', '$2y$10$pnAxziAN7GZf9KSqTq/Z/eETKPPyRAqnLhy77A3lB22b/xKu5LQhi'),
(14, 'rafli13', 'rafli13', '$2y$10$w3iOap7ti6vLO0.x7aZ/a.5uZwoXrlGxUMY6DWNKHlYg0xeqeeKMy'),
(15, 'raflialfajar', 'raflialfajar', '$2y$10$uH9dvsM66i26Mp6fUKbAf.z5aDXd44kTupGUsTnL/S0meFqjKxnPm'),
(16, 'rafli1', 'rafli1', '$2y$10$CQcm0FRbvjHLejuXtUK7AO3RTVmBPZE79aMoGaAZh.OPTLsx0VovK'),
(17, 'siboss', 'siboss', '$2y$10$vrmXt2s0qHHgex28ViSSReNNLMcDGMbHrzk1dX1jyPcazDWHp6Dje');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
