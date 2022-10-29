-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: feb
-- ------------------------------------------------------
-- Server version	5.7.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `is_souvenir`
--

DROP TABLE IF EXISTS `is_souvenir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `is_souvenir` (
  `kode_souvenir` varchar(7) NOT NULL,
  `nama_souvenir` varchar(50) NOT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `satuan` varchar(20) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `stok_awal` int(11) DEFAULT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(3) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `unit_kerja` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kode_souvenir`),
  KEY `created_user` (`created_user`),
  KEY `updated_user` (`updated_user`),
  CONSTRAINT `is_souvenir_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `is_souvenir_ibfk_2` FOREIGN KEY (`updated_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `is_souvenir`
--

LOCK TABLES `is_souvenir` WRITE;
/*!40000 ALTER TABLE `is_souvenir` DISABLE KEYS */;
INSERT INTO `is_souvenir` VALUES ('B000001','Gantungan',10000,15000,'Pcs',50,0,1,'2022-09-28 01:48:20',1,'2022-10-29 19:32:58','Departmen Akutansi'),('B000002','Piagam',20000,25000,'Pcs',0,0,1,'2022-09-28 02:10:18',1,'2022-10-29 18:34:17','Departmen Ilmu Ekonomi'),('B000003','Paper Bag',2000,3000,'Pcs',0,0,1,'2022-09-28 02:36:27',1,'2022-10-29 18:34:17','Departmen Manajemen'),('B000004','Plakat Resin FEB UI',30000,35000,'Pcs',400,0,1,'2022-09-28 02:37:11',1,'2022-10-29 19:31:50','AOL'),('B000005','Stola',10000,15000,'Pcs',0,0,1,'2022-09-28 02:37:39',1,'2022-10-29 18:34:17','CDC'),('B000006','PowerBank',0,0,'Pcs',50,0,4,'2022-10-03 08:44:18',4,'2022-10-29 18:34:17','BIRPEN'),('B000007','Gelang',0,0,'Pcs',0,0,4,'2022-10-05 06:49:40',4,'2022-10-29 18:34:17',NULL),('B000008','TUMBLR',0,0,'Pcs',100,0,4,'2022-10-07 07:06:47',4,'2022-10-29 18:34:17',NULL);
/*!40000 ALTER TABLE `is_souvenir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `is_souvenir_keluar`
--

DROP TABLE IF EXISTS `is_souvenir_keluar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `is_souvenir_keluar` (
  `kode_transaksi` varchar(15) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `kode_souvenir` varchar(7) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `unit_kerja` varchar(50) DEFAULT NULL,
  `alasan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kode_transaksi`),
  KEY `id_barang` (`kode_souvenir`),
  KEY `created_user` (`created_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `is_souvenir_keluar`
--

LOCK TABLES `is_souvenir_keluar` WRITE;
/*!40000 ALTER TABLE `is_souvenir_keluar` DISABLE KEYS */;
INSERT INTO `is_souvenir_keluar` VALUES ('TK-2022-0000004','2022-09-28','B000001',50,1,'2022-10-15 05:24:42',NULL,'Seminar'),('TK-2022-0000005','2022-09-28','B000004',100,1,'2022-09-28 02:40:51',NULL,NULL),('TK-2022-0000006','2022-10-05','B000006',100,4,'2022-10-05 01:40:04','BIRPEN',NULL),('TK-2022-0000009','2022-10-15','B000008',100,1,'2022-10-15 06:31:13','AACSB','bebas');
/*!40000 ALTER TABLE `is_souvenir_keluar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `is_souvenir_masuk`
--

DROP TABLE IF EXISTS `is_souvenir_masuk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `is_souvenir_masuk` (
  `kode_transaksi` varchar(15) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `kode_souvenir` varchar(7) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`kode_transaksi`),
  KEY `id_barang` (`kode_souvenir`),
  KEY `created_user` (`created_user`),
  CONSTRAINT `is_souvenir_masuk_ibfk_1` FOREIGN KEY (`kode_souvenir`) REFERENCES `is_souvenir` (`kode_souvenir`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `is_souvenir_masuk_ibfk_2` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `is_souvenir_masuk`
--

LOCK TABLES `is_souvenir_masuk` WRITE;
/*!40000 ALTER TABLE `is_souvenir_masuk` DISABLE KEYS */;
INSERT INTO `is_souvenir_masuk` VALUES ('TM-2022-0000001','2022-09-28','B000001',100,1,'2022-09-28 01:48:50'),('TM-2022-0000002','2022-09-28','B000004',500,1,'2022-09-28 02:40:30'),('TM-2022-0000006','2022-10-04','B000006',150,4,'2022-10-04 01:45:30'),('TM-2022-0000007','2022-10-07','B000008',200,4,'2022-10-07 07:07:01');
/*!40000 ALTER TABLE `is_souvenir_masuk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `is_users`
--

DROP TABLE IF EXISTS `is_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `is_users` (
  `id_user` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `hak_akses` enum('Super Admin','Manajer','Gudang') NOT NULL,
  `status` enum('aktif','blokir') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  KEY `level` (`hak_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `is_users`
--

LOCK TABLES `is_users` WRITE;
/*!40000 ALTER TABLE `is_users` DISABLE KEYS */;
INSERT INTO `is_users` VALUES (1,'admin','Testing','21232f297a57a5a743894a0e4a801fc3','jundialfaruqi@gmail.com','089507891427','avatar5.png','Super Admin','aktif','2017-04-01 08:15:15','2022-10-07 06:55:26'),(2,'Chusnul','Hakim','925203d600473be8c7a87ff029ff8c9b','','','hakimi.jpg','Manajer','aktif','2017-04-01 08:15:15','2022-09-30 01:32:08'),(3,'Ridho','Ridho Ramadhana Rizqieta Haq','926a161c6419512d711089538c80ac70','','','cr7.jpg','Gudang','aktif','2017-04-01 08:15:15','2022-09-28 02:53:34'),(4,'Satrio','Bonaventura Satrio Wicaksono','827ccb0eea8a706c4c34a16891f84e7b','','','satrio.png','Super Admin','aktif','2022-09-28 02:48:58','2022-09-30 01:32:40');
/*!40000 ALTER TABLE `is_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-30  2:59:01
