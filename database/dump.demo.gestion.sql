-- MySQL dump 10.13  Distrib 5.5.58, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: gestion
-- ------------------------------------------------------
-- Server version	5.5.58-0+deb7u1

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
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `address` text,
  `city` varchar(64) DEFAULT NULL,
  `postalCode` varchar(16) DEFAULT NULL,
  `country` varchar(64) DEFAULT NULL,
  `tel` varchar(32) DEFAULT NULL,
  `mail` varchar(54) DEFAULT NULL,
  `remainingHours` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES
  (1,'PSA AUTOMOBILES SA','1 rue de truc','POISSY','78300','France','0123456789','psa@psa.fr',NULL),
  (2,'AIRBUS','1 rue de truc','Blagnac','31700','France','0123456789','airbus@airbus.fr',NULL),
  (3,'RENAULT SAS','1 rue de truc','BOULOGNE BILLANCOURT','92100','France','0123456789','renault@renault.fr',NULL),
  (4,'ELECTRICITE DE FRANCE','1 rue de truc','Paris 8','75008','France','0123456789','edf@efd.fr',NULL),
  (5,'ORANGE','1 rue de truc','PARIS 15','75015','France','0123456789','orange@orange.fr',NULL),
  (6,'CSF','1 rue de truc','MONDEVILLE','14120','France','0123456789','csf@csf.fr',NULL),
  (7,'TOTAL MARKETING FRANCE','1 rue de truc','Nanterre','92000','France','123456789','marketing@total.fr',NULL),
  (8,'ENGIE','1 rue de truc','Courbevoie','92400','France','123456789','engie@engie.fr',NULL),
  (9,'TOTAL RAFFINAGE FRANCE','1 rue de truc','COURBEVOIE','92400','France','0123456789','raffinage@total.fr',NULL),
  (10,'CONTANGO TRADING SA','1 rue de truc','PARIS 13','75013','France','123456789','contango@contango.fr',NULL),
  (11,'SNCF MOBILITES','1 rue de truc','SAINT DENIS','93200','France','123456789','sncf@sncf.fr',NULL),
  (12,'CARREFOUR HYPERMARCHES','1 rue de truc','Évry','91000','France','123456789','carrefour@carrefour.fr',NULL),
  (13,'SOCIETE AIR FRANCE','1 rue de truc','Tremblay-en-France','93290','France','123456789','airfrance@airfrance.fr',NULL),
  (14,'ITM ALIMENTAIRE INTERNATIONAL','1 rue de truc','PARIS 15','75015','France','123456789','itm@itm.fr',NULL),
  (15,'LA FRANÇAISE DES JEUX','1 rue de truc','BOULOGNE BILLANCOURT','92100','France','123456789','fdj@fdj.fr',NULL),
  (16,'ENEDIS','1 rue de truc','Courbevoie','92400','France','123456789','enedis@enedis.fr',NULL),
  (17,'CMA CGM','1 rue de truc','MARSEILLE 2','13002','France','123456789','cma@cma.fr',NULL),
  (18,'AUTOMOBILES PEUGEOT','1 rue de truc','RUEIL MALMAISON','92500','France','0123456789','peugeot@peugeot.fr',NULL),
  (19,'ESSO SOCIÉTÉ ANONYME FRANÇAISE','1 rue de truc','COURBEVOIE','92400','France','0123456789','esso@esso.fr',NULL),
  (20,'AIRBUS OPERATIONS','1 rue de truc','TOULOUSE','31300','France','0123456789','operations@airbus.fr',NULL),
  (21,'AUCHAN FRANCE','1 rue de truc','VILLENEUVE D\'ASCQ','59650','France','0123456789','auchan@auchan.fr',NULL),
  (22,'LA POSTE','1 rue de truc','PARIS 15','75015','France','0123456789','laposte@laposte.fr',NULL),
  (23,'AMPLITEL','1 rue de truc','SAINT DENIS','93200','France','0123456789','amplitel@amplitel.fr',NULL);
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastName` varchar(64) NOT NULL,
  `firstName` varchar(64) NOT NULL,
  `address` text,
  `city` varchar(64) DEFAULT NULL,
  `postalCode` varchar(16) DEFAULT NULL,
  `country` varchar(64) DEFAULT NULL,
  `tel` varchar(32) DEFAULT NULL,
  `mail` varchar(54) DEFAULT NULL,
  `function` varchar(64) DEFAULT NULL,
  `interlocutor` tinyint(1) NOT NULL,
  `clientId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_clients_clientId` (`clientId`),
  CONSTRAINT `fk_clients_clientId` FOREIGN KEY (`clientId`) REFERENCES `clients` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES
  (1,'John','Doe','1 rue de truc','Haguenau','67500','France','0123456789','john@doe.fr',NULL,0,1),
  (2,'John','Doe','1 rue de truc','Haguenau','67500','France','0123456789','john@doe.fr',NULL,0,2),
  (3,'John','Doe','1 rue de truc','Haguenau','67500','France','0123456789','john@doe.fr',NULL,0,3),
  (4,'John','Doe','1 rue de truc','Haguenau','67500','France','0123456789','john@doe.fr',NULL,0,4),
  (5,'John','Doe','1 rue de truc','Haguenau','67500','France','0123456789','john@doe.fr',NULL,0,5),
  (6,'John','Doe','1 rue de truc','Haguenau','67500','France','0123456789','john@doe.fr',NULL,0,6),
  (7,'John','Doe','1 rue de truc','Haguenau','67500','France','0123456789','john@doe.fr',NULL,0,7),
  (8,'John','Doe','1 rue de truc','Haguenau','67500','France','0123456789','john@doe.fr',NULL,0,8),
  (9,'John','Doe','1 rue de truc','Haguenau','67500','France','0123456789','john@doe.fr',NULL,0,9),
  (10,'John','Doe','1 rue de truc','Haguenau','67500','France','0123456789','john@doe.fr',NULL,0,10),
  (11,'John','Doe','1 rue de truc','Haguenau','67500','France','0123456789','john@doe.fr',NULL,0,11),
  (12,'John','Doe','1 rue de truc','Haguenau','67500','France','0123456789','john@doe.fr',NULL,0,12),
  (13,'John','Doe','1 rue de truc','Haguenau','67500','France','0123456789','john@doe.fr',NULL,0,13),
  (14,'John','Doe','1 rue de truc','Haguenau','67500','France','0123456789','john@doe.fr',NULL,0,14),
  (15,'John','Doe','1 rue de truc','Haguenau','67500','France','0123456789','john@doe.fr',NULL,0,15),
  (16,'John','Doe','1 rue de truc','Haguenau','67500','France','0123456789','john@doe.fr',NULL,0,16),
  (17,'John','Doe','1 rue de truc','Haguenau','67500','France','0123456789','john@doe.fr',NULL,0,17),
  (18,'John','Doe','1 rue de truc','Haguenau','67500','France','0123456789','john@doe.fr',NULL,0,18),
  (19,'John','Doe','1 rue de truc','Haguenau','67500','France','0123456789','john@doe.fr',NULL,0,19),
  (20,'John','Doe','1 rue de truc','Haguenau','67500','France','0123456789','john@doe.fr',NULL,0,20),
  (21,'John','Doe','1 rue de truc','Haguenau','67500','France','0123456789','john@doe.fr',NULL,0,21),
  (22,'John','Doe','1 rue de truc','Haguenau','67500','France','0123456789','john@doe.fr',NULL,0,22),
  (23,'John','Doe','1 rue de truc','Haguenau','67500','France','0123456789','john@doe.fr',NULL,0,23);
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `description` text,
  `clientId` int(11) NOT NULL,
  `purchasedHours` int(11) DEFAULT NULL,
  `remainingHours` int(11) DEFAULT NULL,
  `purchaseDate` date DEFAULT NULL,

  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_clientId` (`clientId`),
  CONSTRAINT `fk_clientId` FOREIGN KEY (`clientId`) REFERENCES `clients` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchases`
--

LOCK TABLES `purchases` WRITE;
/*!40000 ALTER TABLE `purchases` DISABLE KEYS */;
INSERT INTO `purchases` VALUES
  (1,'Maintenance','Gérer la maintenance',1,23,22,'2019-02-02'),
  (2,'Maintenance','Gérer la maintenance',2,23,21,'2019-02-02'),
  (3,'Maintenance','Gérer la maintenance',3,23,20,'2019-02-02'),
  (4,'Maintenance','Gérer la maintenance',4,23,19,'2019-02-02'),
  (5,'Maintenance','Gérer la maintenance',5,23,18,'2019-02-02'),
  (6,'Maintenance','Gérer la maintenance',6,23,17,'2019-02-02'),
  (7,'Maintenance','Gérer la maintenance',7,23,16,'2019-02-02'),
  (8,'Maintenance','Gérer la maintenance',8,23,15,'2019-02-02'),
  (9,'Maintenance','Gérer la maintenance',9,23,14,'2019-02-02'),
  (10,'Maintenance','Gérer la maintenance',10,23,13,'2019-02-02'),
  (11,'Maintenance','Gérer la maintenance',11,23,12,'2019-02-02'),
  (12,'Maintenance','Gérer la maintenance',12,23,11,'2019-02-02'),
  (13,'Maintenance','Gérer la maintenance',13,23,10,'2019-02-02'),
  (14,'Maintenance','Gérer la maintenance',14,23,9,'2019-02-02'),
  (15,'Maintenance','Gérer la maintenance',15,23,8,'2019-02-02'),
  (16,'Maintenance','Gérer la maintenance',16,23,7,'2019-02-02'),
  (17,'Maintenance','Gérer la maintenance',17,23,6,'2019-02-02'),
  (18,'Maintenance','Gérer la maintenance',18,23,5,'2019-02-02'),
  (19,'Maintenance','Gérer la maintenance',19,23,4,'2019-02-02'),
  (20,'Maintenance','Gérer la maintenance',20,23,3,'2019-02-02'),
  (21,'Maintenance','Gérer la maintenance',21,23,2,'2019-02-02'),
  (22,'Maintenance','Gérer la maintenance',22,23,1,'2019-02-02'),
  (23,'Maintenance','Gérer la maintenance',23,23,0,'2019-02-02');
/*!40000 ALTER TABLE `purchases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `detail` text,
  `creationDate` date DEFAULT NULL,
  `status` varchar(16) DEFAULT NULL,
  `beginningDate` datetime DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `purchaseId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_purchaseId` (`purchaseId`),
  CONSTRAINT `fk_purchaseId` FOREIGN KEY (`purchaseId`) REFERENCES `purchases` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES
  (1,'Site Web','Conception du site web','2019-02-18','paused','2019-02-20 14:45:55',1,1),
  (2,'Site Web','Conception du site web','2019-02-18','paused','2019-02-20 14:45:55',2,2),
  (3,'Site Web','Conception du site web','2019-02-18','paused','2019-02-20 14:45:55',3,3),
  (4,'Site Web','Conception du site web','2019-02-18','paused','2019-02-20 14:45:55',4,4),
  (5,'Site Web','Conception du site web','2019-02-18','paused','2019-02-20 14:45:55',5,5),
  (6,'Site Web','Conception du site web','2019-02-18','paused','2019-02-20 14:45:55',6,6),
  (7,'Site Web','Conception du site web','2019-02-18','paused','2019-02-20 14:45:55',7,7),
  (8,'Site Web','Conception du site web','2019-02-18','paused','2019-02-20 14:45:55',8,8),
  (9,'Site Web','Conception du site web','2019-02-18','paused','2019-02-20 14:45:55',9,9),
  (10,'Site Web','Conception du site web','2019-02-18','paused','2019-02-20 14:45:55',10,10),
  (11,'Site Web','Conception du site web','2019-02-18','paused','2019-02-20 14:45:55',11,11),
  (12,'Site Web','Conception du site web','2019-02-18','paused','2019-02-20 14:45:55',12,12),
  (13,'Site Web','Conception du site web','2019-02-18','paused','2019-02-20 14:45:55',13,13),
  (14,'Site Web','Conception du site web','2019-02-18','paused','2019-02-20 14:45:55',14,14),
  (15,'Site Web','Conception du site web','2019-02-18','paused','2019-02-20 14:45:55',15,15),
  (16,'Site Web','Conception du site web','2019-02-18','paused','2019-02-20 14:45:55',16,16),
  (17,'Site Web','Conception du site web','2019-02-18','paused','2019-02-20 14:45:55',17,17),
  (18,'Site Web','Conception du site web','2019-02-18','paused','2019-02-20 14:45:55',18,18),
  (19,'Site Web','Conception du site web','2019-02-18','paused','2019-02-20 14:45:55',19,19),
  (20,'Site Web','Conception du site web','2019-02-18','paused','2019-02-20 14:45:55',20,20),
  (21,'Site Web','Conception du site web','2019-02-18','paused','2019-02-20 14:45:55',21,21),
  (22,'Site Web','Conception du site web','2019-02-18','paused','2019-02-20 14:45:55',22,22),
  (23,'Site Web','Conception du site web','2019-02-18','paused','2019-02-20 14:45:55',23,23);
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `lastName` varchar(64) DEFAULT NULL,
  `firstName` varchar(64) DEFAULT NULL,
  `userType` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'demo','$2y$10$my3ES5EnvTN0//SXxmawlu0SPWlUwkujbopOdeutsErifnT0ZQESG','demo','demo',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-13 12:21:30
