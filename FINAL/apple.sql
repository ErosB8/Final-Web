-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2023 a las 04:39:24
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `apple`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `color` varchar(32) NOT NULL,
  `precio` float NOT NULL,
  `foto` varchar(32) NOT NULL DEFAULT 'nulo.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `color`, `precio`, `foto`) VALUES
(1, 'iPhone 15', 'Titanio', 1100, '15titanio.jpg'),
(2, 'iPhone 15', 'Titanio azul', 1100, '15titanioazul.jpg'),
(3, 'iPhone 15', 'Titanio Blanco', 1100, '15titanioblanco.jpg'),
(4, 'iPhone SE', 'Medianoche', 600, 'SEmedianoche.jpg'),
(5, 'iPhone SE', 'Blanco', 600, 'SEblanco.jpg'),
(6, 'iPhone SE', 'Rojo', 600, 'SErojo.jpg'),
(7, 'Apple Watch', 'Rosa', 350, 'AWrosa.jpg'),
(8, 'Apple Watch', 'Plateado', 300, 'AWplateado.jpg'),
(9, 'Apple', 'Medianoche', 400, 'AWmedianoche.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(42) NOT NULL,
  `USUARIO` varchar(32) NOT NULL,
  `CONTRASEÑA` varchar(32) NOT NULL,
  `NIVEL` varchar(32) NOT NULL,
  `ESTADO` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `EMAIL`, `USUARIO`, `CONTRASEÑA`, `NIVEL`, `ESTADO`) VALUES
(30, 'eros0088@hotmail.com', 'Eros', '04afcdb613c3e22bd2ced0c992ddf277', 'Admin', 'Activo'),
(31, 'biomike72@hotmail.com', 'Miki', '202cb962ac59075b964b07152d234b70', 'Usuario', 'Activo'),
(32, 'fourcadeviviana@hotmail.com', 'vivi', '9e3669d19b675bd57058fd4664205d2a', 'Usuario', 'Ban'),
(33, 'a@a.com', 'a', '0cc175b9c0f1b6a831c399e269772661', 'Usuario', 'Ban'),
(34, 'b@b.com', 'b', '92eb5ffee6ae2fec3ad71c777531578f', 'Usuario', 'Activo'),
(35, 'c@c.com', 'c', '4a8a08f09d37b73795649038408b5f33', 'Admin', 'Activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
