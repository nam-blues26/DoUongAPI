-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: qlydouong
-- ------------------------------------------------------
-- Server version	5.7.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_chitiethoadon`
--

DROP TABLE IF EXISTS `tbl_chitiethoadon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_chitiethoadon` (
  `maHDB` int(11) NOT NULL,
  `soLuong` int(11) NOT NULL,
  `giaDoUong` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `soban` smallint(6) NOT NULL,
  `maDoUong` int(11) NOT NULL,
  PRIMARY KEY (`maHDB`,`maDoUong`),
  KEY `tbl_chitiethoadon_ibfk_2` (`maDoUong`),
  CONSTRAINT `tbl_chitiethoadon_ibfk_1` FOREIGN KEY (`maHDB`) REFERENCES `tbl_hoadonban` (`maHDB`),
  CONSTRAINT `tbl_chitiethoadon_ibfk_2` FOREIGN KEY (`maDoUong`) REFERENCES `tbl_douong` (`maDoUong`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_douong`
--

DROP TABLE IF EXISTS `tbl_douong`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_douong` (
  `maDoUong` int(11) NOT NULL AUTO_INCREMENT,
  `maLoai` int(11) NOT NULL,
  `tenDoUong` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `gia` bigint(20) NOT NULL,
  `trangThai` bit(2) NOT NULL,
  PRIMARY KEY (`maDoUong`),
  KEY `maLoai` (`maLoai`),
  CONSTRAINT `tbl_douong_ibfk_1` FOREIGN KEY (`maLoai`) REFERENCES `tbl_loai` (`maLoai`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_hoadonban`
--

DROP TABLE IF EXISTS `tbl_hoadonban`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_hoadonban` (
  `maHDB` int(11) NOT NULL AUTO_INCREMENT,
  `maNV` int(11) NOT NULL,
  `ngayLap` datetime NOT NULL,
  `tongGia` int(11) NOT NULL,
  PRIMARY KEY (`maHDB`),
  KEY `maNV` (`maNV`),
  CONSTRAINT `tbl_hoadonban_ibfk_1` FOREIGN KEY (`maNV`) REFERENCES `tbl_nhanvien` (`maNV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_loai`
--

DROP TABLE IF EXISTS `tbl_loai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_loai` (
  `maLoai` int(11) NOT NULL AUTO_INCREMENT,
  `tenLoai` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`maLoai`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_nhanvien`
--

DROP TABLE IF EXISTS `tbl_nhanvien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_nhanvien` (
  `maNV` int(11) NOT NULL AUTO_INCREMENT,
  `hoTen` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `diaChi` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cccd` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gioiTinh` bit(2) NOT NULL,
  PRIMARY KEY (`maNV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_user` (
  `username` varchar(20) NOT NULL,
  `password` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-03 21:40:03
