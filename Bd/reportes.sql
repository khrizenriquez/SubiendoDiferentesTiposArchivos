-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2013 a las 23:59:47
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `reportes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `id_autor` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Pais` varchar(100) NOT NULL,
  `Empresa` varchar(100) NOT NULL,
  PRIMARY KEY (`id_autor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id_autor`, `Nombre`, `Correo`, `Pais`, `Empresa`) VALUES
(1, 'Khriz Enríquez', 'khriz@khriz.com', 'Guatemala', 'Mi empresa'),
(2, 'Berto Salcido', 'berto@salcido.com', 'México', 'Su empresa.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `idNoticias` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) NOT NULL,
  `autor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `detalle` text NOT NULL,
  PRIMARY KEY (`idNoticias`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`idNoticias`, `titulo`, `autor`, `fecha`, `detalle`) VALUES
(1, 'Funciono :D 1', 1, '2013-06-18', 'Juela madre después de tanto tiempo si sirvió todo lo que estábamos tratando de hacer :D. Ahora si podremos graduarnos con honores :D'),
(2, 'Y con uds..', 2, '2013-06-18', ':O, e esta usando sql front pero da igual, podemos usar phpMyAdmin. :D');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
