-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2022 at 04:47 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bluecapital`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id_no` int(11) NOT NULL,
  `wallets` varchar(255) DEFAULT NULL,
  `addresses` varchar(2048) DEFAULT NULL,
  `qrcode` varchar(4096) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id_no`, `wallets`, `addresses`, `qrcode`) VALUES
(1, 'BTC', '153ByvKtXyqGw4PCWNKgexYLeM8okSP6j8', 'bitcoinqr.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_no` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `phone` varchar(55) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_no`, `firstname`, `lastname`, `user_email`, `user_pass`, `address`, `city`, `country`, `phone`, `photo`, `reg_date`) VALUES
(1, 'Bluecapital', 'Holding', 'admin@admin.com', 'dc647eb65e6711e155375218212b3964', 'Enugu', 'Enugu', 'Australia', '', 'cirrus.png', '2021-12-23');

-- --------------------------------------------------------

--
-- Table structure for table `fund`
--

CREATE TABLE `fund` (
  `id_no` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `ftxn` varchar(512) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `amount` decimal(19,9) DEFAULT NULL,
  `fproof` varchar(255) DEFAULT NULL,
  `fcomment` varchar(1024) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `request_date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fund`
--

INSERT INTO `fund` (`id_no`, `user_email`, `ftxn`, `currency`, `amount`, `fproof`, `fcomment`, `status`, `request_date`) VALUES
(112, 'user@gmail.com', 'TXN291673', 'BTC', '0.980000000', NULL, NULL, 'pending', '2022-05-30'),
(113, 'user@user.com', 'TXN123221', 'BTC', '4.000000000', NULL, NULL, 'pending', '2022-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `profit`
--

CREATE TABLE `profit` (
  `id_no` int(3) NOT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `ptxn` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `date_approved` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profit`
--

INSERT INTO `profit` (`id_no`, `user_email`, `ptxn`, `currency`, `amount`, `date_approved`) VALUES
(2, 'user@user.com', 'TXN977245', 'BTC', '20', '2022-07-05 14:04:19');

-- --------------------------------------------------------

--
-- Table structure for table `referral`
--

CREATE TABLE `referral` (
  `id` int(11) NOT NULL,
  `referral` varchar(50) NOT NULL,
  `user_referred_email` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transact`
--

CREATE TABLE `transact` (
  `id_no` int(11) NOT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `txn` varchar(25) DEFAULT NULL,
  `seller_email` varchar(255) DEFAULT NULL,
  `buyer_email` varchar(255) DEFAULT NULL,
  `first_cur` varchar(512) DEFAULT NULL,
  `second_cur` varchar(512) DEFAULT NULL,
  `seller_amount` decimal(18,9) DEFAULT NULL,
  `buyer_amount` decimal(18,9) DEFAULT NULL,
  `role` varchar(512) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `transact_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transact`
--

INSERT INTO `transact` (`id_no`, `user_email`, `txn`, `seller_email`, `buyer_email`, `first_cur`, `second_cur`, `seller_amount`, `buyer_amount`, `role`, `status`, `transact_date`) VALUES
(0, 'user@user.com', 'TXN728565', 'enochdavid8@gmail.com', 'enochdavid8@gmail.com', 'BTC', 'BTC', '12.000000000', '12.000000000', NULL, 'approved', '2022-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id_no` int(11) NOT NULL,
  `txn` varchar(25) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `package` varchar(512) DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `currency` varchar(255) DEFAULT 'USD',
  `duration` varchar(512) DEFAULT '30',
  `interest` decimal(8,2) DEFAULT NULL,
  `role` varchar(512) DEFAULT 'investor',
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `transact_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id_no`, `txn`, `user_email`, `package`, `amount`, `currency`, `duration`, `interest`, `role`, `status`, `transact_date`) VALUES
(12, 'TXN598068', 'user@gmail.com', 'starter', '100.00', 'Bitcoin', '30', '0.10', 'investor', 'pending', '2022-02-04'),
(14, 'TXN712608', 'admin@zenithbrokertrade.org', 'Gold Plus', '100000.00', 'BTC', '365', '0.10', 'investor', 'approved', '2022-02-04'),
(15, 'TXN749289', 'admin@zenithbrokertrade.org', 'Gold Plus', '100000.00', 'BTC', '365', '0.10', 'investor', 'pending', '2022-02-04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_no` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `phone` varchar(55) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `affid` int(255) DEFAULT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_no`, `firstname`, `lastname`, `user_email`, `user_pass`, `address`, `city`, `country`, `phone`, `photo`, `affid`, `reg_date`) VALUES
(35, 'Daniel', 'John', 'user@user.com', 'dc647eb65e6711e155375218212b3964', NULL, NULL, NULL, NULL, NULL, 111111, '2021-12-28'),
(37, 'Baron', 'Pacioty', 'donbaron2334@gmail.com', '8b649262319dd4f032f6f7bb156e10c4', NULL, NULL, NULL, NULL, NULL, 248002, '2022-02-04'),
(38, 'Elizabeth', 'Grigorova', 'lizescada.eg@gmail.com', '9bfae9bb28dcfbfb6a9b9c6f09d2b5c0', NULL, NULL, NULL, NULL, NULL, 332145, '2022-02-06');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `id_no` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `wtxn` varchar(512) DEFAULT NULL,
  `wcurrency` varchar(255) DEFAULT NULL,
  `wamount` decimal(19,9) DEFAULT NULL,
  `wallet_address` varchar(512) DEFAULT NULL,
  `wstatus` varchar(255) NOT NULL DEFAULT 'pending',
  `withdraw_request_date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `withdraw`
--

INSERT INTO `withdraw` (`id_no`, `user_email`, `wtxn`, `wcurrency`, `wamount`, `wallet_address`, `wstatus`, `withdraw_request_date`) VALUES
(32, 'user@user.com', 'TXN932719', 'BTC', '20.000000000', 'sadfoipolkgfdsADGJH', 'approved', '2022-07-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id_no`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_no`);

--
-- Indexes for table `fund`
--
ALTER TABLE `fund`
  ADD PRIMARY KEY (`id_no`);

--
-- Indexes for table `profit`
--
ALTER TABLE `profit`
  ADD PRIMARY KEY (`id_no`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_no`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`id_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fund`
--
ALTER TABLE `fund`
  MODIFY `id_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `profit`
--
ALTER TABLE `profit`
  MODIFY `id_no` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
