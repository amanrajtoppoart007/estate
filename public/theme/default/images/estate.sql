-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2020 at 08:00 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

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

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@demo.com', '2019-09-23 07:00:00', '$2y$10$5r5/5anPuL7RPsJdjaLi0uUZ0hfxZSwqSBWJUS8hgSRCheWhec176', '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking_request`
--

CREATE TABLE `booking_request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `property_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `message` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_request`
--

INSERT INTO `booking_request` (`id`, `user_id`, `property_id`, `created_at`, `updated_at`, `message`, `status`) VALUES
(1, 8, 3, '2019-11-13 11:10:01', '2019-11-13 11:10:01', 'I want a booking request for this property ,thank you', 1),
(2, 8, 3, '2019-11-13 11:48:53', '2019-11-13 11:48:53', 'gfdfgdfg', 1),
(3, 8, 2, '2019-11-14 02:13:39', '2019-11-14 02:13:39', 'hi this is new message', 1);

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
(1, 3, 1, 'DownTown Dubai', 1, 0, '2019-10-15 06:21:20', '2019-10-31 08:28:26');

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
(1, 'United Arab Emirates', 'UAE', 0, 1, '2019-10-08 05:48:45', '2020-01-12 13:32:12'),
(2, 'India', 'IN', 0, 1, '2019-10-08 05:48:45', '2020-01-12 13:32:14'),
(3, 'Bangladesh', NULL, 0, 1, '2020-01-15 14:57:34', '2020-01-15 20:27:34'),
(4, 'Pakistan', NULL, 0, 1, '2020-01-15 14:57:44', '2020-01-15 20:27:44'),
(5, 'Russia', NULL, 0, 1, '2020-01-15 14:57:47', '2020-01-15 20:27:47'),
(6, 'Britain', NULL, 0, 1, '2020-01-15 14:57:53', '2020-01-15 20:27:53'),
(7, 'United States of America', NULL, 0, 1, '2020-01-15 14:58:04', '2020-01-15 20:28:04'),
(8, 'Afganistaan', NULL, 0, 1, '2020-01-15 14:58:36', '2020-01-15 20:28:36'),
(9, 'China', NULL, 0, 1, '2020-01-15 14:58:40', '2020-01-15 20:28:40'),
(10, 'South Africa', NULL, 0, 1, '2020-01-15 14:58:58', '2020-01-15 20:28:58'),
(11, 'Saudi Arabia', NULL, 0, 1, '2020-01-15 14:59:10', '2020-01-15 20:29:10'),
(12, 'Shrilanka', NULL, 0, 1, '2020-01-15 14:59:22', '2020-01-15 20:29:22'),
(13, 'Maxico', NULL, 0, 1, '2020-01-15 14:59:47', '2020-01-15 20:29:47'),
(14, 'Canada', NULL, 0, 1, '2020-01-15 14:59:57', '2020-01-15 20:29:57');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `is_disabled` varchar(45) DEFAULT '1',
  `admin_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `is_disabled`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'gdfsgd', '0', 1, '2020-01-17 17:48:17', NULL),
(2, 'fsdfsd', '0', 1, '2020-01-17 17:48:20', NULL),
(3, 'fsdfsd', '0', 1, '2020-01-17 17:48:24', NULL),
(4, 'fsdfsdf', '0', 1, '2020-01-17 17:48:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `is_disabled` varchar(45) DEFAULT '1',
  `admin_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `user_id` int(11) DEFAULT NULL COMMENT 'user who uploaded',
  `trash` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `vendor`, `property_id`, `unit`, `task_id`, `image_loc`, `image_url`, `image_thumb`, `ext`, `physical_loc`, `user_id`, `trash`, `created_at`, `updated_at`) VALUES
