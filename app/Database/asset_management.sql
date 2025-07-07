-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2025 at 10:15 AM
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
(1, 'CPU1001', 'HP', '8gb', 'DDR4', '', '256gb', '500GB', 'Intel', 'i3', '3rd', 'HP', 'N/C', '', NULL, NULL, 'no', NULL, '2025-07-03 21:51:07', '2025-07-03 21:51:26'),
(2, 'CPU1002', 'Dell', '4gb', 'DDR3', '', '128gb', '320GB', 'Intel', 'i5', '4th', 'Dell', 'Optiplex', '', NULL, NULL, 'no', NULL, '2025-07-04 09:01:09', '2025-07-04 09:01:09'),
(3, 'CPU1003', 'Lenovo', '16gb', 'DDR4', '', '512gb', '1TB', 'AMD', 'Ryzen 5', '3rd', 'Lenovo', 'B450', '', NULL, NULL, 'no', NULL, '2025-07-04 09:01:09', '2025-07-04 09:01:09'),
(4, 'CPU1004', 'HP', '8gb', 'DDR3', '', '500GB', '500GB', 'Intel', 'i3', '2nd', 'HP', 'N/C', '', NULL, NULL, 'no', NULL, '2025-07-04 09:01:09', '2025-07-04 09:01:09'),
(5, 'CPU1005', 'Acer', '8gb', 'DDR4', '', '256gb', '500GB', 'Intel', 'i5', '6th', 'Acer', 'Z490', '', NULL, NULL, 'no', NULL, '2025-07-04 09:01:09', '2025-07-04 09:01:09'),
(6, 'CPU1006', 'Asus', '4gb', 'DDR3', '', '256gb', '250GB', 'Intel', 'i3', '1st', 'Asus', 'P5G41T', '', NULL, NULL, 'no', NULL, '2025-07-04 09:01:09', '2025-07-04 09:01:09'),
(7, 'CPU1007', 'Gigabyte', '8gb', 'DDR4', '', '512gb', '512gb', 'AMD', 'Ryzen 3', '1st', 'Gigabyte', 'A320M', '', NULL, NULL, 'no', NULL, '2025-07-04 09:01:09', '2025-07-04 09:01:09'),
(8, 'CPU1008', 'MSI', '16gb', 'DDR4', '', '1TB', '512gb', 'Intel', 'i7', '7th', 'MSI', 'Z370', '', NULL, NULL, 'no', NULL, '2025-07-04 09:01:09', '2025-07-04 09:01:09'),
(9, 'CPU1009', 'Intel', '8gb', 'DDR3', '', '8GB', '500GB', 'Intel', 'i5', '2nd', 'Intel', 'DH67', '', NULL, NULL, 'no', NULL, '2025-07-04 09:01:09', '2025-07-04 09:01:09'),
(10, 'CPU1010', 'HP', '4gb', 'DDR3', '', '16GB', '320GB', 'Intel', 'i3', '1st', 'HP', 'N/C', '', NULL, NULL, 'no', NULL, '2025-07-04 09:01:09', '2025-07-04 09:01:09'),
(11, 'CPU1011', 'Dell', '8gb', 'DDR4', '', '256gb', '500GB', 'Intel', 'i5', '6th', 'Dell', 'Z490', '', NULL, NULL, 'no', NULL, '2025-07-04 09:01:09', '2025-07-04 09:01:09'),
(12, 'CPU1012', 'Asus', '8gb', 'DDR4', '', '512gb', '500GB', 'Intel', 'i7', '9th', 'Asus', 'Z390', '', NULL, NULL, 'no', NULL, '2025-07-04 09:01:09', '2025-07-04 09:01:09'),
(13, 'CPU1013', 'Gigabyte', '16gb', 'DDR4', '', '1TB', '2TB', 'AMD', 'Ryzen 7', '3rd', 'Gigabyte', 'B550', '', NULL, NULL, 'no', NULL, '2025-07-04 09:01:09', '2025-07-04 09:01:09'),
(14, 'CPU1014', 'HP', '4gb', 'DDR3', '', '32GB', '250GB', 'Intel', 'i3', '2nd', 'HP', 'N/C', '', NULL, NULL, 'no', NULL, '2025-07-04 09:01:09', '2025-07-04 09:01:09'),
(15, 'CPU1015', 'Dell', '8gb', 'DDR3', '', '128gb', '500GB', 'Intel', 'i5', '3rd', 'Dell', 'H61M', '', NULL, NULL, 'no', NULL, '2025-07-04 09:01:09', '2025-07-04 09:01:09'),
(16, 'CPU1016', 'Lenovo', '8gb', 'DDR4', '', '256gb', '500GB', 'Intel', 'i3', '6th', 'Lenovo', 'Z270', '', NULL, NULL, 'no', NULL, '2025-07-04 09:01:09', '2025-07-04 09:01:09'),
(17, 'CPU1017', 'Acer', '4gb', 'DDR3', '', '128GB', '320GB', 'Intel', 'i3', '1st', 'Acer', 'DH55', '', NULL, NULL, 'no', NULL, '2025-07-04 09:01:09', '2025-07-04 09:01:09'),
(18, 'CPU1018', 'HP', '8gb', 'DDR4', '', '256gb', '320GB', 'Intel', 'i5', '8th', 'HP', 'H370', '', NULL, NULL, 'no', NULL, '2025-07-04 09:01:09', '2025-07-04 09:01:09'),
(19, 'CPU1019', 'MSI', '16gb', 'DDR4', '', '512gb', '1TB', 'AMD', 'Ryzen 5', '2nd', 'MSI', 'B450M', '', NULL, NULL, 'no', NULL, '2025-07-04 09:01:09', '2025-07-04 09:01:09'),
(20, 'CPU1020', 'Dell', '8gb', 'DDR3', '', '500GB', '500GB', 'Intel', 'i5', '4th', 'Dell', 'H81', '', NULL, NULL, 'no', NULL, '2025-07-04 09:01:09', '2025-07-04 09:01:09'),
(21, 'CPU1021', 'Intel', '4gb', 'DDR3', '', '500GB', '250GB', 'Intel', 'i3', '2nd', 'Intel', 'DH61', '', NULL, NULL, 'no', NULL, '2025-07-04 09:01:09', '2025-07-04 09:01:09'),
(22, 'CPU1022', 'HP', '8gb', 'DDR4', '', '256gb', '1TB', 'Intel', 'i5', '10th', 'HP', 'Z490', '', NULL, NULL, 'no', NULL, '2025-07-04 09:01:09', '2025-07-04 09:01:09'),
(23, 'CPU1023', 'Gigabyte', '16gb', 'DDR4', '500GB', '1TB', '500GB', 'AMD', 'Ryzen 7', '4th', 'Gigabyte', 'X570', '', NULL, NULL, 'no', NULL, '2025-07-04 09:01:09', '2025-07-04 09:01:09'),
(24, 'CPU1024', 'Asus', '8gb', 'DDR4', '', '512gb', '500GB', 'Intel', 'i7', '6th', 'Asus', 'Z270', '', NULL, NULL, 'no', NULL, '2025-07-04 09:01:09', '2025-07-04 09:01:09'),
(25, 'CPU1025', 'Acer', '4gb', 'DDR3', '', '500GB', '250GB', 'Intel', 'i3', '1st', 'Acer', 'Optiplex', '', NULL, NULL, 'no', NULL, '2025-07-04 09:01:09', '2025-07-04 09:01:09');

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
(5, 'Sk Altaf Hossain', '76', 'yes', '2025-04-02', '2025-07-01 06:39:01', '2025-07-01 06:47:14'),
(6, 'Sandip Dutta', '108', 'yes', '2025-06-01', '2025-07-01 06:43:21', '2025-07-01 06:43:21'),
(7, 'John Doe', '101', 'yes', '2025-01-10', '2025-07-01 12:41:35', '2025-07-01 12:41:35'),
(8, 'Jane Smith', '102', 'yes', '2025-01-12', '2025-07-01 12:41:35', '2025-07-01 12:41:35'),
(9, 'Robert Brown', '103', 'no', '2025-02-05', '2025-07-01 12:41:35', '2025-07-01 12:41:35'),
(10, 'Emily Johnson', '104', 'yes', '2025-02-14', '2025-07-01 12:41:35', '2025-07-01 12:41:35'),
(11, 'Michael Lee', '105', 'yes', '2025-03-03', '2025-07-01 12:41:35', '2025-07-01 12:41:35'),
(12, 'Jessica Adams', '106', 'no', '2025-03-15', '2025-07-01 12:41:35', '2025-07-01 12:41:35'),
(13, 'Daniel Kim', '107', 'yes', '2025-03-28', '2025-07-01 12:41:35', '2025-07-01 12:41:35'),
(14, 'Sandip Dutta', '120', 'yes', '2025-06-01', '2025-07-01 12:41:35', '2025-07-01 12:41:35'),
(15, 'Sk Altaf Hossain', '721', 'yes', '2025-04-02', '2025-07-01 12:41:35', '2025-07-01 12:41:35'),
(16, 'Nancy White', '109', 'yes', '2025-04-10', '2025-07-01 12:41:35', '2025-07-01 12:41:35'),
(17, 'Samuel Green', '110', 'no', '2025-04-22', '2025-07-01 12:41:35', '2025-07-01 12:41:35'),
(18, 'Olivia Davis', '111', 'yes', '2025-05-01', '2025-07-01 12:41:35', '2025-07-01 12:41:35'),
(19, 'Matthew Moore', '112', 'yes', '2025-05-10', '2025-07-01 12:41:35', '2025-07-01 12:41:35'),
(20, 'Emma Wilson', '113', 'yes', '2025-05-20', '2025-07-01 12:41:35', '2025-07-01 12:41:35'),
(21, 'David Hall', '114', 'yes', '2025-06-01', '2025-07-01 12:41:35', '2025-07-01 08:48:07'),
(22, 'Sophia Allen', '115', 'yes', '2025-06-05', '2025-07-01 12:41:35', '2025-07-01 12:41:35'),
(23, 'Chris Martin', '116', 'yes', '2025-06-12', '2025-07-01 12:41:35', '2025-07-01 12:41:35'),
(24, 'Isabella Young', '117', 'no', '2025-06-18', '2025-07-01 12:41:35', '2025-07-01 12:41:35'),
(25, 'Logan King', '118', 'yes', '2025-06-20', '2025-07-01 12:41:35', '2025-07-01 12:41:35'),
(26, 'Mia Scott', '119', 'yes', '2025-06-22', '2025-07-01 12:41:35', '2025-07-01 12:41:35'),
(27, 'Ethan Walker', '120', 'yes', '2025-06-25', '2025-07-01 12:41:35', '2025-07-01 12:41:35'),
(28, 'Ava Hill', '121', 'no', '2025-06-26', '2025-07-01 12:41:35', '2025-07-01 12:41:35'),
(29, 'Lucas Lewis', '122', 'yes', '2025-06-28', '2025-07-01 12:41:35', '2025-07-01 12:41:35'),
(30, 'Harper Baker', '123', 'yes', '2025-06-30', '2025-07-01 12:41:35', '2025-07-01 12:41:35'),
(31, 'Mason Carter', '124', 'no', '2025-06-01', '2025-07-01 12:41:35', '2025-07-02 04:01:50');

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
(1, 'KEY1001', 'HP', 'wired', NULL, NULL, 'no', NULL, '2025-07-04 01:43:29', '2025-07-04 01:43:29'),
(2, 'KEY1002', 'Dell', 'bluetooth', NULL, NULL, 'no', NULL, '2025-07-04 07:15:06', '2025-07-04 07:15:06'),
(3, 'KEY1003', 'Logitech', 'wired', NULL, NULL, 'no', NULL, '2025-07-04 07:15:06', '2025-07-04 07:15:06'),
(4, 'KEY1004', 'HP', 'bluetooth', NULL, NULL, 'no', NULL, '2025-07-04 07:15:06', '2025-07-04 07:15:06'),
(5, 'KEY1005', 'Dell', 'wired', NULL, NULL, 'no', NULL, '2025-07-04 07:15:06', '2025-07-04 07:15:06'),
(6, 'KEY1006', 'Lenovo', 'wired', NULL, NULL, 'no', NULL, '2025-07-04 07:15:06', '2025-07-04 07:15:06'),
(7, 'KEY1007', 'Logitech', 'bluetooth', NULL, NULL, 'no', NULL, '2025-07-04 07:15:06', '2025-07-04 07:15:06'),
(8, 'KEY1008', 'HP', 'wired', NULL, NULL, 'no', NULL, '2025-07-04 07:15:06', '2025-07-04 07:15:06'),
(9, 'KEY1009', 'Dell', 'bluetooth', NULL, NULL, 'no', NULL, '2025-07-04 07:15:06', '2025-07-04 07:15:06'),
(10, 'KEY1010', 'Logitech', 'wired', NULL, NULL, 'no', NULL, '2025-07-04 07:15:06', '2025-07-04 07:15:06'),
(11, 'KEY1011', 'Lenovo', 'bluetooth', NULL, NULL, 'no', NULL, '2025-07-04 07:15:06', '2025-07-04 07:15:06'),
(12, 'KEY1012', 'HP', 'wired', NULL, NULL, 'no', NULL, '2025-07-04 07:15:06', '2025-07-04 07:15:06'),
(13, 'KEY1013', 'Dell', 'wired', NULL, NULL, 'no', NULL, '2025-07-04 07:15:06', '2025-07-04 07:15:06'),
(14, 'KEY1014', 'Logitech', 'bluetooth', NULL, NULL, 'no', NULL, '2025-07-04 07:15:06', '2025-07-04 07:15:06'),
(15, 'KEY1015', 'Lenovo', 'wired', NULL, NULL, 'no', NULL, '2025-07-04 07:15:06', '2025-07-04 07:15:06'),
(16, 'KEY1016', 'HP', 'bluetooth', NULL, NULL, 'no', NULL, '2025-07-04 07:15:06', '2025-07-04 07:15:06'),
(17, 'KEY1017', 'Dell', 'wired', NULL, NULL, 'no', NULL, '2025-07-04 07:15:06', '2025-07-04 07:15:06'),
(18, 'KEY1018', 'Logitech', 'wired', NULL, NULL, 'no', NULL, '2025-07-04 07:15:06', '2025-07-04 07:15:06'),
(19, 'KEY1019', 'Lenovo', 'bluetooth', NULL, NULL, 'no', NULL, '2025-07-04 07:15:06', '2025-07-04 07:15:06'),
(20, 'KEY1020', 'HP', 'wired', NULL, NULL, 'no', NULL, '2025-07-04 07:15:06', '2025-07-04 07:15:06'),
(21, 'KEY1021', 'Dell', 'bluetooth', NULL, NULL, 'no', NULL, '2025-07-04 07:15:06', '2025-07-04 07:15:06'),
(22, 'KEY1022', 'Logitech', 'wired', NULL, NULL, 'no', NULL, '2025-07-04 07:15:06', '2025-07-04 07:15:06'),
(23, 'KEY1023', 'Lenovo', 'wired', NULL, NULL, 'no', NULL, '2025-07-04 07:15:06', '2025-07-04 07:15:06'),
(24, 'KEY1024', 'HP', 'bluetooth', NULL, NULL, 'no', NULL, '2025-07-04 07:15:06', '2025-07-04 07:15:06'),
(25, 'KEY1025', 'Dell', 'bluetooth', NULL, NULL, 'no', NULL, '2025-07-04 07:15:06', '2025-07-04 01:47:44');

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
(3, 'LAP1003', 'SN100003', 'Inspiron 15', 'Dell', '15.6\"', '8GB', 'DDR4', '2400MHz', '1TB', '500GB', 'Intel', 'i5', '8th', 'Dell', 'B360', 'Emma Wilson', '113', '2025-07-02', 'yes', '2025-07-02 07:14:39', '2025-07-03 03:23:09'),
(4, 'LAP1004', 'SN100004', 'Pavilion 14', 'HP', '14\"', '12GB', 'DDR4', '2666MHz', '512GB', NULL, 'Intel', 'i5', '10th', 'HP', 'Z370', 'David Hall', '114', '2025-07-02', 'yes', '2025-07-02 07:14:39', '2025-07-03 03:23:36'),
(5, 'LAP1005', 'SN100005', 'VivoBook 15', 'Asus', '15.6\"', '16GB', 'DDR4', '3200MHz', '256GB', NULL, 'AMD', 'Ryzen 5', '3rd', 'Asus', 'X570', 'Chris Martin', '116', '2025-07-01', 'yes', '2025-07-02 07:14:39', '2025-07-03 03:23:52'),
(6, 'LAP1006', 'SN100006', 'Latitude 7490', 'Dell', '14\"', '8GB', 'DDR4', '2400MHz', '256GB', NULL, 'Intel', 'i5', '8th', 'Dell', 'Q370', 'Logan King', '118', '2025-07-01', 'yes', '2025-07-02 07:14:39', '2025-07-03 03:24:02'),
(7, 'LAP1007', 'SN100007', 'EliteBook 840', 'HP', '14\"', '16GB', 'DDR4', '2666MHz', '512GB', NULL, 'Intel', 'i7', '10th', 'HP', 'W480', 'Mia Scott', '119', '2025-07-02', 'yes', '2025-07-02 07:14:39', '2025-07-03 03:24:16'),
(8, 'LAP1008', 'SN100008', 'Aspire 5', 'Acer', '15.6\"', '8GB', 'DDR4', '2400MHz', '128GB', '1TB', 'Intel', 'i3', '7th', 'Acer', 'B250', 'Sophia Allen', '115', '2025-07-01', 'yes', '2025-07-02 07:14:39', '2025-07-03 03:23:44'),
(9, 'LAP1009', 'SN100009', 'MacBook Pro', 'Apple', '14\"', '16GB', 'LPDDR5', '6400MHz', '512GB', NULL, 'Apple', 'M2', NULL, 'Apple', 'T2', 'Harper Baker', '123', '2025-07-01', 'yes', '2025-07-02 07:14:39', '2025-07-03 03:24:40'),
(10, 'LAP1010', 'SN100010', 'ROG Zephyrus', 'Asus', '15.6\"', '32GB', 'DDR5', '4800MHz', '1TB', NULL, 'AMD', 'Ryzen 9', '5th', 'Asus', 'X670', 'Emily Johnson', '104', '2025-07-01', 'yes', '2025-07-02 07:14:39', '2025-07-03 03:24:57'),
(11, 'LAP1011', 'SN100011', 'ThinkPad E14', 'Lenovo', '14\"', '8GB', 'DDR4', '2666MHz', '256GB', '500GB', 'Intel', 'i5', '10th', 'Intel', 'H410', 'Matthew Moore', '112', '2025-07-01', 'yes', '2025-07-02 07:14:39', '2025-07-03 03:24:49'),
(12, 'LAP1012', 'SN100012', 'XPS 13', 'Dell', '13.4\"', '16GB', 'DDR4X', '4267MHz', '512GB', NULL, 'Intel', 'i7', '11th', 'Dell', 'Q570', 'Daniel Kim', '107', '2025-07-01', 'yes', '2025-07-02 07:14:39', '2025-07-03 03:26:35'),
(13, 'LAP1013', 'SN100013', 'IdeaPad Slim 3', 'Lenovo', '15.6\"', '8GB', 'DDR4', '3200MHz', '256GB', NULL, 'AMD', 'Ryzen 3', '4th', 'Lenovo', 'A320', NULL, NULL, NULL, 'no', '2025-07-02 07:14:39', NULL),
(14, 'LAP1014', 'SN100014', 'Surface Laptop 4', 'Microsoft', '13.5\"', '16GB', 'LPDDR4X', '4267MHz', '512GB', NULL, 'Intel', 'i7', '11th', 'Microsoft', 'P580', NULL, NULL, NULL, 'no', '2025-07-02 07:14:39', NULL),
(15, 'LAP1015', 'SN100015', 'Predator Helios', 'Acer', '17.3\"', '32GB', 'DDR4', '3200MHz', '1TB', NULL, 'Intel', 'i9', '11th', 'Acer', 'Z590', NULL, NULL, NULL, 'no', '2025-07-02 07:14:39', NULL),
(16, 'LAP1016', 'SN100016', 'ENVY x360', 'HP', '15.6\"', '16GB', 'DDR4', '3200MHz', '512GB', NULL, 'AMD', 'Ryzen 7', '4th', 'HP', 'B450', NULL, NULL, NULL, 'no', '2025-07-02 07:14:39', NULL),
(17, 'LAP1017', 'SN100017', 'Swift 3', 'Acer', '14\"', '8GB', 'LPDDR4', '3733MHz', '512GB', NULL, 'Intel', 'i5', '10th', 'Acer', 'N510', 'Sk Altaf Hossain', '76', '2025-07-01', 'yes', '2025-07-02 07:14:39', '2025-07-03 03:25:22'),
(18, 'LAP1018', 'SN100018', 'ZenBook 13', 'Asus', '13.3\"', '16GB', 'LPDDR4X', '4267MHz', '1TB', NULL, 'Intel', 'i7', '11th', 'Asus', 'M480', NULL, NULL, NULL, 'no', '2025-07-02 07:14:39', NULL),
(19, 'LAP1019', 'SN100019', 'MacBook Air', 'Apple', '13.3\"', '8GB', 'LPDDR4X', '3733MHz', '256GB', NULL, 'Apple', 'M2', NULL, 'Apple', 'T2', NULL, NULL, NULL, 'no', '2025-07-02 07:14:39', NULL),
(20, 'LAP1020', 'SN100020', 'Elite Dragonfly', 'HP', '13.3\"', '16GB', 'LPDDR3', '2133MHz', '512GB', NULL, 'Intel', 'i7', '8th', 'HP', 'N580', NULL, NULL, NULL, 'no', '2025-07-02 07:14:39', NULL),
(21, 'LAP1021', 'SN100021', 'ThinkBook 15', 'Lenovo', '15.6\"', '8GB', 'DDR4', '2666MHz', '1TB', NULL, 'Intel', 'i3', '10th', 'Lenovo', 'H310', NULL, NULL, NULL, 'no', '2025-07-02 07:14:39', NULL),
(22, 'LAP1022', 'SN100022', 'Latitude 3410', 'Dell', '14\"', '8GB', 'DDR4', '2400MHz', '512GB', NULL, 'Intel', 'i5', '10th', 'Dell', 'Z370', NULL, NULL, NULL, 'no', '2025-07-02 07:14:39', NULL),
(23, 'LAP1023', 'SN100023', 'IdeaPad 5', 'Lenovo', '14\"', '16GB', 'DDR4', '3200MHz', '512GB', NULL, 'AMD', 'Ryzen 5', '4th', 'Lenovo', 'B450', 'Sandip Dutta', '108', '2025-07-02', 'yes', '2025-07-02 07:14:39', '2025-07-03 03:25:43'),
(24, 'LAP1024', 'SN100024', 'MacBook Pro', 'Apple', '13\"', '16GB', 'LPDDR3', '2133MHz', '512GB', NULL, 'Apple', 'M1', NULL, 'Apple', 'T2', NULL, NULL, NULL, 'no', '2025-07-02 07:14:39', NULL),
(25, 'LAP1025', 'SN100025', 'Vostro 3400', 'Dell', '14\"', '8GB', 'DDR4', '2666MHz', '256GB', NULL, 'Intel', 'i3', '10th', 'Dell', 'H510', NULL, NULL, NULL, 'no', '2025-07-02 07:14:39', NULL);

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
(1, 'MAC1001', 'CND9388DGQ', 'MAC', '8gb', 'DDR4', '', '256gb', '500GB', 'i3', 'Intel', 'HP', 'N/C', NULL, NULL, 'no', NULL, '2025-07-04 07:46:59', '2025-07-04 07:46:59');

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
(1, 'MON1001', 'Dell', '15.6\"', '1920x1080', 'hdmi', NULL, NULL, 'no', NULL, '2025-07-03 11:43:32', '2025-07-03 08:14:59'),
(2, 'MON1002', 'HP', '14\"', '1366x768', 'vga', NULL, NULL, 'no', NULL, '2025-07-03 11:43:32', '2025-07-03 06:14:22'),
(3, 'MON1003', 'Lenovo', '15.6\"', '1920x1080', 'hdmi', NULL, NULL, 'no', NULL, '2025-07-03 11:43:32', NULL),
(4, 'MON1004', 'Acer', '13.3\"', '1920x1080', 'vga', NULL, NULL, 'no', NULL, '2025-07-03 11:43:32', NULL),
(5, 'MON1005', 'Asus', '15.6\"', '1600x900', 'hdmi', NULL, NULL, 'no', NULL, '2025-07-03 11:43:32', '2025-07-03 06:14:32'),
(6, 'MON1006', 'Dell', '14\"', '1366x768', 'vga', NULL, NULL, 'no', NULL, '2025-07-03 11:43:32', NULL),
(7, 'MON1007', 'HP', '13.3\"', '1920x1080', 'hdmi', NULL, NULL, 'no', NULL, '2025-07-03 11:43:32', '2025-07-03 06:14:51'),
(8, 'MON1008', 'Lenovo', '15.6\"', '1920x1080', 'vga', NULL, NULL, 'no', NULL, '2025-07-03 11:43:32', NULL),
(9, 'MON1009', 'Acer', '14\"', '1366x768', 'hdmi', NULL, NULL, 'no', NULL, '2025-07-03 11:43:32', NULL),
(10, 'MON1010', 'Asus', '13.3\"', '1920x1080', 'vga', NULL, NULL, 'no', NULL, '2025-07-03 11:43:32', '2025-07-03 06:14:28'),
(11, 'MON1011', 'Dell', '15.6\"', '1920x1080', 'hdmi', NULL, NULL, 'no', NULL, '2025-07-03 11:43:32', NULL),
(12, 'MON1012', 'HP', '14\"', '1366x768', 'vga', NULL, NULL, 'no', NULL, '2025-07-03 11:43:32', NULL),
(13, 'MON1013', 'Lenovo', '13.3\"', '1920x1080', 'hdmi', NULL, NULL, 'no', NULL, '2025-07-03 11:43:32', '2025-07-03 06:14:59'),
(14, 'MON1014', 'Acer', '15.6\"', '1600x900', 'vga', NULL, NULL, 'no', NULL, '2025-07-03 11:43:32', NULL),
(15, 'MON1015', 'Asus', '14\"', '1920x1080', 'hdmi', NULL, NULL, 'no', NULL, '2025-07-03 11:43:32', '2025-07-03 06:15:04'),
(16, 'MON1016', 'Dell', '13.3\"', '1366x768', 'vga', NULL, NULL, 'no', NULL, '2025-07-03 11:43:32', NULL),
(17, 'MON1017', 'HP', '15.6\"', '1920x1080', 'hdmi', NULL, NULL, 'no', NULL, '2025-07-03 11:43:32', NULL),
(18, 'MON1018', 'Lenovo', '14\"', '1366x768', 'vga', NULL, NULL, 'no', NULL, '2025-07-03 11:43:32', '2025-07-03 06:15:15'),
(19, 'MON1019', 'Acer', '13.3\"', '1600x900', 'hdmi', NULL, NULL, 'no', NULL, '2025-07-03 11:43:32', NULL),
(20, 'MON1020', 'Asus', '15.6\"', '1920x1080', 'vga', NULL, NULL, 'no', NULL, '2025-07-03 11:43:32', NULL),
(21, 'MON1021', 'Dell', '14\"', '1366x768', 'hdmi', NULL, NULL, 'no', NULL, '2025-07-03 11:43:32', '2025-07-03 06:15:10'),
(22, 'MON1022', 'HP', '13.3\"', '1920x1080', 'vga', NULL, NULL, 'no', NULL, '2025-07-03 11:43:32', NULL),
(23, 'MON1023', 'Lenovo', '15.6\"', '1920x1080', 'hdmi', NULL, NULL, 'no', NULL, '2025-07-03 11:43:32', NULL),
(24, 'MON1024', 'Acer', '14\"', '1600x900', 'vga', NULL, NULL, 'no', NULL, '2025-07-03 11:43:32', '2025-07-03 06:15:21'),
(25, 'MON1025', 'Asus', '13.3\"', '1366x768', 'hdmi', NULL, NULL, 'no', NULL, '2025-07-03 11:43:32', NULL),
(26, 'MON1026', 'Dell', '15.6\"', '1920x1080', 'vga', NULL, NULL, 'no', NULL, '2025-07-03 11:43:32', NULL),
(27, 'MON1027', 'HP', '14\"', '1600x900', 'hdmi', NULL, NULL, 'no', NULL, '2025-07-03 11:43:32', '2025-07-03 06:15:25'),
(57, 'MON1028', 'Compaq', '19 inches', '1366-768', 'vga', NULL, NULL, 'no', NULL, '2025-07-03 08:14:26', '2025-07-03 08:14:26');

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
(1, 'MOU1001', 'HP', 'wired', NULL, NULL, 'no', NULL, '2025-07-04 02:27:32', '2025-07-04 02:27:32'),
(2, 'MOU1002', 'Dell', 'bluetooth', NULL, NULL, 'no', NULL, '2025-07-04 07:59:39', '2025-07-04 07:59:39'),
(3, 'MOU1003', 'Logitech', 'wired', NULL, NULL, 'no', NULL, '2025-07-04 07:59:39', '2025-07-04 07:59:39'),
(4, 'MOU1004', 'HP', 'bluetooth', NULL, NULL, 'no', NULL, '2025-07-04 07:59:39', '2025-07-04 07:59:39'),
(5, 'MOU1005', 'Dell', 'wired', NULL, NULL, 'no', NULL, '2025-07-04 07:59:39', '2025-07-04 07:59:39'),
(6, 'MOU1006', 'Lenovo', 'wired', NULL, NULL, 'no', NULL, '2025-07-04 07:59:39', '2025-07-04 07:59:39'),
(7, 'MOU1007', 'Logitech', 'bluetooth', NULL, NULL, 'no', NULL, '2025-07-04 07:59:39', '2025-07-04 07:59:39'),
(8, 'MOU1008', 'HP', 'wired', NULL, NULL, 'no', NULL, '2025-07-04 07:59:39', '2025-07-04 07:59:39'),
(9, 'MOU1009', 'Dell', 'bluetooth', NULL, NULL, 'no', NULL, '2025-07-04 07:59:39', '2025-07-04 07:59:39'),
(10, 'MOU1010', 'Logitech', 'wired', NULL, NULL, 'no', NULL, '2025-07-04 07:59:39', '2025-07-04 07:59:39'),
(11, 'MOU1011', 'Lenovo', 'bluetooth', NULL, NULL, 'no', NULL, '2025-07-04 07:59:39', '2025-07-04 07:59:39'),
(12, 'MOU1012', 'HP', 'wired', NULL, NULL, 'no', NULL, '2025-07-04 07:59:39', '2025-07-04 07:59:39'),
(13, 'MOU1013', 'Dell', 'wired', NULL, NULL, 'no', NULL, '2025-07-04 07:59:39', '2025-07-04 07:59:39'),
(14, 'MOU1014', 'Logitech', 'bluetooth', NULL, NULL, 'no', NULL, '2025-07-04 07:59:39', '2025-07-04 07:59:39'),
(15, 'MOU1015', 'Lenovo', 'wired', NULL, NULL, 'no', NULL, '2025-07-04 07:59:39', '2025-07-04 07:59:39'),
(16, 'MOU1016', 'HP', 'bluetooth', NULL, NULL, 'no', NULL, '2025-07-04 07:59:39', '2025-07-04 07:59:39'),
(17, 'MOU1017', 'Dell', 'wired', NULL, NULL, 'no', NULL, '2025-07-04 07:59:39', '2025-07-04 07:59:39'),
(18, 'MOU1018', 'Logitech', 'wired', NULL, NULL, 'no', NULL, '2025-07-04 07:59:39', '2025-07-04 07:59:39'),
(19, 'MOU1019', 'Lenovo', 'bluetooth', NULL, NULL, 'no', NULL, '2025-07-04 07:59:39', '2025-07-04 07:59:39'),
(20, 'MOU1020', 'HP', 'wired', NULL, NULL, 'no', NULL, '2025-07-04 07:59:39', '2025-07-04 07:59:39'),
(21, 'MOU1021', 'Dell', 'bluetooth', NULL, NULL, 'no', NULL, '2025-07-04 07:59:39', '2025-07-04 07:59:39'),
(22, 'MOU1022', 'Logitech', 'wired', NULL, NULL, 'no', NULL, '2025-07-04 07:59:39', '2025-07-04 07:59:39'),
(23, 'MOU1023', 'Lenovo', 'wired', NULL, NULL, 'no', NULL, '2025-07-04 07:59:39', '2025-07-04 07:59:39'),
(24, 'MOU1024', 'HP', 'bluetooth', NULL, NULL, 'no', NULL, '2025-07-04 07:59:39', '2025-07-04 07:59:39'),
(25, 'MOU1025', 'Dell', 'bluetooth', NULL, NULL, 'no', NULL, '2025-07-04 07:59:39', '2025-07-04 02:32:59');

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

