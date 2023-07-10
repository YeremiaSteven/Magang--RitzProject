-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: db_emc
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.27-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbanner`
--

DROP TABLE IF EXISTS `tbanner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbanner` (
  `id_banner` int(11) NOT NULL AUTO_INCREMENT,
  `picture` blob NOT NULL,
  `vlink` varchar(255) NOT NULL,
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
-- Table structure for table `tcategory`
--

DROP TABLE IF EXISTS `tcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tcategory` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `vcategory` varchar(30) NOT NULL,
  `vcrea` varchar(20) NOT NULL,
  `dcrea` datetime NOT NULL,
  `vmodi` varchar(20) DEFAULT NULL,
  `dmodi` datetime DEFAULT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=11114 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tcategory`
--

LOCK TABLES `tcategory` WRITE;
/*!40000 ALTER TABLE `tcategory` DISABLE KEYS */;
INSERT INTO `tcategory` VALUES (11111,'Makanan','Admin','2023-02-02 11:26:47',NULL,NULL),(11112,'Minuman','Admin','2023-02-02 11:26:47',NULL,NULL),(11113,'Alat Pembersih','Admin','2023-02-02 11:27:18',NULL,NULL);
/*!40000 ALTER TABLE `tcategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `titem_dtl`
--

DROP TABLE IF EXISTS `titem_dtl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `titem_dtl` (
  `id_itemdtl` int(11) NOT NULL AUTO_INCREMENT,
  `id_item` int(11) NOT NULL,
  `picture` blob DEFAULT NULL,
  `vcrea` varchar(20) NOT NULL,
  `dcrea` datetime NOT NULL,
  `vmodi` varchar(20) DEFAULT NULL,
  `dmodi` datetime DEFAULT NULL,
  PRIMARY KEY (`id_itemdtl`),
  KEY `titem_dtl_FK` (`id_item`),
  CONSTRAINT `titem_dtl_FK` FOREIGN KEY (`id_item`) REFERENCES `titem_hdr` (`id_item`)
) ENGINE=InnoDB AUTO_INCREMENT=33340 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `titem_dtl`
--

LOCK TABLES `titem_dtl` WRITE;
/*!40000 ALTER TABLE `titem_dtl` DISABLE KEYS */;
INSERT INTO `titem_dtl` VALUES (33331,22221,NULL,'Admin','2023-02-02 11:32:04',NULL,NULL),(33332,22221,NULL,'Admin','2023-02-02 11:32:04',NULL,NULL),(33333,22221,NULL,'Admin','2023-02-02 11:32:04',NULL,NULL),(33334,22222,NULL,'Admin','2023-02-02 11:32:04',NULL,NULL),(33335,22222,NULL,'Admin','2023-02-02 11:32:04',NULL,NULL),(33336,22222,NULL,'Admin','2023-02-02 11:32:04',NULL,NULL),(33337,22223,NULL,'Admin','2023-02-02 11:32:04',NULL,NULL),(33338,22223,NULL,'Admin','2023-02-02 11:32:04',NULL,NULL),(33339,22223,NULL,'Admin','2023-02-02 11:32:04',NULL,NULL);
/*!40000 ALTER TABLE `titem_dtl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `titem_hdr`
--

DROP TABLE IF EXISTS `titem_hdr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `titem_hdr` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `vname_item` varchar(100) NOT NULL,
  `id_category` int(11) NOT NULL,
  `vbarcode` varchar(40) NOT NULL,
  `vdescription` varchar(255) DEFAULT NULL,
  `istock` int(11) NOT NULL,
  `iprice` int(11) NOT NULL,
  `dexpired` date NOT NULL,
  `iactive` int(11) NOT NULL COMMENT '0 = Aktif, 1 = Non aktif',
  `vcrea` varchar(20) NOT NULL,
  `dcrea` datetime NOT NULL,
  `vmodi` varchar(20) DEFAULT NULL,
  `dmodi` datetime DEFAULT NULL,
  PRIMARY KEY (`id_item`),
  KEY `titem_hdr_FK` (`id_category`),
  CONSTRAINT `titem_hdr_FK` FOREIGN KEY (`id_category`) REFERENCES `tcategory` (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=22224 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `titem_hdr`
--

LOCK TABLES `titem_hdr` WRITE;
/*!40000 ALTER TABLE `titem_hdr` DISABLE KEYS */;
INSERT INTO `titem_hdr` VALUES (22221,'Sosis',11111,'474307051672','Sosis dengan berbagai merk',1000,10000,'2024-02-02',0,'Admin','2023-02-02 11:29:17',NULL,NULL),(22222,'Pepsi',11112,'301100008821','Soft drink di fast food',0,3000,'2020-02-02',1,'Admin','2023-02-02 11:29:17',NULL,NULL),(22223,'Sabun',11113,'469982569237','Alat pembersih tubuh saat mandi',-1,15000,'2025-02-02',0,'Admin','2023-02-02 11:29:17',NULL,NULL);
/*!40000 ALTER TABLE `titem_hdr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmember`
--

DROP TABLE IF EXISTS `tmember`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmember` (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `iactive` int(1) NOT NULL COMMENT '0 = Aktif, 1 = Non aktif',
  `vcrea` varchar(20) NOT NULL,
  `dcrea` datetime NOT NULL,
  `vmodi` varchar(20) DEFAULT NULL,
  `dmodi` datetime DEFAULT NULL,
  PRIMARY KEY (`id_member`),
  KEY `tmember_FK` (`id_user`),
  CONSTRAINT `tmember_FK` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=66664 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmember`
--

LOCK TABLES `tmember` WRITE;
/*!40000 ALTER TABLE `tmember` DISABLE KEYS */;
INSERT INTO `tmember` VALUES (66661,55551,0,'Admin','2023-02-02 11:38:27',NULL,NULL),(66662,55552,1,'Admin','2023-02-02 11:38:27',NULL,NULL),(66663,55553,0,'Admin','2023-02-02 11:38:27',NULL,NULL);
/*!40000 ALTER TABLE `tmember` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trole`
--

DROP TABLE IF EXISTS `trole`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trole` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `vrole_name` varchar(10) NOT NULL,
  `vcrea` varchar(20) NOT NULL,
  `dcrea` datetime NOT NULL,
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
INSERT INTO `trole` VALUES (44441,'Admin','Admin','2023-02-02 11:34:18',NULL,NULL),(44442,'Staff','Admin','2023-02-02 11:34:18',NULL,NULL),(44443,'User','Admin','2023-02-02 11:34:18',NULL,NULL);
/*!40000 ALTER TABLE `trole` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttransaction_dtl`
--

DROP TABLE IF EXISTS `ttransaction_dtl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttransaction_dtl` (
  `id_transactiondtl` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaction` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `iquantity` int(11) NOT NULL,
  `vnote` varchar(255) DEFAULT NULL,
  `vcrea` varchar(20) NOT NULL,
  `dcrea` datetime NOT NULL,
  `vmodi` varchar(20) DEFAULT NULL,
  `dmodi` datetime DEFAULT NULL,
  PRIMARY KEY (`id_transactiondtl`),
  KEY `ttransaction_dtl_FK` (`id_transaction`),
  KEY `ttransaction_dtl_FK_1` (`id_item`),
  CONSTRAINT `ttransaction_dtl_FK` FOREIGN KEY (`id_transaction`) REFERENCES `ttransaction_hdr` (`id_transaction`),
  CONSTRAINT `ttransaction_dtl_FK_1` FOREIGN KEY (`id_item`) REFERENCES `titem_hdr` (`id_item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttransaction_dtl`
--

LOCK TABLES `ttransaction_dtl` WRITE;
/*!40000 ALTER TABLE `ttransaction_dtl` DISABLE KEYS */;
/*!40000 ALTER TABLE `ttransaction_dtl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttransaction_hdr`
--

DROP TABLE IF EXISTS `ttransaction_hdr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttransaction_hdr` (
  `id_transaction` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `itotal_quantity` int(30) NOT NULL,
  `itracking_status` int(1) NOT NULL COMMENT '0 = kemas, 1 = kirim, 2 = tiba',
  `itotal_price` int(30) NOT NULL,
  `istatus_paid` int(1) NOT NULL COMMENT '0 = belum bayar , 1 = bayar',
  `vcrea` varchar(20) NOT NULL,
  `dcrea` datetime NOT NULL,
  `vmodi` varchar(20) DEFAULT NULL,
  `dmodi` datetime DEFAULT NULL,
  PRIMARY KEY (`id_transaction`),
  KEY `ttransaction_hdr_FK` (`id_user`),
  CONSTRAINT `ttransaction_hdr_FK` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttransaction_hdr`
--

LOCK TABLES `ttransaction_hdr` WRITE;
/*!40000 ALTER TABLE `ttransaction_hdr` DISABLE KEYS */;
/*!40000 ALTER TABLE `ttransaction_hdr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `vname` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `iactive` int(1) NOT NULL COMMENT '0 = Aktif, 1 = Non aktif',
  `vaddress` varchar(255) DEFAULT NULL,
  `vno_telp` varchar(15) NOT NULL,
  `profile_picture` blob DEFAULT NULL,
  `vcrea` varchar(20) NOT NULL,
  `dcrea` datetime NOT NULL,
  `vmodi` varchar(20) DEFAULT NULL,
  `dmodi` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `tuser_FK` (`id_role`),
  CONSTRAINT `users_FK` FOREIGN KEY (`id_role`) REFERENCES `trole` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=55566 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (55551,'naufal_ikhsan','Naufal Ikhsan','$2y$10$L46cf8y7XDTPTPbRTfDADuQjnxCuy.DKfDGBD6jySU7TynVslJVIa',44441,0,'Tangerang','123',NULL,'Admin','2023-02-02 11:35:26',NULL,NULL),(55552,'dwinanda_hafid','Dwinanda Hafid','1234',44442,1,'Tangerang','456',NULL,'Admin','2023-02-02 11:35:26',NULL,NULL),(55553,'vanessa_angelica','Vanessa Angelica','1234',44443,0,'Tangerang','789',NULL,'Admin','2023-02-02 11:35:26',NULL,NULL),(55560,'unimedia_123','unimedia','$2y$10$elLrtvuhr8tbDF7EWBLR2O0HZxin99Mfrp0RCm6iHV1hKsQZzVH.m',44441,1,NULL,'088888888888',NULL,'User','2023-02-15 01:25:57',NULL,NULL),(55562,'nanto123','nanto prass','$2y$10$GEPh/p0XE5xJUpLKAh2Aa.7EPSjfV2B6gN9XmWSmUZyae1uRI9RIW',44442,1,NULL,'088888888888',NULL,'User','2023-02-15 04:02:13',NULL,NULL),(55563,'ibs123','irene bau solar','$2y$10$DqDJX9AS93fZdgZwxJoMYufu.xTFJyhFBbhHlB8A5KWFgo78dTHhG',44443,1,NULL,'088888888888',NULL,'User','2023-02-15 08:06:17',NULL,NULL),(55564,'dwinanda123','dwinanda','$2y$10$4wZwwuDy5BeAcwNbfwWXfuw/y6qtHRCy.47S.IGNcwyjovpK7SuyK',44443,1,NULL,'085155017750',NULL,'User','2023-02-15 10:41:04',NULL,NULL),(55565,'budi123','ombudi','$2y$10$BdYBi5TV7SXPmiJ8vgS/Veuo1P4PAiNPw//rs9PJn9WXuGrhaJ4O2',44443,1,NULL,'085155017750',NULL,'User','2023-02-16 15:11:06',NULL,NULL);
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

-- Dump completed on 2023-02-20 15:27:30
