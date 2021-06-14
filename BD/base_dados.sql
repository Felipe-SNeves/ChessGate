-- MariaDB dump 10.19  Distrib 10.5.10-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: chessgate
-- ------------------------------------------------------
-- Server version	10.5.10-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `carrinho`
--

DROP TABLE IF EXISTS `carrinho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrinho` (
  `cod_pedido` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `preco_total` decimal(7,2) NOT NULL,
  `endereco_entrega` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`cod_pedido`),
  KEY `cod_cliente` (`cod_cliente`),
  CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`cod_cliente`) REFERENCES `cliente` (`cod_cliente`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrinho`
--

LOCK TABLES `carrinho` WRITE;
/*!40000 ALTER TABLE `carrinho` DISABLE KEYS */;
INSERT INTO `carrinho` VALUES ('385pb83n9ghjenqbvv39u0e4l0',3,0.00,'fsdfdsfsfsdf'),('u22fu9oal4lrj5dm3qphjvnvvf',5,479.98,'Rua teste');
/*!40000 ALTER TABLE `carrinho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `cod_categoria` int(11) NOT NULL,
  `nom_categoria` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`cod_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (100,'tabuleiros'),(200,'livros'),(300,'decorativos'),(400,'chaveiros');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chaveiro`
--

DROP TABLE IF EXISTS `chaveiro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chaveiro` (
  `cod_unidade` smallint(6) NOT NULL,
  `cod_produto` int(11) NOT NULL,
  `dimensoes` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_unidades` smallint(6) NOT NULL,
  `cor` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peso` decimal(5,2) NOT NULL,
  `material` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`cod_unidade`,`cod_produto`),
  KEY `cod_produto` (`cod_produto`),
  CONSTRAINT `chaveiro_ibfk_1` FOREIGN KEY (`cod_produto`) REFERENCES `produto` (`cod_produto`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chaveiro`
--

LOCK TABLES `chaveiro` WRITE;
/*!40000 ALTER TABLE `chaveiro` DISABLE KEYS */;
INSERT INTO `chaveiro` VALUES (1,410,'2.5 x 2.5 x 2.5 cm',6,'Preto',100.00,'Plástico'),(2,411,'2.5 x 2.5 x 4 cm',1,'Dourado',90.00,'Plástico'),(3,412,'2.5 x 2.5 x 7 cm',1,'Preto',95.00,'Plástico');
/*!40000 ALTER TABLE `chaveiro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `cod_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dt_nascimento` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fone` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`cod_cliente`),
  UNIQUE KEY `un_email_cliente` (`email`),
  CONSTRAINT `ck_genero_cliente` CHECK (`genero` in ('M','F','B'))
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (3,'Administrador','a@a.com','25d55ad283aa400af464c76d713c07ad','1992','112233445','M','fsdfdsfsfsdf'),(5,'Teste','felpslva5@gmail.com','7116380afc09045f406dc804a504c4ac','2006','555555555','M','Rua teste');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `decorativo`
--

DROP TABLE IF EXISTS `decorativo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `decorativo` (
  `cod_unidade` smallint(6) NOT NULL,
  `cod_produto` int(11) NOT NULL,
  `dimensoes` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_unidades` smallint(6) NOT NULL,
  `cor` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peso` decimal(6,2) NOT NULL,
  `material` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `armacao` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`cod_unidade`,`cod_produto`),
  KEY `cod_produto` (`cod_produto`),
  CONSTRAINT `decorativo_ibfk_1` FOREIGN KEY (`cod_produto`) REFERENCES `produto` (`cod_produto`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `decorativo`
--

LOCK TABLES `decorativo` WRITE;
/*!40000 ALTER TABLE `decorativo` DISABLE KEYS */;
INSERT INTO `decorativo` VALUES (1,310,'7 x 45 x 8 cm',1,'Prateado',1700.00,'Cerâmica',NULL),(2,311,'60 x 40 cm',1,NULL,2000.00,'Políptico','Metal'),(3,312,'60 x 40 cm',1,NULL,2000.00,'Políptico','Metal'),(4,313,'39 x 9 x 9 cm',6,'Preto',2500.00,'Cerâmica',NULL),(5,314,'5 x 2.5 x 5 cm',6,'Preto',100.00,'Cerâmica',NULL);
/*!40000 ALTER TABLE `decorativo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itens_carrinho`
--

DROP TABLE IF EXISTS `itens_carrinho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itens_carrinho` (
  `cod_produto` int(11) NOT NULL,
  `cod_pedido` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantidade` smallint(6) NOT NULL,
  `preco_sub` decimal(7,2) NOT NULL,
  PRIMARY KEY (`cod_produto`,`cod_pedido`),
  KEY `cod_pedido` (`cod_pedido`),
  CONSTRAINT `itens_carrinho_ibfk_1` FOREIGN KEY (`cod_produto`) REFERENCES `produto` (`cod_produto`) ON DELETE CASCADE,
  CONSTRAINT `itens_carrinho_ibfk_2` FOREIGN KEY (`cod_pedido`) REFERENCES `carrinho` (`cod_pedido`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itens_carrinho`
--

LOCK TABLES `itens_carrinho` WRITE;
/*!40000 ALTER TABLE `itens_carrinho` DISABLE KEYS */;
INSERT INTO `itens_carrinho` VALUES (311,'u22fu9oal4lrj5dm3qphjvnvvf',2,479.98);
/*!40000 ALTER TABLE `itens_carrinho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livro`
--

DROP TABLE IF EXISTS `livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `livro` (
  `cod_unidade` smallint(6) NOT NULL,
  `cod_produto` int(11) NOT NULL,
  `dimensoes` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idioma` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qntd_paginas` int(11) NOT NULL,
  `num_unidades` smallint(6) NOT NULL,
  `isbn` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`cod_unidade`,`cod_produto`),
  KEY `cod_produto` (`cod_produto`),
  CONSTRAINT `livro_ibfk_1` FOREIGN KEY (`cod_produto`) REFERENCES `produto` (`cod_produto`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livro`
--

LOCK TABLES `livro` WRITE;
/*!40000 ALTER TABLE `livro` DISABLE KEYS */;
INSERT INTO `livro` VALUES (1,210,'23 x 15.2 x 1 cm','Português',192,1,'089-9606194382'),(2,211,'23 x 15.2 x 1 cm','Português',288,1,'198-6541675243'),(3,212,'22.6 x 15.6 x 2.2 cm','Português',304,1,'645-2344325243'),(4,213,'22.6 x 15.6 x 2.2 cm','Português',359,1,'753-1597464816'),(5,214,'22 x 16 x 2 cm','Português',167,1,'654-9427492720');
/*!40000 ALTER TABLE `livro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto` (
  `cod_produto` int(11) NOT NULL,
  `cod_categoria` int(11) NOT NULL,
  `titulo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` decimal(6,2) NOT NULL,
  `imagemURL` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`cod_produto`),
  KEY `cod_categoria` (`cod_categoria`),
  CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`cod_categoria`) REFERENCES `categoria` (`cod_categoria`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (110,100,'Tabuleiro Egípcio',199.99,'../../../assets/images/products/Tabuleiros/110.jpg'),(111,100,'Tabuleiro Clássico',89.99,'../../../assets/images/products/Tabuleiros/111.jpg'),(112,100,'Tabuleiro Magnético',149.99,'../../../assets/images/products/Tabuleiros/112.webp'),(113,100,'Tabuleiro Medieval',299.99,'../../../assets/images/products/Tabuleiros/113.webp'),(114,100,'Tabuleiro Oriental',99.99,'../../../assets/images/products/Tabuleiros/114.jpg'),(210,200,'Xadrez para crianças',49.99,'../../../assets/images/products/Livros/210.jpg'),(211,200,'Finais de peões',99.99,'../../../assets/images/products/Livros/211.jpeg'),(212,200,'Meu sistema',199.99,'../../../assets/images/products/Livros/212.jpg'),(213,200,'Partidas Fischer',149.99,'../../../assets/images/products/Livros/213.png'),(214,200,'Partidas Alekhine',149.99,'../../../assets/images/products/Livros/214.jpg'),(310,300,'Rei prateado',139.99,'../../../assets/images/products/Decorativos/310.jpg'),(311,300,'Vitória enxadr. 1',239.99,'../../../assets/images/products/Decorativos/311.jpg'),(312,300,'Vitória enxadr. 2',239.99,'../../../assets/images/products/Decorativos/312.jpg'),(313,300,'Peças grandes',2399.99,'../../../assets/images/products/Decorativos/313.jpg'),(314,300,'Peças pequenas',2399.99,'../../../assets/images/products/Decorativos/314.webp'),(410,400,'Coleção chaveiros',39.99,'../../../assets/images/products/Chaveiro/410.webp'),(411,400,'Chaveiro real',39.99,'../../../assets/images/products/Chaveiro/411.jpg'),(412,400,'Realeza mini',39.99,'../../../assets/images/products/Chaveiro/412.jpg');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabuleiro`
--

DROP TABLE IF EXISTS `tabuleiro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabuleiro` (
  `cod_unidade` int(11) NOT NULL,
  `cod_produto` int(11) NOT NULL,
  `dimensoes` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_jogadores` smallint(6) NOT NULL,
  `peso` decimal(5,2) NOT NULL,
  `num_unidades` smallint(6) NOT NULL,
  `material` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`cod_unidade`,`cod_produto`),
  KEY `cod_produto` (`cod_produto`),
  CONSTRAINT `tabuleiro_ibfk_1` FOREIGN KEY (`cod_produto`) REFERENCES `produto` (`cod_produto`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabuleiro`
--

LOCK TABLES `tabuleiro` WRITE;
/*!40000 ALTER TABLE `tabuleiro` DISABLE KEYS */;
INSERT INTO `tabuleiro` VALUES (1,110,'20 x 20 x 10 cm',2,200.00,1,'Metal'),(2,111,'20 x 20 x 15 cm',2,800.00,1,'Madeira'),(3,112,'10 x 10 x 10 cm',2,700.00,1,'Metal imantado'),(4,113,'15 x 15 x 15 cm',2,999.99,1,'Metal polido'),(5,114,'15 x 15 x 15 cm',2,999.99,1,'Madeira verniz');
/*!40000 ALTER TABLE `tabuleiro` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-14 18:31:59
