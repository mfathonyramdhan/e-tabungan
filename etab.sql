-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jul 2023 pada 02.06
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

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
(1, 'TK', NULL, NULL),
(2, 'SD', NULL, NULL),
(3, 'SMP', NULL, NULL);

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
(1, 'Admin', NULL, NULL),
(2, 'Supervisor', NULL, NULL),
(3, 'Siswa', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `tr_id` bigint(20) UNSIGNED NOT NULL,
  `id_acc` bigint(20) UNSIGNED NOT NULL,
  `tr_debt` int(20) DEFAULT NULL,
  `tr_credit` int(20) DEFAULT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `datemodified` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`tr_id`, `id_acc`, `tr_debt`, `tr_credit`, `datecreated`, `datemodified`, `created_at`, `updated_at`) VALUES
(1273124783, 6, 5000, NULL, '2023-07-28 07:08:36', NULL, NULL, NULL),
(2409314376, 7, 10000, NULL, '2023-07-28 13:48:45', NULL, NULL, NULL),
(2637846239, 6, NULL, 1000, '2023-07-29 12:25:17', NULL, NULL, NULL),
(3646623139, 7, 9500, NULL, '2023-07-29 14:13:43', NULL, NULL, NULL);

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
  `acc_birthplace` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_datebirth` date DEFAULT NULL,
  `acc_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_role` bigint(20) UNSIGNED DEFAULT NULL,
  `id_cl` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `acc_unique_num`, `acc_birthplace`, `acc_datebirth`, `acc_address`, `acc_phone`, `acc_religion`, `acc_gender`, `acc_class`, `id_role`, `id_cl`) VALUES
(1, 'Afrizal', 'afrizal@email.com', NULL, '$2y$10$ddblRKjQdxO551C8LaOJmeNh.8QdxBhib/1PYyKZJpKs61o51skom', NULL, NULL, NULL, 'AB12345678', 'Jakarta', '1995-08-10', 'Jl. Merdeka No. 123', '081234567890', 'Islam', 'Laki - Laki', NULL, 1, NULL),
(2, 'Supervisor', 'supervisor@email.com', NULL, '$2y$10$ttENTAydfGklZ5Js3ZOzjeIC/3ZvKCNkcSh3n9AS1958B5a3BVk9q', NULL, NULL, NULL, 'CD87654321', 'Surabaya', '1992-05-25', 'Jl. Pahlawan No. 789', '087654321098', 'Islam', 'Laki - Laki', NULL, 2, NULL),
(6, 'Budi', NULL, NULL, '$2y$10$OgGdHvTIw0S6/8qWEgeBme9toVlPtw/ZwM7BzTjulJeYlVRfTaW3W', NULL, '2023-07-27 18:00:44', '2023-07-27 18:00:44', NULL, NULL, NULL, NULL, NULL, NULL, 'Laki - Laki', '3', 3, 3),
(7, 'Susan', NULL, NULL, '$2y$10$q6BH8Iixd7nmqUMkC58jT.E1b06Ea7J.7gAY6lCVmS/o2VOFsUdyC', NULL, '2023-07-27 18:04:21', '2023-07-27 18:04:21', NULL, NULL, NULL, NULL, NULL, NULL, 'Perempuan', '6', 3, 2);

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
  ADD KEY `users_id_cl_foreign` (`id_cl`),
  ADD KEY `users_id_role_foreign` (`id_role`);

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
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_id_acc_foreign` FOREIGN KEY (`id_acc`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_cl_foreign` FOREIGN KEY (`id_cl`) REFERENCES `class_levels` (`cl_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `users_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
