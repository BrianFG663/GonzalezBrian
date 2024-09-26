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


-- Volcando estructura de base de datos para escueladb
CREATE DATABASE IF NOT EXISTS `escueladb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `escueladb`;

-- Volcando estructura para tabla escueladb.alumno
CREATE TABLE IF NOT EXISTS `alumno` (
  `id` int NOT NULL AUTO_INCREMENT,
  `apellido` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `profesor_id` int DEFAULT NULL,
  `usuario_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dni` (`dni`),
  UNIQUE KEY `email` (`email`),
  KEY `profesor_id` (`profesor_id`),
  KEY `usuario_id` (`usuario_id`),
  CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`profesor_id`) REFERENCES `profesor` (`id`),
  CONSTRAINT `alumno_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla escueladb.alumno: ~0 rows (aproximadamente)
INSERT INTO `alumno` (`id`, `apellido`, `nombre`, `dni`, `email`, `fecha_nacimiento`, `profesor_id`, `usuario_id`) VALUES
	(1, 'aaa', 'aa', '22', 'aa', '2024-09-24', NULL, NULL);

-- Volcando estructura para tabla escueladb.asistencias
CREATE TABLE IF NOT EXISTS `asistencias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `alumno_id` int DEFAULT NULL,
  `fecha` date NOT NULL,
  `cantidad_dias` int DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `alumno_id` (`alumno_id`),
  CONSTRAINT `asistencias_ibfk_1` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla escueladb.asistencias: ~0 rows (aproximadamente)

-- Volcando estructura para tabla escueladb.instituto
CREATE TABLE IF NOT EXISTS `instituto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `cue` int NOT NULL,
  `gestion` enum('publico','privado') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cue` (`cue`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla escueladb.instituto: ~1 rows (aproximadamente)
INSERT INTO `instituto` (`id`, `nombre`, `direccion`, `cue`, `gestion`) VALUES
	(112, 'UNER', 'Del valle 663', 1, 'privado');

-- Volcando estructura para tabla escueladb.materias
CREATE TABLE IF NOT EXISTS `materias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_creacion` date NOT NULL,
  `codigo_materia` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla escueladb.materias: ~2 rows (aproximadamente)
INSERT INTO `materias` (`id`, `nombre`, `descripcion`, `fecha_creacion`, `codigo_materia`) VALUES
	(11, 'A', 'a', '2024-09-25', 1),
	(12, 'MATEMATICAS', '2', '2024-09-25', 2);

-- Volcando estructura para tabla escueladb.materia_alumno
CREATE TABLE IF NOT EXISTS `materia_alumno` (
  `alumno_id` int NOT NULL,
  `materia_id` int NOT NULL,
  `fecha_inscripcion` date DEFAULT NULL,
  PRIMARY KEY (`alumno_id`,`materia_id`),
  KEY `idx_materia_id` (`materia_id`),
  CONSTRAINT `materia_alumno_ibfk_1` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`id`) ON DELETE CASCADE,
  CONSTRAINT `materia_alumno_ibfk_2` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla escueladb.materia_alumno: ~0 rows (aproximadamente)

-- Volcando estructura para tabla escueladb.materia_instituto
CREATE TABLE IF NOT EXISTS `materia_instituto` (
  `materia_id` int NOT NULL,
  `instituto_id` int NOT NULL,
  PRIMARY KEY (`materia_id`,`instituto_id`),
  KEY `instituto_id` (`instituto_id`),
  CONSTRAINT `materia_instituto_ibfk_1` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`) ON DELETE CASCADE,
  CONSTRAINT `materia_instituto_ibfk_2` FOREIGN KEY (`instituto_id`) REFERENCES `instituto` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla escueladb.materia_instituto: ~2 rows (aproximadamente)
INSERT INTO `materia_instituto` (`materia_id`, `instituto_id`) VALUES
	(11, 112),
	(12, 112);

