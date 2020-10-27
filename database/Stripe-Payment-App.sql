-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 26, 2020 at 04:23 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Stripe-Payment-App`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `created_at`) VALUES
('cus_IH53E3uu9gAt0R', 'Jenan', 'Mohamed', 'jmohamed@gmail.com', '2020-10-26 14:42:08'),
('cus_IH53m3Y2HNuLNb', 'Husam', 'Ahmed', 'hahmed@gmail.com', '2020-10-26 14:41:30'),
('cus_IH56E7TOxgch1O', 'Sara', 'Ali', 'sali@hotmail.com', '2020-10-26 14:44:53'),
('cus_IH5LuZvw3GBXBN', 'Mohamed', 'Ali', 'mali@gmail.com', '2020-10-26 15:00:02');

-- --------------------------------------------------------

--
-- Table structure for table `transitions`
--

CREATE TABLE `transitions` (
  `id` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transitions`
--

INSERT INTO `transitions` (`id`, `customer_id`, `product`, `amount`, `currency`, `status`, `created_at`) VALUES
('ch_1HgWt4ESWKCHViLTndJ3Vt7q', 'cus_IH53m3Y2HNuLNb', 'PHP For Beginner Course', '5000', 'usd', 'succeeded', '2020-10-26 14:41:30'),
('ch_1HgWtfESWKCHViLTf3en1VSn', 'cus_IH53E3uu9gAt0R', 'PHP For Beginner Course', '5000', 'usd', 'succeeded', '2020-10-26 14:42:08'),
('ch_1HgWwKESWKCHViLTZ3OKcPQr', 'cus_IH56E7TOxgch1O', 'PHP For Beginner Course', '5000', 'usd', 'succeeded', '2020-10-26 14:44:53'),
('ch_1HgXAzESWKCHViLTte69vNeu', 'cus_IH5LuZvw3GBXBN', 'PHP For Beginner Course', '5000', 'usd', 'succeeded', '2020-10-26 15:00:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transitions`
--
ALTER TABLE `transitions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_transitions` (`customer_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transitions`
--
ALTER TABLE `transitions`
  ADD CONSTRAINT `customer_transitions` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
