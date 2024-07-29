-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jul 2024 pada 15.04
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rapat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `absensi_id` bigint(20) UNSIGNED NOT NULL,
  `pegawai_id` text DEFAULT NULL,
  `rapat_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `user_id` text DEFAULT NULL,
  `nama` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`, `user_id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '$2y$12$Ld432dmkWyjIxUzX.tVVEubOQCSa0baakxSUvz0qb0DU5ZBX8Gl3C', NULL, 'admin', '2024-07-25 21:44:49', '2024-07-25 21:44:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang`
--

CREATE TABLE `bidang` (
  `bidang_id` bigint(20) UNSIGNED NOT NULL,
  `bidang_nama` text DEFAULT NULL,
  `flag_erase` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bidang`
--

INSERT INTO `bidang` (`bidang_id`, `bidang_nama`, `flag_erase`, `created_at`, `updated_at`) VALUES
(1, 'PAUD', 1, '2024-07-25 21:44:49', '2024-07-25 21:44:49'),
(2, 'SD', 1, '2024-07-25 21:44:49', '2024-07-25 21:44:49'),
(3, 'SMP', 1, '2024-07-25 21:44:49', '2024-07-25 21:44:49'),
(4, 'smp', 0, '2024-07-26 03:09:51', '2024-07-26 03:10:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `code_generate`
--

CREATE TABLE `code_generate` (
  `code_generate_id` bigint(20) UNSIGNED NOT NULL,
  `rapat_id` text DEFAULT NULL,
  `code_generate` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `code_generate`
--

INSERT INTO `code_generate` (`code_generate_id`, `rapat_id`, `code_generate`, `created_at`, `updated_at`) VALUES
(1, '1', '914945', '2024-07-26 03:57:42', '2024-07-26 03:57:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `jadwal_id` bigint(20) UNSIGNED NOT NULL,
  `rapat_judul` text DEFAULT NULL,
  `rapat_deskripsi` text DEFAULT NULL,
  `rapat_ruangan` text DEFAULT NULL,
  `rapat_kode` text DEFAULT NULL,
  `rapat_waktu_mulai` text DEFAULT NULL,
  `rapat_waktu_selesai` text DEFAULT NULL,
  `rapat_tanggal` date DEFAULT NULL,
  `rapat_pimpinan_id` text DEFAULT NULL,
  `rapat_notulen_id` text DEFAULT NULL,
  `rapat_bidang_id` text DEFAULT NULL,
  `file` text DEFAULT NULL,
  `flag_erase` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`jadwal_id`, `rapat_judul`, `rapat_deskripsi`, `rapat_ruangan`, `rapat_kode`, `rapat_waktu_mulai`, `rapat_waktu_selesai`, `rapat_tanggal`, `rapat_pimpinan_id`, `rapat_notulen_id`, `rapat_bidang_id`, `file`, `flag_erase`, `created_at`, `updated_at`) VALUES
(1, 'Rapat BOS', 'membahas BOS', 'aula dinas pendidikan', '771731', '08:00', '11:00', '2024-07-26', '1', '1', '1', 'public/paparan/foY1rQPFlc.docx', 1, '2024-07-26 03:57:42', '2024-07-26 03:57:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_19_141234_create_pegawai_table', 1),
(6, '2024_03_21_134853_create_jadwal_table', 1),
(7, '2024_03_22_165010_create_admin_table', 1),
(8, '2024_03_25_172945_create_peserta_table', 1),
(9, '2024_03_28_171909_create_rapat_dokumentasi_table', 1),
(10, '2024_03_29_161912_create_code_generate_table', 1),
(11, '2024_06_06_162811_create_absensi_table', 1),
(12, '2024_06_24_085709_create_bidang_table', 1),
(13, '2024_06_24_114833_create_operator_table', 1),
(14, '2024_06_30_105559_create_notulensi_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notulensi`
--

CREATE TABLE `notulensi` (
  `notulensi_id` bigint(20) UNSIGNED NOT NULL,
  `jadwal_id` int(11) DEFAULT NULL,
  `notulensi_isi` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `notulensi`
--

INSERT INTO `notulensi` (`notulensi_id`, `jadwal_id`, `notulensi_isi`, `created_at`, `updated_at`) VALUES
(1, 1, 'membahas hasil diskusi mengenai BOS', '2024-07-26 04:05:52', '2024-07-26 04:05:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `operator`
--

CREATE TABLE `operator` (
  `operator_id` bigint(20) UNSIGNED NOT NULL,
  `bidang_id` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `pegawai_nama` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `pegawai_wa` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `pegawai_nip` text DEFAULT NULL,
  `pegawai_jabatan` text DEFAULT NULL,
  `pegawai_tingkat` text DEFAULT NULL,
  `pegawai_status` text DEFAULT NULL,
  `pegawai_level` int(11) NOT NULL DEFAULT 1,
  `pegawai_bidang` int(11) NOT NULL DEFAULT 1,
  `flag_erase` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`pegawai_id`, `pegawai_nama`, `email`, `pegawai_wa`, `password`, `pegawai_nip`, `pegawai_jabatan`, `pegawai_tingkat`, `pegawai_status`, `pegawai_level`, `pegawai_bidang`, `flag_erase`, `created_at`, `updated_at`) VALUES
(1, 'ica', 'Ktpica@gmail.com', '081255926683', '$2y$12$9tNu1dxY6/3oIJ10I9jrL.aJ0H.99oi33D3uNbGGQgABn4BN5XnIW', '6111', 'Admin', 'B', 'PNS', 2, 1, 1, '2024-07-26 02:49:08', '2024-07-26 03:22:02'),
(2, 'vini', 'vinidawvi@gmail.com', '089694453667', '$2y$12$xCRuuWAKye0vWiKN7cJcD.sxIAAd1l2mGZx7Jfc67lkxRJEJPLXMm', '1234', 'admin', 'B', 'HONORER', 1, 1, 0, '2024-07-26 02:54:16', '2024-07-26 02:55:52'),
(3, 'vini', 'vinidawvi@gmail.com', '089694453667', '$2y$12$zbAN0HkpSfpNgu0BuyZhVuFbpfPxGnIDsgIHI5IoAS0b1w6YeiN96', '1234', 'admin', 'B', 'HONORER', 1, 1, 0, '2024-07-26 02:56:34', '2024-07-26 02:56:43'),
(4, 'ica', 'vinidawvi@gmail.com', '089694453667', '$2y$12$dxQFh./1.JKkQ87ohAra0uVfBk2k396kkfT9x0JMEiweqJ2LnwtCm', '1234', 'admin', 'B', 'HONORER', 1, 1, 0, '2024-07-26 02:57:21', '2024-07-26 02:57:28'),
(5, 'vini', 'vinidawvi@gmail.com', '089694453667', '$2y$12$9G5.Vmd6SK9cPPmqoCzZfuj/3DWcW0B.ZHJi6dlfsV4K161wGAvjq', '1234', 'admin', 'B', 'HONORER', 1, 1, 1, '2024-07-26 12:12:03', '2024-07-26 12:12:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `peserta_id` bigint(20) UNSIGNED NOT NULL,
  `peserta_jadwal_id` text DEFAULT NULL,
  `peserta_pegawai_id` text DEFAULT NULL,
  `peserta_email` text DEFAULT NULL,
  `kode_rapat` text DEFAULT NULL,
  `pegawai_nama` text DEFAULT NULL,
  `status_notulensi` int(11) NOT NULL DEFAULT 0,
  `status_kehadiran` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`peserta_id`, `peserta_jadwal_id`, `peserta_pegawai_id`, `peserta_email`, `kode_rapat`, `pegawai_nama`, `status_notulensi`, `status_kehadiran`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'Ktpica@gmail.com', '771731', 'ica', 1, 0, '2024-07-26 03:58:14', '2024-07-26 04:05:52'),
(2, '1', NULL, 'vinidawvi@gmail.com', NULL, 'vini', 0, 0, '2024-07-26 06:44:42', '2024-07-26 06:44:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapat_dokumentasi`
--

CREATE TABLE `rapat_dokumentasi` (
  `rapat_dokumentasi_id` bigint(20) UNSIGNED NOT NULL,
  `jadwal_id` text DEFAULT NULL,
  `file` text DEFAULT NULL,
  `nama_file` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rapat_dokumentasi`
--

INSERT INTO `rapat_dokumentasi` (`rapat_dokumentasi_id`, `jadwal_id`, `file`, `nama_file`, `created_at`, `updated_at`) VALUES
(1, '1', 'dokumentasi/dokumentasi-wpPcY-1V2El-1721991952.docx', NULL, '2024-07-26 04:05:53', '2024-07-26 04:05:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` text DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('SX3UxjvYHzRl1gMRcKWiZ2BA1ujb6CIKPJ89xg8Q', '1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQVkyWHlHRm1ycnlwMFZQZkpZbUN2UjN1ZlNOczE5emptUEJucDU4YiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly9sb2NhbGhvc3QvdHVnYXNha2hpci9hZG1pbi9ha3VuLW9wZXJhdG9yIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1722258223);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`absensi_id`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`bidang_id`);

--
-- Indeks untuk tabel `code_generate`
--
ALTER TABLE `code_generate`
  ADD PRIMARY KEY (`code_generate_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`jadwal_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notulensi`
--
ALTER TABLE `notulensi`
  ADD PRIMARY KEY (`notulensi_id`);

--
-- Indeks untuk tabel `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`operator_id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`pegawai_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`peserta_id`);

--
-- Indeks untuk tabel `rapat_dokumentasi`
--
ALTER TABLE `rapat_dokumentasi`
  ADD PRIMARY KEY (`rapat_dokumentasi_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`(768)),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `absensi_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bidang`
--
ALTER TABLE `bidang`
  MODIFY `bidang_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `code_generate`
--
ALTER TABLE `code_generate`
  MODIFY `code_generate_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `jadwal_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `notulensi`
--
ALTER TABLE `notulensi`
  MODIFY `notulensi_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `operator`
--
ALTER TABLE `operator`
  MODIFY `operator_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `pegawai_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `peserta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `rapat_dokumentasi`
--
ALTER TABLE `rapat_dokumentasi`
  MODIFY `rapat_dokumentasi_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
