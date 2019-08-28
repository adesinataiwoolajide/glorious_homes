-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2019 at 07:26 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` int(11) DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_id`, `subject_type`, `causer_id`, `causer_type`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'default', 'created', 8, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Sule Lamido\",\"email\":\"hope@gmail.cm\"}}', '2019-05-22 10:36:56', '2019-05-22 10:36:56'),
(2, 'default', 'deleted', 8, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Sule Lamido\",\"email\":\"hope@gmail.cm\"}}', '2019-05-22 10:38:00', '2019-05-22 10:38:00'),
(3, 'default', 'updated', 4, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Samson Ajibade\",\"email\":\"simiyu@gmail.com\"},\"old\":{\"name\":\"Samson\",\"email\":\"simiyu@gmail.com\"}}', '2019-05-22 10:39:09', '2019-05-22 10:39:09'),
(4, 'default', 'deleted', 7, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Distribute\",\"email\":\"doctor@gmail.com\",\"deleted_at\":\"22-05-2019\"}}', '2019-05-22 10:40:21', '2019-05-22 10:40:21'),
(5, 'default', 'Restored', 8, 'App\\User', 1, 'App\\User', '{\"name\":\"Sule Lamido\",\"email\":\"hope@gmail.cm\"}', '2019-05-22 10:44:05', '2019-05-22 10:44:05'),
(6, 'default', 'restored', 7, 'App\\User', 1, 'App\\User', '{\"name\":\"Distribute\",\"email\":\"doctor@gmail.com\"}', '2019-05-22 10:44:51', '2019-05-22 10:44:51'),
(7, 'default', 'restored', 6, 'App\\User', 1, 'App\\User', '{\"name\":\"Goke Demmy\",\"email\":\"testone@gmail.com\"}', '2019-05-22 10:45:00', '2019-05-22 10:45:00'),
(8, 'default', 'view profile', 1, 'App\\User', 1, 'App\\User', '{\"name\":\"Adesina Taiwo Victor\",\"email\":\"administrator@gmail.com\"}', '2019-05-22 10:47:38', '2019-05-22 10:47:38'),
(9, 'default', 'view profile', 1, 'App\\User', 1, 'App\\User', '{\"name\":\"Adesina Taiwo Victor\",\"email\":\"administrator@gmail.com\"}', '2019-05-22 10:49:32', '2019-05-22 10:49:32'),
(10, 'default', 'updated', 1, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\",\"deleted_at\":\"22-05-2019\"},\"old\":{\"name\":\"Adesina Taiwo Victor\",\"email\":\"administrator@gmail.com\",\"deleted_at\":\"22-05-2019\"}}', '2019-05-22 10:49:38', '2019-05-22 10:49:38'),
(11, 'default', 'updated profile', 1, 'App\\User', 1, 'App\\User', '{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\"}', '2019-05-22 10:49:59', '2019-05-22 10:49:59'),
(12, 'default', 'reset password', 1, 'App\\User', 1, 'App\\User', '{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\"}', '2019-05-22 10:51:30', '2019-05-22 10:51:30'),
(13, 'default', 'updated', 1, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\",\"deleted_at\":\"22-05-2019\"},\"old\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\",\"deleted_at\":\"22-05-2019\"}}', '2019-05-22 10:51:53', '2019-05-22 10:51:53'),
(14, 'default', 'updated', 1, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\",\"deleted_at\":\"22-05-2019\"},\"old\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\",\"deleted_at\":\"22-05-2019\"}}', '2019-05-22 10:52:12', '2019-05-22 10:52:12'),
(15, 'default', 'updated', 1, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\",\"deleted_at\":\"22-05-2019\"},\"old\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\",\"deleted_at\":\"22-05-2019\"}}', '2019-05-22 10:52:49', '2019-05-22 10:52:49'),
(16, 'default', 'updated', 1, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\",\"deleted_at\":\"22-05-2019\"},\"old\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\",\"deleted_at\":\"22-05-2019\"}}', '2019-05-22 10:53:11', '2019-05-22 10:53:11'),
(17, 'default', 'updated', 1, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\",\"deleted_at\":\"22-05-2019\"},\"old\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\",\"deleted_at\":\"22-05-2019\"}}', '2019-05-22 10:59:31', '2019-05-22 10:59:31'),
(18, 'default', 'updated', 1, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\",\"deleted_at\":\"22-05-2019\"},\"old\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\",\"deleted_at\":\"22-05-2019\"}}', '2019-05-22 11:00:00', '2019-05-22 11:00:00'),
(19, 'default', 'updated', 1, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\",\"deleted_at\":\"22-05-2019\"},\"old\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\",\"deleted_at\":\"22-05-2019\"}}', '2019-05-22 11:00:20', '2019-05-22 11:00:20'),
(20, 'default', 'updated', 1, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\",\"deleted_at\":\"22-05-2019\"},\"old\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\",\"deleted_at\":\"22-05-2019\"}}', '2019-05-22 11:00:40', '2019-05-22 11:00:40'),
(21, 'default', 'created', 1, 'App\\AgentCategories', 1, 'App\\User', '{\"attributes\":{\"agent_category_name\":\"Estate Agent\"}}', '2019-05-22 13:49:34', '2019-05-22 13:49:34'),
(22, 'default', 'created', 2, 'App\\AgentCategories', 1, 'App\\User', '{\"attributes\":{\"agent_category_name\":\"Builder\"}}', '2019-05-22 13:50:09', '2019-05-22 13:50:09'),
(23, 'default', 'created', 3, 'App\\AgentCategories', 1, 'App\\User', '{\"attributes\":{\"agent_category_name\":\"Estate Valuer\"}}', '2019-05-22 14:11:10', '2019-05-22 14:11:10'),
(24, 'default', 'updated', 2, 'App\\AgentCategories', 1, 'App\\User', '{\"attributes\":{\"agent_category_name\":\"Builders\"},\"old\":{\"agent_category_name\":\"Builder\"}}', '2019-05-22 14:15:47', '2019-05-22 14:15:47'),
(25, 'default', 'updated', 2, 'App\\AgentCategories', 1, 'App\\User', '{\"attributes\":{\"agent_category_name\":\"Builder\"},\"old\":{\"agent_category_name\":\"Builders\"}}', '2019-05-22 14:17:13', '2019-05-22 14:17:13'),
(26, 'default', 'updated', 1, 'App\\AgentCategories', 1, 'App\\User', '{\"attributes\":{\"agent_category_name\":\"Estate Agentm\"},\"old\":{\"agent_category_name\":\"Estate Agent\"}}', '2019-05-22 14:20:05', '2019-05-22 14:20:05'),
(27, 'default', 'updated', 1, 'App\\AgentCategories', 1, 'App\\User', '{\"attributes\":{\"agent_category_name\":\"Estate Agent\"},\"old\":{\"agent_category_name\":\"Estate Agentm\"}}', '2019-05-22 14:21:31', '2019-05-22 14:21:31'),
(28, 'default', 'deleted', 2, 'App\\AgentCategories', 1, 'App\\User', '{\"attributes\":{\"agent_category_name\":\"Builder\"}}', '2019-05-22 14:28:58', '2019-05-22 14:28:58'),
(29, 'default', 'deleted', 1, 'App\\AgentCategories', 1, 'App\\User', '{\"attributes\":{\"agent_category_name\":\"Estate Agent\"}}', '2019-05-22 14:29:05', '2019-05-22 14:29:05'),
(30, 'default', 'deleted', 3, 'App\\AgentCategories', 1, 'App\\User', '{\"attributes\":{\"agent_category_name\":\"Estate Valuer\"}}', '2019-05-22 14:29:12', '2019-05-22 14:29:12'),
(31, 'default', 'created', 1, 'App\\AgentCategories', 1, 'App\\User', '{\"attributes\":{\"agent_category_name\":\"Estate Agent\"}}', '2019-05-22 14:30:37', '2019-05-22 14:30:37'),
(32, 'default', 'updated', 1, 'App\\AgentCategories', 1, 'App\\User', '{\"attributes\":{\"agent_category_name\":\"Estate Agents\"},\"old\":{\"agent_category_name\":\"Estate Agent\"}}', '2019-05-22 14:31:12', '2019-05-22 14:31:12'),
(33, 'default', 'created', 2, 'App\\AgentCategories', 1, 'App\\User', '{\"attributes\":{\"agent_category_name\":\"Estate Valuer\"}}', '2019-05-22 14:37:39', '2019-05-22 14:37:39'),
(34, 'default', 'deleted', 2, 'App\\AgentCategories', 1, 'App\\User', '{\"attributes\":{\"agent_category_name\":\"Estate Valuer\"}}', '2019-05-22 14:37:54', '2019-05-22 14:37:54'),
(35, 'default', 'updated', 1, 'App\\AgentCategories', 1, 'App\\User', '{\"attributes\":{\"agent_category_name\":\"Estate Agent\"},\"old\":{\"agent_category_name\":\"Estate Agents\"}}', '2019-05-22 14:39:09', '2019-05-22 14:39:09'),
(36, 'default', 'created', 3, 'App\\AgentCategories', 1, 'App\\User', '{\"attributes\":{\"agent_category_name\":\"Builder\"}}', '2019-05-22 14:39:26', '2019-05-22 14:39:26'),
(37, 'default', 'created', 4, 'App\\AgentCategories', 1, 'App\\User', '{\"attributes\":{\"agent_category_name\":\"Photographer\"}}', '2019-05-22 14:39:39', '2019-05-22 14:39:39'),
(38, 'default', 'created', 5, 'App\\AgentCategories', 1, 'App\\User', '{\"attributes\":{\"agent_category_name\":\"Buyer\'s Agent\"}}', '2019-05-22 14:41:27', '2019-05-22 14:41:27'),
(39, 'default', 'created', 6, 'App\\AgentCategories', 1, 'App\\User', '{\"attributes\":{\"agent_category_name\":\"Seller\'s (listing) Agent\"}}', '2019-05-22 14:41:43', '2019-05-22 14:41:43'),
(40, 'default', 'created', 7, 'App\\AgentCategories', 1, 'App\\User', '{\"attributes\":{\"agent_category_name\":\"Dual Agent (buyer & Seller)\"}}', '2019-05-22 14:42:14', '2019-05-22 14:42:14'),
(41, 'default', 'created', 8, 'App\\AgentCategories', 1, 'App\\User', '{\"attributes\":{\"agent_category_name\":\"Transaction Coordinator\"}}', '2019-05-22 14:42:28', '2019-05-22 14:42:28'),
(42, 'default', 'created', 9, 'App\\AgentCategories', 1, 'App\\User', '{\"attributes\":{\"agent_category_name\":\"Realtor\"}}', '2019-05-22 14:42:52', '2019-05-22 14:42:52'),
(43, 'default', 'created', 10, 'App\\AgentCategories', 1, 'App\\User', '{\"attributes\":{\"agent_category_name\":\"Real Estate Broker\"}}', '2019-05-22 14:43:00', '2019-05-22 14:43:00'),
(44, 'default', 'created', 11, 'App\\AgentCategories', 1, 'App\\User', '{\"attributes\":{\"agent_category_name\":\"Associate Broker\"}}', '2019-05-22 14:43:10', '2019-05-22 14:43:10'),
(45, 'default', 'deleted', 3, 'App\\AgentCategories', 1, 'App\\User', '{\"attributes\":{\"agent_category_name\":\"Builder\"}}', '2019-05-22 14:44:30', '2019-05-22 14:44:30'),
(46, 'default', 'restored', 3, 'App\\AgentCategories', 1, 'App\\User', '{\"name\":\"Builder\",\"email\":\"administrator@gmail.com\"}', '2019-05-22 14:44:40', '2019-05-22 14:44:40'),
(47, 'default', 'deleted', 11, 'App\\AgentCategories', 1, 'App\\User', '{\"attributes\":{\"agent_category_name\":\"Associate Broker\"}}', '2019-05-22 14:46:07', '2019-05-22 14:46:07'),
(48, 'default', 'restored', 11, 'App\\AgentCategories', 1, 'App\\User', '{\"agent_category_name\":\"Associate Broker\"}', '2019-05-22 14:46:20', '2019-05-22 14:46:20'),
(49, 'default', 'created', 1, 'App\\PropertyCategories', 1, 'App\\User', '{\"attributes\":{\"property_category_name\":\"Land\"}}', '2019-05-22 15:35:57', '2019-05-22 15:35:57'),
(50, 'default', 'created', 2, 'App\\PropertyCategories', 1, 'App\\User', '{\"attributes\":{\"property_category_name\":\"Building\"}}', '2019-05-22 15:38:58', '2019-05-22 15:38:58'),
(51, 'default', 'created', 3, 'App\\PropertyCategories', 1, 'App\\User', '{\"attributes\":{\"property_category_name\":\"Shop\"}}', '2019-05-22 17:41:04', '2019-05-22 17:41:04'),
(52, 'default', 'updated', 2, 'App\\PropertyCategories', 1, 'App\\User', '{\"attributes\":{\"property_category_name\":\"\"},\"old\":{\"property_category_name\":\"Building\"}}', '2019-05-22 17:56:53', '2019-05-22 17:56:53'),
(53, 'default', 'updated', 2, 'App\\PropertyCategories', 1, 'App\\User', '{\"attributes\":{\"property_category_name\":\"Building\"},\"old\":{\"property_category_name\":\"\"}}', '2019-05-22 17:57:44', '2019-05-22 17:57:44'),
(54, 'default', 'updated', 2, 'App\\PropertyCategories', 1, 'App\\User', '{\"attributes\":{\"property_category_name\":\"Buildings\"},\"old\":{\"property_category_name\":\"Building\"}}', '2019-05-22 17:58:00', '2019-05-22 17:58:00'),
(55, 'default', 'created', 4, 'App\\PropertyCategories', 1, 'App\\User', '{\"attributes\":{\"property_category_name\":\"School\"}}', '2019-05-22 17:58:23', '2019-05-22 17:58:23'),
(56, 'default', 'deleted', 4, 'App\\PropertyCategories', 1, 'App\\User', '{\"attributes\":{\"property_category_name\":\"School\"}}', '2019-05-22 17:58:37', '2019-05-22 17:58:37'),
(57, 'default', 'restored', 4, 'App\\PropertyCategories', 1, 'App\\User', '{\"property_category_name\":\"School\"}', '2019-05-22 18:01:44', '2019-05-22 18:01:44'),
(58, 'default', 'created', 1, 'App\\PropertyTypes', 1, 'App\\User', '{\"attributes\":{\"property_type_name\":\"Single Room\"}}', '2019-05-22 18:55:52', '2019-05-22 18:55:52'),
(59, 'default', 'created', 2, 'App\\PropertyTypes', 1, 'App\\User', '{\"attributes\":{\"property_type_name\":\"Duplex\"}}', '2019-05-22 18:56:06', '2019-05-22 18:56:06'),
(60, 'default', 'created', 3, 'App\\PropertyTypes', 1, 'App\\User', '{\"attributes\":{\"property_type_name\":\"Detached\"}}', '2019-05-22 18:56:14', '2019-05-22 18:56:14'),
(61, 'default', 'created', 4, 'App\\PropertyTypes', 1, 'App\\User', '{\"attributes\":{\"property_type_name\":\"Boungalow\"}}', '2019-05-22 18:56:22', '2019-05-22 18:56:22'),
(62, 'default', 'created', 5, 'App\\PropertyTypes', 1, 'App\\User', '{\"attributes\":{\"property_type_name\":\"Room And Parlor\"}}', '2019-05-22 18:56:35', '2019-05-22 18:56:35'),
(63, 'default', 'deleted', 4, 'App\\PropertyTypes', 1, 'App\\User', '{\"attributes\":{\"property_type_name\":\"Boungalow\"}}', '2019-05-22 18:57:07', '2019-05-22 18:57:07'),
(64, 'default', 'restored', 4, 'App\\PropertyCategories', 1, 'App\\User', '{\"property_category_name\":\"School\"}', '2019-05-22 19:00:11', '2019-05-22 19:00:11'),
(65, 'default', 'created', 5, 'App\\PropertyCategories', 1, 'App\\User', '{\"attributes\":{\"property_category_name\":\"Commercial\"}}', '2019-05-22 19:01:40', '2019-05-22 19:01:40'),
(66, 'default', 'created', 6, 'App\\PropertyCategories', 1, 'App\\User', '{\"attributes\":{\"property_category_name\":\"Residential\"}}', '2019-05-22 19:01:54', '2019-05-22 19:01:54'),
(67, 'default', 'created', 1, 'App\\PropertyCategories', 1, 'App\\User', '{\"attributes\":{\"property_category_name\":\"Commercial\"}}', '2019-05-22 19:22:21', '2019-05-22 19:22:21'),
(68, 'default', 'created', 2, 'App\\PropertyCategories', 1, 'App\\User', '{\"attributes\":{\"property_category_name\":\"Residential\"}}', '2019-05-22 19:22:30', '2019-05-22 19:22:30'),
(69, 'default', 'created', 3, 'App\\PropertyCategories', 1, 'App\\User', '{\"attributes\":{\"property_category_name\":\"Land\"}}', '2019-05-22 19:22:40', '2019-05-22 19:22:40'),
(70, 'default', 'created', 4, 'App\\PropertyCategories', 1, 'App\\User', '{\"attributes\":{\"property_category_name\":\"Ware House\"}}', '2019-05-22 19:22:54', '2019-05-22 19:22:54'),
(71, 'default', 'created', 5, 'App\\PropertyCategories', 1, 'App\\User', '{\"attributes\":{\"property_category_name\":\"Office Space\"}}', '2019-05-22 19:23:29', '2019-05-22 19:23:29'),
(72, 'default', 'updated', 5, 'App\\PropertyCategories', 1, 'App\\User', '{\"attributes\":{\"property_category_name\":\"Office\\/shop Space\"},\"old\":{\"property_category_name\":\"Office Space\"}}', '2019-05-22 19:24:04', '2019-05-22 19:24:04'),
(73, 'default', 'created', 6, 'App\\PropertyCategories', 1, 'App\\User', '{\"attributes\":{\"property_category_name\":\"Mixed Use\"}}', '2019-05-22 19:24:33', '2019-05-22 19:24:33'),
(74, 'default', 'deleted', 5, 'App\\PropertyCategories', 1, 'App\\User', '{\"attributes\":{\"property_category_name\":\"Office\\/shop Space\"}}', '2019-05-22 19:25:27', '2019-05-22 19:25:27'),
(75, 'default', 'created', 1, 'App\\PropertyCategories', 1, 'App\\User', '{\"attributes\":{\"property_category_name\":\"Commercial\"}}', '2019-05-22 19:50:47', '2019-05-22 19:50:47'),
(76, 'default', 'created', 2, 'App\\PropertyCategories', 1, 'App\\User', '{\"attributes\":{\"property_category_name\":\"Residential\"}}', '2019-05-22 19:50:53', '2019-05-22 19:50:53'),
(77, 'default', 'created', 3, 'App\\PropertyCategories', 1, 'App\\User', '{\"attributes\":{\"property_category_name\":\"Ware House\"}}', '2019-05-22 19:51:04', '2019-05-22 19:51:04'),
(78, 'default', 'created', 4, 'App\\PropertyCategories', 1, 'App\\User', '{\"attributes\":{\"property_category_name\":\"Land\"}}', '2019-05-22 19:51:10', '2019-05-22 19:51:10'),
(79, 'default', 'created', 1, 'App\\PropertyTypes', 1, 'App\\User', '{\"attributes\":{\"property_type_name\":\"Duplex\",\"property_category_id\":2}}', '2019-05-22 19:54:19', '2019-05-22 19:54:19'),
(80, 'default', 'created', 2, 'App\\PropertyTypes', 1, 'App\\User', '{\"attributes\":{\"property_type_name\":\"Office\\/Shop\",\"property_category_id\":1}}', '2019-05-22 19:55:56', '2019-05-22 19:55:56'),
(81, 'default', 'created', 3, 'App\\PropertyTypes', 1, 'App\\User', '{\"attributes\":{\"property_type_name\":\"Bare Land\",\"property_category_id\":4}}', '2019-05-22 19:56:49', '2019-05-22 19:56:49'),
(82, 'default', 'created', 4, 'App\\PropertyTypes', 1, 'App\\User', '{\"attributes\":{\"property_type_name\":\"Semi Detached\",\"property_category_id\":2}}', '2019-05-22 19:58:27', '2019-05-22 19:58:27'),
(83, 'default', 'created', 5, 'App\\PropertyTypes', 1, 'App\\User', '{\"attributes\":{\"property_type_name\":\"Single Room\",\"property_category_id\":2}}', '2019-05-22 19:59:28', '2019-05-22 19:59:28'),
(84, 'default', 'created', 6, 'App\\PropertyTypes', 1, 'App\\User', '{\"attributes\":{\"property_type_name\":\"Boungalow\",\"property_category_id\":2}}', '2019-05-22 19:59:47', '2019-05-22 19:59:47'),
(85, 'default', 'created', 7, 'App\\PropertyTypes', 1, 'App\\User', '{\"attributes\":{\"property_type_name\":\"Room And Parlor\",\"property_category_id\":2}}', '2019-05-22 19:59:55', '2019-05-22 19:59:55'),
(86, 'default', 'updated', 3, 'App\\PropertyTypes', 1, 'App\\User', '{\"attributes\":{\"property_type_name\":\"Bare Lands\",\"property_category_id\":4},\"old\":{\"property_type_name\":\"Bare Land\",\"property_category_id\":4}}', '2019-05-22 20:25:05', '2019-05-22 20:25:05'),
(87, 'default', 'updated', 3, 'App\\PropertyTypes', 1, 'App\\User', '{\"attributes\":{\"property_type_name\":\"Bare Lands\",\"property_category_id\":2},\"old\":{\"property_type_name\":\"Bare Lands\",\"property_category_id\":4}}', '2019-05-22 20:25:22', '2019-05-22 20:25:22'),
(88, 'default', 'updated', 3, 'App\\PropertyTypes', 1, 'App\\User', '{\"attributes\":{\"property_type_name\":\"Bare Land\",\"property_category_id\":2},\"old\":{\"property_type_name\":\"Bare Lands\",\"property_category_id\":2}}', '2019-05-22 20:25:38', '2019-05-22 20:25:38'),
(89, 'default', 'deleted', 6, 'App\\PropertyTypes', 1, 'App\\User', '{\"attributes\":{\"property_type_name\":\"Boungalow\",\"property_category_id\":2}}', '2019-05-22 20:26:05', '2019-05-22 20:26:05'),
(90, 'default', 'restored', 6, 'App\\PropertyTypes', 1, 'App\\User', '{\"property_type_name\":\"Boungalow\",\"property_category_name\":\"Residential\"}', '2019-05-22 20:38:58', '2019-05-22 20:38:58'),
(91, 'default', 'deleted', 5, 'App\\PropertyTypes', 1, 'App\\User', '{\"attributes\":{\"property_type_name\":\"Single Room\",\"property_category_id\":2}}', '2019-05-22 20:41:00', '2019-05-22 20:41:00'),
(92, 'default', 'restored', 5, 'App\\PropertyTypes', 1, 'App\\User', '{\"property_type_name\":\"Single Room\",\"property_category_name\":\"Residential\"}', '2019-05-22 20:41:13', '2019-05-22 20:41:13'),
(93, 'default', 'created', 1, 'App\\Agent', 1, 'App\\User', '{\"attributes\":{\"agent_name\":\"Arinze Dike\",\"email\":\"dike@gmail.com\"}}', '2019-05-23 10:19:18', '2019-05-23 10:19:18'),
(94, 'default', 'created', 9, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Arinze Dike\",\"email\":\"dike@gmail.com\",\"deleted_at\":\"23-05-2019\"}}', '2019-05-23 10:19:18', '2019-05-23 10:19:18'),
(95, 'default', 'created', 2, 'App\\Agent', 1, 'App\\User', '{\"attributes\":{\"agent_name\":\"Okeke Emanuel\",\"email\":\"okeke@gmail.com\"}}', '2019-05-23 10:27:19', '2019-05-23 10:27:19'),
(96, 'default', 'created', 10, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Okeke Emanuel\",\"email\":\"okeke@gmail.com\",\"deleted_at\":\"23-05-2019\"}}', '2019-05-23 10:27:19', '2019-05-23 10:27:19'),
(97, 'default', 'created', 3, 'App\\Agent', 1, 'App\\User', '{\"attributes\":{\"agent_name\":\"Emjay Tena Kor\",\"email\":\"tenar@gmail.com\"}}', '2019-05-23 10:39:44', '2019-05-23 10:39:44'),
(98, 'default', 'created', 11, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Emjay Tena Kor\",\"email\":\"tenar@gmail.com\",\"deleted_at\":\"23-05-2019\"}}', '2019-05-23 10:39:44', '2019-05-23 10:39:44'),
(99, 'default', 'deleted', 2, 'App\\Agent', 1, 'App\\User', '{\"attributes\":{\"agent_name\":\"Okeke Emanuel\",\"email\":\"okeke@gmail.com\"}}', '2019-05-23 10:40:04', '2019-05-23 10:40:04'),
(100, 'default', 'restored', 2, 'App\\Agent', 1, 'App\\User', '{\"property_type_name\":\"Okeke Emanuel\",\"email\":\"okeke@gmail.com\"}', '2019-05-23 10:47:59', '2019-05-23 10:47:59'),
(101, 'default', 'updated', 3, 'App\\Agent', 1, 'App\\User', '{\"attributes\":{\"agent_name\":\"JohnTena Kor\",\"email\":\"tenar@gmail.com\"},\"old\":{\"agent_name\":\"Emjay Tena Kor\",\"email\":\"tenar@gmail.com\"}}', '2019-05-23 11:01:55', '2019-05-23 11:01:55'),
(102, 'default', 'updated', 3, 'App\\Agent', 1, 'App\\User', '{\"attributes\":{\"agent_name\":\"John Tena Kor\",\"email\":\"john@gmail.com\"},\"old\":{\"agent_name\":\"JohnTena Kor\",\"email\":\"tenar@gmail.com\"}}', '2019-05-23 11:03:19', '2019-05-23 11:03:19'),
(103, 'default', 'created', 1, 'App\\PropertyDocuments', 1, 'App\\User', '{\"attributes\":{\"document_name\":\"C Of O\"}}', '2019-05-23 13:45:45', '2019-05-23 13:45:45'),
(104, 'default', 'created', 2, 'App\\PropertyDocuments', 1, 'App\\User', '{\"attributes\":{\"document_name\":\"Governor Consent\"}}', '2019-05-23 13:46:00', '2019-05-23 13:46:00'),
(105, 'default', 'created', 3, 'App\\PropertyDocuments', 1, 'App\\User', '{\"attributes\":{\"document_name\":\"Deed Of Assignment\"}}', '2019-05-23 13:46:14', '2019-05-23 13:46:14'),
(106, 'default', 'created', 4, 'App\\PropertyDocuments', 1, 'App\\User', '{\"attributes\":{\"document_name\":\"Survey Plan\"}}', '2019-05-23 13:46:50', '2019-05-23 13:46:50'),
(107, 'default', 'created', 5, 'App\\PropertyDocuments', 1, 'App\\User', '{\"attributes\":{\"document_name\":\"Receipt (family Or Local Government)\"}}', '2019-05-23 13:47:04', '2019-05-23 13:47:04'),
(108, 'default', 'deleted', 1, 'App\\PropertyDocuments', 1, 'App\\User', '{\"attributes\":{\"document_name\":\"C Of O\"}}', '2019-05-23 14:08:48', '2019-05-23 14:08:48'),
(109, 'default', 'restored', 1, 'App\\PropertyDocuments', 1, 'App\\User', '{\"document_name\":\"C Of O\"}', '2019-05-23 14:11:47', '2019-05-23 14:11:47'),
(110, 'default', 'created', 6, 'App\\PropertyDocuments', 1, 'App\\User', '{\"attributes\":{\"document_name\":\"Deed Of Conveyance\"}}', '2019-05-23 14:18:44', '2019-05-23 14:18:44'),
(111, 'default', 'updated', 1, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\",\"deleted_at\":\"23-05-2019\"},\"old\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\",\"deleted_at\":\"23-05-2019\"}}', '2019-05-23 14:24:40', '2019-05-23 14:24:40'),
(112, 'default', 'updated', 3, 'App\\Agent', 1, 'App\\User', '{\"attributes\":{\"agent_name\":\"John Tena Kors\",\"email\":\"john@gmail.com\"},\"old\":{\"agent_name\":\"John Tena Kor\",\"email\":\"john@gmail.com\"}}', '2019-05-23 14:54:11', '2019-05-23 14:54:11'),
(113, 'default', 'updated', 3, 'App\\Agent', 1, 'App\\User', '{\"attributes\":{\"agent_name\":\"John Tena Kor\",\"email\":\"john@gmail.com\"},\"old\":{\"agent_name\":\"John Tena Kors\",\"email\":\"john@gmail.com\"}}', '2019-05-23 14:55:09', '2019-05-23 14:55:09'),
(114, 'default', 'updated', 3, 'App\\Agent', 1, 'App\\User', '{\"attributes\":{\"agent_name\":\"John Tena Kors\",\"email\":\"john@gmail.com\"},\"old\":{\"agent_name\":\"John Tena Kor\",\"email\":\"john@gmail.com\"}}', '2019-05-23 14:58:14', '2019-05-23 14:58:14'),
(115, 'default', 'updated', 3, 'App\\Agent', 1, 'App\\User', '{\"attributes\":{\"agent_name\":\"John Tena Kors\",\"email\":\"john@gmail.com\"},\"old\":{\"agent_name\":\"John Tena Kors\",\"email\":\"john@gmail.com\"}}', '2019-05-23 14:59:41', '2019-05-23 14:59:41'),
(116, 'default', 'deleted', 2, 'App\\Agent', 1, 'App\\User', '{\"attributes\":{\"agent_name\":\"Okeke Emanuel\",\"email\":\"okeke@gmail.com\"}}', '2019-05-23 16:18:43', '2019-05-23 16:18:43'),
(117, 'default', 'restored', 2, 'App\\Agent', 1, 'App\\User', '{\"property_type_name\":\"Okeke Emanuel\",\"email\":\"okeke@gmail.com\"}', '2019-05-23 16:18:59', '2019-05-23 16:18:59'),
(118, 'default', 'created', 12, 'App\\AgentCategories', 1, 'App\\User', '{\"attributes\":{\"agent_category_name\":\"Test\"}}', '2019-05-24 07:51:03', '2019-05-24 07:51:03'),
(119, 'default', 'created', 1, 'App\\Properties', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"C682480E\",\"agent_id\":3}}', '2019-05-27 08:47:21', '2019-05-27 08:47:21'),
(120, 'default', 'created', 2, 'App\\Properties', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"76BDF05C\",\"agent_id\":2}}', '2019-05-27 08:52:25', '2019-05-27 08:52:25'),
(121, 'default', 'created', 3, 'App\\Properties', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"74D3264E\",\"agent_id\":3}}', '2019-05-27 08:53:53', '2019-05-27 08:53:53'),
(122, 'default', 'created', 4, 'App\\Properties', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"DBE15A3F\",\"agent_id\":3}}', '2019-05-27 09:00:06', '2019-05-27 09:00:06'),
(123, 'default', 'created', 1, 'App\\Properties', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"A8BD49B6\",\"agent_id\":3}}', '2019-05-27 09:19:41', '2019-05-27 09:19:41'),
(124, 'default', 'created', 1, 'App\\Properties', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"EA833F39\",\"agent_id\":3}}', '2019-05-27 10:00:49', '2019-05-27 10:00:49'),
(125, 'default', 'created', 2, 'App\\Properties', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"7E68EED7\",\"agent_id\":1}}', '2019-05-28 15:41:00', '2019-05-28 15:41:00'),
(126, 'default', 'created', 3, 'App\\Properties', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"4221858F\",\"agent_id\":1}}', '2019-05-28 15:43:29', '2019-05-28 15:43:29'),
(127, 'default', 'created', 2, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"4221858F\"}}', '2019-05-28 15:43:29', '2019-05-28 15:43:29'),
(128, 'default', 'created', 3, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"4221858F\"}}', '2019-05-28 15:43:29', '2019-05-28 15:43:29'),
(129, 'default', 'created', 4, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"4221858F\"}}', '2019-05-28 15:43:29', '2019-05-28 15:43:29'),
(130, 'default', 'created', 5, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"4221858F\"}}', '2019-05-28 15:43:30', '2019-05-28 15:43:30'),
(131, 'default', 'created', 6, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"4221858F\"}}', '2019-05-28 15:43:30', '2019-05-28 15:43:30'),
(132, 'default', 'created', 7, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"4221858F\"}}', '2019-05-28 15:43:30', '2019-05-28 15:43:30'),
(133, 'default', 'created', 8, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"4221858F\"}}', '2019-05-28 15:43:30', '2019-05-28 15:43:30'),
(134, 'default', 'created', 9, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"4221858F\"}}', '2019-05-28 15:43:30', '2019-05-28 15:43:30'),
(135, 'default', 'created', 10, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"4221858F\"}}', '2019-05-28 15:43:30', '2019-05-28 15:43:30'),
(136, 'default', 'created', 4, 'App\\Properties', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"997F0AC7\",\"agent_id\":2}}', '2019-05-28 15:45:54', '2019-05-28 15:45:54'),
(137, 'default', 'created', 11, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"997F0AC7\"}}', '2019-05-28 15:45:54', '2019-05-28 15:45:54'),
(138, 'default', 'created', 12, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"997F0AC7\"}}', '2019-05-28 15:45:54', '2019-05-28 15:45:54'),
(139, 'default', 'created', 13, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"997F0AC7\"}}', '2019-05-28 15:45:54', '2019-05-28 15:45:54'),
(140, 'default', 'created', 14, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"997F0AC7\"}}', '2019-05-28 15:45:55', '2019-05-28 15:45:55'),
(141, 'default', 'created', 15, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"997F0AC7\"}}', '2019-05-28 15:45:55', '2019-05-28 15:45:55'),
(142, 'default', 'created', 16, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"997F0AC7\"}}', '2019-05-28 15:45:55', '2019-05-28 15:45:55'),
(143, 'default', 'created', 17, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"997F0AC7\"}}', '2019-05-28 15:45:55', '2019-05-28 15:45:55'),
(144, 'default', 'created', 18, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"997F0AC7\"}}', '2019-05-28 15:45:55', '2019-05-28 15:45:55'),
(145, 'default', 'created', 19, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"997F0AC7\"}}', '2019-05-28 15:45:55', '2019-05-28 15:45:55'),
(146, 'default', 'created', 5, 'App\\Properties', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"821687BBFA\",\"agent_id\":3}}', '2019-05-29 07:32:47', '2019-05-29 07:32:47'),
(147, 'default', 'created', 20, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"821687BBFA\"}}', '2019-05-29 07:32:48', '2019-05-29 07:32:48'),
(148, 'default', 'created', 21, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"821687BBFA\"}}', '2019-05-29 07:32:48', '2019-05-29 07:32:48'),
(149, 'default', 'created', 22, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"821687BBFA\"}}', '2019-05-29 07:32:48', '2019-05-29 07:32:48'),
(150, 'default', 'created', 23, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"821687BBFA\"}}', '2019-05-29 07:32:48', '2019-05-29 07:32:48'),
(151, 'default', 'created', 24, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"821687BBFA\"}}', '2019-05-29 07:32:48', '2019-05-29 07:32:48'),
(152, 'default', 'created', 25, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"821687BBFA\"}}', '2019-05-29 07:32:48', '2019-05-29 07:32:48'),
(153, 'default', 'updated', 3, 'App\\Properties', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"4221858F\",\"agent_id\":1},\"old\":{\"property_number\":\"4221858F\",\"agent_id\":1}}', '2019-05-29 08:59:43', '2019-05-29 08:59:43'),
(154, 'default', 'updated', 3, 'App\\Properties', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"4221858F\",\"agent_id\":2},\"old\":{\"property_number\":\"4221858F\",\"agent_id\":1}}', '2019-05-29 09:02:36', '2019-05-29 09:02:36'),
(155, 'default', 'updated', 3, 'App\\Properties', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"4221858F\",\"agent_id\":2},\"old\":{\"property_number\":\"4221858F\",\"agent_id\":2}}', '2019-05-29 09:03:30', '2019-05-29 09:03:30'),
(156, 'default', 'updated', 3, 'App\\Properties', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"4221858F\",\"agent_id\":2},\"old\":{\"property_number\":\"4221858F\",\"agent_id\":2}}', '2019-05-29 09:03:53', '2019-05-29 09:03:53'),
(157, 'default', 'created', 26, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"4221858F\"}}', '2019-05-29 09:04:25', '2019-05-29 09:04:25'),
(158, 'default', 'created', 27, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"4221858F\"}}', '2019-05-29 09:04:25', '2019-05-29 09:04:25'),
(159, 'default', 'created', 28, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"4221858F\"}}', '2019-05-29 09:04:25', '2019-05-29 09:04:25'),
(160, 'default', 'created', 29, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"4221858F\"}}', '2019-05-29 09:04:26', '2019-05-29 09:04:26'),
(161, 'default', 'deleted', 29, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"4221858F\"}}', '2019-05-29 09:26:15', '2019-05-29 09:26:15'),
(162, 'default', 'deleted', 28, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"4221858F\"}}', '2019-05-29 09:26:26', '2019-05-29 09:26:26'),
(163, 'default', 'updated', 3, 'App\\Properties', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"4221858F\",\"agent_id\":2},\"old\":{\"property_number\":\"4221858F\",\"agent_id\":2}}', '2019-05-29 09:36:32', '2019-05-29 09:36:32'),
(164, 'default', 'updated', 5, 'App\\Properties', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"821687BBFA\",\"agent_id\":3},\"old\":{\"property_number\":\"821687BBFA\",\"agent_id\":3}}', '2019-05-29 09:38:06', '2019-05-29 09:38:06'),
(165, 'default', 'updated', 4, 'App\\Properties', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"997F0AC7\",\"agent_id\":2},\"old\":{\"property_number\":\"997F0AC7\",\"agent_id\":2}}', '2019-05-29 09:38:38', '2019-05-29 09:38:38'),
(166, 'default', 'updated', 2, 'App\\Properties', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"7E68EED7\",\"agent_id\":1},\"old\":{\"property_number\":\"7E68EED7\",\"agent_id\":1}}', '2019-05-29 09:39:14', '2019-05-29 09:39:14'),
(167, 'default', 'created', 30, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"821687BBFA\"}}', '2019-05-29 09:39:55', '2019-05-29 09:39:55'),
(168, 'default', 'created', 31, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"821687BBFA\"}}', '2019-05-29 09:39:55', '2019-05-29 09:39:55'),
(169, 'default', 'updated', 5, 'App\\Properties', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"821687BBFA\",\"agent_id\":3},\"old\":{\"property_number\":\"821687BBFA\",\"agent_id\":3}}', '2019-05-29 09:41:08', '2019-05-29 09:41:08'),
(170, 'default', 'updated', 5, 'App\\Properties', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"821687BBFA\",\"agent_id\":3},\"old\":{\"property_number\":\"821687BBFA\",\"agent_id\":3}}', '2019-05-29 09:42:11', '2019-05-29 09:42:11'),
(171, 'default', 'deleted', 16, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"997F0AC7\"}}', '2019-05-29 09:44:14', '2019-05-29 09:44:14'),
(172, 'default', 'updated', 3, 'App\\Agent', 1, 'App\\User', '{\"attributes\":{\"agent_name\":\"John Tena Kor\",\"email\":\"john@gmail.com\"},\"old\":{\"agent_name\":\"John Tena Kors\",\"email\":\"john@gmail.com\"}}', '2019-05-29 09:48:45', '2019-05-29 09:48:45'),
(173, 'default', 'updated', 10, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Okeke Emanuel\",\"email\":\"okeke@gmail.com\",\"deleted_at\":\"29-05-2019\"},\"old\":{\"name\":\"Okeke Emanuel\",\"email\":\"okeke@gmail.com\",\"deleted_at\":\"29-05-2019\"}}', '2019-05-29 10:18:26', '2019-05-29 10:18:26'),
(174, 'default', 'updated', 4, 'App\\Properties', 10, 'App\\User', '{\"attributes\":{\"property_number\":\"997F0AC7\",\"agent_id\":2},\"old\":{\"property_number\":\"997F0AC7\",\"agent_id\":2}}', '2019-05-29 11:56:02', '2019-05-29 11:56:02'),
(175, 'default', 'updated', 4, 'App\\Properties', 10, 'App\\User', '{\"attributes\":{\"property_number\":\"997F0AC7\",\"agent_id\":2},\"old\":{\"property_number\":\"997F0AC7\",\"agent_id\":2}}', '2019-05-29 11:59:51', '2019-05-29 11:59:51'),
(176, 'default', 'updated', 4, 'App\\Properties', 10, 'App\\User', '{\"attributes\":{\"property_number\":\"997F0AC7\",\"agent_id\":2},\"old\":{\"property_number\":\"997F0AC7\",\"agent_id\":2}}', '2019-05-29 12:00:16', '2019-05-29 12:00:16'),
(177, 'default', 'updated', 4, 'App\\Properties', 10, 'App\\User', '{\"attributes\":{\"property_number\":\"997F0AC7\",\"agent_id\":2},\"old\":{\"property_number\":\"997F0AC7\",\"agent_id\":2}}', '2019-05-29 12:00:35', '2019-05-29 12:00:35'),
(178, 'default', 'created', 32, 'App\\PropertyImages', 10, 'App\\User', '{\"attributes\":{\"property_number\":\"997F0AC7\"}}', '2019-05-29 12:00:36', '2019-05-29 12:00:36'),
(179, 'default', 'updated', 4, 'App\\Properties', 10, 'App\\User', '{\"attributes\":{\"property_number\":\"997F0AC7\",\"agent_id\":2},\"old\":{\"property_number\":\"997F0AC7\",\"agent_id\":2}}', '2019-05-29 12:01:15', '2019-05-29 12:01:15'),
(180, 'default', 'updated', 3, 'App\\Properties', 10, 'App\\User', '{\"attributes\":{\"property_number\":\"4221858F\",\"agent_id\":2},\"old\":{\"property_number\":\"4221858F\",\"agent_id\":2}}', '2019-05-29 12:02:21', '2019-05-29 12:02:21'),
(181, 'default', 'updated', 2, 'App\\Agent', 10, 'App\\User', '{\"attributes\":{\"agent_name\":\"Okeke Emanuel\",\"email\":\"okeke@gmail.com\"},\"old\":{\"agent_name\":\"Okeke Emanuel\",\"email\":\"okeke@gmail.com\"}}', '2019-05-29 12:25:58', '2019-05-29 12:25:58'),
(182, 'default', 'created', 33, 'App\\PropertyImages', 10, 'App\\User', '{\"attributes\":{\"property_number\":\"4221858F\"}}', '2019-05-29 13:06:05', '2019-05-29 13:06:05'),
(183, 'default', 'created', 34, 'App\\PropertyImages', 10, 'App\\User', '{\"attributes\":{\"property_number\":\"4221858F\"}}', '2019-05-29 13:06:05', '2019-05-29 13:06:05'),
(184, 'default', 'created', 6, 'App\\Properties', 10, 'App\\User', '{\"attributes\":{\"property_number\":\"4860C1AF89\",\"agent_id\":2}}', '2019-05-29 13:21:11', '2019-05-29 13:21:11'),
(185, 'default', 'created', 35, 'App\\PropertyImages', 10, 'App\\User', '{\"attributes\":{\"property_number\":\"4860C1AF89\"}}', '2019-05-29 13:21:11', '2019-05-29 13:21:11'),
(186, 'default', 'created', 36, 'App\\PropertyImages', 10, 'App\\User', '{\"attributes\":{\"property_number\":\"4860C1AF89\"}}', '2019-05-29 13:21:12', '2019-05-29 13:21:12'),
(187, 'default', 'created', 37, 'App\\PropertyImages', 10, 'App\\User', '{\"attributes\":{\"property_number\":\"4860C1AF89\"}}', '2019-05-29 13:21:12', '2019-05-29 13:21:12'),
(188, 'default', 'created', 38, 'App\\PropertyImages', 10, 'App\\User', '{\"attributes\":{\"property_number\":\"4860C1AF89\"}}', '2019-05-29 13:21:12', '2019-05-29 13:21:12'),
(189, 'default', 'created', 39, 'App\\PropertyImages', 10, 'App\\User', '{\"attributes\":{\"property_number\":\"4860C1AF89\"}}', '2019-05-29 13:21:13', '2019-05-29 13:21:13'),
(190, 'default', 'created', 40, 'App\\PropertyImages', 10, 'App\\User', '{\"attributes\":{\"property_number\":\"4860C1AF89\"}}', '2019-05-29 13:21:13', '2019-05-29 13:21:13'),
(191, 'default', 'created', 41, 'App\\PropertyImages', 10, 'App\\User', '{\"attributes\":{\"property_number\":\"4860C1AF89\"}}', '2019-05-29 13:21:14', '2019-05-29 13:21:14'),
(192, 'default', 'deleted', 37, 'App\\PropertyImages', 10, 'App\\User', '{\"attributes\":{\"property_number\":\"4860C1AF89\"}}', '2019-05-29 13:21:44', '2019-05-29 13:21:44'),
(193, 'default', 'created', 7, 'App\\Properties', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"AB30B64B1F\",\"agent_id\":3,\"purpose\":\"Rent\"}}', '2019-05-29 13:42:53', '2019-05-29 13:42:53'),
(194, 'default', 'created', 42, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"AB30B64B1F\"}}', '2019-05-29 13:42:53', '2019-05-29 13:42:53'),
(195, 'default', 'created', 43, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"AB30B64B1F\"}}', '2019-05-29 13:42:53', '2019-05-29 13:42:53'),
(196, 'default', 'created', 44, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"AB30B64B1F\"}}', '2019-05-29 13:42:54', '2019-05-29 13:42:54'),
(197, 'default', 'created', 45, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"AB30B64B1F\"}}', '2019-05-29 13:42:54', '2019-05-29 13:42:54'),
(198, 'default', 'created', 46, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"AB30B64B1F\"}}', '2019-05-29 13:42:54', '2019-05-29 13:42:54'),
(199, 'default', 'created', 47, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"AB30B64B1F\"}}', '2019-05-29 13:42:54', '2019-05-29 13:42:54'),
(200, 'default', 'created', 48, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"EA833F39\"}}', '2019-05-29 13:48:12', '2019-05-29 13:48:12'),
(201, 'default', 'created', 49, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"EA833F39\"}}', '2019-05-29 13:48:12', '2019-05-29 13:48:12'),
(202, 'default', 'created', 50, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"EA833F39\"}}', '2019-05-29 13:48:12', '2019-05-29 13:48:12'),
(203, 'default', 'created', 51, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"EA833F39\"}}', '2019-05-29 13:48:12', '2019-05-29 13:48:12'),
(204, 'default', 'created', 52, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"EA833F39\"}}', '2019-05-29 13:48:12', '2019-05-29 13:48:12'),
(205, 'default', 'created', 53, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"EA833F39\"}}', '2019-05-29 13:48:12', '2019-05-29 13:48:12'),
(206, 'default', 'created', 54, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"EA833F39\"}}', '2019-05-29 13:48:12', '2019-05-29 13:48:12'),
(207, 'default', 'created', 55, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"EA833F39\"}}', '2019-05-29 13:48:13', '2019-05-29 13:48:13'),
(208, 'default', 'updated', 1, 'App\\Properties', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"EA833F39\",\"agent_id\":3,\"purpose\":\"Lease\"},\"old\":{\"property_number\":\"EA833F39\",\"agent_id\":3,\"purpose\":\"Rent\"}}', '2019-05-29 13:50:03', '2019-05-29 13:50:03'),
(209, 'default', 'updated', 7, 'App\\Properties', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"AB30B64B1F\",\"agent_id\":3,\"purpose\":\"Sell\"},\"old\":{\"property_number\":\"AB30B64B1F\",\"agent_id\":3,\"purpose\":\"Rent\"}}', '2019-05-29 13:50:20', '2019-05-29 13:50:20'),
(210, 'default', 'created', 1, 'App\\Facilities', 1, 'App\\User', '{\"attributes\":{\"facility_name\":\"1\"}}', '2019-06-01 09:34:20', '2019-06-01 09:34:20'),
(211, 'default', 'created', 2, 'App\\Facilities', 1, 'App\\User', '{\"attributes\":{\"facility_name\":\"2\"}}', '2019-06-01 09:34:55', '2019-06-01 09:34:55'),
(212, 'default', 'created', 3, 'App\\Facilities', 1, 'App\\User', '{\"attributes\":{\"facility_name\":\"3\"}}', '2019-06-01 09:36:17', '2019-06-01 09:36:17'),
(213, 'default', 'created', 4, 'App\\Facilities', 1, 'App\\User', '{\"attributes\":{\"facility_name\":\"4\"}}', '2019-06-01 09:36:31', '2019-06-01 09:36:31'),
(214, 'default', 'updated', 1, 'App\\Facilities', 1, 'App\\User', '{\"attributes\":{\"facility_name\":\"Bore Hole Water\"},\"old\":{\"facility_name\":\"Bore Hole\"}}', '2019-06-01 10:17:58', '2019-06-01 10:17:58'),
(215, 'default', 'created', 5, 'App\\Facilities', 1, 'App\\User', '{\"attributes\":{\"facility_name\":\"Swimming Pool\"}}', '2019-06-01 10:18:07', '2019-06-01 10:18:07'),
(216, 'default', 'created', 6, 'App\\Facilities', 1, 'App\\User', '{\"attributes\":{\"facility_name\":\"Table Tennis Court\"}}', '2019-06-01 10:18:19', '2019-06-01 10:18:19'),
(217, 'default', 'deleted', 5, 'App\\Facilities', 1, 'App\\User', '{\"attributes\":{\"facility_name\":\"Swimming Pool\"}}', '2019-06-01 10:23:06', '2019-06-01 10:23:06'),
(218, 'default', 'restored', 5, 'App\\Facilities', 1, 'App\\User', '{\"facility_name\":\"Swimming Pool\",\"email\":null}', '2019-06-01 10:23:58', '2019-06-01 10:23:58'),
(219, 'default', 'created', 8, 'App\\Properties', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"8E2EF68689\",\"agent_id\":2,\"purpose\":\"Rent\"}}', '2019-06-01 11:38:02', '2019-06-01 11:38:02'),
(220, 'default', 'created', 56, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"8E2EF68689\"}}', '2019-06-01 11:38:02', '2019-06-01 11:38:02'),
(221, 'default', 'created', 57, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"8E2EF68689\"}}', '2019-06-01 11:38:02', '2019-06-01 11:38:02'),
(222, 'default', 'created', 58, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"8E2EF68689\"}}', '2019-06-01 11:38:02', '2019-06-01 11:38:02'),
(223, 'default', 'created', 59, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"8E2EF68689\"}}', '2019-06-01 11:38:03', '2019-06-01 11:38:03'),
(224, 'default', 'created', 60, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"8E2EF68689\"}}', '2019-06-01 11:38:03', '2019-06-01 11:38:03'),
(225, 'default', 'updated', 8, 'App\\Properties', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"8E2EF68689\",\"agent_id\":2,\"purpose\":\"Rent\"},\"old\":{\"property_number\":\"8E2EF68689\",\"agent_id\":2,\"purpose\":\"Rent\"}}', '2019-06-01 11:42:24', '2019-06-01 11:42:24'),
(226, 'default', 'updated', 7, 'App\\Properties', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"AB30B64B1F\",\"agent_id\":3,\"purpose\":\"Sell\"},\"old\":{\"property_number\":\"AB30B64B1F\",\"agent_id\":3,\"purpose\":\"Sell\"}}', '2019-06-01 11:44:00', '2019-06-01 11:44:00'),
(227, 'default', 'updated', 7, 'App\\Properties', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"AB30B64B1F\",\"agent_id\":3,\"purpose\":\"Sell\"},\"old\":{\"property_number\":\"AB30B64B1F\",\"agent_id\":3,\"purpose\":\"Sell\"}}', '2019-06-01 11:46:21', '2019-06-01 11:46:21'),
(228, 'default', 'updated', 5, 'App\\Properties', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"821687BBFA\",\"agent_id\":3,\"purpose\":\"Sell\"},\"old\":{\"property_number\":\"821687BBFA\",\"agent_id\":3,\"purpose\":\"Sell\"}}', '2019-06-01 11:46:55', '2019-06-01 11:46:55'),
(229, 'default', 'created', 61, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"8E2EF68689\"}}', '2019-06-01 11:51:40', '2019-06-01 11:51:40'),
(230, 'default', 'created', 62, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"8E2EF68689\"}}', '2019-06-01 11:51:40', '2019-06-01 11:51:40'),
(231, 'default', 'created', 63, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"8E2EF68689\"}}', '2019-06-01 11:51:40', '2019-06-01 11:51:40'),
(232, 'default', 'created', 64, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"8E2EF68689\"}}', '2019-06-01 11:51:40', '2019-06-01 11:51:40'),
(233, 'default', 'created', 65, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"8E2EF68689\"}}', '2019-06-01 11:51:41', '2019-06-01 11:51:41'),
(234, 'default', 'deleted', 59, 'App\\PropertyImages', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"8E2EF68689\"}}', '2019-06-01 11:52:04', '2019-06-01 11:52:04'),
(235, 'default', 'deleted', 8, 'App\\Properties', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"8E2EF68689\",\"agent_id\":2,\"purpose\":\"Rent\"}}', '2019-06-01 12:03:38', '2019-06-01 12:03:38'),
(236, 'default', 'restored', 2, 'App\\Agent', 1, 'App\\User', '{\"property_type_name\":\"Okeke Emanuel\",\"email\":\"okeke@gmail.com\"}', '2019-06-01 12:11:20', '2019-06-01 12:11:20'),
(237, 'default', 'restored', 8, 'App\\Properties', 1, 'App\\User', '{\"property_name\":\"Destiny\",\"purpose\":\"Rent\",\"property_number\":\"8E2EF68689\"}', '2019-06-01 14:25:59', '2019-06-01 14:25:59'),
(238, 'default', 'deleted', 1, 'App\\Properties', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"EA833F39\",\"agent_id\":3,\"purpose\":\"Lease\"}}', '2019-06-01 14:32:43', '2019-06-01 14:32:43'),
(239, 'default', 'restored', 1, 'App\\Properties', 1, 'App\\User', '{\"property_name\":\"Property One\",\"purpose\":\"Lease\",\"property_number\":\"EA833F39\"}', '2019-06-01 14:34:12', '2019-06-01 14:34:12'),
(240, 'default', 'deleted', 2, 'App\\Properties', 1, 'App\\User', '{\"attributes\":{\"property_number\":\"7E68EED7\",\"agent_id\":1,\"purpose\":\"Lease\"}}', '2019-06-01 14:34:28', '2019-06-01 14:34:28'),
(241, 'default', 'reset password', 1, 'App\\User', 1, 'App\\User', '{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\"}', '2019-06-01 14:38:57', '2019-06-01 14:38:57'),
(242, 'default', 'created', 13, 'App\\AgentCategories', 1, 'App\\User', '{\"attributes\":{\"agent_category_name\":\"Home Inspectors\"}}', '2019-06-03 14:49:06', '2019-06-03 14:49:06'),
(243, 'default', 'created', 4, 'App\\Agent', 1, 'App\\User', '{\"attributes\":{\"agent_name\":\"Adesina Taiwo Olajide\",\"email\":\"olajide@gmail.com\"}}', '2019-06-03 18:21:37', '2019-06-03 18:21:37'),
(244, 'default', 'created', 12, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"olajide@gmail.com\",\"deleted_at\":\"03-06-2019\"}}', '2019-06-03 18:21:37', '2019-06-03 18:21:37'),
(245, 'default', 'created', 5, 'App\\Agent', 1, 'App\\User', '{\"attributes\":{\"agent_name\":\"Olajumoke Kenny\",\"email\":\"kenny@gmail.com\"}}', '2019-06-03 18:22:52', '2019-06-03 18:22:52'),
(246, 'default', 'created', 13, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Olajumoke Kenny\",\"email\":\"kenny@gmail.com\",\"deleted_at\":\"03-06-2019\"}}', '2019-06-03 18:22:52', '2019-06-03 18:22:52'),
(247, 'default', 'created', 6, 'App\\Agent', 1, 'App\\User', '{\"attributes\":{\"agent_name\":\"Olaniyi Adetunji\",\"email\":\"olaniyi@gmail.com\"}}', '2019-06-03 18:32:56', '2019-06-03 18:32:56'),
(248, 'default', 'created', 14, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Olaniyi Adetunji\",\"email\":\"olaniyi@gmail.com\",\"deleted_at\":\"03-06-2019\"}}', '2019-06-03 18:32:56', '2019-06-03 18:32:56'),
(249, 'default', 'updated', 4, 'App\\Agent', 1, 'App\\User', '{\"attributes\":{\"agent_name\":\"Adesina Taiwo Olajide\",\"email\":\"olajide@gmail.com\"},\"old\":{\"agent_name\":\"Adesina Taiwo Olajide\",\"email\":\"olajide@gmail.com\"}}', '2019-06-04 13:34:45', '2019-06-04 13:34:45');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_id`, `subject_type`, `causer_id`, `causer_type`, `properties`, `created_at`, `updated_at`) VALUES
(250, 'default', 'deleted', 4, 'App\\Agent', 1, 'App\\User', '{\"attributes\":{\"agent_name\":\"Adesina Taiwo Olajide\",\"email\":\"olajide@gmail.com\"}}', '2019-06-04 13:44:16', '2019-06-04 13:44:16'),
(251, 'default', 'restored', 4, 'App\\Agent', 1, 'App\\User', '{\"property_type_name\":\"Adesina Taiwo Olajide\",\"email\":\"olajide@gmail.com\"}', '2019-06-04 13:48:47', '2019-06-04 13:48:47'),
(252, 'default', 'updated', 1, 'App\\Agent', 1, 'App\\User', '{\"attributes\":{\"agent_name\":\"Arinze Dike\",\"email\":\"dike@gmail.com\"},\"old\":{\"agent_name\":\"Arinze Dike\",\"email\":\"dike@gmail.com\"}}', '2019-06-04 13:49:07', '2019-06-04 13:49:07'),
(253, 'default', 'created', 9, 'App\\Properties', 10, 'App\\User', '{\"attributes\":{\"property_number\":\"F3126AC039\",\"agent_id\":2,\"purpose\":\"Lease\"}}', '2019-06-04 13:57:01', '2019-06-04 13:57:01'),
(254, 'default', 'created', 66, 'App\\PropertyImages', 10, 'App\\User', '{\"attributes\":{\"property_number\":\"F3126AC039\"}}', '2019-06-04 13:57:01', '2019-06-04 13:57:01'),
(255, 'default', 'created', 67, 'App\\PropertyImages', 10, 'App\\User', '{\"attributes\":{\"property_number\":\"F3126AC039\"}}', '2019-06-04 13:57:01', '2019-06-04 13:57:01'),
(256, 'default', 'created', 68, 'App\\PropertyImages', 10, 'App\\User', '{\"attributes\":{\"property_number\":\"F3126AC039\"}}', '2019-06-04 13:57:01', '2019-06-04 13:57:01'),
(257, 'default', 'created', 69, 'App\\PropertyImages', 10, 'App\\User', '{\"attributes\":{\"property_number\":\"F3126AC039\"}}', '2019-06-04 13:57:02', '2019-06-04 13:57:02'),
(258, 'default', 'created', 70, 'App\\PropertyImages', 10, 'App\\User', '{\"attributes\":{\"property_number\":\"F3126AC039\"}}', '2019-06-04 13:57:02', '2019-06-04 13:57:02'),
(259, 'default', 'created', 71, 'App\\PropertyImages', 10, 'App\\User', '{\"attributes\":{\"property_number\":\"F3126AC039\"}}', '2019-06-04 13:57:02', '2019-06-04 13:57:02'),
(260, 'default', 'created', 72, 'App\\PropertyImages', 10, 'App\\User', '{\"attributes\":{\"property_number\":\"F3126AC039\"}}', '2019-06-04 13:57:02', '2019-06-04 13:57:02'),
(261, 'default', 'created', 73, 'App\\PropertyImages', 10, 'App\\User', '{\"attributes\":{\"property_number\":\"F3126AC039\"}}', '2019-06-04 13:57:02', '2019-06-04 13:57:02'),
(262, 'default', 'deleted', 66, 'App\\PropertyImages', 10, 'App\\User', '{\"attributes\":{\"property_number\":\"F3126AC039\"}}', '2019-06-04 13:57:50', '2019-06-04 13:57:50'),
(263, 'default', 'updated', 9, 'App\\Properties', 10, 'App\\User', '{\"attributes\":{\"property_number\":\"F3126AC039\",\"agent_id\":2,\"purpose\":\"Lease\"},\"old\":{\"property_number\":\"F3126AC039\",\"agent_id\":2,\"purpose\":\"Lease\"}}', '2019-06-04 13:58:20', '2019-06-04 13:58:20'),
(264, 'default', 'created', 74, 'App\\PropertyImages', 10, 'App\\User', '{\"attributes\":{\"property_number\":\"F3126AC039\"}}', '2019-06-04 13:58:20', '2019-06-04 13:58:20'),
(265, 'default', 'created', 75, 'App\\PropertyImages', 10, 'App\\User', '{\"attributes\":{\"property_number\":\"F3126AC039\"}}', '2019-06-04 13:58:20', '2019-06-04 13:58:20'),
(266, 'default', 'updated', 2, 'App\\Agent', 10, 'App\\User', '{\"attributes\":{\"agent_name\":\"Okeke Emanuel J\",\"email\":\"okeke@gmail.com\"},\"old\":{\"agent_name\":\"Okeke Emanuel\",\"email\":\"okeke@gmail.com\"}}', '2019-06-04 14:01:21', '2019-06-04 14:01:21'),
(267, 'default', 'created', 1, 'App\\AgentSubscriptions', 1, 'App\\User', '{\"attributes\":{\"agent_id\":4,\"year\":\"2019\",\"amount\":30000,\"type\":\"Half Year\",\"month\":\"6\"}}', '2019-06-07 11:29:15', '2019-06-07 11:29:15'),
(268, 'default', 'created', 2, 'App\\AgentSubscriptions', 1, 'App\\User', '{\"attributes\":{\"agent_id\":1,\"year\":\"2019\",\"amount\":60000,\"type\":\"Yearly\",\"month\":\"12\"}}', '2019-06-07 11:37:17', '2019-06-07 11:37:17'),
(269, 'default', 'updated', 1, 'App\\AgentSubscriptions', 1, 'App\\User', '{\"attributes\":{\"agent_id\":4,\"year\":\"2019\",\"amount\":60000,\"type\":\"Yearly\",\"month\":\"12\"},\"old\":{\"agent_id\":4,\"year\":\"2019\",\"amount\":30000,\"type\":\"Half Year\",\"month\":\"6\"}}', '2019-06-07 12:30:06', '2019-06-07 12:30:06'),
(270, 'default', 'updated', 1, 'App\\AgentSubscriptions', 1, 'App\\User', '{\"attributes\":{\"agent_id\":4,\"year\":\"2019\",\"amount\":15000,\"type\":\"Quarterly\",\"month\":\"3\"},\"old\":{\"agent_id\":4,\"year\":\"2019\",\"amount\":60000,\"type\":\"Yearly\",\"month\":\"12\"}}', '2019-06-07 12:30:26', '2019-06-07 12:30:26'),
(271, 'default', 'deleted', 1, 'App\\AgentSubscriptions', 1, 'App\\User', '{\"attributes\":{\"agent_id\":4,\"year\":\"2019\",\"amount\":15000,\"type\":\"Quarterly\",\"month\":\"3\"}}', '2019-06-07 12:34:35', '2019-06-07 12:34:35'),
(272, 'default', 'restored', 1, 'App\\AgentSubscriptions', 1, 'App\\User', '{\"agent_name\":\"Adesina Taiwo Olajide\",\"year\":\"2019\"}', '2019-06-07 12:46:39', '2019-06-07 12:46:39'),
(273, 'default', 'updated', 9, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Arinze Dike\",\"email\":\"dike@gmail.com\",\"deleted_at\":\"08-06-2019\"},\"old\":{\"name\":\"Arinze Dike\",\"email\":\"dike@gmail.com\",\"deleted_at\":\"08-06-2019\"}}', '2019-06-08 11:10:28', '2019-06-08 11:10:28'),
(274, 'default', 'updated', 9, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Arinze Dike\",\"email\":\"dike@gmail.com\",\"deleted_at\":\"08-06-2019\"},\"old\":{\"name\":\"Arinze Dike\",\"email\":\"dike@gmail.com\",\"deleted_at\":\"08-06-2019\"}}', '2019-06-08 11:11:29', '2019-06-08 11:11:29'),
(275, 'default', 'updated', 9, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Arinze Dike\",\"email\":\"dike@gmail.com\",\"deleted_at\":\"08-06-2019\"},\"old\":{\"name\":\"Arinze Dike\",\"email\":\"dike@gmail.com\",\"deleted_at\":\"08-06-2019\"}}', '2019-06-08 11:13:55', '2019-06-08 11:13:55'),
(276, 'default', 'reset password', 9, 'App\\User', 9, 'App\\User', '{\"name\":\"Arinze Dike\",\"email\":\"dike@gmail.com\"}', '2019-06-08 11:15:11', '2019-06-08 11:15:11'),
(277, 'default', 'view profile', 9, 'App\\User', 9, 'App\\User', '{\"name\":\"Arinze Dike\",\"email\":\"dike@gmail.com\"}', '2019-06-08 11:15:16', '2019-06-08 11:15:16'),
(278, 'default', 'view profile', 10, 'App\\User', 10, 'App\\User', '{\"name\":\"Okeke Emanuel J\",\"email\":\"okeke@gmail.com\"}', '2019-06-08 12:07:42', '2019-06-08 12:07:42'),
(279, 'default', 'view profile', 10, 'App\\User', 10, 'App\\User', '{\"name\":\"Okeke Emanuel J\",\"email\":\"okeke@gmail.com\"}', '2019-06-08 12:08:24', '2019-06-08 12:08:24'),
(280, 'default', 'created', 5, 'App\\PropertyCategories', 1, 'App\\User', '{\"attributes\":{\"property_category_name\":\"School\"}}', '2019-06-11 13:36:44', '2019-06-11 13:36:44'),
(281, 'default', 'created', 1, 'App\\ContactAgents', NULL, NULL, '{\"attributes\":{\"email\":\"Administrator@gmail.com\",\"agent_id\":2,\"phone_number\":\"09033212322\",\"content\":\"Please I Need To Inquire About A Property In Lekki\"}}', '2019-07-05 09:46:09', '2019-07-05 09:46:09'),
(282, 'default', 'created', 2, 'App\\ContactAgents', NULL, NULL, '{\"attributes\":{\"email\":\"Okeke@gmail.com\",\"agent_id\":2,\"phone_number\":\"09074847488\",\"content\":\"Please I Need To Inquire About A Property In Ibadan\"}}', '2019-07-05 09:47:12', '2019-07-05 09:47:12');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `agent_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lga` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_category_id` int(255) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`agent_id`, `agent_name`, `email`, `phone_number`, `passport`, `state`, `lga`, `agent_category_id`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Arinze Dike', 'dike@gmail.com', '09074638366', 'agent_1558610357.png', 'Lagos', 'Lagos Mainland', 1, 'The Is A Good Agent', NULL, '2019-05-23 10:19:18', '2019-06-04 13:49:07'),
(2, 'Okeke Emanuel J', 'okeke@gmail.com', '09074838778', 'agent2_1558610839.png', 'Adamawa', 'Numan', 3, 'He Is An Honest Man', NULL, '2019-05-23 10:27:19', '2019-06-04 14:01:21'),
(3, 'John Tena Kor', 'john@gmail.com', '09087644770', 'agent3_1558611584.png', 'Ekiti', 'Ijero', 4, 'He Is All Rounda', NULL, '2019-05-23 10:39:44', '2019-05-29 09:48:45'),
(4, 'Adesina Taiwo Olajide', 'olajide@gmail.com', '09072281204', 'agent-media1_1559589697.jpg', 'Osun', 'Boripe', 2, 'He Is Good At What He Does', NULL, '2019-06-03 18:21:37', '2019-06-04 13:48:46'),
(5, 'Olajumoke Kenny', 'kenny@gmail.com', '09076535733', 'agent-media2_1559589772.jpg', 'Kwara', 'Ifelodun', 13, 'She a very reliable agent', NULL, '2019-06-03 18:22:52', '2019-06-03 18:22:52'),
(6, 'Olaniyi Adetunji', 'olaniyi@gmail.com', '09044848442', 'agent4_1559590376.png', 'Ogun', 'Obafemi Owode', 13, 'He knows the in and out of the business', NULL, '2019-06-03 18:32:56', '2019-06-03 18:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `agent_categories`
--

CREATE TABLE `agent_categories` (
  `agent_category_id` bigint(20) UNSIGNED NOT NULL,
  `agent_category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agent_categories`
--

INSERT INTO `agent_categories` (`agent_category_id`, `agent_category_name`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'estate agent', '2019-05-22 14:39:09', '2019-05-22 14:30:37', NULL),
(2, 'estate valuer', '2019-05-22 14:37:54', '2019-05-22 14:37:39', NULL),
(3, 'builder', '2019-05-22 14:44:40', '2019-05-22 14:39:26', NULL),
(4, 'photographer', '2019-05-22 14:39:39', '2019-05-22 14:39:39', NULL),
(5, 'buyer\'s agent', '2019-05-22 14:41:27', '2019-05-22 14:41:27', NULL),
(6, 'seller\'s (listing) agent', '2019-05-22 14:41:43', '2019-05-22 14:41:43', NULL),
(7, 'dual agent (buyer & seller)', '2019-05-22 14:42:14', '2019-05-22 14:42:14', NULL),
(8, 'transaction coordinator', '2019-05-22 14:42:28', '2019-05-22 14:42:28', NULL),
(9, 'realtor', '2019-05-22 14:42:52', '2019-05-22 14:42:52', NULL),
(10, 'real estate broker', '2019-05-22 14:43:00', '2019-05-22 14:43:00', NULL),
(11, 'associate broker', '2019-05-22 14:46:20', '2019-05-22 14:43:10', NULL),
(12, 'Test', '2019-05-24 07:51:03', '2019-05-24 07:51:03', NULL),
(13, 'Home Inspectors', '2019-06-03 14:49:06', '2019-06-03 14:49:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `agent_subscriptions`
--

CREATE TABLE `agent_subscriptions` (
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_on` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agent_subscriptions`
--

INSERT INTO `agent_subscriptions` (`subscription_id`, `agent_id`, `year`, `amount`, `type`, `month`, `expire_on`, `deleted_at`, `updated_at`, `created_at`) VALUES
(1, 4, '2019', 15000, 'Quarterly', '3', '2019-Sep', NULL, '2019-06-07 12:46:39', '2019-06-07 11:29:14'),
(2, 1, '2019', 60000, 'Yearly', '12', '2020-Jun', NULL, '2019-06-07 11:37:17', '2019-06-07 11:37:17');

-- --------------------------------------------------------

--
-- Table structure for table `contact_agents`
--

CREATE TABLE `contact_agents` (
  `contact_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_agents`
--

INSERT INTO `contact_agents` (`contact_id`, `name`, `email`, `content`, `phone_number`, `agent_id`, `deleted_at`, `updated_at`, `created_at`) VALUES
(1, 'Samson Ajibade', 'Administrator@gmail.com', 'Please I Need To Inquire About A Property In Lekki', '09033212322', 2, NULL, '2019-07-05 09:46:09', '2019-07-05 09:46:09'),
(2, 'Adesina Taiwo Olajide', 'Okeke@gmail.com', 'Please I Need To Inquire About A Property In Ibadan', '09074847488', 2, NULL, '2019-07-05 09:47:12', '2019-07-05 09:47:12');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `facility_id` bigint(20) UNSIGNED NOT NULL,
  `facility_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`facility_id`, `facility_name`, `deleted_at`, `updated_at`, `created_at`) VALUES
(1, 'Bore Hole Water', NULL, '2019-06-01 10:17:58', '2019-06-01 09:34:19'),
(2, 'Security', NULL, '2019-06-01 09:34:55', '2019-06-01 09:34:55'),
(3, 'Pop', NULL, '2019-06-01 09:36:17', '2019-06-01 09:36:17'),
(4, 'Garage', NULL, '2019-06-01 09:36:31', '2019-06-01 09:36:31'),
(5, 'Swimming Pool', NULL, '2019-06-01 10:23:58', '2019-06-01 10:18:07'),
(6, 'Table Tennis Court', NULL, '2019-06-01 10:18:19', '2019-06-01 10:18:19');

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
(3, '2019_05_20_082405_create_permission_tables', 1),
(4, '2019_05_20_083915_create_activity_log_table', 1),
(5, '2019_05_21_145753_create_agents_table', 1),
(6, '2019_05_21_150206_create_properties_table', 1),
(7, '2019_05_21_150322_create_property_categories_table', 1),
(8, '2019_05_21_150414_create_property_facilities_table', 1),
(9, '2019_05_21_150452_create_property_images_table', 1),
(10, '2019_05_21_150608_create_agent_categories_table', 1),
(11, '2019_05_21_152131_create_property_documents_table', 1),
(12, '2019_05_21_161119_create_property_details_table', 2),
(13, '2019_05_21_161512_create_property_types_table', 2),
(14, '2019_05_27_120528_create_prop_images_table', 3),
(15, '2019_06_01_100254_create_facilities_table', 4),
(16, '2019_06_07_094138_create_agent_subscriptions_table', 5),
(17, '2019_06_07_100748_add_paid_to_amount_subscriptions', 6),
(18, '2019_07_05_093410_create_contact_agents_table', 7),
(19, '2019_07_05_100352_add_phone_number_to_contactagents', 8),
(20, '2019_07_05_104916_create_property_requests_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(2, 'App\\User', '10'),
(2, 'App\\User', '14'),
(2, 'App\\User', '9'),
(3, 'App\\User', '10'),
(3, 'App\\User', '14'),
(3, 'App\\User', '9'),
(5, 'App\\User', '10'),
(5, 'App\\User', '14'),
(5, 'App\\User', '9'),
(6, 'App\\User', '10'),
(6, 'App\\User', '14'),
(6, 'App\\User', '9'),
(7, 'App\\User', '10'),
(7, 'App\\User', '14'),
(7, 'App\\User', '9'),
(8, 'App\\User', '10'),
(8, 'App\\User', '14'),
(8, 'App\\User', '9');

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2),
(2, 'App\\User', 3),
(3, 'App\\User', 4),
(3, 'App\\User', 9),
(3, 'App\\User', 10),
(3, 'App\\User', 11),
(3, 'App\\User', 12),
(3, 'App\\User', 13),
(3, 'App\\User', 14);

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
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Add Agent', 'web', '2019-05-21 17:29:36', '2019-05-21 17:29:36'),
(2, 'Edit Agent', 'web', '2019-05-21 17:29:53', '2019-05-21 17:29:53'),
(3, 'Update Agent', 'web', '2019-05-21 17:30:02', '2019-05-21 17:30:02'),
(4, 'Delete Agent', 'web', '2019-05-21 17:30:12', '2019-05-21 17:30:12'),
(5, 'Add Properties', 'web', '2019-05-21 17:30:31', '2019-05-21 17:30:31'),
(6, 'Edit Property', 'web', '2019-05-21 17:30:38', '2019-05-21 17:30:38'),
(7, 'Update Property', 'web', '2019-05-21 17:30:47', '2019-05-21 17:30:47'),
(8, 'Delete Property', 'web', '2019-05-21 17:30:58', '2019-05-21 17:30:58'),
(9, 'Add User', 'web', '2019-05-21 17:32:53', '2019-05-21 17:32:53'),
(10, 'Edit User', 'web', '2019-05-21 17:33:31', '2019-05-21 17:33:31'),
(11, 'Update User', 'web', '2019-05-21 17:33:40', '2019-05-21 17:33:40'),
(12, 'Delete User', 'web', '2019-05-21 17:33:47', '2019-05-21 17:33:47'),
(13, 'Add Agent Category', 'web', '2019-05-21 17:34:37', '2019-05-21 17:34:37'),
(14, 'Edit Agent Category', 'web', '2019-05-21 17:34:45', '2019-05-21 17:34:45'),
(15, 'Delete Agent Category', 'web', '2019-05-21 17:34:57', '2019-05-21 17:34:57'),
(16, 'Update Agent Category', 'web', '2019-05-21 17:35:07', '2019-05-21 17:35:07'),
(17, 'Add Property Type', 'web', '2019-05-21 17:35:38', '2019-05-21 17:35:38'),
(18, 'Edit Property Type', 'web', '2019-05-21 17:35:46', '2019-05-21 17:35:46'),
(19, 'Update Property Type', 'web', '2019-05-21 17:35:59', '2019-05-21 17:35:59'),
(20, 'Delete Property Type', 'web', '2019-05-21 17:36:20', '2019-05-21 17:36:20'),
(21, 'Add Property Doc', 'web', '2019-05-21 17:36:48', '2019-05-21 17:36:48'),
(22, 'Edit Property Doc', 'web', '2019-05-21 17:36:55', '2019-05-21 17:36:55'),
(23, 'Update Property Doc', 'web', '2019-05-21 17:37:04', '2019-05-21 17:37:04'),
(24, 'Delete Property Doc', 'web', '2019-05-21 17:37:12', '2019-05-21 17:37:12'),
(25, 'Restore Agent Category', 'web', '2019-05-22 14:08:45', '2019-05-22 14:08:45'),
(26, 'Restore Property Category', 'web', '2019-05-22 14:09:00', '2019-05-22 14:09:00'),
(27, 'Restore User', 'web', '2019-05-22 14:09:09', '2019-05-22 14:09:09'),
(28, 'Restore Property', 'web', '2019-05-22 14:09:21', '2019-05-22 14:09:21'),
(29, 'Restore Property Type', 'web', '2019-05-22 14:09:33', '2019-05-22 14:09:33'),
(30, 'Add Property Category', 'web', '2019-05-22 15:33:38', '2019-05-22 15:33:38'),
(31, 'Edit Property Category', 'web', '2019-05-22 15:33:49', '2019-05-22 15:33:49'),
(32, 'Update Property Category', 'web', '2019-05-22 15:33:59', '2019-05-22 15:33:59'),
(33, 'Delete Property Category', 'web', '2019-05-22 15:34:11', '2019-05-22 15:34:11'),
(34, 'Add Document', 'web', '2019-05-23 13:37:58', '2019-05-23 13:37:58'),
(35, 'Edit Document', 'web', '2019-05-23 13:38:07', '2019-05-23 13:38:07'),
(36, 'Update Document', 'web', '2019-05-23 13:38:17', '2019-05-23 13:38:17'),
(37, 'Delete Document', 'web', '2019-05-23 13:38:25', '2019-05-23 13:38:25'),
(38, 'Restore Document', 'web', '2019-05-23 13:38:36', '2019-05-23 13:38:36'),
(39, 'Add facility', 'web', '2019-06-01 09:05:52', '2019-06-01 09:05:52'),
(40, 'Add Facility', 'web', '2019-06-01 09:06:01', '2019-06-01 09:06:01'),
(41, 'Edit Facility', 'web', '2019-06-01 09:06:08', '2019-06-01 09:06:08'),
(42, 'Update Facility', 'web', '2019-06-01 09:06:21', '2019-06-01 09:06:21'),
(43, 'Delete Facility', 'web', '2019-06-01 09:06:28', '2019-06-01 09:06:28'),
(44, 'Restore Facility', 'web', '2019-06-01 09:13:57', '2019-06-01 09:13:57'),
(45, 'Add Subscription', 'web', '2019-06-07 08:42:58', '2019-06-07 08:42:58'),
(46, 'Edit Subscription', 'web', '2019-06-07 08:43:05', '2019-06-07 08:43:05'),
(47, 'Update Subscription', 'web', '2019-06-07 08:43:23', '2019-06-07 08:43:23'),
(48, 'Delete Subscription', 'web', '2019-06-07 08:43:31', '2019-06-07 08:43:31');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `cover_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_category_id` int(255) NOT NULL,
  `property_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_id` int(11) NOT NULL,
  `property_type_id` int(255) NOT NULL,
  `status` int(1) NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facility_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_condition` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`property_id`, `cover_image`, `property_name`, `amount`, `property_category_id`, `property_number`, `size`, `longitude`, `latitude`, `document_id`, `agent_id`, `property_type_id`, `status`, `state`, `lga`, `address`, `description`, `purpose`, `facility_id`, `property_condition`, `deleted_at`, `updated_at`, `created_at`) VALUES
(1, '8970etyr59952-b600_1559118767.jpg', 'Property One', '9000000', 2, 'EA833F39', '2222 Hecters, 300msz', '1111111', '222222', 'C Of O,Deed Of Assignment,Deed Of Conveyance', 3, 2, 1, 'Edo', 'Ovia South-West', 'fajiegnsckdbk s', 'Jkanxvsvmkbai', 'Sell', '', 'Newly Renovated', NULL, '2019-06-01 14:34:12', '2019-05-27 10:00:49'),
(2, '33360sdfae3455gtyty_1559126354.jpg', 'Tush Prop', '12000', 2, '7E68EED7', '20000 Hecters, 300msz', '1111111', '222222', 'C Of O,Deed Of Assignment,Deed Of Conveyance,Governor Consent,Receipt (family Or Local Government)', 1, 1, 3, 'Kaduna', 'Zangon Kataf', 'fkjwcgniagmsgsyuadfuisduyd7gsi', 'Akjc Sjvbkhaj', 'Buy', '', 'Renovated', NULL, '2019-06-01 14:35:23', '2019-05-28 15:41:00'),
(3, '207151fdffe3456sda2134we2_1559124233.jpeg', 'New Prop', '120000', 4, '4221858F', '2000 Hecters, 300msz', '1111111', '222222', 'C Of O,Deed Of Assignment,Deed Of Conveyance,Governor Consent,Receipt (family Or Local Government)', 2, 3, 1, 'Ogun', 'Odogbolu', 'Odogbolu Beside Total Filling Station', 'This Is A Property You Don Want To Miss', 'Sell', '', 'Dilapitated', NULL, '2019-05-29 12:02:21', '2019-05-28 15:43:29'),
(4, 'Smartapartment_1559134816.jpg', 'New Property', '800000', 3, '997F0AC7', '6000 Hecters, 300msz', '1111111', '222222', 'C Of O,Deed Of Assignment', 2, 4, 1, 'Ekiti', 'Ise/Orun', 'Ibadan Iwo Road, Oyo State', 'This Is A Test Property', 'Rent', '', 'Newly Renovated', NULL, '2019-05-29 12:01:15', '2019-05-28 15:45:54'),
(5, '5330opoijhyu9776_1559126286.jpeg', 'Glorious Property House', '1200000', 1, '821687BBFA', '300 Hecters, 300msz', '1111111', '222222', 'C Of O,Governor Consent,Receipt (family Or Local Government),Survey Plan', 3, 6, 3, 'Osun', 'Boripe', 'Iragbiji Osun State', 'This Is A Superb Property', 'Sell', 'Bore Hole Water,Garage,Security', 'Dilapitated', NULL, '2019-06-01 11:46:55', '2019-05-29 07:32:47'),
(6, '458948oiu88654rd_1559139671.jpg', 'Real Apartment', '3200000', 1, '4860C1AF89', '50 Hecters', '1111111', '222222', 'C Of O,Deed Of Assignment,Deed Of Conveyance,Governor Consent,Receipt (family Or Local Government),Survey Plan', 2, 2, 1, 'Lagos', 'Lagos Island', 'Lagos Island', 'The Property Has Everything', 'Lease', '', 'Dilapitated', NULL, '2019-05-29 13:21:11', '2019-05-29 13:21:11'),
(7, '9608images5676_1559140973.jpeg', 'Hope Alive', '400000', 2, 'AB30B64B1F', '500 Hecters', '1111111', '222222', 'C Of O,Receipt (family Or Local Government),Survey Plan', 3, 6, 1, 'Imo', 'Orsu', 'Imo State Govt House', 'The Facilities Are Dope', 'Sell', 'Bore Hole Water,Pop,Security', 'Renovated', NULL, '2019-06-01 11:46:21', '2019-05-29 13:42:53'),
(8, '651914jhgytgfg098_1559392682.jpg', 'Destiny', '1200000', 2, '8E2EF68689', '500 Hecters, 300msz', '1111111', '222222', 'C Of O,Deed Of Assignment,Deed Of Conveyance,Governor Consent', 2, 1, 2, 'Ogun', 'Ogun Waterside', 'Ado Ekiti, Ekiti State', 'The Rooms Are Spacious', 'Buy', 'Swimming Pool,Table Tennis Court', 'Newly Renovated', NULL, '2019-06-01 14:25:59', '2019-06-01 11:38:02'),
(9, 'Fp-2_1559660220.jpg', 'New House', '1200000', 1, 'F3126AC039', '500 Hecters', '1111111', '222222', 'C Of O,Deed Of Assignment,Deed Of Conveyance,Receipt (family Or Local Government)', 2, 4, 1, 'Lagos', 'Ikeja', 'Mowe Ibafo', 'Ifsnlkjvshdhnfdivcjxkcvhni Duh Snv Idfjskvdhn Diuso Hndi', 'Lease', 'Swimming Pool,Table Tennis Court', 'Dilapitated', NULL, '2019-06-04 13:58:20', '2019-06-04 13:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `property_categories`
--

CREATE TABLE `property_categories` (
  `property_category_id` bigint(20) UNSIGNED NOT NULL,
  `property_category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_categories`
--

INSERT INTO `property_categories` (`property_category_id`, `property_category_name`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'commercial', '2019-05-22 19:50:47', '2019-05-22 19:50:47', NULL),
(2, 'residential', '2019-05-22 19:50:53', '2019-05-22 19:50:53', NULL),
(3, 'warehouse', '2019-05-22 19:51:04', '2019-05-22 19:51:04', NULL),
(4, 'land', '2019-05-22 19:51:10', '2019-05-22 19:51:10', NULL),
(5, 'school', '2019-06-11 13:36:43', '2019-06-11 13:36:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_details`
--

CREATE TABLE `property_details` (
  `details_id` bigint(20) UNSIGNED NOT NULL,
  `property_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `local_govt` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_documents`
--

CREATE TABLE `property_documents` (
  `document_id` bigint(20) UNSIGNED NOT NULL,
  `document_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_documents`
--

INSERT INTO `property_documents` (`document_id`, `document_name`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'c of o', '2019-05-23 14:11:46', '2019-05-23 13:45:45', NULL),
(2, 'governor consent', '2019-05-23 13:46:00', '2019-05-23 13:46:00', NULL),
(3, 'deed of assignment', '2019-05-23 13:46:14', '2019-05-23 13:46:14', NULL),
(4, 'survey plan', '2019-05-23 13:46:50', '2019-05-23 13:46:50', NULL),
(5, 'receipt (family or local government)', '2019-05-23 13:47:04', '2019-05-23 13:47:04', NULL),
(6, 'deed of conveyance', '2019-05-23 14:18:44', '2019-05-23 14:18:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_facilities`
--

CREATE TABLE `property_facilities` (
  `facility_id` bigint(20) UNSIGNED NOT NULL,
  `property_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `newly_built` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `newly_renovated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pop` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dilapidated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fenced` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `water` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `security` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `garage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `others` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_requests`
--

CREATE TABLE `property_requests` (
  `request_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lga` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_category_id` bigint(20) UNSIGNED NOT NULL,
  `minimum_budget` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maximum_budget` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_type_id` bigint(20) UNSIGNED NOT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_condition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facilities` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

CREATE TABLE `property_types` (
  `property_type_id` bigint(20) UNSIGNED NOT NULL,
  `property_type_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_category_id` int(255) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_types`
--

INSERT INTO `property_types` (`property_type_id`, `property_type_name`, `property_category_id`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'Duplex', 2, '2019-05-22 19:54:19', '2019-05-22 19:54:19', NULL),
(2, 'Office/Shop', 1, '2019-05-22 19:55:56', '2019-05-22 19:55:56', NULL),
(3, 'Bare Land', 2, '2019-05-22 20:25:38', '2019-05-22 19:56:49', NULL),
(4, 'Semi Detached', 2, '2019-05-22 19:58:27', '2019-05-22 19:58:27', NULL),
(5, 'Single Room', 2, '2019-05-22 20:41:12', '2019-05-22 19:59:28', NULL),
(6, 'Boungalow', 2, '2019-05-22 20:38:58', '2019-05-22 19:59:47', NULL),
(7, 'Room And Parlor', 2, '2019-05-22 19:59:55', '2019-05-22 19:59:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prop_images`
--

CREATE TABLE `prop_images` (
  `image_id` bigint(20) UNSIGNED NOT NULL,
  `property_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prop_images`
--

INSERT INTO `prop_images` (`image_id`, `property_number`, `image`, `deleted_at`, `updated_at`, `created_at`) VALUES
(2, '4221858F', 'fp-1 - Copy_1559061809.jpg', NULL, '2019-05-28 15:43:29', '2019-05-28 15:43:29'),
(3, '4221858F', 'fp-2 - Copy_1559061809.jpg', NULL, '2019-05-28 15:43:29', '2019-05-28 15:43:29'),
(4, '4221858F', 'fp-3 - Copy_1559061809.jpg', NULL, '2019-05-28 15:43:29', '2019-05-28 15:43:29'),
(5, '4221858F', 'fp-4 - Copy_1559061810.jpg', NULL, '2019-05-28 15:43:30', '2019-05-28 15:43:30'),
(6, '4221858F', 'fp-5 - Copy_1559061810.jpg', NULL, '2019-05-28 15:43:30', '2019-05-28 15:43:30'),
(7, '4221858F', 'fp-6 - Copy_1559061810.jpg', NULL, '2019-05-28 15:43:30', '2019-05-28 15:43:30'),
(8, '4221858F', 'fp-7 - Copy_1559061810.jpg', NULL, '2019-05-28 15:43:30', '2019-05-28 15:43:30'),
(9, '4221858F', 'fp-8 - Copy_1559061810.jpg', NULL, '2019-05-28 15:43:30', '2019-05-28 15:43:30'),
(10, '4221858F', 'fp-9 - Copy_1559061810.jpg', NULL, '2019-05-28 15:43:30', '2019-05-28 15:43:30'),
(11, '997F0AC7', '71dfb10d-1516cb6f5f5dfea_1559061954.jpg', NULL, '2019-05-28 15:45:54', '2019-05-28 15:45:54'),
(12, '997F0AC7', '646dfertty45546453_1559061954.jpg', NULL, '2019-05-28 15:45:54', '2019-05-28 15:45:54'),
(13, '997F0AC7', '2940dfertty45546453_1559061954.jpg', NULL, '2019-05-28 15:45:54', '2019-05-28 15:45:54'),
(14, '997F0AC7', '4705images5676_1559061955.jpeg', NULL, '2019-05-28 15:45:55', '2019-05-28 15:45:55'),
(15, '997F0AC7', '5330opoijhyu9776_1559061955.jpeg', NULL, '2019-05-28 15:45:55', '2019-05-28 15:45:55'),
(16, '997F0AC7', '6528imagesdwrw456_1559061955.jpeg', '2019-05-29 09:44:14', '2019-05-29 09:44:14', '2019-05-28 15:45:55'),
(17, '997F0AC7', '7958imagesdwrw456_1559061955.jpeg', NULL, '2019-05-28 15:45:55', '2019-05-28 15:45:55'),
(18, '997F0AC7', '66112oiu878uygf567_1559061955.jpeg', NULL, '2019-05-28 15:45:55', '2019-05-28 15:45:55'),
(19, '997F0AC7', '66346oiu88654rd_1559061955.jpg', NULL, '2019-05-28 15:45:55', '2019-05-28 15:45:55'),
(20, '821687BBFA', '71862oiu878uygf567_1559118767.jpeg', NULL, '2019-05-29 07:32:48', '2019-05-29 07:32:48'),
(21, '821687BBFA', '73332hsystgftr_1559118768.jpg', NULL, '2019-05-29 07:32:48', '2019-05-29 07:32:48'),
(22, '821687BBFA', '73484jhgytgfg098_1559118768.jpg', NULL, '2019-05-29 07:32:48', '2019-05-29 07:32:48'),
(23, '821687BBFA', '77868dfasdf33435342_1559118768.jpeg', NULL, '2019-05-29 07:32:48', '2019-05-29 07:32:48'),
(24, '821687BBFA', '78678jusyhfd_1559118768.jpg', NULL, '2019-05-29 07:32:48', '2019-05-29 07:32:48'),
(25, '821687BBFA', '80202oiu878uygf567_1559118768.jpeg', NULL, '2019-05-29 07:32:48', '2019-05-29 07:32:48'),
(26, '4221858F', '940143dfasdf33435342_1559124265.jpeg', NULL, '2019-05-29 09:04:25', '2019-05-29 09:04:25'),
(27, '4221858F', '940220images42345634sdfdf_1559124265.jpeg', NULL, '2019-05-29 09:04:25', '2019-05-29 09:04:25'),
(28, '4221858F', '943307dfasdf33435342_1559124265.jpeg', NULL, '2019-05-29 09:26:26', '2019-05-29 09:04:25'),
(29, '4221858F', '944036oiu88654rd_1559124265.jpg', NULL, '2019-05-29 09:26:15', '2019-05-29 09:04:25'),
(30, '821687BBFA', '861126imagessdw56773_1559126395.jpeg', NULL, '2019-05-29 09:39:55', '2019-05-29 09:39:55'),
(31, '821687BBFA', '870942dfertty45546453_1559126395.jpg', NULL, '2019-05-29 09:39:55', '2019-05-29 09:39:55'),
(32, '997F0AC7', 'smartcribpix1_1559134835.jpg', NULL, '2019-05-29 12:00:35', '2019-05-29 12:00:35'),
(33, '4221858F', '553473jusyhfd_1559138765.jpg', NULL, '2019-05-29 13:06:05', '2019-05-29 13:06:05'),
(34, '4221858F', '556587images42345634sdfdf_1559138765.jpeg', NULL, '2019-05-29 13:06:05', '2019-05-29 13:06:05'),
(35, '4860C1AF89', '73132971dfb10d-1516cb6f5f5dfea_1559139671.jpg', NULL, '2019-05-29 13:21:11', '2019-05-29 13:21:11'),
(36, '4860C1AF89', 'images42345634sdfdf_1559139672.jpeg', NULL, '2019-05-29 13:21:12', '2019-05-29 13:21:12'),
(37, '4860C1AF89', 'jhgytgfg098_1559139672.jpg', '2019-05-29 13:21:44', '2019-05-29 13:21:44', '2019-05-29 13:21:12'),
(38, '4860C1AF89', 'oiu878uygf567_1559139672.jpeg', NULL, '2019-05-29 13:21:12', '2019-05-29 13:21:12'),
(39, '4860C1AF89', 'smartapartments_1559139672.jpg', NULL, '2019-05-29 13:21:12', '2019-05-29 13:21:12'),
(40, '4860C1AF89', 'smartcribpix_1559139673.jpg', NULL, '2019-05-29 13:21:13', '2019-05-29 13:21:13'),
(41, '4860C1AF89', 'smartcribpix1_1559139673.jpg', NULL, '2019-05-29 13:21:13', '2019-05-29 13:21:13'),
(42, 'AB30B64B1F', '2940dfertty45546453_1559140973.jpg', NULL, '2019-05-29 13:42:53', '2019-05-29 13:42:53'),
(43, 'AB30B64B1F', '8184etyr59952-b600_1559140973.jpg', NULL, '2019-05-29 13:42:53', '2019-05-29 13:42:53'),
(44, 'AB30B64B1F', '82713dfasdf33435342_1559140973.jpeg', NULL, '2019-05-29 13:42:53', '2019-05-29 13:42:53'),
(45, 'AB30B64B1F', '85167images42345634sdfdf_1559140974.jpeg', NULL, '2019-05-29 13:42:54', '2019-05-29 13:42:54'),
(46, 'AB30B64B1F', '85765dgfrtrjtjet_1559140974.jpg', NULL, '2019-05-29 13:42:54', '2019-05-29 13:42:54'),
(47, 'AB30B64B1F', '86598images5676_1559140974.jpeg', NULL, '2019-05-29 13:42:54', '2019-05-29 13:42:54'),
(48, 'EA833F39', '6528imagesdwrw456_1559141292.jpeg', NULL, '2019-05-29 13:48:12', '2019-05-29 13:48:12'),
(49, 'EA833F39', '8702jusyhfd_1559141292.jpg', NULL, '2019-05-29 13:48:12', '2019-05-29 13:48:12'),
(50, 'EA833F39', '104069imagesdwrw456_1559141292.jpeg', NULL, '2019-05-29 13:48:12', '2019-05-29 13:48:12'),
(51, 'EA833F39', '105260jhgytgfg098_1559141292.jpg', NULL, '2019-05-29 13:48:12', '2019-05-29 13:48:12'),
(52, 'EA833F39', '107529dfertty45546453_1559141292.jpg', NULL, '2019-05-29 13:48:12', '2019-05-29 13:48:12'),
(53, 'EA833F39', '113401dfertty45546453_1559141292.jpg', NULL, '2019-05-29 13:48:12', '2019-05-29 13:48:12'),
(54, 'EA833F39', '123102dfasdf33435342_1559141292.jpeg', NULL, '2019-05-29 13:48:12', '2019-05-29 13:48:12'),
(55, 'EA833F39', '127319imagessdw56773_1559141292.jpeg', NULL, '2019-05-29 13:48:12', '2019-05-29 13:48:12'),
(56, '8E2EF68689', '71dfb10d-1516cb6f5f5dfea_1559392682.jpg', NULL, '2019-06-01 11:38:02', '2019-06-01 11:38:02'),
(57, '8E2EF68689', '7958imagesdwrw456_1559392682.jpeg', NULL, '2019-06-01 11:38:02', '2019-06-01 11:38:02'),
(58, '8E2EF68689', '8702jusyhfd_1559392682.jpg', NULL, '2019-06-01 11:38:02', '2019-06-01 11:38:02'),
(59, '8E2EF68689', '12223dfasdf33435342_1559392682.jpeg', '2019-06-01 11:52:04', '2019-06-01 11:52:04', '2019-06-01 11:38:02'),
(60, '8E2EF68689', '12294dderterws_1559392683.jpg', NULL, '2019-06-01 11:38:03', '2019-06-01 11:38:03'),
(61, '8E2EF68689', '12982images42345634sdfdf_1559393500.jpeg', NULL, '2019-06-01 11:51:40', '2019-06-01 11:51:40'),
(62, '8E2EF68689', '17704hsystgftr_1559393500.jpg', NULL, '2019-06-01 11:51:40', '2019-06-01 11:51:40'),
(63, '8E2EF68689', '20552imagesdwrw456_1559393500.jpeg', NULL, '2019-06-01 11:51:40', '2019-06-01 11:51:40'),
(64, '8E2EF68689', '536750imagessdw56773_1559393500.jpeg', NULL, '2019-06-01 11:51:40', '2019-06-01 11:51:40'),
(65, '8E2EF68689', '538104dfasdf33435342_1559393501.jpeg', NULL, '2019-06-01 11:51:41', '2019-06-01 11:51:41'),
(66, 'F3126AC039', 'fp-1_1559660221.jpg', '2019-06-04 13:57:49', '2019-06-04 13:57:49', '2019-06-04 13:57:01'),
(67, 'F3126AC039', 'fp-3_1559660221.jpg', NULL, '2019-06-04 13:57:01', '2019-06-04 13:57:01'),
(68, 'F3126AC039', 'fp-4_1559660221.jpg', NULL, '2019-06-04 13:57:01', '2019-06-04 13:57:01'),
(69, 'F3126AC039', 'fp-5_1559660221.jpg', NULL, '2019-06-04 13:57:01', '2019-06-04 13:57:01'),
(70, 'F3126AC039', 'fp-6_1559660222.jpg', NULL, '2019-06-04 13:57:02', '2019-06-04 13:57:02'),
(71, 'F3126AC039', 'fp-7_1559660222.jpg', NULL, '2019-06-04 13:57:02', '2019-06-04 13:57:02'),
(72, 'F3126AC039', 'fp-8_1559660222.jpg', NULL, '2019-06-04 13:57:02', '2019-06-04 13:57:02'),
(73, 'F3126AC039', 'fp-9_1559660222.jpg', NULL, '2019-06-04 13:57:02', '2019-06-04 13:57:02'),
(74, 'F3126AC039', '1_1559660300.jpg', NULL, '2019-06-04 13:58:20', '2019-06-04 13:58:20'),
(75, 'F3126AC039', '2_1559660300.jpg', NULL, '2019-06-04 13:58:20', '2019-06-04 13:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'web', '2019-05-21 17:27:20', '2019-05-21 17:27:20'),
(2, 'Admin', 'web', '2019-05-21 17:27:43', '2019-05-21 17:27:43'),
(3, 'Agent', 'web', '2019-05-21 17:27:52', '2019-05-21 17:27:52'),
(4, 'User', 'web', '2019-06-09 07:47:31', '2019-06-09 07:47:31');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `email_verified_at`, `password`, `role`, `status`, `remember_token`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'Adesina Taiwo Olajide', 'administrator@gmail.com', '2019-04-10 15:29:39', '$2y$10$pk17qvsG/AavWn2S6Ayx6./42WqKLutbcWjERVTjn.Dhdbjhhmd6C', 'Administrator', '1', '', '2019-05-23 14:24:40', '2019-04-10 15:29:39', NULL),
(2, 'Peter Emenike', 'peter@gmail.com', NULL, '$2y$10$Y9HpN/62s4vWEgdsRP5gGe6h9cEI1XJUMUNZjCphHjnz6ZgNdStfa', 'Admin', '1', NULL, '2019-05-22 07:38:07', '2019-05-22 07:38:07', NULL),
(3, 'Admin', 'admin@gmail.com', NULL, '$2y$10$m3QUgMQHHDbskXJiMv5YxO3pk5FrKjZBFVbLLYdkSqEXSIoAYUMde', 'Admin', '1', NULL, '2019-05-22 07:38:44', '2019-05-22 07:38:44', NULL),
(4, 'Samson Ajibade', 'simiyu@gmail.com', NULL, '$2y$10$pff.Nq94B72jEbKcFj380evg2HdleTmN89z21a/KweO4lFi27Gwou', 'Agent', '1', NULL, '2019-05-22 10:39:09', '2019-05-22 10:21:38', NULL),
(5, 'Goke Demmy', 'receptionist@gmail.com', NULL, '$2y$10$Dqyx.FwfwV8zbkP9PFu7mOyw357vxw7MXNOt54vNoOoO1a0hZOqKm', 'Agent', '1', NULL, '2019-05-22 10:41:10', '2019-05-22 10:26:27', NULL),
(6, 'Goke Demmy', 'testone@gmail.com', NULL, '$2y$10$1KhiBxTzpylt7XfTEBQU9.SFsdPKOxwyjc6kOx5pEz/296gQcXsqi', 'Agent', '1', NULL, '2019-05-22 10:44:59', '2019-05-22 10:33:16', NULL),
(7, 'Distribute', 'doctor@gmail.com', NULL, '$2y$10$Qy3F3PdVxgxy.0jqP2Gv4.8/thjexr35txUWJuVkt0VPGOzP148Nu', 'Agent', '1', NULL, '2019-05-22 10:44:51', '2019-05-22 10:35:12', NULL),
(8, 'Sule Lamido', 'hope@gmail.cm', NULL, '$2y$10$xcS88K48sHlibbgwX1lM9uec7vfr/kctYaAWWNObUqZCHkA8V0mXm', 'Administrator', '1', NULL, '2019-05-22 10:44:05', '2019-05-22 10:36:56', NULL),
(9, 'Arinze Dike', 'dike@gmail.com', '2019-05-31 23:00:00', '$2y$10$ch6CfW9y7huXjx9EJUaSo./QMQDf28rlCJmneHtuKIxGr0TG.Ql4K', 'Agent', '1', NULL, '2019-06-08 11:13:55', '2019-05-23 10:19:18', NULL),
(10, 'Okeke Emanuel J', 'okeke@gmail.com', '2019-04-10 15:29:39', '$2y$10$Nzxm2iOdMKijAOT2qsBf3e93nDcJWRz7y0bz4hOfIY7VFAwXi8coa', 'Agent', '1', NULL, '2019-06-04 14:01:21', '2019-05-23 10:27:19', NULL),
(11, 'John Tena Kor', 'john@gmail.com', NULL, '$2y$10$ppCq3QdMx2ZG52dFHu9CguzT5EaHfkkEqUjdPlSUZjLORmlPF40cO', 'Agent', '1', NULL, '2019-05-29 09:48:45', '2019-05-23 10:39:44', NULL),
(12, 'Adesina Taiwo Olajide', 'olajide@gmail.com', NULL, '$2y$10$og2Urd0.duS4TqU4W3smXeMpPZVqVqz9PW8YNPvvmeAatELqIvaJW', 'Agent', '1', NULL, '2019-06-04 13:42:55', '2019-06-03 18:21:37', NULL),
(13, 'Olajumoke Kenny', 'kenny@gmail.com', NULL, '$2y$10$8nAEYf/KdgiovmMMezEJXORNTgTJAVOmxSzCSOrhWjst8zhX1AFWC', 'Agent', '1', NULL, '2019-06-03 18:22:52', '2019-06-03 18:22:52', NULL),
(14, 'Olaniyi Adetunji', 'olaniyi@gmail.com', NULL, '$2y$10$rt4cvtc4meUBNJBaipGP8OEooskjc/MqJyPmzENuTOxbQ9MlitLb6', 'Agent', '1', NULL, '2019-06-03 18:32:56', '2019-06-03 18:32:56', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`agent_id`),
  ADD UNIQUE KEY `agents_email_unique` (`email`),
  ADD UNIQUE KEY `agents_phone_number_unique` (`phone_number`);

--
-- Indexes for table `agent_categories`
--
ALTER TABLE `agent_categories`
  ADD PRIMARY KEY (`agent_category_id`);

--
-- Indexes for table `agent_subscriptions`
--
ALTER TABLE `agent_subscriptions`
  ADD PRIMARY KEY (`subscription_id`),
  ADD KEY `agent_subscriptions_agent_id_foreign` (`agent_id`);

--
-- Indexes for table `contact_agents`
--
ALTER TABLE `contact_agents`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `contact_agents_agent_id_foreign` (`agent_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`facility_id`);

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
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`property_id`),
  ADD UNIQUE KEY `properties_property_number_unique` (`property_number`);

--
-- Indexes for table `property_categories`
--
ALTER TABLE `property_categories`
  ADD PRIMARY KEY (`property_category_id`);

--
-- Indexes for table `property_details`
--
ALTER TABLE `property_details`
  ADD PRIMARY KEY (`details_id`),
  ADD UNIQUE KEY `property_details_property_number_unique` (`property_number`);

--
-- Indexes for table `property_documents`
--
ALTER TABLE `property_documents`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `property_facilities`
--
ALTER TABLE `property_facilities`
  ADD PRIMARY KEY (`facility_id`),
  ADD UNIQUE KEY `property_facilities_property_number_unique` (`property_number`);

--
-- Indexes for table `property_requests`
--
ALTER TABLE `property_requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `property_requests_property_category_id_foreign` (`property_category_id`),
  ADD KEY `property_requests_property_type_id_foreign` (`property_type_id`);

--
-- Indexes for table `property_types`
--
ALTER TABLE `property_types`
  ADD PRIMARY KEY (`property_type_id`);

--
-- Indexes for table `prop_images`
--
ALTER TABLE `prop_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `prop_images_property_number_foreign` (`property_number`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=283;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `agent_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `agent_categories`
--
ALTER TABLE `agent_categories`
  MODIFY `agent_category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `agent_subscriptions`
--
ALTER TABLE `agent_subscriptions`
  MODIFY `subscription_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_agents`
--
ALTER TABLE `contact_agents`
  MODIFY `contact_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `facility_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `property_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `property_categories`
--
ALTER TABLE `property_categories`
  MODIFY `property_category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `property_details`
--
ALTER TABLE `property_details`
  MODIFY `details_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_documents`
--
ALTER TABLE `property_documents`
  MODIFY `document_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `property_facilities`
--
ALTER TABLE `property_facilities`
  MODIFY `facility_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_requests`
--
ALTER TABLE `property_requests`
  MODIFY `request_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `property_type_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `prop_images`
--
ALTER TABLE `prop_images`
  MODIFY `image_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agent_subscriptions`
--
ALTER TABLE `agent_subscriptions`
  ADD CONSTRAINT `agent_subscriptions_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`agent_id`);

--
-- Constraints for table `contact_agents`
--
ALTER TABLE `contact_agents`
  ADD CONSTRAINT `contact_agents_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`agent_id`);

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
-- Constraints for table `property_requests`
--
ALTER TABLE `property_requests`
  ADD CONSTRAINT `property_requests_property_category_id_foreign` FOREIGN KEY (`property_category_id`) REFERENCES `property_categories` (`property_category_id`),
  ADD CONSTRAINT `property_requests_property_type_id_foreign` FOREIGN KEY (`property_type_id`) REFERENCES `property_types` (`property_type_id`);

--
-- Constraints for table `prop_images`
--
ALTER TABLE `prop_images`
  ADD CONSTRAINT `prop_images_property_number_foreign` FOREIGN KEY (`property_number`) REFERENCES `properties` (`property_number`);

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
