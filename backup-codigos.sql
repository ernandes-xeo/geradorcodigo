-- MySQL dump 10.13  Distrib 5.6.36-82.0, for Linux (x86_64)
--
-- Host: cod_barras.mysql.dbaas.com.br    Database: cod_barras
-- ------------------------------------------------------
-- Server version	5.6.35-81.0-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*!50112 SELECT COUNT(*) INTO @is_rocksdb_supported FROM INFORMATION_SCHEMA.SESSION_VARIABLES WHERE VARIABLE_NAME='rocksdb_bulk_load' */;
/*!50112 SET @save_old_rocksdb_bulk_load = IF (@is_rocksdb_supported, 'SET @old_rocksdb_bulk_load = @@rocksdb_bulk_load', 'SET @dummy_old_rocksdb_bulk_load = 0') */;
/*!50112 PREPARE s FROM @save_old_rocksdb_bulk_load */;
/*!50112 EXECUTE s */;
/*!50112 SET @enable_bulk_load = IF (@is_rocksdb_supported, 'SET SESSION rocksdb_bulk_load = 1', 'SET @dummy_rocksdb_bulk_load = 0') */;
/*!50112 PREPARE s FROM @enable_bulk_load */;
/*!50112 EXECUTE s */;
/*!50112 DEALLOCATE PREPARE s */;

--
-- Table structure for table `codigo`
--

