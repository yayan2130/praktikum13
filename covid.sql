-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Bulan Mei 2020 pada 16.50
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_covid`
--

CREATE TABLE `data_covid` (
  `id_covid` int(11) NOT NULL,
  `id_negara` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `newcase` int(11) NOT NULL,
  `totaldeath` int(11) NOT NULL,
  `newdeath` int(11) NOT NULL,
  `recovered` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_covid`
--

INSERT INTO `data_covid` (`id_covid`, `id_negara`, `jumlah`, `newcase`, `totaldeath`, `newdeath`, `recovered`, `active`) VALUES
(1, 1, 1029878, 19522, 58640, 1843, 140138, 831100),
(2, 2, 232128, 2706, 23822, 301, 123903, 84403),
(3, 3, 201505, 2091, 27359, 382, 68941, 105205),
(4, 4, 165911, 2638, 23660, 367, 46886, 95365),
(5, 5, 161145, 3996, 21678, 586, 0, 139123),
(6, 6, 159431, 673, 6215, 89, 117400, 35816),
(7, 7, 114653, 2392, 2992, 92, 38809, 72852),
(8, 8, 93558, 6411, 867, 73, 8456, 84235),
(9, 9, 92584, 1112, 5877, 71, 72439, 14268),
(10, 10, 82836, 6, 4633, 0, 77555, 648);

-- --------------------------------------------------------

--
-- Struktur dari tabel `negara`
--

CREATE TABLE `negara` (
  `id_negara` int(11) NOT NULL,
  `negara` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `negara`
--

INSERT INTO `negara` (`id_negara`, `negara`) VALUES
(1, 'USA'),
(2, 'Spain'),
(3, 'Italy'),
(4, 'France'),
(5, 'UK'),
(6, 'Germany'),
(7, 'Turkey'),
(8, 'Russia'),
(9, 'Iran'),
(10, 'China');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_covid`
--
ALTER TABLE `data_covid`
  ADD PRIMARY KEY (`id_covid`);

--
-- Indeks untuk tabel `negara`
--
ALTER TABLE `negara`
  ADD PRIMARY KEY (`id_negara`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_covid`
--
ALTER TABLE `data_covid`
  MODIFY `id_covid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `negara`
--
ALTER TABLE `negara`
  MODIFY `id_negara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
