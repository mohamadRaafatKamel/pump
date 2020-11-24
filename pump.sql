-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2020 at 02:52 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pump`
--

-- --------------------------------------------------------

--
-- Table structure for table `cable`
--

CREATE TABLE `cable` (
  `id` int(11) NOT NULL,
  `diameter` decimal(5,0) NOT NULL,
  `price` decimal(7,0) NOT NULL,
  `max` int(5) NOT NULL,
  `min` int(5) NOT NULL,
  `pump_id` int(11) DEFAULT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cable`
--

INSERT INTO `cable` (`id`, `diameter`, `price`, `max`, `min`, `pump_id`, `user`) VALUES
(0, '0', '0', 0, 0, NULL, 1),
(1, '3', '5', 25, 0, 5, 1),
(2, '4', '6', 50, 26, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `panel`
--

CREATE TABLE `panel` (
  `id` int(11) NOT NULL,
  `name` varchar(51) NOT NULL,
  `price` decimal(7,0) NOT NULL,
  `watt` int(5) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panel`
--

INSERT INTO `panel` (`id`, `name`, `price`, `watt`, `user`) VALUES
(1, 'panal 1', '1000', 100, 1),
(2, 'panel 2', '2000', 200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pumps`
--

CREATE TABLE `pumps` (
  `id` int(11) NOT NULL,
  `name` varchar(51) NOT NULL,
  `cover` varchar(250) NOT NULL,
  `pressure` int(11) NOT NULL,
  `price` decimal(7,0) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pumps`
--

INSERT INTO `pumps` (`id`, `name`, `cover`, `pressure`, `price`, `user`) VALUES
(5, '24V pumps', 'asset/imgpump/cover508cae0b652bede38384be25bd1e1239cf.jpg', 24, '2400', 1),
(11, '48V Pumps', 'asset/imgpump/cover50db0741b10d7811e3bafb4341a151e6fd.jpeg', 48, '4800', 1),
(13, '72V Pumps', 'asset/imgpump/cover507e1184ce0b80cf8f176a85985c688ac7.jpeg', 72, '7200', 1),
(14, 'pump 1', 'asset/imgpump/cover50146e0fc0b0327771f5f5fbcac7505380.jpeg', 51, '5100', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pump_order`
--

CREATE TABLE `pump_order` (
  `id` int(11) NOT NULL,
  `pump_id` int(11) NOT NULL,
  `panel_id` int(11) NOT NULL,
  `cable_id` int(11) DEFAULT NULL,
  `cable_length` int(11) DEFAULT NULL,
  `user` int(11) NOT NULL,
  `state` int(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pump_order`
--

INSERT INTO `pump_order` (`id`, `pump_id`, `panel_id`, `cable_id`, `cable_length`, `user`, `state`, `date`) VALUES
(12, 13, 1, 0, 0, 2, 1, '2020-11-24 13:28:57'),
(13, 5, 2, 1, 10, 2, 1, '2020-11-24 13:28:57'),
(14, 5, 2, 0, 0, 2, 0, '2020-11-24 13:35:02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(51) NOT NULL,
  `password` varchar(51) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `admin`) VALUES
(1, 'admin', 'admin', 1),
(2, 'user1', 'user1', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cable`
--
ALTER TABLE `cable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `panel_pump` (`pump_id`),
  ADD KEY `user_panel` (`user`);

--
-- Indexes for table `panel`
--
ALTER TABLE `panel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `panel` (`user`);

--
-- Indexes for table `pumps`
--
ALTER TABLE `pumps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_pump` (`user`);

--
-- Indexes for table `pump_order`
--
ALTER TABLE `pump_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pump` (`pump_id`),
  ADD KEY `panel_id` (`panel_id`),
  ADD KEY `cable_id` (`cable_id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cable`
--
ALTER TABLE `cable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `panel`
--
ALTER TABLE `panel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pumps`
--
ALTER TABLE `pumps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pump_order`
--
ALTER TABLE `pump_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cable`
--
ALTER TABLE `cable`
  ADD CONSTRAINT `panel_pump` FOREIGN KEY (`pump_id`) REFERENCES `pumps` (`id`),
  ADD CONSTRAINT `user_panel` FOREIGN KEY (`user`) REFERENCES `user` (`id`);

--
-- Constraints for table `panel`
--
ALTER TABLE `panel`
  ADD CONSTRAINT `panel` FOREIGN KEY (`user`) REFERENCES `user` (`id`);

--
-- Constraints for table `pumps`
--
ALTER TABLE `pumps`
  ADD CONSTRAINT `user_pump` FOREIGN KEY (`user`) REFERENCES `user` (`id`);

--
-- Constraints for table `pump_order`
--
ALTER TABLE `pump_order`
  ADD CONSTRAINT `pump` FOREIGN KEY (`pump_id`) REFERENCES `pumps` (`id`),
  ADD CONSTRAINT `pump_order_ibfk_1` FOREIGN KEY (`panel_id`) REFERENCES `panel` (`id`),
  ADD CONSTRAINT `pump_order_ibfk_2` FOREIGN KEY (`cable_id`) REFERENCES `cable` (`id`),
  ADD CONSTRAINT `pump_order_ibfk_3` FOREIGN KEY (`user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