DROP TABLE IF EXISTS `codigo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `codigo` (
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
) ENGINE=InnoDB AUTO_INCREMENT=280 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `codigo`
--

LOCK TABLES `codigo` WRITE;
/*!40000 ALTER TABLE `codigo` DISABLE KEYS */;
INSERT INTO `codigo` VALUES (72,'Bermuda Jeans Jogger 4584 Max Denim 34','','1092110534',NULL,109,21,105,NULL,34),(73,'Bermuda Jeans Jogger 4584 Max Denim 36','','1092110536',NULL,109,21,105,NULL,36),(74,'Bermuda Jeans Jogger 4584 Max Denim 38','','1092110538',NULL,109,21,105,NULL,38),(75,'Bermuda Jeans Jogger 4584 Max Denim 40','','1092110540',NULL,109,21,105,NULL,40),(76,'Bermuda Jeans Jogger 4584 Max Denim 42','','1092110542',NULL,109,21,105,NULL,42),(77,'Bermuda Jeans Jogger 4584 Max Denim 44','','1092110544',NULL,109,21,105,NULL,44),(78,'Bermuda Jeans Jogger 4584 Max Denim 46','','1092110546',NULL,109,21,105,NULL,46),(79,'Bermuda Jeans Jogger 4584 Max Denim 48','','1092110548',NULL,109,21,105,NULL,48),(80,'Short Curto Jogger 4553 Max Denim 34','','1092710634',NULL,109,27,106,NULL,34),(81,'Short Curto Jogger 4553 Max Denim 36','','1092710636',NULL,109,27,106,NULL,36),(82,'Short Curto Jogger 4553 Max Denim 38','','1092710638',NULL,109,27,106,NULL,38),(83,'Short Curto Jogger 4553 Max Denim 40','','1092710640',NULL,109,27,106,NULL,40),(84,'Short Curto Jogger 4553 Max Denim 42','','1092710642',NULL,109,27,106,NULL,42),(85,'Short Curto Jogger 4553 Max Denim 44','','1092710644',NULL,109,27,106,NULL,44),(86,'Short Curto Jogger 4553 Max Denim 46','','1092710646',NULL,109,27,106,NULL,46),(87,'Short Curto 4560 Max Denim 34','','1092210734',NULL,109,22,107,NULL,34),(88,'Short Curto 4560 Max Denim 36','','1092210736',NULL,109,22,107,NULL,36),(89,'Short Curto 4560 Max Denim 38','','1092210738',NULL,109,22,107,NULL,38),(90,'Short Curto 4560 Max Denim 40','','1092210740',NULL,109,22,107,NULL,40),(91,'Short Curto 4560 Max Denim 42','','1092210742',NULL,109,22,107,NULL,42),(92,'Short Curto 4560 Max Denim 44','','1092210744',NULL,109,22,107,NULL,44),(93,'Short Curto 4560 Max Denim 46','','1092210746',NULL,109,22,107,NULL,46),(101,'Short Curto 4613 Rosa Max Denim 34','','109221081734',NULL,109,22,108,17,34),(102,'Short Curto 4613 Rosa Max Denim 36','','109221081736',NULL,109,22,108,17,36),(103,'Short Curto 4613 Rosa Max Denim 38','','109221081738',NULL,109,22,108,17,38),(104,'Short Curto 4613 Rosa Max Denim 40','','109221081740',NULL,109,22,108,17,40),(105,'Short Curto 4613 Rosa Max Denim 42','','109221081742',NULL,109,22,108,17,42),(106,'Short Curto 4613 Rosa Max Denim 44','','109221081744',NULL,109,22,108,17,44),(107,'Short Curto 4613 Rosa Max Denim 46','','109221081746',NULL,109,22,108,17,46),(108,'Bermuda Tradicional 10449 Max Denim 34','','1092310934',NULL,109,23,109,NULL,34),(109,'Bermuda Tradicional 10449 Max Denim 36','','1092310936',NULL,109,23,109,NULL,36),(110,'Bermuda Tradicional 10449 Max Denim 38','','1092310938',NULL,109,23,109,NULL,38),(111,'Bermuda Tradicional 10449 Max Denim 40','','1092310940',NULL,109,23,109,NULL,40),(112,'Bermuda Tradicional 10449 Max Denim 42','','1092310942',NULL,109,23,109,NULL,42),(113,'Bermuda Tradicional 10449 Max Denim 44','','1092310944',NULL,109,23,109,NULL,44),(114,'Bermuda Tradicional 10449 Max Denim 46','','1092310946',NULL,109,23,109,NULL,46),(115,'Bermuda Tradicional 10449 Max Denim 48','','1092310948',NULL,109,23,109,NULL,48),(116,'Bermuda Cos Alto 4589 Max Denim 34','','1092411034',NULL,109,24,110,NULL,34),(117,'Bermuda Cos Alto 4589 Max Denim 36','','1092411036',NULL,109,24,110,NULL,36),(118,'Bermuda Cos Alto 4589 Max Denim 38','','1092411038',NULL,109,24,110,NULL,38),(119,'Bermuda Cos Alto 4589 Max Denim 40','','1092411040',NULL,109,24,110,NULL,40),(120,'Bermuda Cos Alto 4589 Max Denim 42','','1092411042',NULL,109,24,110,NULL,42),(121,'Bermuda Cos Alto 4589 Max Denim 44','','1092411044',NULL,109,24,110,NULL,44),(122,'Bermuda Cos Alto 4589 Max Denim 46','','1092411046',NULL,109,24,110,NULL,46),(123,'Bermuda Cos Alto 4589 Max Denim 48','','1092411048',NULL,109,24,110,NULL,48),(124,'Bermuda Cos Alto 4589 Max Denim 50','','1092411050',NULL,109,24,110,NULL,50),(125,'Bermuda Cos Alto 4589 Max Denim 52','','1092411052',NULL,109,24,110,NULL,52),(126,'Short Boyfriend 4541 Max Denim 34','','1092511134',NULL,109,25,111,NULL,34),(127,'Short Boyfriend 4541 Max Denim 36','','1092511136',NULL,109,25,111,NULL,36),(128,'Short Boyfriend 4541 Max Denim 38','','1092511138',NULL,109,25,111,NULL,38),(129,'Short Boyfriend 4541 Max Denim 40','','1092511140',NULL,109,25,111,NULL,40),(130,'Short Boyfriend 4541 Max Denim 42','','1092511142',NULL,109,25,111,NULL,42),(131,'Short Boyfriend 4541 Max Denim 44','','1092511144',NULL,109,25,111,NULL,44),(132,'Short Boyfriend 4541 Max Denim 46','','1092511146',NULL,109,25,111,NULL,46),(133,'Short Curto 4552 Max Denim 34','','1092211334',NULL,109,22,113,NULL,34),(134,'Short Curto 4552 Max Denim 36','','1092211336',NULL,109,22,113,NULL,36),(135,'Short Curto 4552 Max Denim 38','','1092211338',NULL,109,22,113,NULL,38),(136,'Short Curto 4552 Max Denim 40','','1092211340',NULL,109,22,113,NULL,40),(137,'Short Curto 4552 Max Denim 42','','1092211342',NULL,109,22,113,NULL,42),(138,'Short Curto 4552 Max Denim 44','','1092211344',NULL,109,22,113,NULL,44),(139,'Short Curto 4552 Max Denim 46','','1092211346',NULL,109,22,113,NULL,46),(140,'Saia Secretaria 4615 Max Denim 34','','1092611434',NULL,109,26,114,NULL,34),(141,'Saia Secretaria 4615 Max Denim 36','','1092611436',NULL,109,26,114,NULL,36),(142,'Saia Secretaria 4615 Max Denim 38','','1092611438',NULL,109,26,114,NULL,38),(143,'Saia Secretaria 4615 Max Denim 40','','1092611440',NULL,109,26,114,NULL,40),(144,'Saia Secretaria 4615 Max Denim 42','','1092611442',NULL,109,26,114,NULL,42),(145,'Saia Secretaria 4615 Max Denim 44','','1092611444',NULL,109,26,114,NULL,44),(146,'Saia Secretaria 4615 Max Denim 46','','1092611446',NULL,109,26,114,NULL,46),(147,'Bermuda Brim 7190 Azul Marinho Coral Reef 38','','110281151338',NULL,110,28,115,13,38),(148,'Bermuda Brim 7190 Azul Marinho Coral Reef 40','','110281151340',NULL,110,28,115,13,40),(149,'Bermuda Brim 7190 Azul Marinho Coral Reef 42','','110281151342',NULL,110,28,115,13,42),(150,'Bermuda Brim 7190 Azul Marinho Coral Reef 44','','110281151344',NULL,110,28,115,13,44),(151,'Bermuda Brim 7190 Azul Marinho Coral Reef 46','','110281151346',NULL,110,28,115,13,46),(152,'Bermuda Brim 7190 Caqui Coral Reef 38','','110281151938',NULL,110,28,115,19,38),(153,'Bermuda Brim 7190 Caqui Coral Reef 40','','110281151940',NULL,110,28,115,19,40),(154,'Bermuda Brim 7190 Caqui Coral Reef 42','','110281151942',NULL,110,28,115,19,42),(155,'Bermuda Brim 7190 Caqui Coral Reef 44','','110281151944',NULL,110,28,115,19,44),(156,'Bermuda Brim 7190 Caqui Coral Reef 46','','110281151946',NULL,110,28,115,19,46),(157,'Bermuda Brim 7190 Mescla Coral Reef 38','','110281152138',NULL,110,28,115,21,38),(158,'Bermuda Brim 7190 Mescla Coral Reef 40','','110281152140',NULL,110,28,115,21,40),(159,'Bermuda Brim 7190 Mescla Coral Reef 42','','110281152142',NULL,110,28,115,21,42),(160,'Bermuda Brim 7190 Mescla Coral Reef 44','','110281152144',NULL,110,28,115,21,44),(161,'Bermuda Brim 7190 Mescla Coral Reef 46','','110281152146',NULL,110,28,115,21,46),(162,'Bermuda Brim 7189 Caqui Coral Reef 38','','110281161938',NULL,110,28,116,19,38),(163,'Bermuda Brim 7189 Caqui Coral Reef 40','','110281161940',NULL,110,28,116,19,40),(164,'Bermuda Brim 7189 Caqui Coral Reef 42','','110281161942',NULL,110,28,116,19,42),(165,'Bermuda Brim 7189 Caqui Coral Reef 44','','110281161944',NULL,110,28,116,19,44),(166,'Bermuda Brim 7189 Caqui Coral Reef 46','','110281161946',NULL,110,28,116,19,46),(167,'Bermuda Brim 7189 Azul Coral Reef 38','','110281162238',NULL,110,28,116,22,38),(168,'Bermuda Brim 7189 Azul Coral Reef 40','','110281162240',NULL,110,28,116,22,40),(169,'Bermuda Brim 7189 Azul Coral Reef 42','','110281162242',NULL,110,28,116,22,42),(170,'Bermuda Brim 7189 Azul Coral Reef 44','','110281162244',NULL,110,28,116,22,44),(171,'Bermuda Brim 7189 Azul Coral Reef 46','','110281162246',NULL,110,28,116,22,46),(172,'Bermuda Brim 7189 Petroleo Coral Reef 38','','110281162338',NULL,110,28,116,23,38),(173,'Bermuda Brim 7189 Petroleo Coral Reef 40','','110281162340',NULL,110,28,116,23,40),(174,'Bermuda Brim 7189 Petroleo Coral Reef 42','','110281162342',NULL,110,28,116,23,42),(175,'Bermuda Brim 7189 Petroleo Coral Reef 44','','110281162344',NULL,110,28,116,23,44),(176,'Bermuda Brim 7189 Petroleo Coral Reef 46','','110281162346',NULL,110,28,116,23,46),(177,'Bermuda Brim 7194 Listrada Coral Reef 38','','110281171838',NULL,110,28,117,18,38),(178,'Bermuda Brim 7194 Listrada Coral Reef 40','','110281171840',NULL,110,28,117,18,40),(179,'Bermuda Brim 7194 Listrada Coral Reef 42','','110281171842',NULL,110,28,117,18,42),(180,'Bermuda Brim 7194 Listrada Coral Reef 44','','110281171844',NULL,110,28,117,18,44),(181,'Bermuda Brim 7194 Listrada Coral Reef 46','','110281171846',NULL,110,28,117,18,46),(182,'Blusa Sem Manga 5514 Preto Aishty P','','111291181011',NULL,111,29,118,10,11),(183,'Blusa Sem Manga 5514 Preto Aishty M','','111291181012',NULL,111,29,118,10,12),(184,'Blusa Sem Manga 5514 Preto Aishty G','','111291181013',NULL,111,29,118,10,13),(185,'Blusa Sem Manga 5514 Estampado Aishty P','','111291183711',NULL,111,29,118,37,11),(186,'Blusa Sem Manga 5514 Estampado Aishty M','','111291183712',NULL,111,29,118,37,12),(187,'Blusa Sem Manga 5514 Estampado Aishty G','','111291183713',NULL,111,29,118,37,13),(188,'Blusa Alça 5519 Preto Aishty P','','111301191011',NULL,111,30,119,10,11),(189,'Blusa Alça 5519 Preto Aishty M','','111301191012',NULL,111,30,119,10,12),(190,'Blusa Alça 5519 Preto Aishty G','','111301191013',NULL,111,30,119,10,13),(191,'Blusa Alça 5519 Estampado Lilas Aishty P','','111301193811',NULL,111,30,119,38,11),(192,'Blusa Alça 5519 Estampado Lilas Aishty M','','111301193812',NULL,111,30,119,38,12),(193,'Blusa Alça 5519 Estampado Lilas Aishty G','','111301193813',NULL,111,30,119,38,13),(194,'Blusa Alça 5519 Estampado Marinho Aishty P','','111301193911',NULL,111,30,119,39,11),(195,'Blusa Alça 5519 Estampado Marinho Aishty M','','111301193912',NULL,111,30,119,39,12),(196,'Blusa Alça 5519 Estampado Marinho Aishty G','','111301193913',NULL,111,30,119,39,13),(197,'Vestido Curto AA5 5612 Prints Aishty P','','111341253211',NULL,111,34,125,32,11),(198,'Vestido Curto AA5 5612 Prints Aishty M','','111341253212',NULL,111,34,125,32,12),(199,'Vestido Curto AA5 5612 Prints Aishty G','','111341253213',NULL,111,34,125,32,13),(200,'Vestido Curto AA5 5612 Prints Aishty GG','','111341253214',NULL,111,34,125,32,14),(201,'Vestido Curto AA5B 5612 Prints Aishty P','','111351263211',NULL,111,35,126,32,11),(202,'Vestido Curto AA5B 5612 Prints Aishty M','','111351263212',NULL,111,35,126,32,12),(203,'Vestido Curto AA5B 5612 Prints Aishty G','','111351263213',NULL,111,35,126,32,13),(204,'Vestido Curto AA5B 5612 Prints Aishty GG','','111351263214',NULL,111,35,126,32,14),(205,'Blusa Manga Curta 5799 Preto Aishty P','','111321211011',NULL,111,32,121,10,11),(206,'Blusa Manga Curta 5799 Preto Aishty M','','111321211012',NULL,111,32,121,10,12),(207,'Blusa Manga Curta 5799 Preto Aishty G','','111321211013',NULL,111,32,121,10,13),(208,'Blusa Manga Curta 5799 Preto Aishty GG','','111321211014',NULL,111,32,121,10,14),(209,'Blusa Manga Curta 5799 Azul Celeste Aishty P','','111321212611',NULL,111,32,121,26,11),(210,'Blusa Manga Curta 5799 Azul Celeste Aishty M','','111321212612',NULL,111,32,121,26,12),(211,'Blusa Manga Curta 5799 Azul Celeste Aishty G','','111321212613',NULL,111,32,121,26,13),(212,'Blusa Manga Curta 5799 Azul Celeste Aishty GG','','111321212614',NULL,111,32,121,26,14),(213,'Blusa Manga Curta 5799 Estampado Aishty P','','111321213711',NULL,111,32,121,37,11),(214,'Blusa Manga Curta 5799 Estampado Aishty M','','111321213712',NULL,111,32,121,37,12),(215,'Blusa Manga Curta 5799 Estampado Aishty G','','111321213713',NULL,111,32,121,37,13),(216,'Blusa Manga Curta 5799 Estampado Aishty GG','','111321213714',NULL,111,32,121,37,14),(217,'Blusa Manga Curta 7330 Preto Aishty P','','111321241011',NULL,111,32,124,10,11),(218,'Blusa Manga Curta 7330 Preto Aishty M','','111321241012',NULL,111,32,124,10,12),(219,'Blusa Manga Curta 7330 Preto Aishty G','','111321241013',NULL,111,32,124,10,13),(220,'Blusa Manga Curta 7330 Preto Aishty GG','','111321241014',NULL,111,32,124,10,14),(221,'Blusa Manga Curta 7330 Off White Aishty P','','111321242811',NULL,111,32,124,28,11),(222,'Blusa Manga Curta 7330 Off White Aishty M','','111321242812',NULL,111,32,124,28,12),(223,'Blusa Manga Curta 7330 Off White Aishty G','','111321242813',NULL,111,32,124,28,13),(224,'Blusa Manga Curta 7330 Off White Aishty GG','','111321242814',NULL,111,32,124,28,14),(225,'Blusa Manga Curta 7330 Azaleia Aishty P','','111321242911',NULL,111,32,124,29,11),(226,'Blusa Manga Curta 7330 Azaleia Aishty M','','111321242912',NULL,111,32,124,29,12),(227,'Blusa Manga Curta 7330 Azaleia Aishty G','','111321242913',NULL,111,32,124,29,13),(228,'Blusa Manga Curta 7330 Azaleia Aishty GG','','111321242914',NULL,111,32,124,29,14),(229,'Blusa Alça 8571 Preto Aishty P','','111301271011',NULL,111,30,127,10,11),(230,'Blusa Alça 8571 Preto Aishty M','','111301271012',NULL,111,30,127,10,12),(231,'Blusa Alça 8571 Preto Aishty G','','111301271013',NULL,111,30,127,10,13),(232,'Blusa Alça 8571 Preto Aishty GG','','111301271014',NULL,111,30,127,10,14),(233,'Blusa Alça 8571 Bege Aishty P','','111301273011',NULL,111,30,127,30,11),(234,'Blusa Alça 8571 Bege Aishty M','','111301273012',NULL,111,30,127,30,12),(235,'Blusa Alça 8571 Bege Aishty G','','111301273013',NULL,111,30,127,30,13),(236,'Blusa Alça 8571 Bege Aishty GG','','111301273014',NULL,111,30,127,30,14),(237,'Blusa Alça 8571 Azul Royal Aishty P','','111301273111',NULL,111,30,127,31,11),(238,'Blusa Alça 8571 Azul Royal Aishty M','','111301273112',NULL,111,30,127,31,12),(239,'Blusa Alça 8571 Azul Royal Aishty G','','111301273113',NULL,111,30,127,31,13),(240,'Blusa Alça 8571 Azul Royal Aishty GG','','111301273114',NULL,111,30,127,31,14),(241,'Blusa 9729 Preto Aishty P','','111331281011',NULL,111,33,128,10,11),(242,'Blusa 9729 Preto Aishty M','','111331281012',NULL,111,33,128,10,12),(243,'Blusa 9729 Preto Aishty G','','111331281013',NULL,111,33,128,10,13),(244,'Blusa 9729 Preto Aishty GG','','111331281014',NULL,111,33,128,10,14),(245,'Blusa 9729 Rose Aishty P','','111331283411',NULL,111,33,128,34,11),(246,'Blusa 9729 Rose Aishty M','','111331283412',NULL,111,33,128,34,12),(247,'Blusa 9729 Rose Aishty G','','111331283413',NULL,111,33,128,34,13),(248,'Blusa 9729 Rose Aishty GG','','111331283414',NULL,111,33,128,34,14),(249,'Blusa 9729 Vinho Aishty P','','111331283511',NULL,111,33,128,35,11),(250,'Blusa 9729 Vinho Aishty M','','111331283512',NULL,111,33,128,35,12),(251,'Blusa 9729 Vinho Aishty G','','111331283513',NULL,111,33,128,35,13),(252,'Blusa 9729 Vinho Aishty GG','','111331283514',NULL,111,33,128,35,14),(253,'Blusa 9765 Preto Aishty P','','111331291011',NULL,111,33,129,10,11),(254,'Blusa 9765 Preto Aishty M','','111331291012',NULL,111,33,129,10,12),(255,'Blusa 9765 Preto Aishty G','','111331291013',NULL,111,33,129,10,13),(256,'Blusa 9765 Preto Aishty GG','','111331291014',NULL,111,33,129,10,14),(257,'Blusa 9765 Branco Aishty P','','111331291111',NULL,111,33,129,11,11),(258,'Blusa 9765 Branco Aishty M','','111331291112',NULL,111,33,129,11,12),(259,'Blusa 9765 Branco Aishty G','','111331291113',NULL,111,33,129,11,13),(260,'Blusa 9765 Branco Aishty GG','','111331291114',NULL,111,33,129,11,14),(261,'Blusa 9765 Areia Aishty P','','111331293311',NULL,111,33,129,33,11),(262,'Blusa 9765 Areia Aishty M','','111331293312',NULL,111,33,129,33,12),(263,'Blusa 9765 Areia Aishty G','','111331293313',NULL,111,33,129,33,13),(264,'Blusa 9765 Areia Aishty GG','','111331293314',NULL,111,33,129,33,14),(265,'Blusa Manga Curta 6126 Preto Aishty P',NULL,'111321221011',NULL,111,32,122,10,11),(266,'Blusa Manga Curta 6126 Preto Aishty M',NULL,'111321221012',NULL,111,32,122,10,12),(267,'Blusa Manga Curta 6126 Preto Aishty G',NULL,'111321221013',NULL,111,32,122,10,13),(268,'Blusa Manga Curta 6126 Preto Aishty GG',NULL,'111321221014',NULL,111,32,122,10,14),(269,'Blusa Manga Curta 6126 Pitanga Aishty P',NULL,'111321222711',NULL,111,32,122,27,11),(270,'Blusa Manga Curta 6126 Pitanga Aishty M',NULL,'111321222712',NULL,111,32,122,27,12),(271,'Blusa Manga Curta 6126 Pitanga Aishty G',NULL,'111321222713',NULL,111,32,122,27,13),(272,'Blusa Manga Curta 6126 Pitanga Aishty GG',NULL,'111321222714',NULL,111,32,122,27,14),(273,'Blusa Manga Curta 6126 Off White Aishty P',NULL,'111321222811',NULL,111,32,122,28,11),(274,'Blusa Manga Curta 6126 Off White Aishty M',NULL,'111321222812',NULL,111,32,122,28,12),(275,'Blusa Manga Curta 6126 Off White Aishty G',NULL,'111321222813',NULL,111,32,122,28,13),(276,'Blusa Manga Curta 6126 Off White Aishty GG',NULL,'111321222814',NULL,111,32,122,28,14),(277,'Blusa Sem Manga 5514 Romã Aishty P',NULL,'111291183611',NULL,111,29,118,36,11),(278,'Blusa Sem Manga 5514 Romã Aishty M',NULL,'111291183612',NULL,111,29,118,36,12),(279,'Blusa Sem Manga 5514 Romã Aishty G',NULL,'111291183613',NULL,111,29,118,36,13);
/*!40000 ALTER TABLE `codigo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cor`
--

DROP TABLE IF EXISTS `cor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cor` (
  `idcor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idcor`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cor`
