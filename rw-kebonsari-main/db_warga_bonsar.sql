-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2022 at 02:39 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_warga_bonsar`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota_keluarga`
--

CREATE TABLE `anggota_keluarga` (
  `id_anggota` int(11) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `id_keluarga` int(11) NOT NULL,
  `hubungan_keluarga` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `identitas_kp`
--

CREATE TABLE `identitas_kp` (
  `id_identitas_kp` int(11) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `nama_kp` varchar(255) NOT NULL,
  `alamat_kp` text NOT NULL,
  `kode_pos_kp` varchar(50) NOT NULL,
  `email_kp` varchar(50) NOT NULL,
  `no_tlp_kp` varchar(50) NOT NULL,
  `rw_kp` varchar(50) NOT NULL,
  `kelurahan_kp` varchar(255) NOT NULL,
  `kecamatan_kp` varchar(255) NOT NULL,
  `kota_kp` varchar(255) NOT NULL,
  `provinsi_kp` varchar(255) NOT NULL,
  `foto_kp` varchar(255) NOT NULL,
  `logo_kp` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `identitas_kp`
--

INSERT INTO `identitas_kp` (`id_identitas_kp`, `id_warga`, `nama_kp`, `alamat_kp`, `kode_pos_kp`, `email_kp`, `no_tlp_kp`, `rw_kp`, `kelurahan_kp`, `kecamatan_kp`, `kota_kp`, `provinsi_kp`, `foto_kp`, `logo_kp`, `created_at`, `updated_at`) VALUES
(1, 17, 'Kebonsari', 'Jln. Kebonsari No. 5 RT 03', '45582', 'satriafauzi@gmail.com', '089463463', '06', 'Baros', 'Cimahi Tengah', 'Cimahi', 'Jawa Barat', 'bg.jpeg', 'kotacimahi.png', '2022-12-02 14:56:39', '2022-11-28 14:22:42');

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE `keluarga` (
  `id_keluarga` int(11) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `no_kk` varchar(255) NOT NULL,
  `alamat_keluarga` text NOT NULL,
  `desa_kelurahan_keluarga` varchar(50) NOT NULL,
  `kecamatan_keluarga` varchar(50) NOT NULL,
  `kabupaten_kota_keluarga` varchar(50) NOT NULL,
  `provinsi_keluarga` varchar(50) NOT NULL,
  `negara_keluarga` varchar(50) NOT NULL,
  `rt_keluarga` varchar(30) NOT NULL,
  `rw_keluarga` varchar(30) NOT NULL,
  `kode_pos_keluarga` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(30) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `title`, `description`, `start_datetime`, `end_datetime`) VALUES
(7, 'Ronda 1', 'adi,ridwan,maman', '2022-11-29 15:12:00', '2022-11-29 16:12:00'),
(9, 'Ronda 2', 'rww', '2022-11-30 22:04:00', '2022-11-30 22:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username_user` varchar(255) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username_user`, `password_user`, `email_user`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'adminkebonsari06@gmail.com', 'admin', '2022-11-21 03:23:38', '2022-11-21 03:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `id_warga` int(11) NOT NULL,
  `nik_warga` varchar(255) NOT NULL,
  `nama_warga` varchar(255) NOT NULL,
  `tempat_lahir_warga` varchar(255) NOT NULL,
  `tanggal_lahir_warga` date NOT NULL,
  `jenis_kelamin_warga` enum('L','P') NOT NULL,
  `alamat_ktp_warga` text NOT NULL,
  `alamat_warga` text NOT NULL,
  `desa_kelurahan_warga` varchar(255) NOT NULL,
  `kecamatan_warga` varchar(255) NOT NULL,
  `kabupaten_kota_warga` varchar(255) NOT NULL,
  `provinsi_warga` varchar(255) NOT NULL,
  `negara_warga` varchar(255) NOT NULL,
  `rt_warga` varchar(10) NOT NULL,
  `rw_warga` varchar(10) NOT NULL,
  `agama_warga` varchar(255) NOT NULL,
  `pendidikan_terakhir_warga` varchar(255) NOT NULL,
  `pekerjaan_warga` varchar(255) NOT NULL,
  `status_perkawinan_warga` enum('Kawin','Belum Kawin') NOT NULL,
  `status_warga` enum('Tetap','Kontrak') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`id_warga`, `nik_warga`, `nama_warga`, `tempat_lahir_warga`, `tanggal_lahir_warga`, `jenis_kelamin_warga`, `alamat_ktp_warga`, `alamat_warga`, `desa_kelurahan_warga`, `kecamatan_warga`, `kabupaten_kota_warga`, `provinsi_warga`, `negara_warga`, `rt_warga`, `rw_warga`, `agama_warga`, `pendidikan_terakhir_warga`, `pekerjaan_warga`, `status_perkawinan_warga`, `status_warga`, `created_at`, `updated_at`) VALUES
(17, '063634634645', 'Ahmad ', 'Surabaya', '1972-09-02', 'L', 'Kebon Sari', 'Kebon Sari', 'Baros', 'Cimahi Tengah', 'Cimahi', 'Jawa Barat', 'Indonesia', '001', '006', 'Islam', 'S1', 'Pegawai Swasta', 'Kawin', 'Tetap', '2022-11-28 14:20:44', '2022-11-28 14:20:44'),
(18, '094634654754', 'Maman ', 'Bandung', '1978-09-02', 'L', 'Cilengkrang', 'Kebonsari', 'Baros', 'Cimahi Tengah', 'Cimahi', 'Jawa Barat', 'Indonesia', '002', '006', 'Islam', 'D3', 'Pegawai Swasta', 'Kawin', 'Tetap', '2022-11-29 15:45:46', '2022-11-29 15:45:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_keluarga`
--
ALTER TABLE `anggota_keluarga`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `id_warga` (`id_warga`,`id_keluarga`),
  ADD KEY `id_keluarga` (`id_keluarga`);

--
-- Indexes for table `identitas_kp`
--
ALTER TABLE `identitas_kp`
  ADD PRIMARY KEY (`id_identitas_kp`),
  ADD KEY `id_warga` (`id_warga`);

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`id_keluarga`),
  ADD KEY `id_penduduk` (`id_warga`);

--
-- Indexes for table `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`id_warga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota_keluarga`
--
ALTER TABLE `anggota_keluarga`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `identitas_kp`
--
ALTER TABLE `identitas_kp`
  MODIFY `id_identitas_kp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keluarga`
--
ALTER TABLE `keluarga`
  MODIFY `id_keluarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warga`
--
ALTER TABLE `warga`
  MODIFY `id_warga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota_keluarga`
--
ALTER TABLE `anggota_keluarga`
  ADD CONSTRAINT `anggota_keluarga_ibfk_1` FOREIGN KEY (`id_warga`) REFERENCES `warga` (`id_warga`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anggota_keluarga_ibfk_2` FOREIGN KEY (`id_keluarga`) REFERENCES `keluarga` (`id_keluarga`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `identitas_kp`
--
ALTER TABLE `identitas_kp`
  ADD CONSTRAINT `identitas_kp_ibfk_1` FOREIGN KEY (`id_warga`) REFERENCES `warga` (`id_warga`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD CONSTRAINT `keluarga_ibfk_1` FOREIGN KEY (`id_warga`) REFERENCES `warga` (`id_warga`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
