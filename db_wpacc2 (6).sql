-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 01, 2023 at 10:03 AM
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
-- Database: `db_wpacc2`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator user group of the application'),
(2, 'member', 'Registered users of the application');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'dodo.a@selarassolusindo.com', 1, '2023-03-01 13:31:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-03-01 11:00:12', 'MythAuthDatabaseMigrationsCreateAuthTables', 'default', 'MythAuth', 1629452329, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t00_grup_akun`
--

CREATE TABLE `t00_grup_akun` (
  `id` int(11) NOT NULL,
  `kode` varchar(2) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `t00_grup_akun`
--

INSERT INTO `t00_grup_akun` (`id`, `kode`, `nama`) VALUES
(1, '11', 'AKTIVA LANCAR'),
(2, '12', 'AKTIVA TETAP'),
(3, '13', 'AKTIVA LAIN-LAIN'),
(4, '21', 'HUTANG JANGKA PENDEK'),
(5, '22', 'HUTANG JANGKA PANJANG'),
(6, '23', 'MODAL'),
(7, '31', 'PENDAPATAN USAHA'),
(8, '41', 'HARGA POKOK PENJUALAN'),
(9, '42', 'BIAYA-BIAYA');

-- --------------------------------------------------------

--
-- Table structure for table `t01_akun`
--

CREATE TABLE `t01_akun` (
  `id` int(11) NOT NULL,
  `grup_akun` int(11) NOT NULL,
  `kode` varchar(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `debet_lalu` double NOT NULL,
  `kredit_lalu` double NOT NULL,
  `debet_ini` double NOT NULL,
  `kredit_ini` double NOT NULL,
  `bulan_tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `t01_akun`
--

INSERT INTO `t01_akun` (`id`, `grup_akun`, `kode`, `nama`, `debet_lalu`, `kredit_lalu`, `debet_ini`, `kredit_ini`, `bulan_tahun`) VALUES
(1, 1, '1101', 'KAS TUNAI', 0, 0, 0, 0, '1222'),
(2, 1, '1102', 'PIUTANG USAHA', 0, 0, 0, 0, '1222'),
(3, 3, '1303', 'PERSEDIAAN', 0, 0, 0, 0, '1222'),
(4, 2, '1204', 'PERLENGKAPAN UMUM', 0, 0, 0, 0, '1222'),
(5, 4, '2101', 'UTANG USAHA', 0, 0, 0, 0, '1222'),
(6, 7, '3101', 'PENDAPATAN PENJUALAN', 0, 0, 0, 0, '1222'),
(7, 8, '4101', 'HARGA POKOK PENJUALAN', 0, 0, 0, 0, '1222'),
(8, 9, '4201', 'BEBAN PERLENGKAPAN UMUM', 0, 0, 0, 0, '1222');

-- --------------------------------------------------------

--
-- Table structure for table `t02_akun_lama`
--

