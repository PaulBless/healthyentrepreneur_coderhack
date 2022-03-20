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


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zelusportals_reho`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories_tbl`
--

CREATE TABLE `categories_tbl` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories_tbl`
--

INSERT INTO `categories_tbl` (`category_id`, `category_name`, `category_timestamp`) VALUES
(1, 'Water', '2021-03-15 10:16:46'),
(2, 'Milk', '2021-03-15 10:16:52'),
(3, 'Soft drinks', '2021-03-15 10:17:02'),
(4, 'Juice ', '2021-03-15 10:17:14'),
(5, 'Beer', '2021-03-15 10:17:21'),
(6, 'Cider', '2021-03-15 10:17:30'),
(7, 'Wine', '2021-03-15 10:17:37'),
(8, 'Spirits', '2021-03-15 10:17:52'),
(9, 'Coffee', '2021-03-15 10:18:18'),
(10, 'Hot Chocolate', '2021-03-15 10:18:26'),
(11, 'Tea', '2021-03-15 10:18:29'),
(12, 'Food', '2021-03-15 10:19:14'),
(13, 'Bis Bald', '2021-03-22 05:14:00'),
(14, 'Bis Spater', '2021-03-22 05:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `expense_account`
--

CREATE TABLE `expense_account` (
  `account_id` int(11) NOT NULL,
  `account_expense_name` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expense_category`
--

