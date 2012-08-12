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
  PRIMARY KEY (`fidBox`),
  UNIQUE KEY `fidBox` (`fidBox`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblBoxes`
--

LOCK TABLES `tblBoxes` WRITE;
/*!40000 ALTER TABLE `tblBoxes` DISABLE KEYS */;
INSERT INTO `tblBoxes` VALUES (4,'animation','Animation',20),(2,'canvas','HTML5 Canvas',10),(3,'media','Multimedia',30);
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
  `ftxLink` varchar(128) NOT NULL,
  `ftxInfo` varchar(512) NOT NULL,
  `fidOrder` int(11) NOT NULL,
  PRIMARY KEY (`fidItem`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblItems`
--

LOCK TABLES `tblItems` WRITE;
/*!40000 ALTER TABLE `tblItems` DISABLE KEYS */;
INSERT INTO `tblItems` VALUES (5,2,'Square','Simple Square','This will demonstrate how to draw a square.',30),(3,2,'Line','Simple Line','This will demonstrate how to plot points in order to display a simple line.',10),(4,2,'Rectangle','Simple Rectangle','This will display the simple creation of a rectangle.',20),(6,4,'Basic','Basic Movement','This will demonstrate the basics of creating an animation.',10),(7,3,'Audio','Audio Implementation','This will demonstrate different ways that audio can be incorporated using HTML5.',10),(8,3,'Video','Video Implementation','This will demonstrate the use of video within HTML5.',20),(9,4,'Layers','Layered Movement','This will demonstrate an almost 3d effect of layers moving independantly of each other.',50);
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

-- Dump completed on 2012-08-07 19:38:39
