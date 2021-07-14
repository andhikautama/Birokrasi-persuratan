-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jul 2021 pada 06.26
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `persuratan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `disposisi`
--

CREATE TABLE `disposisi` (
  `id_disposisi` int(11) NOT NULL,
  `surat_dari` varchar(128) NOT NULL,
  `tgl_surat` date NOT NULL,
  `no_surat` varchar(128) NOT NULL,
  `diterima_tgl` date NOT NULL,
  `no_agenda` varchar(128) NOT NULL,
  `perihal` varchar(128) NOT NULL,
  `diteruskan_kepada` varchar(128) NOT NULL,
  `isi_disposisi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `disposisi`
--

INSERT INTO `disposisi` (`id_disposisi`, `surat_dari`, `tgl_surat`, `no_surat`, `diterima_tgl`, `no_agenda`, `perihal`, `diteruskan_kepada`, `isi_disposisi`) VALUES
(9, 'Komandan', '2021-07-01', '077/12/13-/UPT', '2021-07-17', '123', 'penting', 'Diskominfo', 'Diliat aja'),
(10, 'TNI AU', '2021-07-16', '077/12/13-/UPT', '2021-07-16', '0223', 'penting', 'Diskominfo', 'rgd'),
(11, 'Raihan', '2021-07-09', '123', '2021-07-22', '0223', 'Penting', 'TANI AU', 'cs');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id_disposisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
