-- --------------------------------------------------------
-- Host:                         
-- Server version:               5.5.24-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2012-10-02 23:07:30
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for ustorevn_ustore
DROP DATABASE IF EXISTS `ustorevn_ustore`;
CREATE DATABASE IF NOT EXISTS `ustorevn_ustore` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci */;
USE `ustorevn_ustore`;


-- Dumping structure for table ustorevn_ustore.cart

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `ID` bigint(11) NOT NULL AUTO_INCREMENT,
  `User_ID` bigint(11) NOT NULL,
  `Product_ID` bigint(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Delete_Flag` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`,`User_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=54 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ID`, `User_ID`, `Product_ID`, `Quantity`, `Delete_Flag`) VALUES
(1, 1, 2, 2, 1),
(50, 1, 1, 4, 1),
(51, 1, 2, 3, 1),
(52, 1, 2, 25, 0),
(53, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `ID` bigint(11) NOT NULL AUTO_INCREMENT,
  `Product_ID` bigint(20) NOT NULL,
  `User_ID` bigint(20) NOT NULL,
  `Detail` text COLLATE utf8_unicode_ci NOT NULL,
  `Create_Date` datetime NOT NULL,
  `Delete_Flag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=45 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`ID`, `Product_ID`, `User_ID`, `Detail`, `Create_Date`, `Delete_Flag`) VALUES
(1, 1, 1, 'Còn hàng không bạn, mình muốn đặt hàng', '2012-09-20 02:06:08', 0),
(2, 1, 2, 'Hàng này quá chuẩn', '2012-09-25 12:30:00', 0),
(3, 1, 1, 'Quá đẹp!', '2012-09-27 00:59:43', 0),
(4, 1, 1, 'Tuyệt', '2012-09-27 01:04:07', 0),
(32, 1, 10, 'Hồ Sơn Lâm', '2012-09-27 12:18:36', 0),
(33, 1, 10, 'Phần đánh giá sản phẩm của các bạn', '2012-09-27 12:22:16', 0),
(34, 1, 10, 'giá sản phẩm của các bạn', '2012-09-27 12:25:21', 0),
(35, 1, 10, 'phẩm của các bạn', '2012-09-27 12:25:30', 0),
(36, 1, 10, ' các bạn', '2012-09-27 12:25:42', 0),
(37, 1, 10, ' sản phẩm của các bạn', '2012-09-27 12:25:52', 0),
(38, 1, 10, ' sản phẩm của các bạn', '2012-09-27 12:26:06', 0),
(39, 1, 10, 'sad', '2012-09-27 12:30:26', 0),
(40, 1, 10, 'dsad', '2012-09-27 12:30:33', 0),
(41, 1, 10, 'aaa bbb ccc', '2012-09-27 12:31:27', 0),
(42, 1, 1, 'zzz', '2012-09-27 15:10:56', 0),
(43, 1, 1, 'xxxx', '2012-09-27 16:13:55', 0),
(44, 2, 1, 'Dep wa', '2012-10-02 23:45:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `present_type`
--

DROP TABLE IF EXISTS `present_type`;
CREATE TABLE IF NOT EXISTS `present_type` (
  `ID` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `Name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `present_type`
--

INSERT INTO `present_type` (`ID`, `Name`) VALUES
('0', 'Normal'),
('1', 'Hot'),
('2', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Type` int(11) NOT NULL,
  `Sub_Type` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL,
  `Promotion_ID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Delete_Flag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `Name`, `Type`, `Sub_Type`, `Price`, `Description`, `Promotion_ID`, `Quantity`, `Delete_Flag`) VALUES
(1, 'Váy mùa hè', 1, 1, 250000, 'Đẹp, dễ thương</br>Xinh tươi', 1, 2, 0),
(2, 'Quần hoa lưng cao ', 1, 1, 115000, 'Đẹp quyến rũ đôi mông bạn', 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

DROP TABLE IF EXISTS `product_image`;
CREATE TABLE IF NOT EXISTS `product_image` (
  `Product_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Cover_Img` text COLLATE utf8_unicode_ci,
  `Preview_Img_01` text COLLATE utf8_unicode_ci,
  `Preview_Img_02` text COLLATE utf8_unicode_ci,
  `Preview_Img_03` text COLLATE utf8_unicode_ci,
  `Preview_Img_04` text COLLATE utf8_unicode_ci,
  `Preview_Img_05` text COLLATE utf8_unicode_ci,
  `Detail_Img_01` text COLLATE utf8_unicode_ci,
  `Detail_Img_02` text COLLATE utf8_unicode_ci,
  `Detail_Img_03` text COLLATE utf8_unicode_ci,
  `Detail_Img_04` text COLLATE utf8_unicode_ci,
  `Detail_Img_05` text COLLATE utf8_unicode_ci,
  `Detail_Img_06` text COLLATE utf8_unicode_ci,
  `Detail_Img_07` text COLLATE utf8_unicode_ci,
  `Detail_Img_08` text COLLATE utf8_unicode_ci,
  `Detail_Img_09` text COLLATE utf8_unicode_ci,
  `Detail_Img_10` text COLLATE utf8_unicode_ci,
  `Detail_Img_11` text COLLATE utf8_unicode_ci,
  `Detail_Img_12` text COLLATE utf8_unicode_ci,
  `Detail_Img_13` text COLLATE utf8_unicode_ci,
  `Detail_Img_14` text COLLATE utf8_unicode_ci,
  `Detail_Img_15` text COLLATE utf8_unicode_ci,
  `Detail_Img_16` text COLLATE utf8_unicode_ci,
  `Detail_Img_17` text COLLATE utf8_unicode_ci,
  `Detail_Img_18` text COLLATE utf8_unicode_ci,
  `Detail_Img_19` text COLLATE utf8_unicode_ci,
  `Detail_Img_20` text COLLATE utf8_unicode_ci,
  `Delete_Flag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Product_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`Product_ID`, `Cover_Img`, `Preview_Img_01`, `Preview_Img_02`, `Preview_Img_03`, `Preview_Img_04`, `Preview_Img_05`, `Detail_Img_01`, `Detail_Img_02`, `Detail_Img_03`, `Detail_Img_04`, `Detail_Img_05`, `Detail_Img_06`, `Detail_Img_07`, `Detail_Img_08`, `Detail_Img_09`, `Detail_Img_10`, `Delete_Flag`) VALUES
(1, 'data/1_002.jpg', 'data/002-01.png', 'data/002-02.png', 'data/002-03.png', 'data/002-04.png', 'data/002-05.png', 'data/002-06.png', 'data/002-07.png', 'data/002-08.png', 'data/002-09.png', 'data/002-10.png', 'data/002-11.png', NULL, NULL, NULL, NULL, 0),
(2, 'data/002_quan.jpg', 'data/001_quan.jpg', '', NULL, NULL, NULL, 'data/002_quan.jpg', 'data/001_quan.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_subtype`
--

DROP TABLE IF EXISTS `product_subtype`;
CREATE TABLE IF NOT EXISTS `product_subtype` (
  `Type_ID` int(11) NOT NULL,
  `Name` char(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Type_ID`,`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

DROP TABLE IF EXISTS `product_type`;
CREATE TABLE IF NOT EXISTS `product_type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Type` (`Type`(30))
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Detail` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` text COLLATE utf8_unicode_ci NOT NULL,
  `Phone` text COLLATE utf8_unicode_ci NOT NULL,
  `Email` text COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `Create_Date` datetime NOT NULL,
  `Delete_Flag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Name`, `Password`, `Phone`, `Email`, `role`, `Create_Date`, `Delete_Flag`) VALUES
(1, 'DINH BA NHUT', 'e10adc3949ba59abbe56e057f20f883e', '0976937118', 'a@yahoo.com', 1, '2012-09-18 00:00:00', 0),
(2, 'HO SON LAM', 'e10adc3949ba59abbe56e057f20f883e', '1111111111', 'sieudangf2@yahoo.com', 1, '2012-09-24 17:08:23', 0),
(3, 'HO SON LAM', 'e10adc3949ba59abbe56e057f20f883e', '1111111111', 'lam.hoson_uns@yahoo.com', 1, '2012-09-24 17:09:08', 0),
(4, 'HO SON LAM', 'e10adc3949ba59abbe56e057f20f883e', '1111111111', '0958043171@yahoo.com', 1, '2012-09-24 17:11:56', 0),
(5, 'HO SON LAM', 'e10adc3949ba59abbe56e057f20f883e', '1111111111', 'dinhbanhut24@yahoo.com', 1, '2012-09-24 17:34:14', 0),
(6, 'HO SON LAM', 'e10adc3949ba59abbe56e057f20f883e', '1111111111', 'sieud@yahoo.com', 1, '2012-09-24 17:36:18', 0),
(7, 'HO SON LAM', 'e10adc3949ba59abbe56e057f20f883e', '1111111111', 's@yahoo.com', 1, '2012-09-24 17:38:31', 0),
(8, 'HO SON LAM', 'e10adc3949ba59abbe56e057f20f883e', '1111111111', 'si@yahoo.com', 1, '2012-09-24 17:43:02', 0),
(9, 'HO SON LAM', 'e10adc3949ba59abbe56e057f20f883e', '1111111111', 'sie@yahoo.com', 1, '2012-09-24 17:45:43', 0),
(10, 'HO SON LAM', 'e10adc3949ba59abbe56e057f20f883e', '1111111111', 'b@yahoo.com', 1, '2012-09-24 17:48:14', 0),
(11, 'HO SON LAM', 'e10adc3949ba59abbe56e057f20f883e', '1111111111', 'c@yahoo.com', 1, '2012-09-24 18:03:05', 0),
(12, 'TRUONG PHUC', 'e10adc3949ba59abbe56e057f20f883e', '1111111111', 'x@yahoo.com', 1, '2012-09-25 00:00:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `ID` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `Name` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `Delete_Flag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`,`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`ID`, `Name`, `Delete_Flag`) VALUES
('0', 'Admin', 0),
('1', 'User', 0);
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
