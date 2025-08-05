-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2025 at 02:52 PM
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
-- Database: `asset_management`
--
CREATE DATABASE IF NOT EXISTS `asset_management` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `asset_management`;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2025-06-16-000000', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1751370873, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cpu`
--

CREATE TABLE `tbl_cpu` (
  `id` int(11) NOT NULL,
  `asset_id` varchar(50) NOT NULL,
  `cabinet_name` varchar(100) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `ram_model` varchar(100) DEFAULT NULL,
  `ram_fsb` varchar(50) DEFAULT NULL,
  `ssd` varchar(100) DEFAULT NULL,
  `hard_disk` varchar(100) DEFAULT NULL,
  `processor_company` varchar(100) NOT NULL,
  `processor` varchar(100) NOT NULL,
  `processor_generation` varchar(50) DEFAULT NULL,
  `motherboard` varchar(100) DEFAULT NULL,
  `motherboard_model` varchar(100) DEFAULT NULL,
  `smps_name` varchar(100) DEFAULT NULL,
  `assigned_to` varchar(100) DEFAULT NULL,
  `emp_id` varchar(50) DEFAULT NULL,
  `assign_status` enum('yes','no') NOT NULL,
  `assign_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_cpu`
--

INSERT INTO `tbl_cpu` (`id`, `asset_id`, `cabinet_name`, `ram`, `ram_model`, `ram_fsb`, `ssd`, `hard_disk`, `processor_company`, `processor`, `processor_generation`, `motherboard`, `motherboard_model`, `smps_name`, `assigned_to`, `emp_id`, `assign_status`, `assign_date`, `created_at`, `updated_at`) VALUES
(1, 'CPU0001', 'Frontech singen', '16gb', 'DDR4', '2400', '256gb', '1TB', 'Intel', 'i3', '6th', 'Gigabite', 'H110M-S2', 'Zebronics', 'Altaf Hossain', '77', 'yes', '2025-08-05', '2025-08-05 04:11:04', '2025-08-05 04:11:21'),
(2, 'CPU0002', 'Intex', '12gb', 'DDR4', '2400', '256gb', '1TB', 'Intel', 'i3', '8th', 'Gigabite', 'H310M-S2', 'Intex', 'Sandip Dutta', '108', 'yes', '2025-08-05', '2025-08-05 04:13:29', '2025-08-05 04:13:39'),
(3, 'CPU0003', 'Zebion', '16gb', 'DDR4', '2400', '512gb', 'N/C', 'Intel', 'i3', '8th', 'Gigabite', 'H310M-H', 'ORTIS', 'Joyjit Bhandari', '150', 'yes', '2025-08-05', '2025-08-05 04:15:01', '2025-08-05 04:15:25'),
(4, 'CPU0004', 'Foxin', '12gb', 'DDR3', '', '256gb', '500gb', 'Intel', 'i3', '4th', 'Gigabite', 'H81M-S', 'ZEBRONICS', 'Ajay Barman', '140', 'yes', '2025-08-05', '2025-08-05 04:16:37', '2025-08-05 04:16:54'),
(5, 'CPU0005', 'ZEBION', '8gb', 'DDR4', '2998', '120 gb', 'N/C', 'Intel', 'i3', '8th', 'MSI', 'H310M', 'ZEBRONICS', 'Adrija Roy', '160', 'yes', '2025-08-05', '2025-08-05 04:19:34', '2025-08-05 06:32:07'),
(6, 'CPU0006', 'Foxin', '12gb', 'DDR3', '', '256gb', 'N/C', 'Intel', 'i3', '4th', 'Gigabite', 'H81M-DS2', 'Foxin', 'Manas Pal', '145', 'yes', '2025-08-05', '2025-08-05 04:23:54', '2025-08-05 04:24:04'),
(7, 'CPU0007', 'Mercurry', '16gb', 'DDR4', '2666', '256gb', '1TB', 'Intel', 'i3', '6th', 'OEM', 'H110', 'Enter', NULL, NULL, 'no', NULL, '2025-08-05 04:28:29', '2025-08-05 04:28:29'),
(8, 'CPU0008', 'Zebronics', '8gb', 'DDR4', '2400', '120 gb', 'N/C', 'Intel', 'i3', '8th', 'Gigabite', 'H110M-H', 'Zebronics', 'Sudeshna Paul', '65', 'yes', '2025-08-05', '2025-08-05 04:32:02', '2025-08-05 04:32:13'),
(9, 'CPU0009', 'Intex', '12gb', 'DDR4', '2400', '240gb', 'N/C', 'Intel', 'i3', '6th', 'Gigabite', 'H110M-S2', 'Intex', NULL, NULL, 'no', NULL, '2025-08-05 04:33:42', '2025-08-05 04:33:57'),
(10, 'CPU0010', 'Zebion', '12gb', 'DDR4', '2400', '120 gb', '1TB', 'Intel', 'i3', '8th', 'Gigabite', 'H110M-H', 'Enter', NULL, NULL, 'no', NULL, '2025-08-05 04:37:38', '2025-08-05 04:37:38'),
(11, 'CPU0011', 'Intex', '8gb', 'DDR4', '2400', '256gb', '1TB', 'Intel', 'i3', '7th', 'Gigabite', 'H110M-S2', 'Consistent', 'Mohuya Roy Chowdhury', '50', 'yes', '2025-08-05', '2025-08-05 04:41:33', '2025-08-05 04:41:45'),
(12, 'CPU0012', 'Zebion', '8gb', 'DDR4', '2400', '240gb', 'N/C', 'Intel', 'i3', '8th', 'Gigabite', 'H110M-H', 'Enter', NULL, NULL, 'no', NULL, '2025-08-05 04:43:29', '2025-08-05 04:43:29'),
(13, 'CPU0013', 'IBall', '12gb', 'DDR3', '1333', '256gb', 'N/C', 'Intel', 'i3', '2nd', 'Intel', 'N/C', 'IBall', 'Saheli Aon', '123', 'yes', '2025-08-05', '2025-08-05 04:46:17', '2025-08-05 04:46:50'),
(14, 'CPU0014', 'Foxin', '8gb', 'DDR4', '3200', '256gb', '500gb', 'Intel', 'i3', '6th', 'Acustek', 'H110M-D', 'Intex', 'Sanjana Mondal', '157', 'yes', '2025-08-05', '2025-08-05 04:49:03', '2025-08-05 04:49:20'),
(15, 'CPU0015', 'Frontech Century', '16gb', 'DDR4', '2400', '256gb', '500gb', 'Intel', 'i3', '7th', 'Gigabite', 'H110M-H', 'Consistent', 'Rimpa Chowdhury', '156', 'yes', '2025-08-05', '2025-08-05 04:51:21', '2025-08-05 04:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `id` int(11) NOT NULL,
  `emp_name` varchar(50) DEFAULT NULL,
  `emp_id` varchar(50) DEFAULT NULL,
  `is_active` enum('yes','no') NOT NULL,
  `joining_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `emp_name`, `emp_id`, `is_active`, `joining_date`, `created_at`, `updated_at`) VALUES
(1, 'Palash Pal', '2', 'yes', '0000-00-00', '2025-08-05 01:10:16', '2025-08-05 01:10:16'),
(2, 'Mohuya Roy Chowdhury', '50', 'yes', '0000-00-00', '2025-08-05 01:10:38', '2025-08-05 01:10:38'),
(3, 'Sudeshna Paul', '65', 'yes', '0000-00-00', '2025-08-05 01:10:52', '2025-08-05 01:10:52'),
(4, 'Rohit Jalan', '62', 'yes', '0000-00-00', '2025-08-05 01:11:10', '2025-08-05 01:11:10'),
(5, 'Pritam Pachal', '69', 'yes', '0000-00-00', '2025-08-05 01:11:32', '2025-08-05 01:11:32'),
(6, 'Manas Das', '76', 'yes', '0000-00-00', '2025-08-05 01:11:54', '2025-08-05 01:11:54'),
(7, 'Altaf Hossain', '77', 'yes', '0000-00-00', '2025-08-05 01:12:13', '2025-08-05 01:12:13'),
(8, 'Lagnajita Mitra', '85', 'no', '0000-00-00', '2025-08-05 01:12:33', '2025-08-05 01:51:01'),
(9, 'priyanka saxena', '80', 'yes', '0000-00-00', '2025-08-05 01:12:49', '2025-08-05 01:12:49'),
(10, 'Mouli Shankar', '84', 'yes', '0000-00-00', '2025-08-05 01:13:08', '2025-08-05 01:13:08'),
(11, 'Pritha Das', '96', 'no', '0000-00-00', '2025-08-05 01:13:21', '2025-08-05 01:13:27'),
(12, 'Priya Kathole', '99', 'yes', '0000-00-00', '2025-08-05 01:13:41', '2025-08-05 01:13:41'),
(13, 'Diksha Sarkar', '102', 'yes', '0000-00-00', '2025-08-05 01:13:54', '2025-08-05 01:13:54'),
(14, 'Sandip Dutta', '108', 'yes', '0000-00-00', '2025-08-05 01:14:14', '2025-08-05 01:14:14'),
(15, 'Priya Bansal', '116', 'yes', '0000-00-00', '2025-08-05 01:14:27', '2025-08-05 01:14:27'),
(16, 'Debapriya Hait', '119', 'no', '0000-00-00', '2025-08-05 01:14:44', '2025-08-05 01:15:01'),
(17, 'Saheli Aon', '123', 'yes', '0000-00-00', '2025-08-05 01:14:58', '2025-08-05 01:14:58'),
(18, 'Saravana Selvaraj', '127', 'yes', '0000-00-00', '2025-08-05 01:15:15', '2025-08-05 01:15:15'),
(19, 'Disha Dhara', '128', 'no', '0000-00-00', '2025-08-05 01:15:32', '2025-08-05 01:15:36'),
(20, 'Venkatesh Kannan', '130', 'yes', '0000-00-00', '2025-08-05 01:15:49', '2025-08-05 01:15:49'),
(21, 'Bindu Hait', '137', 'yes', '0000-00-00', '2025-08-05 01:16:03', '2025-08-05 01:16:03'),
(22, 'Ajay Barman', '140', 'yes', '0000-00-00', '2025-08-05 01:16:16', '2025-08-05 01:16:16'),
(23, 'Subhadip Pramanik', '141', 'yes', '0000-00-00', '2025-08-05 01:16:33', '2025-08-05 01:16:33'),
(24, 'Pallabi Mahanta', '142', 'no', '0000-00-00', '2025-08-05 01:17:09', '2025-08-05 01:17:09'),
(25, 'Prasenjit Mondal', '144', 'yes', '0000-00-00', '2025-08-05 01:17:25', '2025-08-05 01:17:25'),
(26, 'Manas Pal', '145', 'yes', '0000-00-00', '2025-08-05 01:17:37', '2025-08-05 01:17:37'),
(27, 'Rana Saha', '147', 'yes', '0000-00-00', '2025-08-05 01:17:53', '2025-08-05 01:17:53'),
(28, 'Mir Ohid Ali', '148', 'yes', '0000-00-00', '2025-08-05 01:18:07', '2025-08-05 01:18:07'),
(29, 'Sattwik Mukherjee', '149', 'yes', '0000-00-00', '2025-08-05 01:18:25', '2025-08-05 01:18:25'),
(30, 'Joyjit Bhandari', '150', 'yes', '0000-00-00', '2025-08-05 01:18:40', '2025-08-05 01:18:40'),
(31, 'Trilochan Kumar', '151', 'yes', '0000-00-00', '2025-08-05 01:18:55', '2025-08-05 01:18:55'),
(32, 'Arnav Chakraborty', '152', 'no', '0000-00-00', '2025-08-05 01:19:12', '2025-08-05 01:19:32'),
(33, 'SK Asraful', '153', 'no', '0000-00-00', '2025-08-05 01:19:29', '2025-08-05 01:19:35'),
(34, 'Kamalika Sen', '154', 'yes', '0000-00-00', '2025-08-05 01:19:49', '2025-08-05 01:19:49'),
(35, 'Dola Chowdhury', '155', 'yes', '0000-00-00', '2025-08-05 01:20:03', '2025-08-05 01:20:03'),
(36, 'Rimpa Chowdhury', '156', 'yes', '0000-00-00', '2025-08-05 01:20:16', '2025-08-05 01:20:16'),
(37, 'Sanjana Mondal', '157', 'yes', '0000-00-00', '2025-08-05 01:20:30', '2025-08-05 01:20:30'),
(38, 'Mohit Gupta', '158', 'yes', '0000-00-00', '2025-08-05 01:20:49', '2025-08-05 01:20:49'),
(39, 'Ayush Singh', 'Intern', 'no', '0000-00-00', '2025-08-05 01:21:03', '2025-08-05 01:21:07'),
(40, 'Riddhi Dhara', 'Intern', 'no', '0000-00-00', '2025-08-05 01:21:19', '2025-08-05 01:21:22'),
(41, 'Sneha Sharma', 'Intern', 'no', '0000-00-00', '2025-08-05 01:21:41', '2025-08-05 01:21:43'),
(42, 'Aafreen Arjuman', 'Intern', 'no', '0000-00-00', '2025-08-05 01:21:57', '2025-08-05 01:21:57'),
(43, 'Arijit Sen', '159', 'yes', '0000-00-00', '2025-08-05 06:21:09', '2025-08-05 06:21:09'),
(44, 'Adrija Roy', '160', 'yes', '0000-00-00', '2025-08-05 06:21:29', '2025-08-05 06:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keyboard`
--

CREATE TABLE `tbl_keyboard` (
  `id` int(11) NOT NULL,
  `asset_id` varchar(50) NOT NULL,
  `manufacturer` varchar(100) DEFAULT NULL,
  `keyboard_type` enum('wired','bluetooth') DEFAULT 'wired',
  `assigned_to` varchar(100) DEFAULT NULL,
  `emp_id` varchar(50) DEFAULT NULL,
  `assign_status` enum('yes','no') NOT NULL,
  `assign_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_keyboard`
--

INSERT INTO `tbl_keyboard` (`id`, `asset_id`, `manufacturer`, `keyboard_type`, `assigned_to`, `emp_id`, `assign_status`, `assign_date`, `created_at`, `updated_at`) VALUES
(1, 'KEY0001', 'Logitech', 'wired', 'Altaf Hossain', '77', 'yes', '2025-08-05', '2025-08-05 05:18:56', '2025-08-05 05:19:20'),
(2, 'KEY0002', 'Dell', 'wired', 'Sandip Dutta', '108', 'yes', '2025-08-05', '2025-08-05 05:19:35', '2025-08-05 05:19:49'),
(3, 'KEY0003', 'Dell', 'wired', 'Joyjit Bhandari', '150', 'yes', '2025-08-05', '2025-08-05 05:20:05', '2025-08-05 05:20:20'),
(4, 'KEY0004', 'Dell', 'wired', 'Ajay Barman', '140', 'yes', '2025-08-05', '2025-08-05 05:20:44', '2025-08-05 05:20:56'),
(5, 'KEY0005', 'Dell', 'wired', 'Adrija Roy', '160', 'yes', '2025-08-05', '2025-08-05 05:21:17', '2025-08-05 06:38:35'),
(6, 'KEY0006', 'Dell', 'wired', 'Manas Pal', '145', 'yes', '2025-08-05', '2025-08-05 05:21:40', '2025-08-05 05:21:50'),
(7, 'KEY0007', 'Dell', 'wired', NULL, NULL, 'no', NULL, '2025-08-05 05:22:11', '2025-08-05 05:22:11'),
(8, 'KEY0008', 'Dell', 'wired', 'Sudeshna Paul', '65', 'yes', '2025-08-05', '2025-08-05 05:25:17', '2025-08-05 05:25:26'),
(9, 'KEY0009', 'Dell', 'wired', NULL, NULL, 'no', NULL, '2025-08-05 05:25:47', '2025-08-05 05:25:47'),
(10, 'KEY0010', 'Dell', 'wired', NULL, NULL, 'no', NULL, '2025-08-05 05:27:52', '2025-08-05 05:27:52'),
(11, 'KEY0011', 'Dell', 'wired', 'Mohuya Roy Chowdhury', '50', 'yes', '2025-08-05', '2025-08-05 05:29:27', '2025-08-05 05:29:39'),
(12, 'KEY0012', 'Dell', 'wired', NULL, NULL, 'no', NULL, '2025-08-05 05:30:00', '2025-08-05 05:30:00'),
(13, 'KEY0013', 'Dell', 'wired', 'Saheli Aon', '123', 'yes', '2025-08-05', '2025-08-05 05:31:06', '2025-08-05 05:31:23'),
(14, 'KEY0014', 'Dell', 'wired', 'Sanjana Mondal', '157', 'yes', '2025-08-05', '2025-08-05 05:33:12', '2025-08-05 05:33:20'),
(15, 'KEY0015', 'HP', 'wired', 'Rimpa Chowdhury', '156', 'yes', '2025-08-05', '2025-08-05 05:33:50', '2025-08-05 05:33:59'),
(16, 'KEY0016', 'Dell', 'wired', 'Mohit Gupta', '158', 'yes', '2025-08-05', '2025-08-05 05:34:49', '2025-08-05 05:43:04'),
(17, 'KEY0017', 'Dell', 'wired', NULL, NULL, 'no', NULL, '2025-08-05 05:35:26', '2025-08-05 05:35:26'),
(18, 'KEY0018', 'Dell', 'wired', 'Pritam Pachal', '69', 'yes', '2025-08-05', '2025-08-05 05:35:46', '2025-08-05 05:35:58'),
(19, 'KEY0019', 'Dell', 'wired', 'Manas Das', '76', 'yes', '2025-08-05', '2025-08-05 05:36:15', '2025-08-05 05:36:34'),
(20, 'KEY0020', 'Dell', 'wired', 'Arijit Sen', '159', 'yes', '2025-08-05', '2025-08-05 05:37:06', '2025-08-05 06:38:44'),
(21, 'KEY0021', 'Dell', 'wired', 'Subhadip Pramanik', '141', 'yes', '2025-08-05', '2025-08-05 05:37:29', '2025-08-05 05:37:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_laptop`
--

CREATE TABLE `tbl_laptop` (
  `id` int(11) NOT NULL,
  `asset_id` varchar(50) NOT NULL,
  `serial_number` varchar(100) NOT NULL,
  `model_name` varchar(100) NOT NULL,
  `manufacturer` varchar(100) NOT NULL,
  `screen_size` varchar(100) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `ram_model` varchar(100) DEFAULT NULL,
  `ram_fsb` varchar(50) DEFAULT NULL,
  `ssd` varchar(100) DEFAULT NULL,
  `hard_disk` varchar(100) DEFAULT NULL,
  `processor_company` varchar(100) NOT NULL,
  `processor` varchar(100) NOT NULL,
  `processor_generation` varchar(50) DEFAULT NULL,
  `motherboard` varchar(100) DEFAULT NULL,
  `motherboard_model` varchar(100) DEFAULT NULL,
  `assigned_to` varchar(100) DEFAULT NULL,
  `emp_id` varchar(50) DEFAULT NULL,
  `assign_date` date DEFAULT NULL,
  `assign_status` enum('yes','no') NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_laptop`
--

INSERT INTO `tbl_laptop` (`id`, `asset_id`, `serial_number`, `model_name`, `manufacturer`, `screen_size`, `ram`, `ram_model`, `ram_fsb`, `ssd`, `hard_disk`, `processor_company`, `processor`, `processor_generation`, `motherboard`, `motherboard_model`, `assigned_to`, `emp_id`, `assign_date`, `assign_status`, `created_at`, `updated_at`) VALUES
(1, 'LAP0001', 'CND9388DGQ', '154-DS0XXX', 'HP', '16 inch', '8gb', 'DDR4', '', '256gb', 'NOC', 'i3', 'Intel', '7th', 'HP', 'N/C', 'Dola Chowdhury', '155', '2025-08-03', 'yes', '2025-08-05 01:25:44', '2025-08-05 01:26:12'),
(2, 'LAP0002', 'NXAYCS1003230128LE3400', 'N20CSB', 'Acer', '16 inch', '16gb', 'DDR4', '', '512gb', 'N/C', 'i5', 'Intel', '11th', 'Acer', 'N/C', 'Palash Pal', '2', '2025-08-05', 'yes', '2025-08-05 01:28:42', '2025-08-05 01:29:03'),
(3, 'LAP0003', 'PF1AJM5J', '20LTS3M700', 'Lenovo', '15 inch', '16gb', 'DDR4', '', '512gb', 'N/C', 'i5', 'Intel', '8th', 'Lenovo', 'N/C', 'Bindu Hait', '137', '2025-08-05', 'yes', '2025-08-05 01:31:44', '2025-08-05 01:31:56'),
(4, 'LAP0004', 'D9CLMV2', 'DELL-PRECISION3530', 'Dell', '16 inch', '16gb', 'DDR4', '', '512gb', 'N/C', 'i7', 'Intel', '8th', 'Dell', 'N/C', 'Trilochan Kumar', '151', '2025-08-05', 'yes', '2025-08-05 01:34:10', '2025-08-05 01:34:39'),
(5, 'LAP0005', 'PF1L8J4Z', '20LTS1ML2A', 'Lenovo', '15 inch', '16gb', 'DDR4', '', '512gb', 'N/C', 'i5', 'Intel', '8th', 'Lenovo', 'N/C', 'Rana Saha', '147', '2025-08-05', 'yes', '2025-08-05 01:37:32', '2025-08-05 01:37:46'),
(6, 'LAP0006', 'NXEGJS100U240032263400', 'EXTENSA215-54', 'Acer', '15 inch', '8gb', 'DDR4', '', '512gb', 'N/C', 'i3', 'Intel', '11th', 'Acer', 'N/C', NULL, NULL, NULL, 'no', '2025-08-05 01:39:42', '2025-08-05 01:39:42'),
(7, 'LAP0007', 'NXEGJS100Q220008BE3400', 'EXTENSA215-54', 'Acer', '16 inch', '8gb', 'DDR4', '', '512gb', 'N/C', 'i3', 'Intel', '11th', 'Acer', 'N/C', 'Prasenjit Mondal', '144', '2025-08-05', 'yes', '2025-08-05 01:46:32', '2025-08-05 01:46:55'),
(8, 'LAP0008', 'PF17777F', 'LENOVO-81DE', 'Lenovo', '16 inch', '12gb', 'DDR4', '', '512gb', '1TB', 'i3', 'Intel', '8th', 'Lenovo', 'N/C', 'Sattwik Mukherjee', '149', '2025-08-05', 'yes', '2025-08-05 01:48:21', '2025-08-05 01:48:47'),
(9, 'LAP0009', 'PF-1AT1LU', '20LDS3M700', 'Lenovo', '15 inch', '16gb', 'DDR4', '', '512gb', 'N/C', 'i5', 'Intel', '8th', 'Lenovo', 'N/C', 'Mohit Gupta', '158', '2025-08-05', 'yes', '2025-08-05 01:50:37', '2025-08-05 02:32:49'),
(10, 'LAP0010', 'FVFYD3K2J1WK', 'Macbook air', 'Apple', '13 inch', '8gb', 'DDR3', '', '121gb', 'N/C', 'i5', 'Intel', 'N/C', 'Apple', 'N/C', 'Kamalika Sen', '154', '2025-08-05', 'yes', '2025-08-05 01:53:55', '2025-08-05 02:20:05'),
(11, 'LAP0011', 'FVFX70LRJ1WL', 'Macbook air', 'Apple', '13 inch', '8gb', 'DDR3', '', '251gb', 'N/C', 'i5', 'Intel', 'N/C', 'Apple', 'N/C', NULL, NULL, NULL, 'no', '2025-08-05 01:55:39', '2025-08-05 02:19:54'),
(12, 'LAP0012', 'MPYQOK6DWJ', 'MACBOOK air', 'Apple', '13 inch', '8gb', 'DDR3', '', '251gb', 'N/C', 'M2', 'Macbook air', 'N/C', 'Apple', 'N/C', 'Venkatesh Kannan', '130', '2025-08-05', 'yes', '2025-08-05 02:23:52', '2025-08-05 02:24:30'),
(13, 'LAP0013', 'N/c', 'Dell latitude 34-00', 'Dell', '15 inch', '16gb', 'DDR4', '', '256gb', 'N/C', 'i5', 'Intel', '8th', 'Dell', 'Latitude 3400', 'priyanka saxena', '80', '2025-08-05', 'yes', '2025-08-05 02:26:14', '2025-08-05 02:26:31'),
(14, 'LAP0014', '20LTS3M700', 'Lenovo', 'Lenovo', '15 inch', '16gb', 'DDR4', '', '512gb', 'N/C', 'i5', 'Intel', '8th', 'Lenovo', 'N/C', 'Diksha Sarkar', '102', '2025-08-05', 'yes', '2025-08-05 02:28:03', '2025-08-05 02:28:19'),
(15, 'LAP0015', 'JFLOVN6', 'Latitute 7480', 'Dell', '15 inch', '8gb', 'DDR4', '', '256gb', 'N/C', 'i5', 'Intel', '6th', 'Dell', 'N/C', 'Saravana Selvaraj', '127', '2025-08-05', 'yes', '2025-08-05 02:29:31', '2025-08-05 02:31:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mac`
--

CREATE TABLE `tbl_mac` (
  `id` int(11) NOT NULL,
  `asset_id` varchar(50) NOT NULL,
  `serial_number` varchar(100) NOT NULL,
  `cabinet_name` varchar(100) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `ram_model` varchar(100) DEFAULT NULL,
  `ram_fsb` varchar(50) DEFAULT NULL,
  `ssd` varchar(100) DEFAULT NULL,
  `hard_disk` varchar(100) DEFAULT NULL,
  `processor_company` varchar(100) NOT NULL,
  `processor` varchar(100) NOT NULL,
  `motherboard` varchar(100) DEFAULT NULL,
  `motherboard_model` varchar(100) DEFAULT NULL,
  `assigned_to` varchar(100) DEFAULT NULL,
  `emp_id` varchar(50) DEFAULT NULL,
  `assign_status` enum('yes','no') NOT NULL,
  `assign_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_mac`
--

INSERT INTO `tbl_mac` (`id`, `asset_id`, `serial_number`, `cabinet_name`, `ram`, `ram_model`, `ram_fsb`, `ssd`, `hard_disk`, `processor_company`, `processor`, `motherboard`, `motherboard_model`, `assigned_to`, `emp_id`, `assign_status`, `assign_date`, `created_at`, `updated_at`) VALUES
(1, 'MAC0001', 'GX4K7L59J', 'Mac mini', '16gb', 'N/C', '', '512gb', 'N/C', 'Apple', 'M4', 'Apple', 'Apple', NULL, NULL, 'no', NULL, '2025-08-05 04:55:32', '2025-08-05 04:55:32'),
(2, 'MAC0002', 'Q44J4WP71V', 'Mac mini', '8gb', 'N/C', '', '500gb', 'N/C', 'Apple', 'M2', 'Apple', 'Apple', NULL, NULL, 'no', NULL, '2025-08-05 04:56:37', '2025-08-05 04:56:37'),
(3, 'MAC0003', 'X44WN7P9C2', 'Mac mini', '8gb', 'N/C', '', '512gb', 'N/C', 'Apple', 'M2', 'Apple', 'Apple', 'Pritam Pachal', '69', 'yes', '2025-08-05', '2025-08-05 04:58:23', '2025-08-05 04:58:40'),
(4, 'MAC0004', 'W1WF4DPQT3', 'Mac mini', '16gb', 'N/C', '', '500gb', 'N/C', 'Apple', 'M4', 'Apple', 'Apple', 'Manas Das', '76', 'yes', '2025-08-05', '2025-08-05 04:59:43', '2025-08-05 05:00:00'),
(5, 'MAC0005', 'J242Q72476', 'Mac mini', '8gb', 'N/C', '', '500gb', 'N/C', 'Apple', 'M2', 'Apple', 'Apple', 'Arijit Sen', '159', 'yes', '2025-08-05', '2025-08-05 05:01:00', '2025-08-05 06:30:41'),
(6, 'MAC0006', 'CT43HW263J', 'Mac mini', '8gb', 'N/C', '', '500gb', 'N/C', 'Apple', 'M2', 'Apple', 'Apple', 'Subhadip Pramanik', '141', 'yes', '2025-08-05', '2025-08-05 05:01:56', '2025-08-05 05:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_monitor`
--

CREATE TABLE `tbl_monitor` (
  `id` int(11) NOT NULL,
  `asset_id` varchar(50) NOT NULL,
  `manufacturer` varchar(100) NOT NULL,
  `screen_size` varchar(100) NOT NULL,
  `resolution` varchar(100) NOT NULL,
  `type` enum('hdmi','vga') DEFAULT NULL,
  `assigned_to` varchar(100) DEFAULT NULL,
  `emp_id` varchar(50) DEFAULT NULL,
  `assign_status` enum('yes','no') NOT NULL,
  `assign_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_monitor`
--

INSERT INTO `tbl_monitor` (`id`, `asset_id`, `manufacturer`, `screen_size`, `resolution`, `type`, `assigned_to`, `emp_id`, `assign_status`, `assign_date`, `created_at`, `updated_at`) VALUES
(1, 'MON0001', 'HP', '19 inch', '1366-768', 'vga', 'Altaf Hossain', '77', 'yes', '2025-08-05', '2025-08-05 03:20:44', '2025-08-05 03:20:56'),
(2, 'MON0002', 'HP', '19 inch', '1366-768', 'vga', NULL, NULL, 'no', NULL, '2025-08-05 03:22:00', '2025-08-05 03:22:00'),
(3, 'MON0003', 'AOC', '19 inch', '1366-768', 'vga', 'Joyjit Bhandari', '150', 'yes', '2025-08-05', '2025-08-05 03:25:27', '2025-08-05 03:25:38'),
(4, 'MON0004', 'HP', '19 inch', '1366-768', 'vga', 'Ajay Barman', '140', 'yes', '2025-08-05', '2025-08-05 03:26:09', '2025-08-05 03:26:23'),
(5, 'MON0005', 'AOC', '19 inch', '1366-768', 'vga', 'Adrija Roy', '160', 'yes', '2025-08-05', '2025-08-05 03:27:04', '2025-08-05 06:23:30'),
(6, 'MON0006', 'AOC', '19 inch', '1366-768', 'vga', 'Manas Pal', '145', 'yes', '2025-08-05', '2025-08-05 03:31:21', '2025-08-05 03:31:46'),
(7, 'MON0007', 'HP', '19 inch', '1366-768', 'vga', NULL, NULL, 'no', NULL, '2025-08-05 03:32:47', '2025-08-05 03:32:47'),
(8, 'MON0008', 'Dell', '19 inch', '1360-768', 'vga', 'Sudeshna Paul', '65', 'yes', '2025-08-05', '2025-08-05 03:36:29', '2025-08-05 03:36:51'),
(9, 'MON0009', 'AOC', '19 inch', '1366-768', 'vga', NULL, NULL, 'no', NULL, '2025-08-05 03:38:23', '2025-08-05 03:38:23'),
(10, 'MON0010', 'HP', '19 inch', '1366-768', 'vga', NULL, NULL, 'no', NULL, '2025-08-05 03:40:32', '2025-08-05 03:40:32'),
(11, 'MON0011', 'HP', '19 inch', '1366-768', 'vga', 'Mohuya Roy Chowdhury', '50', 'yes', '2025-08-05', '2025-08-05 03:43:36', '2025-08-05 03:43:46'),
(12, 'MON0012', 'HP', '19 inch', '1366-768', 'vga', NULL, NULL, 'no', NULL, '2025-08-05 03:45:47', '2025-08-05 03:45:47'),
(13, 'MON0013', 'AOC', '19 inch', '1366-768', 'vga', 'Saheli Aon', '123', 'yes', '2025-08-05', '2025-08-05 03:47:59', '2025-08-05 03:48:29'),
(14, 'MON0014', 'HP', '19 inch', '1366-768', 'vga', 'Sanjana Mondal', '157', 'yes', '2025-08-05', '2025-08-05 03:49:17', '2025-08-05 03:49:39'),
(15, 'MON0015', 'AOC', '19 inch', '1366-768', 'vga', 'Rimpa Chowdhury', '156', 'yes', '2025-08-05', '2025-08-05 03:53:57', '2025-08-05 03:54:06'),
(16, 'MON0016', 'Dell', '18 inch', '1360-768', 'hdmi', 'Mohit Gupta', '158', 'yes', '2025-08-05', '2025-08-05 03:54:42', '2025-08-05 03:55:51'),
(17, 'MON0017', 'Dell', '19 inch', '1360-768', 'hdmi', 'Sandip Dutta', '108', 'yes', '2025-08-05', '2025-08-05 03:56:59', '2025-08-05 03:58:08'),
(18, 'MON0018', 'Dell', '21 inch', '1920-1080', 'hdmi', 'Pritam Pachal', '69', 'yes', '2025-08-05', '2025-08-05 03:59:34', '2025-08-05 03:59:48'),
(19, 'MON0019', 'Dell', '21 inch', '1920-1080', 'hdmi', 'Manas Das', '76', 'yes', '2025-08-05', '2025-08-05 04:00:24', '2025-08-05 04:00:41'),
(20, 'MON0020', 'Samsung', '21 inch', '1920-1080', 'hdmi', 'Arijit Sen', '159', 'yes', '2025-08-05', '2025-08-05 04:01:24', '2025-08-05 06:22:46'),
(21, 'MON0021', 'Dell', '18 inch', '1360-768', 'hdmi', 'Subhadip Pramanik', '141', 'yes', '2025-08-05', '2025-08-05 04:02:01', '2025-08-05 04:02:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mouse`
--

CREATE TABLE `tbl_mouse` (
  `id` int(11) NOT NULL,
  `asset_id` varchar(50) NOT NULL,
  `manufacturer` varchar(100) DEFAULT NULL,
  `mouse_type` enum('wired','bluetooth') DEFAULT 'wired',
  `assigned_to` varchar(100) DEFAULT NULL,
  `emp_id` varchar(50) DEFAULT NULL,
  `assign_status` enum('yes','no') NOT NULL,
  `assign_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_mouse`
--

INSERT INTO `tbl_mouse` (`id`, `asset_id`, `manufacturer`, `mouse_type`, `assigned_to`, `emp_id`, `assign_status`, `assign_date`, `created_at`, `updated_at`) VALUES
(1, 'MOU0001', 'HP', 'wired', 'Altaf Hossain', '77', 'yes', '2025-08-05', '2025-08-05 05:52:52', '2025-08-05 05:53:05'),
(2, 'MOU0002', 'Dell', 'wired', 'Sandip Dutta', '108', 'yes', '2025-08-05', '2025-08-05 05:53:31', '2025-08-05 05:53:42'),
(3, 'MOU0003', 'HP', 'wired', 'Joyjit Bhandari', '150', 'yes', '2025-08-05', '2025-08-05 05:54:00', '2025-08-05 05:54:15'),
(4, 'MOU0004', 'Dell', 'wired', 'Ajay Barman', '140', 'yes', '2025-08-05', '2025-08-05 05:54:28', '2025-08-05 05:54:41'),
(5, 'MOU0005', 'Dell', 'wired', 'Adrija Roy', '160', 'yes', '2025-08-05', '2025-08-05 05:54:55', '2025-08-05 06:35:53'),
(6, 'MOU0006', 'Dell', 'wired', 'Manas Pal', '145', 'yes', '2025-08-05', '2025-08-05 05:56:07', '2025-08-05 05:56:23'),
(7, 'MOU0007', 'HP', 'wired', NULL, NULL, 'no', NULL, '2025-08-05 05:56:40', '2025-08-05 05:56:40'),
(8, 'MOU0008', 'Dell', 'wired', 'Sudeshna Paul', '65', 'yes', '2025-08-05', '2025-08-05 05:57:30', '2025-08-05 05:57:42'),
(9, 'MOU0009', 'Logitech', 'wired', NULL, NULL, 'no', NULL, '2025-08-05 05:57:56', '2025-08-05 05:57:56'),
(10, 'MOU0010', 'Dell', 'wired', NULL, NULL, 'no', NULL, '2025-08-05 05:58:17', '2025-08-05 05:58:17'),
(11, 'MOU0011', 'Dell', 'wired', 'Mohuya Roy Chowdhury', '50', 'yes', '2025-08-05', '2025-08-05 05:58:29', '2025-08-05 05:58:41'),
(12, 'MOU0012', 'Dell', 'wired', NULL, NULL, 'no', NULL, '2025-08-05 06:00:37', '2025-08-05 06:00:37'),
(13, 'MOU0013', 'Dell', 'wired', 'Saheli Aon', '123', 'yes', '2025-08-05', '2025-08-05 06:02:08', '2025-08-05 06:02:23'),
(14, 'MOU0014', 'Logitech', 'wired', 'Sanjana Mondal', '157', 'yes', '2025-08-05', '2025-08-05 06:02:37', '2025-08-05 06:02:51'),
(15, 'MOU0015', 'HP', 'wired', 'Rimpa Chowdhury', '156', 'yes', '2025-08-05', '2025-08-05 06:03:13', '2025-08-05 06:03:25'),
(16, 'MOU0016', 'Dell', 'wired', 'Mohit Gupta', '158', 'yes', '2025-08-05', '2025-08-05 06:03:56', '2025-08-05 06:04:09'),
(17, 'MOU0017', 'Dell', 'wired', NULL, NULL, 'no', NULL, '2025-08-05 06:06:00', '2025-08-05 06:06:00'),
(18, 'MOU0018', 'Dell', 'wired', 'Pritam Pachal', '69', 'yes', '2025-08-05', '2025-08-05 06:06:18', '2025-08-05 06:06:31'),
(19, 'MOU0019', 'Dell', 'wired', 'Manas Das', '76', 'yes', '2025-08-05', '2025-08-05 06:06:47', '2025-08-05 06:06:58'),
(20, 'MOU0020', 'HP', 'wired', 'Arijit Sen', '159', 'yes', '2025-08-05', '2025-08-05 06:07:19', '2025-08-05 06:36:32'),
(21, 'MOU0021', 'Dell', 'wired', 'Subhadip Pramanik', '141', 'yes', '2025-08-05', '2025-08-05 06:07:40', '2025-08-05 06:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_other_asset`
--

CREATE TABLE `tbl_other_asset` (
  `id` int(11) NOT NULL,
  `asset_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `count` int(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_phone`
--

CREATE TABLE `tbl_phone` (
  `id` int(11) NOT NULL,
  `asset_id` varchar(50) NOT NULL,
  `serial_number` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `manufacturer` varchar(100) NOT NULL,
  `screen_size` varchar(100) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `storage` varchar(100) DEFAULT NULL,
  `os` varchar(100) NOT NULL,
  `device_type` enum('android','iphone') NOT NULL,
  `assigned_to` varchar(100) DEFAULT NULL,
  `emp_id` varchar(50) DEFAULT NULL,
  `assign_status` enum('yes','no') NOT NULL,
  `assign_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `id` int(11) NOT NULL,
  `uniqcode` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`id`, `uniqcode`, `name`, `email`, `password`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(1, 'A7xLpQ93ZnVtKbE1RmYwDfT5HsCuXg', 'Admin', 'admin@example.com', '25d55ad283aa400af464c76d713c07ad', NULL, 'active', '2025-06-12 02:22:33', '2025-06-17 11:59:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cpu`
--
ALTER TABLE `tbl_cpu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_keyboard`
--
ALTER TABLE `tbl_keyboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_laptop`
--
ALTER TABLE `tbl_laptop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mac`
--
ALTER TABLE `tbl_mac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_monitor`
--
ALTER TABLE `tbl_monitor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mouse`
--
ALTER TABLE `tbl_mouse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_other_asset`
--
ALTER TABLE `tbl_other_asset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_phone`
--
ALTER TABLE `tbl_phone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `uniqcode` (`uniqcode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_cpu`
--
ALTER TABLE `tbl_cpu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_keyboard`
--
ALTER TABLE `tbl_keyboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_laptop`
--
ALTER TABLE `tbl_laptop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_mac`
--
ALTER TABLE `tbl_mac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_monitor`
--
ALTER TABLE `tbl_monitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_mouse`
--
ALTER TABLE `tbl_mouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_other_asset`
--
ALTER TABLE `tbl_other_asset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_phone`
--
ALTER TABLE `tbl_phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"asset_management\",\"table\":\"tbl_cpu\"},{\"db\":\"asset_management\",\"table\":\"tbl_staff\"},{\"db\":\"asset_management\",\"table\":\"tbl_phone\"},{\"db\":\"asset_management\",\"table\":\"tbl_other_asset\"},{\"db\":\"asset_management\",\"table\":\"tbl_mouse\"},{\"db\":\"asset_management\",\"table\":\"tbl_monitor\"},{\"db\":\"asset_management\",\"table\":\"tbl_mac\"},{\"db\":\"asset_management\",\"table\":\"tbl_laptop\"},{\"db\":\"asset_management\",\"table\":\"tbl_keyboard\"},{\"db\":\"asset_management\",\"table\":\"tbl_employee\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2025-08-05 12:52:00', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
