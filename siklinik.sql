-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2022 at 10:15 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siklinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `authassignment`
--

CREATE TABLE `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text DEFAULT NULL,
  `data` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('IsiDataMaster', '15', NULL, NULL),
('IsiDataMaster', '6', '', 'N;'),
('superadmin', '6', '', 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

CREATE TABLE `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `bizrule` text DEFAULT NULL,
  `data` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('AsistenDokter', 2, 'rekam data tindakan', '', 'N;'),
('Bayar', 0, 'manage data pembayaran', '', 'N;'),
('Dokter', 0, 'manage data dokter', '', 'N;'),
('FrontDesk', 2, 'input data', '', 'N;'),
('isiDataMaster', 1, 'isi data master', '', 'N;'),
('Kasir', 2, 'kasir', '', 'N;'),
('Kota', 0, 'manage data wilayah', '', 'N;'),
('Laporan', 1, '', '', 'N;'),
('Obat', 0, 'manage data obat', '', 'N;'),
('pasien', 0, 'manage data pasien', '', 'N;'),
('Pembayaran', 1, 'pembayaran', '', 'N;'),
('RekamMedis', 0, 'manage data rekam medis', '', 'N;'),
('superadmin', 2, '', NULL, 'N;'),
('Tindakan', 1, 'tindakan', '', 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitemchild`
--

CREATE TABLE `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('AsistenDokter', 'Tindakan'),
('FrontDesk', 'isiDataMaster'),
('isiDataMaster', 'Dokter'),
('isiDataMaster', 'Kota'),
('isiDataMaster', 'Obat'),
('isiDataMaster', 'Pasien'),
('Kasir', 'Pembayaran'),
('Pembayaran', 'Bayar'),
('superadmin', 'AsistenDokter'),
('superadmin', 'FrontDesk'),
('superadmin', 'Kasir'),
('superadmin', 'Laporan'),
('Tindakan', 'RekamMedis');

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `id` int(11) NOT NULL,
  `resep_id` int(11) DEFAULT NULL,
  `biaya_obat` decimal(10,2) NOT NULL,
  `biaya_jasa` decimal(10,2) NOT NULL,
  `bayar` decimal(10,2) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`id`, `resep_id`, `biaya_obat`, `biaya_jasa`, `bayar`, `tanggal`, `user_id`) VALUES
(1, 1, '46000.00', '10000.00', '56000.00', '2022-11-26', 6),
(3, 3, '15000.00', '0.00', '15000.00', '2022-11-26', 6),
(4, 4, '90600.00', '50000.00', '20000.00', '2022-11-26', 6);

-- --------------------------------------------------------

--
-- Table structure for table `detil_resep`
--

CREATE TABLE `detil_resep` (
  `id` int(11) NOT NULL,
  `obat_id` int(11) DEFAULT NULL,
  `resep_id` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detil_resep`
--

INSERT INTO `detil_resep` (`id`, `obat_id`, `resep_id`, `jumlah`, `harga`) VALUES
(1, 1, 1, 1, '1000.00'),
(2, 1, 1, 2, '12500.00'),
(9, 2, 1, 2, '5000.00'),
(10, 2, 1, 2, '5000.00'),
(11, 2, 1, 0, '5000.00'),
(12, 2, 3, 3, '5000.00'),
(13, 7, 4, 2, '42300.00'),
(14, 8, 4, 2, '3000.00');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `hp` varchar(30) NOT NULL,
  `tgllahir` date DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL,
  `kota_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `nama`, `hp`, `tgllahir`, `alamat`, `jenis_kelamin`, `kota_id`) VALUES
