-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2025 a las 16:38:47
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `main`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `ID` int(6) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `password` varchar(15) NOT NULL,
  `Municipio` varchar(50) DEFAULT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `Taller` varchar(100) DEFAULT NULL,
  `codigo_recuperacion` varchar(10) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL,
  `Notificacion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`ID`, `Nombre`, `Correo`, `password`, `Municipio`, `Telefono`, `Taller`, `codigo_recuperacion`, `Estado`, `Notificacion`) VALUES
(1, 'Acali Alexander hernandez escalona', 'alex1108hdz@gmail.com', '', 'Almoloya de Juarez', '7262461963', 'Carpinteria', NULL, 0, ''),
(2, 'DanielF', 'danielfg788@gmail.com', 'unodostres', NULL, '7226409468', NULL, NULL, NULL, ''),
(3, 'David', 'soydavid@gmail.com', 'dostrescuatro', '', '7226409466', NULL, NULL, NULL, ''),
(4, 'Chema', 'soychema@gmail.com', '2345', 'Chapultepec', '7226456354', NULL, NULL, NULL, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Nombre` (`Nombre`),
  ADD UNIQUE KEY `Correo` (`Correo`),
  ADD UNIQUE KEY `Telefono` (`Telefono`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
