-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Feb 2024 pada 14.35
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ntask`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tugas` varchar(60) NOT NULL,
  `deskripsi` text NOT NULL,
  `deadline` date NOT NULL,
  `dibuat` date NOT NULL,
  `prioritas` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `id_user`, `tugas`, `deskripsi`, `deadline`, `dibuat`, `prioritas`, `status`) VALUES
(25, 16, 'Beli Buah', 'Pisang, Mangga, Jeruk', '2024-02-19', '2024-02-17', 'Rendah', 'Selesai'),
(26, 16, 'Bimbel', 'Bahasa dan Matematika', '2024-02-18', '2024-02-17', 'Sedang', 'Belum Selesai'),
(27, 16, 'Pergi Ke Rumah Sakit', 'Cek Kesehatan', '2024-02-20', '2024-02-17', 'Tinggi', 'Belum Selesai'),
(28, 16, 'Pergi Ke Perpustakaan', '-', '2024-02-17', '2024-02-19', 'Sedang', 'Selesai'),
(29, 16, 'Futsal', '-', '2024-02-16', '2024-02-20', 'Rendah', 'Selesai'),
(30, 16, 'Membayar Tagihan Listrik', 'Membayar tagihan listrik bulan ini', '2024-03-08', '2024-02-24', 'Sedang', 'Selesai'),
(31, 16, 'Belanja Bulanan', '-', '2024-02-27', '2024-02-24', 'Rendah', 'Belum Selesai'),
(32, 16, 'Mengikuti Pelatihan', 'Pelatihan pengembangan diri', '2024-02-23', '2024-02-24', 'Rendah', 'Selesai'),
(33, 16, 'Menyiapkan Presentasi', 'Presentasi untuk rapat', '2024-02-26', '2024-02-24', 'Tinggi', 'Selesai'),
(34, 16, 'Mengikuti Pelatihan', 'Pelatihan keterampilan manajerial', '2024-02-28', '2024-02-24', 'Tinggi', 'Belum Selesai'),
(36, 17, 'Tugas 1', '-', '2024-02-22', '2024-02-24', 'Rendah', 'Selesai'),
(37, 17, 'Tugas 2', '-', '2024-02-29', '2024-02-24', 'Rendah', 'Belum Selesai'),
(38, 17, 'Tugas 3', '-', '2024-02-15', '2024-02-24', 'Sedang', 'Selesai'),
(39, 17, 'Tugas 4', '-', '2024-02-28', '2024-02-24', 'Sedang', 'Belum Selesai'),
(40, 17, 'Tugas 5', '-', '2024-02-24', '2024-02-24', 'Tinggi', 'Selesai'),
(41, 17, 'Tugas 6', '-', '2024-03-05', '2024-02-24', 'Tinggi', 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `sandi` varchar(60) NOT NULL,
  `tentang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `sandi`, `tentang`) VALUES
(16, 'User', 'user@web.com', 'b8m2', 'Halo!'),
(17, 'User 2', 'user2@web.com', 'bci2', 'Halo gaes');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`),
  ADD KEY `user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
