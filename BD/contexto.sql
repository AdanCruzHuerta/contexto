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
-- Table structure for table `columna`
--

DROP TABLE IF EXISTS `columna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `columna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `imagen_columna` varchar(255) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `estatus` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `columna`
--

LOCK TABLES `columna` WRITE;
/*!40000 ALTER TABLE `columna` DISABLE KEYS */;
INSERT INTO `columna` VALUES (1,'El Volcán de Colima','media/img/notas/columnas/volcan de colima.jpeg','2015-03-16',1);
/*!40000 ALTER TABLE `columna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galerias`
--

DROP TABLE IF EXISTS `galerias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `galerias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  `autor` varchar(80) NOT NULL,
  `fecha_creacion` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galerias`
--

LOCK TABLES `galerias` WRITE;
/*!40000 ALTER TABLE `galerias` DISABLE KEYS */;
/*!40000 ALTER TABLE `galerias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagenes`
--

DROP TABLE IF EXISTS `imagenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `ruta_imagen` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagenes`
--

LOCK TABLES `imagenes` WRITE;
/*!40000 ALTER TABLE `imagenes` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagenes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagenes_has_galerias`
--

DROP TABLE IF EXISTS `imagenes_has_galerias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagenes_has_galerias` (
  `imagenes_id` int(11) NOT NULL,
  `galerias_id` int(11) NOT NULL,
  PRIMARY KEY (`imagenes_id`,`galerias_id`),
  KEY `fk_imagenes_has_galerias_galerias1_idx` (`galerias_id`),
  KEY `fk_imagenes_has_galerias_imagenes1_idx` (`imagenes_id`),
  CONSTRAINT `fk_imagenes_has_galerias_galerias1` FOREIGN KEY (`galerias_id`) REFERENCES `galerias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_imagenes_has_galerias_imagenes1` FOREIGN KEY (`imagenes_id`) REFERENCES `imagenes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagenes_has_galerias`
--

LOCK TABLES `imagenes_has_galerias` WRITE;
/*!40000 ALTER TABLE `imagenes_has_galerias` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagenes_has_galerias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notas`
--

DROP TABLE IF EXISTS `notas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'Aqui va el estatus de la nota\n0 - borrada\n1- activa\n',
  `fecha` datetime NOT NULL,
  `contenido` text NOT NULL,
  `tipo_nota` int(11) NOT NULL COMMENT 'Los tipos de nota son \n1 - comun\n2 - columna\n3 - galeria\n4 - video',
  `imagen_nota` varchar(255) NOT NULL DEFAULT '-',
  `url_video` text NOT NULL,
  `redaccion` int(11) NOT NULL,
  `galerias_id` int(11) DEFAULT NULL,
  `columna_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_notas_galerias1_idx` (`galerias_id`),
  KEY `fk_notas_columna1_idx` (`columna_id`),
  CONSTRAINT `fk_notas_columna1` FOREIGN KEY (`columna_id`) REFERENCES `columna` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_notas_galerias1` FOREIGN KEY (`galerias_id`) REFERENCES `galerias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='status : indica si una nota esta activa o no activa, las notas no activas podran volver a restaurarse.\nfecha : fecha y hora de creacion de la nota.\nurl_video indica la url de un video publicado en youtube\n';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notas`
--

LOCK TABLES `notas` WRITE;
/*!40000 ALTER TABLE `notas` DISABLE KEYS */;
INSERT INTO `notas` VALUES (1,'Nota 1 Redacción-Común',1,'2015-03-16 12:42:22','<p>Nota 1 Redacción-Común<br></p>',1,'media/img/notas/noticia.jpg','',1,NULL,NULL),(2,'Nota 2 Autor-Común',1,'2015-03-16 12:57:21','<p>Nota 2 Autor-Común<br></p>',1,'media/img/notas/noticia.jpg','',0,NULL,NULL),(3,'El Volcán de Colima',1,'2015-03-16 12:58:18','Nota 3 Redacción-Columna<br>',2,'media/img/notas/columnas/volcan de colima.jpeg','',1,NULL,1),(4,'El Volcán de Colima',1,'2015-03-16 12:58:36','Nota 4 Autor-Columna',2,'media/img/notas/columnas/volcan de colima.jpeg','',1,NULL,1),(5,'El Volcán de Colima',1,'2015-03-16 13:01:56','Nota 5 Autor-Columna',2,'media/img/notas/columnas/volcan de colima.jpeg','',0,NULL,1),(6,'Nota 6 Redaccion-Video',1,'2015-03-16 13:06:07','Nota 6 Redaccion-Video',3,'media/img/notas/noticia.jpg',' <iframe width=\"420\" height=\"315\"\nsrc=\"http://www.youtube.com/embed/XGSy3_Czz8k\">\n</iframe> ',1,NULL,NULL),(7,'Nota 7 Autor-Video',1,'2015-03-16 13:07:04','Nota 7 Autor-Video',3,'media/img/notas/noticia.jpg',' <iframe width=\"420\" height=\"315\"\nsrc=\"http://www.youtube.com/embed/XGSy3_Czz8k\">\n</iframe> ',0,NULL,NULL),(8,'El Volcán de Colima',1,'2015-03-16 18:15:45','<p>Nota de prueba <br></p>',2,'media/img/notas/columnas/volcan de colima.jpeg','',0,NULL,1);
/*!40000 ALTER TABLE `notas` ENABLE KEYS */;
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
  `status` int(11) NOT NULL COMMENT '0: La Notificacion No se ha visualizado\n1: La Notificacion se ha visto\n',
  PRIMARY KEY (`id`),
  KEY `fk_notificaciones_notas1_idx` (`notas_id`),
  CONSTRAINT `fk_notificaciones_notas1` FOREIGN KEY (`notas_id`) REFERENCES `notas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='Notificaciones\n\n-tipo : tipo de notificación 	\n	1 : nueva nota\n	2 : nota modificada\n	3 : nota borrada\n-status: \n	vista o no vista\n- tipo_usuario: \n	1 administrador,\n	2 editor\n	3 reportero';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificaciones`
