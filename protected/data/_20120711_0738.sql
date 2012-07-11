-- MySQL dump 10.13  Distrib 5.1.34, for apple-darwin9.5.0 (i386)
--
-- Host: 192.168.5.103    Database: agros
-- ------------------------------------------------------
-- Server version	5.5.24-0ubuntu0.12.04.1

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
-- Current Database: `agros`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `agros` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `agros`;

--
-- Table structure for table `beneficio`
--

DROP TABLE IF EXISTS `beneficio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beneficio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entrada_aid` int(11) NOT NULL,
  `estatus_did` int(11) NOT NULL,
  `temporada_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `beneficio_entrada` (`entrada_aid`),
  KEY `beneficio_estatus` (`estatus_did`),
  KEY `beneficio_temporada` (`temporada_did`),
  CONSTRAINT `beneficio_entrada` FOREIGN KEY (`entrada_aid`) REFERENCES `entrada` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `beneficio_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `beneficio_temporada` FOREIGN KEY (`temporada_did`) REFERENCES `temporada` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beneficio`
--

LOCK TABLES `beneficio` WRITE;
/*!40000 ALTER TABLE `beneficio` DISABLE KEYS */;
/*!40000 ALTER TABLE `beneficio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beneficioDetalle`
--

DROP TABLE IF EXISTS `beneficioDetalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beneficioDetalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` double NOT NULL,
  `saldo` double NOT NULL,
  `clasificacion_aid` int(11) DEFAULT NULL,
  `calibre_aid` int(11) DEFAULT NULL,
  `unidad_did` int(11) NOT NULL,
  `beneficio_aid` int(11) NOT NULL,
  `estatus_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `beneficiodetalle_calibre` (`calibre_aid`),
  KEY `beneficiodetalle_clasificacion` (`clasificacion_aid`),
  KEY `beneficiodetalle_unidad` (`unidad_did`),
  KEY `beneficiodetalle_beneficio` (`beneficio_aid`),
  KEY `beneficiodetalle_estatus` (`estatus_did`),
  CONSTRAINT `beneficiodetalle_beneficio` FOREIGN KEY (`beneficio_aid`) REFERENCES `beneficio` (`id`),
  CONSTRAINT `beneficiodetalle_calibre` FOREIGN KEY (`calibre_aid`) REFERENCES `calibre` (`id`),
  CONSTRAINT `beneficiodetalle_clasificacion` FOREIGN KEY (`clasificacion_aid`) REFERENCES `clasificacion` (`id`),
  CONSTRAINT `beneficiodetalle_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`),
  CONSTRAINT `beneficiodetalle_unidad` FOREIGN KEY (`unidad_did`) REFERENCES `unidad` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beneficioDetalle`
--

LOCK TABLES `beneficioDetalle` WRITE;
/*!40000 ALTER TABLE `beneficioDetalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `beneficioDetalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calibre`
--

DROP TABLE IF EXISTS `calibre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calibre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `variedad_aid` int(11) NOT NULL,
  `estatus_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `calibre_estatus` (`estatus_did`),
  KEY `calibre_variedad` (`variedad_aid`),
  CONSTRAINT `calibre_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `calibre_variedad` FOREIGN KEY (`variedad_aid`) REFERENCES `variedad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calibre`
--

LOCK TABLES `calibre` WRITE;
/*!40000 ALTER TABLE `calibre` DISABLE KEYS */;
/*!40000 ALTER TABLE `calibre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clasificacion`
--

DROP TABLE IF EXISTS `clasificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clasificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(145) NOT NULL,
  `descripcion` varchar(245) DEFAULT NULL,
  `variedad_aid` int(11) NOT NULL,
  `estatus_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `clasificacion_variedad` (`variedad_aid`),
  KEY `clasificacion_estatus` (`estatus_did`),
  CONSTRAINT `clasificacion_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `clasificacion_variedad` FOREIGN KEY (`variedad_aid`) REFERENCES `variedad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clasificacion`
--

