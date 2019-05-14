-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2018 at 07:09 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drivers_training`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `email`, `mobile`, `password`, `photo`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', '01638584622', '21232f297a57a5a743894a0e4a801fc3', NULL),
(2, 'Sapan Ahmed', 'sapan', 'sapan@gmail.com', '01711462362', 'e034fb6b66aacc1d48f445ddfb08da98', 'public/img/male.png'),
(3, 'Ruhul Amin', 'ruhul', 'ruhulrahman2233@gmail.com', '01843867772', '202cb962ac59075b964b07152d234b70', 'public/img/male.png'),
(4, 'Mahbubur Rahman', 'mahbubur', 'kjkkj@gmail.om', '455545', '202cb962ac59075b964b07152d234b70', 'public/img/male.png');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fathers_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mothers_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dl_no` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dl_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dl_class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dl_issue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_addr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_addr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creator_id` int(11) NOT NULL,
  `updator_id` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `gender`, `fathers_name`, `mothers_name`, `mobile`, `dl_no`, `date_of_birth`, `blood`, `dl_type`, `dl_class`, `dl_issue`, `current_addr`, `permanent_addr`, `picture`, `expire_date`, `creator_id`, `updator_id`, `created_at`, `updated_at`) VALUES
(1, 'Ruhul Amin', 'male', 'Abdur Rahman', 'Asiya Begum', '1843867772', '123456789', '1994-02-14', 'B+', 'prof', 'lightmotorcycle', 'new', '125/5, Tejkunipara', '125/5, Tejkunipara', '1523371472fiver.jpg', '2023-04-09', 1, 1, '2018-04-10', '2018-04-10'),
(2, 'Harun', 'male', 'Nai', 'Nai', '01638584629', '545455545', '1993-04-05', 'A+', 'non-prof', 'lightmotorcycle', 'renew', 'Farmgate', 'Pabna', '152337228128511892_1991697847748787_581195297_n.jpg', '2023-04-09', 1, 1, '2018-04-10', '2018-04-10'),
(3, 'Anfal', 'male', 'Galib', 'jkjk', '575412', '54545', '2018-04-03', 'O-', 'non-prof', 'lightmotorcycle', 'new', 'Mirpur', 'Pabna', '152349754116649159_1135342839908109_9183967291929577062_n.jpg', '2023-04-11', 1, 1, '2018-04-12', '2018-04-12'),
(4, 'Zia', 'male', 'jkjk', 'jkjlkjk', '98989898', '5665656', '1979-08-01', 'm', 'prof', 'medium', 'renew', 'lklk', 'lklkl', NULL, '2023-04-14', 1, 1, '2018-04-15', '2018-04-15'),
(5, 'Monir', 'male', 'kjkljl', 'jkjljk', '87878', '87878', '2018-04-05', 'A+', 'prof', 'light', 'renew', 'kjkjk', 'jkjk', NULL, '2023-04-14', 1, 1, '2018-04-15', '2018-04-15'),
(6, 'nisa', 'female', 'dsdfd', 'dfsd', '112121', '1212121', '1979-08-01', 'A-', 'prof', 'lightmotorcycle', 'renew', 'wqwq', 'wqwqw', NULL, '2023-04-14', 1, 1, '2018-04-15', '2018-04-15'),
(7, 'Jakir', 'male', 'kjkjlk', 'jljlkjkljkl', '2265656', '5953323', '2018-04-03', 'Q', 'prof', 'light', 'renew', 'KJJKJK', 'JKJKJK', NULL, '2023-04-14', 1, 1, '2018-04-15', '2018-04-15'),
(8, 'Taher', 'male', 'jkjkj', 'kjkljl', '444545', '5454545', '1979-08-01', 'O', 'prof', 'light', 'renew', 'kjkjk', 'jkjkj', NULL, '2023-04-14', 1, 1, '2018-04-15', '2018-04-15'),
(9, 'Rafik', 'male', 'jkjkj', 'lkjkjkljlk', '89865656', '565656', '1979-08-01', 'O', 'prof', 'light', 'new', 'jkjkjk', 'kjkjkjk', NULL, '2023-04-14', 1, 1, '2018-04-15', '2018-04-15'),
(10, 'klklklk', 'male', 'lklklkl', 'lllklkl', '3545', '454545', '1979-08-01', 'p', 'prof', 'light', 'new', 'kn', 'jhjh', NULL, '2023-04-14', 1, 1, '2018-04-15', '2018-04-15'),
(11, 'opopopop', 'male', 'popopo', 'opopop', '121212', '4121212', '2018-04-03', 'o', 'prof', 'light', 'renew', 'klklkl', 'lklkl', NULL, '2023-04-14', 1, 1, '2018-04-15', '2018-04-15'),
(12, 'Rifath', 'male', 'kjkjj', 'kjkjkljlj', '223323', '3232323', '1979-08-01', 'W', 'prof', 'light', 'new', 'kjkk', 'jkjkjk', NULL, '2023-04-15', 1, 1, '2018-04-16', '2018-04-16'),
(13, 'Josim', 'male', 'jkjk', 'jkjkjkl', '6564554545', '545454', '2018-04-11', 'O', 'prof', 'light', 'new', 'lklk', 'lklk', NULL, '2023-04-15', 1, 1, '2018-04-16', '2018-04-16'),
(14, 'Hadim', 'male', 'jkjk', 'jkljl', '221133', '221133', '2018-04-17', 'k', 'prof', 'light', 'renew', 'lklkl', 'klkl', NULL, '2023-04-16', 1, 1, '2018-04-17', '2018-04-17'),
(15, 'kabir', 'male', 'rtrg', 'wew', '55555555', '55555555', '2018-04-18', 'k', 'prof', 'light', 'new', 'erewr', 'sfdf', NULL, '2023-04-17', 1, 1, '2018-04-18', '2018-04-18'),
(16, 'Rbi', 'male', 'lklkl', 'kjj', '6666', '666', '2018-04-17', 'l', 'prof', 'light', 'new', 'kkk', NULL, NULL, '2023-04-17', 1, 1, '2018-04-18', '2018-04-18'),
(17, 'lllllll', 'male', 'jkjk', 'jkjk', '33332', '333233', '2018-04-02', 'p', 'prof', 'light', 'new', ';;l;', 'jkjk', NULL, '2023-04-21', 1, 1, '2018-04-22', '2018-04-22'),
(18, 'kk', 'male', 'lklk', 'klkl', 'lklkl', 'klkl', '2018-04-09', 'p', 'prof', 'light', 'new', 'klkl', 'lkl', NULL, '2023-04-21', 1, 1, '2018-04-22', '2018-04-22'),
(19, 'Farid', 'male', 'jkkjk', 'kjkjkj', '4455889966', '4455668899', '2018-05-07', 'l', 'prof', 'lightmotorcycle', 'renew', 'lll', 'lll', NULL, '2023-05-06', 1, 1, '2018-05-07', '2018-05-07'),
(20, 'Miia', 'male', 'jkjk', 'jkjk', '9966', '9966', '2018-05-23', 'o', 'non-prof', 'medium', 'renew', 'jj', 'jjj', NULL, '2023-05-06', 1, 1, '2018-05-07', '2018-05-07'),
(21, 'Tania', 'female', 'jkj', 'jkjk', '669966', '669966', '2018-05-31', 'p', 'non-prof', 'light', 'new', 'lklkl', 'klkl', '20180507195019.jpg', '2023-05-08', 1, 1, '2018-05-09', '2018-05-09'),
(22, 'Noman', 'male', 'kjk', 'kjkjk', '999996', '99996', '2018-05-16', 'l', 'prof', 'lightmotorcycle', 'new', 'kjkjk', NULL, '20180422041925.jpg', '2023-05-08', 1, 1, '2018-05-09', '2018-05-09'),
(23, 'Arif', 'male', 'kjk', 'kjk', '258', '258', '2018-05-08', 'p', 'prof', 'light', 'new', NULL, NULL, '20180509154808.jpg', '2023-05-08', 1, 1, '2018-05-09', '2018-05-09'),
(24, 'ALi', 'male', 'jkjk', 'kjk', '8800', '8800', '2018-05-16', '[', 'non-prof', 'light', 'new', 'lkl', NULL, '20180509164909.jpg', '2023-05-08', 1, 1, '2018-05-09', '2018-05-09'),
(25, 'himi', 'male', 'fff', 'ddd', '21213', '21213', '2018-05-08', 'p', 'prof', 'light', 'new', NULL, NULL, '20180509172648.jpg', '2023-05-08', 1, 1, '2018-05-09', '2018-05-09'),
(26, 'mijan', 'male', 'jkjkjk', 'kjkjk', '989898', '989898', '2018-05-08', 'o', 'prof', 'light', 'new', NULL, NULL, '20180509183830.jpg', '2023-05-08', 1, 1, '2018-05-09', '2018-05-09'),
(27, 'oni', 'female', 'nnjkjk', 'jkjkj', '159', '159', '2018-05-08', 'm', 'prof', 'lightmotorcycle', 'renew', 'm', NULL, NULL, '2023-05-08', 1, 1, '2018-05-09', '2018-05-09'),
(28, 'milli', 'female', 'kjkj', 'jkjk', '459', '459', '2018-05-09', 'o', 'prof', 'light', 'new', NULL, NULL, '20180509184345.jpg', '2023-05-08', 1, 1, '2018-05-09', '2018-05-09'),
(29, 'mina', 'female', 'ghghgh', 'fdfdfdf', '6969', '69', '2018-05-09', 'o', 'prof', 'light', 'new', NULL, NULL, '20180509184738.jpg', '2023-05-08', 1, 1, '2018-05-09', '2018-05-09'),
(30, 'Sharif', 'male', 'jkjk', 'kjkjk', '89877', '88777', '2018-05-23', 'p', 'prof', 'light', 'new', NULL, NULL, '20180509192324.jpg', '2023-05-08', 1, 1, '2018-05-09', '2018-05-09'),
(31, 'Bial', 'male', 'jkjk', 'jkjk', '558', '558', '2018-05-08', 'p', 'prof', 'light', 'new', NULL, NULL, '20180509192659.jpg', '2023-05-08', 1, 1, '2018-05-09', '2018-05-09'),
(32, 'uuuuu', 'male', 'gghgh', 'hghgh', '55656556', '55655888', '2018-05-08', 'u', 'non-prof', 'lightmotorcycle', 'renew', 'kjkjk', 'ghhg', '20180510073420.jpg', '2023-05-09', 1, 1, '2018-05-10', '2018-05-10'),
(33, 'Sapan Vai', 'male', 'Gafur', 'Mariam', '01711462362', '1234567890', '1979-08-01', 'A+', 'prof', 'light', 'renew', 'Lalmatia', 'Comilla', '20180524074826.jpg', '2023-05-23', 1, 1, '2018-05-24', '2018-05-24');

-- --------------------------------------------------------

--
-- Table structure for table `drivers_delete`
--

CREATE TABLE `drivers_delete` (
  `id` int(10) UNSIGNED NOT NULL,
  `driver_id` int(11) NOT NULL,
  `driver_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_nid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_dl_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleter_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_02_28_131643_create_admin_table', 1),
(2, '2018_02_28_132138_create_drivers_table', 1),
(3, '2018_04_05_082252_create_drivers_delete_table', 1),
(4, '2018_04_09_072755_create_snapshot_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `snapshot`
--

CREATE TABLE `snapshot` (
  `id` int(10) UNSIGNED NOT NULL,
  `Image` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `snapshot`
--

INSERT INTO `snapshot` (`id`, `Image`, `created_at`) VALUES
(4, '20180524075956.jpg', '2018-05-24 05:59:56'),
(5, '20180524080814.jpg', '2018-05-24 06:08:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `drivers_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `drivers_dl_no_unique` (`dl_no`);

--
-- Indexes for table `drivers_delete`
--
ALTER TABLE `drivers_delete`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `snapshot`
--
ALTER TABLE `snapshot`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `drivers_delete`
--
ALTER TABLE `drivers_delete`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `snapshot`
--
ALTER TABLE `snapshot`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
