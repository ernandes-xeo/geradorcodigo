-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.28-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para codigo_barras
CREATE DATABASE IF NOT EXISTS `codigo_barras` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `codigo_barras`;

-- Copiando estrutura para tabela codigo_barras.codigo
DROP TABLE IF EXISTS `codigo`;
CREATE TABLE IF NOT EXISTS `codigo` (
  `idcodigo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `cor_id` int(11) NOT NULL,
  `tamanho_id` int(11) NOT NULL,
  `referencia_id` int(11) NOT NULL,
  PRIMARY KEY (`idcodigo`),
  KEY `fk_codigo_cor1_idx` (`cor_id`),
  KEY `fk_codigo_tamanho1_idx` (`tamanho_id`),
  KEY `fk_codigo_referencia1_idx` (`referencia_id`),
  CONSTRAINT `fk_codigo_cor1` FOREIGN KEY (`cor_id`) REFERENCES `cor` (`idcor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_codigo_referencia1` FOREIGN KEY (`referencia_id`) REFERENCES `referencia` (`idreferecia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_codigo_tamanho1` FOREIGN KEY (`tamanho_id`) REFERENCES `tamanho` (`idtamanho`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela codigo_barras.codigo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `codigo` DISABLE KEYS */;
/*!40000 ALTER TABLE `codigo` ENABLE KEYS */;

-- Copiando estrutura para tabela codigo_barras.cor
DROP TABLE IF EXISTS `cor`;
CREATE TABLE IF NOT EXISTS `cor` (
  `idcor` int(11) NOT NULL AUTO_INCREMENT,
  `cor` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idcor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='	';

-- Copiando dados para a tabela codigo_barras.cor: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cor` DISABLE KEYS */;
/*!40000 ALTER TABLE `cor` ENABLE KEYS */;

-- Copiando estrutura para tabela codigo_barras.marca
DROP TABLE IF EXISTS `marca`;
CREATE TABLE IF NOT EXISTS `marca` (
  `idmarca` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(90) COLLATE utf8_bin DEFAULT NULL,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idmarca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela codigo_barras.marca: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;

-- Copiando estrutura para tabela codigo_barras.referencia
DROP TABLE IF EXISTS `referencia`;
CREATE TABLE IF NOT EXISTS `referencia` (
  `idreferecia` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `marca_id` int(11) NOT NULL,
  `tipo_id` int(11) NOT NULL,
  PRIMARY KEY (`idreferecia`),
  KEY `fk_referencia_marca_idx` (`marca_id`),
  KEY `fk_referencia_tipo1_idx` (`tipo_id`),
  CONSTRAINT `fk_referencia_marca` FOREIGN KEY (`marca_id`) REFERENCES `marca` (`idmarca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_referencia_tipo1` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`idtipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela codigo_barras.referencia: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `referencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `referencia` ENABLE KEYS */;

-- Copiando estrutura para tabela codigo_barras.tamanho
DROP TABLE IF EXISTS `tamanho`;
CREATE TABLE IF NOT EXISTS `tamanho` (
  `idtamanho` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idtamanho`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela codigo_barras.tamanho: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tamanho` DISABLE KEYS */;
/*!40000 ALTER TABLE `tamanho` ENABLE KEYS */;

-- Copiando estrutura para tabela codigo_barras.tipo
DROP TABLE IF EXISTS `tipo`;
CREATE TABLE IF NOT EXISTS `tipo` (
  `idtipo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idtipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='	';

-- Copiando dados para a tabela codigo_barras.tipo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela codigo_barras.usuario: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `usuario`, `nome`, `mail`, `senha`) VALUES
	(1, 'root', 'WebMaster', 'dev@agenciamagento.com', '4dadad5718e3b3bd1cbffa616805431d'),
	(2, 'felps', 'WebMind', 'felipe@agenciamagento.com', '1c0874b0e597adb3a92314845eb3e867');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
