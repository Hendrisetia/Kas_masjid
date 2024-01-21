-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jul 2023 pada 05.32
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasmasjiddb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kas_masjid`
--

CREATE TABLE `kas_masjid` (
  `id_km` int(11) NOT NULL,
  `id_donatur` int(30) NOT NULL,
  `tgl_km` date NOT NULL,
  `uraian_km` varchar(200) NOT NULL,
  `masuk` int(11) NOT NULL,
  `keluar` int(11) NOT NULL,
  `jenis` enum('Masuk','Keluar') NOT NULL,
  `donatur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kas_masjid`
--

INSERT INTO `kas_masjid` (`id_km`, `id_donatur`, `tgl_km`, `uraian_km`, `masuk`, `keluar`, `jenis`, `donatur`) VALUES
(7, 0, '2023-03-07', 'Bayar Listrik', 0, 200000, 'Keluar', ''),
(15, 0, '2023-05-07', 'Bayar Listrik', 0, 200000, 'Keluar', ''),
(19, 0, '2023-05-30', 'Pembelian Alat Kebersihan', 0, 200000, 'Keluar', ''),
(20, 0, '2023-06-07', 'sumbangan pembangunan', 800000, 0, 'Masuk', 'zohan'),
(21, 0, '2023-06-08', 'sumbangan pembangunan', 2500000, 0, 'Masuk', 'widodo saputro'),
(22, 0, '2023-06-08', 'bayar listrik mei', 0, 200000, 'Keluar', ''),
(23, 0, '2023-06-07', 'sumbangan pribadi', 800000, 0, 'Masuk', 'widodo saputro');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kas_sosial`
--

CREATE TABLE `kas_sosial` (
  `id_ks` int(11) NOT NULL,
  `id_donatur` int(30) NOT NULL,
  `tgl_ks` date NOT NULL,
  `uraian_ks` varchar(200) NOT NULL,
  `masuk` int(11) NOT NULL,
  `keluar` int(11) NOT NULL,
  `jenis` enum('Masuk','Keluar') NOT NULL,
  `donatur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kas_sosial`
--

INSERT INTO `kas_sosial` (`id_ks`, `id_donatur`, `tgl_ks`, `uraian_ks`, `masuk`, `keluar`, `jenis`, `donatur`) VALUES
(7, 0, '2023-05-30', 'sumbangan pengajian umum', 850000, 0, 'Masuk', 'Yusuf'),
(8, 0, '2023-05-30', 'Sumbangan Pengajian Umum', 800000, 0, 'Masuk', 'hendra'),
(9, 0, '2023-05-03', 'Pengajian umum mei 2023', 0, 1200000, 'Keluar', ''),
(10, 0, '2023-06-07', 'sumbangan idul adha', 1200000, 0, 'Masuk', 'Andre'),
(11, 0, '2023-06-08', 'Sumbangan Pengajian Umum', 800000, 0, 'Masuk', 'Yusuf'),
(12, 0, '2023-06-09', 'Santunan Anak Yatim', 0, 1000000, 'Keluar', ''),
(13, 0, '2023-06-20', 'Sumbangan Pengajian Umum ', 5000000, 0, 'Masuk', 'Jamaah'),
(14, 0, '2023-06-20', 'Santunan Anak Yatim', 5000000, 0, 'Masuk', 'Jamaah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_donatur`
--

CREATE TABLE `tb_donatur` (
  `id_donatur` int(30) NOT NULL,
  `nm_donatur` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_donatur`
--

INSERT INTO `tb_donatur` (`id_donatur`, `nm_donatur`, `alamat`, `telepon`) VALUES
(1, 'Firman alif', 'jl.cempaka', '083234567654'),
(2, 'zohan', 'jl.mawar', '0897654567'),
(3, 'Yusuf', 'Jl.Majapahit', '08765467876'),
(4, 'hendra', 'Jl.Pajajaran', '087654326758'),
(5, 'Andre', 'Jl.Pribumi', '089761783572'),
(6, 'widodo saputro', 'jl.kemangi 67', '087656789798'),
(7, 'Jamaah', 'Desa Mojo', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('Administrator','Pimpinan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(7, 'Admin Masjid', 'Admin', '$2y$10$YexT4KFahGPFdON41LxJe.X4br.l77gGej3jrDkM3QfYRTmrQqCkC', 'Administrator'),
(8, 'Pengurus Masjid', 'Pengurus', '$2y$10$lKBu5DNpWAPSiGrUpV7eeO7kmxHL5GbCwk01dx77A4uuAiryIDslG', 'Pimpinan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kas_masjid`
--
ALTER TABLE `kas_masjid`
  ADD PRIMARY KEY (`id_km`);

--
-- Indeks untuk tabel `kas_sosial`
--
ALTER TABLE `kas_sosial`
  ADD PRIMARY KEY (`id_ks`);

--
-- Indeks untuk tabel `tb_donatur`
--
ALTER TABLE `tb_donatur`
  ADD PRIMARY KEY (`id_donatur`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kas_masjid`
--
ALTER TABLE `kas_masjid`
  MODIFY `id_km` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `kas_sosial`
--
ALTER TABLE `kas_sosial`
  MODIFY `id_ks` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_donatur`
--
ALTER TABLE `tb_donatur`
  MODIFY `id_donatur` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
