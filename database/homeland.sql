-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2023 at 06:06 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homeland`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Pid` int(11) NOT NULL,
  `Pname` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Pid`, `Pname`, `created_at`) VALUES
(1, 'Condo', '2023-04-06 14:16:16'),
(2, 'Property-Land', '2023-04-06 14:16:16'),
(3, 'Commercial-Building', '2023-04-06 14:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `gallary`
--

CREATE TABLE `gallary` (
  `_id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  `gala_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallary`
--

INSERT INTO `gallary` (`_id`, `images`, `gala_id`, `created_at`) VALUES
(1, 'sidekix-media-WgkA3CSFrjc-unsplash.jpg', 1, '2023-04-10 13:44:39'),
(2, 'sidekix-media-r_y2VBvEOIE-unsplash.jpg', 1, '2023-04-10 13:44:39'),
(3, 'sidekix-media-SL6bC1IVT90-unsplash.jpg', 1, '2023-04-10 13:44:39'),
(4, 'sidekix-media-BAVam-y_9Wg-unsplash.jpg', 2, '2023-04-10 13:44:39'),
(5, 'katja-rooke-77JACslA8G0-unsplash.jpg', 2, '2023-04-10 13:44:39'),
(6, 'yehleen-gaffney-raxI_EcyfGw-unsplash.jpg', 2, '2023-04-10 13:44:39'),
(7, 'katja-rooke-77JACslA8G0-unsplash.jpg', 3, '2023-04-10 13:44:39'),
(8, 'spacejoy-c0JoR_-2x3E-unsplash.jpg', 3, '2023-04-10 13:44:39'),
(9, 'sidekix-media-WgkA3CSFrjc-unsplash.jpg', 3, '2023-04-10 13:44:39'),
(10, 'sidekix-media-0sDzRgrN_pI-unsplash.jpg', 4, '2023-04-10 13:44:39'),
(11, 'sidekix-media-BAVam-y_9Wg-unsplash.jpg', 4, '2023-04-10 13:44:39'),
(12, 'sidekix-media-BAVam-y_9Wg-unsplash.jpg', 4, '2023-04-10 13:44:39');

-- --------------------------------------------------------

--
-- Table structure for table `props`
--

