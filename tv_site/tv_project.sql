-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2017 at 07:14 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tv_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_create`
--

CREATE TABLE `tbl_create` (
  `id_make` int(10) NOT NULL,
  `make` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_create`
--

INSERT INTO `tbl_create` (`id_make`, `make`) VALUES
(3, 'LG 32LH510U'),
(1, 'LG 40UH630V'),
(4, 'PHILIPS 32PHT4101'),
(2, 'SAMSUNG UE-48J5510');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tvs`
--

CREATE TABLE `tbl_tvs` (
  `id_tv` int(10) NOT NULL,
  `id_make` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `moreinfo` text NOT NULL,
  `pictures` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_tvs`
--

INSERT INTO `tbl_tvs` (`id_tv`, `id_make`, `price`, `moreinfo`, `pictures`) VALUES
(1, 1, 400, 'Добър телевизор.', ''),
(2, 2, 600, 'Много добър телевизор!', ''),
(3, 3, 700, 'Още по- добър телевизор!', ''),
(4, 4, 900, 'Най-добрият телевизор!', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `passwd` varchar(20) NOT NULL,
  `usertype` tinyint(4) NOT NULL,
  `personname` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `username`, `passwd`, `usertype`, `personname`) VALUES
(1, 'admin', 'admin', 1, 'Stoyan Shterev'),
(2, 'nene', 'nene', 2, 'zzz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_create`
--
ALTER TABLE `tbl_create`
  ADD PRIMARY KEY (`id_make`),
  ADD KEY `make` (`make`);

--
-- Indexes for table `tbl_tvs`
--
ALTER TABLE `tbl_tvs`
  ADD PRIMARY KEY (`id_tv`),
  ADD KEY `id_make` (`id_make`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_create`
--
ALTER TABLE `tbl_create`
  MODIFY `id_make` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_tvs`
--
ALTER TABLE `tbl_tvs`
  MODIFY `id_tv` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