(177, NULL, 1, NULL, NULL, 'PROP15725208258522.jpg', '/images/property/PROP15725208258522.jpg', NULL, 'jpg', NULL, 1, 0, '2019-10-31 05:50:25', '2020-01-16 18:34:41'),
(178, NULL, 1, NULL, NULL, 'PROP15725208259282.jpg', '/images/property/PROP15725208259282.jpg', NULL, 'jpg', NULL, 1, 0, '2019-10-31 05:50:25', '2020-01-16 18:34:41'),
(179, NULL, 1, NULL, NULL, 'PROP15725208256531.jpg', '/images/property/PROP15725208256531.jpg', NULL, 'jpg', NULL, 1, 0, '2019-10-31 05:50:25', '2020-01-16 18:34:41'),
(180, NULL, 2, NULL, NULL, 'PROP15725213369706.jpg', '/images/property/PROP15725213369706.jpg', NULL, 'jpg', NULL, 1, 0, '2019-10-31 05:58:56', '2020-01-16 18:34:41'),
(181, NULL, 2, NULL, NULL, 'PROP15725213365993.jpg', '/images/property/PROP15725213365993.jpg', NULL, 'jpg', NULL, 1, 0, '2019-10-31 05:58:56', '2020-01-16 18:34:41'),
(182, NULL, 2, NULL, NULL, 'PROP15725213369596.jpg', '/images/property/PROP15725213369596.jpg', NULL, 'jpg', NULL, 1, 0, '2019-10-31 05:58:56', '2020-01-16 18:34:41'),
(183, NULL, 2, NULL, NULL, 'PROP15725213368082.jpg', '/images/property/PROP15725213368082.jpg', NULL, 'jpg', NULL, 1, 0, '2019-10-31 05:58:56', '2020-01-16 18:34:41'),
(184, NULL, 3, NULL, NULL, 'PROP15725299694955.jpg', '/images/property/PROP15725299694955.jpg', NULL, 'jpg', NULL, 1, 0, '2019-10-31 08:22:49', '2020-01-16 18:34:41'),
(185, NULL, 3, NULL, NULL, 'PROP15725299699538.jpg', '/images/property/PROP15725299699538.jpg', NULL, 'jpg', NULL, 1, 0, '2019-10-31 08:22:49', '2020-01-16 18:34:41'),
(186, NULL, 3, NULL, NULL, 'PROP15725299697932.jpg', '/images/property/PROP15725299697932.jpg', NULL, 'jpg', NULL, 1, 0, '2019-10-31 08:22:49', '2020-01-16 18:34:41'),
(187, NULL, 4, NULL, NULL, 'PROP15725304261900.jpg', '/images/property/PROP15725304261900.jpg', NULL, 'jpg', NULL, 1, 0, '2019-10-31 08:30:26', '2020-01-16 18:34:41'),
(188, NULL, 4, NULL, NULL, 'PROP15725304265790.jpg', '/images/property/PROP15725304265790.jpg', NULL, 'jpg', NULL, 1, 0, '2019-10-31 08:30:26', '2020-01-16 18:34:41'),
(189, NULL, 4, NULL, NULL, 'PROP15725304264580.jpg', '/images/property/PROP15725304264580.jpg', NULL, 'jpg', NULL, 1, 0, '2019-10-31 08:30:26', '2020-01-16 18:34:41'),
(190, NULL, 4, NULL, NULL, 'PROP15725304267475.jpg', '/images/property/PROP15725304267475.jpg', NULL, 'jpg', NULL, 1, 0, '2019-10-31 08:30:26', '2020-01-16 18:34:41'),
(191, NULL, 5, NULL, NULL, 'PROP15740060405438.jpg', '/images/property/PROP15740060405438.jpg', NULL, 'jpg', NULL, 1, 0, '2019-11-17 10:24:00', '2020-01-16 18:34:41'),
(192, NULL, 23, NULL, NULL, NULL, '/images/property/PROP15792111921630.jpg', NULL, 'jpg', NULL, 1, 0, '2020-01-16 16:16:32', '2020-01-16 21:46:32'),
(193, NULL, 23, NULL, NULL, NULL, '/images/property/PROP15792111925211.jpg', NULL, 'jpg', NULL, 1, 0, '2020-01-16 16:16:32', '2020-01-16 21:46:32'),
(194, NULL, 23, NULL, NULL, NULL, '/images/property/PROP15792111923960.jpg', NULL, 'jpg', NULL, 1, 0, '2020-01-16 16:16:32', '2020-01-16 21:46:32'),
(195, NULL, 23, NULL, NULL, NULL, '/images/property/PROP15792111921985.jpg', NULL, 'jpg', NULL, 1, 0, '2020-01-16 16:16:32', '2020-01-16 21:46:32'),
(196, NULL, 24, NULL, NULL, NULL, '/images/property/PROP15792112628102.jpg', NULL, 'jpg', NULL, 1, 0, '2020-01-16 16:17:42', '2020-01-16 21:47:42'),
(197, NULL, 24, NULL, NULL, NULL, '/images/property/PROP15792112629376.jpg', NULL, 'jpg', NULL, 1, 0, '2020-01-16 16:17:42', '2020-01-16 21:47:42'),
(198, NULL, 24, NULL, NULL, NULL, '/images/property/PROP15792112629715.jpg', NULL, 'jpg', NULL, 1, 0, '2020-01-16 16:17:42', '2020-01-16 21:47:42'),
(199, NULL, 24, NULL, NULL, NULL, '/images/property/PROP15792112623217.jpg', NULL, 'jpg', NULL, 1, 0, '2020-01-16 16:17:42', '2020-01-16 21:47:42');

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
  `propcode` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `area` float NOT NULL,
  `address` varchar(255) NOT NULL,
  `city_id` varchar(100) NOT NULL,
  `state_id` varchar(150) NOT NULL,
  `zip` int(11) NOT NULL,
  `country_id` varchar(100) NOT NULL,
  `feature` varchar(255) NOT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `prop_for` int(11) NOT NULL DEFAULT 1 COMMENT '1=rent 2= sell',
  `admin_id` bigint(20) NOT NULL,
  `is_disabled` int(11) NOT NULL DEFAULT 1 COMMENT '2=disabled 1= not disabled',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `property_rating` float DEFAULT NULL,
  `view_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `propcode`, `title`, `description`, `type`, `status`, `area`, `address`, `city_id`, `state_id`, `zip`, `country_id`, `feature`, `latitude`, `longitude`, `prop_for`, `admin_id`, `is_disabled`, `created_at`, `updated_at`, `property_rating`, `view_count`) VALUES
(1, '13001', 'Extremely Rare |Lake & Park View |Type 1M', 'Espace Real Estate is proud to present this extremely rare type 1M property to the market. This villa, the largest layout available in The Springs community, is one of only eight 1M villas with a lake view in the entire development. The villa sits on an amply sized plot and has a large living and dining space. The downstairs is comprised of a separate study, maids and laundry space. Upstairs you will be greeted by the huge family room overlooking the lake. The large master bedroom plus en-suite is accompanied by the two other large bedrooms that share a family bathroom. The villa is vacant and ready to move into. Viewing by appointment only.', 3, 1, 3000, 'RAIPUR', '1', '3', 492001, '1', '7, 17, 25, 26', NULL, NULL, 1, 1, 1, '2019-10-31 05:50:25', '2019-11-11 14:01:38', NULL, NULL),
(2, '1313002', 'Immaculately Maintained 4 BR + Maid skyline view', 'Immaculately Maintained 4 BR + Maid skyline view\r\n\r\n4 Br Garden Homes for Rent in Palm Jumeirah if you entering this villa there is one Bedroom, Separate Lounge, Dinning Area and White Kitchen , outside there is pool and Garden', 2, 1, 5000, 'RAIPUR', '1', '3', 492001, '1', '7, 8, 15, 16, 17, 18, 19, 20, 21, 23, 24, 25, 26, 28', NULL, NULL, 1, 1, 1, '2019-10-31 05:58:56', '2019-11-11 14:01:41', NULL, NULL),
(3, '131313003', 'Vacant | Luxury Single Row Villa w/ Huge Garden', 'West Yas benefits from its exceptional position with a waterfront location overlooking the natural mangroves that surround Yas Island. West Yas residents enjoy close proximity to Yas Mall and the multiple leisure facilities on Yas Island including Yas Waterworld, Yas Marina Circuit, Yas Marina, Yas Links, Ferrari World Abu Dhabi, du Arena and the F and B of the numerous hotels on the island, also comprising villas 4 bedrooms and 5 bedrooms and community amenities.\r\n\r\nLocated in one of Yas Island most exclusive and beautiful enclaves – straddling a picturesque\r\nmangrove waterfront – the development embraces its stunning natural environment while serving up the finest experiences of the capital. Set within premium recreational facilities and sheltered private gardens, West Yas offers an array of contemporary architectural styles to enhance the character and synergy of the overall neighbourhood.These four and five bedroom villas are designed and built to the highest of standards, with bespoke touches, and premium materials.', 2, 1, 7000, 'Shiekh Khalifa Bin Jayed Highway', '1', '3', 331133, '1', '7, 8, 16, 20, 21, 24, 25, 26, 28', 25.20463158433031, 55.27088882209014, 2, 1, 1, '2019-10-31 08:22:49', '2020-01-17 04:08:08', NULL, NULL),
(4, '13131313004', 'Vacant, Unique 3 BR+M with Best View, High Floor', 'Vacant Ready to move in\r\n- Unfurnished Apartment\r\n- 3 Bedrooms + Maid\'s + Study+ Family room\r\n- Great view of Full Fountain and Burj Khalifa\r\n- Free Chiller charge\r\n- 4.5 Bathrooms\r\n- Kitchen with Full appliances\r\n- BUA 2,599 sq.ft.\r\n- The Residences 9\r\n\r\nArea Information: - Close proximity to The Dubai Mall, - Largest shopping and entertainment, - Souk Al Bahar - retail and leisure choices, - Armani Hotel Dubai, The Address Downtown Dubai, The Palace, Manzil Downtown Dubai, - World-class hospitality, - Dubai International Convention Centre and Dubai International Financial Centre, - Business nerve-centres\r\n\r\nRERA ORN: 2169', 1, 1, 2599, 'DownTown Burj Khalifa', '1', '3', 1122333, '1', '7, 15, 16, 17, 18, 20, 21, 24, 26, 28', 25.204680121179656, 55.27053477050018, 2, 1, 1, '2019-10-31 08:30:26', '2020-01-17 04:06:23', NULL, NULL),
(5, '1313131313005', 'Conrad Hotel Commercial Office to Lease', 'Located on Sheikh Zayed Road within close vicinity to Dubai World Trade Centre, The Conrad Hotel is a strategically located 5 star mixed use development offering occupiers with quality commercial office space with the amenity of a 5 star hotel. Owned and managed by an institutional landlord, the building offers fitted office space suitable for blue organisations. The Conrad Hotel is often regarded as one of the most prestigious office addresses in Dubai.', 11, 1, 4500, 'Sheikh Zayed Rd - Dubai - United Arab Emirates', '1', '3', 112233, '1', '7, 8, 15, 16, 17, 18, 19, 20, 21, 23, 24, 25, 26, 28', 25.204723804327532, NULL, 2, 1, 1, '2019-11-17 10:24:00', '2019-11-17 10:24:00', NULL, NULL),
(6, 'DUD001', 'fasdfasdfasdf', 'fdasdfasdfasdfasdf', 1, 1, 534534, 'dfasdfasdf', '1', '3', 12345, '1', '7, 8, 15, 16, 17, 18, 19, 20, 21, 23, 24, 25, 26, 28', 25.204650999072374, 55.27004660845947, 1, 1, 1, '2020-01-16 15:56:38', '2020-01-16 15:56:38', NULL, NULL),
(7, 'DUD001', 'fasdfasdfasdf', 'fdasdfasdfasdfasdf', 1, 1, 534534, 'dfasdfasdf', '1', '3', 12345, '1', '7, 8, 15, 16, 17, 18, 19, 20, 21, 23, 24, 25, 26, 28', 25.204650999072374, 55.27004660845947, 1, 1, 1, '2020-01-16 15:57:24', '2020-01-16 15:57:24', NULL, NULL),
(8, 'DUD001', 'fasdfasdfasdf', 'fdasdfasdfasdfasdf', 1, 1, 534534, 'dfasdfasdf', '1', '3', 12345, '1', '7, 8, 15, 16, 17, 18, 19, 20, 21, 23, 24, 25, 26, 28', 25.204650999072374, 55.27004660845947, 1, 1, 1, '2020-01-16 15:58:29', '2020-01-16 15:58:29', NULL, NULL),
(9, 'DUD001', 'fasdfasdfasdf', 'fdasdfasdfasdfasdf', 1, 1, 534534, 'dfasdfasdf', '1', '3', 12345, '1', '7, 8, 15, 16, 17, 18, 19, 20, 21, 23, 24, 25, 26, 28', 25.204650999072374, 55.27004660845947, 1, 1, 1, '2020-01-16 15:59:33', '2020-01-16 15:59:33', NULL, NULL),
(10, 'DUD001', 'fasdfasdfasdf', 'fdasdfasdfasdfasdf', 1, 1, 534534, 'dfasdfasdf', '1', '3', 12345, '1', '7, 8, 15, 16, 17, 18, 19, 20, 21, 23, 24, 25, 26, 28', 25.204650999072374, 55.27004660845947, 1, 1, 1, '2020-01-16 16:00:03', '2020-01-16 16:00:03', NULL, NULL),
(11, 'DUD001', 'fasdfasdfasdf', 'fdasdfasdfasdfasdf', 1, 1, 534534, 'dfasdfasdf', '1', '3', 12345, '1', '7, 8, 15, 16, 17, 18, 19, 20, 21, 23, 24, 25, 26, 28', 25.204650999072374, 55.27004660845947, 1, 1, 1, '2020-01-16 16:00:35', '2020-01-16 16:00:35', NULL, NULL),
(12, 'DUD001', 'fasdfasdfasdf', 'fdasdfasdfasdfasdf', 1, 1, 534534, 'dfasdfasdf', '1', '3', 12345, '1', '7, 8, 15, 16, 17, 18, 19, 20, 21, 23, 24, 25, 26, 28', 25.204650999072374, 55.27004660845947, 1, 1, 1, '2020-01-16 16:01:14', '2020-01-16 16:01:14', NULL, NULL),
(13, 'DUD001', 'fasdfasdfasdf', 'fdasdfasdfasdfasdf', 1, 1, 534534, 'dfasdfasdf', '1', '3', 12345, '1', '7, 8, 15, 16, 17, 18, 19, 20, 21, 23, 24, 25, 26, 28', 25.204650999072374, 55.27004660845947, 1, 1, 1, '2020-01-16 16:05:47', '2020-01-16 16:05:47', NULL, NULL),
(14, 'DUD001', 'fasdfasdfasdf', 'fdasdfasdfasdfasdf', 1, 1, 534534, 'dfasdfasdf', '1', '3', 12345, '1', '7, 8, 15, 16, 17, 18, 19, 20, 21, 23, 24, 25, 26, 28', 25.204650999072374, 55.27004660845947, 1, 1, 1, '2020-01-16 16:06:17', '2020-01-16 16:06:17', NULL, NULL),
(15, 'DUD001', 'fasdfasdfasdf', 'fdasdfasdfasdfasdf', 1, 1, 534534, 'dfasdfasdf', '1', '3', 12345, '1', '7, 8, 15, 16, 17, 18, 19, 20, 21, 23, 24, 25, 26, 28', 25.204650999072374, 55.27004660845947, 1, 1, 1, '2020-01-16 16:09:02', '2020-01-16 16:09:02', NULL, NULL),
(16, 'DUD001', 'fasdfasdfasdf', 'fdasdfasdfasdfasdf', 1, 1, 534534, 'dfasdfasdf', '1', '3', 12345, '1', '7, 8, 15, 16, 17, 18, 19, 20, 21, 23, 24, 25, 26, 28', 25.204650999072374, 55.27004660845947, 1, 1, 1, '2020-01-16 16:12:00', '2020-01-16 16:12:00', NULL, NULL),
(17, 'DUD001', 'fasdfasdfasdf', 'fdasdfasdfasdfasdf', 1, 1, 534534, 'dfasdfasdf', '1', '3', 12345, '1', '7, 8, 15, 16, 17, 18, 19, 20, 21, 23, 24, 25, 26, 28', 25.204650999072374, 55.27004660845947, 1, 1, 1, '2020-01-16 16:13:22', '2020-01-16 16:13:22', NULL, NULL),
(18, 'DUD001', 'fasdfasdfasdf', 'fdasdfasdfasdfasdf', 1, 1, 534534, 'dfasdfasdf', '1', '3', 12345, '1', '7, 8, 15, 16, 17, 18, 19, 20, 21, 23, 24, 25, 26, 28', 25.204650999072374, 55.27004660845947, 1, 1, 1, '2020-01-16 16:13:50', '2020-01-16 16:13:50', NULL, NULL),
(19, 'DUD001', 'fasdfasdfasdf', 'fdasdfasdfasdfasdf', 1, 1, 534534, 'dfasdfasdf', '1', '3', 12345, '1', '7, 8, 15, 16, 17, 18, 19, 20, 21, 23, 24, 25, 26, 28', 25.204650999072374, 55.27004660845947, 1, 1, 1, '2020-01-16 16:14:20', '2020-01-16 16:14:20', NULL, NULL),
(20, 'DUD001', 'fasdfasdfasdf', 'fdasdfasdfasdfasdf', 1, 1, 534534, 'dfasdfasdf', '1', '3', 12345, '1', '7, 8, 15, 16, 17, 18, 19, 20, 21, 23, 24, 25, 26, 28', 25.204650999072374, 55.27004660845947, 1, 1, 1, '2020-01-16 16:14:47', '2020-01-16 16:14:47', NULL, NULL),
(21, 'DUD001', 'fasdfasdfasdf', 'fdasdfasdfasdfasdf', 1, 1, 534534, 'dfasdfasdf', '1', '3', 12345, '1', '7, 8, 15, 16, 17, 18, 19, 20, 21, 23, 24, 25, 26, 28', 25.204650999072374, 55.27004660845947, 1, 1, 1, '2020-01-16 16:15:47', '2020-01-16 16:15:47', NULL, NULL),
(22, 'DUD001', 'fasdfasdfasdf', 'fdasdfasdfasdfasdf', 1, 1, 534534, 'dfasdfasdf', '1', '3', 12345, '1', '7, 8, 15, 16, 17, 18, 19, 20, 21, 23, 24, 25, 26, 28', 25.204650999072374, 55.27004660845947, 1, 1, 1, '2020-01-16 16:16:11', '2020-01-16 16:16:11', NULL, NULL),
(23, 'DUD001', 'fasdfasdfasdf', 'fdasdfasdfasdfasdf', 1, 1, 534534, 'dfasdfasdf', '1', '3', 12345, '1', '7, 8, 15, 16, 17, 18, 19, 20, 21, 23, 24, 25, 26, 28', 25.204650999072374, 55.27004660845947, 1, 1, 1, '2020-01-16 16:16:32', '2020-01-16 16:16:32', NULL, NULL),
(24, 'DUD001', 'fasdfasdfasdf', 'fdasdfasdfasdfasdf', 1, 1, 534534, 'dfasdfasdf', '1', '3', 12345, '1', '7, 8, 15, 16, 17, 18, 19, 20, 21, 23, 24, 25, 26, 28', 25.204650999072, 55.270046608459, 2, 1, 1, '2020-01-16 16:17:42', '2020-01-17 00:32:57', NULL, NULL);

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
(28, 'Pets Allowed', 0, 1, '2019-10-28 09:14:44', '2019-10-28 09:14:44');

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
(1, 'Apartment', 1, '2019-10-10 10:29:44', '2019-10-10 10:29:44', 0),
(2, 'Villa', 1, '2019-10-10 10:29:44', '2019-10-10 10:29:44', 0),
(3, 'Townhouse', 1, '2019-10-10 10:29:44', '2019-10-10 10:29:44', 0),
(4, 'Penthouse', 1, '2019-10-10 10:29:44', '2019-10-10 10:29:44', 0),
(5, 'Compound', 1, '2019-10-10 10:29:44', '2019-10-10 10:29:44', 0),
(6, 'Duplex', 1, '2019-10-10 10:29:44', '2019-10-10 10:29:44', 0),
(7, 'Full Floor', 1, '2019-10-10 10:29:44', '2019-10-10 10:29:44', 0),
(8, 'Whole Building', 1, '2019-10-10 10:29:44', '2019-10-10 10:29:44', 0),
(9, 'Bulk Rent Unit', 1, '2019-10-10 10:29:44', '2019-10-10 10:29:44', 0),
(10, 'Bungalow', 1, '2019-10-10 10:29:44', '2019-10-10 10:29:44', 0),
(11, 'Hotel & Hotel Apartment', 1, '2019-10-10 10:29:44', '2019-10-10 10:29:44', 0);

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
  `unit_status` int(11) DEFAULT NULL COMMENT '1 vacant, 2 rented, 3 needs rehab, 4 under rehab, 5 eviction, 6 needs cleaning',
  `admin_id` bigint(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=active 0=disabled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_units`
