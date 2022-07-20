-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jul 2022 pada 02.13
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pentacode`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bobot`
--

CREATE TABLE `bobot` (
  `id_bobot` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pengalaman` int(11) DEFAULT NULL,
  `prestasi` int(11) DEFAULT NULL,
  `kemampuan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bobot`
--

INSERT INTO `bobot` (`id_bobot`, `id_user`, `pengalaman`, `prestasi`, `kemampuan`) VALUES
(7, 6, 2, 1, 14),
(8, 8, 0, 2, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'Finance'),
(2, 'Pentacode'),
(3, 'Marketing'),
(4, 'Digital');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gap`
--

CREATE TABLE `gap` (
  `id` int(11) NOT NULL,
  `id_bobot` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pengalaman` double DEFAULT NULL,
  `prestasi` double DEFAULT NULL,
  `kemampuan` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gap`
--

INSERT INTO `gap` (`id`, `id_bobot`, `id_user`, `pengalaman`, `prestasi`, `kemampuan`) VALUES
(4, 7, 6, -3, 1, 7),
(5, 8, 8, -3, 1, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hrd`
--

CREATE TABLE `hrd` (
  `id_hrd` int(11) NOT NULL,
  `nama_hrd` varchar(128) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tmp_lahir` varchar(128) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_tlpn` int(50) NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(128) NOT NULL,
  `jobdesc` varchar(128) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `jobdesc`, `id_level`) VALUES
(1, 'Bussines Analystyyy', 'Mendefinisikan kebutuhan user', 2),
(2, 'Bussines Analyst', 'Mendefinisikan kebutuhan user', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `id` int(11) NOT NULL,
  `interval` varchar(30) NOT NULL,
  `pengalaman` int(11) DEFAULT NULL,
  `prestasi` int(11) DEFAULT NULL,
  `kemampuan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `klasifikasi`
--

INSERT INTO `klasifikasi` (`id`, `interval`, `pengalaman`, `prestasi`, `kemampuan`) VALUES
(1, 'Tidak Ada/Pernah', 1, 1, NULL),
(2, '1-5', NULL, NULL, 1),
(3, '1-2', NULL, 2, NULL),
(4, '3-4', NULL, 3, NULL),
(5, '>5', NULL, 4, NULL),
(6, '6-10', NULL, NULL, 2),
(7, '11-15', NULL, NULL, 3),
(8, '>16', NULL, NULL, 4),
(9, '1-2 Tahun', 2, NULL, NULL),
(10, '3-4 Tahun', 3, NULL, NULL),
(11, '>5 Tahun', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `atribut` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `level` enum('Manajer','HRD','Pegawai','Admin Finance','Admin Pentacode','Admin Marketing','Admin Digital','Super') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `level`) VALUES
(1, 'Manajer'),
(2, 'HRD'),
(3, 'Admin Finance'),
(4, 'Pegawai'),
(5, 'Admin Pentacode'),
(6, 'Admin Marketing'),
(7, 'Admin Digital'),
(8, 'Super');

-- --------------------------------------------------------

--
-- Struktur dari tabel `manajer`
--

CREATE TABLE `manajer` (
  `id_manajer` int(11) NOT NULL,
  `nama_manajer` varchar(128) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tmp_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_tlpn` int(50) NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_bobot`
--

CREATE TABLE `nilai_bobot` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pengalaman` double DEFAULT NULL,
  `prestasi` double DEFAULT NULL,
  `kemampuan` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_bobot`
--

INSERT INTO `nilai_bobot` (`id`, `id_user`, `pengalaman`, `prestasi`, `kemampuan`) VALUES
(19, 6, 2, 4.5, 4.5),
(23, 8, 4.5, 4.5, 4.5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(128) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_tlp` varchar(30) NOT NULL,
  `id_jabatan` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `jenis_kelamin`, `tmp_lahir`, `tgl_lahir`, `alamat`, `email`, `no_tlp`, `id_jabatan`) VALUES
(1, 'Ihsan Ibrahim', 'Laki-laki', 'Karawang', '2022-05-30', 'hgfhfdhdf', 'inwananwar99@gmail.com', '97968980', 1),
(2, 'Denny Adam', 'Laki-laki', 'Lampung', '2000-09-12', 'Cilandak, Jaksel', 'denny@iconpln.co.id', '0789472892', 2),
(3, 'Dhika Pratara', 'Laki-laki', 'Mojokerto', '2022-07-12', 'Jaksel', 'dhikapratara@penta.id', '0875674563', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembobotan`
--

CREATE TABLE `pembobotan` (
  `id` int(11) NOT NULL,
  `selisih` double NOT NULL,
  `bobot_nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembobotan`
--

INSERT INTO `pembobotan` (`id`, `selisih`, `bobot_nilai`) VALUES
(1, 0, 5),
(2, 1, 4.5),
(3, 2, 3.5),
(4, 3, 2.5),
(5, 4, 1.5),
(6, -1, 4),
(7, -2, 3),
(8, -3, 2),
(9, -4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `jenjang` varchar(20) NOT NULL,
  `gelar` varchar(20) NOT NULL,
  `bidang_studi` varchar(30) NOT NULL,
  `perguruan_tinggi` varchar(128) NOT NULL,
  `thn_lulus` int(30) NOT NULL,
  `lampiran` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `user_id`, `jenjang`, `gelar`, `bidang_studi`, `perguruan_tinggi`, `thn_lulus`, `lampiran`, `status`) VALUES
(2, 6, 'Sarjana', 'Sarjana Terapan', 'Informatika', 'Politeknik Negeri Subang', 2021, '', 'Disetujui'),
(3, 8, 'Magister', 'Magister', 'Informatika', 'Politeknik Elektronika Negeri ', 2021, '', 'Disetujui'),
(4, 6, 'Diploma', 'Ahli Madya', 'Informatika', 'Politeknik Elektronika Negeri Surabaya', 2021, 'BERITA_ACARA_UAT_ICONPAYxMESTIKA_sign_dev.pdf', 'Disetujui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_prestasi` varchar(128) NOT NULL,
  `bidang` varchar(50) NOT NULL,
  `tahun` int(5) NOT NULL,
  `lampiran` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`id_prestasi`, `user_id`, `nama_prestasi`, `bidang`, `tahun`, `lampiran`, `status`) VALUES
(3, 8, 'Web Developer Hackathon Sandbox 2018', 'Teknologi Informasi', 2018, 'IC_AssessmentICPay_Versi_2_8.pdf', 'Disetujui'),
(6, 6, 'Jawa Timur', 'Keagamaan', 2021, '98-Article_Text-182-1-10-201903202.pdf', 'Diajukan'),
(7, 6, 'Jawa Timur', 'Keagamaan', 2021, '98-Article_Text-182-1-10-201903203.pdf', 'Diajukan'),
(9, 6, 'Jawa Tengah', 'Keagamaan', 2021, '98-Article_Text-182-1-10-201903205.pdf', 'Diajukan'),
(10, 6, 'Jawa Tengah', 'Keagamaan', 2021, '98-Article_Text-182-1-10-201903206.pdf', 'Diajukan'),
(11, 6, 'Jawa Tengah', 'Keagamaan', 2021, '98-Article_Text-182-1-10-201903207.pdf', 'Diajukan'),
(12, 6, 'Jawa Tengah', 'Keagamaan', 2021, '98-Article_Text-182-1-10-201903208.pdf', 'Diajukan'),
(13, 8, 'Hackathon', 'Teknologi Informasi', 2019, '98-Article_Text-182-1-10-201903209.pdf', 'Diajukan'),
(14, 8, 'Katalog A', 'Teknologi Informasi', 2018, '98-Article_Text-182-1-10-2019032010.pdf', 'Diajukan'),
(15, 8, 'Katalog A', 'Teknologi Informasi', 2018, '98-Article_Text-182-1-10-2019032011.pdf', 'Diajukan'),
(16, 8, 'Katalog A', 'Teknologi Informasi', 2018, '98-Article_Text-182-1-10-2019032012.pdf', 'Diajukan'),
(17, 8, 'Katalog A', 'Teknologi Informasi', 2018, '98-Article_Text-182-1-10-2019032013.pdf', 'Diajukan'),
(18, 8, 'Katalog A', 'Teknologi Informasi', 2018, '98-Article_Text-182-1-10-2019032014.pdf', 'Diajukan'),
(19, 8, 'Katalog A', 'Teknologi Informasi', 2018, '98-Article_Text-182-1-10-2019032015.pdf', 'Diajukan'),
(20, 8, 'Katalog A', 'Teknologi Informasi', 2018, '98-Article_Text-182-1-10-2019032016.pdf', 'Diajukan'),
(22, 6, 'Jawa Timur', 'Keagamaan', 2021, '98-Article_Text-182-1-10-2019032018.pdf', 'Diajukan'),
(23, 6, 'Katalog A', 'Keagamaan', 2021, '98-Article_Text-182-1-10-2019032019.pdf', 'Diajukan'),
(24, 6, 'karina aulia', 'Teknologi Informasi', 2021, 'INVOICE.pdf', 'Diajukan'),
(25, 6, 'karina aulia', 'Teknologi Informasi', 2021, 'INVOICE1.pdf', 'Diajukan'),
(26, 6, 'karina aulia', 'Teknologi Informasi', 2021, 'INVOICE2.pdf', 'Diajukan'),
(27, 6, 'karina aulia', 'Teknologi Informasi', 2021, 'INVOICE3.pdf', 'Diajukan'),
(28, 6, 'Jawa Tengah', 'Teknologi Informasi', 2021, 'INVOICE4.pdf', 'Diajukan'),
(29, 6, 'Katalog A', 'Keagamaan', 2018, '98-Article_Text-182-1-10-2019032020.pdf', 'Diajukan'),
(30, 8, 'Maulid', 'Keagamaan', 2021, '98-Article_Text-182-1-10-2019032021.pdf', 'Diajukan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek`
--

CREATE TABLE `proyek` (
  `id_proyek` int(11) NOT NULL,
  `nama_proyek` varchar(128) NOT NULL,
  `id_pegawai` int(30) NOT NULL,
  `ket_proyek` varchar(30) NOT NULL,
  `status_pegawai` varchar(128) NOT NULL,
  `tgl_awal_proyek` date NOT NULL,
  `tgl_akhir_proyek` date NOT NULL,
  `status_proyek` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `proyek`
--

INSERT INTO `proyek` (`id_proyek`, `nama_proyek`, `id_pegawai`, `ket_proyek`, `status_pegawai`, `tgl_awal_proyek`, `tgl_akhir_proyek`, `status_proyek`) VALUES
(2, 'Jawa Tengah', 2, 'dggafs', 'Fungsional', '2022-06-27', '2022-06-28', 'On Progress'),
(3, 'Purwakarta', 1, 'fgsdggsdg', 'Jasbor', '2022-06-28', '2022-06-30', 'On Progress');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_pekerjaan`
--

CREATE TABLE `riwayat_pekerjaan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `riwayat_pekerjaan`
--

INSERT INTO `riwayat_pekerjaan` (`id`, `id_user`, `id_proyek`, `status`) VALUES
(1, 6, 1, 'selesai'),
(2, 6, 1, 'selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sertifikat`
--

CREATE TABLE `sertifikat` (
  `id_sert` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `jenis_sert` varchar(50) NOT NULL,
  `bidang_studi` varchar(50) NOT NULL,
  `thn_sert` int(5) NOT NULL,
  `lampiran` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sertifikat`
--

INSERT INTO `sertifikat` (`id_sert`, `user_id`, `jenis_sert`, `bidang_studi`, `thn_sert`, `lampiran`, `status`) VALUES
(2, 6, 'Pauli', 'Informatikaaa', 2018, 'Advice+no+purchase+-+Gopay+1_1-Test-Report-14-6-2022+12-06-44-full6.pdf', 'Disetujui'),
(4, 8, 'Kremlin', 'HR Specialist', 2018, 'IC_AssessmentICPay_Versi_2_8.pdf', 'Disetujui'),
(5, 8, 'Kremlin', 'HR Specialist', 2021, '98-Article_Text-182-1-10-20190320.pdf', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_divisi` int(11) DEFAULT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `foto` text NOT NULL,
  `id_level` int(11) NOT NULL,
  `status_aktif` int(2) NOT NULL,
  `tanggal_buat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `id_divisi`, `name`, `email`, `password`, `foto`, `id_level`, `status_aktif`, `tanggal_buat`) VALUES
(6, 4, 'Denny Adam', 'denny@iconpln.co.id', 'dennyicon', 'Inwan14.png', 4, 1, '2022-05-31'),
(7, 2, 'Denny Adam', 'sugiarto@iconpln.co.id', 'sugiarto', 'wp2655834.jpg', 1, 1, '2022-06-19'),
(8, 3, 'Dhika Pratara', 'dhika@iconpln.co.id', 'pratara', 'wp2655834.jpg', 4, 1, '2022-06-30'),
(9, 4, 'Ibnu', 'ibnu@iconpln.co.id', 'ibnuicon', 'default.jpg', 8, 1, '2022-07-03'),
(12, 4, 'Denny Adam', 'denny@pln.co.id', 'dennyicon', 'info1.png', 7, 1, '2022-07-03'),
(13, 3, 'Dhika Pratara', 'dhika@pln.co.id', 'dhikaicon', 'info2.png', 6, 1, '2022-07-05'),
(14, NULL, 'Albar Hidayah', 'albarhidayah@mgs.co.id', 'albarhidayah', 'albar.jpg', 2, 1, '2022-07-15');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id_bobot`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indeks untuk tabel `gap`
--
ALTER TABLE `gap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bobot` (`id_bobot`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `hrd`
--
ALTER TABLE `hrd`
  ADD PRIMARY KEY (`id_hrd`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`),
  ADD KEY `id_level` (`id_level`);

--
-- Indeks untuk tabel `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `manajer`
--
ALTER TABLE `manajer`
  ADD PRIMARY KEY (`id_manajer`);

--
-- Indeks untuk tabel `nilai_bobot`
--
ALTER TABLE `nilai_bobot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indeks untuk tabel `pembobotan`
--
ALTER TABLE `pembobotan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id_proyek`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_proyek` (`id_proyek`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`id_sert`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_level` (`id_level`),
  ADD KEY `id_divisi` (`id_divisi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bobot`
--
ALTER TABLE `bobot`
  MODIFY `id_bobot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `gap`
--
ALTER TABLE `gap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `hrd`
--
ALTER TABLE `hrd`
  MODIFY `id_hrd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `klasifikasi`
--
ALTER TABLE `klasifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `manajer`
--
ALTER TABLE `manajer`
  MODIFY `id_manajer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nilai_bobot`
--
ALTER TABLE `nilai_bobot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembobotan`
--
ALTER TABLE `pembobotan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `id_sert` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bobot`
--
ALTER TABLE `bobot`
  ADD CONSTRAINT `bobot_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `gap`
--
ALTER TABLE `gap`
  ADD CONSTRAINT `gap_ibfk_1` FOREIGN KEY (`id_bobot`) REFERENCES `bobot` (`id_bobot`),
  ADD CONSTRAINT `gap_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD CONSTRAINT `jabatan_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);

--
-- Ketidakleluasaan untuk tabel `nilai_bobot`
--
ALTER TABLE `nilai_bobot`
  ADD CONSTRAINT `nilai_bobot_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`);

--
-- Ketidakleluasaan untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD CONSTRAINT `pendidikan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `prestasi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD CONSTRAINT `proyek_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Ketidakleluasaan untuk tabel `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  ADD CONSTRAINT `riwayat_pekerjaan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD CONSTRAINT `sertifikat_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
