-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Vært: 127.0.0.1
-- Genereringstid: 30. 03 2017 kl. 12:35:37
-- Serverversion: 10.1.16-MariaDB
-- PHP-version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookshop`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `total` varchar(656) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `cart`
--

INSERT INTO `cart` (`id`, `updated_at`, `created_at`, `user_id`, `product_id`, `amount`, `total`) VALUES
(2, '2016-12-05 08:16:10', '2016-12-05 08:16:10', 2, 1, 2, '468'),
(3, '2016-12-05 10:01:45', '2016-12-05 10:01:45', 2, 5, 1, '300'),
(4, '2016-12-20 09:06:46', '2016-12-20 09:06:46', 2, 4, 1, '300');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, '2016-12-20 08:45:21', '2016-12-01 11:52:36', 'Books'),
(2, '2016-12-20 08:45:28', '2016-12-01 11:53:20', 'Bags'),
(3, '2016-12-20 08:45:40', '2016-12-01 11:54:22', 'Games');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `coverImg` varchar(656) NOT NULL,
  `price` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `products`
--

INSERT INTO `products` (`id`, `created_at`, `updated_at`, `category_id`, `subcategory_id`, `title`, `coverImg`, `price`, `description`) VALUES
(1, '2016-12-20 09:45:08', '2016-12-01 11:52:36', 1, 1, 'The Davinci Code', '68dee6033a82fd1081d09fcec1b405a7', '234', ''),
(2, '2016-12-20 09:45:13', '2016-12-01 11:53:20', 1, 1, 'The Lost Symbol', 'b8b44c21a0c085b638f6e5f3bfe3c674', '345', ''),
(3, '2016-12-20 09:45:19', '2016-12-01 11:54:22', 1, 1, 'The Deception Point', '646c479c2dcb27709119ddad79b2043f', '345', ''),
(4, '2016-12-20 09:44:47', '2016-12-02 08:31:38', 2, 1, 'LEGO skoletaske lille beach house', '849f341682bd82aae0a001ff905f50aa', '300', ''),
(5, '2016-12-20 09:45:24', '2016-12-01 12:05:20', 2, 1, 'LEGO skoletaske lille rød ninjago ka', 'e6a7e26a8de2430efddf549206910605', '300', ''),
(7, '2016-12-21 07:50:20', '2016-12-01 11:51:00', 1, 2, 'Angels&Demons', '5162a3b88b58eb77d84f71598143e9e8', '234', ''),
(8, '2016-12-21 07:50:26', '2016-12-09 06:47:11', 3, 2, 'The Alchemist', '6d9b06e5a4f3892f5c917eeb60d24ad3', '400', ''),
(10, '2016-12-21 11:57:13', '2016-12-21 11:57:13', 2, 4, 'CROSSBODY, SORT', '4841f0be8be77844062cce21b2babed9', '589', 'Crossbody taske fra Aura');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `subcategories`
--

INSERT INTO `subcategories` (`id`, `created_at`, `updated_at`, `name`, `category_id`) VALUES
(1, '2016-12-20 08:47:35', '2016-12-01 11:52:36', 'Children', 1),
(2, '2016-12-20 08:48:02', '2016-12-01 11:53:20', 'Biography', 1),
(3, '2016-12-20 08:49:28', '2016-12-01 11:54:22', 'Schoolbag', 2),
(4, '2016-12-20 08:50:43', '2016-12-02 08:31:38', 'Women', 2),
(5, '2016-12-20 08:50:32', '2016-12-01 12:05:20', 'Men', 2),
(7, '2016-12-20 08:51:44', '2016-12-01 11:51:00', 'Art', 1),
(8, '2016-12-20 08:52:01', '2016-12-09 06:47:11', 'Novel', 1);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `admin`, `remember_token`, `updated_at`, `created_at`) VALUES
(2, 'apple1@gmail.com', 'apple1', '$2y$10$skuCs7HLzjEYnHWO1XDACenyMuBT4bU6Ey9lb8FwtAMjYNy.VXrGe', 1, 'ZBfhYO50u3jdWG02iigTRSqEEHcV5gRRB0LieeWovJXN7Y7vQOM9GLpmllBP', '2016-12-09 06:30:03', '2016-10-10 08:17:51'),
(3, 'orange@hfgdh.fdf', 'orange1', '$2y$10$x8C0BAeKI9OkzwU0MutnoeEXq18qXbyqfc5pMiUhtdI7a/e.EMId2', 0, '', '2016-10-12 04:16:25', '2016-10-10 08:22:57'),
(4, 'eby@gmail.com', 'ebyjohn', '$2y$10$G10Og9QFZszw5mqR6F7Wmepudk3EzZrxsyysIg7Rw4kgv.1p0OX8i', 0, '', '2016-12-09 06:30:34', '2016-12-09 06:30:34');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Tilføj AUTO_INCREMENT i tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Tilføj AUTO_INCREMENT i tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Tilføj AUTO_INCREMENT i tabel `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Tilføj AUTO_INCREMENT i tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
