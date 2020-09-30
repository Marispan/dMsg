-- MySQL dump 10.13  Distrib 5.5.62, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: dMsg
-- ------------------------------------------------------
-- Server version	5.5.62-0+deb8u1

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
-- Table structure for table `Amigos`
--

DROP TABLE IF EXISTS `Amigos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Amigos` (
  `idAmigos` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idUser` int(10) unsigned NOT NULL,
  `idAmigo` int(10) unsigned NOT NULL,
  `apelido` varchar(60) DEFAULT NULL,
  `dataCadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idAmigos`),
  KEY `FK_Amigo_Lista_` (`idUser`),
  KEY `FK_Amigos_Lista_` (`idAmigo`),
  CONSTRAINT `FK_Amigos_Lista_` FOREIGN KEY (`idAmigo`) REFERENCES `Usuarios` (`idUser`),
  CONSTRAINT `FK_Amigo_Lista_` FOREIGN KEY (`idUser`) REFERENCES `Usuarios` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Amigos`
--

LOCK TABLES `Amigos` WRITE;
/*!40000 ALTER TABLE `Amigos` DISABLE KEYS */;
INSERT INTO `Amigos` VALUES (2,2,1,'Will','2018-06-11 12:12:01'),(13,10,1,NULL,'2018-06-15 18:25:01'),(24,1,11,NULL,'2018-07-26 18:20:09'),(25,11,1,NULL,'2018-07-26 18:20:09');
/*!40000 ALTER TABLE `Amigos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Mensagens`
--

DROP TABLE IF EXISTS `Mensagens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Mensagens` (
  `idMsg` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idUser` int(10) unsigned NOT NULL,
  `idAmigo` int(10) unsigned NOT NULL,
  `mensagem` varchar(255) DEFAULT NULL,
  `dataCadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idMsg`),
  KEY `FK_Amigo_Msg_` (`idUser`),
  KEY `FK_Amigos_Msg_` (`idAmigo`),
  CONSTRAINT `FK_Amigos_Msg_` FOREIGN KEY (`idAmigo`) REFERENCES `Usuarios` (`idUser`),
  CONSTRAINT `FK_Amigo_Msg_` FOREIGN KEY (`idUser`) REFERENCES `Usuarios` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Mensagens`
--

LOCK TABLES `Mensagens` WRITE;
/*!40000 ALTER TABLE `Mensagens` DISABLE KEYS */;
INSERT INTO `Mensagens` VALUES (1,1,2,'Mensagem de Will para JJ','2018-06-11 12:13:21'),(2,2,1,'Mensagem de JJ para Will','2018-06-11 12:14:06'),(3,1,2,'Rss','2018-06-11 12:38:35'),(4,1,2,'Rsssss','2018-06-11 12:38:37'),(5,2,1,'xD','2018-06-11 12:38:48'),(6,2,1,'xDxDD','2018-06-11 12:38:57'),(7,1,3,'Mensagem de Will para HJA','2018-06-11 12:53:25'),(8,1,2,' AIshaidshiaushdiu Shdias IAShd iAshd aISudh AIUShd IASd IUAShdiAs  IAHSd iash di aisudh iasuhd as','2018-06-11 13:40:28'),(9,2,1,'Ainda que eu ande pelo vale da sombra da morte, não temerei mal algum.','2018-06-11 13:42:56'),(10,2,1,'Ainda que eu ande pelo vale da sombra da morte, não temerei mal algum.','2018-06-11 14:01:04'),(12,2,1,'Ela é foda, ela!','2018-06-11 16:09:44'),(23,2,1,'XD','2018-06-12 13:14:58'),(25,2,1,'kkkk','2018-06-12 13:15:27'),(26,1,3,'ta ouvindo?\r\n<b>heuhuehuhe</b>','2018-06-12 13:21:51'),(40,1,2,'xD','2018-06-26 13:02:33'),(42,1,3,'XD','2018-07-25 12:09:01'),(44,1,11,'xD','2018-07-26 19:53:45'),(46,1,11,'XXXXXXXXXXXXX','2019-01-17 12:46:36');
/*!40000 ALTER TABLE `Mensagens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usuarios`
--

DROP TABLE IF EXISTS `Usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Usuarios` (
  `idUser` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `apelido` varchar(60) DEFAULT NULL,
  `dataCadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nivel` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuarios`
--

LOCK TABLES `Usuarios` WRITE;
/*!40000 ALTER TABLE `Usuarios` DISABLE KEYS */;
INSERT INTO `Usuarios` VALUES (1,'William Maggi','maggi.william@gmail.com','x1x2x3x4','Will','2018-06-11 12:09:56',0),(2,'Administador','rsm@gmail.com','x1x2x3x4','Admin','2018-06-11 13:48:10',1),(3,'Moderador','HJA@XDC.com','x1x2x3x4','Moderador','2018-06-11 13:48:21',1),(4,'Inimigo 1','Inimigo@Amigo.com','aaa','Inimigo1','2018-06-12 13:49:35',2),(5,'Inimigo 2','Inimigo2@Amigo.com','aaa1','Inimigo2','2018-06-12 13:49:46',2),(6,'Inimigo 3','Inimigo3@Amigo.com','aaa1','Inimigo3','2018-06-12 13:49:56',2),(7,'Inimigo 4','Inimigo4@Amigo.com','aaa4','Inimigo4','2018-06-12 13:50:33',2),(10,'William Maggi','maggi.marispan@gmail.com','1234','','2018-06-15 17:20:24',2),(11,'XYz','x@y.z','1111','Xyzz','2018-07-26 10:27:58',2);
/*!40000 ALTER TABLE `Usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-30 16:32:30
