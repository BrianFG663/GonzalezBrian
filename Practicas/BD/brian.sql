-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para brian
CREATE DATABASE IF NOT EXISTS `brian` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `brian`;

-- Volcando estructura para tabla brian.personas
CREATE TABLE IF NOT EXISTS `personas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `dni` varchar(10) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `sueldo` int DEFAULT NULL,
  `legajo` int DEFAULT NULL,
  `numero_cuenta` int DEFAULT NULL,
  `checkeo` enum('e','c') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla brian.personas: ~0 rows (aproximadamente)
INSERT INTO `personas` (`id`, `nombre`, `apellido`, `fecha_nacimiento`, `dni`, `localidad`, `provincia`, `telefono`, `email`, `contraseña`, `sueldo`, `legajo`, `numero_cuenta`, `checkeo`) VALUES
	(8, 'Lucila', 'Mercado Ruiz', '2003-12-02', '44421224', 'Gualeguaychu', 'Entre Rios', '3446415320', 'lucila@gmail.com', '$2y$10$4m7qQEajKu13ick/igDgdOR67VuRK2nRGO9UhJavl4aJ73AauaDka', 8100, 1001, NULL, 'e');

-- Volcando estructura para tabla brian.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla brian.usuarios: ~0 rows (aproximadamente)
INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `correo`, `contraseña`) VALUES
	(9, 'Brian', 'Gonzalez', 'briangonzaz305@gmail.com', '$2y$10$H8bspkrmgXYUbvIwI/SJHeFecLp4i7vp/lIQ57Ue.cBponktoqjc.');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
