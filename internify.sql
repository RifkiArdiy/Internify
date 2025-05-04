-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 03, 2025 at 03:26 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internify`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `industry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dosens`
--

CREATE TABLE `dosens` (
  `dosen_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosens`
--

INSERT INTO `dosens` (`dosen_id`, `user_id`, `nip`, `created_at`, `updated_at`) VALUES
(1, 4, 'NIDN1234', '2025-05-02 10:05:27', '2025-05-02 10:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `level_id` bigint UNSIGNED NOT NULL,
  `level_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`level_id`, `level_nama`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2025-05-02 10:05:27', '2025-05-02 10:05:27'),
(2, 'mahasiswa', '2025-05-02 10:05:27', '2025-05-02 10:05:27'),
(3, 'dosen', '2025-05-02 10:05:27', '2025-05-02 10:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` bigint UNSIGNED NOT NULL,
  `mahasiswa_id` bigint UNSIGNED NOT NULL,
  `dosen_id` bigint UNSIGNED NOT NULL,
  `report_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lowongan_magangs`
--

CREATE TABLE `lowongan_magangs` (
  `lowongan_id` bigint UNSIGNED NOT NULL,
  `company_id` bigint UNSIGNED NOT NULL,
  `period_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `requirements` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `magang_applications`
--

CREATE TABLE `magang_applications` (
  `magang_id` bigint UNSIGNED NOT NULL,
  `mahasiswa_id` bigint UNSIGNED NOT NULL,
  `lowongan_id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `mahasiswa_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `prodi_id` bigint UNSIGNED NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswas`
--

INSERT INTO `mahasiswas` (`mahasiswa_id`, `user_id`, `prodi_id`, `nim`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'NIM001', '2025-05-02 10:05:27', '2025-05-02 10:05:27'),
(2, 3, 2, 'NIM002', '2025-05-02 10:05:27', '2025-05-02 10:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2025_05_02_150949_create_levels_table', 1),
(3, '2025_05_02_150957_create_users_table', 1),
(4, '2025_05_02_151021_create_program_studis_table', 1),
(5, '2025_05_02_151030_create_mahasiswas_table', 1),
(6, '2025_05_02_151035_create_dosens_table', 1),
(7, '2025_05_02_151145_create_companies_table', 1),
(8, '2025_05_02_154948_create_periode_magangs_table', 1),
(9, '2025_05_02_155127_create_lowongan_magangs_table', 1),
(10, '2025_05_02_155152_create_magang_applications_table', 1),
(11, '2025_05_02_155222_create_logs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `periode_magangs`
--

CREATE TABLE `periode_magangs` (
  `period_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program_studis`
--

CREATE TABLE `program_studis` (
  `prodi_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_studis`
--

INSERT INTO `program_studis` (`prodi_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Informatika', '2025-05-02 10:05:27', '2025-05-02 10:05:27'),
(2, 'Sistem Informasi', '2025-05-02 10:05:27', '2025-05-02 10:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint UNSIGNED NOT NULL,
  `level_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `level_id`, `name`, `username`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin Internify', 'admin', '$2y$10$mGAGGLHOCtZUO3dFyJizV.t/h.EU7MjioatYRXC1UZOWKW79MI3qe', NULL, NULL, '2025-05-02 10:05:27', '2025-05-02 10:05:27'),
(2, 2, 'Student One', 'student1', '$2y$10$0nop90EuRiCuL/79PcXxSehWlv/zy0M29aoBw0cuK9Ygyat8s2sym', NULL, NULL, '2025-05-02 10:05:27', '2025-05-02 10:05:27'),
(3, 2, 'Student Two', 'student2', '$2y$10$RHA1BgJt5bbrTc.PggVSAOe/ABku97zPaGSope75wiKw3wYnuLQPO', NULL, NULL, '2025-05-02 10:05:27', '2025-05-02 10:05:27'),
(4, 3, 'Lecturer One', 'lecturer1', '$2y$10$snLJJubfP3MVhNsI1Vcy2./TTtuRKWVgeDyODH/TwAkvHGxlX0H3i', NULL, NULL, '2025-05-02 10:05:27', '2025-05-02 10:05:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `dosens`
--
ALTER TABLE `dosens`
  ADD PRIMARY KEY (`dosen_id`),
  ADD UNIQUE KEY `dosens_nip_unique` (`nip`),
  ADD KEY `dosens_user_id_index` (`user_id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`level_id`),
  ADD UNIQUE KEY `levels_level_nama_unique` (`level_nama`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `logs_mahasiswa_id_index` (`mahasiswa_id`),
  ADD KEY `logs_dosen_id_index` (`dosen_id`);

--
-- Indexes for table `lowongan_magangs`
--
ALTER TABLE `lowongan_magangs`
  ADD PRIMARY KEY (`lowongan_id`),
  ADD KEY `lowongan_magangs_company_id_index` (`company_id`),
  ADD KEY `lowongan_magangs_period_id_index` (`period_id`);

--
-- Indexes for table `magang_applications`
--
ALTER TABLE `magang_applications`
  ADD PRIMARY KEY (`magang_id`),
  ADD KEY `magang_applications_mahasiswa_id_index` (`mahasiswa_id`),
  ADD KEY `magang_applications_lowongan_id_index` (`lowongan_id`);

--
-- Indexes for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD PRIMARY KEY (`mahasiswa_id`),
  ADD UNIQUE KEY `mahasiswas_nim_unique` (`nim`),
  ADD KEY `mahasiswas_user_id_index` (`user_id`),
  ADD KEY `mahasiswas_prodi_id_index` (`prodi_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periode_magangs`
--
ALTER TABLE `periode_magangs`
  ADD PRIMARY KEY (`period_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `program_studis`
--
ALTER TABLE `program_studis`
  ADD PRIMARY KEY (`prodi_id`),
  ADD UNIQUE KEY `program_studis_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_level_id_index` (`level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dosens`
--
ALTER TABLE `dosens`
  MODIFY `dosen_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `level_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lowongan_magangs`
--
ALTER TABLE `lowongan_magangs`
  MODIFY `lowongan_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `magang_applications`
--
ALTER TABLE `magang_applications`
  MODIFY `magang_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `mahasiswa_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `periode_magangs`
--
ALTER TABLE `periode_magangs`
  MODIFY `period_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_studis`
--
ALTER TABLE `program_studis`
  MODIFY `prodi_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosens`
--
ALTER TABLE `dosens`
  ADD CONSTRAINT `dosens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosens` (`dosen_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `logs_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswas` (`mahasiswa_id`) ON DELETE CASCADE;

--
-- Constraints for table `lowongan_magangs`
--
ALTER TABLE `lowongan_magangs`
  ADD CONSTRAINT `lowongan_magangs_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lowongan_magangs_period_id_foreign` FOREIGN KEY (`period_id`) REFERENCES `periode_magangs` (`period_id`) ON DELETE CASCADE;

--
-- Constraints for table `magang_applications`
--
ALTER TABLE `magang_applications`
  ADD CONSTRAINT `magang_applications_lowongan_id_foreign` FOREIGN KEY (`lowongan_id`) REFERENCES `lowongan_magangs` (`lowongan_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `magang_applications_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswas` (`mahasiswa_id`) ON DELETE CASCADE;

--
-- Constraints for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD CONSTRAINT `mahasiswas_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `program_studis` (`prodi_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mahasiswas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`level_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
