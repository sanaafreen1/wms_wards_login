-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 12:39 PM
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
-- Table structure for table `type_of_pension`
--

CREATE TABLE `type_of_pension` (
  `id` int(11) NOT NULL,
  `type_of_pension` varchar(255) NOT NULL,
  `telugu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `type_of_pension`
--
ALTER TABLE `type_of_pension`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `type_of_pension`
--
ALTER TABLE `type_of_pension`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
