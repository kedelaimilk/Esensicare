-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 25 Bulan Mei 2024 pada 11.09
-- Versi server: 5.7.31
-- Versi PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `donatur`
--

DROP TABLE IF EXISTS `donatur`;
CREATE TABLE IF NOT EXISTS `donatur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` text,
  `jumlah_donasi` decimal(10,2) NOT NULL,
  `metode_pembayaran` enum('Transfer Bank','Kartu Kredit','E-Wallet') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `donatur`
--

INSERT INTO `donatur` (`id`, `nama`, `email`, `telepon`, `alamat`, `jumlah_donasi`, `metode_pembayaran`, `created_at`) VALUES
(1, 'John Doe', 'john.doe@example.com', '08123456789', 'Jl. Contoh No. 123', '100000.00', 'Transfer Bank', '2024-05-20 11:16:39'),
(2, 'Jane Smith', 'jane.smith@example.com', '08567891234', 'Jl. Contoh No. 456', '50000.00', 'Kartu Kredit', '2024-05-20 11:16:39'),
(3, 'Alice Johnson', 'alice.johnson@example.com', '08123456789', 'Jl. Contoh No. 789', '75000.00', 'E-Wallet', '2024-05-20 11:16:39'),
(4, 'Bob Brown', 'bob.brown@example.com', '08567891234', 'Jl. Contoh No. 1011', '200000.00', 'Transfer Bank', '2024-05-20 11:16:39'),
(5, 'Eve Williams', 'eve.williams@example.com', '08123456789', 'Jl. Contoh No. 1213', '150000.00', 'Kartu Kredit', '2024-05-20 11:16:39'),
(6, 'bolod', 'bolod@gmail.com', '085176952779', 'wonoayu', '500000.00', 'Transfer Bank', '2024-05-20 11:19:08'),
(7, 'Mas Adi', 'adiikuncoro@gmail.com', '084562123155', 'Jasemmm', '500000.00', 'Transfer Bank', '2024-05-20 13:37:49'),
(8, 'kaji bolod', 'lodsss@gmail.com', '085176952779', 'Surabaya', '20000.00', 'Kartu Kredit', '2024-05-22 03:55:19'),
(9, 'kaji bolod', 'masipa87@gmail.com', '05548464346464', 'SBY', '200000.00', 'Kartu Kredit', '2024-05-25 10:52:38'),
(10, 'kaji bolod', 'masipa87@gmail.com', '05548464346464', 'SBY', '200000.00', 'Kartu Kredit', '2024-05-25 10:53:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

DROP TABLE IF EXISTS `kontak`;
CREATE TABLE IF NOT EXISTS `kontak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `kritik` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id`, `nama`, `email`, `telepon`, `kritik`) VALUES
(8, 'bayi', 'ggu@gmail.com', '0854535186', 'sfsfdsf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(12, 'Serah', '277', 'user', '2024-05-20 12:29:29'),
(23, 'vano', '123', 'user', '2024-05-24 10:16:54'),
(11, 'Nirvana', '277', 'admin', '2024-05-20 12:29:10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
