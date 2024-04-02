-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2024 at 01:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logistic`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `fuel_report`
--

CREATE TABLE `fuel_report` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `date` date NOT NULL,
  `price_per_liter` decimal(8,2) NOT NULL,
  `liters` decimal(8,2) NOT NULL,
  `total_cost` decimal(10,2) NOT NULL,
  `vehicle_odometer` bigint(20) UNSIGNED NOT NULL,
  `fuel_type` varchar(255) NOT NULL,
  `fuel_brand` varchar(255) NOT NULL,
  `fuel_receipt` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incidents_report`
--

CREATE TABLE `incidents_report` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `vehicle` varchar(255) NOT NULL,
  `vehicle_engine_no` varchar(255) NOT NULL,
  `incident_date` date NOT NULL,
  `incident_time` time NOT NULL,
  `other_name` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `other_address` varchar(255) DEFAULT NULL,
  `incident_location` varchar(255) NOT NULL,
  `incident_description` text NOT NULL,
  `incident_photo` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incidents_report`
--

INSERT INTO `incidents_report` (`id`, `user_id`, `vehicle_id`, `firstname`, `lastname`, `profile_photo_path`, `name`, `phone_number`, `address`, `vehicle`, `vehicle_engine_no`, `incident_date`, `incident_time`, `other_name`, `number`, `other_address`, `incident_location`, `incident_description`, `incident_photo`, `created_at`, `updated_at`) VALUES
(1, 3, 4, 'Raffy', 'Limbo', 'https://ui-avatars.com/api/?name=Raffy+Limbo', 'rafy asdas', '1212121', 'asdsadsadada', 'Honda', '2121', '2024-03-31', '01:27:00', NULL, '1231', NULL, 'dasdsad', 'dasdasdsa', NULL, '2024-04-01 09:27:08', '2024-04-01 09:27:08'),
(2, 3, 4, 'Raffy', 'Limbo', 'https://ui-avatars.com/api/?name=Raffy+Limbo', '213131sadasdas', '12321', 'asdsadas', 'Honda', '32131321', '2024-03-31', '01:28:00', NULL, '232131', NULL, 'aasdasd', 'asdasdasdasd', NULL, '2024-04-01 09:28:14', '2024-04-01 09:28:14'),
(3, 3, 4, 'Raffy', 'Limbo', 'https://ui-avatars.com/api/?name=Raffy+Limbo', 'Raffy Limbo', '2313321', 'asdasdas', 'Honda', '12321adsa', '2024-03-31', '01:30:00', 'sadasd', '12123231', '1asdsa231', 'asdasdsa', 'adasdsada', NULL, '2024-04-01 09:30:51', '2024-04-01 09:30:51');

-- --------------------------------------------------------

--
-- Table structure for table `lms_g47_request_vehicle`
--

CREATE TABLE `lms_g47_request_vehicle` (
  `request_id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` varchar(20) DEFAULT NULL,
  `date_request` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lms_g47_request_vehicle`
--

INSERT INTO `lms_g47_request_vehicle` (`request_id`, `vehicle_id`, `date_request`, `status`) VALUES
(3, '1', '2024-03-21 05:35:42', 'REQUEST VEHICLE'),
(4, '1</', '2024-03-21 05:35:50', 'DONE');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_schedule`
--

CREATE TABLE `maintenance_schedule` (
  `report_id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_type` varchar(50) NOT NULL,
  `engine_no` varchar(50) NOT NULL,
  `issues` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `date_issue` date NOT NULL,
  `vehicle_odometer` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `completion_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2024_02_08_000000_create_users_table', 1),
