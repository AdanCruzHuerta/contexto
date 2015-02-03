CREATE DATABASE  IF NOT EXISTS `contexto` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `contexto`;
-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: contexto
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1

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
-- Table structure for table `imagen_nota`
--

DROP TABLE IF EXISTS `imagen_nota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagen_nota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `ruta_imagen` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagen_nota`
--

LOCK TABLES `imagen_nota` WRITE;
/*!40000 ALTER TABLE `imagen_nota` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagen_nota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagen_nota_has_notas`
--

DROP TABLE IF EXISTS `imagen_nota_has_notas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagen_nota_has_notas` (
  `imagen_nota_id` int(11) NOT NULL,
  `notas_id` int(11) NOT NULL,
  PRIMARY KEY (`imagen_nota_id`,`notas_id`),
  KEY `fk_imagen_nota_has_notas_notas1_idx` (`notas_id`),
  KEY `fk_imagen_nota_has_notas_imagen_nota1_idx` (`imagen_nota_id`),
  CONSTRAINT `fk_imagen_nota_has_notas_imagen_nota1` FOREIGN KEY (`imagen_nota_id`) REFERENCES `imagen_nota` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_imagen_nota_has_notas_notas1` FOREIGN KEY (`notas_id`) REFERENCES `notas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagen_nota_has_notas`
--

LOCK TABLES `imagen_nota_has_notas` WRITE;
/*!40000 ALTER TABLE `imagen_nota_has_notas` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagen_nota_has_notas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notas`
--

DROP TABLE IF EXISTS `notas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'Aqui va el estatus de la nota\n0 - borrada\n1- activa\n',
  `fecha` datetime NOT NULL,
  `personas_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_notas_personas1_idx` (`personas_id`),
  CONSTRAINT `fk_notas_personas1` FOREIGN KEY (`personas_id`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='status : indica si una nota esta activa o no activa, las notas no activas podran volver a restaurarse.\nfecha : fecha y hora de creacion de la nota.\n';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notas`
--

LOCK TABLES `notas` WRITE;
/*!40000 ALTER TABLE `notas` DISABLE KEYS */;
/*!40000 ALTER TABLE `notas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notas_has_tipo_notas`
--

DROP TABLE IF EXISTS `notas_has_tipo_notas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notas_has_tipo_notas` (
  `notas_id` int(11) NOT NULL,
  `tipo_notas_id` int(11) NOT NULL,
  PRIMARY KEY (`notas_id`,`tipo_notas_id`),
  KEY `fk_notas_has_tipo_notas_tipo_notas1_idx` (`tipo_notas_id`),
  KEY `fk_notas_has_tipo_notas_notas1_idx` (`notas_id`),
  CONSTRAINT `fk_notas_has_tipo_notas_notas1` FOREIGN KEY (`notas_id`) REFERENCES `notas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_notas_has_tipo_notas_tipo_notas1` FOREIGN KEY (`tipo_notas_id`) REFERENCES `tipo_notas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notas_has_tipo_notas`
--

LOCK TABLES `notas_has_tipo_notas` WRITE;
/*!40000 ALTER TABLE `notas_has_tipo_notas` DISABLE KEYS */;
/*!40000 ALTER TABLE `notas_has_tipo_notas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificaciones`
--

DROP TABLE IF EXISTS `notificaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notas_id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL COMMENT '1- creada\n2- modificada\n3-eliminada',
  `administrador` int(11) NOT NULL DEFAULT '0' COMMENT 'administrador 0 siginifica que no lo ha visto\nadministrador 1 significa que ya la vio',
  `editor` int(11) NOT NULL DEFAULT '0' COMMENT 'editor 0 siginifica que no lo ha visto\neditor 1 significa que ya la vio',
  PRIMARY KEY (`id`),
  KEY `fk_notificaciones_notas1_idx` (`notas_id`),
  CONSTRAINT `fk_notificaciones_notas1` FOREIGN KEY (`notas_id`) REFERENCES `notas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Notificaciones\n\ntipo : tipo de notificación  	\nadministrador :  indica si es para el administrador\neditor : indica si es para el editor';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificaciones`
--

LOCK TABLES `notificaciones` WRITE;
/*!40000 ALTER TABLE `notificaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `notificaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido_p` varchar(45) NOT NULL,
  `apellido_m` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_personas_usuarios1_idx` (`usuarios_id`),
  CONSTRAINT `fk_personas_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (1,'ADAN','CRUZ','HUERTA','3121040103',1);
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles_usuario`
--

DROP TABLE IF EXISTS `roles_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles_usuario`
--

LOCK TABLES `roles_usuario` WRITE;
/*!40000 ALTER TABLE `roles_usuario` DISABLE KEYS */;
INSERT INTO `roles_usuario` VALUES (1,'ADMINISTRADOR'),(2,'EDITOR'),(3,'REPORTERO');
/*!40000 ALTER TABLE `roles_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `secciones`
--

DROP TABLE IF EXISTS `secciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `secciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(65) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secciones`
--

LOCK TABLES `secciones` WRITE;
/*!40000 ALTER TABLE `secciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `secciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `secciones_has_notas`
--

DROP TABLE IF EXISTS `secciones_has_notas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `secciones_has_notas` (
  `secciones_id` int(11) NOT NULL,
  `notas_id` int(11) NOT NULL,
  PRIMARY KEY (`secciones_id`,`notas_id`),
  KEY `fk_secciones_has_notas_notas1_idx` (`notas_id`),
  KEY `fk_secciones_has_notas_secciones1_idx` (`secciones_id`),
  CONSTRAINT `fk_secciones_has_notas_notas1` FOREIGN KEY (`notas_id`) REFERENCES `notas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_secciones_has_notas_secciones1` FOREIGN KEY (`secciones_id`) REFERENCES `secciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secciones_has_notas`
--

LOCK TABLES `secciones_has_notas` WRITE;
/*!40000 ALTER TABLE `secciones_has_notas` DISABLE KEYS */;
/*!40000 ALTER TABLE `secciones_has_notas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tareas`
--

DROP TABLE IF EXISTS `tareas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tareas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tareas`
--

LOCK TABLES `tareas` WRITE;
/*!40000 ALTER TABLE `tareas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tareas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tareas_has_personas`
--

DROP TABLE IF EXISTS `tareas_has_personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tareas_has_personas` (
  `tareas_id` int(11) NOT NULL,
  `personas_id_asigna` int(11) NOT NULL,
  `personas_id_recibe` int(11) NOT NULL,
  `fecha_terminacion` date NOT NULL,
  PRIMARY KEY (`tareas_id`,`personas_id_asigna`,`personas_id_recibe`),
  KEY `fk_tareas_has_personas_personas1_idx` (`personas_id_asigna`),
  KEY `fk_tareas_has_personas_tareas1_idx` (`tareas_id`),
  CONSTRAINT `fk_tareas_has_personas_personas1` FOREIGN KEY (`personas_id_asigna`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tareas_has_personas_tareas1` FOREIGN KEY (`tareas_id`) REFERENCES `tareas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tareas_has_personas`
--

LOCK TABLES `tareas_has_personas` WRITE;
/*!40000 ALTER TABLE `tareas_has_personas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tareas_has_personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_notas`
--

DROP TABLE IF EXISTS `tipo_notas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_notas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Existen 3 tipos de notas\n- video\n- galeria\n- normal\n';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_notas`
--

LOCK TABLES `tipo_notas` WRITE;
/*!40000 ALTER TABLE `tipo_notas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_notas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `foto_usuario` varchar(255) NOT NULL,
  `roles_usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuarios_roles_usuario_idx` (`roles_usuario_id`),
  CONSTRAINT `fk_usuarios_roles_usuario` FOREIGN KEY (`roles_usuario_id`) REFERENCES `roles_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'adancruzhuerta@gmail.com','12345','media/img/usuarios/avatar.png',1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-02 23:32:05
