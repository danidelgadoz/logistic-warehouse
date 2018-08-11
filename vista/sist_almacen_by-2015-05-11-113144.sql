-- MySQL dump 10.13  Distrib 5.6.20, for Win32 (x86)
--
-- Host: localhost    Database: sist_almacen_by
-- ------------------------------------------------------
-- Server version	5.6.20-log

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
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area` (
  `idarea` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `area` varchar(20) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  PRIMARY KEY (`idarea`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` VALUES (1,'Logistica','Area destinada a la administracion de las cintas cinematogra'),(2,'Venta','Area dedicada al soporte de Ventas'),(3,'Compras','Area dedicada al soporte de Compras'),(4,'Recursos Humanos','Area dedicada a la gestion de Personal'),(5,'Sistemas','Area dedicada a la gestion de Sistemas');
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auditoria`
--

DROP TABLE IF EXISTS `auditoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auditoria` (
  `usuariolog` varchar(25) DEFAULT NULL,
  `idempleado` int(8) DEFAULT NULL,
  `cargolog` varchar(25) DEFAULT NULL,
  `iplog` varchar(18) DEFAULT NULL,
  `accionlog` varchar(30) DEFAULT NULL,
  `objetolog` varchar(35) DEFAULT NULL,
  `codmanipulado` varchar(25) NOT NULL,
  `horalog` varchar(12) DEFAULT NULL,
  `fechalog` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auditoria`
--

