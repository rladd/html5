-- MySQL dump 10.13  Distrib 5.1.44, for apple-darwin8.11.1 (i386)
--
-- Host: localhost    Database: html5
-- ------------------------------------------------------
-- Server version	5.1.44

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
-- Table structure for table `tblBoxes`
--

DROP TABLE IF EXISTS `tblBoxes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblBoxes` (
  `fidBox` int(11) NOT NULL AUTO_INCREMENT,
  `ftxClass` varchar(128) NOT NULL,
  `ftxTitle` varchar(128) NOT NULL,
  `fidOrder` int(11) NOT NULL,
  `fynVisible` tinyint(4) NOT NULL,
  PRIMARY KEY (`fidBox`),
  UNIQUE KEY `fidBox` (`fidBox`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblBoxes`
--

LOCK TABLES `tblBoxes` WRITE;
/*!40000 ALTER TABLE `tblBoxes` DISABLE KEYS */;
INSERT INTO `tblBoxes` VALUES (4,'animation','Animation',30,1),(2,'canvas','Canvas Basics',20,1),(3,'media','MultiMedia',40,1),(5,'resources','Resources',60,1),(6,'about','About This Project',10,1),(7,'demos','Demonstrations',50,1);
/*!40000 ALTER TABLE `tblBoxes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblItems`
--

DROP TABLE IF EXISTS `tblItems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblItems` (
  `fidItem` int(11) NOT NULL AUTO_INCREMENT,
  `fidBox` int(11) NOT NULL,
  `ftxId` varchar(128) NOT NULL,
  `ftxFilename` varchar(128) NOT NULL,
  `ftxExternalFile` varchar(128) NOT NULL,
  `ftxExternalUrl` varchar(255) NOT NULL,
  `ftxLink` varchar(128) NOT NULL,
  `ftxInfo` varchar(512) NOT NULL,
  `fidOrder` int(11) NOT NULL,
  `fynVisible` int(11) NOT NULL,
  PRIMARY KEY (`fidItem`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblItems`
--

LOCK TABLES `tblItems` WRITE;
/*!40000 ALTER TABLE `tblItems` DISABLE KEYS */;
INSERT INTO `tblItems` VALUES (5,2,'Square','canvasSquare.include.php','','','Simple Square','This will demonstrate how to draw a square.',30,1),(3,2,'Line','canvasLine.include.php','','','Simple Line','This will demonstrate how to plot points in order to display a simple line.',10,1),(4,2,'Circle','canvasCircle.include.php','','','Simple Circle','This will display the simple creation of a circle.',20,1),(6,4,'Basic','','','','Basic Movement','This will demonstrate the basics of creating an animation.',10,0),(7,3,'Audio','','','','Audio Implementation','This will demonstrate different ways that audio can be incorporated using HTML5.',10,0),(8,3,'Video','','','','Video Implementation','This will demonstrate the use of video within HTML5.',20,0),(9,4,'Layers','','','','Layered Movement','This will demonstrate an almost 3d effect of layers moving independantly of each other.',50,0),(10,5,'Html5Tags','','html5_cheat_sheet_tags.png','','HTML5  - Tags','',10,1),(11,5,'Html5Events','','html5_cheat_sheet_event_attributes.png','','HTML5 - Event Attributes','',20,1),(12,5,'Html5Tags','','html5_cheat_sheet_browser_support.png','','HTML5 - Broswer Support','',30,1),(13,5,'ExternalResources','','','http://www.html5rocks.com/en/resources','HTML5 Rocks Resources','',40,1),(14,6,'AboutUser','aboutBenefitsUser.include.php','','','User Benefits','',10,1);
/*!40000 ALTER TABLE `tblItems` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-08-09  8:47:35
