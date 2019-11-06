/*
 Navicat Premium Data Transfer

 Source Server         : xampp
 Source Server Type    : MariaDB
 Source Server Version : 100406
 Source Host           : localhost:3306
 Source Schema         : db_pemilihan

 Target Server Type    : MariaDB
 Target Server Version : 100406
 File Encoding         : 65001

 Date: 01/11/2019 23:57:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_telp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `akses` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'Administrators', 'admin', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 'example@mail.com', 1, 'admin');
INSERT INTO `admin` VALUES (2, 'Panitia', 'panitia', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 'panitia@mail.com', 1, 'panitia');
INSERT INTO `admin` VALUES (3, 'Joko Hermawan', 'jokohermawan', 'c4ca4238a0b923820dcc509a6f75849b', '0987587899', 'joko@gmail.com', 1, 'panitia');

-- ----------------------------
-- Table structure for calon
-- ----------------------------
DROP TABLE IF EXISTS `calon`;
CREATE TABLE `calon`  (
  `id_calon` int(11) NOT NULL AUTO_INCREMENT,
  `no_calon` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_calon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `visi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `misi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `program_lain` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_pemilihan` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_calon`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of calon
-- ----------------------------
INSERT INTO `calon` VALUES (1, 'BTM001', 'Joni Abdul', 'With this format, we can specify many more options to customize our alert. For example we can change the text on the confirm button to', 'With this format, we can specify many more options to customize our alert. For example we can change the text on the confirm button to', '1572451109.png', 'With this format, we can specify many more options to customize our alert. For example we can change the text on the confirm button to', 2);
INSERT INTO `calon` VALUES (4, 'BT001', 'Boy Kurniawan', 'Tidak ada', 'Tidak ada', '1572546554.jpg', 'Tidak ada', 3);
INSERT INTO `calon` VALUES (5, 'BT002', 'Juni Okta', 'Tidak ada', 'Tidak ada', '1572546583.jpg', 'Tidak ada', 3);
INSERT INTO `calon` VALUES (6, 'BT003', 'Joko', 'Tidak ada', 'Tidak ada', '1572546603.jpg', 'Tidak ada', 3);

-- ----------------------------
-- Table structure for detail_pilih
-- ----------------------------
DROP TABLE IF EXISTS `detail_pilih`;
CREATE TABLE `detail_pilih`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemilih` int(11) NOT NULL,
  `id_calon` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_pilih
-- ----------------------------
INSERT INTO `detail_pilih` VALUES (6, 4, 4);
INSERT INTO `detail_pilih` VALUES (7, 4, 5);
INSERT INTO `detail_pilih` VALUES (8, 4, 6);

-- ----------------------------
-- Table structure for jadwal
-- ----------------------------
DROP TABLE IF EXISTS `jadwal`;
CREATE TABLE `jadwal`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mulai` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jadwal
-- ----------------------------
INSERT INTO `jadwal` VALUES (1, '2018-09-15 14:00:00');
INSERT INTO `jadwal` VALUES (2, '2018-08-01 09:00:00');
INSERT INTO `jadwal` VALUES (3, '2018-09-15 10:00:00');
INSERT INTO `jadwal` VALUES (4, '2018-08-01 09:00:00');
INSERT INTO `jadwal` VALUES (5, '2019-09-15 09:00:00');
INSERT INTO `jadwal` VALUES (6, '2018-10-08 09:00:00');
INSERT INTO `jadwal` VALUES (7, '2019-03-07 09:00:00');
INSERT INTO `jadwal` VALUES (8, '2018-08-01 00:00:00');
INSERT INTO `jadwal` VALUES (9, '2019-03-08 20:00:00');
INSERT INTO `jadwal` VALUES (10, '2019-03-08 07:00:00');
INSERT INTO `jadwal` VALUES (11, '2018-08-01 09:00:00');
INSERT INTO `jadwal` VALUES (12, '2020-09-01 09:00:00');
INSERT INTO `jadwal` VALUES (13, '2018-08-01 09:00:00');

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kategori`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES (1, 'kategori A');
INSERT INTO `kategori` VALUES (2, 'kategori B');

-- ----------------------------
-- Table structure for pemilih
-- ----------------------------
DROP TABLE IF EXISTS `pemilih`;
CREATE TABLE `pemilih`  (
  `id_pemilih` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pemilih` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kel` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode_akun` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_telp` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_pemilih`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pemilih
-- ----------------------------
INSERT INTO `pemilih` VALUES (4, 'Boy Kurniawan', 'BB', 'BB0704', '098766789');

-- ----------------------------
-- Table structure for pemilihan
-- ----------------------------
DROP TABLE IF EXISTS `pemilihan`;
CREATE TABLE `pemilihan`  (
  `id_pemilihan` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) NULL DEFAULT NULL,
  `nama_pemilihan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jumlah_pemilihan` int(11) NULL DEFAULT NULL,
  `kontak_panitia` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `penyelenggara` varbinary(255) NULL DEFAULT NULL,
  `lokasi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kecamatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kelurahan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `start_date` datetime(0) NULL DEFAULT NULL,
  `end_date` datetime(0) NULL DEFAULT NULL,
  `id_user` int(11) NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id_pemilihan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pemilihan
-- ----------------------------
INSERT INTO `pemilihan` VALUES (2, 1, 'Pemilihan Walikota Batam', 9, '4567890987', 0x4B505520426174616D, 'batam', 'batam', 'batam', '2019-10-27 09:00:00', '2019-10-29 15:00:00', 2, 1);
INSERT INTO `pemilihan` VALUES (3, 1, 'Pemilian Testing Presiden Indonesia', 3, '875456786', 0x4B505520496E646F6E65736961, 'Jakarta Pusat', 'bekasi', 'Jakarta', '2019-10-31 08:00:00', '2019-11-02 09:00:00', 3, 3);

-- ----------------------------
-- Table structure for total_suara
-- ----------------------------
DROP TABLE IF EXISTS `total_suara`;
CREATE TABLE `total_suara`  (
  `id_total` int(11) NOT NULL AUTO_INCREMENT,
  `id_calon` int(11) NULL DEFAULT NULL,
  `total` int(11) NULL DEFAULT NULL,
  `id_pemilihan` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_total`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of total_suara
-- ----------------------------
INSERT INTO `total_suara` VALUES (1, 4, 1, 3);
INSERT INTO `total_suara` VALUES (2, 5, 1, 3);
INSERT INTO `total_suara` VALUES (3, 6, 1, 3);

SET FOREIGN_KEY_CHECKS = 1;
