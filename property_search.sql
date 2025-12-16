-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2025 at 05:14 PM
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
-- Database: `property_search`
--

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `title`, `description`, `price`, `created`, `modified`) VALUES
(7, 'A Nice Place', 'A Nice Place offers comfortable living with modern amenities, bright rooms, and a welcoming atmosphere in a convenient, peaceful location.', 119000.00, NULL, NULL),
(8, 'An Extravagant Mansion', 'This extravagant mansion showcases grand architecture, sweeping staircases, luxury finishes, resort-style amenities, expansive gardens, and breathtaking views, offering unmatched elegance, privacy, and sophistication for elite living and unforgettable entertaining experiences.', 1250000.00, NULL, NULL),
(9, 'House By Water', 'This charming lakeside home offers peaceful views, gentle breezes, cozy interiors, and direct water access, perfect for relaxing mornings, outdoor adventures, and tranquil living surrounded by natural beauty.', 500000.00, NULL, NULL),
(10, 'A Modest Home', 'It\'s a nice place, with all the amenities. Furniture optional.', 85000.00, '2025-12-16 03:11:22', '2025-12-16 03:11:22');

-- --------------------------------------------------------

--
-- Table structure for table `property_photos`
--

CREATE TABLE `property_photos` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_photos`
--

INSERT INTO `property_photos` (`id`, `property_id`, `filename`, `created`) VALUES
(1, 7, '69408227ad943.jpg', NULL),
(2, 8, '6940cb43a9f4e8.90125037.jpg', NULL),
(3, 9, '6940cbb8cd89d0.34185428.jpg', NULL),
(4, 9, '6940cbba327704.88736799.jpg', NULL),
(5, 9, '6940cbbae1b554.05761914.jpg', NULL),
(6, 10, '6940cdda483550.48769677.jpg', NULL),
(7, 10, '6940cddb581e52.18395242.jpg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_photos`
--
ALTER TABLE `property_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `property_photos`
--
ALTER TABLE `property_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `property_photos`
--
ALTER TABLE `property_photos`
  ADD CONSTRAINT `property_photos_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
