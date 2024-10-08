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
  `fecha_nacimiento` date NOT NULL,
  `instituto_id` int NOT NULL,
  `estado` enum('desaprobado','regular','promocion','sin evaluar') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'sin evaluar',
  PRIMARY KEY (`id`),
  KEY `FK_alumno_instituto` (`instituto_id`),
  CONSTRAINT `FK_alumno_instituto` FOREIGN KEY (`instituto_id`) REFERENCES `instituto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla escueladb.alumno: ~7 rows (aproximadamente)
INSERT INTO `alumno` (`id`, `apellido`, `nombre`, `dni`, `fecha_nacimiento`, `instituto_id`, `estado`) VALUES
	(2, 'Ruiz', 'Lucila', '44421224', '2002-12-03', 115, 'regular'),
	(3, 'Cedres', 'Lucas', '44444444', '2024-09-30', 115, 'desaprobado'),
	(4, 'Parada', 'Fausto', '33333333', '1997-09-30', 115, 'sin evaluar'),
	(13, 'Agustin', 'Gomez', '44332243', '1111-11-11', 116, 'regular'),
	(14, 'Gomez', 'Agus', '33333333', '1111-11-11', 116, 'regular'),
	(15, 'Gomez', 'Agus', '33333333', '0111-11-11', 116, 'promocion'),
	(16, 'Gonzalez', 'Brian', '44444433', '2222-02-12', 115, 'desaprobado');

-- Volcando estructura para tabla escueladb.asistencias
CREATE TABLE IF NOT EXISTS `asistencias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `alumno_id` int DEFAULT NULL,
  `fecha_asistencia` timestamp NOT NULL,
  `materia_id` int DEFAULT NULL,
  `valor` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `alumno_id` (`alumno_id`),
  KEY `FK_asistencias_materias` (`materia_id`),
  CONSTRAINT `asistencias_ibfk_1` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_asistencias_materias` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=240 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla escueladb.asistencias: ~8 rows (aproximadamente)
INSERT INTO `asistencias` (`id`, `alumno_id`, `fecha_asistencia`, `materia_id`, `valor`) VALUES
	(38, 3, '2024-10-04 19:15:00', 13, 1),
	(53, 2, '2024-10-05 21:20:00', 13, 1),
	(221, NULL, '2024-10-06 07:31:00', 13, 1),
	(222, 2, '2024-10-06 07:32:00', 13, 1),
	(223, 3, '2024-10-06 07:33:00', 13, 0.5),
	(224, 3, '2024-10-08 00:31:00', 13, 1),
	(225, 2, '2024-10-08 00:38:00', 13, 1),
	(227, 16, '2024-10-09 04:29:58', 13, 1),
	(228, 16, '2024-10-07 04:41:52', 13, 1),
	(229, 2, '2024-10-09 04:43:42', 13, 1),
	(230, 3, '2024-10-09 04:43:53', 13, 1),
	(232, NULL, '2024-09-27 04:59:22', 13, 1),
	(233, NULL, '2024-09-25 04:59:37', 13, 1),
	(236, 3, '2024-09-27 05:02:03', 13, 1),
	(237, 2, '2024-09-27 05:11:55', 13, 1),
	(239, 15, '2024-10-09 06:00:00', 15, 1);

-- Volcando estructura para tabla escueladb.instituto
CREATE TABLE IF NOT EXISTS `instituto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `cue` int NOT NULL,
  `gestion` enum('publico','privado') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cue` (`cue`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla escueladb.instituto: ~4 rows (aproximadamente)
INSERT INTO `instituto` (`id`, `nombre`, `direccion`, `cue`, `gestion`) VALUES
	(115, 'SEDES', 'aaa', 2, 'privado'),
	(116, 'UADER', 'AAAS', 3, 'publico'),
	(117, 'UNER', 'ASS', 23, 'privado');

-- Volcando estructura para tabla escueladb.instituto_profesor
CREATE TABLE IF NOT EXISTS `instituto_profesor` (
  `id_profesor` int NOT NULL,
  `id_instituto` int NOT NULL,
  KEY `FK_instituto_profesor_instituto` (`id_instituto`),
  KEY `FK_instituto_profesor_profesor` (`id_profesor`),
  CONSTRAINT `FK_instituto_profesor_instituto` FOREIGN KEY (`id_instituto`) REFERENCES `instituto` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_instituto_profesor_profesor` FOREIGN KEY (`id_profesor`) REFERENCES `profesor` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla escueladb.instituto_profesor: ~3 rows (aproximadamente)
INSERT INTO `instituto_profesor` (`id_profesor`, `id_instituto`) VALUES
	(24, 115),
	(24, 116);

-- Volcando estructura para tabla escueladb.materias
CREATE TABLE IF NOT EXISTS `materias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_creacion` date NOT NULL,
  `codigo_materia` int NOT NULL,
  `profesor_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_materias_profesor` (`profesor_id`),
  CONSTRAINT `FK_materias_profesor` FOREIGN KEY (`profesor_id`) REFERENCES `profesor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla escueladb.materias: ~4 rows (aproximadamente)
INSERT INTO `materias` (`id`, `nombre`, `descripcion`, `fecha_creacion`, `codigo_materia`, `profesor_id`) VALUES
	(13, 'MATEMATICAS', 'matematicas', '2024-09-27', 1, 24),
	(14, 'PROGRAMACION', 'ssss', '2024-09-29', 111, 24),
	(15, 'INGLES', 'AAAA', '2024-10-01', 22222, 24),
	(16, 'SEMINARIO', 'AAAA', '2024-10-01', 234234, NULL);

-- Volcando estructura para tabla escueladb.materia_alumno
CREATE TABLE IF NOT EXISTS `materia_alumno` (
  `alumno_id` int NOT NULL,
  `materia_id` int NOT NULL,
  KEY `FK__alumno` (`alumno_id`),
  KEY `FK__materias` (`materia_id`),
  CONSTRAINT `FK__alumno` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK__materias` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla escueladb.materia_alumno: ~4 rows (aproximadamente)
