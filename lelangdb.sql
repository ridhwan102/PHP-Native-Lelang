-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2020 at 11:34 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lelangdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `biddings`
--

CREATE TABLE `biddings` (
  `iduser` varchar(45) NOT NULL,
  `iditem` int(11) NOT NULL,
  `price_offer` double DEFAULT NULL,
  `is_winner` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `biddings`
--

INSERT INTO `biddings` (`iduser`, `iditem`, `price_offer`, `is_winner`) VALUES
('id', 9, 54100, 0),
('id', 10, 56100, 0),
('id', 14, 100000, 0),
('id2', 3, 19000100, 1),
('id2', 6, 29000000, 0),
('id3', 1, 700100, 0),
('id3', 2, 750100, 1),
('id3', 3, 17000100, 0),
('id3', 4, 1900100, 1),
('id3', 5, 1700100, 0),
('id3', 8, 7100000, 0),
('id3', 12, 150100, 0),
('id4', 2, 650100, 0),
('id4', 3, 16000100, 0),
('id4', 4, 1560100, 0),
('id4', 5, 1550100, 0),
('id4', 6, 26000100, 0),
('id5', 1, 500300, 0),
('id5', 2, 550100, 0),
('id5', 3, 15000300, 0),
('id5', 4, 1500300, 0),
('id5', 5, 1500500, 0),
('id5', 6, 25001000, 0),
('id5', 8, 7000300, 0),
('id5', 11, 200100, 0),
('id6', 2, 550100, 0),
('id6', 3, 15000100, 0),
('id6', 4, 1500100, 0),
('id6', 5, 1500100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `iditem` int(11) NOT NULL,
  `iduser_owner` varchar(45) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `date_posting` datetime DEFAULT NULL,
  `price_initial` double DEFAULT NULL,
  `status` enum('Open','Sold','Cancel') DEFAULT 'Open',
  `image_extention` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`iditem`, `iduser_owner`, `name`, `date_posting`, `price_initial`, `status`, `image_extention`) VALUES
(1, 'id', 'Xiaomi', '2020-04-29 06:48:42', 500000, 'Cancel', 'jpg'),
(2, 'id', 'Walkman', '2020-04-29 06:48:57', 550000, 'Sold', 'jpg'),
(3, 'id', 'Acer Predator', '2020-04-29 06:49:19', 15000000, 'Sold', 'jpg'),
(4, 'id', 'Marshall', '2020-04-29 06:49:30', 1500000, 'Sold', 'jpg'),
(5, 'id', 'Razr', '2020-04-29 06:49:39', 1500000, 'Cancel', 'jpg'),
(6, 'id', 'Mate Xs', '2020-04-29 06:49:54', 25000000, 'Open', 'jpg'),
(7, 'id', 'flip', '2020-04-29 06:50:08', 15000000, 'Open', 'jpg'),
(8, 'id', 'Vivobook', '2020-04-29 06:50:19', 7000000, 'Open', 'jpg'),
(9, 'id2', 'Stik ps2', '2020-04-29 06:50:46', 50000, 'Open', 'jpg'),
(10, 'id2', 'Charger veger', '2020-04-29 06:50:57', 50000, 'Open', 'png'),
(11, 'id2', 'Keyboard', '2020-04-29 06:51:12', 100000, 'Open', 'jpg'),
(12, 'id2', 'Mouse', '2020-04-29 06:51:25', 100000, 'Open', 'jpg'),
(13, 'id3', 'Gitar', '2020-04-29 06:52:17', 90000, 'Open', 'jpg'),
(14, 'id3', 'Kacamata', '2020-04-29 06:52:27', 90000, 'Cancel', 'jpg'),
(15, 'id3', 'Topi', '2020-04-29 06:52:38', 30000, 'Cancel', 'jpg'),
(16, 'id', 'tikus', '2020-04-30 11:31:28', 80000, 'Cancel', 'jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `iduser` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`iduser`, `name`, `password`) VALUES
('id', 'user1', 'kugyOXhequg/A'),
('id2', 'user2', 'kuxJbqzxprIkM'),
('id3', 'user3', 'ku9BVr1iko8qw'),
('id4', 'user4', 'kuv.gWUd8sjRY'),
('id5', 'user5', 'kuSMvcVfDp7R2'),
('id6', 'user6', 'kuCb9YN.CRBzg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biddings`
--
ALTER TABLE `biddings`
  ADD PRIMARY KEY (`iduser`,`iditem`),
  ADD KEY `fk_biddings_items1_idx` (`iditem`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`iditem`),
  ADD KEY `fk_items_users_idx` (`iduser_owner`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `iditem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `biddings`
--
ALTER TABLE `biddings`
  ADD CONSTRAINT `fk_biddings_items1` FOREIGN KEY (`iditem`) REFERENCES `items` (`iditem`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_biddings_users1` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `fk_items_users` FOREIGN KEY (`iduser_owner`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
