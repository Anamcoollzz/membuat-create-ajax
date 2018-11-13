-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07 Nov 2018 pada 03.20
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuliah_pweb_create_read`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tahun` char(4) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `merk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id`, `nama`, `tahun`, `warna`, `merk`) VALUES
(1, 'avanza', '2012', 'Merah', 'Honda'),
(2, 'Kijang', '2013', 'Hitam', 'Honda'),
(3, '', '0000', '', ''),
(4, '', '0000', '', ''),
(5, '', '0000', '', ''),
(6, 'APV', '2013', 'Ijo', 'Honda'),
(7, 'Hairul Anam', '2019', 'Pink', 'Honda'),
(8, 'Hairul Anam', '0000', 'dsad', 'sds'),
(9, 'Hairul Anam', '0000', 'dsad', 'sds'),
(10, 'Hairul Anam', '0000', 'sfd', 'qfd'),
(11, 'skajkdsj', '0000', 'jksajk', 'jskaj'),
(12, 'd', '0000', 'd', 'd'),
(13, 'sna', '0000', 'skaj', 'sjak'),
(14, 'e', '0000', 'e', 'e'),
(15, 'ds', '0000', 'dsd', 'ds'),
(16, 'ds', '0000', 'ds', 'ds'),
(17, 'ds', '0000', 'ds', 'ds'),
(18, 'dsi', '0000', 'ds', 'ds'),
(19, 'dsi', '2012', 'ds', 'ds'),
(20, 'dsi', '1900', 'ds', 'ds'),
(21, 'dsi\'', '1900', 'ds', 'ds'),
(22, 'gg', '2013', 'fd', 'fd'),
(23, 'kkkkk', '2018', 'djsksdk', 'DJSKJKDS'),
(24, 'aaaaaaaaaa', '2018', 'Merah', 'Honda'),
(25, 'dd', '2018', 'jj', 'j'),
(26, 'jjjjjjjjjjjjj', '2018', 'jjjj', 'jjjj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