LOCK TABLES `auditoria` WRITE;
/*!40000 ALTER TABLE `auditoria` DISABLE KEYS */;
INSERT INTO `auditoria` VALUES ('bjose',14070001,'Administrador','190.234.254.79','Inicio','Sesion','Ninguno','20:51:05 pm','14/07/2014'),('bjose',14070001,'Administrador','190.234.254.79','Agrego','Nuevo Usuario','cyosi','20:51:10 pm','14/07/2014'),('bjose',14070001,'Administrador','190.234.254.79','Agrego','Nuevo Usuario','ddaniel','20:51:15 pm','14/07/2014'),('bjose',14070001,'Administrador','190.234.254.79','Agrego','Nuevo Usuario','bcarlos','20:51:20 pm','15/07/2014'),('bjose',14070001,'Administrador','190.234.254.79','Agrego','Nuevo Cliente','20429683581','20:53:12 pm','16/07/2014'),('bjose',14070001,'Administrador','190.234.254.79','Agrego','Nuevo Cliente','20337771085','20:53:41 pm','16/07/2014'),('bjose',14070001,'Administrador','190.234.254.79','Agrego','Nuevo Cliente','20388128748','20:53:45 pm','16/07/2014'),('bjose',14070001,'Administrador','190.234.254.79','Agrego','Nuevo Cliente','20522591344','20:53:54 pm','16/07/2014'),('bjose',14070001,'Administrador','190.234.254.79','Agrego','Nuevo Cliente','20494191637','20:53:56 pm','16/07/2014'),('bjose',14070001,'Administrador','190.234.254.79','Agrego','Nuevo Cliente','20508920696','20:53:59 pm','16/07/2014'),('bjose',14070001,'Administrador','190.234.254.79','Agrego','Nuevo Cliente','20133877615','20:54:05 pm','16/07/2014'),('bjose',14070001,'Administrador','190.234.254.79','Agrego','Nuevo Cliente','20504624391','20:54:49 pm','16/07/2014'),('bjose',14070001,'Administrador','190.234.254.79','Agrego','Nueva Pelicula','100-2013-000000','20:55:36 pm','19/07/2014'),('bjose',14070001,'Administrador','190.234.254.79','Agrego','Nueva Pelicula','200-2009-000001','20:55:49 pm','19/07/2014'),('bjose',14070001,'Administrador','190.234.254.79','Agrego','Nueva Pelicula','200-2011-000001','20:56:06 pm','19/07/2014'),('bjose',14070001,'Administrador','190.234.254.79','Agrego','Nueva Pelicula','200-2012-000001','20:56:45 pm','19/07/2014'),('bjose',14070001,'Administrador','190.234.254.79','Agrego','Nueva Pelicula','200-2013-000001','20:56:58 pm','19/07/2014'),('bjose',14070001,'Administrador','190.234.254.79','Agrego','Nueva Pelicula','400-1997-000001','20:57:05 pm','19/07/2014'),('bjose',14070001,'Administrador','190.234.254.79','Agrego','Nueva Pelicula','400-2010-000000','20:58:01 pm','19/07/2014'),('bjose',14070001,'Administrador','190.234.254.79','Agrego','Nueva Pelicula','500-2011-000000','20:58:19 pm','19/07/2014'),('bjose',14070001,'Administrador','190.234.254.79','Agrego','Nueva Pelicula','500-2012-000002','20:59:06 pm','21/07/2014'),('bjose',14070001,'Administrador','190.234.254.79','Agrego','Nueva Pelicula','500-2012-000003','21:00:09 pm','21/07/2014'),('bjose',14070001,'Administrador','190.234.254.79','Agrego','Nueva Pelicula','600-2003-000001','21:00:46 pm','21/07/2014'),('bjose',14070001,'Administrador','190.234.254.79','Agrego','Nueva Pelicula','600-2011-000001','21:02:45 pm','21/07/2014'),('bjose',14070001,'Administrador','190.234.254.79','Agrego','Nueva Pelicula','600-2014-000000','21:05:05 pm','21/07/2014'),('bjose',14070001,'Administrador','190.234.254.79','Agrego','Nueva Pelicula','900-2010-000001','21:06:04 pm','21/07/2014'),('bjose',14070001,'Administrador','190.234.254.79','Agrego','Nueva Pelicula','900-2010-000002','21:06:16 pm','21/07/2014'),('bjose',14070001,'Administrador','190.234.254.79','Agrego','Nueva Pelicula','900-2013-000001','21:07:27 pm','21/07/2014'),('bjose',14070001,'Administrador','190.234.149.7','Cerro','Sesion','Ninguno','21:36:14 pm','21/07/2014'),('bjose',14070001,'Administrador','190.12.77.19','Inicio','Sesion','Ninguno','18:23:15 pm','22/07/2014'),('bjose',14070001,'Administrador','190.12.77.19','Cerro','Sesion','Ninguno','18:48:45 pm','22/07/2014'),('bcarlos',14060001,'Operador','190.12.77.19','Inicio','Sesion','Ninguno','18:48:18 pm','22/07/2014'),('bcarlos',14060001,'Operador','190.12.77.19','Agrego','Movimiento Entrante','0700004','18:48:36 pm','22/07/2014'),('bcarlos',14060001,'Operador','190.12.77.19','Cerro','Sesion','Ninguno','18:49:45 pm','22/07/2014'),('bjose',14070001,'Administrador','190.12.77.19','Inicio','Sesion','Ninguno','18:49:08 pm','22/07/2014'),('bjose',14070001,'Administrador','190.12.77.19','Edito','Informacion de Usuario','bcarlos','18:50:04 pm','22/07/2014'),('bjose',14070001,'Administrador','190.12.77.19','Cerro','Sesion','Ninguno','18:50:47 pm','22/07/2014'),('bjose',14070001,'Administrador','190.12.77.19','Inicio','Sesion','Ninguno','18:51:08 pm','22/07/2014'),('bjose',14070001,'Administrador','190.12.77.19','Cerro','Sesion','Ninguno','20:22:28 pm','22/07/2014'),('cyosi',14050002,'Administrador','190.12.77.19','Inicio','Sesion','Ninguno','20:22:02 pm','22/07/2014'),('cyosi',14050002,'Administrador','190.12.77.19','Edito','Informacion de Usuario','bjose','20:23:44 pm','22/07/2014'),('cyosi',14050002,'Administrador','190.235.130.63','Inicio','Sesion','Ninguno','22:38:44 pm','22/07/2014'),('cyosi',14050002,'Administrador','190.235.130.63','Edito','Informacion de Usuario','qroxana','22:39:45 pm','22/07/2014'),('cyosi',14050002,'Administrador','190.235.130.63','Edito','Informacion de Usuario','bcarlos','22:39:55 pm','22/07/2014'),('cyosi',14050002,'Administrador','190.235.130.63','Edito','Informacion de Usuario','bjose','22:39:59 pm','22/07/2014'),('cyosi',14050002,'Administrador','190.235.130.63','Cerro','Sesion','Ninguno','22:41:00 pm','22/07/2014'),('bjose',14070001,'Administrador','190.235.130.63','Inicio','Sesion','Ninguno','22:41:09 pm','22/07/2014'),('bjose',14070001,'Administrador','190.235.130.63','Cerro','Sesion','Ninguno','22:43:10 pm','22/07/2014'),('bjose',14070001,'Administrador','190.235.130.63','Inicio','Sesion','Ninguno','22:43:23 pm','22/07/2014'),('cyosi',14050002,'Administrador','190.12.77.19','Elimino','Registro de Usuario','qroxana','17:03:34 pm','24/07/2014'),('cyosi',14050002,'Administrador','190.12.77.19','Cerro','Sesion','Ninguno','17:08:17 pm','24/07/2014'),('cyosi',14050002,'Administrador','190.12.77.19','Inicio','Sesion','Ninguno','17:08:56 pm','24/07/2014'),('cyosi',14050002,'Administrador','190.12.77.19','Edito','Informacion de Usuario','cyosi','17:09:17 pm','24/07/2014'),('cyosi',14050002,'Administrador','190.12.77.19','Edito','Informacion de Usuario','ddaniel','17:09:29 pm','24/07/2014'),('cyosi',14050002,'Administrador','190.12.77.19','Cerro','Sesion','Ninguno','17:09:35 pm','24/07/2014'),('ddaniel',14050003,'Operador','190.12.77.19','Inicio','Sesion','Ninguno','17:09:44 pm','24/07/2014'),('ddaniel',14050003,'Operador','190.12.77.19','Agrego','Movimiento Saliente','0700005','17:11:40 pm','24/07/2014'),('ddaniel',14050003,'Operador','190.12.77.19','Agrego','Movimiento Saliente','0700006','17:12:03 pm','24/07/2014'),('ddaniel',14050003,'Operador','190.12.77.19','Agrego','Movimiento Saliente','0700007','17:13:58 pm','24/07/2014'),('ddaniel',14050003,'Operador','190.12.77.19','Cerro','Sesion','Ninguno','17:14:09 pm','24/07/2014'),('cyosi',14050002,'Administrador','190.12.77.19','Inicio','Sesion','Ninguno','17:14:24 pm','24/07/2014'),('cyosi',14050002,'Administrador','190.12.77.19','Edito','Informacion de Usuario','ddaniel','17:16:00 pm','24/07/2014'),('cyosi',14050002,'Administrador','190.12.77.19','Cerro','Sesion','Ninguno','17:23:29 pm','24/07/2014'),('cyosi',14050002,'Administrador','190.12.77.19','Inicio','Sesion','Ninguno','17:23:44 pm','24/07/2014'),('cyosi',14050002,'Administrador','190.12.77.19','Cerro','Sesion','Ninguno','18:01:13 pm','24/07/2014'),('bcarlos',14060001,'Operador','190.12.77.19','Inicio','Sesion','Ninguno','18:01:21 pm','24/07/2014'),('bcarlos',14060001,'Operador','190.12.77.19','Cerro','Sesion','Ninguno','18:01:48 pm','24/07/2014'),('bjose',14070001,'Administrador','190.12.77.19','Inicio','Sesion','Ninguno','18:01:58 pm','24/07/2014'),('bjose',14070001,'Administrador','190.12.77.19','Edito','Informacion de Usuario','bcarlos','18:03:54 pm','24/07/2014'),('bjose',14070001,'Administrador','190.12.77.19','Cerro','Sesion','Ninguno','18:04:01 pm','24/07/2014'),('bjose',14070001,'Administrador','190.12.77.19','Inicio','Sesion','Ninguno','18:04:17 pm','24/07/2014'),('bjose',14070001,'Administrador','190.12.77.19','Edito','Informacion de Usuario','bcarlos','18:04:32 pm','24/07/2014'),('bjose',14070001,'Administrador','190.12.77.19','Cerro','Sesion','Ninguno','18:04:37 pm','24/07/2014'),('bcarlos',14060001,'Operador','190.12.77.19','Inicio','Sesion','Ninguno','18:04:45 pm','24/07/2014'),('bcarlos',14060001,'Operador','190.12.77.19','Cerro','Sesion','Ninguno','18:04:50 pm','24/07/2014'),('bjose',14070001,'Administrador','190.12.77.19','Inicio','Sesion','Ninguno','18:05:03 pm','24/07/2014'),('bjose',14070001,'Administrador','190.232.29.107','Inicio','Sesion','Ninguno','18:15:05 pm','13/04/2015'),('bjose',14070001,'Administrador','190.232.29.107','Cerro','Sesion','Ninguno','18:25:22 pm','13/04/2015'),('bjose',14070001,'Administrador','190.232.29.107','Inicio','Sesion','Ninguno','18:26:11 pm','13/04/2015'),('bjose',14070001,'Administrador','190.232.29.107','Cerro','Sesion','Ninguno','18:36:45 pm','13/04/2015'),('bjose',14070001,'Administrador','190.232.29.107','Inicio','Sesion','Ninguno','19:48:40 pm','13/04/2015'),('bjose',14070001,'Administrador','190.232.29.107','Cerro','Sesion','Ninguno','19:48:42 pm','13/04/2015'),('bjose',14070001,'Administrador','201.240.153.179','Inicio','Sesion','Ninguno','10:19:23 am','16/04/2015'),('bjose',14070001,'Administrador','201.240.153.179','Cerro','Sesion','Ninguno','10:42:05 am','16/04/2015'),('bjose',14070001,'Administrador','201.240.153.179','Inicio','Sesion','Ninguno','10:43:06 am','16/04/2015'),('bjose',14070001,'Administrador','201.240.153.179','Cerro','Sesion','Ninguno','10:43:09 am','16/04/2015'),('bjose',14070001,'Administrador','201.240.153.179','Inicio','Sesion','Ninguno','12:05:36 pm','16/04/2015'),('bjose',14070001,'Administrador','201.240.153.179','Inicio','Sesion','Ninguno','17:06:53 pm','16/04/2015'),('user2',0,'','201.240.153.179','Agrego','Nueva Pelicula','300-2015-000000','20:34:17 pm','16/04/2015'),('bjose',14070001,'Administrador','201.240.153.179','Inicio','Sesion','Ninguno','00:01:57 am','17/04/2015'),('bjose',14070001,'Administrador','201.240.153.179','Edito','Informacion de Pelicula','300-2015-000000','01:25:20 am','17/04/2015'),('bjose',14070001,'Administrador','181.65.96.251','Inicio','Sesion','Ninguno','11:15:03 am','17/04/2015'),('bjose',14070001,'Administrador','181.66.11.120','Inicio','Sesion','Ninguno','10:23:05 am','18/04/2015'),('bjose',14070001,'Administrador','181.66.11.120','Elimino','Registro de Pelicula','300-2015-000000','10:24:08 am','18/04/2015'),('bjose',14070001,'Administrador','181.66.11.120','Inicio','Sesion','Ninguno','12:57:06 pm','18/04/2015'),('bjose',14070001,'Administrador','200.60.152.1','Inicio','Sesion','Ninguno','09:53:42 am','11/05/2015'),('bjose',14070001,'Administrador','200.60.152.1','Edito','Informacion de Usuario','ddaniel','09:57:16 am','11/05/2015'),('bjose',14070001,'Administrador','200.60.152.1','Edito','Informacion de Usuario','cyosi','09:57:44 am','11/05/2015'),('bjose',14070001,'Administrador','200.60.152.1','Agrego','Nuevo Empleado','15050001','10:00:03 am','11/05/2015'),('bjose',14070001,'Administrador','200.60.152.1','Agrego','Nuevo Usuario','cdaniel','10:01:04 am','11/05/2015'),('cdaniel',15050001,'Operador','200.60.152.1','Inicio','Sesion','Ninguno','10:01:22 am','11/05/2015'),('cdaniel',15050001,'Operador','200.60.152.1','Cerro','Sesion','Ninguno','10:01:28 am','11/05/2015'),('bjose',14070001,'Administrador','200.60.152.1','Elimino','Registro de Usuario','bcarlos','10:02:39 am','11/05/2015'),('bjose',14070001,'Administrador','200.60.152.1','Edito','Informacion de Cliente','20504624391','10:03:16 am','11/05/2015'),('bjose',14070001,'Administrador','200.60.152.1','Edito','Informacion de Cliente','20504624391','10:03:50 am','11/05/2015'),('bjose',14070001,'Administrador','200.60.152.1','Agrego','Nuevo Cliente','123456789','10:05:05 am','11/05/2015'),('bjose',14070001,'Administrador','200.60.152.1','Elimino','Registro de Cliente','123456789','10:05:29 am','11/05/2015'),('bjose',14070001,'Administrador','200.60.152.1','Agrego','Nueva Pelicula','300-2015-000000','10:07:17 am','11/05/2015'),('bjose',14070001,'Administrador','200.60.152.1','Elimino','Registro de Pelicula','200-2011-000001','10:08:24 am','11/05/2015'),('ddaniel',14050003,'Administrador','200.60.152.1','Inicio','Sesion','Ninguno','10:08:38 am','11/05/2015'),('bjose',14070001,'Administrador','200.60.152.1','Cerro','Sesion','Ninguno','10:23:00 am','11/05/2015'),('cdaniel',15050001,'Operador','200.60.152.1','Inicio','Sesion','Ninguno','10:23:09 am','11/05/2015'),('cdaniel',15050001,'Operador','200.60.152.1','Agrego','Nueva Pelicula','500-2015-000000','10:25:38 am','11/05/2015'),('cdaniel',15050001,'Operador','200.60.152.1','Edito','Informacion de Pelicula','300-2015-000000','10:27:10 am','11/05/2015'),('cdaniel',15050001,'Operador','200.60.152.1','Agrego','Movimiento Entrante','0500001','10:27:23 am','11/05/2015'),('cdaniel',15050001,'Operador','200.60.152.1','Agrego','Movimiento Saliente','0500002','10:28:09 am','11/05/2015');
/*!40000 ALTER TABLE `auditoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo` (
  `idcargo` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `cargo` varchar(20) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  PRIMARY KEY (`idcargo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (1,'Gerente','Gerencia el area a su cargo'),(2,'Jefe','Encargado de supervisar su area'),(3,'Asistente','Personal de ayuda para el jefe de area'),(4,'Colaborador','Personal a disposicion del area');
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_movimiento`
--

DROP TABLE IF EXISTS `detalle_movimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_movimiento` (
  `stock` int(4) NOT NULL,
  `nromovimiento` varchar(5) NOT NULL,
  `codigopelicula` varchar(15) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_movimiento`
--

LOCK TABLES `detalle_movimiento` WRITE;
/*!40000 ALTER TABLE `detalle_movimiento` DISABLE KEYS */;
INSERT INTO `detalle_movimiento` VALUES (11,'06000','200-2012-000001',''),(6,'06000','200-2009-000001',''),(16,'06000','200-2012-000001',''),(16,'06000','200-2013-000001','');
/*!40000 ALTER TABLE `detalle_movimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleado` (
  `idempleado` int(7) unsigned NOT NULL,
  `nombres` varchar(60) NOT NULL,
  `apellidopat` varchar(30) NOT NULL,
  `apellidomat` varchar(30) NOT NULL,
  `dni` int(8) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `telefono1` int(9) NOT NULL,
  `telefono2` int(9) NOT NULL,
  `idarea` int(4) NOT NULL,
  `idcargo` int(4) NOT NULL,
  PRIMARY KEY (`idempleado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES (14050002,'Yosi','Cotrina','Molina',71693762,'casa',4250050,0,2,1),(14050003,'Daniel','Delgado','Diaz',99977777,'casa2',524938999,0,3,2),(14060001,'Carlos','Blanco','Gonzales',43036294,'Av. Militar 2314',4427121,0,5,3),(14060002,'Roxana','Quiroz','Valenzuela',12345678,'Av. Los Tulipanes 1234',987655442,0,5,2),(14070001,'Jose','Boy','Castilla',72440000,'Av. Luna Pizarro 921',998420801,0,5,1),(15050001,'Daniel','Carrion','Tenorio',48374645,'Jiron Manuel Villavicencio 975',987616415,0,1,2);
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genero`
--

DROP TABLE IF EXISTS `genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genero` (
  `idgenero` int(4) NOT NULL DEFAULT '0',
  `genero` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idgenero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genero`
--

LOCK TABLES `genero` WRITE;
/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` VALUES (1,'100','TERROR'),(2,'200','CIENCIA FICCION'),(3,'300','COMEDIA'),(4,'400','ROMANTICA'),(5,'500','ACCION'),(6,'600','AVENTURAS'),(7,'700','DOCUMENTALES'),(8,'800','BELICA'),(9,'900','INFANTIL'),(10,'1000','SUSPENSO');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movimiento`
--

DROP TABLE IF EXISTS `movimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movimiento` (
  `nromovimiento` varchar(10) NOT NULL,
  `tipomovimiento` varchar(20) NOT NULL,
  `fechmovimiento` varchar(10) NOT NULL,
  `horamovimiento` varchar(8) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `idproveedor` int(4) NOT NULL,
  `codigopelicula` varchar(15) NOT NULL,
  `stock` int(4) NOT NULL,
  PRIMARY KEY (`nromovimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimiento`
--

LOCK TABLES `movimiento` WRITE;
/*!40000 ALTER TABLE `movimiento` DISABLE KEYS */;
INSERT INTO `movimiento` VALUES ('0500001','Entrante','11/05/2015','10:26 am','cdaniel',1,'300-2015-000000',10),('0500002','Saliente','11/05/2015','10:27 am','cdaniel',3,'300-2015-000000',5),('0600001','Entrante','22/07/2014','23:59 pm','bjose',1,'200-2013-000001',16),('0600002','Entrante','23/07/2014','00:04 am','bjose',1,'200-2013-000001',11),('0600003','Entrante','23/07/2014','00:05 am','bjose',5,'200-2013-000001',21),('0600004','Saliente','23/07/2014','00:55 am','bjose',4,'400-1997-000001',14),('0600005','Entrante','23/07/2014','17:35 pm','bjose',6,'200-2012-000001',16),('0600006','Entrante','23/07/2014','17:37 pm','bjose',4,'600-2003-000001',13),('0600007','Saliente','18/07/2014','18:17 pm','bjose',1,'400-1997-000001',11),('0600008','Saliente','25/07/2014','18:17 pm','bjose',4,'200-2013-000001',20),('0600009','Entrante','24/07/2014','22:42 pm','bjose',5,'200-2009-000001',7),('0600010','Entrante','24/07/2014','22:45 pm','bjose',1,'200-2009-000001',11),('0600011','Entrante','24/07/2014','22:53 pm','bjose',1,'200-2012-000001',4),('0600012','Entrante','24/07/2014','22:57 pm','bjose',1,'200-2012-000001',14),('0600013','Saliente','24/07/2014','22:57 pm','bjose',1,'200-2012-000001',1),('0600014','Entrante','24/07/2014','23:19 pm','bjose',1,'200-2009-000001',2),('0600015','Saliente','24/07/2014','23:20 pm','bjose',1,'200-2009-000001',11),('0600016','Entrante','24/07/2014','23:21 pm','bjose',1,'200-2009-000001',2),('0600017','Saliente','24/07/2014','23:21 pm','cyosi',1,'200-2009-000001',4),('0600018','Entrante','24/07/2014','23:21 pm','cyosi',7,'200-2009-000001',20),('0600019','Entrante','24/07/2014','23:31 pm','cyosi',1,'200-2011-000001',10),('0600020','Entrante','25/07/2014','17:52 pm','cyosi',1,'200-2009-000001',5),('0600021','Entrante','03/07/2014','17:50 pm','cyosi',3,'100-2013-000000',15),('0600022','Saliente','26/07/2014','17:51 pm','cyosi',5,'100-2013-000000',9),('0600023','Saliente','02/07/2014','17:52 pm','cyosi',3,'100-2013-000000',15),('0600024','Saliente','05/07/2014','17:54 pm','cyosi',1,'100-2013-000000',5),('0600025','Saliente','07/07/2014','17:56 pm','cyosi',4,'100-2013-000000',6),('0600026','Saliente','01/07/2014','17:58 pm','cyosi',6,'400-2010-000000',6),('0600027','Saliente','14/07/2014','17:59 pm','cyosi',7,'400-2010-000000',4),('0600028','Saliente','04/07/2014','18:00 pm','cyosi',1,'500-2011-000000',15),('0600029','Entrante','17/07/2014','18:02 pm','admin',1,'500-2011-000000',6),('0600030','Saliente','11/07/2014','18:05 pm','admin',1,'200-2013-000001',16),('0600031','Entrante','26/07/2014','18:21 pm','admin',1,'600-2014-000000',5),('0600032','Entrante','26/07/2014','18:13 pm','admin',1,'200-2009-000001',1),('0600033','Entrante','28/07/2014','20:59 pm','admin',1,'100-2013-000000',200),('0600034','Saliente','28/07/2014','21:31 pm','admin',1,'100-2013-000000',5),('0600035','Entrante','28/07/2014','21:32 pm','admin',1,'100-2013-000000',5),('0600036','Saliente','27/07/2014','21:08 pm','admin',1,'400-1997-000001',5),('0600037','Entrante','29/07/2014','21:59 pm','admin',1,'100-2013-000000',1),('0600038','Saliente','29/07/2014','22:02 pm','admin',1,'100-2013-000000',1),('0600039','Entrante','30/07/2014','01:03 am','admin',1,'100-2013-000000',5),('0600040','Entrante','30/07/2014','23:35 pm','admin',1,'200-2009-000001',4),('0600041','Entrante','30/07/2014','23:36 pm','admin',1,'200-2009-000001',3),('0600042','Saliente','30/07/2014','23:37 pm','admin',1,'200-2009-000001',5),('0700001','Entrante','01/07/2014','22:30 pm','ddaniel',1,'100-2131-000000',5),('0700002','Entrante','01/07/2014','23:24 pm','ddaniel',1,'200-2009-000001',1),('0700003','Entrante','01/07/2014','23:24 pm','ddaniel',1,'100-2013-000000',5),('0700004','Entrante','22/07/2014','18:48 pm','bcarlos',1,'200-2009-000001',5),('0700005','Saliente','24/07/2014','17:11 pm','ddaniel',1,'100-2013-000000',15),('0700006','Saliente','24/07/2014','17:11 pm','ddaniel',2,'200-2011-000001',12),('0700007','Saliente','24/07/2014','17:12 pm','ddaniel',1,'500-2012-000002',5);
/*!40000 ALTER TABLE `movimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelicula`
--

DROP TABLE IF EXISTS `pelicula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pelicula` (
  `codigopelicula` varchar(15) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `sinopsis` varchar(200) DEFAULT NULL,
  `director` varchar(25) NOT NULL,
  `idproductora` int(4) NOT NULL,
  `stock` int(4) NOT NULL,
  `stockini` int(4) NOT NULL,
  `preciounit` int(4) NOT NULL,
  `idgenero` int(4) NOT NULL,
  `anho` int(4) NOT NULL,
  `nromovimiento` varchar(10) NOT NULL,
  PRIMARY KEY (`codigopelicula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelicula`
--

LOCK TABLES `pelicula` WRITE;
/*!40000 ALTER TABLE `pelicula` DISABLE KEYS */;
INSERT INTO `pelicula` VALUES ('100-2013-000000','EL CONJURO','EL ARGUMENTO ESTA BASADO EN UN CASO REAL QUE TUVO LUGAR EN UNA GRANJA, EN DONDE UNA FAMILIA EMPIEZA A SER TESTIGO DE FENÃ³MENOS PARANORMALES.','JAMES WAN ',1,20,40,170,100,2013,'0700005'),('200-2009-000001','AVATAR','AMBIENTADA EN EL AÃ‘O 2154, LOS ACONTECIMIENTOS QUE NARRA SE DESARROLLAN EN PANDORA.','JAMES CAMERON',7,39,40,240,200,2009,'0700004'),('200-2012-000001','THE AVENGERS','DURANTE SU EXILIO, LOKI SE ALÃA CON UNA HOSTIL RAZA ALIENÃƒÂ­GENA CONOCIDA COMO CHITAURI Y LES PIDIÃƒÂ³ QUE LE AYUDARAN A INVADIR LA TIERRA A CAMBIO DEL TESSERACTO.','JOSS WHEDON',6,1,5,518,200,2012,'0600013'),('200-2013-000001','IRON MAN 3','SEIS MESES DESPUÃ‰S DE LOS ACONTECIMIENTOS DE LOS VENGADORES, UN FRECUENTADO TONY STARK HA CONSTRUIDO OBSESIVAMENTE VARIOS TRAJES DE IRON MAN EN SU MANSIÃ“N.','SHANE BLACK',7,4,10,215,200,2013,'0600030'),('300-2015-000000','ASU MARE 2','RELATO DE LA VIDA DE CARLOS DE CARLOS ALCANTARA Y SU MADRE, ORIENTADA A LA COMEDIA','CARLOS ALCANTARA',1,5,20,500,100,2015,'0500002'),('400-1997-000001','TITANIC','RELATA LA RELACIÃƒÂ³N DE JACK DAWSON Y ROSE DEWITT BUKATER, DOS JÃ“VENES QUE SE CONOCEN Y SE ENAMORAN A BORDO DEL TRANSATLÃNTICO RMS TITANIC','JAMES CAMERON',8,6,15,342,400,1997,'0600036'),('400-2010-000000','3 METROS SOBRE EL CIELO','ESTA ES LA CRONICA DE UN AMOR INICIALMENTE IMPOSIBLE QUE ARRASTRARA A AMBOS A UN FRENETICO VIAJE INICIATICO A TRAVES DEL CUAL DESCUBRIRAN EL AMOR.','FERNANDO GONZALEZ MOLINA',1,15,20,80,400,2010,'0600027'),('500-2011-000000','CAPITAN AMERICA:EL PRIMER VENGADOR','ES UNA PELICULA BASADA EN EL SUPERHÃ©ROE DE MARVEL COMICS, EL CAPITAN ÃMERICA.','JOE JOHNSTON',10,21,25,120,500,2011,'0600029'),('500-2012-000002','SKYFALL 007','SE CENTRA EN LA INVESTIGACIÃ“N DE UN ATAQUE A LA BASE DEL MI6, SE DESCUBRE QUE EL ATAQUE ES UN COMPLOT POR EL EX-AGENTE DEL MI6 RAOUL SILVA PARA HUMILLAR, DESACREDITAR Y MATAR A M COMO UNA VENGANZA.','SAM MENDEZ',2,47,60,348,500,2012,'0700007'),('500-2012-000003','THE DARK KNIGHT RISES','OCHO AÃ‘OS DESPUÃ‰S DE LOS ACONTECIMIENTOS DE GOTHAM SE ENCUENTRA EN UN ESTADO DE PAZ. EN VIRTUD DE LOS PODERES OTORGADOS POR LA LEY DENT, EL COMISIONADO GORDON CASI HA ERRADICADO EL CRIMEN.','CHRISTOPHER NOLAN',10,0,10,881,500,2012,''),('500-2015-000000','RAPIDOS Y FURIOSOS 7','SEPTIMA ENTREGA DE LA SAGA','ROBERT MAQUENSY',10,0,50,500,500,2015,''),('600-2003-000001','EL SEÃ±OR DE LOS ANILLOS: EL RETORNO DEL REY','TRATA SOBRE LA ULTIMA PARTE DEL VIAJE QUE EMPRENDIERON LOS NUEVE COMPAÃ‘EROS (DE LOS CUALES QUEDAN SOLAMENTE OCHO) PARA SALVAR A LA TIERRA MEDIA DE LA OSCURIDAD IMPUESTA POR SAURON.','PETER JACKSON',6,13,18,119,600,2003,'0600006'),('600-2011-000001','HARRY POTTER Y LAS RELIQUIAS DE LA MUERTE - PARTE 2','TRAS HUIR DE LOS MORTÃÂ­FAGOS VIAJANDO POR INGLATERRA, Y LUEGO DE ENCONTRAR Y DESTRUIR UN HORROCRUX, HARRY Y SUS AMIGOS RON Y HERMIONE DESCUBREN QUE UNO ESTÃ EN HOGWARTS.','DAVID YATES',5,0,12,328,600,2011,''),('600-2014-000000','MALEFICA','MALEFICA ES LA VILLANA DE LA VERSION DE DISNEY DEL CUENTO LA BELLA DURMIENTE, LA BRUJA MALVADA QUE APARECE EN LA ADAPTACION DE LA BELLA DURMIENTE.','MARC DAVIS',4,25,30,200,900,2014,'0600031'),('900-2010-000001','TOY STORY 3','ANDY, SE PREPARA PARA IR A LA UNIVERSIDAD. WOODY, BUZZ LIGHTYEAR Y EL RESTO DE LOS JUGUETES SE PREOCUPAN POR UN FUTURO INCIERTO PUESTO QUE DEBEN ACEPTAR LA DOLOROSA REALIDAD DE LA SOLEDAD.','LEE UNKRICH',3,0,25,943,900,2010,''),('900-2010-000002','ALICIA EN EL PAÃ­S DE LAS MARAVILLAS','HAN PASADO TRECE AÃ±OS DESDE QUE ALICIA VISITO EL PAIÂ­S DE LAS MARAVILLAS. AHORA TIENE 19 AÃ‘OS Y ESTÃ A PUNTO DE COMPROMETERSE CON HAYMITCH, UN LORD INGLÃ‰S, ALGO QUE NO DESEA.','TIM BURTON',2,0,8,299,600,2010,''),('900-2013-000001','FROZEN','ELSA, PRINCESA DE ARENDELLE, POSEE LA HABILIDAD MÃGICA DE CREAR HIELO Y NIEVE','CHRIS BUCK',4,0,10,206,900,2013,'');
/*!40000 ALTER TABLE `pelicula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil` (
  `idperfil` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `perfil` varchar(60) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  PRIMARY KEY (`idperfil`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES (1,'Administrador','Administra el sistema, puede realizar cualquier cambio'),(2,'Recursos Humanos','Registrar nuevos nuevos empleados y usuarios al sistema'),(3,'Operador','Veridica el kardex y realiza actividades de almacenero');
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto_proveedor`
--

DROP TABLE IF EXISTS `producto_proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto_proveedor` (
  `garantia` int(4) NOT NULL,
  `idproveedor` int(4) NOT NULL,
  `codigoproducto` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto_proveedor`
--

LOCK TABLES `producto_proveedor` WRITE;
/*!40000 ALTER TABLE `producto_proveedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto_proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productora`
--

DROP TABLE IF EXISTS `productora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productora` (
  `idproductora` int(4) NOT NULL DEFAULT '0',
  `nombrep` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`idproductora`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productora`
--

LOCK TABLES `productora` WRITE;
/*!40000 ALTER TABLE `productora` DISABLE KEYS */;
INSERT INTO `productora` VALUES (1,'TOUCHTONES HOME ENTRETAINMENT'),(2,'NEW LINE CINEMA'),(3,'DISNEY PIXAR'),(4,'WALT DISNEY PICTURES'),(5,'DREANWORKS PICTURES'),(6,'COLUMBIA PICTURES'),(7,'PARAMOUNT PICTURES'),(8,'UNIVERSAL PICTURES'),(9,'20TH CENTURY FOX'),(10,'WARNER BROS'),(11,'OTRO');
/*!40000 ALTER TABLE `productora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor` (
  `idproveedor` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `nombrec` varchar(60) NOT NULL,
  `razonsocial` varchar(60) NOT NULL,
  `rubro` varchar(60) NOT NULL,
  `ruc` varchar(11) NOT NULL,
  `nrolicencia` varchar(20) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `pais` varchar(25) NOT NULL,
  `provincia` varchar(25) NOT NULL,
  `codigopostal` int(5) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `email` varchar(60) NOT NULL,
  `site` varchar(60) NOT NULL,
  PRIMARY KEY (`idproveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES (1,'CINEPLANET','CINEPLEX S.A.','EXHIBICION DE FILMES Y VIDEO','20429683581','92123','AV. PASEO DE LA REPUBLICA S/N','LIMA','CERCADO DE LIMA',1,'6210510','GERENCIA@CINEPLANET.COM.PE','HTTP://WWW.CINEPLANET.COM.PE'),(2,'CINEMARK','CINEMARK DEL PERU S.R.L.','EXHIBICION DE FILMES Y VIDEO','20337771085','95123','AV. JAVIER PRADO ESTE 4200','LIMA','SANTIAGO DE SURCO',33,'4373707','HCARDENAS@CINEMARK.COM.PE','HTTP://WWW.CINEMARK.COM.PE'),(3,'UVK','UVK MULTICINES LARCO S.A.','EXHIBICION DE FILMES Y VIDEO','20388128748','89123','CALLE MONTERREY 258','LIMA','SANTIAGO DE SURCO',33,'3722700','MUBILLUS@UVKCINE,COM.PE','HTTP://WWW.UVKMULTICINES.COM'),(4,'CINEPOLIS','OPERADORA PERUANA DE CINES S.A.C.','EXHIBICION DE FILMES Y VIDEO','20522591344','12123','AV. VICTOR ANDRES BELAUNDE 214','LIMA','SAN ISIDRO',27,'6283607','HTTP://WWW.CINEPOLIS.COM.PE','GENERAL@CINEPOLIS.COM.PE'),(5,'CINERAMA','PENTARAMA INVERSIONES S.A.','EXHIBICION DE FILMES Y VIDEO','20494191637','56123','AV. JOSE PARDO 121','LIMA','MIRAFLORES',18,'4251917','GERENCIA@CINERAMA.COM.PE','HTTP://WWW,CINERAMA.COM,PE'),(6,'MULTICINES PLAZA','CENTRO COMERCIAL PLAZA JESUS MARIA S.A.C.','EXHIBICION DE FILMES Y VIDEO','20508920696','45123','AV. GENERAL GARZON 1300','LIMA','JESUS MARIA',11,'3306721','GERENCIACINE@MULTICINE.COM.PE','HTTP://WWW.MULTICINESPLAZAJESUSMARIA.COM'),(7,'MOVIE TIME','TOP RANK PUBLICIDAD S.R.L.','EXHIBICION DE FILMES Y VIDEO','20133877615','85123','AV. BENAVIDES 4981','LIMA','SANTIAGO DE SURCO',33,'2754679','GERENCIA@TOPRANK.COM.PE','HTTP://WWW.MOVIETIME.COM.PE'),(8,'CINE STAR','CINE STAR S.R.L.','EXHIBICION DE FILMES Y VIDEO','20504624391','65123','JR. IQUIQUE 315','LIMA','BREÃ‘A',5,'3422119','CEO@CINESTAR.COM.PE','HTTP://WWW.CINESTAR.COM.PE');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `usuario` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `estado` varchar(1) NOT NULL DEFAULT 'A',
  `idempleado` int(4) NOT NULL,
  `idperfil` int(4) NOT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('bjose','123456','A',14070001,1),('cdaniel','123456','A',15050001,3),('cyosi','123456789','I',14050002,3),('ddaniel','123456','A',14050003,1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-11 11:31:44
