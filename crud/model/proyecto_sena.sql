-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2022 a las 01:23:11
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
(5, 'cargo'),
(3, 'ejemplo'),
(4, 'ejemplo0000'),
(1, 'roles'),
(2, 'tipo documento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetos`
--

CREATE TABLE `objetos` (
  `id` int(11) NOT NULL,
  `vigiliante` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `documento` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `cargo` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `dispositivo` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `h_ingreso` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_salida` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `h_salida` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `observacion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `objetos`
--

INSERT INTO `objetos` (`id`, `vigiliante`, `documento`, `fecha`, `nombre`, `apellido`, `cargo`, `dispositivo`, `h_ingreso`, `fecha_salida`, `h_salida`, `observacion`) VALUES
(26, '', '', '2022/10/28', 'geovanny', '', 'aprendiz', 'lenovo-pc', '07:15:05', '2022/11/08', '05:47:14', 'varias'),
(40, '', '1007199208', '2022/11/08', 'del valle', 'maria', 'aprendiz', 'lenovo-pc', '07:01:12', '2022/11/09', '11:31:27', 'ninguna'),
(44, '', '1007199208', '2022/11/09', 'del valle', 'maria', 'aprendiz', 'lenovo-pc', '12:35:11', NULL, NULL, 'sin cargador'),
(45, '', '1007199208', '2022/11/09', 'del valle', 'maria', 'aprendiz', 'lenovo-pc', '01:42:38', NULL, NULL, NULL),
(46, '', '1007199208', '2022/11/09', 'del valle', 'maria', 'aprendiz', 'lenovo-pc', '01:42:52', NULL, NULL, NULL),
(47, '', '1007199208', '2022/11/09', 'del valle', 'maria', 'aprendiz', 'lenovo-pc', '01:56:49', NULL, NULL, NULL),
(48, '', '1007199208', '2022/11/09', 'del valle', 'maria', 'aprendiz', 'lenovo-pc', '01:57:27', NULL, NULL, NULL),
(49, '', '1007199208', '2022/11/09', 'del valle', 'maria', 'aprendiz', 'lenovo-pc', '01:58:20', NULL, NULL, NULL),
(50, '', '1007199208', '2022/11/09', 'del valle', 'maria', 'aprendiz', 'lenovo-pc', '02:17:32', NULL, NULL, NULL),
(51, '', '1007199208', '2022/11/09', 'del valle', 'maria', 'aprendiz', 'lenovo-pc', '02:17:43', NULL, NULL, NULL),
(52, '', '1007199208', '2022/11/09', 'del valle', 'maria', 'aprendiz', 'lenovo-pc', '02:18:26', NULL, NULL, NULL),
(53, '', '1007199208', '2022/11/09', 'del valle', 'maria', 'aprendiz', 'lenovo-pc', '02:18:34', NULL, NULL, NULL),
(54, '', '1007199208', '2022/11/09', 'del valle', 'maria', 'aprendiz', 'gffffff', '02:44:52', NULL, NULL, NULL),
(55, '', '1007199208', '2022/11/09', 'del valle', 'maria', 'aprendiz', 'gffffff', '02:50:29', NULL, NULL, NULL),
(56, '', '1007199208', '2022/11/09', 'del valle', 'maria', 'aprendiz', 'gffffff', '02:51:09', NULL, NULL, NULL);

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
  `pass` varchar(300) NOT NULL,
  `rol` int(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `tipo_documento`, `documento`, `correo`, `nombre`, `apellido`, `pass`, `rol`) VALUES
(31, 4, 1326952475, 'greogo@gmail.com', 'paula', 'Pinto', '$2y$10$Vxz.nDc0AV/tS481dCzaLe0av97pUFBvCB/1GmtNeFR7UZFimvLqC', 2),
(41, 5, 1007199208, 'grpaa@gmail.com', 'maria', 'del valle', '$2y$10$xNzbqNGRjPxhRs6QtmnN5eG0tYtdJLRyVdlbLOGdPUTSNxJ6hN2ZG', 1),
(42, 4, 1122222, 'geovannyroman2019@gmail.com ', 'Geovanny', 'Camargo', '$2y$10$gRQnRjNoGsuXpaKvlNef0.3vYYKNvDI2pdPbxCfFqJu48ydMvOZVq', 2);

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
(2, 1, 'vigilante'),
(3, 2, 'TI'),
(4, 2, 'CC'),
(5, 2, 'CE'),
(6, 1, 'instructor'),
(8, 1, 'visitante'),
(10, 2, ' pasaporte'),
(11, 1, ' policia');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `objetos`
--
ALTER TABLE `objetos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `sub_item`
--
ALTER TABLE `sub_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
