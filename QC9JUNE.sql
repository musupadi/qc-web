-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2024 at 11:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qc`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `label`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(3, 'Solvent', '2024-06-04 13:30:02', 2, '2024-06-04 13:38:13', 2),
(4, 'Base Color', '2024-06-04 13:30:19', 2, '2024-06-04 13:30:19', 2),
(5, 'Color Matching', '2024-06-04 13:30:34', 2, '2024-06-04 13:30:34', 2),
(6, 'Acrylic', '2024-06-04 13:30:44', 2, '2024-06-04 13:30:44', 2);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `label`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 'Indonesia', '2024-06-04 13:46:52', 2, '2024-06-04 13:46:52', 2),
(3, 'India', '2024-06-04 13:46:59', 2, '2024-06-04 13:46:59', 2),
(4, 'Hongkong', '2024-06-04 13:47:04', 2, '2024-06-04 13:47:04', 2),
(5, 'Germany', '2024-06-04 13:47:15', 2, '2024-06-04 13:47:15', 2),
(6, 'Japan', '2024-06-04 13:47:19', 2, '2024-06-04 13:47:19', 2),
(7, 'China', '2024-06-04 13:47:24', 2, '2024-06-04 13:47:24', 2),
(8, 'Korea', '2024-06-04 13:47:39', 2, '2024-06-04 13:47:39', 2),
(9, 'USA', '2024-06-04 13:47:46', 2, '2024-06-04 13:47:46', 2),
(10, 'Singapore', '2024-06-04 13:48:08', 2, '2024-06-04 13:48:08', 2),
(11, 'Malaysia', '2024-06-04 13:48:14', 2, '2024-06-04 13:48:14', 2);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `label`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 'Customer 1', '2024-06-04 16:11:26', 2, '2024-06-04 16:11:26', 2),
(3, 'Customer 2', '2024-06-04 16:13:24', 2, '2024-06-04 16:13:24', 2),
(4, 'Customer 3', '2024-06-04 16:13:35', 2, '2024-06-04 16:13:35', 2);

-- --------------------------------------------------------

--
-- Table structure for table `forecast`
--

CREATE TABLE `forecast` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `forecast` bigint(20) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `stock` bigint(20) NOT NULL,
  `qty` bigint(20) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forecast`
--

