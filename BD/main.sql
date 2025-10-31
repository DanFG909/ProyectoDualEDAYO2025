-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2025 a las 00:39:47
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
-- Base de datos: `main`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tipo` enum('ine','comprobante') NOT NULL,
  `nombre_original` varchar(255) NOT NULL,
  `tipo_mime` varchar(100) NOT NULL,
  `contenido` longblob NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Informacion` text NOT NULL,
  `Modalidad` varchar(20) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `Nombre`, `Informacion`, `Modalidad`, `fecha_creacion`) VALUES
(1, 'Carpinteria', 'Curso de carpinteria', 'CEM', '2025-10-13 17:24:26'),
(2, 'ELECTRONICA', 'CURSO DE ELCTRONICA', 'CAE', '2025-10-13 17:24:26'),
(3, 'INGLES', 'CURSO DE INGLES', 'CEA', '2025-10-13 17:25:14'),
(4, 'GASTRONOMIA', 'CURSO DE GASTRONOMIA', 'CAE', '2025-10-13 17:25:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_cursos`
--

CREATE TABLE `imagenes_cursos` (
  `id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `nombre_original` varchar(255) DEFAULT NULL,
  `tipo_mime` varchar(100) DEFAULT NULL,
  `contenido` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `id` int(10) NOT NULL,
  `CURP` varchar(20) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Correo` varchar(200) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Periodo` varchar(100) NOT NULL,
  `Modalidad` varchar(100) NOT NULL,
  `Forma_de_Pago` varchar(50) NOT NULL,
  `Documentos` varchar(200) NOT NULL,
  `Estatus` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`id`, `CURP`, `Nombre`, `Correo`, `Telefono`, `Periodo`, `Modalidad`, `Forma_de_Pago`, `Documentos`, `Estatus`) VALUES
(3, 'Ejemplo de curp 2', 'Pacoo', 'Alguien@ejemplo.com', '7293701356', 'Mensual', 'CEM', 'efectivo', 'no hay', 1),
(5, 'CURP 2', 'JUANITO', 'JUANITO@GMAIL.COM', '729370156', 'MENSUAL', 'CEM', 'efectivo', 'SI HAY', 1),
(6, 'CURP3', 'PEÑANIETO', 'PEÑA@NIETO.COM', '598598', 'MENSUAL', 'CAE', 'NO HAY', 'NO', 1),
(7, 'CURP 2', 'JUANES', 'JUANES@GMAIL.COM', '729370156', 'Anual', 'CEM', 'efectivo', 'SI HAY', 1),
(8, 'CURP3', 'FORD', 'FORD@GMAILCOM', '598598', 'Anual', 'CAE', 'NO HAY', 'NO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `ID` int(6) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Municipio` varchar(50) DEFAULT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `Taller` varchar(100) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL,
  `Notificacion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`ID`, `Nombre`, `Correo`, `Municipio`, `Telefono`, `Taller`, `Estado`, `Notificacion`) VALUES
(1, 'Acali Alexander hernandez escalona', 'alex1108hdz@gmail.com', 'Almoloya de Juarez', '7262461963', 'Carpinteria', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_admin`
--

CREATE TABLE `usuarios_admin` (
  `id` int(10) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `Correo` varchar(250) NOT NULL,
  `Tipo` varchar(20) NOT NULL DEFAULT 'Normal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios_admin`
--

INSERT INTO `usuarios_admin` (`id`, `Nombre`, `Apellidos`, `Correo`, `Tipo`) VALUES
(1, 'Juan', 'Garcia Mendez', 'Alguien@ejemplo.com', 'Administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes_cursos`
--
ALTER TABLE `imagenes_cursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curso_id` (`curso_id`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Nombre` (`Nombre`),
  ADD UNIQUE KEY `Correo` (`Correo`),
  ADD UNIQUE KEY `Telefono` (`Telefono`);

--
-- Indices de la tabla `usuarios_admin`
--
ALTER TABLE `usuarios_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Nombre_2` (`Nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `imagenes_cursos`
--
ALTER TABLE `imagenes_cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios_admin`
--
ALTER TABLE `usuarios_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD CONSTRAINT `archivos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`) ON DELETE CASCADE;

--
-- Filtros para la tabla `imagenes_cursos`
--
ALTER TABLE `imagenes_cursos`
  ADD CONSTRAINT `imagenes_cursos_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
