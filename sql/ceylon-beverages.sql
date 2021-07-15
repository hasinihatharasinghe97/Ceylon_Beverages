-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2018 at 02:21 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ceylon-beverages`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `vendorID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `unitPrice` int(11) NOT NULL,
  `units` int(25) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `customerID`, `vendorID`, `productID`, `productName`, `unitPrice`, `units`, `total`) VALUES
(1, 26, 27, 1, 'Coca', 100, 10, 1000),
(2, 26, 27, 1, 'Coca', 100, 100, 10000),
(3, 26, 28, 10, '7UP', 100, 300, 30000),
(4, 26, 27, 12, 'Pepsi', 50, 50, 2500),
(5, 29, 28, 10, '7UP', 100, 500, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `vendorID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `volume` varchar(25) NOT NULL,
  `imageName` text NOT NULL,
  `price` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `vendorID`, `name`, `volume`, `imageName`, `price`) VALUES
(1, 27, 'Coca Cola', '500ml', 'coke-500.png', 'Rs. 100'),
(11, 28, 'Fanta', '2000ml', 'fanta-2000.png', 'Rs. 200'),
(10, 28, '7UP', '1000ml', '7up-1000.png', 'Rs. 100'),
(12, 27, 'Pepsi', '500ml', 'pepsi-500.png', 'Rs. 50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(1) NOT NULL,
  `contact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `name`, `email`, `password`, `usertype`, `contact`) VALUES
(25, 'admin', 'admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'a', '123'),
(26, 'Kasun', 'customer@customer.com', 'b39f008e318efd2bb988d724a161b61c6909677f', 'c', '456'),
(27, 'Nimal Traders', 'vendor@vendor.com', '9fdcb2f441fcdd2e24e21bf8d45413ae72c0443c', 'v', '789'),
(28, 'John Drinks', 'vendor2@vendor2.com', '9d737ae503ed092cd1b5e2fec61d8474be13a9c1', 'v', '7711111112'),
(29, 'Customer 2', 'customer2@customer2.com', '80dae43ddfcfbd7a5e75b83260eab8fd35fd6778', 'c', '456'),
(30, 'UCSC', 'ucsc', 'c0d0cb34565fe05ca2a14e8b13285bf6dbdf6dfc', 'a', '0771234567');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
