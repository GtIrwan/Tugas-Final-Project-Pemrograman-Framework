-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jan 2022 pada 05.38
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `no_buku` int(11) UNSIGNED NOT NULL,
  `nama_buku` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `cover_buku` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`no_buku`, `nama_buku`, `penulis`, `penerbit`, `created_at`, `updated_at`, `cover_buku`) VALUES
(1, 'Jujutsu Kaisen', 'Gege Akutami', 'Elex MediaKomputindo', '2021-12-23 21:16:04', '2021-12-24 08:35:44', '1640356544_8370744005cff1c10c13.jpg'),
(2, 'BTOOOM', 'Junya Inoue', 'Level Comics', '2021-12-23 21:16:04', '2021-12-24 09:02:33', '1640358153_24a4871c134d7da7db91.jpg'),
(3, 'Black Bullet', 'Shinden Kanzaki', 'M&C', '2021-12-23 21:16:04', '2021-12-24 09:03:12', '1640358192_20c12329e83941cb5d01.jpg'),
(4, 'Spy X Family', 'Tatsuya Endo', 'Elex Media Computindo', '2021-12-25 06:16:59', '2021-12-25 06:16:59', '1640434619_85c4a3fc3d6cdc8edaef.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `jenis_kelamin` enum('pria','wanita') NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `jurusan`, `jenis_kelamin`, `no_telp`, `email`, `alamat`, `created_at`, `updated_at`, `foto`) VALUES
('C1955201091', 'Monica Febbyola Audia', 'Teknik Informatika', 'wanita', '085389116338', 'ylcnpark@gmail.com', 'Jl. G. Obos', '2021-12-25 06:15:45', '2021-12-25 06:15:45', '1640434545_beb22df3a0c8dfd3a1dc.jpg'),
('C2055201001', 'Alexander Osten Prawara', 'Teknik Informatika', 'pria', '081234555678', 'ostensadja@gmail.com', 'Jl. Perkutut No. 51, Palangka Raya', '2021-12-10 18:56:18', '2021-12-23 20:47:53', '1640140514_2b4cf299d084e5da85d2.jpg'),
('C2055201002', 'Budi', 'Teknik Informatika', 'pria', '08571234567', 'budi@gmail.com', 'Jl. G.Obos No. 77, Palangka Raya', '2021-12-10 18:56:18', '2021-12-21 20:35:28', '1640140528_a930e38533f1cddd8b0f.jpg'),
('C2055201003', 'Avrilyne Odela Prawara', 'Sistem Informasi', 'wanita', '08122334455', 'odela@gmail.com', 'Jl. Rembulan No. 90, Palangka Raya', '2021-12-10 18:56:18', '2021-12-21 20:35:37', '1640140537_0ea666a46f2b34e9de17.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(5, '2021-12-09-151953', 'App\\Database\\Migrations\\UsersLogin', 'default', 'App', 1639184049, 1),
(6, '2021-12-10-031622', 'App\\Database\\Migrations\\Mahasiswa', 'default', 'App', 1639184049, 1),
(7, '2021-12-24-025104', 'App\\Database\\Migrations\\Buku', 'default', 'App', 1640314740, 2),
(16, '2021-12-28-055226', 'App\\Database\\Migrations\\Peminjaman', 'default', 'App', 1640671949, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `nama_mahasiswa` varchar(255) NOT NULL,
  `nama_buku` varchar(255) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status` enum('Dipinjam','Dikembalikan') NOT NULL,
  `denda` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`nama_mahasiswa`, `nama_buku`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `denda`) VALUES
('Alexander Osten Prawara', 'BTOOOM', '2021-12-16', '2021-12-25', 'Dipinjam', 'Terlambat 1 Minggu = 20000'),
('Avrilyne Odela Prawara', 'Spy X Family', '2021-12-08', '2021-12-28', 'Dikembalikan', 'Terlambat 2 Minggu = 40000'),
('Budi', 'Black Bullet', '2021-12-26', '2021-12-28', 'Dikembalikan', 'Tidak Ada Denda'),
('Monica Febbyola Audia', 'Jujutsu Kaisen', '2021-12-21', '2021-12-28', 'Dipinjam', 'Tidak Ada Denda');

-- --------------------------------------------------------

--
-- Struktur dari tabel `userslogin`
--

CREATE TABLE `userslogin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `userslogin`
--

INSERT INTO `userslogin` (`username`, `password`, `name`, `created_at`, `updated_at`) VALUES
('irwan', '$2y$10$uCzWMCclHNvCNvPLU9xWtOxbLZP3tLlELclBw95f3GLukFUhjw8wK', 'Gt. Irwan', '2021-12-10 18:54:56', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`no_buku`),
  ADD UNIQUE KEY `nama_buku` (`nama_buku`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`nama_mahasiswa`),
  ADD UNIQUE KEY `nama_buku` (`nama_buku`);

--
-- Indeks untuk tabel `userslogin`
--
ALTER TABLE `userslogin`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`nama_mahasiswa`) REFERENCES `mahasiswa` (`nama`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`nama_buku`) REFERENCES `buku` (`nama_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
