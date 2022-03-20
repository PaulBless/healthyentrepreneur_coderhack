-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2021 at 08:07 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `healthy_entrepreneurs`
--

-- --------------------------
-- Database Name: `bop_database`
CREATE DATABASE IF NOT EXISTS `healthy_entrepreneurs` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

-- Choose & Use Database 
USE `healthy_entrepreneurs`;



-- Table structure for table `products_table`
--
CREATE TABLE `tbl_products` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(119) NOT NULL,
  `product_price` double(10,2) NOT NULL,
  `product_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_table`
--


-------------------------------------------
-- Table structure for table `users_table`
CREATE TABLE `tbl_users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `town` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` mediumtext NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profile` mediumtext  NULL,
    PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_table`


-- --------------------------------------------------------
-- Table structure for table `role_table`
--
CREATE TABLE `tbl_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  `role_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;


-- Dumping data for table `role_table`
--
INSERT INTO `tbl_roles` (`role_id`, `role_name`, `role_timestamp`) VALUES
(1, 'HE', CURRENT_TIMESTAMP),
(2, 'CHE', CURRENT_TIMESTAMP);

-- --------------------------------------------------------

--
-- Table structure for table `status_table`
CREATE TABLE `tbl_status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(50) NOT NULL,
  `status_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_table`
INSERT INTO `tbl_status` (`status_id`, `status_name`, `status_timestamp`) VALUES
(1, 'Closed', CURRENT_TIMESTAMP),
(2, 'Open', CURRENT_TIMESTAMP);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_each_invoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_each_purchase`
--

CREATE TABLE `tbl_each_purchase` (
  `each_purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_id` int(11) DEFAULT 0,
  `total_quantity` int(11) DEFAULT 0,
  `total_amount` varchar(50) DEFAULT NULL,
  `purchase_timestamp` timestamp NULL DEFAULT current_timestamp,
  PRIMARY KEY (`each_purchase_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------


-- Table structure for table `tbl_each_sales`
CREATE TABLE `tbl_each_sales` (
  `each_sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_id_number` int(11) DEFAULT NULL,
  `tax_rate` int(11) DEFAULT NULL,
  `tax_amount` varchar(50) DEFAULT NULL,
  `discount_rate` int(11) DEFAULT NULL,
  `discount_amount` varchar(50) DEFAULT NULL,
  `sales_subtotal` varchar(50) DEFAULT NULL,
  `sales_total` varchar(50) DEFAULT NULL,
  `sales_seller` int(11) DEFAULT NULL,
  `amount_paid` varchar(200) NOT NULL,
  `sales_timestamp` timestamp NULL DEFAULT current_timestamp,
  PRIMARY KEY (`each_sales_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------
-- Table structure for table `tbl_expenses`
CREATE TABLE `tbl_expenses` (
  `expense_id` int(11) NOT NULL AUTO_INCREMENT,
  `expense_auto_id` int(11) NOT NULL,
  `expense_category` int(11) NOT NULL,
  `expense_amount` varchar(50) NOT NULL,
  `expense_account` int(11) NOT NULL,
  `expense_by` int(11) NOT NULL,
  `expense_timestamp` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`expense_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

-- Table structure for `customers`
CREATE TABLE `tbl_customers` (
  `customer_id` INT(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(10) NOT NULL,
  `customer_district` varchar(155) NOT NULL,
  `customer_address` mediumtext NOT NULL,
  `customer_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

