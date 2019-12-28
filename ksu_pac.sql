-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2019 at 04:01 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ksu_pac`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` varchar(25) NOT NULL,
  `nik` varchar(18) DEFAULT NULL,
  `fullname` varchar(35) DEFAULT NULL,
  `birth_place` varchar(35) DEFAULT NULL,
  `birthday` varchar(12) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `marital_status` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `education` varchar(15) DEFAULT NULL,
  `phone_number` varchar(14) DEFAULT NULL,
  `working_place` varchar(32) DEFAULT NULL,
  `working_position` varchar(32) DEFAULT NULL,
  `working_phone_number` varchar(14) DEFAULT NULL,
  `working_address` text DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nik`, `fullname`, `birth_place`, `birthday`, `gender`, `marital_status`, `address`, `education`, `phone_number`, `working_place`, `working_position`, `working_phone_number`, `working_address`, `create_time`, `update_time`, `deleted`) VALUES
('1573750800', '123456789', 'Gesang Aji Seto', 'Tangerang', '1990-03-05', 'Laki-laki', 'Menikah', 'JL.Bambu GG Resimin No.53', 'SD', '082122222657', 'XL Axiata', 'Programmer', '0219999', 'Rasuna Said', '2019-11-15 07:58:03', '2019-11-18 04:06:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `material_building`
--

CREATE TABLE `material_building` (
  `id` varchar(25) NOT NULL,
  `material_name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand` varchar(25) NOT NULL,
  `dimension` varchar(25) NOT NULL,
  `unit` varchar(25) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `material_category`
--

CREATE TABLE `material_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` varchar(25) NOT NULL,
  `customer_id` varchar(25) DEFAULT NULL,
  `project_name` varchar(50) DEFAULT NULL,
  `project_address` text DEFAULT NULL,
  `project_price` varchar(25) DEFAULT NULL,
  `project_description` text DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `finish_date` date DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` int(1) NOT NULL,
  `project_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `customer_id`, `project_name`, `project_address`, `project_price`, `project_description`, `start_date`, `finish_date`, `status`, `create_time`, `update_time`, `deleted`, `project_note`) VALUES
('1573750800', '1573750800', 'Rumah 4 tingkat', 'Bintaro plaza', '600000000', 'Kamar mandi 2\r\nDibawah tangga', '2019-11-21', '2020-02-11', 'Decline', '2019-11-15 08:51:21', '2019-12-26 15:09:47', 0, 'Kurang Pekerja');

-- --------------------------------------------------------

--
-- Table structure for table `sdm_absence`
--

CREATE TABLE `sdm_absence` (
  `id` bigint(20) NOT NULL,
  `week` int(11) NOT NULL,
  `project_id` varchar(25) NOT NULL,
  `sdm_id` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `rest_start` time NOT NULL,
  `rest_finish` time NOT NULL,
  `loan_amount` bigint(20) NOT NULL,
  `loan_description` text NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` int(1) NOT NULL,
  `absence_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sdm_absence`
--

