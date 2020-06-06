-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2020 at 07:27 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `employee_id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin', 'admin@demo.com', '2019-09-23 07:00:00', '$2y$10$5r5/5anPuL7RPsJdjaLi0uUZ0hfxZSwqSBWJUS8hgSRCheWhec176', 'super-admin', NULL, NULL, NULL),
(2, NULL, 'AMAN RAJ TOPPO', 'owner_one@gmail.com', NULL, '$2y$10$SG.coqXjnvC4fgvQ0bJOJub10v6rMI3wOx5.hAV5Dqr8Xno5mO9CW', 'owner', NULL, '2020-01-30 18:14:23', '2020-01-30 18:49:38'),
(3, NULL, 'RAJ KUMAR', 'rajkumar@gmail.com', NULL, '$2y$10$FydOgFbkz0xN7zgM5h.lk.IqcHig9QXY/3QDCT0k8OssmE0hPAsNy', 'agent', NULL, '2020-01-30 18:53:13', '2020-01-30 18:56:54'),
(4, NULL, 'AMAN RAJ TOPPO', 'owner_two@gmail.com', NULL, '$2y$10$Dx9Fv0b9x0.k86L7OwpZg.WAr6qwLBOYROwsgA1M4otUTVFjUPDgq', 'owner', NULL, '2020-02-06 09:19:08', '2020-02-06 09:25:12'),
(5, 1, 'Rinah Dillard', 'nyrosufun@mailinator.com', NULL, '$2y$10$Lj0R0OJulZmw3YYJIbm0XueRHxm2zNYsEdpNZkWUombXWXU2v27TW', 'manager', NULL, '2020-02-19 23:58:02', '2020-02-20 01:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` bigint(20) NOT NULL,
  `agent_id` bigint(20) DEFAULT NULL,
  `admin_id` bigint(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `emirates_id` varchar(255) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `mobile` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `banking_name` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_ifsc_code` varchar(255) DEFAULT NULL,
  `bank_account` varchar(255) DEFAULT NULL,
  `is_disabled` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `agent_id`, `admin_id`, `name`, `emirates_id`, `photo`, `mobile`, `email`, `country`, `state`, `city`, `address`, `banking_name`, `bank_name`, `bank_ifsc_code`, `bank_account`, `is_disabled`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'RAJ KUMAR', '3453455', 'agents/RajKumar/CRZw06G4l8mnxq5AlI4usv7zJJTC3cHmdYn4qP2H.jpeg', '5234523452', 'rajkumar@gmail.com', 'FASDF', 'SDFASD', 'DFASD', 'FASDF', 'DFSDF', 'FASDFASD', 'FASDF', 'SADFSA', 0, '2020-01-30 18:53:13', '2020-01-30 18:56:54');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(11) NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `attendance` int(11) DEFAULT NULL COMMENT '1=present,0=absent',
  `date` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `employee_id`, `attendance`, `date`, `created_at`, `updated_at`) VALUES
(6, 1, 1, '2020-02-08', '2020-02-08 19:41:21', '2020-02-08 19:41:21'),
(7, 2, 1, '2020-02-08', '2020-02-08 19:41:21', '2020-02-19 02:54:06'),
(8, 3, 1, '2020-02-08', '2020-02-08 19:41:21', '2020-02-19 02:54:06'),
(9, 4, 1, '2020-02-08', '2020-02-08 19:41:21', '2020-02-19 02:54:07'),
(10, 1, 1, '2020-02-09', '2020-02-09 18:12:46', '2020-02-09 18:12:46'),
(11, 2, 1, '2020-02-09', '2020-02-09 18:12:46', '2020-02-09 18:12:46'),
(12, 3, 1, '2020-02-09', '2020-02-09 18:12:46', '2020-02-09 18:12:46'),
(13, 4, 1, '2020-02-09', '2020-02-09 18:12:46', '2020-02-09 18:12:46'),
(14, 1, 1, '2020-02-10', '2020-02-10 20:25:26', '2020-02-10 20:25:26'),
(15, 2, 1, '2020-02-10', '2020-02-10 20:25:26', '2020-02-10 20:25:26'),
(16, 3, 1, '2020-02-10', '2020-02-10 20:25:26', '2020-02-10 20:25:26'),
(17, 4, 1, '2020-02-10', '2020-02-10 20:25:26', '2020-02-10 20:25:26'),
(18, 1, 1, '2020-02-18', '2020-02-18 10:43:47', '2020-02-18 10:43:47'),
(19, 2, 1, '2020-02-18', '2020-02-18 10:43:47', '2020-02-18 10:43:47'),
(20, 3, 1, '2020-02-18', '2020-02-18 10:43:47', '2020-02-18 10:43:47'),
(21, 4, 1, '2020-02-18', '2020-02-18 10:43:47', '2020-02-18 10:43:47'),
(22, 1, 1, '2020-02-01', '2020-02-18 11:55:39', '2020-02-19 02:54:11'),
(23, 1, 1, '2020-02-02', '2020-02-18 11:57:33', '2020-02-19 02:54:09'),
(24, 2, 1, '2020-02-01', '2020-02-18 11:57:36', '2020-02-19 02:54:11'),
(25, 2, 1, '2020-02-02', '2020-02-18 11:57:37', '2020-02-19 02:54:10'),
(26, 2, 1, '2020-02-03', '2020-02-18 11:57:38', '2020-02-19 02:54:08'),
(27, 1, 1, '2020-02-03', '2020-02-18 11:57:45', '2020-02-19 02:54:09'),
(28, 1, 1, '2020-02-04', '2020-02-18 11:58:05', '2020-02-19 02:54:08'),
(29, 2, 1, '2020-02-04', '2020-02-18 11:58:06', '2020-02-19 02:54:08'),
(30, 2, 1, '2020-02-05', '2020-02-18 11:58:07', '2020-02-18 11:58:07'),
(31, 1, 1, '2020-02-05', '2020-02-18 11:58:07', '2020-02-18 11:58:07'),
(32, 1, 1, '2020-02-06', '2020-02-18 11:58:08', '2020-02-18 11:58:08'),
(33, 1, 1, '2020-02-07', '2020-02-18 11:58:09', '2020-02-18 11:58:09'),
(34, 2, 1, '2020-02-07', '2020-02-18 11:58:09', '2020-02-18 11:58:09'),
(35, 2, 1, '2020-02-06', '2020-02-18 11:58:09', '2020-02-18 11:58:09'),
(36, 3, 1, '2020-02-06', '2020-02-18 11:58:10', '2020-02-18 11:58:10'),
(37, 3, 1, '2020-02-07', '2020-02-18 11:58:10', '2020-02-18 11:58:10'),
(38, 4, 1, '2020-02-07', '2020-02-18 11:58:11', '2020-02-18 11:58:11'),
(39, 4, 1, '2020-02-06', '2020-02-18 11:58:11', '2020-02-18 11:58:11'),
(40, 4, 1, '2020-02-05', '2020-02-18 11:58:12', '2020-02-18 11:58:12'),
(41, 3, 1, '2020-02-05', '2020-02-18 11:58:12', '2020-02-18 11:58:12'),
(42, 3, 1, '2020-02-04', '2020-02-18 11:58:13', '2020-02-18 11:58:13'),
(43, 4, 1, '2020-02-04', '2020-02-18 11:58:13', '2020-02-18 11:58:13'),
(44, 4, 1, '2020-02-03', '2020-02-18 11:58:14', '2020-02-18 11:58:14'),
(45, 3, 1, '2020-02-03', '2020-02-18 11:58:14', '2020-02-18 11:58:14'),
(46, 3, 1, '2020-02-02', '2020-02-18 11:58:14', '2020-02-18 11:58:14'),
(47, 3, 1, '2020-02-01', '2020-02-18 11:58:15', '2020-02-18 11:58:15'),
(48, 4, 1, '2020-02-01', '2020-02-18 11:58:16', '2020-02-18 11:58:16'),
(49, 4, 1, '2020-02-02', '2020-02-18 11:58:16', '2020-02-18 11:58:16'),
(50, 4, 1, '2020-02-11', '2020-02-18 11:58:17', '2020-02-18 11:58:17'),
(51, 3, 1, '2020-02-11', '2020-02-18 11:58:17', '2020-02-18 11:58:17'),
(52, 2, 1, '2020-02-11', '2020-02-18 11:58:18', '2020-02-18 11:58:18'),
(53, 1, 1, '2020-02-11', '2020-02-18 11:58:18', '2020-02-18 11:58:18'),
(54, 1, 1, '2020-02-12', '2020-02-18 11:58:19', '2020-02-18 11:58:19'),
(55, 2, 0, '2020-02-12', '2020-02-18 11:58:19', '2020-02-19 03:04:14'),
(56, 3, 1, '2020-02-12', '2020-02-18 11:58:20', '2020-02-18 11:58:20'),
(57, 4, 1, '2020-02-12', '2020-02-18 11:58:21', '2020-02-18 11:58:21'),
(58, 1, 1, '2020-02-13', '2020-02-18 11:58:23', '2020-02-18 11:58:23'),
(59, 2, 0, '2020-02-13', '2020-02-18 11:58:24', '2020-02-19 03:04:14'),
(60, 3, 1, '2020-02-13', '2020-02-18 11:58:24', '2020-02-18 11:58:24'),
(61, 4, 1, '2020-02-13', '2020-02-18 11:58:24', '2020-02-18 11:58:24'),
(62, 4, 1, '2020-02-14', '2020-02-18 11:58:25', '2020-02-18 11:58:25'),
(63, 3, 1, '2020-02-14', '2020-02-18 11:58:26', '2020-02-18 11:58:26'),
(64, 2, 1, '2020-02-14', '2020-02-18 11:58:26', '2020-02-18 11:58:26'),
(65, 1, 1, '2020-02-14', '2020-02-18 11:58:27', '2020-02-18 11:58:27'),
(66, 1, 1, '2020-02-15', '2020-02-18 11:58:27', '2020-02-18 11:58:27'),
(67, 2, 1, '2020-02-15', '2020-02-18 11:58:28', '2020-02-18 11:58:28'),
(68, 3, 1, '2020-02-15', '2020-02-18 11:58:28', '2020-02-18 11:58:28'),
(69, 4, 1, '2020-02-15', '2020-02-18 11:58:29', '2020-02-18 11:58:29'),
(70, 4, 1, '2020-02-16', '2020-02-18 11:58:29', '2020-02-18 11:58:29'),
(71, 3, 1, '2020-02-16', '2020-02-18 11:58:29', '2020-02-18 11:58:29'),
(72, 2, 1, '2020-02-16', '2020-02-18 11:58:30', '2020-02-18 11:58:30'),
(73, 1, 1, '2020-02-16', '2020-02-18 11:58:30', '2020-02-18 11:58:30'),
(74, 1, 1, '2020-02-17', '2020-02-18 11:58:31', '2020-02-18 11:58:31'),
(75, 2, 1, '2020-02-17', '2020-02-18 11:58:31', '2020-02-18 11:58:31'),
(76, 3, 1, '2020-02-17', '2020-02-18 11:58:32', '2020-02-18 11:58:32'),
(77, 4, 1, '2020-02-17', '2020-02-18 11:58:32', '2020-02-18 11:58:32'),
(78, 4, 1, '2020-02-19', '2020-02-18 11:58:32', '2020-02-18 11:58:32'),
(79, 3, 1, '2020-02-19', '2020-02-18 11:58:33', '2020-02-18 11:58:33'),
(80, 2, 1, '2020-02-19', '2020-02-18 11:58:33', '2020-02-18 11:58:33'),
(81, 1, 1, '2020-02-19', '2020-02-18 11:58:34', '2020-02-18 11:58:34'),
(82, 1, 1, '2020-02-20', '2020-02-18 11:58:34', '2020-02-18 11:58:34'),
(83, 2, 1, '2020-02-20', '2020-02-18 11:58:35', '2020-02-18 11:58:35'),
(84, 3, 1, '2020-02-20', '2020-02-18 11:58:35', '2020-02-18 11:58:35'),
(85, 4, 1, '2020-02-20', '2020-02-18 11:58:36', '2020-02-18 11:58:36'),
(86, 4, 1, '2020-02-21', '2020-02-18 11:58:36', '2020-02-18 11:58:36'),
(87, 3, 1, '2020-02-21', '2020-02-18 11:58:36', '2020-02-18 11:58:36'),
(88, 2, 1, '2020-02-21', '2020-02-18 11:58:37', '2020-02-18 11:58:37'),
(89, 1, 1, '2020-02-21', '2020-02-18 11:58:37', '2020-02-18 11:58:37'),
(90, 1, 1, '2020-02-22', '2020-02-18 11:58:38', '2020-02-18 11:58:38'),
(91, 2, 1, '2020-02-22', '2020-02-18 11:58:38', '2020-02-18 11:58:38'),
(92, 3, 1, '2020-02-22', '2020-02-18 11:58:38', '2020-02-18 11:58:38'),
(93, 4, 1, '2020-02-22', '2020-02-18 11:58:39', '2020-02-18 11:58:39'),
(94, 4, 1, '2020-02-23', '2020-02-18 11:58:39', '2020-02-18 11:58:39'),
(95, 3, 1, '2020-02-23', '2020-02-18 11:58:40', '2020-02-18 11:58:40'),
(96, 2, 1, '2020-02-23', '2020-02-18 11:58:40', '2020-02-18 11:58:40'),
(97, 1, 1, '2020-02-23', '2020-02-18 11:58:41', '2020-02-18 11:58:41'),
(98, 1, 1, '2020-02-24', '2020-02-18 11:58:41', '2020-02-18 11:58:41'),
(99, 2, 1, '2020-02-24', '2020-02-18 11:58:42', '2020-02-18 11:58:42'),
(100, 3, 1, '2020-02-24', '2020-02-18 11:58:42', '2020-02-18 11:58:42'),
(101, 4, 1, '2020-02-24', '2020-02-18 11:58:43', '2020-02-18 11:58:43'),
(102, 4, 1, '2020-02-25', '2020-02-18 11:58:43', '2020-02-18 11:58:43'),
(103, 3, 1, '2020-02-25', '2020-02-18 11:58:43', '2020-02-18 11:58:43'),
(104, 2, 1, '2020-02-25', '2020-02-18 11:58:44', '2020-02-18 11:58:44'),
(105, 1, 1, '2020-02-25', '2020-02-18 11:58:44', '2020-02-18 11:58:44'),
(106, 1, 1, '2020-02-26', '2020-02-18 11:58:45', '2020-02-18 11:58:45'),
(107, 2, 1, '2020-02-26', '2020-02-18 11:58:45', '2020-02-18 11:58:45'),
(108, 3, 1, '2020-02-26', '2020-02-18 11:58:46', '2020-02-18 11:58:46'),
(109, 4, 1, '2020-02-26', '2020-02-18 11:58:48', '2020-02-18 11:58:48'),
(110, 4, 1, '2020-02-27', '2020-02-18 11:58:48', '2020-02-18 11:58:48'),
(111, 4, 1, '2020-02-28', '2020-02-18 11:58:49', '2020-02-18 11:58:49'),
(112, 4, 1, '2020-02-29', '2020-02-18 11:58:49', '2020-02-18 11:58:49'),
(113, 3, 1, '2020-02-29', '2020-02-18 11:58:50', '2020-02-18 11:58:50'),
(114, 3, 1, '2020-02-28', '2020-02-18 11:58:50', '2020-02-18 11:58:50'),
(115, 3, 1, '2020-02-27', '2020-02-18 11:58:50', '2020-02-18 11:58:50'),
(116, 2, 1, '2020-02-27', '2020-02-18 11:58:52', '2020-02-18 11:58:52'),
(117, 2, 1, '2020-02-28', '2020-02-18 11:58:52', '2020-02-18 11:58:52'),
(118, 2, 1, '2020-02-29', '2020-02-18 11:58:53', '2020-02-18 11:58:53'),
(119, 1, 1, '2020-02-29', '2020-02-18 11:58:54', '2020-02-18 11:58:54'),
(120, 1, 1, '2020-02-28', '2020-02-18 11:58:54', '2020-02-18 11:58:54'),
(121, 1, 1, '2020-02-27', '2020-02-18 11:58:55', '2020-02-18 11:58:55');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `ref` varchar(150) DEFAULT NULL,
  `bill_type` varchar(50) DEFAULT NULL,
  `property` bigint(20) DEFAULT NULL,
  `unit` bigint(20) DEFAULT NULL,
  `task` bigint(20) DEFAULT NULL,
  `party` bigint(20) DEFAULT NULL,
  `party_type` int(11) DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `paid_date` date DEFAULT NULL,
  `payment_mode` varchar(60) DEFAULT NULL,
  `payment_ref` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0= payment pending, 1 =paid',
  `remark` varchar(255) DEFAULT NULL,
  `admin_id` bigint(20) DEFAULT NULL,
  `is_disabled` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bill_inv_data`
--

CREATE TABLE `bill_inv_data` (
  `id` int(11) NOT NULL,
  `bill_inv` bigint(20) DEFAULT NULL,
  `type` enum('BILL','INVOICE') DEFAULT NULL,
  `item` bigint(20) DEFAULT NULL,
  `des` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `unit_price` decimal(13,2) DEFAULT NULL,
  `amount` decimal(13,2) DEFAULT NULL,
  `is_disabled` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `booking_request`
--

CREATE TABLE `booking_request` (
  `id` int(11) NOT NULL,
  `property_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_request`
--

INSERT INTO `booking_request` (`id`, `property_id`, `name`, `email`, `contact`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, 'Aman Raj Toppo', 'amanrajtoppoart@gmail.com', '1234567890', 'The first thing to recognize when using regular expressions is that everything is essentially a character, and we are writing patterns to match a specific sequence of characters (also known as a string). Most patterns use normal ASCII, which includes letters, digits, punctuation and other symbols on your keyboard like %#$@!, but unicode characters can also be used to match any type of international text.\r\n\r\nBelow are a couple lines of text, notice how the text changes to highlight the matching characters on each line as you type in the input field below. To continue to the next lesson, you will need to use the new syntax and concept introduced in each lesson to write a pattern that matches all the lines provided.', 1, '2020-01-21 13:46:49', '2020-01-21 13:46:49'),
(2, 9, 'Rahul Gandhi', 'rahulgandhi@gmail.com', '4242342343', 'fasdfadfasdf', 1, '2020-01-21 13:49:51', '2020-01-21 13:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `break_down_history`
--

CREATE TABLE `break_down_history` (
  `id` int(11) NOT NULL,
  `tenant_id` bigint(20) DEFAULT NULL,
  `allotment_id` bigint(20) DEFAULT NULL,
  `file_id` bigint(20) DEFAULT NULL,
  `form_data` text DEFAULT NULL,
  `email_delivered` int(11) NOT NULL DEFAULT 0 COMMENT 'Email received by tenant',
  `admin_id` int(11) DEFAULT NULL,
  `admin_type` int(11) DEFAULT NULL,
  `is_disabled` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `break_down_history`
--

INSERT INTO `break_down_history` (`id`, `tenant_id`, `allotment_id`, `file_id`, `form_data`, `email_delivered`, `admin_id`, `admin_type`, `is_disabled`, `created_at`, `updated_at`) VALUES
(1, 2, 2, NULL, '{\"rent_period_type\":\"monthly\",\"rent_period\":\"12\",\"lease_start\":\"29-01-2020\",\"lease_end\":\"29-01-2021\",\"rent_amount\":\"2562\",\"installments\":\"2\",\"installment_amount\":[\"2562\",\"2562\"],\"installment_date\":[\"29-01-2020\",\"31-01-2020\"],\"security_deposit\":\"1000\",\"first_installment\":\"2562\",\"municipality_fees\":\"102.48\",\"brokerage\":\"544\",\"contract\":\"454\",\"sewa_deposit\":\"545\",\"remote_deposit\":\"5454\",\"total_first_installment\":\"10661.48\"}', 0, 1, NULL, 0, '2020-01-28 20:11:19', '2020-01-28 20:11:19'),
(2, 2, 2, NULL, '{\"rent_period_type\":null,\"rent_period\":null,\"lease_start\":null,\"lease_end\":null,\"rent_amount\":null,\"installments\":null,\"security_deposit\":\"1000\",\"first_installment\":null,\"municipality_fees\":null,\"brokerage\":null,\"contract\":null,\"sewa_deposit\":null,\"remote_deposit\":null,\"total_first_installment\":null}', 0, 1, NULL, 0, '2020-01-29 19:20:25', '2020-01-29 19:20:25'),
(3, 2, 2, NULL, '{\"rent_period_type\":null,\"rent_period\":null,\"lease_start\":null,\"lease_end\":null,\"rent_amount\":null,\"installments\":null,\"security_deposit\":\"1000\",\"first_installment\":null,\"municipality_fees\":null,\"brokerage\":null,\"contract\":null,\"sewa_deposit\":null,\"remote_deposit\":null,\"total_first_installment\":null}', 0, 1, NULL, 0, '2020-01-29 19:20:57', '2020-01-29 19:20:57'),
(4, 22, 3, NULL, '{\"rent_period_type\":\"monthly\",\"rent_period\":\"8\",\"lease_start\":\"30-01-2020\",\"lease_end\":\"30-09-2020\",\"rent_amount\":\"5564654\",\"installments\":\"6\",\"installment_amount\":[\"5564654\",\"5564654\",\"5564654\",\"5564654\",\"5564654\",\"5564654\"],\"installment_date\":[null,null,null,null,null,null],\"security_deposit\":\"2700\",\"first_installment\":\"5564654\",\"municipality_fees\":\"222586.16\",\"brokerage\":\"4564\",\"contract\":\"656\",\"sewa_deposit\":\"5656\",\"remote_deposit\":\"656565\",\"total_first_installment\":\"6457381.16\"}', 0, 1, NULL, 0, '2020-01-30 23:06:47', '2020-01-30 23:06:47');

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `passport` text DEFAULT NULL,
  `visa` text DEFAULT NULL,
  `emirates_id` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `buyer_image` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`id`, `name`, `email`, `mobile`, `password`, `passport`, `visa`, `emirates_id`, `country`, `state`, `city`, `address`, `buyer_image`, `created_at`, `updated_at`, `status`) VALUES
(1, 'fasdfas', 'dfasd@gmail.com', '3452345234', '$2y$10$QtF2Soz9XAY4vn5YvhM8VOWK.gumv.8g8C8AEqfsTSh.okTblQrgC', 'buyers/3452345234/hjffaiSDEJWk3txiSca5jFLBMpbqPZEInP84AVLn.jpeg', 'buyers/3452345234/oCEoHvk7YlCdc1Szdd7xNrJXjR9EvcDn43aEfQne.png', 'fasdfasd', 'fadsfasd', 'fasdf', 'asdfas', 'dfasdf', 'buyers/3452345234/4Sp7tIDw4xXNAeJvVUkyMm6KcAspvnA1qS8HyviO.jpeg', '2020-02-04 23:53:33', '2020-02-05 00:44:07', 1),
(2, 'fasdf', 'asdfads@gmail.com', '5234523452', '$2y$10$TeYxm5AXpYe2Vlq/aFgdaOV8vtMzk7oCGSTvwcVcmpvVvUo8E7x2u', 'buyers/5234523452/sHcCJPSo7dAYuzcN4EVOG4Kt0b53eXWsIP2ePeI0.jpeg', 'buyers/5234523452/1Pq6JuS4N7WZWvEQoF4yLkj1IwDogykP00HT92Lb.jpeg', 'fasdfasdf', 'asdf', 'asdfasd', 'fasdf', 'asdf', 'buyers/5234523452/JOmJqeYwV7xPOmlwNUSFMWcd5IszoiJYu0D5i1yF.jpeg', '2020-02-04 23:54:40', '2020-02-07 23:44:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `state_id` bigint(20) DEFAULT NULL,
  `country_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `is_disabled` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `country_id`, `name`, `admin_id`, `is_disabled`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'DownTown Dubai', 1, 0, '2019-10-15 06:21:20', '2020-01-20 01:03:17'),
(2, 1, 1, 'Abu Dhabi', 1, 0, '2020-01-20 01:10:17', '2020-01-20 01:10:17'),
(3, 6, 1, 'Sharjah', 1, 0, '2020-01-20 01:11:11', '2020-01-20 01:11:11'),
(4, 1, 1, 'Al Ain', 1, 0, '2020-01-20 01:11:31', '2020-01-20 01:11:31'),
(5, 2, 1, 'Ajman', 1, 0, '2020-01-20 01:11:46', '2020-01-20 01:11:46'),
(6, 5, 1, 'RAK City', 1, 0, '2020-01-20 01:11:59', '2020-01-20 01:11:59'),
(7, 4, 1, 'Fujairah', 1, 0, '2020-01-20 01:12:11', '2020-01-20 01:12:11'),
(8, 7, 1, 'Umm Al Quwain', 1, 0, '2020-01-20 01:12:24', '2020-01-20 01:12:24'),
(9, 6, 1, 'Khor Fakkan', 1, 0, '2020-01-20 01:12:37', '2020-01-20 01:12:37'),
(10, 6, 1, 'Kalba', 1, 0, '2020-01-20 01:12:53', '2020-01-20 01:12:53'),
(11, 3, 1, 'Jebel Ali', 1, 0, '2020-01-20 01:13:07', '2020-01-20 01:13:07'),
(12, 4, 1, 'Dibba Al-Fujairah', 1, 0, '2020-01-20 01:13:20', '2020-01-20 01:13:20'),
(13, 1, 1, 'Madinat Zayed', 1, 0, '2020-01-20 01:13:33', '2020-01-20 01:13:33'),
(14, 1, 1, 'Liwa Oasis', 1, 0, '2020-01-20 01:13:46', '2020-01-20 01:13:46'),
(15, 6, 1, 'Dhaid', 1, 0, '2020-01-20 01:14:11', '2020-01-20 01:14:11'),
(16, 3, 1, 'Al Quoz', 1, 0, '2020-01-20 01:14:52', '2020-01-20 01:14:52'),
(17, 1, 1, 'Ruwais', 1, 0, '2020-01-20 01:15:08', '2020-01-20 01:15:08'),
(18, 1, 1, 'Ghayathi', 1, 0, '2020-01-20 01:15:18', '2020-01-20 01:15:18'),
(19, 5, 1, 'Ar-Rams', 1, 0, '2020-01-20 01:15:32', '2020-01-20 01:15:32'),
(20, 6, 1, 'Dibba Al-Hisn', 1, 0, '2020-01-20 01:15:45', '2020-01-20 01:15:45'),
(21, 3, 1, 'Hatta', 1, 0, '2020-01-20 01:15:59', '2020-01-20 01:15:59'),
(22, 6, 1, 'Al Madam', 1, 0, '2020-01-20 01:16:16', '2020-01-20 01:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `contact_request`
--

CREATE TABLE `contact_request` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `subject` text DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_request`
--

INSERT INTO `contact_request` (`id`, `name`, `email`, `mobile`, `subject`, `message`, `created_at`, `updated_at`, `status`) VALUES
(1, 'AMAN RAJ', 'amanrajtoppoart@gmail.com', '08839421623', NULL, 'fasdfasdf', '2019-11-14 05:28:58', '2019-11-14 05:28:58', 1),
(2, 'gsdfg', 'fasdfasd@fasf.fasdf', '08839421623', NULL, 'dfadsf', '2019-11-14 05:29:26', '2019-11-14 05:29:26', 1),
(3, 'fasdfasd', 'fasdfasd@fasf.fasdf', '423423423', NULL, 'fdsafasd', '2019-11-14 05:29:36', '2019-11-14 05:29:36', 1),
(4, 'fasdf', 'dsafasdf@fasdf.fasdf', '1234567890', NULL, 'dsfadsfsda', '2019-11-14 05:33:36', '2019-11-14 05:33:36', 1),
(5, 'gsdgsdf', 'gsdfg@fasdf.fadf', '08839421623', NULL, 'dfgsfdg', '2019-11-14 05:34:17', '2019-11-14 05:34:17', 1),
(6, 'gsdfg', 'fgsdfg@fasdf.fasdf', '423423423', NULL, 'fasdfasdfasd', '2019-11-14 05:34:32', '2019-11-14 05:34:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `is_disabled` int(1) DEFAULT 1,
  `admin_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `is_disabled`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'United Arab Emirates', '971', 0, 1, '2019-10-08 05:48:45', '2020-01-12 13:32:12'),
(2, 'India', '91', 0, 1, '2019-10-08 05:48:45', '2020-01-19 13:42:41'),
(3, 'Bangladesh', '880', 0, 1, '2020-01-15 14:57:34', '2020-01-19 13:46:26'),
(4, 'Afganistaan', '93', 0, 1, '2020-01-15 14:58:36', '2020-01-19 13:46:04'),
(5, 'BHUTAN', '975', 0, 1, '2020-01-19 13:47:03', '2020-01-19 19:17:03'),
(6, 'BRAZIL', '55', 0, 1, '2020-01-19 13:47:53', '2020-01-19 19:17:53');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `is_disabled` varchar(45) DEFAULT '1',
  `admin_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `is_disabled`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'Rent Department', '0', 1, '2020-01-31 20:29:44', '2020-02-09 20:46:44'),
(2, 'Sale Department', '0', 1, '2020-01-31 20:29:50', NULL),
(3, 'Account Department', '0', 1, '2020-01-31 20:29:55', NULL),
(4, 'Maintenance Department', '0', 1, '2020-01-31 20:30:06', NULL),
(5, 'Security Department', '0', 1, '2020-01-31 20:30:15', '2020-02-09 20:46:19');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `is_disabled` varchar(45) DEFAULT '1',
  `admin_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `is_disabled`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'Manager', '0', 1, '2020-01-31 20:31:28', NULL),
(2, 'Assistant', '0', 1, '2020-01-31 20:33:41', '2020-02-09 20:37:28'),
(3, 'Engineer', '0', 1, '2020-01-31 20:34:31', NULL),
(4, 'Security Guard', '0', 1, '2020-02-09 20:37:54', '2020-02-09 20:38:08'),
(5, 'Electrician', '0', 1, '2020-02-09 21:13:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `id_number` varchar(255) NOT NULL,
  `civil_status` varchar(255) DEFAULT NULL,
  `work_permit_number` varchar(255) DEFAULT NULL,
  `iban_number` varchar(255) DEFAULT NULL,
  `fixed_salary` float DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_ifsc_code` varchar(255) DEFAULT NULL,
  `bank_account` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `official_email` varchar(255) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `emirates_id` varchar(255) DEFAULT NULL,
  `joining_date` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `is_admin` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `password`, `mobile`, `photo`, `age`, `gender`, `id_number`, `civil_status`, `work_permit_number`, `iban_number`, `fixed_salary`, `dob`, `bank_name`, `bank_ifsc_code`, `bank_account`, `country`, `state`, `city`, `address`, `department_id`, `official_email`, `designation_id`, `emirates_id`, `joining_date`, `status`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'Rinah Dillard', 'nyrosufun@mailinator.com', '12345007', '5435345435', 'employees/RinahDillard/BsrOsne6dloFhQJYKwf5KVE6cufPFjZ0FKWofKaP.jpeg', '50', 'male', '845', 'single', '540', '347', 45000, '1992-07-03 00:00:00', 'CENTRAL BANK OF UAE', 'CBU5345345', '552345345', 'Debitis rerum ut non', 'Enim aut consequatur', 'Veniam eveniet omn', 'Doloribus provident', 1, 'vify@mailinator.com', 1, 'UAE5234523454', '2003-05-07 00:00:00', 1, 1, '2020-02-20 05:28:02', '2020-02-20 06:34:37');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `admin_id` bigint(20) DEFAULT NULL,
  `admin_type` int(11) DEFAULT NULL,
  `property_id` bigint(20) DEFAULT NULL,
  `unit_id` bigint(20) DEFAULT NULL,
  `tenant` bigint(20) DEFAULT NULL,
  `file_loc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_type` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_disabled` int(11) NOT NULL DEFAULT 0,
  `ext` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `vendor` bigint(20) DEFAULT NULL,
  `property_id` bigint(20) DEFAULT NULL COMMENT 'property id',
  `unit` bigint(20) DEFAULT NULL,
  `task_id` bigint(20) DEFAULT NULL,
  `image_loc` mediumtext DEFAULT NULL COMMENT 'internal file location',
  `image_url` mediumtext DEFAULT NULL COMMENT 'external image link',
  `image_thumb` mediumtext DEFAULT NULL,
  `ext` varchar(30) DEFAULT NULL,
  `physical_loc` int(11) DEFAULT NULL COMMENT '1= public 2= securely saved in storage ',
  `admin_id` int(11) DEFAULT NULL COMMENT 'user who uploaded',
  `trash` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `vendor`, `property_id`, `unit`, `task_id`, `image_loc`, `image_url`, `image_thumb`, `ext`, `physical_loc`, `admin_id`, `trash`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, NULL, NULL, NULL, '/images/property/DUD001/PROPERTY15795526882103.jpeg', '/images/property/DUD001/THUMB15795526887757.jpeg', 'jpeg', 1, 1, 0, '2020-01-20 15:08:08', '2020-01-22 18:02:06'),
(2, NULL, 1, NULL, NULL, NULL, '/images/property/DUD001/PROPERTY15795526883070.jpeg', '/images/property/DUD001/THUMB15795526889389.jpeg', 'jpeg', 1, 1, 0, '2020-01-20 15:08:08', '2020-01-22 18:02:06'),
(3, NULL, 1, NULL, NULL, NULL, '/images/property/DUD001/PROPERTY15795526888108.jpeg', '/images/property/DUD001/THUMB15795526883043.jpeg', 'jpeg', 1, 1, 0, '2020-01-20 15:08:08', '2020-01-22 18:02:06'),
(4, NULL, 4, NULL, NULL, NULL, '/images/property/DUJ001/PROPERTY15795946395886.jpeg', '/images/property/DUJ001/THUMB15795946396160.jpeg', 'jpeg', 1, 1, 0, '2020-01-21 08:17:19', '2020-01-22 18:02:06'),
(5, NULL, 4, NULL, NULL, NULL, '/images/property/DUJ001/PROPERTY15795946391428.jpeg', '/images/property/DUJ001/THUMB15795946395346.jpeg', 'jpeg', 1, 1, 0, '2020-01-21 08:17:19', '2020-01-22 18:02:06'),
(6, NULL, 4, NULL, NULL, NULL, '/images/property/DUJ001/PROPERTY15795946398448.jpeg', '/images/property/DUJ001/THUMB15795946392523.jpeg', 'jpeg', 1, 1, 0, '2020-01-21 08:17:19', '2020-01-22 18:02:06'),
(7, NULL, 5, NULL, NULL, NULL, '/images/property/ABA001/PROPERTY15795947275611.jpeg', '/images/property/ABA001/THUMB15795947276565.jpeg', 'jpeg', 1, 1, 0, '2020-01-21 08:18:47', '2020-01-22 18:02:06'),
(8, NULL, 5, NULL, NULL, NULL, '/images/property/ABA001/PROPERTY15795947272581.jpeg', '/images/property/ABA001/THUMB15795947271960.jpeg', 'jpeg', 1, 1, 0, '2020-01-21 08:18:47', '2020-01-22 18:02:06'),
(9, NULL, 6, NULL, NULL, NULL, '/images/property/ABR001/PROPERTY15795957609341.jpeg', '/images/property/ABR001/THUMB15795957606192.jpeg', 'jpeg', 1, 1, 0, '2020-01-21 08:36:00', '2020-01-22 18:02:06'),
(10, NULL, 7, NULL, NULL, NULL, '/images/property/ABR002/PROPERTY15795963432350.jpeg', '/images/property/ABR002/THUMB15795963434933.jpeg', 'jpeg', 1, 1, 0, '2020-01-21 08:45:43', '2020-01-22 18:02:06'),
(11, NULL, 7, NULL, NULL, NULL, '/images/property/ABR002/PROPERTY15795963437389.jpeg', '/images/property/ABR002/THUMB15795963435110.jpeg', 'jpeg', 1, 1, 0, '2020-01-21 08:45:43', '2020-01-22 18:02:06'),
(12, NULL, 7, NULL, NULL, NULL, '/images/property/ABR002/PROPERTY15795963438872.jpeg', '/images/property/ABR002/THUMB15795963433689.jpeg', 'jpeg', 1, 1, 0, '2020-01-21 08:45:43', '2020-01-22 18:02:06'),
(13, NULL, 8, NULL, NULL, NULL, '/images/property/ABM001/PROPERTY15795966678155.jpeg', '/images/property/ABM001/THUMB15795966674034.jpeg', 'jpeg', 1, 1, 0, '2020-01-21 08:51:07', '2020-01-22 18:02:06'),
(14, NULL, 8, NULL, NULL, NULL, '/images/property/ABM001/PROPERTY15795966676511.jpeg', '/images/property/ABM001/THUMB15795966679274.jpeg', 'jpeg', 1, 1, 0, '2020-01-21 08:51:07', '2020-01-22 18:02:06'),
(15, NULL, 9, NULL, NULL, NULL, '/images/property/ABM002/PROPERTY15795969924777.jpeg', '/images/property/ABM002/THUMB15795969923787.jpeg', 'jpeg', 1, 1, 0, '2020-01-21 08:56:32', '2020-01-22 18:02:06'),
(16, NULL, 9, NULL, NULL, NULL, '/images/property/ABM002/PROPERTY15795969921846.jpeg', '/images/property/ABM002/THUMB15795969926133.jpeg', 'jpeg', 1, 1, 0, '2020-01-21 08:56:32', '2020-01-22 18:02:06'),
(17, NULL, 9, NULL, NULL, NULL, '/images/property/ABM002/PROPERTY15795969925130.jpeg', '/images/property/ABM002/THUMB15795969923375.jpeg', 'jpeg', 1, 1, 0, '2020-01-21 08:56:32', '2020-01-22 18:02:06'),
(18, NULL, 2, NULL, NULL, NULL, '/images/property/DUJ001/PROPERTY15796081441053.jpeg', '/images/property/DUJ001/THUMB15796081444296.jpeg', 'jpeg', 1, 1, 0, '2020-01-21 06:32:24', '2020-01-22 18:02:06'),
(19, NULL, 2, NULL, NULL, NULL, '/images/property/DUJ001/PROPERTY15796081441000.jpeg', '/images/property/DUJ001/THUMB15796081449945.jpeg', 'jpeg', 1, 1, 0, '2020-01-21 06:32:25', '2020-01-22 18:02:06'),
(20, NULL, 2, NULL, NULL, NULL, '/images/property/DUJ001/PROPERTY15796081454747.jpeg', '/images/property/DUJ001/THUMB15796081451758.jpeg', 'jpeg', 1, 1, 0, '2020-01-21 06:32:25', '2020-01-22 18:02:06'),
(21, NULL, 9, NULL, NULL, NULL, '/images/property/ABM002/PROPERTY15799444883920.jpeg', '/images/property/ABM002/THUMB15799444887773.jpeg', 'jpeg', 1, 1, 0, '2020-01-25 03:58:08', '2020-01-25 09:28:08'),
(22, NULL, 9, NULL, NULL, NULL, '/images/property/ABM002/PROPERTY15799444889836.jpeg', '/images/property/ABM002/THUMB15799444883221.jpeg', 'jpeg', 1, 1, 0, '2020-01-25 03:58:08', '2020-01-25 09:28:08'),
(33, NULL, 10, NULL, NULL, NULL, '/images/property/ABS001/PROPERTY15800241243066.jpeg', '/images/property/ABS001/THUMB15800241241589.jpeg', 'jpeg', 1, 1, 0, '2020-01-26 02:05:24', '2020-01-26 07:35:24'),
(34, NULL, 10, NULL, NULL, NULL, '/images/property/ABS001/PROPERTY15800241246089.jpeg', '/images/property/ABS001/THUMB15800241244087.jpeg', 'jpeg', 1, 1, 0, '2020-01-26 02:05:24', '2020-01-26 07:35:24'),
(35, NULL, 10, NULL, NULL, NULL, '/images/property/ABS001/PROPERTY15800241241471.jpeg', '/images/property/ABS001/THUMB15800241241267.jpeg', 'jpeg', 1, 1, 0, '2020-01-26 02:05:24', '2020-01-26 07:35:24'),
(36, NULL, 12, NULL, NULL, NULL, '/images/property/ABA002/PROPERTY15802301275293.jpeg', '/images/property/ABA002/THUMB15802301273931.jpeg', 'jpeg', 1, 1, 0, '2020-01-28 11:18:47', '2020-01-28 16:48:47'),
(37, NULL, 12, NULL, NULL, NULL, '/images/property/ABA002/PROPERTY15802301272515.jpeg', '/images/property/ABA002/THUMB15802301277860.jpeg', 'jpeg', 1, 1, 0, '2020-01-28 11:18:48', '2020-01-28 16:48:48'),
(38, NULL, 12, NULL, NULL, NULL, '/images/property/ABA002/PROPERTY15802301283352.jpeg', '/images/property/ABA002/THUMB15802301286205.jpeg', 'jpeg', 1, 1, 0, '2020-01-28 11:18:48', '2020-01-28 16:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `ref` varchar(150) DEFAULT NULL,
  `inv_type` varchar(50) DEFAULT NULL,
  `property` bigint(20) DEFAULT NULL,
  `unit` bigint(20) DEFAULT NULL,
  `task` bigint(20) DEFAULT NULL,
  `party` bigint(20) DEFAULT NULL,
  `party_type` int(11) DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `paid_date` date DEFAULT NULL,
  `payment_mode` varchar(60) DEFAULT NULL,
  `payment_ref` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0= payment pending, 1 =paid',
  `remark` varchar(255) DEFAULT NULL,
  `admin_id` bigint(20) DEFAULT NULL,
  `is_disabled` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `admin_id` bigint(20) DEFAULT NULL,
  `is_disabled` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `admin_id`, `is_disabled`, `created_at`, `updated_at`) VALUES
(1, 'Property Rent', NULL, 0, '2020-02-21 06:25:10', '2020-02-21 06:25:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_09_23_170638_create_admins_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id` int(11) NOT NULL,
  `owner_id` bigint(20) DEFAULT NULL,
  `admin_id` bigint(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `passport` text DEFAULT NULL,
  `visa` text DEFAULT NULL,
  `emirates_id` varchar(255) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `mobile` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `banking_name` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_ifsc_code` varchar(255) DEFAULT NULL,
  `bank_account` varchar(255) DEFAULT NULL,
  `is_disabled` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `owner_id`, `admin_id`, `name`, `passport`, `visa`, `emirates_id`, `photo`, `mobile`, `email`, `country`, `state`, `city`, `address`, `banking_name`, `bank_name`, `bank_ifsc_code`, `bank_account`, `is_disabled`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'AMAN RAJ TOPPO', 'owners/AmanRajToppo/PncfFOn08ZBRupPiAV0LTDPAujwnnv8tlJ1fog8z.jpeg', 'owners/AmanRajToppo/aMoqsJAYmOvy9JBMBk7sThnxhlo0xlhgOZOJqI9J.jpeg', 'FSADF', 'owners/AmanRajToppo/ywy8MkxYU1rbpzjDJwWiyzwwHzJzrN99wSO0rK54.jpeg', '4512352345', 'owner_two@gmail.com', 'asdf', 'asdfad', 'sfsda', 'fdsafasd', 'sdfsadf', 'home land bag', 'DFG', 'fasdf', 0, '2020-02-06 09:19:08', '2020-02-17 11:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) NOT NULL,
  `admin_id` bigint(20) NOT NULL,
  `owner_id` bigint(20) DEFAULT NULL,
  `agent_id` bigint(20) DEFAULT NULL,
  `propcode` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `type` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `city_id` varchar(100) NOT NULL,
  `state_id` varchar(150) NOT NULL,
  `zip` int(11) DEFAULT NULL,
  `country_id` varchar(100) NOT NULL,
  `feature` varchar(255) NOT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `prop_for` int(11) NOT NULL DEFAULT 1 COMMENT '1=rent 2= sell',
  `is_disabled` int(11) NOT NULL DEFAULT 0 COMMENT '1=disabled 0= not disabled',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `property_rating` float DEFAULT NULL,
  `view_count` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `admin_id`, `owner_id`, `agent_id`, `propcode`, `title`, `description`, `type`, `category_id`, `status`, `address`, `city_id`, `state_id`, `zip`, `country_id`, `feature`, `latitude`, `longitude`, `prop_for`, `is_disabled`, `created_at`, `updated_at`, `property_rating`, `view_count`, `deleted_at`) VALUES
(1, 1, NULL, NULL, 'DUD001', 'The best view on the full desert//Make an offer', 'Exclusive Links is proud to present this villa for rent in Dubai. Type 3M: 3 Bedrooms Townhouse next to Pool & Park and Single Row with the most beautiful view: plain desert\r\n\r\nDetails of property:\r\n\r\nThe type 3M is the only type in the community with a window in the kitchen, allowing additional light to brighten up this exquisite property. guest bathroom attached with large storage room & maids room with in suite bathroom & wardrobe\r\n\r\n\r\nAs you enter, one is greeted by a spacious entry area, which leads into the family and dining area next to the semi open kitchen serving area with views of the beautifully landscaped garden.\r\n\r\nGuest bathroom attached with large storage room & maids room with in suite bathroom & wardrobe, Separate Laundry Room next to the Maids room\r\n\r\nUpstairs all three bedrooms are very spacious, with the second and third bedrooms sharing a Jack and Jill style bathroom. The master has a walk in closet, en suit bathroom, and balcony area.\r\n\r\n\r\n- BUA: 2187 Sq Ft\r\n- Single Row\r\n- Vacant and ready to move', 2, NULL, 1, 'Reem, Mira', '1', '3', 112211, '1', '7, 8, 15, 16, 17, 18, 19, 20, 21, 23, 24, 25, 26, 28, 29', 25.204932512484348, 55.270566957008356, 1, 0, '2020-01-20 15:08:08', '2020-01-22 16:03:45', NULL, 9, NULL),
(2, 1, NULL, NULL, 'DUJ001', 'Semi Furnished | Includes Maintenance Contract', '(WK)Gold Mark Real Estate \'Award Winning Botique Brokerage\' is pleased to offer this semi-furnished and well maintained 4 bedrooms townhouses in Mudon, Townhouses.\r\n\r\nProperty Details:\r\nLarge Living Area\r\nSeparate Dining Room\r\nClosed Kitchen\r\nDownstairs Guest Room\r\n3 Upstairs Bedrooms\r\nSpacious Family Area\r\nTerrace and Balcony\r\nPrivate Garden\r\nCovered Parking\r\n\r\nMudon offers its residents a tranquil lifestyle in proximity to the city\'s hustle and bustle. A short 15 minute drive from Jumeirah Beach Road, this gated community with round the clock security, consists of several ready and off plan phases of villas and townhouses. Mudon residents can currently find nearby necessities in the Al Salam Town Center including a grocery store, pharmacy, nursery, health club, various restaurants and coffee shops.\r\n\r\nCommunity Amenities:\r\nShared Swimming Pool\r\nChildren\'s Play Area\r\nWalking/Cycling Track\r\nMosque\r\nFitness First Gym\r\nBlossom\'s Nursery\r\n24 Hour Security', 3, NULL, 1, 'al salem', '11', '3', 112212, '1', '7, 8, 15, 16, 17, 18, 19, 20, 21, 23, 24, 25, 26, 28, 29', 25.204723804328, 55.270647423279, 2, 0, '2020-01-21 08:10:00', '2020-01-22 16:03:47', NULL, 5, NULL),
(4, 1, NULL, NULL, 'DUJ001', 'Semi Furnished | Includes Maintenance Contract', '(WK)Gold Mark Real Estate \'Award Winning Botique Brokerage\' is pleased to offer this semi-furnished and well maintained 4 bedrooms townhouses in Mudon, Townhouses.\r\n\r\nProperty Details:\r\nLarge Living Area\r\nSeparate Dining Room\r\nClosed Kitchen\r\nDownstairs Guest Room\r\n3 Upstairs Bedrooms\r\nSpacious Family Area\r\nTerrace and Balcony\r\nPrivate Garden\r\nCovered Parking\r\n\r\nMudon offers its residents a tranquil lifestyle in proximity to the city\'s hustle and bustle. A short 15 minute drive from Jumeirah Beach Road, this gated community with round the clock security, consists of several ready and off plan phases of villas and townhouses. Mudon residents can currently find nearby necessities in the Al Salam Town Center including a grocery store, pharmacy, nursery, health club, various restaurants and coffee shops.\r\n\r\nCommunity Amenities:\r\nShared Swimming Pool\r\nChildren\'s Play Area\r\nWalking/Cycling Track\r\nMosque\r\nFitness First Gym\r\nBlossom\'s Nursery\r\n24 Hour Security', 3, NULL, 1, 'al salem', '11', '3', 112212, '1', '7, 8, 15, 16, 17, 18, 19, 20, 21, 23, 24, 25, 26, 28, 29', 25.204723804327532, 55.2706474232788, 1, 0, '2020-01-21 08:17:19', '2020-01-29 13:05:17', NULL, 5, NULL),
(5, 1, NULL, NULL, 'ABA001', 'Vacant Big Layout Apt w/ Study Rm. and Facilities!', 'About Property:\r\nGrab the hottest deal for a 1 bedroom apartment in the serenity of Al Reem Island, Abu Dhabi, UAE.\r\nAdditional Features:\r\nFully prepared kitchen\r\nBathrooms\r\nSpacious rooms\r\n\r\nAbout Community:\r\nAl Reem Island is a residential, commercial and business project in Al Reem Isle, a natural island of 600 m off-coast from Abu Dhabi Island.\r\nThis ‘mega development’ transforms the island into a ‘city within a city’.\r\nSome of the facilities that are on the island includes seven schools, golf courses, shopping malls, art galleries and four hospitals.\r\n\r\nCommunity Amenities and Surroundings:\r\n24/7 Maintenance\r\nSchools and Colleges\r\nGyms and Recreational Areas\r\n20 Minutes from Airport.\r\n10 Minutes from Abu Dhabi Island.\r\n5 Minutes from the Reem Mall.', 2, NULL, 1, 'Apartment for Rent in Sun Tower, Shams Abu Dhabi', '2', '1', 112211, '1', '7, 17, 21, 23, 24, 26', 25.20470924328, 55.271076576721, 2, 0, '2020-01-21 08:18:47', '2020-01-22 16:03:53', NULL, 4, NULL),
(6, 1, NULL, NULL, 'ABR001', 'The Perfect Residential Villa for you', '• 5 Bedrooms\r\n• 5 Bathrooms\r\n• 4000 Square feet of built up area\r\n• Majlis\r\n• Sala\r\n• Garden\r\n• Maid Room\r\n• Laundry room\r\n• Balcony\r\n• Big Kitchen\r\n• Central Ac/Heating\r\n• Multiple Car Parkings\r\n• Villa located in a compound of 4 Villas\r\n\r\nCommunity Features:\r\n\r\n• Day care centers and nurseries\r\n• Schools, colleges and educational institutes\r\n• Hospitals and medical centers\r\n• Public Gardens and recreational facilities\r\n• Public transportation and ease of commute to neighboring communities\r\n• Adjacent to Abu Dhabi international airport\r\n• 60 minutes away from Dubai\r\n• 25 minutes away from Abu Dhabi City Center\r\n• Malls, Supermarkets and shopping centers\r\n• Restaurants, diners and café’s\r\n• Sports Arenas and club houses', 2, NULL, 1, 'Villa for Rent in Khalifa City A, Khalifa City', '17', '1', 54452, '1', '7, 8, 15, 17, 18, 21, 23, 25, 26, 28', 25.204612169585143, 55.26991249800872, 1, 0, '2020-01-21 08:36:00', '2020-02-17 10:27:38', NULL, 3, NULL),
(7, 1, NULL, NULL, 'ABR002', 'Spacious 5 Bedrooms Villa near Bateen Airport', '-2 Master Bedrooms -3Standard Bedroom -Maid\'s room - Living and Dining Room -3 Master & 1 Standard Bedroom on First Floor -1Laundary Room -kitchen -Wardrobe\r\n  near Al Maha Complex, Beside Al Bateen Airport', 2, NULL, 1, 'Villa for Rent in Al Rawdah', '17', '1', 2543, '1', '7, 8, 15, 17, 18, 19, 21, 24', 25.204619450114954, 55.26991249800872, 1, 0, '2020-01-21 08:45:43', '2020-01-25 02:43:08', NULL, 1, NULL),
(8, 1, NULL, NULL, 'ABM001', 'Spaciouse 7 Bedroom Villa with Backyards', '-2 Master Bedrooms -Standard Bedroom -Maid\'s room - Living and Dining Room -3 Master & 1 Standard Bedroom on First Floor -1Laundary Room -Separate Driver\'s room and kitchen -Wardrobe - Spacious Backyard', 2, NULL, 1, 'Villa for Rent in Delma Street, Al Mushri', '13', '1', 2365, '1', '7, 8, 15, 17, 18, 19, 21, 23, 26', 25.20479175585976, 55.27006538392257, 1, 0, '2020-01-21 08:51:07', '2020-02-10 14:38:24', NULL, 4, NULL),
(9, 1, 1, 1, 'ABM002', 'Fully Furnished 2BR apartment for rent', 'ision Twin Towers is located in the heart of Abu Dhabi and ideally placed between Al Salam Street and Najda Street near Nissan Showroom and Abu Dhabi Mall.\r\n\r\nA 21-storeys luxury apartments and within walking distance of the business district and shopping malls. All 180 apartments offering two and three bedrooms fully furnished, are spacious with dimensions ranging from 107 to 180.5 square meters. The Vision Twin Towers will be different from the usual old, offering first class residence.\r\nFully furnished apartment with fully equipped kitchenette.\r\n\r\nIn the kitchen :\r\nCooker\r\nWashing machine\r\nMicrowave\r\nCooking ware\r\nRefrigerator\r\n\r\nAmenities:\r\nMaids Room\r\nWalk-in Closet\r\nShared Gym\r\n24 hours security\r\nSwimming Pool, Gym\r\nUtilities – Water & Electricity\r\nParking slot for one car\r\nOnce a week cleaning\r\nInternet\r\nShowtime', 6, NULL, 1, 'Apartment for Rent in Vision Twin Towers, Al Najda Street', '13', '1', 3652, '1', '7, 8, 16, 17, 18, 19, 20, 21, 23, 24, 26, 28', 25.204913097787, 55.269140021812, 2, 0, '2020-01-21 08:56:32', '2020-02-17 10:12:08', NULL, 64, NULL),
(10, 1, 1, 1, 'ABS001', 'Fully Fitted Commercial Space Lake View', 'Range International Property Is pleased to offer you this Commercial Space in Lakeshore Tower 1.  Reflecting immaculate harmony, set in the subtly serene surroundings. Lake Shore Towers offers tranquil and composed living within the Jumeirah Lake Towers project. Designed around a lake a unique and scenic development creating a recreational and peaceful ambiance for its dwellers. \r\n\r\n\r\nFeatures:   \r\n\r\n\r\nBeautiful Lake view  \r\n\r\n1,097.48 Sq.Ft \r\n\r\nShell and core\r\n\r\n1 Parking\r\n\r\nJumeirah Lake Towers Dubai is known to be a community where people can live, work and enjoy their life with equal soothe and serenity. The waterfront outdoor cafes and restaurants allow late night walk or stroll alongside the lake.\r\n\r\nJLT is benefitted with a wide range of facilities within the reach such as quiet community areas, cafes terrace, shaded walkways and benches. In addition to that, it also includes pavements fountains, lake fountains, garden near to avenues, groves of trees, desert gardens and bespoke sculptural features.', 3, NULL, 1, 'SUN TOWER', '2', '1', 112211, '1', '7, 8, 15, 17, 18, 19, 20, 21, 23, 24, 25, 26, 28, 29', 25.204597608524, 55.269960777771, 2, 0, '2020-01-26 02:05:24', '2020-02-17 09:54:31', NULL, 6, NULL),
(12, 1, 1, 1, 'ABA002', 'luxury townhouse', 'luxury townhouse', 1, NULL, NULL, 'CCM9+HC Abu Dhabi - United Arab Emirates', '2', '1', NULL, '1', '7, 8, 17, 18, 21, 23, 26, 28', 25.20470924328, 55.270212905418, 2, 0, '2020-01-28 11:18:47', '2020-02-21 02:29:57', NULL, 29, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_alloted`
--

CREATE TABLE `property_alloted` (
  `id` bigint(20) NOT NULL,
  `owner` bigint(20) NOT NULL,
  `admin_id` bigint(20) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1= active 2= disabled',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `property_features`
--

CREATE TABLE `property_features` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `is_disabled` int(11) NOT NULL DEFAULT 2,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_features`
--

INSERT INTO `property_features` (`id`, `title`, `is_disabled`, `admin_id`, `created_at`, `updated_at`) VALUES
(7, 'Maides Room', 0, 1, '2019-10-28 08:58:49', '2019-10-28 08:58:49'),
(8, 'Balcony', 0, 1, '2019-10-28 08:59:04', '2019-10-28 08:59:04'),
(15, 'Study', 0, 1, '2019-10-28 09:04:29', '2019-10-28 09:04:29'),
(16, 'Central A/C', 0, 1, '2019-10-28 09:05:11', '2019-10-28 09:05:11'),
(17, 'Private Garden', 0, 1, '2019-10-28 09:05:40', '2019-10-28 09:05:40'),
(18, 'Private Pool', 0, 1, '2019-10-28 09:06:01', '2019-10-28 09:06:01'),
(19, 'Private Gym', 0, 1, '2019-10-28 09:06:30', '2019-10-28 09:06:30'),
(20, 'Private Jacuzzi', 0, 1, '2019-10-28 09:07:13', '2019-10-28 09:07:13'),
(21, 'Built in Wardrobes', 0, 1, '2019-10-28 09:08:06', '2019-10-28 09:08:06'),
(23, 'Walk-in Closet', 0, 1, '2019-10-28 09:09:49', '2019-10-28 09:09:49'),
(24, 'Built in Kitchen Appliances', 0, 1, '2019-10-28 09:11:13', '2019-10-28 09:11:13'),
(25, 'View of Water', 0, 1, '2019-10-28 09:12:43', '2019-10-28 09:12:43'),
(26, 'View of Landmark', 0, 1, '2019-10-28 09:13:17', '2019-10-28 09:13:17'),
(28, 'Pets Allowed', 0, 1, '2019-10-28 09:14:44', '2019-10-28 09:14:44'),
(29, 'Conference room', 0, 1, '2020-01-20 13:11:29', '2020-01-20 13:11:29');

-- --------------------------------------------------------

--
-- Table structure for table `property_sales`
--

CREATE TABLE `property_sales` (
  `id` bigint(20) NOT NULL,
  `buyer_id` bigint(20) NOT NULL,
  `owner_id` bigint(20) NOT NULL,
  `agent_id` bigint(20) NOT NULL,
  `selling_price` float NOT NULL,
  `booking_amount` float DEFAULT NULL,
  `property_id` bigint(20) NOT NULL,
  `unit_id` bigint(20) NOT NULL,
  `status` int(11) NOT NULL,
  `mulkia_by_owner` text DEFAULT NULL,
  `mulkia_by_buyer` text DEFAULT NULL,
  `sell_agreement` text DEFAULT NULL,
  `title_deed` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_sales`
--

INSERT INTO `property_sales` (`id`, `buyer_id`, `owner_id`, `agent_id`, `selling_price`, `booking_amount`, `property_id`, `unit_id`, `status`, `mulkia_by_owner`, `mulkia_by_buyer`, `sell_agreement`, `title_deed`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 15500, 1200, 12, 54, 2, 'agreements/2020-02-08/wuqNbhMFJsKSI5xLMTjx3qwh5WbnYCt0bB60rYRN.pdf', 'agreements/2020-02-08/vBAwNFrJDouAFNVxgQCTsdixeGHYaHbUF9mWjWGU.pdf', 'agreements/2020-02-08/7UGOXgkC7HBQCyErrMJwQKr6xemcXlZE2vP2GOp8.pdf', 'agreements/2020-02-08/C47sW9YMumOY733seJMxXVwqktav8vf3Hco8Czrl.pdf', '2020-02-07 00:24:00', '2020-02-08 14:40:06'),
(2, 1, 1, 1, 15500, 1000, 12, 57, 2, 'agreements/2020-02-08/drWjbQB5XtOfoLlh5mK8CbeKMK0QX9QkKWUEMC4K.pdf', 'agreements/2020-02-08/pcoItxYLxH95IT41P2DicasWHvI0nqIXLNyKIc9q.pdf', 'agreements/2020-02-08/D0Qu68r7SZ4SrXoUcoeKAItLBeYxQCjx4iVyWaY4.pdf', 'agreements/2020-02-08/JLLLfhmG2G7CfgO1lsuqfCFLdiejDYqwYCuNvynQ.pdf', '2020-02-07 16:27:38', '2020-02-08 14:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

CREATE TABLE `property_types` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_disabled` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_types`
--

INSERT INTO `property_types` (`id`, `title`, `admin_id`, `created_at`, `updated_at`, `is_disabled`) VALUES
(1, 'Apartment', 1, '2019-10-10 10:29:44', '2020-01-19 10:22:36', 0),
(2, 'Villa', 1, '2019-10-10 10:29:44', '2020-01-19 09:57:19', 0),
(3, 'Townhouse', 1, '2019-10-10 10:29:44', '2020-01-19 10:22:47', 0),
(4, 'Penthouse', 1, '2019-10-10 10:29:44', '2020-01-19 09:57:21', 0),
(5, 'Compound', 1, '2019-10-10 10:29:44', '2020-01-19 09:57:22', 0),
(6, 'Duplex', 1, '2019-10-10 10:29:44', '2020-01-19 09:57:22', 0),
(7, 'Full Floor', 1, '2019-10-10 10:29:44', '2020-01-19 09:57:23', 0),
(8, 'Whole Building', 1, '2019-10-10 10:29:44', '2020-01-19 09:57:24', 0),
(9, 'Bulk Rent Unit', 1, '2019-10-10 10:29:44', '2020-01-19 09:57:24', 0),
(10, 'Bungalow', 1, '2019-10-10 10:29:44', '2020-01-19 09:57:25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `property_units`
--

CREATE TABLE `property_units` (
  `id` int(11) NOT NULL,
  `unitcode` varchar(100) DEFAULT NULL,
  `property_id` bigint(20) DEFAULT NULL,
  `property_unit_type_id` bigint(20) DEFAULT NULL COMMENT 'from unit_types table',
  `title` varchar(255) DEFAULT NULL,
  `unit_desc` mediumtext DEFAULT NULL,
  `default_image` mediumtext DEFAULT NULL,
  `unit_status` int(11) DEFAULT NULL COMMENT '1 vacant, 2 rented, 3 needs rehab, 4 under rehab, 5 eviction, 6 needs cleaning,7=booked',
  `admin_id` bigint(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=active 0=disabled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_units`
--

INSERT INTO `property_units` (`id`, `unitcode`, `property_id`, `property_unit_type_id`, `title`, `unit_desc`, `default_image`, `unit_status`, `admin_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'DUD001U11', 1, 1, NULL, NULL, NULL, 2, 1, 1, '2020-01-20 15:08:08', '2020-01-20 15:08:08'),
(2, 'DUJ001U11', 2, 2, NULL, NULL, NULL, 1, 1, 1, '2020-01-21 08:10:00', '2020-01-21 08:10:00'),
(4, 'DUJ001U11', 4, 4, NULL, NULL, NULL, 1, 1, 1, '2020-01-21 08:17:19', '2020-01-21 08:17:19'),
(5, 'ABA001U11', 5, 5, NULL, NULL, NULL, 2, 1, 1, '2020-01-21 08:18:47', '2020-01-21 08:18:47'),
(6, 'ABR001U11', 6, 6, NULL, NULL, NULL, 1, 1, 1, '2020-01-21 08:36:00', '2020-01-21 08:36:00'),
(7, 'ABR002U11', 7, 7, NULL, NULL, NULL, 1, 1, 1, '2020-01-21 08:45:43', '2020-01-21 08:45:43'),
(8, 'ABM001U11', 8, 8, NULL, NULL, NULL, 1, 1, 1, '2020-01-21 08:51:07', '2020-01-21 08:51:07'),
(9, 'ABM002U11', 9, 9, NULL, NULL, NULL, 1, 1, 1, '2020-01-21 08:56:32', '2020-01-21 08:56:32'),
(10, 'ABS001U11', 10, 10, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(11, 'ABS001U12', 10, 10, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(12, 'ABS001U13', 10, 10, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(13, 'ABS001U14', 10, 10, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(14, 'ABS001U15', 10, 10, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(15, 'ABS001U21', 10, 11, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(16, 'ABS001U22', 10, 11, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(17, 'ABS001U23', 10, 11, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(18, 'ABS001U24', 10, 11, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(19, 'ABS001U25', 10, 11, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(20, 'ABS001U26', 10, 11, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(21, 'ABS001U27', 10, 11, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(22, 'ABS001U28', 10, 11, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(23, 'ABS001U31', 10, 12, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(24, 'ABS001U32', 10, 12, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(25, 'ABS001U33', 10, 12, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(26, 'ABS001U34', 10, 12, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(27, 'ABS001U35', 10, 12, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(28, 'ABS001U36', 10, 12, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(29, 'ABS001U37', 10, 12, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(30, 'ABS001U38', 10, 12, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(31, 'ABS001U39', 10, 12, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(32, 'ABS001U310', 10, 12, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(33, 'ABS001U41', 10, 13, NULL, NULL, NULL, 2, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(34, 'ABS001U42', 10, 13, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(35, 'ABS001U43', 10, 13, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(36, 'ABS001U44', 10, 13, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(37, 'ABS001U45', 10, 13, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(38, 'ABS001U46', 10, 13, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(39, 'ABS001U47', 10, 13, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(40, 'ABS001U48', 10, 13, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(41, 'ABS001U49', 10, 13, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(42, 'ABS001U410', 10, 13, NULL, NULL, NULL, 1, 1, 1, '2020-01-26 02:05:24', '2020-01-26 02:05:24'),
(43, 'ABA002U11', 12, 15, NULL, NULL, NULL, 1, 1, 1, '2020-01-28 11:18:47', '2020-01-28 11:18:47'),
(44, 'ABA002U12', 12, 15, NULL, NULL, NULL, 1, 1, 1, '2020-01-28 11:18:47', '2020-01-28 11:18:47'),
(45, 'ABA002U13', 12, 15, NULL, NULL, NULL, 1, 1, 1, '2020-01-28 11:18:47', '2020-01-28 11:18:47'),
(46, 'ABA002U14', 12, 15, NULL, NULL, NULL, 1, 1, 1, '2020-01-28 11:18:47', '2020-01-28 11:18:47'),
(47, 'ABA002U15', 12, 15, NULL, NULL, NULL, 1, 1, 1, '2020-01-28 11:18:47', '2020-01-28 11:18:47'),
(48, 'ABA002U21', 12, 16, NULL, NULL, NULL, 1, 1, 1, '2020-01-28 11:18:47', '2020-01-28 11:18:47'),
(49, 'ABA002U22', 12, 16, NULL, NULL, NULL, 1, 1, 1, '2020-01-28 11:18:47', '2020-01-28 11:18:47'),
(50, 'ABA002U23', 12, 16, NULL, NULL, NULL, 1, 1, 1, '2020-01-28 11:18:47', '2020-01-28 11:18:47'),
(51, 'ABA002U24', 12, 16, NULL, NULL, NULL, 1, 1, 1, '2020-01-28 11:18:47', '2020-01-28 11:18:47'),
(52, 'ABA002U25', 12, 16, NULL, NULL, NULL, 1, 1, 1, '2020-01-28 11:18:47', '2020-01-28 11:18:47'),
(53, 'ABA002U31', 12, 17, NULL, NULL, NULL, 2, 1, 1, '2020-01-28 11:18:47', '2020-01-29 11:15:58'),
(54, 'ABA002U32', 12, 17, NULL, NULL, NULL, 1, 1, 7, '2020-01-28 11:18:47', '2020-02-06 18:54:00'),
(55, 'ABA002U33', 12, 17, NULL, NULL, NULL, 1, 1, 1, '2020-01-28 11:18:47', '2020-01-28 11:18:47'),
(56, 'ABA002U34', 12, 17, NULL, NULL, NULL, 1, 1, 1, '2020-01-28 11:18:47', '2020-01-28 11:18:47'),
(57, 'ABA002U35', 12, 17, NULL, NULL, NULL, 1, 1, 7, '2020-01-28 11:18:47', '2020-02-07 10:57:38');

-- --------------------------------------------------------

--
-- Table structure for table `property_unit_allotment`
--

CREATE TABLE `property_unit_allotment` (
  `id` bigint(20) NOT NULL,
  `tenant_id` bigint(20) NOT NULL,
  `admin_id` bigint(20) NOT NULL,
  `property_id` bigint(20) NOT NULL,
  `property_unit_type_id` bigint(20) NOT NULL,
  `unit_id` bigint(20) NOT NULL,
  `security_deposit` float DEFAULT NULL,
  `rent_amount` float DEFAULT NULL,
  `installments` int(11) DEFAULT NULL,
  `lease_start` date DEFAULT NULL,
  `lease_end` date DEFAULT NULL,
  `sewa_deposit` float DEFAULT NULL,
  `municipality_fees` float DEFAULT NULL,
  `brokerage` float DEFAULT NULL,
  `contract` float DEFAULT NULL,
  `first_installment` float DEFAULT NULL,
  `remote_deposit` float DEFAULT NULL,
  `total_first_installment` float DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1= active, 2=moved out, 3 = evicted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_unit_allotment`
--

INSERT INTO `property_unit_allotment` (`id`, `tenant_id`, `admin_id`, `property_id`, `property_unit_type_id`, `unit_id`, `security_deposit`, `rent_amount`, `installments`, `lease_start`, `lease_end`, `sewa_deposit`, `municipality_fees`, `brokerage`, `contract`, `first_installment`, `remote_deposit`, `total_first_installment`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 1, 1, 1, 1, 4234, 534, 2, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, '2020-01-25 17:14:10', '2020-01-25 17:14:10', 1),
(2, 2, 1, 5, 5, 5, 1000, 450000, 2, NULL, '2020-02-12', 100, 18000, 100, 100, 100, 1000, 20400, '2020-01-25 20:06:04', '2020-01-25 20:06:04', 1),
(3, 22, 1, 10, 13, 33, 2700, 4500, 3, '2020-02-01', '2020-03-07', 20, 180, 20, 20, 4500, 20, 7460, '2020-01-26 10:39:50', '2020-01-26 10:39:50', 2),
(4, 1, 1, 12, 17, 53, 100, 1000000, 3, '2020-02-01', '2021-02-01', 100, 40000, 100, 100, 1000000, 100, 1040500, '2020-01-29 16:45:58', '2020-01-29 16:45:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `property_unit_types`
--

CREATE TABLE `property_unit_types` (
  `id` bigint(20) NOT NULL,
  `property_id` bigint(20) DEFAULT NULL,
  `unit_size` varchar(30) DEFAULT NULL,
  `rent_type` varchar(30) DEFAULT NULL,
  `bedroom` varchar(30) DEFAULT NULL,
  `bathroom` varchar(30) DEFAULT NULL,
  `furnishing` varchar(30) DEFAULT NULL,
  `balcony` varchar(30) DEFAULT NULL,
  `parking` varchar(30) DEFAULT NULL,
  `kitchen` varchar(30) DEFAULT NULL,
  `hall` varchar(30) DEFAULT NULL,
  `rental_amount` float DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `total_unit` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_unit_types`
--

INSERT INTO `property_unit_types` (`id`, `property_id`, `unit_size`, `rent_type`, `bedroom`, `bathroom`, `furnishing`, `balcony`, `parking`, `kitchen`, `hall`, `rental_amount`, `title`, `total_unit`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2345, 'Villa', 1, '2020-01-20 15:08:08', '2020-01-20 15:08:08'),
(2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 145000, 'TownHouse', 1, '2020-01-21 08:10:00', '2020-01-21 06:32:24'),
(4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 145000, 'TownHouse', 1, '2020-01-21 08:17:19', '2020-01-21 08:17:19'),
(5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 570, '1542', 1, '2020-01-21 08:18:47', '2020-01-21 08:35:08'),
(6, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 546, '3562', 1, '2020-01-21 08:36:00', '2020-01-21 08:36:00'),
(7, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5632, 'villa', 1, '2020-01-21 08:45:43', '2020-01-21 08:45:43'),
(8, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7654, 'villa', 1, '2020-01-21 08:51:07', '2020-01-21 08:51:07'),
(9, 9, '2500', 'yearly', '1', '1', 'furnished', '0', '0', '1', '1', 7546, 'villa', 1, '2020-01-21 08:56:32', '2020-02-06 10:24:56'),
(10, 10, '1000', 'yearly', '1', '1', 'furnished', '0', '0', '1', '1', 12000, '1BHK', 5, '2020-01-26 02:05:24', '2020-02-06 10:44:00'),
(11, 10, '2000', 'yearly', '1', '1', 'furnished', '0', '0', '1', '1', 18000, '2BHK', 8, '2020-01-26 02:05:24', '2020-02-06 10:44:00'),
(12, 10, '3000', 'yearly', '1', '1', 'furnished', '0', '0', '1', '1', 25000, '3BHK', 10, '2020-01-26 02:05:24', '2020-02-06 10:44:00'),
(13, 10, '4000', 'yearly', '1', '1', 'furnished', '0', '0', '1', '1', 30000, '4BHK', 10, '2020-01-26 02:05:24', '2020-02-06 10:44:00'),
(15, 12, '2000', 'yearly', '1', '1', 'furnished', '1', '1', '1', '1', 14500, '1BHK', 5, '2020-01-28 11:18:47', '2020-02-06 10:23:59'),
(16, 12, '2500', 'yearly', '2', '2', 'furnished', '1', '1', '1', '1', 15000, '2BHK', 5, '2020-01-28 11:18:47', '2020-02-06 10:23:59'),
(17, 12, '3000', 'yearly', '3', '3', 'furnished', '1', '1', '1', '1', 15500, '3BHK', 5, '2020-01-28 11:18:47', '2020-02-06 10:23:59');

-- --------------------------------------------------------

--
-- Table structure for table `rents`
--

CREATE TABLE `rents` (
  `id` int(11) NOT NULL,
  `property` bigint(20) DEFAULT NULL,
  `unit` bigint(20) DEFAULT NULL,
  `amount` decimal(13,2) DEFAULT NULL,
  `admin_id` bigint(20) DEFAULT NULL COMMENT 'who updated rent',
  `effective_month` varchar(25) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '1=active, 2= changed, count start for new tenant',
  `remark` mediumtext DEFAULT NULL,
  `is_disabled` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rent_installments`
--

CREATE TABLE `rent_installments` (
  `id` bigint(20) NOT NULL,
  `property_unit_allotment_id` bigint(20) DEFAULT NULL,
  `tenant_id` bigint(20) DEFAULT NULL,
  `unit_id` bigint(20) NOT NULL,
  `amount` float DEFAULT NULL,
  `total_amount` float DEFAULT NULL,
  `paid_amount` float DEFAULT NULL,
  `expected_date` datetime DEFAULT NULL,
  `paid_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `remark` varchar(255) DEFAULT NULL,
  `admin_id` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rent_installments`
--

INSERT INTO `rent_installments` (`id`, `property_unit_allotment_id`, `tenant_id`, `unit_id`, `amount`, `total_amount`, `paid_amount`, `expected_date`, `paid_date`, `status`, `remark`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 267, NULL, NULL, '2020-01-27 00:00:00', NULL, 0, NULL, 1, '2020-01-25 17:14:10', '2020-01-25 17:14:10'),
(2, 1, 1, 1, 267, NULL, NULL, '2020-01-31 00:00:00', NULL, 0, NULL, 1, '2020-01-25 17:14:10', '2020-01-25 17:14:10'),
(3, 2, 2, 5, 225000, NULL, NULL, '2020-01-31 00:00:00', NULL, 0, NULL, 1, '2020-01-25 20:06:05', '2020-01-25 20:06:05'),
(4, 2, 2, 5, 225000, NULL, NULL, '2020-03-12 00:00:00', NULL, 0, NULL, 1, '2020-01-25 20:06:05', '2020-01-25 20:06:05'),
(5, 3, 22, 33, 4500, NULL, NULL, '2020-02-01 00:00:00', NULL, 0, NULL, 1, '2020-01-26 10:39:50', '2020-01-26 10:39:50'),
(6, 3, 22, 33, 4500, NULL, NULL, '2020-03-12 00:00:00', NULL, 0, NULL, 1, '2020-01-26 10:39:50', '2020-01-26 10:39:50'),
(7, 3, 22, 33, 4500, NULL, NULL, '2020-02-12 00:00:00', NULL, 0, NULL, 1, '2020-01-26 10:39:50', '2020-01-26 10:39:50'),
(8, 4, 1, 53, 1000000, NULL, NULL, '2020-01-31 00:00:00', NULL, 1, NULL, 1, '2020-01-29 16:45:58', '2020-01-29 16:45:58'),
(9, 4, 1, 53, 1000000, NULL, NULL, '2020-02-28 00:00:00', NULL, 0, NULL, 1, '2020-01-29 16:45:58', '2020-01-29 16:45:58'),
(10, 4, 1, 53, 1000000, NULL, NULL, '2020-03-20 00:00:00', NULL, 0, NULL, 1, '2020-01-29 16:45:58', '2020-01-29 16:45:58');

-- --------------------------------------------------------

--
-- Table structure for table `salary_sheets`
--

CREATE TABLE `salary_sheets` (
  `id` int(11) NOT NULL,
  `sheet_no` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_uid` varchar(255) DEFAULT NULL,
  `corporate_bank_name` varchar(255) DEFAULT NULL,
  `total_salary` float DEFAULT NULL,
  `commission` float DEFAULT NULL,
  `vat` float DEFAULT NULL,
  `total_payment` float DEFAULT NULL,
  `fund_transfer_date` date DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `admin_id` bigint(20) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary_sheets`
--

INSERT INTO `salary_sheets` (`id`, `sheet_no`, `company_name`, `company_uid`, `corporate_bank_name`, `total_salary`, `commission`, `vat`, `total_payment`, `fund_transfer_date`, `month`, `year`, `admin_id`, `start_date`, `end_date`, `created_at`, `updated_at`, `status`) VALUES
(1, 'AH000001', 'Al Hoor Real State PVT. LTD', 'SDHADF5435', NULL, 2000, 0, 100, 2100, NULL, NULL, NULL, 1, '2020-01-01', '2020-01-31', '2020-02-14 14:18:53', '2020-02-14 14:18:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `salary_sheet_details`
--

CREATE TABLE `salary_sheet_details` (
  `id` int(11) NOT NULL,
  `sheet_id` varchar(255) DEFAULT NULL,
  `employee_id` bigint(20) DEFAULT NULL,
  `department_id` bigint(20) DEFAULT NULL,
  `designation_id` bigint(20) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `iban_number` varchar(255) DEFAULT NULL,
  `attendance_count` int(11) DEFAULT NULL,
  `leave_count` int(11) DEFAULT NULL,
  `fixed_salary` float DEFAULT NULL,
  `fixed_pay` float DEFAULT NULL,
  `variable_pay` float DEFAULT NULL,
  `total_salary_ind` float DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary_sheet_details`
--

INSERT INTO `salary_sheet_details` (`id`, `sheet_id`, `employee_id`, `department_id`, `designation_id`, `account_number`, `bank_name`, `iban_number`, `attendance_count`, `leave_count`, `fixed_salary`, `fixed_pay`, `variable_pay`, `total_salary_ind`, `start_date`, `end_date`, `created_at`, `updated_at`, `status`) VALUES
(1, '1', 1, 1, 1, '423423534534', 'CENTRAL BANK OF UAE', 'UAE5334FSFSD5434534', 0, 30, 45000, 0, 500, 500, '2020-01-01', '2020-01-31', '2020-02-14 14:18:53', '2020-02-14 14:18:53', 0),
(2, '1', 2, 5, 5, '52345345435', 'CENTRAL BANK OF UAE', 'UAE5345FAD354345345', 0, 30, 56000, 0, 500, 500, '2020-01-01', '2020-01-31', '2020-02-14 14:18:53', '2020-02-14 14:18:53', 0),
(3, '1', 3, 4, 4, '53534534534', 'CENTRAL BANK OF UAE', 'AE5345345345345345435', 0, 30, 20000, 0, 500, 500, '2020-01-01', '2020-01-31', '2020-02-14 14:18:53', '2020-02-14 14:18:53', 0),
(4, '1', 4, 4, 4, '4234234234324', 'CENTRAL BANK OF UAE', 'AE1234567890867', 0, 30, 20000, 0, 500, 500, '2020-01-01', '2020-01-31', '2020-02-14 14:18:53', '2020-02-14 14:18:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `page` varchar(255) DEFAULT NULL COMMENT 'ex. guest_index, user_home,admin_home',
  `position` varchar(255) DEFAULT NULL COMMENT 'ex. first,second,third',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_disabled` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `admin_id`, `page`, `position`, `created_at`, `updated_at`, `is_disabled`) VALUES
(1, 1, 'guest_home', 'first', '2019-10-21 07:13:37', '2019-10-21 07:13:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `slider_contents`
--

CREATE TABLE `slider_contents` (
  `id` int(11) NOT NULL,
  `slider_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `title` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_disabled` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider_contents`
--

INSERT INTO `slider_contents` (`id`, `slider_id`, `image`, `title`, `short_description`, `description`, `created_at`, `updated_at`, `is_disabled`) VALUES
(1, 1, 'SLIDER15716618171671.jpeg', NULL, 'House for your family', 'Best featured family appartment this month', '2019-10-21 07:13:37', '2019-10-21 07:13:37', 0),
(2, 1, 'SLIDER15720973341595.jpg', NULL, 'House for your family', 'Best featured family appartment this month', '2019-10-26 08:12:14', '2019-10-26 08:12:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `country_id` bigint(20) DEFAULT NULL,
  `admin_id` bigint(20) DEFAULT NULL,
  `is_disabled` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `image`, `country_id`, `admin_id`, `is_disabled`, `created_at`, `updated_at`) VALUES
(1, 'Abu Dhabi', '/images/states/STATE15796235268494.png', 1, 1, 1, '2019-10-18 01:30:14', '2020-02-20 14:01:57'),
(2, 'Ajman', '/images/states/STATE15796235172333.png', 1, 1, 0, '2019-10-18 01:31:57', '2020-01-24 15:23:44'),
(3, 'Dubai', '/images/states/STATE15796235087778.png', 1, 1, 0, '2019-10-18 01:32:04', '2020-01-24 15:23:44'),
(4, 'Fujairah', '/images/states/STATE15796235005420.png', 1, 1, 1, '2019-10-18 01:32:12', '2020-02-20 14:01:56'),
(5, 'Ras Al Khaimah', '/images/states/STATE15796234847239.png', 1, 1, 0, '2019-10-18 01:32:22', '2020-01-24 15:23:46'),
(6, 'Sharjah', '/images/states/STATE15796234737987.png', 1, 1, 0, '2019-10-18 01:32:31', '2020-01-24 15:23:47'),
(7, 'Umm Al Quwain', '/images/states/STATE15796234568652.png', 1, 1, 0, '2019-10-18 01:32:45', '2020-01-24 15:23:47');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `admin_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `value`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'property_code_length', '3', 1, '2019-04-27 18:05:29', '2019-04-27 18:05:29'),
(2, 'email', 'noreply@indiana.com', 1, '2018-12-20 14:17:40', '0000-00-00 00:00:00'),
(3, 'task_code_length', '3', 1, '2018-12-24 08:56:12', '0000-00-00 00:00:00'),
(4, 'admin_url', 'administrator', 1, '2019-01-10 07:30:28', '0000-00-00 00:00:00'),
(5, 'manager_url', 'manager', 1, '2019-01-10 07:30:28', '0000-00-00 00:00:00'),
(6, 'contractor_url', 'contractor', 1, '2019-01-10 07:31:04', '0000-00-00 00:00:00'),
(7, 'tenant_url', 'tenants', 1, '2019-01-10 07:31:37', '0000-00-00 00:00:00'),
(8, 'supervisor_url', 'supervisor', 1, '2019-01-19 10:35:52', '0000-00-00 00:00:00'),
(9, 'assistant_url', 'assistant', 1, '2019-01-22 06:19:24', '0000-00-00 00:00:00'),
(10, 'invoice_prefix', 'GRAVIS', 1, '2019-02-07 10:18:43', '0000-00-00 00:00:00'),
(11, 'receivable_account', '58', 1, '2019-04-27 18:54:32', '2019-04-27 18:54:32'),
(12, 'payable_account', '15', 1, '2019-04-27 18:57:43', '2019-04-27 18:57:43'),
(13, '_token', 'GcGlfXSsZiczkVcLM6WsNRGVtQDXVwoSxlWlVEOY', 1, '2019-11-16 09:38:36', '2019-11-16 04:08:36'),
(14, 'facebook_social_account', 'https://www.facebook.com', 1, '2019-11-16 09:38:36', '2019-11-16 04:08:36'),
(15, 'twitter_social_account', 'https://twitter.com/home', 1, '2019-11-16 09:38:36', '2019-11-16 04:08:36'),
(16, 'linkedin_social_account', 'https://www.linkedin.com', 1, '2019-11-16 09:38:36', '2019-11-16 04:08:36'),
(17, 'google_social_account', 'https://aboutme.google.com', 1, '2019-11-16 09:38:36', '2019-11-16 04:08:36'),
(18, 'vimeo_social_account', 'https://vimeo.com', 1, '2019-11-16 09:38:36', '2019-11-16 04:08:36'),
(19, 'youtube_social_account', 'https://www.youtube.com', 1, '2019-11-16 09:38:36', '2019-11-16 04:08:36'),
(20, 'official_email_id', 'office@gmail.com', 1, '2019-11-16 09:38:36', '2019-11-16 04:08:36'),
(21, 'official_contact_number', '08839421623', 1, '2019-11-16 09:38:36', '2019-11-16 04:08:36'),
(22, 'office_address', 'Al Manzil District, Downtown, Yansoon 7 - Sheikh Mohammed bin Rashid Blvd - Dubai - United Arab Emirates', 1, '2019-11-16 09:38:36', '2019-11-16 04:08:36'),
(23, 'company_name', 'Al Hoor Real State PVT. LTD', 1, '2020-02-14 00:10:05', '2020-02-14 00:10:05'),
(24, 'company_uid', 'SDHADF5435', 1, '2020-02-14 00:10:29', '2020-02-14 00:10:29'),
(25, 'carporate_bank_name', 'CENTRAL BANK OF UAE', 1, '2020-02-14 00:10:57', '2020-02-14 00:10:57'),
(26, 'vat_on_salary', '5', 1, '2020-02-14 14:14:54', '2020-02-14 14:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `task_code` varchar(100) DEFAULT NULL,
  `assignor_id` bigint(20) DEFAULT NULL COMMENT 'who created the task',
  `assignor_type` varchar(255) DEFAULT NULL COMMENT 'who created task can be any kind of management account',
  `property_id` bigint(20) DEFAULT NULL,
  `property_unit_id` bigint(20) DEFAULT NULL,
  `ticket_id` bigint(20) DEFAULT NULL,
  `task_title` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 0 COMMENT '0=pending,1=working,2=completed 3=on hold 4 = in review',
  `priority` int(11) NOT NULL DEFAULT 4 COMMENT '1=emergency,2=high,3=normal,4=low',
  `description` text DEFAULT NULL,
  `is_disabled` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task_code`, `assignor_id`, `assignor_type`, `property_id`, `property_unit_id`, `ticket_id`, `task_title`, `status`, `priority`, `description`, `is_disabled`, `created_at`, `updated_at`) VALUES
(1, 'DUD001U11-00001', 1, 'super-admin', 5, 5, NULL, 'Repaire a/c', 0, 1, 'When central air conditioning service fails during a heat spell, you may have to wait days for an HVAC repair technician or an ac contractor to show up, and you\'ll probably pay at least several hundred for the repair. But if you\'re comfortable working around electricity and are willing to spend about $50 on parts, you can probably repair your air conditioning service yourself in about two hours and save about $225 on parts markup and labor', 0, '2020-02-20 11:53:05', '2020-02-20 11:53:05'),
(4, 'ABS001U11-00001', 1, 'super-admin', 10, 10, NULL, 'Create new balcony', 0, 3, 'Create a new balcony with stylish design', 0, '2020-02-20 13:28:19', '2020-02-20 13:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `task_assignments`
--

CREATE TABLE `task_assignments` (
  `id` int(11) NOT NULL,
  `task_id` bigint(20) DEFAULT NULL,
  `assignee_id` varchar(20) DEFAULT NULL COMMENT 'who got the task',
  `assignee_type` varchar(255) DEFAULT NULL,
  `assignor_id` bigint(20) DEFAULT NULL COMMENT 'who assigning the task to user',
  `assignor_type` varchar(255) DEFAULT NULL,
  `status` varchar(40) NOT NULL DEFAULT 'ASSIGNED' COMMENT 'CHANGED,ASSIGNED,COMPLETED',
  `remark` varchar(255) DEFAULT NULL,
  `expected_time` timestamp NULL DEFAULT NULL,
  `task_completed` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_assignments`
--

INSERT INTO `task_assignments` (`id`, `task_id`, `assignee_id`, `assignee_type`, `assignor_id`, `assignor_type`, `status`, `remark`, `expected_time`, `task_completed`, `created_at`, `updated_at`) VALUES
(1, 1, '5', 'manager', 1, 'super-admin', 'ASSIGNED', NULL, NULL, NULL, '2020-02-20 11:53:05', '2020-02-20 11:53:05'),
(2, 4, '5', 'manager', 1, 'super-admin', 'ASSIGNED', NULL, NULL, NULL, '2020-02-20 13:28:19', '2020-02-20 13:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `task_comments`
--

CREATE TABLE `task_comments` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_id` bigint(20) DEFAULT NULL,
  `msg` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_comments`
--

INSERT INTO `task_comments` (`id`, `user_id`, `user_type`, `task_id`, `msg`, `media`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 'super-admin', 4, 'fasdfasdfasdf', NULL, '2020-02-10', '2020-02-21 23:32:24', '2020-02-22 04:13:36'),
(2, 1, 'super-admin', 4, 'hi there i am aman', NULL, '2020-02-21', '2020-02-21 19:55:18', '2020-02-21 19:55:18'),
(3, 1, 'super-admin', 4, 'fsdfasd', NULL, '2020-02-21', '2020-02-21 19:55:35', '2020-02-21 19:55:35'),
(4, 1, 'super-admin', 4, 'fsdfasdfasdf', NULL, '2020-02-21', '2020-02-21 19:56:08', '2020-02-21 19:56:08'),
(5, 1, 'super-admin', 4, 'fsdfasdfasdffasdf', NULL, '2020-02-21', '2020-02-21 19:56:21', '2020-02-21 19:56:21'),
(6, 1, 'super-admin', 4, 'fgdfasdf', NULL, '2020-02-21', '2020-02-21 19:58:41', '2020-02-21 19:58:41'),
(7, 1, 'super-admin', 4, 'fasdfasd', NULL, '2020-02-21', '2020-02-21 19:59:07', '2020-02-21 19:59:07'),
(8, 1, 'super-admin', 4, 'fsadfsdf', NULL, '2020-02-21', '2020-02-21 19:59:22', '2020-02-21 19:59:22'),
(9, 1, 'super-admin', 4, 'fasdfsdf', NULL, '2020-02-21', '2020-02-21 20:00:22', '2020-02-21 20:00:22'),
(10, 1, 'super-admin', 4, 'fasdfsd', NULL, '2020-02-21', '2020-02-21 20:00:24', '2020-02-21 20:00:24'),
(11, 1, 'super-admin', 4, 'fasdfasd', NULL, '2020-02-21', '2020-02-21 20:00:25', '2020-02-21 20:00:25'),
(12, 1, 'super-admin', 4, 'fasdfasdf', NULL, '2020-02-21', '2020-02-21 20:00:27', '2020-02-21 20:00:27'),
(13, 1, 'super-admin', 4, 'fasdfasdf', NULL, '2020-02-21', '2020-02-21 20:00:29', '2020-02-21 20:00:29'),
(14, 1, 'super-admin', 4, 'fasdfasd', NULL, '2020-02-21', '2020-02-21 20:00:30', '2020-02-21 20:00:30'),
(15, 1, 'super-admin', 4, 'Saal tu kutta kamina hain', NULL, '2020-02-21', '2020-02-21 20:00:41', '2020-02-21 20:00:41'),
(16, 1, 'super-admin', 4, 'New year hello boy', NULL, '2020-02-21', '2020-02-21 20:01:39', '2020-02-21 20:01:39'),
(17, 1, 'super-admin', 4, 'hgjhggjhgj', NULL, '2020-02-21', '2020-02-21 20:11:13', '2020-02-21 20:11:13'),
(18, 1, 'super-admin', 4, 'hjkkjhjkh', NULL, '2020-02-21', '2020-02-21 20:11:16', '2020-02-21 20:11:16'),
(19, 1, 'super-admin', 4, 'njknkljkl', NULL, '2020-02-21', '2020-02-21 20:11:18', '2020-02-21 20:11:18'),
(20, 1, 'super-admin', 4, 'kjhjkhklhjkl', NULL, '2020-02-21', '2020-02-21 20:20:12', '2020-02-21 20:20:12'),
(21, 1, 'super-admin', 4, 'FASDFADSF', NULL, '2020-02-21', '2020-02-21 20:24:05', '2020-02-21 20:24:05'),
(22, 1, 'super-admin', 4, 'CHAT BOX', NULL, '2020-02-21', '2020-02-21 20:24:10', '2020-02-21 20:24:10'),
(23, 1, 'super-admin', 4, 'GJHGJHGHJG', 'task/chat/2020-02-21/zcAk0F120m21oVrA7MsfFx3VnSipEg5b7mrOhLxR.jpeg', '2020-02-21', '2020-02-21 20:24:38', '2020-02-21 20:24:38'),
(24, 1, 'super-admin', 4, 'GJHGJHGHJG', 'task/chat/2020-02-21/BZ6uUVbHBUtFV3jZcXnHW02cnxK2s1woiXVFpRzd.jpeg', '2020-02-21', '2020-02-21 20:24:50', '2020-02-21 20:24:50'),
(25, 1, 'super-admin', 4, 'HGHJGJH', 'task/chat/2020-02-21/UkqSD6lvV5DAIP39Ta6DDKRIcym2kUIB8Y6M0mYW.jpeg', '2020-02-21', '2020-02-21 20:25:00', '2020-02-21 20:25:00'),
(26, 1, 'super-admin', 4, 'fasdfsadf', NULL, '2020-02-21', '2020-02-21 22:05:57', '2020-02-21 22:05:57'),
(27, 1, 'super-admin', 4, 'new file has to do in it', 'task/chat/2020-02-21/62iLPNjQCaj8UdQB9z659aqWYrwy2fNiCf9LkfxS.jpeg', '2020-02-21', '2020-02-21 22:06:10', '2020-02-21 22:06:10'),
(28, 1, 'super-admin', 4, 'New chat is here', 'task/chat/2020-02-21/Ecea9SrZlFLIZtuJB2rEcv9TUZZ3S1pyxzO63xEj.jpeg', '2020-02-21', '2020-02-21 22:08:14', '2020-02-21 22:08:14'),
(29, 1, 'super-admin', 4, 'dgfsdfg', 'task/chat/2020-02-21/QNlHgjn49rIsNMlU73LLHAmErG3P3Mwi0a1tZ3KU.jpeg', '2020-02-21', '2020-02-21 22:13:27', '2020-02-21 22:13:27'),
(30, 1, 'super-admin', 4, 'fdsafsdafasdfadsfdsf', 'task/chat/2020-02-21/SFmeZ3l3wkJvifiVTB5IWUCV2dIqXyrzXeeUhc3o.jpeg', '2020-02-21', '2020-02-21 22:16:04', '2020-02-21 22:16:04'),
(31, 1, 'super-admin', 4, 'File are being uploaded', 'task/chat/2020-02-21/u6sLzEPhU5MqIOzU72X8s5ahjKG24VP1QKWFBSQp.jpeg', '2020-02-21', '2020-02-21 22:18:53', '2020-02-21 22:18:53'),
(32, 1, 'super-admin', 4, 'new file format', 'task/chat/2020-02-21/3oy7e0anuuCcjgKykCtnHJXFlbvqwL9ac8LQktNd.xlsx', '2020-02-21', '2020-02-21 22:46:15', '2020-02-21 22:46:15'),
(33, 1, 'super-admin', 4, 'fdsfasdf', NULL, '2020-02-22', '2020-02-22 00:03:14', '2020-02-22 00:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tenant_type` varchar(255) DEFAULT NULL,
  `country_id` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_disabled` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `name`, `email`, `mobile`, `password`, `tenant_type`, `country_id`, `created_at`, `updated_at`, `is_disabled`) VALUES
(1, 'AMAN RAJ TOPPO', 'amanrajtoppoart@gmail.com', '1234567890', '$2y$10$ihK/pyzVH0uDIge1/QmeSuN8L4wVaUDUPbQUp0GFXV2rrWlshdd9.', 'bachelor', 1, '2020-01-22 19:48:38', '2020-02-06 10:57:54', 0),
(2, 'vadsv', 'asdvcv@fasf.fasdf', '4524353245', '$2y$10$hKbpavWDIP8m803gwMHxLe2r5x6Otsmx1qcnyeLqP4.Q2CflHrMb2', 'bachelor', 1, '2020-01-23 06:36:04', '2020-01-23 10:13:12', 0),
(4, 'Medge Evans', 'boxubecary@mailinator.com', '1534252345', '$2y$10$7QHH.75tMz.5OKN5N7B9bu4ulDFqjVpow5idJbvmjxdbAeQEIVmy2', 'company', 1, '2020-01-23 19:10:29', '2020-01-23 19:10:29', 0),
(5, 'Medge Evans', 'boxubecary@mailinator.com', '1534252345', '$2y$10$ls3bXFsF7EwMNg7OVKkrk.S5KKc6Tw44bKAqXJPk9ZBw5vM/XHudS', 'company', 1, '2020-01-23 19:18:09', '2020-01-23 19:18:09', 0),
(6, 'Medge Evans', 'boxubecary@mailinator.com', '1534252345', '$2y$10$EyQBUjlR77QO1.VhS9Y47ePBS8TgEb7mZL1au0IMqzZwPNR5oWWjq', 'company', 1, '2020-01-23 19:18:45', '2020-01-23 19:18:45', 0),
(7, 'Medge Evans', 'boxubecary@mailinator.com', '1534252345', '$2y$10$TjGTXXJZrMBL92UFIFjgGeyq5U2W55kRBjLet55qcpG/9Hzihh9VS', 'company', 1, '2020-01-23 19:19:11', '2020-01-23 19:19:11', 0),
(8, 'Medge Evans', 'boxubecary@mailinator.com', '1534252345', '$2y$10$tFAjtARDPoC8i5lnUWaBs.J0RgcPMWMswdNyjCc.UQJPtsX8eUONW', 'company', 1, '2020-01-23 19:19:53', '2020-01-23 19:19:53', 0),
(9, 'Medge Evans', 'boxubecary@mailinator.com', '1534252345', '$2y$10$JH6oUBZbULEA9ot6lV5zVufIZoyuiNO8VyCuhP4JjSUMf9wXdT2DC', 'company', 1, '2020-01-23 19:20:25', '2020-01-23 19:20:25', 0),
(10, 'Medge Evans', 'boxubecary@mailinator.com', '1534252345', '$2y$10$GVvzO4LIAj/LyqfTcUQZmu0ZyuhBz1rCWBGsW2bPzT1KnucF3jks2', 'company', 1, '2020-01-23 19:21:02', '2020-01-23 19:21:02', 0),
(11, 'Medge Evans', 'boxubecary@mailinator.com', '1534252345', '$2y$10$puSqTZpnwZztQdlOgTewf.8KqI.D7X/dfVL79P8lbgG1/QbFosgqq', 'company', 1, '2020-01-23 19:22:13', '2020-01-23 19:22:13', 0),
(12, 'Medge Evans', 'boxubecary@mailinator.com', '1534252345', '$2y$10$3yADYWnWYl6DCeT5X6FUIOWUM9mvjTs7jswgGglXJ3rCFzyykq7i2', 'company', 1, '2020-01-23 19:23:35', '2020-01-23 19:23:35', 0),
(13, 'Medge Evans', 'boxubecary@mailinator.com', '1534252345', '$2y$10$w.QH7y6ZThNCrQWGxPz1jO3PxVYnTFj4PKrq.947CHxS0OMyUDmRm', 'company', 1, '2020-01-23 19:23:59', '2020-01-23 19:23:59', 0),
(14, 'Medge Evans', 'boxubecary@mailinator.com', '1534252345', '$2y$10$EZhZ5JiXs..2s167/gBZoODocwX.4pEsR1n126fsnAxki30vozGPG', 'company', 1, '2020-01-23 19:24:18', '2020-01-23 19:24:18', 0),
(15, 'Medge Evans', 'boxubecary@mailinator.com', '1534252345', '$2y$10$Sr3uwCzoS5fD5Dx3w4SymedBVgVaUU1clYpx8vcMiv8AzFCun2KQ.', 'company', 1, '2020-01-23 19:27:50', '2020-01-23 19:27:50', 0),
(16, 'Medge Evans', 'boxubecary@mailinator.com', '1534252345', '$2y$10$8n9RsWK2/vMIEY0wjVqqKO/1p/wu2L8DJGH7VmWMzoqT7EyQOdGYG', 'company', 1, '2020-01-23 19:30:27', '2020-01-23 19:30:27', 0),
(17, 'Medge Evans', 'boxubecary@mailinator.com', '1534252345', '$2y$10$l9nLuLHRY7SfiKnqv6gujeywIwtCQv3t.kHm9gGANvLPuGoSP2BbO', 'company', 1, '2020-01-23 19:31:29', '2020-01-23 19:31:29', 0),
(18, 'Stacey Hardy', 'bakevocovy@mailinator.net', '8457675674', '$2y$10$n.oV9TJiJAbwn1vPY6Xo2.qI2eTklglS9G053eOheiWhQrpNHZOn2', 'company', 1, '2020-01-23 19:34:18', '2020-01-23 19:34:18', 0),
(19, 'fasdf', 'amanrajtoppoart@gmail.com', '5435345234', '$2y$10$LXytfG/J4y0.d3JxHJsCLedMlovokJVmDvk4bPp997qQNyIbyc8T.', 'bachelor', 1, '2020-01-24 15:46:29', '2020-01-24 15:46:29', 0),
(20, 'fadsf', 'asdfasdf@fdasdf.fadsfsad', '5234523452', '$2y$10$E2UWQd9xNAnVFe/kjBmlze66EaVegWrCUcpP3Qm6NUghjVd.Rpll.', 'family_brother_sister', 1, '2020-01-24 16:54:56', '2020-01-24 16:54:56', 0),
(21, 'gfbsdgs', 'amanrajtoppoar@fgmail.com', '5642534523', '$2y$10$27blOUSYcrXw.7WhpYHAuejrZQ9YEzJfsSFr0GZ0kgEDoKs2iSKbS', 'family_brother_sister', 2, '2020-01-24 18:10:09', '2020-01-24 18:10:09', 0),
(22, 'SANDHYA ROSE', 'sandhya@gmailfake.com', '1244567890', '$2y$10$rid4gXnL8dsaLU7rNrQJ2eJb3ndW/SIJP9o1qeGiT2Xqz.1PHqTzu', 'family_husband_wife', 2, '2020-01-26 07:39:14', '2020-01-26 07:39:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tenant_documents`
--

CREATE TABLE `tenant_documents` (
  `id` int(11) NOT NULL,
  `tenant_id` bigint(20) DEFAULT NULL,
  `doc_type` varchar(150) DEFAULT NULL,
  `doc_url` text DEFAULT NULL,
  `doc_ext` varchar(30) DEFAULT NULL,
  `unit_id` bigint(20) DEFAULT NULL,
  `property_id` bigint(20) DEFAULT NULL,
  `admin_id` bigint(20) DEFAULT NULL,
  `is_disabled` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenant_documents`
--

INSERT INTO `tenant_documents` (`id`, `tenant_id`, `doc_type`, `doc_url`, `doc_ext`, `unit_id`, `property_id`, `admin_id`, `is_disabled`, `created_at`, `updated_at`) VALUES
(1, 1, 'passport', 'tenant/AmanRajToppo/NkRi5k0t1nWSlEVRDowmTNrnKDmzGatewlydt3gd.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-22 14:18:38', '2020-01-22 14:18:38'),
(2, 1, 'visa', 'tenant/AmanRajToppo/Y36LLroa6I68qauon8BfzoA3g8Y1EYwPbPy0yTBX.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-22 14:18:38', '2020-01-22 14:18:38'),
(3, 1, 'emirates_id', 'tenant/AmanRajToppo/jtuv9mzfcSGFBtXxRSh3krwzWeVRUddI4tqkUohd.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-22 14:18:38', '2020-01-22 14:18:38'),
(4, 1, 'bank_passbook', 'tenant/AmanRajToppo/tl3kR3VqyNCOXDf2NWbPbbl80wqcPWDrwYmva01Z.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-22 14:18:38', '2020-01-22 14:18:38'),
(5, 1, 'last_sewa_id', 'tenant/AmanRajToppo/yMX7EaoTPa2ZcudGg8kIck9zJ5cjsrZ1Z0ESdGUU.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-22 14:18:38', '2020-01-22 14:18:38'),
(6, 1, 'no_sharing_agreement', 'tenant/AmanRajToppo/Uzz4i7aCheYOiCyENzEX6wE1fWSHPzVLVRTrGWgM.jpeg', 'jpeg', NULL, NULL, 1, 1, '2020-01-22 14:18:38', '2020-01-25 10:44:54'),
(7, 2, 'passport', 'tenant/Vadsv/kXOAfRZyVvfa6X9Enoix689B5qIFv6UDyBn6dUke.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-23 01:06:05', '2020-01-23 01:06:05'),
(8, 2, 'visa', 'tenant/Vadsv/IhK2ikStkmPFQx10CCLGSWLH4n2SUXYMdtIoixNi.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-23 01:06:05', '2020-01-23 01:06:05'),
(9, 2, 'emirates_id', 'tenant/Vadsv/bYD5Unqmn9rsGdt3vIidUfvXfJ5toKotHh9lg3ED.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-23 01:06:05', '2020-01-23 01:06:05'),
(10, 2, 'bank_passbook', 'tenant/Vadsv/swl4xPMmacHuC4m4QmtSxMtK28l1unp7AO54pDDH.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-23 01:06:05', '2020-01-23 01:06:05'),
(11, 2, 'last_sewa_id', 'tenant/Vadsv/BkJ8r8fpE0wDIPIAYSaeCVoIfF562XhuwOHPlydV.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-23 01:06:05', '2020-01-23 01:06:05'),
(12, 2, 'no_sharing_agreement', 'tenant/Vadsv/bmpavCzNpDj3EuGNeu77drDFFHu0vtS40Hqw9muD.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-23 01:06:05', '2020-01-23 01:06:05'),
(14, 4, 'trade_license', 'tenant/MedgeEvans/FVxEe8kNhAlQLHWj82VuBwvyKHZChpBeoYa9WHA4.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-23 13:40:29', '2020-01-23 13:40:29'),
(15, 5, 'trade_license', 'tenant/MedgeEvans/6VU9eg9kbQoDN9wZDPolSYw6TicR8WBNEor5Zul7.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-23 13:48:09', '2020-01-23 13:48:09'),
(16, 6, 'trade_license', 'tenant/MedgeEvans/L83KqrHfEoE35eT362WlU099Vjom7XpfaGDCSZ9H.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-23 13:48:45', '2020-01-23 13:48:45'),
(17, 7, 'trade_license', 'tenant/MedgeEvans/hhx3B84zUbHAvpZ9lzKi126xjqr3rWOXNxUP9qjP.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-23 13:49:11', '2020-01-23 13:49:11'),
(18, 8, 'trade_license', 'tenant/MedgeEvans/yHbO75WeQ3uY4q1jNO92y4EPSHebFgtoMKpsOhYc.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-23 13:49:53', '2020-01-23 13:49:53'),
(19, 9, 'trade_license', 'tenant/MedgeEvans/ClJ6qcSmxttbqGco23lTz8eVEmgQXFnDA0LTdbXB.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-23 13:50:25', '2020-01-23 13:50:25'),
(20, 10, 'trade_license', 'tenant/MedgeEvans/asZjI0wl3sQxhREVgFotMOphIAvxouF5To0G5thd.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-23 13:51:02', '2020-01-23 13:51:02'),
(21, 11, 'trade_license', 'tenant/MedgeEvans/o39oTT3WvF9JBsJErU4dHnwGMwOrmE3Er83L8lYT.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-23 13:52:13', '2020-01-23 13:52:13'),
(22, 12, 'trade_license', 'tenant/MedgeEvans/QVGxwpJrnYjAc30fDwSux2ZsnZoSHpl38lzDLIFu.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-23 13:53:35', '2020-01-23 13:53:35'),
(23, 13, 'trade_license', 'tenant/MedgeEvans/t8cBfYfGsRqa8G6SXrGkxIP6GtpSEE5otgvoiQoA.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-23 13:53:59', '2020-01-23 13:53:59'),
(24, 14, 'trade_license', 'tenant/MedgeEvans/mqTsY6NlJFXAd0l7PV47SUh9DZRc1gim5a1xsRbf.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-23 13:54:18', '2020-01-23 13:54:18'),
(25, 15, 'trade_license', 'tenant/MedgeEvans/bm6Sya1iZmVO9lFDablJCJH9xjoGeXfu5wLy5zre.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-23 13:57:50', '2020-01-23 13:57:50'),
(26, 16, 'trade_license', 'tenant/MedgeEvans/7oO4qWPgiEHu3J3vkSCjdtSut3fXeYLDCN1BQOwu.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-23 14:00:27', '2020-01-23 14:00:27'),
(27, 17, 'trade_license', 'tenant/MedgeEvans/aWWHH0IT6B1FBCU7pcDWZLCW4PNCkjhzQKakNqYk.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-23 14:01:29', '2020-01-23 14:01:29'),
(28, 18, 'trade_license', 'tenant/StaceyHardy/Qv5jG5uocZnM8SAhSGyvNJ8HJg0Ge7AJ1lQZhLvQ.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-23 14:04:18', '2020-01-23 14:04:18'),
(29, 19, 'passport', 'tenant/Fasdf/twWgQXCzuF7lGY5OsAmnVVeYjrbgfHVg0xTXjWiV.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-24 10:16:29', '2020-01-24 10:16:29'),
(30, 19, 'visa', 'tenant/Fasdf/1Mop6FCNaMhMzRbzivjprFdMxBdsKUr8Xmfc0Q1c.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-24 10:16:29', '2020-01-24 10:16:29'),
(31, 19, 'emirates_id', 'tenant/Fasdf/oInVRLmL2Ocr73JBjCQZbj6BGJ5oASJJ03jiTBPu.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-24 10:16:29', '2020-01-24 10:16:29'),
(32, 19, 'bank_passbook', 'tenant/Fasdf/Mfrz9vGGFD2QHqF2KELhcY2lN4lYJxTDHASNdGKS.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-24 10:16:29', '2020-01-24 10:16:29'),
(33, 19, 'last_sewa_id', 'tenant/Fasdf/dCClN2ZP8lavpxC5xeR3SPWWy9XhiOBnAezbgygr.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-24 10:16:29', '2020-01-24 10:16:29'),
(34, 19, 'no_sharing_agreement', 'tenant/Fasdf/RWmLEhD9hztltaWE8fhlHmi8bX2Xn5RlKSLivdVU.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-24 10:16:29', '2020-01-24 10:16:29'),
(35, 1, 'no_sharing_agreement', 'tenant/AmanRajToppo/tethD3TEdeXiN9dCR71vgpSfHCiMmkasHVc3HcaR.jpeg', 'jpeg', NULL, NULL, 1, 1, '2020-01-25 10:23:37', '2020-01-25 10:44:54'),
(36, 1, 'no_sharing_agreement', 'tenant/AmanRajToppo/9qY8Fu07N8ZYFVfKWUy6X1YwnBELXTwJI85wGge8.jpeg', 'jpeg', NULL, NULL, 1, 1, '2020-01-25 10:24:21', '2020-01-25 10:44:54'),
(37, 1, 'no_sharing_agreement', 'tenant/AmanRajToppo/rkbarCFC4P1xQkViiGPpYRsVFdWDGPHz7uNNzPyo.jpeg', 'jpeg', NULL, NULL, 1, 1, '2020-01-25 10:37:27', '2020-01-25 10:44:54'),
(38, 1, 'no_sharing_agreement', 'tenant/AmanRajToppo/5Y1TnsqtO7htl4949vU3CFsnlMkcTiUTLfegUeVC.jpeg', 'jpeg', NULL, NULL, 1, 1, '2020-01-25 10:38:39', '2020-01-25 10:44:54'),
(39, 1, 'no_sharing_agreement', 'tenant/AmanRajToppo/bfdh012KiRrIcko8jqRpszfn0W9mnblS2YcyxQey.jpeg', 'jpeg', NULL, NULL, 1, 1, '2020-01-25 10:39:19', '2020-01-25 10:44:54'),
(40, 1, 'no_sharing_agreement', 'tenant/AmanRajToppo/9DQ6gb7vSd9wFdX3Xt9JmtIpreA8Of7W4KpApqxD.jpeg', 'jpeg', NULL, NULL, 1, 1, '2020-01-25 10:39:32', '2020-01-25 10:44:54'),
(41, 1, 'no_sharing_agreement', 'tenant/AmanRajToppo/ENvYbYa5tULgGbP0RIBaxt788ctn5BFP6s8zNNkw.jpeg', 'jpeg', NULL, NULL, 1, 1, '2020-01-25 10:41:20', '2020-01-25 10:44:54'),
(42, 1, 'no_sharing_agreement', 'tenant/AmanRajToppo/31HGyJrN2JqcjLl20nz2YZSqINQ88DAZWAPjVhUm.jpeg', 'jpeg', NULL, NULL, 1, 1, '2020-01-25 10:42:38', '2020-01-25 10:44:54'),
(43, 1, 'no_sharing_agreement', 'tenant/AmanRajToppo/aGLzJc65Y6Vvf507mu5pW9XWjfHvLErkmK1KAqPn.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-25 10:44:54', '2020-01-25 10:44:54'),
(44, 22, 'passport', 'tenant/SandhyaRose/eIy3xDIbHqwoeeJxXNdN7QmPD1UCsUR8ppR5CT9X.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-26 02:09:14', '2020-01-26 02:09:14'),
(45, 22, 'visa', 'tenant/SandhyaRose/zPvirLyhWbGXx5Ox6Z26mbJVaWsBnuvWjbWeN88G.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-26 02:09:14', '2020-01-26 02:09:14'),
(46, 22, 'emirates_id', 'tenant/SandhyaRose/21p6BGlqhnzgeAcJYKySzEARphY0TmxU0g66Bqqt.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-26 02:09:14', '2020-01-26 02:09:14'),
(47, 22, 'bank_passbook', 'tenant/SandhyaRose/3XqeNDrYGfy6TPID8ZlZlf89DuQCmBRYKJjTIOIf.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-26 02:09:14', '2020-01-26 02:09:14'),
(48, 22, 'last_sewa_id', 'tenant/SandhyaRose/XGKxS3e0d7N4UJxIq22gqDITSlQyt9kans6QTK7x.jpeg', 'jpeg', NULL, NULL, 1, 0, '2020-01-26 02:09:14', '2020-01-26 02:09:14'),
(49, 22, 'marriage_certificate', 'tenant/SandhyaRose/DIOiduzfDvS0qOTP92i5UFSk8HpCwXu8DLHGJsK4.pdf', 'pdf', NULL, NULL, 1, 0, '2020-01-26 02:09:14', '2020-01-26 02:09:14');

-- --------------------------------------------------------

--
-- Table structure for table `tenant_history`
--

CREATE TABLE `tenant_history` (
  `id` int(11) NOT NULL,
  `property` bigint(20) DEFAULT NULL,
  `unit` bigint(20) DEFAULT NULL,
  `tenant` bigint(20) DEFAULT NULL,
  `deposite_amount` decimal(13,2) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '1=rented,2=leaved,3=changed, 4=evicted',
  `admin_id` bigint(20) DEFAULT NULL,
  `rented_at` date DEFAULT NULL,
  `leaved_at` date DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tenant_profile`
--

CREATE TABLE `tenant_profile` (
  `id` bigint(20) NOT NULL,
  `tenant_id` bigint(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `tenant_count` int(11) DEFAULT NULL,
  `profile_image` text DEFAULT NULL,
  `country_code` varchar(30) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `passport` int(11) DEFAULT NULL,
  `emirates_id` int(11) DEFAULT NULL,
  `visa` int(11) DEFAULT NULL,
  `marriage_certificate` int(11) DEFAULT NULL,
  `bank_passbook` int(11) DEFAULT NULL,
  `last_sewa_id` int(11) DEFAULT NULL,
  `no_sharing_agreement` int(11) DEFAULT NULL,
  `trade_license` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `admin_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenant_profile`
--

INSERT INTO `tenant_profile` (`id`, `tenant_id`, `name`, `company_name`, `tenant_count`, `profile_image`, `country_code`, `mobile`, `dob`, `passport`, `emirates_id`, `visa`, `marriage_certificate`, `bank_passbook`, `last_sewa_id`, `no_sharing_agreement`, `trade_license`, `address`, `city`, `state`, `country`, `remark`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'AMAN RAJ TOPPO', NULL, 1, 'tenant/AmanRajToppo/b8uPlb0PEq2CtwYIXh4VKMHI9zszDNk14G2m2Tx2.png', '971', '1234567890', '2020-01-22 00:00:00', 1, 3, 2, NULL, 4, 5, 43, NULL, 'fasdfasdf', '1234567890', NULL, '1', NULL, 1, '2020-01-22 14:18:38', '2020-01-25 10:44:54'),
(2, 2, 'vadsv', NULL, 1, 'tenant/Vadsv/rllgXH7yXs7MhD2sZuYwVQArrPIW9wRcC7ngsBQo.jpeg', '91', '4524353245', '2020-01-07 00:00:00', 7, 9, 8, NULL, 10, 11, 12, NULL, 'fasdfsadf', 'fasdf', NULL, '1', NULL, 1, '2020-01-23 01:06:05', '2020-01-23 01:06:05'),
(3, 13, 'Medge Evans', 'Anthony and Frazier Inc', 1, NULL, '93', '1534252345', '2020-01-09 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 23, 'Est dolores consequ', 'Enim et eos nesciun', NULL, '4', NULL, 1, '2020-01-23 13:53:59', '2020-01-23 13:53:59'),
(4, 14, 'Medge Evans', 'Anthony and Frazier Inc', 1, NULL, '93', '1534252345', '2020-01-09 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 'Est dolores consequ', 'Enim et eos nesciun', NULL, '4', NULL, 1, '2020-01-23 13:54:18', '2020-01-23 13:54:18'),
(5, 15, 'Medge Evans', 'Anthony and Frazier Inc', 1, NULL, '93', '1534252345', '2020-01-09 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25, 'Est dolores consequ', 'Enim et eos nesciun', NULL, '4', NULL, 1, '2020-01-23 13:57:50', '2020-01-23 13:57:50'),
(6, 16, 'Medge Evans', 'Anthony and Frazier Inc', 1, NULL, '93', '1534252345', '2020-01-09 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 'Est dolores consequ', 'Enim et eos nesciun', NULL, '4', NULL, 1, '2020-01-23 14:00:27', '2020-01-23 14:00:27'),
(7, 17, 'Medge Evans', 'Anthony and Frazier Inc', 1, NULL, '93', '1534252345', '2020-01-09 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 'Est dolores consequ', 'Enim et eos nesciun', NULL, '4', NULL, 1, '2020-01-23 14:01:29', '2020-01-23 14:01:29'),
(8, 18, 'Stacey Hardy', 'FSDFASDFASDF', 1, NULL, '93', '8457675674', '2020-01-15 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 'Ex irure mollitia qu', 'FASDFSADF', NULL, '2', NULL, 1, '2020-01-23 14:04:18', '2020-01-23 14:04:18'),
(9, 19, 'fasdf', NULL, 3, NULL, '971', '5435345234', '2020-01-16 00:00:00', 29, 31, 30, NULL, 32, 33, 34, NULL, 'fasdfasdf', 'fasdfa', NULL, '1', NULL, 1, '2020-01-24 10:16:29', '2020-01-24 10:16:29'),
(10, 20, 'fadsf', NULL, 1, 'tenant/Fadsf/rqfHsmhPpXTDTs8aDaIgvR7FU8NU8JH4YD8gpRx0.jpeg', '971', '5234523452', '2020-01-15 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asdfsadfsadf', 'fasdfasd', NULL, '1', NULL, 1, '2020-01-24 11:24:56', '2020-01-24 11:24:56'),
(11, 21, 'gfbsdgs', NULL, 1, 'tenant/Gfbsdgs/ZB1CCDPqc7ymLn7qm9B1CEu1CJ4SPfQJ2Yuj5901.jpeg', '971', '5642534523', '2020-01-16 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fdgsdfgsdfgdfg', 'fasdf', NULL, '2', NULL, 1, '2020-01-24 12:40:09', '2020-01-24 12:40:09'),
(12, 22, 'SANDHYA ROSE', NULL, 2, 'tenant/SandhyaRose/vMYOHk52KwTXriHDNu76I0G8nsxt6L6Tl7turEkr.jpeg', '971', '1244567890', '1994-01-01 00:00:00', 44, 46, 45, 49, 47, 48, NULL, NULL, 'NEAR KHUSI CLINIC , RAWATPURA COLONY ROAD RAIPUR', 'CHHATTISGARH,RAIPUR', NULL, '2', NULL, 1, '2020-01-26 02:09:14', '2020-01-26 02:09:14');

-- --------------------------------------------------------

--
-- Table structure for table `tenant_relations`
--

CREATE TABLE `tenant_relations` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `relationship` varchar(255) DEFAULT NULL,
  `tenant_id` bigint(20) DEFAULT NULL,
  `passport` text DEFAULT NULL,
  `visa` text DEFAULT NULL,
  `emirates_id` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenant_relations`
--

INSERT INTO `tenant_relations` (`id`, `name`, `relationship`, `tenant_id`, `passport`, `visa`, `emirates_id`, `created_at`, `updated_at`) VALUES
(1, 'Mona Barlow', 'Ad quae velit ipsam', 17, NULL, NULL, NULL, '2020-01-23 19:31:29', '2020-01-23 19:31:29'),
(2, 'Isabelle Stevens', 'Quia dolor aut iusto', 18, 'tenant/StaceyHardy/DMSwkwa3M5NXCUOENY6a0EhSJ9GIN6yCeyvyDAiz.jpeg', 'tenant/StaceyHardy/oIHFmLoL1QjcbbW7VfzEYCCL8bDK9PYIeIHh5Zvt.jpeg', 'tenant/StaceyHardy/Jl5Vn6OZ3tP5VXDzpBEoXSkffvwDmHZU27rttP5C.jpeg', '2020-01-23 19:34:18', '2020-01-23 19:34:18'),
(3, 'FSD', 'FSADF', 18, 'tenant/StaceyHardy/NAEMYeuZEAVdHJGL8Ia8HIHz65FBrRI7omxYXQWM.jpeg', 'tenant/StaceyHardy/lakLWtVY1IvxKhjTtUcyupT5wmvVMkiNV5PTVAfH.jpeg', 'tenant/StaceyHardy/90R23zvITSfRrUY4W1EBwQPhQN6bVyKKcfkKfNKy.jpeg', '2020-01-23 19:34:18', '2020-01-23 19:34:18'),
(4, 'FSAD', 'FASDF', 18, 'tenant/StaceyHardy/hPuq7skbmMx8w6UlNK2nWH2lQk9VkfuVy1nGHzyP.jpeg', 'tenant/StaceyHardy/UfQ04dEy1OdaLuM7kqyZjGmSqumvNNlI3UFoXQo9.jpeg', 'tenant/StaceyHardy/JVK2ey5H3pFQuirH5ldo4jRfaPa1I9S2UaKcNymz.jpeg', '2020-01-23 19:34:18', '2020-01-23 19:34:18'),
(5, 'fsdf', 'sdfsd', 20, 'tenant/Fadsf/8imCyAS2Mqd3yHAxmN3cbmbqzuIoOYkOgBXgNodz.jpeg', 'tenant/Fadsf/8jUY17nrFOkK5I1S4Fj9jQW9TiLVkwBWg8ern77J.jpeg', 'tenant/Fadsf/W1Nx7W77yEvvv1fuMkrkJeVjzqExGoX2WVdxwR0m.jpeg', '2020-01-24 16:54:56', '2020-01-24 16:54:56'),
(6, 'fgvasdf', 'asdfasdf', 21, NULL, NULL, 'tenant/Gfbsdgs/ABV6h8irOdGPforfrsNp1QuDbmkL47q70EmBjr0D.jpeg', '2020-01-24 18:10:09', '2020-01-24 18:10:09'),
(7, 'aman', 'husband', 22, 'tenant/SandhyaRose/lEsGDXB5Q9h63UhQHpy3q4DMFbS3XMSL65XlGlSq.pdf', 'tenant/SandhyaRose/xREv1B9O2nc9xGGO3Evv0oJVRJjsAVEvFQtOvD6t.pdf', 'tenant/SandhyaRose/kFLS03i3tswHe57vLNU6PzmIHuz5oL10kVW6YNIi.pdf', '2020-01-26 07:39:14', '2020-01-26 07:39:14');

-- --------------------------------------------------------

--
-- Table structure for table `tenant_remove`
--

CREATE TABLE `tenant_remove` (
  `id` int(11) NOT NULL,
  `tenant_id` bigint(20) DEFAULT NULL,
  `unit` bigint(20) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `requested_by` bigint(20) DEFAULT NULL,
  `requester_type` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '1=normal move out, 2= evict',
  `admin_id` bigint(20) DEFAULT NULL,
  `admin_type` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=pending,1=approved,2 = ignored',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `user_type` int(11) NOT NULL DEFAULT 1 COMMENT '1= tenant',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `user_type`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'amanrajtopp', 'amanrajtopp@gmail.com', NULL, 1, NULL, NULL, NULL, '2020-01-12 07:38:27', '2020-01-12 07:38:27'),
(2, 'dfasdf', 'fasdfasd@fasdfasdf.fasdfasd', NULL, 1, NULL, NULL, NULL, '2020-01-12 09:24:55', '2020-01-12 09:24:55'),
(3, 'dfasdf', 'fasdfasd@fasdfasdf.fasdfasd', NULL, 1, NULL, NULL, NULL, '2020-01-12 09:26:09', '2020-01-12 09:26:09'),
(4, 'dfasdf', 'fasdfasd@fasdfasdf.fasdfasd', NULL, 1, NULL, NULL, NULL, '2020-01-12 09:27:10', '2020-01-12 09:27:10'),
(5, 'dfasdf', 'fasdfasd@fasdfasdf.fasdfasd', NULL, 1, NULL, NULL, NULL, '2020-01-12 09:27:50', '2020-01-12 09:27:50'),
(6, 'fadf', 'amanrajtoppoart@gmail.com', NULL, 1, NULL, NULL, NULL, '2020-01-12 09:29:47', '2020-01-12 09:29:47'),
(7, 'fadf', 'amanrajtoppoart@gmail.com', NULL, 1, NULL, NULL, NULL, '2020-01-12 09:30:12', '2020-01-12 09:30:12'),
(8, 'fadf', 'amanrajtoppoart@gmail.com', NULL, 1, NULL, NULL, NULL, '2020-01-12 09:30:59', '2020-01-12 09:30:59'),
(9, 'fadf', 'amanrajtoppoart@gmail.com', NULL, 1, NULL, NULL, NULL, '2020-01-12 09:31:23', '2020-01-12 09:31:23'),
(10, 'fadf', 'amanrajtoppoart@gmail.com', NULL, 1, NULL, NULL, NULL, '2020-01-12 09:32:20', '2020-01-12 09:32:20'),
(11, 'fadf', 'amanrajtoppoart@gmail.com', NULL, 1, NULL, NULL, NULL, '2020-01-12 09:34:31', '2020-01-12 09:34:31'),
(12, 'fadf', 'amanrajtoppoart@gmail.com', NULL, 1, NULL, NULL, NULL, '2020-01-12 09:34:47', '2020-01-12 09:34:47'),
(13, 'fadf', 'amanrajtoppoart@gmail.com', NULL, 1, NULL, NULL, NULL, '2020-01-12 09:35:35', '2020-01-12 09:35:35'),
(14, 'Blaze Levine', 'sikereqo@mailinator.com', NULL, 1, NULL, NULL, NULL, '2020-01-15 07:44:20', '2020-01-15 07:44:20'),
(15, 'Blaze Levine', 'sikereqo@mailinator.com', NULL, 1, NULL, NULL, NULL, '2020-01-15 07:44:27', '2020-01-15 07:44:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_inv_data`
--
ALTER TABLE `bill_inv_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_request`
--
ALTER TABLE `booking_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `break_down_history`
--
ALTER TABLE `break_down_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_request`
--
ALTER TABLE `contact_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_alloted`
--
ALTER TABLE `property_alloted`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_features`
--
ALTER TABLE `property_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_sales`
--
ALTER TABLE `property_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_types`
--
ALTER TABLE `property_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_units`
--
ALTER TABLE `property_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_unit_allotment`
--
ALTER TABLE `property_unit_allotment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_unit_types`
--
ALTER TABLE `property_unit_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rents`
--
ALTER TABLE `rents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent_installments`
--
ALTER TABLE `rent_installments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_sheets`
--
ALTER TABLE `salary_sheets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_sheet_details`
--
ALTER TABLE `salary_sheet_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_contents`
--
ALTER TABLE `slider_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `task_code_2` (`task_code`),
  ADD KEY `task_title` (`task_title`,`status`,`priority`),
  ADD KEY `task_code` (`task_code`);

--
-- Indexes for table `task_assignments`
--
ALTER TABLE `task_assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_comments`
--
ALTER TABLE `task_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenant_documents`
--
ALTER TABLE `tenant_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenant_history`
--
ALTER TABLE `tenant_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenant_profile`
--
ALTER TABLE `tenant_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenant_relations`
--
ALTER TABLE `tenant_relations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenant_remove`
--
ALTER TABLE `tenant_remove`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bill_inv_data`
--
ALTER TABLE `bill_inv_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_request`
--
ALTER TABLE `booking_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `break_down_history`
--
ALTER TABLE `break_down_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `contact_request`
--
ALTER TABLE `contact_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `property_features`
--
ALTER TABLE `property_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `property_sales`
--
ALTER TABLE `property_sales`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `property_units`
--
ALTER TABLE `property_units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `property_unit_allotment`
--
ALTER TABLE `property_unit_allotment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `property_unit_types`
--
ALTER TABLE `property_unit_types`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `rents`
--
ALTER TABLE `rents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rent_installments`
--
ALTER TABLE `rent_installments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `salary_sheets`
--
ALTER TABLE `salary_sheets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `salary_sheet_details`
--
ALTER TABLE `salary_sheet_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider_contents`
--
ALTER TABLE `slider_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `task_assignments`
--
ALTER TABLE `task_assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `task_comments`
--
ALTER TABLE `task_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tenant_documents`
--
ALTER TABLE `tenant_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tenant_history`
--
ALTER TABLE `tenant_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tenant_profile`
--
ALTER TABLE `tenant_profile`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tenant_relations`
--
ALTER TABLE `tenant_relations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tenant_remove`
--
ALTER TABLE `tenant_remove`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
