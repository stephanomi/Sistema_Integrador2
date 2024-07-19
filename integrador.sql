-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-07-2024 a las 21:41:39
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
-- Base de datos: `integrador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `tipo_documento` varchar(50) DEFAULT NULL,
  `numero_documento` varchar(50) DEFAULT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `alias` varchar(50) DEFAULT NULL,
  `numero_celular` varchar(20) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `contraseña` varchar(255) DEFAULT NULL,
  `escuela` varchar(100) DEFAULT NULL,
  `tipo_usuario` varchar(20) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `operacion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `auditoria`
--

INSERT INTO `auditoria` (`id`, `usuario_id`, `tipo_documento`, `numero_documento`, `nombres`, `apellidos`, `alias`, `numero_celular`, `correo`, `contraseña`, `escuela`, `tipo_usuario`, `fecha`, `operacion`) VALUES
(7, 23, 'DNI', '72705936', 'Maximiliano', 'Ulloa Canales', NULL, '902078305', 'maxi@gmail.com', '$2y$10$vFIaKuagw3bxXKd4dl2VgeuaMJBOPumz7whJR/2iUIoIJO5kTC6t.', 'San Marcos', 'docente', '2024-07-04 21:47:45', 'DELETE'),
(8, 24, 'DNI', '72705937', 'Daniel Canales', 'Ulloa Canales', 'Tigre', '902078305', 'lovoseduardo@gmail.com', '$2y$10$u0UhOIXBLszUeLRqgf00F.Gdd4UFrFgCzBaQdouVcHCukK3wKnkKK', 'Ingenieros Uni', 'admin', '2024-07-05 00:51:51', 'UPDATE'),
(9, 24, 'DNI', '72705937', 'Daniel Aleja', 'Ulloa Canales', 'Tigre', '902078305', 'lovoseduardo@gmail.com', '$2y$10$u0UhOIXBLszUeLRqgf00F.Gdd4UFrFgCzBaQdouVcHCukK3wKnkKK', 'Ingenieros Uni', 'admin', '2024-07-05 00:51:56', 'UPDATE'),
(10, 26, 'DNI', '75919420', 'Estefany', 'Castillo', 'Tefa', '90278305', 'tega@gmail.com', '$2y$10$K7IKcs8t0CP3SbWkCP44Cu1NHHTBONsZSeKuowZbHFEipy1W2u8M6', 'Ingenieros Uni', 'alumno', '2024-07-05 00:56:14', 'INSERT'),
(12, 27, 'DNI', '75919420', 'Estefany', 'Castillo', 'Tefa', '90278305', 'estefany@gmail.com', '$2y$10$pD1FCeHCkkqNUlWidoJKy.GAQIw7J7yzDSW/j52oRoLOsj7pBnLyu', 'Ingenieros Uni', 'alumno', '2024-07-05 01:12:41', 'INSERT'),
(13, 27, 'DNI', '75919420', 'Estefany', 'Castillo', 'Tefa', '90278305', 'estefany@gmail.com', '$2y$10$pD1FCeHCkkqNUlWidoJKy.GAQIw7J7yzDSW/j52oRoLOsj7pBnLyu', 'Ingenieros Uni', 'alumno', '2024-07-05 01:13:16', 'UPDATE'),
(14, 27, 'DNI', '75919420', 'Estefany Nahomy', 'Castillo', 'Tefa', '90278305', 'estefany@gmail.com', '$2y$10$pD1FCeHCkkqNUlWidoJKy.GAQIw7J7yzDSW/j52oRoLOsj7pBnLyu', 'Ingenieros Uni', 'admin', '2024-07-05 01:13:34', 'DELETE'),
(15, 24, 'DNI', '72705937', 'Daniel Alejandro', 'Ulloa Canales', 'Tigre', '902078305', 'lovoseduardo@gmail.com', '$2y$10$u0UhOIXBLszUeLRqgf00F.Gdd4UFrFgCzBaQdouVcHCukK3wKnkKK', 'Ingenieros Uni', 'admin', '2024-07-14 19:54:24', 'UPDATE'),
(16, 24, 'DNI', '72705937', 'Daniel Alejandro', 'Ulloa Canales', 'Tigre', '902078305', 'lovoseduardo@gmail.com', '$2y$10$u0UhOIXBLszUeLRqgf00F.Gdd4UFrFgCzBaQdouVcHCukK3wKnkKK', 'Ingenieros Uni', 'docente', '2024-07-14 19:57:04', 'UPDATE'),
(17, 29, 'DNI', '72705932', 'Daniel', 'Ulloa', 'Pato', '90278305', 'lovoseduardo@gmail.com', '$2y$10$DvspAGzrdRt2QS6CijMXYe66qAs2oe5h58rriZbsmulHmDHpYD0AC', 'Ingenieros Uni', 'alumno', '2024-07-14 19:57:16', 'INSERT'),
(18, 30, 'DNI', '72705931', 'Leonel', 'Smith', 'Perro', '90278305', 'sven.2004.24@gmail.com', '$2y$10$l.lahuTrwrUoTOQ3cCGZIeJjjxpc6rQIsnLPGrvATQs4VlDSpptHC', 'Ingenieros Uni', 'alumno', '2024-07-14 20:59:18', 'INSERT'),
(19, 31, 'DNI', '72705930', 'Leonel', 'Smith', 'Perro', '90278305', 'daniel@gmail.com', '$2y$10$KDqvUbssC0N5U0EhtuLuEu2mxwcF2IH7HdsyxXKRw.eAA3t2b9XD2', 'Ingenieros Uni', 'alumno', '2024-07-15 15:47:41', 'INSERT'),
(22, 22, 'DNI', '18187970', 'Yony', 'Castill', 'Kito', '902078305', 'kito@gmail.com', '$2y$10$OS7ijBWNujcReshvc556uu98bVPSyTGBjur2/GY9xfaat7Fe11fZm', 'Ingenierso Uni', 'admin', '2024-07-15 18:41:42', 'UPDATE'),
(23, 22, 'DNI', '18187970', 'Esteban', 'Castill', 'Kito', '902078305', 'kito@gmail.com', '$2y$10$OS7ijBWNujcReshvc556uu98bVPSyTGBjur2/GY9xfaat7Fe11fZm', 'Ingenierso Uni', 'admin', '2024-07-15 18:46:32', 'UPDATE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_foro`
--

CREATE TABLE `comentarios_foro` (
  `id` int(11) NOT NULL,
  `id_tema` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `alias` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentarios_foro`
--

INSERT INTO `comentarios_foro` (`id`, `id_tema`, `id_usuario`, `comentario`, `alias`, `fecha`) VALUES
(1, 1, 12, 'Interesante tema', 'Elobo', '2024-06-10 21:03:26'),
(2, 1, 12, 'BUEN TEMA!!!', 'Elobo', '2024-06-10 21:05:21'),
(3, 1, 14, 'Interesante', 'Pato', '2024-06-10 21:07:51'),
(4, 1, 14, 'Buen tema', 'Pato', '2024-06-11 00:51:12'),
(8, 1, 22, 'Holaa', 'Kito', '2024-06-27 15:37:43'),
(9, 1, 24, 'A seguir comentando !', 'Tigre', '2024-07-01 18:19:09'),
(10, 6, 22, 'Buen tema', 'Kito', '2024-07-01 19:17:00'),
(11, 6, 14, 'Buen comentario', 'Pato', '2024-07-05 00:46:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denuncias`
--

CREATE TABLE `denuncias` (
  `id` int(11) NOT NULL,
  `nombre_completo` varchar(255) NOT NULL,
  `edad` int(11) NOT NULL,
  `grado_escolar` varchar(50) NOT NULL,
  `escuela` varchar(255) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp(),
  `descripcion` text NOT NULL,
  `tipo_acoso` enum('Físico','Verbal','Cibernético','Sexual','Psicológico') NOT NULL,
  `impacto_victima` enum('Leve','Moderado','Severo') NOT NULL,
  `imagenes` text DEFAULT NULL,
  `atendida` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `denuncias`
--

INSERT INTO `denuncias` (`id`, `nombre_completo`, `edad`, `grado_escolar`, `escuela`, `fecha_hora`, `descripcion`, `tipo_acoso`, `impacto_victima`, `imagenes`, `atendida`) VALUES
(24, 'Daniel Ulloa', 16, 'Primero', 'Ingenieros Uni', '2024-07-15 02:57:45', 'mal', 'Físico', 'Leve', NULL, 1),
(25, 'Daniel Ulloa', 14, 'Primero', 'Ingenieros Uni', '2024-07-15 03:23:04', 'aa', 'Físico', 'Leve', NULL, 1),
(26, 'Daniel Ulloa', 15, 'Primero', 'Ingenieros Uni', '2024-07-15 03:31:14', 'jj', 'Físico', 'Leve', NULL, 1),
(27, 'Daniel Ulloa', 80, 'Primero', 'Ingenieros Uni', '2024-07-15 03:36:54', 'jjkk', 'Físico', 'Leve', NULL, 1),
(28, 'Daniel Ulloa', 18, 'Primero', 'Ingenieros Uni', '2024-07-15 03:42:29', '11', 'Físico', 'Leve', NULL, 1),
(29, 'Daniel Ulloa', 45, 'Primero', 'Ingenieros Uni', '2024-07-15 03:52:52', '5', 'Físico', 'Leve', NULL, 1),
(30, 'Daniel Ulloa', 13, 'Primero', 'Ingenieros Uni', '2024-07-15 03:55:01', 'ffsafas', 'Físico', 'Leve', NULL, 1),
(31, 'Leonel Smith', 14, 'Primero', 'Ingenieros Uni', '2024-07-15 03:59:39', '14124124', 'Físico', 'Leve', NULL, 1),
(32, 'Leonel Smith', 14, 'Primero', 'Ingenieros Uni', '2024-07-15 04:01:06', 'aaa', 'Físico', 'Leve', NULL, 1),
(33, 'Miguel Casitllo', 15, 'Primero', 'Ingenieros Uni', '2024-07-15 22:58:55', 'aaaaaaa', 'Físico', 'Leve', NULL, 1),
(34, 'Daniel Ulloa', 15, 'Primero', 'Ingenieros Uni', '2024-07-15 23:02:27', 'popooo', 'Físico', 'Leve', NULL, 1),
(35, 'Daniel Ulloa', 15, 'Primero', 'Ingenieros Uni', '2024-07-15 23:05:40', 'ppp', 'Físico', 'Leve', NULL, 1),
(36, 'Daniel Ulloa', 14, 'Primero', 'Ingenieros Uni', '2024-07-15 23:07:35', 'rrrr', 'Físico', 'Leve', NULL, 1),
(48, 'Daniel Ulloa', 15, 'Primero', 'Ingenieros Uni', '2024-07-16 00:23:38', 'ooo', 'Físico', 'Leve', NULL, 1),
(49, 'Daniel Ulloa', 45, 'Primero', 'Ingenieros Uni', '2024-07-16 00:29:04', 'gjgjgfj', 'Físico', 'Leve', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_educativo`
--

CREATE TABLE `material_educativo` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `link_youtube` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `material_educativo`
--

INSERT INTO `material_educativo` (`id`, `titulo`, `imagen`, `youtube_link`, `descripcion`, `link_youtube`) VALUES
(4, 'Como actuar ', 'uploads/imagenes/OIP.jpg', '', 'Como podemos actuar frente al bullying', 'https://www.youtube.com/watch?v=tIn4m5Tb8KA'),
(6, 'QQUE ES EL BULLYING', 'uploads/imagenes/img1.jpg', '', 'Bullying', 'https://www.youtube.com/watch?v=KQZ9hDDz704');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `leido` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacionesalumnos`
--

CREATE TABLE `notificacionesalumnos` (
  `id` int(11) NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `leido` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notificacionesalumnos`
--

INSERT INTO `notificacionesalumnos` (`id`, `mensaje`, `tipo`, `fecha`, `leido`) VALUES
(1, 'Nuevo material educativo agregado: QQUE ES EL BULLYING', 'material', '2024-07-01 18:47:30', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas_foro`
--

CREATE TABLE `temas_foro` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `link_youtube` varchar(255) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `temas_foro`
--

INSERT INTO `temas_foro` (`id`, `titulo`, `descripcion`, `imagen`, `link_youtube`, `fecha`) VALUES
(1, 'Foro número 1', 'Prueba foro', 'uploads/imagenes_foro/img1.jpg', 'https://www.youtube.com/watch?v=xRepPtaRwR8', '2024-06-10 21:02:33'),
(6, 'Como comba', 'Que hacer frente al bullying ', 'uploads/imagenes_foro/material.jpg', 'https://www.youtube.com/watch?v=KQZ9hDDz704', '2024-07-01 18:18:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `tipo_documento` varchar(50) DEFAULT NULL,
  `numero_documento` varchar(50) DEFAULT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `alias` varchar(50) DEFAULT NULL,
  `numero_celular` varchar(20) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `contraseña` varchar(255) DEFAULT NULL,
  `escuela` varchar(100) DEFAULT NULL,
  `tipo_usuario` enum('admin','docente','alumno') DEFAULT 'alumno'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `tipo_documento`, `numero_documento`, `nombres`, `apellidos`, `alias`, `numero_celular`, `correo`, `contraseña`, `escuela`, `tipo_usuario`) VALUES
(12, 'DNI', '72705987', 'Daniel', 'Ulloa', 'Elobo', '90214282', 'barquito@gmail.com', '$2y$10$lL7tvts4OGcdcyso9hAzLOPQ1PGQZan93Y25R.M1mFsPJZ3vB7Oqi', 'Vallejo', 'alumno'),
(14, 'DNI', '7777777', 'Barco', 'Smith', 'Pato', '999888777', 'leonel1@gmail.com', '$2y$10$GRBcdxo5mJC.u0VBWzi96.ienwSLq99qr0gFMPGw1xT0F9f2oRkp.', 'UTP', 'alumno'),
(22, 'DNI', '18187970', 'Emiliano', 'Castill', 'Kito', '902078305', 'kito@gmail.com', '$2y$10$OS7ijBWNujcReshvc556uu98bVPSyTGBjur2/GY9xfaat7Fe11fZm', 'Ingenierso Uni', 'admin'),
(24, 'DNI', '72705937', 'Daniel Alejandro', 'Ulloa Canales', 'Tigre', '902078305', 'lovoseduardo1@gmail.com', '$2y$10$u0UhOIXBLszUeLRqgf00F.Gdd4UFrFgCzBaQdouVcHCukK3wKnkKK', 'Ingenieros Uni', 'docente'),
(29, 'DNI', '72705932', 'Daniel', 'Ulloa', 'Pato', '90278305', 'lovoseduardo@gmail.com', '$2y$10$DvspAGzrdRt2QS6CijMXYe66qAs2oe5h58rriZbsmulHmDHpYD0AC', 'Ingenieros Uni', 'alumno'),
(30, 'DNI', '72705931', 'Leonel', 'Smith', 'Perro', '90278305', 'sven.2004.24@gmail.com', '$2y$10$l.lahuTrwrUoTOQ3cCGZIeJjjxpc6rQIsnLPGrvATQs4VlDSpptHC', 'Ingenieros Uni', 'alumno'),
(31, 'DNI', '72705930', 'Leonel', 'Smith', 'Perro', '90278305', 'daniel@gmail.com', '$2y$10$KDqvUbssC0N5U0EhtuLuEu2mxwcF2IH7HdsyxXKRw.eAA3t2b9XD2', 'Ingenieros Uni', 'alumno'),
(32, 'DNI', '72705929', 'Miguel', 'Casitllo', 'Terrible', '902078305', 'castillolaosm@gmail.com', '$2y$10$34XKEMdz.kH6k0lIB6SfTeOrAuU70BSwQjLR.69iN7OduhgZw5lXy', 'Ingenieros Uni', 'alumno');

--
-- Disparadores `usuarios`
--
DELIMITER $$
CREATE TRIGGER `after_usuario_delete` AFTER DELETE ON `usuarios` FOR EACH ROW BEGIN
    INSERT INTO auditoria (usuario_id, tipo_documento, numero_documento, nombres, apellidos, alias, numero_celular, correo, contraseña, escuela, tipo_usuario, operacion)
    VALUES (OLD.id, OLD.tipo_documento, OLD.numero_documento, OLD.nombres, OLD.apellidos, OLD.alias, OLD.numero_celular, OLD.correo, OLD.contraseña, OLD.escuela, OLD.tipo_usuario, 'DELETE');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_usuario_insert` AFTER INSERT ON `usuarios` FOR EACH ROW BEGIN
    INSERT INTO auditoria (usuario_id, tipo_documento, numero_documento, nombres, apellidos, alias, numero_celular, correo, contraseña, escuela, tipo_usuario, operacion)
    VALUES (NEW.id, NEW.tipo_documento, NEW.numero_documento, NEW.nombres, NEW.apellidos, NEW.alias, NEW.numero_celular, NEW.correo, NEW.contraseña, NEW.escuela, NEW.tipo_usuario, 'INSERT');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_usuario_update` AFTER UPDATE ON `usuarios` FOR EACH ROW BEGIN
    INSERT INTO auditoria (usuario_id, tipo_documento, numero_documento, nombres, apellidos, alias, numero_celular, correo, contraseña, escuela, tipo_usuario, operacion)
    VALUES (OLD.id, OLD.tipo_documento, OLD.numero_documento, OLD.nombres, OLD.apellidos, OLD.alias, OLD.numero_celular, OLD.correo, OLD.contraseña, OLD.escuela, OLD.tipo_usuario, 'UPDATE');
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios_foro`
--
ALTER TABLE `comentarios_foro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tema` (`id_tema`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `denuncias`
--
ALTER TABLE `denuncias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `material_educativo`
--
ALTER TABLE `material_educativo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notificacionesalumnos`
--
ALTER TABLE `notificacionesalumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temas_foro`
--
ALTER TABLE `temas_foro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero_documento` (`numero_documento`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `comentarios_foro`
--
ALTER TABLE `comentarios_foro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `denuncias`
--
ALTER TABLE `denuncias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `material_educativo`
--
ALTER TABLE `material_educativo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `notificacionesalumnos`
--
ALTER TABLE `notificacionesalumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `temas_foro`
--
ALTER TABLE `temas_foro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios_foro`
--
ALTER TABLE `comentarios_foro`
  ADD CONSTRAINT `comentarios_foro_ibfk_1` FOREIGN KEY (`id_tema`) REFERENCES `temas_foro` (`id`),
  ADD CONSTRAINT `comentarios_foro_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
