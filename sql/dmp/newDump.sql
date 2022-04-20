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
  `Email` varchar(50) DEFAULT NULL,
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
INSERT INTO `brothers` VALUES 
(1,'Henry','Browne',NULL,'HTBrowne','sinfonia','./img/uploads/henrybrownesmile.png','hanktbrowne@gmail.com'),
(2,'Andy','Nguyen',NULL,'ATNguyen','sinfonia','./img/uploads/andynguyensmile.png','andy99117@gmail.com'),
(3,'Carson','Adams',NULL,'CMAdams','sinfonia','./img/uploads/carsonadamssmile.png','carsonmadams@yahoo.com'),
(4,'Evan','Page',NULL,'EPPage','sinfonia','./img/uploads/evanpagesmile.png','epage0302@gmail.com'),
(5,'Joshua','Barron',NULL,'JCBarron','sinfonia','./img/uploads/joshbarronsmile.png','josh.c.barron@gmail.com'),
(6,'Justin','Defalco',NULL,'JBDefalco','sinfonia','./img/uploads/justindefalcosmile.png','justin.defalco@comcast.net'),
(7,'Kelly','Fry',NULL,'KMFry','sinfonia','./img/uploads/kellyfrysmile.png','kellyfry418@gmail.com'),
(8,'Lee','Richardson',NULL,'LTRichardson','sinfonia','./img/uploads/leethomasrichardsonsmile.png','leethomasrichardson1@gmail.com'),
(9,'Matthew','McFadden',NULL,'MIMcFadden','sinfonia','./img/uploads/matthewmcfaddensmile.png','mattmcfa64@gmail.com'),
(10,'Matthew','Curlee',NULL,'MRCurlee','sinfonia','./img/uploads/matthewcurleesmile.png','matthew.curlee15@gmail.com'),
(11,'Michael','Perry',NULL,'MTPerry','sinfonia','./img/uploads/toddperrysmile.png','toddperry99@gmail.com'),
(12,'Samuel','Riddle',NULL,'SARiddle','sinfonia','./img/uploads/samriddlesmile.png','shrfoo.riddle@gmail.com'),
(13,'William','Halloran',NULL,'WBHalloran','sinfonia','./img/uploads/willhalloransmile.png','will.halloran54@gmail.com'),
(14,'Zachary','Kalet',NULL,'ZKKalet','sinfonia','./img/uploads/zackkaletsmile.png','zackkalet@gmail.com'),
(15,'Alexander','Aull',NULL,'AMAull','sinfonia','./img/uploads/alexaullsmile.png','ama15246@uga.edu'),
(16,'Andrew','Burnes',NULL,'ARBurnes','sinfonia','./img/uploads/rushburnessmile.png','rushburnes@gmail.com'),
(17,'Austin','Seawright',NULL,'AJSeawright','sinfonia','./img/uploads/austinseawrightsmile.png','ajseawright@outlook.com'),
(18,'Benjiman','Phillips',NULL,'BMPhillips','sinfonia','./img/uploads/bennyphillipssmile.png','	benphillips1601@gmail.com'),
(19,'Cameron','Kreitner',NULL,'CJKreitner','sinfonia','./img/uploads/camkreitnersmile.png','cjkreitner19@gmail.com'),
(20,'Connor','Bacon',NULL,'CMBacon','sinfonia','./img/uploads/connorbaconsmile.png','connerbacon11@gmail.com'),
(21,'Ethan','Mason',NULL,'EHMason','sinfonia','./img/uploads/huntermasonsmile.png','encyclopediamason@gmail.com'),
(22,'Griffin','Haarbauer',NULL,'GWHaarbauer','sinfonia','./img/uploads/griffinhaarbauersmile.png','ghaar80@gmail.com'),
(23,'Iain','Cooke',NULL,'IDCooke','sinfonia','./img/uploads/iaincookesmile.png','idc11956@uga.edu'),
(24,'Ian','Cornelius',NULL,'ICCornelius','sinfonia','./img/uploads/iancorneliussmile.png','ian.cornelius@uga.edu'),
(25,'John','Wetterhan',NULL,'JTWetterhan','sinfonia','./img/uploads/taylorwetterhansmile.png','jotaywetterhan@gmail.com'),
(26,'Jonathan','Ray',NULL,'JNRay','sinfonia','./img/uploads/jonathanraysmile.png','nicholasgoldfarb@gmail.com'),
(27,'Nicholas','Goldfarb',NULL,'NWGoldfarb','sinfonia','./img/uploads/nicholasgoldfarbsmile.png','Jonathan.nash.ray@gmail.com'),
(28,'Patrick','Fuller',NULL,'PMFuller','sinfonia','./img/uploads/patrickfullersmile.png','pmfuller28@gmail.com'),
(29,'Roberto','Ortiz',NULL,'RDOrtiz','sinfonia','./img/uploads/robertoortizsmile.png','robertodortiz14@gmail.com'),
(30,'Thomas','Charyton',NULL,'TACharyton','sinfonia','./img/uploads/thomascharytonsmile.png','tac70630@uga.edu'),
(33,'Tylan','Davis',NULL,'TSDavis','sinfonia','./img/uploads/tylandavissmile.png','tylandavis58@gmail.com'),
(34,'William','OBannon',NULL,'WCOBannon','sinfonia','./img/uploads/willobannonsmile.png','william.c.obannon@gmail.com'),
(35,'Bowen','Spackman',NULL,'BMSpackman','sinfonia','./img/uploads/bowenspackmansmile.png','bowenspackman@gmail.com'),
(36,'Brandon','Gibson',NULL,'BJGibson','sinfonia','./img/uploads/brandongibsonsmile.png','brandonjgibson01@gmail.com'),
(37,'Connor','Norris',NULL,'CGNorris','sinfonia','./img/uploads/connornorrissmile.png','cgnorris18694@gmail.com'),
(38,'Daniel','Pysczynski',NULL,'DGPysczynski','sinfonia','./img/uploads/danielpysczynskismile.png','d.pysczynski@gmail.com'),
(39,'David','Cain',NULL,'DCCain','sinfonia','./img/uploads/davidcainsmile.png','davidcain30041@gmail.com'),
(40,'Duncan','Jourdan',NULL,'DLJourdan','sinfonia','./img/uploads/duncanjourdansmile.png','scholardjourdan@gmail.com'),
(41,'Jackson','Camp',NULL,'JRCamp','sinfonia','./img/uploads/jacksoncampsmile.png','jacksonraycamp@gmail.com'),
(42,'John','Stone',NULL,'JIStone','sinfonia','./img/uploads/isaacstonesmile.png','isaacbigcheese@gmail.com'),
(43,'Langdon','Dial',NULL,'LWDial','sinfonia','./img/uploads/langdondialsmile.png','langdon.dial@gmail.com'),
(44,'Logan','Durisch',NULL,'LCDurisch','sinfonia','./img/uploads/logandurischsmile.png','lcdurisch@gmail.com'),
(46,'Matthew','Castro',NULL,'MACastro','sinfonia','./img/uploads/matthewcastrosmile.png','castromatt70@gmail.com'),
(47,'Matthew','Motley',NULL,'MRMotley','sinfonia','./img/uploads/matthewmotleysmile.png','matthew9motley@gmail.com'),
(48,'Michael','Cameron',NULL,'MRCameron','sinfonia','./img/uploads/mikeycameronsmile.png','michael.cameron1950@gmail.com'),
(49,'Nathan','Jacobi',NULL,'NJJacobi','sinfonia','./img/uploads/nathanjacobismile.png','nathanja01@gmail.com'),
(50,'Nicholus','Jackson',NULL,'NCJackson','sinfonia','./img/uploads/nickjacksonsmile.png','ncj22622@uga.edu'),
(51,'Douglas','Vines',NULL,'DVines','sinfonia','./img/uploads/douglasvinessmile.png','sdv48039@uga.edu'),
(52,'Brennan','Sweet',NULL,'BKSweet','sinfonia','./img/uploads/brennansweetsmile.png','brensweet03@gmail.com'),
(53,'Charles','Enter',NULL,'CJEnter','sinfonia','./img/uploads/charlieentermile.png','charlieentermusic@gmail.com'),
(54,'Drew','Gilliland',NULL,'DKGilliland','sinfonia','./img/uploads/drewgillilandsmile.png','	drewkgilliland@gmail.com'),
(55,'Ethan','Johnson',NULL,'EMJohnson','sinfonia','./img/uploads/ethanjohnsonsmile.png','	ethanmichaeljohnson17@gmail.com'),
(56,'Kaleb','Colwell',NULL,'KJColwell','sinfonia','./img/uploads/kalebcolwellsmile.png','kalebcolwell87@gmail.com'),
(57,'Matthew','Trinh',NULL,'MRTrinh','sinfonia','./img/uploads/matthewtrinhsmile.png','trinhmatthew37@gmail.com'),
(58,'Nathan','Brown',NULL,'NCBrown','sinfonia','./img/uploads/nathanbrownsmile.png','nathancbrown21@gmail.com'),
(59,'Paul','Di Cicco',NULL,'PJDicicco','sinfonia','./img/uploads/pauldiciccosmile.png','paul@superhappyfun.net');
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
INSERT INTO `comments` VALUES (1,1,'this sucks. Haven\'t gotten it yet','m',0,1),(2,4,'It taught me something alright.','m',0,1),(3,4,'Whyyyyyyyyyy!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!                 ','m',0,1);
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

-- Dump completed on 2022-03-03 15:26:23
