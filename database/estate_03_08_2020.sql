-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 03, 2020 at 05:35 PM
-- Server version: 8.0.21
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `account_timelines`
--

CREATE TABLE `account_timelines` (
  `id` int NOT NULL,
  `bill_id` bigint DEFAULT NULL,
  `amount` decimal(13,2) DEFAULT NULL,
  `invoice_id` bigint DEFAULT NULL,
  `trans_type` enum('DEBIT','CREDIT') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_mode` int DEFAULT NULL,
  `payment_ref` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `account_id` bigint DEFAULT NULL,
  `trans_ref` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `admin_id` bigint DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `employee_id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin', 'admin@demo.com', '2019-09-23 07:00:00', '$2y$10$5r5/5anPuL7RPsJdjaLi0uUZ0hfxZSwqSBWJUS8hgSRCheWhec176', 'super-admin', '7DGA9wb5OupOPhjfHIJuz8rD5oLHMWKpJWwdruBts6tYhQ0xU4Pnt2YATweo', NULL, NULL),
(2, NULL, 'AMAN RAJ TOPPO', 'owner_one@gmail.com', NULL, '$2y$10$SG.coqXjnvC4fgvQ0bJOJub10v6rMI3wOx5.hAV5Dqr8Xno5mO9CW', 'owner', NULL, '2020-01-30 18:14:23', '2020-01-30 18:49:38'),
(3, NULL, 'RAJ KUMAR', 'rajkumar@gmail.com', NULL, '$2y$10$xI6ipIql1XfJCDy9l7JMlezsPI5djcV4dgzZtZGKz5pr3X8NqdHXS', 'agent', NULL, '2020-01-30 18:53:13', '2020-02-23 16:26:03'),
(4, NULL, 'Demo Owner', 'owner_two@gmail.com', NULL, '$2y$10$JCI5LI5TP93Ar.7OmcnF6.zzX7YbtHotjioQAwx5BFlogOx/qtLce', 'owner', NULL, '2020-02-06 09:19:08', '2020-04-19 10:17:49'),
(5, 1, 'Rinah Dillard', 'nyrosufun@mailinator.com', NULL, '$2y$10$Lj0R0OJulZmw3YYJIbm0XueRHxm2zNYsEdpNZkWUombXWXU2v27TW', 'manager', NULL, '2020-02-19 23:58:02', '2020-02-20 01:04:37'),
(6, NULL, 'Aman Raj Toppo', 'amanrajtoppoart@gmail.com', NULL, '$2y$10$dr9YnE8kBshXu/nnKnU6OeHXOLASU/o1pJGCRqYjBuCgha0LmCNLG', 'super-admin', '0fyRk5TA0xi3NM70aqiyvfPppzL45b33BEXkDVzFIdMpMGVoJkGcrmXPR6RA', '2020-02-24 10:30:32', '2020-02-24 15:15:53'),
(7, NULL, 'Joy', 'joy@demo.com', '2020-04-08 08:19:49', '$2y$10$t3onWCo9yxdmRdlP3JGnJObhGEfJyAWzpktBpfV/NjmExh9/ONupS', 'super-admin', NULL, NULL, NULL),
(8, NULL, '534534', '435534534545@fa.fadf', NULL, '$2y$10$MBlqbxswnp41R3utiW.3Rut6gRz59YhtpdUG2EBvLX4Dj/EyWL12O', 'owner', NULL, '2020-04-19 07:01:18', '2020-04-19 07:01:18'),
(9, NULL, '534534', 'demoadmin1@demo.com', NULL, '$2y$10$mEuL7PLFEJues3ErP6zOJO3wvyK8W8o8JZPWYTgAvrTILGL4UNMXy', 'owner', NULL, '2020-04-19 07:05:06', '2020-04-19 07:05:06'),
(10, NULL, '534534', 'demoadmin2@demo.com', NULL, '$2y$10$r9rNKE2Cux/bQH3uD82M4uzk1Vca.qkcA2mXEQOTL4kBkNRcG3W9S', 'owner', NULL, '2020-04-19 07:06:22', '2020-04-19 07:06:22'),
(11, NULL, 'Rashid', 'ra@gmailcom._', NULL, '$2y$10$ee0WxmysgKEEZL0uR5F2CO7CTsq.J9Gr9nF1qIBAYDP90ACP4je6W', 'owner', NULL, '2020-04-21 08:32:03', '2020-04-21 08:32:03');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` bigint NOT NULL,
  `agent_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'individual',
  `owner_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_country_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `emirates_id_doc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `passport` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `visa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `admin_id` bigint DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emirates_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `mobile` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banking_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_swift_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_disabled` int NOT NULL DEFAULT '0',
  `emirates_exp_date` datetime DEFAULT NULL,
  `passport_exp_date` datetime DEFAULT NULL,
  `visa_exp_date` datetime DEFAULT NULL,
  `trade_license` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `vat_number` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `agent_type`, `owner_name`, `owner_country_code`, `owner_mobile`, `owner_email`, `owner_photo`, `emirates_id_doc`, `passport`, `visa`, `admin_id`, `name`, `emirates_id`, `photo`, `mobile`, `email`, `country`, `state`, `city`, `address`, `banking_name`, `bank_name`, `bank_swift_code`, `bank_account`, `is_disabled`, `emirates_exp_date`, `passport_exp_date`, `visa_exp_date`, `trade_license`, `vat_number`, `created_at`) VALUES
