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
-- Table structure for table `calibre`
--

DROP TABLE IF EXISTS `calibre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calibre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `producto_did` int(11) NOT NULL,
  `variedad_did` int(11) NOT NULL,
  `estatus_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `calibre_estatus` (`estatus_did`),
  KEY `calibre_variedad` (`variedad_did`),
  KEY `calibre_producto` (`producto_did`),
  CONSTRAINT `calibre_producto` FOREIGN KEY (`producto_did`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `calibre_variedad` FOREIGN KEY (`variedad_did`) REFERENCES `variedad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `calibre_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `producto_did` int(11) NOT NULL,
  `variedad_did` int(11) NOT NULL,
  `estatus_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `clasificacion_estatus` (`estatus_did`),
  KEY `clasificacion_variedad` (`variedad_did`),
  KEY `clasificacion_producto` (`producto_did`),
  CONSTRAINT `clasificacion_variedad` FOREIGN KEY (`variedad_did`) REFERENCES `variedad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `clasificacion_producto` FOREIGN KEY (`producto_did`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `clasificacion_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='	';
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-07-13 19:21:29
