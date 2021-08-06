CREATE DATABASE  IF NOT EXISTS `gastos`;
USE `gastos`;

DROP TABLE IF EXISTS `t_cat_categorias`;

CREATE TABLE `t_cat_categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(245) NOT NULL,
  `descripcion` text,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;


LOCK TABLES `t_cat_categorias` WRITE;

INSERT INTO `t_cat_categorias` VALUES (1,'Ropa',''),(2,'Comida',NULL),(3,'Salud',NULL),(4,'Escuela',NULL),(5,'Casa',NULL),(6,'Mantenimiento',NULL),(7,'Coche',NULL),(8,'Moto',NULL),(9,'Transporte',NULL),(10,'Capacitacion',NULL),(11,'Hardware',NULL),(12,'Otros',NULL);

UNLOCK TABLES;

DROP TABLE IF EXISTS `t_gastos`;

CREATE TABLE `t_gastos` (
  `id_gasto` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `monto` float NOT NULL,
  `descripcion` text,
  `fecha` date NOT NULL,
  `fechaInsert` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_gasto`),
  KEY `fkCategoria_idx` (`id_categoria`),
  KEY `fkUsuario_idx` (`id_usuario`),
  CONSTRAINT `fkCategoria` FOREIGN KEY (`id_categoria`) REFERENCES `t_cat_categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkUsuario` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


LOCK TABLES `t_gastos` WRITE;

UNLOCK TABLES;


DROP TABLE IF EXISTS `t_usuarios`;

CREATE TABLE `t_usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(245) NOT NULL,
  `apellidos` varchar(245) NOT NULL,
  `correo` varchar(245) NOT NULL,
  `usuario` varchar(245) NOT NULL,
  `password` varchar(245) NOT NULL,
  `fechaInsert` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


LOCK TABLES `t_usuarios` WRITE;

UNLOCK TABLES;
