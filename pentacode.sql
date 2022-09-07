-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 07, 2022 at 11:32 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

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
-- Table structure for table `bobot`
--

DROP TABLE IF EXISTS `bobot`;
CREATE TABLE IF NOT EXISTS `bobot` (
  `id_bobot` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `pengalaman` int(11) DEFAULT NULL,
  `prestasi` int(11) DEFAULT NULL,
  `kemampuan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_bobot`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bobot`
--

INSERT INTO `bobot` (`id_bobot`, `id_user`, `pengalaman`, `prestasi`, `kemampuan`) VALUES
(7, 6, 2, 2, 3),
(8, 8, 2, 2, 2),
(9, 7, NULL, 1, 1),
(10, 12, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cf_sf`
--

DROP TABLE IF EXISTS `cf_sf`;
CREATE TABLE IF NOT EXISTS `cf_sf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `cf` double NOT NULL,
  `sf` double NOT NULL,
  `final_result` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cf_sf`
--

INSERT INTO `cf_sf` (`id`, `id_user`, `cf`, `sf`, `final_result`) VALUES
(1, 6, 6.25, 4, 5.35),
(2, 8, 5.25, 4, 4.75),
(3, 12, 4.5, 4, 4.3);

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

DROP TABLE IF EXISTS `divisi`;
CREATE TABLE IF NOT EXISTS `divisi` (
  `id_divisi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_divisi` varchar(128) NOT NULL,
  PRIMARY KEY (`id_divisi`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'Finance'),
(2, 'Pentacode'),
(3, 'Marketing'),
(4, 'Digital');

-- --------------------------------------------------------

--
-- Table structure for table `gap`
--

DROP TABLE IF EXISTS `gap`;
CREATE TABLE IF NOT EXISTS `gap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bobot` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pengalaman` double DEFAULT NULL,
  `prestasi` double DEFAULT NULL,
  `kemampuan` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_bobot` (`id_bobot`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gap`
--

INSERT INTO `gap` (`id`, `id_bobot`, `id_user`, `pengalaman`, `prestasi`, `kemampuan`) VALUES
(4, 7, 6, -1, 1, -1),
(5, 8, 8, -1, 1, -2),
(9, 9, 7, -3, 0, -3),
(10, 10, 12, -1, 0, -3);

-- --------------------------------------------------------

--
-- Table structure for table `hrd`
--

DROP TABLE IF EXISTS `hrd`;
CREATE TABLE IF NOT EXISTS `hrd` (
  `id_hrd` int(11) NOT NULL AUTO_INCREMENT,
  `nama_hrd` varchar(128) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tmp_lahir` varchar(128) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_tlpn` int(50) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  PRIMARY KEY (`id_hrd`),
  KEY `id_jabatan` (`id_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE IF NOT EXISTS `jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(128) NOT NULL,
  `tingkat` int(3) NOT NULL,
  `jobdesc` varchar(128) NOT NULL,
  `id_level` int(11) NOT NULL,
  PRIMARY KEY (`id_jabatan`),
  KEY `id_level` (`id_level`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `tingkat`, `jobdesc`, `id_level`) VALUES
(1, 'Bussines Analystyyy', 4, 'Mendefinisikan kebutuhan user', 2),
(2, 'Bussines Analyst', 3, 'Mendefinisikan kebutuhan user', 4),
(4, 'Leader MLM', 4, 'Prospek terossss', 4),
(5, 'Manajer Retail Solution', 5, 'Jualan Produk', 4);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

DROP TABLE IF EXISTS `kriteria`;
CREATE TABLE IF NOT EXISTS `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `atribut` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

DROP TABLE IF EXISTS `level`;
CREATE TABLE IF NOT EXISTS `level` (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `level` enum('Manajer','HRD','Pegawai','Admin Finance','Admin Pentacode','Admin Marketing','Admin Digital','Super') NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
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
-- Table structure for table `manajer`
--

DROP TABLE IF EXISTS `manajer`;
CREATE TABLE IF NOT EXISTS `manajer` (
  `id_manajer` int(11) NOT NULL AUTO_INCREMENT,
  `nama_manajer` varchar(128) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tmp_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_tlpn` int(50) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  PRIMARY KEY (`id_manajer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_bobot`
--

DROP TABLE IF EXISTS `nilai_bobot`;
CREATE TABLE IF NOT EXISTS `nilai_bobot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `pengalaman` double DEFAULT NULL,
  `prestasi` double DEFAULT NULL,
  `kemampuan` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_bobot`
--

INSERT INTO `nilai_bobot` (`id`, `id_user`, `pengalaman`, `prestasi`, `kemampuan`) VALUES
(19, 6, 4, 4.5, 4),
(23, 8, 4, 4.5, 3),
(25, 12, 4, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `normalisasi`
--

DROP TABLE IF EXISTS `normalisasi`;
CREATE TABLE IF NOT EXISTS `normalisasi` (
  `id_norm` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `prestasi` double DEFAULT NULL,
  `kemampuan` double DEFAULT NULL,
  `pengalaman_kerja` double DEFAULT NULL,
  `pendidikan` double DEFAULT NULL,
  `level` double DEFAULT NULL,
  `proyek` double DEFAULT NULL,
  PRIMARY KEY (`id_norm`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `normalisasi`
--

INSERT INTO `normalisasi` (`id_norm`, `id_user`, `prestasi`, `kemampuan`, `pengalaman_kerja`, `pendidikan`, `level`, `proyek`) VALUES
(4, 8, 1, 0.66666666666667, 1, 1.5, 1, 1),
(5, 8, 1, 0.66666666666667, 1, 1.5, 1, 1),
(6, 6, 1, 1, 1, 1, 1, 1),
(7, 13, 0.5, 0.33333333333333, 0.25, 1, 1, 1),
(8, 12, 0.5, 0.33333333333333, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pegawai` varchar(128) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_tlp` varchar(30) NOT NULL,
  `id_jabatan` int(50) NOT NULL,
  PRIMARY KEY (`id_pegawai`),
  KEY `id_jabatan` (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `jenis_kelamin`, `tmp_lahir`, `tgl_lahir`, `alamat`, `email`, `no_tlp`, `id_jabatan`) VALUES
(1, 'Ihsan Ibrahim', 'Laki-laki', 'Karawang', '2022-05-30', 'hgfhfdhdf', 'inwananwar99@gmail.com', '97968980', 1),
(2, 'Denny Adam', 'Laki-laki', 'Lampung', '2000-09-12', 'Cilandak, Jaksel', 'denny@iconpln.co.id', '0789472892', 2),
(3, 'Dhika Pratara', 'Laki-laki', 'Mojokerto', '2022-07-12', 'Jaksel', 'dhikapratara@penta.id', '0875674563', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pembobotan`
--

DROP TABLE IF EXISTS `pembobotan`;
CREATE TABLE IF NOT EXISTS `pembobotan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `selisih` double NOT NULL,
  `bobot_nilai` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembobotan`
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
-- Table structure for table `pendidikan`
--

DROP TABLE IF EXISTS `pendidikan`;
CREATE TABLE IF NOT EXISTS `pendidikan` (
  `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `jenjang` varchar(20) NOT NULL,
  `gelar` varchar(20) NOT NULL,
  `bidang_studi` varchar(30) NOT NULL,
  `perguruan_tinggi` varchar(128) NOT NULL,
  `thn_lulus` int(30) NOT NULL,
  `lampiran` text NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pendidikan`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `user_id`, `jenjang`, `gelar`, `bidang_studi`, `perguruan_tinggi`, `thn_lulus`, `lampiran`, `status`) VALUES
(2, 6, 'Sarjana', 'Sarjana Terapan', 'Informatika', 'Politeknik Negeri Subang', 2021, '', 'Disetujui'),
(3, 8, 'Magister', 'Magister', 'Informatika', 'Politeknik Elektronika Negeri ', 2021, '', 'Disetujui'),
(4, 6, 'Diploma', 'Ahli Madya', 'Informatika', 'Politeknik Elektronika Negeri Surabaya', 2021, 'BERITA_ACARA_UAT_ICONPAYxMESTIKA_sign_dev.pdf', 'Disetujui'),
(5, 12, 'Sarjana', 'Sarjana Terapan', 'Informatika', 'Politeknik Negeri Subang', 2021, 'cv.pdf', 'Disetujui'),
(6, 13, 'Sarjana', 'Ahli Madya Komputer', 'Informatika', 'Politeknik Negeri Bandung', 2022, 'cv.pdf', 'Disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `portofolio`
--

DROP TABLE IF EXISTS `portofolio`;
CREATE TABLE IF NOT EXISTS `portofolio` (
  `id_portofolio` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id_portofolio`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portofolio`
--

INSERT INTO `portofolio` (`id_portofolio`, `id_user`, `deskripsi`) VALUES
(2, 6, 'Hai, namaku Denny Adam. Aku lulusan Politeknik Negeri Lampung Jurusan D3 Manajemen Informatika. Sekarang aku bekerja di PT. Indonesia Comnets Plus Kantor Mampang, Jakarta Selatan sebagai salah satu Leader Developer'),
(3, 8, 'JKDJFALK;FJLASDJFASDF');

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

DROP TABLE IF EXISTS `prestasi`;
CREATE TABLE IF NOT EXISTS `prestasi` (
  `id_prestasi` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `nama_prestasi` varchar(128) NOT NULL,
  `bidang` varchar(50) NOT NULL,
  `tahun` int(5) NOT NULL,
  `lampiran` text NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_prestasi`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prestasi`
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
(28, 12, 'Jawa Tengah', 'Teknologi Informasi', 2021, 'INVOICE4.pdf', 'Diajukan'),
(29, 13, 'Katalog A', 'Keagamaan', 2018, '98-Article_Text-182-1-10-2019032020.pdf', 'Diajukan'),
(30, 8, 'Maulid', 'Keagamaan', 2021, '98-Article_Text-182-1-10-2019032021.pdf', 'Diajukan');

-- --------------------------------------------------------

--
-- Table structure for table `promosi`
--

DROP TABLE IF EXISTS `promosi`;
CREATE TABLE IF NOT EXISTS `promosi` (
  `id_promosi` int(11) NOT NULL AUTO_INCREMENT,
  `id_manajer` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `tgl_bergabung` date NOT NULL,
  `surat_pengajuan` text NOT NULL,
  `jabatan_baru` text NOT NULL,
  PRIMARY KEY (`id_promosi`),
  KEY `id_manajer` (`id_manajer`,`id_user`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promosi`
--

INSERT INTO `promosi` (`id_promosi`, `id_manajer`, `id_user`, `jabatan`, `tgl_bergabung`, `surat_pengajuan`, `jabatan_baru`) VALUES
(2, 7, 13, 'Marketing', '0000-00-00', 'Surat_Pengajuan-13.png', 'Manajer Retail Solution'),
(3, 7, 12, 'Marketing', '0000-00-00', 'Surat_Pengajuan-14.png', 'Manajer Retail Solution'),
(5, 7, 8, 'Bussines Analyst', '2022-06-30', '98-Article_Text-182-1-10-20190320.pdf', 'Leader MLM'),
(6, 7, 6, 'Bussines Analyst', '2022-05-31', 'info.png', 'Leader MLM');

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

DROP TABLE IF EXISTS `proyek`;
CREATE TABLE IF NOT EXISTS `proyek` (
  `id_proyek` int(11) NOT NULL AUTO_INCREMENT,
  `nama_proyek` varchar(128) NOT NULL,
  `id_user1` int(11) DEFAULT NULL,
  `id_user2` int(11) DEFAULT NULL,
  `id_user3` int(11) DEFAULT NULL,
  `ket_proyek` text NOT NULL,
  `tgl_awal_proyek` date NOT NULL,
  `tgl_akhir_proyek` date NOT NULL,
  `status_proyek` varchar(128) NOT NULL,
  PRIMARY KEY (`id_proyek`),
  KEY `id_user` (`id_user1`),
  KEY `id_user2` (`id_user2`),
  KEY `id_user3` (`id_user3`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id_proyek`, `nama_proyek`, `id_user1`, `id_user2`, `id_user3`, `ket_proyek`, `tgl_awal_proyek`, `tgl_akhir_proyek`, `status_proyek`) VALUES
(2, 'Jawa Tengah', 6, 8, 12, 'On Programming untuk fitur Kelola Pengaduan Masyarakat', '2022-06-27', '2022-06-28', 'Finish'),
(5, 'LDK Uswatun Hasanah', NULL, NULL, NULL, 'fdffsfas', '2022-08-18', '2022-08-31', 'Coming Soon');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pekerjaan`
--

DROP TABLE IF EXISTS `riwayat_pekerjaan`;
CREATE TABLE IF NOT EXISTS `riwayat_pekerjaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `status` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_proyek` (`id_proyek`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_pekerjaan`
--

INSERT INTO `riwayat_pekerjaan` (`id`, `id_user`, `id_proyek`, `status`) VALUES
(1, 6, 1, 'selesai'),
(2, 8, 1, 'selesai'),
(3, 12, 1, 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `saw_alternatif`
--

DROP TABLE IF EXISTS `saw_alternatif`;
CREATE TABLE IF NOT EXISTS `saw_alternatif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `pendidikan` double DEFAULT NULL,
  `kemampuan` double DEFAULT NULL,
  `pengalaman_kerja` double DEFAULT NULL,
  `proyek` double DEFAULT NULL,
  `prestasi` double DEFAULT NULL,
  `level` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saw_alternatif`
--

INSERT INTO `saw_alternatif` (`id`, `id_user`, `pendidikan`, `kemampuan`, `pengalaman_kerja`, `proyek`, `prestasi`, `level`) VALUES
(34, 8, 3, 2, 4, 1, 2, 4),
(35, 8, 3, 2, 4, 1, 2, 4),
(36, 6, 2, 3, 4, 1, 2, 4),
(37, 8, 3, 2, 4, 1, 2, 4),
(38, 6, 2, 3, 4, 1, 2, 4),
(39, 9, 2, 1, 1, 1, 1, 4),
(40, 8, 3, 2, 4, 1, 2, 4),
(41, 13, 2, 1, 1, 1, 1, 4),
(42, 12, 2, 1, 4, 1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `saw_nilai_bobot`
--

DROP TABLE IF EXISTS `saw_nilai_bobot`;
CREATE TABLE IF NOT EXISTS `saw_nilai_bobot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_promosi` int(11) DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_promosi` (`id_promosi`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saw_nilai_bobot`
--

INSERT INTO `saw_nilai_bobot` (`id`, `id_user`, `id_promosi`, `nilai`) VALUES
(4, 8, 5, 99.166666666667),
(5, 8, 5, 99.166666666667),
(6, 6, 6, 100),
(7, 13, 2, 67.083333333333),
(8, 12, 3, 78.333333333333);

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat`
--

DROP TABLE IF EXISTS `sertifikat`;
CREATE TABLE IF NOT EXISTS `sertifikat` (
  `id_sert` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `jenis_sert` varchar(50) NOT NULL,
  `bidang_studi` varchar(50) NOT NULL,
  `thn_sert` int(5) NOT NULL,
  `lampiran` text NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_sert`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sertifikat`
--

INSERT INTO `sertifikat` (`id_sert`, `user_id`, `jenis_sert`, `bidang_studi`, `thn_sert`, `lampiran`, `status`) VALUES
(2, 6, 'Pauli', 'Informatikaaa', 2018, 'Advice+no+purchase+-+Gopay+1_1-Test-Report-14-6-2022+12-06-44-full6.pdf', 'Disetujui'),
(4, 8, 'Kremlin', 'HR Specialist', 2018, 'IC_AssessmentICPay_Versi_2_8.pdf', 'Disetujui'),
(5, 8, 'Kremlin', 'HR Specialist', 2021, '98-Article_Text-182-1-10-20190320.pdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_divisi` int(11) DEFAULT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `id_proyek1` int(11) DEFAULT NULL,
  `id_proyek2` int(11) DEFAULT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `foto` text NOT NULL,
  `id_level` int(11) NOT NULL,
  `status_aktif` int(2) NOT NULL,
  `tanggal_buat` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_level` (`id_level`),
  KEY `id_divisi` (`id_divisi`),
  KEY `id_jabatan` (`id_jabatan`),
  KEY `id_pegawai` (`id_pegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_divisi`, `id_jabatan`, `id_pegawai`, `id_proyek1`, `id_proyek2`, `name`, `email`, `password`, `foto`, `id_level`, `status_aktif`, `tanggal_buat`) VALUES
(6, 4, 2, 2, 2, 4, 'Denny Adam', 'denny@iconpln.co.id', 'dennyicon', 'Inwan14.png', 4, 1, '2022-05-31'),
(7, 2, 0, 2, NULL, NULL, 'Denny Adam', 'sugiarto@iconpln.co.id', 'sugiarto', 'wp2655834.jpg', 1, 1, '2022-06-19'),
(8, 2, 4, 3, 2, 4, 'Dhika Pratara', 'dhika@iconpln.co.id', 'pratara', 'wp2655834.jpg', 4, 1, '2022-06-30'),
(9, 4, 0, NULL, NULL, NULL, 'Ibnu', 'ibnu@iconpln.co.id', 'ibnuicon', 'default.jpg', 8, 1, '2022-07-03'),
(12, 4, 0, 2, 2, 4, 'Denny Adam', 'denny@pln.co.id', 'dennyicon', 'info1.png', 4, 1, '2022-07-03'),
(13, 3, 0, 3, NULL, NULL, 'Dhika Pratara', 'dhika@pln.co.id', 'dhikaicon', 'info2.png', 4, 1, '2022-07-05'),
(14, NULL, 0, NULL, NULL, NULL, 'Albar Hidayah', 'albarhidayah@mgs.co.id', 'albarhidayah', 'albar.jpg', 2, 1, '2022-07-15');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bobot`
--
ALTER TABLE `bobot`
  ADD CONSTRAINT `bobot_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `cf_sf`
--
ALTER TABLE `cf_sf`
  ADD CONSTRAINT `cf_sf_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `gap`
--
ALTER TABLE `gap`
  ADD CONSTRAINT `gap_ibfk_1` FOREIGN KEY (`id_bobot`) REFERENCES `bobot` (`id_bobot`),
  ADD CONSTRAINT `gap_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD CONSTRAINT `jabatan_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);

--
-- Constraints for table `nilai_bobot`
--
ALTER TABLE `nilai_bobot`
  ADD CONSTRAINT `nilai_bobot_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`);

--
-- Constraints for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD CONSTRAINT `pendidikan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `portofolio`
--
ALTER TABLE `portofolio`
  ADD CONSTRAINT `portofolio_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `prestasi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `promosi`
--
ALTER TABLE `promosi`
  ADD CONSTRAINT `promosi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `proyek`
--
ALTER TABLE `proyek`
  ADD CONSTRAINT `proyek_ibfk_1` FOREIGN KEY (`id_user1`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `proyek_ibfk_2` FOREIGN KEY (`id_user2`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `proyek_ibfk_3` FOREIGN KEY (`id_user3`) REFERENCES `users` (`id`);

--
-- Constraints for table `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  ADD CONSTRAINT `riwayat_pekerjaan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `saw_nilai_bobot`
--
ALTER TABLE `saw_nilai_bobot`
  ADD CONSTRAINT `saw_nilai_bobot_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD CONSTRAINT `sertifikat_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
