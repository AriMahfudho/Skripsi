-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: surat
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `tb_disposisi`
--

DROP TABLE IF EXISTS `tb_disposisi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_disposisi` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(255) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tanggal_terima` date NOT NULL,
  `asal_surat` varchar(255) NOT NULL,
  `sifat_surat` varchar(255) NOT NULL,
  `perihal` text NOT NULL,
  `no_agenda` varchar(40) NOT NULL,
  `ket` text NOT NULL,
  `sifat_dispos` varchar(50) NOT NULL,
  `batas` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_disposisi`
--

LOCK TABLES `tb_disposisi` WRITE;
/*!40000 ALTER TABLE `tb_disposisi` DISABLE KEYS */;
INSERT INTO `tb_disposisi` VALUES (43,'111/11/VII/2023','2023-11-03','2023-11-03','Dinas Pendidikan','b','Rapat Tahunan','09','segera dibuat','','2023-11-06'),(41,'433/212/VII/2023','2023-07-03','2023-07-04','Dinas Pendidikan','','Rapat akhir tahun ajaran','02','dikonfirmasi','','2023-07-07'),(40,'223/79/VI/2023','2023-06-12','2023-06-12','UPTD Kec. Colomadu','','Undangan rapat guru Kelas 5','01','segera diinformasikan  ','','2023-06-14'),(42,'54/21/VII/2023','2023-07-17','2023-07-17','Siti Aminah S.Pd','','Cuti melahirkan','03','diberikan ijin','','2023-07-19');
/*!40000 ALTER TABLE `tb_disposisi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_surat_keluar`
--

DROP TABLE IF EXISTS `tb_surat_keluar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_surat_keluar` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(255) NOT NULL,
  `tgl_surat` date NOT NULL,
  `sifat_surat` varchar(255) NOT NULL,
  `perihal` text NOT NULL,
  `no_agenda` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `setuju` int(2) NOT NULL,
  `tujuan` varchar(250) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_surat_keluar`
--

LOCK TABLES `tb_surat_keluar` WRITE;
/*!40000 ALTER TABLE `tb_surat_keluar` DISABLE KEYS */;
INSERT INTO `tb_surat_keluar` VALUES (14,'113/44/VII/2023','2023-07-10','','Undangan Rapat ','01','7345-17756-1-PB.pdf',1,'Dinas Pendidikan','2023'),(16,'121/22/VIII/2023','2023-08-03','','Pengambilan rapor','02','',1,'Wali murid','2023'),(17,'177/12/IX/2023','2023-09-08','','Rapat wali murid','03','',0,'Wali murid','2023'),(19,'182/32/IX/2023','2023-09-15','','Rapat ','04','Surat-Masuk-Sekolah.png',0,'Dinas Pendidikan','2023'),(22,'12121212','2023-11-03','','pengambilan rapot','06','',1,'Wali murid 3','2023'),(20,'421.2/11/X/2023','2023-10-10','','Mohon bantuan Al-quran dan buku','05','surat keluar.jpeg',0,'Dinas Pendidikan','2023'),(23,'0422/Nov/2023','2023-11-08','','haji','07','3.png',0,'Kepala Sekolah','2023'),(24,'0422/Nov/2023','2023-11-08','','aaa','08','3.png',0,'Kepala Sekolah','2023'),(31,'113/44/VII/2023','2023-11-09','','ppppp','10','2.png',0,'Kepala Sekolah','2023'),(28,'113/44/VII/2023','2023-11-09','','aaa','09','3.png',0,'Kepala Sekolah','2023'),(44,'111/12/VII/2022','2023-11-09','','nnnn','12','4.png',0,'Kepala Sekolah','2023'),(43,'111/12/VII/2022','2023-11-09','','jjjj','11','2.png',0,'Kepala Sekolah','2023');
/*!40000 ALTER TABLE `tb_surat_keluar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_surat_masuk`
--

DROP TABLE IF EXISTS `tb_surat_masuk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_surat_masuk` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(255) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tanggal_terima` date NOT NULL,
  `asal_surat` varchar(255) NOT NULL,
  `sifat_surat` varchar(255) NOT NULL,
  `perihal` text NOT NULL,
  `no_agenda` varchar(20) NOT NULL,
  `file_surat` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `disposisi` int(11) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_surat_masuk`
--

LOCK TABLES `tb_surat_masuk` WRITE;
/*!40000 ALTER TABLE `tb_surat_masuk` DISABLE KEYS */;
INSERT INTO `tb_surat_masuk` VALUES (30,'433/212/VII/2023','2023-07-03','2023-07-04','Dinas Pendidikan','','Rapat akhir tahun ajaran','02','3.jpg',1,'Kepala Sekolah',0,'2023'),(47,'1112222','2023-11-03','2023-11-02','Dinas Pendidikan','b','rapat lagi','11','alat_hitung_sus.xls',0,'Kepala Sekolah',0,'2023'),(29,'223/79/VI/2023','2023-06-12','2023-06-12','UPTD Kec. Colomadu','','Undangan rapat guru Kelas 5','01','1.jpg',1,'Wali kelas 5',1,'2023'),(31,'54/21/VII/2023','2023-07-17','2023-07-17','Siti Aminah S.Pd','','Cuti melahirkan','03','1.jpg',1,'Kepala Sekolah',0,'2023'),(32,'188/125/VII/2023','2023-07-19','2023-07-19','Dinas Pendidikan','','Undangan seminar','04','jadwal ujian seminar progress sem GENAP 2022-2023.pdf',0,'Guru mapel PPKN',0,'2023'),(44,'421/3311','2023-10-10','2023-10-11','Dinas Pendidikan','p','Edaran gebyar literasi ','08','surat masuk.png',0,'Kepala Sekolah',0,'2023'),(45,'111/11/VII/2023','2023-11-03','2023-11-03','Dinas Pendidikan','b','Rapat Tahunan','09','1.png',1,'Kepala Sekolah',0,'2023'),(46,'12121212','2023-11-03','2023-11-03','Dinas Pendidikan','b','rapat','10','Nahkah publikasi_M.Ari Mahfudho.pdf',0,'Kepala Sekolah',0,'2023'),(49,'12','2023-11-07','2023-11-07','Dinas Pendidikan','b','ap','13','1.png',0,'Kepala Sekolah',0,'2023'),(50,'1','2023-11-07','2023-11-07','Dinas Pendidikan','b','aa','14','3.png',0,'Kepala Sekolah',0,'2023'),(48,'111111111111','2023-11-06','2023-11-06','Dinas Pendidikan','b','aaaa','12','cek-Naskah_publikasi_M.Ari_Mahfudho[1].docx',0,'Kepala Sekolah',0,'2023'),(41,'198/322/VII/2023','2023-07-24','2023-07-24','Dinas Pendidikan','','Rapat antar Kepala sekolah sekabupaten','05','1 (2).jpg',0,'Kepala Sekolah',0,'2023'),(42,'34/11/VII/2023','2023-09-11','2023-09-13','Dinas Pendidikan','p','undangan rapat','06','1.jpg',0,'Guru PJOK',0,'2023'),(43,'78/90/IX/2023','2023-09-04','2023-09-04','SDN Bolon','','Pertukaran pengawas ujian','07','1.png',0,'Kepala Sekolah',0,'2023'),(51,'12','2023-11-07','2023-11-07','Dinas Pendidikan','b','aaaaaa','15','3.png',0,'Kepala Sekolah',0,'2023'),(52,'12121212','2023-11-09','2023-11-12','Dinas Pendidikan','b','pppp','16','Formulir Kesepakatan Bimbingan Skripsi - M. Ari Mahfudho.docx',0,'Kepala Sekolah',0,'2023');
/*!40000 ALTER TABLE `tb_surat_masuk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nama_user` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_user`
--

LOCK TABLES `tb_user` WRITE;
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` VALUES (1,'admin','admin','admin','admin','pro.png'),(10,'kepala sekolah','123456','kepala sekolah','user','user.png'),(13,'ari','ari','ari','user','2.png');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-15 13:43:34
