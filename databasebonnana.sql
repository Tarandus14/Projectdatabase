-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2025 at 10:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `databasebonnana`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `Address_ID` int(11) NOT NULL COMMENT 'รหัสที่อยู่',
  `Province` varchar(100) NOT NULL COMMENT 'จังหวัด',
  `City` varchar(100) NOT NULL COMMENT 'เมื่อง',
  `Zipcode` varchar(20) NOT NULL COMMENT 'รหัสไปรษณีย์',
  `User_ID` int(11) NOT NULL COMMENT 'รหัสผู้ใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `Image_ID` int(11) NOT NULL COMMENT 'รหัสรูปภาพสินค้า',
  `Name_Image` varchar(255) NOT NULL COMMENT 'ชื่อรูปภาพสินค้า',
  `Product_ID` int(11) NOT NULL COMMENT 'รหัสสินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `Order_ID` int(11) NOT NULL COMMENT 'รหัสคำสั้งซื้อ',
  `Order_Date` date NOT NULL COMMENT 'วันที่สั่งซื้อ',
  `Tracking_Number` varchar(255) NOT NULL COMMENT 'หมายเลขติดตามสินค้า',
  `total_amount` float NOT NULL COMMENT 'ยอดรวมของคำสั่งซื้อ',
  `User_ID` int(11) NOT NULL COMMENT 'รหัสผู้ใช้งาน',
  `Shipping` float NOT NULL COMMENT 'ต้นทุนการจัดส่ง',
  `Vat` float NOT NULL COMMENT 'ภาษีมูลค่าเพิ่ม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `Total_Price` float NOT NULL COMMENT 'ราคารวมของรายการในคำสังซื้อ',
  `Discount` float NOT NULL COMMENT 'ส่วนลดที่ใช้',
  `Quantity` int(11) NOT NULL COMMENT 'จำนวนผลิตภัณฑ์ที่สั่งซื้อ',
  `Product_ID` int(11) NOT NULL COMMENT 'รหัสสินค้า',
  `Order_ID` int(11) NOT NULL COMMENT 'รหัสคำสั่งซื้อ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_ID` int(11) NOT NULL COMMENT 'รหัสการชำระเงิน',
  `Date_Payment` datetime NOT NULL COMMENT 'วันที่และเวลาที่ชำระเงิน',
  `Status_Payment` varchar(255) NOT NULL COMMENT 'สถานะการชำระเงิน',
  `Amount_paid` int(11) NOT NULL COMMENT 'จำนวนเงินที่ชำระ',
  `Order_ID` int(11) NOT NULL COMMENT 'รหัสคำสั้งซื้อ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_ID` int(11) NOT NULL COMMENT 'รหัสสินค้า',
  `Price` decimal(10,2) NOT NULL COMMENT 'ราคาสินค้า',
  `Description` text NOT NULL COMMENT 'รายละเอียดสินค้า',
  `Name_Product` varchar(255) NOT NULL COMMENT 'ชื่อสินค้า',
  `Cost_Product` decimal(10,2) NOT NULL COMMENT 'ต้นทุนสินค้า',
  `User_ID` int(11) NOT NULL COMMENT 'รหัสผู้ใช้'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_stock`
--

CREATE TABLE `product_stock` (
  `Stock_ID` int(11) NOT NULL COMMENT 'รหัสสต็อก',
  `Stock_sk` int(11) NOT NULL COMMENT 'จำนวนสต๊อก',
  `Product_ID` int(11) NOT NULL COMMENT 'รหัสสินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `Review_ID` int(11) NOT NULL COMMENT 'รหัสข้อความ',
  `rating` int(11) NOT NULL COMMENT 'ระดับการให้คะแนน',
  `Date` datetime NOT NULL COMMENT 'วันที่ที่แสดงความคิดเห็น',
  `Text` text NOT NULL COMMENT 'ข้อความ',
  `Product_ID` int(11) NOT NULL COMMENT 'รหัสสินค้า',
  `User_ID` int(11) NOT NULL COMMENT 'รหัสผู้ใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL COMMENT 'รหัสผู้ใช้งาน',
  `Username` varchar(255) NOT NULL COMMENT 'ชื่อผู้ใช้งาน',
  `Name_Custumer` varchar(50) NOT NULL COMMENT 'ซื้อ',
  `Password` varchar(80) NOT NULL COMMENT 'รหัสผ่าน',
  `Email` varchar(50) NOT NULL COMMENT 'อีเมล'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_phone`
--

CREATE TABLE `user_phone` (
  `User_ID` int(11) NOT NULL COMMENT 'รหัสผู้ใช้งาน',
  `Phone_Number` varchar(10) NOT NULL COMMENT 'หมายเลขโทรศัพท์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`Address_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`Image_ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD KEY `Order_ID` (`Order_ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_ID`),
  ADD KEY `Order_ID` (`Order_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `product_stock`
--
ALTER TABLE `product_stock`
  ADD PRIMARY KEY (`Stock_ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`Review_ID`),
  ADD KEY `Product_ID` (`Product_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `user_phone`
--
ALTER TABLE `user_phone`
  ADD KEY `User_ID` (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `Address_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสที่อยู่';

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `Image_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสรูปภาพสินค้า';

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสคำสั้งซื้อ';

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Payment_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการชำระเงิน';

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสินค้า';

--
-- AUTO_INCREMENT for table `product_stock`
--
ALTER TABLE `product_stock`
  MODIFY `Stock_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสต็อก';

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `Review_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสข้อความ';

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ใช้งาน';

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`Product_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`Order_ID`) REFERENCES `order` (`Order_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`Product_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`Order_ID`) REFERENCES `order` (`Order_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_stock`
--
ALTER TABLE `product_stock`
  ADD CONSTRAINT `product_stock_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`Product_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`Product_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_phone`
--
ALTER TABLE `user_phone`
  ADD CONSTRAINT `user_phone_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