--

LOCK TABLES `notificaciones` WRITE;
/*!40000 ALTER TABLE `notificaciones` DISABLE KEYS */;
INSERT INTO `notificaciones` VALUES (1,1,1,0),(2,2,1,0),(3,3,1,0),(4,4,1,0),(5,5,1,0),(6,6,1,0),(7,7,1,0),(8,8,1,0);
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
  `apellidos` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_personas_usuarios1_idx` (`usuarios_id`),
  CONSTRAINT `fk_personas_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (1,'Adán','Cruz Huerta','3121040103','Sauce 405',1),(2,'Christian Ramón','Magallon Garcia','3121030405','',2);
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personas_has_notas`
--

DROP TABLE IF EXISTS `personas_has_notas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personas_has_notas` (
  `personas_id` int(11) NOT NULL,
  `notas_id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL COMMENT 'El tipo de \npersona_has_nota\nindica si una\npersona sube la \nnota o es autor de\nla nota.\nOpciones:\n1 : Autor\n2 : Publica nota\n',
  PRIMARY KEY (`personas_id`,`notas_id`,`tipo`),
  KEY `fk_personas_has_notas_notas1_idx` (`notas_id`),
  KEY `fk_personas_has_notas_personas1_idx` (`personas_id`),
  CONSTRAINT `fk_personas_has_notas_notas1` FOREIGN KEY (`notas_id`) REFERENCES `notas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_personas_has_notas_personas1` FOREIGN KEY (`personas_id`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas_has_notas`
--

LOCK TABLES `personas_has_notas` WRITE;
/*!40000 ALTER TABLE `personas_has_notas` DISABLE KEYS */;
INSERT INTO `personas_has_notas` VALUES (1,1,2),(1,2,1),(1,2,2),(1,3,2),(1,4,2),(1,5,1),(1,5,2),(1,6,2),(1,7,1),(1,7,2),(1,8,2),(2,8,1);
/*!40000 ALTER TABLE `personas_has_notas` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secciones`
--

LOCK TABLES `secciones` WRITE;
/*!40000 ALTER TABLE `secciones` DISABLE KEYS */;
INSERT INTO `secciones` VALUES (1,'Primera plana'),(2,'Gobierno'),(3,'Seguridad'),(4,'Educación'),(5,'Salud'),(6,'Economia'),(7,'Colima'),(8,'Manzanillo'),(9,'Villa de Álvarez'),(10,'Tecomán'),(11,'Armeria'),(12,'Zona norte'),(13,'Entidades'),(14,'Cultura'),(15,'Sociales'),(16,'Medio ambiente'),(17,'Urbes'),(18,'Migrantes'),(19,'Agro'),(20,'Elecciones 2015');
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
INSERT INTO `secciones_has_notas` VALUES (1,1),(1,2),(1,6),(1,7);
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
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(60) COLLATE utf8_bin NOT NULL,
  `password` varchar(60) COLLATE utf8_bin NOT NULL,
  `foto_usuario` varchar(255) COLLATE utf8_bin NOT NULL,
  `status` tinyint(4) NOT NULL,
  `roles_usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuarios_roles_usuario_idx` (`roles_usuario_id`),
  CONSTRAINT `fk_usuarios_roles_usuario` FOREIGN KEY (`roles_usuario_id`) REFERENCES `roles_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'adancruzhuerta@gmail.com','12345','media/img/usuarios/avatar.png',1,1),(2,'christian1350@hotmail.com','hola','media/img/usuarios/avatar.png',1,2);
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

-- Dump completed on 2015-03-17  0:45:25
