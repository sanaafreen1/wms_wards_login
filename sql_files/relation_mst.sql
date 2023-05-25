-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 09:09 AM
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
-- Table structure for table `relation_mst`
--

CREATE TABLE `relation_mst` (
  `id` int(11) NOT NULL,
  `relation_name` varchar(255) NOT NULL,
  `telugu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `relation_mst`
--
ALTER TABLE `relation_mst`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `relation_mst`
--
ALTER TABLE `relation_mst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
