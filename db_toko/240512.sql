/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 10.4.32-MariaDB : Database - db_toko
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
  `id_kategori` int(11) DEFAULT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `barang` */

insert  into `barang`(`id_barang`,`id_kategori`,`id_supplier`,`nama_barang`,`status`,`deleted_at`,`created_at`,`updated_at`) values 
(1,2,2,'Cat avian 60 ton 22',1,NULL,NULL,NULL),
(2,1,1,'Semen cap gajah',1,NULL,NULL,NULL),
(3,3,2,'Paku Bumi 22 in',1,NULL,NULL,NULL),
(4,3,1,'Paku Bumi 22 in',1,NULL,NULL,NULL);

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

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL AUTO_INCREMENT,
  `nama_customer` varchar(255) DEFAULT NULL,
  `alamat_customer` varchar(255) DEFAULT NULL,
  `email_customer` varchar(255) DEFAULT NULL,
  `telp_customer` varchar(255) DEFAULT NULL,
  `status_customer` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `customer` */

insert  into `customer`(`id_customer`,`nama_customer`,`alamat_customer`,`email_customer`,`telp_customer`,`status_customer`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'kodok','Jl. asdasd','a@a.com','0812731293',1,NULL,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `hkranjangs` */

insert  into `hkranjangs`(`id_hkranjangs`,`tanggal_trans`,`total_harga`,`metode_pembayaran`,`status`,`keterangan`) values 
(10,'2024-04-22',NULL,NULL,'Dibatalkan','Stok Hanya 10'),
(11,'2024-05-11',NULL,NULL,'Menunggu','Tidak Ada'),
(12,'2024-05-11',NULL,NULL,'Menunggu','Tidak Ada');

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

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `kategori` */

insert  into `kategori`(`id_kategori`,`nama_kategori`,`status`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Semen',1,NULL,NULL,NULL),
(2,'Cat',1,NULL,NULL,NULL),
(3,'Paku Bumi',1,NULL,NULL,NULL);

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

/*Table structure for table `purchasing_order_detail` */

DROP TABLE IF EXISTS `purchasing_order_detail`;

CREATE TABLE `purchasing_order_detail` (
  `id_purchasing_order_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_purchasing_order_header` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jumlah_barang` int(11) DEFAULT NULL,
  `harga_barang` int(11) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `status_order_detail` tinyint(1) DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_purchasing_order_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `purchasing_order_detail` */

insert  into `purchasing_order_detail`(`id_purchasing_order_detail`,`id_purchasing_order_header`,`id_barang`,`jumlah_barang`,`harga_barang`,`sub_total`,`status_order_detail`,`deleted_at`) values 
(3,5,2,90,1000,90000,1,NULL),
(4,6,2,40,3098,123920,1,NULL),
(5,6,4,200,1000,200000,1,NULL),
(6,7,1,3980,200,600000,1,NULL),
(7,7,3,6000,1000,6000000,1,NULL),
(8,8,3,600,1000,600000,1,NULL),
(9,9,3,20,2000,40000,1,NULL),
(10,10,1,20,900,18000,1,NULL),
(11,11,1,2,200,400,1,NULL),
(12,12,2,20,20,400,1,NULL);

/*Table structure for table `purchasing_order_header` */

DROP TABLE IF EXISTS `purchasing_order_header`;

CREATE TABLE `purchasing_order_header` (
  `id_purchasing_order_header` int(11) NOT NULL AUTO_INCREMENT,
  `id_supplier` int(11) DEFAULT NULL,
  `tanggal_order` datetime DEFAULT NULL,
  `total_order` int(11) DEFAULT NULL,
  `status_order` tinyint(1) DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_purchasing_order_header`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `purchasing_order_header` */

insert  into `purchasing_order_header`(`id_purchasing_order_header`,`id_supplier`,`tanggal_order`,`total_order`,`status_order`,`deleted_at`) values 
(5,1,'2024-05-10 17:41:37',90000,1,NULL),
(6,1,'2024-05-10 17:42:53',323920,1,NULL),
(7,2,'2024-05-10 17:46:09',6600000,1,NULL),
(8,2,'2024-05-10 17:48:11',1200000,1,NULL),
(9,2,'2024-05-11 05:48:30',40000,1,NULL),
(10,2,'2024-05-11 05:49:21',18000,1,NULL),
(11,2,'2024-05-11 05:50:06',400,1,NULL),
(12,1,'2024-05-11 14:09:02',400,1,NULL);

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
('bHmm6BbdW6EwNrMYRcvilD6qrSsqINxsWqN60hZh',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoicjhRNGoya3hIbnpqSUJneDZMNDBBUnNQV3FBUmFWQTRWZmlQdWs4ZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ndWRhbmcvdHJhbnNha3NpL3ZpZXdEZXRhaWwvMyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1715533159),
('n7D3F2i7LhSMQvlyV2qExz9gChzvdi4cB1RNwLxk',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUjFtczdCbk5sM3V1THo3bXhDSUZ3c1pMbTJUcmdXcnViWFRmeFBLTCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi90cmFuc2Frc2kvbGlzdCI7fX0=',1715528262);

/*Table structure for table `stok` */

DROP TABLE IF EXISTS `stok`;

CREATE TABLE `stok` (
  `id_stok` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) DEFAULT NULL,
  `id_purchasing_order_detail` int(11) DEFAULT NULL,
  `harga_barang_jual` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_stok`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `stok` */

insert  into `stok`(`id_stok`,`id_barang`,`id_purchasing_order_detail`,`harga_barang_jual`,`status`,`created_at`,`updated_at`,`deleted_at`) values 
(3,2,3,10,1,NULL,NULL,NULL),
(4,2,4,200,1,NULL,NULL,NULL),
(5,4,5,NULL,1,NULL,NULL,NULL),
(6,1,6,100,1,NULL,NULL,NULL),
(7,3,7,200,1,NULL,NULL,NULL),
(8,3,8,NULL,1,NULL,NULL,NULL),
(9,3,9,NULL,1,NULL,NULL,NULL),
(10,1,10,900000,1,NULL,NULL,NULL),
(11,1,11,20000,1,NULL,NULL,NULL),
(12,2,12,NULL,1,NULL,NULL,NULL);

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(255) DEFAULT NULL,
  `alamat_supplier` varchar(255) DEFAULT NULL,
  `email_supplier` varchar(255) DEFAULT NULL,
  `telp_supplier` varchar(255) DEFAULT NULL,
  `status_supplier` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `supplier` */

insert  into `supplier`(`id_supplier`,`nama_supplier`,`alamat_supplier`,`email_supplier`,`telp_supplier`,`status_supplier`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'PT. Agung Sejahtera 22','Jl. Nginden','a@a.com','0861238123612',1,NULL,NULL,NULL),
(2,'PT Maju Mundur Bersama','Jl. Ahmad Yani 22','b@b.com','08263128331',1,NULL,NULL,NULL);

/*Table structure for table `temp_transaksi_detail` */

DROP TABLE IF EXISTS `temp_transaksi_detail`;

CREATE TABLE `temp_transaksi_detail` (
  `id_transaksi_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi_header` int(11) DEFAULT NULL,
  `id_stok` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `status_transaksi_detail` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_transaksi_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `temp_transaksi_detail` */

/*Table structure for table `temp_transaksi_header` */

DROP TABLE IF EXISTS `temp_transaksi_header`;

CREATE TABLE `temp_transaksi_header` (
  `id_transaksi_header` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) DEFAULT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `total_transaksi` int(11) DEFAULT NULL,
  `status_transaksi` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_transaksi_header`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `temp_transaksi_header` */

/*Table structure for table `transaksi_detail` */

DROP TABLE IF EXISTS `transaksi_detail`;

CREATE TABLE `transaksi_detail` (
  `id_transaksi_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi_header` int(11) DEFAULT NULL,
  `id_stok` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `status_transaksi_detail` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_transaksi_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `transaksi_detail` */

insert  into `transaksi_detail`(`id_transaksi_detail`,`id_transaksi_header`,`id_stok`,`jumlah`,`sub_total`,`status_transaksi_detail`,`created_at`,`updated_at`,`deleted_at`) values 
(2,3,6,100,10000,1,NULL,NULL,NULL),
(3,3,11,2,40000,1,NULL,NULL,NULL),
(4,3,3,20,200,1,NULL,NULL,NULL),
(5,4,6,20,2000,1,NULL,NULL,NULL),
(6,4,7,30,6000,1,NULL,NULL,NULL);

/*Table structure for table `transaksi_header` */

DROP TABLE IF EXISTS `transaksi_header`;

CREATE TABLE `transaksi_header` (
  `id_transaksi_header` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) DEFAULT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `total_transaksi` int(11) DEFAULT NULL,
  `tipe_pembayaran` tinyint(1) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `status_transaksi` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_transaksi_header`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `transaksi_header` */

insert  into `transaksi_header`(`id_transaksi_header`,`id_customer`,`tanggal_transaksi`,`total_transaksi`,`tipe_pembayaran`,`deskripsi`,`status_transaksi`,`created_at`,`updated_at`,`deleted_at`) values 
(3,1,'2024-05-11',50200,NULL,NULL,2,NULL,NULL,NULL),
(4,1,'2024-05-12',8000,NULL,NULL,0,NULL,NULL,NULL);

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
