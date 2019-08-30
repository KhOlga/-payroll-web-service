-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2019 at 06:34 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll_example`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`) VALUES
(1, 'mobile phones'),
(2, 'TV sets'),
(3, 'computers');

-- --------------------------------------------------------

--
-- Table structure for table `made_products`
--

CREATE TABLE `made_products` (
  `made_products_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `worker_id` int(11) NOT NULL,
  `products_amount` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `made_products`
--

INSERT INTO `made_products` (`made_products_id`, `product_id`, `worker_id`, `products_amount`, `date`) VALUES
(1, 1, 1, 4, '2019-08-29 21:23:57'),
(2, 3, 14, 3, '2019-08-30 00:00:28'),
(4, 1, 2, 1, '2019-08-30 00:52:08'),
(5, 1, 2, 1, '2019-08-30 00:53:41'),
(6, 1, 2, 1, '2019-08-30 00:55:08'),
(7, 2, 1, 3, '2019-08-30 00:56:37'),
(8, 1, 2, 1, '2019-08-30 02:38:23'),
(9, 1, 2, 1, '2019-08-30 02:51:33'),
(10, 1, 2, 1, '2019-08-30 02:51:51'),
(11, 2, 27, 1, '2019-08-30 02:57:31'),
(12, 2, 27, 1, '2019-08-30 02:59:54'),
(13, 2, 27, 1, '2019-08-30 03:06:15'),
(14, 2, 27, 1, '2019-08-30 03:06:41'),
(15, 2, 27, 1, '2019-08-30 03:06:50'),
(16, 2, 27, 1, '2019-08-30 03:08:36'),
(17, 2, 27, 1, '2019-08-30 03:09:40'),
(18, 2, 27, 1, '2019-08-30 03:12:41'),
(19, 2, 27, 1, '2019-08-30 03:14:24'),
(23, 1, 2, 1, '2019-08-30 03:19:14'),
(24, 2, 5, 2, '2019-08-30 03:41:52'),
(25, 1, 30, 1, '2019-08-30 03:43:57'),
(26, 2, 13, 2, '2019-08-30 03:50:23'),
(27, 1, 4, 2, '2019-08-30 03:54:31'),
(28, 3, 2, 1, '2019-08-30 04:20:38'),
(29, 2, 7, 1, '2019-08-30 04:33:04');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `net_price` int(100) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `net_price`, `department_id`) VALUES
(1, 'mobile phone', 500, 1),
(2, 'TV-set', 1000, 2),
(3, 'computer', 1500, 3);

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `worker_id` int(11) NOT NULL,
  `worker_name` varchar(255) NOT NULL,
  `department_id` int(11) NOT NULL,
  `salary` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`worker_id`, `worker_name`, `department_id`, `salary`) VALUES
(1, 'Antony', 3, 0),
(2, 'Peter', 1, 1499),
(3, 'Susan', 2, 0),
(4, 'Ella', 2, 1002),
(5, 'Alis', 2, 0),
(6, 'Kirk', 3, 0),
(7, 'John', 1, 1490),
(8, 'Johan', 2, 0),
(9, 'Gabriel', 1, 0),
(10, 'Leonor', 1, 0),
(11, 'Sigurd', 1, 0),
(12, 'Olga', 1, 0),
(13, 'Helga', 2, 0),
(14, 'Bjorn', 3, 0),
(15, 'Ivar', 2, 0),
(16, 'Colin', 2, 0),
(17, 'Vincent', 2, 0),
(18, 'Katerine', 2, 0),
(19, 'Ursel', 2, 0),
(20, 'Fritz', 3, 0),
(21, 'Caspar', 3, 0),
(22, 'Henry', 3, 0),
(23, 'Gilbert', 3, 0),
(24, 'Helen', 3, 0),
(25, 'Lesley', 3, 0),
(26, 'Rong', 3, 0),
(27, 'Liam', 1, 0),
(28, 'Chang', 1, 0),
(29, 'Omar', 1, 0),
(30, 'Merit', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `made_products`
--
ALTER TABLE `made_products`
  ADD PRIMARY KEY (`made_products_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `worker_id` (`worker_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`worker_id`),
  ADD KEY `department_id` (`department_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `made_products`
--
ALTER TABLE `made_products`
  MODIFY `made_products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `worker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `made_products`
--
ALTER TABLE `made_products`
  ADD CONSTRAINT `made_products_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `made_products_ibfk_2` FOREIGN KEY (`worker_id`) REFERENCES `workers` (`worker_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`);

--
-- Constraints for table `workers`
--
ALTER TABLE `workers`
  ADD CONSTRAINT `workers_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
