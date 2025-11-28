-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2025 a las 19:06:51
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `base_prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos1`
--

CREATE TABLE `cursos1` (
  `id` int(90) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `activo` tinyint(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursos1`
--

INSERT INTO `cursos1` (`id`, `nombre`, `descripcion`, `imagen`, `activo`) VALUES
(1, 'Carpinteria', '', 'carpinteria.jpeg', 1),
(2, 'Electricidad', '', 'electricidad.jpeg', 1),
(3, 'Inglés', '', 'ingles.jpg', 1),
(4, 'Electronica', '', 'electronica.jpeg', 1),
(5, 'Fotografía', '', 'fotografia.jpeg', 1),
(6, 'Gatronomía', '', 'gastronomia.jpeg', 1),
(7, 'Prendas', '', 'prendas.jpg', 1),
(8, 'Serigrafía', '', 'serigrafia.jpeg', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cursos1`
--
ALTER TABLE `cursos1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cursos1`
--
ALTER TABLE `cursos1`
  MODIFY `id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
