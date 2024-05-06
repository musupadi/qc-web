-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2024 at 03:54 AM
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
(1, 'Solvent', '2024-04-29 15:24:34', 2, '2024-04-29 15:24:34', 2);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `label`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Test', '0000-00-00 00:00:00', 3, '0000-00-00 00:00:00', 3);

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
(1, 1, 'Test Forecast', 100000, '2024-05-03', 100, 100, 1, '2024-05-03 16:10:13', 1, '2024-05-03 16:10:13', 1);

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
(1, 'Success', 'Menginput Product Test Product > 312', '2024-04-30 16:56:04', 2, '2024-04-30 16:56:04', 2),
(2, 'Success', 'Menginput Customer Baru Test', '2024-05-03 15:17:33', 3, '2024-05-03 15:17:33', 3);

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
(1, 'TEST123', 'Test Product', 'Test', 'Test', '', 1, 1, '2024-04-30 09:55:40', 2, '0000-00-00 00:00:00', 2);

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
(1, 1, 'Test123', 100, '2024-04-30', '2024-04-30 11:21:24', 2, '2024-04-30 11:21:24', 2),
(2, 1, '312', 312, '2024-05-09', '2024-04-30 16:56:04', 2, '2024-04-30 16:56:04', 2);

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
(4, 4, 'PIC', '2024-04-29 13:16:46', 1, '2024-04-29 13:16:46', 1);

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
(1, 1, 1, '2024-05-03 16:11:09', 1, '2024-05-03 16:11:09', 1),
(2, 2, 1, '2024-05-03 16:11:09', 1, '2024-05-03 16:11:09', 1);

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
(1, 'VINNYL', '2024-04-29 15:29:26', 2, '2024-04-29 15:29:26', 2);

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
(4, 'PPIC', 'ppic@gmail.com', 0, 'ppic', '202cb962ac59075b964b07152d234b70', '123', 4, 'default.png', 0, '2024-05-02 15:28:18', 2, '2024-05-02 15:28:18', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `qc`
--
ALTER TABLE `qc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `technology`
--
ALTER TABLE `technology`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
