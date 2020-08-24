-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Agu 2020 pada 05.19
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_article`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `author` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `url`, `cover`, `date`, `author`) VALUES
(24, 'Artikel Kesatu', '<p>Artikel Kesatu</p>\r\n\r\n<p>Artikel Kesatu</p>', 'artikel-kesatuartikel-kesatu', 'Banner3.png', '2020-03-24 03:14:09', '3'),
(25, 'Artikel Kedua', '<p>Artikel Kedua</p>', 'artikel-kedua', 'jir2.png', '2020-03-24 02:36:57', '3'),
(26, 'Artikel Ketiga', '<p>Artikel Ketiga</p>', 'artikel-ketiga', 'macbook-pro-retina-wallpaper-2880x1800-firewatch-4k-17-2880x1800.jpg', '2020-03-24 02:37:04', '22'),
(27, 'Artikel Keempat', '<p>Artikel Keempat</p>', 'artikel-keempat', NULL, '2020-03-24 02:37:13', '22'),
(28, 'Artikel Kelima', '<p>Artikel Kelima</p>', 'artikel-kelima', NULL, '2020-03-24 02:37:23', '22'),
(29, 'Artikel Keenam', '<p>Artikel Keenam</p>', 'artikel-keenam', NULL, '2020-03-24 02:37:33', '22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_create` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_create`) VALUES
(3, 'Aldi Tegar Prakoso', 'alditegarprakoso@gmail.com', 'Banner.png', '$2y$10$1pUuNWiTdqs2xQqSGrygNupvmzk4FXb4PLox9oZiGHwOdWwMap7ja', 1, 1, 1582454223),
(22, 'Aldi Tegar P', 'alditegarp@gmail.com', 'aldi.jpg', '$2y$10$/ykFyDG7lUzc3Si7QCesPemNKAps8HziI3NqZ15c5d0qX9b061zu2', 2, 1, 1584976059);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(18, 'alditegarp@gmail.com', '/ZsjkSEDeAeacvpc2mQpBX1TWpUUXJ09XDFMq9ciuXU=', 1584976102),
(19, 'alditegarprakoso@gmail.com', '/37ULgiRcHArMf+CVeZch180aGm407VJwIrezAZ6UoE=', 1589811271),
(20, 'alditegarprakoso@gmail.com', 'yJu8dVcF7/kRE5iciXAfd5GmL+w42G4KStE1ERa4SPc=', 1589811306);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
