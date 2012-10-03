-- --------------------------------------------------------
-- Host:                         
-- Server version:               5.5.24-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2012-10-03 21:48:21
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ustorevn_ustore.cart: ~1 rows (approximately)
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
REPLACE INTO `cart` (`ID`, `User_ID`, `Product_ID`, `Quantity`, `Delete_Flag`) VALUES
	(3, 1, 13, 8, 0);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;


-- Dumping structure for table ustorevn_ustore.comment
DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `ID` bigint(11) NOT NULL AUTO_INCREMENT,
  `Product_ID` bigint(20) NOT NULL,
  `User_ID` bigint(20) NOT NULL,
  `Detail` text COLLATE utf8_unicode_ci NOT NULL,
  `Create_Date` datetime NOT NULL,
  `Delete_Flag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ustorevn_ustore.comment: ~3 rows (approximately)
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
REPLACE INTO `comment` (`ID`, `Product_ID`, `User_ID`, `Detail`, `Create_Date`, `Delete_Flag`) VALUES
	(10, 12, 1, '123', '2012-10-03 00:08:20', 0),
	(11, 12, 1, '152', '2012-10-03 00:08:23', 0),
	(12, 12, 1, '222222', '2012-10-03 00:08:25', 0);
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;


-- Dumping structure for table ustorevn_ustore.present_type
DROP TABLE IF EXISTS `present_type`;
CREATE TABLE IF NOT EXISTS `present_type` (
  `ID` int(2) NOT NULL,
  `Name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table ustorevn_ustore.present_type: ~3 rows (approximately)
/*!40000 ALTER TABLE `present_type` DISABLE KEYS */;
REPLACE INTO `present_type` (`ID`, `Name`) VALUES
	(0, 'Normal'),
	(1, 'Hot'),
	(2, 'New');
/*!40000 ALTER TABLE `present_type` ENABLE KEYS */;


-- Dumping structure for table ustorevn_ustore.product
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
  `Quantity` int(10) DEFAULT '0',
  `Delete_Flag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ustorevn_ustore.product: ~2 rows (approximately)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
REPLACE INTO `product` (`ID`, `Name`, `Type`, `Sub_Type`, `Price`, `Present_Type`, `Description`, `Promotion_ID`, `Quantity`, `Delete_Flag`) VALUES
	(12, '12', 1, 1, 0, 0, '<p>111</p>\r\n<p>1213</p>\r\n<p>123</p>\r\n<p>15423654</p>\r\n<p>&nbsp;</p>\r\n<p>123546</p>', 0, 1, 0),
	(13, '123', 1, 1, 0, 0, 'yyyyy', 0, 1, 0);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;


-- Dumping structure for table ustorevn_ustore.product_image
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ustorevn_ustore.product_image: ~2 rows (approximately)
/*!40000 ALTER TABLE `product_image` DISABLE KEYS */;
REPLACE INTO `product_image` (`Product_ID`, `Cover_Img`, `Preview_Img_01`, `Preview_Img_02`, `Preview_Img_03`, `Preview_Img_04`, `Preview_Img_05`, `Detail_Img_01`, `Detail_Img_02`, `Detail_Img_03`, `Detail_Img_04`, `Detail_Img_05`, `Detail_Img_06`, `Detail_Img_07`, `Detail_Img_08`, `Detail_Img_09`, `Detail_Img_10`, `Detail_Img_11`, `Detail_Img_12`, `Detail_Img_13`, `Detail_Img_14`, `Detail_Img_15`, `Detail_Img_16`, `Detail_Img_17`, `Detail_Img_18`, `Detail_Img_19`, `Detail_Img_20`, `Delete_Flag`) VALUES
	(12, 'data/12_Cover_Img.png', 'data/12_Preview_Img_01.png', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
	(13, 'data/12_Cover_Img.png', 'data/12_Cover_Img.png', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);
/*!40000 ALTER TABLE `product_image` ENABLE KEYS */;


-- Dumping structure for table ustorevn_ustore.product_subtype
DROP TABLE IF EXISTS `product_subtype`;
CREATE TABLE IF NOT EXISTS `product_subtype` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type_ID` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ustorevn_ustore.product_subtype: ~2 rows (approximately)
/*!40000 ALTER TABLE `product_subtype` DISABLE KEYS */;
REPLACE INTO `product_subtype` (`ID`, `Type_ID`, `Name`) VALUES
	(1, 1, 'Premium'),
	(3, 1, 'Thời Trang');
/*!40000 ALTER TABLE `product_subtype` ENABLE KEYS */;


-- Dumping structure for table ustorevn_ustore.product_type
DROP TABLE IF EXISTS `product_type`;
CREATE TABLE IF NOT EXISTS `product_type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Type` (`Type`(30))
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ustorevn_ustore.product_type: ~1 rows (approximately)
/*!40000 ALTER TABLE `product_type` DISABLE KEYS */;
REPLACE INTO `product_type` (`ID`, `Type`) VALUES
	(1, 'Túi Xách');
/*!40000 ALTER TABLE `product_type` ENABLE KEYS */;


-- Dumping structure for table ustorevn_ustore.promotion
DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Detail` text COLLATE utf8_unicode_ci,
  `Apply_Date_Start` datetime DEFAULT NULL,
  `Apply_Date_End` datetime DEFAULT NULL,
  `Delete_Flag` int(11) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ustorevn_ustore.promotion: ~0 rows (approximately)
/*!40000 ALTER TABLE `promotion` DISABLE KEYS */;
/*!40000 ALTER TABLE `promotion` ENABLE KEYS */;


-- Dumping structure for table ustorevn_ustore.user
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ustorevn_ustore.user: ~2 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`ID`, `Name`, `Password`, `Phone`, `Email`, `Role`, `Create_Date`, `Delete_Flag`) VALUES
	(1, 'TEST01', 'e10adc3949ba59abbe56e057f20f883e', '09123456789', 'test01@mail.com', 1, '2012-09-29 23:09:27', 0),
	(2, 'dfdsf', '1a9b56cf96cbb349a2d222bc3229b290', 'dsfdsf', 'dsfdf', 0, '2012-10-02 12:12:00', 0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Dumping structure for table ustorevn_ustore.user_role
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `ID` int(2) NOT NULL,
  `Name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Delete_Flag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`,`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ustorevn_ustore.user_role: ~2 rows (approximately)
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
REPLACE INTO `user_role` (`ID`, `Name`, `Delete_Flag`) VALUES
	(0, 'User', 0),
	(1, 'Admin', 0);
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
