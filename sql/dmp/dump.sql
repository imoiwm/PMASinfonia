-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: web_dev
-- ------------------------------------------------------
-- Server version	8.0.27

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
-- Table structure for table `brothers`
--

DROP TABLE IF EXISTS `brothers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brothers` (
  `BrotherID` int NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `BrotherBio` text,
  `UserName` varchar(256) NOT NULL,
  `BrotherPassword` varchar(256) NOT NULL,
  `BrotherPicture` varchar(256) DEFAULT NULL,
  `Email` varchar(50) NOT NULL DEFAULT ' ' COMMENT 'Email for the given brother',
  PRIMARY KEY (`BrotherID`),
  UNIQUE KEY `BrotherID` (`BrotherID`),
  UNIQUE KEY `UserName` (`UserName`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brothers`
--

LOCK TABLES `brothers` WRITE;
/*!40000 ALTER TABLE `brothers` DISABLE KEYS */;
INSERT INTO `brothers` VALUES (1,'Jack','Moro','OK Now the hottest bro out there','jackly','password',NULL,' '),(2,'Justin','Moon',NULL,'qa112','1Luckydog!!!!!!',NULL,'jtm08993@uga.edu'),(4,'Justin','Moon','Hello World!!! Now','Qa12','VSuodH5K1DO1fN4k+m1PbUJWosIIebBg6cUeyOEUH1/Q/ZeaLpdvprk/YqAv/Rsc','img/uploads/1615649886510.jpg','jtm08993@uga.edu');
/*!40000 ALTER TABLE `brothers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `CommentID` int unsigned NOT NULL AUTO_INCREMENT,
  `BrotherID` int unsigned NOT NULL,
  `CommentText` text NOT NULL,
  `Which` char(1) NOT NULL,
  `Liked` tinyint(1) NOT NULL,
  `WhichID` int unsigned NOT NULL,
  PRIMARY KEY (`CommentID`),
  UNIQUE KEY `CommentID` (`CommentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `EventID` int NOT NULL AUTO_INCREMENT,
  `EventTitle` varchar(100) NOT NULL,
  `EventDate` date NOT NULL,
  `EventLocation` varchar(50) NOT NULL,
  `EventDescription` text NOT NULL,
  PRIMARY KEY (`EventID`),
  UNIQUE KEY `EventID` (`EventID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,'Get Together','2022-11-11','115 Epps Bridge Highway','Tonight, we would like to get to know everyone better.'),(2,'Jam Out','2022-10-11','Frat','Tonight, we jam out. Bring your own music, if you know what I mean.');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `merchandise`
--

DROP TABLE IF EXISTS `merchandise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `merchandise` (
  `MerchID` int NOT NULL AUTO_INCREMENT,
  `MerchName` varchar(100) NOT NULL,
  `MerchQuantity` int unsigned NOT NULL,
  `MerchDescription` text NOT NULL,
  `MerchImgFilePath` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`MerchID`),
  UNIQUE KEY `MerchID` (`MerchID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `merchandise`
--

LOCK TABLES `merchandise` WRITE;
/*!40000 ALTER TABLE `merchandise` DISABLE KEYS */;
INSERT INTO `merchandise` VALUES (1,'Scam Material',25,'The hottest book series out there right now!',NULL);
/*!40000 ALTER TABLE `merchandise` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-26 11:23:43
