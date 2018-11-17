-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 26, 2015 at 11:34 AM
-- Server version: 5.6.25
-- PHP Version: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory1`
--

-- --------------------------------------------------------

--
-- Table structure for table `barn_record`
--

CREATE TABLE IF NOT EXISTS `barn_record` (
  `ID_Num` int(11) NOT NULL,
  `staff_Id` int(11) NOT NULL,
  `reason` text NOT NULL,
  `sDate` varchar(15) NOT NULL,
  `sTime` varchar(15) NOT NULL,
  `status` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL,
  `sname` varchar(40) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `mname` varchar(40) NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `occupation` varchar(25) NOT NULL,
  `sex` text NOT NULL,
  `next_of_kin` varchar(30) NOT NULL,
  `nok_address` varchar(12) NOT NULL,
  `nok_phone` text NOT NULL,
  `reg_by` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` varchar(10) NOT NULL,
  `status` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hos_data`
--

CREATE TABLE IF NOT EXISTS `hos_data` (
  `Name` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_details`
--

CREATE TABLE IF NOT EXISTS `log_details` (
  `id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `login_time` time NOT NULL,
  `logout_time` time NOT NULL,
  `date` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `st` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `cost_price` text NOT NULL,
  `selling_price` text NOT NULL,
  `supplier` text NOT NULL,
  `quantity` varchar(10) NOT NULL DEFAULT '1000',
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_sales`
--

CREATE TABLE IF NOT EXISTS `product_sales` (
  `product_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `cost_price` text NOT NULL,
  `selling_price` text NOT NULL,
  `supplier` text NOT NULL,
  `quantity` varchar(10) NOT NULL DEFAULT '1000',
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `quantity` text NOT NULL,
  `receipt` int(11) NOT NULL DEFAULT '0',
  `type` varchar(6) NOT NULL,
  `status` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_rec`
--

CREATE TABLE IF NOT EXISTS `sales_rec` (
  `id` int(11) NOT NULL,
  `receipt` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` varchar(10) NOT NULL,
  `status` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(11) NOT NULL,
  `sname` varchar(40) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `mname` varchar(40) NOT NULL,
  `category` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `passport` varchar(20) NOT NULL,
  `status` varchar(6) NOT NULL DEFAULT 'Active',
  `sex` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `st` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp`
--

CREATE TABLE IF NOT EXISTS `tmp` (
  `id` int(11) NOT NULL,
  `staff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_order`
--

CREATE TABLE IF NOT EXISTS `tmp_order` (
  `ID_Num` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barn_record`
--
ALTER TABLE `barn_record`
  ADD PRIMARY KEY (`ID_Num`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `log_details`
--
ALTER TABLE `log_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_sales`
--
ALTER TABLE `product_sales`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_rec`
--
ALTER TABLE `sales_rec`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `tmp`
--
ALTER TABLE `tmp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_order`
--
ALTER TABLE `tmp_order`
  ADD UNIQUE KEY `ID_Num` (`ID_Num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barn_record`
--
ALTER TABLE `barn_record`
  MODIFY `ID_Num` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `log_details`
--
ALTER TABLE `log_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_sales`
--
ALTER TABLE `product_sales`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales_rec`
--
ALTER TABLE `sales_rec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tmp`
--
ALTER TABLE `tmp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tmp_order`
--
ALTER TABLE `tmp_order`
  MODIFY `ID_Num` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
