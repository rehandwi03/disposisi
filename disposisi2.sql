-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 03, 2020 at 11:45 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `disposisi2`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku_agenda`
--

CREATE TABLE `buku_agenda` (
  `buku_agenda_id` int(10) UNSIGNED NOT NULL,
  `nomor_agenda` int(11) NOT NULL,
  `tanggal_agenda` date NOT NULL,
  `kode_ekspedisi` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `isi_kartu`
--

CREATE TABLE `isi_kartu` (
  `isi_kartu_id` int(10) UNSIGNED NOT NULL,
  `kartu_kendali_id` int(11) NOT NULL,
  `from` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_membalas` date NOT NULL,
  `disposisi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_isi_kartu` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_surat`
--

CREATE TABLE `jenis_surat` (
  `jenis_surat_id` int(10) UNSIGNED NOT NULL,
  `kode_surat` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_surat`
--

INSERT INTO `jenis_surat` (`jenis_surat_id`, `kode_surat`, `deskripsi`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'SI', 'Surat internal', '2020-01-16 04:03:38', '2020-01-16 04:03:35', '2020-01-16 04:03:38');

-- --------------------------------------------------------

--
-- Table structure for table `kartu_kendali`
--

CREATE TABLE `kartu_kendali` (
  `kartu_kendali_id` int(11) NOT NULL,
  `jenis_surat_id` int(10) UNSIGNED NOT NULL,
  `buku_agenda_id` int(10) UNSIGNED NOT NULL,
  `perihal` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pembuatan` date NOT NULL,
  `status_kartu_kendali` int(11) NOT NULL,
  `klasifikasi_dokumen_id` int(10) UNSIGNED NOT NULL,
  `lokasi_kartu_id` int(10) UNSIGNED NOT NULL,
  `unit_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi_dokumen`
--

CREATE TABLE `klasifikasi_dokumen` (
  `klasifikasi_dokumen_id` int(10) UNSIGNED NOT NULL,
  `kode_dokumen` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lampiran_file`
--

CREATE TABLE `lampiran_file` (
  `lampiran_id` int(10) UNSIGNED NOT NULL,
  `isi_kartu_id` int(10) UNSIGNED NOT NULL,
  `nama_lampiran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_kartu`
--

CREATE TABLE `lokasi_kartu` (
  `lokasi_kartu_id` int(10) UNSIGNED NOT NULL,
  `nama_lokasi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_10_21_090959_create_permission_tables', 1),
(5, '2019_10_21_091144_create_buku_agendas_table', 1),
(6, '2019_10_21_091251_create_isi_kartus_table', 1),
(7, '2019_10_21_091324_create_jenis_surats_table', 1),
(8, '2019_10_21_091421_create_kartu_kendalis_table', 1),
(9, '2019_10_21_091514_create_klasifikasi_dokumens_table', 1),
(10, '2019_10_21_091608_create_lokasi_kartus_table', 1),
(11, '2019_10_21_091649_create_units_table', 1),
(12, '2019_10_21_091759_add_relationships_to_users_table', 1),
(13, '2019_10_21_091852_add_relationships_to_isi_kartu_table', 1),
(14, '2019_10_21_091951_add_relationships_to_kartu_kendali_table', 1),
(15, '2019_11_03_163013_add_relationships_buku_agenda_id_to_kartu_kendali_table', 1),
(16, '2019_11_28_075525_add_soft_delete_to_kartu_kendali_table', 1),
(17, '2019_11_28_075558_add_soft_delete_to_isi_kartu_table', 1),
(18, '2019_12_19_152746_create_lampiran_files_table', 1),
(19, '2019_12_19_153412_add_relationsips_to_lampiran_files_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_name` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unit_id` int(10) UNSIGNED NOT NULL,
  `unit_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `model_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku_agenda`
--
ALTER TABLE `buku_agenda`
  ADD PRIMARY KEY (`buku_agenda_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isi_kartu`
--
ALTER TABLE `isi_kartu`
  ADD PRIMARY KEY (`isi_kartu_id`),
  ADD KEY `isi_kartu_kartu_kendali_id_foreign` (`kartu_kendali_id`);

--
-- Indexes for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  ADD PRIMARY KEY (`jenis_surat_id`);

--
-- Indexes for table `kartu_kendali`
--
ALTER TABLE `kartu_kendali`
  ADD PRIMARY KEY (`kartu_kendali_id`),
  ADD KEY `kartu_kendali_jenis_surat_id_foreign` (`jenis_surat_id`),
  ADD KEY `kartu_kendali_klasifikasi_dokumen_id_foreign` (`klasifikasi_dokumen_id`),
  ADD KEY `kartu_kendali_lokasi_kartu_id_foreign` (`lokasi_kartu_id`),
  ADD KEY `kartu_kendali_unit_id_foreign` (`unit_id`),
  ADD KEY `kartu_kendali_buku_agenda_id_foreign` (`buku_agenda_id`);

--
-- Indexes for table `klasifikasi_dokumen`
--
ALTER TABLE `klasifikasi_dokumen`
  ADD PRIMARY KEY (`klasifikasi_dokumen_id`);

--
-- Indexes for table `lampiran_file`
--
ALTER TABLE `lampiran_file`
  ADD PRIMARY KEY (`lampiran_id`),
  ADD KEY `lampiran_file_isi_kartu_id_foreign` (`isi_kartu_id`);

--
-- Indexes for table `lokasi_kartu`
--
ALTER TABLE `lokasi_kartu`
  ADD PRIMARY KEY (`lokasi_kartu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`model_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_unit_id_foreign` (`unit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku_agenda`
--
ALTER TABLE `buku_agenda`
  MODIFY `buku_agenda_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isi_kartu`
--
ALTER TABLE `isi_kartu`
  MODIFY `isi_kartu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  MODIFY `jenis_surat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `klasifikasi_dokumen`
--
ALTER TABLE `klasifikasi_dokumen`
  MODIFY `klasifikasi_dokumen_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lampiran_file`
--
ALTER TABLE `lampiran_file`
  MODIFY `lampiran_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lokasi_kartu`
--
ALTER TABLE `lokasi_kartu`
  MODIFY `lokasi_kartu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `model_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `isi_kartu`
--
ALTER TABLE `isi_kartu`
  ADD CONSTRAINT `isi_kartu_kartu_kendali_id_foreign` FOREIGN KEY (`kartu_kendali_id`) REFERENCES `kartu_kendali` (`kartu_kendali_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kartu_kendali`
--
ALTER TABLE `kartu_kendali`
  ADD CONSTRAINT `kartu_kendali_buku_agenda_id_foreign` FOREIGN KEY (`buku_agenda_id`) REFERENCES `buku_agenda` (`buku_agenda_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kartu_kendali_jenis_surat_id_foreign` FOREIGN KEY (`jenis_surat_id`) REFERENCES `jenis_surat` (`jenis_surat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kartu_kendali_klasifikasi_dokumen_id_foreign` FOREIGN KEY (`klasifikasi_dokumen_id`) REFERENCES `klasifikasi_dokumen` (`klasifikasi_dokumen_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kartu_kendali_lokasi_kartu_id_foreign` FOREIGN KEY (`lokasi_kartu_id`) REFERENCES `lokasi_kartu` (`lokasi_kartu_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kartu_kendali_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`unit_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lampiran_file`
--
ALTER TABLE `lampiran_file`
  ADD CONSTRAINT `lampiran_file_isi_kartu_id_foreign` FOREIGN KEY (`isi_kartu_id`) REFERENCES `isi_kartu` (`isi_kartu_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`unit_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
