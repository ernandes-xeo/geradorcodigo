-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.38-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para codigo_barras
DROP DATABASE IF EXISTS `codigo_barras`;
CREATE DATABASE IF NOT EXISTS `codigo_barras` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `codigo_barras`;

-- Copiando estrutura para tabela codigo_barras.codigo
DROP TABLE IF EXISTS `codigo`;
CREATE TABLE IF NOT EXISTS `codigo` (
  `idcodigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `nome_site` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `codigo_produto` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `gtin` varchar(90) COLLATE utf8_bin DEFAULT NULL,
  `marca_id` int(11) NOT NULL,
  `tipo_id` int(11) NOT NULL,
  `referencia_id` int(11) NOT NULL,
  `cor_id` int(11) DEFAULT NULL,
  `tamanho_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcodigo`),
  KEY `fk_codigo_cor1_idx` (`cor_id`),
  KEY `fk_codigo_tamanho1_idx` (`tamanho_id`),
  KEY `fk_codigo_referencia1_idx` (`referencia_id`),
  KEY `fk_codigo_marca1_idx` (`marca_id`),
  KEY `fk_codigo_tipo1_idx` (`tipo_id`),
  CONSTRAINT `FK_codigo_marca` FOREIGN KEY (`marca_id`) REFERENCES `marca` (`idmarca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_codigo_referencia` FOREIGN KEY (`referencia_id`) REFERENCES `referencia` (`idreferencia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_codigo_tipo` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`idtipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela codigo_barras.codigo: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `codigo` DISABLE KEYS */;
INSERT INTO `codigo` (`idcodigo`, `nome`, `nome_site`, `codigo_produto`, `gtin`, `marca_id`, `tipo_id`, `referencia_id`, `cor_id`, `tamanho_id`) VALUES
	(2, 'Polo Basic Polo Live', NULL, '10110100', NULL, 101, 10, 100, NULL, NULL),
	(3, 'Polo Basic Azul Marinho Polo Live PP', NULL, '101101001310', NULL, 101, 10, 100, 13, 10),
	(4, 'Polo Basic Azul Marinho Polo Live M', NULL, '101101001312', NULL, 101, 10, 100, 13, 12),
	(5, 'Polo Basic Azul Marinho Polo Live GG', NULL, '101101001314', NULL, 101, 10, 100, 13, 14);
/*!40000 ALTER TABLE `codigo` ENABLE KEYS */;

-- Copiando estrutura para tabela codigo_barras.cor
DROP TABLE IF EXISTS `cor`;
CREATE TABLE IF NOT EXISTS `cor` (
  `idcor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idcor`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='	';

-- Copiando dados para a tabela codigo_barras.cor: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `cor` DISABLE KEYS */;
INSERT INTO `cor` (`idcor`, `nome`) VALUES
	(10, 'Preto'),
	(11, 'Branco'),
	(12, 'Cinza'),
	(13, 'Azul Marinho'),
	(14, 'Cinza Claro'),
	(15, 'Cinza Escuro');
/*!40000 ALTER TABLE `cor` ENABLE KEYS */;

-- Copiando estrutura para tabela codigo_barras.marca
DROP TABLE IF EXISTS `marca`;
CREATE TABLE IF NOT EXISTS `marca` (
  `idmarca` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idmarca`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela codigo_barras.marca: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
INSERT INTO `marca` (`idmarca`, `nome`) VALUES
	(100, 'Phox'),
	(101, 'Polo Live'),
	(102, 'XK'),
	(103, 'Amil'),
	(104, 'Amaro'),
	(105, 'Versani'),
	(106, 'Vestaria'),
	(107, 'Eterna Magia');
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;

-- Copiando estrutura para tabela codigo_barras.referencia
DROP TABLE IF EXISTS `referencia`;
CREATE TABLE IF NOT EXISTS `referencia` (
  `idreferencia` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `marca_id` int(11) NOT NULL,
  `tipo_id` int(11) NOT NULL,
  PRIMARY KEY (`idreferencia`),
  KEY `fk_referencia_marca_idx` (`marca_id`),
  KEY `fk_referencia_tipo1_idx` (`tipo_id`),
  CONSTRAINT `fk_referencia_marca` FOREIGN KEY (`marca_id`) REFERENCES `marca` (`idmarca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_referencia_tipo1` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`idtipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela codigo_barras.referencia: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `referencia` DISABLE KEYS */;
INSERT INTO `referencia` (`idreferencia`, `nome`, `marca_id`, `tipo_id`) VALUES
	(100, 'Basic', 101, 10);
/*!40000 ALTER TABLE `referencia` ENABLE KEYS */;

-- Copiando estrutura para tabela codigo_barras.tamanho
DROP TABLE IF EXISTS `tamanho`;
CREATE TABLE IF NOT EXISTS `tamanho` (
  `idtamanho` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idtamanho`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela codigo_barras.tamanho: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `tamanho` DISABLE KEYS */;
INSERT INTO `tamanho` (`idtamanho`, `nome`) VALUES
	(10, 'PP'),
	(11, 'P'),
	(12, 'M'),
	(13, 'G'),
	(14, 'GG'),
	(15, 'G1'),
	(16, 'G2'),
	(17, 'G3'),
	(18, 'G4'),
	(19, 'U');
/*!40000 ALTER TABLE `tamanho` ENABLE KEYS */;

-- Copiando estrutura para tabela codigo_barras.tipo
DROP TABLE IF EXISTS `tipo`;
CREATE TABLE IF NOT EXISTS `tipo` (
  `idtipo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idtipo`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='	';

-- Copiando dados para a tabela codigo_barras.tipo: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
INSERT INTO `tipo` (`idtipo`, `nome`) VALUES
	(10, 'Polo'),
	(11, 'Polo M/ Longa'),
	(12, 'Camiseta'),
	(13, 'Calça'),
	(14, 'Calça Jeans'),
	(15, 'Camisa Slim'),
	(16, 'Calça Moletom');
/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;

-- Copiando estrutura para tabela codigo_barras.usuario
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `nome` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `mail` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `senha` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela codigo_barras.usuario: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `usuario`, `nome`, `mail`, `senha`) VALUES
	(1, 'root', 'WebMaster', 'dev@vestaria.com.br', '827ccb0eea8a706c4c34a16891f84e7b'),
	(2, 'admin', 'Vestaria Admin', 'contato@vestaria.com.br', '277a7ab8dd50af91297d5c175164c66e'),
	(3, 'carol', 'Carol', 'carol@vestaria.com.br', '158c6f5d824b51b99ae2e5578a66e98c');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
