-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01-Out-2018 às 20:01
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzariauds`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adicional`
--

CREATE TABLE `adicional` (
  `idadicional` int(11) NOT NULL,
  `adicional` varchar(50) NOT NULL,
  `tempo` int(11) DEFAULT NULL,
  `valor` double(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `adicional`
--

INSERT INTO `adicional` (`idadicional`, `adicional`, `tempo`, `valor`) VALUES
(1, 'extra bacon', NULL, 3.00),
(2, 'sem cebola', NULL, NULL),
(3, 'borda recheada', 5, 5.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pizza`
--

CREATE TABLE `pizza` (
  `idpizza` int(11) NOT NULL,
  `idtamanho` int(11) NOT NULL,
  `idsabor` int(11) NOT NULL,
  `tempopreparo` int(11) DEFAULT NULL,
  `valorfinal` double(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Estrutura da tabela `pizza_adicional`
--

CREATE TABLE `pizza_adicional` (
  `idpizzaadicional` int(11) NOT NULL,
  `idpizza` int(11) NOT NULL,
  `idadicional` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Estrutura da tabela `sabor`
--

CREATE TABLE `sabor` (
  `idsabor` int(11) NOT NULL,
  `sabor` varchar(50) NOT NULL,
  `tempo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sabor`
--

INSERT INTO `sabor` (`idsabor`, `sabor`, `tempo`) VALUES
(1, 'calabresa', NULL),
(2, 'marguerita', NULL),
(3, 'portuguesa', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanho`
--

CREATE TABLE `tamanho` (
  `idtamanho` int(11) NOT NULL,
  `tamanho` varchar(50) NOT NULL,
  `valor` double(11,2) NOT NULL,
  `tempo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tamanho`
--

INSERT INTO `tamanho` (`idtamanho`, `tamanho`, `valor`, `tempo`) VALUES
(1, 'pequena', 20.00, 15),
(2, 'média', 30.00, 20),
(3, 'grande', 40.00, 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adicional`
--
ALTER TABLE `adicional`
  ADD PRIMARY KEY (`idadicional`);

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`idpizza`),
  ADD KEY `idtamanho` (`idtamanho`),
  ADD KEY `idsabor` (`idsabor`);

--
-- Indexes for table `pizza_adicional`
--
ALTER TABLE `pizza_adicional`
  ADD PRIMARY KEY (`idpizzaadicional`),
  ADD KEY `idpizza` (`idpizza`),
  ADD KEY `idadicional` (`idadicional`);

--
-- Indexes for table `sabor`
--
ALTER TABLE `sabor`
  ADD PRIMARY KEY (`idsabor`);

--
-- Indexes for table `tamanho`
--
ALTER TABLE `tamanho`
  ADD PRIMARY KEY (`idtamanho`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adicional`
--
ALTER TABLE `adicional`
  MODIFY `idadicional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `idpizza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `pizza_adicional`
--
ALTER TABLE `pizza_adicional`
  MODIFY `idpizzaadicional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sabor`
--
ALTER TABLE `sabor`
  MODIFY `idsabor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tamanho`
--
ALTER TABLE `tamanho`
  MODIFY `idtamanho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `pizza`
--
ALTER TABLE `pizza`
  ADD CONSTRAINT `pizza_ibfk_1` FOREIGN KEY (`idtamanho`) REFERENCES `tamanho` (`idtamanho`),
  ADD CONSTRAINT `pizza_ibfk_2` FOREIGN KEY (`idsabor`) REFERENCES `sabor` (`idsabor`);

--
-- Limitadores para a tabela `pizza_adicional`
--
ALTER TABLE `pizza_adicional`
  ADD CONSTRAINT `pizza_adicional_ibfk_1` FOREIGN KEY (`idpizza`) REFERENCES `pizza` (`idpizza`),
  ADD CONSTRAINT `pizza_adicional_ibfk_2` FOREIGN KEY (`idadicional`) REFERENCES `adicional` (`idadicional`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
