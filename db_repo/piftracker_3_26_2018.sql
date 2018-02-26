-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2018 at 06:22 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `piftracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1518889173),
('author', '2', 1518889173),
('author', '4', 1518889926);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1518889173, 1518889173),
('author', 1, NULL, NULL, NULL, 1518889173, 1518889173),
('createPost', 2, 'Create a post', NULL, NULL, 1518889173, 1518889173),
('updatePost', 2, 'Update post', NULL, NULL, 1518889173, 1518889173);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'author'),
('admin', 'updatePost'),
('author', 'createPost');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_list`
--

CREATE TABLE `bank_list` (
  `id` int(11) NOT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `int_rate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_list`
--

INSERT INTO `bank_list` (`id`, `bank`, `int_rate`) VALUES
(1, 'Standard', '10'),
(2, 'Barklays', '30'),
(3, 'Habib', '10');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `cur` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `cur`) VALUES
(1, 'Kes'),
(2, 'USD'),
(3, 'Yen');

-- --------------------------------------------------------

--
-- Table structure for table `loan_details`
--

CREATE TABLE `loan_details` (
  `id` int(11) NOT NULL,
  `loan_ref` varchar(255) DEFAULT NULL,
  `supplier` varchar(255) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `lc_terms` varchar(255) DEFAULT NULL,
  `pif_terms` varchar(255) DEFAULT NULL,
  `bl_date` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `int_rate` varchar(255) DEFAULT NULL,
  `int_to_be_paid` varchar(255) DEFAULT NULL,
  `payment` varchar(255) DEFAULT NULL,
  `paid_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_details`
--

INSERT INTO `loan_details` (`id`, `loan_ref`, `supplier`, `product`, `bank`, `lc_terms`, `pif_terms`, `bl_date`, `start_date`, `end_date`, `currency`, `amount`, `int_rate`, `int_to_be_paid`, `payment`, `paid_status`) VALUES
(1, 'dscsdcsdc', '1', '1', '1', '60', 'sdcsdc', '1519426800', '1519426800', '1524607200', '1', '90000', '10', '2970', '92970', NULL),
(2, 'sdcsdcsd', '1', '1', '1', '50', 'sdcsdc', '1519426800', '1519426800', '1523743200', '1', '90000', '10', '3240', '93240', NULL),
(3, 'sdcsdc', '1', '1', '1', '33', 'dwc', '2018-02-09', '2018-02-24', '1522274400', '1', '90000', '10', '3690', '93690', NULL),
(4, 'sdcs', '2', '1', '1', '11', 'acadc', '2018-02-23', '2018-02-26', '1520550000', '1', '90000', '10', '4230', '94230', NULL),
(5, 'dcdc', '1', '1', '1', '23', 'wcdc', '2018-02-16', '2018-02-25', '1521500400', '1', '90000', '10', '3960', '93960', NULL),
(6, 'dsdcsd', '1', '1', '1', '19', 'sdcsdc', '2018-02-28', '2018-03-27', '1523743200', '2', '90000', '10', '4050', '94050', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1518680298),
('m140506_102106_rbac_init', 1518887352),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1518887353),
('m180215_073208_create_loan_details', 1518680301),
('m180215_080528_create_bank_list', 1518682120),
('m180215_081636_create_suppliers', 1518682732),
('m180215_081649_create_products', 1518682733),
('m180215_084201_create_currency', 1518684233),
('m180217_152345_create_systemusers_table', 1518881234),
('m180217_153001_create_rename_systemusers_to_system_users_table', 1518881678),
('m180217_154554_add_hash_column_to_system_users_tabble', 1518882533),
('m180217_173455_init_rbac', 1518889173),
('m180217_174733_init_rbac', 1518889926),
('m180217_192535_add_group_column_to_system_users_table', 1518895614),
('m180218_044501_add_paid_status_column_to_loan_details_table', 1518929156);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product`) VALUES
(1, 'Tyres'),
(2, 'Cheese');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `supplier` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier`) VALUES
(1, 'Railways'),
(2, 'Sarit Centre');

-- --------------------------------------------------------

--
-- Table structure for table `system_users`
--

CREATE TABLE `system_users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `group` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_users`
--

INSERT INTO `system_users` (`id`, `full_name`, `username`, `password`, `auth_key`, `email`, `hash`, `group`) VALUES
(1, 'Victor Njoroge', 'angel', '123', NULL, 'v@gmail.com', '$2y$13$C/xgrt4JU.8PePE1pJKeau9MEBoT69dAJBaA4E6n13WWU6sSwZVYm', NULL),
(2, 'Fatihi Said', 'pikachu', '321', NULL, 'f@gmail.com', '$2y$13$5zj/6mSjciLqpyGJhf0QEuk43wba62.xn606woU/DAnYWALe9IzBK', NULL),
(3, 'Mbuvi', 'iloveyou', 'victor', NULL, 'm@gmail.com', '$2y$13$xi/1YQ4E17d2VLHcUvXvNuWE41/FmEuu7QGJtORvow9xV4jOyf4uK', NULL),
(4, 'Fatema Abbas', 'fatush', 'fatush', NULL, 'f@gmail.com', '$2y$13$fLReotknp0/R8AJXCDjOxe/Mp7.wQ0xOdJ3mEoqlfA9M5L4i94vdS', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `auth_assignment_user_id_idx` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `bank_list`
--
ALTER TABLE `bank_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_details`
--
ALTER TABLE `loan_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_users`
--
ALTER TABLE `system_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_list`
--
ALTER TABLE `bank_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loan_details`
--
ALTER TABLE `loan_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `system_users`
--
ALTER TABLE `system_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
