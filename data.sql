-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jul 2024 pada 05.07
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` int(13) NOT NULL,
  `semester` int(11) NOT NULL,
  `ipk` float NOT NULL,
  `beasiswa` varchar(100) NOT NULL,
  `berkas` varchar(255) NOT NULL,
  `verifikasi` varchar(20) NOT NULL,
  `jenis_beasiswa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`id`, `nama`, `email`, `no_hp`, `semester`, `ipk`, `beasiswa`, `berkas`, `verifikasi`, `jenis_beasiswa`) VALUES
(6, 'indra', 'indraajiyanto052@gmail.com', 2147483647, 2, 3.2, 'kip', 'santai.jpg', 'true', 'akademik'),
(7, 'aji', 'aji@gmail.com', 7642363, 1, 4, '', '', '', ''),
(8, 'yanto', 'yanto@gmail.com', 19282772, 5, 3, '', '', '', ''),
(9, 'asta', 'asta@gmail.com', 16137681, 8, 2.6, '', '', '', ''),
(10, 'juki', 'juki@gmail.com', 61236231, 4, 2, '', '', '', ''),
(11, 'jarwo', 'jarwo@gmail.com', 2147483647, 2, 3.9, 'iom', 'images.jpg', 'true', 'non_akademik');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
