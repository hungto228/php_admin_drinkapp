-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 23, 2021 at 01:52 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id15856403_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `UserName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PassWord` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`UserName`, `PassWord`, `Link`, `Phone`) VALUES
('admin', 'admin', 'adress_local.jpg', '0379117280');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `ID` int(11) NOT NULL,
  `Name` text CHARACTER SET utf8 NOT NULL,
  `Link` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`ID`, `Name`, `Link`) VALUES
(3, 'Ice Summersss', 'adress_local.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `drink`
--

CREATE TABLE `drink` (
  `ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Link` text CHARACTER SET latin1 NOT NULL,
  `Price` float NOT NULL,
  `MenuId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `drink`
--

INSERT INTO `drink` (`ID`, `Name`, `Link`, `Price`, `MenuId`) VALUES
(34, 'Sữa Tươi Okinawa', 'https://gongcha.com.vn/wp-content/uploads/2018/10/Hinh-Web-OKINAWA-SUA-TUOI.png', 45000, 7),
(35, 'Strawberry Earl Grey', 'https://gongcha.com.vn/wp-content/uploads/2018/08/Strawberry-Earl-grey-latte.png', 45000, 7),
(36, 'Mango Matcha', 'https://gongcha.com.vn/wp-content/uploads/2018/06/Mango-Matcha-Latte.png', 43000, 7),
(37, 'Mango Milk Tea', 'https://gongcha.com.vn/wp-content/uploads/2018/06/Hinh-Web-OKINAWA-LATTE.png', 42000, 7),
(113, 'âsa', 'monan (10).jpg', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `ID` int(11) NOT NULL,
  `Name` mediumtext NOT NULL,
  `Link` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`ID`, `Name`, `Link`) VALUES
(7, 'Đồ uống', 'https://gongcha.com.vn/wp-content/uploads/2018/06/Hinh-Web-OKINAWA-LATTE.png');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `OrderId` int(10) NOT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `OrderStatus` tinyint(4) NOT NULL,
  `OrderPrice` float NOT NULL,
  `OrderDetail` text NOT NULL,
  `OrderComment` text NOT NULL,
  `OrderAddress` text NOT NULL,
  `UserPhone` text CHARACTER SET latin1 NOT NULL,
  `PaymentMethod` varchar(11) CHARACTER SET latin1 NOT NULL DEFAULT 'Braintree'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`OrderId`, `OrderDate`, `OrderStatus`, `OrderPrice`, `OrderDetail`, `OrderComment`, `OrderAddress`, `UserPhone`, `PaymentMethod`) VALUES
(26, '2020-05-18 09:43:50', -1, 143000, ' [{\"amount\":1,\"ice\":70,\"id\":10,\"link\":\"https://drinkshops.000webhostapp.com/admin_a/img/Mango-Milktea.png\",\"name\":\"Xoài Trân Châu\",\"price\":72000,\"size\":0,\"sugar\":50,\"toppingExtras\":\"Sương Sáo\n\"},{\"amount\":1,\"ice\":100,\"id\":11,\"link\":\"https://gongcha.com.vn/wp-content/uploads/2018/02/Tr%C3%A0-B%C3%AD-%C4%90ao-Alisan-2.png\",\"name\":\"Trà Bí Đao\",\"price\":71000,\"size\":1,\"sugar\":70,\"toppingExtras\":\"Sương Sáo\nThạch Nâu\n\"}]', 'okok', 'qbbqqqq', '+84382633254', ''),
(29, '2020-05-29 01:50:15', 2, 85000, ' [{\"amount\":1,\"ice\":30,\"id\":51,\"link\":\"https://gongcha.com.vn/wp-content/uploads/2018/02/Tr%C3%A0-B%C3%AD-%C4%90ao-Alisan-2.png\",\"name\":\"Trà Bí Đao\",\"price\":85000,\"size\":0,\"sugar\":30,\"toppingExtras\":\"Đậu Đỏ\n\"}]', 'okoo', 'vinh', '+84382633254', ''),
(31, '2020-06-01 01:21:38', 2, 152000, ' [{\"amount\":1,\"ice\":30,\"id\":53,\"link\":\"https://gongcha.com.vn/wp-content/uploads/2018/10/Hinh-Web-OKINAWA-SUA-TUOI.png\",\"name\":\"Sữa Tươi Okinawa\",\"price\":61000,\"size\":0,\"sugar\":50,\"toppingExtras\":\"2 Loại Hạt\n\"},{\"amount\":1,\"ice\":50,\"id\":54,\"link\":\"https://drinkshops.000webhostapp.com/admin_a/img/Mango-Milktea.png\",\"name\":\"Xoài Trân Châu\",\"price\":91000,\"size\":1,\"sugar\":30,\"toppingExtras\":\"2 Loại Hạt\n2 Loại Hạt\n\"}]', 'ok', 'vinh', '+84382633254', ''),
(32, '2020-06-22 03:35:44', 2, 104000, ' [{\"amount\":1,\"ice\":70,\"id\":56,\"link\":\"https://drinkshops.000webhostapp.com/admin_a/img/Mango-Milktea.png\",\"name\":\"Xoài Trân Châu\",\"price\":104000,\"size\":1,\"sugar\":70,\"toppingExtras\":\"Đậu Đỏ\n\"}]', 'okok', 'VinhHoang', '+84382633254', ''),
(33, '2020-06-23 03:09:25', 2, 90003, ' [{\"amount\":1,\"ice\":0,\"id\":1,\"link\":\"https://gongcha.com.vn/wp-content/uploads/2018/10/Hinh-Web-OKINAWA-SUA-TUOI.png\",\"name\":\"Sữa Tươi Okinawa\",\"price\":90003,\"size\":1,\"sugar\":50,\"toppingExtras\":\"Đậu Đỏ\n\"}]', 'okok', 'VinhHoang', '+84382633254', ''),
(34, '2020-06-23 03:09:29', 2, 64000, ' [{\"amount\":1,\"ice\":70,\"id\":2,\"link\":\"https://gongcha.com.vn/wp-content/uploads/2018/10/Hinh-Web-OKINAWA-SUA-TUOI.png\",\"name\":\"Sữa Tươi Okinawa\",\"price\":64000,\"size\":1,\"sugar\":50,\"toppingExtras\":\"2 Loại Hạt\n\"}]', 'okok', 'VinhHoang', '+84382633254', ''),
(35, '2020-06-23 03:09:36', 2, 245000, ' [{\"amount\":2,\"ice\":30,\"id\":4,\"link\":\"https://gongcha.com.vn/wp-content/uploads/2018/08/Strawberry-Earl-grey-latte.png\",\"name\":\"Strawberry Earl Grey\",\"price\":141000,\"size\":1,\"sugar\":50,\"toppingExtras\":\"Đậu Đỏ\n\"},{\"amount\":1,\"ice\":70,\"id\":5,\"link\":\"https://drinkshops.000webhostapp.com/admin_a/img/Chanh-Aiyu--2.png\",\"name\":\"Trân Châu Trắng\",\"price\":104000,\"size\":1,\"sugar\":50,\"toppingExtras\":\"Đậu Đỏ\n\"}]', 'okok', 'VinhHoang', '+84382633254', ''),
(36, '2020-06-22 05:53:19', 2, 152000, ' [{\"amount\":1,\"ice\":70,\"id\":1,\"link\":\"https://gongcha.com.vn/wp-content/uploads/2018/02/Tr%C3%A0-B%C3%AD-%C4%90ao-Alisan-2.png\",\"name\":\"Trà Bí Đao\",\"price\":56000,\"size\":0,\"sugar\":70,\"toppingExtras\":\"2 Loại Hạt\n\"},{\"amount\":2,\"ice\":70,\"id\":2,\"link\":\"https://gongcha.com.vn/wp-content/uploads/2018/02/Trà-Alisan-2.png\",\"name\":\"Trà Alisan\",\"price\":96000,\"size\":1,\"sugar\":30,\"toppingExtras\":\"2 Loại Hạt\n\"}]', 'ok', 'VinhHoang', '+84382633254', ''),
(37, '2020-06-22 07:48:32', -1, 235000, ' [{\"amount\":2,\"ice\":50,\"id\":3,\"link\":\"https://drinkshops.000webhostapp.com/admin_a/img/Mango-Milktea.png\",\"name\":\"Xoài Trân Châu\",\"price\":144000,\"size\":0,\"sugar\":70,\"toppingExtras\":\"2 Loại Hạt\n2 Loại Hạt\n\"},{\"amount\":1,\"ice\":50,\"id\":4,\"link\":\"https://drinkshops.000webhostapp.com/admin_a/img/TasuaChocolate-2.png\",\"name\":\"Yakult Đào\",\"price\":91000,\"size\":1,\"sugar\":70,\"toppingExtras\":\"2 Loại Hạt\n2 Loại Hạt\n\"}]', 'ok', 'VinhHoang', '+84382633254', ''),
(38, '2020-06-22 07:45:43', 2, 61000, ' [{\"amount\":1,\"ice\":100,\"id\":1,\"link\":\"https://gongcha.com.vn/wp-content/uploads/2018/10/Hinh-Web-OKINAWA-SUA-TUOI.png\",\"name\":\"Sữa Tươi Okinawa\",\"price\":61000,\"size\":0,\"sugar\":100,\"toppingExtras\":\"2 Loại Hạt\n\"}]', 'Truong ', 'VinhHoang', '+84382633254', ''),
(39, '2020-06-23 03:26:26', 2, 264000, ' [{\"amount\":2,\"ice\":70,\"id\":5,\"link\":\"https://gongcha.com.vn/wp-content/uploads/2018/10/Hinh-Web-OKINAWA-SUA-TUOI.png\",\"name\":\"Sữa Tươi Okinawa\",\"price\":135000,\"size\":0,\"sugar\":50,\"toppingExtras\":\"Đậu Đỏ\n\"},{\"amount\":2,\"ice\":70,\"id\":6,\"link\":\"https://gongcha.com.vn/wp-content/uploads/2018/06/Hinh-Web-OKINAWA-LATTE.png\",\"name\":\"Mango Milk Tea\",\"price\":129000,\"size\":0,\"sugar\":50,\"toppingExtras\":\"Đậu Đỏ\n\"}]', 'ok', 'VinhHoang', '+84382633254', ''),
(40, '2020-06-22 15:07:14', 3, 31000, ' [{\"amount\":1,\"ice\":100,\"id\":1,\"link\":\"https://drinkshops.000webhostapp.com/admin_a/img/thachtraicay.png\",\"name\":\"Trái Cây\",\"price\":31000,\"size\":1,\"sugar\":100,\"toppingExtras\":\"2 Loại Hạt\n\"}]', 'lấy nhiều đá', 'Nhut Truong', '+84929495717', ''),
(41, '2020-10-16 15:57:04', 2, 164000, ' [{\"amount\":1,\"ice\":100,\"id\":1,\"link\":\"https://drinkshops.000webhostapp.com/admin_a/img/khoaimon.png\",\"name\":\"Khoai Môn\",\"price\":106000,\"size\":0,\"sugar\":100,\"toppingExtras\":\"Đậu Đỏ\nTrân châu sợi\n\"},{\"amount\":1,\"ice\":70,\"id\":2,\"link\":\"https://gongcha.com.vn/wp-content/uploads/2018/06/Hinh-Web-OKINAWA-LATTE.png\",\"name\":\"Mango Milk Tea\",\"price\":58000,\"size\":0,\"sugar\":100,\"toppingExtras\":\"2 Loại Hạt\n\"}]', 'demo', 'Nhut Truong', '+84929495717', ''),
(43, '2021-03-22 13:14:33', 2, 59000, ' [{\"amount\":1,\"ice\":50,\"id\":6,\"link\":\"https://drinkshops.000webhostapp.com/admin_a/img/hate.png\",\"name\":\"Mận Hạt É\",\"price\":59000,\"size\":1,\"sugar\":0,\"toppingExtras\":\"\"}]', 'kkkkk', 'VinhHoang', '+84382633254', ''),
(44, '2020-10-31 12:38:52', -1, 59000, ' [{\"amount\":1,\"ice\":30,\"id\":7,\"link\":\"https://drinkshops.000webhostapp.com/admin_a/img/khoaimon.png\",\"name\":\"Khoai Môn\",\"price\":59000,\"size\":1,\"sugar\":30,\"toppingExtras\":\"\"}]', '', 'okok', '+84382633254', ''),
(45, '2021-03-22 12:57:50', 2, 163000, ' [{\"amount\":2,\"ice\":0,\"id\":1,\"link\":\"https://drinkshops.000webhostapp.com/admin_a/img/khoaimon.png\",\"name\":\"Khoai Môn\",\"price\":163000,\"size\":1,\"sugar\":0,\"toppingExtras\":\"Đậu Đỏ\n\"}]', 'ujs', 'VinhHoang', '+84382633254', ''),
(46, '2021-03-22 13:08:08', 3, 146000, ' [{\"amount\":1,\"ice\":30,\"id\":2,\"link\":\"https://drinkshops.000webhostapp.com/admin_a/img/khoaimon.png\",\"name\":\"Khoai Môn\",\"price\":146000,\"size\":0,\"sugar\":0,\"toppingExtras\":\"Đậu Đỏ\nĐậu Đỏ\n\"}]', 'jjj', 'hahha', '+84382633254', '');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `name`, `lat`, `lng`) VALUES
(1, 'Drink Shop 1st', 30.330756, -81.489445),
(2, 'Drink Shop 2nd', 30.331525, -81.487471),
(3, 'Drink Shop 3rd', 30.328302, -81.489413),
(4, 'Drink Shop 4th', 30.330099, -81.484091);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Phone` varchar(20) NOT NULL,
  `avatarUrl` text NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Birthdate` date NOT NULL,
  `Address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Phone`, `avatarUrl`, `Name`, `Birthdate`, `Address`) VALUES
('+84358360671', '', 'hungto', '1999-10-29', 'lan'),
('+84368536355', '+84368536355.jpg', 'hhhh', '1996-09-09', 'vibh'),
('+84379117280', '+84379117280.jpg', 'adim', '1999-10-30', 'hung'),
('84354287938', '', 'BT', '1999-10-09', 'hungto');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Phone`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `drink`
--
ALTER TABLE `drink`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MenuId` (`MenuId`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderId`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `drink`
--
ALTER TABLE `drink`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `OrderId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `drink`
--
ALTER TABLE `drink`
  ADD CONSTRAINT `drink_ibfk_1` FOREIGN KEY (`MenuId`) REFERENCES `menu` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
