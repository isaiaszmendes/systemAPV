-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2018 at 09:30 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_system`
--
CREATE DATABASE IF NOT EXISTS `db_system` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_system`;

-- --------------------------------------------------------

--
-- Table structure for table `mesas`
--

CREATE TABLE `mesas` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `atendente_id` int(10) UNSIGNED DEFAULT NULL,
  `status_id` int(10) UNSIGNED NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mesas`
--

INSERT INTO `mesas` (`id`, `user_id`, `atendente_id`, `status_id`) VALUES
(1, 4, NULL, 1),
(2, 5, 2, 4),
(3, 6, 10, 4),
(4, 7, NULL, 1),
(5, 11, NULL, 1),
(6, 12, NULL, 1),
(7, 3, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_12_153321_create_roles_table', 1),
(4, '2018_10_12_153337_create_permissions_table', 1),
(5, '2018_10_13_081026_create_mesas_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'view_all', 'CRUD de Atendentes Requerentes', '2018-10-15 07:07:50', '2018-10-15 07:07:50'),
(2, 'view_requerentes', 'Read de Requerentes', '2018-10-15 07:07:50', '2018-10-15 07:07:50'),
(3, 'accept_call', 'Aceitar Requisições de Suporte', '2018-10-15 07:07:51', '2018-10-15 07:07:51'),
(4, 'create_call', 'Criar Requisições de Suporte', '2018-10-15 07:07:51', '2018-10-15 07:07:51'),
(5, 'request_called', 'Solicitar Chamado', '2018-10-15 07:07:51', '2018-10-15 07:07:51');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 2),
(4, 4, 2),
(5, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'Cuida do Crud dos demais users', '2018-10-15 07:07:50', '2018-10-15 07:07:50'),
(2, 'Atendente', 'Visualiza os Requerentes, abre e cuida dos chamados de suporte', '2018-10-15 07:07:50', '2018-10-15 07:07:50'),
(3, 'Requerente', 'Solicita ajuda de Suporte', '2018-10-15 07:07:50', '2018-10-15 07:07:50');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 3),
(5, 5, 3),
(6, 6, 3),
(7, 7, 3),
(8, 8, 1),
(9, 9, 2),
(10, 10, 2),
(11, 11, 3),
(12, 12, 3);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `description`) VALUES
(1, 'Aguardando cliente', 'Sem nenhum cliente em mesa'),
(2, 'Em atendimento', 'Atendendo um cliente'),
(3, 'Necessitando ajuda', 'Solicitando ajuda de um atendente'),
(4, 'Recebendo ajuda ', 'Recebendo ajuda de um atendente');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Gabriel Admin', 'admin@email.com', '$2y$10$Ni/dYXpp4uV92h0wqwVaP.JlZQuaAGxHJKF0UFUGT952ZKhZgjJR2', NULL, '2018-10-15 07:07:49', '2018-10-15 07:07:49'),
(2, 'Vitória Atendente', 'atendente@email.com', '$2y$10$7wFeJtX.sXE8E.wVv31/g.XG8ZRHqHAAE7QX/N2gzuFbzGCR2s2I6', 'J0fSjjfTt9MCV3xZJEbdh74ZkQIoIyqdG5AV71ytVXLrR3GaYNBoqnWoPa7k', '2018-10-15 07:07:50', '2018-10-15 07:07:50'),
(3, 'Mesa 4', 'mesa4@email.com', '$2y$10$vVUUMvmlpOOB8jxuJNoaDu62P3YdIvtq5G0wGW993hH/RNZOoW2RG', 'A1kA8ucD4wTGKseenLef0P8zMjSRW1f4IpAHmuNDU1hxElQVFWfJs1WydMrI', '2018-10-15 07:07:50', '2018-10-15 07:19:54'),
(4, 'Mesa 1', 'mesa1@email.com', '$2y$10$vJGvBYwRVj1tP14TDQt2QOFGbbhgWtNDLpM9dFRlXRVdZveLvvnJ6', NULL, '2018-10-15 07:10:16', '2018-10-15 07:19:04'),
(5, 'Mesa 2', 'mesa2@email.com', '$2y$10$.DtvM9P9nkcNsyt0EOCebuVjHrcN.c2qHSJMO6TVqGMmGQjNjjIAq', '0GxC3Wl72wQ4851eFutnjPMreRl8k6LFIrjv6uuxsyg62P4MyYcTrYfywRCz', '2018-10-15 07:10:38', '2018-10-15 07:19:24'),
(6, 'Mesa 3', 'mesa3@email.com', '$2y$10$WjcuwY9Zy6xaMS/nRVj/mu/uFRl8GSjsPMkzdzYBOt82ug4.ivWHC', 'jSL5TyaK0KLXZDU0FTNJbSGyU8DtsbadHlhvnmSpz1UQXiw7xicuaxVxmJpY', '2018-10-15 07:11:15', '2018-10-15 07:19:41'),
(7, 'Mesa 5', 'mesa5@email.com', '$2y$10$sgh78xjcF3v8GYoXlwvUie6Q4nunixhci.N9hjkp27GDLRti.eLNa', NULL, '2018-10-15 07:12:17', '2018-10-15 07:20:19'),
(8, 'Admininstrador', 'adm2@email.com', '$2y$10$ctt3gI.6H12589Xj/t8F8e90NoTsuGbBuilgOox2H6YU9wjgE6ElS', NULL, '2018-10-15 07:12:53', '2018-10-15 07:12:53'),
(9, 'Paula', 'paula@email.com.br', '$2y$10$G7h1rAmdvs.rK7.l8jjULuxpQADE/8SEpscrt/G9tQHCSRhmaDLxW', NULL, '2018-10-15 07:14:23', '2018-10-15 07:14:23'),
(10, 'Vitória', 'vitoria@email.com', '$2y$10$yXfmx/Btz.hfZi18OnAJauJXH13.SyfdjmwLkVrAeumR2tBF.ZrLO', NULL, '2018-10-15 07:15:09', '2018-10-15 07:15:09'),
(11, 'Mesa 6', 'mesa6@email.com', '$2y$10$x6UIX66tBhyeEKGBSg5k1ua4piAzVAE7EzA5jHtQpqyK2E3CCEhE.', NULL, '2018-10-15 07:17:18', '2018-10-15 07:17:18'),
(12, 'Mesa 7', 'mesa7@email.com', '$2y$10$lBSZZp2Ln/CvMFzFGyD81eW4lYFrByMFv4VIKk5Gf4BBXWb89mnSi', NULL, '2018-10-15 07:17:56', '2018-10-15 07:17:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mesas_user_id_foreign` (`user_id`),
  ADD KEY `mesas_atendente_id_foreign` (`atendente_id`),
  ADD KEY `mesas_status_id_foreign` (`status_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mesas`
--
ALTER TABLE `mesas`
  ADD CONSTRAINT `mesas_atendente_id_foreign` FOREIGN KEY (`atendente_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `mesas_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `mesas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
