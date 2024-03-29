-- --------------------------------------------------------
-- Host:                         
-- Server version:               5.5.24-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2012-10-01 23:15:21
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for ustore
DROP DATABASE IF EXISTS `ustore`;
CREATE DATABASE IF NOT EXISTS `ustore` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci */;
USE `ustore`;


-- Dumping structure for table ustore.cart
DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `ID` bigint(11) NOT NULL AUTO_INCREMENT,
  `User_ID` bigint(11) NOT NULL,
  `Product_ID` bigint(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Delete_Flag` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`,`User_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ustore.cart: ~0 rows (approximately)
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;


-- Dumping structure for table ustore.comment
DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `ID` bigint(11) NOT NULL AUTO_INCREMENT,
  `Product_ID` bigint(20) NOT NULL,
  `User_ID` bigint(20) NOT NULL,
  `Detail` text COLLATE utf8_unicode_ci NOT NULL,
  `Create_Date` datetime NOT NULL,
  `Delete_Flag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ustore.comment: ~6 rows (approximately)
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
REPLACE INTO `comment` (`ID`, `Product_ID`, `User_ID`, `Detail`, `Create_Date`, `Delete_Flag`) VALUES
	(1, 1, 1, '1111', '2012-09-29 23:27:37', 0),
	(2, 1, 1, '12121', '2012-09-29 23:29:06', 0),
	(6, 1, 1, '1', '2012-09-30 00:56:56', 0),
	(7, 1, 1, 'q', '2012-09-30 01:03:50', 0),
	(8, 1, 1, '1', '2012-09-30 01:04:28', 0),
	(9, 1, 1, '2', '2012-09-30 01:04:45', 0);
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;


-- Dumping structure for table ustore.present_type
DROP TABLE IF EXISTS `present_type`;
CREATE TABLE IF NOT EXISTS `present_type` (
  `ID` int(2) NOT NULL,
  `Name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table ustore.present_type: ~3 rows (approximately)
/*!40000 ALTER TABLE `present_type` DISABLE KEYS */;
REPLACE INTO `present_type` (`ID`, `Name`) VALUES
	(0, 'Normal'),
	(1, 'Hot'),
	(2, 'New');
/*!40000 ALTER TABLE `present_type` ENABLE KEYS */;


-- Dumping structure for table ustore.product
DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Type` int(11) NOT NULL,
  `Sub_Type` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Present_Type` int(50) NOT NULL DEFAULT '0',
  `Description` text COLLATE utf8_unicode_ci NOT NULL,
  `Promotion_ID` int(11) NOT NULL,
  `Delete_Flag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ustore.product: ~2 rows (approximately)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
REPLACE INTO `product` (`ID`, `Name`, `Type`, `Sub_Type`, `Price`, `Present_Type`, `Description`, `Promotion_ID`, `Delete_Flag`) VALUES
	(1, 'Túi thời trang 001', 1, 1, 15000, 2, 'Túi thời trang\nMàu sắc: đen\nChất liệu: da cao cấp', 0, 0),
	(2, '454', 1, 1, 15000, 0, '', 0, 0);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;


-- Dumping structure for table ustore.product_image
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ustore.product_image: ~2 rows (approximately)
/*!40000 ALTER TABLE `product_image` DISABLE KEYS */;
REPLACE INTO `product_image` (`Product_ID`, `Cover_Img`, `Preview_Img_01`, `Preview_Img_02`, `Preview_Img_03`, `Preview_Img_04`, `Preview_Img_05`, `Detail_Img_01`, `Detail_Img_02`, `Detail_Img_03`, `Detail_Img_04`, `Detail_Img_05`, `Detail_Img_06`, `Detail_Img_07`, `Detail_Img_08`, `Detail_Img_09`, `Detail_Img_10`, `Detail_Img_11`, `Detail_Img_12`, `Detail_Img_13`, `Detail_Img_14`, `Detail_Img_15`, `Detail_Img_16`, `Detail_Img_17`, `Detail_Img_18`, `Detail_Img_19`, `Detail_Img_20`, `Delete_Flag`) VALUES
	(1, 'data/1_Cover_Img.png', 'data/1_Preview_Img_01.jpg', 'data/1_Preview_Img_02.jpg', 'data/1_Preview_Img_03.jpg', 'data/1_Preview_Img_04.jpg', 'data/1_Preview_Img_05.jpg', 'data/1_Detail_Img_01.png', 'data/1_Detail_Img_02.png', 'data/1_Detail_Img_03.png', 'data/1_Detail_Img_04.png', 'data/1_Detail_Img_05.png', 'data/1_Detail_Img_06.png', 'data/1_Detail_Img_07.png', 'data/1_Detail_Img_08.png', 'data/1_Detail_Img_09.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
	(2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);
/*!40000 ALTER TABLE `product_image` ENABLE KEYS */;


-- Dumping structure for table ustore.product_subtype
DROP TABLE IF EXISTS `product_subtype`;
CREATE TABLE IF NOT EXISTS `product_subtype` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type_ID` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ustore.product_subtype: ~2 rows (approximately)
/*!40000 ALTER TABLE `product_subtype` DISABLE KEYS */;
REPLACE INTO `product_subtype` (`ID`, `Type_ID`, `Name`) VALUES
	(1, 1, 'Premium'),
	(3, 1, 'Thời Trang');
/*!40000 ALTER TABLE `product_subtype` ENABLE KEYS */;


-- Dumping structure for table ustore.product_type
DROP TABLE IF EXISTS `product_type`;
CREATE TABLE IF NOT EXISTS `product_type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Type` (`Type`(30))
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ustore.product_type: ~1 rows (approximately)
/*!40000 ALTER TABLE `product_type` DISABLE KEYS */;
REPLACE INTO `product_type` (`ID`, `Type`) VALUES
	(1, 'Túi Xách');
/*!40000 ALTER TABLE `product_type` ENABLE KEYS */;


-- Dumping structure for table ustore.promotion
DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Detail` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ustore.promotion: ~0 rows (approximately)
/*!40000 ALTER TABLE `promotion` DISABLE KEYS */;
/*!40000 ALTER TABLE `promotion` ENABLE KEYS */;


-- Dumping structure for table ustore.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` text COLLATE utf8_unicode_ci NOT NULL,
  `Phone` text COLLATE utf8_unicode_ci NOT NULL,
  `Email` text COLLATE utf8_unicode_ci NOT NULL,
  `Role` int(11) NOT NULL,
  `Create_Date` datetime NOT NULL,
  `Delete_Flag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ustore.user: ~1 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`ID`, `Name`, `Password`, `Phone`, `Email`, `Role`, `Create_Date`, `Delete_Flag`) VALUES
	(1, 'TEST01', 'e10adc3949ba59abbe56e057f20f883e', '09123456789', 'test01@mail.com', 1, '2012-09-29 23:09:27', 0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Dumping structure for table ustore.user_role
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `ID` int(2) NOT NULL,
  `Name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Delete_Flag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`,`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ustore.user_role: ~2 rows (approximately)
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
REPLACE INTO `user_role` (`ID`, `Name`, `Delete_Flag`) VALUES
	(0, 'Admin', 0),
	(1, 'User', 0);
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
