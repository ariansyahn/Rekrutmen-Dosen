-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2018 at 11:54 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekrutmen`
--

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1524213066),
('m130524_201442_init', 1524213071);

-- --------------------------------------------------------

--
-- Table structure for table `t_akun`
--

CREATE TABLE `t_akun` (
  `id_akun` int(15) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_akun`
--

INSERT INTO `t_akun` (`id_akun`, `email`, `password`, `created_at`, `id_role`) VALUES
(11, 'adminsu@del.ac.id', '$2y$13$yMtgIwj/7zRY2L6R8Vu7B.kd9iwooS6ls4zwZiECUHznpf.s20cCG', '2018-05-24 11:23:49', 1),
(13, 'admins1si@del.ac.id', '$2y$13$5Z.DMsfZgrKfqy6PyIWhwuJVE9fYvNU.Q0wMItdIBr5ELwbsZD75y', '2018-05-24 11:41:31', 3),
(14, 'adminhrd@del.ac.id', '$2y$13$qqKHYmPn/Gq9rk1bPwGwEu351UptQQ4HA2zTrltRHbvbbYspBiVBq', '2018-05-25 15:52:44', 2),
(15, 'ariansyahn@gmail.com', '$2y$13$midy/0j4B4ZEMbfSdtgWjunSDM844/J0fESvBn9s7SnHTy3qaS/UO', '2018-05-28 01:40:52', 4),
(16, 'admins1ti@del.ac.id', '$2y$13$Cwf/zJbBKEykrxZbG3IRv.WBa4GoFQdAdNflHkkJOwhuaUIYer.bC', '2018-06-04 03:20:37', 3),
(17, 'admins1te@del.ac.id', '$2y$13$k9LWdWnplwsm/liANSwRV.jOYgCow/Ogvr1mfQTJQuFSq9jFDCiaa', '2018-06-04 03:20:55', 3),
(18, 'admins1mr@del.ac.id', '$2y$13$IlUhOVViEkDFQGuO2tJdB.2fUuUzbbmR2lauD28tRpPykzF6ooA1e', '2018-06-04 03:21:19', 3),
(19, 'admins1tb@del.ac.id', '$2y$13$kX3bODI.4WV62XUK6wHrYOMQP2Wzz8nxQ4WZgx9YXLWPkT/jkQbhC', '2018-06-04 03:21:50', 3),
(20, 'admind3ti@del.ac.id', '$2y$13$Gpirlin39Itp0oJ32DNZn.MPfwwl8SByjQ8PixSex5XSN3TvkTj6O', '2018-06-04 03:22:12', 3),
(21, 'admind3tk@del.ac.id', '$2y$13$x7R4dp2ByewITc8HzTWOZe9kCSz8gDH32xcSs1KlNrz8nU.5h0ivm', '2018-06-04 03:22:29', 3),
(22, 'admind4ti@del.ac.id', '$2y$13$nc4BNuEm75NCUPDnHJLcm.29uuG/G.lJvytvleFtkbj/kFrBJI5xO', '2018-06-04 03:22:48', 3),
(23, 'uptbahasa@del.ac.id', '$2y$13$zg.Msv4NcoT9x09XQJn3deHfYk1OfNN5gEWu8gPYTnRa6dqjmei4m', '2018-06-04 03:23:14', 3),
(24, 'uptsam@del.ac.id', '$2y$13$tmPLQsXzD3.j2R3JS8ErK.DG2kKT9mZSGiqpOTgOl.46HWTRrZObO', '2018-06-04 03:23:28', 3),
(25, 'fantasibarani@gmail.com', '$2y$13$mu2x731xVRb3qdhx/g/Cee2Z.dtYurz2G5VWpvreEoVHfRoyO0gNy', '2018-06-06 03:54:26', 4);

-- --------------------------------------------------------

--
-- Table structure for table `t_apply_lowongan`
--