--

INSERT INTO `property_units` (`id`, `unitcode`, `property_id`, `property_unit_type_id`, `title`, `unit_desc`, `default_image`, `unit_status`, `admin_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'DUD001U11', 23, 3, NULL, NULL, NULL, 1, 1, 1, '2020-01-16 16:16:32', '2020-01-16 16:16:32'),
(2, 'DUD001U12', 23, 3, NULL, NULL, NULL, 1, 1, 1, '2020-01-16 16:16:32', '2020-01-16 16:16:32'),
(3, 'DUD001U13', 23, 3, NULL, NULL, NULL, 1, 1, 1, '2020-01-16 16:16:32', '2020-01-16 16:16:32'),
(4, 'DUD001U14', 23, 3, NULL, NULL, NULL, 1, 1, 1, '2020-01-16 16:16:32', '2020-01-16 16:16:32'),
(5, 'DUD001U15', 23, 3, NULL, NULL, NULL, 1, 1, 1, '2020-01-16 16:16:32', '2020-01-16 16:16:32'),
(24, 'DUD001U11', 24, 9, NULL, NULL, NULL, 1, 1, 1, '2020-01-17 00:32:57', '2020-01-17 00:32:57'),
(25, '13131313004U11', 4, 10, NULL, NULL, NULL, 1, 1, 1, '2020-01-17 04:06:23', '2020-01-17 04:06:23'),
(26, '131313003U11', 3, 11, NULL, NULL, NULL, 1, 1, 1, '2020-01-17 04:08:08', '2020-01-17 04:08:08');

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
  `security_deposit` float NOT NULL,
  `rent_amount` float NOT NULL,
  `installments` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_unit_allotment`
--

INSERT INTO `property_unit_allotment` (`id`, `tenant_id`, `admin_id`, `property_id`, `property_unit_type_id`, `unit_id`, `security_deposit`, `rent_amount`, `installments`, `created_at`, `updated_at`, `status`) VALUES
(1, 3, 1, 4, 10, 25, 3000, 500000, 2, '2020-01-17 19:03:14', '2020-01-17 19:03:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `property_unit_types`
--

CREATE TABLE `property_unit_types` (
  `id` bigint(20) NOT NULL,
  `property_id` bigint(20) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `bedrooms` int(11) DEFAULT NULL,
  `bathrooms` int(11) DEFAULT NULL,
  `kitchens` int(11) DEFAULT NULL,
  `halls` int(11) DEFAULT NULL,
  `total_unit` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_unit_types`
--

INSERT INTO `property_unit_types` (`id`, `property_id`, `title`, `bedrooms`, `bathrooms`, `kitchens`, `halls`, `total_unit`, `created_at`, `updated_at`) VALUES
(1, 21, 'fadfdsf', 5, 5, 5, 5, 5, '2020-01-16 16:15:48', '2020-01-17 04:39:30'),
(2, 22, 'fadfdsf', 5, 5, 5, 5, 5, '2020-01-16 16:16:11', '2020-01-17 04:39:37'),
(3, 23, 'fadfdsf', 5, 5, 5, 5, 5, '2020-01-16 16:16:32', '2020-01-17 04:39:43'),
(9, 24, 'dfasda', 1, 1, 1, 1, 1, '2020-01-17 00:32:57', '2020-01-17 00:32:57'),
(10, 4, '1BHK', 1, 1, 1, 1, 1, '2020-01-17 04:06:23', '2020-01-17 04:06:23'),
(11, 3, 'Villa Suite', 10, 15, 5, 5, 1, '2020-01-17 04:08:08', '2020-01-17 04:08:08');

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

INSERT INTO `rent_installments` (`id`, `property_unit_allotment_id`, `tenant_id`, `unit_id`, `amount`, `expected_date`, `paid_date`, `status`, `remark`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 25, 250000, '2019-12-12 00:00:00', NULL, 0, NULL, 1, '2020-01-17 19:07:42', '2020-01-17 19:07:42'),
(2, 1, 3, 25, 250000, '2019-12-12 00:00:00', NULL, 0, NULL, 1, '2020-01-17 19:07:42', '2020-01-17 19:07:42');

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
  `code` varchar(50) DEFAULT NULL,
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

INSERT INTO `states` (`id`, `code`, `name`, `image`, `country_id`, `admin_id`, `is_disabled`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Abu Dhabi', 'PROP15715543966597.jpg', 1, 1, 0, '2019-10-18 01:30:14', '2019-10-19 19:53:16'),
(2, NULL, 'Ajman', 'PROP15715542217835.jpg', 1, 1, 0, '2019-10-18 01:31:57', '2019-10-19 19:50:21'),
(3, NULL, 'Dubai', 'PROP15715542045376.jpg', 1, 1, 0, '2019-10-18 01:32:04', '2019-10-19 19:50:04'),
(4, NULL, 'Fujairah', 'PROP15715557621410.jpg', 1, 1, 0, '2019-10-18 01:32:12', '2019-10-19 20:16:02'),
(5, NULL, 'Ras Al Khaimah', 'PROP15715541892450.jpg', 1, 1, 0, '2019-10-18 01:32:22', '2019-10-19 19:49:49'),
(6, NULL, 'Sharjah', 'PROP15715557804405.jpg', 1, 1, 0, '2019-10-18 01:32:31', '2019-10-19 20:16:20'),
(7, NULL, 'Umm Al Quwain', 'PROP15715541601668.jpg', 1, 1, 0, '2019-10-18 01:32:45', '2019-10-19 19:49:20');

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
(22, 'office_address', 'Al Manzil District, Downtown, Yansoon 7 - Sheikh Mohammed bin Rashid Blvd - Dubai - United Arab Emirates', 1, '2019-11-16 09:38:36', '2019-11-16 04:08:36');

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
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `name`, `email`, `mobile`, `password`, `tenant_type`, `created_at`, `updated_at`, `status`) VALUES
(1, 'test name', 'test@test.com', '1234567890', NULL, 'family_husband_wife', '2020-01-15 16:50:02', '2020-01-15 16:50:02', 1),
(2, 'AMAN RAJ TOPPO', 'admin@gmail.com', '1234567890', NULL, 'family_husband_wife', '2020-01-16 04:10:45', '2020-01-16 04:10:45', 1),
(3, 'aman raj toppo', 'fasdfsad@fasdf.fasdf', '5435234523', '$2y$10$21JKbG9jimsR0H9HCqwI9OSCmgNltvuQ.9GsrO2FzCdrGcsKf1JvG', 'family_husband_wife', '2020-01-16 15:15:53', '2020-01-16 15:15:53', 1);

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
  `tenant_count` int(11) DEFAULT NULL,
  `profile_image` text DEFAULT NULL,
  `country_code` varchar(30) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `emirates_id` text DEFAULT NULL,
  `visa` text DEFAULT NULL,
  `marriage_certificate` text DEFAULT NULL,
  `bank_passbook` text DEFAULT NULL,
  `last_sewa_id` text DEFAULT NULL,
  `no_sharing_agreement` text DEFAULT NULL,
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

INSERT INTO `tenant_profile` (`id`, `tenant_id`, `name`, `tenant_count`, `profile_image`, `country_code`, `mobile`, `emirates_id`, `visa`, `marriage_certificate`, `bank_passbook`, `last_sewa_id`, `no_sharing_agreement`, `address`, `city`, `state`, `country`, `remark`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'test name', 1, 'user/TestName/qtPdL6B2nnPVDRk2uSwHrjm5ou5bMp9m3Q80JY9U.jpeg', '+01', '1234567890', 'user/TestName//8KOtmN6vJHZfeokLDuMVnxT0VwytEDDgzorNg3d1.jpeg', 'user/TestName//V8ujMln5k4HWeJwUfe0XeoAKrwLbG3aYe54CmVTN.jpeg', 'user/TestName//vs69GRIVLrmdzoPzq8UpZdNPqh12C4LjhhoLYeoG.jpeg', 'user/TestName//2FUBrj7FLS1s8LYPJc4hyU7o0YWACGw7tjpjq4tI.jpeg', 'user/TestName//QGN8507a5wudTcQS1w6LnfdDJZnzFk80gJpjkjvC.jpeg', NULL, 'test', 'test', NULL, 'IN', NULL, 1, '2020-01-15 11:20:03', '2020-01-15 11:20:03'),
(2, 2, 'AMAN RAJ TOPPO', 2, 'tenant/AMANRAJTOPPO/EMytLGV4F42nKVH1gFbD1y8GrwcqZvQWX7kvXjlC.jpeg', '+01', '1234567890', 'tenant/AMANRAJTOPPO//EHFDfA1m5FoKistz3ks9X42rUpHn6MSI89a0qAp0.jpeg', 'tenant/AMANRAJTOPPO//dArPBde8r7SbRhRVHBXU1DBm1YieDnaqmIWwrmLz.jpeg', 'tenant/AMANRAJTOPPO//0mu80IzlpkbfULlkCfb8YvEKAMyMYHVwHD4VSosV.jpeg', 'tenant/AMANRAJTOPPO//ENgPrECjpsHWRdZG5iHzPxXDMehu5K1rMGbNmWYB.jpeg', 'tenant/AMANRAJTOPPO//W8kGw08LlzeVYZ5RglbqznObBiJIejsfNHavOGzz.jpeg', NULL, 'new address', 'Raipur', NULL, 'IN', NULL, 1, '2020-01-15 22:40:45', '2020-01-15 22:40:45'),
(3, 3, 'aman raj toppo', 1, 'tenant/AmanRajToppo/SY1wruAcAhVGA126MGpRIWDXQ0mh6m3bPrRAIVrv.jpeg', '+01', '5435234523', 'tenant/AmanRajToppo//W2jmFX0vUaQ4h0CAM3JsT4odlhWrGiY3Nj8ulO7x.jpeg', 'tenant/AmanRajToppo//CoHnnl6BgiQkIWNw3VPAyMMvMQvk8L28j2UPOMLc.jpeg', 'tenant/AmanRajToppo//w4ATPACp9ZisZ0W9hmoDXThyplDAB3Bt9wT4mAla.jpeg', 'tenant/AmanRajToppo//y58IGqmwnLDjOhnlAAuR2nTdBSsLY26KvLrVzsAM.jpeg', 'tenant/AmanRajToppo//BJafXFolpkfrVVKwR9j2xVIr6sBGUpvN7M1q3aTN.jpeg', NULL, 'fsdfasdf', 'czxc', NULL, 'IN', NULL, 1, '2020-01-16 09:45:53', '2020-01-16 09:45:53');

-- --------------------------------------------------------

--
-- Table structure for table `tenant_relations`
--

CREATE TABLE `tenant_relations` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `tenant_id` bigint(20) NOT NULL,
  `passport` text NOT NULL,
  `visa` text NOT NULL,
  `emirates_id` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenant_relations`
--

INSERT INTO `tenant_relations` (`id`, `name`, `relationship`, `tenant_id`, `passport`, `visa`, `emirates_id`, `created_at`, `updated_at`) VALUES
(1, '4324', '312312', 1, 'user/TestName/SQRvldzV8LGUEnjohNaLTKhhgp7OPCChQxmzjav5.jpeg', 'user/TestName/3aaZGFue64JWKAGJ0DPt1hxHUFCpr1V9RvgEzceW.jpeg', 'user/TestName/3EyBHA0KumCvXoIQFcDZMAIKlLuZBfIZG2d8g1eX.jpeg', '2020-01-15 16:50:03', '2020-01-15 16:50:03'),
(2, '4324', '312312', 2, 'tenant/AMANRAJTOPPO/f1jqo1ePjFo4KUJssAHcIbCjp9G37KWnH40E1eB3.jpeg', 'tenant/AMANRAJTOPPO/2A7i0pADcSjCaprxUgGHtUyJCNmNmp5ot3jSBX5A.jpeg', 'tenant/AMANRAJTOPPO/016LTZZbbGyqfC2Kz43QHdRpfoXQ3FESxt8xmNMc.jpeg', '2020-01-16 04:10:45', '2020-01-16 04:10:45'),
(3, 'fasdf', 'sadfsda', 3, 'tenant/AmanRajToppo/FlTagC8HVkqNb9RQ4FVzQda0HHUmEV0s8bqp0YOu.jpeg', 'tenant/AmanRajToppo/HtB0HYAMDfxhwAH0qOS093YDOM6eb3kiLXwvicbR.jpeg', 'tenant/AmanRajToppo/bGVYSEsmP5AhfIsfDKhlSTVGxqExzUef2q3pCPJs.jpeg', '2020-01-16 15:15:53', '2020-01-16 15:15:53');

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
-- Indexes for table `booking_request`
--
ALTER TABLE `booking_request`
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
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `rent_installments`
--
ALTER TABLE `rent_installments`
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
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking_request`
--
ALTER TABLE `booking_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_request`
--
ALTER TABLE `contact_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `property_features`
--
ALTER TABLE `property_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `property_units`
--
ALTER TABLE `property_units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `property_unit_allotment`
--
ALTER TABLE `property_unit_allotment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `property_unit_types`
--
ALTER TABLE `property_unit_types`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rent_installments`
--
ALTER TABLE `rent_installments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tenant_history`
--
ALTER TABLE `tenant_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tenant_profile`
--
ALTER TABLE `tenant_profile`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tenant_relations`
--
ALTER TABLE `tenant_relations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
