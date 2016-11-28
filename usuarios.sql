-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2016 at 01:36 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `usuarios`
--
CREATE DATABASE IF NOT EXISTS `usuarios` DEFAULT CHARACTER SET ascii COLLATE ascii_bin;
USE `usuarios`;

-- --------------------------------------------------------

--
-- Table structure for table `accion`
--

CREATE TABLE IF NOT EXISTS `accion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(32) COLLATE ascii_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=5 ;

--
-- Dumping data for table `accion`
--

INSERT INTO `accion` (`id`, `nombre`) VALUES
(1, 'Vender'),
(2, 'Alquilar');

-- --------------------------------------------------------

--
-- Table structure for table `anuncios`
--

CREATE TABLE IF NOT EXISTS `anuncios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(32) COLLATE ascii_bin NOT NULL,
  `direccion` varchar(64) COLLATE ascii_bin NOT NULL,
  `categoria` varchar(20) COLLATE ascii_bin NOT NULL,
  `precio` int(12) NOT NULL,
  `accion` varchar(12) COLLATE ascii_bin NOT NULL,
  `descripcion` varchar(200) COLLATE ascii_bin NOT NULL,
  `ubicacion` text COLLATE ascii_bin NOT NULL,
  `lat` text COLLATE ascii_bin NOT NULL,
  `lng` text COLLATE ascii_bin NOT NULL,
  `img1` varchar(100) COLLATE ascii_bin NOT NULL,
  `img2` varchar(100) COLLATE ascii_bin NOT NULL,
  `img3` varchar(100) COLLATE ascii_bin NOT NULL,
  `img4` varchar(100) COLLATE ascii_bin NOT NULL,
  `img5` varchar(100) COLLATE ascii_bin NOT NULL,
  `img6` varchar(100) COLLATE ascii_bin NOT NULL,
  `img7` varchar(100) COLLATE ascii_bin NOT NULL,
  `img8` varchar(100) COLLATE ascii_bin NOT NULL,
  `img9` varchar(100) COLLATE ascii_bin NOT NULL,
  `img10` varchar(100) COLLATE ascii_bin NOT NULL,
  `id_usuario` int(12) NOT NULL,
  `desactivado` varchar(10) COLLATE ascii_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=36 ;

--
-- Dumping data for table `anuncios`
--

