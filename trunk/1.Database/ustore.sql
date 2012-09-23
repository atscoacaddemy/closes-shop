-- --------------------------------------------------------
-- Host:                         
-- Server version:               5.5.24-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2012-09-23 16:37:58
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
  `Delete_Flag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ustore.comment: ~0 rows (approximately)
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ustore.product: ~0 rows (approximately)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
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
  `Delete_Flag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Product_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ustore.product_image: ~0 rows (approximately)
/*!40000 ALTER TABLE `product_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_image` ENABLE KEYS */;


-- Dumping structure for table ustore.product_subtype
DROP TABLE IF EXISTS `product_subtype`;
CREATE TABLE IF NOT EXISTS `product_subtype` (
  `Type_ID` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Type_ID`,`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ustore.product_subtype: ~0 rows (approximately)
/*!40000 ALTER TABLE `product_subtype` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_subtype` ENABLE KEYS */;


-- Dumping structure for table ustore.product_type
DROP TABLE IF EXISTS `product_type`;
CREATE TABLE IF NOT EXISTS `product_type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Type` (`Type`(30))
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ustore.product_type: ~0 rows (approximately)
/*!40000 ALTER TABLE `product_type` DISABLE KEYS */;
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
  `Password` text COLLATE utf8_unicode_ci NOT NULL,
  `Phone` text COLLATE utf8_unicode_ci NOT NULL,
  `Email` text COLLATE utf8_unicode_ci NOT NULL,
  `Role` int(11) NOT NULL,
  `Create_Date` datetime NOT NULL,
  `Delete_Flag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ustore.user: ~0 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
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