CREATE TABLE `props` (
  `_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `_location` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `beds` int(10) NOT NULL,
  `bath` int(10) NOT NULL,
  `sq_ft` varchar(30) NOT NULL,
  `home_type` varchar(255) NOT NULL,
  `_type` varchar(255) NOT NULL,
  `year_built` varchar(225) NOT NULL,
  `price_sqft` int(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `props`
--

INSERT INTO `props` (`_id`, `name`, `_location`, `price`, `image`, `beds`, `bath`, `sq_ft`, `home_type`, `_type`, `year_built`, `price_sqft`, `description`, `admin_name`, `created_at`) VALUES
(1, '625 S. Berendo St', '625 S. Berendo St Unit 607 Los Angeles, CA 90005', '6,265,500', 'img_1.jpg', 3, 4, '7,000', 'Sale', 'Condo', '2020', 520, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda aperiam perferendis deleniti vitae asperiores accusamus tempora facilis sapiente, quas! Quos asperiores alias fugiat sunt tempora molestias quo deserunt similique sequi.\r\n\r\nNisi voluptatu', 'STANDRIGHT', '2023-04-05 19:41:58'),
(2, '871 Crenshaw Blvd', '1 New York Ave, Warners Bay, NSW 2282', '2,265,500', 'img_2.jpg', 3, 4, '', 'Rent', 'Property Land ', '2022', 700, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda aperiam perferendis deleniti vitae asperiores accusamus tempora facilis sapiente, quas! Quos asperiores alias fugiat sunt tempora molestias quo deserunt similique sequi.\r\n\r\nNisi voluptatu', 'CLIFFORD', '2023-04-05 19:41:58'),
(3, '853 S Lucerne Blvd', '853 S Lucerne Blvd Unit 101 Los Angeles, CA 90005', '8,123,500', 'hero_bg_2.jpg', 4, 4, '500', 'Sale', 'Commercial Building', '2019', 800, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda aperiam perferendis deleniti vitae asperiores accusamus tempora facilis sapiente, quas! Quos asperiores alias fugiat sunt tempora molestias quo deserunt similique sequi.\r\n\r\nNisi voluptatu', 'PROMISE', '2023-04-05 19:41:58'),
(4, '625 S. Berendo St', '625 S. Berendo St Unit 607 Los Angeles, CA 90005', '1,333,000', 'img_4.jpg', 6, 6, '800', 'Rent', 'Condo', '2022', 100, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda aperiam perferendis deleniti vitae asperiores accusamus tempora facilis sapiente, quas! Quos asperiores alias fugiat sunt tempora molestias quo deserunt similique sequi.\r\n\r\nNisi voluptatu', 'QUEENCY', '2023-04-05 19:41:58'),
(5, '871 Crenshaw Blvd', '1 New York Ave, Warners Bay, NSW 2282', '9,113,500', 'img_5.jpg', 4, 4, '300', 'Sale', 'Commercial Building', '2023', 600, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda aperiam perferendis deleniti vitae asperiores accusamus tempora facilis sapiente, quas! Quos asperiores alias fugiat sunt tempora molestias quo deserunt similique sequi.\r\n\r\nNisi voluptatu', 'LOVELYN', '2023-04-05 19:41:58'),
(6, '853 S Lucerne Blvd', '853 S Lucerne Blvd Unit 101 Los Angeles, CA 90005', '5,444,100', 'img_6.jpg', 5, 5, '200', 'Rent', 'Property Land ', '2023', 900, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda aperiam perferendis deleniti vitae asperiores accusamus tempora facilis sapiente, quas! Quos asperiores alias fugiat sunt tempora molestias quo deserunt similique sequi.\r\n\r\nNisi voluptatu', 'VICTOR', '2023-04-05 19:41:58');

-- --------------------------------------------------------

--
-- Table structure for table `related_properties`
--

CREATE TABLE `related_properties` (
  `RPid` int(11) NOT NULL,
  `RPname` varchar(255) NOT NULL,
  `RPlocation` varchar(255) NOT NULL,
  `RPprice` varchar(255) NOT NULL,
  `RPimages` varchar(255) NOT NULL,
  `RPbaths` int(10) NOT NULL,
  `RPbeds` int(10) NOT NULL,
  `RPsq_ft` varchar(255) NOT NULL,
  `RPtypes` varchar(255) NOT NULL,
  `RPmodels` varchar(255) NOT NULL,
  `RPcreator` varchar(255) NOT NULL,
  `RPcreated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `related_properties`
--

INSERT INTO `related_properties` (`RPid`, `RPname`, `RPlocation`, `RPprice`, `RPimages`, `RPbaths`, `RPbeds`, `RPsq_ft`, `RPtypes`, `RPmodels`, `RPcreator`, `RPcreated_at`) VALUES
(1, '625 S. Berendo St', '625 S. Berendo St Unit 607 Los Angeles, CA 90005', '2,265,500', 'person_1.jpg', 3, 2, '1,620', 'sale', 'Condo', 'standright', '2023-04-09 16:46:51'),
(2, '871 Crenshaw Blvd', '1 New York Ave, Warners Bay, NSW 2282', '4,225,500', 'person_2.jpg', 3, 3, '7,000', 'Rent', 'Property Land', 'Toheeb', '2023-04-09 16:52:58'),
(3, '853 S Lucerne Blvd', '853 S Lucerne Blvd Unit 101 Los Angeles, CA 90005', '7,265,000', 'person_3.jpg', 5, 7, '5,500', 'Lease', 'Commercial Building', 'Wuraola', '2023-04-09 16:52:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mypassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`_id`, `username`, `email`, `mypassword`) VALUES
(2, 'cstandright', 'standrightclifford@gmail.com', '$2y$10$9EU7eL8qMcFGq74VEnkcn.VrDmkFssET8YHAHkhORHnWwaqKAODCW'),
(3, 'CLIFFORD', 'cliffordstandright@gmail.com', '$2y$10$n7DA49lsZEMvUaKqVXUKDuADU1hENjGAfWMAmJNxj/sGQ..pv/Iq.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Pid`);

--
-- Indexes for table `gallary`
--
ALTER TABLE `gallary`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `props`
--
ALTER TABLE `props`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_id` (`_id`,`name`,`_location`,`price`),
  ADD UNIQUE KEY `_id_2` (`_id`,`name`,`_location`,`price`);

--
-- Indexes for table `related_properties`
--
ALTER TABLE `related_properties`
  ADD PRIMARY KEY (`RPid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallary`
--
ALTER TABLE `gallary`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `props`
--
ALTER TABLE `props`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `related_properties`
--
ALTER TABLE `related_properties`
  MODIFY `RPid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