(1, 'individual', NULL, NULL, NULL, NULL, NULL, 'agents/Fasdfasdf/i0nhqwukajTE94wC2RaNr6UthomOa7DRjA635NJQ.png', 'agents/Fasdfasdf/3MXxV7lYsdjLnhPKfwrI2Q6KktpGcx9zrZunmWkN.png', 'agents/Fasdfasdf/2XVGnSQP0Ypc3c8xcePm7SP65t6y2AM79npgq9wg.png', 1, 'fasdfasdf', NULL, 'agents/Fasdfasdf/Wobari0zMSulcpWuSVkEL6Wdn7wgf7XXRTgiteN9.png', '5435345435', 'fasdfsd@fasfd.fasdf', 'fasdfa', 'sdfsdaf', 'fasdfasd', 'fsdafasd', 'fasdfa', 'fasdfa', 'adsfasdf', 'adsfasdf', 0, '2020-07-20 00:00:00', '2020-07-22 00:00:00', '2020-07-25 00:00:00', NULL, NULL, '2020-07-20 04:01:16'),
(2, 'individual', NULL, NULL, NULL, NULL, NULL, 'agents/Fasdfas/bNouEJK9sSdMXtlMvru5SvNGDpP7LDzxMjA8SHOF.png', 'agents/Fasdfas/9GRQ8fwwwXYBULcFnNywTz7A5408bddO3jOfhXrw.png', 'agents/Fasdfas/82xtexghPqcdzhAPsMUErPAcxRs9VJT3i8WNFWCt.png', 1, 'Steve', NULL, 'agents/Fasdfas/7wtclSLDiwJ8dXMj6XvYM2Floqt6OKFyWd8iEC6y.png', '3534534538', 'admin@gmail1.com', '43543', '543543', '5435', '435435', '5345', '34543', '543', '5435435', 0, '2020-07-30 00:00:00', '2020-07-30 00:00:00', '2020-07-30 00:00:00', NULL, NULL, '2020-07-26 05:46:47');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int NOT NULL,
  `employee_id` bigint NOT NULL,
  `attendance` int DEFAULT NULL COMMENT '1=present,0=absent',
  `date` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `admin_id` bigint DEFAULT NULL,
  `is_disabled` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_statements`
--

CREATE TABLE `bank_statements` (
  `id` int NOT NULL,
  `account_id` bigint DEFAULT NULL,
  `trans_date` date DEFAULT NULL,
  `amount` decimal(13,2) DEFAULT NULL,
  `trans_type` enum('CREDIT','DEBIT') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `reconciled` int NOT NULL DEFAULT '0',
  `admin_id` bigint DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int NOT NULL,
  `ref` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property` bigint DEFAULT NULL,
  `unit` bigint DEFAULT NULL,
  `task_id` bigint DEFAULT NULL,
  `party_id` bigint DEFAULT NULL,
  `party_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `paid_date` date DEFAULT NULL,
  `payment_mode` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_ref` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` decimal(13,2) DEFAULT NULL,
  `status` int DEFAULT NULL COMMENT '0= payment pending, 1 =paid',
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` bigint DEFAULT NULL,
  `is_disabled` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bill_inv_data`
--

CREATE TABLE `bill_inv_data` (
  `id` int NOT NULL,
  `bill_id` bigint DEFAULT NULL,
  `invoice_id` bigint DEFAULT NULL,
  `unit_id` bigint DEFAULT NULL,
  `type` enum('BILL','INVOICE') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` bigint DEFAULT NULL,
  `des` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `unit_price` decimal(13,2) DEFAULT NULL,
  `amount` decimal(13,2) DEFAULT NULL,
  `is_disabled` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_request`
--

CREATE TABLE `booking_request` (
  `id` int NOT NULL,
  `property_id` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `break_down_history`
--

CREATE TABLE `break_down_history` (
  `id` int NOT NULL,
  `tenant_id` bigint DEFAULT NULL,
  `allotment_id` bigint DEFAULT NULL,
  `file_id` bigint DEFAULT NULL,
  `form_data` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `email_delivered` int NOT NULL DEFAULT '0' COMMENT 'Email received by tenant',
  `admin_id` int DEFAULT NULL,
  `admin_type` int DEFAULT NULL,
  `is_disabled` int DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `visa` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `emirates_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `buyer_image` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chart_of_accounts`
--

CREATE TABLE `chart_of_accounts` (
  `id` int NOT NULL,
  `code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coa_category_id` bigint DEFAULT NULL,
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_disabled` int NOT NULL DEFAULT '0',
  `admin_id` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chart_of_accounts`
--

INSERT INTO `chart_of_accounts` (`id`, `code`, `parent_id`, `name`, `coa_category_id`, `remark`, `is_disabled`, `admin_id`, `created_at`) VALUES
(1, '601', NULL, 'Maintenance Department Income', 1, 'sda', 0, 1, '2020-05-30 11:38:04'),
(2, NULL, 1, 'Maintenance Fees', 1, 'sdfds', 0, 1, '2020-05-30 11:38:30'),
(3, '601m1', 2, 'Maintenance Fees Moon 1', 1, 'sdf', 0, 1, '2020-05-30 11:41:33'),
(4, 'fasdfasdf', 2, 'fsdfasdf', 2, 'fasdfasdfsadf', 0, 1, '2020-07-15 18:56:56');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int NOT NULL,
  `state_id` bigint DEFAULT NULL,
  `country_id` bigint DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int DEFAULT NULL,
  `is_disabled` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `country_id`, `name`, `admin_id`, `is_disabled`, `created_at`) VALUES
(1, 3, 1, 'DownTown Dubai', 1, 0, '2019-10-15 06:21:20'),
(2, 1, 1, 'Abu Dhabi', 1, 0, '2020-01-20 01:10:17'),
(3, 6, 1, 'Sharjah', 1, 0, '2020-01-20 01:11:11'),
(4, 1, 1, 'Al Ain', 1, 0, '2020-01-20 01:11:31'),
(5, 2, 1, 'Ajman', 1, 0, '2020-01-20 01:11:46'),
(6, 5, 1, 'RAK City', 1, 0, '2020-01-20 01:11:59'),
(7, 4, 1, 'Fujairah', 1, 0, '2020-01-20 01:12:11'),
(8, 7, 1, 'Umm Al Quwain', 1, 0, '2020-01-20 01:12:24'),
(9, 6, 1, 'Khor Fakkan', 1, 0, '2020-01-20 01:12:37'),
(10, 6, 1, 'Kalba', 1, 0, '2020-01-20 01:12:53'),
(11, 3, 1, 'Jebel Ali', 1, 0, '2020-01-20 01:13:07'),
(12, 4, 1, 'Dibba Al-Fujairah', 1, 0, '2020-01-20 01:13:20'),
(13, 1, 1, 'Madinat Zayed', 1, 0, '2020-01-20 01:13:33'),
(14, 1, 1, 'Liwa Oasis', 1, 0, '2020-01-20 01:13:46'),
(15, 6, 1, 'Dhaid', 1, 0, '2020-01-20 01:14:11'),
(16, 3, 1, 'Al Quoz', 1, 0, '2020-01-20 01:14:52'),
(17, 1, 1, 'Ruwais', 1, 0, '2020-01-20 01:15:08'),
(18, 1, 1, 'Ghayathi', 1, 0, '2020-01-20 01:15:18'),
(19, 5, 1, 'Ar-Rams', 1, 0, '2020-01-20 01:15:32'),
(20, 6, 1, 'Dibba Al-Hisn', 1, 0, '2020-01-20 01:15:45'),
(21, 3, 1, 'Hatta', 1, 0, '2020-01-20 01:15:59'),
(22, 6, 1, 'Al Madam', 1, 0, '2020-01-20 01:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `coa_categories`
--

CREATE TABLE `coa_categories` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_disabled` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coa_categories`
--

INSERT INTO `coa_categories` (`id`, `title`, `is_disabled`, `created_at`) VALUES
(1, 'Direct Income', 0, '2020-05-30 11:36:54'),
(2, 'Direct Expenses', 0, '2020-05-30 11:36:54'),
(3, 'Income from Maintenance Inside', 0, '2020-05-30 11:36:54'),
(4, 'Other Incomes', 0, '2020-05-30 11:36:54'),
(5, 'sales /revenue', 0, '2020-05-30 11:36:54'),
(6, 'Short Term Liabilities', 0, '2020-05-30 11:36:54'),
(7, 'Current Assets', 0, '2020-05-30 11:36:54'),
(8, 'Long Term Liabilities', 0, '2020-05-30 11:36:54'),
(9, 'Owners\' Equity', 0, '2020-05-30 11:36:54'),
(10, 'General Administrative Expenses', 0, '2020-05-30 11:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `contact_request`
--

CREATE TABLE `contact_request` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `message` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `enquiry_for` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_disabled` int DEFAULT '1',
  `admin_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `is_disabled`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'United Arab Emirates', '971', 0, 1, '2019-10-08 05:48:45', '2020-01-12 13:32:12'),
(2, 'India', '91', 0, 1, '2019-10-08 05:48:45', '2020-01-19 13:42:41'),
(3, 'Bangladesh', '880', 0, 1, '2020-01-15 14:57:34', '2020-01-19 13:46:26'),
(4, 'Afganistaan', '93', 0, 1, '2020-01-15 14:58:36', '2020-01-19 13:46:04'),
(5, 'BHUTAN', '975', 0, 1, '2020-01-19 13:47:03', '2020-01-19 19:17:03'),
(6, 'BRAZIL', '55', 0, 1, '2020-01-19 13:47:53', '2020-01-19 19:17:53'),
(7, 'demo country', '123', 0, 1, '2020-07-22 11:38:09', '2020-07-22 17:08:09');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_disabled` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `admin_id` int DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `is_disabled`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'Rent Department', '0', 1, '2020-01-31 20:29:44', '2020-02-09 20:46:44'),
(2, 'Sale Department', '0', 1, '2020-01-31 20:29:50', NULL),
(3, 'Accounts Department', '0', 1, '2020-01-31 20:29:55', '2020-05-20 14:18:32'),
(4, 'Maintenance Department', '0', 1, '2020-01-31 20:30:06', NULL),
(5, 'Security Department', '0', 1, '2020-01-31 20:30:15', '2020-02-09 20:46:19'),
(6, 'PRO Department', '0', 1, '2020-05-20 14:17:54', NULL),
(7, 'HR Department', '0', 1, '2020-05-20 14:18:15', NULL),
(8, 'Secretory', '0', 1, '2020-05-20 22:45:01', '2020-05-20 22:45:01');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_disabled` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `admin_id` int DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `is_disabled`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'Manager', '0', 1, '2020-01-31 20:31:28', '2020-07-21 17:01:58'),
(2, 'Assistant', '0', 1, '2020-01-31 20:33:41', '2020-02-09 20:37:28'),
(3, 'Engineer', '0', 1, '2020-01-31 20:34:31', NULL),
(4, 'Security Guard', '0', 1, '2020-02-09 20:37:54', '2020-02-09 20:38:08'),
(5, 'Electrician', '0', 1, '2020-02-09 21:13:12', NULL),
(6, 'Accountant', '0', 1, '2020-05-20 16:48:57', NULL),
(7, 'General Manager', '0', 1, '2020-05-20 16:49:06', NULL),
(8, 'Rent Executive', '0', 1, '2020-05-20 16:49:18', '2020-07-21 17:02:06'),
(9, 'HR Manager', '0', 1, '2020-05-20 16:49:31', NULL),
(10, 'Sales Executive', '0', 1, '2020-05-20 16:49:44', NULL),
(11, 'Secretary', '0', 1, '2020-05-20 16:49:56', NULL),
(12, 'Maintenance Manager', '0', 1, '2020-05-20 16:50:21', NULL),
(13, 'Maintenance Supervisor', '0', 1, '2020-05-20 16:50:40', NULL),
(14, 'Operational Manager', '0', 1, '2020-05-20 16:50:54', NULL),
(15, 'Watchman', '0', 1, '2020-05-20 16:51:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint NOT NULL,
  `file_url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `disk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visibility` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extension` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referrer_id` bigint NOT NULL,
  `referrer_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` datetime DEFAULT NULL,
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int NOT NULL,
  `user_id` bigint DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `age` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `civil_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_permit_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iban_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fixed_salary` float DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `bank_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_ifsc_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` int DEFAULT NULL,
  `official_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation_id` int DEFAULT NULL,
  `emirates_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joining_date` datetime DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `is_admin` int DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int NOT NULL,
  `admin_id` bigint DEFAULT NULL,
  `admin_type` int DEFAULT NULL,
  `property_id` bigint DEFAULT NULL,
  `unit_id` bigint DEFAULT NULL,
  `tenant` bigint DEFAULT NULL,
  `file_loc` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `file_type` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_disabled` int NOT NULL DEFAULT '0',
  `ext` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `vendor` bigint DEFAULT NULL,
  `property_id` bigint DEFAULT NULL COMMENT 'property id',
  `unit` bigint DEFAULT NULL,
  `task_id` bigint DEFAULT NULL,
  `image_loc` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'internal file location',
  `image_url` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'external image link',
  `image_thumb` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ext` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `physical_loc` int DEFAULT NULL COMMENT '1= public 2= securely saved in storage ',
  `admin_id` int DEFAULT NULL COMMENT 'user who uploaded',
  `trash` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int NOT NULL,
  `ref` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inv_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property` bigint DEFAULT NULL,
  `unit` bigint DEFAULT NULL,
  `task_id` bigint DEFAULT NULL,
  `party_id` bigint DEFAULT NULL,
  `party_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'role',
  `amount` decimal(13,2) DEFAULT NULL,
  `tax_amt` decimal(13,2) DEFAULT NULL,
  `total_amount` decimal(13,2) DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `paid_date` date DEFAULT NULL,
  `status` int DEFAULT '0' COMMENT '0= payment pending, 1 =paid',
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` bigint DEFAULT NULL,
  `is_disabled` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_price` decimal(10,0) DEFAULT NULL,
  `admin_id` bigint DEFAULT NULL,
  `is_disabled` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_works`
--

CREATE TABLE `maintenance_works` (
  `id` bigint NOT NULL,
  `category` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_order_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_id` bigint NOT NULL,
  `applicant_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_id` bigint NOT NULL,
  `property_unit_id` bigint NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time_from` time DEFAULT NULL,
  `appointment_time_to` time DEFAULT NULL,
  `assignee_id` bigint DEFAULT NULL,
  `asst_assignee_id` bigint DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `due_date` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_work_categories`
