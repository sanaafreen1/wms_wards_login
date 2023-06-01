-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2023 at 07:20 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

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
-- Table structure for table `blood_group`
--

CREATE TABLE `blood_group` (
  `id` bigint(20) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_group`
--

INSERT INTO `blood_group` (`id`, `blood_group`, `created_at`, `updated_at`) VALUES
(1, 'A+', '2023-05-25 16:07:28', '2023-05-25 16:07:28'),
(2, 'A-', '2023-05-25 16:07:28', '2023-05-25 16:07:28'),
(3, 'B+', '2023-05-25 16:07:48', '2023-05-25 16:07:48'),
(4, 'B-', '2023-05-25 16:07:48', '2023-05-25 16:07:48'),
(5, 'O+', '2023-05-25 16:08:05', '2023-05-25 16:08:05'),
(6, 'O-', '2023-05-25 16:08:05', '2023-05-25 16:08:05'),
(7, 'AB+', '2023-05-25 16:08:25', '2023-05-25 16:08:25'),
(8, 'AB-', '2023-05-25 16:08:25', '2023-05-25 16:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `citizen_service_mst`
--

CREATE TABLE `citizen_service_mst` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `status` int(4) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `citizen_service_mst`
--

INSERT INTO `citizen_service_mst` (`service_id`, `service_name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Pensions', 0, NULL, 1, '2023-05-09 06:56:10', '2023-05-31 00:26:09'),
(2, 'Raithu Bandhu', 0, NULL, NULL, '2023-05-09 06:56:10', '2023-05-09 06:56:10'),
(3, 'Pan Card', 0, 1, 1, '2023-05-09 05:06:08', '2023-05-09 06:17:55'),
(4, 'addhar card', 2, 1, 1, '2023-05-09 05:15:45', '2023-05-09 06:17:40'),
(5, 'Aadhar Card', 0, 1, 1, '2023-05-09 06:22:08', '2023-05-14 23:37:18'),
(6, 'aadhar', 2, 1, NULL, '2023-05-10 04:06:42', '2023-05-11 00:41:14'),
(7, 'Voterid', 0, 1, 1, '2023-05-31 00:23:47', '2023-05-31 00:26:35'),
(8, 'fdfdhgfjhgffsdghdfhg', 2, 1, 1, '2023-05-31 00:26:47', '2023-05-31 00:27:03');

-- --------------------------------------------------------

--
-- Table structure for table `citizen_sub_service_mst`
--

CREATE TABLE `citizen_sub_service_mst` (
  `sub_service_id` int(11) NOT NULL,
  `sub_service_name` varchar(50) NOT NULL,
  `service_id` int(11) NOT NULL,
  `status` int(4) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `citizen_sub_service_mst`
--

INSERT INTO `citizen_sub_service_mst` (`sub_service_id`, `sub_service_name`, `service_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Adhaar card', 1, 0, NULL, 1, '2023-05-09 06:58:56', '2023-05-31 00:28:44'),
(2, 'Ration card', 2, 0, NULL, NULL, '2023-05-09 06:58:56', '2023-05-09 06:58:56'),
(3, 'gggg', 1, 2, 1, 1, '2023-05-10 04:16:17', '2023-05-10 04:16:31'),
(4, 'passbook', 2, 0, 1, NULL, '2023-05-31 00:27:51', '2023-05-31 00:27:51'),
(5, 'birthcertificate', 7, 0, 1, NULL, '2023-05-31 00:29:16', '2023-05-31 00:29:16'),
(6, 'gggg', 1, 2, 1, 1, '2023-05-31 00:29:24', '2023-05-31 00:29:32');

-- --------------------------------------------------------

--
-- Table structure for table `document_mst`
--

CREATE TABLE `document_mst` (
  `document_id` int(11) NOT NULL,
  `document_name` varchar(100) NOT NULL,
  `status` int(4) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document_mst`
--

INSERT INTO `document_mst` (`document_id`, `document_name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Adhaar card', 0, NULL, NULL, '2023-05-09 07:02:05', '2023-05-09 07:02:05'),
(2, 'Ration card', 0, NULL, NULL, '2023-05-09 07:02:05', '2023-05-09 07:02:05'),
(3, 'Pan card', 0, NULL, NULL, '2023-05-10 07:07:08', '2023-05-10 07:07:08'),
(4, 'Labour card', 0, NULL, NULL, '2023-05-10 07:07:35', '2023-05-10 07:07:35'),
(5, 'Pension', 0, NULL, NULL, '2023-05-10 07:07:35', '2023-05-10 07:07:35'),
(6, 'birth certificate', 0, NULL, NULL, '2023-05-10 07:08:08', '2023-05-10 07:08:08'),
(7, 'Loan', 2, NULL, 1, '2023-05-10 07:08:08', '2023-05-10 03:59:11'),
(8, 'caste cerificate', 0, 1, 1, '2023-05-10 04:07:05', '2023-05-31 00:31:21'),
(9, 'passbook', 2, 1, 1, '2023-05-31 00:30:10', '2023-05-31 00:31:35');

-- --------------------------------------------------------

--
-- Table structure for table `education_details_mst`
--

CREATE TABLE `education_details_mst` (
  `id` bigint(20) NOT NULL,
  `edu_details` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education_details_mst`
--

INSERT INTO `education_details_mst` (`id`, `edu_details`, `created_at`, `updated_at`) VALUES
(1, 'BBA ', '2023-05-23 11:32:13', '2023-05-23 11:32:13'),
(2, 'Bcom', '2023-05-23 11:32:13', '2023-05-23 11:32:13'),
(3, 'Btech', '2023-05-23 11:32:40', '2023-05-23 11:32:40'),
(4, 'BSC', '2023-05-23 11:32:40', '2023-05-23 11:32:40'),
(5, 'BZC', '2023-05-23 11:32:52', '2023-05-23 11:32:52'),
(6, 'MSC', '2023-05-23 11:32:52', '2023-05-23 11:32:52'),
(7, 'MBA', '2023-05-23 11:33:09', '2023-05-23 11:33:09'),
(8, 'MCA', '2023-05-23 11:33:09', '2023-05-23 11:33:09'),
(9, 'Mtech', '2023-05-23 11:33:27', '2023-05-23 11:33:27'),
(10, 'Mcom', '2023-05-23 11:33:27', '2023-05-23 11:33:27'),
(11, 'Illiterate', '2023-05-23 11:33:46', '2023-05-23 11:33:46'),
(12, 'SSC', '2023-05-23 11:33:46', '2023-05-23 11:33:46'),
(13, 'Below 10th', '2023-05-23 11:33:59', '2023-05-23 11:33:59');

-- --------------------------------------------------------

--
-- Table structure for table `education_mst`
--

CREATE TABLE `education_mst` (
  `id` bigint(20) NOT NULL,
  `education` varchar(255) NOT NULL,
  `telugu` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education_mst`
--

INSERT INTO `education_mst` (`id`, `education`, `telugu`, `created_at`, `updated_at`) VALUES
(1, 'Illiterate', 'నిరక్షరాస్యుడు', '2023-05-23 11:22:30', '2023-05-23 11:22:30'),
(2, 'Pursuing School ', 'పాఠశాలను కొనసాగిస్తోంది', '2023-05-23 11:23:15', '2023-05-23 11:23:15'),
(3, 'Completed Schooling ', 'పాఠశాల విద్య పూర్తి చేశారు', '2023-05-23 11:23:15', '2023-05-23 11:23:15'),
(4, 'Pursuing Degree', 'డిగ్రీని అభ్యసిస్తున్నారు', '2023-05-23 11:23:55', '2023-05-23 11:23:55'),
(5, 'Completed Degree', 'డిగ్రీ పూర్తి చేశారు', '2023-05-23 11:23:55', '2023-05-23 11:23:55'),
(6, 'Pursuing PG ', 'పీజీ చదువుతున్నారు', '2023-05-23 11:24:39', '2023-05-23 11:24:39'),
(7, 'Completed PG', 'పీజీ పూర్తి చేశారు', '2023-05-23 11:24:39', '2023-05-23 11:24:39');

-- --------------------------------------------------------

--
-- Table structure for table `enter_service_details`
--

CREATE TABLE `enter_service_details` (
  `id` bigint(20) NOT NULL,
  `basic_details_id` bigint(20) NOT NULL,
  `house_owner_id` bigint(20) NOT NULL,
  `family_details_id` bigint(20) NOT NULL,
  `service_id` bigint(20) NOT NULL,
  `sub_service_id` bigint(20) NOT NULL,
  `service_status` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enter_service_details`
--

INSERT INTO `enter_service_details` (`id`, `basic_details_id`, `house_owner_id`, `family_details_id`, `service_id`, `sub_service_id`, `service_status`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, '1', 0, NULL, NULL, '2023-05-31 12:39:28', '2023-05-31 12:39:28'),
(2, 3, 3, 3, 1, 1, '1', 0, 2, NULL, '2023-05-31 12:39:28', '2023-05-31 07:15:19'),
(3, 4, 3, 0, 1, 1, '1', 0, 2, NULL, '2023-05-31 23:02:52', '2023-05-31 23:02:52'),
(4, 1, 1, 0, 2, 2, '1', 0, 2, NULL, '2023-05-31 23:16:27', '2023-05-31 23:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `enter_service_doc_map`
--

CREATE TABLE `enter_service_doc_map` (
  `id` bigint(20) NOT NULL,
  `enter_service_id` int(11) NOT NULL,
  `document_id` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enter_service_doc_map`
--

INSERT INTO `enter_service_doc_map` (`id`, `enter_service_id`, `document_id`, `created_at`, `updated_at`) VALUES
(3, 2, '3', '2023-05-31 18:15:19', '2023-05-31 18:15:19'),
(4, 2, '4', '2023-05-31 18:15:19', '2023-05-31 18:15:19'),
(5, 3, '1', '2023-06-01 10:02:52', '2023-06-01 10:02:52'),
(6, 4, '2', '2023-06-01 10:16:27', '2023-06-01 10:16:27');

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
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `family_members_details`
--

INSERT INTO `family_members_details` (`id`, `basic_details_id`, `houseownerdetails_id`, `relation_with_houseowner`, `member_name`, `date_of_birth`, `mobile`, `education`, `education_details`, `staying_out_oftown`, `location_ofthe_person`, `enter_the_details`, `occupation`, `gender`, `blood_group`, `b_p`, `sugar`, `covid_vaccine`, `pension`, `type_of_pension`, `upload_photo`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1', 'shreyas', '1996-12-06', 7032665426, '5', '2', '1', '', 'korutla', '5', 'Male', '5', NULL, NULL, NULL, NULL, '5', 'compressed_1685594725_boy.jpg', 0, NULL, NULL, '2023-05-31 23:15:25', '2023-05-31 23:18:54'),
(2, 1, 1, '2', 'sushmitha', '2002-02-10', 9876542351, '5', '2', '1', 'Staying in the state', 'korutla', '4', 'Female', '3', NULL, NULL, NULL, NULL, NULL, 'compressed_1685594773_girls.jpg', 0, NULL, NULL, '2023-06-01 04:46:13', '2023-06-01 04:46:13');

-- --------------------------------------------------------

--
-- Table structure for table `house_owner_details`
--

CREATE TABLE `house_owner_details` (
  `id` bigint(20) NOT NULL,
  `basic_details_id` bigint(20) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `mobilenumber` bigint(20) NOT NULL,
  `education` varchar(255) NOT NULL,
  `education_details` varchar(255) NOT NULL,
  `staying_of_the_town` varchar(255) NOT NULL COMMENT '1.staying of town',
  `location_of_the_person` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `bp` varchar(255) DEFAULT NULL,
  `sugar` varchar(255) DEFAULT NULL,
  `covid_vaccine` varchar(255) DEFAULT NULL,
  `pension` varchar(255) DEFAULT NULL,
  `type_of_pension` varchar(255) DEFAULT NULL,
  `upload_photo` varchar(255) NOT NULL,
  `status` int(4) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `house_owner_details`
--

INSERT INTO `house_owner_details` (`id`, `basic_details_id`, `owner_name`, `date_of_birth`, `mobilenumber`, `education`, `education_details`, `staying_of_the_town`, `location_of_the_person`, `details`, `occupation`, `gender`, `blood_group`, `bp`, `sugar`, `covid_vaccine`, `pension`, `type_of_pension`, `upload_photo`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'shreyas', '1996-12-06', 7032665426, '5', '2', '1', 'Staying in the state', 'korutla', '5', 'Male', '1', NULL, NULL, NULL, NULL, '1', 'compressed_1685595107_shreyas.jpg', 0, NULL, NULL, '2023-05-31 23:15:25', '2023-05-31 23:21:47');

-- --------------------------------------------------------

--
-- Table structure for table `location_of_person`
--

CREATE TABLE `location_of_person` (
  `id` bigint(20) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location_of_person`
--

INSERT INTO `location_of_person` (`id`, `location`) VALUES
(1, 'Staying in the state / రాష్ట్రంలోనే ఉంటున్నారు'),
(2, 'Staying out of the state / రాష్ట్రం వెలుపల ఉంటున్నారు'),
(3, ' Staying out of the country / దేశం వెలుపల ఉంటున్నారు');

-- --------------------------------------------------------

--
-- Table structure for table `occupation_mst`
--

CREATE TABLE `occupation_mst` (
  `id` bigint(20) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `telugu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `occupation_mst`
--

INSERT INTO `occupation_mst` (`id`, `occupation`, `telugu`) VALUES
(1, 'Lawyer  ', 'న్యాయవాది'),
(2, 'Docter  ', 'వైద్యుడు'),
(3, 'Engineer ', 'ఇంజనీర్'),
(4, 'Private Employee ', 'ప్రైవేట్ ఉద్యోగి'),
(5, 'Bank Employee ', 'బ్యాంకు ఉద్యోగి'),
(6, 'Business ', 'వ్యాపారం'),
(7, 'Labour ', 'కార్మికులు');

-- --------------------------------------------------------

--
-- Table structure for table `relation_mst`
--

CREATE TABLE `relation_mst` (
  `id` int(11) NOT NULL,
  `relation_name` varchar(255) NOT NULL,
  `telugu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `relation_mst`
--

INSERT INTO `relation_mst` (`id`, `relation_name`, `telugu`) VALUES
(1, 'owner', 'యజమాని'),
(2, 'wife', 'భార్య'),
(3, 'Father', 'తండ్రి'),
(4, 'Mother', 'తల్లి'),
(5, 'Daughter', 'కూతురు'),
(6, 'Son', 'కొడుకు'),
(7, 'Brother', 'సోదరుడు'),
(8, 'Sister', 'సోదరి'),
(9, 'Son-In-Law', 'అల్లుడు'),
(10, 'Daughter-In-Law', 'కోడలు'),
(11, 'Mother-In-Law', 'అత్తగారు'),
(12, 'Father-In-Law', 'మామగారు');

-- --------------------------------------------------------

--
-- Table structure for table `sub_service_document_map`
--

CREATE TABLE `sub_service_document_map` (
  `id` bigint(20) NOT NULL,
  `service_id` int(11) NOT NULL,
  `sub_service_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `status` int(4) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_service_document_map`
--

INSERT INTO `sub_service_document_map` (`id`, `service_id`, `sub_service_id`, `document_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 0, 1, NULL, '2023-05-10 05:57:11', '2023-05-31 00:32:08'),
(2, 2, 2, 1, 0, NULL, 1, '2023-05-10 05:57:19', '2023-05-31 00:33:19'),
(3, 1, 1, 2, 0, NULL, NULL, '2023-05-10 06:03:17', '2023-05-10 06:03:17'),
(4, 1, 1, 3, 0, NULL, NULL, '2023-05-10 06:03:17', '2023-05-10 06:03:17'),
(5, 1, 1, 4, 0, NULL, NULL, '2023-05-10 06:03:17', '2023-05-10 06:03:17'),
(6, 1, 1, 5, 0, NULL, NULL, '2023-05-10 06:03:17', '2023-05-10 06:03:17'),
(7, 1, 1, 6, 0, NULL, NULL, '2023-05-10 06:03:17', '2023-05-10 06:03:17'),
(8, 1, 1, 7, 0, NULL, NULL, '2023-05-10 06:03:17', '2023-05-10 06:03:17'),
(9, 1, 1, 8, 0, NULL, NULL, '2023-05-10 06:03:17', '2023-05-10 06:03:17'),
(10, 1, 3, 1, 2, NULL, 1, '2023-05-10 06:03:31', '2023-05-31 00:34:04'),
(11, 1, 3, 2, 2, NULL, 1, '2023-05-10 06:03:31', '2023-05-31 00:34:04'),
(12, 1, 3, 3, 2, NULL, 1, '2023-05-10 06:03:31', '2023-05-31 00:34:04'),
(13, 2, 2, 2, 0, NULL, 1, '2023-05-12 03:35:29', '2023-05-31 00:33:19'),
(14, 2, 2, 3, 0, NULL, 1, '2023-05-12 03:35:29', '2023-05-31 00:33:19'),
(15, 2, 2, 5, 0, NULL, 1, '2023-05-12 03:35:29', '2023-05-31 00:33:19'),
(16, 2, 2, 8, 0, NULL, 1, '2023-05-12 03:35:29', '2023-05-31 00:33:19'),
(17, 2, 2, 0, 2, NULL, 1, '2023-05-12 03:35:29', '2023-05-31 00:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `type_of_pension`
--

CREATE TABLE `type_of_pension` (
  `id` int(11) NOT NULL,
  `type_of_pension` varchar(255) NOT NULL,
  `telugu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type_of_pension`
--

INSERT INTO `type_of_pension` (`id`, `type_of_pension`, `telugu`) VALUES
(1, ' Old Age Pension', 'వృద్ధాప్య పెన్షన్'),
(2, ' Widow Pension', 'వితంతు పింఛను'),
(3, 'Disabled Pension', 'వికలాంగుల పెన్షన్'),
(4, 'Beedi Workers Pension', 'బీడీ కార్మికుల పెన్షన్'),
(5, ' Single Women Pension', 'ఒంటరి మహిళల పెన్షన్'),
(6, 'Persons with HIV-AIDS Pension', 'HIV-AIDS పెన్షన్ ఉన్న వ్యక్తులు'),
(7, 'Weavers Pension', 'నేత కార్మికుల పెన్షన్'),
(8, 'Filaria Patient Pension', 'ఫైలేరియా పేషెంట్ పెన్షన్'),
(9, 'Toddy Tappers Pension', 'టాడీ ట్యాపర్స్ పెన్షన్');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1-admin,2-wardslogin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, '$2y$10$BN0otXrebM0hEYkdGjEEP.oj7nR0ZV3tVD2JBBT8Kwqnaj3VXhRrq', NULL, '1', NULL, NULL),
(2, 'Wardslogin', 'wardslogin', NULL, '$2y$10$BN0otXrebM0hEYkdGjEEP.oj7nR0ZV3tVD2JBBT8Kwqnaj3VXhRrq', NULL, '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wards_basic_details`
--

CREATE TABLE `wards_basic_details` (
  `id` bigint(20) NOT NULL,
  `house_no` varchar(255) NOT NULL,
  `house_details` varchar(255) NOT NULL,
  `type_of_house` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `caste` varchar(255) NOT NULL,
  `annual_income` double NOT NULL,
  `ration_card` varchar(255) NOT NULL,
  `type_of_ration_card` varchar(255) NOT NULL,
  `ration_card_no` bigint(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `service_status` int(11) NOT NULL DEFAULT 0 COMMENT '1.Documents are to be collected\r\n2.Request to be submitted to the Department\r\n3.Requests submitted to the Department\r\n4.Service request completed',
  `status` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wards_basic_details`
--

INSERT INTO `wards_basic_details` (`id`, `house_no`, `house_details`, `type_of_house`, `religion`, `caste`, `annual_income`, `ration_card`, `type_of_ration_card`, `ration_card_no`, `address`, `service_status`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '122-522', 'owned', 'Slab', 'Hindu', 'BC', 90000, 'Yes', 'Pink', 16546467967465, 'treyuyt', 0, 0, 2, NULL, '2023-05-31 23:14:19', '2023-05-31 23:14:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_group`
--
ALTER TABLE `blood_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `citizen_service_mst`
--
ALTER TABLE `citizen_service_mst`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `citizen_sub_service_mst`
--
ALTER TABLE `citizen_sub_service_mst`
  ADD PRIMARY KEY (`sub_service_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `sub_service_id` (`sub_service_id`);

--
-- Indexes for table `document_mst`
--
ALTER TABLE `document_mst`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `education_details_mst`
--
ALTER TABLE `education_details_mst`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_mst`
--
ALTER TABLE `education_mst`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enter_service_details`
--
ALTER TABLE `enter_service_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enter_service_doc_map`
--
ALTER TABLE `enter_service_doc_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `family_members_details`
--
ALTER TABLE `family_members_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `basic_details_id` (`basic_details_id`,`houseownerdetails_id`);

--
-- Indexes for table `house_owner_details`
--
ALTER TABLE `house_owner_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `basic_details_id` (`basic_details_id`);

--
-- Indexes for table `location_of_person`
--
ALTER TABLE `location_of_person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `occupation_mst`
--
ALTER TABLE `occupation_mst`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relation_mst`
--
ALTER TABLE `relation_mst`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_service_document_map`
--
ALTER TABLE `sub_service_document_map`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `sub_service_id` (`sub_service_id`),
  ADD KEY `document_id` (`document_id`);

--
-- Indexes for table `type_of_pension`
--
ALTER TABLE `type_of_pension`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wards_basic_details`
--
ALTER TABLE `wards_basic_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_group`
--
ALTER TABLE `blood_group`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `citizen_service_mst`
--
ALTER TABLE `citizen_service_mst`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `citizen_sub_service_mst`
--
ALTER TABLE `citizen_sub_service_mst`
  MODIFY `sub_service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `document_mst`
--
ALTER TABLE `document_mst`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `education_details_mst`
--
ALTER TABLE `education_details_mst`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `education_mst`
--
ALTER TABLE `education_mst`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `enter_service_details`
--
ALTER TABLE `enter_service_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `enter_service_doc_map`
--
ALTER TABLE `enter_service_doc_map`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `family_members_details`
--
ALTER TABLE `family_members_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `house_owner_details`
--
ALTER TABLE `house_owner_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location_of_person`
--
ALTER TABLE `location_of_person`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `occupation_mst`
--
ALTER TABLE `occupation_mst`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `relation_mst`
--
ALTER TABLE `relation_mst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sub_service_document_map`
--
ALTER TABLE `sub_service_document_map`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `type_of_pension`
--
ALTER TABLE `type_of_pension`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wards_basic_details`
--
ALTER TABLE `wards_basic_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `house_owner_details`
--
ALTER TABLE `house_owner_details`
  ADD CONSTRAINT `house_owner_details_ibfk_1` FOREIGN KEY (`basic_details_id`) REFERENCES `wards_basic_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
