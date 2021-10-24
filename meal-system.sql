-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2021 at 03:44 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipe-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `ID` int(11) NOT NULL,
  `RecipeDay` varchar(255) NOT NULL,
  `RecipeTime` varchar(255) NOT NULL,
  `RecipeTitle` varchar(255) NOT NULL,
  `RecipeDescription` text NOT NULL,
  `RecipeUrl` varchar(255) NOT NULL,
  `RecipePhoto` varchar(255) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`ID`, `RecipeDay`, `RecipeTime`, `RecipeTitle`, `RecipeDescription`, `RecipeUrl`, `RecipePhoto`, `CreationDate`) VALUES
(3, 'Monday', 'Breakfast', 'Tocilog', 'Tosilog is a popular Filipino breakfast meal. The name tosilog was derived from the different components of the meal which are: Tocino (cured pork), Sinangag (Filipino garlic fried rice), and Sunny-side up egg. Tosilog is best eaten with a spicy vinegar dip.', 'https://panlasangpinoy.com/tosilog-recipe/', 'd41d8cd98f00b204e9800998ecf8427e1635081348.jpg', '2021-10-24 13:18:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(200) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `ProfilePic` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Username`, `Password`, `Address`, `ProfilePic`, `CreationDate`) VALUES
(8, 'Jimmy ', 'Tombado', 9090909, 'jimmyt@gmail.com', 'jimmyt', '21232f297a57a5a743894a0e4a801fc3', 'Bicol 1234', 'd41d8cd98f00b204e9800998ecf8427e1635063928.png', '2021-10-24 13:18:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
