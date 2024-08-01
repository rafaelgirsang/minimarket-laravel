/*
 Navicat Premium Data Transfer

 Source Server         : MariaDB
 Source Server Type    : MariaDB
 Source Server Version : 110202 (11.2.2-MariaDB-log)
 Source Host           : localhost:3306
 Source Schema         : tokoresta

 Target Server Type    : MariaDB
 Target Server Version : 110202 (11.2.2-MariaDB-log)
 File Encoding         : 65001

 Date: 21/07/2024 14:00:04
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for inventori
-- ----------------------------
DROP TABLE IF EXISTS `inventori`;
CREATE TABLE `inventori`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `stok_in` int(11) NULL DEFAULT 0,
  `stok_out` int(11) NULL DEFAULT 0,
  `total_stok` int(11) NULL DEFAULT 0,
  `type` enum('IN','OUT','MIN') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `produk_id` int(11) NULL DEFAULT NULL,
  `supplier_id` int(11) NULL DEFAULT NULL,
  `transaksi_id` int(11) NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of inventori
-- ----------------------------
INSERT INTO `inventori` VALUES (1, 20, 0, 20, 'IN', 1, 1, NULL, 'Pembelian produk TANGGO, jumlah 20 pcs, harga 5.000,di supplier INDOMARET pada tanggal 23-05-2024 15:49', '2024-05-23 15:49:37', '2024-05-23 15:49:37');
INSERT INTO `inventori` VALUES (2, 0, 2, 18, 'OUT', 1, NULL, 1, 'Penjualan produk TANGGO, jumlah 2 pcs, harga 5000 pada tanggal 23-05-2024 15:50', '2024-05-23 15:50:18', '2024-05-23 15:50:18');
INSERT INTO `inventori` VALUES (3, 0, 5, 13, 'OUT', 1, NULL, 2, 'Penjualan produk TANGGO, jumlah 5 pcs, harga 5000 pada tanggal 23-05-2024 15:54', '2024-05-23 15:54:20', '2024-05-23 15:54:20');
INSERT INTO `inventori` VALUES (4, 89, 0, 89, 'IN', 2, 1, NULL, 'Pembelian produk TISU, jumlah 89 pcs, harga 4.000,di supplier INDOMARET pada tanggal 02-06-2024 19:49', '2024-06-02 19:49:29', '2024-06-02 19:49:29');
INSERT INTO `inventori` VALUES (5, 60, 0, 60, 'IN', 3, 2, NULL, 'Pembelian produk TANGGO, jumlah 60 pcs, harga 9.000,di supplier TOKO UMMAT pada tanggal 02-06-2024 20:02', '2024-06-02 20:02:13', '2024-06-02 20:02:13');
INSERT INTO `inventori` VALUES (6, 60, 0, 73, 'IN', 1, 2, NULL, 'Pembelian produk TANGGO, jumlah 60 pcs, harga 5.000,di supplier TOKO UMMAT pada tanggal 10-06-2024 03:43', '2024-06-10 03:43:59', '2024-06-10 03:43:59');
INSERT INTO `inventori` VALUES (7, 4, 0, 77, 'IN', 1, 1, NULL, 'Pembelian produk TANGGO, jumlah 4 pcs, harga 6.000,di supplier INDOMARET pada tanggal 10-06-2024 03:44', '2024-06-10 03:44:25', '2024-06-10 03:44:25');
INSERT INTO `inventori` VALUES (8, 1, 0, 90, 'IN', 2, 1, NULL, 'Pembelian produk TISU, jumlah 1 pcs, harga 7.000,di supplier INDOMARET pada tanggal 10-06-2024 04:03', '2024-06-10 04:03:58', '2024-06-10 04:03:58');
INSERT INTO `inventori` VALUES (9, 5, 0, 95, 'IN', 2, 2, NULL, 'Pembelian produk TISU, jumlah 5 pcs, harga 8.000,di supplier TOKO UMMAT pada tanggal 10-06-2024 04:09', '2024-06-10 04:09:56', '2024-06-10 04:09:56');
INSERT INTO `inventori` VALUES (10, 3, 0, 98, 'IN', 2, 1, NULL, 'Pembelian produk TISU, jumlah 3 pcs, harga 5.000,di supplier INDOMARET pada tanggal 10-06-2024 04:11', '2024-06-10 04:11:39', '2024-06-10 04:11:39');
INSERT INTO `inventori` VALUES (11, 0, 5, 72, 'MIN', 1, NULL, NULL, 'Pengurangan produk TANGGO, jumlah 5 pcs, harga 0 pada tanggal 12-06-2024 23:48 -  (sdfd)', '2024-06-12 23:48:59', '2024-06-12 23:48:59');
INSERT INTO `inventori` VALUES (12, 0, 2, 58, 'OUT', 3, NULL, 3, 'Penjualan produk TANGGO, jumlah 2 pcs, harga 9000 pada tanggal 19-06-2024 23:16', '2024-06-19 23:16:08', '2024-06-19 23:16:08');
INSERT INTO `inventori` VALUES (13, 0, 1, 97, 'OUT', 2, NULL, 4, 'Penjualan produk TISU, jumlah 1 pcs, harga 4000 pada tanggal 19-06-2024 23:16', '2024-06-19 23:16:30', '2024-06-19 23:16:30');
INSERT INTO `inventori` VALUES (14, 0, 1, 57, 'OUT', 3, NULL, 5, 'Penjualan produk TANGGO, jumlah 1 pcs, harga 9000 pada tanggal 19-06-2024 23:30', '2024-06-19 23:30:16', '2024-06-19 23:30:16');
INSERT INTO `inventori` VALUES (15, 0, 10, 62, 'OUT', 1, NULL, 6, 'Penjualan produk TANGGO, jumlah 10 pcs, harga 5000 pada tanggal 19-06-2024 23:32', '2024-06-19 23:32:37', '2024-06-19 23:32:37');
INSERT INTO `inventori` VALUES (16, 0, 2, 95, 'OUT', 2, NULL, 6, 'Penjualan produk TISU, jumlah 2 pcs, harga 4000 pada tanggal 19-06-2024 23:32', '2024-06-19 23:32:37', '2024-06-19 23:32:37');
INSERT INTO `inventori` VALUES (17, 0, 1, 56, 'OUT', 3, NULL, 7, 'Penjualan produk TANGGO, jumlah 1 pcs, harga 9000 pada tanggal 20-06-2024 22:17', '2024-06-20 22:17:36', '2024-06-20 22:17:36');
INSERT INTO `inventori` VALUES (18, 0, 1, 94, 'OUT', 2, NULL, 7, 'Penjualan produk TISU, jumlah 1 pcs, harga 4000 pada tanggal 20-06-2024 22:17', '2024-06-20 22:17:36', '2024-06-20 22:17:36');
INSERT INTO `inventori` VALUES (19, 0, 1, 93, 'OUT', 2, NULL, 8, 'Penjualan produk TISU, jumlah 1 pcs, harga 4000 pada tanggal 20-06-2024 22:29', '2024-06-20 22:29:12', '2024-06-20 22:29:12');
INSERT INTO `inventori` VALUES (20, 0, 1, 92, 'OUT', 2, NULL, 9, 'Penjualan produk TISU, jumlah 1 pcs, harga 4000 pada tanggal 27-06-2024 00:43', '2024-06-27 00:43:07', '2024-06-27 00:43:07');
INSERT INTO `inventori` VALUES (21, 0, 1, 55, 'OUT', 3, NULL, 10, 'Penjualan produk TANGGO, jumlah 1 pcs, harga 9000 pada tanggal 28-06-2024 01:57', '2024-06-28 01:57:41', '2024-06-28 01:57:41');
INSERT INTO `inventori` VALUES (22, 0, 1, 91, 'OUT', 2, NULL, 11, 'Penjualan produk TISU, jumlah 1 pcs, harga 4000 pada tanggal 28-06-2024 02:03', '2024-06-28 02:03:20', '2024-06-28 02:03:20');
INSERT INTO `inventori` VALUES (23, 0, 2, 53, 'OUT', 3, NULL, 12, 'Penjualan produk TANGGO, jumlah 2 pcs, harga 9000 pada tanggal 30-06-2024 02:55', '2024-06-30 02:55:20', '2024-06-30 02:55:20');
INSERT INTO `inventori` VALUES (24, 0, 1, 90, 'OUT', 2, NULL, 13, 'Penjualan produk TISU, jumlah 1 pcs, harga 4000 pada tanggal 30-06-2024 02:58', '2024-06-30 02:58:34', '2024-06-30 02:58:34');
INSERT INTO `inventori` VALUES (25, 0, 1, 52, 'OUT', 3, NULL, 14, 'Penjualan produk TANGGO, jumlah 1 pcs, harga 9000 pada tanggal 04-07-2024 01:57', '2024-07-04 01:57:28', '2024-07-04 01:57:28');
INSERT INTO `inventori` VALUES (26, 0, 20, 70, 'OUT', 2, NULL, 15, 'Penjualan produk TISU, jumlah 20 pcs, harga 4000 pada tanggal 04-07-2024 02:28', '2024-07-04 02:28:06', '2024-07-04 02:28:06');
INSERT INTO `inventori` VALUES (27, 0, 3, 49, 'OUT', 3, NULL, 16, 'Penjualan produk TANGGO, jumlah 3 pcs, harga 9000 pada tanggal 21-07-2024 11:12', '2024-07-21 11:12:07', '2024-07-21 11:12:07');
INSERT INTO `inventori` VALUES (28, 0, 3, 67, 'OUT', 2, NULL, 16, 'Penjualan produk TISU, jumlah 3 pcs, harga 4000 pada tanggal 21-07-2024 11:12', '2024-07-21 11:12:07', '2024-07-21 11:12:07');
INSERT INTO `inventori` VALUES (29, 0, 40, 9, 'OUT', 3, NULL, 17, 'Penjualan produk TANGGO, jumlah 40 pcs, harga 9000 pada tanggal 21-07-2024 11:14', '2024-07-21 11:14:57', '2024-07-21 11:14:57');

-- ----------------------------
-- Table structure for jurnal_akun
-- ----------------------------
DROP TABLE IF EXISTS `jurnal_akun`;
CREATE TABLE `jurnal_akun`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `akun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `saldo_normal` enum('DEBIT','KREDIT') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `laporan` int(11) NULL DEFAULT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jurnal_akun_kategori_id_foreign`(`kategori_id` ASC) USING BTREE,
  CONSTRAINT `jurnal_akun_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `jurnal_kategori` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jurnal_akun
-- ----------------------------
INSERT INTO `jurnal_akun` VALUES (1, '1', 'Kas', 'DEBIT', NULL, 1, '2024-05-23 15:43:52', '2024-05-23 15:43:52');
INSERT INTO `jurnal_akun` VALUES (2, '2', 'Pembelian Persediaan (Stok)', 'DEBIT', NULL, 1, '2024-05-23 15:43:52', '2024-05-23 15:43:52');
INSERT INTO `jurnal_akun` VALUES (3, '2', 'Piutang', 'DEBIT', NULL, 1, '2024-05-23 15:43:52', '2024-05-23 15:43:52');
INSERT INTO `jurnal_akun` VALUES (4, '2', 'Peralatan/Perlengkapan', 'DEBIT', NULL, 2, '2024-05-23 15:43:52', '2024-05-23 15:43:52');
INSERT INTO `jurnal_akun` VALUES (5, '2', 'Utang Dagang', 'KREDIT', NULL, 3, '2024-05-23 15:43:52', '2024-05-23 15:43:52');
INSERT INTO `jurnal_akun` VALUES (6, '2', 'Modal Usaha', 'KREDIT', NULL, 4, '2024-05-23 15:43:52', '2024-05-23 15:43:52');
INSERT INTO `jurnal_akun` VALUES (7, '2', 'Pendapatan Penjualan', 'KREDIT', NULL, 5, '2024-05-23 15:43:52', '2024-05-23 15:43:52');
INSERT INTO `jurnal_akun` VALUES (8, '2', 'Biaya Administrasi', 'DEBIT', NULL, 6, '2024-05-23 15:43:52', '2024-05-23 15:43:52');
INSERT INTO `jurnal_akun` VALUES (9, '2', 'Biaya Listrik', 'DEBIT', NULL, 6, '2024-05-23 15:43:52', '2024-05-23 15:43:52');
INSERT INTO `jurnal_akun` VALUES (10, '2', 'Biaya Transportasi', 'DEBIT', NULL, 6, '2024-05-23 15:43:52', '2024-05-23 15:43:52');
INSERT INTO `jurnal_akun` VALUES (11, '2', 'Biaya Wifi', 'DEBIT', NULL, 6, '2024-05-23 15:43:52', '2024-05-23 15:43:52');

-- ----------------------------
-- Table structure for jurnal_kategori
-- ----------------------------
DROP TABLE IF EXISTS `jurnal_kategori`;
CREATE TABLE `jurnal_kategori`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jurnal_kategori
-- ----------------------------
INSERT INTO `jurnal_kategori` VALUES (1, '11', 'Aset Lancar', 'Debit', '2024-05-23 15:43:52', '2024-05-23 15:43:52');
INSERT INTO `jurnal_kategori` VALUES (2, '12', 'Aset Tetap', 'Debit', '2024-05-23 15:43:52', '2024-05-23 15:43:52');
INSERT INTO `jurnal_kategori` VALUES (3, '21', 'Liabilitas', 'Kredit', '2024-05-23 15:43:52', '2024-05-23 15:43:52');
INSERT INTO `jurnal_kategori` VALUES (4, '31', 'Ekuitas', 'Kredit', '2024-05-23 15:43:52', '2024-05-23 15:43:52');
INSERT INTO `jurnal_kategori` VALUES (5, '41', 'Pendapatan', 'Kredit', '2024-05-23 15:43:52', '2024-05-23 15:43:52');
INSERT INTO `jurnal_kategori` VALUES (6, '51', 'Biaya', 'Debit', '2024-05-23 15:43:52', '2024-05-23 15:43:52');

-- ----------------------------
-- Table structure for jurnal_umum
-- ----------------------------
DROP TABLE IF EXISTS `jurnal_umum`;
CREATE TABLE `jurnal_umum`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` date NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `debit` int(11) NULL DEFAULT 0,
  `kredit` int(11) NULL DEFAULT 0,
  `akun_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jurnal_umum_akun_id_foreign`(`akun_id` ASC) USING BTREE,
  CONSTRAINT `jurnal_umum_akun_id_foreign` FOREIGN KEY (`akun_id`) REFERENCES `jurnal_akun` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jurnal_umum
-- ----------------------------
INSERT INTO `jurnal_umum` VALUES (1, '2024-05-23', 'Pendapatan Penjualan', 0, 42000, 7, '2024-07-04 02:15:44', '2024-07-04 02:15:44');
INSERT INTO `jurnal_umum` VALUES (2, '2024-05-23', 'Biaya Administrasi', 0, 0, 8, '2024-07-04 02:15:44', '2024-07-04 02:15:44');
INSERT INTO `jurnal_umum` VALUES (3, '2024-06-19', 'Pendapatan Penjualan', 0, 108000, 7, '2024-07-04 02:15:44', '2024-07-04 02:15:44');
INSERT INTO `jurnal_umum` VALUES (4, '2024-06-19', 'Biaya Administrasi', 261, 0, 8, '2024-07-04 02:15:44', '2024-07-04 02:15:44');
INSERT INTO `jurnal_umum` VALUES (5, '2024-06-20', 'Pendapatan Penjualan', 0, 25000, 7, '2024-07-04 02:15:44', '2024-07-04 02:15:44');
INSERT INTO `jurnal_umum` VALUES (6, '2024-06-20', 'Biaya Administrasi', 48, 0, 8, '2024-07-04 02:15:44', '2024-07-04 02:15:44');
INSERT INTO `jurnal_umum` VALUES (7, '2024-06-27', 'Pendapatan Penjualan', 0, 90000, 7, '2024-07-04 02:15:44', '2024-07-04 02:15:44');
INSERT INTO `jurnal_umum` VALUES (8, '2024-06-27', 'Biaya Administrasi', 27, 0, 8, '2024-07-04 02:15:44', '2024-07-04 02:15:44');
INSERT INTO `jurnal_umum` VALUES (9, '2024-06-28', 'Pendapatan Penjualan', 0, 90000, 7, '2024-07-04 02:15:44', '2024-07-04 02:53:04');
INSERT INTO `jurnal_umum` VALUES (10, '2024-06-28', 'Biaya Administrasi', 27, 0, 8, '2024-07-04 02:15:44', '2024-07-04 02:53:04');
INSERT INTO `jurnal_umum` VALUES (13, '2024-07-04', 'Pendapatan Penjualan', 0, 187000, 7, '2024-07-04 02:15:44', '2024-07-04 02:28:16');
INSERT INTO `jurnal_umum` VALUES (14, '2024-07-04', 'Biaya Administrasi', 540, 0, 8, '2024-07-04 02:15:44', '2024-07-04 02:28:16');
INSERT INTO `jurnal_umum` VALUES (22, '2024-06-30', 'Pendapatan Penjualan', 0, 16000, 7, '2024-07-04 02:47:01', '2024-07-04 02:47:01');
INSERT INTO `jurnal_umum` VALUES (23, '2024-06-30', 'Biaya Administrasi', 0, 0, 8, '2024-07-04 02:47:01', '2024-07-04 02:47:01');
INSERT INTO `jurnal_umum` VALUES (24, '2024-07-21', 'Pendapatan Penjualan', 0, 48000, 7, '2024-07-21 11:12:24', '2024-07-21 11:12:24');
INSERT INTO `jurnal_umum` VALUES (25, '2024-07-21', 'Biaya Administrasi', 0, 0, 8, '2024-07-21 11:12:24', '2024-07-21 11:12:24');
INSERT INTO `jurnal_umum` VALUES (26, '2024-07-21', 'Stok Barang', 200000, 0, 2, '2024-07-21 11:13:09', '2024-07-21 11:13:09');

-- ----------------------------
-- Table structure for metode_pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `metode_pembayaran`;
CREATE TABLE `metode_pembayaran`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `metode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_active` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'Y',
  `potongan` double NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of metode_pembayaran
-- ----------------------------
INSERT INTO `metode_pembayaran` VALUES (1, 'Cash', 'Y', 0, '2024-05-23 15:43:52', '2024-05-23 15:43:52');
INSERT INTO `metode_pembayaran` VALUES (2, 'QRIS', 'Y', 0.3, '2024-05-23 15:43:52', '2024-05-23 15:43:52');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (2, '2023_05_03_153523_create_user_role_table', 1);
INSERT INTO `migrations` VALUES (3, '2023_05_04_100816_create_user_table', 1);
INSERT INTO `migrations` VALUES (4, '2023_05_04_230152_create_produk_kategori_table', 1);
INSERT INTO `migrations` VALUES (5, '2023_05_04_230539_create_produk_table', 1);
INSERT INTO `migrations` VALUES (6, '2023_05_05_002328_create_supplier_table', 1);
INSERT INTO `migrations` VALUES (7, '2023_11_19_225119_create_supplier_produk_table', 1);
INSERT INTO `migrations` VALUES (8, '2023_11_25_010258_create_metode_pembayaran_table', 1);
INSERT INTO `migrations` VALUES (9, '2023_11_25_010259_create_produk_inventori_table', 1);
INSERT INTO `migrations` VALUES (10, '2023_12_15_141323_create_transaksi_table', 1);
INSERT INTO `migrations` VALUES (11, '2023_12_15_150304_create_transaksi_produk_table', 1);
INSERT INTO `migrations` VALUES (12, '2023_12_15_150305_create_transaksi_produk_temp_table', 1);
INSERT INTO `migrations` VALUES (13, '2024_01_01_073343_create_produk_supplier_history_table', 1);
INSERT INTO `migrations` VALUES (14, '2024_01_01_075758_create_inventori_table', 1);
INSERT INTO `migrations` VALUES (15, '2024_01_12_062921_create_transaksi_inventori_table', 1);
INSERT INTO `migrations` VALUES (16, '2024_02_22_205839_create_jurnal_kategori_table', 1);
INSERT INTO `migrations` VALUES (17, '2024_02_23_010650_create_jurnal_akun_table', 1);
INSERT INTO `migrations` VALUES (18, '2024_05_02_214510_create_jurnal_umum_tabel', 1);
INSERT INTO `migrations` VALUES (19, '2024_05_23_095647_create_saldo_belanja_table', 1);

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for produk
-- ----------------------------
DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_produk` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `barcode` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `harga_jual` int(11) NULL DEFAULT 0,
  `jumlah_stok` int(11) NULL DEFAULT 0,
  `is_active` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'Y',
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `produk_kategori_id_foreign`(`kategori_id` ASC) USING BTREE,
  CONSTRAINT `produk_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `produk_kategori` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of produk
-- ----------------------------
INSERT INTO `produk` VALUES (1, 'Tanggo', '6360088783727000', 6000, 62, 'Y', 1, '2024-05-23 15:49:37', '2024-06-19 23:32:37');
INSERT INTO `produk` VALUES (2, 'Tisu', '9044895355903512', 9000, 67, 'Y', 1, '2024-06-02 19:49:29', '2024-07-21 11:12:07');
INSERT INTO `produk` VALUES (3, 'Tanggo', '2194270828178870', 7000, 9, 'Y', 2, '2024-06-02 20:02:13', '2024-07-21 11:14:57');

-- ----------------------------
-- Table structure for produk_inventori
-- ----------------------------
DROP TABLE IF EXISTS `produk_inventori`;
CREATE TABLE `produk_inventori`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `harga_beli` int(11) NULL DEFAULT 0,
  `jumlah_stok` int(11) NULL DEFAULT 0,
  `priority` int(11) NULL DEFAULT 0,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `produk_inventori_produk_id_foreign`(`produk_id` ASC) USING BTREE,
  CONSTRAINT `produk_inventori_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of produk_inventori
-- ----------------------------
INSERT INTO `produk_inventori` VALUES (1, 5000, 58, 0, 1, '2024-05-23 15:49:37', '2024-06-19 23:32:37');
INSERT INTO `produk_inventori` VALUES (2, 4000, 58, 0, 2, '2024-06-02 19:49:29', '2024-07-21 11:12:07');
INSERT INTO `produk_inventori` VALUES (3, 9000, 9, 0, 3, '2024-06-02 20:02:13', '2024-07-21 11:14:57');
INSERT INTO `produk_inventori` VALUES (4, 6000, 4, 0, 1, '2024-06-10 03:44:25', '2024-06-10 03:44:25');
INSERT INTO `produk_inventori` VALUES (5, 7000, 1, 0, 2, '2024-06-10 04:03:58', '2024-06-10 04:03:58');
INSERT INTO `produk_inventori` VALUES (6, 8000, 5, 0, 2, '2024-06-10 04:09:56', '2024-06-10 04:09:56');
INSERT INTO `produk_inventori` VALUES (7, 5000, 3, 0, 2, '2024-06-10 04:11:39', '2024-06-10 04:11:39');

-- ----------------------------
-- Table structure for produk_kategori
-- ----------------------------
DROP TABLE IF EXISTS `produk_kategori`;
CREATE TABLE `produk_kategori`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kategori` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_active` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of produk_kategori
-- ----------------------------
INSERT INTO `produk_kategori` VALUES (1, 'Makanan', NULL, 'Y', '2024-05-23 15:43:52', '2024-05-23 15:43:52');
INSERT INTO `produk_kategori` VALUES (2, 'Minuman', NULL, 'Y', '2024-05-23 15:43:52', '2024-05-23 15:43:52');
INSERT INTO `produk_kategori` VALUES (3, 'Rokok', NULL, 'Y', '2024-05-23 15:43:52', '2024-05-23 15:43:52');
INSERT INTO `produk_kategori` VALUES (4, 'Alat Mandi', NULL, 'Y', '2024-05-23 15:43:52', '2024-05-23 15:43:52');

-- ----------------------------
-- Table structure for produk_supplier_history
-- ----------------------------
DROP TABLE IF EXISTS `produk_supplier_history`;
CREATE TABLE `produk_supplier_history`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `harga_beli` int(11) NULL DEFAULT 0,
  `stok` int(11) NULL DEFAULT 0,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `produk_supplier_history_produk_id_foreign`(`produk_id` ASC) USING BTREE,
  INDEX `produk_supplier_history_supplier_id_foreign`(`supplier_id` ASC) USING BTREE,
  CONSTRAINT `produk_supplier_history_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `produk_supplier_history_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of produk_supplier_history
-- ----------------------------
INSERT INTO `produk_supplier_history` VALUES (1, 5000, 20, 1, 1, '2024-05-23 15:49:37', '2024-05-23 15:49:37');
INSERT INTO `produk_supplier_history` VALUES (2, 4000, 89, 2, 1, '2024-06-02 19:49:29', '2024-06-02 19:49:29');
INSERT INTO `produk_supplier_history` VALUES (3, 9000, 60, 3, 2, '2024-06-02 20:02:13', '2024-06-02 20:02:13');
INSERT INTO `produk_supplier_history` VALUES (4, 5000, 60, 1, 2, '2024-06-10 03:43:59', '2024-06-10 03:43:59');
INSERT INTO `produk_supplier_history` VALUES (5, 6000, 4, 1, 1, '2024-06-10 03:44:25', '2024-06-10 03:44:25');
INSERT INTO `produk_supplier_history` VALUES (6, 7000, 1, 2, 1, '2024-06-10 04:03:58', '2024-06-10 04:03:58');
INSERT INTO `produk_supplier_history` VALUES (7, 8000, 5, 2, 2, '2024-06-10 04:09:56', '2024-06-10 04:09:56');
INSERT INTO `produk_supplier_history` VALUES (8, 5000, 3, 2, 1, '2024-06-10 04:11:39', '2024-06-10 04:11:39');

-- ----------------------------
-- Table structure for saldo_belanja
-- ----------------------------
DROP TABLE IF EXISTS `saldo_belanja`;
CREATE TABLE `saldo_belanja`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `saldo` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of saldo_belanja
-- ----------------------------
INSERT INTO `saldo_belanja` VALUES (1, 453000, '2024-05-23 15:43:52', '2024-05-23 15:43:52');

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `telpon` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_active` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of supplier
-- ----------------------------
INSERT INTO `supplier` VALUES (1, 'Indomaret', NULL, NULL, 'Y', '2024-05-23 15:49:37', '2024-05-23 15:49:37');
INSERT INTO `supplier` VALUES (2, 'Toko Ummat', NULL, NULL, 'Y', '2024-06-02 20:02:13', '2024-06-02 20:02:13');

-- ----------------------------
-- Table structure for supplier_produk
-- ----------------------------
DROP TABLE IF EXISTS `supplier_produk`;
CREATE TABLE `supplier_produk`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `harga_beli` int(11) NULL DEFAULT 0,
  `harga_last_update` datetime NULL DEFAULT NULL,
  `is_active` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'Y',
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `supplier_produk_produk_id_foreign`(`produk_id` ASC) USING BTREE,
  INDEX `supplier_produk_supplier_id_foreign`(`supplier_id` ASC) USING BTREE,
  CONSTRAINT `supplier_produk_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `supplier_produk_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of supplier_produk
-- ----------------------------
INSERT INTO `supplier_produk` VALUES (1, 5000, '2024-06-10 04:11:39', 'Y', 1, 1, '2024-05-23 15:49:37', '2024-06-10 04:11:39');
INSERT INTO `supplier_produk` VALUES (2, 4000, '2024-06-02 19:49:29', 'Y', 2, 1, '2024-06-02 19:49:29', '2024-06-02 19:49:29');
INSERT INTO `supplier_produk` VALUES (3, 9000, '2024-06-02 20:02:13', 'Y', 3, 2, '2024-06-02 20:02:13', '2024-06-02 20:02:13');
INSERT INTO `supplier_produk` VALUES (4, 5000, '2024-06-10 03:43:59', 'Y', 1, 2, '2024-06-10 03:43:59', '2024-06-10 03:43:59');
INSERT INTO `supplier_produk` VALUES (5, 8000, '2024-06-10 04:09:56', 'Y', 2, 2, '2024-06-10 04:09:56', '2024-06-10 04:09:56');

-- ----------------------------
-- Table structure for transaksi
-- ----------------------------
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` date NULL DEFAULT NULL,
  `jumlah_item` int(11) NULL DEFAULT 0,
  `total_harga` int(11) NULL DEFAULT 0,
  `invoice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `administrasi` int(11) NULL DEFAULT NULL,
  `diskon` int(11) NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `metode_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `transaksi_user_id_foreign`(`user_id` ASC) USING BTREE,
  INDEX `transaksi_metode_id_foreign`(`metode_id` ASC) USING BTREE,
  CONSTRAINT `transaksi_metode_id_foreign` FOREIGN KEY (`metode_id`) REFERENCES `metode_pembayaran` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `transaksi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaksi
-- ----------------------------
INSERT INTO `transaksi` VALUES (1, '2024-05-23', 1, 12000, '664F034AEA612', 0, 0, 1, 1, '2024-05-23 15:50:18', '2024-05-23 15:50:18');
INSERT INTO `transaksi` VALUES (2, '2024-05-23', 1, 30000, '664F043C9C613', 0, 0, 1, 1, '2024-05-23 15:54:20', '2024-05-23 15:54:20');
INSERT INTO `transaksi` VALUES (3, '2024-06-19', 1, 14000, '667304486FDB4', 0, 0, 1, 1, '2024-06-19 23:16:08', '2024-06-19 23:16:08');
INSERT INTO `transaksi` VALUES (4, '2024-06-19', 1, 9000, '6673045E0FDDA', 27, 0, 1, 2, '2024-06-19 23:16:30', '2024-06-19 23:16:30');
INSERT INTO `transaksi` VALUES (5, '2024-06-19', 1, 7000, '66730797F1790', 0, 500, 1, 1, '2024-06-19 23:30:15', '2024-06-19 23:30:15');
INSERT INTO `transaksi` VALUES (6, '2024-06-19', 2, 78000, '66730825D4188', 234, 700, 1, 2, '2024-06-19 23:32:37', '2024-06-19 23:32:37');
INSERT INTO `transaksi` VALUES (7, '2024-06-20', 2, 16000, '66744810A8E78', 48, 4000, 1, 2, '2024-06-20 22:17:36', '2024-06-20 22:17:36');
INSERT INTO `transaksi` VALUES (8, '2024-06-20', 1, 9000, '66744AC8CBC75', 0, 0, 1, 1, '2024-06-20 22:29:12', '2024-06-20 22:29:12');
INSERT INTO `transaksi` VALUES (9, '2024-06-28', 1, 90000, '667C532B5653B', 27, 1000, 1, 2, '2024-06-27 00:43:07', '2024-06-27 00:43:07');
INSERT INTO `transaksi` VALUES (10, '2024-06-30', 1, 7000, '667DB62548717', 0, 0, 1, 1, '2024-06-28 01:57:41', '2024-06-28 01:57:41');
INSERT INTO `transaksi` VALUES (11, '2024-06-30', 1, 9000, '667DB7784CD28', 0, 0, 1, 1, '2024-06-28 02:03:20', '2024-06-28 02:03:20');
INSERT INTO `transaksi` VALUES (14, '2024-07-04', 1, 7000, '66859F18480C8', 0, 0, 1, 1, '2024-07-04 01:57:28', '2024-07-04 01:57:28');
INSERT INTO `transaksi` VALUES (15, '2024-07-04', 1, 180000, '6685A6466809B', 540, 0, 1, 2, '2024-07-04 02:28:06', '2024-07-04 02:28:06');
INSERT INTO `transaksi` VALUES (16, '2024-07-21', 2, 48000, '669C8A974C05D', 0, 1000, 3, 1, '2024-07-21 11:12:07', '2024-07-21 11:12:07');
INSERT INTO `transaksi` VALUES (17, '2024-07-21', 1, 280000, '669C8B4108455', 840, 10000, 3, 2, '2024-07-21 11:14:57', '2024-07-21 11:14:57');

-- ----------------------------
-- Table structure for transaksi_inventori
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_inventori`;
CREATE TABLE `transaksi_inventori`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `jumlah` int(11) NULL DEFAULT 0,
  `harga` int(11) NULL DEFAULT 0,
  `produkInventori_id` int(11) NULL DEFAULT NULL,
  `produk_id` int(11) NULL DEFAULT NULL,
  `transaksi_id` int(11) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaksi_inventori
-- ----------------------------
INSERT INTO `transaksi_inventori` VALUES (1, 2, 5000, 1, 1, 1, '2024-05-23 15:50:18', '2024-05-23 15:50:18');
INSERT INTO `transaksi_inventori` VALUES (2, 5, 5000, 1, 1, 2, '2024-05-23 15:54:20', '2024-05-23 15:54:20');
INSERT INTO `transaksi_inventori` VALUES (3, 2, 9000, 3, 3, 3, '2024-06-19 23:16:08', '2024-06-19 23:16:08');
INSERT INTO `transaksi_inventori` VALUES (4, 1, 4000, 2, 2, 4, '2024-06-19 23:16:30', '2024-06-19 23:16:30');
INSERT INTO `transaksi_inventori` VALUES (5, 1, 9000, 3, 3, 5, '2024-06-19 23:30:16', '2024-06-19 23:30:16');
INSERT INTO `transaksi_inventori` VALUES (6, 10, 5000, 1, 1, 6, '2024-06-19 23:32:37', '2024-06-19 23:32:37');
INSERT INTO `transaksi_inventori` VALUES (7, 2, 4000, 2, 2, 6, '2024-06-19 23:32:37', '2024-06-19 23:32:37');
INSERT INTO `transaksi_inventori` VALUES (8, 1, 9000, 3, 3, 7, '2024-06-20 22:17:36', '2024-06-20 22:17:36');
INSERT INTO `transaksi_inventori` VALUES (9, 1, 4000, 2, 2, 7, '2024-06-20 22:17:36', '2024-06-20 22:17:36');
INSERT INTO `transaksi_inventori` VALUES (10, 1, 4000, 2, 2, 8, '2024-06-20 22:29:12', '2024-06-20 22:29:12');
INSERT INTO `transaksi_inventori` VALUES (11, 1, 4000, 2, 2, 9, '2024-06-27 00:43:07', '2024-06-27 00:43:07');
INSERT INTO `transaksi_inventori` VALUES (12, 1, 9000, 3, 3, 10, '2024-06-28 01:57:41', '2024-06-28 01:57:41');
INSERT INTO `transaksi_inventori` VALUES (13, 1, 4000, 2, 2, 11, '2024-06-28 02:03:20', '2024-06-28 02:03:20');
INSERT INTO `transaksi_inventori` VALUES (14, 2, 9000, 3, 3, 12, '2024-06-30 02:55:20', '2024-06-30 02:55:20');
INSERT INTO `transaksi_inventori` VALUES (15, 1, 4000, 2, 2, 13, '2024-06-30 02:58:34', '2024-06-30 02:58:34');
INSERT INTO `transaksi_inventori` VALUES (16, 1, 9000, 3, 3, 14, '2024-07-04 01:57:28', '2024-07-04 01:57:28');
INSERT INTO `transaksi_inventori` VALUES (17, 20, 4000, 2, 2, 15, '2024-07-04 02:28:06', '2024-07-04 02:28:06');
INSERT INTO `transaksi_inventori` VALUES (18, 3, 9000, 3, 3, 16, '2024-07-21 11:12:07', '2024-07-21 11:12:07');
INSERT INTO `transaksi_inventori` VALUES (19, 3, 4000, 2, 2, 16, '2024-07-21 11:12:07', '2024-07-21 11:12:07');
INSERT INTO `transaksi_inventori` VALUES (20, 40, 9000, 3, 3, 17, '2024-07-21 11:14:57', '2024-07-21 11:14:57');

-- ----------------------------
-- Table structure for transaksi_produk
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_produk`;
CREATE TABLE `transaksi_produk`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `barcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `produk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `harga` int(11) NULL DEFAULT 0,
  `jumlah` int(11) NULL DEFAULT 0,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `transaksi_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `transaksi_produk_produk_id_foreign`(`produk_id` ASC) USING BTREE,
  INDEX `transaksi_produk_transaksi_id_foreign`(`transaksi_id` ASC) USING BTREE,
  CONSTRAINT `transaksi_produk_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `transaksi_produk_transaksi_id_foreign` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaksi_produk
-- ----------------------------
INSERT INTO `transaksi_produk` VALUES (1, '6360088783727000', 'Tanggo', 6000, 2, 1, 1, '2024-05-23 15:50:19', '2024-05-23 15:50:19');
INSERT INTO `transaksi_produk` VALUES (2, '6360088783727000', 'Tanggo', 6000, 5, 1, 2, '2024-05-23 15:54:20', '2024-05-23 15:54:20');
INSERT INTO `transaksi_produk` VALUES (3, '2194270828178870', 'Tanggo', 7000, 2, 3, 3, '2024-06-19 23:16:08', '2024-06-19 23:16:08');
INSERT INTO `transaksi_produk` VALUES (4, '9044895355903512', 'Tisu', 9000, 1, 2, 4, '2024-06-19 23:16:30', '2024-06-19 23:16:30');
INSERT INTO `transaksi_produk` VALUES (5, '2194270828178870', 'Tanggo', 7000, 1, 3, 5, '2024-06-19 23:30:16', '2024-06-19 23:30:16');
INSERT INTO `transaksi_produk` VALUES (6, '6360088783727000', 'Tanggo', 6000, 10, 1, 6, '2024-06-19 23:32:37', '2024-06-19 23:32:37');
INSERT INTO `transaksi_produk` VALUES (7, '9044895355903512', 'Tisu', 9000, 2, 2, 6, '2024-06-19 23:32:37', '2024-06-19 23:32:37');
INSERT INTO `transaksi_produk` VALUES (8, '2194270828178870', 'Tanggo', 7000, 1, 3, 7, '2024-06-20 22:17:36', '2024-06-20 22:17:36');
INSERT INTO `transaksi_produk` VALUES (9, '9044895355903512', 'Tisu', 9000, 1, 2, 7, '2024-06-20 22:17:36', '2024-06-20 22:17:36');
INSERT INTO `transaksi_produk` VALUES (10, '9044895355903512', 'Tisu', 9000, 1, 2, 8, '2024-06-20 22:29:12', '2024-06-20 22:29:12');
INSERT INTO `transaksi_produk` VALUES (11, '9044895355903512', 'Tisu', 9000, 1, 2, 9, '2024-06-27 00:43:07', '2024-06-27 00:43:07');
INSERT INTO `transaksi_produk` VALUES (12, '2194270828178870', 'Tanggo', 7000, 1, 3, 10, '2024-06-28 01:57:41', '2024-06-28 01:57:41');
INSERT INTO `transaksi_produk` VALUES (13, '9044895355903512', 'Tisu', 9000, 1, 2, 11, '2024-06-28 02:03:20', '2024-06-28 02:03:20');
INSERT INTO `transaksi_produk` VALUES (16, '2194270828178870', 'Tanggo', 7000, 1, 3, 14, '2024-07-04 01:57:28', '2024-07-04 01:57:28');
INSERT INTO `transaksi_produk` VALUES (17, '9044895355903512', 'Tisu', 9000, 20, 2, 15, '2024-07-04 02:28:06', '2024-07-04 02:28:06');
INSERT INTO `transaksi_produk` VALUES (18, '2194270828178870', 'Tanggo', 7000, 3, 3, 16, '2024-07-21 11:12:07', '2024-07-21 11:12:07');
INSERT INTO `transaksi_produk` VALUES (19, '9044895355903512', 'Tisu', 9000, 3, 2, 16, '2024-07-21 11:12:07', '2024-07-21 11:12:07');
INSERT INTO `transaksi_produk` VALUES (20, '2194270828178870', 'Tanggo', 7000, 40, 3, 17, '2024-07-21 11:14:57', '2024-07-21 11:14:57');

-- ----------------------------
-- Table structure for transaksi_produk_temp
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_produk_temp`;
CREATE TABLE `transaksi_produk_temp`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `barcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `produk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `harga` int(11) NULL DEFAULT 0,
  `jumlah` int(11) NULL DEFAULT 0,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `metode_id` int(11) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `transaksi_produk_temp_produk_id_foreign`(`produk_id` ASC) USING BTREE,
  CONSTRAINT `transaksi_produk_temp_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaksi_produk_temp
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `telpon` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_active` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_role_id_foreign`(`role_id` ASC) USING BTREE,
  CONSTRAINT `user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'Admin', NULL, '085881789609', 'admin@gmail.com', '$2y$10$kIxZ2fZCrXQnq2HGouD0H.E9.DcZq0OJny07YLE9KIo.Y9kFF.GBO', NULL, 'Y', 1, '2024-05-23 15:43:51', '2024-05-23 15:43:51');
INSERT INTO `user` VALUES (2, 'Aditya', NULL, '085881789609', 'owner@gmail.com', '$2y$10$Hui59n72R8d5KZ1aVb.R6eCajlAOy1ooW4zfD2OA.ENVUDAfk6wrC', NULL, 'Y', 2, '2024-05-23 15:43:51', '2024-05-23 15:43:51');
INSERT INTO `user` VALUES (3, 'Staff ', NULL, '085881789609', 'staff@gmail.com', '$2y$10$PY7XwL.A4FBRstkv.jRMkuiQ8VYQi/3qfHW9QFu.9p0fpJTlY58t6', NULL, 'Y', 3, '2024-05-23 15:43:52', '2024-05-23 15:43:52');

-- ----------------------------
-- Table structure for user_role
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_role
-- ----------------------------
INSERT INTO `user_role` VALUES (1, 'Developer', '2024-05-23 15:43:51', '2024-05-23 15:43:51');
INSERT INTO `user_role` VALUES (2, 'Owner', '2024-05-23 15:43:51', '2024-05-23 15:43:51');
INSERT INTO `user_role` VALUES (3, 'Kasir', '2024-05-23 15:43:51', '2024-05-23 15:43:51');

SET FOREIGN_KEY_CHECKS = 1;
