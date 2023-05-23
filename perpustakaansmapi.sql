-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 17 Bulan Mei 2023 pada 06.09
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaansmapi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_biaya_denda`
--

CREATE TABLE `tb_biaya_denda` (
  `id_biaya_denda` int(11) NOT NULL,
  `harga_denda` varchar(255) NOT NULL,
  `stat` varchar(255) NOT NULL,
  `tgl_tetap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_biaya_denda`
--

INSERT INTO `tb_biaya_denda` (`id_biaya_denda`, `harga_denda`, `stat`, `tgl_tetap`) VALUES
(10, '10000', 'Aktif', '2023-02-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `id_pengarang` int(11) NOT NULL,
  `sampul` varchar(255) DEFAULT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `id_penerbit` int(255) DEFAULT NULL,
  `sumber_buku` varchar(50) NOT NULL,
  `jenis_buku` varchar(50) NOT NULL,
  `thn_buku` varchar(255) DEFAULT NULL,
  `harga_buku` int(11) NOT NULL,
  `status_buku` varchar(255) NOT NULL,
  `tgl_masuk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `id_kategori`, `id_rak`, `id_pengarang`, `sampul`, `isbn`, `title`, `id_penerbit`, `sumber_buku`, `jenis_buku`, `thn_buku`, `harga_buku`, `status_buku`, `tgl_masuk`) VALUES
