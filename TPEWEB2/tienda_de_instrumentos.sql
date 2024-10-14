-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-09-2024 a las 01:45:35
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda de instrumentos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instrumentos`
--

CREATE TABLE `instrumentos` (
  `id` int(11) NOT NULL,
  `instrumento` varchar(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `ID_MARCAS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `instrumentos`
--

INSERT INTO `instrumentos` (`id`, `instrumento`, `precio`, `stock`, `ID_MARCAS`) VALUES
(3, 'guitarra', 1000, 2, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas de instrumento`
--

CREATE TABLE `marcas de instrumento` (
  `ID_MARCAS` int(11) NOT NULL,
  `nombre de marca` varchar(20) NOT NULL,
  `direccion` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `marcas de instrumento`
--

INSERT INTO `marcas de instrumento` (`ID_MARCAS`, `nombre de marca`, `direccion`) VALUES
(6, 'gibson', 'moreno 1153'),
(7, 'Boss.', 'alvear 46');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `instrumentos`
--
ALTER TABLE `instrumentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_MARCAS` (`ID_MARCAS`);

--
-- Indices de la tabla `marcas de instrumento`
--
ALTER TABLE `marcas de instrumento`
  ADD PRIMARY KEY (`ID_MARCAS`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `instrumentos`
--
ALTER TABLE `instrumentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `marcas de instrumento`
--
ALTER TABLE `marcas de instrumento`
  MODIFY `ID_MARCAS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `instrumentos`
--
ALTER TABLE `instrumentos`
  ADD CONSTRAINT `instrumentos_ibfk_1` FOREIGN KEY (`ID_MARCAS`) REFERENCES `marcas de instrumento` (`ID_MARCAS`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
