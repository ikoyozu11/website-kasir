/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 10.4.28-MariaDB : Database - db_toko
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_toko` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `db_toko`;

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(255) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL DEFAULT 0,
  `tanggal_masuk` date NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `barang` */

insert  into `barang`(`id_barang`,`nama_barang`,`harga_barang`,`jumlah_masuk`,`jumlah_keluar`,`tanggal_masuk`,`deleted_at`) values 
(1,'Keramik Lantai Platinum Juliet Cream 60x60',146000,100,0,'2024-03-15',NULL),
(2,'Keramik Lantai Platinum Juliet Grey 60x60',146000,100,0,'2024-03-16',NULL),
(3,'Keramik Lantai Platinum Alaska Cream 40x40',69000,100,0,'2024-03-17',NULL),
(4,'Keramik Lantai Platinum Alaska Brown 40x40',69000,100,0,'2024-03-18',NULL),
(5,'Keramik Lantai Platinum Alaska White 40x40',69000,100,0,'2024-03-19',NULL),
(6,'Keramik Lantai Platinum Alaska Grey 40x40',69000,100,0,'2024-03-20',NULL),
(7,'Keramik Lantai Platinum Alexis Brown 40x40',69000,100,0,'2024-03-21',NULL),
(8,'Keramik Lantai Platinum Alexis Grey 40x40',69000,100,0,'2024-03-22',NULL),
(9,'Keramik Lantai Platinum Amazone Bone 40x40',69000,100,0,'2024-03-23',NULL),
(10,'Keramik Lantai Platinum Amazon Beige 40x40',69000,100,0,'2024-03-24',NULL),
(11,'Keramik Lantai Platinum Amazone Brown 40x40',69000,100,0,'2024-03-25',NULL),
(12,'Keramik Lantai Platinum Ancona Bone 40x40',69000,100,0,'2024-03-26',NULL),
(13,'Keramik Lantai Platinum Ancona Brown 40x40',69000,100,0,'2024-03-27',NULL),
(14,'Keramik Lantai Platinum Ancona Grey 40x40',69000,100,0,'2024-03-28',NULL),
(15,'Keramik Lantai Platinum Azuvi Brown 40x40',69000,100,0,'2024-03-29',NULL),
(16,'Keramik Lantai Platinum Azuvi Grey 40x40',69000,100,0,'2024-03-30',NULL),
(17,'Keramik Lantai Platinum Bastian Grey 25x40',79000,100,0,'2024-03-31',NULL),
(18,'Keramik Lantai Platinum Bastian Grey Embossed 25x40',79000,100,0,'2024-04-01',NULL),
(19,'Keramik Lantai Platinum Bolton Black 40x40',69000,100,0,'2024-04-02',NULL),
(20,'Keramik Lantai Platinum Brescia Brown 40x40',69000,100,0,'2024-04-03',NULL),
(21,'Keramik Lantai Platinum Brescia Grey 40x40',69000,100,0,'2024-04-04',NULL),
(22,'Keramik Lantai Platinum Brescia Cream 40x40',69000,100,0,'2024-04-05',NULL),
(23,'Keramik Lantai Platinum Chloe Basic 25x50',81000,100,0,'2024-04-06',NULL),
(24,'Keramik Lantai Platinum Chloe Blue 25x50',81000,100,0,'2024-04-07',NULL),
(25,'Keramik Lantai Platinum Chloe Grey 25x50',81000,100,0,'2024-04-08',NULL),
(26,'Keramik Lantai Platinum Crespo Decor 25x50',81000,100,0,'2024-04-09',NULL),
(27,'Keramik Lantai Platinum Darwin Brown 50x50',94000,100,0,'2024-04-10',NULL),
(28,'Keramik Lantai Platinum Devon Grey 50x50',94000,100,0,'2024-04-11',NULL),
(29,'Keramik Lantai Platinum Dexter Brown 50x50',94000,100,0,'2024-04-12',NULL),
(30,'Keramik Lantai Platinum Diego Brown 50x50',94000,100,0,'2024-04-13',NULL),
(31,'Keramik Lantai Platinum Diego Grey 50x50',94000,100,0,'2024-04-14',NULL),
(32,'Keramik Lantai Platinum Dior White 50x50',94000,100,0,'2024-04-15',NULL),
(33,'Keramik Lantai Platinum Dior Black 50x50',94000,100,0,'2024-04-16',NULL),
(34,'Keramik Lantai Platinum Dominic Grey 50x50',94000,100,0,'2024-04-17',NULL),
(35,'Keramik Lantai Platinum Douglas Grey 50x50',94000,100,0,'2024-04-18',NULL),
(36,'Keramik Lantai Platinum Jarvis Grey 60x60',146000,100,0,'2024-04-19',NULL),
(37,'Keramik Lantai Platinum Jefferson Grey 60x60',146000,100,0,'2024-04-20',NULL),
(38,'Keramik Lantai Platinum Jersey Black 60x60',146000,100,0,'2024-04-21',NULL),
(39,'Keramik Dinding Platinum Adore Basic 25x40',79000,100,0,'2024-03-15',NULL),
(40,'Keramik Dinding Platinum Adore Brown Decor Embossed 25x40',79000,100,0,'2024-03-16',NULL),
(41,'Keramik Dinding Platinum Adore Grey Decor Embossed 25x40',79000,100,0,'2024-03-17',NULL),
(42,'Keramik Dinding Platinum Baxter Grey Embossed 25x40',79000,100,0,'2024-03-18',NULL),
(43,'Keramik Dinding Platinum Baxter Grey 25x40',79000,100,0,'2024-03-19',NULL),
(44,'Keramik Dinding Platinum Beatrix Blue 25x40',79000,100,0,'2024-03-20',NULL),
(45,'Keramik Dinding Platinum Benson Decor Embossed 25x40',79000,100,0,'2024-03-21',NULL),
(46,'Keramik Dinding Platinum Bohemia Green 25x40',79000,100,0,'2024-03-22',NULL),
(47,'Keramik Dinding Platinum Bohemia Grey 25x40',79000,100,0,'2024-03-23',NULL),
(48,'Keramik Dinding Platinum Bulgari Grey Embossed 25x40',79000,100,0,'2024-03-24',NULL),
(49,'Keramik Dinding Platinum Cardova Brown Embossed 25x50',81000,100,0,'2024-03-25',NULL),
(50,'Keramik Dinding Platinum Cardova Dark Grey Embossed 25x50',81000,100,0,'2024-03-26',NULL),
(51,'Keramik Dinding Platinum Carter Grey Decor 25x50',81000,100,0,'2024-03-27',NULL),
(52,'Keramik Dinding Platinum Celine Brown Decor Embossed 25x50',81000,100,0,'2024-03-28',NULL),
(53,'Keramik Dinding Platinum Celine Grey Embossed 25x50',81000,100,0,'2024-03-29',NULL),
(54,'Keramik Dinding Platinum Claire Grey Basic 25x50',81000,100,0,'2024-03-30',NULL),
(55,'Keramik Dinding Platinum Claire Grey Decor 25x50',81000,100,0,'2024-03-31',NULL),
(56,'Keramik Dinding Platinum Clifford Grey Basic 25x50',81000,100,0,'2024-04-01',NULL),
(57,'Keramik Dinding Platinum Hakone Blue 25x40',79000,100,0,'2024-04-02',NULL),
(58,'Keramik Dinding Platinum Hakone Grey 25x40',79000,100,0,'2024-04-03',NULL),
(59,'Keramik Dinding Platinum Hayden Blue Decor 25x40',79000,100,0,'2024-04-04',NULL),
(60,'Keramik Dinding Platinum Kent Brown 30x60',92000,100,0,'2024-04-05',NULL),
(61,'Keramik Dinding Platinum Kenya Grey 30x60',92000,100,0,'2024-04-06',NULL),
(62,'Keramik Dinding Platinum Kyoto Black 30x60',92000,100,0,'2024-04-07',NULL),
(63,'Keramik Dinding Platinum Nagoya Cream 40x80',111000,100,0,'2024-04-08',NULL),
(64,'Keramik Dinding Platinum Nagoya Brown 40x80',111000,100,0,'2024-04-09',NULL),
(65,'Keramik Dinding Platinum Napoli Grey 40x80',111000,100,0,'2024-04-10',NULL),
(66,'Keramik Dinding Platinum Narita Black 40x80',111000,100,0,'2024-04-11',NULL),
(67,'Keramik Dinding Platinum Nordic Grey 40x80',111000,100,0,'2024-04-12',NULL),
(68,'Keramik Dinding Platinum Norway Black 40x80',111000,100,0,'2024-04-13',NULL),
(69,'Keramik Dinding Platinum Teakwood Decor Rec 30x60',92000,100,0,'2024-04-14',NULL),
(70,'Keramik Dinding Platinum Torino Brown 30x60',92000,100,0,'2024-04-15',NULL),
(71,'Keramik Dinding Platinum Torino Grey 30x60',92000,100,0,'2024-04-16',NULL),
(72,'Cat Avian Putih 200 ml',24000,20,0,'2024-03-15',NULL),
(73,'Cat Avian Hitam 200 ml',24000,17,3,'2024-03-16',NULL),
(74,'Cat Avian Merah 200 ml',24000,20,0,'2024-03-17',NULL),
(75,'Cat Avian Biru 200 ml',24000,15,0,'2024-03-18',NULL),
(76,'Cat Avian Hijau 200 ml',24000,20,0,'2024-03-19',NULL),
(77,'Cat Avian Kuning 200 ml',24000,20,0,'2024-03-20',NULL),
(78,'Cat Avian Cokelat 200 ml',24000,18,20,'2024-03-21',NULL),
(79,'Cat Avian Ungu 200 ml',24000,20,0,'2024-03-22',NULL),
(80,'Cat Avian Merah Muda 200 ml',24000,20,0,'2024-03-24',NULL),
(81,'Cat Avian Orange 200 ml',24000,20,0,'2024-03-26',NULL),
(82,'Pipa PVC 1/2 Inch 6 Meter',40500,70,0,'2024-03-15',NULL),
(83,'Pipa PVC 3/4 Inch 6 Meter',55500,70,0,'2024-03-16',NULL),
(84,'Pipa PVC 1 Inch 6 Meter',75000,70,0,'2024-03-17',NULL),
(85,'Pipa PVC 1 1/4 Inch 6 Meter',112500,70,0,'2024-03-18',NULL),
(86,'Pipa PVC 1 1/2 Inch 6 Meter',129000,70,0,'2024-03-19',NULL),
(87,'Pipa PVC 2 Inch 6 Meter',163500,70,0,'2024-03-20',NULL),
(88,'Pipa PVC 3 Inch 6 Meter',336000,70,0,'2024-03-21',NULL),
(89,'Pipa PVC 4 Inch 6 Meter',556500,70,0,'2024-03-22',NULL),
(90,'Toilet Jongkok Toto CE7',295000,10,0,'2024-03-15',NULL),
(91,'Penutup Toilet Duduk Toto ',87000,25,0,'2024-03-16',NULL),
(92,'Toilet Duduk Toto CW630PJ',6830000,10,0,'2024-03-17',NULL),
(93,'Wastafel Toto LW574J',2050000,10,0,'2024-03-18',NULL),
(94,'Wastafel Toto LW897CJ',1120000,10,0,'2024-03-19',NULL),
(95,'Wastafel Toto LW644CJ',1850000,10,0,'2024-03-20',NULL),
(96,'Wastafel Toto LW640NCJT',2250000,10,0,'2024-03-21',NULL),
(97,'Wastafel Toto LW240CJ',840000,10,0,'2024-03-22',NULL),
(98,'Wastafel Toto LW247CJ',850000,10,0,'2024-03-23',NULL),
(99,'Wastafel Toto LW236CJ',1070000,10,0,'2024-03-24',NULL),
(100,'Saringan Got Paloma FDP3101',60000,15,0,'2024-03-15',NULL),
(101,'Toilet Shower Paloma TSP3102',372000,15,0,'2024-03-16',NULL),
(102,'Toilet Shower Paloma TSP3103',399000,15,0,'2024-03-17',NULL),
(103,'Handle Pintu Paloma HRP354',720000,15,0,'2024-03-18',NULL),
(104,'Handle Pintu Paloma HRP326',216000,15,0,'2024-03-19',NULL),
(105,'Handle Pintu Paloma HRP210',990000,15,0,'2024-03-20',NULL),
(106,'Handle Pintu Paloma HRP317',192000,15,0,'2024-03-21',NULL),
(107,'Keran Brezio FCBZ1401',945000,32,0,'2024-03-22',NULL),
(108,'Keran Brezio FCBZ1301',945000,32,0,'2024-03-23',NULL),
(109,'Keran Paloma FCP1251',1890000,32,0,'2024-03-24',NULL),
(110,'Keran Paloma FCP1851',1596000,32,0,'2024-03-25',NULL),
(111,'Keran Paloma FCP1853',3591000,32,0,'2024-03-26',NULL),
(112,'Keran Brezio FCBZ1431',665000,32,0,'2024-03-27',NULL),
(113,'Keran Brezio FCBZ1331',735000,32,0,'2024-03-28',NULL),
(114,'Keran Paloma FCP2331',1053000,32,0,'2024-03-29',NULL),
(115,'Keran Paloma FCP6377',210000,32,0,'2024-03-30',NULL),
(116,'Keran Brezio FCBZ7173',160000,32,0,'2024-03-31',NULL),
(117,'Keran Paloma FCP1676',621000,32,0,'2024-04-01',NULL),
(118,'Keran Paloma FCP1661',675000,32,0,'2024-04-02',NULL),
(119,'Keran Paloma FCP1877',684000,32,0,'2024-04-03',NULL),
(120,'Keran Paloma FCP6377',21000,32,0,'2024-04-04',NULL),
(121,'Keran Brezio FCBZ7161',332500,32,0,'2024-04-05',NULL),
(122,'Keran Paloma FCP1664',675000,32,0,'2024-04-06',NULL),
(123,'Keran Paloma FCP1862',357500,32,0,'2024-04-07',NULL),
(124,'Keran Brezio FCBZ7184',325000,32,0,'2024-04-08',NULL),
(125,'Keran Paloma FCP2581',870000,32,0,'2024-04-09',NULL),
(126,'Keran Paloma FCP6384',360000,32,0,'2024-04-10',NULL),
(127,'Shower Paloma HSP1103',152500,15,0,'2024-04-11',NULL),
(128,'Shower Paloma HSP1104',274500,15,0,'2024-04-12',NULL),
(129,'Shower Paloma SSP2601',352000,15,0,'2024-04-13',NULL),
(130,'Shower Paloma SSP2401',357500,15,0,'2024-04-14',NULL),
(131,'Selang Shower Paloma FLP1601',152500,15,0,'2024-04-15',NULL),
(132,'Tangki Air Penguin 500 Liter',1199000,15,0,'2024-03-15',NULL),
(133,'Tangki Air Profil 1000 Liter',2445000,15,0,'2024-03-16',NULL),
(134,'Pintu Kamar Mandi Alphamax 1-A',3415000,15,0,'2024-03-17',NULL),
(135,'Pintu Kamar Mandi Alphamax Austin-70',3176000,15,0,'2024-03-18',NULL),
(136,'Keramik Lantai Platinum Juliet Cream 60x60',146000,50,0,'2024-03-22',NULL),
(137,'Keramik Lantai Platinum Juliet Cream 60x60',146000,20,0,'2024-03-22','2024-03-21 19:38:32'),
(138,'Keramik Lantai Platinum Juliet Cream 60x60',146000,67,0,'2024-03-23',NULL),
(139,'Keramik Lantai Platinum Juliet Cream 60x60',146000,20,0,'2024-03-23','2024-03-21 20:49:41'),
(140,'Keramik Lantai Platinum Juliet Cream 60x60',146000,70,0,'2024-03-22',NULL),
(141,'Cat Avian Putih 200 ml',25000,10,0,'2024-04-10',NULL),
(142,'Cat Avian Merah Maroon 200 ml',25000,10,0,'2024-04-22',NULL),
(143,'Cat Avian Merah Maroon 200 ml',30000,10,0,'2024-04-22','2024-04-22 12:07:04'),
(144,'Cat Avian Merah Maroon 200 ml',35000,10,0,'2024-04-22',NULL);

/*Table structure for table `cache` */

DROP TABLE IF EXISTS `cache`;

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache` */

