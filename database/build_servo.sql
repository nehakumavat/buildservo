-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 24, 2018 at 11:27 PM
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
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact_us`
--

INSERT INTO `tbl_contact_us` (`id`, `name`, `mobile_no`, `email_id`, `subject`, `message`, `created_at`) VALUES
(2, 'Nikhil Vharamble', 987654321, 'niks@gmail.com', 'Subject', 'messages', '2018-06-13 22:02:42');

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
  `customer_profile_id` bigint(20) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_address` varchar(250) NOT NULL,
  `customer_city` varchar(155) NOT NULL,
  `customer_pincode` int(11) NOT NULL,
  `customer_mob` bigint(20) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_password` varchar(100) NOT NULL,
  `is_active` int(5) NOT NULL,
  `is_deleted` int(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer_profile`
--

INSERT INTO `tbl_customer_profile` (`customer_profile_id`, `customer_name`, `customer_address`, `customer_city`, `customer_pincode`, `customer_mob`, `customer_email`, `customer_password`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(2, 'Akshay', 'pune', 'pune', 411037, 7709975028, 'a@g.c', 'e10adc3949ba59abbe56e057f20f883e', 1, 0, '2018-06-04 10:50:33', '2018-06-04 10:50:33'),
(3, 'xyz', 'pune', 'pune', 411069, 3214567890, 'xyz@g.c', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '2018-06-04 11:16:52', '2018-06-04 11:16:52'),
(4, 'Akki Tambekar', 'kalamba', 'kolhapur', 416007, 7709975028, 'akki@gmail.com', '2de1b2d6a6738df78c5f9733853bd170', 1, 0, '2018-06-05 11:17:44', '2018-06-10 18:52:20'),
(5, 'Nikhil Vharamble', 'Kolhapur', 'kolhapur', 413512, 987654321, 'niks@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 0, '2018-06-12 22:19:39', '2018-06-12 22:19:39');

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
(1, 'Akshay', 'akshay@gmail.com', 2147483647, 'pune', 1, 'best-poker-hands3.png', 0, '2018-05-30 19:38:19', '2018-05-30 19:38:19'),
(2, 'abc', 'abc@gmail.com', 1234567890, 'pune', 1, 'India-licensed-poker-website2.png', 0, '2018-05-30 19:50:35', '2018-06-01 16:37:50'),
(4, 'xyz', 'xyz@g.c', 2147483647, 'pune', 2, 'poker-hands.png', 1, '2018-05-30 19:56:22', '2018-05-30 19:56:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `rating` int(5) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `subject`, `comment`, `rating`, `customer_id`, `employee_id`, `created_at`) VALUES
(1, 'Subject', 'Comment', 2, 5, 2, '2018-06-19 15:08:17');

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
-- Table structure for table `tbl_package`
--

CREATE TABLE `tbl_package` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL,
  `service_id` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`package_id`, `package_name`, `cost`, `service_id`, `created_at`, `updated_at`) VALUES
(2, 'Enterprise', 10000, '1,3,4,5,6,7', '2018-06-24 00:29:47', '2018-06-24 00:31:18'),
(4, 'Professional', 7000, '1,3,4,5', '2018-06-24 00:39:00', '2018-06-24 00:40:10'),
(5, 'Standard', 5000, '1,3,4', '2018-06-24 00:39:30', '2018-06-24 00:39:30'),
(6, 'Basic', 3000, '1,3', '2018-06-24 00:40:46', '2018-06-24 00:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_selected_services`
--

CREATE TABLE `tbl_selected_services` (
  `id` bigint(20) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `service_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `booking_date` datetime NOT NULL,
  `service_status` int(15) NOT NULL COMMENT 'Pending=1,Confirmed=2,Cancelled=3,In progress=4,Completed=5',
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pincode` int(6) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_selected_services`
--

INSERT INTO `tbl_selected_services` (`id`, `customer_id`, `service_id`, `employee_id`, `booking_date`, `service_status`, `address`, `city`, `pincode`, `created_at`, `updated_at`) VALUES
(6, 4, 3, 0, '2018-06-15 00:00:00', 3, 'pune', 'pune', 411068, '2018-06-08 18:18:57', '2018-06-08 18:18:57'),
(7, 4, 5, 0, '2018-06-22 00:00:00', 3, 'pune', 'pune', 411068, '2018-06-08 18:19:11', '2018-06-08 18:19:11'),
(8, 4, 9, 1, '2018-06-14 00:00:00', 3, 'pune', 'pune', 411068, '2018-06-10 17:23:17', '2018-06-12 22:17:29'),
(9, 5, 1, 2, '2018-06-16 00:00:00', 2, 'Kolhapur', 'Kolhapur', 413512, '2018-06-12 22:26:42', '2018-06-12 22:30:32'),
(10, 5, 8, 0, '2018-06-20 00:00:00', 1, 'Kolhapur', 'Kolhapur', 413512, '2018-06-12 22:39:44', '2018-06-12 22:39:44'),
(11, 5, 4, 1, '2018-06-14 00:00:00', 3, 'Kolhapur', 'Kolhapur', 413512, '2018-06-13 10:25:00', '2018-06-13 10:25:26');

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

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`id`, `name`, `description`, `service_image`, `service_status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Plumbing', 'Plumbing Description', 'Plumbing.jpg', 1, 0, '2018-06-04 19:53:42', '2018-06-08 12:39:20'),
(2, 'XYZ', 'XYZ Description', 'India-licensed-poker-website1.png', 2, 1, '2018-06-04 19:57:53', '2018-06-04 20:01:20'),
(3, 'Tile repairing & Work', 'Tile repairing & Work description', 'tiles_work.jpg', 1, 0, '2018-06-08 12:37:46', '2018-06-08 12:37:46'),
(4, 'House design & Build', 'House design & Build Description', 'house_work.jpg', 1, 0, '2018-06-08 12:38:09', '2018-06-08 12:38:09'),
(5, 'Interior designing', 'Interior designing Description', 'Interior_designing.jpg', 1, 0, '2018-06-08 12:38:53', '2018-06-08 12:38:53'),
(6, 'Electrical light fitting', 'Electrical light fitting Description', 'Electrical_fitting.jpg', 1, 0, '2018-06-08 12:39:12', '2018-06-08 12:39:12'),
(7, 'Painting', 'Painting Description', 'Painting.jpg', 1, 0, '2018-06-08 12:39:39', '2018-06-08 12:39:39'),
(8, 'Custom furniture', 'Custom furniture Description', 'Custom_furniture.jpg', 1, 0, '2018-06-08 12:40:00', '2018-06-08 12:40:00'),
(9, 'Fully furnish', 'Fully furnish description', 'Fully-furnish.jpg', 1, 0, '2018-06-08 12:40:21', '2018-06-08 12:40:21');

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
-- Indexes for table `tbl_contact_us`
--
ALTER TABLE `tbl_contact_us`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_list_area`
--
ALTER TABLE `tbl_list_area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `tbl_selected_services`
--
ALTER TABLE `tbl_selected_services`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `tbl_contact_us`
--
ALTER TABLE `tbl_contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_customer_profile`
--
ALTER TABLE `tbl_customer_profile`
  MODIFY `customer_profile_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_list_area`
--
ALTER TABLE `tbl_list_area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_selected_services`
--
ALTER TABLE `tbl_selected_services`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_service_booking`
--
ALTER TABLE `tbl_service_booking`
  MODIFY `service_booking_id` int(100) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
