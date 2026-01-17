-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2026-01-17
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
-- Database: `gs_db_books`
--

-- --------------------------------------------------------

--
-- Table structure for table `gs_db_books` (Users table)
--

CREATE TABLE `gs_db_books` (
  `id` int(12) NOT NULL,
  `lid` varchar(128) NOT NULL,
  `lpw` varchar(255) NOT NULL,
  `name` varchar(64) NOT NULL,
  `kanri_flg` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gs_db_books`
--

INSERT INTO `gs_db_books` (`id`, `lid`, `lpw`, `name`, `kanri_flg`) VALUES
(1, 'test1', '$2y$10$Dt8pNvJtaM/V0g1WYnVZfu8Mw1PJr8HKF8hcfCknwM.C2B3HPRHPW', 'test1', 1);

--
-- Indexes for table `gs_db_books`
--
ALTER TABLE `gs_db_books`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for table `gs_db_books`
--
ALTER TABLE `gs_db_books`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