CREATE TABLE `t_apply_lowongan` (
  `id_apply_lowongan` int(11) NOT NULL,
  `id_apply_lowongan_status` int(11) NOT NULL,
  `id_reqdosen` int(11) NOT NULL,
  `id_pelamar` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `ktp` varchar(100) NOT NULL,
  `cv` varchar(100) NOT NULL,
  `ijazah` varchar(100) NOT NULL,
  `kartu_keluarga` varchar(100) NOT NULL,
  `skck` varchar(100) NOT NULL,
  `transkrip_nilai` varchar(100) NOT NULL,
  `keterangan_pengalaman_kerja` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_apply_lowongan`
--

INSERT INTO `t_apply_lowongan` (`id_apply_lowongan`, `id_apply_lowongan_status`, `id_reqdosen`, `id_pelamar`, `foto`, `ktp`, `cv`, `ijazah`, `kartu_keluarga`, `skck`, `transkrip_nilai`, `keterangan_pengalaman_kerja`) VALUES
(8, 2, 11, 1, 'foto_11_1.png', 'ktp_11_1.pdf', 'cv_11_1.pdf', 'ijazah_11_1.pdf', 'kk_11_1.pdf', 'skck_11_1.pdf', 'transkripnilai_11_1.pdf', 'pengalamankerja_11_1.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `t_apply_lowongan_status`
--

CREATE TABLE `t_apply_lowongan_status` (
  `id_apply_lowongan_status` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_apply_lowongan_status`
--

INSERT INTO `t_apply_lowongan_status` (`id_apply_lowongan_status`, `status`) VALUES
(1, 'Sedang Diproses'),
(2, 'Diterima'),
(3, 'Ditolak'),
(4, 'Lulus Seleksi Berkas'),
(5, 'Menentukan Tanggal Microteaching'),
(6, 'Memasukkan Nilai Microteaching'),
(7, 'Lulus Tes Microteaching'),
(8, 'Menentukan Tanggal Psikotes'),
(9, 'Memasukkan Nilai Psikotes'),
(10, 'Lulus Psikotes'),
(11, 'Menentukan Tanggal Tes Kesehatan'),
(12, 'Memasukkan Nilai Tes Kesehatan'),
(13, 'Lulus Tes Kesehatan'),
(14, 'Menentukan Kelulusan Microteaching'),
(15, 'Menentukan Kelulusan Psikotes'),
(16, 'Menentukan Kelulusan Tes Kesehatan');

-- --------------------------------------------------------

--
-- Table structure for table `t_lowongan_status`
--

CREATE TABLE `t_lowongan_status` (
  `id_lowongan_status` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_lowongan_status`
--

INSERT INTO `t_lowongan_status` (`id_lowongan_status`, `status`) VALUES
(1, 'Open'),
(2, 'Closed'),
(3, 'Request');

-- --------------------------------------------------------

--
-- Table structure for table `t_matkul`
--

CREATE TABLE `t_matkul` (
  `id_matkul` int(11) NOT NULL,
  `kode_matkul` varchar(20) NOT NULL,
  `nama_matkul` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_matkul`
--

INSERT INTO `t_matkul` (`id_matkul`, `kode_matkul`, `nama_matkul`) VALUES
(3, 'BIS1201', 'Biologi Umum'),
(4, 'BIS1202', 'Praktikum Biologi Umum'),
(5, 'BIS2101', 'Mikrobiologi Umum'),
(6, 'BIS2102', 'Praktikum Mikrobiologi Umum'),
(7, 'BIS2201', 'Genetika dan Biologi Molekuler'),
(8, 'BIS2202', 'Praktikum Genetika dan Biologi Molekuler'),
(9, 'BIS3201', 'Fisiologi'),
(10, 'BIS3202', 'Mikrobiologi Industri'),
(11, 'BPS2201', 'Analisis Instrumental'),
(12, 'BPS2203', 'Analisis Pemodelan dan Komputasi Proses I'),
(13, 'BPS2204', 'Operasi Fisik Pendukung I'),
(14, 'BPS2205', 'Termodinamika Kimiawi'),
(15, 'BPS2281', 'Teknologi Proses dan Produk Hayati'),
(16, 'BPS3101', 'Fenomena Transpor'),
(17, 'BPS3102', 'Analisis, Pemodelan dan Komputasi proses II'),
(18, 'BPS3103', 'Proses Pemisahan'),
(19, 'BPS3104', 'Operasi Fisik Pendukung II'),
(20, 'BPS3105', 'Analisis Keekonomian Rekayasa Bioproses'),
(21, 'BPS3107', 'Konstruksi Sosial teknologi'),
(22, 'BPS3201', 'Kinetika dan Katalisa'),
(23, 'BPS3202', 'laboratorium Teknik Bioproses'),
(24, 'BPS3280', 'Analisis Dampak Lingkungan'),
(25, 'BPS4101', 'Pengendalian dan Instrumentasi Proses'),
(26, 'BPS4102', 'Praktikum Pengendalian dan Instrumentasi Proses'),
(27, 'BPS4103', 'Sintesa dan Perancangan Proses'),
(28, 'BPS4104', 'Utilitas dan Pengolahan Limbah'),
(29, 'BPS4105', 'Teknik Reaktor Bioproses'),
(30, 'BPS4107', 'Aplikasi dan Industri Teknik Bioproses (Pilihan)'),
(31, 'BPS4190', 'Proyek Akhir I (Penelitian)'),
(32, 'BPS4201', 'Perancangan Pabrik'),
(33, 'BPS4291', 'Proyek Akhir II (Penelitian)'),
(34, 'CE31101', 'Organisasi dan Arsitektur Komputer'),
(35, 'CE31102', 'Perancangan Antar Muka Pengguna'),
(36, 'CE31201', 'Sistem Operasi'),
(37, 'CE31202', 'Dasar Elektronika'),
(38, 'CE31203', 'Jaringan Komputer'),
(39, 'CE31290', 'Proyek Akhir Tahun I'),
(40, 'CE32101', 'Komunikasi Data'),
(41, 'CE32102', 'Antar Jaringan I'),
(42, 'CE32103', 'Manajemen Media Penyimpanan Enterprise'),
(43, 'CE32201', 'Pemrograman Sistem'),
(44, 'CE32202', 'Logika Digital'),
(45, 'CE32203', 'Perangkat Lunak Sistem Jaringan'),
(46, 'CE32204', 'Sistem Terdistribusi'),
(47, 'CE32205', 'Virtualisasi Komputer'),
(48, 'CE32290', 'Proyek Akhir Tahun II'),
(49, 'CE33101', 'Administrasi Jaringan'),
(50, 'CE33102', 'Antar Jaringan II'),
(51, 'CE33103', 'Sistem Tertanam'),
(52, 'CE33104', 'Penerapan Infrastruktur Cloud'),
(53, 'CE33190', 'Tugas Akhir I'),
(54, 'CE33201', 'Keamanan jaringan'),
(55, 'CE33291', 'Tugas akhir II'),
(56, 'ELS1201', 'Pengantar Analisis Rangkaian'),
(57, 'ELS1202', 'Pengantar Desain Rekayasa'),
(58, 'ELS2101', 'Rangkaian Elektrik'),
(59, 'ELS2102', 'Praktikum Rangkaian Elektrik'),
(60, 'ELS2104', 'Praktikum Sistem Digital'),
(61, 'ELS2180', 'Sistem Digital'),
(62, 'ELS2201', 'Elektromagnetik'),
(63, 'ELS2202', 'Elektronika'),
(64, 'ELS2203', 'Praktikum Elektronika'),
(65, 'ELS2204', 'Sistem dan Sinyal'),
(66, 'ELS3103', 'Pengolahan Sinyal Digital'),
(67, 'ELS3104', 'Praktikum Pengolahan Sinyal Digital'),
(68, 'ELS3105', 'Material Teknik Elektro'),
(69, 'ELS3106', 'Sistem Tenaga Elektrik'),
(70, 'ELS3201', 'Sistem Instrumentasi'),
(71, 'ELS3202', 'Sistem Mikroprosesor'),
(72, 'ELS3203', 'Praktikum Sistem Mikroprosesor'),
(73, 'ELS3204', 'Sistem Kendali'),
(74, 'ELS3205', 'Sistem Komunikasi'),
(75, 'ELS4001', 'Perancangan Sistem Tertanam'),
(76, 'ELS4002', 'Praktikum Perancangan Sistem Tertanam'),
(77, 'ELS4003', 'Sistem Kendali Digital'),
(78, 'ELS4004', 'Pengolahan Citra Digital'),
(79, 'ELS4005', 'Biomedics Engineering'),
(80, 'ELS4006', 'Mekatronika dan Robotika'),
(81, 'ELS4007', 'Sistem Kendali Multivariabel'),
(82, 'ELS4201', 'Etika Profesional'),
(83, 'FIS1101', 'Fisika Dasar'),
(84, 'IF31101', 'Pengantar Teknologi Informasi'),
(85, 'IF31102', 'Dasar Pemrograman'),
(86, 'IF31180', 'Pengemangan Situs web'),
(87, 'IF31201', 'Algoritma dan Struktur Data'),
(88, 'IF31202', 'Analisis Kebutuhan Perangkat Lunak'),
(89, 'IF31203', 'Pengembangan Situs Web II'),
(90, 'IF31204', 'Pengenalan Basis Data'),
(91, 'IF31280', 'Pemrograman berorientasi Objek'),
(92, 'IF31290', 'Proyek Akhir Tahun I'),
(93, 'IF32101', 'Perancangan Antarmuka Pengguna'),
(94, 'IF32102', 'Sistem Basis Data'),
(95, 'IF32103', 'Object-Oriented Software Development'),
(96, 'IF32180', 'Pengembangan aplikasi Berbasis Internet'),
(97, 'IF32181', 'Basis Data'),
(98, 'IF32201', 'Pemrograman Berorientasi Objek'),
(99, 'IF32202', 'Pengembangan Aplikasi Mobile'),
(100, 'IF32203', 'Pengembangan Aplikasi Terdistribusi'),
(101, 'IF32204', 'Pengujian Perangkat Lunak'),
(102, 'IF32290', 'Proyek Akhir Tahun II'),
(103, 'IF33101', 'Algoritma Lanjut'),
(104, 'IF33102', 'Keamanan Perangkat Lunak'),
(105, 'IF33103', 'Pengembangan Aplikasi Game'),
(106, 'IF33190', 'Tugas Akhir I'),
(107, 'IF33290', 'Kerja Praktek'),
(108, 'IF33921', 'Tugas Akhir II'),
(109, 'IF41103', 'Pengembangan Situs web I'),
(110, 'IF41104', 'Pengenalan Rekayasa Perangkat Lunak'),
(111, 'IF41202', 'Analisis Kebutuhan Perangkat Lunak'),
(112, 'IF41203', 'Pengembangan Situs Web II'),
(113, 'IF42101', 'Perancangan Antarmuka pengguna'),
(114, 'IF42103', 'Object-Oriented Software Development'),
(115, 'IF42202', 'Pengembangan Aplikasi Mobile'),
(116, 'IF42203', 'Pengembangan Aplikasi Terdistribusi'),
(117, 'IF42204', 'Pengujian Perangkat Lunak'),
(118, 'IF43102', 'Keamanan Perangkat Lunak'),
(119, 'IF43103', 'Metode Penelitian'),
(120, 'IF44101', 'Business Process Reengineering'),
(121, 'IF44102', 'Design Thinking'),
(122, 'IF44103', 'Kualitas Perangkat Lunak'),
(123, 'IF44104', 'Arsitektur dan Perancangan Perangkat Lunak'),
(124, 'IF44190', 'Magang Industri'),
(125, 'IF44206', 'Kecerdasan Buatan'),
(126, 'IF44207', 'Pembelajaran Mesin'),
(127, 'IF44290', 'Kapita Selekta'),
(128, 'IF44291', 'Kerja Praktek Industri'),
(129, 'IF44292', 'Studi Mandiri/Sertifikasi Profesional'),
(130, 'IFS1101', 'Pengantar Teknologi Informasi'),
(131, 'IFS1202', 'Dasar Rekayasa Perangkat Lunak'),
(132, 'IFS2101', 'Algoritma dan Struktur Data'),
(133, 'IFS2102', 'Logika Informatika'),
(134, 'IFS2103', 'Pengantar Pemrograman'),
(135, 'IFS2201', 'Interaksi Manusia dan Komputer'),
(136, 'IFS2202', 'Strategi Algoritma'),
(137, 'IFS2203', 'Pemrograman Berorientasi Objek'),
(138, 'IFS2280', 'Pemecahan Masalah dengan C'),
(139, 'IFS3102', 'Teori Bahasa Formal dan Automata'),
(140, 'IFS3201', 'Pengembangan Aplikasi pada Platform Khusus'),
(141, 'IFS3202', 'Manajemen Proyek Perangkat Lunak'),
(142, 'IFS3203', 'Grafika Komputer'),
(143, 'IFS4014', 'Pemodelan dan Simulasi'),
(144, 'IFS4020', 'Pembangunan Aplikasi Berbasis Service'),
(145, 'IFS4021', 'Rekayasa Perangkat Lunak Berbasis Komponen'),
(146, 'IFS4023', 'Pembangunan Aplikasi Berbasis Grafik 3D'),
(147, 'IFS4025', 'Pembelajaran Mesin'),
(148, 'IFS4026', 'Pengujian Perangkat Lunak'),
(149, 'IFS4027', 'Pembelajaran Mesin Lanjut'),
(150, 'IFS4101', 'Rekayasa Perangkat Lunak Spesifik Domain'),
(151, 'ISS1001', 'Dasar Sistem Informasi'),
(152, 'ISS1101', 'Sains Teknologi dan Seni di Masyarakat'),
(153, 'ISS1102', 'Pemrograman'),
(154, 'ISS1201', 'Pengantar Desain Rekayasa'),
(155, 'ISS2101', 'Basis Data'),
(156, 'ISS2102', 'Organisasi dan Manajemen Industri'),
(157, 'ISS2201', 'Analisis Kebutuhan Sistem'),
(158, 'ISS3101', 'Basis data Lanjut'),
(159, 'ISS3102', 'Kecerdasan Buatan'),
(160, 'ISS3103', 'Pemrograman Aplikasi Berbasis web'),
(161, 'ISS3104', 'Pengantar jaringan Komputer'),
(162, 'ISS3201', 'Proyek Sistem Informasi'),
(163, 'ISS3202', 'Keamanan Sistem'),
(164, 'ISS3203', 'Gudang Data dan Kecerdasan Bisnis'),
(165, 'ISS3204', 'Socio-Informatika dan Profesionalisme'),
(166, 'ISS3205', 'Perencanaan Sumber Daya Perusahaan'),
(167, 'ISS3280', 'Pengenalan Sistem Informasi dan Basis Data'),
(168, 'ISS4003', 'Data Mining'),
(169, 'ISS4008', 'dan Teknologi Informasi'),
(170, 'ISS4011', 'Sistem Temu Balik Informasi'),
(171, 'ISS4014', 'Pemrosesan Teks dan Bahasa Alami'),
(172, 'ISS4015', 'Keamanan Sistem Lanjut'),
(173, 'ISS4018', 'Manajemen Proyek'),
(174, 'ISS4101', 'Topik Khusus Bidang Minat Sistem Enterprise'),
(175, 'ISS4190', 'Kerja Praktek'),
(176, 'ISS4191', 'Tugas Akhir 1 dan Seminar'),
(177, 'ISS4290', 'Tugas Akhir 2'),
(178, 'KIS1001', 'Kimia Dasar'),
(179, 'KIS1202', 'Kimia Organik'),
(180, 'KIS2101', 'Praktikum Kimia Organik'),
(181, 'KIS2102', 'Kimia Fisik'),
(182, 'KIS2103', 'Praktikum Kimia Fisik'),
(183, 'KIS2104', 'Biokimia'),
(184, 'KIS2201', 'Praktikum Biokimia'),
(185, 'KU32102', 'Kreativitas dan Inovasi'),
(186, 'KU33190', 'Bahasa Indonesia'),
(187, 'KU33203', 'Komputer dan Masyarakat'),
(188, 'KU33204', 'Komunikasi Interpersonal'),
(189, 'KU33206', 'Kewirausahaan'),
(190, 'KU43203', 'Komputer dan Masyarakat'),
(191, 'KUS1001', 'Tata Tulis Karya Ilmiah'),
(192, 'KUS1101', 'Pembentukan Karakter Del'),
(193, 'KUS1102', 'Bahasa Inggris'),
(194, 'KUS2201', 'Agama dan Etika'),
(195, 'KUS3201', 'Hukum dan Etika Cyber'),
(196, 'KUS4101', 'Pancasila dan Kewarganegaraan'),
(197, 'MA32101', 'Probabilitas dan Statistika'),
(198, 'MA33101', 'Probabilitas dan Statistik'),
(199, 'MAS1101', 'Matematika Dasar'),
(200, 'MAS2001', 'Probabilitas dan Statika'),
(201, 'MAS2101', 'Matematika Teknik'),
(202, 'MAS2102', 'Matematika Diskrit'),
(203, 'MAS2103', 'Aljabar Linear'),
(204, 'MAS2104', 'Analisis Numerik'),
(205, 'MAS2105', 'Persamaan Diferensial Ordiner'),
(206, 'MAS2202', 'Aljabar dan Geometri'),
(207, 'MAS2203', 'Matematika Lanjut'),
(208, 'MAS2205', 'Kalkulus Vektor dan Persamaan Diferensial Parsial'),
(209, 'MRS2102', 'Teknologi Produksi dan Energi'),
(210, 'MRS2103', 'Visualisasi dan Gambar Teknik'),
(211, 'MRS2104', 'Termodinamika Teknik'),
(212, 'MRS2201', 'Penelitian Operasional I'),
(213, 'MRS2202', 'Berpikir Sistem'),
(214, 'MRS2203', 'Perencanaan dan Pengendalian Produksi'),
(215, 'MRS2204', 'Praktikum Sistem Produksi'),
(216, 'MRS3101', 'Perancangan Proses Bisnis dan Organisasi'),
(217, 'MRS3102', 'Akuntansi Biaya'),
(218, 'MRS3103', 'Penelitian Operasional II'),
(219, 'MRS3104', 'Perancangan Model Bisnis'),
(220, 'MRS3105', 'Penelitian Pasar dan Pemasaran'),
(221, 'MRS3106', 'Perancangan dan Pengembangan Produk'),
(222, 'MRS3107', 'Metodologi Penelitian'),
(223, 'MRS3180', 'Technopreneurship'),
(224, 'MRS3201', 'Pembiayaan Proyek'),
(225, 'MRS3202', 'Manajemen Proyek Rekayasa'),
(226, 'MRS3203', 'Kewirausahaan Berbasis Teknologi Lanjut'),
(227, 'MRS3204', 'Rekayasa Logistik'),
(228, 'MRS3205', 'Praktikum Optimasi dan Simulasi Bisnis'),
(229, 'MRS3280', 'Kewirausahaan Berbasis Teknologi'),
(230, 'MRS4001', 'Kepemimpinan Bisnis'),
(231, 'MRS4002', 'Manajemen Strategi'),
(232, 'MRS4009', 'Asesmen Teknologi'),
(233, 'MRS4015', 'Proyek Penelitian Akademis Bidang Pemasaran'),
(234, 'MRS4101', 'Kajian Kelayakan Bisnis'),
(235, 'MRS4102', 'Simulasi Sistem'),
(236, 'MRS4103', 'Rekayasa Mutu'),
(237, 'MRS4180', 'Ekonomika Teknik'),
(238, 'MRS4191', 'Desain Proyek Rekayasa (Capstone)'),
(239, 'MRS4201', 'Etika Profesional'),
(240, 'MRS4280', 'Kewirausahaan Berbasis Teknologi'),
(241, 'MRS4281', 'Kepemimpinan Bisnis'),
(242, 'MRS4291', 'Tugas Akhir'),
(243, 'NW31201', 'Jaringan Komputer'),
(244, 'NWS2201', 'Arsitektur dan Organisasi Komputer'),
(245, 'NWS2202', 'Sistem Operasi'),
(246, 'NWS3101', 'Jaringan Komputer'),
(247, 'NWS3103', 'Praktikum Arsitektur Sistem Komputer'),
(248, 'NWS3201', 'Sistem Paralel dan Terdistribusi'),
(249, 'NWS3203', 'Praktikum Jaringan Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `t_microteaching`
--

CREATE TABLE `t_microteaching` (
  `id_microteaching` int(11) NOT NULL,
  `nilai_microteaching` varchar(10) NOT NULL,
  `id_apply_lowongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_microteaching`
--

INSERT INTO `t_microteaching` (`id_microteaching`, `nilai_microteaching`, `id_apply_lowongan`) VALUES
(3, '70', 8);

-- --------------------------------------------------------

--
-- Table structure for table `t_pelamar`
--

CREATE TABLE `t_pelamar` (
  `id_pelamar` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `id_akun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pelamar`
--

INSERT INTO `t_pelamar` (`id_pelamar`, `nama_lengkap`, `no_telp`, `alamat`, `id_akun`) VALUES
(1, 'Ariansyah Nugroho', '082165803007', 'Jln. Suka Jaya No.6', 15),
(2, 'Fanta Sibarani', '08126089946', 'Jln. Suka Jaya No.6, Medan', 25);

-- --------------------------------------------------------

--
-- Table structure for table `t_psikotes`
--

CREATE TABLE `t_psikotes` (
  `id_psikotes` int(11) NOT NULL,
  `nilai_psikotes` varchar(10) NOT NULL,
  `id_apply_lowongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_psikotes`
--

INSERT INTO `t_psikotes` (`id_psikotes`, `nilai_psikotes`, `id_apply_lowongan`) VALUES
(3, '70', 8);

-- --------------------------------------------------------

--
-- Table structure for table `t_reqdosen`
--

CREATE TABLE `t_reqdosen` (
  `id_request` int(15) NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `id_lowongan_status` int(11) NOT NULL,
  `jumlah_dosen` int(15) NOT NULL,
  `deskripsi_pekerjaan` text NOT NULL,
  `spesifikasi_dosen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_reqdosen`
--

INSERT INTO `t_reqdosen` (`id_request`, `id_matkul`, `id_lowongan_status`, `jumlah_dosen`, `deskripsi_pekerjaan`, `spesifikasi_dosen`) VALUES
(11, 3, 1, 1, '<ul>\r\n	<li>Melaksanakan pendidikan, penelitian, dan pengabdian kepada masyarakat</li>\r\n	<li>Merencanakan, melaksanakan proses pembelajaran, serta menilai dan mengevaluasi hasil pembelajaran</li>\r\n	<li>Meningkatkan dan mengembangkan kualifikasi akademik dan kompetensi secara berkelanjutan sejalan dengan perkembangan ilmu pengetahuan, teknologi, dan seni</li>\r\n	<li>Bertindak objektif dan tidak diskriminatif atas dasar pertimbangan jenis kelamin, agama, suku, ras, kondisi fisik tertentu, atau latar belakang sosioekonomi peserta didik dalam pembelajaran</li>\r\n	<li>Menyertakan fotocopy KTP</li>\r\n	<li>Menyertakan fotocopy Ijazah</li>\r\n	<li>Menyertakan fotocopy Transkrip Nilai</li>\r\n	<li>Menyertakan CV</li>\r\n	<li>Menyertakan fotocopy SKCK</li>\r\n	<li>Menyertakan fotocopy Kartu Keluarga</li>\r\n	<li>Menyertakan Keterangan Pengalaman Kerja</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Lulusan S2 Teknik Biologi dengan minimal IPK 3.5</li>\r\n	<li>Ahli di bidang Biologi dan Kimia</li>\r\n</ul>\r\n'),
(12, 151, 1, 2, '<ul>\r\n	<li>Melaksanakan pendidikan, penelitian, dan pengabdian kepada masyarakat</li>\r\n	<li>Merencanakan, melaksanakan proses pembelajaran, serta menilai dan mengevaluasi hasil pembelajaran</li>\r\n	<li>Meningkatkan dan mengembangkan kualifikasi akademik dan kompetensi secara berkelanjutan sejalan dengan perkembangan ilmu pengetahuan, teknologi, dan seni</li>\r\n	<li>Bertindak objektif dan tidak diskriminatif atas dasar pertimbangan jenis kelamin, agama, suku, ras, kondisi fisik tertentu, atau latar belakang sosioekonomi peserta didik dalam pembelajaran</li>\r\n	<li>Menyertakan fotocopy KTP</li>\r\n	<li>Menyertakan fotocopy Ijazah</li>\r\n	<li>Menyertakan fotocopy Transkrip Nilai</li>\r\n	<li>Menyertakan CV</li>\r\n	<li>Menyertakan fotocopy SKCK</li>\r\n	<li>Menyertakan fotocopy Kartu Keluarga</li>\r\n	<li>Menyertakan Keterangan Pengalaman Kerja</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Lulusan S2 Teknik Informatika atau Sistem Informasi&nbsp;dengan minimal IPK 3.5</li>\r\n</ul>\r\n'),
(13, 3, 3, 2, '<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Melaksanakan pendidikan, penelitian, dan pengabdian kepada masyarakat</li>\r\n	<li>Merencanakan, melaksanakan proses pembelajaran, serta menilai dan mengevaluasi hasil pembelajaran</li>\r\n	<li>Meningkatkan dan mengembangkan kualifikasi akademik dan kompetensi secara berkelanjutan sejalan dengan perkembangan ilmu pengetahuan, teknologi, dan seni</li>\r\n	<li>Bertindak objektif dan tidak diskriminatif atas dasar pertimbangan jenis kelamin, agama, suku, ras, kondisi fisik tertentu, atau latar belakang sosioekonomi peserta didik dalam pembelajaran</li>\r\n	<li>Menyertakan fotocopy KTP</li>\r\n	<li>Menyertakan fotocopy Ijazah</li>\r\n	<li>Menyertakan fotocopy Transkrip Nilai</li>\r\n	<li>Menyertakan CV</li>\r\n	<li>Menyertakan fotocopy SKCK</li>\r\n	<li>Menyertakan fotocopy Kartu Keluarga</li>\r\n	<li>Menyertakan Keterangan Pengalaman Kerja</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Lulusan S2 Teknik Biologi dengan minimal IPK 3.5</li>\r\n	<li>Ahli di bidang Biologi dan Kimia</li>\r\n</ul>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `t_role`
--

CREATE TABLE `t_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_role`
--

INSERT INTO `t_role` (`id_role`, `nama_role`) VALUES
(1, 'Super Admin'),
(2, 'Admin HRD'),
(3, 'Admin Koordinator Unit'),
(4, 'Pelamar');

-- --------------------------------------------------------

--
-- Table structure for table `t_tanggal_tes`
--

CREATE TABLE `t_tanggal_tes` (
  `id_tanggal_tes` int(11) NOT NULL,
  `tanggal_microteaching` date DEFAULT NULL,
  `tanggal_psikotes` date DEFAULT NULL,
  `tanggal_kesehatan` date DEFAULT NULL,
  `id_apply_lowongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_tanggal_tes`
--

INSERT INTO `t_tanggal_tes` (`id_tanggal_tes`, `tanggal_microteaching`, `tanggal_psikotes`, `tanggal_kesehatan`, `id_apply_lowongan`) VALUES
(3, '2018-06-13', '2018-06-21', '2018-06-30', 8);

-- --------------------------------------------------------

--
-- Table structure for table `t_tes_kesehatan`
--

CREATE TABLE `t_tes_kesehatan` (
  `id_tes_kesehatan` int(11) NOT NULL,
  `nilai_tes_kesehatan` varchar(10) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `id_apply_lowongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_tes_kesehatan`
--

INSERT INTO `t_tes_kesehatan` (`id_tes_kesehatan`, `nilai_tes_kesehatan`, `keterangan`, `id_apply_lowongan`) VALUES
(3, '70', 'Sakit Jiwa', 8);

-- --------------------------------------------------------

--
-- Table structure for table `t_unit`
--

CREATE TABLE `t_unit` (
  `id_unit` int(11) NOT NULL,
  `nama_unit` varchar(45) NOT NULL,
  `id_akun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `t_unit`
--

INSERT INTO `t_unit` (`id_unit`, `nama_unit`, `id_akun`) VALUES
(1, 'S1 Sistem Informasi', 13),
(2, 'S1 Teknik Informatika', 16),
(3, 'S1 Teknik Elektro', 17),
(4, 'S1 Manajemen Rekayasa', 18),
(5, 'S1 Teknik Bioproses', 19),
(6, 'D3 Teknik Informatika', 20),
(7, 'D3 Teknik Komputer', 21),
(8, 'D4 Teknik Informatika', 22),
(9, 'UPT Bahasa', 23),
(10, 'UPT Science and Mathematics', 24);

-- --------------------------------------------------------

--
-- Table structure for table `t_unit_reqdosen_relation`
--

CREATE TABLE `t_unit_reqdosen_relation` (
  `id_unit_reqdosen_relation` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_reqdosen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_unit_reqdosen_relation`
--

INSERT INTO `t_unit_reqdosen_relation` (`id_unit_reqdosen_relation`, `id_unit`, `id_reqdosen`) VALUES
(7, 5, 11),
(8, 1, 12),
(9, 5, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `t_akun`
--
ALTER TABLE `t_akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `FK_role` (`id_role`);

--
-- Indexes for table `t_apply_lowongan`
--
ALTER TABLE `t_apply_lowongan`
  ADD PRIMARY KEY (`id_apply_lowongan`),
  ADD KEY `FK_status` (`id_apply_lowongan_status`),
  ADD KEY `FK_reqdosen_apply` (`id_reqdosen`),
  ADD KEY `FK_pelamar` (`id_pelamar`);

--
-- Indexes for table `t_apply_lowongan_status`
--
ALTER TABLE `t_apply_lowongan_status`
  ADD PRIMARY KEY (`id_apply_lowongan_status`);

--
-- Indexes for table `t_lowongan_status`
--
ALTER TABLE `t_lowongan_status`
  ADD PRIMARY KEY (`id_lowongan_status`);

--
-- Indexes for table `t_matkul`
--
ALTER TABLE `t_matkul`
  ADD PRIMARY KEY (`id_matkul`),
  ADD UNIQUE KEY `kode_matkul` (`kode_matkul`);

--
-- Indexes for table `t_microteaching`
--
ALTER TABLE `t_microteaching`
  ADD PRIMARY KEY (`id_microteaching`),
  ADD KEY `FK_micro_pelamar` (`id_apply_lowongan`);

--
-- Indexes for table `t_pelamar`
--
ALTER TABLE `t_pelamar`
  ADD PRIMARY KEY (`id_pelamar`),
  ADD KEY `FK_akun` (`id_akun`);

--
-- Indexes for table `t_psikotes`
--
ALTER TABLE `t_psikotes`
  ADD PRIMARY KEY (`id_psikotes`),
  ADD KEY `FK_psiko_pelamar` (`id_apply_lowongan`);

--
-- Indexes for table `t_reqdosen`
--
ALTER TABLE `t_reqdosen`
  ADD PRIMARY KEY (`id_request`),
  ADD KEY `FK_matkul` (`id_matkul`),
  ADD KEY `FK_lowonganstatus` (`id_lowongan_status`);

--
-- Indexes for table `t_role`
--
ALTER TABLE `t_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `t_tanggal_tes`
--
ALTER TABLE `t_tanggal_tes`
  ADD PRIMARY KEY (`id_tanggal_tes`),
  ADD KEY `FK_tanggal_apply` (`id_apply_lowongan`);

--
-- Indexes for table `t_tes_kesehatan`
--
ALTER TABLE `t_tes_kesehatan`
  ADD PRIMARY KEY (`id_tes_kesehatan`),
  ADD KEY `FK_kesehatan_pelamar` (`id_apply_lowongan`);

--
-- Indexes for table `t_unit`
--
ALTER TABLE `t_unit`
  ADD PRIMARY KEY (`id_unit`),
  ADD KEY `FK_akun_id` (`id_akun`);

--
-- Indexes for table `t_unit_reqdosen_relation`
--
ALTER TABLE `t_unit_reqdosen_relation`
  ADD PRIMARY KEY (`id_unit_reqdosen_relation`),
  ADD KEY `FK_reqdosen` (`id_reqdosen`),
  ADD KEY `FK_unit` (`id_unit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_akun`
--
ALTER TABLE `t_akun`
  MODIFY `id_akun` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `t_apply_lowongan`
--
ALTER TABLE `t_apply_lowongan`
  MODIFY `id_apply_lowongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `t_apply_lowongan_status`
--
ALTER TABLE `t_apply_lowongan_status`
  MODIFY `id_apply_lowongan_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `t_lowongan_status`
--
ALTER TABLE `t_lowongan_status`
  MODIFY `id_lowongan_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_matkul`
--
ALTER TABLE `t_matkul`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;
--
-- AUTO_INCREMENT for table `t_microteaching`
--
ALTER TABLE `t_microteaching`
  MODIFY `id_microteaching` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_pelamar`
--
ALTER TABLE `t_pelamar`
  MODIFY `id_pelamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_psikotes`
--
ALTER TABLE `t_psikotes`
  MODIFY `id_psikotes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_reqdosen`
--
ALTER TABLE `t_reqdosen`
  MODIFY `id_request` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `t_role`
--
ALTER TABLE `t_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_tanggal_tes`
--
ALTER TABLE `t_tanggal_tes`
  MODIFY `id_tanggal_tes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_tes_kesehatan`
--
ALTER TABLE `t_tes_kesehatan`
  MODIFY `id_tes_kesehatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_unit`
--
ALTER TABLE `t_unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `t_unit_reqdosen_relation`
--
ALTER TABLE `t_unit_reqdosen_relation`
  MODIFY `id_unit_reqdosen_relation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_akun`
--
ALTER TABLE `t_akun`
  ADD CONSTRAINT `FK_role` FOREIGN KEY (`id_role`) REFERENCES `t_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_apply_lowongan`
--
ALTER TABLE `t_apply_lowongan`
  ADD CONSTRAINT `FK_pelamar` FOREIGN KEY (`id_pelamar`) REFERENCES `t_pelamar` (`id_pelamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_reqdosen_apply` FOREIGN KEY (`id_reqdosen`) REFERENCES `t_reqdosen` (`id_request`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_status` FOREIGN KEY (`id_apply_lowongan_status`) REFERENCES `t_apply_lowongan_status` (`id_apply_lowongan_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_microteaching`
--
ALTER TABLE `t_microteaching`
  ADD CONSTRAINT `FK_micro_pelamar` FOREIGN KEY (`id_apply_lowongan`) REFERENCES `t_apply_lowongan` (`id_apply_lowongan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_pelamar`
--
ALTER TABLE `t_pelamar`
  ADD CONSTRAINT `FK_akun` FOREIGN KEY (`id_akun`) REFERENCES `t_akun` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_psikotes`
--
ALTER TABLE `t_psikotes`
  ADD CONSTRAINT `FK_psiko_pelamar` FOREIGN KEY (`id_apply_lowongan`) REFERENCES `t_apply_lowongan` (`id_apply_lowongan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_reqdosen`
--
ALTER TABLE `t_reqdosen`
  ADD CONSTRAINT `FK_lowonganstatus` FOREIGN KEY (`id_lowongan_status`) REFERENCES `t_lowongan_status` (`id_lowongan_status`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_matkul` FOREIGN KEY (`id_matkul`) REFERENCES `t_matkul` (`id_matkul`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_tanggal_tes`
--
ALTER TABLE `t_tanggal_tes`
  ADD CONSTRAINT `FK_tanggal_apply` FOREIGN KEY (`id_apply_lowongan`) REFERENCES `t_apply_lowongan` (`id_apply_lowongan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_tes_kesehatan`
--
ALTER TABLE `t_tes_kesehatan`
  ADD CONSTRAINT `FK_kesehatan_pelamar` FOREIGN KEY (`id_apply_lowongan`) REFERENCES `t_apply_lowongan` (`id_apply_lowongan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_unit`
--
ALTER TABLE `t_unit`
  ADD CONSTRAINT `FK_akun_id` FOREIGN KEY (`id_akun`) REFERENCES `t_akun` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_unit_reqdosen_relation`
--
ALTER TABLE `t_unit_reqdosen_relation`
  ADD CONSTRAINT `FK_reqdosen` FOREIGN KEY (`id_reqdosen`) REFERENCES `t_reqdosen` (`id_request`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_unit` FOREIGN KEY (`id_unit`) REFERENCES `t_unit` (`id_unit`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
