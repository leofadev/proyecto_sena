-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2022 a las 03:47:03
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
-- Base de datos: `proyecto_sena`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `item`
--

INSERT INTO `item` (`id`, `descripcion`) VALUES
(2, 'identificadores'),
(1, 'roles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetos`
--

CREATE TABLE `objetos` (
  `id` int(11) NOT NULL,
  `fecha` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `cargo` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `dispositivo` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `h_ingreso` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_salida` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `h_salida` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `observacion` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `objetos`
--

INSERT INTO `objetos` (`id`, `fecha`, `nombre`, `cargo`, `dispositivo`, `h_ingreso`, `fecha_salida`, `h_salida`, `observacion`) VALUES
(26, '2022/10/28', 'geovanny', 'aprendiz', 'lenovo-pc', '07:15:05', '2022/10/28', '07:52:34', 'ninguna'),
(27, '2022/10/28', 'pedro', 'instructor', 'lenovo-pc', '07:58:59', '2022/10/28', '07:59:14', 'pack mouse, 2 cargador'),
(30, '2022/10/28', 'melanie', 'aprendiz', 'lenovo-pc', '08:09:09', '2022/10/28', '08:09:31', 'ninguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `tipo_documento` int(11) NOT NULL,
  `documento` int(11) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `apellido` varchar(70) NOT NULL,
  `pass` varchar(70) NOT NULL,
  `rol` int(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `tipo_documento`, `documento`, `correo`, `nombre`, `apellido`, `pass`, `rol`) VALUES
(1, 4, 1041850153, 'pintoleonardo1023@gmail.com', 'leonardo', 'pinto', '1234', 1),
(2, 3, 1041850174, 'luisa@gmail.com', 'luisa', 'fernanda', '12345', 2),
(3, 5, 105972301, 'jhvelez@gmail.com', 'jh', 'velez', '12340', 2),
(4, 4, 136756216, 'bruno@gmail.com', 'bruno', 'perez', '01243', 1),
(5, 3, 1326952475, 'leilu@gmail.com', 'fabio', 'pinto', '0920', 2),
(6, 5, 1392876145, 'maleja@gmail.com', 'maria', 'rueda', '50123', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_item`
--

CREATE TABLE `sub_item` (
  `id` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `descripcion` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sub_item`
--

INSERT INTO `sub_item` (`id`, `id_item`, `descripcion`) VALUES
(1, 1, 'administrador'),
(2, 1, 'usuario'),
(3, 2, 'TI'),
(4, 2, 'CC'),
(5, 2, 'CE');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `descripcion` (`descripcion`);

--
-- Indices de la tabla `objetos`
--
ALTER TABLE `objetos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol` (`rol`),
  ADD KEY `tipo_documento` (`tipo_documento`);

--
-- Indices de la tabla `sub_item`
--
ALTER TABLE `sub_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_item` (`id_item`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `objetos`
--
ALTER TABLE `objetos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `sub_item`
--
ALTER TABLE `sub_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`tipo_documento`) REFERENCES `sub_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personas_ibfk_2` FOREIGN KEY (`rol`) REFERENCES `sub_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sub_item`
--
ALTER TABLE `sub_item`
  ADD CONSTRAINT `sub_item_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
