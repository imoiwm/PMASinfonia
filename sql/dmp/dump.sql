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
  `MiddleName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `PrefName` varchar(100) NOT NULL,
  `InitiationDate` varchar(256) NOT NULL,
  `BrotherBio` text,
  `UserName` varchar(256) NOT NULL,
  `BrotherPassword` varchar(256) NOT NULL,
  `BrotherPicture` varchar(256) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Pronouns` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`BrotherID`),
  UNIQUE KEY `BrotherID` (`BrotherID`),
  UNIQUE KEY `UserName` (`UserName`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brothers`
--

LOCK TABLES `brothers` WRITE;
/*!40000 ALTER TABLE `brothers` DISABLE KEYS */;
INSERT INTO `brothers` VALUES 
(1,'Henry','Thomas','Browne','Henry','March 4, 2018',NULL,'HTBrowne','sinfonia','./img/uploads/henrybrownesmile.png','hanktbrowne@gmail.com','He/Him'),
(2,'Andy','The','Nguyen','Andy','March 3, 2019',NULL,'ATNguyen','sinfonia','./img/uploads/andynguyensmile.png','andy99117@gmail.com','He/Him'),
(3,'Carson','Michael','Adams','Carson','March 3, 2019',NULL,'CMAdams','sinfonia','./img/uploads/carsonadamssmile.png','carsonmadams@yahoo.com','They/Them'),
(4,'Evan','Paul','Page','Evan','March 3, 2019',NULL,'EPPage','sinfonia','./img/uploads/evanpagesmile.png','epage0302@gmail.com','He/Him'),
(5,'Joshua','Chongshik','Barron','Josh','March 3, 2019',NULL,'JCBarron','sinfonia','./img/uploads/joshbarronsmile.png','josh.c.barron@gmail.com',NULL),
(6,'Justin','Bridger','Defalco','Justin','March 3, 2019',NULL,'JBDefalco','sinfonia','./img/uploads/justindefalcosmile.png','justin.defalco@comcast.net','He/Him'),
(7,'Kelly','Michael','Fry','Kelly','March 3, 2019',NULL,'KMFry','sinfonia','./img/uploads/kellyfrysmile.png','kellyfry418@gmail.com','He/Him'),
(8,'Lee','Thomas','Richardson','Lee Thomas','March 3, 2019',NULL,'LTRichardson','sinfonia','./img/uploads/leethomasrichardsonsmile.png','leethomasrichardson1@gmail.com','He/Him'),
(9,'Matthew','Ivan','McFadden','Matt','March 3, 2019',NULL,'MIMcFadden','sinfonia','./img/uploads/matthewmcfaddensmile.png','mattmcfa64@gmail.com','He/Him'),
(10,'Matthew','Ryan','Curlee','Matthew','March 3, 2019',NULL,'MRCurlee','sinfonia','./img/uploads/matthewcurleesmile.png','matthew.curlee15@gmail.com','He/Him'),
(11,'Michael','Todd','Perry','Todd','March 3, 2019',NULL,'MTPerry','sinfonia','./img/uploads/toddperrysmile.png','toddperry99@gmail.com','He/Him'),
(12,'Samuel','Aaron','Riddle','Sam','March 3, 2019',NULL,'SARiddle','sinfonia','./img/uploads/samriddlesmile.png','shrfoo.riddle@gmail.com','He/Him'),
(13,'William','Bowers','Halloran','Will','March 3, 2019',NULL,'WBHalloran','sinfonia','./img/uploads/willhalloransmile.png','will.halloran54@gmail.com','He/Him'),
(14,'Zachary','Keith','Kalet','Zack','March 3, 2019',NULL,'ZKKalet','sinfonia','./img/uploads/zackkaletsmile.png','zackkalet@gmail.com','He/Him'),
(15,'Alexander','Mason','Aull','Alex','February 29, 2020',NULL,'AMAull','sinfonia','./img/uploads/alexaullsmile.png','ama15246@uga.edu',NULL),
(16,'Andrew','Rush','Burnes','Rush','February 29, 2020',NULL,'ARBurnes','sinfonia','./img/uploads/rushburnessmile.png','rushburnes@gmail.com','He/Him'),
(17,'Austin','James','Seawright','Austin','February 29, 2020',NULL,'AJSeawright','sinfonia','./img/uploads/austinseawrightsmile.png','ajseawright@outlook.com','He/Him'),
(18,'Benjiman','Michael','Phillips','Benny','February 29, 2020',NULL,'BMPhillips','sinfonia','./img/uploads/bennyphillipssmile.png','	benphillips1601@gmail.com',NULL),
(19,'Cameron','Jacob','Kreitner','Cam','February 29, 2020',NULL,'CJKreitner','sinfonia','./img/uploads/camkreitnersmile.png','cjkreitner19@gmail.com','He/Him'),
(20,'Connor','Matthew','Bacon','Connor','February 29, 2020',NULL,'CMBacon','sinfonia','./img/uploads/connorbaconsmile.png','connerbacon11@gmail.com','He/Him'),
(21,'Ethan','Hunter','Mason','Hunter','February 29, 2020',NULL,'EHMason','sinfonia','./img/uploads/huntermasonsmile.png','encyclopediamason@gmail.com','They/He'),
(22,'Griffin','Walker','Haarbauer','Griffin','February 29, 2020',NULL,'GWHaarbauer','sinfonia','./img/uploads/griffinhaarbauersmile.png','ghaar80@gmail.com','He/Him'),
(23,'Iain','Doty','Cooke','Iain','February 29, 2020',NULL,'IDCooke','sinfonia','./img/uploads/iaincookesmile.png','idc11956@uga.edu','He/Him'),
(24,'Ian','Clark','Cornelius','Ian','February 29, 2020',NULL,'ICCornelius','sinfonia','./img/uploads/iancorneliussmile.png','ian.cornelius@uga.edu','He/Him'),
(25,'John','Taylor','Wetterhan','Taylor','February 29, 2020',NULL,'JTWetterhan','sinfonia','./img/uploads/taylorwetterhansmile.png','jotaywetterhan@gmail.com','He/Him'),
(26,'Jonathan','Nash','Ray','Jonathan','February 29, 2020',NULL,'JNRay','sinfonia','./img/uploads/jonathanraysmile.png','nicholasgoldfarb@gmail.com','He/Him'),
(27,'Nicholas','Walton','Goldfarb','Nicholas','February 29, 2020',NULL,'NWGoldfarb','sinfonia','./img/uploads/nicholasgoldfarbsmile.png','Jonathan.nash.ray@gmail.com','He/Him'),
(28,'Patrick','Myles','Fuller','Patrick','February 29, 2020',NULL,'PMFuller','sinfonia','./img/uploads/patrickfullersmile.png','pmfuller28@gmail.com','He/Him'),
(29,'Roberto','David','Ortiz','Roberto','February 29, 2020',NULL,'RDOrtiz','sinfonia','./img/uploads/robertoortizsmile.png','robertodortiz14@gmail.com','He/Him'),
(30,'Thomas','Alexander','Charyton','Thomas','February 29, 2020',NULL,'TACharyton','sinfonia','./img/uploads/thomascharytonsmile.png','tac70630@uga.edu','He/Him'),
(33,'Tylan','Shemar','Davis','Tylan','February 29, 2020',NULL,'TSDavis','sinfonia','./img/uploads/tylandavissmile.png','tylandavis58@gmail.com','He/Him'),
(34,'William','Clarence','OBannon','Will','February 29, 2020',NULL,'WCOBannon','sinfonia','./img/uploads/willobannonsmile.png','william.c.obannon@gmail.com','He/Him'),
(35,'Bowen','Mitchell','Spackman','Bowen','March 20, 2021',NULL,'BMSpackman','sinfonia','./img/uploads/bowenspackmansmile.png','bowenspackman@gmail.com','He/Him'),
(36,'Brandon','James','Gibson','Brandon','March 20, 2021',NULL,'BJGibson','sinfonia','./img/uploads/brandongibsonsmile.png','brandonjgibson01@gmail.com','He/Him'),
(37,'Connor','Gregory','Norris','Connor','March 20, 2021',NULL,'CGNorris','sinfonia','./img/uploads/connornorrissmile.png','cgnorris18694@gmail.com','They/Them'),
(38,'Daniel','George','Pysczynski','Daniel','March 20, 2021',NULL,'DGPysczynski','sinfonia','./img/uploads/danielpysczynskismile.png','d.pysczynski@gmail.com','He/Him'),
(39,'David','Corbin','Cain','David','March 20, 2021',NULL,'DCCain','sinfonia','./img/uploads/davidcainsmile.png','davidcain30041@gmail.com','He/Him'),
(40,'Duncan','Louden','Jourdan','Duncan','March 20, 2021',NULL,'DLJourdan','sinfonia','./img/uploads/duncanjourdansmile.png','scholardjourdan@gmail.com','He/Him'),
(41,'Jackson','Ray','Camp','Jackson','March 20, 2021',NULL,'JRCamp','sinfonia','./img/uploads/jacksoncampsmile.png','jacksonraycamp@gmail.com','He/Him'),
(42,'John','Isaac','Stone','Isaac','March 20, 2021',NULL,'JIStone','sinfonia','./img/uploads/isaacstonesmile.png','isaacbigcheese@gmail.com','He/Him'),
(43,'Langdon','Walker','Dial','Langdon','March 20, 2021',NULL,'LWDial','sinfonia','./img/uploads/langdondialsmile.png','langdon.dial@gmail.com','He/Him'),
(44,'Logan','Carver','Durisch','Logan','March 20, 2021',NULL,'LCDurisch','sinfonia','./img/uploads/logandurischsmile.png','lcdurisch@gmail.com','He/Him'),
(46,'Matthew','Alexander','Castro','Matthew','March 20, 2021',NULL,'MACastro','sinfonia','./img/uploads/matthewcastrosmile.png','castromatt70@gmail.com','He/Him'),
(47,'Matthew','Robert','Motley','Matthew','March 20, 2021',NULL,'MRMotley','sinfonia','./img/uploads/matthewmotleysmile.png','matthew9motley@gmail.com','He/Him'),
(48,'Michael','Richard','Cameron','Mikey','March 20, 2021',NULL,'MRCameron','sinfonia','./img/uploads/mikeycameronsmile.png','michael.cameron1950@gmail.com','He/Him'),
(49,'Nathan','Joseph','Jacobi','Nathan','March 20, 2021',NULL,'NJJacobi','sinfonia','./img/uploads/nathanjacobismile.png','nathanja01@gmail.com','He/Him'),
(50,'Nicholus','Christian','Jackson','Nick','March 20, 2021',NULL,'NCJackson','sinfonia','./img/uploads/nickjacksonsmile.png','ncj22622@uga.edu','He/Him'),
(51,'Douglas','Doug','Vines','Doug','March 20, 2021',NULL,'DVines','sinfonia','./img/uploads/douglasvinessmile.png','sdv48039@uga.edu','He/Him'),
(52,'Brennan','Kellog','Sweet','Brennan','March 19, 2022',NULL,'BKSweet','sinfonia','./img/uploads/brennansweetsmile.png','brensweet03@gmail.com','He/Him'),
(53,'Charles','James','Enter','Charlie','March 19, 2022',NULL,'CJEnter','sinfonia','./img/uploads/charlieentermile.png','charlieentermusic@gmail.com','He/Him'),
(54,'Drew','Kenneth','Gilliland','Drew','March 19, 2022',NULL,'DKGilliland','sinfonia','./img/uploads/drewgillilandsmile.png','	drewkgilliland@gmail.com','He/Him'),
(55,'Ethan','Michael','Johnson','Ethan','March 19, 2022',NULL,'EMJohnson','sinfonia','./img/uploads/ethanjohnsonsmile.png','	ethanmichaeljohnson17@gmail.com','He/Him'),
(56,'Kaleb','Josiah','Colwell','Kaleb','March 19, 2022',NULL,'KJColwell','sinfonia','./img/uploads/kalebcolwellsmile.png','kalebcolwell87@gmail.com','He/Him'),
(57,'Matthew','Ryan','Trinh','Matthew','March 19, 2022',NULL,'MRTrinh','sinfonia','./img/uploads/matthewtrinhsmile.png','trinhmatthew37@gmail.com','He/Him'),
(58,'Nathan','Chance','Brown','Nathan','March 19, 2022',NULL,'NCBrown','sinfonia','./img/uploads/nathanbrownsmile.png','nathancbrown21@gmail.com','He/Him'),
(59,'Paul','Joseph','Di Cicco','Paul','March 3, 2019',NULL,'PJDicicco','sinfonia','./img/uploads/pauldiciccosmile.png','paul@superhappyfun.net','He/Him'),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
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

-- Dump completed on 2022-03-03 15:26:23
