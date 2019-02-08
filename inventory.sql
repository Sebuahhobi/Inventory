/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.5.5-10.1.25-MariaDB : Database - inventory
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`inventory` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `inventory`;

/*Table structure for table `akun` */

DROP TABLE IF EXISTS `akun`;

CREATE TABLE `akun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` char(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unix` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `akun` */

insert  into `akun`(`id`,`nama`,`no_hp`,`username`,`password`,`ket`,`waktu`) values (5,'Rian Pratama','082285664114','adminaja','$2y$10$J.bykUM0IdhLhblhlZkB1OEOLQtjcBYhOac7RlteC9unOS0o91sPG','Admin','2018-12-19 21:40:07'),(6,'Kasubag Gudang','082212222222','kasubag','$2y$10$ab.KX8fw/5nIh7seAB6of.e8bcCGxOoDy8NqgvTzHL8k6goyi2UVu','Kasubag Gudang','2018-12-19 21:54:14'),(7,'Manager','082222222222','manager','$2y$10$u8DtSEjdH6AiswzMKzrk4ONxM4Ka0dBJLoM7wmdCm3i2yI7mya4JK','Manager','2018-12-19 22:00:06');

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_barang` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_barang` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_distributor` int(11) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `distributor_barang` (`id_distributor`),
  CONSTRAINT `distributor_barang` FOREIGN KEY (`id_distributor`) REFERENCES `distributor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `barang` */

insert  into `barang`(`id`,`kd_barang`,`nama_barang`,`jenis_barang`,`id_distributor`,`tgl`) values (2,'005','Elco','dssdd',2,'2018-12-13 09:58:58'),(3,'005','Elco','dssdd',3,'2018-12-13 10:00:38'),(4,'003','Resistor','Elektro',3,'2018-12-13 13:36:41');

/*Table structure for table `barang_keluar` */

DROP TABLE IF EXISTS `barang_keluar`;

CREATE TABLE `barang_keluar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` int(11) NOT NULL,
  `banyak` int(5) NOT NULL,
  `harga` float NOT NULL,
  `jenis` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kasubag` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `barang_keluar_data_barang` (`nama_barang`),
  CONSTRAINT `barang_keluar_data_barang` FOREIGN KEY (`nama_barang`) REFERENCES `barang` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `barang_keluar` */

insert  into `barang_keluar`(`id`,`nama_barang`,`banyak`,`harga`,`jenis`,`nama_kasubag`,`waktu`) values (3,3,50,5000,'dssdd','Rian Pratama','2018-12-19 22:34:02'),(4,3,50,5000,'dssdd','Rian Pratama','2018-12-19 22:34:24');

/*Table structure for table `barang_masuk` */

DROP TABLE IF EXISTS `barang_masuk`;

CREATE TABLE `barang_masuk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_barang` int(11) NOT NULL,
  `nama_barang` varchar(30) CHARACTER SET latin1 NOT NULL,
  `waktu_masuk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `harga` float NOT NULL,
  `banyak` int(10) NOT NULL,
  `jenis` varchar(25) CHARACTER SET latin1 NOT NULL,
  `nama_kasubag` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_barang` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `barang_barang_masuk` (`id_barang`),
  CONSTRAINT `barang_barang_masuk` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `barang_masuk` */

insert  into `barang_masuk`(`id`,`kd_barang`,`nama_barang`,`waktu_masuk`,`harga`,`banyak`,`jenis`,`nama_kasubag`,`id_barang`) values (3,2,'Elco','2018-12-19 22:34:24',5000,50,'dssdd','Rian Pratama',2),(4,4,'Resistor','2018-12-19 22:30:18',5000,0,'Elektro','Rian Pratama',4);

/*Table structure for table `distributor` */

DROP TABLE IF EXISTS `distributor`;

CREATE TABLE `distributor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_distributor` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_perusahaan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` char(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_kerjasama` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nama_manager` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `distributor` */

insert  into `distributor`(`id`,`nama_distributor`,`nama_perusahaan`,`alamat`,`no_hp`,`email`,`tgl_kerjasama`,`nama_manager`) values (2,'haga','jj','bmb','b','bjb','0000-00-00 00:00:00','bk'),(3,'hagan jv','nlnl','bmb','082285664114','rianthemaster95@gmai','2018-12-13 09:59:52','Rian Pratama');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
