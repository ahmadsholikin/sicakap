/*
 Navicat Premium Data Transfer

 Source Server         : LOCALHOST7
 Source Server Type    : MySQL
 Source Server Version : 100418
 Source Host           : localhost:3306
 Source Schema         : ekinerja

 Target Server Type    : MySQL
 Target Server Version : 100418
 File Encoding         : 65001

 Date: 14/04/2021 14:36:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for app_group
-- ----------------------------
DROP TABLE IF EXISTS `app_group`;
CREATE TABLE `app_group`  (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `deskripsi` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`group_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of app_group
-- ----------------------------
INSERT INTO `app_group` VALUES (1, 'Administrator', 'Hak Akses utk Administrator', NULL, '2020-06-29 21:33:35', NULL);

-- ----------------------------
-- Table structure for app_info
-- ----------------------------
DROP TABLE IF EXISTS `app_info`;
CREATE TABLE `app_info`  (
  `id` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `site` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pengembang` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kontak` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tentang` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `alamat` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `versi` char(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `logo` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'logo_sample.png',
  `theme` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'batik',
  `login` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'login_v1',
  `mode` enum('dev','rilis') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'dev',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `FK_app_info`(`theme`) USING BTREE,
  INDEX `FK_app_info_logim`(`login`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of app_info
-- ----------------------------
INSERT INTO `app_info` VALUES ('1', 'SiCAKAP', 'sicakap.magelangkab.go.id', 'Pemerintah Kabupaten Magelang', '08985000788', 'nci.ahmad@gmail.com', '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas fugit consequuntur assumenda, fuga tempore dolores ullam incidunt explicabo quidem architecto animi dolorem nam nobis delectus minima totam eligendi eius beatae.</p>', '', '-', 'B.1.0', 'logo_kasbiy.PNG', 'be-majestic', 'majestic', 'dev');

-- ----------------------------
-- Table structure for app_menu
-- ----------------------------
DROP TABLE IF EXISTS `app_menu`;
CREATE TABLE `app_menu`  (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_nama` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `deskripsi` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `link` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '#',
  `prefik` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ikon` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'mdi mdi-home',
  `induk_id` tinyint(4) NULL DEFAULT NULL,
  `root_nama` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hirarki` tinyint(4) NULL DEFAULT NULL,
  `sub` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `urutan` tinyint(4) NULL DEFAULT 1,
  `aktif` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1',
  `nama_tabel` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `primary_key` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`menu_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of app_menu
-- ----------------------------
INSERT INTO `app_menu` VALUES (1, 'Beranda', 'Beranda', 'beranda', 'beranda', 'mdi mdi-home', NULL, 'App', 1, '0', 1, '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (2, 'Pengaturan', 'Pengaturan App', '#', '#', 'mdi mdi-image-filter-vintage', NULL, 'App', 1, '1', 2, '1', 'app_menu', 'menu_id', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (3, 'Menu Navigasi', 'Pengelolaan Navigasi Menu Sistem dan Konfigurasinya', 'menu', 'menu', '-', 2, 'Pengaturan', 2, '0', 3, '1', 'app_menu', 'menu_id', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (4, 'Grup Pengguna', 'Pengelolaan dan Pemetaan Grup Pengguna Sistem', 'groups', 'groups', '-', 2, 'Pengaturan', 2, '0', 4, '1', 'app_grup', 'grup_id', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (5, 'Role Hak Akses', 'Pengelolaan Hak Akses Halaman dan Fungsional Aksinya', 'role', 'role', '-', 2, 'Pengaturan', 2, '0', 5, '1', 'app_role', 'id', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (6, 'Akun Pengguna', 'Pengelolaan Data Akun Pengguna Sistem', 'users', 'users', '-', 2, 'Pengaturan', 2, '0', 6, '1', 'app_users', 'user_id', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (7, 'Info Website / Aplikasi', 'Konfigurasi Detail Tentang Sistem', 'site', 'site', '-', 2, 'Pengaturan', 2, '0', 7, '1', 'app_info', 'id', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (21, 'Entrian Data', 'Entrian Data', '#', 'entrian-data', 'mdi mdi-home', 0, 'Backend', 1, '1', 8, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (22, 'Periode SKP', 'Periode SKP', 'periode-skp', 'periode-skp', 'mdi mdi-home', 21, 'Entrian Data', 2, '0', 9, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (23, 'Susunan SKP', 'Susunan SKP', 'susunan-skp', 'susunan-skp', 'mdi mdi-home', 21, 'Entrian Data', 2, '0', 10, '1', '', '', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for app_role
-- ----------------------------
DROP TABLE IF EXISTS `app_role`;
CREATE TABLE `app_role`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NULL DEFAULT NULL,
  `menu_id` int(11) NULL DEFAULT NULL,
  `akses_lihat` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '0',
  `akses_tambah` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '0',
  `akses_ubah` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '0',
  `akses_hapus` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '0',
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 59 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of app_role
-- ----------------------------
INSERT INTO `app_role` VALUES (2, 1, 2, '1', '1', '1', '1', '2020-06-18 10:10:00', NULL, NULL);
INSERT INTO `app_role` VALUES (3, 1, 3, '1', '1', '1', '1', '2020-06-18 10:10:00', NULL, NULL);
INSERT INTO `app_role` VALUES (4, 1, 4, '1', '1', '1', '1', '2020-06-18 10:10:00', NULL, NULL);
INSERT INTO `app_role` VALUES (5, 1, 5, '1', '1', '1', '1', '2020-06-18 10:10:00', NULL, NULL);
INSERT INTO `app_role` VALUES (6, 1, 6, '1', '1', '1', '1', '2020-06-18 10:10:00', NULL, NULL);
INSERT INTO `app_role` VALUES (7, 1, 7, '1', '1', '1', '1', '2020-06-18 10:10:00', NULL, NULL);
INSERT INTO `app_role` VALUES (23, 1, 1, '1', '1', '1', '1', '2020-06-18 10:10:00', NULL, NULL);
INSERT INTO `app_role` VALUES (56, 1, 21, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (57, 1, 22, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (58, 1, 23, '1', '1', '1', '1', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for app_users
-- ----------------------------
DROP TABLE IF EXISTS `app_users`;
CREATE TABLE `app_users`  (
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kontak` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  `is_active` enum('1','0') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of app_users
-- ----------------------------
INSERT INTO `app_users` VALUES ('nci.ahmad@gmail.com', '@hmad', 'Ahmad Sholikin', '$2y$10$qebTpuoimrIWwHtaGLn5oO9H6yq.4hHU5U6rPZmnositYwjRKKBBu', NULL, 1, '1', '0000-00-00 00:00:00', '2020-06-26 06:16:27', NULL);

-- ----------------------------
-- Table structure for link_hirarki
-- ----------------------------
DROP TABLE IF EXISTS `link_hirarki`;
CREATE TABLE `link_hirarki`  (
  `link_hirarki_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `link_atasan_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'NIP Atasan',
  `link_atasan_nama` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'Nama Atasan',
  `is_active` enum('Ya','Tidak') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'Ya',
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` date NULL DEFAULT NULL,
  PRIMARY KEY (`link_hirarki_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of link_hirarki
-- ----------------------------
INSERT INTO `link_hirarki` VALUES (2, '199202062020121004', 'AHMAD SHOLIKIN', '197707051997031003', 'MUHAMMAD KHANAFI', 'Ya', NULL, NULL, NULL);
INSERT INTO `link_hirarki` VALUES (3, '199202062020121004', 'AHMAD SHOLIKIN', '197203191993031008', 'SUNGEDI', 'Tidak', NULL, NULL, NULL);
INSERT INTO `link_hirarki` VALUES (4, '199202062020121004', 'AHMAD SHOLIKIN', '196411231992031007', 'ARIEF KOESTANTO SETIADI', 'Ya', NULL, NULL, '2021-04-12');

-- ----------------------------
-- Table structure for pegawai
-- ----------------------------
DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai`  (
  `nip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pangkat` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gol` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jabatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jabatan_kd` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `unit_kerja` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kontak` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`nip`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pegawai
-- ----------------------------
INSERT INTO `pegawai` VALUES ('199202062020121004', ' AHMAD SHOLIKIN S.Kom', '1992020620', 'III/a', 'Pranata Komputer', NULL, 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', 'https://sipgan.magelangkab.go.id/sipgan/images/photo/199202062020121004.jpg', 'nci.ahmad@gmail.com', '08985000788', '2021-04-14 14:12:00', '2021-04-14 14:12:00', NULL);

-- ----------------------------
-- Table structure for periode_skp
-- ----------------------------
DROP TABLE IF EXISTS `periode_skp`;
CREATE TABLE `periode_skp`  (
  `periode_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pangkat` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gol` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jabatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jabatan_kd` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `unit_kerja` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pejabat_penilai_nip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pejabat_penilai_nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pejabat_penilai_pangkat` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pejabat_penilai_gol` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pejabat_penilai_jabatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pejabat_penilai_unit_kerja` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `periode_awal` date NULL DEFAULT NULL,
  `periode_akhir` date NULL DEFAULT NULL,
  `is_default` enum('Ya','Tidak') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'Tidak',
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`periode_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of periode_skp
-- ----------------------------
INSERT INTO `periode_skp` VALUES (3, '199202062020121004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', '2021-06-30', 'Ya', NULL, '2021-04-13 11:04:55', NULL);
INSERT INTO `periode_skp` VALUES (4, '199202062020121004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tidak', NULL, '2021-04-13 11:04:38', '2021-04-13 11:04:38');
INSERT INTO `periode_skp` VALUES (5, '199202062020121004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-01', '2021-12-31', 'Tidak', '2021-04-13 14:04:18', '2021-04-13 14:04:18', NULL);

-- ----------------------------
-- Table structure for susunan_skp
-- ----------------------------
DROP TABLE IF EXISTS `susunan_skp`;
CREATE TABLE `susunan_skp`  (
  `skp_id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `periode_id` smallint(6) NULL DEFAULT NULL,
  `link_atasan_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `link_atasan_nama` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kegiatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `angka_kredit` float NULL DEFAULT NULL,
  `target_kuantitas` float NULL DEFAULT NULL,
  `target_output` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `target_kualitas_mutu` tinyint(3) NULL DEFAULT 100,
  `target_waktu` smallint(6) NULL DEFAULT NULL,
  `target_satuan_waktu` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `target_biaya` double NULL DEFAULT 0,
  `target_acc` enum('Ya','Tidak','Belum') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'Belum',
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`skp_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of susunan_skp
-- ----------------------------
INSERT INTO `susunan_skp` VALUES (1, '199202062020121004', 3, '-', '-', 'Mengelola katalog layanan teknologi informasi', 0.18, 2, 'Laporan', 100, 12, 'Bln', 0, 'Belum', NULL, '2021-04-13 11:15:29', NULL);
INSERT INTO `susunan_skp` VALUES (2, '199202062020121004', 3, '-', '-', 'Mengelola permintaan dan layanan teknologi informasi', 0.9, 6, 'Laporan', 100, 12, 'Bln', 0, 'Belum', NULL, '2021-04-13 11:06:28', NULL);
INSERT INTO `susunan_skp` VALUES (3, '199202062020121004', 3, '-', '-', 'Melakukan implementasi data model', 0.44, 2, 'Dokumen', 100, 12, 'Bln', 0, 'Belum', '2021-04-13 11:30:54', '2021-04-13 11:32:43', NULL);
INSERT INTO `susunan_skp` VALUES (4, '199202062020121004', 3, '-', '-', 'Menyusun dokumentasi rancangan database', 0.08, 1, 'Dokumen', 100, 12, 'Bln', 0, 'Belum', '2021-04-13 11:32:26', '2021-04-13 11:32:26', NULL);
INSERT INTO `susunan_skp` VALUES (5, '199202062020121004', 3, '-', '-', 'Melakukan backup atau pemulihan data', 0.9, 45, 'Dokumen', 100, 12, 'Bln', 0, 'Belum', '2021-04-14 09:38:56', '2021-04-14 09:38:56', NULL);
INSERT INTO `susunan_skp` VALUES (6, '199202062020121004', 3, '-', '-', 'Melakukan evaluasi teknologi data', 0.22, 2, 'Dokumen', 100, 12, 'Bln', 0, 'Belum', '2021-04-14 09:39:30', '2021-04-14 09:39:30', NULL);
INSERT INTO `susunan_skp` VALUES (7, '199202062020121004', 3, '-', '-', 'Melakukan perancangan sistem informasi', 0.66, 1, 'Dokumen', 100, 12, 'Bln', 0, 'Belum', '2021-04-14 09:40:06', '2021-04-14 09:40:06', NULL);
INSERT INTO `susunan_skp` VALUES (8, '199202062020121004', 3, '-', '-', 'Membuat program aplikasi sistem informasi', 1.21, 1, 'Dokumen', 100, 12, 'Bln', 0, 'Belum', '2021-04-14 09:40:35', '2021-04-14 09:40:35', NULL);
INSERT INTO `susunan_skp` VALUES (9, '199202062020121004', 3, '-', '-', 'Mengembangkan program aplikasi sistem informasi', 0.6, 1, 'Dokumen', 100, 12, 'Bln', 0, 'Belum', '2021-04-14 09:41:15', '2021-04-14 09:41:15', NULL);
INSERT INTO `susunan_skp` VALUES (10, '199202062020121004', 3, '-', '-', 'Melakukan penyiapan data untuk uji coba sistem informasi', 0.11, 1, 'Dokumen', 100, 12, 'Bln', 0, 'Belum', '2021-04-14 09:41:49', '2021-04-14 09:41:49', NULL);
INSERT INTO `susunan_skp` VALUES (11, '199202062020121004', 3, '-', '-', 'Melakukan uji coba sistem informasi', 0.99, 18, 'Dokumen', 100, 12, 'Bln', 0, 'Belum', '2021-04-14 09:42:21', '2021-04-14 09:42:21', NULL);
INSERT INTO `susunan_skp` VALUES (12, '199202062020121004', 3, '-', '-', 'Melakukan deteksi atau perbaikan kerusakan sistem informasi', 1.82, 10, 'Dokumen', 100, 12, 'Bln', 0, 'Belum', '2021-04-14 09:42:52', '2021-04-14 09:42:52', NULL);
INSERT INTO `susunan_skp` VALUES (13, '199202062020121004', 3, '-', '-', 'Menyusun petunjuk operasional program aplikasi sistem informasi', 0.33, 2, 'Dokumen', 100, 12, 'Bln', 0, 'Belum', '2021-04-14 09:43:36', '2021-04-14 09:43:36', NULL);
INSERT INTO `susunan_skp` VALUES (14, '199202062020121004', 3, '-', '-', 'Menyusun dokumentasi pengembangan sistem informasi', 0.08, 1, 'Dokumen', 100, 12, 'Bln', 0, 'Belum', '2021-04-14 09:44:01', '2021-04-14 09:44:01', NULL);
INSERT INTO `susunan_skp` VALUES (15, '199202062020121004', 3, '-', '-', 'Melakukan manipulasi data', 1.98, 12, 'Laporan', 100, 12, 'Bln', 0, 'Belum', '2021-04-14 09:44:35', '2021-04-14 09:44:35', NULL);
INSERT INTO `susunan_skp` VALUES (16, '199202062020121004', 3, '-', '-', 'Mengikuti Seminar / Lokakarya / Konferensi / Simposium / Studi Banding Lapangan', 2, 2, 'Laporan', 100, 12, 'Bln', 0, 'Belum', '2021-04-14 09:45:18', '2021-04-14 09:45:18', NULL);

-- ----------------------------
-- View structure for link_skp
-- ----------------------------
DROP VIEW IF EXISTS `link_skp`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `link_skp` AS SELECT lh.nip, lh.link_atasan_id, lh.link_atasan_nama, ps.periode_id, ps.periode_awal, ps.periode_akhir
FROM link_hirarki lh
INNER JOIN periode_skp ps
ON ps.nip = lh.link_atasan_id
WHERE (lh.deleted_at IS NULL OR lh.deleted_at='0000-00-00 00:00:00') AND (ps.deleted_at IS NULL OR ps.deleted_at='0000-00-00 00:00:00') ;

SET FOREIGN_KEY_CHECKS = 1;
