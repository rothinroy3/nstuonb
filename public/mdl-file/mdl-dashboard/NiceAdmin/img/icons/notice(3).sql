-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 30, 2016 at 02:39 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.6.20-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `notice`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_type`) VALUES
(1, 'vc'),
(2, 'chairman'),
(3, 'stuff');

-- --------------------------------------------------------

--
-- Table structure for table `adminCRHs`
--

CREATE TABLE IF NOT EXISTS `adminCRHs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dept_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

--
-- Dumping data for table `adminCRHs`
--

INSERT INTO `adminCRHs` (`id`, `username`, `password`, `dept_id`, `created_at`, `updated_at`) VALUES
(15, 'cste_chairman', 'b04230b9c2868f01dd714f8ded42b19c', 23, NULL, NULL),
(16, 'pharmacy_chairman', 'd2aeeea1a493f1608e8991141172dceb', 24, NULL, NULL),
(17, 'fims_chairman', '57a53398fa5adeb64880b38818c8d646', 25, NULL, NULL),
(18, 'acce_chairman', '854eeeb523e11ec1b610267659351ed1', 26, NULL, NULL),
(19, 'english_chairman', '2570cc886b4baeccb418e7e09b3d7af7', 27, NULL, NULL),
(20, 'microbiology_chairman', '0606009eac45d2cc4fb8e10bf1326398', 28, NULL, NULL),
(21, 'amath_chairman', '68a0f7ddb625ef389eb0066feacf162f', 29, NULL, NULL),
(22, 'bba_chairman', '9bf1b3ae29fe8de9d832a5f608ffbada', 30, NULL, NULL),
(23, 'eps_chairman', '936037ce984933f53f81a39fda6642cb', 31, NULL, NULL),
(24, 'ice_chairman', 'a7f694724c7c2df0cbcc98124e7d0731', 32, NULL, NULL),
(25, 'agriculture_chairman', 'f2be41f969ba8cec28f7325d746a0b4f', 33, NULL, NULL),
(26, 'environmental_chairman', '156489efb2bdbad6d2498be2867e1634', 34, NULL, NULL),
(27, 'ftns_chairman', '295a24e74730d2d85effa67f05c2dae6', 35, NULL, NULL),
(28, 'genetics_chairman', '899c5c79d5b08d533c816e56d38e2d95', 36, NULL, NULL),
(29, 'register', '9de4a97425678c5b1288aa70c1669a64', 37, NULL, NULL),
(30, 'librarian', '35fa1bcb6fbfa7aa343aa7f253507176', 38, NULL, NULL),
(31, 'ash_provost', '5654185d37ca789265768a1f0c32eec6', 39, NULL, NULL),
(32, 'bkh_provost', 'd2b30f58f2c96fac1cbf1c3ef8792e74', 40, NULL, NULL),
(33, 'bank_manager', '740785b8c94800bfb0f18436bbc61f54', 41, NULL, NULL),
(34, 'ghgdhgd', '09171274e8bbf530310abcaef8ba2854', 42, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `adminStuffs`
--

CREATE TABLE IF NOT EXISTS `adminStuffs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stuff_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stuff_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dept_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `adminStuffs`
--

INSERT INTO `adminStuffs` (`id`, `stuff_username`, `stuff_password`, `dept_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(14, 'cste_stuff', 'f9f63cef1b75163dfa3cda1e7f3d52f9', 23, NULL, NULL, NULL),
(15, 'pharmacy_stuff', '36484390fb7b1494bcbb27facb995620', 24, NULL, NULL, NULL),
(16, 'fims_stuff', 'd5290d381dd5987ef88b1148c90e8cc8', 25, NULL, NULL, NULL),
(17, 'acce_stuff', '9e03827bd4afdc6708384e17b1560a53', 26, NULL, NULL, NULL),
(18, 'english_stuff', '856c7408364e504466864097185d8d47', 27, NULL, NULL, NULL),
(19, 'microbiology_stuff', '5de4c8e94e32baa4e337e4d92539a74d', 28, NULL, NULL, NULL),
(20, 'amath_stuff', '00fa98e27cf28c1920038cc8ff16a554', 29, NULL, NULL, NULL),
(21, 'bba_stuff', 'd51531e93e8e725587954064fd42be72', 30, NULL, NULL, NULL),
(22, 'eps_stuff', 'ba32cf1357f59fd3f45854c578883dc5', 31, NULL, NULL, NULL),
(23, 'ice_stuff', 'aa8a0680fb6e3aee0a6eec9b0ec60243', 32, NULL, NULL, NULL),
(24, 'agriculture_stuff', '6cef45a98c3a084dc4313bda4a6e9b47', 33, NULL, NULL, NULL),
(25, 'environmental_stuff', 'db6d31162f33ecb94b02ff28334c0bba', 34, NULL, NULL, NULL),
(26, 'ftns_stuff', 'd97bb926ee08fd161dd28c01e1f6aeff', 35, NULL, NULL, NULL),
(27, 'genetics_stuff', '5c7b915b19ecad8890724bb621a40e1d', 36, NULL, NULL, NULL),
(28, 'register_stuff', '444d2f623243306c1a45a6aab1c40220', 37, NULL, NULL, NULL),
(29, 'librarian_stuff', '83b95c21bf75737d5e10b268a65b7eec', 38, NULL, NULL, NULL),
(30, 'ash_stuff', 'a537c93195081bc9ab7d25da7a1e7703', 39, NULL, NULL, NULL),
(31, 'bkh_stuff', 'a8cd147aff1b6571fcf1aa5b6558a188', 40, NULL, NULL, NULL),
(32, 'bank_stuff', '7bab07bf76c5895ef1e419a6901b6ce1', 41, NULL, NULL, NULL),
(33, 'ghgdhgd', '09171274e8bbf530310abcaef8ba2854', 42, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `dept_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dept_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=42 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_id`, `dept_name`, `dept_type`, `created_at`, `updated_at`) VALUES
(23, 'CSTE', '1', '2016-04-17 11:50:57', '2016-04-17 11:50:57'),
(24, 'Pharmacy', '1', '2016-04-17 11:51:46', '2016-04-17 11:51:46'),
(25, 'FIMS', '1', '2016-04-17 11:52:52', '2016-04-17 11:52:52'),
(26, 'ACCE', '1', '2016-04-17 11:53:37', '2016-04-17 11:53:37'),
(27, 'English', '1', '2016-04-17 11:54:51', '2016-04-17 11:54:51'),
(28, 'Microbiology', '1', '2016-04-17 11:56:00', '2016-04-17 11:56:00'),
(29, 'AMATH', '1', '2016-04-17 11:57:13', '2016-04-17 11:57:13'),
(30, 'BBA', '1', '2016-04-17 11:58:54', '2016-04-17 11:58:54'),
(31, 'EPS', '1', '2016-04-17 11:59:49', '2016-04-17 11:59:49'),
(32, 'ICE', '1', '2016-04-17 12:01:09', '2016-04-17 12:01:09'),
(33, 'Agriculture', '1', '2016-04-17 12:02:24', '2016-04-17 12:02:24'),
(34, 'Environmental Science', '1', '2016-04-17 12:04:11', '2016-04-17 12:04:11'),
(35, 'FTNS', '1', '2016-04-17 12:05:11', '2016-04-17 12:05:11'),
(36, 'Genetics', '1', '2016-04-17 12:05:58', '2016-04-17 12:05:58'),
(37, 'Register Office', '0', '2016-04-17 12:12:29', '2016-04-17 12:12:29'),
(38, 'Library Office', '0', '2016-04-17 12:14:55', '2016-04-17 12:14:55'),
(39, 'ASH(Abdus Salam Hall)', '0', '2016-04-17 12:16:07', '2016-04-17 12:16:07'),
(40, 'BKH(Bibi Khadiza Hall)', '0', '2016-04-17 12:17:15', '2016-04-17 12:17:15'),
(41, 'Agrani Bank', '0', '2016-04-17 14:35:14', '2016-04-17 14:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_04_09_193547_create_notices_table', 2),
('2016_04_09_194043_create_departments_table', 3),
('2016_04_09_194545_create_register_table', 4),
('2016_04_09_194912_create_vc_table', 5),
('2016_04_09_195429_create_admin_table', 6),
('2016_04_11_203722_create_upload2s_table', 7),
('2016_04_12_192358_create_ups_table', 8),
('2016_04_14_152314_create_halls_table', 9),
('2016_04_14_184504_add_paid_to_vc', 9),
('2016_04_14_193818_create_adminCRHs_table', 10),
('2016_04_14_194926_create_adminStuffs_table', 11),
('2016_04_16_104722_add_paid_to_notices', 12),
('2016_04_16_140323_add_paid_to_notices', 13),
('2016_04_17_054419_add_paid_to_departments', 14),
('2016_04_17_063554_create_vcnotices_table', 15),
('2016_04_17_164049_add_paid_to_vc', 16),
('2016_04_17_201500_add_paid_to_departments', 17);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE IF NOT EXISTS `notices` (
  `notice_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `notice_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notice_details` text COLLATE utf8_unicode_ci NOT NULL,
  `notice_content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notice_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dept_id` int(11) NOT NULL,
  `notice_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`notice_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`notice_id`, `notice_name`, `notice_details`, `notice_content`, `notice_date`, `dept_id`, `notice_status`, `created_at`, `updated_at`) VALUES
(15, 'ddfgfghghh', '                                  \n                                         This is a hall NoticeThis is a hall NoticeThis is a hall NoticeThis is a hall NoticeThis is a hall NoticeThis is a hall NoticeThis is a hall NoticeThis is a hall NoticeThis is a hall NoticeThis is a hall NoticeThis is a hall NoticeThis is a hall NoticeThis is a hall NoticeThis is a hall NoticeThis is a hall NoticeThis is a hall NoticeThis is a hall NoticeThis is a hall NoticeThis is a hall NoticeThis is a hall NoticeThis is a hall NoticeThis is a hall NoticeThis is a hall NoticeThis is a hall NoticeThis is a hall NoticeThis is a hall NoticeThis is a hall NoticeThis is a hall NoticeThis is a hall NoticeThis is a hall Notice\n                                                         ', 'electrical Generator.docx', '2016-04-16', 24, '0', '2016-04-16 16:08:54', '2016-04-16 16:08:54'),
(16, 'This is ACCE Notice', '      This is ACCE NoticeThis is ACCE NoticeThis is ACCE NoticeThis is ACCE NoticeThis is ACCE NoticeThis is ACCE NoticeThis is ACCE NoticeThis is ACCE NoticeThis is ACCE NoticeThis is ACCE NoticeThis is ACCE NoticeThis is ACCE NoticeThis is ACCE NoticeThis is ACCE NoticeThis is ACCE NoticeThis is ACCE Notice                            \r\n                                ', 'banglamati.net_february-11_golpo2.php.pdf', '2016-04-17', 26, '1', '2016-04-17 12:31:19', '2016-04-17 12:31:19'),
(17, 'ACCE', '                                  \r\n        djedhejhdjdksjkdhjskhdjshjdhjhdjjhgdhjgh                        ', 'Ekti Mrittudanda [Choto Golpo].pdf', '2016-04-17', 26, '1', '2016-04-17 12:59:40', '2016-04-17 12:59:40'),
(18, 'This is ACCE Notice2', 'This is ACCE Notice2This is ACCE Notice2This is ACCE Notice2This is ACCE Notice2This is ACCE Notice2This is ACCE Notice2This is ACCE Notice2This is ACCE Notice2This is ACCE Notice2This is ACCE Notice2This is ACCE Notice2This is ACCE Notice2This is ACCE Notice2This is ACCE Notice2This is ACCE Notice2This is ACCE Notice2          \r\n                                ', 'beji by Jafar Iqbal.pdf', '2016-04-17', 26, '0', '2016-04-17 13:15:55', '2016-04-17 13:15:55'),
(19, 'dhjhdjhjd', '                                  \r\n                         dsdsdsdsdds       ', 'Fountain_pen(reaz69@gmail.com).pdf', '2016-04-17', 26, '1', '2016-04-17 13:24:00', '2016-04-17 13:24:00'),
(20, 'Register Notice', 'wshdjgdhsgdhjdghsdhsgdhsgdhshgdshds                                    \r\n                                ', 'C19-binomial.pdf', '2016-04-17', 37, '1', '2016-04-17 13:28:55', '2016-04-17 13:28:55'),
(21, 'dgshgdhsgRegister2hdjhsjdjh', 'Dolore ex deserunt aute fugiat aute nulla ea sunt aliqua nisi cupidatat eu. Nostrud in laboris labore nisi amet do dolor eu fugiat consectetur elit cillum esse.\n\n', 'Fibonacci Heap.pdf', '2016-04-17', 37, '1', '2016-04-17 13:29:21', '2016-04-17 13:29:21'),
(27, 'Cste 3214 Viva voce', 'There is also the point that the handler function and the scope relating to it are preserved indefinitely and can use up memory. However, this is no worse than the other alternatives, which can also hold on to large numbers of variables indefinitely. You can always remove the handlers once you are finished with them, which will allow the garbage collector to free up the memory they used.\r\n                                ', 'Computer-Fundamentals.pdf', '2016-04-23', 23, '1', '2016-04-22 22:11:19', '2016-04-22 22:11:19'),
(28, 'CSTE Term Final Result (Year:3 Term :2)', 'There is also the point that the handler function and the scope relating to it are preserved indefinitely and can use up memory. However, this is no worse than the other alternatives, which can also hold on to large numbers of variables indefinitely. You can always remove the handlers once you are finished with them, which will allow the garbage collector to free up the memory they used.                                \r\n                                ', 'Hardware Orgamization.pdf', '2016-04-23', 23, '1', '2016-04-22 22:12:46', '2016-04-22 22:12:46'),
(29, 'Exam Notice CSTE 3209', 'There is also the point that the handler function and the scope relating to it are preserved indefinitely and can use up memory. However, this is no worse than the other alternatives, which can also hold on to large numbers of variables indefinitely. You can always remove the handlers once you are finished with them, which will allow the garbage collector to free up the memory they used.                                \r\n                                ', 'Mother Board.pdf', '2016-04-23', 23, '0', '2016-04-22 22:13:41', '2016-04-22 22:13:41'),
(30, 'Cste 3214 Viva voce02', 'Cste 3214 Viva voce02Cste 3214 Viva voce02Cste 3214 Viva voce02Cste 3214 Viva voce02Cste 3214 Viva voce02Cste 3214 Viva voce02Cste 3214 Viva voce02Cste 3214 Viva voce02Cste 3214 Viva voce02                             \r\n                                ', 'Computer-Fundamentals.pdf', '2016-04-23', 23, '0', '2016-04-22 22:56:28', '2016-04-22 22:56:28');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('rothinroy3@gmail.com', '59d6080470c114d530619e0aa058c05c2d1dd14bd5471992c851ba67ba314694', '2016-04-18 00:17:48'),
('mukit@gmail.com', '796cc93c2e5444c0cd6c772863c13a08d24141c598cad0ba1bf00ad505b67cad', '2016-04-21 12:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `upload2s`
--

CREATE TABLE IF NOT EXISTS `upload2s` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dept_id` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `upload2s_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `upload2s`
--

INSERT INTO `upload2s` (`id`, `firstname`, `dept_id`, `photo`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'rothin', 2, 'DSC_3410.JPG', 'rothinroy3@gmail.com', '', '', '2016-04-12 16:00:34', '2016-04-12 16:00:34'),
(2, 'mame', 1, 'DSC_3388.JPG', 'mame@mame.com', '', '', '2016-04-12 16:07:49', '2016-04-12 16:07:49'),
(3, 'gdhdghdghd', 1, 'DSC_3386.JPG', 'djhjd@shdjhjd.com', '', '', '2016-04-12 16:09:36', '2016-04-12 16:09:36'),
(4, 'ddkjkjkd', 1, 'DSC_3388.JPG', 'wdsds@sdsjhdj.com', '123456', '', '2016-04-12 16:24:10', '2016-04-12 16:24:10');

-- --------------------------------------------------------

--
-- Table structure for table `ups`
--

CREATE TABLE IF NOT EXISTS `ups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=30 ;

--
-- Dumping data for table `ups`
--

INSERT INTO `ups` (`id`, `firstname`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'dsdsds', '', '', '2016-04-12 13:54:39', '2016-04-12 13:54:39'),
(2, 'fdfdfdf', '01092013097.jpg', '', '2016-04-12 13:56:33', '2016-04-12 13:56:33'),
(3, 'rothin', 'img.JPG', '', '2016-04-12 14:35:06', '2016-04-12 14:35:06'),
(4, 'gdhsgdhsds', '', '', NULL, NULL),
(5, 'dsdsdsdsdsd', '', '', NULL, NULL),
(6, 'sdsdsdsddsds', '', '', NULL, NULL),
(7, 'dsdsdsdsd\r\n', '', '', NULL, NULL),
(8, 'xxzxzxz', '', '', NULL, NULL),
(9, 'xzxzxzxzx', '', '', NULL, NULL),
(10, 'bbvbvbvb', '', '', NULL, NULL),
(11, 'gfgfgfgfg', '', '', NULL, NULL),
(12, 'weqweqweqewee', '', '', NULL, NULL),
(13, 'eqweqweqe', '', '', NULL, NULL),
(14, 'assasas', '', '', NULL, NULL),
(15, 'sasdasdasd', '', '', NULL, NULL),
(16, 'asssssssssssssssssssssss', '', '', NULL, NULL),
(17, 'asssssssssssssssss', '', '', NULL, NULL),
(18, 'asddaaaaaaaaaaaa', '', '', NULL, NULL),
(19, 'dsadasdasdasd', '', '', NULL, NULL),
(20, 'dsdsds', '', '', NULL, NULL),
(21, 'sdsdsds', '', '', NULL, NULL),
(22, 'sdsdsdsd', '', '', NULL, NULL),
(23, 'sdsdsdsds', '', '', NULL, NULL),
(24, 'dsdsdsdsddsdsd', '', '', NULL, NULL),
(25, '121wqssa', '', '', NULL, NULL),
(26, 'sassssa', '', '', NULL, NULL),
(27, 'sasasasas', '', '', NULL, NULL),
(28, 'sassasasaxx', '', '', NULL, NULL),
(29, 'sasasas', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `department`, `photo`, `phone`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(19, 'Rothin Roy', 'rothinroy3@gmail.com', '23', '075_124.JPG', '01748558533', '$2y$10$Glru9hAn73omLEwra6oJDuqpRPSpxwW/Urh/lPSrodkeB7SO.qoqC', 'coy0YmzoNC4D14eF1A8WUZB9ojPnQ7ysBHCHHylUseCuDdYL1V1APOKqTYBi', '2016-04-17 12:21:45', '2016-04-29 12:31:57'),
(20, 'Mukit Khan', 'mukit@gmail.com', '24', '056052.JPG', '73726376263275362', '$2y$10$o2tVmcj276zWhDxzpVEU6.mtoFUucmfpqNQoM0EprbBB6Ja9NossW', 'P4tVwG38TglNv0457wHyGE5GhTh7zdl62sAUmlTDLKZb2e4umPSFmEVRWeJv', '2016-04-17 12:24:11', '2016-04-17 12:24:18'),
(21, 'Shibu mame', 'shibu@gmail.com', '31', '161063.JPG', '637253652635263', '$2y$10$7sgpYmTnmP9B5a.DCEV8Oev2a67t7w6P2ygRtUqXd2kQ8aJWrVx06', 'IiipuEB3dlnK9YqELlPHNJdvVGpsp3XWuxV0wQb0CqYgIU5potjLYT5tHMYz', '2016-04-17 12:25:16', '2016-04-17 12:26:12'),
(22, 'Tusher', 'tusher@gmail.com', '26', '347003.JPG', '62737523765236', '$2y$10$QWGMCgUtlLJ0R4vaeaMKxe..1zkeb9BRmxTel0HwweYCdMPhno2iK', 'ooj8MQ57x2Zz27T1QFYi2iNhp3Z3z2yIYdgbk0eQPN1qRHuCzTcEfb6ih58M', '2016-04-17 12:27:01', '2016-04-22 12:19:32'),
(23, 'palash', 'palash@gmail.com', '23', '955trium.jpg', '673647354753465363', '$2y$10$o8P8fmj6cIjJ2pTT6iXaW./TQ9.Yw4pynzsMhKyxiEgUeptEQzkKO', 'sRe51k01CwSu0V97ku9ybejMNb655y5htgIzDol6PZkgCGbkHto1fULikzpE', '2016-04-17 22:55:10', '2016-04-17 22:56:11');

-- --------------------------------------------------------

--
-- Table structure for table `vc`
--

CREATE TABLE IF NOT EXISTS `vc` (
  `vc_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vc_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vc`
--

INSERT INTO `vc` (`vc_username`, `vc_password`, `remember_token`, `id`, `created_at`, `updated_at`) VALUES
('nstu_vc_sir', 'c16833efa5f1468e0973f19da7db7dc7', NULL, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vcnotices`
--

CREATE TABLE IF NOT EXISTS `vcnotices` (
  `vc_notice_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vc_notice_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vc_notice_details` text COLLATE utf8_unicode_ci NOT NULL,
  `vc_notice_content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`vc_notice_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `vcnotices`
--

INSERT INTO `vcnotices` (`vc_notice_id`, `vc_notice_name`, `vc_notice_details`, `vc_notice_content`, `created_at`, `updated_at`) VALUES
(6, 'This is VC notice', 'using a script tag in your head section of your web page. On bootstrap&rsquo;s website, you would find details about this. It&rsquo;s also possible to build a customized file with selected components from here if you don&rsquo;t want to use full bootstrap framework.dsdsds', 'serverguide.pdf', '2016-04-22 11:11:36', '2016-04-22 11:11:36'),
(7, 'Vice chancellor Notice 02', 'There is also the point that the handler function and the scope relating to it are preserved indefinitely and can use up memory. However, this is no worse than the other alternatives, which can also hold on to large numbers of variables indefinitely. You can always remove the handlers once you are finished with them, which will allow the garbage collector to free up the memory they used.\n', 'Use of Computer rathin.pdf', '2016-04-22 22:33:46', '2016-04-22 22:33:46');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
