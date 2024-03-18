-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 21-Nov-2022 às 06:45
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gameserver`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `estatisticas`
--

DROP TABLE IF EXISTS `estatisticas`;
CREATE TABLE IF NOT EXISTS `estatisticas` (
  `ID_estatistica` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(16) NOT NULL,
  `VezesZerou` varchar(500) NOT NULL,
  `Minutos` varchar(100) NOT NULL,
  `Segundos` varchar(100) NOT NULL,
  `Terminou` varchar(100) NOT NULL,
  `Soma` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_estatistica`),
  KEY `nome` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estatisticas`
--

INSERT INTO `estatisticas` (`ID_estatistica`, `nome`, `VezesZerou`, `Minutos`, `Segundos`, `Terminou`, `Soma`) VALUES
(45, 'gabreu', '1', '0', '36', '1', '036');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `ID_usuario` int(10) NOT NULL AUTO_INCREMENT,
  `adm` int(11) NOT NULL,
  `inativo` int(10) NOT NULL,
  `nome` varchar(16) NOT NULL,
  `email` varchar(40) NOT NULL,
  `senha` varchar(16) NOT NULL,
  `dataCria` varchar(1000) NOT NULL,
  PRIMARY KEY (`ID_usuario`),
  KEY `nickname` (`nome`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`ID_usuario`, `adm`, `inativo`, `nome`, `email`, `senha`, `dataCria`) VALUES
(43, 0, 0, 'gabreu', 'gabreu@gmail.com', '123456', '21/11/2022');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `estatisticas`
--
ALTER TABLE `estatisticas`
  ADD CONSTRAINT `estatisticas_ibfk_1` FOREIGN KEY (`nome`) REFERENCES `usuario` (`nome`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
