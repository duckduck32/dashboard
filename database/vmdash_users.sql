-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2023 at 04:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vmdash_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `role`, `status`) VALUES
(1, 'JNN', 'password1', 1, 1),
(2, 'ALJ', 'password2', 1, 0),
(3, 'EIJ', 'password3', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `app_vulns`
--

CREATE TABLE `app_vulns` (
  `id` int(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `vulnerability` varchar(150) NOT NULL,
  `severity` varchar(10) NOT NULL,
  `domain` varchar(100) NOT NULL,
  `date_found` date NOT NULL,
  `date_remediated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `app_vulns`
--

INSERT INTO `app_vulns` (`id`, `status`, `vulnerability`, `severity`, `domain`, `date_found`, `date_remediated`) VALUES
(1, 'Open', 'External DNS Interaction', 'High', 'www.adastraabyssosque.com', '2023-09-03', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `infra_vulns`
--

CREATE TABLE `infra_vulns` (
  `id` int(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `plugin_id` int(9) NOT NULL,
  `vulnerability` varchar(150) NOT NULL,
  `severity` varchar(10) NOT NULL,
  `hostname` varchar(100) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `count` int(255) NOT NULL,
  `date_found` date NOT NULL,
  `date_remediated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `open_ports`
--

CREATE TABLE `open_ports` (
  `id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `open_port` int(11) NOT NULL,
  `priority` varchar(10) NOT NULL,
  `hostname` varchar(100) NOT NULL,
  `ip` int(11) NOT NULL,
  `date_found` date NOT NULL,
  `date_remediated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_vulns`
--
ALTER TABLE `app_vulns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infra_vulns`
--
ALTER TABLE `infra_vulns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `open_ports`
--
ALTER TABLE `open_ports`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `infra_vulns`
--
ALTER TABLE `infra_vulns`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
