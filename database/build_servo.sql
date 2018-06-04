-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 04, 2018 at 11:24 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.2.1-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `build_servo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(155) NOT NULL,
  `password` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'e6e061838856bf47e1de730719fb2609');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_signup`
--

CREATE TABLE `tbl_company_signup` (
  `company_id` int(100) NOT NULL,
  `company_name` text NOT NULL,
  `comany_address` varchar(250) NOT NULL,
  `company_cityname` varchar(100) NOT NULL,
  `company_pincode` varchar(250) NOT NULL,
  `company_mobileno` int(11) NOT NULL,
  `company_email_id` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_us`
--

CREATE TABLE `tbl_contact_us` (
  `full_name` text NOT NULL,
  `mobile_no` int(100) NOT NULL,
  `Requiement_detail` int(100) NOT NULL,
  `email_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_custmore_services_requirement`
--

CREATE TABLE `tbl_custmore_services_requirement` (
  `name` text NOT NULL,
  `mobile` int(100) NOT NULL,
  `service_name` text NOT NULL,
  `requiement_detail` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_profile`
--

CREATE TABLE `tbl_customer_profile` (
  `customer_profile_id` int(100) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_address` varchar(250) NOT NULL,
  `customer_city` varchar(50) NOT NULL,
  `customer_pincode` int(7) NOT NULL,
  `customer_mob` bigint(12) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_password` text NOT NULL,
  `is_active` int(5) NOT NULL,
  `is_deleted` int(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `new_password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer_profile`
--

INSERT INTO `tbl_customer_profile` (`customer_profile_id`, `customer_name`, `customer_address`, `customer_city`, `customer_pincode`, `customer_mob`, `customer_email`, `customer_password`, `is_active`, `is_deleted`, `created_at`, `updated_at`, `new_password`) VALUES
(1, 'Nikhil Vharamble', 'pune', 'pune', 411063, 1234567890, 'niks@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 0, '2018-06-04 22:00:52', '2018-06-04 22:00:52', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_designation`
--

CREATE TABLE `tbl_designation` (
  `id` int(11) NOT NULL,
  `designation_name` varchar(155) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_designation`
--

INSERT INTO `tbl_designation` (`id`, `designation_name`, `created_at`) VALUES
(1, 'Plumbing', '2018-05-29 16:00:00'),
(2, 'Electrician', '2018-05-29 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `profile_image` varchar(150) NOT NULL,
  `is_deleted` int(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `name`, `email_id`, `mobile_no`, `address`, `designation_id`, `profile_image`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'akshay tambekar', 'akshay@gmail.com', 2147483647, 'Pune', 1, '', 0, '2018-05-30 22:03:30', '2018-05-30 22:03:30'),
(2, 'nikhil vharamble', 'niks@gmail.com', 1234567890, 'pune', 2, '', 0, '2018-05-30 22:06:32', '2018-05-30 22:06:32'),
(3, 'akshu tambekar', 'akshu@gmail.com', 9876543210, 'Kolhpaur', 1, 'coepfinal1.jpg', 0, '2018-05-30 22:51:40', '2018-05-30 23:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_list_area`
--

CREATE TABLE `tbl_list_area` (
  `area_id` int(11) NOT NULL,
  `area` varchar(100) NOT NULL,
  `sub_area` varchar(100) NOT NULL,
  `pin_coad` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_selected_services`
--

CREATE TABLE `tbl_selected_services` (
  `custmore_id` int(100) NOT NULL,
  `booking_date` datetime NOT NULL,
  `service_id` int(100) NOT NULL,
  `service_name` varchar(250) NOT NULL,
  `service_status` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `service_image` varchar(150) NOT NULL,
  `service_status` int(5) NOT NULL,
  `is_deleted` int(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_booking`
--

CREATE TABLE `tbl_service_booking` (
  `service_booking_id` int(100) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `available_services` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_company_signup`
--
ALTER TABLE `tbl_company_signup`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `tbl_customer_profile`
--
ALTER TABLE `tbl_customer_profile`
  ADD PRIMARY KEY (`customer_profile_id`);

--
-- Indexes for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_list_area`
--
ALTER TABLE `tbl_list_area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `tbl_selected_services`
--
ALTER TABLE `tbl_selected_services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_service_booking`
--
ALTER TABLE `tbl_service_booking`
  ADD PRIMARY KEY (`service_booking_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_company_signup`
--
ALTER TABLE `tbl_company_signup`
  MODIFY `company_id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_customer_profile`
--
ALTER TABLE `tbl_customer_profile`
  MODIFY `customer_profile_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_list_area`
--
ALTER TABLE `tbl_list_area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_selected_services`
--
ALTER TABLE `tbl_selected_services`
  MODIFY `service_id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_service_booking`
--
ALTER TABLE `tbl_service_booking`
  MODIFY `service_booking_id` int(100) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
