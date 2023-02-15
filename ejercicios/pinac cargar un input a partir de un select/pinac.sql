-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2022 a las 19:58:43
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pinac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_usuario`
--

CREATE TABLE `estado_usuario` (
  `ID_ESTADO_USUARIO` int(11) NOT NULL,
  `NOMBRES_ESTADO_USUARIO` varchar(200) NOT NULL,
  `FECHA_CREACION_EST` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado_usuario`
--

INSERT INTO `estado_usuario` (`ID_ESTADO_USUARIO`, `NOMBRES_ESTADO_USUARIO`, `FECHA_CREACION_EST`) VALUES
(1, 'ACTIVO', '2022-09-08 20:17:05'),
(2, 'DESACTIVADO', '2022-09-08 20:17:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instituciones_eduactivas`
--

CREATE TABLE `instituciones_eduactivas` (
  `ID_INSTITUCION` int(11) NOT NULL,
  `NOMBRE_INSTITUCION` varchar(250) NOT NULL,
  `ID_PROVINCIA_INST` int(11) NOT NULL,
  `FECHA_CREACION_INST` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_usuario`
--

CREATE TABLE `perfil_usuario` (
  `ID_PERFIL_USUARIO` int(11) NOT NULL,
  `NOMBRES_PERFIL_USUARIO` varchar(200) NOT NULL,
  `FECHA_CREACION_PER` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfil_usuario`
--

INSERT INTO `perfil_usuario` (`ID_PERFIL_USUARIO`, `NOMBRES_PERFIL_USUARIO`, `FECHA_CREACION_PER`) VALUES
(1, 'ADMINISTRADOR', '2022-09-08 20:17:05'),
(2, 'TÉCNICO', '2022-09-08 20:17:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `ID_PROVINCIAS` int(11) NOT NULL,
  `NOMBRES_PROVINCIAS` varchar(250) NOT NULL,
  `FECHA_CREACION_PROV` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_USUARIO` int(11) NOT NULL,
  `NOMBRE_USUARIO` varchar(100) NOT NULL,
  `APELLIDO_USUARIO` varchar(100) NOT NULL,
  `CEDULA_USUARIO` int(10) NOT NULL,
  `CORREO_USUARIO` varchar(100) NOT NULL,
  `PASSWOR_USUARIO` varchar(200) NOT NULL,
  `PERFIL_USUARIO` int(11) NOT NULL,
  `ESTADO_USUARIO` int(11) NOT NULL,
  `FECHA_CREACION_USUARIO` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_USUARIO`, `NOMBRE_USUARIO`, `APELLIDO_USUARIO`, `CEDULA_USUARIO`, `CORREO_USUARIO`, `PASSWOR_USUARIO`, `PERFIL_USUARIO`, `ESTADO_USUARIO`, `FECHA_CREACION_USUARIO`) VALUES
(1, 'LUIS FERNANDO', 'TUTACHA CHULDE', 1716475601, 'ltutacha@midena.gob.ec', 'Fercho2022', 1, 1, '2022-09-08 20:17:05'),
(2, 'JEREMY SAID', 'TUTACHA SALAZAR', 1716475601, 'fernando_tut@hotmail.com', 'FERCHO2021', 2, 1, '2022-09-08 20:17:05');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estado_usuario`
--
ALTER TABLE `estado_usuario`
  ADD PRIMARY KEY (`ID_ESTADO_USUARIO`);

--
-- Indices de la tabla `instituciones_eduactivas`
--
ALTER TABLE `instituciones_eduactivas`
  ADD PRIMARY KEY (`ID_INSTITUCION`),
  ADD KEY `FK_INSTITUCION` (`ID_PROVINCIA_INST`);

--
-- Indices de la tabla `perfil_usuario`
--
ALTER TABLE `perfil_usuario`
  ADD PRIMARY KEY (`ID_PERFIL_USUARIO`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`ID_PROVINCIAS`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_USUARIO`),
  ADD KEY `FK_ESTADO_USUARIO` (`ESTADO_USUARIO`),
  ADD KEY `FK_PERFIL_USUARIO` (`PERFIL_USUARIO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estado_usuario`
--
ALTER TABLE `estado_usuario`
  MODIFY `ID_ESTADO_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `instituciones_eduactivas`
--
ALTER TABLE `instituciones_eduactivas`
  MODIFY `ID_INSTITUCION` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `perfil_usuario`
--
ALTER TABLE `perfil_usuario`
  MODIFY `ID_PERFIL_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `ID_PROVINCIAS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `instituciones_eduactivas`
--
ALTER TABLE `instituciones_eduactivas`
  ADD CONSTRAINT `FK_INSTITUCION` FOREIGN KEY (`ID_PROVINCIA_INST`) REFERENCES `provincias` (`ID_PROVINCIAS`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `FK_ESTADO_USUARIO` FOREIGN KEY (`ESTADO_USUARIO`) REFERENCES `estado_usuario` (`ID_ESTADO_USUARIO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PERFIL_USUARIO` FOREIGN KEY (`PERFIL_USUARIO`) REFERENCES `perfil_usuario` (`ID_PERFIL_USUARIO`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