INSERT INTO `sdm_absence` (`id`, `week`, `project_id`, `sdm_id`, `date`, `time_in`, `time_out`, `rest_start`, `rest_finish`, `loan_amount`, `loan_description`, `status`, `create_time`, `update_time`, `deleted`, `absence_note`) VALUES
(1, 1, '1573750800', '1573632238', '2019-11-21', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:41', '2019-12-26 15:01:41', 0, ''),
(2, 1, '1573750800', '1573632238', '2019-11-22', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:41', '2019-12-26 15:01:41', 0, ''),
(3, 1, '1573750800', '1573632238', '2019-11-23', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:41', '2019-12-26 15:01:41', 0, ''),
(4, 2, '1573750800', '1573632238', '2019-11-24', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:41', '2019-12-26 15:01:41', 0, ''),
(5, 2, '1573750800', '1573632238', '2019-11-25', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:42', '2019-12-26 15:01:42', 0, ''),
(6, 2, '1573750800', '1573632238', '2019-11-26', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:42', '2019-12-26 15:01:42', 0, ''),
(7, 2, '1573750800', '1573632238', '2019-11-27', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:42', '2019-12-26 15:01:42', 0, ''),
(8, 2, '1573750800', '1573632238', '2019-11-28', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:42', '2019-12-26 15:01:42', 0, ''),
(9, 2, '1573750800', '1573632238', '2019-11-29', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:42', '2019-12-26 15:01:42', 0, ''),
(10, 2, '1573750800', '1573632238', '2019-11-30', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:42', '2019-12-26 15:01:42', 0, ''),
(11, 3, '1573750800', '1573632238', '2019-12-01', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:42', '2019-12-26 15:01:42', 0, ''),
(12, 3, '1573750800', '1573632238', '2019-12-02', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:42', '2019-12-26 15:01:42', 0, ''),
(13, 3, '1573750800', '1573632238', '2019-12-03', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:42', '2019-12-26 15:01:42', 0, ''),
(14, 3, '1573750800', '1573632238', '2019-12-04', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:42', '2019-12-26 15:01:42', 0, ''),
(15, 3, '1573750800', '1573632238', '2019-12-05', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:42', '2019-12-26 15:01:42', 0, ''),
(16, 3, '1573750800', '1573632238', '2019-12-06', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:42', '2019-12-26 15:01:42', 0, ''),
(17, 3, '1573750800', '1573632238', '2019-12-07', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:42', '2019-12-26 15:01:42', 0, ''),
(18, 4, '1573750800', '1573632238', '2019-12-08', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:42', '2019-12-26 15:01:42', 0, ''),
(19, 4, '1573750800', '1573632238', '2019-12-09', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:42', '2019-12-26 15:01:42', 0, ''),
(20, 4, '1573750800', '1573632238', '2019-12-10', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:42', '2019-12-26 15:01:42', 0, ''),
(21, 4, '1573750800', '1573632238', '2019-12-11', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:42', '2019-12-26 15:01:42', 0, ''),
(22, 4, '1573750800', '1573632238', '2019-12-12', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:42', '2019-12-26 15:01:42', 0, ''),
(23, 4, '1573750800', '1573632238', '2019-12-13', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:42', '2019-12-26 15:01:42', 0, ''),
(24, 4, '1573750800', '1573632238', '2019-12-14', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:43', '2019-12-26 15:01:43', 0, ''),
(25, 5, '1573750800', '1573632238', '2019-12-15', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:43', '2019-12-26 15:01:43', 0, ''),
(26, 5, '1573750800', '1573632238', '2019-12-16', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:43', '2019-12-26 15:01:43', 0, ''),
(27, 5, '1573750800', '1573632238', '2019-12-17', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:43', '2019-12-26 15:01:43', 0, ''),
(28, 5, '1573750800', '1573632238', '2019-12-18', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:43', '2019-12-26 15:01:43', 0, ''),
(29, 5, '1573750800', '1573632238', '2019-12-19', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:43', '2019-12-26 15:01:43', 0, ''),
(30, 5, '1573750800', '1573632238', '2019-12-20', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:43', '2019-12-26 15:01:43', 0, ''),
(31, 5, '1573750800', '1573632238', '2019-12-21', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:43', '2019-12-26 15:01:43', 0, ''),
(32, 6, '1573750800', '1573632238', '2019-12-22', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:43', '2019-12-26 15:01:43', 0, ''),
(33, 6, '1573750800', '1573632238', '2019-12-23', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:43', '2019-12-26 15:01:43', 0, ''),
(34, 6, '1573750800', '1573632238', '2019-12-24', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:43', '2019-12-26 15:01:43', 0, ''),
(35, 6, '1573750800', '1573632238', '2019-12-25', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:43', '2019-12-26 15:01:43', 0, ''),
(36, 6, '1573750800', '1573632238', '2019-12-26', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:43', '2019-12-26 15:01:43', 0, ''),
(37, 6, '1573750800', '1573632238', '2019-12-27', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:43', '2019-12-26 15:01:43', 0, ''),
(38, 6, '1573750800', '1573632238', '2019-12-28', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:43', '2019-12-26 15:01:43', 0, ''),
(39, 7, '1573750800', '1573632238', '2019-12-29', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:43', '2019-12-26 15:01:43', 0, ''),
(40, 7, '1573750800', '1573632238', '2019-12-30', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:43', '2019-12-26 15:01:43', 0, ''),
(41, 7, '1573750800', '1573632238', '2019-12-31', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:43', '2019-12-26 15:01:43', 0, ''),
(42, 7, '1573750800', '1573632238', '2020-01-01', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:43', '2019-12-26 15:01:43', 0, ''),
(43, 7, '1573750800', '1573632238', '2020-01-02', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:43', '2019-12-26 15:01:43', 0, ''),
(44, 7, '1573750800', '1573632238', '2020-01-03', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:44', '2019-12-26 15:01:44', 0, ''),
(45, 7, '1573750800', '1573632238', '2020-01-04', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:44', '2019-12-26 15:01:44', 0, ''),
(46, 8, '1573750800', '1573632238', '2020-01-05', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:44', '2019-12-26 15:01:44', 0, ''),
(47, 8, '1573750800', '1573632238', '2020-01-06', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:44', '2019-12-26 15:01:44', 0, ''),
(48, 8, '1573750800', '1573632238', '2020-01-07', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:44', '2019-12-26 15:01:44', 0, ''),
(49, 8, '1573750800', '1573632238', '2020-01-08', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:44', '2019-12-26 15:01:44', 0, ''),
(50, 8, '1573750800', '1573632238', '2020-01-09', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:44', '2019-12-26 15:01:44', 0, ''),
(51, 8, '1573750800', '1573632238', '2020-01-10', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:44', '2019-12-26 15:01:44', 0, ''),
(52, 8, '1573750800', '1573632238', '2020-01-11', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:44', '2019-12-26 15:01:44', 0, ''),
(53, 9, '1573750800', '1573632238', '2020-01-12', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:44', '2019-12-26 15:01:44', 0, ''),
(54, 9, '1573750800', '1573632238', '2020-01-13', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:44', '2019-12-26 15:01:44', 0, ''),
(55, 9, '1573750800', '1573632238', '2020-01-14', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:44', '2019-12-26 15:01:44', 0, ''),
(56, 9, '1573750800', '1573632238', '2020-01-15', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:44', '2019-12-26 15:01:44', 0, ''),
(57, 9, '1573750800', '1573632238', '2020-01-16', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:44', '2019-12-26 15:01:44', 0, ''),
(58, 9, '1573750800', '1573632238', '2020-01-17', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:45', '2019-12-26 15:01:45', 0, ''),
(59, 9, '1573750800', '1573632238', '2020-01-18', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:45', '2019-12-26 15:01:45', 0, ''),
(60, 10, '1573750800', '1573632238', '2020-01-19', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:45', '2019-12-26 15:01:45', 0, ''),
(61, 10, '1573750800', '1573632238', '2020-01-20', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:45', '2019-12-26 15:01:45', 0, ''),
(62, 10, '1573750800', '1573632238', '2020-01-21', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:45', '2019-12-26 15:01:45', 0, ''),
(63, 10, '1573750800', '1573632238', '2020-01-22', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:45', '2019-12-26 15:01:45', 0, ''),
(64, 10, '1573750800', '1573632238', '2020-01-23', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:45', '2019-12-26 15:01:45', 0, ''),
(65, 10, '1573750800', '1573632238', '2020-01-24', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:45', '2019-12-26 15:01:45', 0, ''),
(66, 10, '1573750800', '1573632238', '2020-01-25', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:45', '2019-12-26 15:01:45', 0, ''),
(67, 11, '1573750800', '1573632238', '2020-01-26', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:45', '2019-12-26 15:01:45', 0, ''),
(68, 11, '1573750800', '1573632238', '2020-01-27', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:45', '2019-12-26 15:01:45', 0, ''),
(69, 11, '1573750800', '1573632238', '2020-01-28', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:45', '2019-12-26 15:01:45', 0, ''),
(70, 11, '1573750800', '1573632238', '2020-01-29', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:45', '2019-12-26 15:01:45', 0, ''),
(71, 11, '1573750800', '1573632238', '2020-01-30', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:45', '2019-12-26 15:01:45', 0, ''),
(72, 11, '1573750800', '1573632238', '2020-01-31', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:45', '2019-12-26 15:01:45', 0, ''),
(73, 11, '1573750800', '1573632238', '2020-02-01', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:45', '2019-12-26 15:01:45', 0, ''),
(74, 12, '1573750800', '1573632238', '2020-02-02', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:45', '2019-12-26 15:01:45', 0, ''),
(75, 12, '1573750800', '1573632238', '2020-02-03', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:45', '2019-12-26 15:01:45', 0, ''),
(76, 12, '1573750800', '1573632238', '2020-02-04', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:45', '2019-12-26 15:01:45', 0, ''),
(77, 12, '1573750800', '1573632238', '2020-02-05', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:45', '2019-12-26 15:01:45', 0, ''),
(78, 12, '1573750800', '1573632238', '2020-02-06', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:45', '2019-12-26 15:01:45', 0, ''),
(79, 12, '1573750800', '1573632238', '2020-02-07', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:45', '2019-12-26 15:01:45', 0, ''),
(80, 12, '1573750800', '1573632238', '2020-02-08', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:45', '2019-12-26 15:01:45', 0, ''),
(81, 13, '1573750800', '1573632238', '2020-02-09', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:46', '2019-12-26 15:01:46', 0, ''),
(82, 13, '1573750800', '1573632238', '2020-02-10', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:46', '2019-12-26 15:01:46', 0, ''),
(83, 13, '1573750800', '1573632238', '2020-02-11', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, '2019-12-26 15:01:46', '2019-12-26 15:01:46', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `sdm_payroll`
--

CREATE TABLE `sdm_payroll` (
  `id` bigint(20) NOT NULL,
  `week` varchar(5) NOT NULL,
  `periode` varchar(25) NOT NULL,
  `sdm_id` varchar(25) NOT NULL,
  `project_id` varchar(25) NOT NULL,
  `position_id` int(11) NOT NULL,
  `position_salary` varchar(25) NOT NULL,
  `working_time` varchar(25) NOT NULL,
  `gross_income` varchar(20) NOT NULL,
  `loan_amount` varchar(20) NOT NULL,
  `net_income` varchar(20) NOT NULL,
  `create_time` timestamp NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` int(2) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sdm_position`
--

CREATE TABLE `sdm_position` (
  `id` int(11) NOT NULL,
  `position_code` varchar(25) NOT NULL,
  `position_name` varchar(25) DEFAULT NULL,
  `workspace` varchar(25) DEFAULT NULL,
  `position_salary` varchar(25) DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sdm_position`
--

INSERT INTO `sdm_position` (`id`, `position_code`, `position_name`, `workspace`, `position_salary`, `create_time`, `update_time`, `deleted`) VALUES
(1, 'TG1', 'Tukang Golongan 1', 'Any', '12500', '2019-11-20 09:21:24', '2019-11-20 18:10:45', 0),
(2, 'TG2', 'Tukang Golongan 2', 'Any', '12000', '2019-11-20 16:46:15', '2019-11-20 16:46:15', 0),
(3, 'TG3', 'Tukang Golongan 3', 'Any', '11500', '2019-11-20 16:55:11', '2019-11-20 18:10:49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sdm_user`
--

CREATE TABLE `sdm_user` (
  `id` varchar(25) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `fullname` varchar(32) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `address` text NOT NULL,
  `birth_place` varchar(25) DEFAULT NULL,
  `birthday` varchar(12) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `education` varchar(15) NOT NULL,
  `marital_status` varchar(12) NOT NULL,
  `description` text NOT NULL,
  `position_id` varchar(25) NOT NULL,
  `expertise_id` int(11) DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sdm_user`
--

INSERT INTO `sdm_user` (`id`, `nik`, `fullname`, `phone_number`, `address`, `birth_place`, `birthday`, `gender`, `education`, `marital_status`, `description`, `position_id`, `expertise_id`, `create_time`, `update_time`, `deleted`) VALUES
('1573632238', '123456', 'Gesang Aji Seto', '0219999911221', 'Test', 'Tangerd', '1991-03-03', 'Laki-laki', 'SD', 'Menikah', 'Wew', '1', NULL, '2019-11-13 08:03:58', '2019-11-22 05:13:02', 0),
('1573869396', '0000001', 'Freddy Mercury', '0219286427364', 'Street 43 unit C2', 'San Andres', '1987-11-21', 'Laki-laki', 'SD', 'Belum Menika', 'None', '2', NULL, '2019-11-16 01:56:36', '2019-11-20 18:11:17', 1),
('1574271679', '132141', 'gesadsa', '1234', 'satat', 'Jakarta', '2019-11-29', 'Laki-laki', 'SD', 'Menikah', 'sda', '3', NULL, '2019-11-20 17:41:46', '2019-11-20 18:01:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_map`
--

CREATE TABLE `user_access_map` (
  `id` int(11) NOT NULL,
  `parent_map_id` int(11) NOT NULL,
  `access_map` varchar(32) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_map`
--

INSERT INTO `user_access_map` (`id`, `parent_map_id`, `access_map`, `create_time`, `update_time`) VALUES
(1, 1, 'Mapping', '2019-11-05 15:18:49', '2019-11-05 17:39:28'),
(2, 1, 'User_System', '2019-11-05 15:18:49', '2019-11-14 03:46:37'),
(3, 1, 'Permission', '2019-11-05 15:18:49', '2019-11-07 03:58:40'),
(18, 38, 'User_Sdm', '2019-11-13 03:54:50', '2019-11-14 03:46:20'),
(21, 38, 'Absence_Sdm', '2019-11-14 04:21:38', '2019-11-14 04:21:38'),
(22, 40, 'Customer', '2019-11-14 04:39:04', '2019-11-14 04:39:04'),
(23, 40, 'Project', '2019-11-14 04:39:18', '2019-11-14 04:39:18'),
(24, 39, 'Payroll_Sdm', '2019-11-19 10:43:31', '2019-11-19 10:50:02'),
(25, 38, 'Position_Sdm', '2019-11-20 07:34:07', '2019-11-20 07:34:07'),
(26, 42, 'Payroll_Approval', '2019-11-25 06:16:17', '2019-11-25 06:16:17'),
(27, 42, 'Project_Approval', '2019-11-29 07:20:30', '2019-11-29 07:20:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `id` varchar(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`id`, `username`, `email`, `password`, `create_time`, `update_time`) VALUES
('1572765018', 'admin', 'admin@admin.com', '4722cb7d32f49a2ddca815f7991d7def27ff503d8211bc0fb920d3c9', '2019-11-05 06:00:19', '2019-11-07 17:56:33'),
('1573362753', 'gesang', 'gesangseto@gmail.com', '9c99c77582f78fa11a3457d86b04e71786d41144fb8f8c297c1da6ef', '2019-11-10 05:12:33', '2019-11-10 05:12:33'),
('1573967127', 'guest', 'guest@guest.com', 'd6af3988f0ee9184a91071c44cae8a70a3127be155b2d88304fbe244', '2019-11-17 05:05:27', '2019-11-17 05:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_parent_map`
--

CREATE TABLE `user_parent_map` (
  `id` int(11) NOT NULL,
  `parent_map` varchar(32) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_parent_map`
--

INSERT INTO `user_parent_map` (`id`, `parent_map`, `icon`, `create_time`, `update_time`) VALUES
(1, 'Administrator', 'fa fa-certificate', '2019-11-05 14:24:41', '2019-11-10 07:37:53'),
(38, 'Master_SDM', 'fa fa-user', '2019-11-13 03:54:30', '2019-11-13 03:54:30'),
(39, 'Finance', 'fa fa-usd', '2019-11-13 06:56:10', '2019-11-13 06:56:10'),
(40, 'Master_Project', 'fa fa-building', '2019-11-14 04:38:27', '2019-11-14 04:38:27'),
(42, 'Approval', 'fa fa-check', '2019-11-25 06:15:45', '2019-11-25 06:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_permission`
--

CREATE TABLE `user_permission` (
  `id` int(11) NOT NULL,
  `admin_id` varchar(25) NOT NULL,
  `access_map_id` int(11) NOT NULL,
  `create` int(11) NOT NULL,
  `read` int(11) NOT NULL,
  `update` int(11) NOT NULL,
  `delete` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_permission`
--

INSERT INTO `user_permission` (`id`, `admin_id`, `access_map_id`, `create`, `read`, `update`, `delete`, `create_time`, `update_time`) VALUES
(1, '1572765018', 1, 1, 1, 1, 1, '2019-11-05 05:59:40', '2019-11-20 07:35:03'),
(2, '1572765018', 3, 1, 1, 1, 1, '2019-11-05 05:59:40', '2019-11-10 08:02:29'),
(28, '1572765018', 2, 1, 1, 1, 0, '2019-11-10 07:55:19', '2019-11-16 04:33:10'),
(32, '1572765018', 18, 1, 1, 1, 1, '2019-11-13 06:55:25', '2019-11-18 04:05:37'),
(34, '1572765018', 21, 1, 1, 1, 1, '2019-11-14 04:22:07', '2019-11-18 04:05:40'),
(35, '1572765018', 22, 1, 1, 1, 1, '2019-11-14 04:39:30', '2019-11-18 04:05:44'),
(36, '1572765018', 23, 1, 1, 1, 1, '2019-11-14 04:39:37', '2019-11-18 04:05:47'),
(37, '1573967127', 18, 0, 1, 0, 0, '2019-11-17 05:05:46', '2019-11-17 05:05:46'),
(38, '1573967127', 21, 0, 1, 0, 0, '2019-11-17 05:05:53', '2019-11-17 05:05:53'),
(39, '1573967127', 22, 0, 1, 0, 0, '2019-11-17 05:06:03', '2019-11-17 05:06:03'),
(40, '1573967127', 23, 0, 1, 0, 0, '2019-11-17 05:06:08', '2019-11-17 05:06:08'),
(41, '1572765018', 24, 1, 1, 1, 0, '2019-11-19 10:43:50', '2019-11-28 07:52:45'),
(42, '1572765018', 25, 1, 1, 1, 1, '2019-11-20 07:34:29', '2019-11-20 18:06:12'),
(43, '1572765018', 26, 1, 1, 1, 1, '2019-11-25 06:16:38', '2019-11-25 06:16:38'),
(44, '1572765018', 27, 1, 1, 1, 0, '2019-11-29 07:20:46', '2019-11-29 07:20:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_building`
--
ALTER TABLE `material_building`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_category`
--
ALTER TABLE `material_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sdm_absence`
--
ALTER TABLE `sdm_absence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sdm_payroll`
--
ALTER TABLE `sdm_payroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sdm_position`
--
ALTER TABLE `sdm_position`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `potition_code` (`position_code`);

--
-- Indexes for table `sdm_user`
--
ALTER TABLE `sdm_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `user_access_map`
--
ALTER TABLE `user_access_map`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_map_id` (`parent_map_id`);

--
-- Indexes for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_parent_map`
--
ALTER TABLE `user_parent_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_permission`
--
ALTER TABLE `user_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `access_map_id` (`access_map_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `material_category`
--
ALTER TABLE `material_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sdm_absence`
--
ALTER TABLE `sdm_absence`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `sdm_payroll`
--
ALTER TABLE `sdm_payroll`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sdm_position`
--
ALTER TABLE `sdm_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_access_map`
--
ALTER TABLE `user_access_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_parent_map`
--
ALTER TABLE `user_parent_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user_permission`
--
ALTER TABLE `user_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
