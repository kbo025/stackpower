-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: bd_nuite
-- ------------------------------------------------------
-- Server version	5.7.21

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

--
-- Table structure for table `anexo`
--

DROP TABLE IF EXISTS `anexo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anexo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `caminho` varchar(255) NOT NULL,
  `id_sarque` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anexo`
--

LOCK TABLES `anexo` WRITE;
/*!40000 ALTER TABLE `anexo` DISABLE KEYS */;
/*!40000 ALTER TABLE `anexo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bairros`
--

DROP TABLE IF EXISTS `bairros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bairros` (
  `cod_bairro` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  PRIMARY KEY (`cod_bairro`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bairros`
--

LOCK TABLES `bairros` WRITE;
/*!40000 ALTER TABLE `bairros` DISABLE KEYS */;
INSERT INTO `bairros` VALUES (1,'ATERRO');
/*!40000 ALTER TABLE `bairros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `base`
--

DROP TABLE IF EXISTS `base`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `base` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `base` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `base`
--

LOCK TABLES `base` WRITE;
/*!40000 ALTER TABLE `base` DISABLE KEYS */;
INSERT INTO `base` VALUES (1,'ATERRO'),(2,'AUSTIN'),(3,'BANGU'),(4,'BARRA'),(5,'BARREIRA FISCAL'),(6,'BOTAFOGO'),(7,'CAXIAS'),(8,'CENTRO'),(9,'COPACABANA'),(10,'GRAJAÚ'),(11,'IPANEMA'),(12,'LAGOA'),(13,'LAPA'),(14,'LARANJEIRAS'),(15,'LEBLON'),(16,'LEI SECA'),(17,'MÉIER'),(18,'NITERÓI / CENTRO'),(19,'NITERÓI / ICARAÍ'),(20,'NITERÓI / SÃO FRANCISCO'),(21,'NOVA IGUAÇU'),(22,'RECREIO'),(23,'TIJUCA '),(24,'MARCHA PELA CIDADANIA E ORDEM');
/*!40000 ALTER TABLE `base` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ruas`
--

DROP TABLE IF EXISTS `ruas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ruas` (
  `cod_rua` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `cod_bairro` int(11) NOT NULL,
  PRIMARY KEY (`cod_rua`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ruas`
--

LOCK TABLES `ruas` WRITE;
/*!40000 ALTER TABLE `ruas` DISABLE KEYS */;
INSERT INTO `ruas` VALUES (1,'rua a',1);
/*!40000 ALTER TABLE `ruas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sarque`
--

DROP TABLE IF EXISTS `sarque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sarque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dtinicial` datetime NOT NULL,
  `nome` varchar(200) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `rgpm` varchar(200) NOT NULL,
  `cpf` varchar(30) NOT NULL,
  `mae` varchar(200) NOT NULL,
  `pai` varchar(200) NOT NULL,
  `nascimento` date NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `base` int(11) NOT NULL,
  `situacao` int(11) NOT NULL,
  `motivo` int(11) NOT NULL,
  `obs` varchar(255) NOT NULL,
  `resposta` varchar(255) NOT NULL,
  `resposta_usuario` text NOT NULL,
  `baseconsultas` varchar(15) NOT NULL,
  `telefonepm` varchar(50) NOT NULL,
  `dinamica` text NOT NULL,
  `delito` int(20) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_operador` int(11) NOT NULL,
  `placa` varchar(255) NOT NULL,
  `tipo` int(11) NOT NULL,
  `caminhofoto` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dtfinal` datetime NOT NULL,
  `numero_ro` varchar(100) NOT NULL,
  `testemunha` varchar(100) NOT NULL,
  `rg_condutor` varchar(100) NOT NULL,
  `data_conduzir` date NOT NULL,
  `hora_conduzir` time NOT NULL,
  `dt_saidadp` date NOT NULL,
  `hr_saidadp` time NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sarque`
--

LOCK TABLES `sarque` WRITE;
/*!40000 ALTER TABLE `sarque` DISABLE KEYS */;
INSERT INTO `sarque` VALUES (1,'2020-02-06 19:07:32','NOME TESTE','1216','254155','1216','NOME MAE','NOME PAI','1980-10-10','RUA 322','21 98741-255',13,3,4,'OBSSSSSSSSSSSSSSSSSSS','FOIPRESDFSDF','fechar tudo','1','21 98741-255','dpfisdaf sfa sdfa sdf',1,24,21,'SEM-PLACA',1,'','2020-02-06 22:09:00','2020-02-06 19:07:53','22312313','1651561561','12315616','2020-02-06','19:08:00','2020-02-06','19:01:00',5),(2,'2020-02-06 19:10:56','','','21321231','','','','1970-01-01','RUA 21','21 22121-2122',4,1,0,'CERTO','ta certo','','','21 22121-2122','',0,24,21,'NKI 6555',2,'','2020-02-10 19:01:50','2020-02-06 19:11:16','','','','0000-00-00','00:00:00','0000-00-00','00:00:00',5),(3,'2020-02-06 19:50:15','Carlos Eduardo ','','97675','','','','1970-01-01','Rua q0','2198888888',4,7,3,'','teste','','1,2','2198888888','',0,24,21,'',1,'','2020-02-10 19:05:49','2020-02-06 19:54:00','','','','0000-00-00','00:00:00','0000-00-00','00:00:00',5),(4,'2020-02-06 21:23:19','Antônio Gilberto ','1018882882','97675','1018882882','maria da graça ','Antonio ','1970-01-01','Rua q0','2177777777',2,4,3,'','ok','','5','2177777777','',0,24,21,'',1,'','2020-02-10 19:05:45','2020-02-06 21:23:55','','','','0000-00-00','00:00:00','0000-00-00','00:00:00',5),(5,'2020-02-06 19:53:10','Carlos Alberto De Azevedo ','','97675','','','','1970-01-01','Rua q0','2199999999',3,7,4,'','teste 02','','1','2199999999','',0,24,21,'',1,'','2020-02-10 19:05:17','2020-02-06 19:54:30','','','','0000-00-00','00:00:00','0000-00-00','00:00:00',5),(6,'2020-02-06 21:24:00','Lucas  da Silva Nune','1018882882','1245566','1018882882','maria da graça ','João  da Silva','1970-01-01','Av Brasil 34','21988887755',2,6,4,'2 tatoo no pescoço ','','','3,5','21988887755','feito RO e preso encaminhado pra bangu',2,24,21,'',1,'','2020-02-07 00:26:16','2020-02-06 21:24:20','20204977373','177171','50486399','2020-02-06','21:25:00','2020-02-06','23:25:00',6),(7,'2020-02-07 09:28:16','Antônio Gilberto  de Oliveira ','','97574','','','','1970-01-01','Posto 10','2198789878',4,3,3,'','','','1,2,3,4','2198789878','',0,24,21,'',1,'','2020-02-10 19:05:35','2020-02-07 11:10:57','','','','0000-00-00','00:00:00','0000-00-00','00:00:00',5),(8,'2020-02-07 11:10:05','vitor da silva souza','21155151','101716','21155151','Sebastiana','Amarildo','1989-12-05','AV BRASIL','21964212911',3,6,2,'suspeito muito alterado ','mandado em aberto ','','1,2','21964212911','teste000000',6,24,21,'',1,'','2020-02-07 15:06:29','2020-02-07 11:45:29','2112146116321','97685','97685','2020-02-07','07:00:00','2020-02-07','10:00:00',6),(9,'2020-02-07 11:10:16','','','101716','','','','1970-01-01','AV BRASIL','21964212911',21,7,0,'onix preto','onix preto ok','','','21964212911','',0,24,21,'HYYT5653',2,'','2020-02-07 14:13:34','2020-02-07 11:12:14','','','','0000-00-00','00:00:00','0000-00-00','00:00:00',5),(10,'2020-02-07 11:07:12','Marcos de Lima Silva','21155151','101716','21155151','Sebastiana','Amarildo','1970-01-01','AV BRASIL','21964212911',10,7,6,'teste 01','teste 02','','1','21964212911','',0,24,21,'',1,'','2020-02-10 19:05:30','2020-02-07 11:09:12','','','','0000-00-00','00:00:00','0000-00-00','00:00:00',5),(11,'2020-02-07 12:07:03','Diogo Lúcio da Silva Costa','','101716','','','','1970-01-01','AV BRASIL','21964212911',14,7,2,'','','xxx','1,2','21964212911','',0,24,21,'',1,'','2020-02-07 16:49:46','2020-02-07 12:08:41','','','','0000-00-00','00:00:00','0000-00-00','00:00:00',5),(12,'2020-02-07 13:55:04','RODRIGO MAIA','','101454','','','','1970-01-01','RUA MADALENA','21 26565-65',3,1,2,'','xxxx','','1,2','21 26565-65','xxxx',16,24,21,'',1,'','2020-02-10 19:05:26','2020-02-07 13:55:19','232323','22323','323','2020-02-07','13:00:00','2020-02-07','14:00:00',5),(13,'2020-02-07 14:40:15','Lucas  da Silva numes','','1245566','','','','1970-01-01','Av Airton senna','21988887755',6,6,5,'','fgy','','1,3','21988887755','',0,24,21,'',1,'','2020-02-07 17:41:01','2020-02-07 14:41:01','','','','0000-00-00','00:00:00','0000-00-00','00:00:00',4),(14,'2020-02-07 16:51:34','Diogo Lúcio da Silva Costa','fsdfsdfs','101716','fsdfsdfs','Sebastiana','Amarildo','1970-01-01','AV BRASIL','21964212911',5,7,5,'fsdfsdfsfs','','rssrsrererere','','21964212911','',0,23,21,'',1,'','2020-02-07 19:52:48','2020-02-07 16:52:01','','','','0000-00-00','00:00:00','0000-00-00','00:00:00',5),(15,'2020-02-07 17:34:22','carlos alberto ','','97674','','','','1970-01-01','posto 10','21 96421-2911',8,7,2,'','','','','21 96421-2911','',0,24,21,'',1,'','2020-02-10 19:05:23','2020-02-07 17:36:25','','','','0000-00-00','00:00:00','0000-00-00','00:00:00',5),(16,'2020-02-07 20:26:02','Lucas  da Silva numes','','1245566','','','','1970-01-01','Av Airton senna','21988887755',4,6,5,'','','','','21988887755','',0,24,21,'',1,'','2020-02-07 23:26:26','2020-02-07 20:26:26','','','','0000-00-00','00:00:00','0000-00-00','00:00:00',4),(17,'2020-02-10 15:51:14','FERNANDO MARIA','','34324','','','','1970-01-01','RUA 12 CENTRO DA CIDADE','21 12222-2222',1,3,5,'NADA','','','1','21 12222-2222','',0,24,21,'',1,'','2020-02-10 19:05:19','2020-02-10 15:58:38','','','','0000-00-00','00:00:00','0000-00-00','00:00:00',5),(18,'2020-02-10 15:59:38','sasas','','122','','','','1970-01-01','11111111111111','11 11111-1111',19,0,1,'','','','','','',0,24,21,'',1,'','2020-02-10 18:59:38','0000-00-00 00:00:00','','','','0000-00-00','00:00:00','0000-00-00','00:00:00',2),(19,'2020-02-10 16:11:25','11111111111111','','11111111111111111111','','','','1970-01-01','1111','11 11111-1111',19,3,2,'','','','1','11 11111-1111','',0,24,21,'',1,'','2020-02-10 19:12:37','2020-02-10 16:11:35','','','','0000-00-00','00:00:00','0000-00-00','00:00:00',5),(20,'2020-02-10 16:15:43','1111111111111','54564561','1111111111','54564561','MARIA M','CESAR JUNIOR','1970-01-01','1111111111111111','11 11111-1111',4,0,1,'','333','','','11 11111-1111','',0,24,21,'',1,'','2020-02-10 19:17:39','2020-02-10 16:17:39','','','','0000-00-00','00:00:00','0000-00-00','00:00:00',4);
/*!40000 ALTER TABLE `sarque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tipo_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Anderson Dias','admin@admin.com','81dc9bdb52d04dc20036dbd8313ed055',1),(7,'Eliakin Ceasr','etes@hotmail.com','e10adc3949ba59abbe56e057f20f883e',2),(10,'Geislaine Vitoria Oliveira Rodrigues','teste@ddd.com','81dc9bdb52d04dc20036dbd8313ed055',1),(12,'SGT Mendes','mendesgica@gmail.com','81dc9bdb52d04dc20036dbd8313ed055',2),(13,'Leo Possati','leopossati@yahoo.com.br','81dc9bdb52d04dc20036dbd8313ed055',2),(14,'SGT BM Alves','cjadeoliveira@gmail.com','81dc9bdb52d04dc20036dbd8313ed055',2),(15,'Souza','cvsouza2403@gmail.com','81dc9bdb52d04dc20036dbd8313ed055',2),(16,'Anderson Dias','andersondiasbrj@gmail.com','81dc9bdb52d04dc20036dbd8313ed055',2),(18,'Barroso','aquinamidia@gmail.com','81dc9bdb52d04dc20036dbd8313ed055',3),(19,'Diogo Costa','scosta97674@gmail.com','202cb962ac59075b964b07152d234b70',1),(20,'Segov Johnny','johnny.cftv@gmail.com','0796a84893f2802c622d2e08dc62675a',2),(21,'Palácio ','operador@gmail.com','202cb962ac59075b964b07152d234b70',2),(22,'Possati','leopossati@yahoo.com.br','81dc9bdb52d04dc20036dbd8313ed055',2),(23,'SEGOV BARRA','usuario@gmail.com','202cb962ac59075b964b07152d234b70',3),(24,'Segov LAPA','usuario@usuario.com','81dc9bdb52d04dc20036dbd8313ed055',3),(28,'Barreira Fiscal','barreira@gmail.com','202cb962ac59075b964b07152d234b70',2);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'bd_nuite'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-11 17:24:15