CREATE TABLE `t02_akun_lama` (
  `id` int(11) NOT NULL,
  `grup_akun` int(11) NOT NULL,
  `kode` varchar(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `debet_lalu` double NOT NULL,
  `kredit_lalu` double NOT NULL,
  `debet_ini` double NOT NULL,
  `kredit_ini` double NOT NULL,
  `bulan_tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t03_akun_backup`
--

CREATE TABLE `t03_akun_backup` (
  `id` int(11) NOT NULL,
  `akun` int(11) NOT NULL,
  `debet` double NOT NULL,
  `kredit` double NOT NULL,
  `kode_tahun` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t30_jurnal`
--

CREATE TABLE `t30_jurnal` (
  `id` int(11) NOT NULL,
  `nomor` varchar(8) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL,
  `bulan_tahun` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t31_jurnald`
--

CREATE TABLE `t31_jurnald` (
  `id` int(11) NOT NULL,
  `jurnal` int(11) NOT NULL,
  `akun` int(11) NOT NULL,
  `debet` double NOT NULL,
  `kredit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t32_jurnal_lama`
--

CREATE TABLE `t32_jurnal_lama` (
  `id` int(11) NOT NULL,
  `nomor` varchar(8) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL,
  `bulan_tahun` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t33_jurnal_lamad`
--

CREATE TABLE `t33_jurnal_lamad` (
  `id` int(11) NOT NULL,
  `jurnal` int(11) NOT NULL,
  `akun` int(11) NOT NULL,
  `debet` double NOT NULL,
  `kredit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t34_jurnal_backup`
--

CREATE TABLE `t34_jurnal_backup` (
  `id` int(11) NOT NULL,
  `nomor` varchar(8) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL,
  `bulan_tahun` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t35_jurnal_backupd`
--

CREATE TABLE `t35_jurnal_backupd` (
  `id` int(11) NOT NULL,
  `jurnal` int(11) NOT NULL,
  `akun` int(11) NOT NULL,
  `debet` double NOT NULL,
  `kredit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `first_name` varchar(60) DEFAULT NULL,
  `last_name` varchar(60) DEFAULT NULL,
  `primary_phone` varchar(17) DEFAULT NULL,
  `picture` varchar(128) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `email`, `username`, `first_name`, `last_name`, `primary_phone`, `picture`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '17D7DA71-5BC4-4069-BB4E-AA8E5E017473', 'dodo.a@selarassolusindo.com', 'admin', NULL, NULL, NULL, NULL, '$2y$10$sftsMxTnrVcMUmc.o6k0pubcoXNZy8G3CVCsV0YdoL5sx8QV7.7zW', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-03-01 11:00:10', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD PRIMARY KEY (`group_id`,`permission_id`),
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD PRIMARY KEY (`group_id`,`user_id`),
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD PRIMARY KEY (`user_id`,`permission_id`),
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t00_grup_akun`
--
ALTER TABLE `t00_grup_akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t01_akun`
--
ALTER TABLE `t01_akun`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grup_akun_index` (`grup_akun`);

--
-- Indexes for table `t02_akun_lama`
--
ALTER TABLE `t02_akun_lama`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grup_akun_index` (`grup_akun`);

--
-- Indexes for table `t03_akun_backup`
--
ALTER TABLE `t03_akun_backup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `akun_unique` (`akun`);

--
-- Indexes for table `t30_jurnal`
--
ALTER TABLE `t30_jurnal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t31_jurnald`
--
ALTER TABLE `t31_jurnald`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t31_jurnald_akun_index` (`akun`),
  ADD KEY `t31_jurnald_jurnal_index` (`jurnal`);

--
-- Indexes for table `t32_jurnal_lama`
--
ALTER TABLE `t32_jurnal_lama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t33_jurnal_lamad`
--
ALTER TABLE `t33_jurnal_lamad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t34_jurnal_backup`
--
ALTER TABLE `t34_jurnal_backup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t35_jurnal_backupd`
--
ALTER TABLE `t35_jurnal_backupd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t00_grup_akun`
--
ALTER TABLE `t00_grup_akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `t01_akun`
--
ALTER TABLE `t01_akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t02_akun_lama`
--
ALTER TABLE `t02_akun_lama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t03_akun_backup`
--
ALTER TABLE `t03_akun_backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t30_jurnal`
--
ALTER TABLE `t30_jurnal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t31_jurnald`
--
ALTER TABLE `t31_jurnald`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t32_jurnal_lama`
--
ALTER TABLE `t32_jurnal_lama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t33_jurnal_lamad`
--
ALTER TABLE `t33_jurnal_lamad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t34_jurnal_backup`
--
ALTER TABLE `t34_jurnal_backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t35_jurnal_backupd`
--
ALTER TABLE `t35_jurnal_backupd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `t01_akun`
--
ALTER TABLE `t01_akun`
  ADD CONSTRAINT `t01_akun_ibfk_1` FOREIGN KEY (`grup_akun`) REFERENCES `t00_grup_akun` (`id`);

--
-- Constraints for table `t31_jurnald`
--
ALTER TABLE `t31_jurnald`
  ADD CONSTRAINT `t31_jurnald_ibfk_1` FOREIGN KEY (`jurnal`) REFERENCES `t30_jurnal` (`id`),
  ADD CONSTRAINT `t31_jurnald_ibfk_2` FOREIGN KEY (`akun`) REFERENCES `t01_akun` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