LOCK TABLES `clasificacion` WRITE;
/*!40000 ALTER TABLE `clasificacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `clasificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(145) NOT NULL,
  `apellidos` varchar(145) NOT NULL,
  `fechaNacimiento_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rfc` varchar(13) DEFAULT NULL,
  `razonSocial` varchar(145) DEFAULT NULL,
  `codigopostal` varchar(10) DEFAULT NULL,
  `calle` varchar(145) DEFAULT NULL,
  `colonia` varchar(145) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `celular` varchar(145) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `estado_did` int(11) NOT NULL,
  `municipio_aid` int(11) NOT NULL,
  `estatus_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cliente_estatus` (`estatus_did`),
  KEY `cliente_estado` (`estado_did`),
  KEY `cliente_municipio` (`municipio_aid`),
  CONSTRAINT `cliente_estado` FOREIGN KEY (`estado_did`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `cliente_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `cliente_municipio` FOREIGN KEY (`municipio_aid`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configuracion`
--

DROP TABLE IF EXISTS `configuracion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estatus_did` int(11) NOT NULL,
  `temporada_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `configuracion_estatus` (`estatus_did`),
  KEY `configuracion_temporada` (`temporada_did`),
  CONSTRAINT `configuracion_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`),
  CONSTRAINT `configuracion_temporada` FOREIGN KEY (`temporada_did`) REFERENCES `temporada` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configuracion`
--

LOCK TABLES `configuracion` WRITE;
/*!40000 ALTER TABLE `configuracion` DISABLE KEYS */;
/*!40000 ALTER TABLE `configuracion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datosFiscales`
--

DROP TABLE IF EXISTS `datosFiscales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datosFiscales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `valor` double NOT NULL,
  `estaus_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_datosFiscales_estatus` (`estaus_did`),
  CONSTRAINT `fk_datosFiscales_estatus` FOREIGN KEY (`estaus_did`) REFERENCES `estatus` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datosFiscales`
--

LOCK TABLES `datosFiscales` WRITE;
/*!40000 ALTER TABLE `datosFiscales` DISABLE KEYS */;
/*!40000 ALTER TABLE `datosFiscales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ejido`
--

DROP TABLE IF EXISTS `ejido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ejido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(145) NOT NULL,
  `municipio_did` int(11) NOT NULL,
  `estatus_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ejido_municipio` (`municipio_did`),
  KEY `ejido_estatus` (`estatus_did`),
  CONSTRAINT `ejido_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ejido_municipio` FOREIGN KEY (`municipio_did`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ejido`
--

LOCK TABLES `ejido` WRITE;
/*!40000 ALTER TABLE `ejido` DISABLE KEYS */;
INSERT INTO `ejido` VALUES (1,'Buenos Aires',2,1);
/*!40000 ALTER TABLE `ejido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entrada`
--

DROP TABLE IF EXISTS `entrada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entrada` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(11) NOT NULL,
  `fecha_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cosecha` varchar(145) DEFAULT NULL,
  `camion` varchar(145) DEFAULT NULL,
  `marca` varchar(145) DEFAULT NULL,
  `modelo` varchar(145) DEFAULT NULL,
  `placas` varchar(145) DEFAULT NULL,
  `conductor` varchar(145) DEFAULT NULL,
  `pesoBruto` double NOT NULL,
  `taraCamion` double NOT NULL,
  `pesoNeto` double NOT NULL,
  `impuresas` double NOT NULL,
  `pesoNetoAnalizado` double NOT NULL,
  `saldo` double NOT NULL,
  `cliente_aid` int(11) NOT NULL,
  `producto_did` int(11) NOT NULL,
  `variedad_aid` int(11) NOT NULL,
  `unidad_did` int(11) NOT NULL,
  `estado_did` int(11) NOT NULL,
  `municipio_aid` int(11) NOT NULL,
  `ejido_did` int(11) NOT NULL,
  `estatus_did` int(11) NOT NULL,
  `temporada_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo_UNIQUE` (`codigo`),
  KEY `entrada_producto` (`producto_did`),
  KEY `entrada_cliente` (`cliente_aid`),
  KEY `entrada_variedad` (`variedad_aid`),
  KEY `entrada_unidad` (`unidad_did`),
  KEY `entrada_estado` (`estado_did`),
  KEY `entrada_municpio` (`municipio_aid`),
  KEY `entrada_ejido` (`ejido_did`),
  KEY `entrada_estatus` (`estatus_did`),
  KEY `entrada_temporada` (`temporada_did`),
  CONSTRAINT `entrada_cliente` FOREIGN KEY (`cliente_aid`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `entrada_ejido` FOREIGN KEY (`ejido_did`) REFERENCES `ejido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `entrada_estado` FOREIGN KEY (`estado_did`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `entrada_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `entrada_municpio` FOREIGN KEY (`municipio_aid`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `entrada_producto` FOREIGN KEY (`producto_did`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `entrada_temporada` FOREIGN KEY (`temporada_did`) REFERENCES `temporada` (`id`),
  CONSTRAINT `entrada_unidad` FOREIGN KEY (`unidad_did`) REFERENCES `unidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `entrada_variedad` FOREIGN KEY (`variedad_aid`) REFERENCES `variedad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entrada`
--

LOCK TABLES `entrada` WRITE;
/*!40000 ALTER TABLE `entrada` DISABLE KEYS */;
/*!40000 ALTER TABLE `entrada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `estatus_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Estado_Estatus` (`estatus_did`),
  CONSTRAINT `Estado_Estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'Sinaloa',1);
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estatus`
--

DROP TABLE IF EXISTS `estatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estatus`
--

LOCK TABLES `estatus` WRITE;
/*!40000 ALTER TABLE `estatus` DISABLE KEYS */;
INSERT INTO `estatus` VALUES (1,'Activo'),(2,'Inactivo');
/*!40000 ALTER TABLE `estatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipio`
--

DROP TABLE IF EXISTS `municipio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `municipio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `estado_did` int(11) NOT NULL,
  `estatus_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `municipio_estado` (`estado_did`),
  KEY `municipio_estatus` (`estatus_did`),
  CONSTRAINT `municipio_estado` FOREIGN KEY (`estado_did`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `municipio_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipio`
--

LOCK TABLES `municipio` WRITE;
/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
INSERT INTO `municipio` VALUES (1,'Culiacán',1,1),(2,'Navolato',1,1),(3,'Ahome',1,1),(4,'Mazatlan',1,1);
/*!40000 ALTER TABLE `municipio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `precio`
--

DROP TABLE IF EXISTS `precio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `precio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor` double NOT NULL,
  `servicio_did` int(11) NOT NULL,
  `estatus_did` int(11) NOT NULL,
  `temporada_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `precio_servcio` (`servicio_did`),
  KEY `precio_temporada` (`temporada_did`),
  KEY `precio_estatus` (`estatus_did`),
  CONSTRAINT `precio_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`),
  CONSTRAINT `precio_servcio` FOREIGN KEY (`servicio_did`) REFERENCES `servicio` (`id`),
  CONSTRAINT `precio_temporada` FOREIGN KEY (`temporada_did`) REFERENCES `temporada` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `precio`
--

LOCK TABLES `precio` WRITE;
/*!40000 ALTER TABLE `precio` DISABLE KEYS */;
/*!40000 ALTER TABLE `precio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `variedad` tinyint(4) NOT NULL,
  `clasificacion` tinyint(4) NOT NULL,
  `calibre` tinyint(4) NOT NULL,
  `estatus_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `producto_estatus` (`estatus_did`),
  CONSTRAINT `producto_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'Garbanzo',1,0,1,1),(2,'Frijol',1,1,0,1);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salida`
--

DROP TABLE IF EXISTS `salida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salida` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigoSalida` varchar(255) NOT NULL,
  `fecha_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estatus_did` int(11) NOT NULL,
  `temporada_did` int(11) NOT NULL,
  `cliente_aid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `salida_estatus` (`estatus_did`),
  KEY `salida_temporada` (`temporada_did`),
  KEY `salida_cliente` (`cliente_aid`),
  CONSTRAINT `salida_cliente` FOREIGN KEY (`cliente_aid`) REFERENCES `cliente` (`id`),
  CONSTRAINT `salida_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`),
  CONSTRAINT `salida_temporada` FOREIGN KEY (`temporada_did`) REFERENCES `temporada` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salida`
--

LOCK TABLES `salida` WRITE;
/*!40000 ALTER TABLE `salida` DISABLE KEYS */;
/*!40000 ALTER TABLE `salida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salidaDetalle`
--

DROP TABLE IF EXISTS `salidaDetalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salidaDetalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` double NOT NULL,
  `producto_did` int(11) NOT NULL,
  `variedad_did` int(11) NOT NULL,
  `clasificacion_did` int(11) DEFAULT NULL,
  `calibre_did` int(11) DEFAULT NULL,
  `salida_did` int(11) NOT NULL,
  `estatus_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `salidaDetalle_estatus` (`estatus_did`),
  KEY `salidaDetalle_salida` (`salida_did`),
  KEY `salidaDetalle_calibre` (`calibre_did`),
  KEY `salidaDetalle_clasificacion` (`clasificacion_did`),
  KEY `salidaDetalle_variedad` (`variedad_did`),
  KEY `salidaDetalle_producto` (`producto_did`),
  CONSTRAINT `salidaDetalle_calibre` FOREIGN KEY (`calibre_did`) REFERENCES `calibre` (`id`),
  CONSTRAINT `salidaDetalle_clasificacion` FOREIGN KEY (`clasificacion_did`) REFERENCES `clasificacion` (`id`),
  CONSTRAINT `salidaDetalle_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`),
  CONSTRAINT `salidaDetalle_producto` FOREIGN KEY (`producto_did`) REFERENCES `producto` (`id`),
  CONSTRAINT `salidaDetalle_salida` FOREIGN KEY (`salida_did`) REFERENCES `salida` (`id`),
  CONSTRAINT `salidaDetalle_variedad` FOREIGN KEY (`variedad_did`) REFERENCES `variedad` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salidaDetalle`
--

LOCK TABLES `salidaDetalle` WRITE;
/*!40000 ALTER TABLE `salidaDetalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `salidaDetalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salidaDirecta`
--

DROP TABLE IF EXISTS `salidaDirecta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salidaDirecta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigoSalida` varchar(254) NOT NULL,
  `fecha_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entrada_aid` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `estatus_did` int(11) NOT NULL,
  `temporada_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `salidaDirecta_entrada` (`entrada_aid`),
  KEY `salidaDirecta_estatus` (`estatus_did`),
  KEY `salidaDirecta_temporada` (`temporada_did`),
  CONSTRAINT `salidaDirecta_entrada` FOREIGN KEY (`entrada_aid`) REFERENCES `entrada` (`id`),
  CONSTRAINT `salidaDirecta_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`),
  CONSTRAINT `salidaDirecta_temporada` FOREIGN KEY (`temporada_did`) REFERENCES `temporada` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salidaDirecta`
--

LOCK TABLES `salidaDirecta` WRITE;
/*!40000 ALTER TABLE `salidaDirecta` DISABLE KEYS */;
/*!40000 ALTER TABLE `salidaDirecta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicio`
--

DROP TABLE IF EXISTS `servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `estatus_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_servicio_estatus` (`estatus_did`),
  CONSTRAINT `fk_servicio_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicio`
--

LOCK TABLES `servicio` WRITE;
/*!40000 ALTER TABLE `servicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temporada`
--

DROP TABLE IF EXISTS `temporada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temporada` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `fechaIncial_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fechaFinal_f` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `estatus_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_temporada_estatus` (`estatus_did`),
  CONSTRAINT `fk_temporada_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temporada`
--

LOCK TABLES `temporada` WRITE;
/*!40000 ALTER TABLE `temporada` DISABLE KEYS */;
INSERT INTO `temporada` VALUES (1,'Temporada 2012','2012-01-01 07:00:00','2012-12-31 07:00:00',1);
/*!40000 ALTER TABLE `temporada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoUsuario`
--

DROP TABLE IF EXISTS `tipoUsuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoUsuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(145) NOT NULL,
  `estatus_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tipoUsuario_estatus` (`estatus_did`),
  CONSTRAINT `tipoUsuario_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoUsuario`
--

LOCK TABLES `tipoUsuario` WRITE;
/*!40000 ALTER TABLE `tipoUsuario` DISABLE KEYS */;
INSERT INTO `tipoUsuario` VALUES (1,'Administracion',1);
/*!40000 ALTER TABLE `tipoUsuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidad`
--

DROP TABLE IF EXISTS `unidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(145) NOT NULL,
  `equivalencia` double NOT NULL,
  `estatus_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `unidad_equivalencia` (`estatus_did`),
  CONSTRAINT `unidad_equivalencia` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad`
--

LOCK TABLES `unidad` WRITE;
/*!40000 ALTER TABLE `unidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `unidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `tipousuario_did` int(11) NOT NULL,
  `estatus_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario_UNIQUE` (`usuario`),
  KEY `usuario_tipousuario` (`tipousuario_did`),
  KEY `usuario_estatus` (`estatus_did`),
  CONSTRAINT `usuario_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuario_tipousuario` FOREIGN KEY (`tipousuario_did`) REFERENCES `tipoUsuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'francisco','123qwe',1,1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `variedad`
--

DROP TABLE IF EXISTS `variedad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `variedad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(145) NOT NULL,
  `producto_aid` int(11) NOT NULL,
  `estatus_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `variedad_producto` (`producto_aid`),
  KEY `variedad_estatus` (`estatus_did`),
  CONSTRAINT `variedad_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `variedad_producto` FOREIGN KEY (`producto_aid`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `variedad`
--

LOCK TABLES `variedad` WRITE;
/*!40000 ALTER TABLE `variedad` DISABLE KEYS */;
INSERT INTO `variedad` VALUES (1,'Azul',1,1);
/*!40000 ALTER TABLE `variedad` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-07-11 19:59:10
