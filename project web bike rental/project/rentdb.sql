-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2021 at 03:29 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_messages`
--

CREATE TABLE `tbl_contact_messages` (
  `message_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_contact_messages`
--

INSERT INTO `tbl_contact_messages` (`message_id`, `full_name`, `email`, `message`) VALUES
(1, 'dana hhh', 'danah1@gmail.com', 'fdsafdsafdsaf'),
(2, 'reema', 'reema@gmail.com', 'jjj'),
(3, 'QQ OO', 'QQ@GMAIL.COM', 'KKK'),
(4, 'QQ OO', 'QQ@GMAIL.COM', 'gg'),
(5, 'hosny', 'hosnyish812@gmail.com', 'hello im hosny i want to rent my bike to go ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_sn` varchar(255) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `product_rate` double NOT NULL,
  `product_price` double NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_title`, `product_image`, `product_sn`, `product_type`, `product_rate`, `product_price`, `created_at`, `updated_at`) VALUES
(1, 'electrical bike', './images/pro1.jfif', '116a', 'electrical bikes', 4.5, 100, '2021-05-06 19:53:42', '2021-05-06 19:53:42'),
(2, 'electrical bike', './images/pro9.jpg', '116b', 'electrical bikes', 3.5, 150, '2021-05-06 19:54:19', '2021-05-06 19:54:19'),
(3, 'electrical bike', 'http://localhost/project1/images/pro7.jpg', '116c', 'electrical bikes', 3, 100, '2021-05-07 02:59:57', '2021-05-07 02:59:57'),
(4, 'electrical bike', 'http://localhost/project1/images/epro1.jpeg', '116d', 'electrical bikes', 2.5, 50, '2021-05-07 02:59:57', '2021-05-07 02:59:57'),
(5, 'Street bike', 'http://localhost/project1/images/spro1.jpg', '115a', 'Street bikes', 4.5, 90, '2021-05-07 03:09:12', '2021-05-07 03:09:12'),
(6, 'Street bike', 'http://localhost/project1/images/mpro2.jfif', '115b', 'Street bikes', 2.5, 50, '2021-05-07 03:09:12', '2021-05-07 03:09:12'),
(7, 'Street bike', 'http://localhost/project1/images/spro2jpg.jpg', '115c', 'Street bikes', 3.5, 90, '2021-05-07 03:12:27', '2021-05-07 03:12:27'),
(8, 'Street bike', 'http://localhost/project1/images/spro3.jpg', '115d', 'Street bikes', 4.5, 50, '2021-05-07 03:12:27', '2021-05-07 03:12:27'),
(9, 'Mountain bike', 'http://localhost/project1/images/mpro1.jpg', '114a', 'Mountain Bikes', 4.5, 90, '2021-05-07 03:13:29', '2021-05-07 03:13:29'),
(10, 'Mountain bike', 'http://localhost/project1/images/mpro2.jfif', '114b', 'Mountain Bikes', 2.5, 50, '2021-05-07 03:13:29', '2021-05-07 03:13:29'),
(11, 'Mountain bike', 'http://localhost/project1/images/mpro3.jpg', '114c', 'Mountain Bikes', 4.5, 90, '2021-05-07 03:18:49', '2021-05-07 03:18:49'),
(12, 'Mountain bike', 'http://localhost/project1/images/mpro4.jfif', '114d', 'Mountain Bikes', 3.5, 50, '2021-05-07 03:18:49', '2021-05-07 03:18:49'),
(13, 'smart bike', 'http://localhost/project1/images/pro1.jfif', '112a', 'smart_bike', 5, 190, '2021-05-07 03:20:56', '2021-05-07 03:20:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rent`
--

CREATE TABLE `tbl_rent` (
  `rent_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rent_details` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_rent`
--

INSERT INTO `tbl_rent` (`rent_id`, `product_id`, `user_id`, `rent_details`) VALUES
(1, 1, 1, 1),
(2, 2, 6, 2),
(3, 3, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rent_details`
--

CREATE TABLE `tbl_rent_details` (
  `ID` int(11) NOT NULL,
  `de_phone` varchar(255) NOT NULL,
  `de_ccn` varchar(255) NOT NULL,
  `de_type_bike` varchar(255) NOT NULL,
  `de_sn_bike` varchar(150) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_rent_details`
--

INSERT INTO `tbl_rent_details` (`ID`, `de_phone`, `de_ccn`, `de_type_bike`, `de_sn_bike`, `start_date`, `end_date`) VALUES
(1, '0587270216', '2849848-65165', 'electrical bikes', '116a', '2021-05-06', '2021-05-07'),
(2, '0587270216', '2849848-65165', 'electrical bikes', '116b', '2021-05-12', '2021-05-27'),
(3, '0587270216', '516516516561', 'electrical bikes', '116c', '2021-05-07', '2021-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `first_name`, `last_name`, `user_email`, `password`) VALUES
(5, 'dana', 'hamad', 'danah1@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b'),
(6, 'QQ', 'OO', 'QQ@GMAIL.COM', '4a7d1ed414474e4033ac29ccb8653d9b'),
(7, 'hosny', 'khalil ', 'hosnyish812@gmail.com', '62feabedfa439245b751b64732afec55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_contact_messages`
--
ALTER TABLE `tbl_contact_messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_rent`
--
ALTER TABLE `tbl_rent`
  ADD PRIMARY KEY (`rent_id`);

--
-- Indexes for table `tbl_rent_details`
--
ALTER TABLE `tbl_rent_details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_contact_messages`
--
ALTER TABLE `tbl_contact_messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_rent`
--
ALTER TABLE `tbl_rent`
  MODIFY `rent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_rent_details`
--
ALTER TABLE `tbl_rent_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
