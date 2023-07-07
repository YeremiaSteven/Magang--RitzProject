-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: db_emc
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.27-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `member_request`
--

DROP TABLE IF EXISTS `member_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member_request` (
  `email` varchar(50) NOT NULL,
  `istatus_request` int(11) NOT NULL COMMENT '0 = belum dibalas 1=disetujui 2= ditolak',
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_request`
--

LOCK TABLES `member_request` WRITE;
/*!40000 ALTER TABLE `member_request` DISABLE KEYS */;
/*!40000 ALTER TABLE `member_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(50) NOT NULL,
  `token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taddress`
--

DROP TABLE IF EXISTS `taddress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `taddress` (
  `id_table` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `vaddress` varchar(100) DEFAULT NULL,
  `vreceiver_name` varchar(100) DEFAULT NULL,
  `istatus_address` int(11) DEFAULT NULL COMMENT '1 = alamat utama, 0 = bukan alamat utama',
  `vcrea` varchar(50) DEFAULT NULL,
  `dcrea` datetime DEFAULT NULL,
  `vmodi` varchar(50) DEFAULT NULL,
  `dmodi` datetime DEFAULT NULL,
  PRIMARY KEY (`id_table`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `taddress_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=100007 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taddress`
--

LOCK TABLES `taddress` WRITE;
/*!40000 ALTER TABLE `taddress` DISABLE KEYS */;
INSERT INTO `taddress` VALUES (99991,55560,'Cluster Allogio Barat 6, Tangerang','Om Vaness',1,'akimichi4455@gmail.com','2023-03-27 14:35:25','limfort01@gmail.com','2023-03-29 14:53:23'),(99996,55551,'Menara BCA Sudirman, Jakarta Pusat','Ireng',0,'limfort01@gmail.com','2023-03-29 14:53:55',NULL,NULL),(100004,55572,'Apartement Sentra Timur Residence','Dwinanda Hafid',0,'limfort45@gmail.com','2023-05-09 09:26:12',NULL,NULL),(100006,55579,'APARTEMEN SENTRA TIMUR RESIDENCE LANTAI II BLOK H1122 D,','Dwinanda Hafid',0,'dwinanda.wicaksana@student.umn.ac.id','2023-05-23 08:02:21',NULL,NULL);
/*!40000 ALTER TABLE `taddress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbanner`
--

DROP TABLE IF EXISTS `tbanner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbanner` (
  `id_banner` int(11) NOT NULL AUTO_INCREMENT,
  `picture` blob NOT NULL,
  `vlinkpro` varchar(255) NOT NULL,
  `vcrea` varchar(20) NOT NULL,
  `dcrea` datetime NOT NULL,
  `vmodi` varchar(20) DEFAULT NULL,
  `dmodi` datetime DEFAULT NULL,
  PRIMARY KEY (`id_banner`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbanner`
--

LOCK TABLES `tbanner` WRITE;
/*!40000 ALTER TABLE `tbanner` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbanner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tcart`
--

DROP TABLE IF EXISTS `tcart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tcart` (
  `id_cart` int(11) NOT NULL AUTO_INCREMENT,
  `id_item` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `iquantity` int(11) DEFAULT NULL,
  `iactive` int(1) DEFAULT NULL,
  `dcrea` datetime NOT NULL,
  `vcrea` varchar(50) NOT NULL,
  `dmodi` datetime DEFAULT NULL,
  `vmodi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cart`),
  KEY `id_user` (`id_user`),
  KEY `id_item` (`id_item`),
  CONSTRAINT `tcart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  CONSTRAINT `tcart_ibfk_2` FOREIGN KEY (`id_item`) REFERENCES `titem_hdr` (`id_item`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tcart`
--

LOCK TABLES `tcart` WRITE;
/*!40000 ALTER TABLE `tcart` DISABLE KEYS */;
/*!40000 ALTER TABLE `tcart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tcategory`
--

DROP TABLE IF EXISTS `tcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tcategory` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `vcategory` varchar(30) NOT NULL,
  `vcrea` varchar(50) NOT NULL,
  `dcrea` datetime NOT NULL,
  `vmodi` varchar(50) DEFAULT NULL,
  `dmodi` datetime DEFAULT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=45468 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tcategory`
--

LOCK TABLES `tcategory` WRITE;
/*!40000 ALTER TABLE `tcategory` DISABLE KEYS */;
INSERT INTO `tcategory` VALUES (45451,'Food','Admin','2023-03-14 00:36:53','akimichi4455@gmail.com','2023-03-23 16:06:43'),(45452,'Clothes','Admin','2023-03-14 00:36:53','akimichi4455@gmail.com','2023-05-03 16:50:45'),(45454,'Drink','akimichi4455@gmail.com','2023-03-23 15:38:52','akimichi4455@gmail.com','2023-03-23 16:07:14'),(45459,'Snack','akimichi4455@gmail.com','2023-03-25 04:00:18',NULL,NULL),(45462,'Shoes','akimichi4455@gmail.com','2023-04-03 03:18:27',NULL,NULL),(45463,'Toys','akimichi4455@gmail.com','2023-05-03 16:51:17',NULL,NULL),(45464,'Skincare','akimichi4455@gmail.com','2023-05-03 16:51:36',NULL,NULL),(45465,'Stationery','akimichi4455@gmail.com','2023-05-03 16:51:47',NULL,NULL),(45466,'Electronics','akimichi4455@gmail.com','2023-05-03 16:52:00',NULL,NULL),(45467,'Home Decoration','akimichi4455@gmail.com','2023-05-03 16:52:22',NULL,NULL);
/*!40000 ALTER TABLE `tcategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tglobalsetting`
--

DROP TABLE IF EXISTS `tglobalsetting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tglobalsetting` (
  `id_global` int(11) NOT NULL,
  `vname` varchar(100) DEFAULT NULL,
  `vvalue` varchar(100) DEFAULT NULL,
  `dvalue` double DEFAULT NULL,
  `ivalue` int(11) DEFAULT NULL,
  `vcrea` varchar(50) DEFAULT NULL,
  `dcrea` datetime DEFAULT NULL,
  `vmodi` varchar(50) DEFAULT NULL,
  `dmodi` datetime DEFAULT NULL,
  PRIMARY KEY (`id_global`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tglobalsetting`
--

LOCK TABLES `tglobalsetting` WRITE;
/*!40000 ALTER TABLE `tglobalsetting` DISABLE KEYS */;
INSERT INTO `tglobalsetting` VALUES (1,'disc_flashsale',NULL,0.06,15000,'\r\ndwinanda.wicaskana@student.umn.ac.id			','2023-05-11 12:36:53','',NULL),(2,'disc_member',NULL,0.1,20000,'\r\ndwinanda.wicaskana@student.umn.ac.id			','2023-05-11 12:36:53','',NULL),(3,'nama_toko','TOKO HIJAU',NULL,NULL,'\r\ndwinanda.wicaskana@student.umn.ac.id			','2023-05-11 12:36:53','',NULL);
/*!40000 ALTER TABLE `tglobalsetting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `titem_dtl`
--

DROP TABLE IF EXISTS `titem_dtl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `titem_dtl` (
  `id_itemdtl` int(11) NOT NULL AUTO_INCREMENT,
  `id_item` int(11) NOT NULL,
  `picture` varchar(50) DEFAULT NULL,
  `vcrea` varchar(50) NOT NULL,
  `dcrea` datetime NOT NULL,
  `vmodi` varchar(50) DEFAULT NULL,
  `dmodi` datetime DEFAULT NULL,
  PRIMARY KEY (`id_itemdtl`),
  KEY `titem_dtl_FK` (`id_item`),
  CONSTRAINT `titem_dtl_FK` FOREIGN KEY (`id_item`) REFERENCES `titem_hdr` (`id_item`)
) ENGINE=InnoDB AUTO_INCREMENT=11151 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `titem_dtl`
--

LOCK TABLES `titem_dtl` WRITE;
/*!40000 ALTER TABLE `titem_dtl` DISABLE KEYS */;
INSERT INTO `titem_dtl` VALUES (11132,33331,'1684758612.jpg','Admin','2023-03-16 16:13:06','Admin','2023-05-22 12:30:12'),(11133,33331,'1678983197.jpg','Admin','2023-03-16 16:13:17',NULL,NULL),(11141,33331,'1678985940.jpg','Admin','2023-03-16 16:58:51','Admin','2023-03-16 16:59:00'),(11145,33332,'1679717817.jpg','Admin','2023-03-25 04:16:57',NULL,NULL),(11148,33332,'1681232742.jpg','Admin','2023-04-11 17:05:42',NULL,NULL),(11149,33334,'1681309676.jpg','Admin','2023-04-12 14:27:56',NULL,NULL);
/*!40000 ALTER TABLE `titem_dtl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `titem_hdr`
--

DROP TABLE IF EXISTS `titem_hdr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `titem_hdr` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `vname_item` varchar(100) NOT NULL,
  `id_category` int(11) NOT NULL,
  `vbarcode` varchar(40) DEFAULT NULL,
  `vdescription` varchar(255) DEFAULT NULL,
  `istock` int(11) NOT NULL,
  `iprice` int(11) NOT NULL,
  `dexpired` date DEFAULT NULL,
  `iactive` int(11) NOT NULL COMMENT '0 = active, 1 = not_active',
  `iflashsale` int(11) NOT NULL,
  `vcrea` varchar(50) NOT NULL,
  `dcrea` datetime NOT NULL,
  `vmodi` varchar(50) DEFAULT NULL,
  `dmodi` datetime DEFAULT NULL,
  PRIMARY KEY (`id_item`),
  KEY `titem_hdr_FK` (`id_category`),
  CONSTRAINT `titem_hdr_FK` FOREIGN KEY (`id_category`) REFERENCES `tcategory` (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=333336 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `titem_hdr`
--

LOCK TABLES `titem_hdr` WRITE;
/*!40000 ALTER TABLE `titem_hdr` DISABLE KEYS */;
INSERT INTO `titem_hdr` VALUES (33331,'Fiesta Chicken Nugget',45451,NULL,'Chicken Nugget 500 gr',50,49500,'2025-08-12',1,1,'Admin','2023-03-14 00:36:53','akimichi4455@gmail.com','2023-04-12 13:47:38'),(33332,'T-shirt',45452,NULL,'Kaos Oblong putih - M size',50,150000,NULL,1,1,'Admin','2023-03-14 00:36:53','akimichi4455@gmail.com','2023-04-12 13:42:22'),(33334,'Roti O Lempuyangan',45459,NULL,'Roti O Lempuyangan - 1pcs',69,15000,'2023-04-17',1,1,'akimichi4455@gmail.com','2023-04-12 14:17:00','akimichi4455@gmail.com','2023-04-12 14:17:23'),(33335,'Swallow Sendal',45452,NULL,'Sendal dengan berbahan karet merek swallow',4,10000,NULL,1,1,'akimichi4455@gmail.com','2023-04-12 14:18:41','akimichi4455@gmail.com','2023-04-12 14:29:44'),(33336,'Jeans',45452,NULL,'Celana jeans nyaman dan adem',120,250000,NULL,1,1,'akimichi4455@gmail.com','2023-04-12 14:18:41','akimichi4455@gmail.com','2023-04-12 14:29:44'),(33337,'Jacket Hoodie',45452,NULL,'Jacket dengan Hoodie yang berbahan lembut',95,200000,NULL,1,0,'akimichi4455@gmail.com','2023-04-12 14:18:41','akimichi4455@gmail.com','2023-04-12 14:29:44'),(33338,'Baju Anak',45452,NULL,'Baju Anak umur 1 - 5 tahun dengan bahan yang lembut dan ramah kulit anak',5,10000,NULL,1,0,'akimichi4455@gmail.com','2023-04-12 14:18:41','akimichi4455@gmail.com','2023-04-12 14:29:44'),(33339,'Sabun Muka',45464,NULL,'Sabun muka dengan teknologi pembersih pori-pori wajah',5,10000,NULL,1,0,'akimichi4455@gmail.com','2023-04-12 14:18:41','akimichi4455@gmail.com','2023-04-12 14:29:44'),(33340,'Kotak Pensil',45465,NULL,'Kotak pensil dengan fitur kalkulator yang canggih',5,10000,NULL,1,1,'akimichi4455@gmail.com','2023-04-12 14:18:41','akimichi4455@gmail.com','2023-04-12 14:29:44'),(33341,'Mesin Kopi',45466,NULL,'Mesin kopi dengan penggunaan sedikit listrik',5,10000,NULL,1,0,'akimichi4455@gmail.com','2023-04-12 14:18:41','akimichi4455@gmail.com','2023-04-12 14:29:44'),(33342,'Bingkai Foto',45467,NULL,'Bingkai foto dengan ukuran A5',5,10000,NULL,1,1,'akimichi4455@gmail.com','2023-04-12 14:18:41','akimichi4455@gmail.com','2023-04-12 14:29:44'),(33343,'Kartu Uno',45463,NULL,'Kartu Uno mainan anak anak diatas 3 tahun',5,10000,NULL,1,0,'akimichi4455@gmail.com','2023-04-12 14:18:41','akimichi4455@gmail.com','2023-04-12 14:29:44');
/*!40000 ALTER TABLE `titem_hdr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmember`
--

DROP TABLE IF EXISTS `tmember`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tmember` (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `istatus_member` int(1) NOT NULL COMMENT '0 = active, 1 = not_active',
  `vtipemem` int(1) DEFAULT NULL COMMENT '0 = basic, 1 = premium',
  `vcrea` varchar(50) NOT NULL,
  `dcrea` datetime NOT NULL,
  `vmodi` varchar(50) DEFAULT NULL,
  `dmodi` datetime DEFAULT NULL,
  PRIMARY KEY (`id_member`),
  KEY `tmember_FK` (`id_user`),
  CONSTRAINT `tmember_FK` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmember`
--

LOCK TABLES `tmember` WRITE;
/*!40000 ALTER TABLE `tmember` DISABLE KEYS */;
INSERT INTO `tmember` VALUES (4,55560,1,0,'akimichi4455@gmail.com','2023-05-07 09:19:50',NULL,NULL);
/*!40000 ALTER TABLE `tmember` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `token_register`
--

DROP TABLE IF EXISTS `token_register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `token_register` (
  `email` varchar(50) NOT NULL,
  `token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `token_register`
--

LOCK TABLES `token_register` WRITE;
/*!40000 ALTER TABLE `token_register` DISABLE KEYS */;
/*!40000 ALTER TABLE `token_register` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tpayment`
--

DROP TABLE IF EXISTS `tpayment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tpayment` (
  `id_payment` int(11) NOT NULL AUTO_INCREMENT,
  `vsecret_code` varchar(100) DEFAULT NULL,
  `vdescription` varchar(255) DEFAULT NULL,
  `ipayment_status` varchar(100) DEFAULT NULL,
  `vpayment_link` varchar(255) DEFAULT NULL,
  `iamount` int(11) DEFAULT NULL,
  `vcrea` varchar(50) DEFAULT NULL,
  `dcrea` datetime DEFAULT NULL,
  `vmodi` varchar(50) DEFAULT NULL,
  `dmodi` datetime DEFAULT NULL,
  PRIMARY KEY (`id_payment`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tpayment`
--

LOCK TABLES `tpayment` WRITE;
/*!40000 ALTER TABLE `tpayment` DISABLE KEYS */;
INSERT INTO `tpayment` VALUES (29,'gBfAdkkUOo',NULL,'PENDING','https://checkout-staging.xendit.co/web/6474c8ecb3adfe0baf1617cc',23460,'limfort01@gmail.com','2023-05-29 15:46:54',NULL,NULL);
/*!40000 ALTER TABLE `tpayment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `treview`
--

DROP TABLE IF EXISTS `treview`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `treview` (
  `id_review` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaction` int(11) DEFAULT NULL,
  `vreview` varchar(255) DEFAULT NULL,
  `irating` int(5) DEFAULT NULL,
  `vcrea` varchar(20) NOT NULL,
  `dcrea` datetime NOT NULL,
  `vmodi` varchar(20) DEFAULT NULL,
  `dmodi` datetime DEFAULT NULL,
  PRIMARY KEY (`id_review`),
  KEY `treview_FK` (`id_transaction`),
  CONSTRAINT `treview_FK` FOREIGN KEY (`id_transaction`) REFERENCES `ttransaction_hdr` (`id_transaction`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `treview`
--

LOCK TABLES `treview` WRITE;
/*!40000 ALTER TABLE `treview` DISABLE KEYS */;
/*!40000 ALTER TABLE `treview` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trole`
--

DROP TABLE IF EXISTS `trole`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trole` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `vrole_name` varchar(10) DEFAULT NULL,
  `vcrea` varchar(20) DEFAULT NULL,
  `dcrea` datetime DEFAULT NULL,
  `vmodi` varchar(20) DEFAULT NULL,
  `dmodi` datetime DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=44444 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trole`
--

LOCK TABLES `trole` WRITE;
/*!40000 ALTER TABLE `trole` DISABLE KEYS */;
INSERT INTO `trole` VALUES (44441,'Admin',NULL,NULL,NULL,NULL),(44442,'Staff',NULL,NULL,NULL,NULL),(44443,'User',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `trole` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttransaction_dtl`
--

DROP TABLE IF EXISTS `ttransaction_dtl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ttransaction_dtl` (
  `id_transactiondtl` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaction` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `iquantity` int(11) NOT NULL,
  `dspack` datetime DEFAULT NULL,
  `dssend` datetime DEFAULT NULL,
  `dsarriv` datetime DEFAULT NULL,
  `dsfail` datetime DEFAULT NULL,
  `vcrea` varchar(50) NOT NULL,
  `dcrea` datetime NOT NULL,
  `vmodi` varchar(50) DEFAULT NULL,
  `dmodi` datetime DEFAULT NULL,
  PRIMARY KEY (`id_transactiondtl`),
  KEY `ttransaction_dtl_FK` (`id_transaction`),
  KEY `ttransaction_dtl_FK_1` (`id_item`),
  CONSTRAINT `ttransaction_dtl_FK` FOREIGN KEY (`id_transaction`) REFERENCES `ttransaction_hdr` (`id_transaction`),
  CONSTRAINT `ttransaction_dtl_FK_1` FOREIGN KEY (`id_item`) REFERENCES `titem_hdr` (`id_item`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttransaction_dtl`
--

LOCK TABLES `ttransaction_dtl` WRITE;
/*!40000 ALTER TABLE `ttransaction_dtl` DISABLE KEYS */;
INSERT INTO `ttransaction_dtl` VALUES (22,18,33335,1,'2023-05-29 15:46:54',NULL,NULL,NULL,'limfort01@gmail.com','2023-05-29 15:46:54',NULL,NULL);
/*!40000 ALTER TABLE `ttransaction_dtl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttransaction_hdr`
--

DROP TABLE IF EXISTS `ttransaction_hdr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ttransaction_hdr` (
  `id_transaction` int(11) NOT NULL AUTO_INCREMENT,
  `id_payment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `itotal_quantity` int(30) NOT NULL,
  `itracking_status` int(1) NOT NULL COMMENT '0 = packing, 1 = sending, 2 = arrived, 3 = failed',
  `itotal_price` int(30) NOT NULL,
  `vaddress` varchar(255) NOT NULL,
  `vnote` varchar(255) DEFAULT NULL,
  `vcrea` varchar(50) NOT NULL,
  `dcrea` datetime NOT NULL,
  `vmodi` varchar(50) DEFAULT NULL,
  `dmodi` datetime DEFAULT NULL,
  PRIMARY KEY (`id_transaction`),
  KEY `ttransaction_hdr_FK` (`id_user`),
  KEY `ttransaction_hdr_FK_1` (`id_payment`),
  CONSTRAINT `ttransaction_hdr_FK` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ttransaction_hdr_FK_1` FOREIGN KEY (`id_payment`) REFERENCES `tpayment` (`id_payment`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttransaction_hdr`
--

LOCK TABLES `ttransaction_hdr` WRITE;
/*!40000 ALTER TABLE `ttransaction_hdr` DISABLE KEYS */;
INSERT INTO `ttransaction_hdr` VALUES (18,29,55560,1,0,23460,'Cluster Allogio Barat 6, Tangerang',NULL,'limfort01@gmail.com','2023-05-29 15:46:54',NULL,NULL);
/*!40000 ALTER TABLE `ttransaction_hdr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `twishlist`
--

DROP TABLE IF EXISTS `twishlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `twishlist` (
  `id_wishlist` int(11) NOT NULL AUTO_INCREMENT,
  `id_item` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `iactive` int(1) DEFAULT NULL,
  `vcrea` varchar(50) NOT NULL,
  `dcrea` datetime NOT NULL,
  `dmodi` datetime DEFAULT NULL,
  `vmodi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_wishlist`),
  KEY `id_user` (`id_user`),
  KEY `id_item` (`id_item`),
  CONSTRAINT `twishlist_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  CONSTRAINT `twishlist_ibfk_2` FOREIGN KEY (`id_item`) REFERENCES `titem_hdr` (`id_item`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `twishlist`
--

LOCK TABLES `twishlist` WRITE;
/*!40000 ALTER TABLE `twishlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `twishlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_role` int(11) DEFAULT NULL,
  `vname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `istatus_user` int(1) NOT NULL,
  `vno_telp` varchar(15) NOT NULL,
  `profile_picture` blob DEFAULT NULL,
  `vcrea` varchar(50) DEFAULT NULL,
  `dcrea` datetime DEFAULT NULL,
  `vmodi` varchar(50) DEFAULT NULL,
  `dmodi` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_role` (`id_role`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `trole` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=55580 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (55551,44441,'Dwinanda Hafid Wicaksana','akimichi4455@gmail.com','$2y$10$1n1ZXozHcveRqsMhk.gMEO432HKUasurcDkh1MhECLw.quuFjBLlW',1,'085155017750',NULL,NULL,NULL,'akimichi4455@gmail.com','2023-03-14 00:36:53'),(55560,44443,'Lim Forte','limfort01@gmail.com','$2y$10$/zw5i5sZxt2sIOHI5rdghe6Yczuz7ReJCEH9FqbiNNUy3G0azSd2S',1,'087780689514',_binary '1684763057.png','44441','2023-03-26 23:46:29','akimichi4455@gmail.com','2023-05-22 13:44:17'),(55572,44443,'Dwinanda Hafid','limfort45@gmail.com','$2y$10$lCreD6H6Yv/jPU.ZMO/o/er7S3MS6/kvQ2DJN.FqwDNFt5r19esPK',1,'085155017750',_binary 'blank_profilepicture.png','limfort45@gmail.com','2023-05-09 09:25:55','akimichi4455@gmail.com',NULL),(55574,44443,'Dwinanda Wicaksana','dwinanda4545@gmail.com','$2y$10$1n1ZXozHcveRqsMhk.gMEO432HKUasurcDkh1MhECLw.quuFjBLlW',1,'085155017750',_binary 'blank_profilepicture.jpg','akimichi4455@gmail.com','2023-05-17 07:10:53','akimichi4455@gmail.com','2023-05-17 07:13:34'),(55578,44441,'Admin','admin@gmail.com','$2y$10$d2bEaLUW2ot3hb5pdDMnz.p3JkL2IpWrVwdKBcvHQkuNT1LE82sBW',1,'085155017750',_binary 'blank_profilepicture.jpg','akimichi4455@gmail.com','2023-05-22 02:54:58',NULL,NULL),(55579,44443,'Dwinanda Hafid','dwinanda.wicaksana@student.umn.ac.id','$2y$10$sJIUYKlF8wGkVubRxXr/qeP5QPgsPTxjX2oH0m4jpVbASHD3ATGqK',1,'085155017750',_binary 'blank_profilepicture.png','dwinanda.wicaksana@student.umn.ac.id','2023-05-23 08:01:48',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'db_emc'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-30  9:53:25
