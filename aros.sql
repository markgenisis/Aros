-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2018 at 07:00 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aros`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `type`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'cashier', '6ac2470ed8ccf204fd5ff89b32a355cf', 2),
(3, 'mark', '8da5c3e9f3bafb9ac43ca21cc591308d', 4),
(4, 'cook', 'e3e90fd6d2a7c4661a1a3acf2f60bc6d', 3),
(5, 'Abby', '905ce18bbad3a0f456cec0c4d344752d', 4);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(3) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'DESSERT'),
(2, 'JUICE'),
(3, 'APPETIZER');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(3) NOT NULL,
  `menu` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `category` int(3) NOT NULL,
  `image` varchar(255) NOT NULL,
  `availability` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu`, `price`, `category`, `image`, `availability`) VALUES
(3, 'Turkishs', '100', 1, 'BUPC.jpg', 1),
(4, 'Me', '1500', 1, 'samyang.jpg', 1),
(5, 'asdad', '30', 2, '20664921_1877815965816406_1388773952598316997_n.jpg', 1),
(6, 'san mig light', '50', 3, '20664921_1877815965816406_1388773952598316997_n.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderid`
--

CREATE TABLE `orderid` (
  `id` int(3) NOT NULL,
  `orderID` varchar(25) NOT NULL,
  `waiter` int(3) NOT NULL,
  `tableNum` int(3) NOT NULL,
  `date` varchar(25) NOT NULL,
  `status` int(2) NOT NULL,
  `total` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderid`
--

INSERT INTO `orderid` (`id`, `orderID`, `waiter`, `tableNum`, `date`, `status`, `total`) VALUES
(1, '10-01-17@10:48', 3, 10, '1516157292', 1, '200'),
(2, '5-01-17@10:49', 3, 5, '1516157372', 1, '100'),
(3, '10-01-17@13:51', 3, 10, '1516168314', 1, '4600'),
(4, '3-01-17@13:53', 3, 3, '1516168425', 1, '3100'),
(5, '3-01-29@18:18', 3, 3, '1517221083', 1, '90'),
(6, '5-01-29@18:44', 5, 5, '1517222678', 1, '4000'),
(7, '10-01-29@18:46', 5, 10, '1517222783', 1, '60'),
(8, '5-01-29@18:55', 5, 5, '1517223337', 1, '7000'),
(9, '10-02-05@11:29', 3, 10, '1517801346', 1, '30'),
(10, '3-02-05@12:15', 3, 3, '1517804110', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(3) NOT NULL,
  `orderID` varchar(20) NOT NULL,
  `waiterID` int(3) NOT NULL,
  `menuID` int(3) NOT NULL,
  `tableID` int(3) NOT NULL,
  `quantity` int(3) NOT NULL,
  `status` int(3) NOT NULL,
  `paid` int(2) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderID`, `waiterID`, `menuID`, `tableID`, `quantity`, `status`, `paid`, `date`) VALUES
(1, '10-01-17@10:48', 3, 3, 10, 1, 1, 1, '1516157292'),
(2, '5-01-17@10:49', 3, 3, 5, 1, 1, 1, '1516157372'),
(3, '10-01-17@10:48', 3, 3, 10, 1, 1, 1, '1516158332'),
(4, '10-01-17@13:51', 3, 4, 10, 3, 1, 1, '1516168314'),
(5, '10-01-17@13:51', 3, 3, 10, 1, 1, 1, '1516168314'),
(6, '3-01-17@13:53', 3, 3, 3, 1, 1, 1, '1516168425'),
(7, '3-01-17@13:53', 3, 4, 3, 2, 1, 1, '1516168425'),
(8, '3-01-29@18:18', 3, 5, 3, 3, 1, 1, '1517221083'),
(9, '5-01-29@18:44', 5, 4, 5, 2, 1, 1, '1517222678'),
(10, '5-01-29@18:44', 5, 6, 5, 3, 1, 1, '1517222678'),
(11, '10-01-29@18:46', 5, 6, 10, 8, 3, 1, '1517222783'),
(12, '5-01-29@18:55', 5, 6, 5, 3, 1, 1, '1517223337'),
(13, '5-01-29@18:55', 5, 3, 5, 1, 1, 1, '1517223337'),
(14, '5-01-29@18:55', 5, 4, 5, 4, 1, 1, '1517223425'),
(15, '5-01-29@18:55', 5, 5, 5, 3, 1, 1, '1517223492'),
(16, '10-01-29@18:46', 3, 5, 10, 1, 1, 1, '1517739753'),
(17, '10-01-29@18:46', 3, 5, 10, 1, 1, 1, '1517792194'),
(18, '10-02-05@11:29', 3, 5, 10, 1, 1, 1, '1517801346'),
(19, '3-02-05@12:15', 3, 5, 3, 4, 0, 0, '1517804110');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` int(3) NOT NULL,
  `tablenumber` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `tablenumber`) VALUES
(1, 10),
(2, 3),
(3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `waiters`
--

CREATE TABLE `waiters` (
  `id` int(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `accountID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waiters`
--

INSERT INTO `waiters` (`id`, `name`, `surname`, `accountID`) VALUES
(1, 'Mark', 'Sabilla', 3),
(2, 'Abbygale', 'Sabater', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderid`
--
ALTER TABLE `orderid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `waiters`
--
ALTER TABLE `waiters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `orderid`
--
ALTER TABLE `orderid`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `waiters`
--
ALTER TABLE `waiters`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
