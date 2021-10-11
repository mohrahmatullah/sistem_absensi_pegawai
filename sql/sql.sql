-- Adminer 4.8.1 MySQL 8.0.26 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE `attendance` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_out` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `attendance` (`id`, `nik`, `date_time`, `in_out`, `created_at`, `updated_at`) VALUES
(1,	'36090902930940293',	'2021-10-11 14:00:55',	'2021-10-11 14:00:55',	'2021-10-11 14:00:55',	'2021-10-11 14:00:55'),
(2,	'36019898989989898',	'2021-10-11 14:25:25',	'2021-10-11 14:25:25',	'2021-10-11 14:25:25',	'2021-10-11 14:25:25'),
(3,	'36019898989989898',	'2021-10-11 14:38:21',	'2021-10-11 14:38:21',	'2021-10-11 14:38:21',	'2021-10-11 14:38:21'),
(4,	'36090902930940293',	'2021-10-11 14:41:16',	'2021-10-11 14:41:16',	'2021-10-11 14:41:16',	'2021-10-11 14:41:16'),
(5,	'3601989898998989823',	'2021-10-11 14:48:52',	'2021-10-11 14:48:52',	'2021-10-11 14:48:52',	'2021-10-11 14:48:52'),
(6,	'3601989898998989823',	'2021-10-11 14:53:46',	'2021-10-11 14:53:46',	'2021-10-11 14:53:46',	'2021-10-11 14:53:46');

DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `companies_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `companies` (`id`, `name`, `email`, `logo`, `website`, `created_at`, `updated_at`) VALUES
(1,	'Daridanke',	'daridanke@email.com',	'Null',	'https://daridanke.com',	NULL,	NULL);

DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int unsigned NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `employees` (`id`, `nik`, `first_name`, `last_name`, `company_id`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1,	'36090902930940293',	'moh',	'rahmatullah',	1,	'rahmat@email.com',	'083876854003',	'pandeglang',	NULL,	NULL),
(2,	'36019898989989898',	'Raja',	'Sanusi',	1,	'raja@email.com',	'08998398983',	'Tangerangs',	'2021-10-09 08:04:33',	'2021-10-09 08:05:40'),
(3,	'3601989898998989823',	'Nur',	'Fitri',	1,	'fitri@email.com',	'9081',	'pandeglang',	'2021-10-11 14:43:36',	'2021-10-11 14:43:36');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2021_06_19_083941_create_companies_table',	1),
(3,	'2021_06_19_084001_create_employees_table',	1),
(4,	'2021_06_20_082458_create_roles_table',	1),
(5,	'2021_06_20_082652_create_role_users_table',	1),
(6,	'2021_10_09_063546_create_attendance_table',	1);

DROP TABLE IF EXISTS `role_users`;
CREATE TABLE `role_users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `role_users_user_id_role_id_unique` (`user_id`,`role_id`),
  KEY `role_users_role_id_foreign` (`role_id`),
  CONSTRAINT `role_users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `role_users` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1,	1,	2,	NULL,	NULL),
(2,	2,	1,	NULL,	NULL);

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'user',	NULL,	NULL),
(2,	'admin',	NULL,	NULL);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'admin',	'admin@admin.com',	'$2y$10$2TZvSayx.0jdVizDa0wzZOkofzdDBxTWVDTtvFEt/tDYU0X8ukYKi',	NULL,	NULL,	NULL),
(2,	'user',	'user@user.com',	'$2y$10$UXRSjbOXwF86FwqH4memoeqR3bwT95XkoTq4CbkaLnjTw/no1rHA2',	NULL,	NULL,	NULL);

-- 2021-10-11 15:49:02