/*Table structure for table `cache_locks` */

DROP TABLE IF EXISTS `cache_locks`;

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache_locks` */

/*Table structure for table `dkranjangs` */

DROP TABLE IF EXISTS `dkranjangs`;

CREATE TABLE `dkranjangs` (
  `id_dkranjangs` int(11) NOT NULL AUTO_INCREMENT,
  `id_hkranjangs` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `subtotal_barang` int(11) NOT NULL,
  PRIMARY KEY (`id_dkranjangs`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `dkranjangs` */

insert  into `dkranjangs`(`id_dkranjangs`,`id_hkranjangs`,`id_barang`,`nama_barang`,`harga_barang`,`jumlah_barang`,`subtotal_barang`) values 
(8,6,76,'Cat Avian Hijau 200 ml',24000,3,72000),
(12,10,142,'Cat Avian Merah Maroon 200 ml',25000,15,375000);

/*Table structure for table `dtrans` */

DROP TABLE IF EXISTS `dtrans`;

CREATE TABLE `dtrans` (
  `id_dtrans` int(11) NOT NULL AUTO_INCREMENT,
  `id_htrans` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `subtotal_barang` int(11) NOT NULL,
  PRIMARY KEY (`id_dtrans`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `dtrans` */

insert  into `dtrans`(`id_dtrans`,`id_htrans`,`id_barang`,`nama_barang`,`harga_barang`,`jumlah_barang`,`subtotal_barang`) values 
(1,1,78,'Cat Avian Cokelat 200 ml',24000,20,480000);

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `hkranjangs` */

DROP TABLE IF EXISTS `hkranjangs`;

CREATE TABLE `hkranjangs` (
  `id_hkranjangs` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_trans` date NOT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `metode_pembayaran` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Menunggu',
  `keterangan` varchar(255) DEFAULT 'Tidak Ada',
  PRIMARY KEY (`id_hkranjangs`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `hkranjangs` */

insert  into `hkranjangs`(`id_hkranjangs`,`tanggal_trans`,`total_harga`,`metode_pembayaran`,`status`,`keterangan`) values 
(10,'2024-04-22',NULL,NULL,'Dibatalkan','Stok Hanya 10');

/*Table structure for table `htrans` */

DROP TABLE IF EXISTS `htrans`;

CREATE TABLE `htrans` (
  `id_htrans` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_trans` date NOT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `metode_pembayaran` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_htrans`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `htrans` */

insert  into `htrans`(`id_htrans`,`tanggal_trans`,`total_harga`,`metode_pembayaran`) values 
(1,'2024-04-16',480000,'Tunai');

/*Table structure for table `job_batches` */

DROP TABLE IF EXISTS `job_batches`;

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `job_batches` */

/*Table structure for table `jobs` */

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jobs` */

/*Table structure for table `keranjang` */

DROP TABLE IF EXISTS `keranjang`;

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `subtotal_barang` int(11) DEFAULT NULL,
  `status_barang` varchar(255) DEFAULT NULL,
  `catatan_barang` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_keranjang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `keranjang` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'0001_01_01_000000_create_users_table',1),
(2,'0001_01_01_000001_create_cache_table',1),
(3,'0001_01_01_000002_create_jobs_table',1),
(4,'2024_03_21_175001_add_default_to_jumlah_keluar_in_barang_table',2),
(5,'2024_03_21_191859_add_soft_delete_to_barang_table',3);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `pengguna` */

DROP TABLE IF EXISTS `pengguna`;

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengguna` varchar(255) NOT NULL,
  `password_pengguna` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pengguna` */

insert  into `pengguna`(`id_pengguna`,`nama_pengguna`,`password_pengguna`) values 
(2,'superadmin','superadmin123'),
(3,'admin','admin123'),
(4,'gudang','gudang123'),
(5,'gudang2','gudang123');

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sessions` */

insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values 
('zoqsguH5BtlQipQ9lUaMgsBDxO7l9Pu3pHRUZuAE',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiaW1Wb21GRVV6NHZZOWVMUGhOSnd5czdwU2l2R0NOdThacmFUUG1naCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9oaXN0b3J5LXRyYW5zYWtzaSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1713788951);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
