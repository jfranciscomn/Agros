-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.49-3


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema agros
--

CREATE DATABASE IF NOT EXISTS agros;
USE agros;

--
-- Definition of table `agros`.`beneficio`
--

DROP TABLE IF EXISTS `agros`.`beneficio`;
CREATE TABLE  `agros`.`beneficio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entrada_aid` int(11) NOT NULL,
  `estatus_did` int(11) NOT NULL,
  `temporada_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `beneficio_entrada` (`entrada_aid`),
  KEY `beneficio_estatus` (`estatus_did`),
  KEY `beneficio_temporada` (`temporada_did`),
  CONSTRAINT `beneficio_temporada` FOREIGN KEY (`temporada_did`) REFERENCES `temporada` (`id`),
  CONSTRAINT `beneficio_entrada` FOREIGN KEY (`entrada_aid`) REFERENCES `entrada` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `beneficio_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agros`.`beneficio`
--

/*!40000 ALTER TABLE `beneficio` DISABLE KEYS */;
LOCK TABLES `beneficio` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `beneficio` ENABLE KEYS */;


--
-- Definition of table `agros`.`beneficioDetalle`
--

DROP TABLE IF EXISTS `agros`.`beneficioDetalle`;
CREATE TABLE  `agros`.`beneficioDetalle` (
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
  CONSTRAINT `beneficiodetalle_calibre` FOREIGN KEY (`calibre_aid`) REFERENCES `calibre` (`id`),
  CONSTRAINT `beneficiodetalle_clasificacion` FOREIGN KEY (`clasificacion_aid`) REFERENCES `clasificacion` (`id`),
  CONSTRAINT `beneficiodetalle_unidad` FOREIGN KEY (`unidad_did`) REFERENCES `unidad` (`id`),
  CONSTRAINT `beneficiodetalle_beneficio` FOREIGN KEY (`beneficio_aid`) REFERENCES `beneficio` (`id`),
  CONSTRAINT `beneficiodetalle_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agros`.`beneficioDetalle`
--

/*!40000 ALTER TABLE `beneficioDetalle` DISABLE KEYS */;
LOCK TABLES `beneficioDetalle` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `beneficioDetalle` ENABLE KEYS */;


--
-- Definition of table `agros`.`calibre`
--

DROP TABLE IF EXISTS `agros`.`calibre`;
CREATE TABLE  `agros`.`calibre` (
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

--
-- Dumping data for table `agros`.`calibre`
--

/*!40000 ALTER TABLE `calibre` DISABLE KEYS */;
LOCK TABLES `calibre` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `calibre` ENABLE KEYS */;


--
-- Definition of table `agros`.`clasificacion`
--

DROP TABLE IF EXISTS `agros`.`clasificacion`;
CREATE TABLE  `agros`.`clasificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(145) NOT NULL,
  `descripcion` varchar(245) DEFAULT NULL,
  `variedad_aid` int(11) NOT NULL,
  `estatus_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `clasificacion_variedad` (`variedad_aid`),
  KEY `clasificacion_estatus` (`estatus_did`),
  CONSTRAINT `clasificacion_variedad` FOREIGN KEY (`variedad_aid`) REFERENCES `variedad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `clasificacion_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='	';

--
-- Dumping data for table `agros`.`clasificacion`
--

/*!40000 ALTER TABLE `clasificacion` DISABLE KEYS */;
LOCK TABLES `clasificacion` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `clasificacion` ENABLE KEYS */;


--
-- Definition of table `agros`.`cliente`
--

DROP TABLE IF EXISTS `agros`.`cliente`;
CREATE TABLE  `agros`.`cliente` (
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

--
-- Dumping data for table `agros`.`cliente`
--

/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
LOCK TABLES `cliente` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


--
-- Definition of table `agros`.`configuracion`
--

DROP TABLE IF EXISTS `agros`.`configuracion`;
CREATE TABLE  `agros`.`configuracion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estatus_did` int(11) NOT NULL,
  `temporada_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `configuracion_estatus` (`estatus_did`),
  KEY `configuracion_temporada` (`temporada_did`),
  CONSTRAINT `configuracion_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`),
  CONSTRAINT `configuracion_temporada` FOREIGN KEY (`temporada_did`) REFERENCES `temporada` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agros`.`configuracion`
--

/*!40000 ALTER TABLE `configuracion` DISABLE KEYS */;
LOCK TABLES `configuracion` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `configuracion` ENABLE KEYS */;


--
-- Definition of table `agros`.`datosFiscales`
--

DROP TABLE IF EXISTS `agros`.`datosFiscales`;
CREATE TABLE  `agros`.`datosFiscales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `valor` double NOT NULL,
  `estaus_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_datosFiscales_estatus` (`estaus_did`),
  CONSTRAINT `fk_datosFiscales_estatus` FOREIGN KEY (`estaus_did`) REFERENCES `estatus` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agros`.`datosFiscales`
--

/*!40000 ALTER TABLE `datosFiscales` DISABLE KEYS */;
LOCK TABLES `datosFiscales` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `datosFiscales` ENABLE KEYS */;


--
-- Definition of table `agros`.`ejido`
--

DROP TABLE IF EXISTS `agros`.`ejido`;
CREATE TABLE  `agros`.`ejido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(145) NOT NULL,
  `municipio_did` int(11) NOT NULL,
  `estatus_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ejido_municipio` (`municipio_did`),
  KEY `ejido_estatus` (`estatus_did`),
  CONSTRAINT `ejido_municipio` FOREIGN KEY (`municipio_did`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ejido_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agros`.`ejido`
--

/*!40000 ALTER TABLE `ejido` DISABLE KEYS */;
LOCK TABLES `ejido` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `ejido` ENABLE KEYS */;


--
-- Definition of table `agros`.`entrada`
--

DROP TABLE IF EXISTS `agros`.`entrada`;
CREATE TABLE  `agros`.`entrada` (
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
  CONSTRAINT `entrada_temporada` FOREIGN KEY (`temporada_did`) REFERENCES `temporada` (`id`),
  CONSTRAINT `entrada_cliente` FOREIGN KEY (`cliente_aid`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `entrada_ejido` FOREIGN KEY (`ejido_did`) REFERENCES `ejido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `entrada_estado` FOREIGN KEY (`estado_did`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `entrada_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `entrada_municpio` FOREIGN KEY (`municipio_aid`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `entrada_producto` FOREIGN KEY (`producto_did`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `entrada_unidad` FOREIGN KEY (`unidad_did`) REFERENCES `unidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `entrada_variedad` FOREIGN KEY (`variedad_aid`) REFERENCES `variedad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agros`.`entrada`
--

/*!40000 ALTER TABLE `entrada` DISABLE KEYS */;
LOCK TABLES `entrada` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `entrada` ENABLE KEYS */;


--
-- Definition of table `agros`.`estado`
--

DROP TABLE IF EXISTS `agros`.`estado`;
CREATE TABLE  `agros`.`estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `estatus_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Estado_Estatus` (`estatus_did`),
  CONSTRAINT `Estado_Estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agros`.`estado`
--

/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
LOCK TABLES `estado` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;


--
-- Definition of table `agros`.`estatus`
--

DROP TABLE IF EXISTS `agros`.`estatus`;
CREATE TABLE  `agros`.`estatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agros`.`estatus`
--

/*!40000 ALTER TABLE `estatus` DISABLE KEYS */;
LOCK TABLES `estatus` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `estatus` ENABLE KEYS */;


--
-- Definition of table `agros`.`municipio`
--

DROP TABLE IF EXISTS `agros`.`municipio`;
CREATE TABLE  `agros`.`municipio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `estado_did` int(11) NOT NULL,
  `estatus_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `municipio_estado` (`estado_did`),
  KEY `municipio_estatus` (`estatus_did`),
  CONSTRAINT `municipio_estado` FOREIGN KEY (`estado_did`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `municipio_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agros`.`municipio`
--

/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
LOCK TABLES `municipio` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `municipio` ENABLE KEYS */;


--
-- Definition of table `agros`.`precio`
--

DROP TABLE IF EXISTS `agros`.`precio`;
CREATE TABLE  `agros`.`precio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor` double NOT NULL,
  `servicio_did` int(11) NOT NULL,
  `estatus_did` int(11) NOT NULL,
  `temporada_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `precio_servcio` (`servicio_did`),
  KEY `precio_temporada` (`temporada_did`),
  KEY `precio_estatus` (`estatus_did`),
  CONSTRAINT `precio_servcio` FOREIGN KEY (`servicio_did`) REFERENCES `servicio` (`id`),
  CONSTRAINT `precio_temporada` FOREIGN KEY (`temporada_did`) REFERENCES `temporada` (`id`),
  CONSTRAINT `precio_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agros`.`precio`
--

/*!40000 ALTER TABLE `precio` DISABLE KEYS */;
LOCK TABLES `precio` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `precio` ENABLE KEYS */;


--
-- Definition of table `agros`.`producto`
--

DROP TABLE IF EXISTS `agros`.`producto`;
CREATE TABLE  `agros`.`producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `variedad` bit(1) NOT NULL,
  `clasificacion` bit(1) NOT NULL,
  `calibre` bit(1) NOT NULL,
  `estatus_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `producto_estatus` (`estatus_did`),
  CONSTRAINT `producto_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agros`.`producto`
--

/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
LOCK TABLES `producto` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;


--
-- Definition of table `agros`.`salida`
--

DROP TABLE IF EXISTS `agros`.`salida`;
CREATE TABLE  `agros`.`salida` (
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

--
-- Dumping data for table `agros`.`salida`
--

/*!40000 ALTER TABLE `salida` DISABLE KEYS */;
LOCK TABLES `salida` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `salida` ENABLE KEYS */;


--
-- Definition of table `agros`.`salidaDetalle`
--

DROP TABLE IF EXISTS `agros`.`salidaDetalle`;
CREATE TABLE  `agros`.`salidaDetalle` (
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
  CONSTRAINT `salidaDetalle_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`),
  CONSTRAINT `salidaDetalle_salida` FOREIGN KEY (`salida_did`) REFERENCES `salida` (`id`),
  CONSTRAINT `salidaDetalle_calibre` FOREIGN KEY (`calibre_did`) REFERENCES `calibre` (`id`),
  CONSTRAINT `salidaDetalle_clasificacion` FOREIGN KEY (`clasificacion_did`) REFERENCES `clasificacion` (`id`),
  CONSTRAINT `salidaDetalle_variedad` FOREIGN KEY (`variedad_did`) REFERENCES `variedad` (`id`),
  CONSTRAINT `salidaDetalle_producto` FOREIGN KEY (`producto_did`) REFERENCES `producto` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agros`.`salidaDetalle`
--

/*!40000 ALTER TABLE `salidaDetalle` DISABLE KEYS */;
LOCK TABLES `salidaDetalle` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `salidaDetalle` ENABLE KEYS */;


--
-- Definition of table `agros`.`salidaDirecta`
--

DROP TABLE IF EXISTS `agros`.`salidaDirecta`;
CREATE TABLE  `agros`.`salidaDirecta` (
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

--
-- Dumping data for table `agros`.`salidaDirecta`
--

/*!40000 ALTER TABLE `salidaDirecta` DISABLE KEYS */;
LOCK TABLES `salidaDirecta` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `salidaDirecta` ENABLE KEYS */;


--
-- Definition of table `agros`.`servicio`
--

DROP TABLE IF EXISTS `agros`.`servicio`;
CREATE TABLE  `agros`.`servicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `estatus_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_servicio_estatus` (`estatus_did`),
  CONSTRAINT `fk_servicio_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agros`.`servicio`
--

/*!40000 ALTER TABLE `servicio` DISABLE KEYS */;
LOCK TABLES `servicio` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `servicio` ENABLE KEYS */;


--
-- Definition of table `agros`.`temporada`
--

DROP TABLE IF EXISTS `agros`.`temporada`;
CREATE TABLE  `agros`.`temporada` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `fechaIncial_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fechaFinal_f` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `estatus_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_temporada_estatus` (`estatus_did`),
  CONSTRAINT `fk_temporada_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agros`.`temporada`
--

/*!40000 ALTER TABLE `temporada` DISABLE KEYS */;
LOCK TABLES `temporada` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `temporada` ENABLE KEYS */;


--
-- Definition of table `agros`.`unidad`
--

DROP TABLE IF EXISTS `agros`.`unidad`;
CREATE TABLE  `agros`.`unidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(145) NOT NULL,
  `equivalencia` double NOT NULL,
  `estatus_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `unidad_equivalencia` (`estatus_did`),
  CONSTRAINT `unidad_equivalencia` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agros`.`unidad`
--

/*!40000 ALTER TABLE `unidad` DISABLE KEYS */;
LOCK TABLES `unidad` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `unidad` ENABLE KEYS */;


--
-- Definition of table `agros`.`variedad`
--

DROP TABLE IF EXISTS `agros`.`variedad`;
CREATE TABLE  `agros`.`variedad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(145) NOT NULL,
  `producto_aid` int(11) NOT NULL,
  `estatus_did` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `variedad_producto` (`producto_aid`),
  KEY `variedad_estatus` (`estatus_did`),
  CONSTRAINT `variedad_producto` FOREIGN KEY (`producto_aid`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `variedad_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agros`.`variedad`
--

/*!40000 ALTER TABLE `variedad` DISABLE KEYS */;
LOCK TABLES `variedad` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `variedad` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
