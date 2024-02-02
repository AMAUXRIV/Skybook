-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 31 Jan 2024 pada 16.41
-- Versi server: 10.6.16-MariaDB-cll-lve
-- Versi PHP: 8.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cjafwtqt_learnify`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(64) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', '$2y$10$EX0L5MeIQldpkCuTZW.mjujTaj.Yy20IW0GOluecU/c.es.9r6E5.', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `nip` int(64) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_guru` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_mapel` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`nip`, `email`, `nama_guru`, `password`, `nama_mapel`) VALUES
(123456, 'guruaja@gmail.com', 'Guru F', '$2y$10$3kEvqPwM2uYdAosoEN557uCfSr.EjsC5TM/Tsz1aa9piQ2NEz27mO', 'Fisika'),
(12345678, 'guru@gmail.com', 'tama', '$2y$10$yfMgyaUukwBFvphAVbR.Xeu6YHUAcOESimUIBYCrUMA8xH7UZPLEm', 'Kimia'),
(1357901726, 'gurum@gmail.com', 'Guru Matematika', '$2y$10$OZX9lAvURXUjy6h.A5ykdu5eCJV79wXppBMVU1G6CEUcN7VCHPR/m', 'Matematika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban`
--

CREATE TABLE `jawaban` (
  `id` int(11) NOT NULL,
  `generate_jwb` varchar(100) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_quiz` int(11) DEFAULT NULL,
  `jawaban_siswa` char(1) NOT NULL,
  `benar` tinyint(1) NOT NULL,
  `skor` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jawaban`
--

INSERT INTO `jawaban` (`id`, `generate_jwb`, `id_siswa`, `id_quiz`, `jawaban_siswa`, `benar`, `skor`, `created_at`) VALUES
(32, 'jwb20240130034204', 55, 12, 'D', 0, 0, '2024-01-30 14:42:04'),
(33, 'jwb20240131041657', 55, 13, 'A', 1, 1, '2024-01-31 03:16:57'),
(34, 'jwb20240131041657', 55, 14, 'C', 0, 0, '2024-01-31 03:16:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(255) NOT NULL,
  `kelas` varchar(128) NOT NULL,
  `nama_siswa` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `nama_guru` varchar(128) NOT NULL,
  `nama_mapel` varchar(128) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(1024) NOT NULL,
  `kelas` varchar(128) NOT NULL,
  `jenis_file` enum('video','foto') NOT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `link_ppt` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id`, `nama_guru`, `nama_mapel`, `video`, `deskripsi`, `kelas`, `jenis_file`, `foto`, `link_ppt`) VALUES
(16, 'Guru Matematika', 'Matematika', NULL, 'Matematika', 'X', 'foto', '5e340a670310041ff87c5467eff48e812.jpg', 'https://drive.google.com/file/d/17dpeINYo60GhlKl3UcDooYZiLlNanHjV/view'),
(17, 'Guru F', 'Fisika', NULL, 'FISIKA', 'X', 'foto', '5e340a670310041ff87c5467eff48e813.jpg', 'https://drive.google.com/file/d/17dpeINYo60GhlKl3UcDooYZiLlNanHjV/view');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `user_pembuat` varchar(100) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `pilihan_a` varchar(255) NOT NULL,
  `pilihan_b` varchar(255) NOT NULL,
  `pilihan_c` varchar(255) NOT NULL,
  `pilihan_d` varchar(255) NOT NULL,
  `jawaban_benar` char(1) NOT NULL,
  `pembahasan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `quiz`
--

INSERT INTO `quiz` (`id`, `pertanyaan`, `kelas`, `user_pembuat`, `id_materi`, `pilihan_a`, `pilihan_b`, `pilihan_c`, `pilihan_d`, `jawaban_benar`, `pembahasan`, `created_at`, `updated_at`) VALUES
(12, 'rumus fisika', 'X', 'Guru F', 15, '1', '4', '8', '0', 'A', 'lawakkkkk', '2024-01-30 15:34:12', '2024-01-30 15:34:12'),
(13, 'Banyak cara menyusun pengurus yang terdiri dari Ketua, Sekretaris, dan Bendahara yang diambil dari 5 orang calon adalah….', 'X', 'admin', 16, '60 cara', '10 cara', '30 cara', '40 cara', 'A', '•banyak calon pengurus 5 → n = 5\r\n•banyak pengurus yang akan dipilih 3 → r = 3\r\n\r\nnPr = n!/(n-r)! = 5!/(5-3)!\r\n\r\n5P3 = 5!/2! = 2!.3.4.5/2!\r\n\r\n= 60 cara', '2024-01-31 03:25:06', '2024-01-31 03:25:06'),
(14, 'Seorang siswa diharuskan mengerjakan 6 dari 8 soal, tetapi nomor 1 sampai 4 wajib dikerjakan . Banyak pilihan yang dapat\r\ndiambil oleh siswa adalah….', 'X', 'admin', 16, '1 Pilihan', '6 Pilihan', '2 Pilihan', '40 Pilihan', 'A', '6 Pilihan', '2024-01-31 03:27:13', '2024-01-31 03:27:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(64) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `password`, `email`, `image`, `is_active`, `date_created`) VALUES
(54, 'murid', '$2y$10$jPolXrcQAPfrfON1ih2Fj.bFgEG2gDE.ZwiPQR64hc5etY2sIdt6G', 'murid@gmail.com', 'default.jpg', 1, 1706572132),
(55, 'Siswa', '$2y$10$LuQ/4gG34nagTzIv.NC4/ev4S9szUv5IvvG1Z0qe1vD033JiEYZZK', 'siswaaja@gmail.com', 'default.jpg', 1, 1706629222);

-- --------------------------------------------------------

--
-- Struktur dari tabel `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_quiz` (`id_quiz`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `jawaban_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`),
  ADD CONSTRAINT `jawaban_ibfk_2` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
