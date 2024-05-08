-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2024 at 09:31 AM
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
-- Database: `real_estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `ProfileID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `AgentID` int(11) NOT NULL,
  `ProfileID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`AgentID`, `ProfileID`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `BuyerID` int(11) NOT NULL,
  `ProfileID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`BuyerID`, `ProfileID`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `propertylisting`
--

CREATE TABLE `propertylisting` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `size` int(11) NOT NULL,
  `beds` int(11) NOT NULL,
  `baths` int(11) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `posted_date` date DEFAULT NULL,
  `status` enum('active','sold','pending','removed') DEFAULT 'active',
  `AgentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `propertylisting`
--

INSERT INTO `propertylisting` (`id`, `address`, `price`, `size`, `beds`, `baths`, `image_url`, `description`, `posted_date`, `status`, `AgentID`) VALUES
(1, '1234 Maple Street, Anytown, ST 12345', 350000.00, 1500, 3, 2, 'https://img.freepik.com/premium-photo/3d-visualization-villa-dubai-modern-architecture-evening-illumination-facade_727625-88.jpg', 'Lovely three-bedroom home in a quiet neighborhood. Includes a newly renovated kitchen and spacious backyard.', '2024-05-01', 'active', NULL),
(3, '2500 Oak Lane, Rivertown, LM 67890', 275000.00, 1800, 4, 3, 'https://img.freepik.com/free-photo/luxury-pool-villa-spectacular-contemporary-design-digital-art-real-estate-home-house-property-ge_1258-150765.jpg?size=626&ext=jpg&ga=GA1.1.1957074624.1714807663&semt=sph', 'Beautiful four-bedroom home with panoramic river views, featuring a large deck and a master suite with a walk-in closet.', '2024-05-10', 'active', NULL),
(4, '500 Elm Street, Downtown, DS 89012', 485000.00, 1200, 2, 2, 'https://img.freepik.com/free-photo/design-house-modern-villa-with-open-plan-living-private-bedroom-wing-large-terrace-with-privacy_1258-169758.jpg?size=626&ext=jpg&ga=GA1.1.1957074624.1714807663&semt=sph', 'Modern two-bedroom apartment with a spacious open plan living area and state-of-the-art kitchen. Located in the heart of downtown, close to shopping, nightlife, and public transport.', '2024-05-04', 'active', NULL),
(13, 'Sad hamster 123 @ woodlands ', 450000.00, 2000, 2, 1, 'hamster.jpg', 'sad hamse', '2024-05-05', 'active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ratingsandreviews`
--

CREATE TABLE `ratingsandreviews` (
  `ReviewID` int(11) NOT NULL,
  `ReviewerID` int(11) NOT NULL,
  `AgentID` int(11) NOT NULL,
  `Rating` int(11) DEFAULT NULL CHECK (`Rating` between 1 and 5),
  `Comment` text DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratingsandreviews`
--

INSERT INTO `ratingsandreviews` (`ReviewID`, `ReviewerID`, `AgentID`, `Rating`, `Comment`, `Date`) VALUES
(2, 3, 1, 5, 'Outstanding service and support.', '2024-05-06 06:46:40');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `SellerID` int(11) NOT NULL,
  `ProfileID` int(11) NOT NULL,
  `AgentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`SellerID`, `ProfileID`, `AgentID`) VALUES
(4, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'active',
  `ProfileID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `birthdate`, `address`, `contact`, `status`, `ProfileID`) VALUES
(1, 'admin', 'admin123', '1975-01-15', '123 Admin Blvd, Capital City', '555-1234', 'active', 1),
(2, 'agent', 'agent123', '1980-08-25', '234 Agent Way, Metro Town', '555-5678', 'active', 2),
(3, 'buyer', 'buyer123', '1990-05-30', '345 Buyer Street, Market City', '555-8765', 'active', 3),
(4, 'seller', 'seller123', '1985-12-09', '456 Seller Lane, Commerce Ville', '555-4321', 'active', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `profile_id` int(11) NOT NULL,
  `profile_type` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`profile_id`, `profile_type`, `description`, `status`) VALUES
(1, 'Admin', 'I am the system admin', 'active'),
(2, 'Agent', 'I am an agent (changed)', 'active'),
(3, 'Buyer', 'I am a Buyer (changed)', 'active'),
(4, 'Seller', 'I am a Seller', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`),
  ADD KEY `ProfileID` (`ProfileID`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`AgentID`),
  ADD KEY `fk_agent_user` (`ProfileID`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`BuyerID`),
  ADD KEY `fk_buyer_user` (`ProfileID`);

--
-- Indexes for table `propertylisting`
--
ALTER TABLE `propertylisting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_AgentID` (`AgentID`);

--
-- Indexes for table `ratingsandreviews`
--
ALTER TABLE `ratingsandreviews`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `ReviewerID` (`ReviewerID`),
  ADD KEY `AgentID` (`AgentID`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`SellerID`),
  ADD KEY `FK_SellerAgent` (`AgentID`),
  ADD KEY `fk_seller_user` (`ProfileID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_profile_id` (`ProfileID`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD UNIQUE KEY `profile_name` (`profile_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `AgentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `BuyerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `propertylisting`
--
ALTER TABLE `propertylisting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ratingsandreviews`
--
ALTER TABLE `ratingsandreviews`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `SellerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`ProfileID`) REFERENCES `user_profile` (`profile_id`);

--
-- Constraints for table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `agent_ibfk_1` FOREIGN KEY (`ProfileID`) REFERENCES `user_profile` (`profile_id`),
  ADD CONSTRAINT `fk_agent_user` FOREIGN KEY (`ProfileID`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `buyer`
--
ALTER TABLE `buyer`
  ADD CONSTRAINT `buyer_ibfk_1` FOREIGN KEY (`ProfileID`) REFERENCES `user_profile` (`profile_id`),
  ADD CONSTRAINT `fk_buyer_user` FOREIGN KEY (`ProfileID`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `propertylisting`
--
ALTER TABLE `propertylisting`
  ADD CONSTRAINT `FK_AgentID` FOREIGN KEY (`AgentID`) REFERENCES `agent` (`AgentID`);

--
-- Constraints for table `ratingsandreviews`
--
ALTER TABLE `ratingsandreviews`
  ADD CONSTRAINT `ratingsandreviews_ibfk_1` FOREIGN KEY (`ReviewerID`) REFERENCES `user_profile` (`profile_id`),
  ADD CONSTRAINT `ratingsandreviews_ibfk_2` FOREIGN KEY (`AgentID`) REFERENCES `agent` (`AgentID`);

--
-- Constraints for table `seller`
--
ALTER TABLE `seller`
  ADD CONSTRAINT `FK_SellerAgent` FOREIGN KEY (`AgentID`) REFERENCES `agent` (`AgentID`),
  ADD CONSTRAINT `fk_seller_user` FOREIGN KEY (`ProfileID`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `seller_ibfk_1` FOREIGN KEY (`ProfileID`) REFERENCES `user_profile` (`profile_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_profile_id` FOREIGN KEY (`ProfileID`) REFERENCES `user_profile` (`profile_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
