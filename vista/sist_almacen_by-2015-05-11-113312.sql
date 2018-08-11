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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-11 11:33:12