-- Volcando estructura para tabla escueladb.materia_profesor
CREATE TABLE IF NOT EXISTS `materia_profesor` (
  `materia_id` int NOT NULL,
  `profesor_id` int NOT NULL,
  `fecha_asignacion` date DEFAULT NULL,
  PRIMARY KEY (`materia_id`,`profesor_id`),
  KEY `idx_profesor_id` (`profesor_id`),
  CONSTRAINT `materia_profesor_ibfk_1` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`) ON DELETE CASCADE,
  CONSTRAINT `materia_profesor_ibfk_2` FOREIGN KEY (`profesor_id`) REFERENCES `profesor` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla escueladb.materia_profesor: ~0 rows (aproximadamente)

-- Volcando estructura para tabla escueladb.notas
CREATE TABLE IF NOT EXISTS `notas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `alumno_id` int DEFAULT NULL,
  `final_uno` float DEFAULT NULL,
  `final_dos` float DEFAULT NULL,
  `trabajo_final` float DEFAULT NULL,
  `promedio` float DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `total_asistencias` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `alumno_id` (`alumno_id`),
  CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`id`),
  CONSTRAINT `notas_chk_1` CHECK (((`promedio` >= 0) and (`promedio` <= 10)))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla escueladb.notas: ~0 rows (aproximadamente)

-- Volcando estructura para tabla escueladb.profesor
CREATE TABLE IF NOT EXISTS `profesor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `apellido` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `legajo` varchar(20) NOT NULL,
  `instituto_id` int DEFAULT NULL,
  `usuario_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dni` (`dni`),
  UNIQUE KEY `legajo` (`legajo`),
  KEY `instituto_id` (`instituto_id`),
  KEY `usuario_id` (`usuario_id`),
  CONSTRAINT `profesor_ibfk_1` FOREIGN KEY (`instituto_id`) REFERENCES `instituto` (`id`),
  CONSTRAINT `profesor_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla escueladb.profesor: ~1 rows (aproximadamente)
INSERT INTO `profesor` (`id`, `apellido`, `nombre`, `dni`, `legajo`, `instituto_id`, `usuario_id`) VALUES
	(8, 'Gonzalez', 'Brian', '43681145', '001', NULL, NULL),
	(12, 'Aaaaa', 'Aaaaa', '2', '2', NULL, NULL);

-- Volcando estructura para tabla escueladb.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `passw` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rol` enum('administrador','profesor','alumno') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB AUTO_INCREMENT=231 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla escueladb.usuario: ~7 rows (aproximadamente)
INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `mail`, `passw`, `rol`) VALUES
	(223, 'Javier', 'Parra', 'Javier@gmail.com', '$2y$10$YtbD8z5bFGQg18cm3UFXCeT7TWn1TNun/ABiF7daEhZNOVRqzL/M.', 'administrador'),
	(224, 'Gonzalez', 'brian', 'briangonzaz305@gmail.com', '$2y$10$PHPvxQ8kCj6UOPPgaMvKZe1fkVSxTSCcJPTNqY6ltX61hZzEWKCe.', 'profesor'),
	(226, 'Gonzalez', 'brian', 'aaaaaad', '$2y$10$G75z4LCNg1cJlwMjOskin.ZACdiZ5NsYefdGnmgCwCpZbnJmAT30u', 'profesor'),
	(227, 'Gonzalez', 'Brian', 'briangonzsaza305@gmail.com', '$2y$10$M6.gy3QqKvf12goGztNGCuuwHP/prfKvsL5lmVp6Rr34QFrwQnljq', 'profesor'),
	(228, 'Gonzalez', 'Brian', 'briangonzsazaaa305@gmail.com', '$2y$10$.Eye8IgB/BS08lDlkQ8Rpem262n/Vsj0s5sibDWZFXvShu9pmzUB6', 'profesor'),
	(229, 'Gonzalez', 'Brian', 'briangonaazsazaaa305@gmail.com', '$2y$10$Qv5OurkrqXi5ctMEJ3ExguE5jj48kty4Vwablb2eFnBgyqUalljYC', 'administrador'),
	(230, 'Aaaaa', 'Aaaaa', 'aaaaaaaa', '$2y$10$k1FnjdCZEpoi5ou8a7fMNOP9lepIlC6uhwT9TIASiDxDMSv.FpV.2', 'profesor');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
