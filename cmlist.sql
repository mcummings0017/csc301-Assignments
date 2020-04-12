-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2020 at 02:21 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmlist`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `ID` int(10) UNSIGNED NOT NULL,
  `user_ID` int(10) UNSIGNED DEFAULT NULL,
  `listing_ID` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `ID` int(10) UNSIGNED NOT NULL,
  `user_ID` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(40) DEFAULT 'N/A',
  `name` varchar(60) DEFAULT NULL,
  `address` varchar(160) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) UNSIGNED DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`ID`, `user_ID`, `type`, `name`, `address`, `picture`, `price`, `description`) VALUES
(2, NULL, 'N/A', 'Toyota Camry 2017', '8400 I-10 Service Road, New Orleans, LA 70127, United States', 'img/camry.jpg', '13000', 'Like new Toyota Camry 2017.  One owner, price negotiable.  Please contact Alex at 859-111-1111 for more information.'),
(3, NULL, 'N/A', 'Honda Civic 2007', 'address 2', 'img/civic.jpg', '4999', 'Like new Honda Civic 2007.  One owner, price negotiable.  Please contact Rick at 859-111-1111 for more information.'),
(4, NULL, 'N/A', 'Ford Mustang 2019', 'address 3', 'img/mustang.jpg', '29999', 'Brand new Ford Mustang 2019.  Please contact a representative at Ford motors Florence 859-111-1111 for more information.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(10) UNSIGNED NOT NULL,
  `name` varchar(80) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `accounttype` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `name`, `email`, `password`, `accounttype`) VALUES
(1, NULL, 'db@db.com', '$2y$10$nEBTWu9ADcESfZ.jpjLJ2uyjtxJ91MbN9jyIltc9ckx.CiZtLLIVS', 'admin'),
(10, 'test name', 't@t.com', '$2y$10$IMv73k1wkLQKyg0iI7/cGOIf9rMwgShmKTOkjn4hjDny3TZKj9sP6', 'user'),
(11, '', '5@5.com', '$2y$10$y2TxZAmyX.D3Wl0wZIIrI.6PtjJ/HdBZgaaKd9/YMVomambAgxiBy', 'user'),
(12, 'Mike', 'mike@mike.com', '$2y$10$Gdmk4DnUDlDoAfIApKZ/oe5IcvvFmB5Tb352ozPdOYxAw3WA5B0NS', 'user'),
(13, 'p', 'p@p.com', '$2y$10$8lKeHmM3ZGaPqBybnJmZve7garmdKL5P77ECcXLxb61xUssc3QTY6', 'user'),
(14, 'nnn', 'n@n.com', '$2y$10$nEBTWu9ADcESfZ.jpjLJ2uyjtxJ91MbN9jyIltc9ckx.CiZtLLIVS', 'user'),
(15, 'f@f.com', 'f@f.com', '$2y$10$dEkJ4I/pt2LgctI4onL9SOzb0DtH0AIGmYDPEz1KpMhdzd83xUsgy', 'user'),
(17, 'g@g.com', 'g@g.com', '$2y$10$N1aMvKXuGVA/5T3MODCkFufB.mgv5m8X8OGrdcsKNIFLUbBwjwXDm', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_fk` (`user_ID`),
  ADD KEY `listing_fk` (`listing_ID`);

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`listing_ID`) REFERENCES `listings` (`ID`);

--
-- Constraints for table `listings`
--
ALTER TABLE `listings`
  ADD CONSTRAINT `listings_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
