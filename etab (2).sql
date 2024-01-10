-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jan 2024 pada 01.32
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etab`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `class_levels`
--

CREATE TABLE `class_levels` (
  `cl_id` bigint(20) UNSIGNED NOT NULL,
  `cl_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `class_levels`
--

INSERT INTO `class_levels` (`cl_id`, `cl_name`, `created_at`, `updated_at`) VALUES
(1, 'TK', '2023-11-11 03:22:36', NULL),
(2, 'SD', '2023-11-11 03:22:36', NULL),
(3, 'SMP', '2023-11-11 03:22:36', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(15, '2023_07_25_214244_create_tables', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2023-11-11 03:22:36', NULL),
(2, 'Supervisor', '2023-11-11 03:22:36', NULL),
(3, 'Siswa', '2023-11-11 03:22:36', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `tr_id` bigint(20) UNSIGNED NOT NULL,
  `id_acc` bigint(20) UNSIGNED NOT NULL,
  `tr_debt` int(11) DEFAULT NULL,
  `tr_credit` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`tr_id`, `id_acc`, `tr_debt`, `tr_credit`, `created_at`, `updated_at`) VALUES
(2373784868, 5, 550000, NULL, '2023-11-11 09:45:39', NULL),
(5473920134, 3, NULL, 5000, '2023-11-11 03:26:27', NULL),
(5759191919, 3, 10000, NULL, '2023-11-11 03:22:36', NULL),
(7954732949, 6, 50000, NULL, '2024-01-06 01:12:55', NULL),
(8456457311, 4, 20000, NULL, '2023-11-11 05:13:15', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `acc_unique_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_parents` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_role` bigint(20) UNSIGNED DEFAULT NULL,
  `id_cl` bigint(20) UNSIGNED DEFAULT NULL,
  `nis` int(11) DEFAULT NULL,
  `ta` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `acc_unique_num`, `acc_address`, `acc_parents`, `acc_phone`, `acc_gender`, `acc_class`, `id_role`, `id_cl`, `nis`, `ta`, `status`) VALUES
(1, 'Budi Santoso', 'budi@etabungan.com', NULL, '$2y$10$SAV35jLv/Q92b.zeRMCFBe9AU6xdl7fgq7PRcgAw0pTR72PpEkBde', NULL, '2023-11-11 03:22:36', NULL, 'AB12345678', 'Jl. Merdeka No. 123', NULL, '081234567890', 'Laki-laki', NULL, 1, 2, NULL, NULL, NULL),
(2, 'Rina Dewi', 'rina@etabungan.com', NULL, '$2y$10$krCGsR1bCtE1ex2VoEc4k.m0lh0AHU/c/JH6VoxmhF1dNRnXThQ16', NULL, '2023-11-11 03:22:36', NULL, 'CD87654321', 'Jl. Pahlawan No. 789', NULL, '087654321098', 'Perempuan', NULL, 2, 2, NULL, NULL, NULL),
(3, 'Hendra Wijaya', 'hendra@etabungan.com', NULL, '$2y$10$SE8bbpVJIp.KYteBzPw0l..ulTjpDnZFxTKSfiELhUUzjMA0MEv4i', NULL, '2023-11-11 03:22:36', NULL, 'EF54321876', 'Jl. Medan Baru No. 456', NULL, '089876543210', 'Laki-laki', '1A', 3, 2, 87367465, NULL, NULL),
(4, 'Fathony', NULL, NULL, '$2y$10$Hb3HqGok785FQvfALxflYeFLD/9HT/gzD2CPFsRcCGoMya8EKG06q', NULL, '2023-11-11 04:08:43', '2023-11-11 04:08:43', NULL, NULL, NULL, NULL, 'Laki - Laki', 'A1', 3, 1, 4589, NULL, NULL),
(5, 'Arum', NULL, NULL, '$2y$10$g0DcjtugaQq/HBoIfjbQxe6krQVZSyR2qvgqlUc3H8ToQK8JR8f8q', NULL, '2023-11-11 09:45:09', '2023-11-11 09:45:09', NULL, NULL, NULL, NULL, 'Perempuan', 'A2', 3, 1, 1654, NULL, NULL),
(6, 'Anak SMP', NULL, NULL, '$2y$10$QCbhlqt4GbJJ3UuOTLRBjuoHlh8NNv.58KgWZ56hSvJ94Fvc6Yziy', NULL, '2024-01-06 01:12:13', '2024-01-06 01:12:13', NULL, NULL, NULL, NULL, 'Laki - Laki', '7C', 3, 3, 25469, '2023/2024', NULL),
(8, 'tester kiyo', NULL, NULL, '$2y$10$86Vkjtz451djsTtveVlzuu.1iGd.DezhD3p4oFvKN4stXu6yZPLky', NULL, '2024-01-07 04:50:26', '2024-01-07 04:50:26', NULL, 'jl kiyowo no 7', 'kiyowo', '0895778735671', 'Laki - Laki', '9B', 3, 3, 12543, '2022/2023', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `class_levels`
--
ALTER TABLE `class_levels`
  ADD PRIMARY KEY (`cl_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`tr_id`),
  ADD KEY `transactions_id_acc_foreign` (`id_acc`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_role_foreign` (`id_role`),
  ADD KEY `users_id_cl_foreign` (`id_cl`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `class_levels`
--
ALTER TABLE `class_levels`
  MODIFY `cl_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `tr_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8456457312;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_id_acc_foreign` FOREIGN KEY (`id_acc`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_cl_foreign` FOREIGN KEY (`id_cl`) REFERENCES `class_levels` (`cl_id`),
  ADD CONSTRAINT `users_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
