-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Apr 2021 pada 14.06
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_buku`
--

CREATE TABLE `file_buku` (
  `id_file` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `judul_file` varchar(255) NOT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `file_buku`
--

INSERT INTO `file_buku` (`id_file`, `id_user`, `id_buku`, `judul_file`, `nama_file`, `tanggal`) VALUES
(9, 35, 15, 'Buku Paket 1', 'Kelas_10_SMA_Bahasa_Indonesia_Siswa_2016.pdf', '2021-01-15 15:56:28'),
(11, 35, 13, 'Buku 1', 'mogabundadisayangallah-tereliye.pdf', '2021-02-21 12:09:51'),
(12, 35, 17, 'Modul 6', 'MTK_Paket_A_Asyiknya_Bercocok_Tanam_Modul_4_sip_for_ISBN.pdf', '2021-02-21 14:59:37'),
(13, 35, 18, 'Modul 6', 'A_IPS_M6_Kelas_V_Wajah_Indonesiaku-sip.pdf', '2021-02-22 02:10:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `id_anggota` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `no_anggota` varchar(16) NOT NULL,
  `nama_anggota` varchar(255) NOT NULL,
  `kelas` varchar(16) NOT NULL,
  `tempat_lahir` varchar(32) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jekel` enum('Laki-laki','Perempuan','','') NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telepon` varchar(32) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status_anggota` enum('Active','Non Active','','') NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status_aktif` char(5) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`id_anggota`, `id_user`, `id_siswa`, `no_anggota`, `nama_anggota`, `kelas`, `tempat_lahir`, `tanggal_lahir`, `jekel`, `alamat`, `telepon`, `foto`, `password`, `status_anggota`, `keterangan`, `status_aktif`, `tanggal`) VALUES
(18, 35, 0, '2020.0001', 'Muhammad Risqiyadi', 'XI MIPA', 'Pekalongan', '2001-01-15', 'Perempuan', '', '082140965830', 'avatar5.png', 'd41d8cd98f00b204e9800998ecf8427e', 'Active', '', '1', '2021-03-01 09:54:29'),
(19, 35, 0, '2020.0002', 'Irzam Hasani', 'XI MIPA', 'Pekalongan', '2002-01-14', 'Laki-laki', 'pekalongan', '081267845326', 'avatar1.png', '81dc9bdb52d04dc20036dbd8313ed055', 'Active', '', '1', '2021-02-21 22:15:00'),
(20, 35, 0, '2020.0003', 'Nur Farissa', 'XI MIPA', 'Pekalongan', '2002-11-17', 'Perempuan', 'Talun', '085834738990', 'avatar21.png', '21232f297a57a5a743894a0e4a801fc3', 'Active', '', '1', '2021-01-15 15:08:11'),
(21, 35, 0, '2020.0004', 'M. Guntoro Jaya Rizky', 'X IPS', 'Talun', '2001-04-20', 'Laki-laki', 'Talun', '083845216754', 'avatar04.png', '21232f297a57a5a743894a0e4a801fc3', 'Active', '', '1', '2021-01-15 15:10:31'),
(22, 35, 0, '2020.0005', 'Sonia Mekar Fahreza', 'X IPS', 'Doro', '2002-07-14', 'Laki-laki', 'Doro', '085842165830', 'avatar31.png', 'd41d8cd98f00b204e9800998ecf8427e', 'Active', '', '1', '2021-02-06 04:53:19'),
(25, 35, 0, '2020.0006', 'Gilang', 'X IPS', 'Pekalongan', '2021-02-17', 'Laki-laki', '', '083845216754', 'images_(2).png', 'd41d8cd98f00b204e9800998ecf8427e', 'Active', '', '1', '2021-03-01 09:15:33'),
(26, 35, 0, '2020.0007', 'Muhammad Risqiyadi', 'XI IPA 2', 'Pemalang', '2021-03-16', 'Laki-laki', '', '1234567', '6712679.jpg', '21232f297a57a5a743894a0e4a801fc3', 'Active', 'siswa Aktif', '1', '2021-03-03 12:48:45'),
(30, 35, 0, '2020.0008', 'Salsabilla Mireza ', 'XII IPA 1', 'Semarang', '2021-03-02', '', 'semarang', '09283324724', '', '21232f297a57a5a743894a0e4a801fc3', 'Active', 'siswa Aktif', '1', '2021-03-03 03:46:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bahasa`
--

