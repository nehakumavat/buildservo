ALTER TABLE `tbl_employee` ADD `profile_image` VARCHAR(150) NOT NULL AFTER `designation_id`;
ALTER TABLE `tbl_employee` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `tbl_employee` ADD `is_deleted` INT(5) NOT NULL AFTER `profile_image`;
ALTER TABLE `tbl_employee` CHANGE `mobile_no` `mobile_no` BIGINT NOT NULL;
ALTER TABLE `tbl_custmore_profile` ADD `customer_name` VARCHAR(100) NOT NULL AFTER `custmore_profile_id`;
ALTER TABLE `tbl_custmore_profile` ADD `created_at` DATETIME NOT NULL AFTER `customer_password`, ADD `updated_at` DATETIME NOT NULL AFTER `created_at`;
ALTER TABLE `tbl_custmore_profile` ADD `is_active` INT(5) NOT NULL AFTER `customer_password`, ADD `is_deleted` INT(5) NOT NULL AFTER `is_active`;

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
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

/************New Changes************/

ALTER TABLE `tbl_selected_services` ADD `address` VARCHAR(255) NOT NULL AFTER `service_status`, ADD `city` VARCHAR(100) NOT NULL AFTER `address`, ADD `pincode` INT(6) NOT NULL AFTER `city`;
ALTER TABLE `tbl_selected_services` ADD `created_at` DATETIME NOT NULL AFTER `pincode`, ADD `updated_at` DATETIME NOT NULL AFTER `created_at`;
ALTER TABLE `tbl_selected_services` CHANGE `custmore_id` `customer_id` INT(100) NOT NULL;
ALTER TABLE `tbl_selected_services` ADD `service_id` INT NOT NULL AFTER `customer_id`;



ALTER TABLE `tbl_selected_services` ADD `employee_id` INT(11) NOT NULL AFTER `service_id`;


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
(1, 'Nikhil Vharamble', 987654321, 'niks@gmail.com', 'Subject', 'messages', '2018-06-13 22:01:56'),
(2, 'Nikhil Vharamble', 987654321, 'niks@gmail.com', 'Subject', 'messages', '2018-06-13 22:02:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_contact_us`
--
ALTER TABLE `tbl_contact_us`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_contact_us`
--
ALTER TABLE `tbl_contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