CREATE TABLE `expense_category` (
  `expense_category_id` int(11) NOT NULL,
  `expense_category_timestamp` timestamp NULL DEFAULT current_timestamp(),
  `expense_name` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacists_table`
--

CREATE TABLE `pharmacists_table` (
  `pharmacists_id` int(11) NOT NULL,
  `pharmacists_firstname` varchar(50) NOT NULL,
  `pharmacists_lastname` varchar(50) NOT NULL,
  `pharmacists_username` varchar(50) NOT NULL,
  `pharmacists_contact` varchar(20) NOT NULL,
  `pharmacists_status` int(11) NOT NULL,
  `pharmacists_user_id` varchar(50) NOT NULL,
  `pharmacists_role` int(11) NOT NULL,
  `pharmacists_password` mediumtext NOT NULL,
  `pharmacists_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `profile` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacists_table`
--

INSERT INTO `pharmacists_table` (`pharmacists_id`, `pharmacists_firstname`, `pharmacists_lastname`, `pharmacists_username`, `pharmacists_contact`, `pharmacists_status`, `pharmacists_user_id`, `pharmacists_role`, `pharmacists_password`, `pharmacists_timestamp`, `profile`) VALUES
(2, 'Peter', 'Donk', 'peter', '0552513405', 2, '7476', 2, '$2y$10$x5YURQUqVoxOFr4./E3Sy.0vZQD/XSGnCvijVLzxMwqbXgVSCcleu', '2021-03-20 09:01:11', 'default.png'),
(3, 'Danke', 'Schone', 'king', '0552513405', 2, '3249', 2, '$2y$10$GaVbmymAeywROaTm/0b10udlU/KgvH.m2kcWu1.8878M5ezfv2/Fq', '2021-03-22 05:43:40', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `role_table`
--

CREATE TABLE `role_table` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `role_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_table`
--

INSERT INTO `role_table` (`role_id`, `role_name`, `role_timestamp`) VALUES
(1, 'Admin', '2019-09-13 23:16:24'),
(2, 'Attendant', '2019-09-13 23:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `status_table`
--

CREATE TABLE `status_table` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(50) NOT NULL,
  `status_timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_table`
--

INSERT INTO `status_table` (`status_id`, `status_name`, `status_timestamp`) VALUES
(1, 'closed', '2019-09-13 23:13:12'),
(2, 'open', '2019-09-13 23:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_each_invoice`
--

CREATE TABLE `tbl_each_invoice` (
  `each_invoice_id` int(11) NOT NULL,
  `related_invoice_id` int(11) DEFAULT 0,
  `company_name` varchar(100) DEFAULT NULL,
  `company_address` mediumtext DEFAULT NULL,
  `total_amount` varchar(50) DEFAULT NULL,
  `expiry_date` varchar(60) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `tax_rate` int(11) NOT NULL DEFAULT 0,
  `tax_amount` varchar(50) DEFAULT NULL,
  `discount_rate` int(11) NOT NULL DEFAULT 0,
  `discount_amount` varchar(50) DEFAULT NULL,
  `sub_total` varchar(50) DEFAULT NULL,
  `invoice_timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_each_purchase`
--

CREATE TABLE `tbl_each_purchase` (
  `each_purchase_id` int(11) NOT NULL,
  `purchase_id` int(11) DEFAULT 0,
  `total_quantity` int(11) DEFAULT 0,
  `total_amount` varchar(50) DEFAULT NULL,
  `purchase_timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_each_sales`
--

CREATE TABLE `tbl_each_sales` (
  `each_sales_id` int(11) NOT NULL,
  `sales_id_number` int(11) DEFAULT NULL,
  `tax_rate` int(11) DEFAULT NULL,
  `tax_amount` varchar(50) DEFAULT NULL,
  `discount_rate` int(11) DEFAULT NULL,
  `discount_amount` varchar(50) DEFAULT NULL,
  `sales_subtotal` varchar(50) DEFAULT NULL,
  `sales_total` varchar(50) DEFAULT NULL,
  `sales_seller` int(11) DEFAULT NULL,
  `amount_paid` varchar(200) NOT NULL,
  `sales_timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_each_sales`
--

INSERT INTO `tbl_each_sales` (`each_sales_id`, `sales_id_number`, `tax_rate`, `tax_amount`, `discount_rate`, `discount_amount`, `sales_subtotal`, `sales_total`, `sales_seller`, `amount_paid`, `sales_timestamp`) VALUES
(1, 58419, 0, '', 0, '', '160.00', '160.00', 0, '180', '2021-03-21 07:27:38'),
(2, 58419, 0, '', 0, '', '160.00', '160.00', 0, '180', '2021-03-21 07:41:29'),
(3, 74158, 0, '', 0, '', '400.00', '400.00', 0, '500', '2021-03-21 08:00:16'),
(4, 74158, 0, '0', 0, '0', '400.00', '400.00', 2, '500', '2021-03-21 08:06:36'),
(5, 74158, 0, '0', 0, '0', '400.00', '400.00', 2, '500', '2021-03-21 08:13:32'),
(6, 74158, 0, '0', 0, '0', '400.00', '400.00', 2, '500', '2021-03-21 08:14:16'),
(7, 74158, 0, '0', 0, '0', '400.00', '400.00', 2, '500', '2021-03-21 08:14:40'),
(8, 13971, 0, '0', 0, '0', '160.00', '160.00', 2, '180', '2021-03-21 08:23:05'),
(9, 32448, 0, '0', 0, '0', '400.00', '400.00', 2, '500', '2021-03-21 08:25:47'),
(10, 23423517, 0, '0', 0, '0', '80.00', '80.00', 2, '80', '2021-03-21 08:49:11'),
(11, 59437280, 0, '0', 0, '0', '164.00', '164.00', 2, '200', '2021-03-22 05:49:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expenses`
--

CREATE TABLE `tbl_expenses` (
  `expense_id` int(11) NOT NULL,
  `expense_auto_id` int(11) NOT NULL,
  `expense_category` int(11) NOT NULL,
  `expense_amount` varchar(50) NOT NULL,
  `expense_account` int(11) NOT NULL,
  `expense_by` int(11) NOT NULL,
  `expense_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ingredients`
--

CREATE TABLE `tbl_ingredients` (
  `tbl_ingredient_id` int(11) NOT NULL,
  `ingredient_name` varchar(100) NOT NULL,
  `last_updated` varchar(50) NOT NULL,
  `cost_price_box` varchar(50) NOT NULL,
  `cost_price_pcs` varchar(50) NOT NULL,
  `expiry_date` varchar(50) NOT NULL,
  `quantity_available_box` int(11) NOT NULL DEFAULT 0,
  `quantity_available_pcs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ingredients`
--

INSERT INTO `tbl_ingredients` (`tbl_ingredient_id`, `ingredient_name`, `last_updated`, `cost_price_box`, `cost_price_pcs`, `expiry_date`, `quantity_available_box`, `quantity_available_pcs`) VALUES
(1, '', '2021-03-22', '', '', '', 0, 0),
(2, 'Ketchup', '2021-03-22', '50', '20', '20/20/2019', 240, 300);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `invoice_id` int(11) NOT NULL,
  `product_name` int(11) NOT NULL DEFAULT 0,
  `invoice_number` int(11) NOT NULL DEFAULT 0,
  `company_name` varchar(50) DEFAULT NULL,
  `company_address` mediumtext DEFAULT NULL,
  `product_quantity` int(11) DEFAULT 0,
  `product_price` varchar(20) DEFAULT NULL,
  `product_total` varchar(20) DEFAULT NULL,
  `product_subtotal` varchar(20) DEFAULT NULL,
  `product_taxRates` varchar(20) DEFAULT NULL,
  `product_taxAmount` varchar(20) DEFAULT NULL,
  `product_TotalAfterTax` varchar(20) DEFAULT NULL,
  `product_paid` varchar(20) DEFAULT NULL,
  `product_amount_due` varchar(20) DEFAULT NULL,
  `due_date` varchar(50) DEFAULT NULL,
  `quantity_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `tbl_products_id` int(11) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `last_updated` varchar(50) DEFAULT NULL,
  `product_category` int(11) DEFAULT NULL,
  `selling_price_box` varchar(50) DEFAULT NULL,
  `selling_price_pcs` varchar(20) NOT NULL,
  `cost_price_box` varchar(50) DEFAULT NULL,
  `cost_price_pcs` varchar(50) NOT NULL,
  `expiry_date` varchar(50) DEFAULT NULL,
  `quantity_available_box` int(11) DEFAULT 0,
  `quantity_available_pcs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`tbl_products_id`, `product_name`, `last_updated`, `product_category`, `selling_price_box`, `selling_price_pcs`, `cost_price_box`, `cost_price_pcs`, `expiry_date`, `quantity_available_box`, `quantity_available_pcs`) VALUES
(1, 'Aunti Mary', NULL, 1, '50', '80', '10', '5', '0', 100, 475),
(6, 'Veilen Danke', NULL, 1, '25', '2.0', '20', '1.20', '0', 50, 398),
(7, 'Malt', NULL, 1, '25', '2.0', '20', '0.20', '0', 150, 200),
(8, 'Danke Schone', NULL, 3, '100', '20', '50', '10', '0', 500, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase`
--

CREATE TABLE `tbl_purchase` (
  `purchase_id` int(11) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `quantity_box` varchar(50) NOT NULL,
  `quantity_pcs` varchar(50) NOT NULL,
  `expiry_date` varchar(50) NOT NULL,
  `cost_price_box` varchar(50) NOT NULL,
  `cost_price_pcs` varchar(50) NOT NULL,
  `purchase_timestmap` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_ingredients`
--

CREATE TABLE `tbl_purchase_ingredients` (
  `purchase_id` int(11) NOT NULL,
  `ingredient_id` varchar(50) NOT NULL,
  `quantity_box` varchar(50) NOT NULL,
  `quantity_pcs` varchar(50) NOT NULL,
  `expiry_date` varchar(50) NOT NULL,
  `cost_price_box` varchar(50) NOT NULL,
  `cost_price_pcs` varchar(50) NOT NULL,
  `purchase_timestmap` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_table`
--

CREATE TABLE `tbl_sales_table` (
  `sales_id` int(11) NOT NULL,
  `product_name` int(11) DEFAULT NULL,
  `sales_id_number` int(11) DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `product_price` varchar(50) DEFAULT NULL,
  `product_total` varchar(50) DEFAULT NULL,
  `quantity_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sales_table`
--

INSERT INTO `tbl_sales_table` (`sales_id`, `product_name`, `sales_id_number`, `product_quantity`, `product_price`, `product_total`, `quantity_type`) VALUES
(1, 1, 74158, 2, '80', '160', 1),
(2, 1, 74158, 3, '80', '240', 1),
(3, 1, 74158, 2, '80', '160', 1),
(4, 1, 74158, 3, '80', '240', 1),
(5, 1, 74158, 2, '80', '160', 1),
(6, 1, 74158, 3, '80', '240', 1),
(7, 1, 13971, 2, '80', '160', 1),
(8, 1, 32448, 5, '80', '400', 1),
(9, 1, 23423517, 1, '80', '80', 1),
(10, 1, 59437280, 2, '80', '160', 1),
(11, 6, 59437280, 2, '2.0', '4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `settings_id` int(11) NOT NULL,
  `settings_option` mediumtext DEFAULT NULL,
  `settings_ans` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`settings_id`, `settings_option`, `settings_ans`) VALUES
(1, 'system_name', 'Bubbles Pub and Grill'),
(2, 'system_title', 'Food Joint'),
(3, 'address', 'Adweso Market'),
(4, 'contact', '0242851769 / 0202873071'),
(5, 'email', 'oforikemmanuel@yahoo.com'),
(6, 'min_quantity_alert', '10'),
(7, 'currency', 'GH¢'),
(8, 'expire_alert_limit', '1'),
(9, 'invoice_due', '14'),
(10, 'profile_pic', 'IMG-20210122-WA0011.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suppliers`
--

CREATE TABLE `tbl_suppliers` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(80) NOT NULL,
  `supplier_phone` varchar(80) NOT NULL,
  `supplier_email` varchar(80) NOT NULL,
  `supplier_address` mediumtext NOT NULL,
  `supplier_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_suppliers`
--

INSERT INTO `tbl_suppliers` (`supplier_id`, `supplier_name`, `supplier_phone`, `supplier_email`, `supplier_address`, `supplier_timestamp`) VALUES
(1, 'Step NETWORK', '0552513405', 'peterdobk17@gmail.com', 'Accra Kasoa', '2021-03-22 05:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `users_table_id` int(11) NOT NULL,
  `users_table_role` varchar(50) NOT NULL,
  `users_username` varchar(100) NOT NULL,
  `users_password` mediumtext NOT NULL,
  `users_profile` mediumtext NOT NULL,
  `users_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`users_table_id`, `users_table_role`, `users_username`, `users_password`, `users_profile`, `users_timestamp`) VALUES
(1, '1', 'zelus', '$2y$10$IVv9AYHAvS/PQ75zNtEYL.h8XvIFiVw5Q3Rnpfkf3nXUo2BVFnctW', 'IMG-20210122-WA0011.jpg', '2020-06-06 20:20:25'),
(2, '1', 'AEKOCINE', 'YOHANNES1', 'default.png', '2020-06-06 20:29:08'),
(3, '1', 'peterdonk', '1234', 'default.png', '2020-07-25 19:55:18'),
(4, '1', 'paul', 'eshun', 'default.png', '2021-03-17 20:03:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories_tbl`
--
ALTER TABLE `categories_tbl`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `expense_account`
--
ALTER TABLE `expense_account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `expense_category`
--
ALTER TABLE `expense_category`
  ADD PRIMARY KEY (`expense_category_id`);

--
-- Indexes for table `pharmacists_table`
--
ALTER TABLE `pharmacists_table`
  ADD PRIMARY KEY (`pharmacists_id`),
  ADD KEY `pharmacists_role` (`pharmacists_role`),
  ADD KEY `pharmacists_status` (`pharmacists_status`);

--
-- Indexes for table `role_table`
--
ALTER TABLE `role_table`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `status_table`
--
ALTER TABLE `status_table`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tbl_each_invoice`
--
ALTER TABLE `tbl_each_invoice`
  ADD PRIMARY KEY (`each_invoice_id`);

--
-- Indexes for table `tbl_each_purchase`
--
ALTER TABLE `tbl_each_purchase`
  ADD PRIMARY KEY (`each_purchase_id`);

--
-- Indexes for table `tbl_each_sales`
--
ALTER TABLE `tbl_each_sales`
  ADD PRIMARY KEY (`each_sales_id`);

--
-- Indexes for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  ADD PRIMARY KEY (`expense_id`),
  ADD KEY `expense_account` (`expense_account`);

--
-- Indexes for table `tbl_ingredients`
--
ALTER TABLE `tbl_ingredients`
  ADD PRIMARY KEY (`tbl_ingredient_id`),
  ADD KEY `product_category` (`last_updated`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `FK_tbl_invoice_tbl_products` (`product_name`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`tbl_products_id`),
  ADD KEY `product_category` (`product_category`);

--
-- Indexes for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `tbl_purchase_ingredients`
--
ALTER TABLE `tbl_purchase_ingredients`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `tbl_sales_table`
--
ALTER TABLE `tbl_sales_table`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `tbl_suppliers`
--
ALTER TABLE `tbl_suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`users_table_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories_tbl`
--
ALTER TABLE `categories_tbl`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `expense_account`
--
ALTER TABLE `expense_account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_category`
--
ALTER TABLE `expense_category`
  MODIFY `expense_category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pharmacists_table`
--
ALTER TABLE `pharmacists_table`
  MODIFY `pharmacists_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_table`
--
ALTER TABLE `role_table`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status_table`
--
ALTER TABLE `status_table`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_each_invoice`
--
ALTER TABLE `tbl_each_invoice`
  MODIFY `each_invoice_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_each_purchase`
--
ALTER TABLE `tbl_each_purchase`
  MODIFY `each_purchase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_each_sales`
--
ALTER TABLE `tbl_each_sales`
  MODIFY `each_sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_ingredients`
--
ALTER TABLE `tbl_ingredients`
  MODIFY `tbl_ingredient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `tbl_products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_purchase_ingredients`
--
ALTER TABLE `tbl_purchase_ingredients`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_sales_table`
--
ALTER TABLE `tbl_sales_table`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_suppliers`
--
ALTER TABLE `tbl_suppliers`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `users_table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pharmacists_table`
--
ALTER TABLE `pharmacists_table`
  ADD CONSTRAINT `pharmacists_table_ibfk_1` FOREIGN KEY (`pharmacists_role`) REFERENCES `role_table` (`role_id`),
  ADD CONSTRAINT `pharmacists_table_ibfk_2` FOREIGN KEY (`pharmacists_status`) REFERENCES `status_table` (`status_id`);

--
-- Constraints for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  ADD CONSTRAINT `tbl_expenses_ibfk_1` FOREIGN KEY (`expense_account`) REFERENCES `expense_account` (`account_id`);

--
-- Constraints for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD CONSTRAINT `FK_tbl_invoice_tbl_products` FOREIGN KEY (`product_name`) REFERENCES `tbl_products` (`tbl_products_id`);

--
-- Constraints for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `tbl_products_ibfk_1` FOREIGN KEY (`product_category`) REFERENCES `categories_tbl` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
