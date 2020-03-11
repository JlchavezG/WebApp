-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-03-2020 a las 15:23:30
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `webapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `Id_Carrera` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Codigo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`Id_Carrera`, `Nombre`, `Codigo`) VALUES
(1, 'Informatica', 'INFO08'),
(2, 'Contabilidad', 'HOSP-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Id_Producto` int(11) NOT NULL,
  `Nombre` varchar(55) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `Precio` int(11) NOT NULL,
  `Id_categoria` int(11) NOT NULL,
  `Imagen` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Id_Producto`, `Nombre`, `Descripcion`, `Precio`, `Id_categoria`, `Imagen`) VALUES
(1, 'Programacion Basica', 'Curso en donde aprenderas conceptos basicos , tecnicas y lenguajes de programacion.', 1500, 1, 'product1.png'),
(2, 'Diseño web ', 'Curso en donde aprenderas a maquetar , diseñar e  implementar un siti web ', 2500, 2, 'product2.png'),
(5, 'Cafe', 'que rico cafe', 123, 4, 'product3.png'),
(8, 'Pelicula', 'Serie anime de los caballeros del zodiaco', 800, 5, 'img1.jpg'),
(9, 'Milo de Escorpion', 'mejor signo del mundo mundial', 5000, 5, 'img2.jpg'),
(10, '607', 'No puedo creer que no sepan programar', 15, 1, 'img1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `Id_Tipo` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` text NOT NULL,
  `Nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`Id_Tipo`, `Nombre`, `Descripcion`, `Nivel`) VALUES
(1, 'Cliente', 'Este Usuario realiza las compras dentro de aplicacion, visulaiza su perfil y su historial de compras', 1),
(2, 'Sistemas', 'Este Usuario puede configurar , modificar y restructurar la aplicacion desde el backend ó desde el codido', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id_Usuario` int(11) NOT NULL,
  `Nombre` varchar(150) NOT NULL,
  `ApallidoP` varchar(150) NOT NULL,
  `ApellidoM` varchar(150) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Id_Carrera` int(11) NOT NULL,
  `Matricula` varchar(50) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `TUsuario` int(11) NOT NULL,
  `Nusuario` varchar(50) NOT NULL,
  `Password` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id_Usuario`, `Nombre`, `ApallidoP`, `ApellidoM`, `Email`, `Id_Carrera`, `Matricula`, `Telefono`, `TUsuario`, `Nusuario`, `Password`) VALUES
(1, 'Jose Luis', 'Chavez', 'Gomez', 'joseluis@iscjlchavezg.mx', 1, '1280233', '11069054', 2, 'JlchavezG', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'Invitado', 'Prueba', 'de usuario', 'prueba@prueba.com', 1, '15151587', '4567890', 1, 'invitado', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`Id_Carrera`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Id_Producto`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`Id_Tipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `Id_Carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `Id_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `Id_Tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
