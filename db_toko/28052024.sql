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
(1,1,1,'Alaska White 40x40',1,NULL,NULL,NULL),
(2,1,1,'Alexis Brown 40x40',1,NULL,NULL,NULL),
(3,1,1,'Ancona Grey 40x40',1,NULL,NULL,NULL),
(4,3,2,'Merah 25kg',1,NULL,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `customer` */

insert  into `customer`(`id_customer`,`nama_customer`,`alamat_customer`,`email_customer`,`telp_customer`,`status_customer`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Michael','Jl. Kancil','michael@gmail.com','08123123123',1,NULL,NULL,NULL),
(2,'David','Jl. Buaya','david@gmail.com','08123125566',1,NULL,NULL,NULL);

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
(1,'Keramik Lantai',1,NULL,NULL,NULL),
(2,'Keramik Dinding',1,NULL,NULL,NULL),
(3,'Cat Tembok',1,NULL,NULL,NULL);

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
  `saldo` int(11) DEFAULT 25000000,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pengguna` */

insert  into `pengguna`(`id_pengguna`,`nama_pengguna`,`password_pengguna`,`saldo`) values 
(2,'superadmin','superadmin123',250000000),
(3,'admin','admin123',25000000),
(4,'gudang','gudang123',25000000);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `purchasing_order_detail` */

insert  into `purchasing_order_detail`(`id_purchasing_order_detail`,`id_purchasing_order_header`,`id_barang`,`jumlah_barang`,`harga_barang`,`sub_total`,`status_order_detail`,`deleted_at`) values 
(1,2,1,100,95000,9500000,1,NULL),
(2,3,2,100,95000,9500000,1,NULL),
(3,4,4,10,230000,2300000,1,NULL),
(4,5,4,10,235000,2350000,1,NULL),
(5,6,4,5,140000,700000,1,NULL);

/*Table structure for table `purchasing_order_header` */

DROP TABLE IF EXISTS `purchasing_order_header`;

CREATE TABLE `purchasing_order_header` (
  `id_purchasing_order_header` int(11) NOT NULL AUTO_INCREMENT,
  `id_supplier` int(11) DEFAULT NULL,
  `tanggal_order` date DEFAULT NULL,
  `total_order` int(11) DEFAULT NULL,
  `status_order` tinyint(1) DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_purchasing_order_header`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `purchasing_order_header` */

insert  into `purchasing_order_header`(`id_purchasing_order_header`,`id_supplier`,`tanggal_order`,`total_order`,`status_order`,`deleted_at`) values 
(2,1,'2024-05-28',9500000,1,NULL),
(3,1,'2024-05-28',9500000,1,NULL),
(4,2,'2024-05-28',2300000,1,NULL),
(5,2,'2024-05-28',2350000,1,NULL),
(6,2,'2024-05-28',700000,1,NULL);

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
('UhZemurR1f0bu0osU72Ui287Y2yD0yRY6xn0S4nc',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUGduckQ1UEhGU3YwMzZESjZMeDA2VlJIY2l1Y3RudXJlbnF3OWE5byI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi90cmFuc2Frc2kvbGlzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1716928760);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `stok` */

insert  into `stok`(`id_stok`,`id_barang`,`id_purchasing_order_detail`,`harga_barang_jual`,`status`,`created_at`,`updated_at`,`deleted_at`) values 
(1,1,1,98000,1,NULL,NULL,NULL),
(2,2,2,98000,1,NULL,NULL,NULL),
(3,4,3,250000,1,NULL,NULL,NULL),
(4,4,4,255000,1,NULL,NULL,NULL),
(5,4,5,245000,1,NULL,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `supplier` */

insert  into `supplier`(`id_supplier`,`nama_supplier`,`alamat_supplier`,`email_supplier`,`telp_supplier`,`status_supplier`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'PT. Platinum','Jl. Panglima Sudirman','platinumkeramik@gmail.com','082123456789',1,NULL,NULL,NULL),
(2,'PT. Avian','Jl. Buburanda','avianbrands@gmail.com','0821234567811',1,NULL,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `transaksi_detail` */

insert  into `transaksi_detail`(`id_transaksi_detail`,`id_transaksi_header`,`id_stok`,`jumlah`,`sub_total`,`status_transaksi_detail`,`created_at`,`updated_at`,`deleted_at`) values 
(1,1,1,20,1960000,1,NULL,NULL,NULL),
(2,1,2,10,980000,1,NULL,NULL,NULL),
(3,2,3,10,3000000,1,NULL,NULL,NULL),
(4,2,4,2,510000,1,NULL,NULL,NULL),
(5,3,3,5,1250000,1,NULL,NULL,NULL),
(6,4,4,3,765000,1,NULL,NULL,NULL),
(7,5,5,1,245000,1,NULL,NULL,NULL),
(8,6,5,1,245000,1,NULL,NULL,NULL),
(9,7,5,1,245000,1,NULL,NULL,NULL),
(10,8,5,1,245000,1,NULL,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `transaksi_header` */

insert  into `transaksi_header`(`id_transaksi_header`,`id_customer`,`tanggal_transaksi`,`total_transaksi`,`tipe_pembayaran`,`deskripsi`,`status_transaksi`,`created_at`,`updated_at`,`deleted_at`) values 
(1,1,'2024-05-28',2940000,NULL,NULL,3,NULL,NULL,NULL),
(2,2,'2024-05-28',3510000,NULL,NULL,3,NULL,NULL,NULL),
(3,1,'2024-05-28',1250000,NULL,NULL,0,NULL,NULL,NULL),
(4,2,'2024-05-28',765000,NULL,NULL,0,NULL,NULL,NULL),
(5,2,'2024-05-28',245000,NULL,NULL,0,NULL,NULL,NULL),
(6,1,'2024-05-28',245000,NULL,NULL,0,NULL,NULL,NULL),
(7,2,'2024-05-28',245000,NULL,NULL,0,NULL,NULL,NULL),
(8,1,'2024-05-28',245000,NULL,NULL,0,NULL,NULL,NULL);

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
