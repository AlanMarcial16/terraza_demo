-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2023 a las 22:33:20
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id` int(11) NOT NULL,
  `articulo_id` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `fecha_adicion` datetime DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `stock_minimo` int(11) DEFAULT NULL,
  `tiempo_vida_restante` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id`, `articulo_id`, `nombre`, `fecha_adicion`, `stock`, `stock_minimo`, `tiempo_vida_restante`) VALUES
(31, 45, 'Betabel', '2023-05-31 05:21:43', 18, 5, 15),
(32, 46, 'Naranjas', '2023-06-05 19:54:19', 20, 5, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `stock_minimo` int(11) DEFAULT NULL,
  `unidad_medida` varchar(50) DEFAULT NULL,
  `precio_unitario` decimal(10,2) DEFAULT NULL,
  `tiempo_vida` int(11) DEFAULT NULL,
  `fecha_caducidad` date DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `nombre`, `descripcion`, `stock`, `stock_minimo`, `unidad_medida`, `precio_unitario`, `tiempo_vida`, `fecha_caducidad`, `total`) VALUES
(28, 'tomate', 'tomates para preparaciones como ensaladas y salsas', 20, 5, 'KIlogramo', '5.00', 10, '2023-06-09', '100.00'),
(29, 'lechuga', 'lechuga para preparaciones como ensaladas', 5, 1, 'KIlogramo', '30.00', 20, '2023-06-19', '150.00'),
(30, 'manzanas', 'manzanas para preparaciones tales como postres y ensaladas', 20, 5, 'KIlogramo', '9.00', 20, '2023-06-20', '180.00'),
(31, 'mango', 'mango ideal para postres y ensaladas', 15, 5, 'KIlogramo', '8.00', 14, '2023-06-13', '120.00'),
(45, 'Betabel', 'Betabel, ideal para preparaciones como reducciones o ensaladas', 18, 5, 'Kilogramo', '10.00', 15, '2023-06-30', '180.00'),
(46, 'Naranjas', 'Naranjas utilizadas para diferentes preparaciones', 20, 5, 'Kilogramo', '5.00', 10, '2023-06-22', '100.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajach`
--

CREATE TABLE `cajach` (
  `cod_dia` int(11) NOT NULL,
  `montoi` varchar(11) NOT NULL,
  `fecha` date NOT NULL,
  `totale` varchar(11) NOT NULL,
  `totals` varchar(11) NOT NULL,
  `gtotal` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajaop`
--

CREATE TABLE `cajaop` (
  `cod_operacion` int(11) NOT NULL,
  `tipodeoperacion` varchar(150) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `tipocomprobante` varchar(150) NOT NULL,
  `importeentrada` varchar(30) NOT NULL,
  `importesalida` varchar(30) NOT NULL,
  `fecha_hora_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `habitacion` varchar(50) NOT NULL,
  `comensal` varchar(30) NOT NULL,
  `comentario` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id`, `nombre`, `capacidad`, `estado`, `tipo`, `habitacion`, `comensal`, `comentario`) VALUES
(1, 'Mesa 1', 4, 'Disponible', '', '', '', ''),
(2, 'Mesa 2', 2, 'Disponible', '', '', '', ''),
(3, 'Mesa 3', 6, 'Disponible', '', '', '', ''),
(4, 'Mesa 4', 2, 'Disponible', '', '', '', ''),
(5, 'Mesa 5', 2, 'Disponible', '', '', '', ''),
(6, 'Mesa 6', 3, 'Disponible', '', '', '', ''),
(7, 'Mesa 7', 2, 'Disponible', '', '', '', ''),
(8, 'Mesa 8', 2, 'Disponible', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes_currentes`
--

CREATE TABLE `ordenes_currentes` (
  `id` int(11) NOT NULL,
  `mesa` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cantidad` varchar(255) NOT NULL,
  `preciou` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes_finalizadas`
--

CREATE TABLE `ordenes_finalizadas` (
  `id` int(11) NOT NULL,
  `mesa` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cantidad` varchar(255) NOT NULL,
  `preciou` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes_listas`
--

CREATE TABLE `ordenes_listas` (
  `id` int(11) NOT NULL,
  `mesa` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cantidad` varchar(255) NOT NULL,
  `preciou` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenmesa1`
--

CREATE TABLE `ordenmesa1` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cantidad` varchar(255) NOT NULL,
  `preciou` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenmesa2`
--

CREATE TABLE `ordenmesa2` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cantidad` varchar(255) NOT NULL,
  `preciou` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenmesa3`
--

CREATE TABLE `ordenmesa3` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cantidad` varchar(255) NOT NULL,
  `preciou` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenmesa4`
--

CREATE TABLE `ordenmesa4` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cantidad` varchar(255) NOT NULL,
  `preciou` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenmesa5`
--

CREATE TABLE `ordenmesa5` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cantidad` varchar(255) NOT NULL,
  `preciou` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenmesa6`
--

CREATE TABLE `ordenmesa6` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cantidad` varchar(255) NOT NULL,
  `preciou` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenmesa7`
--

CREATE TABLE `ordenmesa7` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cantidad` varchar(255) NOT NULL,
  `preciou` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenmesa8`
--

CREATE TABLE `ordenmesa8` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cantidad` varchar(255) NOT NULL,
  `preciou` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `datos_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`datos_json`)),
  `habitacion` varchar(30) NOT NULL,
  `comensal` varchar(30) NOT NULL,
  `fyh` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(10, 'RecepcionCFv', '$2y$10$Tfw8TTVEBrm9CRWaZUBVfuoZ/oTCx2iN/hMVxUYsNPasCIcUpt2LC', '2023-04-01 11:40:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventadirecta`
--

CREATE TABLE `ventadirecta` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cantidad` varchar(255) NOT NULL,
  `preciou` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articulo_id` (`articulo_id`);

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cajach`
--
ALTER TABLE `cajach`
  ADD PRIMARY KEY (`cod_dia`);

--
-- Indices de la tabla `cajaop`
--
ALTER TABLE `cajaop`
  ADD PRIMARY KEY (`cod_operacion`);

--
-- Indices de la tabla `ordenes_currentes`
--
ALTER TABLE `ordenes_currentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ordenes_finalizadas`
--
ALTER TABLE `ordenes_finalizadas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ordenes_listas`
--
ALTER TABLE `ordenes_listas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ordenmesa1`
--
ALTER TABLE `ordenmesa1`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ordenmesa2`
--
ALTER TABLE `ordenmesa2`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ordenmesa3`
--
ALTER TABLE `ordenmesa3`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ordenmesa4`
--
ALTER TABLE `ordenmesa4`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ordenmesa5`
--
ALTER TABLE `ordenmesa5`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ordenmesa6`
--
ALTER TABLE `ordenmesa6`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ordenmesa7`
--
ALTER TABLE `ordenmesa7`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ordenmesa8`
--
ALTER TABLE `ordenmesa8`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indices de la tabla `ventadirecta`
--
ALTER TABLE `ventadirecta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `cajach`
--
ALTER TABLE `cajach`
  MODIFY `cod_dia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cajaop`
--
ALTER TABLE `cajaop`
  MODIFY `cod_operacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ordenes_currentes`
--
ALTER TABLE `ordenes_currentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ordenes_finalizadas`
--
ALTER TABLE `ordenes_finalizadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ordenes_listas`
--
ALTER TABLE `ordenes_listas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `ordenmesa1`
--
ALTER TABLE `ordenmesa1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT de la tabla `ordenmesa2`
--
ALTER TABLE `ordenmesa2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `ordenmesa3`
--
ALTER TABLE `ordenmesa3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `ordenmesa4`
--
ALTER TABLE `ordenmesa4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `ordenmesa5`
--
ALTER TABLE `ordenmesa5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `ordenmesa6`
--
ALTER TABLE `ordenmesa6`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `ordenmesa7`
--
ALTER TABLE `ordenmesa7`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `ordenmesa8`
--
ALTER TABLE `ordenmesa8`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ventadirecta`
--
ALTER TABLE `ventadirecta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `actividad_ibfk_1` FOREIGN KEY (`articulo_id`) REFERENCES `articulos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
