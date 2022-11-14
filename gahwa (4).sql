-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Nov 2022 pada 16.02
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gahwa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pembelian`
--

CREATE TABLE `data_pembelian` (
  `id_data_pembelian` int(15) NOT NULL,
  `id_user` int(15) NOT NULL,
  `id_produk` int(15) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `harga_produk` int(255) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `tanggal_pembelian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hubungi`
--

CREATE TABLE `hubungi` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` int(15) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `pesan` varchar(999) NOT NULL,
  `nama_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hubungi`
--

INSERT INTO `hubungi` (`id`, `nama`, `email`, `telepon`, `jenis`, `lokasi`, `pesan`, `nama_file`) VALUES
(3, 'Dhimas', 'dhimas@gmail.com', 9283467, 'laki-laki', 'Gahwa Silkar', 'mantap', '1 (95).jpg'),
(4, 'Aby', 'abyskill@gmail.com', 9823462, 'laki-laki', 'Gahwa Waru', 'bagus', '1598150740144.png'),
(7, 'Gio', 'gio@gmail.com', 123123213, 'laki-laki', 'Gahwa Waru', 'jqweguqewg', 'SAVE_20220101_114232.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_produk` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_user`, `id_produk`, `nama_produk`, `harga_produk`) VALUES
(5, 3, 8, 'Mango Coffe', 18000),
(9, 3, 9, 'Melon Coffee', 17000),
(10, 3, 9, 'Melon Coffee', 17000),
(12, 3, 9, 'Melon Coffee', 17000),
(13, 3, 8, 'Mango Coffe', 18000),
(14, 3, 8, 'Mango Coffe', 18000),
(15, 3, 8, 'Mango Coffe', 18000),
(16, 3, 8, 'Mango Coffe', 18000),
(17, 3, 8, 'Mango Coffe', 18000),
(18, 3, 8, 'Mango Coffe', 18000),
(19, 3, 8, 'Mango Coffe', 18000),
(20, 3, 8, 'Mango Coffe', 18000),
(21, 3, 8, 'Mango Coffe', 18000),
(22, 3, 8, 'Mango Coffe', 18000),
(23, 3, 8, 'Mango Coffe', 18000),
(24, 3, 9, 'Melon Coffee', 17000),
(25, 3, 8, 'Mango Coffe', 18000),
(26, 4, 9, 'Melon Coffee', 17000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(3) NOT NULL,
  `nama_produk` varchar(64) NOT NULL,
  `harga` int(64) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `deskripsi`, `foto`) VALUES
(8, 'Mango Coffe', 18000, 'Enak', 'image2.jpg'),
(9, 'Melon Coffee', 17000, 'Enak Banget', 'image3.jpg'),
(10, 'Milk Choco', 20000, 'Menu Andalan', 'image4.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id` int(3) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` int(15) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `level`) VALUES
(3, 'Aby', 'abyskill@gmail.com', 'abay15', '$2y$10$XE9pGCEuPm.rc0PpPVgcSOpFOF27V.O1Z4LSJ8.bDINqo0E4tFkhu', 'user'),
(4, 'Dhimas', 'dhimas@gmail.com', 'dhimas15', '$2y$10$iYr5YsAlau8hdekMOmEdC.2HqSpQNgusFoJdX0LC7z3agSd.1XUnq', 'user'),
(5, 'Gio', 'gio@gmail.com', 'okin123', '$2y$10$KYwtLEsYzTj06/nSWU2PJONssqLutmMXxZ3FGJT7ZqsiO7tS/.vv2', 'user'),
(10, 'Admin', 'admin@gmail.com', 'admin', '$2y$10$.7uxE7zgFs8YZBd6cyOpceckXoJh7FznbiYnb5T9EAt3SfIeyvm3i', 'admin'),
(11, 'Kurniawan', 'kurniawan@gmail.com', 'kurniawan', '$2y$10$SG0yufwZe/AyKn6a7l/f/enIoZrdPnHV/DCrud5A/c/mO8/NQmxM6', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_pembelian`
--
ALTER TABLE `data_pembelian`
  ADD PRIMARY KEY (`id_data_pembelian`);

--
-- Indeks untuk tabel `hubungi`
--
ALTER TABLE `hubungi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_pembelian`
--
ALTER TABLE `data_pembelian`
  MODIFY `id_data_pembelian` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hubungi`
--
ALTER TABLE `hubungi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
