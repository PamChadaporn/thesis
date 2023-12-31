-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2023 at 12:39 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studybaddy`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(30) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `category_status` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_status`) VALUES
(11, 'วิทยาศาสตร์และเทคโนโลยี', 'เปิดการใช้งาน'),
(12, 'วิทยาการจัดการ', 'เปิดการใช้งาน'),
(13, 'ศึกษาศาสตร์', 'เปิดการใช้งาน');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id_con` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `map` varchar(500) NOT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `line` varchar(30) DEFAULT NULL,
  `tol` varchar(10) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id_con`, `name`, `map`, `facebook`, `line`, `tol`, `email`, `address`) VALUES
(1, 'Study Baddy', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3820.5775725404455!2d100.18935867432643!3d16.747916320913646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30dfbe986affc42d%3A0xf04fb558f3130f0!2z4Lih4Lir4Liy4Lin4Li04LiX4Lii4Liy4Lil4Lix4Lii4LiZ4LmA4Lij4Lio4Lin4Lij!5e0!3m2!1sth!2sth!4v1688142033360!5m2!1sth!2sth\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'https://www.facebook.com/clotho.kit', 'studybaddy', '0123456789', 'clothokit@gmail.com', 'CLOTHO KIT, Naresuan U. 99 Moo. 9, Phitsanulok-Nakornsawan Rd, Tha Pho, Muang, Phitsanulok  65000');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchaseid` int(11) NOT NULL,
  `q_id` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `ID` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `date_purchase` datetime NOT NULL,
  `stu` int(1) NOT NULL,
  `name_booking` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `tel_booking` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `add_booking` varchar(300) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id_slide` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img_slide` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slide`, `name`, `img_slide`) VALUES
(2, '1', '1141772484.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sex` int(1) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `majer` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `Tel` varchar(10) NOT NULL,
  `Userlevel` int(1) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Password`, `Firstname`, `email`, `sex`, `category_id`, `majer`, `img`, `Tel`, `Userlevel`, `status`) VALUES
(2, '1234', 'Admin', 'admin@gmail.com', 0, 0, NULL, NULL, '', 1, 1),
(514, '1234', 'ธิติมา บัวสัมฤทธิ์', 'thitimaphosee@gmail.com', 1, 11, NULL, NULL, '', 2, 1),
(515, '1234', 'สมชาย รักเรียนมาก', 'somchay@gamil.com', 1, 11, NULL, NULL, 'tel', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchaseid`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slide`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=516;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
