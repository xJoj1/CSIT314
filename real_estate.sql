-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 06:26 PM
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
  `Agent_name` varchar(255) DEFAULT NULL,
  `Company` varchar(255) DEFAULT NULL,
  `Experience` int(11) DEFAULT NULL,
  `ProfileID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`AgentID`, `Agent_name`, `Company`, `Experience`, `ProfileID`) VALUES
(1, 'John Wick', 'Underworld Agency', 12, 2),
(2, 'John Doe', 'Doe Estates', 5, 2);

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
  `AgentID` int(11) DEFAULT NULL,
  `bookmark` tinyint(1) DEFAULT 0,
  `views` int(11) DEFAULT 0,
  `shortlist_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `propertylisting`
--

INSERT INTO `propertylisting` (`id`, `address`, `price`, `size`, `beds`, `baths`, `image_url`, `description`, `posted_date`, `status`, `AgentID`, `bookmark`, `views`, `shortlist_count`) VALUES
(1, '1234 Maple Street, Anytown, ST 12345', 350000.00, 1500, 3, 2, 'https://img.freepik.com/premium-photo/3d-visualization-villa-dubai-modern-architecture-evening-illumination-facade_727625-88.jpg', 'Lovely three-bedroom home in a quiet neighborhood. Includes a newly renovated kitchen and spacious backyard.', '2024-05-01', 'active', 1, 0, 10, 9),
(2, '2500 Oak Lane, Rivertown, LM 67890', 450000.00, 2000, 2, 2, 'https://img.freepik.com/free-photo/luxury-pool-villa-spectacular-contemporary-design-digital-art-real-estate-home-house-property-ge_1258-150765.jpg?size=626&ext=jpg&ga=GA1.1.1957074624.1714807663&semt=sph', 'Beautiful four-bedroom home with panoramic river views, featuring a large deck and a master suite with a walk-in closet.', '2024-05-12', 'active', 1, 0, 5, 5),
(3, '500 Elm Street, Downtown, DS 89012', 485000.00, 1200, 2, 2, 'https://img.freepik.com/free-photo/design-house-modern-villa-with-open-plan-living-private-bedroom-wing-large-terrace-with-privacy_1258-169758.jpg?size=626&ext=jpg&ga=GA1.1.1957074624.1714807663&semt=sph', 'Modern two-bedroom apartment with a spacious open plan living area and state-of-the-art kitchen. Located in the heart of downtown, close to shopping, nightlife, and public transport.', '2024-05-04', 'active', 1, 0, 1, 15),
(27, 'a', 450000.00, 2000, 1, 1, 'https://img.freepik.com/free-photo/3d-rendering-house-model_23-2150799725.jpg?size=626&ext=jpg&ga=GA1.1.1957074624.1714807663&semt=sph', 'a', '2024-05-09', 'sold', 1, 0, 5, 15),
(28, 'b', 800000.00, 2500, 3, 2, 'https://img.freepik.com/free-photo/luxury-pool-villa-spectacular-contemporary-design-digital-art-real-estate-home-house-property-ge_1258-150762.jpg?size=626&ext=jpg&ga=GA1.1.1957074624.1714807663&semt=sph', 'b', '2024-05-09', 'sold', 1, 0, 3, 3),
(29, 'c', 333333.00, 3333, 2, 1, 'https://img.freepik.com/premium-photo/modern-house-exterior-minimal-style-with-white-concrete-wood_258219-572.jpg?size=626&ext=jpg&ga=GA1.1.1957074624.1714807663&semt=sph', 'c', '2024-05-09', 'sold', 1, 0, 2, 4),
(30, 'woodlands drive 17 block 555', 600000.00, 45000, 2, 1, 'https://img.freepik.com/premium-photo/modern-building-modern-house-with-pool_980226-9905.jpg?size=626&ext=jpg&ga=GA1.1.1957074624.1714807663&semt=sph', 'In the heartlands of woodlands', '2024-05-13', 'active', NULL, 0, 1, 0),
(31, '145 Boulevard chauffer lane', 500000.00, 500000, 1, 2, 'https://img.freepik.com/free-photo/house-isolated-field_1303-23773.jpg?size=626&ext=jpg&ga=GA1.1.1957074624.1714807663&semt=sph', 'very scenic surroundings', '2024-05-13', 'active', NULL, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rating_reviews`
--

CREATE TABLE `rating_reviews` (
  `ID` int(11) NOT NULL,
  `UserType` enum('buyer','seller','agent') DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `AgentID` int(11) NOT NULL,
  `Rating` int(11) DEFAULT NULL CHECK (`Rating` >= 1 and `Rating` <= 5),
  `Review` text DEFAULT NULL,
  `ReviewDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating_reviews`
--

INSERT INTO `rating_reviews` (`ID`, `UserType`, `UserID`, `AgentID`, `Rating`, `Review`, `ReviewDate`) VALUES
(1, 'buyer', 3, 2, 4, 'Very helpful and knowledgeable.', '2024-05-11 03:56:37'),
(8, 'buyer', 3, 2, 3, '3', '2024-05-11 15:43:35'),
(9, 'seller', 4, 2, 4, '4', '2024-05-11 16:41:12'),
(10, 'seller', 4, 2, 4, '4 star revew', '2024-05-11 16:43:04'),
(11, 'buyer', 3, 2, 5, 'I recently purchased a home through Underworld Agency, and I must say, the experience was nothing short of exceptional. From the very beginning, my agent demonstrated unparalleled professionalism and knowledge of the real estate market. What really stood out to me was the customer support. Anytime I had a question or concern, it was addressed promptly and with great care.\r\n\r\nThe agent went above and beyond by walking me through each step of the buying process, making sure I understood every detail before moving forward. The dedication to ensuring I felt comfortable and informed was truly impressive.\r\n\r\nMoreover, the closing process was seamless. My agent coordinated everything efficiently, and we were able to close ahead of schedule, which was a huge relief. I also appreciated the follow-up after the purchase to ensure everything was in order and that I was satisfied with my new home.\r\n\r\nI would definitely recommend Underworld Agency to anyone looking for a stress-free and trustworthy real estate experience. Their commitment to customer satisfaction and thorough attention to detail makes them stand out in the crowded real estate market', '2024-05-12 04:05:35'),
(12, 'buyer', 3, 2, 3, 'good agent', '2024-05-13 07:37:02'),
(13, 'seller', 4, 2, 3, 'good agent', '2024-05-13 08:02:18'),
(14, 'buyer', 3, 2, 5, 'Very good agent', '2024-05-13 13:49:33');

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
(1, 'admin', '$2y$10$EwRfItCL7D4t5mysMQgOvugxpiApuiuF28/msRKmkiHI9sVetLiem', '1975-01-09', '123 Admin Blvd, Capital City', '82233333', 'active', 1),
(2, 'agent', '$2y$10$HPuaakh8yAH5rJpHPNTrmuz2cYq86zQ83ynVwGZ42khkn76YmYujS', '1980-08-25', '234 Agent Way, Metro Town', '89988989', 'active', 2),
(3, 'buyer', '$2y$10$qzlL8IU37/87C0Owiz3op.FqHPTQmCoLWvg9kCuUBJLWPlLrUptr2', '1990-05-30', '345 Buyer Street, Market City', '89998321', 'active', 3),
(4, 'seller', '$2y$10$zxkFiyxxw6aXE0mHl8yNouzndqxYCbfX17Qap9trI9tu0/DqTHOFC', '1985-12-09', '456 Seller Lane, Commerce Ville', '93821232', 'active', 4);

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
(2, 'Agent', 'I am an agent', 'active'),
(3, 'Buyer', 'I am a Buyer', 'active'),
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
-- Indexes for table `rating_reviews`
--
ALTER TABLE `rating_reviews`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `idx_user` (`UserID`),
  ADD KEY `idx_agent` (`AgentID`);

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
  MODIFY `AgentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `BuyerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `propertylisting`
--
ALTER TABLE `propertylisting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `rating_reviews`
--
ALTER TABLE `rating_reviews`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `SellerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- Constraints for table `rating_reviews`
--
ALTER TABLE `rating_reviews`
  ADD CONSTRAINT `rating_reviews_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `rating_reviews_ibfk_2` FOREIGN KEY (`AgentID`) REFERENCES `users` (`user_id`);

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