--

LOCK TABLES `cor` WRITE;
/*!40000 ALTER TABLE `cor` DISABLE KEYS */;
INSERT INTO `cor` VALUES (10,'Preto'),(11,'Branco'),(12,'Cinza'),(13,'Azul Marinho'),(14,'Cinza Claro'),(15,'Cinza Escuro'),(16,'Jeans'),(17,'Rosa'),(18,'Listrada'),(19,'Caqui'),(21,'Mescla'),(22,'Azul'),(23,'Petroleo'),(24,'Lilas'),(25,'Marinho'),(26,'Azul Celeste'),(27,'Pitanga'),(28,'Off White'),(29,'Azaleia'),(30,'Bege'),(31,'Azul Royal'),(32,'Prints'),(33,'Areia'),(34,'Rose'),(35,'Vinho'),(36,'Romã'),(37,'Estampado'),(38,'Estampado Lilas'),(39,'Estampado Marinho');
/*!40000 ALTER TABLE `cor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marca`
--

DROP TABLE IF EXISTS `marca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marca` (
  `idmarca` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idmarca`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marca`
--

LOCK TABLES `marca` WRITE;
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
INSERT INTO `marca` VALUES (100,'Phox'),(101,'Polo Live'),(102,'XK'),(103,'Amil'),(104,'Amaro'),(105,'Versani'),(106,'Vestaria'),(107,'Eterna Magia'),(109,'Max Denim'),(110,'Coral Reef'),(111,'Aishty');
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `referencia`
--

DROP TABLE IF EXISTS `referencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `referencia` (
  `idreferencia` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `marca_id` int(11) NOT NULL,
  `tipo_id` int(11) NOT NULL,
  PRIMARY KEY (`idreferencia`),
  KEY `fk_referencia_marca_idx` (`marca_id`),
  KEY `fk_referencia_tipo1_idx` (`tipo_id`),
  CONSTRAINT `fk_referencia_marca` FOREIGN KEY (`marca_id`) REFERENCES `marca` (`idmarca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_referencia_tipo1` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`idtipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `referencia`
--

LOCK TABLES `referencia` WRITE;
/*!40000 ALTER TABLE `referencia` DISABLE KEYS */;
INSERT INTO `referencia` VALUES (100,'Basic',101,10),(105,'4584',109,21),(106,'4553',109,27),(107,'4560',109,22),(108,'4613',109,22),(109,'10449',109,23),(110,'4589',109,24),(111,'4541',109,25),(113,'4552',109,22),(114,'4615',109,26),(115,'7190',110,28),(116,'7189',110,28),(117,'7194',110,28),(118,'5514',111,29),(119,'5519',111,30),(121,'5799',111,32),(122,'6126',111,32),(123,'6126',111,32),(124,'7330',111,29),(125,'5612',111,34),(126,'5612',111,35),(127,'8571',111,30),(128,'9729',111,33),(129,'9765',111,33);
/*!40000 ALTER TABLE `referencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tamanho`
--

DROP TABLE IF EXISTS `tamanho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tamanho` (
  `idtamanho` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idtamanho`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tamanho`
--

LOCK TABLES `tamanho` WRITE;
/*!40000 ALTER TABLE `tamanho` DISABLE KEYS */;
INSERT INTO `tamanho` VALUES (10,'PP'),(11,'P'),(12,'M'),(13,'G'),(14,'GG'),(15,'G1'),(16,'G2'),(17,'G3'),(18,'G4'),(19,'U'),(34,'34'),(35,'35'),(36,'36'),(37,'37'),(38,'38'),(39,'39'),(40,'40'),(41,'41'),(42,'42'),(44,'44'),(45,'45'),(46,'46'),(47,'47'),(48,'48'),(49,'49'),(50,'50'),(51,'51'),(52,'52'),(53,'53'),(54,'54'),(55,'55'),(56,'56');
/*!40000 ALTER TABLE `tamanho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo`
--

DROP TABLE IF EXISTS `tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo` (
  `idtipo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idtipo`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo`
--

LOCK TABLES `tipo` WRITE;
/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
INSERT INTO `tipo` VALUES (10,'Polo'),(11,'Polo M/ Longa'),(12,'Camiseta'),(13,'Calça'),(14,'Calça Jeans'),(15,'Camisa Slim'),(16,'Calça Moletom'),(21,'Bermuda Jeans Jogger'),(22,'Short Curto'),(23,'Bermuda Tradicional'),(24,'Bermuda Cos Alto'),(25,'Short Boyfriend'),(26,'Saia Secretaria'),(27,'Short Curto Jogger'),(28,'Bermuda Brim'),(29,'Blusa Sem Manga'),(30,'Blusa Alça'),(31,'Vestido Curto'),(32,'Blusa Manga Curta'),(33,'Blusa'),(34,'Vestido Curto AA5'),(35,'Vestido Curto AA5B');
/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `nome` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `mail` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `senha` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'root','WebMaster','dev@vestaria.com.br','4dadad5718e3b3bd1cbffa616805431d'),(2,'vestaria','Vestaria Admin','contato@vestaria.com.br','790e3c7256d5eb6371ad0865053c061a'),(3,'carol','Carol','carol@vestaria.com.br','158c6f5d824b51b99ae2e5578a66e98c');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!50112 SET @disable_bulk_load = IF (@is_rocksdb_supported, 'SET SESSION rocksdb_bulk_load = @old_rocksdb_bulk_load', 'SET @dummy_rocksdb_bulk_load = 0') */;
/*!50112 PREPARE s FROM @disable_bulk_load */;
/*!50112 EXECUTE s */;
/*!50112 DEALLOCATE PREPARE s */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-21 14:29:05