INSERT INTO `forecast` (`id`, `id_product`, `label`, `forecast`, `date`, `stock`, `qty`, `id_customer`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(3, 8, 'Solid Green January 2024', 2500, '2024-01-31', 0, 0, 2, '2024-06-04 16:16:14', 2, '2024-06-04 16:16:14', 2),
(4, 8, 'Solid Green February 2024', 3000, '2024-02-27', 0, 0, 2, '2024-06-04 16:17:05', 2, '2024-06-04 16:17:05', 2),
(5, 8, 'Solid Green March 2024', 5000, '2024-03-30', 0, 0, 2, '2024-06-04 16:17:48', 2, '2024-06-04 16:17:48', 2),
(6, 8, 'Solid Green April 2024', 4000, '2024-04-30', 0, 0, 2, '2024-06-04 16:20:41', 2, '2024-06-04 16:20:41', 2),
(7, 8, 'Solid Green', 6000, '2024-05-20', 0, 0, 2, '2024-06-04 16:21:41', 2, '2024-06-04 16:21:41', 2),
(8, 8, 'Solid Green June 2024', 7000, '2024-06-30', 0, 0, 2, '2024-06-04 16:22:38', 2, '2024-06-04 16:22:38', 2),
(9, 8, 'Solid Green July 2024', 7500, '2024-07-30', 0, 0, 2, '2024-06-04 16:24:24', 2, '2024-06-04 16:24:24', 2),
(10, 8, 'Solid Green August 2024', 8500, '2024-08-30', 0, 0, 2, '2024-06-04 16:24:44', 2, '2024-06-04 16:24:44', 2),
(11, 8, 'Solid Green September 2024', 7500, '2024-09-30', 0, 0, 2, '2024-06-04 16:25:16', 2, '2024-06-04 16:25:16', 2),
(12, 8, 'Solid Green October 2024', 9000, '2024-10-30', 0, 0, 2, '2024-06-04 16:25:55', 2, '2024-06-04 16:25:55', 2),
(13, 8, 'Solid Green November 2024', 8500, '2024-11-30', 0, 0, 2, '2024-06-04 16:27:20', 2, '2024-06-04 16:27:20', 2),
(14, 8, 'Solid Green Desember 2024', 10000, '2024-12-30', 0, 0, 2, '2024-06-04 16:27:48', 2, '2024-06-04 16:27:48', 2);

-- --------------------------------------------------------

--
-- Table structure for table `incoming_raw`
--

CREATE TABLE `incoming_raw` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `mfg_date` datetime NOT NULL DEFAULT current_timestamp(),
  `exp_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `incoming_raw`
--

INSERT INTO `incoming_raw` (`id`, `id_product`, `qty`, `mfg_date`, `exp_date`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(4, 9, 2000, '2023-01-25 00:00:00', '2024-01-25 00:00:00', '2024-06-09 16:38:14', 2, '2024-06-09 16:38:14', 2);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `status` enum('Success','Failed') NOT NULL DEFAULT 'Success',
  `action` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `status`, `action`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Success', 'Menginput Product  > 11', '2024-05-17 01:09:12', 2, '2024-05-17 01:09:12', 2),
(2, 'Success', 'Menginput Product Baru 123', '2024-05-17 14:17:46', 2, '2024-05-17 14:17:46', 2),
(3, 'Success', 'Menghapus Product', '2024-05-17 14:28:43', 2, '2024-05-17 14:28:43', 2),
(4, 'Success', 'Menghapus Product', '2024-05-17 14:28:47', 2, '2024-05-17 14:28:47', 2),
(5, 'Success', 'Menginput Customer Baru Tost', '2024-05-17 14:42:16', 2, '2024-05-17 14:42:16', 2),
(6, 'Success', 'Menginput Forecast Tost Dengan Nilai 123', '2024-05-17 14:42:42', 2, '2024-05-17 14:42:42', 2),
(7, 'Success', 'Menginput Forecast 123 Dengan Nilai 123', '2024-05-17 14:43:02', 2, '2024-05-17 14:43:02', 2),
(8, 'Success', 'Menginput Forecast Tost Dengan Nilai 12', '2024-05-17 15:34:03', 2, '2024-05-17 15:34:03', 2),
(9, 'Success', 'Menginput Raw Material Baru Test', '2024-05-30 10:40:51', 1, '2024-05-30 10:40:51', 1),
(10, 'Success', 'Menginput Product  > 100', '2024-06-04 13:11:53', 2, '2024-06-04 13:11:53', 2),
(11, 'Success', 'Menginput Product Baru Product Test 001', '2024-06-04 13:35:18', 2, '2024-06-04 13:35:18', 2),
(12, 'Success', 'Menginput Product Baru Product Test 002', '2024-06-04 13:36:00', 2, '2024-06-04 13:36:00', 2),
(13, 'Success', 'Menghapus Product', '2024-06-04 13:36:13', 2, '2024-06-04 13:36:13', 2),
(14, 'Success', 'Menginput Raw Material Baru Test Raw Material 001', '2024-06-04 13:48:35', 2, '2024-06-04 13:48:35', 2),
(15, 'Success', 'Menginput Raw Material Baru Test Raw Material 002', '2024-06-04 14:06:52', 2, '2024-06-04 14:06:52', 2),
(16, 'Success', 'Menginput Raw Material Baru Test Raw Material 003', '2024-06-04 14:07:34', 2, '2024-06-04 14:07:34', 2),
(17, 'Success', 'Menginput Raw Material Baru Test Raw Material 004', '2024-06-04 14:13:10', 2, '2024-06-04 14:13:10', 2),
(18, 'Success', 'Menginput Raw Material Baru Test Raw Material 005', '2024-06-04 14:29:44', 2, '2024-06-04 14:29:44', 2),
(19, 'Success', 'Menginput Raw Material Baru Test Raw Material 006', '2024-06-04 14:39:22', 2, '2024-06-04 14:39:22', 2),
(20, 'Success', 'Menginput Raw Material Baru TEST007', '2024-06-04 14:48:51', 2, '2024-06-04 14:48:51', 2),
(21, 'Success', 'Menginput Raw Material Baru Monolite Resin', '2024-06-04 15:29:02', 2, '2024-06-04 15:29:02', 2),
(22, 'Success', 'Menginput Raw Material Baru Vinnyl Resin', '2024-06-04 15:29:48', 2, '2024-06-04 15:29:48', 2),
(23, 'Success', 'Menginput Raw Material Baru Vantropone', '2024-06-04 15:30:29', 2, '2024-06-04 15:30:29', 2),
(24, 'Success', 'Menginput Raw Material Baru Novotex Carmine', '2024-06-04 15:30:59', 2, '2024-06-04 15:30:59', 2),
(25, 'Success', 'Menginput Raw Material Baru Neorez', '2024-06-04 15:31:59', 2, '2024-06-04 15:31:59', 2),
(26, 'Success', 'Menginput Product Baru Solid Green', '2024-06-04 15:46:10', 2, '2024-06-04 15:46:10', 2),
(27, 'Success', 'Menginput Product Baru Solid Blue', '2024-06-04 15:50:02', 2, '2024-06-04 15:50:02', 2),
(28, 'Success', 'Menginput Product Baru Solid Red', '2024-06-04 15:51:14', 2, '2024-06-04 15:51:14', 2),
(29, 'Success', 'Menginput Product Baru Solid White ', '2024-06-04 15:52:12', 2, '2024-06-04 15:52:12', 2),
(30, 'Success', 'Menginput Product Baru Clear Magenta', '2024-06-04 15:56:06', 2, '2024-06-04 15:56:06', 2),
(31, 'Success', 'Menginput Product  > 5000', '2024-06-04 15:59:33', 2, '2024-06-04 15:59:33', 2),
(32, 'Success', 'Menginput Product  > 4000', '2024-06-04 16:06:37', 2, '2024-06-04 16:06:37', 2),
(33, 'Success', 'Menginput Customer Baru Customer 1', '2024-06-04 16:11:26', 2, '2024-06-04 16:11:26', 2),
(34, 'Success', 'Menginput Customer Baru Customer 2', '2024-06-04 16:13:24', 2, '2024-06-04 16:13:24', 2),
(35, 'Success', 'Menginput Customer Baru Customer 3', '2024-06-04 16:13:35', 2, '2024-06-04 16:13:35', 2),
(36, 'Success', 'Menginput Forecast Solid Green January 2024 Dengan Nilai 2500', '2024-06-04 16:16:14', 2, '2024-06-04 16:16:14', 2),
(37, 'Success', 'Menginput Forecast Solid Green February 2024 Dengan Nilai 3000', '2024-06-04 16:17:05', 2, '2024-06-04 16:17:05', 2),
(38, 'Success', 'Menginput Forecast Solid Green March 2024 Dengan Nilai 5000', '2024-06-04 16:17:48', 2, '2024-06-04 16:17:48', 2),
(39, 'Success', 'Menginput Product  > 5000', '2024-06-04 16:18:57', 2, '2024-06-04 16:18:57', 2),
(40, 'Success', 'Menginput Forecast Solid Green April 2024 Dengan Nilai 4000', '2024-06-04 16:20:41', 2, '2024-06-04 16:20:41', 2),
(41, 'Success', 'Menginput Forecast Solid Green Dengan Nilai 6000', '2024-06-04 16:21:41', 2, '2024-06-04 16:21:41', 2),
(42, 'Success', 'Menginput Forecast Solid Green June 2024 Dengan Nilai 7000', '2024-06-04 16:22:38', 2, '2024-06-04 16:22:38', 2),
(43, 'Success', 'Menginput Forecast Solid Green July 2024 Dengan Nilai 7500', '2024-06-04 16:24:24', 2, '2024-06-04 16:24:24', 2),
(44, 'Success', 'Menginput Forecast Solid Green August 2024 Dengan Nilai 8500', '2024-06-04 16:24:44', 2, '2024-06-04 16:24:44', 2),
(45, 'Success', 'Menginput Forecast Solid Green September 2024 Dengan Nilai 7500', '2024-06-04 16:25:16', 2, '2024-06-04 16:25:16', 2),
(46, 'Success', 'Menginput Forecast Solid Green October 2024 Dengan Nilai 9000', '2024-06-04 16:25:55', 2, '2024-06-04 16:25:55', 2),
(47, 'Success', 'Menginput Forecast Solid Green November 2024 Dengan Nilai 8500', '2024-06-04 16:27:20', 2, '2024-06-04 16:27:20', 2),
(48, 'Success', 'Menginput Forecast Solid Green Desember 2024 Dengan Nilai 10000', '2024-06-04 16:27:48', 2, '2024-06-04 16:27:48', 2),
(49, 'Success', 'Input Raw Material  Quantity = 100 Menjadi 100', '2024-06-08 15:00:50', 1, '2024-06-08 15:00:50', 1),
(50, 'Success', 'Menginput Product  > 3000', '2024-06-09 15:36:48', 2, '2024-06-09 15:36:48', 2),
(51, 'Success', 'Menginput Product  > 4000', '2024-06-09 15:37:26', 2, '2024-06-09 15:37:26', 2),
(52, 'Success', 'Menginput Product  > 5000', '2024-06-09 15:38:29', 2, '2024-06-09 15:38:29', 2),
(53, 'Success', 'Menginput Product  > 4000', '2024-06-09 15:51:44', 2, '2024-06-09 15:51:44', 2),
(54, 'Success', 'Menginput Product  > 5000', '2024-06-09 16:02:05', 2, '2024-06-09 16:02:05', 2),
(55, 'Success', 'Menginput Product  > 6000', '2024-06-09 16:03:15', 2, '2024-06-09 16:03:15', 2),
(56, 'Success', 'Menginput Product  > 4000', '2024-06-09 16:03:38', 2, '2024-06-09 16:03:38', 2),
(57, 'Success', 'Menginput Product  > 7000', '2024-06-09 16:05:12', 2, '2024-06-09 16:05:12', 2),
(58, 'Success', 'Menginput Product  > 5000', '2024-06-09 16:06:50', 2, '2024-06-09 16:06:50', 2),
(59, 'Success', 'Menginput Product  > 6000', '2024-06-09 16:07:51', 2, '2024-06-09 16:07:51', 2),
(60, 'Success', 'Menginput Product  > 6000', '2024-06-09 16:09:26', 2, '2024-06-09 16:09:26', 2),
(61, 'Success', 'Menginput Product  > 6000', '2024-06-09 16:10:40', 2, '2024-06-09 16:10:40', 2),
(62, 'Success', 'Menginput Product  > 6000', '2024-06-09 16:14:33', 2, '2024-06-09 16:14:33', 2),
(63, 'Success', 'Menginput Product  > 4000', '2024-06-09 16:14:57', 2, '2024-06-09 16:14:57', 2),
(64, 'Success', 'Menginput Product  > 3500', '2024-06-09 16:21:00', 2, '2024-06-09 16:21:00', 2),
(65, 'Success', 'Menginput Product  > 5900', '2024-06-09 16:22:26', 2, '2024-06-09 16:22:26', 2),
(66, 'Success', 'Menginput Product  > 7100', '2024-06-09 16:22:58', 2, '2024-06-09 16:22:58', 2),
(67, 'Success', 'Input Raw Material  Quantity = 2000 Menjadi 2000', '2024-06-09 16:36:44', 2, '2024-06-09 16:36:44', 2),
(68, 'Success', 'Input Raw Material  Quantity = 2000 Menjadi 2000', '2024-06-09 16:38:14', 2, '2024-06-09 16:38:14', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `series` varchar(255) NOT NULL,
  `code_category` varchar(255) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_technology` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `code`, `label`, `color`, `series`, `code_category`, `id_category`, `id_technology`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(8, '30043024001', 'Solid Green', 'Green ', 'AB', 'C', 4, 4, '2024-06-04 15:46:10', 2, '0000-00-00 00:00:00', 2),
(10, '30043024003', 'Solid Red', 'Red', 'AB', 'C', 5, 6, '2024-06-04 15:51:14', 2, '0000-00-00 00:00:00', 2),
(11, '30043024004', 'Solid White ', 'White', 'AB', 'B', 4, 4, '2024-06-04 15:52:12', 2, '0000-00-00 00:00:00', 2),
(12, '30043024005', 'Clear Magenta', 'Magenta', 'Canon', 'A', 4, 6, '2024-06-04 15:56:06', 2, '0000-00-00 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `qc`
--

CREATE TABLE `qc` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `load_number` varchar(255) NOT NULL,
  `qty` bigint(20) NOT NULL,
  `production_date` date NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `qc`
--

INSERT INTO `qc` (`id`, `id_product`, `load_number`, `qty`, `production_date`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(4, 8, '01012024', 5000, '2024-01-01', '2024-06-04 15:59:33', 2, '2024-06-04 15:59:33', 2),
(5, 8, '01022024', 4000, '2024-02-01', '2024-06-04 16:06:37', 2, '2024-06-04 16:06:37', 2),
(6, 8, '01032024', 5000, '2024-03-02', '2024-06-04 16:18:57', 2, '2024-06-04 16:18:57', 2),
(7, 8, '01012023', 3000, '2023-01-01', '2024-06-09 15:36:48', 2, '2024-06-09 15:36:48', 2),
(8, 8, '01022023', 4000, '2023-02-01', '2024-06-09 15:37:26', 2, '2024-06-09 15:37:26', 2),
(9, 8, '01032023', 5000, '2023-03-01', '2024-06-09 15:38:29', 2, '2024-06-09 15:38:29', 2),
(10, 8, '01042023', 4000, '2023-04-01', '2024-06-09 15:51:44', 2, '2024-06-09 15:51:44', 2),
(11, 8, ' 01052023', 5000, '2023-05-01', '2024-06-09 16:02:05', 2, '2024-06-09 16:02:05', 2),
(12, 8, '01062023', 6000, '2023-06-01', '2024-06-09 16:03:15', 2, '2024-06-09 16:03:15', 2),
(13, 8, ' 01072023', 4000, '2023-07-01', '2024-06-09 16:03:38', 2, '2024-06-09 16:03:38', 2),
(14, 8, ' 01082023', 7000, '2023-08-01', '2024-06-09 16:05:12', 2, '2024-06-09 16:05:12', 2),
(15, 8, '01092023', 5000, '2023-09-01', '2024-06-09 16:06:50', 2, '2024-06-09 16:06:50', 2),
(16, 8, '01102023', 6000, '2023-10-01', '2024-06-09 16:07:51', 2, '2024-06-09 16:07:51', 2),
(17, 8, '01112023', 6000, '2023-11-01', '2024-06-09 16:09:26', 2, '2024-06-09 16:09:26', 2),
(18, 8, '01122023', 6000, '2023-12-01', '2024-06-09 16:10:40', 2, '2024-06-09 16:10:40', 2),
(21, 8, '01042024', 3500, '2024-04-01', '2024-06-09 16:21:00', 2, '2024-06-09 16:21:00', 2),
(22, 8, '01052024', 5900, '2024-05-01', '2024-06-09 16:22:26', 2, '2024-06-09 16:22:26', 2),
(23, 8, '01062024', 7100, '2024-06-01', '2024-06-09 16:22:58', 2, '2024-06-09 16:22:58', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rawmaterial`
--

CREATE TABLE `rawmaterial` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `id_rawmat_category` int(11) NOT NULL,
  `id_countries` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rawmaterial`
--

INSERT INTO `rawmaterial` (`id`, `code`, `label`, `id_rawmat_category`, `id_countries`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(9, 'RM240001', 'Monolite Resin', 2, 3, '2024-06-04 15:29:02', 2, '2024-06-04 15:29:02', 2),
(10, 'RM240002', 'Vinnyl Resin', 3, 7, '2024-06-04 15:29:48', 2, '2024-06-04 15:29:48', 2),
(11, 'RM240003', 'Vantropone', 3, 7, '2024-06-04 15:30:29', 2, '2024-06-04 15:30:29', 2),
(12, 'RM240004', 'Novotex Carmine', 2, 4, '2024-06-04 15:30:59', 2, '2024-06-04 15:30:59', 2),
(13, 'RM240005', 'Neorez', 3, 4, '2024-06-04 15:31:59', 2, '2024-06-04 15:31:59', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rawmat_category`
--

CREATE TABLE `rawmat_category` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rawmat_category`
--

INSERT INTO `rawmat_category` (`id`, `label`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 'Pigment', '2024-06-04 13:43:24', 2, '2024-06-04 13:43:24', 2),
(3, 'Resin', '2024-06-04 13:44:26', 2, '2024-06-04 13:44:26', 2),
(4, 'Additive', '2024-06-04 13:44:39', 2, '2024-06-04 13:44:39', 2),
(5, 'Solvent', '2024-06-04 15:35:51', 2, '2024-06-04 15:35:51', 2);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `level`, `label`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 2, 'Owner', '2024-04-29 10:42:33', 1, '2024-04-29 10:42:33', 1),
(3, 3, 'Marketing', '2024-04-29 13:16:23', 1, '2024-04-29 13:16:23', 1),
(4, 4, 'PPIC', '2024-05-17 14:38:11', 1, '2024-05-17 14:38:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_forecast` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `id_user`, `id_forecast`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 4, 1, '2024-05-17 15:32:52', 2, '2024-05-17 15:32:52', 2),
(2, 5, 1, '2024-05-17 15:32:52', 2, '2024-05-17 15:32:52', 2),
(3, 4, 2, '2024-05-17 15:34:03', 2, '2024-05-17 15:34:03', 2),
(4, 4, 3, '2024-06-04 16:16:14', 2, '2024-06-04 16:16:14', 2),
(5, 4, 4, '2024-06-04 16:17:05', 2, '2024-06-04 16:17:05', 2),
(6, 4, 5, '2024-06-04 16:17:48', 2, '2024-06-04 16:17:48', 2),
(7, 4, 6, '2024-06-04 16:20:41', 2, '2024-06-04 16:20:41', 2),
(8, 4, 7, '2024-06-04 16:21:41', 2, '2024-06-04 16:21:41', 2),
(9, 4, 8, '2024-06-04 16:22:38', 2, '2024-06-04 16:22:38', 2),
(10, 4, 9, '2024-06-04 16:24:24', 2, '2024-06-04 16:24:24', 2),
(11, 4, 10, '2024-06-04 16:24:44', 2, '2024-06-04 16:24:44', 2),
(12, 4, 11, '2024-06-04 16:25:16', 2, '2024-06-04 16:25:16', 2),
(13, 4, 12, '2024-06-04 16:25:55', 2, '2024-06-04 16:25:55', 2),
(14, 4, 13, '2024-06-04 16:27:20', 2, '2024-06-04 16:27:20', 2),
(15, 4, 14, '2024-06-04 16:27:48', 2, '2024-06-04 16:27:48', 2);

-- --------------------------------------------------------

--
-- Table structure for table `technology`
--

CREATE TABLE `technology` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `technology`
--

INSERT INTO `technology` (`id`, `label`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 'VINNYL', '2024-06-04 13:32:29', 2, '2024-06-04 13:38:46', 2),
(3, 'PU', '2024-06-04 13:32:52', 2, '2024-06-04 13:39:14', 2),
(4, 'NC/PA', '2024-06-04 13:33:04', 2, '2024-06-04 13:33:04', 2),
(5, 'CLPP', '2024-06-04 13:33:54', 2, '2024-06-04 13:33:54', 2),
(6, 'PVC', '2024-06-04 13:33:59', 2, '2024-06-04 13:33:59', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jenis_kelamin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `kontak` varchar(50) NOT NULL,
  `id_role` int(1) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `id_shop` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `jenis_kelamin`, `username`, `password`, `kontak`, `id_role`, `photo`, `id_shop`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Zyarga', 'zyargacode@gmail.com', 0, 'zyarga', '202cb962ac59075b964b07152d234b70', '081384215205', 1, 'default.png', 0, '2024-04-29 10:01:11', 1, '2024-04-29 10:01:11', 1),
(2, 'Hamid', 'hamid@gmail.com', 0, 'hamid', '202cb962ac59075b964b07152d234b70', '21312321', 2, 'default.png', 1, '2024-04-29 10:43:43', 1, '2024-04-29 10:43:43', 1),
(3, 'Marketing', 'marketing@gmail.com', 0, 'marketing', '202cb962ac59075b964b07152d234b70', '12321', 3, 'default.png', 0, '2024-05-02 15:27:26', 2, '2024-05-02 15:27:26', 2),
(4, 'PPIC', 'ppic@gmail.com', 0, 'ppic', '202cb962ac59075b964b07152d234b70', '123', 4, 'default.png', 0, '2024-05-02 15:28:18', 2, '2024-05-02 15:28:18', 2),
(5, 'PPIC 2', 'ppic2@gmail.com', 0, 'ppic2', '202cb962ac59075b964b07152d234b70', '21312321', 4, 'default.png', 1, '2024-05-08 10:24:24', 1, '2024-05-08 10:24:24', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forecast`
--
ALTER TABLE `forecast`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incoming_raw`
--
ALTER TABLE `incoming_raw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qc`
--
ALTER TABLE `qc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rawmaterial`
--
ALTER TABLE `rawmaterial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rawmat_category`
--
ALTER TABLE `rawmat_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technology`
--
ALTER TABLE `technology`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `forecast`
--
ALTER TABLE `forecast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `incoming_raw`
--
ALTER TABLE `incoming_raw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `qc`
--
ALTER TABLE `qc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `rawmaterial`
--
ALTER TABLE `rawmaterial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rawmat_category`
--
ALTER TABLE `rawmat_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `technology`
--
ALTER TABLE `technology`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
