-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 12, 2023 at 10:17 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekawan_internship`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kendaraans`
--

CREATE TABLE `kendaraans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kendaraan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bahan_bakar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kendaraan` enum('barang','penumpang') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('tersedia','dipesan','dipinjam','servis','sewa') COLLATE utf8mb4_unicode_ci DEFAULT 'tersedia',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kendaraans`
--

INSERT INTO `kendaraans` (`id`, `nama_kendaraan`, `tipe`, `bahan_bakar`, `jenis_kendaraan`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Backhoe Loader', 'WB93R-5', 'Solar', 'barang', 'tersedia', 'kendaraan-images/IIzezHmofFqPPpMmvzhaHrwxyd0EzPR1TujVfG81.png', '2023-08-12 01:41:54', '2023-08-12 01:41:54'),
(2, 'Off Highway Dump Truck', 'HD785-7', 'Solar', 'barang', 'dipinjam', 'kendaraan-images/UIh51hLaL0OxxPRejEqQWNSvH8Lyx3sbJV7fFvnw.png', '2023-08-12 01:43:08', '2023-08-12 02:28:00'),
(3, 'Off Highway Dump Truck', '830E-AC', 'Solar', 'barang', 'tersedia', 'kendaraan-images/tyHdXpfBEsrpYhKfnnxg15Vc7b5vezD0qqI3NY7W.png', '2023-08-12 01:44:16', '2023-08-12 02:29:52'),
(4, 'Hydraulic Excavator', 'PC195LC-8', 'Solar', 'barang', 'dipesan', 'kendaraan-images/i8lT54rfyoGWiLrtiUmx3dkedSVQ7OXQFXTwkmI4.png', '2023-08-12 01:51:41', '2023-08-12 02:09:28'),
(5, 'Hydraulic Excavator', 'PC200-10M0 CE', 'Bensin', 'barang', 'sewa', 'kendaraan-images/PeTbJQS0ek4e4o6xUoRQHH7lH3L4YUK8LTFfLqJ9.png', '2023-08-12 01:53:08', '2023-08-12 01:53:21'),
(6, 'Telescopic Boom Crawler Crane', 'GTC-600', 'Solar', 'barang', 'dipinjam', 'kendaraan-images/9by3C83wq7e5hYyUvQk7C5P63eIgKK7VHPIskAOO.png', '2023-08-12 01:55:42', '2023-08-12 02:33:33'),
(7, 'Rough Terrain Crane', 'GR-500EXL', 'Bensin', 'barang', 'sewa', 'kendaraan-images/lwA4sYwZrci4Vd8ZbNTaLu9XFgHkqbC0vjkyvHvv.png', '2023-08-12 01:56:42', '2023-08-12 02:00:07'),
(8, 'Coach', 'K410IB-6x2*2', 'Bensin', 'penumpang', 'servis', 'kendaraan-images/hMKXHbQtHzYnk5JXDpP6EvPZfdEDFTqiDgffUT6V.png', '2023-08-12 01:57:52', '2023-08-12 02:34:50'),
(9, 'Special Vehicle', 'P450-B4X4', 'Solar', 'penumpang', 'dipesan', 'kendaraan-images/FfC0M4IHTqZ62CP3TweML4GKM9cP2p9IDJa4smW5.png', '2023-08-12 01:58:37', '2023-08-12 02:16:34'),
(10, 'Lattice Boom Crawler Crane', 'CC 88.3200-1 Twin', 'Solar', 'barang', 'tersedia', 'kendaraan-images/LS6zYRUIjKajKSU24HM0zUh04dTfTmw3cJxBkhiA.png', '2023-08-12 01:59:55', '2023-08-12 02:33:40'),
(11, 'City Bus', 'K250IB-4x2', 'Bensin', 'penumpang', 'sewa', 'kendaraan-images/4bw9lz4gwcbyoImfGJ0YXi3oBmlxoJc1Ti66ZyGi.png', '2023-08-12 02:01:02', '2023-08-12 02:04:33'),
(12, 'City Bus', 'K320IA-6x2/2', 'Solar', 'penumpang', 'dipinjam', 'kendaraan-images/kU7qLV5Prm8timowAlNCJdM7AMKFu2DdugPTBbiL.png', '2023-08-12 02:02:22', '2023-08-12 02:28:09'),
(13, 'Mining Tipper & Heavy Hauler Trucks', 'R620-A6X4', 'Solar', 'barang', 'dipinjam', 'kendaraan-images/8GmbzXXmI2DWOhGQToa93pnyujIZxFg9q7kV0EAR.png', '2023-08-12 02:04:24', '2023-08-12 02:27:38'),
(14, 'Mining Tipper', 'G460-B8X4', 'Solar', 'barang', 'sewa', 'kendaraan-images/fcUYc99YdDd6XWLvk5gM7SZWuLxRlMtRveoRk79A.png', '2023-08-12 02:06:00', '2023-08-12 02:06:14'),
(15, 'City Bus', 'K250UB-4x2', 'Solar', 'penumpang', 'servis', 'kendaraan-images/XlGqOrt1H4YwghgvnZ0E6ZFqQismVYvTbckpyNlm.png', '2023-08-12 02:06:59', '2023-08-12 02:35:10');

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
(1, '2014_08_11_192041_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_08_10_191215_users', 1),
(7, '2023_08_10_195014_create_regions_table', 1),
(8, '2023_08_10_195414_create_perusahaan_persewaans_table', 1),
(9, '2023_08_10_200124_create_kendaraans_table', 1),
(10, '2023_08_10_200611_create_transaksi_peminjamans_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
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
-- Table structure for table `perusahaan_persewaans`
--

CREATE TABLE `perusahaan_persewaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perusahaan_persewaans`
--

INSERT INTO `perusahaan_persewaans` (`id`, `nama_perusahaan`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'PT United Tractors', 'Jakarta, Indonesia', '2023-08-12 01:48:10', '2023-08-12 01:48:10'),
(2, 'PAMA Persada', 'Kalimantan Utara, Indonesia', '2023-08-12 01:48:49', '2023-08-12 01:48:49'),
(3, 'Tadaro', 'Sumatra Barat, Indonesia', '2023-08-12 01:49:39', '2023-08-12 01:50:04'),
(4, 'PT BUMA', 'Papua Barat, Indonesia', '2023-08-12 01:49:57', '2023-08-12 01:50:11'),
(5, 'PT Kubota', 'Surabaya, Indonesia', '2023-08-12 01:50:22', '2023-08-12 01:50:22');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `nama_region`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Region 1', 'Kalimantan Timur', '2023-08-12 01:46:19', '2023-08-12 01:46:19'),
(2, 'Region 2', 'Papua Barat', '2023-08-12 01:46:36', '2023-08-12 01:46:36'),
(3, 'Region 3', 'Kalimantan Utara', '2023-08-12 01:46:46', '2023-08-12 01:46:46'),
(4, 'Region 4', 'Sumatra Barat', '2023-08-12 01:47:04', '2023-08-12 01:47:11'),
(5, 'Region 5', 'Aceh', '2023-08-12 01:47:25', '2023-08-12 01:47:25'),
(6, 'Region 6', 'Sumatra Utara', '2023-08-12 01:47:44', '2023-08-12 01:47:44');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nama_role`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2023-08-12 08:09:05', '2023-08-12 08:09:05'),
(2, 'Verifikator', '2023-08-12 08:09:05', '2023-08-12 08:09:05'),
(3, 'Pegawai', '2023-08-12 08:09:38', '2023-08-12 08:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_peminjamans`
--

CREATE TABLE `transaksi_peminjamans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status` enum('pinjam','sewa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `verifikasi` enum('tidak terkonfirmasi','menunggu konfirmasi','terkonfirmasi') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kendaraan_id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `perusahaan_persewaan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `petugas_user_id` bigint(20) UNSIGNED NOT NULL,
  `peminjam_user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_petugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approve_user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_approve` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_peminjamans`
--

INSERT INTO `transaksi_peminjamans` (`id`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `verifikasi`, `kendaraan_id`, `region_id`, `perusahaan_persewaan_id`, `petugas_user_id`, `peminjam_user_id`, `nama_petugas`, `approve_user_id`, `nama_approve`, `created_at`, `updated_at`) VALUES
(1, '2023-08-12', '2023-08-24', 'pinjam', 'menunggu konfirmasi', 4, 2, NULL, 1, 4, 'Rafio Sadani', 2, '[\"Budiman Sudjatmiko\"]', '2023-08-12 02:09:28', '2023-08-12 02:09:28'),
(2, '2023-08-12', '2023-09-14', 'pinjam', 'menunggu konfirmasi', 9, 3, NULL, 1, 5, 'Rafio Sadani', 3, '[\"Titin Sumarni\"]', '2023-08-12 02:16:34', '2023-08-12 02:16:34'),
(3, '2023-08-12', '2023-08-29', 'pinjam', 'terkonfirmasi', 13, 5, NULL, 1, 6, 'Rafio Sadani', 2, '[\"Budiman Sudjatmiko\"]', '2023-08-12 02:21:41', '2023-08-12 02:27:38'),
(4, '2023-08-12', '2023-08-23', 'sewa', 'tidak terkonfirmasi', 10, 3, 1, 1, 5, 'Rafio Sadani', 3, '[\"Titin Sumarni\"]', '2023-08-12 02:21:58', '2023-08-12 02:33:40'),
(5, '2023-08-12', '2023-08-30', 'sewa', 'terkonfirmasi', 2, 2, 4, 1, 4, 'Rafio Sadani', 2, '[\"Budiman Sudjatmiko\"]', '2023-08-12 02:22:29', '2023-08-12 02:28:00'),
(6, '2023-08-12', '2023-08-23', 'pinjam', 'terkonfirmasi', 12, 6, NULL, 1, 5, 'Rafio Sadani', 2, '[\"Budiman Sudjatmiko\"]', '2023-08-12 02:22:53', '2023-08-12 02:28:09'),
(7, '2023-08-12', '2023-08-30', 'sewa', 'tidak terkonfirmasi', 10, 3, 2, 1, 6, 'Rafio Sadani', 2, '[\"Budiman Sudjatmiko\"]', '2023-08-12 02:23:23', '2023-08-12 02:28:06'),
(8, '2023-08-12', '2023-08-22', 'pinjam', 'terkonfirmasi', 6, 3, NULL, 1, 4, 'Rafio Sadani', 3, '[\"Titin Sumarni\"]', '2023-08-12 02:23:50', '2023-08-12 02:33:33'),
(9, '2023-08-12', '2023-09-14', 'pinjam', 'tidak terkonfirmasi', 3, 1, NULL, 1, 5, 'Rafio Sadani', 2, '[\"Budiman Sudjatmiko\"]', '2023-08-12 02:24:44', '2023-08-12 02:29:52'),
(10, '2023-08-12', '2023-08-28', 'sewa', 'menunggu konfirmasi', 11, 2, 3, 1, 4, 'Rafio Sadani', 2, '[\"Budiman Sudjatmiko\"]', '2023-08-12 02:25:53', '2023-08-12 02:25:53'),
(11, '2023-08-12', '2023-08-22', 'sewa', 'menunggu konfirmasi', 5, 3, 1, 1, 4, 'Rafio Sadani', 3, '[\"Titin Sumarni\"]', '2023-08-12 02:26:17', '2023-08-12 02:26:17'),
(12, '2023-08-12', '2023-08-25', 'sewa', 'menunggu konfirmasi', 5, 5, 3, 1, 6, 'Rafio Sadani', 2, '[\"Budiman Sudjatmiko\"]', '2023-08-12 02:26:50', '2023-08-12 02:26:50'),
(13, '2023-08-12', '2023-08-20', 'pinjam', 'tidak terkonfirmasi', 8, 2, NULL, 1, 5, 'Rafio Sadani', 3, '[\"Titin Sumarni\"]', '2023-08-12 02:27:18', '2023-08-12 02:33:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `no_telp` char(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT '3',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `jenis_kelamin`, `alamat`, `no_telp`, `email`, `password`, `photo`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Rafio Sadani', 'L', 'Ponorogo, Indoenesia', '0888235944268', 'rafioosadani@gmail.com', '$2y$10$xkUxCGFNJciAY0ExUHwJZ.NS6WTgxMY7NA0GfeN9zZphG3Q2nZu9S', 'user-images/CXFioAqOe6lMnZ7nPJr91ILK5GPLBNSGRg6YrvJA.png', 1, '2023-08-12 01:11:25', '2023-08-12 01:14:45'),
(2, 'Budiman Sudjatmiko', 'L', 'Yogyakarta, Indonesia', '085645345234', 'budimansudjatmiko@gmail.com', '$2y$10$F9FVGCch3GVZXDpZ.zvqqe5ilzmzBh6U2p3qnMW38YGaPv83J2yf6', 'default.jpg', 2, '2023-08-12 01:17:21', '2023-08-12 01:27:33'),
(3, 'Titin Sumarni', 'P', 'Surabaya, Indonesia', '087756453453', 'titin.sumarni@gmail.com', '$2y$10$fgMx.xe4EgwuRbMY3U7aV.DwLg/P1okm7nfVfcoXICOv9puOokeM.', 'default.jpg', 2, '2023-08-12 01:20:03', '2023-08-12 01:27:45'),
(4, 'Rindu Anjasmoro', 'L', 'Mojokerto, Indonesia', '085754567867', 'rindu.anjasmoro@gmail.com', '$2y$10$D2/PvkfMru1XRO/wSNsWJun2XYuDmbfZj82211IB9GNRPz7dUjw6C', 'default.jpg', 3, '2023-08-12 01:20:53', '2023-08-12 01:20:53'),
(5, 'Malik Subarianto', 'L', 'Sragen, Indonesia', '087767574567', 'subarianto.malik@gmail.com', '$2y$10$2UOWeswetZOE/Hzqr8nS5.2fQ1Y8.zgC7BV1T/IpVcJM39Iv9owZG', 'default.jpg', 3, '2023-08-12 01:21:54', '2023-08-12 01:21:54'),
(6, 'Supri Leksono Budi', 'L', 'Solo, Indonesia', '081235764534', 'leksono.budi@gmail.com', '$2y$10$SYmWa71gPWLLslRGMo47NebGOZtYlJmx0MPDvvAq.4q9ERC4pnl0e', 'default.jpg', 3, '2023-08-12 01:23:00', '2023-08-12 01:23:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kendaraans`
--
ALTER TABLE `kendaraans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `perusahaan_persewaans`
--
ALTER TABLE `perusahaan_persewaans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_peminjamans`
--
ALTER TABLE `transaksi_peminjamans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_peminjamans_kendaraan_id_foreign` (`kendaraan_id`),
  ADD KEY `transaksi_peminjamans_region_id_foreign` (`region_id`),
  ADD KEY `transaksi_peminjamans_perusahaan_persewaan_id_foreign` (`perusahaan_persewaan_id`),
  ADD KEY `transaksi_peminjamans_petugas_user_id_foreign` (`petugas_user_id`),
  ADD KEY `transaksi_peminjamans_peminjam_user_id_foreign` (`peminjam_user_id`),
  ADD KEY `transaksi_peminjamans_approve_user_id_foreign` (`approve_user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kendaraans`
--
ALTER TABLE `kendaraans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perusahaan_persewaans`
--
ALTER TABLE `perusahaan_persewaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi_peminjamans`
--
ALTER TABLE `transaksi_peminjamans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi_peminjamans`
--
ALTER TABLE `transaksi_peminjamans`
  ADD CONSTRAINT `transaksi_peminjamans_approve_user_id_foreign` FOREIGN KEY (`approve_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transaksi_peminjamans_kendaraan_id_foreign` FOREIGN KEY (`kendaraan_id`) REFERENCES `kendaraans` (`id`),
  ADD CONSTRAINT `transaksi_peminjamans_peminjam_user_id_foreign` FOREIGN KEY (`peminjam_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transaksi_peminjamans_perusahaan_persewaan_id_foreign` FOREIGN KEY (`perusahaan_persewaan_id`) REFERENCES `perusahaan_persewaans` (`id`),
  ADD CONSTRAINT `transaksi_peminjamans_petugas_user_id_foreign` FOREIGN KEY (`petugas_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transaksi_peminjamans_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
