CREATE DATABASE  IF NOT EXISTS `lcg.rempel` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `lcg.rempel`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: lcg.rempel
-- ------------------------------------------------------
-- Server version	5.6.15-log

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
-- Table structure for table `linhas`
--

DROP TABLE IF EXISTS `linhas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `linhas` (
  `id_linha` int(4) NOT NULL AUTO_INCREMENT,
  `ddd` varchar(2) NOT NULL,
  `numero` varchar(9) NOT NULL,
  PRIMARY KEY (`id_linha`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `linhas`
--

LOCK TABLES `linhas` WRITE;
/*!40000 ALTER TABLE `linhas` DISABLE KEYS */;
INSERT INTO `linhas` VALUES (1,'51','99337614'),(2,'51','93138482'),(3,'11','983616293');
/*!40000 ALTER TABLE `linhas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id_log` int(4) NOT NULL AUTO_INCREMENT,
  `id_linha` int(4) NOT NULL,
  `inicio` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `final` datetime DEFAULT NULL,
  `usuario` varchar(250) DEFAULT NULL,
  `utilizacao` enum('1','2') NOT NULL,
  `situacao` enum('1','2','3','4') NOT NULL,
  PRIMARY KEY (`id_log`),
  KEY `id_linha_idx` (`id_linha`),
  CONSTRAINT `id_linha` FOREIGN KEY (`id_linha`) REFERENCES `linhas` (`id_linha`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,1,'2014-10-14 17:32:36',NULL,'Teste','2','3'),(2,1,'2014-10-14 17:33:28',NULL,'Teste 2','1','3');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-10-14 17:43:36