CREATE TABLE `tbl_bahasa` (
  `id_bahasa` int(11) NOT NULL,
  `kode_bahasa` varchar(20) NOT NULL,
  `nama_bahasa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_bahasa`
--

INSERT INTO `tbl_bahasa` (`id_bahasa`, `kode_bahasa`, `nama_bahasa`) VALUES
(1, 'IDN', 'Bahasa Indonesia'),
(2, 'ENG', 'Bahasa Inggris');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id_buku` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_bahasa` int(11) NOT NULL,
  `id_penerbit` int(11) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `kode_buku` varchar(32) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `isbn` varchar(32) DEFAULT NULL,
  `harga` varchar(32) DEFAULT NULL,
  `letak_buku` varchar(10) NOT NULL,
  `cover_buku` varchar(255) DEFAULT NULL,
  `stok_buku` int(11) DEFAULT NULL,
  `status_buku` enum('Tersedia','Tidak Tersedia','Hilang') NOT NULL,
  `ringkasan` text DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status_a` char(5) NOT NULL,
  `tanggal_entri` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_buku`
--

INSERT INTO `tbl_buku` (`id_buku`, `id_user`, `id_kategori`, `id_bahasa`, `id_penerbit`, `judul_buku`, `kode_buku`, `pengarang`, `tahun_terbit`, `isbn`, `harga`, `letak_buku`, `cover_buku`, `stok_buku`, `status_buku`, `ringkasan`, `keterangan`, `status_a`, `tanggal_entri`, `tanggal_update`) VALUES
(13, 35, 15, 1, 2, 'Moga Bunda Disayang Allah', 'A10', 'Tere Liye', 2006, '1111111111', '25000', 'B7', 'novel.png', 3, 'Tersedia', '', '', '1', '2021-01-15 16:50:11', '2021-03-04 04:01:39'),
(14, 35, 12, 1, 0, 'Biologi Untuk Kelas X', 'A11', 'Suaha Bachtiar', 2011, '22222222222', '10000', 'C7', 'Biologi.png', 7, 'Tersedia', '', '', '1', '2021-01-15 16:52:01', '2021-03-04 03:58:27'),
(15, 35, 11, 1, 0, 'Bahasa Indonesia Kelas X', 'A13', 'Kemendikbud ', 2011, '333333333333', '10000', 'C7', 'Bahasa_Indonesia.png', 5, 'Tersedia', '', '', '1', '2021-01-15 16:55:28', '2021-03-04 03:54:57'),
(16, 35, 15, 1, 0, 'Laskar pelangi : original story', 'A14', 'Andrea Hirata ; penyunting, Dhewiberta dan Nurani Nura', 2006, '978-602-291-662-8', '25000', 'B7', 'not-available__560_690.png', 5, 'Tersedia', '', '', '1', '2021-01-15 16:59:06', '2021-03-04 03:56:45'),
(17, 35, 12, 1, 0, 'Matematika 6', 'A15', 'Kemendikbud ', 2017, '121212121212112', '100000', 'F 12', 'mtk.png', -1, 'Tersedia', '', '', '1', '2021-02-21 15:58:27', '2021-03-04 04:02:41'),
(18, 35, 7, 1, 1, 'IPS ', 'A20-500', 'Kemendikbud ', 2017, '978-602-291-662-5', '25000', 'C7', '67126710.jpg', 10, 'Tersedia', '', 'Di ghibahkan dari kemendikbud', '1', '2021-02-22 03:09:30', '2021-03-03 12:52:30'),
(30, 35, 10, 1, 2, 'Habluminanas', 'A1312', 'Habib', 2006, '1234543534323232', '25000', 'C7', '6712678.jpg', 7, 'Tersedia', '', '', '1', '2021-03-02 16:44:03', '2021-03-04 03:15:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kode_kategori` varchar(11) NOT NULL,
  `nama_kategori` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `kode_kategori`, `nama_kategori`) VALUES
(7, '000', 'Publikasi Umum, informasi umum dan komputer'),
(8, '100', 'Filsafat & Psikologi'),
(9, '200', 'Agama'),
(10, '300', 'Ilmu Sosial'),
(11, '400', 'Bahasa'),
(12, '500', 'Sains dan Matematika'),
(13, '600', 'Teknologi'),
(14, '700', 'Komik'),
(15, '800', 'Sastra'),
(16, '900', 'Sejarah dan Geografi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_stok` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_peminjaman` varchar(20) NOT NULL,
  `tanggal_pinjam` date NOT NULL DEFAULT current_timestamp(),
  `tanggal_kembali` date NOT NULL,
  `status_kembali` enum('Dipinjam','Diperpanjang','Dikembalikan','Hilang') NOT NULL,
  `keterangan` text NOT NULL,
  `jml_pinjam` int(11) NOT NULL DEFAULT 1,
  `status` char(5) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_peminjaman`
--

INSERT INTO `tbl_peminjaman` (`id_peminjaman`, `id_buku`, `id_stok`, `id_anggota`, `id_user`, `no_peminjaman`, `tanggal_pinjam`, `tanggal_kembali`, `status_kembali`, `keterangan`, `jml_pinjam`, `status`, `tanggal`) VALUES
(110, 15, 0, 18, 35, 'PNJ2020.0001', '2021-01-15', '2021-01-22', 'Dikembalikan', 'Pinjam Buku', 1, '0', '2021-01-15 17:22:37'),
(111, 13, 0, 18, 35, 'PNJ2020.0002', '2021-01-15', '2021-01-22', 'Dikembalikan', '', 1, '1', '2021-02-03 13:12:21'),
(112, 14, 0, 19, 35, 'PNJ2020.0003', '2021-01-15', '2021-01-22', 'Dikembalikan', '', 1, '1', '2021-01-15 16:49:21'),
(113, 16, 0, 19, 35, 'PNJ2020.0004', '2021-01-15', '2021-01-22', 'Dipinjam', '', 1, '1', '2021-01-15 16:41:01'),
(114, 16, 0, 21, 35, 'PNJ2020.0005', '2021-01-15', '2021-01-22', 'Dikembalikan', '', 1, '1', '2021-01-15 16:49:30'),
(115, 13, 0, 21, 35, 'PNJ2020.0006', '2021-01-15', '2021-01-22', 'Dikembalikan', '', 1, '1', '2021-01-15 16:49:44'),
(116, 15, 0, 21, 35, 'PNJ2020.0007', '2021-01-15', '2021-01-22', 'Dipinjam', '', 1, '1', '2021-01-15 16:41:30'),
(117, 15, 0, 20, 35, 'PNJ2020.0008', '2021-01-20', '2021-01-27', 'Dikembalikan', '', 1, '1', '2021-01-20 00:24:57'),
(118, 14, 0, 20, 35, 'PNJ2020.0009', '2021-01-20', '2021-01-27', 'Dikembalikan', '', 1, '1', '2021-02-07 14:09:27'),
(119, 15, 0, 20, 35, 'PNJ2020.0010', '2021-01-20', '2021-01-27', 'Dipinjam', '', 1, '1', '2021-01-20 00:23:37'),
(120, 15, 0, 18, 35, 'PNJ2020.0011', '2021-02-06', '2021-02-13', 'Dipinjam', '', 1, '1', '2021-02-06 05:07:05'),
(121, 14, 0, 22, 35, 'PNJ2020.0012', '2021-02-07', '2021-02-14', 'Dipinjam', '', 1, '1', '2021-02-07 14:11:07'),
(122, 13, 0, 22, 35, 'PNJ2020.0013', '2021-02-11', '2021-02-18', 'Hilang', '', 1, '1', '2021-02-11 11:55:15'),
(123, 16, 0, 19, 35, 'PNJ2020.0014', '2021-02-13', '2021-02-20', 'Dikembalikan', '', 1, '1', '2021-02-13 09:34:03'),
(124, 16, 0, 19, 35, 'PNJ2020.0015', '2021-02-13', '2021-02-20', 'Dikembalikan', '', 1, '1', '2021-02-13 09:32:59'),
(127, 16, 0, 18, 35, 'PNJ2020.0016', '2021-02-13', '2021-02-20', 'Dipinjam', '', 1, '1', '2021-02-13 16:02:15'),
(128, 14, 0, 18, 35, 'PNJ2020.0017', '2021-02-13', '2021-02-20', 'Dipinjam', '', 1, '1', '2021-02-13 16:02:47'),
(129, 15, 0, 22, 35, 'PNJ2020.0018', '2021-02-21', '2021-02-28', 'Dipinjam', '', 1, '1', '2021-02-21 11:54:04'),
(130, 16, 0, 22, 35, 'PNJ2020.0019', '2021-02-21', '2021-02-28', 'Dipinjam', '', 1, '1', '2021-02-21 11:57:14'),
(140, 14, 0, 21, 35, 'PNJ2020.0020', '2021-02-21', '2021-02-28', 'Dipinjam', '', 1, '1', '2021-02-21 15:27:00'),
(141, 13, 0, 25, 35, 'PNJ2020.0021', '2021-02-22', '2021-03-01', 'Dikembalikan', '', 1, '1', '2021-02-22 02:27:34'),
(142, 15, 0, 25, 35, 'PNJ2020.0022', '2021-02-22', '2021-03-01', 'Dikembalikan', '', 1, '1', '2021-03-03 12:15:55'),
(149, 30, 0, 30, 35, 'PNJ2020.0029', '2021-03-03', '2021-03-10', 'Dipinjam', '', 1, '1', '2021-03-03 12:53:04'),
(160, 13, 0, 30, 35, 'PNJ2020.0034', '2021-03-04', '2021-03-11', 'Dipinjam', '', 1, '1', '2021-03-04 04:01:39'),
(161, 17, 0, 30, 35, 'PNJ2020.0035', '2021-03-04', '2021-03-11', 'Dipinjam', '', 1, '1', '2021-03-04 04:02:41');

--
-- Trigger `tbl_peminjaman`
--
DELIMITER $$
CREATE TRIGGER `peminjaman` AFTER INSERT ON `tbl_peminjaman` FOR EACH ROW BEGIN 

INSERT INTO tbl_buku SET id_buku = NEW.id_buku,
stok_buku = NEW.jml_pinjam
ON DUPLICATE KEY UPDATE stok_buku = stok_buku - NEW.jml_pinjam;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penerbit`
--

CREATE TABLE `tbl_penerbit` (
  `id_penerbit` int(10) NOT NULL,
  `kode_penerbit` varchar(10) NOT NULL,
  `nama_penerbit` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_penerbit`
--

INSERT INTO `tbl_penerbit` (`id_penerbit`, `kode_penerbit`, `nama_penerbit`) VALUES
(1, '10', 'Kemendikbud'),
(2, '20', 'Kemenkes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengembalian`
--

CREATE TABLE `tbl_pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_stok` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `no_pengembalian` varchar(20) NOT NULL,
  `tgl_dikembalikan` date NOT NULL,
  `denda` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `jml_kembali` int(11) NOT NULL DEFAULT 1,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pengembalian`
--

INSERT INTO `tbl_pengembalian` (`id_pengembalian`, `id_user`, `id_buku`, `id_stok`, `id_peminjaman`, `id_anggota`, `no_pengembalian`, `tgl_dikembalikan`, `denda`, `keterangan`, `jml_kembali`, `tanggal`) VALUES
(64, 35, 15, 0, 110, 18, 'PMB2020.0001', '2021-01-15', 0, 'TEPAT WAKTU', 1, '2021-01-15 16:49:12'),
(65, 35, 14, 0, 112, 19, 'PMB2020.0002', '2021-01-15', 0, 'TEPAT WAKTU', 1, '2021-01-15 16:49:21'),
(66, 35, 16, 0, 114, 21, 'PMB2020.0003', '2021-01-15', 0, 'TEPAT WAKTU', 1, '2021-01-15 16:49:30'),
(67, 35, 13, 0, 115, 21, 'PMB2020.0004', '2021-01-15', 0, 'TEPAT WAKTU', 1, '2021-01-15 16:49:44'),
(68, 35, 15, 0, 117, 20, 'PMB2020.0005', '2021-01-20', 0, 'TEPAT WAKTU', 1, '2021-01-20 00:24:57'),
(69, 35, 13, 0, 111, 18, 'PMB2020.0006', '2021-02-03', 1200, 'TERLAMBAT 12 HARI', 1, '2021-02-03 13:12:20'),
(70, 35, 14, 0, 118, 20, 'PMB2020.0007', '2021-02-07', 1100, 'TERLAMBAT 11 HARI', 1, '2021-02-07 14:09:27'),
(73, 35, 13, 0, 141, 25, 'PMB2020.0008', '2021-02-22', 0, 'TEPAT WAKTU', 1, '2021-02-22 02:27:34'),
(74, 35, 15, 0, 142, 25, 'PMB2020.0009', '2021-03-03', 200, 'TERLAMBAT 2 HARI', 1, '2021-03-03 12:15:54');

--
-- Trigger `tbl_pengembalian`
--
DELIMITER $$
CREATE TRIGGER `pengembalian` AFTER INSERT ON `tbl_pengembalian` FOR EACH ROW BEGIN 

INSERT INTO tbl_buku SET id_buku = NEW.id_buku,
stok_buku = NEW.jml_kembali
ON DUPLICATE KEY UPDATE stok_buku = stok_buku + NEW.jml_kembali;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengunjung`
--

CREATE TABLE `tbl_pengunjung` (
  `id_pengunjung` int(11) NOT NULL,
  `nama_pengunjung` varchar(255) NOT NULL,
  `kelas` varchar(32) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pengunjung`
--

INSERT INTO `tbl_pengunjung` (`id_pengunjung`, `nama_pengunjung`, `kelas`, `keterangan`, `tanggal`) VALUES
(13, 'Kartoyono', 'XII IPA 1', 'Pinjam Buku', '2021-01-16 12:28:13'),
(17, 'Muhammad Risqiyadi', 'X IPS', 'Membaca Buku', '2021-01-17 13:57:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nis` varchar(32) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(32) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kelas` varchar(16) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telepon` varchar(32) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `jekel` enum('Laki-laki','Perempuan') NOT NULL,
  `status_siswa` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `id_user`, `nis`, `nama`, `tempat_lahir`, `tanggal_lahir`, `kelas`, `alamat`, `no_telepon`, `foto`, `jekel`, `status_siswa`) VALUES
(2021, 35, '2021.0001', 'Salsabilla Mireza ', 'Semarang', '2021-03-02', 'XII IPA 1', 'semarang', '09283324724', '6712677.jpg', 'Perempuan', 'Aktif'),
(2022, 35, '2021.0002', 'Muhammad Risqiyadi', 'Pemalang', '2021-03-16', 'XI IPA 2', 'Pekalongan', '1234567', 'Y_89851.jpg', 'Laki-laki', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_stok_buku`
--

CREATE TABLE `tbl_stok_buku` (
  `id_stok` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_penerbit` int(11) NOT NULL,
  `stok_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_stok_buku`
--

INSERT INTO `tbl_stok_buku` (`id_stok`, `id_buku`, `id_user`, `id_penerbit`, `stok_buku`) VALUES
(6, 30, 35, 2, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nip` varchar(32) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `foto` varchar(266) DEFAULT NULL,
  `hak_akses` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nip`, `nama`, `username`, `password`, `foto`, `hak_akses`, `tanggal`) VALUES
(33, '17.240.0135', 'Muhammad Risqiyadi', 'administrator', '21232f297a57a5a743894a0e4a801fc3', 'avatar.png', 1, '2021-01-15 14:38:04'),
(35, '17.240.0113', ' Ariani', 'operator1', '21232f297a57a5a743894a0e4a801fc3', 'avatar3.png', 2, '2021-01-19 23:56:13'),
(36, '17.240.0169', 'Salsabilla Mireza ', 'operator2', '21232f297a57a5a743894a0e4a801fc3', 'avatar2.png', 2, '2021-01-15 14:41:21');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `file_buku`
--
ALTER TABLE `file_buku`
  ADD PRIMARY KEY (`id_file`);

--
-- Indeks untuk tabel `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD UNIQUE KEY `no_anggota` (`no_anggota`);

--
-- Indeks untuk tabel `tbl_bahasa`
--
ALTER TABLE `tbl_bahasa`
  ADD PRIMARY KEY (`id_bahasa`),
  ADD UNIQUE KEY `kode_bahasa` (`kode_bahasa`),
  ADD UNIQUE KEY `naama_bahasa` (`nama_bahasa`);

--
-- Indeks untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD UNIQUE KEY `kode_buku` (`kode_buku`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `nama_jenis` (`nama_kategori`),
  ADD UNIQUE KEY `nama_kategori` (`nama_kategori`);

--
-- Indeks untuk tabel `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD UNIQUE KEY `no_peminjaman` (`no_peminjaman`);

--
-- Indeks untuk tabel `tbl_penerbit`
--
ALTER TABLE `tbl_penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indeks untuk tabel `tbl_pengembalian`
--
ALTER TABLE `tbl_pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD UNIQUE KEY `no_pengembalian` (`no_pengembalian`);

--
-- Indeks untuk tabel `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tbl_stok_buku`
--
ALTER TABLE `tbl_stok_buku`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `file_buku`
--
ALTER TABLE `file_buku`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tbl_bahasa`
--
ALTER TABLE `tbl_bahasa`
  MODIFY `id_bahasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT untuk tabel `tbl_penerbit`
--
ALTER TABLE `tbl_penerbit`
  MODIFY `id_penerbit` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengembalian`
--
ALTER TABLE `tbl_pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  MODIFY `id_pengunjung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2023;

--
-- AUTO_INCREMENT untuk tabel `tbl_stok_buku`
--
ALTER TABLE `tbl_stok_buku`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
