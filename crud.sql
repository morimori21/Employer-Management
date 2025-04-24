-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2025 at 03:18 PM
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
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `fullname`, `username`, `email`, `password`, `address`, `contact`) VALUES
(1, 'Lito Kamo', 'testadmin', 'test@admin.com', 'testadmin123', 'Gapan city', '0912454545'),
(2, 'Lito testone', 'testadmin', 'testone@admin.com', 'testone', 'cabanatuan city', '09551123456'),
(3, 'fasdfasfda', 'asdfsaf', 'asdfad@gmail.com', 'adsfasdf', 'asfdasf', '343434343'),
(4, 'kahit ano', 'suboklng', 'subok@gmail.com', 'subok123', 'Pias', '456421255'),
(5, 'testteacher', 'testteacher', 'testteacher@gmail.com', 'adfasdf', 'cabanatuan', '543535345'),
(6, 'mark full name', 'mark', 'mark@email.com', 'password', 'mark house', '0923131231'),
(7, 'Jane Doe', 'Jane Doe', 'janedoe@gmail.com', 'IamJaneTheRat', 'Sewer', '0923131239'),
(8, 'mark 1 full name', 'mark 1', 'mark1@email.com', 'password2', 'mark 1 house', '0909090099'),
(9, 'test', 't', 'a@a', '1', 't', '1');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `firstName` varchar(46) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lastName` varchar(46) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(46) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(46) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `contact` int(10) NOT NULL,
  `address` varchar(46) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `dept` varchar(46) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `degree` varchar(46) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `position` varchar(46) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `firstName`, `lastName`, `email`, `birthday`, `gender`, `contact`, `address`, `dept`, `degree`, `position`) VALUES
(2, 'bo', 'man', 'boxman12435@gmail.com', '0001-01-01', 'Male', 923131231, 'box world', 'Box Academy', 'MA', 'Janitor'),
(5, 'Aoi', 'mango', 'mark@email.com', '0002-02-02', 'Male', 2, 'Dr.c de leon', 'Dep', 'BS', 'Janitor'),
(6, 'last testt', 'yes', 'yes@ye', '2025-04-01', 'Female', 2147483647, 'Llanfair Pwllgwyngyll, UK', 'Department of Test', 'MA', 'S. Janitor');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `salary_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` date NOT NULL,
  `sss_deduction` decimal(10,2) NOT NULL,
  `philhealth_deduction` decimal(10,2) NOT NULL,
  `net_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`salary_id`, `employee_id`, `amount`, `payment_date`, `sss_deduction`, `philhealth_deduction`, `net_amount`) VALUES
(1, 2, 100.00, '2025-04-01', 5.00, 5.00, 90.00),
(2, 2, 111.00, '2025-04-02', 5.55, 5.55, 99.90),
(3, 5, 1.00, '2025-04-03', 0.05, 0.05, 0.90),
(4, 6, 1000000.00, '2041-12-12', 50000.00, 50000.00, 900000.00);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `full_name`, `email_address`, `password`, `city`, `country`, `created_at`) VALUES
(1, 'Inspector', 'inspector@gmail.com', 'inspector123', 'Gapan', 'Philippines', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`salary_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