--

CREATE TABLE `maintenance_work_categories` (
  `id` bigint NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maintenance_work_categories`
--

INSERT INTO `maintenance_work_categories` (`id`, `title`, `created_at`) VALUES
(1, 'Air Condition ', '2020-05-28 13:54:43'),
(2, 'Aluminium', '2020-05-28 13:54:43'),
(3, 'Bath tub', '2020-05-28 13:54:43'),
(4, 'Carpentry', '2020-05-28 13:54:43'),
(5, 'Civil work', '2020-05-28 13:54:43'),
(6, 'Electrical', '2020-05-28 13:54:43'),
(7, 'Inspection and Quota', '2020-05-28 13:54:43'),
(8, 'Painting', '2020-05-28 13:54:43'),
(9, 'Pest Control', '2020-05-28 13:54:43'),
(10, 'Plumbing', '2020-05-28 13:54:43'),
(11, 'Tile work', '2020-05-28 13:54:43'),
(12, 'Water Heater', '2020-05-28 13:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_work_progresses`
--

CREATE TABLE `maintenance_work_progresses` (
  `id` bigint NOT NULL,
  `maintenance_work_order_id` bigint DEFAULT NULL,
  `work_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `remark` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `status_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id` int NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `mobile` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emirates_id_doc` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `user_id` bigint DEFAULT NULL,
  `admin_id` bigint DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `poa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `visa` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `emirates_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banking_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_swift_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firm_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trade_license` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_expiry_date` date DEFAULT NULL,
  `telephone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_disabled` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `emirates_exp_date` datetime DEFAULT NULL,
  `passport_exp_date` datetime DEFAULT NULL,
  `visa_exp_date` datetime DEFAULT NULL,
  `poa_exp_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `owner_auth_people`
--

CREATE TABLE `owner_auth_people` (
  `id` bigint NOT NULL,
  `owner_id` bigint DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emirates_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `emirates_id_exp_date` date DEFAULT NULL,
  `passport` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `passport_exp_date` date DEFAULT NULL,
  `visa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `visa_exp_date` date DEFAULT NULL,
  `poa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `poa_exp_date` date DEFAULT NULL,
  `admin_id` bigint DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `owner_docs`
--

CREATE TABLE `owner_docs` (
  `id` int NOT NULL,
  `owner_id` int NOT NULL,
  `doc_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_url` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@demo.com', '$2y$10$uWyAmizrLXyAmcopRHCXJeXGgyMHjHdY0ChoyN58pR5UZn4qoet2G', '2020-02-24 10:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint NOT NULL,
  `admin_id` bigint NOT NULL,
  `owner_id` bigint DEFAULT NULL,
  `agent_id` bigint DEFAULT NULL,
  `propcode` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` int DEFAULT NULL,
  `country_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `prop_for` int NOT NULL DEFAULT '1' COMMENT '1=rent 2= sell',
  `building_age` float DEFAULT NULL,
  `total_floors` int DEFAULT NULL,
  `total_flats` int DEFAULT NULL,
  `total_shops` int DEFAULT NULL,
  `is_disabled` int NOT NULL DEFAULT '0' COMMENT '1=disabled 0= not disabled',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `property_rating` float DEFAULT NULL,
  `view_count` int DEFAULT NULL,
  `completion_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_features`
--

CREATE TABLE `property_features` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_disabled` int NOT NULL DEFAULT '2',
  `admin_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_features`
--

INSERT INTO `property_features` (`id`, `title`, `is_disabled`, `admin_id`, `created_at`, `updated_at`) VALUES
(7, 'Maids Room', 0, 1, '2019-10-28 08:58:49', '2019-10-28 08:58:49'),
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
  `id` bigint NOT NULL,
  `unit_id` bigint NOT NULL,
  `buyer_id` bigint NOT NULL,
  `owner_id` bigint NOT NULL,
  `agent_id` bigint NOT NULL,
  `selling_price` float NOT NULL,
  `booking_amount` float DEFAULT NULL,
  `property_id` bigint NOT NULL,
  `status` int NOT NULL,
  `mulkia_by_owner` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `mulkia_by_buyer` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sell_agreement` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title_deed` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

CREATE TABLE `property_types` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_disabled` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_types`
--

INSERT INTO `property_types` (`id`, `title`, `admin_id`, `created_at`, `updated_at`, `is_disabled`) VALUES
(1, 'Apartment', 1, '2019-10-10 10:29:44', '2020-04-22 20:32:34', 1),
(2, 'Villa', 1, '2019-10-10 10:29:44', '2020-04-22 20:32:34', 1),
(3, 'Townhouse', 1, '2019-10-10 10:29:44', '2020-04-22 20:32:35', 1),
(4, 'Penthouse', 1, '2019-10-10 10:29:44', '2020-04-22 20:32:36', 1),
(5, 'Compound', 1, '2019-10-10 10:29:44', '2020-04-22 20:32:36', 1),
(6, 'Duplex', 1, '2019-10-10 10:29:44', '2020-04-22 20:32:37', 1),
(7, 'Full Floor', 1, '2019-10-10 10:29:44', '2020-04-22 20:32:38', 1),
(8, 'Whole Building', 1, '2019-10-10 10:29:44', '2020-04-22 20:32:38', 1),
(9, 'Bulk Rent Unit', 1, '2019-10-10 10:29:44', '2020-04-22 20:32:39', 1),
(10, 'Bungalow', 1, '2019-10-10 10:29:44', '2020-04-22 20:32:39', 1),
(11, 'Residential', 1, '2020-04-22 20:32:59', '2020-04-22 20:32:59', 0),
(12, 'Commercial', 1, '2020-04-22 20:33:17', '2020-04-22 20:33:17', 0),
(13, 'Residential and Commercial', 1, '2020-04-22 20:33:31', '2020-04-22 20:33:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `property_units`
--

CREATE TABLE `property_units` (
  `id` int NOT NULL,
  `unitcode` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_id` bigint DEFAULT NULL,
  `property_unit_type_id` bigint DEFAULT NULL COMMENT 'from unit_types table',
  `allotment_id` bigint DEFAULT NULL,
  `allotment_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_id` int DEFAULT NULL,
  `agent_id` bigint DEFAULT NULL,
  `admin_id` bigint DEFAULT NULL,
  `purpose` int DEFAULT NULL,
  `flat_house_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor_no` int DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_desc` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `default_image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `unit_status` int DEFAULT NULL COMMENT '1 vacant, 2 rented, 3 needs rehab, 4 under rehab, 5 eviction, 6 needs cleaning,7=booked,8=sold units',
  `status` int NOT NULL DEFAULT '1' COMMENT '1=active 0=disabled',
  `unit_size` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rent_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bedroom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bathroom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `furnishing` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balcony` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parking` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kitchen` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hall` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `purchase_cost` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_unit_allotment`
--

CREATE TABLE `property_unit_allotment` (
  `id` bigint NOT NULL,
  `tenant_id` bigint NOT NULL,
  `admin_id` bigint NOT NULL,
  `property_id` bigint NOT NULL,
  `property_unit_type_id` bigint NOT NULL,
  `unit_id` bigint NOT NULL,
  `rent_amount` float DEFAULT NULL,
  `installments` int DEFAULT NULL,
  `lease_start` date DEFAULT NULL,
  `lease_end` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL DEFAULT '1' COMMENT '1= active, 2=moved out, 3 = evicted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_unit_types`
--

CREATE TABLE `property_unit_types` (
  `id` bigint NOT NULL,
  `property_id` bigint DEFAULT NULL,
  `unit_series` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor` int DEFAULT NULL,
  `unit_type_sequence` int NOT NULL,
  `unit_size` float DEFAULT NULL,
  `rent_type` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bedroom` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bathroom` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `furnishing` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balcony` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parking` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kitchen` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hall` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rental_amount` float DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_unit` int DEFAULT NULL,
  `floor_plan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rent_enquiries`
--

CREATE TABLE `rent_enquiries` (
  `id` bigint NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `preferred_location` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bedroom` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenancy_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenant_count` int NOT NULL,
  `agent_id` bigint NOT NULL,
  `source` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rent_installments`
--

CREATE TABLE `rent_installments` (
  `id` bigint NOT NULL,
  `property_unit_allotment_id` bigint DEFAULT NULL,
  `tenant_id` bigint DEFAULT NULL,
  `unit_id` bigint NOT NULL,
  `invoice_id` bigint DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `total_amount` float DEFAULT NULL,
  `paid_amount` float DEFAULT NULL,
  `expected_date` date DEFAULT NULL,
  `paid_date` datetime DEFAULT NULL,
  `sewa_deposit` float DEFAULT NULL,
  `municipality_fees` float DEFAULT NULL,
  `brokerage` int DEFAULT NULL,
  `contract` int DEFAULT NULL,
  `status` int DEFAULT '0',
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` bigint DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `security_deposit` float DEFAULT NULL,
  `remote_deposit` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_sheets`
--

CREATE TABLE `salary_sheets` (
  `id` int NOT NULL,
  `sheet_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_uid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corporate_bank_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_salary` float DEFAULT NULL,
  `commission` float DEFAULT NULL,
  `vat` float DEFAULT NULL,
  `total_payment` float DEFAULT NULL,
  `fund_transfer_date` date DEFAULT NULL,
  `month` int DEFAULT NULL,
  `year` int DEFAULT NULL,
  `admin_id` bigint DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_sheet_details`
--

CREATE TABLE `salary_sheet_details` (
  `id` int NOT NULL,
  `sheet_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` bigint DEFAULT NULL,
  `department_id` bigint DEFAULT NULL,
  `designation_id` bigint DEFAULT NULL,
  `account_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iban_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attendance_count` int DEFAULT NULL,
  `leave_count` int DEFAULT NULL,
  `fixed_salary` float DEFAULT NULL,
  `fixed_pay` float DEFAULT NULL,
  `variable_pay` float DEFAULT NULL,
  `total_salary_ind` float DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_enquiries`
--

CREATE TABLE `sales_enquiries` (
  `id` bigint NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` bigint DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `preferred_location` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bedroom` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_id` bigint NOT NULL,
  `source` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `passport` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `visa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `passport_exp_date` datetime DEFAULT NULL,
  `emirates_id_doc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `emirates_exp_date` datetime DEFAULT NULL,
  `visa_exp_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int NOT NULL,
  `admin_id` int DEFAULT NULL,
  `page` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ex. guest_index, user_home,admin_home',
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ex. first,second,third',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_disabled` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id` int NOT NULL,
  `slider_id` int NOT NULL,
  `image` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `short_description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_disabled` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id` int NOT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `country_id` bigint DEFAULT NULL,
  `admin_id` bigint DEFAULT NULL,
  `is_disabled` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `image`, `country_id`, `admin_id`, `is_disabled`, `created_at`) VALUES
(1, 'Abu Dhabi', '/images/states/STATE15796235268494.png', 1, 1, 0, '2019-10-18 01:30:14'),
(2, 'Ajman', '/images/states/STATE15796235172333.png', 1, 1, 0, '2019-10-18 01:31:57'),
(3, 'Dubai', '/images/states/STATE15796235087778.png', 1, 1, 0, '2019-10-18 01:32:04'),
(4, 'Fujairah', '/images/states/STATE15796235005420.png', 1, 1, 0, '2019-10-18 01:32:12'),
(5, 'Ras Al Khaimah', '/images/states/STATE15796234847239.png', 1, 1, 0, '2019-10-18 01:32:22'),
(6, 'Sharjah', '/images/states/STATE15796234737987.png', 1, 1, 0, '2019-10-18 01:32:31'),
(7, 'Umm Al Quwain', '/images/states/STATE15796234568652.png', 1, 1, 0, '2019-10-18 01:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` bigint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `value`, `admin_id`) VALUES
(1, 'property_code_length', '3', 1),
(2, 'email', 'noreply@alhoorestate.com', 1),
(3, 'task_code_length', '3', 1),
(4, 'admin_url', 'administrator', 1),
(5, 'manager_url', 'manager', 1),
(6, 'contractor_url', 'contractor', 1),
(7, 'tenant_url', 'tenants', 1),
(8, 'supervisor_url', 'supervisor', 1),
(9, 'assistant_url', 'assistant', 1),
(10, 'invoice_prefix', 'alhoor', 1),
(11, 'receivable_account', '58', 1),
(12, 'payable_account', '15', 1),
(13, '_token', 'GcGlfXSsZiczkVcLM6WsNRGVtQDXVwoSxlWlVEOY', 1),
(14, 'facebook_social_account', 'https://www.facebook.com', 1),
(15, 'twitter_social_account', 'https://twitter.com/home', 1),
(16, 'linkedin_social_account', 'https://www.linkedin.com', 1),
(17, 'google_social_account', 'https://aboutme.google.com', 1),
(18, 'vimeo_social_account', 'https://vimeo.com', 1),
(19, 'youtube_social_account', 'https://www.youtube.com', 1),
(20, 'official_email_id', 'office@gmail.com', 1),
(21, 'official_contact_number', '08839421623', 1),
(22, 'office_address', 'Al Manzil District, Downtown, Yansoon 7 - Sheikh Mohammed bin Rashid Blvd - Dubai - United Arab Emirates', 1),
(23, 'company_name', 'Al Hoor Real State PVT. LTD', 1),
(24, 'company_uid', 'SDHADF5435', 1),
(25, 'carporate_bank_name', 'CENTRAL BANK OF UAE', 1),
(26, 'vat_on_salary', '5', 1),
(27, 'municipality_fee', '4', 1),
(28, 'office_commission', '1575', 1),
(29, 'tenancy_contract', '175', 1),
(30, 'map_api_key', 'AIzaSyA5MhqNbzZ8J5uz70BfzZbQuIctOgLlxsw', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int NOT NULL,
  `task_code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assignor_id` bigint DEFAULT NULL COMMENT 'who created the task',
  `assignor_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'who created task can be any kind of management account',
  `assignee_id` bigint DEFAULT NULL,
  `assignee_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_id` bigint DEFAULT NULL,
  `property_unit_id` bigint DEFAULT NULL,
  `ticket_id` bigint DEFAULT NULL,
  `task_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT '0' COMMENT '0=pending,1=working,2=completed 3=on hold 4 = in review',
  `priority` int NOT NULL DEFAULT '4' COMMENT '1=emergency,2=high,3=normal,4=low',
  `deadline` date DEFAULT NULL,
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_disabled` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_assignments`
--

CREATE TABLE `task_assignments` (
  `id` int NOT NULL,
  `task_id` bigint DEFAULT NULL,
  `assignee_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'who got the task',
  `assignee_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assignor_id` bigint DEFAULT NULL COMMENT 'who assigning the task to user',
  `assignor_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ASSIGNED' COMMENT 'CHANGED,ASSIGNED,COMPLETED',
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expected_time` timestamp NULL DEFAULT NULL,
  `task_completed` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_comments`
--

CREATE TABLE `task_comments` (
  `id` int NOT NULL,
  `user_id` bigint DEFAULT NULL,
  `user_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_id` bigint DEFAULT NULL,
  `msg` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `media` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `date` date DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_lists`
--

CREATE TABLE `task_lists` (
  `id` bigint NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint NOT NULL,
  `admin_id` bigint DEFAULT NULL,
  `status` int DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_lists`
--

INSERT INTO `task_lists` (`id`, `title`, `department_id`, `admin_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Owner\'s Clearance', 1, 1, 1, '2020-05-20 22:45:23', '2020-05-20 22:46:06', NULL),
(2, 'Viewing Appointment', 1, 1, 1, '2020-05-20 22:45:23', '2020-05-20 22:46:06', NULL),
(3, 'Viewing Appointment', 2, 1, 1, '2020-05-20 22:45:23', '2020-05-20 22:46:06', NULL),
(4, 'Cheques For Signature', 3, 1, 1, '2020-05-20 22:45:23', '2020-05-20 22:46:06', NULL),
(5, 'Collect Bounce Checque', 3, 1, 1, '2020-05-20 22:45:23', '2020-05-20 22:46:06', NULL),
(6, 'Payment Transfer', 3, 1, 1, '2020-05-20 22:45:23', '2020-05-20 22:46:06', NULL),
(7, 'Deposit Cash', 3, 1, 1, '2020-05-20 22:45:23', '2020-05-20 22:46:06', NULL),
(8, 'Deposit cheque', 3, 1, 1, '2020-05-20 22:45:23', '2020-05-20 22:46:06', NULL),
(9, 'Salary Transfer', 3, 1, 1, '2020-05-20 22:45:23', '2020-05-20 22:46:06', NULL),
(10, 'Stop Cheque', 3, 1, 1, '2020-05-20 22:45:23', '2020-05-20 22:46:06', NULL),
(11, 'Open Police Case', 6, 1, 1, '2020-05-20 22:45:23', '2020-05-20 22:46:06', NULL),
(12, 'Open Court Case', 6, 1, 1, '2020-05-20 22:45:23', '2020-05-20 22:46:06', NULL),
(13, 'Tenancy Contract Registration', 6, 1, 1, '2020-05-20 22:45:23', '2020-05-20 22:46:06', NULL),
(14, 'Tenancy Contract Renewal', 6, 1, 1, '2020-05-20 22:45:23', '2020-05-20 22:46:06', NULL),
(15, 'Trade License Renewal', 6, 1, 1, '2020-05-20 22:45:23', '2020-05-20 22:46:06', NULL),
(16, 'Real State Registration Appointment ', 6, 1, 1, '2020-05-20 22:45:23', '2020-05-20 22:46:06', NULL),
(17, 'Prepare Quotation', 4, 1, 1, '2020-05-20 22:45:23', '2020-05-20 22:46:06', NULL),
(18, 'Send Warning Letter', 8, 1, 1, '2020-05-20 22:45:23', '2020-05-20 22:46:06', NULL),
(19, 'Send Notice', 8, 1, 1, '2020-05-20 22:45:23', '2020-05-20 22:46:06', NULL),
(20, 'Send And Prepare Break Downs ', 8, 1, 1, '2020-05-20 22:45:23', '2020-05-20 22:46:06', NULL),
(21, 'Others', 8, 1, 1, '2020-05-20 22:45:23', '2020-05-20 22:46:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` bigint NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tenant_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_disabled` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tenant_documents`
--

CREATE TABLE `tenant_documents` (
  `id` int NOT NULL,
  `tenant_id` bigint DEFAULT NULL,
  `doc_type` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_url` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `doc_ext` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_id` bigint DEFAULT NULL,
  `property_id` bigint DEFAULT NULL,
  `admin_id` bigint DEFAULT NULL,
  `is_disabled` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tenant_history`
--

CREATE TABLE `tenant_history` (
  `id` int NOT NULL,
  `property` bigint DEFAULT NULL,
  `unit` bigint DEFAULT NULL,
  `tenant` bigint DEFAULT NULL,
  `deposite_amount` decimal(13,2) DEFAULT NULL,
  `status` int DEFAULT NULL COMMENT '1=rented,2=leaved,3=changed, 4=evicted',
  `admin_id` bigint DEFAULT NULL,
  `rented_at` date DEFAULT NULL,
  `leaved_at` date DEFAULT NULL,
  `remark` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tenant_profile`
--

CREATE TABLE `tenant_profile` (
  `id` bigint NOT NULL,
  `tenant_id` bigint DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tenant_count` int DEFAULT NULL,
  `profile_image` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `country_code` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `passport` int DEFAULT NULL,
  `emirates_id` int DEFAULT NULL,
  `visa` int DEFAULT NULL,
  `marriage_certificate` int DEFAULT NULL,
  `bank_passbook` int DEFAULT NULL,
  `last_sewa_id` int DEFAULT NULL,
  `no_sharing_agreement` int DEFAULT NULL,
  `trade_license` int DEFAULT NULL,
  `emirates_id_exp_date` date DEFAULT NULL,
  `passport_exp_date` date DEFAULT NULL,
  `visa_exp_date` date DEFAULT NULL,
  `bank_passbook_exp_date` date DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` bigint DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tenant_relations`
--

CREATE TABLE `tenant_relations` (
  `id` bigint NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tenant_id` bigint DEFAULT NULL,
  `passport` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `visa` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `emirates_id` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tenant_remove`
--

CREATE TABLE `tenant_remove` (
  `id` int NOT NULL,
  `tenant_id` bigint DEFAULT NULL,
  `unit` bigint DEFAULT NULL,
  `remark` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `requested_by` bigint DEFAULT NULL,
  `requester_type` int DEFAULT NULL,
  `type` int DEFAULT NULL COMMENT '1=normal move out, 2= evict',
  `admin_id` bigint DEFAULT NULL,
  `admin_type` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0' COMMENT '0=pending,1=approved,2 = ignored',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unit_prices`
--

CREATE TABLE `unit_prices` (
  `id` bigint NOT NULL,
  `property_unit_id` bigint NOT NULL,
  `unit_price` float NOT NULL,
  `status` int NOT NULL COMMENT '1=active,0=inactive',
  `effective_from` date DEFAULT NULL,
  `effective_upto` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` int NOT NULL DEFAULT '1' COMMENT '1= tenant',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_timelines`
--
ALTER TABLE `account_timelines`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_statements`
--
ALTER TABLE `bank_statements`
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
-- Indexes for table `chart_of_accounts`
--
ALTER TABLE `chart_of_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coa_categories`
--
ALTER TABLE `coa_categories`
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
-- Indexes for table `documents`
--
ALTER TABLE `documents`
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
-- Indexes for table `maintenance_works`
--
ALTER TABLE `maintenance_works`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance_work_categories`
--
ALTER TABLE `maintenance_work_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance_work_progresses`
--
ALTER TABLE `maintenance_work_progresses`
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
-- Indexes for table `owner_auth_people`
--
ALTER TABLE `owner_auth_people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner_docs`
--
ALTER TABLE `owner_docs`
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
-- Indexes for table `rent_enquiries`
--
ALTER TABLE `rent_enquiries`
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
-- Indexes for table `sales_enquiries`
--
ALTER TABLE `sales_enquiries`
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
-- Indexes for table `task_lists`
--
ALTER TABLE `task_lists`
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
-- Indexes for table `unit_prices`
--
ALTER TABLE `unit_prices`
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
-- AUTO_INCREMENT for table `account_timelines`
--
ALTER TABLE `account_timelines`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_statements`
--
ALTER TABLE `bank_statements`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bill_inv_data`
--
ALTER TABLE `bill_inv_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_request`
--
ALTER TABLE `booking_request`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `break_down_history`
--
ALTER TABLE `break_down_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chart_of_accounts`
--
ALTER TABLE `chart_of_accounts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `coa_categories`
--
ALTER TABLE `coa_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_request`
--
ALTER TABLE `contact_request`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maintenance_works`
--
ALTER TABLE `maintenance_works`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maintenance_work_categories`
--
ALTER TABLE `maintenance_work_categories`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `maintenance_work_progresses`
--
ALTER TABLE `maintenance_work_progresses`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `owner_auth_people`
--
ALTER TABLE `owner_auth_people`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `owner_docs`
--
ALTER TABLE `owner_docs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_features`
--
ALTER TABLE `property_features`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `property_sales`
--
ALTER TABLE `property_sales`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `property_units`
--
ALTER TABLE `property_units`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_unit_allotment`
--
ALTER TABLE `property_unit_allotment`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_unit_types`
--
ALTER TABLE `property_unit_types`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rent_enquiries`
--
ALTER TABLE `rent_enquiries`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rent_installments`
--
ALTER TABLE `rent_installments`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_sheets`
--
ALTER TABLE `salary_sheets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_sheet_details`
--
ALTER TABLE `salary_sheet_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_enquiries`
--
ALTER TABLE `sales_enquiries`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider_contents`
--
ALTER TABLE `slider_contents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_assignments`
--
ALTER TABLE `task_assignments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_comments`
--
ALTER TABLE `task_comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_lists`
--
ALTER TABLE `task_lists`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tenant_documents`
--
ALTER TABLE `tenant_documents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tenant_history`
--
ALTER TABLE `tenant_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tenant_profile`
--
ALTER TABLE `tenant_profile`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tenant_relations`
--
ALTER TABLE `tenant_relations`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tenant_remove`
--
ALTER TABLE `tenant_remove`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit_prices`
--
ALTER TABLE `unit_prices`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
