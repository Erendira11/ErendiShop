-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 15, 2020 at 10:52 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `tienda`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nomCategoria` varchar(100) NOT NULL,
  `estatusCategoria` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nomCategoria`, `estatusCategoria`) VALUES
(1, 'Licencias', 1),
(2, 'Equipos', 1);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `idColor` int(11) NOT NULL,
  `nomColor` varchar(100) NOT NULL,
  `estatusColor` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`idColor`, `nomColor`, `estatusColor`) VALUES
(1, 'Negro', 1),
(2, 'Azul', 1),
(3, 'Blanco', 1),
(4, 'Amarillo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `nomProducto` varchar(250) NOT NULL,
  `precioProducto` double NOT NULL,
  `cantidadProducto` int(11) NOT NULL,
  `estatusProducto` int(10) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `idColor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`idProducto`, `nomProducto`, `precioProducto`, `cantidadProducto`, `estatusProducto`, `idCategoria`, `idColor`) VALUES
(1, 'Antivirus Symantec', 100, 5, 1, 1, 4),
(2, 'Mouse Razer', 500, 10, 1, 2, 3),
(3, 'Gabinete Lenovo', 5000, 100, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `idUsr` int(11) NOT NULL,
  `nomUsr` varchar(50) NOT NULL,
  `apPaternoUsr` varchar(50) NOT NULL,
  `apMaternoUsr` varchar(50) NOT NULL,
  `telUsr` varchar(100) NOT NULL,
  `emailUsr` varchar(100) NOT NULL,
  `contrasenaUsr` varchar(100) NOT NULL,
  `fechaCreacionUsr` datetime NOT NULL,
  `estatusUsr` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idUsr`, `nomUsr`, `apPaternoUsr`, `apMaternoUsr`, `telUsr`, `emailUsr`, `contrasenaUsr`, `fechaCreacionUsr`, `estatusUsr`) VALUES
(3, 'eduardo', 'martinez', 'lopez', '9999999', 'eduardo@hotmail.com', '1234', '2020-07-15 16:33:04', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`idColor`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `idCategoria` (`idCategoria`),
  ADD KEY `idColor` (`idColor`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `idColor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FK_producto_categoria` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_producto_color` FOREIGN KEY (`idColor`) REFERENCES `color` (`idColor`) ON UPDATE CASCADE;