(2, 'Benjamin', '+6281553571490', '2022-11-02', 'jl', 'p', 5),
(3, 'Nguyen Eh', '+6281553571490', '1992-11-01', 'Jl. Merdeka Barat utara', 'L', 1),
(4, 'dr. ASWAN', '+6281553571490', '1970-11-01', 'surabaya', 'L', 2),
(5, 'dr. NUR ADHIYAH SIREGAR, MKK', '+6281553571490', '1992-11-01', 'surabaya', 'P', 13),
(6, 'r. ANDRIARTO NUGROHO, MKK', '+6281553571490', '1990-11-01', 'surabaya', 'L', 16),
(7, 'dr. ALFIAN HUSIN, MARS', '+6281553571490', '1989-11-01', 'surabaya', 'L', 11),
(8, 'dr. WAGNER TULUS', '+6281553571490', '1985-11-01', 'surabaya', 'L', 9),
(9, 'Dr. Sulaiman', '+62812378912', '1980-11-09', 'Jl. Merdeka Barat utara', 'L', 17);

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id`, `nama`) VALUES
(1, 'Sidoarjo'),
(2, 'Surabaya'),
(3, 'Bandung'),
(4, 'Jakarta'),
(5, 'Surakarta'),
(6, 'Depok'),
(7, 'Malang'),
(9, 'Bali'),
(10, 'Aceh'),
(11, 'Bengkulu'),
(12, 'Madura'),
(13, 'Lumajang'),
(14, 'Solo'),
(15, 'Mojokerto'),
(16, 'Bojonegoro'),
(17, 'Tegal Sari');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `satuan` char(10) NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama`, `satuan`, `harga`) VALUES
(1, 'Aspirin', 'pill', '12500.00'),
(2, 'Milanta', 'ml', '5000.00'),
(3, 'amoxcilin', 'ml', '17200.00'),
(5, 'Acetazolamide', 'strip', '80000.00'),
(6, 'Acitretin', 'strip', '35000.00'),
(7, 'Adalimumab', 'strip', '42300.00'),
(8, 'Adem Sari', 'sachet', '3000.00'),
(9, 'Canesten', 'tube', '24500.00'),
(10, 'Cisplatin', 'tablet', '12500.00'),
(11, 'Dopamin', 'ml', '5500.00'),
(12, 'Ibuprofen', 'tablet', '7500.00');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `tgllahir` date NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL,
  `kota_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `hp`, `tgllahir`, `alamat`, `jenis_kelamin`, `kota_id`) VALUES
(1, 'kim', '0912312', '1992-08-12', 'jl. perkasa', 'p', 5),
(3, 'jim morrison', '0912312', '1980-11-01', 'jl. perkasa utara merdeka', 'L', 7),
(4, 'LIAN INDRIANI', '0912312', '1994-08-15', 'jl. perkasa', 'P', 1),
(5, 'MEILLYSSA CHANDRA', '0912312', '1997-08-15', 'jl. perkasa', 'P', 7),
(6, 'RAHAYU EVIRIYANTI', '0912312', '1990-08-15', 'jl. perkasa', 'P', 10),
(7, 'NAHARUDDIN', '0912312', '1994-08-15', 'jl. perkasa', 'L', 12),
(8, 'ANDIKA MUNDA', '0912312', '1998-08-15', 'jl. perkasa', 'L', 5),
(9, 'SYAFRIL ARMANSYAH', '0912312', '1982-08-15', 'jl. perkasa', 'L', 6),
(10, 'SUSANTI EFFENDI', '0912312', '2000-08-15', 'jl. perkasa', 'P', 14),
(11, ' ABDUL GAMAL', '0912312', '2002-08-15', 'jl. perkasa', 'L', 15),
(12, 'EBIET YUDI SANTOKO', '0912312', '1981-11-01', 'jl. perkasa', 'L', 3),
(13, 'Ngatimin', '+0219112312', '1991-11-10', 'jl. perkasa', 'P', 5);

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medik`
--

