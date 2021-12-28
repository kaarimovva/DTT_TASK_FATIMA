-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: random
-- ------------------------------------------------------
-- Server version	8.0.21

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
-- Table structure for table `authentication`
--

DROP TABLE IF EXISTS `authentication`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `authentication` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authentication`
--

LOCK TABLES `authentication` WRITE;
/*!40000 ALTER TABLE `authentication` DISABLE KEYS */;
INSERT INTO `authentication` VALUES (1,'Ann','12345','ANN_Jhones2gmail.com'),(2,'Rambo','$2y$10$EiWiSBVcUkS36.LJA7OEBuEH3P.78uYQAEv3/iN7JOFM5xirMke5C','johnny@yopmail.com'),(3,'Anna','$2y$10$Xc/FvJ5HFWKCp8OSmRrAMehqecO4ksWwg2dv3tVio3252exe24ElW','ann@yopmail.com'),(4,'LELE','$2y$10$FuzDeY4UMnBfcoe7CoQWiekYX6coiLX3KT74JjHgu.rrIRTrs2dqW','asdds@gmail.com'),(5,'Jhonny','$2y$10$FTazhYl0V3pyr4QehMY2Pee06hOtSoNuDviPURrX/jMDhKQYf/wse','jooo@gmail.com');
/*!40000 ALTER TABLE `authentication` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facilites`
--

DROP TABLE IF EXISTS `facilites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facilites` (
  `F_id` int unsigned NOT NULL AUTO_INCREMENT,
  `F_name` varchar(10) NOT NULL,
  `F_creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `F_tag` varchar(20) NOT NULL,
  PRIMARY KEY (`F_id`) USING BTREE,
  KEY `UNI_F_name` (`F_name`) USING BTREE,
  KEY `UNI_F_tag` (`F_tag`) USING BTREE,
  KEY `UNI_F_creation_date` (`F_creation_date`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facilites`
--

LOCK TABLES `facilites` WRITE;
/*!40000 ALTER TABLE `facilites` DISABLE KEYS */;
INSERT INTO `facilites` VALUES (50,'Breakfast','2021-12-24 14:57:54','Tomatoe'),(52,'Breakfast','0000-00-00 00:00:00','Tomatoe'),(67,'FAtima','2021-12-26 22:22:43','Karimova'),(71,'Bakery','2021-12-27 15:36:57','Cake,Donats'),(72,'Dinner','2021-12-27 15:44:05','Stew'),(73,'Dinner','2021-12-27 15:48:57','beef'),(75,'Dessert','0000-00-00 00:00:00','Chocolate'),(76,'Dessert','0000-00-00 00:00:00','Puding'),(78,'Dessert','0000-00-00 00:00:00','Biscuits'),(80,'Dinner','0000-00-00 00:00:00','Pork'),(81,'Dinner','0000-00-00 00:00:00','Stew'),(84,'Dinner','0000-00-00 00:00:00','Side Dishes'),(85,'Dinner','0000-00-00 00:00:00','Fajita'),(86,'Lunch','0000-00-00 00:00:00','Chicken'),(87,'Lunch','0000-00-00 00:00:00','Salad'),(88,'Lunch','0000-00-00 00:00:00','Soup'),(89,'Lunch','0000-00-00 00:00:00','Grill'),(93,'Breakfast','0000-00-00 00:00:00','Avacado'),(94,'Breakfast','0000-00-00 00:00:00','English Breakfast'),(95,'Breakfast','0000-00-00 00:00:00','Oatmeal'),(96,'Breakfast','0000-00-00 00:00:00','Porridge'),(97,'Breakfast','0000-00-00 00:00:00','Chia Puding');
/*!40000 ALTER TABLE `facilites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `location` (
  `F_id` int unsigned NOT NULL AUTO_INCREMENT,
  `L_city` varchar(100) NOT NULL,
  `L_address` varchar(255) NOT NULL,
  `L_zipcode` varchar(255) NOT NULL,
  `L_country_code` varchar(255) NOT NULL,
  `L_phone_number` varchar(255) NOT NULL,
  PRIMARY KEY (`F_id`) USING BTREE,
  CONSTRAINT `FK_F_id` FOREIGN KEY (`F_id`) REFERENCES `facilites` (`F_id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` VALUES (50,'Amsterdam','smt street ','345','456','+987951357'),(52,'AMsderdanm','sdfsdfs','234','123','234543'),(67,'Istanbul','Adam Giel street 45','1000','+994','25463547'),(71,'Baku','M.Mustafayev 22','AZ1000','+994','553103868'),(72,'Amsterdam','Kale street 1','1000','+35','95135789'),(73,'Amsterdam','Lil america street 6B','1010','+1','423568657'),(75,'Paris','65 Rue de la Tour, ','75016','+33','36985214'),(76,'Paris','46-48 Rue Nicolo, ','75116 ','+33','78965412'),(78,'Paris','110 Rue de la Tour','75016','+33','78965412'),(80,'Riga','Kalku street 6','1013','+1','435667898'),(81,'Riga','Azenes street 5','1048','+371','356768554'),(84,'Belgium','Rue de Rudder 32, ','1080 ','+32','951357895'),(85,' Belgium','1080 Molenbeek-Saint-Jean, Belgium','82','+31','6598326'),(86,'Belgium','Kalaele street 34/3','1011','23','9513578'),(87,'Hacitepe street 6','Istanbul','1048','+68','5435445'),(88,'London','Baker street 6b','2345','+12','95185265'),(93,'Rome','marvel street','lb-1023','+99','654789'),(94,'Baku','Bulbul street','AZ1000','+994','951357'),(95,'Riga','something street 14','Lv-1234','+371','357951654'),(96,'Amsterdam','Keizersgracht 458','1011 ','+31','659946168'),(97,'Amsterdam','Passeerdersgracht,','ND-1016','+31','7531596354');
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-28 14:29:52