INSERT INTO `materia_alumno` (`alumno_id`, `materia_id`) VALUES
	(2, 13),
	(3, 13),
	(4, 14),
	(15, 15),
	(16, 13);

-- Volcando estructura para tabla escueladb.materia_instituto
CREATE TABLE IF NOT EXISTS `materia_instituto` (
  `materia_id` int NOT NULL,
  `instituto_id` int NOT NULL,
  PRIMARY KEY (`materia_id`,`instituto_id`),
  KEY `instituto_id` (`instituto_id`),
  CONSTRAINT `materia_instituto_ibfk_1` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`) ON DELETE CASCADE,
  CONSTRAINT `materia_instituto_ibfk_2` FOREIGN KEY (`instituto_id`) REFERENCES `instituto` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla escueladb.materia_instituto: ~3 rows (aproximadamente)
INSERT INTO `materia_instituto` (`materia_id`, `instituto_id`) VALUES
	(13, 115),
	(14, 115),
	(16, 115),
	(15, 116);

-- Volcando estructura para tabla escueladb.notas
CREATE TABLE IF NOT EXISTS `notas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `alumno_id` int NOT NULL,
  `nota` float NOT NULL,
  `fecha_nota` date NOT NULL,
  `materia_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `alumno_id` (`alumno_id`),
  KEY `FK_notas_materias` (`materia_id`),
  CONSTRAINT `FK_notas_materias` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`) ON DELETE CASCADE,
  CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla escueladb.notas: ~3 rows (aproximadamente)
INSERT INTO `notas` (`id`, `alumno_id`, `nota`, `fecha_nota`, `materia_id`) VALUES
	(47, 2, 8, '2024-10-09', 13),
	(48, 3, 7, '2024-10-09', 13),
	(49, 16, 5, '2024-10-09', 13),
	(50, 2, 6, '2024-10-09', 13),
	(51, 3, 5, '2024-10-09', 13),
	(52, 16, 7, '2024-10-09', 13),
	(53, 2, 6, '2024-10-09', 13),
	(54, 3, 7, '2024-10-09', 13),
	(55, 16, 7, '2024-10-09', 13);

-- Volcando estructura para tabla escueladb.profesor
CREATE TABLE IF NOT EXISTS `profesor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `apellido` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `legajo` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dni` (`dni`),
  UNIQUE KEY `legajo` (`legajo`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla escueladb.profesor: ~2 rows (aproximadamente)
INSERT INTO `profesor` (`id`, `apellido`, `nombre`, `dni`, `legajo`) VALUES
	(24, 'Gonzalez', 'Brian', '1234', '001');

-- Volcando estructura para tabla escueladb.ram
CREATE TABLE IF NOT EXISTS `ram` (
  `desaprobado` int NOT NULL DEFAULT '5',
  `regular` int NOT NULL DEFAULT '6',
  `promocion` int NOT NULL DEFAULT '7',
  `asistencias_regular` int NOT NULL DEFAULT '60',
  `asistencias_promocion` int NOT NULL DEFAULT '70',
  `fecha_funcionamiento` year NOT NULL,
  `instituto_id` int DEFAULT NULL,
  `tolerancia` int DEFAULT NULL,
  KEY `FK_ram_instituto` (`instituto_id`),
  CONSTRAINT `FK_ram_instituto` FOREIGN KEY (`instituto_id`) REFERENCES `instituto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla escueladb.ram: ~0 rows (aproximadamente)
INSERT INTO `ram` (`desaprobado`, `regular`, `promocion`, `asistencias_regular`, `asistencias_promocion`, `fecha_funcionamiento`, `instituto_id`, `tolerancia`) VALUES
	(5, 6, 8, 60, 70, '2024', 115, 10),
	(5, 6, 7, 60, 70, '2024', 116, 10);

-- Volcando estructura para tabla escueladb.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `passw` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rol` enum('administrador','profesor') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_profesor` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail` (`mail`),
  KEY `id_profesor` (`id_profesor`),
  CONSTRAINT `id_profesor` FOREIGN KEY (`id_profesor`) REFERENCES `profesor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=244 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla escueladb.usuario: ~2 rows (aproximadamente)
INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `mail`, `passw`, `rol`, `id_profesor`) VALUES
	(223, 'Javier', 'Parra', 'javier@gmail.com', '$2y$10$Fga7foscWCjerL6CONEyd.A/Npku/tTL6A1UZgc7/vFwXoKl34MTG', 'administrador', NULL),
	(243, 'Gonzalez', 'Brian', 'briangonaazsazaaa305@gmail.com', '$2y$10$YQXUjthUmvczvjost8mbb.Su2yMuipz0mYg3dC7L35OJdJBC.aJMW', 'administrador', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