CREATE TABLE `rekam_medik` (
  `id` int(11) NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `diagnosis` varchar(100) NOT NULL,
  `dokter_id` int(11) NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal_periksa` date NOT NULL,
  `terapi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rekam_medik`
--

INSERT INTO `rekam_medik` (`id`, `keluhan`, `diagnosis`, `dokter_id`, `pasien_id`, `user_id`, `tanggal_periksa`, `terapi`) VALUES
(5, 'panas', 'mma', 3, 1, 6, '2022-11-29', 'minum'),
(7, 'pusing vertigo', 'darah rendah', 2, 3, 6, '2022-11-15', 'puasa'),
(8, 'Hidung Tersumbat', 'Flu', 8, 13, 6, '2022-11-09', 'Obat Flu');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id` int(11) NOT NULL,
  `rekammedik_id` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`id`, `rekammedik_id`, `tanggal`) VALUES
(1, 5, '2022-11-25'),
(3, 7, '2022-11-26'),
(4, 8, '2022-11-26');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  `DateCreated` datetime NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `description`, `DateCreated`, `LastUpdate`) VALUES
(1, 'admin', '2022-11-24 16:05:02', '2022-11-24 09:05:07'),
(2, 'user', '2022-11-24 16:05:21', '2022-11-24 09:05:24'),
(3, 'IsiDataMaster', '2022-01-01 00:00:00', '2021-12-31 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_migration`
--

CREATE TABLE `tbl_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_migration`
--

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m221124_074547_users_table', 1669280182),
('m221125_155531_klinik_table', 1669396241);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `DateCreated` datetime NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `roles_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `DateCreated`, `LastUpdate`, `roles_id`) VALUES
(6, 'admin', 'sa1aY64JOY94w', '2022-11-24 14:02:08', '2022-11-24 13:02:08', 1),
(15, 'userbaru', 'sa1aY64JOY94w', '2022-11-26 10:07:21', '2022-11-26 09:07:21', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authassignment`
--
ALTER TABLE `authassignment`
  ADD PRIMARY KEY (`itemname`,`userid`);

--
-- Indexes for table `authitem`
--
ALTER TABLE `authitem`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bayar_resep` (`resep_id`),
  ADD KEY `fk_bayar_user` (`user_id`);

--
-- Indexes for table `detil_resep`
--
ALTER TABLE `detil_resep`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detil_resep_obat` (`obat_id`),
  ADD KEY `fk_detil_resep_resep` (`resep_id`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kota_dokter` (`kota_id`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kota_pasien` (`kota_id`);

--
-- Indexes for table `rekam_medik`
--
ALTER TABLE `rekam_medik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rekam_medik_pasien` (`pasien_id`),
  ADD KEY `fk_rekam_medik_dokter` (`dokter_id`),
  ADD KEY `fk_rekam_medik_user` (`user_id`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_resep_rekam_medik` (`rekammedik_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `description` (`description`);

--
-- Indexes for table `tbl_migration`
--
ALTER TABLE `tbl_migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_user_role` (`roles_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bayar`
--
ALTER TABLE `bayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detil_resep`
--
ALTER TABLE `detil_resep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rekam_medik`
--
ALTER TABLE `rekam_medik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bayar`
--
ALTER TABLE `bayar`
  ADD CONSTRAINT `fk_bayar_resep` FOREIGN KEY (`resep_id`) REFERENCES `resep` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_bayar_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detil_resep`
--
ALTER TABLE `detil_resep`
  ADD CONSTRAINT `fk_detil_resep_obat` FOREIGN KEY (`obat_id`) REFERENCES `obat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detil_resep_resep` FOREIGN KEY (`resep_id`) REFERENCES `resep` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `fk_kota_dokter` FOREIGN KEY (`kota_id`) REFERENCES `kota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `fk_kota_pasien` FOREIGN KEY (`kota_id`) REFERENCES `kota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rekam_medik`
--
ALTER TABLE `rekam_medik`
  ADD CONSTRAINT `fk_rekam_medik_dokter` FOREIGN KEY (`dokter_id`) REFERENCES `dokter` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rekam_medik_pasien` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rekam_medik_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `fk_resep_rekam_medik` FOREIGN KEY (`rekammedik_id`) REFERENCES `rekam_medik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
