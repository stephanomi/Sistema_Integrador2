-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-07-2024 a las 21:23:43
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
(10, 6, 22, 'Buen tema', 'Kito', '2024-07-01 19:17:00');

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
(16, 'Marco Castillo', 16, 'Primero', 'Ingenierso Uni', '2024-06-27 23:59:13', 'Mal', 'Verbal', 'Leve', NULL, 1),
(22, 'Marco Castillo', 16, 'Primero', 'Ingenierso Uni', '2024-06-28 02:12:27', 'lnnl', 'Cibernético', 'Leve', NULL, 1),
(23, 'Marco Castillo', 14, 'Tercero', 'Ingenierso Uni', '2024-06-28 02:28:57', 'Mal', 'Físico', 'Leve', NULL, 1);

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
(11, 'DNI', '18187960', 'Jhony', 'Castillo', NULL, '902078305', 'dannn@gmail.com', '$2y$10$c0G4w0cXda.BV/vhEUxV5erh/uosNYG3H33ckVsL3BCKpe2lJBBdi', 'Ingenierso Uni', 'admin'),
(12, 'DNI', '72705987', 'Daniel', 'Ulloa', 'Elobo', '90214282', 'barquito@gmail.com', '$2y$10$lL7tvts4OGcdcyso9hAzLOPQ1PGQZan93Y25R.M1mFsPJZ3vB7Oqi', 'Vallejo', 'alumno'),
(14, 'DNI', '7777777', 'Barco', 'Smith', 'Pato', '999888777', 'leonel1@gmail.com', '$2y$10$GRBcdxo5mJC.u0VBWzi96.ienwSLq99qr0gFMPGw1xT0F9f2oRkp.', 'UTP', 'alumno'),
(22, 'DNI', '18187970', 'Marco', 'Castillo', 'Kito', '902078305', 'kito@gmail.com', '$2y$10$OS7ijBWNujcReshvc556uu98bVPSyTGBjur2/GY9xfaat7Fe11fZm', 'Ingenierso Uni', 'alumno'),
(23, 'DNI', '72705936', 'Maximiliano', 'Ulloa Canales', NULL, '902078305', 'maxi@gmail.com', '$2y$10$vFIaKuagw3bxXKd4dl2VgeuaMJBOPumz7whJR/2iUIoIJO5kTC6t.', 'San Marcos', 'docente'),
(24, 'DNI', '72705937', 'Daniel Alejandro', 'Ulloa Canales', 'Tigre', '902078305', 'lovoseduardo@gmail.com', '$2y$10$u0UhOIXBLszUeLRqgf00F.Gdd4UFrFgCzBaQdouVcHCukK3wKnkKK', 'Ingenieros Uni', 'docente');

--
-- Índices para tablas volcadas
--

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
-- AUTO_INCREMENT de la tabla `comentarios_foro`
--
ALTER TABLE `comentarios_foro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `denuncias`
--
ALTER TABLE `denuncias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `material_educativo`
--
ALTER TABLE `material_educativo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
