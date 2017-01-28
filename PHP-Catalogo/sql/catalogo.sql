-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-01-2017 a las 12:02:47
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `catalogo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `idautor` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaNacimiento` decimal(4,0) DEFAULT NULL,
  `lugarNacimiento` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`idautor`, `nombre`, `fechaNacimiento`, `lugarNacimiento`) VALUES
(1, 'Miguel Delibes', '1920', 'Valladolid'),
(2, 'Carmen Martín Gaite', '1925', 'Salamanca'),
(3, 'Ana María Matute', '1926', 'Barcelona'),
(4, 'Luis Cernuda', '1902', NULL),
(5, 'Miguel de Unamuno', '1864', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `idLibro` int(11) NOT NULL,
  `titulo` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `autor` int(11) NOT NULL,
  `año` int(11) NOT NULL DEFAULT '2008',
  `editorial` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`idLibro`, `titulo`, `autor`, `año`, `editorial`) VALUES
(1, 'Antología poética', 4, 1984, 'Cátedra'),
(2, 'Poesía completa', 4, 1993, 'Siruela'),
(3, 'La sombra del ciprés es alargada', 1, 1948, 'Anagrama'),
(4, 'Mi querida bicicleta', 1, 1988, 'Anagrama'),
(5, 'Los santos inocentes', 1, 1982, 'Castalia'),
(6, 'El hereje', 1, 1998, 'Cátedra'),
(7, 'La reina de las nieves', 2, 1994, 'Seix Barral'),
(8, 'Lo raro es vivir', 2, 1996, 'Cátedra'),
(9, 'Olvidado rey Gudú', 3, 1996, 'Planeta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `login` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(15) CHARACTER SET utf8mb4 NOT NULL,
  `nombre` varchar(25) CHARACTER SET utf8mb4 NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `descripcion` text CHARACTER SET utf8mb4
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`login`, `password`, `nombre`, `admin`, `descripcion`) VALUES
('admin', 'admin', 'Alberto Ruiz', 1, 'Cuenta de administrador'),
('ariego', 'ariego', 'Almudena Riego', 0, NULL),
('lenamorado', 'lenamorado', 'Luis Enamorado', 0, '¿áéíóúñ');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`idautor`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`idLibro`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `idautor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `idLibro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
