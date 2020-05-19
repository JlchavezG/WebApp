-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 26-02-2020 a las 16:59:12
-- Versión del servidor: 10.3.15-MariaDB
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
-- Base de datos: `webapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Carreras`
--

CREATE TABLE `Carreras` (
  `Id_Carrera` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Codigo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Carreras`
--

INSERT INTO `Carreras` (`Id_Carrera`, `Nombre`, `Codigo`) VALUES
(1, 'Informatica', 'INFO08'),
(2, 'Contabilidad', 'HOSP-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Productos`
--

CREATE TABLE `Productos` (
  `Id_Producto` int(11) NOT NULL,
  `Nombre` varchar(55) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `Precio` int(11) NOT NULL,
  `Id_categoria` int(11) NOT NULL,
  `Imagen` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `Productos`
--

INSERT INTO `Productos` (`Id_Producto`, `Nombre`, `Descripcion`, `Precio`, `Id_categoria`, `Imagen`) VALUES
(1, 'Programacion Basica', 'Curso en donde aprenderas conceptos basicos , tecnicas y lenguajes de programacion.', 1500, 1, 'product1.png'),
(2, 'Diseño web ', 'Curso en donde aprenderas a maquetar , diseñar e  implementar un siti web ', 2500, 2, 'product2.png'),
(5, 'Cafe', 'que rico cafe', 123, 4, 'product3.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tipo_Usuario`
--

CREATE TABLE `Tipo_Usuario` (
  `Id_Tipo` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` text NOT NULL,
  `Nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Tipo_Usuario`
--

INSERT INTO `Tipo_Usuario` (`Id_Tipo`, `Nombre`, `Descripcion`, `Nivel`) VALUES
(1, 'Cliente', 'Este Usuario realiza las compras dentro de aplicacion, visulaiza su perfil y su historial de compras', 1),
(2, 'Sistemas', 'Este Usuario puede configurar , modificar y restructurar la aplicacion desde el backend ó desde el codido', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
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
  `Password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`Id_Usuario`, `Nombre`, `ApallidoP`, `ApellidoM`, `Email`, `Id_Carrera`, `Matricula`, `Telefono`, `TUsuario`, `Nusuario`, `Password`) VALUES
(1, 'Jose Luis', 'Chavez', 'Gomez', 'joseluis@iscjlchavezg.mx', 1, '1280233', '11069054', 2, 'JlchavezG', '12345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Carreras`
--
ALTER TABLE `Carreras`
  ADD PRIMARY KEY (`Id_Carrera`);

--
-- Indices de la tabla `Productos`
--
ALTER TABLE `Productos`
  ADD PRIMARY KEY (`Id_Producto`);

--
-- Indices de la tabla `Tipo_Usuario`
--
ALTER TABLE `Tipo_Usuario`
  ADD PRIMARY KEY (`Id_Tipo`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`Id_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Carreras`
--
ALTER TABLE `Carreras`
  MODIFY `Id_Carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Productos`
--
ALTER TABLE `Productos`
  MODIFY `Id_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `Tipo_Usuario`
--
ALTER TABLE `Tipo_Usuario`
  MODIFY `Id_Tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
