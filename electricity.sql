-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2023 at 08:29 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electricity`
--

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `complain` varchar(250) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complains`
--

INSERT INTO `complains` (`id`, `email`, `complain`, `status`) VALUES
(3, 'ibrobk@gmail.com', 'I want you to help and configure my SSL certificate.', 'Resolved'),
(4, 'ibrobk@gamiold', 'Hi there my complain is  I am  lazy.', 'Pending..'),
(5, 'ibrobk12@gmail.com', 'I am very busy writing codes...', 'Resolved'),
(6, 'ibrobk@outlook.com', 'another complain..', 'Pending..'),
(10, 'usmanhassanmashi23@gmail.com', 'I have issue with my printer.', 'pending'),
(11, 'abubakarbishir081@gmail.com', 'My meter failed to load a Token.', 'Resolved'),
(12, 'abubakarbishir081@gmail.com', 'Chapter 4 and Chapter 5.', 'pending'),
(13, 'zeeisah94@gmail.com', 'My meter is tripping after every 5 hours.', 'Resolved'),
(14, 'd2abdulss@gmail.com', 'I have issue with buying meter token.', 'Resolved'),
(15, 'saifullahisuleiman0229@gmail.com', 'I have issues with my meter, now it has been 2days  without light....', 'Resolved'),
(17, 'ibrobk@gmail.com', 'I am having issues with my code....', 'pending'),
(19, 'aminasaboabdul@gmail.com', 'I am requesting for meter...', 'Resolved'),
(20, 'saminu@gmail.com', 'How are you doing,,,,', 'pending'),
(21, 'ibobk@esystems.ng', 'I am requesting for a new Meter...', 'pending'),
(22, 'saminu@gmail.com', 'How do you do? pls I need Meter.', 'pending'),
(23, 'ibrobk@esystems.ng', 'I am having issues with my meter not working..', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `verify` varchar(25) NOT NULL DEFAULT 'notVerified',
  `wallet` varchar(10) NOT NULL DEFAULT '0',
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `username`, `email`, `password`, `phone`, `verify`, `wallet`, `reg_date`) VALUES
(1, 'Sani Aminu', 'saminu', 'saminu@gmail.com', '123456', '09130056086', 'notVerified', '33100', '2023-07-21 19:30:26'),
(2, 'Ibrahim Yusuf', 'ibrobk', 'ibrobk@esystems.ng', 'ibrobk', '+2348135363778', 'notVerified', '17300', '2023-07-19 20:46:22'),
(4, 'Yusuf Ibrahim', 'esystems', 'ibrobk@yahoo.com', '123456', '08135363778', 'notVerified', '0', '2023-07-21 20:29:11'),
(5, 'Hajja Ibrahim', 'hajja', 'hajja@gmail.com', '123456', '08105062526', 'notVerified', '0', '2023-07-21 20:43:01'),
(7, 'Saifullahi Suleiman', 'saifullahi', 'saifullahisuleiman0229@gm', '654321', '08066169755', 'notVerified', '0', '2023-07-21 20:46:19'),
(8, 'Amina Sabo Abdul', 'little', 'aminasaboabdul@gmail.com', '123456', '08149904013', 'notVerified', '200', '2023-07-22 12:42:45');

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `charge` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `trans` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`id`, `name`, `amount`, `charge`, `status`, `trans`, `date`, `type`) VALUES
(1, 'Ibrahim Yusuf', '200', '0', 'success', 'FUDMA-367923137', '07/19/2023 09:15:59 pm', 'Deposit'),
(2, 'Ibrahim Yusuf', '5070', '0', 'success', 'FUDMA-145179004', '', 'Deposit'),
(3, 'Ibrahim Yusuf', '200', '0', 'success', 'FUDMA-55183314', '', 'Deposit'),
(4, 'Sani Aminu', '200', '0', 'success', 'FUDMA-609482389', '', 'Deposit'),
(5, 'Amina Sabo Abdul', '200', '0', 'success', 'FUDMA-287821199', '', 'Deposit');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `userId` int(11) NOT NULL,
  `fname` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `balance_bf` varchar(10) NOT NULL,
  `balance_af` varchar(10) NOT NULL,
  `purchase_code` varchar(50) NOT NULL,
  `trx_type` varchar(50) NOT NULL,
  `trx_id` varchar(50) NOT NULL,
  `trx_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`userId`, `fname`, `username`, `email`, `amount`, `balance_bf`, `balance_af`, `purchase_code`, `trx_type`, `trx_id`, `trx_time`, `status`) VALUES
(1, 'Ibrahim Yusuf', 'ibrobk', 'ibrobk@esystems.ng', '200', '11830', '12030', '', 'Deposit', 'FUDMA-367923137', '0000-00-00 00:00:00', 'success'),
(2, 'Ibrahim Yusuf', 'ibrobk', 'ibrobk@esystems.ng', '5070', '12030', '17100', '', 'Deposit', 'FUDMA-145179004', '2023-07-19 20:17:56', 'success'),
(3, 'Ibrahim Yusuf', 'ibrobk', 'ibrobk@esystems.ng', '200', '17100', '17300', '', 'Deposit', 'FUDMA-55183314', '2023-07-19 20:46:22', 'success'),
(4, 'Sani Aminu', 'saminu', 'saminu@gmail.com', '200', '32900', '33100', '', 'Deposit', 'FUDMA-609482389', '2023-07-21 19:30:26', 'success'),
(5, 'Amina Sabo Abdul', 'little', 'aminasaboabdul@gmail.com', '200', '0', '200', '', 'Deposit', 'FUDMA-287821199', '2023-07-22 12:42:45', 'success');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
