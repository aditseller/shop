-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10 Mei 2017 pada 20.22
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `product_condition` enum('new','second') NOT NULL,
  `weight` int(11) NOT NULL,
  `weight_unit` enum('gram','kilogram') NOT NULL,
  `stock` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `sku` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` enum('male','female') NOT NULL,
  `birthdate` date NOT NULL,
  `province` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `address` text,
  `postalcode` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `authKey` varchar(500) NOT NULL,
  `accessToken` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `fullname`, `phone`, `gender`, `birthdate`, `province`, `city`, `district`, `address`, `postalcode`, `created_at`, `authKey`, `accessToken`) VALUES
(1, 'aditseller@gmail.com', '6f6f33346f326f6f33346f32', 'Tezar Aditya', '', 'male', '0000-00-00', '', '', '', '', 0, '2017-05-10 03:48:47', 'e7410ca731339e97cfad3ee3fd61ea2ed0bb5886', 'TlNXWVhxVEIUITMyLiMXMwoqAio5QSFvIgEACxoCPjIoADhgPRx5OA=='),
(3, 'tezaraditya@gmail.com', '6f6f33346f326f6f33346f32', 'Adit', NULL, 'male', '0000-00-00', NULL, NULL, NULL, NULL, NULL, '2017-05-10 19:29:37', '52ca6f764e239e4d9e9e67c89fcf0cae6a4e8ac5', 'SERSZHlmWGcZCxEnTVUbMA0wBysPUwsCex0gAkEjKD8OEDYBT1A0Sg=='),
(4, 'aroraharjo@gmail.com', '6f6f33346f326f6f33346f32', 'aro raharjo', NULL, 'male', '0000-00-00', NULL, NULL, NULL, NULL, NULL, '2017-05-10 19:33:05', '8f815ff2301ee70ba67edfdf08ad92e5687545e0', 'UFR1SVNaUnEBGzYKZ2kRJhUgIAYlbwEUYw0HL2sfIikWABEsZWw.XA=='),
(5, 'indrisilahoy@yahoo.com', '6f6f33346f326f6f33346f32', 'indri silahoy', NULL, 'female', '0000-00-00', NULL, NULL, NULL, NULL, NULL, '2017-05-10 19:41:30', 'd145b223fb867784a37e12c15b902647cb77d956', 'cUQzeXhsWVcgC3A6TF8aADQwZjYOWQoyQh1BH0ApKQ83EFccTlo1eg=='),
(6, 'saktidinata@yahoo.com', '6f6f33346f326f6f33346f32', 'sakti dinata', NULL, 'male', '0000-00-00', NULL, NULL, NULL, NULL, NULL, '2017-05-10 19:42:35', '3c77d8249b694ee16d5e961153addbecd0c6eace', 'Lk1rc0NsSV9/Aigwd18KCGs5Pjw1WRo6HRQZFXspOQdoGQ8WdVolcg==');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `product_name` (`product_name`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `fullname` (`fullname`),
  ADD KEY `province` (`province`),
  ADD KEY `city` (`city`),
  ADD KEY `district` (`district`),
  ADD KEY `postalcode` (`postalcode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