(24766, 94, 11, 15, '3eb69d5175537b402a97d9e623c1a0ba.jpg', '9789790158733', 'Bekerja Sebagai Desain Grafis', 20, 'BOS', 'NON FIKSI', '2008', 50000, 'tersedia', '2022-03-07 01:02:13'),
(24767, 94, 11, 15, '3eb69d5175537b402a97d9e623c1a0ba.jpg', '9789790158733', 'Bekerja Sebagai Desain Grafis', 20, 'BOS', 'NON FIKSI', '2008', 50000, 'tersedia', '2022-03-07 01:02:13'),
(24768, 94, 11, 15, '3eb69d5175537b402a97d9e623c1a0ba.jpg', '9789790158733', 'Bekerja Sebagai Desain Grafis', 20, 'BOS', 'NON FIKSI', '2008', 50000, 'tersedia', '2022-03-07 01:02:13'),
(24777, 74, 11, 21, 'e01adb11bb0aa5b0c0f073f1d6094920.jpg', '9786026744470', 'maaf tuhan aku hampir menyerah', 23, 'dropping', 'FIKSI', '2018', 55000, 'tersedia', '2022-03-07 10:58:54'),
(24784, 74, 12, 19, 'f0df31c962b51bea86e06b7378cfd24d.jpg', '9789790158528', 'islam buat yang pengen tahu', 21, 'BOS', 'NON FIKSI', '2007', 24000, 'tersedia', '2022-02-15 11:48:23'),
(24785, 74, 12, 19, 'f0df31c962b51bea86e06b7378cfd24d.jpg', '9789790158528', 'islam buat yang pengen tahu', 21, 'BOS', 'NON FIKSI', '2007', 24000, 'tersedia', '2022-02-15 11:48:23'),
(24786, 74, 14, 20, 'e331c4635330754990a791491242931f.jpg', '9789797816070', 'ulama pejuang dan ulama petualang', 21, 'BOS', 'NON FIKSI', '2006', 28000, 'tersedia', '2022-01-01 15:46:00'),
(24789, 45, 14, 22, '43863536823f52c5aedc2ccd1a008c02.jpg', '9786026847652', 'password menuju sukses', 20, 'BOS', 'REFRENSI', '2001', 57000, 'tersedia', '2022-01-01 15:49:40'),
(24790, 45, 14, 22, '43863536823f52c5aedc2ccd1a008c02.jpg', '9786026847652', 'password menuju sukses', 20, 'BOS', 'REFRENSI', '2001', 57000, 'tersedia', '2022-01-01 15:49:40'),
(24791, 45, 14, 22, '43863536823f52c5aedc2ccd1a008c02.jpg', '9786026847652', 'password menuju sukses', 20, 'BOS', 'REFRENSI', '2001', 57000, 'tersedia', '2022-01-01 15:49:40'),
(24792, 45, 14, 22, '43863536823f52c5aedc2ccd1a008c02.jpg', '9786026847652', 'password menuju sukses', 20, 'BOS', 'REFRENSI', '2001', 57000, 'tersedia', '2022-01-01 15:49:40'),
(24793, 26, 13, 25, '741ade2a5074a27baabeb19557a7b876.jpg', '9786022410232', 'Pahlawan dalam sejarah dunia', 21, 'BOS', 'REFRENSI', '2006', 225000, 'tersedia', '2022-01-03 15:59:18'),
(24797, 63, 14, 26, '102621dd4f8845e0a8429ca4ac1c8625.jpg', '9789790750548', 'Kamus Visual 4 Bahasa', 21, 'BOS', 'REFRENSI', '2009', 370000, 'tersedia', '2022-01-04 16:04:28'),
(24799, 63, 14, 26, '102621dd4f8845e0a8429ca4ac1c8625.jpg', '9789790750548', 'Kamus Visual 4 Bahasa', 21, 'BOS', 'REFRENSI', '2009', 370000, 'tersedia', '2022-01-04 16:04:28'),
(24800, 63, 14, 26, '102621dd4f8845e0a8429ca4ac1c8625.jpg', '9789790750548', 'Kamus Visual 4 Bahasa', 21, 'BOS', 'REFRENSI', '2009', 370000, 'tersedia', '2022-01-04 16:04:28'),
(24801, 63, 14, 26, '102621dd4f8845e0a8429ca4ac1c8625.jpg', '9789790750548', 'Kamus Visual 4 Bahasa', 21, 'BOS', 'REFRENSI', '2009', 370000, 'tersedia', '2022-01-04 16:04:28'),
(24802, 67, 11, 27, '1d0b64cf6793660eeb33ed163118d54b.jpg', '', 'Narkoba sayonara', 20, 'BOS', 'NON FIKSI', '2006', 60000, 'tersedia', '2022-01-04 16:06:58'),
(24803, 67, 11, 27, '1d0b64cf6793660eeb33ed163118d54b.jpg', '', 'Narkoba sayonara', 20, 'BOS', 'NON FIKSI', '2006', 60000, 'tersedia', '2022-01-04 16:06:58'),
(24804, 94, 12, 32, '1d6d4ea609e22c7bf628bc029bf43057.jpg', '9789797945862', 'Tapak Jejak', 24, 'hibah', 'FIKSI', '2019', 78000, 'tersedia', '2022-01-06 16:25:02'),
(24807, 94, 12, 32, 'f3b8c9ad5219c057681b2a011839b6d8.jpg', '9789797945619', 'Arah langkah', 24, 'hibah', 'FIKSI', '2018', 78000, 'tersedia', '2022-01-06 16:26:40'),
(24810, 94, 12, 32, 'f3b8c9ad5219c057681b2a011839b6d8.jpg', '9789797945619', 'Arah langkah', 24, 'hibah', 'FIKSI', '2018', 78000, 'Dipinjam', '2022-01-06 16:26:40'),
(24814, 94, 12, 32, 'd8f57ba2b4dbf324afb2213d61f3d1f0.jpg', '9789797945699', 'Sebelas Sebelas', 24, 'hibah', 'FIKSI', '2018', 78000, 'tersedia', '2023-01-04 21:53:38'),
(24816, 94, 12, 32, '24d05510f416c4a05b0ca66bc22f62cf.jpg', '9789797945350', 'Konspirasi alam semesta', 24, 'hibah', 'FIKSI', '2018', 78000, 'tersedia', '2023-01-04 21:52:59'),
(24817, 94, 12, 32, '61fb563c86c93d285ecea52276cd7fe5.jpg', '9789797945350', 'Konspirasi alam semesta', 24, 'BOS', 'FIKSI', '2018', 78000, 'Dipinjam', '2023-02-25 14:42:05'),
(24821, 93, 13, 34, '0', '9789797945699', 'assslamualikum', 24, 'hibah', 'NON FIKSI', '2019', 120, 'tersedia', '2023-02-25 14:57:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_denda`
--

CREATE TABLE `tb_denda` (
  `id_denda` int(11) NOT NULL,
  `pinjam_id` varchar(255) NOT NULL,
  `denda` int(11) NOT NULL,
  `lama_waktu` int(11) NOT NULL,
  `tgl_denda` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_denda`
--

INSERT INTO `tb_denda` (`id_denda`, `pinjam_id`, `denda`, `lama_waktu`, `tgl_denda`) VALUES
(6, 'PJ008', 0, 0, '2022-08-09'),
(7, 'PJ009', 0, 0, '2022-11-03'),
(8, 'PJ0010', 0, 0, '2022-11-04'),
(9, 'PJ0012', 0, 0, '2023-01-03'),
(10, 'PJ0014', 2000, 1, '2023-01-04'),
(11, 'PJ0015', 2000, 1, '2023-01-04'),
(12, 'PJ0016', 0, 0, '2023-01-04'),
(13, 'PJ0018', 0, 0, '2023-02-03'),
(14, 'PJ0017', 80000, 16, '2023-02-25'),
(15, 'PJ0023', 0, 0, '2023-02-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(10, 'biography'),
(11, 'novel'),
(12, 'self improvment'),
(13, 'pelajaran'),
(14, 'cek kategori'),
(17, '990 &ndash; Asal-Usul Wilayah Lain'),
(18, '980 &ndash; Asal-Usul Amerika Selatan'),
(19, '970 &ndash; Asal-Usul Amerika Utara'),
(21, '960 &ndash; Asal-Usul Afrika'),
(22, '950 &ndash; Asal-Usul Asia'),
(24, '940 &ndash; Asal&ndash;Usul Eropa'),
(25, '930 &ndash; Sejarah Dunia Lama'),
(26, '920 &ndash; Biografi dan Asal-Usul'),
(27, '910 &ndash; Geografi dan Perjalanan'),
(28, '900 &ndash; Sejarah'),
(29, '800 &ndash; Literatur, Sastra, Retorika dan Kritik'),
(30, '790 &ndash; Olahraga, Permainan dan Hiburan'),
(31, '780 &ndash; Musik'),
(32, '770 &ndash; Fotografi, Film, Video'),
(33, '760 &ndash; Percetakan'),
(34, '750 &ndash; Lukisan'),
(35, '740 &ndash; Seni Grafis dan Dekoratif'),
(36, '730 &ndash; Patung, Keramik dan Seni Metal'),
(37, '720 &ndash; Arsitektur'),
(38, '710 &ndash; Perencanaan dan Arsitektur Lanskap'),
(39, '700 &ndash; Kesenian dan rekreasi'),
(40, '690 &ndash; Konstruksi'),
(41, '680 &ndash; Manufaktur untuk Keperluan Khusus'),
(42, '670 &ndash; Manufaktur'),
(44, '660 &ndash; Teknik Kimia'),
(45, '650 &ndash; Manajemen dan Hubungan dengan Publik'),
(46, '640 &ndash; Managemen Rumah Tangga dan Keluarga'),
(47, '630 &ndash; Pertanian'),
(49, '620 &ndash; Teknik'),
(50, '610 &ndash; Kesehatan dan Obat-Obatan'),
(51, '600 &ndash; Teknologi'),
(52, '590 &ndash; Zoologi'),
(53, '580 &ndash; Tanaman'),
(54, '570 &ndash; Biologi'),
(55, '560 &ndash; Fosil dan kehidupan prasejarah'),
(56, '550 &ndash; Ilmu kebumian dan geologi'),
(57, '540 &ndash; Kimia'),
(58, '530 &ndash; Fisika'),
(59, '520 &ndash; Astronomi'),
(60, '510 &ndash; Matematika'),
(61, '500 &ndash; Sains'),
(63, '400 &ndash; Bahasa'),
(64, '390 &ndash; Norma, etika dan tradisi'),
(65, '380 &ndash; Perdagangan, komunikasi dan transportasi'),
(66, '370 &ndash; Pendidikan'),
(67, '360 &ndash; Masalah dan layanan sosial'),
(68, '350 &ndash; Administrasi publik dan ilmu kemiliteran'),
(69, '340 &ndash; Hukum'),
(70, '330 &ndash; Ekonomi'),
(71, '320 &ndash; Ilmu politik'),
(72, '310 &ndash; Statistik'),
(73, '300 &ndash; Ilmu sosial, sosiologi dan antropologi'),
(74, '200 &ndash; Agama'),
(75, '190 &ndash; Filosofi barat modern'),
(76, '180 &ndash; Filosofi kuno, zaman pertengahan, dan filosofi ketimuran'),
(77, '170 &ndash; Etik'),
(78, '160 &ndash; Filosofis Logis'),
(79, '150 &ndash; Psikologi'),
(80, '140 &ndash; Pemikiran Filosofis'),
(81, '130 &ndash; Parapsikologi dan Okultisme'),
(82, '120 &ndash; Epistimologi'),
(83, '110 &ndash; Metafisika'),
(84, '100 &ndash; Filsafat dan psikologi'),
(85, '090 &ndash; Manuskrip dan buku langka'),
(86, '080 &ndash; Kutipan'),
(87, '070 &ndash; Media massa, junalisme dan publikasi'),
(88, '060 &ndash; Asosiasi, Organisasi dan Museum'),
(89, '050 &ndash; Majalah dan Jurnal'),
(90, '040 &ndash; Tidak ada klasifikasi (sebelumnya untuk Biografi)'),
(91, '030 &ndash; Ensiklopedia dan buku yang memuat fakta-fakta'),
(92, '020 &ndash; Perpustakaan dan informasi'),
(93, '010 &ndash; Bibiliografi'),
(94, '000 &ndash; Publikasi Umum, informasi umum dan komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penerbit`
--

CREATE TABLE `tb_penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `nama_penerbit` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_penerbit`
--

INSERT INTO `tb_penerbit` (`id_penerbit`, `nama_penerbit`) VALUES
(14, 'QUALITY PRESS'),
(15, 'Indonesia Tera'),
(16, 'Dahara Prize'),
(17, 'BUKUNE'),
(18, 'PT. Gramedia Pustaka Utama'),
(19, 'Kepustakaan Populer Gramedia (KPG)'),
(20, 'Esensi'),
(21, 'Erlangga'),
(22, 'Mini Jara Abadi'),
(23, 'Sahima'),
(24, 'mediakita'),
(25, 'Noura Book Publising');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengarang`
--

CREATE TABLE `tb_pengarang` (
  `id_pengarang` int(11) NOT NULL,
  `nama_pengarang` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengarang`
--

INSERT INTO `tb_pengarang` (`id_pengarang`, `nama_pengarang`) VALUES
(12, 'Edgar Allan Poe'),
(13, 'Yuniasari'),
(14, 'Erma Yulihastin'),
(15, 'Ana Yuliastani'),
(16, 'Erma Yulihastin'),
(17, 'Lusiana Rumintang'),
(18, 'Rahman Ariaji'),
(19, 'Mulyadi Kartanegara'),
(20, 'A. Suryana Sudrajat'),
(21, 'Alfialghazi'),
(22, 'Irzam Hardiansyah '),
(23, 'rangga sitomorong'),
(24, 'Damoring tyas wulandari'),
(25, 'sebag simon'),
(26, 'Paramitha ayuning tyas'),
(27, 'Fanny Jonathan P'),
(28, 'Muhammad Suhaili'),
(29, 'Kartum Setiawa'),
(30, 'Benyamin Hadinata'),
(31, 'Aria Perbancana Hidayat'),
(32, 'Fiersa Besari'),
(34, 'Husein Jafar alhadar'),
(35, 'JS Khairen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pinjam`
--

CREATE TABLE `tb_pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `pinjam_id` varchar(255) NOT NULL,
  `id_login` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `lama_pinjam` int(11) NOT NULL,
  `tgl_balik` date NOT NULL,
  `tgl_kembali` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pinjam`
--

INSERT INTO `tb_pinjam` (`id_pinjam`, `pinjam_id`, `id_login`, `id_buku`, `status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali`) VALUES
(8, 'PJ008', 4, 24793, 'Di Kembalikan', '2022-08-09', 7, '2022-08-16', '2022-08-09'),
(9, 'PJ009', 3, 24814, 'Di Kembalikan', '2022-11-03', 7, '2022-11-10', '2022-11-03'),
(10, 'PJ0010', 3, 24817, 'Di Kembalikan', '2022-11-04', 7, '2022-11-11', '2022-11-04'),
(11, 'PJ0010', 3, 24810, 'Di Kembalikan', '2022-11-04', 7, '2022-11-11', '2022-11-04'),
(13, 'PJ0012', 4, 24807, 'Di Kembalikan', '2023-01-04', 5, '2023-01-09', '2023-01-04'),
(14, 'PJ0014', 3, 24814, 'Di Kembalikan', '2023-01-04', -1, '2023-01-03', '2023-01-04'),
(15, 'PJ0015', 4, 24814, 'Di Kembalikan', '2023-01-04', -1, '2023-01-03', '2023-01-04'),
(16, 'PJ0016', 5, 24816, 'Di Kembalikan', '2023-01-04', 7, '2023-01-11', '2023-01-04'),
(17, 'PJ0017', 4, 24816, 'Di Kembalikan', '2023-02-02', 7, '2023-02-09', '2023-02-25'),
(19, 'PJ0018', 3, 24802, 'Di Kembalikan', '2023-02-03', 7, '2023-02-10', '2023-02-03'),
(20, 'PJ0018', 3, 24810, 'Di Kembalikan', '2023-02-03', 7, '2023-02-10', '2023-02-03'),
(22, 'PJ0021', 3, 24810, 'Dipinjam', '2023-02-03', 7, '2023-02-10', '0000-00-00'),
(23, 'PJ0023', 4, 24821, 'Di Kembalikan', '2023-02-25', 10, '2023-03-07', '2023-02-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rak`
--

CREATE TABLE `tb_rak` (
  `id_rak` int(11) NOT NULL,
  `nama_rak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_rak`
--

INSERT INTO `tb_rak` (`id_rak`, `nama_rak`) VALUES
(11, 'Rak buku 1'),
(12, 'Rak buku 2'),
(13, 'Rak buku 3'),
(14, 'Rak buku 4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_login` int(11) NOT NULL,
  `id_anggota` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `nisnip` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenkel` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tgl_bergabung` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_login`, `id_anggota`, `user`, `pass`, `level`, `nisnip`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenkel`, `alamat`, `telepon`, `email`, `tgl_bergabung`, `foto`, `status`) VALUES
(1, 'AG-2022-01', 'Kepsek', '202cb962ac59075b964b07152d234b70', 'kepala perpus', '00000001', 'Kepala Sekolah', 'Tanjungpandan', '1965-12-12', 'Laki-Laki', 'Jalan Dr.Soesilo\r\n', '081949337419', 'Kepsek123@gmail.com', '2022-10-12', 'user_1672844736.png', 'bebaspinjam'),
(2, 'AG-2022-02', 'admin', '4fd8ed3f6d0d460e38fde11a12f45240', 'Petugas', '5190411067', 'Admin', 'Tanjungpandan', '2022-04-06', 'Laki-Laki', 'Jalan Dr.Soesilo\r\n', '23213123', 'admin@mail', '2022-10-12', 'user_1652378240.png', 'bebaspinjam'),
(3, 'AG-2022-3', 'anggota', '202cb962ac59075b964b07152d234b70', 'Anggota', '123123', 'anggota', 'Sungai Liat', '2022-05-18', 'Laki-Laki', 'alamat anggota', '3423423423423', 'anggota@mail', '2022-10-13', 'user_1652412183.png', 'pinjambuku'),
(4, 'AG-2022-4', 'dani', '202cb962ac59075b964b07152d234b70', 'Anggota', '4567', 'dani', 'Membalong', '2022-04-20', 'Laki-Laki', 'Mentigi', '087654322', 'dani@mail', '2022-11-14', 'user_1652484452.jpg', 'bebaspinjam'),
(5, 'AG-2022-5', 'sahal', 'e517abcdbf397a6311d7a9ba18b0ddb5', 'Anggota', '5654', 'sahal', 'Tanjungpandan', '2022-08-02', 'Laki-Laki', 'Selat Nasik', '08193414134', 'sahal@mail', '2022-12-03', 'user_1659508364.png', 'bebaspinjam'),
(2147483647, 'AG-2023-6', 'gege', '202cb962ac59075b964b07152d234b70', 'Anggota', '5190411067', 'Gery Genaldy', 'Tanjungpandan', '2000-12-22', 'Laki-Laki', 'Gegeg', '081949337419', 'GW2ZMP@sewa365.com', '2023-02-27', 'user_1677473306', 'bebaspinjam');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_biaya_denda`
--
ALTER TABLE `tb_biaya_denda`
  ADD PRIMARY KEY (`id_biaya_denda`);

--
-- Indeks untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori` (`id_kategori`,`id_rak`),
  ADD KEY `id_rak` (`id_rak`),
  ADD KEY `id_pengarang` (`id_pengarang`) USING BTREE,
  ADD KEY `id_penerbit` (`id_penerbit`) USING BTREE;

--
-- Indeks untuk tabel `tb_denda`
--
ALTER TABLE `tb_denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indeks untuk tabel `tb_pengarang`
--
ALTER TABLE `tb_pengarang`
  ADD PRIMARY KEY (`id_pengarang`);

--
-- Indeks untuk tabel `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_login` (`id_login`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `pinjam_id` (`pinjam_id`(191));

--
-- Indeks untuk tabel `tb_rak`
--
ALTER TABLE `tb_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_login`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_biaya_denda`
--
ALTER TABLE `tb_biaya_denda`
  MODIFY `id_biaya_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24822;

--
-- AUTO_INCREMENT untuk tabel `tb_denda`
--
ALTER TABLE `tb_denda`
  MODIFY `id_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT untuk tabel `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tb_pengarang`
--
ALTER TABLE `tb_pengarang`
  MODIFY `id_pengarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tb_rak`
--
ALTER TABLE `tb_rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD CONSTRAINT `tb_buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_buku_ibfk_2` FOREIGN KEY (`id_rak`) REFERENCES `tb_rak` (`id_rak`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_buku_ibfk_3` FOREIGN KEY (`id_penerbit`) REFERENCES `tb_penerbit` (`id_penerbit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_buku_ibfk_4` FOREIGN KEY (`id_pengarang`) REFERENCES `tb_pengarang` (`id_pengarang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD CONSTRAINT `tb_pinjam_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `tb_user` (`id_login`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pinjam_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
