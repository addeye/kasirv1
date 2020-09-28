# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.4.11-MariaDB)
# Database: kasirdb
# Generation Time: 2020-09-28 10:02:19 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table barang
# ------------------------------------------------------------

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kode_barang` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `barang` WRITE;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;

INSERT INTO `barang` (`id_barang`, `nama`, `harga`, `jumlah`, `kode_barang`)
VALUES
	(1,'Bola Basket Besar',60000,10,'B0059'),
	(2,'Sabun Mandi',2500,10,'B0057'),
	(3,'Pasta Gigi',2000,20,'B0055'),
	(4,'Sampoo Botol 350ml',16000,10,'B0054'),
	(5,'Balsem ',5000,10,'B0053'),
	(6,'Sapu Lidi',10000,10,'B0056'),
	(7,'Sandal ',12000,10,'B0052'),
	(8,'Minyak',22000,10,'B0051'),
	(9,'Salak Buah',5000,10,'B0040'),
	(10,'Lampu Lilin',10000,10,'B0088'),
	(11,'Sabun Mandi Cair',7000,3,'B0034');

/*!40000 ALTER TABLE `barang` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table disbarang
# ------------------------------------------------------------

DROP TABLE IF EXISTS `disbarang`;

CREATE TABLE `disbarang` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `barang_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `potongan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `disbarang` WRITE;
/*!40000 ALTER TABLE `disbarang` DISABLE KEYS */;

INSERT INTO `disbarang` (`id`, `barang_id`, `qty`, `potongan`)
VALUES
	(1,3,5,2000),
	(3,7,10,5000);

/*!40000 ALTER TABLE `disbarang` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;

INSERT INTO `role` (`id_role`, `nama`)
VALUES
	(1,'Admin'),
	(2,'Kasir');

/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table transaksi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_waktu` datetime NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `total` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;

INSERT INTO `transaksi` (`id_transaksi`, `tanggal_waktu`, `nomor`, `total`, `nama`, `bayar`, `kembali`)
VALUES
	(8,'2020-02-25 16:05:22','734687',84000,'Novia Pramudia',100000,16000),
	(9,'2020-02-25 16:37:31','237413',52000,'Novia Pramudia',60000,8000),
	(10,'2020-07-02 06:28:53','311124',12000,'Novia Pramudia',15000,3000),
	(11,'2020-07-02 06:37:11','123793',14000,'Novia Pramudia',15000,1000);

/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table transaksi_detail
# ------------------------------------------------------------

DROP TABLE IF EXISTS `transaksi_detail`;

CREATE TABLE `transaksi_detail` (
  `id_transaksi_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  PRIMARY KEY (`id_transaksi_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `transaksi_detail` WRITE;
/*!40000 ALTER TABLE `transaksi_detail` DISABLE KEYS */;

INSERT INTO `transaksi_detail` (`id_transaksi_detail`, `id_transaksi`, `id_barang`, `harga`, `qty`, `total`, `diskon`)
VALUES
	(24,8,3,2000,5,10000,2000),
	(25,8,4,16000,1,16000,0),
	(26,8,1,60000,1,60000,0),
	(27,9,3,2000,10,20000,4000),
	(28,9,6,10000,2,20000,0),
	(29,9,4,16000,1,16000,0),
	(30,10,3,2000,1,2000,0),
	(31,10,6,10000,1,10000,0),
	(32,11,3,2000,2,4000,0),
	(33,11,6,10000,1,10000,0);

/*!40000 ALTER TABLE `transaksi_detail` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `role_id`)
VALUES
	(1,'Ariadi','addeye','addeye27',1),
	(2,'Novia Pramudia','novia','addeye27',2);

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
