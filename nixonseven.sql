-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2022 at 05:26 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nixonseven`
--
CREATE DATABASE IF NOT EXISTS `nixonseven` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `nixonseven`;

-- --------------------------------------------------------

--
-- Table structure for table `admin user`
--

CREATE TABLE `userAccount` (
  `userID` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `phone` int(8) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `role` varchar (50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (userID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for 'food items'

CREATE TABLE `foodItem` (
  `foodID` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `price` float(5,2) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `imageName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (foodID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for 'cart'

CREATE TABLE `cart`(
  `cartID` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` float(5,2) DEFAULT NULL,
  `quantity` int(50) NULL,
  `time` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (cartID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for 'actualcart'

CREATE TABLE `actualcart`(
  `cartID` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` float(5,2) DEFAULT NULL,
  `quantity` int(50) NULL,
  `time` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (cartID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for 'order'

CREATE TABLE `order`(
  `orderID` int(5) NOT NULL AUTO_INCREMENT,
  `cusName` varchar(50) DEFAULT NULL,
  `cusNum` varchar(50) DEFAULT NULL,
  `cardNum` int(50) DEFAULT NULL,
  `cvv` int(50) DEFAULT NULL,
  `expiryDate` varchar(50) DEFAULT NULL,
  `total_product`  varchar(500) NOT NULL,
  `quantity` int(50) NOT NULL,
  `total_price` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'uncompleted',
  `date` DATE DEFAULT CURRENT_DATE,
  `startTime` TIME NOT NULL,
  `endTime` TIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (orderID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for 'restaurant staff'

CREATE TABLE `stafforder` (
  `staffOrderID` int(5) NOT NULL AUTO_INCREMENT,
  `cusName` varchar(50) DEFAULT NULL,
  `cusNum` int(5) NOT NULL,
  `total_product` varchar(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `total_price` float(5,2) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (staffOrderID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for 'coupons'

CREATE TABLE `coupons` (
  `couponCode` varchar(5) NOT NULL,
  `couponDescription` varchar(50) NOT NULL,
  `discountAmount` int(2) NOT NULL,
  PRIMARY KEY (couponCode)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin user`
--

INSERT INTO `userAccount` (`name`, `surname`, `phone`, `email`, `type`, `role`, `password`,`status`) VALUES
('admin', 'dylan', 11111111, 'admin@email.com', 'Admin', 'admin', 'admin', 'Active');
INSERT INTO `userAccount` (`name`, `surname`, `phone`, `email`, `type`, `role`, `password`,`status`) VALUES
('staff', 'edmund', 22222222, 'admin@email.com', 'Staff', 'admin', 'staff', 'Active');
INSERT INTO `userAccount` (`name`, `surname`, `phone`, `email`, `type`, `role`, `password`,`status`) VALUES
('manager', 'ernest', 33333333, 'admin@email.com', 'Manager', 'admin', 'manager', 'Active');
INSERT INTO `userAccount` (`name`, `surname`, `phone`, `email`, `type`, `role`, `password`,`status`) VALUES
('manager', 'raziq', 44444444, 'admin@email.com', 'manager', 'admin', 'manager', 'Active');
INSERT INTO `userAccount` (`name`, `surname`, `phone`, `email`, `type`, `role`, `password`,`status`) VALUES
('owner', 'kings', 55555555, 'admin@email.com', 'Owner', 'admin', 'owner', 'Active');
INSERT INTO `userAccount` (`name`, `surname`, `phone`, `email`, `type`, `role`, `password`,`status`) VALUES
('staff', 'zihao', 66666666, 'admin@email.com', 'Staff', 'admin', 'staff', 'Active');

--
-- 100 Dumping data for table 'order'
--

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('james', '1', 'salad', '1', '6', 'completed', '2022-05-22', '03:23:43', '03:50:55');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('robert', '2', 'chicken rice', '1', '4.5', 'Uncomplete', '2021-03-21', '14:22:22' , '15:10:54');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('john', '3', 'green tea', '3', '8', 'Uncomplete' ,'2021-03-22', '10:38:40', "11:23:34");

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('michael', '4', 'larva cake', '3', '4', 'completed', '2021-04-13', '12:03:30','13:10:03');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('david', '5', 'salad', '1', '5', 'Uncomplete', '2021-04-23', '12:25:21','14:00:23');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`)VALUES
('william', '6', 'fried noodles', '1', '4.5', 'completed','2021-04-23', '12:28:21','14:55:23');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('richard', '7', 'lemon tea', '1', '5', 'Uncomplete','2021-04-23', '12:39:21','14:50:23');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('joseph', '8', 'chocolate cake', '1', '4.5', 'Uncomplete','2021-04-23', '12:00:21','14:00:23');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('thomas', '9', 'salad', '1', '5', 'Uncomplete','2021-04-23', '12:59:21','14:25:23');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('charles', '10', 'chicken rice', '1', '4.5', 'Uncomplete','2021-01-13', '06:59:04','07:45:02');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('christopher', '11', 'lemon tea', '1', '6', 'Uncomplete','2021-01-15', '14:30:12','15:22:26');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('daniel', '12', 'larva cake', '1', '4.5', 'Uncomplete','2021-01-02', '13:58:18','14:58:32');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('matthew', '13', 'salad', '3', '5', 'Uncomplete','2021-01-09', '18:32:08','20:00:20');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('anthony', '14', 'fried noodles', '2', '9', 'completed','2021-01-24', '15:47:32','17:00:26');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('mark', '15', 'green tea', '1', '5', 'Uncomplete','2021-01-31', '19:35:18','20:58:44');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('donald', '16', 'larva cake', '1', '4.5', 'Uncomplete','2021-02-20', '13:59:18','15:21:56');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('steven', '17', 'chicken rice', '1', '5', 'Uncomplete','2021-03-20', '14:51:57','16:19:32');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('paul', '18', 'fried noodles', '1', '4.5', 'completed','2021-03-23', '12:58:19','14:05:56');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('andrew', '19', 'green tea', '1', '5', 'Uncomplete','2021-03-27', '14:48:30','16:21:44');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('joshua', '20', 'larva cake', '1', '4.5', 'Uncomplete','2021-04-09', '19:06:49','20:30:27');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('kenneth', '21', 'salad', '1', '6', 'Uncomplete','2021-04-15', '14:26:12','16:33:23');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('kevin', '22', 'chicken rice', '1', '4.5', 'Uncomplete','2021-04-18', '10:55:43','12:12:12');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('brian', '23', 'lemon tea', '3', '5', 'Uncomplete','2021-04-18',' 14:41:18','15:55:31');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('george', '24', 'chocolate cake', '1', '5', 'Uncomplete','2021-04-21', '18:41:05','20:00:00');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('timothy', '25', 'salad', '1', '5', 'Uncomplete','2021-05-04', '16:18:28','17:56:23');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('ronald', '26', 'fried noodles', '1', '4.5', 'Uncomplete','2021-05-24', '21:21:52','22:00:02');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('edward', '27', 'chicken rice', '1', '5', 'Uncomplete','2021-05-25', '14:11:05','15:33:21');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('jason', '28', 'green tea', '1', '4.5', 'completed','2021-05-26', '16:39:49','17:57:21');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('jeffrey', '29', 'salad', '1', '5', 'Uncomplete','2021-05-27','20:24:43', '21:58:28');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('ryan', '30', 'chicken rice', '1', '4.5', 'Uncomplete','2021-05-28', '10:50:11','12:23:12');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('jacob', '31', 'green tea', '1', '6', 'Uncomplete','2021-06-12', '10:07:15','11:42:11');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('gary', '32', 'larva cake', '1', '4.5', 'Uncomplete','2021-06-18', '19:07:14','20:12:45');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('nicholas', '33', 'fried noodles', '3', '5', 'completed','2021-06-23', '20:08:59','21:00:00');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('eric', '34', 'lemon tea', '1', '5', 'Uncomplete','2021-06-29', '15:45:54','16:45:45');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('jonathan', '35', 'chocolate cake', '1', '5', 'completed','2021-06-29', '17:34:20','19:00:20');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('stephen', '36', 'larva cake', '1', '4.5', 'Uncomplete','2021-07-01', '20:23:37','21:30:00');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('larry', '37', 'salad', '1', '5', 'Uncomplete','2021-07-21', '12:05:18','13:00:00');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('justin', '38', 'fried noodles', '1', '4.5', 'Uncomplete','2021-07-21', '17:00:37','18:30:00');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('scott', '39', 'lemon tea', '1', '5', 'Uncomplete','2021-08-02', '15:42:45','16:59:59');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('brandon', '40', 'chocolate cake', '1', '4.5', 'Uncomplete','2021-08-12', '11:17:13','12:56:56');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('benjamin', '41', 'chicken rice', '1', '6', 'Uncomplete','2021-08-15', '15:46:55','16:45:45');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('samuel', '42', 'fried noodles', '1', '4.5', 'completed','2021-08-26', '15:36:58','16:56:22');


INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('gregory', '43', 'lemon tea', '3', '5', 'Uncomplete','2021-09-02', '17:21:00','18:45:21');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('alexander', '44', 'chocolate cake', '10', '15', 'Uncomplete','2021-09-03', '17:16:15','19:05:05');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('frank', '45', 'fried noodles', '1', '5', 'Uncomplete','2021-09-13', '16:38:02','17:53:53');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('patrick', '46', 'salad', '1', '4.5', 'Uncomplete','2021-09-14', '11:40:26','13:04:04');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('raymond', '47', 'green tea', '1', '5', 'Uncomplete','2021-09-17', '18:20:20','19:58:33');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('jack', '48', 'larva cake', '1', '4.5', 'Uncomplete','2021-09-18', '13:11:16','14:50:50' );

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('dennis', '49', 'salad', '1', '5', 'Uncomplete','2021-09-19', '15:38:02','16:53:33');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('jerry', '50', 'chicken rice', '1', '4.5', 'Uncomplete','2021-09-22', '11:17:47','12:44:44');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('tyler', '51', 'green tea', '1', '6', 'Uncomplete','2021-09-22', '11:17:47','12:44:45');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('aaron', '52', 'chocolate cake', '1', '4.5', 'Uncomplete','2021-09-22', '11:17:47','12:44:47');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('jose', '53', 'chicken rice', '3', '5', 'Uncomplete','2021-09-22', '11:17:47','12:44:48');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('adam', '54', 'green tea', '1', '5', 'Uncomplete','2021-09-22', '12:17:47','13:44:44');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('nathan', '55', 'salad', '1', '5', 'Uncomplete','2021-09-22', '13:17:47','14:44:44');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('henry', '56', 'chocolate cake', '1', '4.5', 'Uncomplete','2021-09-22', '10:17:47','12:44:44');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('douglas', '57', 'chicken rice', '1', '5', 'Uncomplete','2021-09-22', '11:17:47','12:44:44');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('zachary', '58', 'salad', '1', '4.5', 'Uncomplete','2021-09-22', '11:17:47','13:44:44');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('peter', '59', 'fried noodles', '1', '5', 'Uncomplete','2021-09-22', '11:17:47','12:47:44');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('kyle', '60', 'larva cake', '1', '4.5', 'Uncomplete','2021-09-22', '11:17:47','12:36:44');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('ethan', '61', 'salad', '1', '6', 'Uncomplete','2021-09-22', '15:17:47','16:44:44');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('walter', '62', 'chicken rice', '1', '4.5', 'Uncomplete','2021-09-22', '15:17:47','17:44:44');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('noah', '63', 'green tea', '3', '5', 'Uncomplete','2021-09-22', '15:17:47','18:44:44');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('jeremy', '64', 'fried noodles', '1', '5', 'completed','2021-09-22', '16:17:47','16:44:44');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('christian', '65', 'chocolate cake', '1', '5', 'Uncomplete','2021-10-22', '15:17:47','16:44:44');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('keith', '66', 'lemon tea', '1', '4.5', 'Uncomplete','2021-11-22', '15:17:47','16:44:44');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('roger', '67', 'chicken rice', '1', '5', 'Uncomplete','2021-12-22', '15:17:47','16:44:44');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('terry', '68', 'salad', '1', '4.5', 'Uncomplete','2021-01-22', '15:17:47','16:44:44');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('gerald', '69', 'green tea', '1', '5', 'Uncomplete','2021-02-22', '15:17:47','16:44:44');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('harold', '70', 'salad', '1', '4.5', 'Uncomplete','2021-03-22', '15:17:47','16:44:44');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('sean', '71', 'chicken rice', '1', '6', 'Uncomplete','2021-04-22', '15:17:47','16:44:44');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('austin', '72', 'larva cake', '1', '4.5', 'Uncomplete','2021-05-22', '15:17:47','16:44:44');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('carl', '73', 'salad', '3', '5', 'Uncomplete','2021-06-22', '15:17:47','16:44:44');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('arthur', '74', 'green tea', '10', '15', 'Uncomplete','2021-07-29', '15:45:54','16:45:45');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('lawrence', '75', 'chocolate cake', '1', '5', 'Uncomplete','2021-08-29', '15:45:54','16:45:45');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('dylan', '76', 'fried noodles', '1', '4.5', 'Uncomplete','2021-09-29', '15:45:54','16:45:45');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('jesse', '77', 'chicken rice', '1', '5', 'Uncomplete','2021-10-29', '15:45:54','16:45:45');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('jordan', '78', 'salad', '1', '4.5', 'Uncomplete','2021-05-29', '14:45:54','16:45:45');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('bryan', '79', 'larva cake', '1', '5', 'completed','2021-06-29', '15:45:54','17:45:45');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('billy', '80', 'green tea', '1', '4.5', 'Uncomplete','2021-11-29', '15:45:54','16:49:45');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('joe', '81', 'salad', '1', '6', 'Uncomplete','2021-12-29', '15:45:54','16:45:45');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('bruce', '82', 'chicken rice', '1', '4.5', 'Uncomplete','2021-02-22', '11:45:54','13:45:45');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('gabriel', '83', 'lemon tea', '3', '5', 'Uncomplete','2021-06-29', '19:59:54','21:45:45');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('logan', '84', 'larva cake', '1', '5', 'Uncomplete','2021-09-29', '19:45:54','21:45:45');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('albert', '85', 'salad', '1', '5', 'Uncomplete','2021-06-13', '19:45:54','20:45:45');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('willie', '86', 'fried noodles', '1', '6', 'Uncomplete','2021-06-12', '13:45:54','14:45:45');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('alan', '87', 'chocolate cake', '1', '4.5', 'Uncomplete','2021-06-22', '12:45:54','13:45:45');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('juan', '88', 'green tea', '3', '5', 'Uncomplete','2021-06-30', '18:45:54','19:45:45');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('wayne', '89', 'chicken rice', '1', '5', 'completed','2021-03-25', '14:45:54','16:45:45');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('elijah', '90', 'salad', '1', '5', 'Uncomplete','2021-05-28', '15:45:54','16:45:45');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('randy', '91', 'larva cake', '1', '6', 'Uncomplete','2021-05-27', '15:45:54','16:45:45');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('roy', '92', 'lemon tea', '1', '4.5', 'Uncomplete','2021-01-11', '15:45:54','16:45:45');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('vincent', '93', 'salad', '3', '5', 'Uncomplete','2021-07-12', '15:45:54','16:45:45');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('ralph', '94', 'green tea', '1', '5', 'Uncomplete','2021-06-15', '15:45:54','16:45:45');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('eugene', '95', 'fried noodles', '1', '5', 'Uncomplete','2021-06-15', '15:45:54','16:45:45');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('russell', '96', 'chocolate cake', '1', '6', 'Uncomplete','2021-06-14', '15:45:54','16:45:45');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('bobby', '97', 'salad', '1', '4.5', 'Uncomplete','2021-06-13', '15:45:54','16:45:45');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('mason', '98', 'chicken rice', '3', '5', 'Uncomplete','2021-06-12', '15:45:54','16:45:45');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('philip', '99', 'larva cake', '1', '5', 'Uncomplete','2021-06-11', '15:45:54','16:45:45');

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('louis', '100', 'lemon tea', '1', '5', 'completed','2022-06-29', '15:45:54','16:45:45');
--
-- 100 Dumping data for table 'stafforder'
--

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('james', '1', 'salad', '1', '6', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('robert', '2', 'chicken rice', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('john', '3', 'green tea', '3', '8', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('michael', '4', 'larva cake', '3', '4', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('david', '5', 'salad', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('william', '6', 'fried noodles', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('richard', '7', 'lemon tea', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('joseph', '8', 'chocolate cake', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('thomas', '9', 'salad', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('charles', '10', 'chicken rice', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('christopher', '11', 'lemon tea', '1', '6', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('daniel', '12', 'larva cake', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('matthew', '13', 'salad', '3', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('anthony', '14', 'fried noodles', '2', '9', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('mark', '15', 'green tea', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('donald', '16', 'larva cake', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('steven', '17', 'chicken rice', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('paul', '18', 'fried noodles', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('andrew', '19', 'green tea', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('joshua', '20', 'larva cake', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('kenneth', '21', 'salad', '1', '6', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('kevin', '22', 'chicken rice', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('brian', '23', 'lemon tea', '3', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('george', '24', 'chocolate cake', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('timothy', '25', 'salad', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('ronald', '26', 'fried noodles', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('edward', '27', 'chicken rice', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('jason', '28', 'green tea', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('jeffrey', '29', 'salad', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('ryan', '30', 'chicken rice', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('jacob', '31', 'green tea', '1', '6', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('gary', '32', 'larva cake', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('nicholas', '33', 'fried noodles', '3', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('eric', '34', 'lemon tea', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('jonathan', '35', 'chocolate cake', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('stephen', '36', 'larva cake', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('larry', '37', 'salad', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('justin', '38', 'fried noodles', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('scott', '39', 'lemon tea', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('brandon', '40', 'chocolate cake', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('benjamin', '41', 'chicken rice', '1', '6', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('samuel', '42', 'fried noodles', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('gregory', '43', 'lemon tea', '3', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('alexander', '44', 'chocolate cake', '10', '15', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('frank', '45', 'fried noodles', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('patrick', '46', 'salad', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('raymond', '47', 'green tea', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('jack', '48', 'larva cake', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('dennis', '49', 'salad', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('jerry', '50', 'chicken rice', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('tyler', '51', 'green tea', '1', '6', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('aaron', '52', 'chocolate cake', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('jose', '53', 'chicken rice', '3', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('adam', '54', 'green tea', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('nathan', '55', 'salad', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('henry', '56', 'chocolate cake', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('douglas', '57', 'chicken rice', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('zachary', '58', 'salad', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('peter', '59', 'fried noodles', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('kyle', '60', 'larva cake', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('ethan', '61', 'salad', '1', '6', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('walter', '62', 'chicken rice', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('noah', '63', 'green tea', '3', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('jeremy', '64', 'fried noodles', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('christian', '65', 'chocolate cake', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('keith', '66', 'lemon tea', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('roger', '67', 'chicken rice', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('terry', '68', 'salad', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('gerald', '69', 'green tea', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('harold', '70', 'salad', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('sean', '71', 'chicken rice', '1', '6', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('austin', '72', 'larva cake', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('carl', '73', 'salad', '3', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('arthur', '74', 'green tea', '10', '15', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('lawrence', '75', 'chocolate cake', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('dylan', '76', 'fried noodles', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('jesse', '77', 'chicken rice', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('jordan', '78', 'salad', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('bryan', '79', 'larva cake', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('billy', '80', 'green tea', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('joe', '81', 'salad', '1', '6', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('bruce', '82', 'chicken rice', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('gabriel', '83', 'lemon tea', '3', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('logan', '84', 'larva cake', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('albert', '85', 'salad', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('willie', '86', 'fried noodles', '1', '6', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('alan', '87', 'chocolate cake', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('juan', '88', 'green tea', '3', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('wayne', '89', 'chicken rice', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('elijah', '90', 'salad', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('randy', '91', 'larva cake', '1', '6', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('roy', '92', 'lemon tea', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('vincent', '93', 'salad', '3', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('ralph', '94', 'green tea', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('eugene', '95', 'fried noodles', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('russell', '96', 'chocolate cake', '1', '6', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('bobby', '97', 'salad', '1', '4.5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('mason', '98', 'chicken rice', '3', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('philip', '99', 'larva cake', '1', '5', 'Uncomplete');

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('louis', '100', 'lemon tea', '1', '5', 'Uncomplete');

--
-- 100 Dumping data for table `foodItem`
--

INSERT INTO `foodItem` (`foodID`, `name`, `price`, `type`, `imageName`, `status`) VALUES
('1', 'Garlic Bread', '6.00', 'Appetizer', 'garlicBread.jpeg', '1');

INSERT INTO `foodItem` (`foodID`, `name`, `price`, `type`, `imageName`, `status`) VALUES
('2', 'Lava Cake', '8.00', 'Dessert', 'lavaCake.jpeg', '1');

INSERT INTO `foodItem` (`foodID`, `name`, `price`, `type`, `imageName`, `status`) VALUES
('3', 'Green Tea', '4.00', 'Beverage', 'greenTea.jpeg', '1');

INSERT INTO `foodItem` (`foodID`, `name`, `price`, `type`, `imageName`, `status`) VALUES
('4', 'Chicken Rice', '8.00', 'Mains', 'chickenrice.jpeg', '1');

INSERT INTO `foodItem` (`foodID`, `name`, `price`, `type`, `imageName`, `status`) VALUES
('5', 'Noodles', '8.00', 'Mains', 'noodles.jpeg', '1');

INSERT INTO `foodItem` (`foodID`, `name`, `price`, `type`, `imageName`, `status`) VALUES
('6', 'ILT', '4.00', 'Beverages', 'images.jpeg', '1');

--
-- 100 Dumping data for table `coupons`
--

INSERT INTO `coupons` (`couponCode`, `couponDescription`, `discountAmount`) VALUES
('AD3', '3 dollars off', '3');

INSERT INTO `coupons` (`couponCode`, `couponDescription`, `discountAmount`) VALUES
('JD4', '4 dollars off', '4');

INSERT INTO `coupons` (`couponCode`, `couponDescription`, `discountAmount`) VALUES
('KD7', '7 dollars off your total bill', '7');

INSERT INTO `coupons` (`couponCode`, `couponDescription`, `discountAmount`) VALUES
('LBJ23', '23 dollars off your total bill', '23');

INSERT INTO `coupons` (`couponCode`, `couponDescription`, `discountAmount`) VALUES
('RF5', '5 dollars off', '5');

-- --------------------------------------------------------



--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `userAccount` 
  AUTO_INCREMENT=1;

ALTER TABLE `foodItem`
  AUTO_INCREMENT=1;

ALTER TABLE `cart`
  AUTO_INCREMENT=1;

ALTER TABLE `order`
  AUTO_INCREMENT=1;

ALTER TABLE `staffOrder`
  AUTO_INCREMENT=1;


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
