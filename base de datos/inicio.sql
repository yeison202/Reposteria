-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-10-2023 a las 07:01:17
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
-- Base de datos: `inicio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `id_transaccion` varchar(20) NOT NULL,
  `fecha` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  `email` varchar(70) NOT NULL,
  `id_cliente` varchar(20) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id`, `id_transaccion`, `fecha`, `status`, `email`, `id_cliente`, `total`) VALUES
(41, '5MU96577AS957064H', '2023-10-16 18:27:28', 'COMPLETED', 'sb-7nooa27585471@personal.example.com', 'jeferson', 59.00),
(42, '3UP83952NG568991N', '2023-10-16 18:27:46', 'COMPLETED', 'sb-7nooa27585471@personal.example.com', 'jeferson', 67.85),
(43, '9K983011SN434584M', '2023-10-16 18:28:24', 'COMPLETED', 'sb-7nooa27585471@personal.example.com', 'pau', 59.00),
(44, '1CM01485BF2518028', '2023-10-17 03:02:48', 'COMPLETED', 'sb-7nooa27585471@personal.example.com', 'jeferson', 70.00),
(45, '0T196695NC293071Y', '2023-10-17 03:09:30', 'COMPLETED', 'sb-7nooa27585471@personal.example.com', 'jeferson', 59.00),
(46, '7NN72507U0255930P', '2023-10-17 03:11:45', 'COMPLETED', 'sb-7nooa27585471@personal.example.com', 'jeferson', 70.00),
(47, '19P25873PG0805243', '2023-10-17 03:13:13', 'COMPLETED', 'sb-7nooa27585471@personal.example.com', 'jeferson', 70.00),
(48, '0VY47955TY506570X', '2023-10-17 16:42:21', 'COMPLETED', 'sb-7nooa27585471@personal.example.com', 'jeferson', 58.75),
(49, '5XK46618EJ343223G', '2023-10-18 04:38:03', 'COMPLETED', 'Leolnnnorjs43@hide.biz.st', 'pau', 118.75),
(50, '0SG08386M65391046', '2023-10-24 16:52:10', 'COMPLETED', 'sb-7nooa27585471@personal.example.com', 'pau', 117.50),
(51, '2VG19951RF577660L', '2023-10-25 01:41:35', 'COMPLETED', 'sb-7nooa27585471@personal.example.com', 'leonel12', 165.50),
(52, '81M96489B59326333', '2023-10-25 01:41:53', 'COMPLETED', 'sb-7nooa27585471@personal.example.com', 'leonel12', 41.70),
(53, '7M099914VT744573H', '2023-10-25 01:43:22', 'COMPLETED', 'yeisonlp841@gmail.com', 'leonel12', 72.90);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`id`, `id_compra`, `id_producto`, `titulo`, `precio`, `cantidad`) VALUES
(50, 41, 43, 'Pastel de arcoiris', 35.00, 1),
(51, 41, 44, 'Pastel de stranger things', 24.00, 1),
(52, 42, 42, 'Pastel de cumpleaños  psicodélico', 23.75, 1),
(53, 42, 45, 'Pastel de patitos', 20.70, 1),
(54, 42, 48, 'Pastel de cumpleaños corazón', 23.40, 1),
(55, 43, 43, 'Pastel de arcoiris', 35.00, 1),
(56, 43, 44, 'Pastel de stranger things', 24.00, 1),
(57, 44, 43, 'Pastel de arcoiris', 35.00, 2),
(58, 45, 43, 'Pastel de arcoiris', 35.00, 1),
(59, 45, 44, 'Pastel de stranger things', 24.00, 1),
(60, 46, 43, 'Pastel de arcoiris', 35.00, 2),
(61, 47, 43, 'Pastel de arcoiris', 35.00, 2),
(62, 48, 43, 'Pastel de arcoiris', 35.00, 1),
(63, 48, 42, 'Pastel de cumpleaños  psicodélico', 23.75, 1),
(64, 49, 42, 'Pastel de cumpleaños  psicodélico', 23.75, 5),
(65, 50, 42, 'Pastel de cumpleaños  psicodélico', 23.75, 2),
(66, 50, 43, 'Pastel de arcoiris', 35.00, 2),
(67, 51, 42, 'Pastel de cumpleaños  psicodélico', 23.75, 2),
(68, 51, 43, 'Pastel de arcoiris', 35.00, 2),
(69, 51, 44, 'Pastel de stranger things', 24.00, 2),
(70, 52, 45, 'Pastel de patitos', 20.70, 1),
(71, 52, 46, 'Pastel de baby shower', 21.00, 1),
(72, 53, 51, 'Torta Matilda', 28.50, 1),
(73, 53, 48, 'Pastel de cumpleaños corazón', 23.40, 1),
(74, 53, 49, 'Pastel de cumpleaños ', 21.00, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario_blog`
--

CREATE TABLE `formulario_blog` (
  `id_formulario` int(11) NOT NULL,
  `Titulo` varchar(35) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Comentario` text NOT NULL,
  `Imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `formulario_blog`
--

INSERT INTO `formulario_blog` (`id_formulario`, `Titulo`, `Fecha`, `Comentario`, `Imagen`) VALUES
(177, 'pastel de Patitos', '2023-10-17 19:30:27', '35gr. de fondant amarillo para el cuerpo: La cabeza son 10gr. El cuerpo 15.gr Cada ala pesa 2,5gr. (+/-) por que mi pesa no calcula los medios. 2 gr. de fondant naranja. Un pellizco de negro (casi ni llega al gramo) 3-4gr. de fondant blanco para ojos y flor o lazo (como si quieres hacerle un sombrero o un gorro de invierno....) Pinturas en polvo (comestibles) para pintar los ojos y los coloretes.', 'Imagen4.png'),
(181, 'pastel de arandanos', '2023-10-25 01:27:47', '35gr. de fondant amarillo para el cuerpo: La cabeza son 10gr. \r\nEl cuerpo 15.gr Cada ala pesa 2,5gr. (+/-) por que mi pesa no calcula los medios.\r\n 2 gr. de fondant naranja. Un pellizco de negro (casi ni llega al gramo).\r\n3-4gr. de fondant blanco para ojos y flor o lazo (como si quieres hacerle un sombrero o un gorro de invierno....) Pinturas en polvo (comestibles) para pintar los ojos y los coloretes.', 'imagen15.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inicio2`
--

CREATE TABLE `inicio2` (
  `id_registro` int(11) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `contraseña` varchar(40) NOT NULL,
  `id_blog` int(11) DEFAULT NULL,
  `id_productos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `inicio2`
--

INSERT INTO `inicio2` (`id_registro`, `usuario`, `contraseña`, `id_blog`, `id_productos`) VALUES
(115, 'adriana', 'adriana', NULL, NULL),
(148, '', '', NULL, 42),
(149, '', '', NULL, 43),
(150, '', '', NULL, 44),
(151, '', '', NULL, 45),
(152, '', '', NULL, 46),
(153, '', '', NULL, 47),
(154, '', '', NULL, 48),
(155, '', '', NULL, 49),
(156, '', '', NULL, 50),
(162, '', '', NULL, 51),
(163, '', '', 177, NULL),
(165, 'annita', '123567', NULL, NULL),
(166, '', '', NULL, 52),
(169, '', '', 181, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inicio3`
--

CREATE TABLE `inicio3` (
  `id_inicio` int(11) NOT NULL,
  `usuario_inicio` varchar(40) NOT NULL,
  `contraseña_inicio` varchar(40) NOT NULL,
  `id_compra` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `inicio3`
--

INSERT INTO `inicio3` (`id_inicio`, `usuario_inicio`, `contraseña_inicio`, `id_compra`) VALUES
(21, 'pau', '123456', NULL),
(22, 'pepito', 'pepito', NULL),
(23, 'pepito2', 'pepito2', NULL),
(24, 'sarahy', '12345', NULL),
(25, 'leonel12', '123456', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descuento` tinyint(2) NOT NULL DEFAULT 0,
  `activo` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(400) NOT NULL,
  `producto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `titulo`, `precio`, `descuento`, `activo`, `Fecha`, `descripcion`, `imagen`, `producto_id`) VALUES
(42, 'Pastel de cumpleaños  psicodélico', 25.00, 5, 1, '2023-10-14', 'Este pastel está hecho con una masa de chocolate rica y húmeda, rellena con una crema de fresas frescas y cubierta con un glaseado de chocolate blanco. Es el pastel perfecto para cualquier ocasión especial.\r\n', 'Imagen1.png', NULL),
(43, 'Pastel de arcoiris', 35.00, 0, 1, '2023-10-14', 'Este pastel está hecho con una masa de vainilla suave y esponjosa, rellena con una crema chantilly dulce y cremosa y cubierta con un glaseado de vainilla. Es el pastel perfecto para cualquier ocasión.\r\n', 'Imagen2.png', NULL),
(44, 'Pastel de stranger things', 30.00, 20, 1, '2023-10-14', 'Este pastel está hecho con una masa de vainilla suave y esponjosa, cubierta con un glaseado de fondant blanco. Los nombres del cumpleañero. ', 'Imagen3.png', NULL),
(45, 'Pastel de patitos', 23.00, 10, 1, '2023-10-14', 'Este pastel está hecho con una masa de chocolate y vainilla, teñida de rojo intenso con colorante alimentario. La capa superior está cubierta con un glaseado de queso crema cremoso. Es el pastel perfecto para cualquier ocasión especial.\r\n', 'Imagen4.png', NULL),
(46, 'Pastel de baby shower', 21.00, 0, 1, '2023-10-14', 'Este pastel está hecho con una masa de zanahoria húmeda y especiada, con trozos de zanahoria y nueces. La capa superior está cubierta con un glaseado de queso crema cremoso. Es el pastel perfecto para el otoño.\r\n', 'Imagen5.png', NULL),
(47, 'Pastel de los rugrats', 24.00, 0, 1, '2023-10-14', 'Este pastel está hecho con una masa de chocolate blanco suave y esponjosa, cubierta con un glaseado de chocolate blanco cremoso. Es el pastel perfecto para cualquier ocasión especial.\r\n', 'Imagen6.png', NULL),
(48, 'Pastel de cumpleaños corazón', 26.00, 10, 1, '2023-10-14', 'Este pastel está hecho con una masa de chocolate rica y húmeda, rellena con una crema de Oreo cremosa y cubierta con una cobertura de chocolate. Es el pastel perfecto para los amantes del chocolate.\r\n', 'Imagen7.png', NULL),
(49, 'Pastel de cumpleaños ', 21.00, 0, 1, '2023-10-14', 'Este pastel está hecho con una masa de vainilla suave y esponjosa, rellena con fresas frescas y cubierta con una capa de crema batida y frutos rojos frescos. Es el pastel perfecto para cualquier ocasión especial.\r\n', 'Imagen8.png', NULL),
(50, 'Pastel de cumpleaños calendario', 28.00, 0, 1, '2023-10-14', 'Este pastel está hecho con una masa de vainilla suave y esponjosa, cubierta con un glaseado de colores. El nombre y la edad del cumpleañero se pueden decorar con glaseado o fondant. Es el pastel perfecto para celebrar una ocasión especial.\r\n', 'Imagen9.png', NULL),
(51, 'Torta Matilda', 30.00, 5, 1, '2023-10-17', 'Torta rellena de chocolate', 'Imagen10.png', NULL),
(52, 'pastelito', 99.00, 45, 1, '2023-10-24', 'pastel muy rico, comprelo', 'pngtree-birthday-cake-with-a-crown-png-image_6586441.png', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id` int(100) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `fecha` date NOT NULL,
  `correo` varchar(40) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `nombre`, `apellido`, `telefono`, `fecha`, `correo`, `usuario_id`) VALUES
(59, 'paulina carmen', 'castillo gomez', '04161597700', '2002-05-17', 'yeisonlp841@gmail.com', 46),
(60, 'Luisito', 'Comunica', '22222222222', '2023-10-26', 'aaaaaa@a.a', 49),
(62, 'Anna', 'Rojas', '04123456789', '2001-08-03', 'anita@gmail.com', 51),
(63, 'Sarahy', 'Chirinos', '04125309919', '2000-01-26', 'sarahybcg@gmail.com', 52),
(64, 'yeison', 'perez', '04125309919', '2001-05-05', 'yeisonlp841@gmail.com', 53);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_cliente`, `id_admin`) VALUES
(46, NULL, 115),
(48, 21, NULL),
(49, 22, NULL),
(50, 23, NULL),
(51, NULL, 165),
(52, 24, NULL),
(53, 25, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `formulario_blog`
--
ALTER TABLE `formulario_blog`
  ADD PRIMARY KEY (`id_formulario`);

--
-- Indices de la tabla `inicio2`
--
ALTER TABLE `inicio2`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `id_blog` (`id_blog`),
  ADD KEY `id_productos` (`id_productos`);

--
-- Indices de la tabla `inicio3`
--
ALTER TABLE `inicio3`
  ADD PRIMARY KEY (`id_inicio`),
  ADD KEY `id_compra` (`id_compra`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `formulario_blog`
--
ALTER TABLE `formulario_blog`
  MODIFY `id_formulario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT de la tabla `inicio2`
--
ALTER TABLE `inicio2`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT de la tabla `inicio3`
--
ALTER TABLE `inicio3`
  MODIFY `id_inicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inicio2`
--
ALTER TABLE `inicio2`
  ADD CONSTRAINT `inicio2_ibfk_1` FOREIGN KEY (`id_blog`) REFERENCES `formulario_blog` (`id_formulario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inicio2_ibfk_2` FOREIGN KEY (`id_productos`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `registro_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `inicio2` (`id_registro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `inicio3` (`id_inicio`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
