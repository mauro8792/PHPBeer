-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2017 a las 22:40:41
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `beercharge`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cervezas`
--

CREATE TABLE `cervezas` (
  `idCerveza` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `precioLitro` int(11) DEFAULT NULL,
  `foto` varchar(100) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cervezas`
--

INSERT INTO `cervezas` (`idCerveza`, `nombre`, `descripcion`, `precioLitro`, `foto`, `estado`) VALUES
(23, 'Extrema', 'sarasa', 100, 'Vistas/images/logoPorter.png', 1),
(24, 'Honey', 'sarasaaaaaaaa', 90, 'Vistas/images/logoScottich.png', 1),
(27, 'Scotish', 'dslakn', 95, 'Vistas/images/logoOldAle.png', 0),
(35, 'Blonde', 'herwejrw', 90, 'Vistas/images/logoBlonde.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `email` varchar(50) NOT NULL,
  `pass` varchar(20) DEFAULT NULL,
  `rol` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`email`, `pass`, `rol`) VALUES
('eduts2@hotmail.com', 'puto', 'Cliente'),
('jose@hotmail.com', '123', 'Cliente'),
('jose@hotmail.com1', '123', 'Cliente'),
('madera@hotmail.com', '123', 'Cliente'),
('mauroyini87@hotmail.com', '123', 'Cliente'),
('mauroyini88@hotmail.com', '123', 'Cliente'),
('mauroyini@hotmail.com', 'lospiojos', 'Cliente'),
('mauroyini@hotmail.com87', '123', 'Cliente'),
('npetti87@gmail.com', '123', 'Cliente'),
('yini@hotmail.com', '123', 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envases`
--

CREATE TABLE `envases` (
  `idEnvase` int(11) NOT NULL,
  `descripcion` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `litros` float DEFAULT NULL,
  `coeficiente` float DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `envases`
--

INSERT INTO `envases` (`idEnvase`, `descripcion`, `litros`, `coeficiente`, `estado`) VALUES
(8, 'botella', 1, 0, 1),
(17, 'porron', 5, 4, 0),
(19, 'Barril x 10 lts', 10, 0.4, 1),
(20, 'botellon 5lts', 5, 0.2, 0),
(21, 'botellon 5lts', 5, 0.2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envasesxcerveza`
--

CREATE TABLE `envasesxcerveza` (
  `fk_idEnvase` int(11) NOT NULL,
  `fk_idCerveza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `envasesxcerveza`
--

INSERT INTO `envasesxcerveza` (`fk_idEnvase`, `fk_idCerveza`) VALUES
(8, 23),
(8, 24),
(8, 27),
(8, 35),
(17, 23),
(17, 24),
(17, 27),
(19, 23),
(19, 24),
(19, 35),
(21, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `idSucursal` int(11) NOT NULL,
  `direccion` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `telefono` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `localidad` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `provincia` varchar(200) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`idSucursal`, `direccion`, `telefono`, `localidad`, `provincia`) VALUES
(8, 'guemes 3003', '4861678', 'mar del plata', 'Buenos Aires'),
(9, 'falsa 456', '4578', 'mar del plata', 'Buenos Aires'),
(10, 'utn', '781', 'dasd', '54854');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `telefono` varchar(7) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `apellido`, `direccion`, `telefono`, `email`) VALUES
('sarasa', 'sarasa', 'sarasa', '1234', 'n@p.cpm'),
('sarasa', 'sarasa', 'sarasa', '1234', 'trtrtrtr@hdhdhd.com'),
('Nicolas', 'Pettinato', 'san juan 855', '4726415', 'n@r.com'),
('Nicolas', 'Pettinato', 'san juan 855', '4726415', 'npetti87@gmail.com'),
('Nicolas', 'Pettinato', 'san juan 855', '4726415', 'npetti87@gmail.com'),
('nicolas', 'pettinato', 'san juan 855', '4726415', 'npetti87@gmail.com'),
('nicolas', 'pettinato', 'san juan 855', '4726415', 'npetti87@gmail.com'),
('nicolas', 'pettinato', 'san juan 855', '4726415', 'npetti87@gmail.com'),
('nicolas', 'pettinato', 'san juan 855', '4726415', 'npetti87@gmail.com'),
('nicolas', 'pettinato', 'san juan 855', '4726415', 'npetti87@gmail.com'),
('nicolas', 'pettinato', 'san juan 855', '4726415', 'npetti87@gmail.com'),
('Nicolas', 'Pettinato', 'san juan 855', '4726415', 'npetti87@gmail.com'),
('mauro', 'yini', 'genova 4944, general pueyrredo', '2235769', 'mauroyini@hotmail.com'),
('mauro', 'yini', 'genova 4944, general pueyrredo', '2235769', 'mauroyini@hotmail.com'),
('pepe', 'argento', 'genova 4944, general pueyrredo', '2235769', 'mauroyin8792i@hotmail.com'),
('mauro', 'yini', 'genova 4944, general pueyrredo', '2235769', 'mauroyini@hotmail.com'),
('pepe', 'argento', 'genova 4944, general pueyrredo', '2235769', 'mauroyini87@hotmail.com'),
('pepe', 'yinie', 'genova 4944, general pueyrredo', '2235769', 'mauroyini88@hotmail.com'),
('jose', 'sosa', 'jajaj', '84384', 'jose@hotmail.com'),
('jose', 'peo', 'kaka', '784', 'jose@hotmail.com1'),
('facu', 'yini', 'madera@hotmail.com', '123', 'madera@hotmail.com'),
('jaja', 'pepe', 'dasd', '784', 'mauroyini@hotmail.com'),
('mario', 'yini', 'genova 4944, general pueyrredo', '2235769', 'mauroyini@hotmail.com87'),
('mauro', 'yini', 'genova 4944, general pueyrredo', '2235769', 'yini@hotmail.com'),
('eduardo', 'muÃ±oz', 'genova 4944, general pueyrredo', '2235769', 'eduts2@hotmail.com'),
('nicolas', 'pettinato', 'san juan 855', '4726415', 'npetti87@gmail.com'),
('Nicolas', 'Pettinato', 'san juan 855', '4726415', 'npetti87@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cervezas`
--
ALTER TABLE `cervezas`
  ADD PRIMARY KEY (`idCerveza`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `envases`
--
ALTER TABLE `envases`
  ADD PRIMARY KEY (`idEnvase`);

--
-- Indices de la tabla `envasesxcerveza`
--
ALTER TABLE `envasesxcerveza`
  ADD PRIMARY KEY (`fk_idEnvase`,`fk_idCerveza`),
  ADD KEY `fk_idCerveza` (`fk_idCerveza`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`idSucursal`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD KEY `usuario_cuenta_fk` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cervezas`
--
ALTER TABLE `cervezas`
  MODIFY `idCerveza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT de la tabla `envases`
--
ALTER TABLE `envases`
  MODIFY `idEnvase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `idSucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `envasesxcerveza`
--
ALTER TABLE `envasesxcerveza`
  ADD CONSTRAINT `envasesxcerveza_ibfk_1` FOREIGN KEY (`fk_idEnvase`) REFERENCES `envases` (`idEnvase`),
  ADD CONSTRAINT `envasesxcerveza_ibfk_2` FOREIGN KEY (`fk_idCerveza`) REFERENCES `cervezas` (`idCerveza`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
