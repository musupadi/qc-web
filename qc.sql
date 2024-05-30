-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 08:22 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.2.34

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `label`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Toast', '2024-05-17 00:36:16', 2, '2024-05-17 00:36:16', 2),
(2, 'ss', '2024-05-17 00:37:43', 2, '2024-05-17 00:37:52', 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `label`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Test', '2024-05-30 10:34:45', 1, '2024-05-30 10:34:45', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `label`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Tost', '2024-05-17 14:42:16', 2, '2024-05-17 14:42:16', 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forecast`
--

INSERT INTO `forecast` (`id`, `id_product`, `label`, `forecast`, `date`, `stock`, `qty`, `id_customer`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 3, '10', 10, '2024-05-17', 11, 11, 1, '2024-05-17 15:32:52', 2, '2024-05-17 15:32:52', 2),
(2, 3, 'Tost', 12, '2024-05-17', 11, 11, 1, '2024-05-17 15:34:03', 2, '2024-05-17 15:34:03', 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(9, 'Success', 'Menginput Raw Material Baru Test', '2024-05-30 10:40:51', 1, '2024-05-30 10:40:51', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `code`, `label`, `color`, `series`, `code_category`, `id_category`, `id_technology`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(3, '321', 'Taost', '123', 'Test', '123', 1, 1, '2024-05-17 00:38:37', 2, '0000-00-00 00:00:00', 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qc`
--

INSERT INTO `qc` (`id`, `id_product`, `load_number`, `qty`, `production_date`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 3, '11', 11, '2024-05-17', '2024-05-17 01:09:12', 2, '2024-05-17 01:09:12', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rawmaterial`
--

CREATE TABLE `rawmaterial` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_countries` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rawmaterial`
--

INSERT INTO `rawmaterial` (`id`, `code`, `label`, `id_category`, `id_countries`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, '12321', 'Test', 1, 1, '2024-05-30 10:40:51', 1, '2024-05-30 10:40:51', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rawmat_category`
--

INSERT INTO `rawmat_category` (`id`, `label`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Test', '2024-05-30 10:34:38', 1, '2024-05-30 10:34:38', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `level`, `label`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'Super Admin', '2024-04-29 09:59:07', 1, '2024-04-29 09:59:07', 1),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `id_user`, `id_forecast`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 4, 1, '2024-05-17 15:32:52', 2, '2024-05-17 15:32:52', 2),
(2, 5, 1, '2024-05-17 15:32:52', 2, '2024-05-17 15:32:52', 2),
(3, 4, 2, '2024-05-17 15:34:03', 2, '2024-05-17 15:34:03', 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `technology`
--

INSERT INTO `technology` (`id`, `label`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Toast', '2024-05-16 23:17:18', 2, '2024-05-17 00:33:58', 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `forecast`
--
ALTER TABLE `forecast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `qc`
--
ALTER TABLE `qc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rawmaterial`
--
ALTER TABLE `rawmaterial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rawmat_category`
--
ALTER TABLE `rawmat_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `technology`
--
ALTER TABLE `technology`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