--
-- Dumping data for table `tbl_other_asset`
--

INSERT INTO `tbl_other_asset` (`id`, `asset_id`, `name`, `count`, `created_at`, `updated_at`) VALUES
(1, 'OA1001', 'Data Cable', 5, '2025-07-07 08:13:14', '2025-07-07 08:13:14'),
(2, 'OA1002', 'HDMI Cable', 3, '2025-07-07 08:13:14', '2025-07-07 08:13:14'),
(3, 'OA1003', 'VGA Cable', 2, '2025-07-07 08:13:14', '2025-07-07 08:13:14'),
(4, 'OA1004', 'USB Hub', 4, '2025-07-07 08:13:14', '2025-07-07 08:13:14'),
(5, 'OA1005', 'Power Cable', 6, '2025-07-07 08:13:14', '2025-07-07 08:13:14'),
(6, 'OA1006', 'Extension Cord', 5, '2025-07-07 08:13:14', '2025-07-07 08:13:14'),
(7, 'OA1007', 'LAN Cable', 10, '2025-07-07 08:13:14', '2025-07-07 08:13:14'),
(8, 'OA1008', 'Charger', 8, '2025-07-07 08:13:14', '2025-07-07 08:13:14'),
(9, 'OA1009', 'Mouse Pad', 12, '2025-07-07 08:13:14', '2025-07-07 08:13:14'),
(10, 'OA1010', 'Webcam', 1, '2025-07-07 08:13:14', '2025-07-07 08:13:14'),
(11, 'OA1011', 'Microphone', 3, '2025-07-07 08:13:14', '2025-07-07 08:13:14'),
(12, 'OA1012', 'Tripod Stand', 2, '2025-07-07 08:13:14', '2025-07-07 08:13:14'),
(13, 'OA1013', 'Power Adapter', 4, '2025-07-07 08:13:14', '2025-07-07 08:13:14'),
(14, 'OA1014', 'HDMI Splitter', 2, '2025-07-07 08:13:14', '2025-07-07 08:13:14'),
(15, 'OA1015', 'Display Cable', 6, '2025-07-07 08:13:14', '2025-07-07 08:13:14'),
(16, 'OA1016', 'Docking Station', 1, '2025-07-07 08:13:14', '2025-07-07 08:13:14'),
(17, 'OA1017', 'Laptop Stand', 7, '2025-07-07 08:13:14', '2025-07-07 08:13:14'),
(18, 'OA1018', 'Thermal Paste', 10, '2025-07-07 08:13:14', '2025-07-07 08:13:14'),
(19, 'OA1019', 'Monitor Arm', 2, '2025-07-07 08:13:14', '2025-07-07 08:13:14'),
(20, 'OA1020', 'SATA Cable', 5, '2025-07-07 08:13:14', '2025-07-07 08:13:14'),
(21, 'OA1021', 'Card Reader', 3, '2025-07-07 08:13:14', '2025-07-07 08:13:14'),
(22, 'OA1022', 'USB Cable', 6, '2025-07-07 08:13:14', '2025-07-07 08:13:14'),
(23, 'OA1023', 'Wireless Mouse', 4, '2025-07-07 08:13:14', '2025-07-07 08:13:14'),
(24, 'OA1024', 'HDMI to VGA Adapter', 2, '2025-07-07 08:13:14', '2025-07-07 08:13:14'),
(25, 'OA1025', 'Ethernet Switch', 1, '2025-07-07 08:13:14', '2025-07-07 08:13:14');

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

--
-- Dumping data for table `tbl_phone`
--

INSERT INTO `tbl_phone` (`id`, `asset_id`, `serial_number`, `model`, `manufacturer`, `screen_size`, `ram`, `storage`, `os`, `device_type`, `assigned_to`, `emp_id`, `assign_status`, `assign_date`, `created_at`, `updated_at`) VALUES
(1, 'PHN1001', 'CND9388DGQ', 'M31', 'Samsung', '6 inch', '8gb', '128gb', 'Android', 'android', NULL, NULL, 'no', NULL, '2025-07-07 00:54:02', '2025-07-07 00:55:46');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_keyboard`
--
ALTER TABLE `tbl_keyboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_laptop`
--
ALTER TABLE `tbl_laptop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_mac`
--
ALTER TABLE `tbl_mac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_monitor`
--
ALTER TABLE `tbl_monitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_mouse`
--
ALTER TABLE `tbl_mouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_other_asset`
--
ALTER TABLE `tbl_other_asset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_phone`
--
ALTER TABLE `tbl_phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