INSERT INTO `anuncios` (`id`, `titulo`, `direccion`, `categoria`, `precio`, `accion`, `descripcion`, `ubicacion`, `lat`, `lng`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`, `img7`, `img8`, `img9`, `img10`, `id_usuario`, `desactivado`) VALUES
(30, 'Apartamento, Villa Mar', 'Calle Proyecto #3, Invi Cea, Boca Chica, RD', 'Apartamento', 5000000, 'Vender', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit dicta nemo at officiis perspiciatis placeat suscipit deleniti expedita nostrum, asperiores optio eligendi, consequuntur culpa nobis cupidi', '-33.89311, 151.26048300000002', '-33.89311', '151.26048300000002', 'includes/uploads/splash.jpg', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 1, ''),
(31, 'Apartamento, Piantini', 'Calle Proyecto #3, Invi Cea, Boca Chica, RD', 'Apartamento', 3242423, 'Vender', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit dicta nemo at officiis perspiciatis placeat suscipit deleniti expedita nostrum, asperiores optio eligendi, consequuntur culpa nobis cupidi', '-33.72136, 151.16844000000003', '-33.72136', '151.26048300000002', 'includes/uploads/bg.jpg', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 1, ''),
(33, 'Apartamento, Toronto', 'Calle Proyecto #3, Invi Cea, Boca Chica, RD', 'Apartamento', 5600000, 'Vender', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit dicta nemo at officiis perspiciatis placeat suscipit deleniti expedita nostrum, asperiores optio eligendi, consequuntur culpa nobis cupidi', '48.771338, 3.5156389999999647', '48.771338', '151.26048300000002', 'includes/uploads/background.jpg', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 1, ''),
(34, 'Apartamento, Yasuo', 'Calle Proyecto #3, Invi Cea, Boca Chica, RD', 'Apartamento', 150000, 'Alquilar', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit dicta nemo at officiis perspiciatis placeat suscipit deleniti expedita nostrum, asperiores optio eligendi, consequuntur culpa nobis cupidi', '-35.4734679, 149.01236789999996', '-35.4734679', '149.01236789999996', 'includes/uploads/0x7ahe.jpg', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 1, ''),
(35, 'Testeando, algo', 'Calle Proyecto #3, Invi Cea, Boca Chica, RD', 'Apartamentos', 5000000, 'Vender', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non alias dicta cum ducimus fuga quaerat, asperiores dolor, cumque dignissimos magnam aliquam quae excepturi minus perspiciatis qui numquam do', '-33.8847749, 151.2373619', '-33.8847749', '151.2373619', 'includes/uploads/0x7ahe.jpg', 'includes/uploads/bg.jpg', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 'includes/uploads/', 15, 'si');

-- --------------------------------------------------------

--
-- Table structure for table `anuncios_img`
--

CREATE TABLE IF NOT EXISTS `anuncios_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombreImagen` varchar(32) COLLATE ascii_bin NOT NULL,
  `idUsuario` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(32) COLLATE ascii_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=38 ;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(24, 'Apartamentos'),
(25, 'Penthouse'),
(26, 'Casas'),
(27, 'Villas'),
(28, 'Locales Comerciales'),
(29, 'Oficinas'),
(30, 'Solares'),
(31, 'Fincas'),
(32, 'Hoteles'),
(33, 'Edificios Completos'),
(34, 'Proyectos Turisticos'),
(35, 'Nave'),
(36, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `prueba`
--

CREATE TABLE IF NOT EXISTS `prueba` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(32) COLLATE ascii_bin NOT NULL,
  `apellido` varchar(32) COLLATE ascii_bin NOT NULL,
  `email` varchar(64) COLLATE ascii_bin NOT NULL,
  `password` varchar(32) COLLATE ascii_bin NOT NULL,
  `img1` varchar(100) COLLATE ascii_bin NOT NULL,
  `img2` varchar(100) COLLATE ascii_bin NOT NULL,
  `img3` varchar(100) COLLATE ascii_bin NOT NULL,
  `img4` varchar(100) COLLATE ascii_bin NOT NULL,
  `img5` varchar(100) COLLATE ascii_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `prueba`
--

INSERT INTO `prueba` (`id`, `nombre`, `apellido`, `email`, `password`, `img1`, `img2`, `img3`, `img4`, `img5`) VALUES
(1, 'Isocrates', 'De La Cruz', 'teamflybox@gmail.com', 'isocrates', 'http://placehold.it/300/', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(32) COLLATE ascii_bin NOT NULL,
  `apellido` varchar(32) COLLATE ascii_bin NOT NULL,
  `password` varchar(32) COLLATE ascii_bin NOT NULL,
  `correo` varchar(64) COLLATE ascii_bin NOT NULL,
  `cedula` bigint(15) NOT NULL,
  `telefono` int(12) NOT NULL,
  `celular` int(12) NOT NULL,
  `fax` int(12) NOT NULL,
  `mas` varchar(80) COLLATE ascii_bin NOT NULL,
  `admin` varchar(10) COLLATE ascii_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=20 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido`, `password`, `correo`, `cedula`, `telefono`, `celular`, `fax`, `mas`, `admin`) VALUES
(1, 'Isocrates', 'Flybox', 'isocrates', 'teamflybox@gmail.com', 123456789, 1234567, 1234567, 1234, 'Izi game Izi life XD', 'si'),
(13, 'TheFlybox', 'Team Flybox', 'isocrates', 'theflybox001@gmail.com', 111000, 1234567, 1234567, 1234, 'lolololol', 'si'),
(14, 'Rafael', 'Hillario', 'rafael', 'rafael_noob@hotmail.com', 111000, 1234567, 1234567, 1234, 'Mas izi y no puedo XD.', 'no'),
(15, 'Admin', 'Admin', 'admin', 'admin@admin.com', 6667778, 999, 999, 8907, 'Admin PTM!', ''),
(19, 'Test', 'Tester', 'test123', 'test@test.com', 40255551749, 45688741, 45688741, 1234, 'EZ GAMR XD', 'no');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
