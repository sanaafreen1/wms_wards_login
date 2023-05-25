-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 07:08 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emunicipal_wms`
--

-- --------------------------------------------------------

--
-- Table structure for table `family_members_details`
--

CREATE TABLE `family_members_details` (
  `id` bigint(20) NOT NULL,
  `basic_details_id` bigint(20) NOT NULL,
  `houseownerdetails_id` bigint(20) NOT NULL,
  `relation_with_houseowner` varchar(255) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `education` varchar(255) NOT NULL,
  `education_details` varchar(255) NOT NULL,
  `staying_out_oftown` varchar(255) NOT NULL,
  `location_ofthe_person` varchar(255) NOT NULL,
  `enter_the_details` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `b_p` varchar(255) DEFAULT NULL,
  `sugar` varchar(255) DEFAULT NULL,
  `covid_vaccine` varchar(255) DEFAULT NULL,
  `pension` varchar(255) DEFAULT NULL,
  `type_of_pension` varchar(255) DEFAULT NULL,
  `upload_photo` varchar(255) NOT NULL,
  `status` int(4) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `crated_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `family_members_details`
--

INSERT INTO `family_members_details` (`id`, `basic_details_id`, `houseownerdetails_id`, `relation_with_houseowner`, `member_name`, `date_of_birth`, `mobile`, `education`, `education_details`, `staying_out_oftown`, `location_ofthe_person`, `enter_the_details`, `occupation`, `gender`, `blood_group`, `b_p`, `sugar`, `covid_vaccine`, `pension`, `type_of_pension`, `upload_photo`, `status`, `created_by`, `updated_by`, `crated_at`, `updated_at`) VALUES
(1, 0, 0, '6', 'vinod', '2023-05-12', 0, '4', '2', 'on', 'Staying in the state', '3125222', 'Private Employee', 'Male', 'B+', NULL, NULL, NULL, NULL, 'Old Age Pension', 'compressed_1684832061_WhatsApp Image 2023-02-14 at 10.38.04 AM.jpeg', 0, NULL, NULL, '2023-05-23 08:54:21', '2023-05-23 08:54:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `family_members_details`
--
ALTER TABLE `family_members_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `family_members_details`
--
ALTER TABLE `family_members_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
