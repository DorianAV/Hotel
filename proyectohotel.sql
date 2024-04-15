-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 15-04-2024 a las 03:18:34
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectohotel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

DROP TABLE IF EXISTS `habitaciones`;
CREATE TABLE IF NOT EXISTS `habitaciones` (
  `ClvHab` int NOT NULL AUTO_INCREMENT,
  `TarifaNoche` int NOT NULL,
  `NumHab` int NOT NULL,
  `PisoHab` int NOT NULL,
  `TipoHab` varchar(50) NOT NULL,
  `Estatus` varchar(20) NOT NULL,
  `DescHab` varchar(100) NOT NULL,
  PRIMARY KEY (`ClvHab`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaciones`
--

DROP TABLE IF EXISTS `reservaciones`;
CREATE TABLE IF NOT EXISTS `reservaciones` (
  `ClvRes` int NOT NULL AUTO_INCREMENT,
  `FechaRes` date NOT NULL,
  `HoraRes` time NOT NULL,
  `ClvUsu` int DEFAULT NULL,
  `ClvHab` int DEFAULT NULL,
  PRIMARY KEY (`ClvRes`),
  KEY `ClvUsu` (`ClvUsu`),
  KEY `ClvHab` (`ClvHab`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `ClvRol` int NOT NULL AUTO_INCREMENT,
  `NombreRol` varchar(50) NOT NULL,
  `DescRol` varchar(100) NOT NULL,
  PRIMARY KEY (`ClvRol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`ClvRol`, `NombreRol`, `DescRol`) VALUES
(1, 'Administrador', 'Encargado de manejar el sitio web del hotel'),
(3, 'Usuario', 'Cliente del hotel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `ClvUsu` int NOT NULL AUTO_INCREMENT,
  `NombreUsu` varchar(50) NOT NULL,
  `ApePatUsu` varchar(50) NOT NULL,
  `ApeMatUsu` varchar(50) NOT NULL,
  `EdadUsu` int NOT NULL,
  `SexoUsu` varchar(10) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `ContraUsu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ClvRol` int NOT NULL,
  PRIMARY KEY (`ClvUsu`),
  KEY `fk_usuarios` (`ClvRol`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ClvUsu`, `NombreUsu`, `ApePatUsu`, `ApeMatUsu`, `EdadUsu`, `SexoUsu`, `Usuario`, `ContraUsu`, `ClvRol`) VALUES
(2, 'Gladys Nallely', 'Macedo', 'Macedo', 39, 'Femenino', 'gladys_mac', 'gladys', 1),
(6, 'Xochitl Lili', 'Quintana', 'Albarran', 20, 'Femenino', 'lili', 'lili2004', 3),
(7, 'Abel Yahir', 'Perez', 'Macedo', 20, 'Masculino', 'abel', 'abel2004', 3);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD CONSTRAINT `reservaciones_ibfk_1` FOREIGN KEY (`ClvUsu`) REFERENCES `usuarios` (`ClvUsu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservaciones_ibfk_2` FOREIGN KEY (`ClvHab`) REFERENCES `habitaciones` (`ClvHab`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios` FOREIGN KEY (`ClvRol`) REFERENCES `roles` (`ClvRol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