(3, '2024_02_08_100000_create_password_reset_tokens_table', 1),
(4, '2024_02_08_200000_add_two_factor_columns_to_users_table', 1),
(5, '2024_02_10_100139_restriction', 1),
(6, '2024_02_15_000000_create_failed_jobs_table', 1),
(7, '2024_02_27_114645_create_sessions_table', 1),
(8, '2024_02_28_133138_create_permission_tables', 1),
(9, '2024_03_16_101238_vehicle_info', 1),
(10, '2024_03_17_163312_create_operators_table', 1),
(11, '2024_03_24_163241_schedule', 1),
(12, '2024_03_27_164957_vehicle_report', 1),
(13, '2024_03_29_150616_create_lms_g47_request_vehicle_table', 1),
(14, '2024_03_29_153925_fuel_report', 1),
(15, '2024_03_30_120652_maintenance_schedule', 1),
(16, '2024_04_01_104332_incidents_report', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Table structure for table `operators`
--

CREATE TABLE `operators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `vehicle_id` varchar(255) DEFAULT NULL,
  `vehicles_id` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `vehicle_brand` varchar(255) DEFAULT NULL,
  `plate_number` varchar(255) DEFAULT NULL,
  `vehicle_type` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operators`
--

INSERT INTO `operators` (`id`, `user_id`, `vehicle_id`, `vehicles_id`, `firstname`, `lastname`, `vehicle_brand`, `plate_number`, `vehicle_type`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(1, '3', '4', '364211', 'Raffy', 'Limbo', 'Honda', 'EVM386', 'Motorcycle', '09435488895', 'active', '2024-04-01 09:26:35', '2024-04-01 09:26:35'),
(2, '5', '3', '647319', 'Juan', 'Delecruz', 'Toyota', 'FN3H55', 'Sedan', '09286343067', 'active', '2024-04-01 09:58:13', '2024-04-01 09:58:13'),
(3, '5', '3', '647319', 'Juan', 'Delecruz', 'Toyota', 'FN3H55', 'Sedan', '09286343067', 'active', '2024-04-01 09:58:14', '2024-04-01 09:58:14');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create-role', 'web', '2024-04-01 09:26:16', '2024-04-01 09:26:16'),
(2, 'edit-role', 'web', '2024-04-01 09:26:16', '2024-04-01 09:26:16'),
(3, 'delete-role', 'web', '2024-04-01 09:26:16', '2024-04-01 09:26:16'),
(4, 'create-user', 'web', '2024-04-01 09:26:16', '2024-04-01 09:26:16'),
(5, 'edit-user', 'web', '2024-04-01 09:26:16', '2024-04-01 09:26:16'),
(6, 'delete-user', 'web', '2024-04-01 09:26:16', '2024-04-01 09:26:16'),
(7, 'show-only', 'web', '2024-04-01 09:26:16', '2024-04-01 09:26:16');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(5, 'App\\Models\\User', 2, 'MyAppToken', '3116b1bd7d858396e72b5d6bba1878fc8257e7197fb894830221173fa330c55d', '[\"*\"]', NULL, NULL, '2024-04-01 09:49:34', '2024-04-01 09:49:34');

-- --------------------------------------------------------

--
-- Table structure for table `restriction`
--

CREATE TABLE `restriction` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codes` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restriction`
--

INSERT INTO `restriction` (`id`, `codes`, `name`, `created_at`, `updated_at`) VALUES
(1, 'A', 'MOTORCYCLE', '2024-04-01 09:26:20', '2024-04-01 09:26:20'),
(2, 'B', 'CAR UP TO 5000 KGS GVW/ 8 SEATS', '2024-04-01 09:26:20', '2024-04-01 09:26:20'),
(3, 'B1', 'CAR UP TO 5000 KGS GVW/ 9  OR MORE SEATS', '2024-04-01 09:26:20', '2024-04-01 09:26:20'),
(4, 'B2', 'GOODS ≤ 3500 KGS GVW', '2024-04-01 09:26:20', '2024-04-01 09:26:20'),
(5, 'C', 'GOODS > 3500 KGS GVW', '2024-04-01 09:26:20', '2024-04-01 09:26:20'),
(6, 'BE', 'TRAILERS ≤ 3500 KGS', '2024-04-01 09:26:20', '2024-04-01 09:26:20'),
(7, 'CE', 'ARTICULATED C > 3500 KGS COMBINED GVW', '2024-04-01 09:26:20', '2024-04-01 09:26:20');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2024-04-01 09:26:16', '2024-04-01 09:26:16'),
(2, 'Admin', 'web', '2024-04-01 09:26:17', '2024-04-01 09:26:17'),
(3, 'Driver', 'web', '2024-04-01 09:26:17', '2024-04-01 09:26:17');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(4, 2),
(5, 2),
(6, 2),
(7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `schedule_id` int(11) DEFAULT 0,
  `order_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `driver_name` varchar(255) DEFAULT NULL,
  `shipping_date` varchar(255) DEFAULT NULL,
  `route_name` varchar(255) DEFAULT NULL,
  `start_point` varchar(255) DEFAULT NULL,
  `end_point` varchar(255) DEFAULT NULL,
  `waypoints` text DEFAULT NULL,
  `status` enum('pending','in_transit','delivered','cancelled') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('gFdY67ZlDOj4Tw4T3axzfal9kPKki1lFGLhkCx0N', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTo2OntzOjM6InVybCI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9pbmNpZGVudC1yZXBvcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiamt3b1kyUzdPamxYMHgxS2tySGcwTVkwc09mNFQ2cW9Kc2RZZ2xsMSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiRyRVI1SUp6U0VlZnVzLi9QZWwuWTNldG1VQi4wcTg1UEVBanBJY3JucFUzNFFJVnEyOVFuUyI7fQ==', 1711995437);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `dlcodes` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `name`, `email`, `phone`, `address`, `google_id`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `usertype`, `status`, `dlcodes`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Super Admin', 'superadmin@gmail.com', NULL, NULL, NULL, '2024-04-01 09:26:17', '$2y$12$g7nPSkHEaWlpJYrhtnrvN.Rx2D2dhG97hWu6jShb5BPRVXNtN4IG.', NULL, NULL, NULL, 'fEkrAnI6lD', NULL, '../assets/img/avatars/admin.png', 'admin', 'active', NULL, '2024-04-01 09:26:17', '2024-04-01 09:26:17'),
(2, NULL, NULL, 'Admin', 'admin@gmail.com', NULL, NULL, NULL, '2024-04-01 09:26:18', '$2y$12$rER5IJzSEefus./Pel.Y3etmUB.0q85PEAjpIcrnpU34QIVq29QnS', NULL, NULL, NULL, 'EOuJiwOeptttDlj1Fat12DxnE0zB0fGshDfXxXWlOqozFxcwqfVEFBbvqxCZ', NULL, '../assets/img/avatars/admin.png', 'admin', 'active', NULL, '2024-04-01 09:26:18', '2024-04-01 09:26:18'),
(3, 'Raffy', 'Limbo', 'Raffy', 'raffy@gmail.com', '09435488895', 'BLGU Payatas PIO, Quezon City, Philippines. A 80 929 els agrada', NULL, '2024-04-01 09:26:19', '$2y$12$2RUADUXIS99B6xJUHnhYHusAnLq3fKgCV1wZj6MP06oIuB4ZYM54m', NULL, NULL, NULL, 'tN7PfmO56Z5TXkF7dgKP1b9O0IbjGuwWz5BXQoeCXIxzT3NyRXdqP5AmZCpu', NULL, 'https://ui-avatars.com/api/?name=Raffy+Limbo', 'user', 'inactive', '1', '2024-04-01 09:26:19', '2024-04-01 09:26:35'),
(4, 'Jake', 'Bartolay', 'Jake', 'jake@gmail.com', '09435489822', 'Lot 103-117 Alabang-Zapote Road corner Filinvest Ave., Westgate Alabang, Muntinlupa M.M', NULL, '2024-04-01 09:26:19', '$2y$12$zON9lyCWooUCYnvtQZ3HPuOzZ.WDu8xEj4t6162wQ9vpwCz290dFC', NULL, NULL, NULL, 'oIK1o7pdkd', NULL, 'https://ui-avatars.com/api/?name=Jake+Bartolay', 'user', 'active', '1', '2024-04-01 09:26:19', '2024-04-01 09:26:19'),
(5, 'Juan', 'Delecruz', 'Juan Delecruz', 'juandelecruz@gmail.com', '09286343067', '3/F Jade Building, 335 Senator Gil Puyat Avenue', NULL, '2024-04-01 09:26:20', '$2y$12$hMfyXfxnJKwQJp89SZ6YGe32I/zjXkQrC/6S8eXZZ3zvkHcunvIAu', NULL, NULL, NULL, 'BkKvGrRcSi', NULL, 'https://ui-avatars.com/api/?name=Juan+Delecruz', 'user', 'inactive', '2', '2024-04-01 09:26:20', '2024-04-01 09:58:13');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_info`
--

CREATE TABLE `vehicle_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` varchar(255) NOT NULL,
  `vehicle_brand` varchar(255) NOT NULL,
  `year_model` varchar(255) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `plate_number` varchar(255) NOT NULL,
  `load_capacity` varchar(255) NOT NULL,
  `status` enum('available','unavailable') NOT NULL DEFAULT 'available',
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_info`
--

INSERT INTO `vehicle_info` (`id`, `vehicle_id`, `vehicle_brand`, `year_model`, `vehicle_type`, `plate_number`, `load_capacity`, `status`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, '210065', 'Ford', '2015', 'SUV', 'USQ-280', '1575.56', 'available', '../assets/img/vehicle/ford-suv.jpg', '2024-04-01 09:26:20', '2024-04-01 09:26:20'),
(2, '879145', 'Subaru', '2003', 'Truck', 'NNI-193', '2833.51', 'available', '../assets/img/vehicle/subaru-truck.jpg', '2024-04-01 09:26:20', '2024-04-01 09:26:20'),
(3, '647319', 'Toyota', '2015', 'Sedan', 'FN3H55', '1795.53', 'unavailable', '../assets/img/vehicle/toyota-sedan.jpg', '2024-04-01 09:26:20', '2024-04-01 09:58:13'),
(4, '364211', 'Honda', '2016', 'Motorcycle', 'EVM386', '210.52', 'unavailable', '../assets/img/vehicle/honda-click.jpg', '2024-04-01 09:26:20', '2024-04-01 09:26:35'),
(5, '342179', 'Nissan', '2012', 'SUV', 'GLU178', '1636.62', 'available', '../assets/img/vehicle/nissan-suv.jpg', '2024-04-01 09:26:20', '2024-04-01 09:26:20'),
(6, '731468', 'Mitsubishi', '2018', 'SUV', 'PU658L6', '2010.11', 'available', '../assets/img/vehicle/mitsubishi-suv.jpg', '2024-04-01 09:26:20', '2024-04-01 09:26:20'),
(7, '186425', 'Audi', '2019', 'Sedan', 'DRD8346', '1700.66', 'available', '../assets/img/vehicle/audi-sedan.jpg', '2024-04-01 09:26:20', '2024-04-01 09:26:20'),
(8, '672459', 'Volvo', '2022', 'Truck', 'FJ8Q71', '18000.52', 'available', '../assets/img/vehicle/volvo-truck.jpg', '2024-04-01 09:26:20', '2024-04-01 09:26:20'),
(9, '3104698', 'Acura', '2019', 'Truck', 'DRD8346', '20000.12', 'available', '../assets/img/vehicle/acura-truck.jpg', '2024-04-01 09:26:20', '2024-04-01 09:26:20'),
(10, '912756', 'Yamaha', '2020', 'Motorcycle', 'JL7V64', '175.2', 'available', '../assets/img/vehicle/yamaha-mio.jpg', '2024-04-01 09:26:20', '2024-04-01 09:26:20');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_report`
--

CREATE TABLE `vehicle_report` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `date` date NOT NULL,
  `maintenance_cost` decimal(10,2) DEFAULT NULL,
  `maintenance_receipt` varchar(255) DEFAULT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `vehicle_engine_no` varchar(255) NOT NULL,
  `vehicle_condition` varchar(255) NOT NULL,
  `vehicle_odometer` decimal(10,2) NOT NULL,
  `vehicle_issues` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `fuel_report`
--
ALTER TABLE `fuel_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incidents_report`
--
ALTER TABLE `incidents_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lms_g47_request_vehicle`
--
ALTER TABLE `lms_g47_request_vehicle`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `maintenance_schedule`
--
ALTER TABLE `maintenance_schedule`
  ADD PRIMARY KEY (`report_id`);

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
-- Indexes for table `operators`
--
ALTER TABLE `operators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `restriction`
--
ALTER TABLE `restriction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vehicle_info_vehicle_id_unique` (`vehicle_id`);

--
-- Indexes for table `vehicle_report`
--
ALTER TABLE `vehicle_report`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fuel_report`
--
ALTER TABLE `fuel_report`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incidents_report`
--
ALTER TABLE `incidents_report`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lms_g47_request_vehicle`
--
ALTER TABLE `lms_g47_request_vehicle`
  MODIFY `request_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `maintenance_schedule`
--
ALTER TABLE `maintenance_schedule`
  MODIFY `report_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `operators`
--
ALTER TABLE `operators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `restriction`
--
ALTER TABLE `restriction`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vehicle_report`
--
ALTER TABLE `vehicle_report`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
