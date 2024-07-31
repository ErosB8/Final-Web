-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-07-2024 a las 06:23:59
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
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `carrito_id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total_carrito` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Teléfono celular', 'Los teléfonos celulares, o smartphones, son dispositivos portátiles multifuncionales que permiten comunicación, navegación por internet, fotografía, y acceso a una amplia gama de aplicaciones, combinando potencia y versatilidad en un solo aparato.'),
(2, 'Reloj', 'Los relojes inteligentes Apple Watch combinan un diseño elegante con avanzadas funciones de seguimiento de salud y actividad, notificaciones inteligentes, y conectividad con iPhone, ofreciendo una experiencia tecnológica integral en la muñeca.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `mail` varchar(60) NOT NULL,
  `problema` varchar(255) NOT NULL,
  `carga` varchar(255) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `nombre`, `apellido`, `mail`, `problema`, `carga`, `fecha`) VALUES
(1, 'pity', 'borja', 'pity@mail.com', 'Otro', '1722219021.jpg', '2024-07-29 02:10:21'),
(2, 'Eros', 'Bianchini', 'eros@gmail.com', 'Problema técnico con mi AppleWatch', '1722393555.jpg', '2024-07-31 02:39:15'),
(3, 'Eros', 'Bianchini', 'eros@gmail.com', 'Problema técnico con mi AppleWatch', '1722393870.jpg', '2024-07-31 02:44:30'),
(4, 'Eros', 'Bianchini', 'eros@gmail.com', 'Problema técnico con mi AppleWatch', '1722393878.jpg', '2024-07-31 02:44:38'),
(5, 'Eros', 'Bianchini', 'eros@gmail.com', 'Problema técnico con mi AppleWatch', '1722394060.jpg', '2024-07-31 02:47:40'),
(6, 'Eros', 'Bianchini', 'eros@gmail.com', 'Problema técnico con mi AppleWatch', '1722394098.jpg', '2024-07-31 02:48:18'),
(7, 'Eros', 'Bianchini', 'eros@gmail.com', 'Problema técnico con mi AppleWatch', '1722394121.jpg', '2024-07-31 02:48:41'),
(8, 'Eros', 'Bianchini', 'eros@gmail.com', 'Consulta sobre garantía', '1722396308.jpg', '2024-07-31 03:25:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `nombre`) VALUES
(1, 'Admin'),
(2, 'Usuario'),
(3, 'Ban');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `color` varchar(32) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `foto` varchar(32) NOT NULL DEFAULT 'nulo.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `color`, `precio`, `categoria_id`, `foto`) VALUES
(1, 'iPhone', 'El iPhone 15 en color titanio combina un diseño sofisticado con la última tecnología, ofreciendo durabilidad y rendimiento superior en un elegante acabado metálico.', 'Titanio', 1100.00, 1, '15titanio.jpg'),
(2, 'iPhone 15', 'El iPhone 15 en titanio azul combina durabilidad y tecnología avanzada en un elegante acabado metálico.', 'Titanio azul', 1100.00, 1, '15titanioazul.jpg'),
(3, 'iPhone 15', 'El iPhone 15 en titanio blanco ofrece durabilidad y tecnología avanzada con un acabado elegante y sofisticado.', 'Titanio Blanco', 1100.00, 1, '15titanioblanco.jpg'),
(4, 'iPhone SE', 'El iPhone SE en color medianoche combina rendimiento potente con un diseño compacto y elegante.', 'Medianoche', 600.00, 1, 'SEmedianoche.jpg'),
(5, 'iPhone SE', 'El iPhone SE en color blanco ofrece un rendimiento potente en un diseño compacto y elegante.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Blanco', 600.00, 1, 'SEblanco.jpg'),
(6, 'iPhone SE', 'El iPhone SE en color rojo combina un rendimiento potente con un diseño compacto y vibrante.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Rojo', 600.00, 1, 'SErojo.jpg'),
(7, 'Apple Watch', 'El Apple Watch en color rosa combina tecnología avanzada con un diseño elegante y femenino.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Rosa', 350.00, 2, 'AWrosa.jpg'),
(8, 'Apple Watch', 'El Apple Watch en color plateado ofrece tecnología avanzada con un diseño elegante y versátil.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Plateado', 300.00, 2, 'AWplateado.jpg'),
(9, 'Apple Watch', 'El Apple Watch en color medianoche combina tecnología avanzada con un diseño elegante y moderno.', 'Medianoche', 400.00, 2, 'AWmedianoche.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `estado_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `correo`, `contrasena`, `estado_id`) VALUES
(2, 'Diego', 'diego@diego.com', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(5, 'leo', 'leo@gmail.com', '202cb962ac59075b964b07152d234b70', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`carrito_id`),
  ADD KEY `producto_id` (`id_producto`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `estado_id` (`estado_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `carrito_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
