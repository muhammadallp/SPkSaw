-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Des 2022 pada 16.49
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_saw`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `saw_alternatives`
--

CREATE TABLE `saw_alternatives` (
  `id_alternative` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `saw_alternatives`
--

INSERT INTO `saw_alternatives` (`id_alternative`, `name`) VALUES
(1, 'Arabika Fulwash'),
(2, 'Arabika Honey'),
(3, 'Arabika Blue Honey'),
(4, 'Arabika Wethull'),
(5, 'Arabika Natural');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saw_criterias`
--

CREATE TABLE `saw_criterias` (
  `id_criteria` tinyint(3) UNSIGNED NOT NULL,
  `criteria` varchar(100) NOT NULL,
  `weight` float NOT NULL,
  `attribute` set('benefit','cost') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `saw_criterias`
--

INSERT INTO `saw_criterias` (`id_criteria`, `criteria`, `weight`, `attribute`) VALUES
(1, 'Aroma Biji', 0.25, 'benefit'),
(2, 'Kadar Air', 0.15, 'cost'),
(3, 'Kadar Keasaman', 0.2, 'cost'),
(4, 'After Taste', 0.2, 'benefit'),
(5, 'Kadar Kafein', 0.2, 'cost');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saw_evaluations`
--

CREATE TABLE `saw_evaluations` (
  `id_evaluations` int(11) NOT NULL,
  `id_alternative` smallint(5) UNSIGNED NOT NULL,
  `id_criteria` tinyint(3) UNSIGNED NOT NULL,
  `value` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `saw_evaluations`
--

INSERT INTO `saw_evaluations` (`id_evaluations`, `id_alternative`, `id_criteria`, `value`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 2),
(3, 1, 3, 2),
(4, 1, 4, 1),
(5, 1, 5, 2),
(6, 2, 1, 2),
(7, 2, 2, 2),
(8, 2, 3, 3),
(9, 2, 4, 2),
(10, 2, 5, 3),
(11, 3, 1, 2),
(12, 3, 2, 1),
(13, 3, 3, 2),
(14, 3, 4, 2),
(15, 3, 5, 1),
(16, 4, 1, 1),
(17, 4, 2, 2),
(18, 4, 3, 2),
(19, 4, 4, 1),
(20, 4, 5, 2),
(21, 5, 1, 3),
(22, 5, 2, 1),
(23, 5, 3, 1),
(24, 5, 4, 3),
(25, 5, 5, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `saw_nilai_kriterias`
--

CREATE TABLE `saw_nilai_kriterias` (
  `id_nilaikriteria` int(11) NOT NULL,
  `id_criteria` int(11) NOT NULL,
  `nilai` float NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `saw_nilai_kriterias`
--

INSERT INTO `saw_nilai_kriterias` (`id_nilaikriteria`, `id_criteria`, `nilai`, `keterangan`) VALUES
(1, 1, 3, 'Sangat Beraroma'),
(2, 1, 2, 'Beraroma'),
(3, 1, 1, 'Sedikit Beraroma'),
(4, 2, 3, '13%'),
(5, 2, 2, '12% s.d 13%'),
(6, 2, 1, '10% s.d 11%'),
(7, 3, 3, 'Tinggi'),
(8, 3, 2, 'Sedang'),
(9, 3, 1, 'Rendah'),
(10, 4, 3, 'Komplex'),
(11, 4, 2, 'Fruity'),
(12, 4, 1, 'Dominan Asam'),
(13, 5, 3, 'Tinggi'),
(14, 5, 2, 'Sedang'),
(15, 5, 1, 'Rendah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saw_users`
--

CREATE TABLE `saw_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `saw_users`
--

INSERT INTO `saw_users` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `saw_alternatives`
--
ALTER TABLE `saw_alternatives`
  ADD PRIMARY KEY (`id_alternative`);

--
-- Indeks untuk tabel `saw_criterias`
--
ALTER TABLE `saw_criterias`
  ADD PRIMARY KEY (`id_criteria`);

--
-- Indeks untuk tabel `saw_evaluations`
--
ALTER TABLE `saw_evaluations`
  ADD PRIMARY KEY (`id_evaluations`) USING BTREE;

--
-- Indeks untuk tabel `saw_nilai_kriterias`
--
ALTER TABLE `saw_nilai_kriterias`
  ADD PRIMARY KEY (`id_nilaikriteria`);

--
-- Indeks untuk tabel `saw_users`
--
ALTER TABLE `saw_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `saw_alternatives`
--
ALTER TABLE `saw_alternatives`
  MODIFY `id_alternative` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `saw_evaluations`
--
ALTER TABLE `saw_evaluations`
  MODIFY `id_evaluations` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `saw_nilai_kriterias`
--
ALTER TABLE `saw_nilai_kriterias`
  MODIFY `id_nilaikriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `saw_users`
--
ALTER TABLE `saw_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
