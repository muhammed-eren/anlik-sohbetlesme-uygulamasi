-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: localhost    Database: sohbet
-- ------------------------------------------------------
-- Server version	8.0.37

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
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chat` (
  `c_id` int NOT NULL AUTO_INCREMENT,
  `alici_id` int NOT NULL,
  `gonderici_id` int NOT NULL,
  `mesaj` text CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `mesaj_tarihi` varchar(10) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  PRIMARY KEY (`c_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf16 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat`
--

LOCK TABLES `chat` WRITE;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
INSERT INTO `chat` VALUES (9,2,1,'asdas','11:55'),(10,2,1,'Sa baboli','11:56'),(11,1,2,'asda','11:57'),(12,1,2,'Merhaba','12:05'),(13,1,2,'Napıyon','12:23'),(14,1,2,'alooo','12:24'),(15,2,1,'dur geldim','12:24'),(16,2,1,'sa','12:27'),(17,2,1,'as','12:28'),(18,2,1,'laaa','12:28'),(43,2,1,'sa','20:24'),(44,2,1,'sa','20:29'),(45,1,2,'as','20:38'),(46,2,1,'nabıyon lan','20:39'),(47,1,2,'ii sen nabıyon','20:39'),(48,2,1,'he vallah','20:40'),(49,2,1,'asdj','21:14'),(50,2,1,'asd','21:17'),(51,5,6,'merhaba','21:26'),(52,6,5,'merhaba','21:26'),(53,6,2,'kjh','21:27'),(54,2,6,'işe bu kadar','21:28'),(55,1,5,'asd','21:29'),(56,1,5,'chromede neden çalışmıyor aq bilemedim ','21:30'),(57,5,1,'Neden çalışmıyo','21:30'),(58,1,5,'bilmiyom dedim ya la yarram','21:30'),(59,5,1,'ne sövüyon oe','21:30'),(60,1,5,'sövesim geldi oe','21:30'),(61,5,1,'tamam lan kes amcuk','21:30'),(62,1,5,'sus can mı','21:31'),(63,5,1,'kjhh','21:32'),(64,1,5,'fghjfhjg','21:33'),(65,1,5,'vjfgjg','21:34'),(66,6,1,'sa','17:04'),(67,1,6,'as','17:05'),(68,1,6,'babab','17:05'),(69,6,1,'sa ','17:06'),(70,6,1,'ananı skm erern vababüü','17:06');
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kullanici`
--

DROP TABLE IF EXISTS `kullanici`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kullanici` (
  `k_id` int NOT NULL AUTO_INCREMENT,
  `adi` varchar(20) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `soyadi` varchar(20) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `kullanici_adi` varchar(20) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `sifre` varchar(16) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `k_trh` date NOT NULL,
  `yazilan_kisi` int DEFAULT NULL,
  `yaziyormu` char(1) CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  PRIMARY KEY (`k_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf16 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kullanici`
--

LOCK TABLES `kullanici` WRITE;
/*!40000 ALTER TABLE `kullanici` DISABLE KEYS */;
INSERT INTO `kullanici` VALUES (1,'Muhammed eren','Bilici','legande','12345','2024-12-20',6,'n'),(2,'Enes','Arslantürk','bacıhoplanat_918','1e2n3e4s','2024-12-20',6,'n'),(5,'user1','1','user1','user1','2024-12-20',1,'n'),(6,'user2','2','user2','user2','2024-12-20',1,'n');
/*!40000 ALTER TABLE `kullanici` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-22 21:23:22
