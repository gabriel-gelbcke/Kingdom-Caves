CREATE DATABASE IF NOT EXISTS `gameserver`;

USE gameserver;

DROP TABLE IF EXISTS `estatisticas`;
CREATE TABLE IF NOT EXISTS `estatisticas` (
  `ID_estatistica` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(16) NOT NULL,
  `VezesZerou` varchar(500) NOT NULL,
  `Minutos` varchar(100) NOT NULL,
  `Segundos` varchar(100) NOT NULL,
  `Terminou` varchar(100) NOT NULL,
  `Soma` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_estatistica`),
  KEY `nome` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb3;

INSERT INTO `estatisticas` (`ID_estatistica`, `nome`, `VezesZerou`, `Minutos`, `Segundos`, `Terminou`, `Soma`) VALUES
(45, 'gabreu', '3', '0', '36', '1', '036'),
(49, 'gabreu2', '1', '0', '33', '1', '033');

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `ID_usuario` int NOT NULL AUTO_INCREMENT,
  `adm` int NOT NULL,
  `inativo` int NOT NULL,
  `nome` varchar(16) NOT NULL,
  `email` varchar(40) NOT NULL,
  `senha` varchar(16) NOT NULL,
  `dataCria` varchar(1000) NOT NULL,
  PRIMARY KEY (`ID_usuario`),
  KEY `nickname` (`nome`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb3;

INSERT INTO `usuario` (`ID_usuario`, `adm`, `inativo`, `nome`, `email`, `senha`, `dataCria`) VALUES
(43, 1, 0, 'gabreu', 'gabreu@gmail.com', 'senha123', '21/11/2022'),
(47, 0, 0, 'gabreu2', 'g2@gmail.com', 'senha123', '15/07/2024');

ALTER TABLE `estatisticas`
  ADD CONSTRAINT `estatisticas_ibfk_1` FOREIGN KEY (`nome`) REFERENCES `usuario` (`nome`);
COMMIT;