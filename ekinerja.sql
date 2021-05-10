/*
 Navicat Premium Data Transfer

 Source Server         : LOCAL
 Source Server Type    : MySQL
 Source Server Version : 100418
 Source Host           : localhost:3306
 Source Schema         : ekinerja

 Target Server Type    : MySQL
 Target Server Version : 100418
 File Encoding         : 65001

 Date: 06/05/2021 14:12:40
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for aktivitas_harian
-- ----------------------------
DROP TABLE IF EXISTS `aktivitas_harian`;
CREATE TABLE `aktivitas_harian`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_entrian` datetime(0) NOT NULL,
  `tanggal_kegiatan` datetime(0) NOT NULL,
  `nip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pangkat` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gol` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jabatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jabatan_kd` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jenis_jabatan` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `unit_kerja` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `penilai_nip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `penilai_nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `link_skp_id` int(11) NULL DEFAULT NULL,
  `link_skp_kegiatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `uraian_kegiatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `jam_mulai` time(0) NULL DEFAULT NULL,
  `jam_selesai` time(0) NULL DEFAULT NULL,
  `poin` smallint(3) NULL DEFAULT 0,
  `is_approve` enum('Belum','Ya','Tidak') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'Belum',
  `tanggal_verifikasi` datetime(0) NULL DEFAULT NULL,
  `is_submit` enum('Tidak','Ya') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'Tidak',
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of aktivitas_harian
-- ----------------------------
INSERT INTO `aktivitas_harian` VALUES (21, '2021-04-22 10:22:56', '2021-04-22 10:30:44', '199202062020121004', 'AHMAD SHOLIKIN, S.Kom', 'Penata Muda', 'III/a', 'Pranata Komputer', '1231010009901', '40', 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', 'https://sipgan.magelangkab.go.id/sipgan/images/photo/199202062020121004.jpg', '197707051997031003', 'MUHAMMAD KHANAFI', 0, '', 'Ngoding revisi bagian penambahan periode SKP, dibuat menjadi 3 pilihan link yaitu : atasan langsung, pejabat penilai, atasan pejabat penilai. \r\nMembuat pengembangan juga di bagian entrian aktivitas harian dimana dari yang sebelumnya menggunakan poin, sekarang diubah menjadi menggunakan jam mulai dan jam selesai', '07:00:00', '10:30:00', 210, 'Ya', '2021-04-22 14:12:19', 'Tidak', '2021-04-22 10:22:56', '2021-04-22 14:12:19', NULL);
INSERT INTO `aktivitas_harian` VALUES (22, '2021-04-22 11:05:37', '2021-04-22 11:05:37', '199202062020121004', 'AHMAD SHOLIKIN, S.Kom', 'Penata Muda', 'III/a', 'Pranata Komputer', '1231010009901', '40', 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', 'https://sipgan.magelangkab.go.id/sipgan/images/photo/199202062020121004.jpg', '197707051997031003', 'MUHAMMAD KHANAFI', 0, '', 'Testing Aplikas SiCAKAP', '10:30:00', '11:05:00', 35, 'Ya', '2021-04-22 14:13:38', 'Tidak', '2021-04-22 11:05:37', '2021-04-22 14:13:38', NULL);

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
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of app_group
-- ----------------------------
INSERT INTO `app_group` VALUES (1, 'Administrator', 'Hak Akses utk Administrator', NULL, '2020-06-29 21:33:35', NULL);
INSERT INTO `app_group` VALUES (4, 'User', 'Hak akses untuk pengguna sistem', '2021-04-15 09:00:00', '2021-04-15 09:31:22', NULL);

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
INSERT INTO `app_info` VALUES ('1', 'SiCAKAP', 'sicakap.magelangkab.go.id', 'Pemerintah Kabupaten Magelang', '08985000788', 'nci.ahmad@gmail.com', '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas fugit consequuntur assumenda, fuga tempore dolores ullam incidunt explicabo quidem architecto animi dolorem nam nobis delectus minima totam eligendi eius beatae.</p>', '', '-', 'B.1.3', 'logo_kasbiy.PNG', 'be-majestic', 'majestic', 'dev');

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
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

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
INSERT INTO `app_menu` VALUES (24, 'Verifikasi', 'Verifikasi', '#', 'verifikasi', 'mdi mdi-home', 0, 'Backend', 1, '1', 9, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (25, 'Persetujuan SKP', 'Verifikasi Persetujuan SKP', 'persetujuan-skp', 'persetujuan-skp', 'mdi mdi-home', 24, 'Verifikasi', 2, '0', 11, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (26, 'Aktivitas Harian', 'Entrian Kegiatan Aktivitas Harian Pegawai', 'aktivitas-harian', 'aktivitas-harian', 'mdi mdi-home', 21, 'Entrian Data', 2, '0', 11, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (27, 'Aktivitas Harian', 'Verifikasi Aktivitas Harian', 'verif-aktivitas-harian', 'verif-aktivitas-harian', 'mdi mdi-home', 24, 'Verifikasi', 2, '0', 13, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (28, 'Penilaian', 'Penilaian', '#', 'penilaian', 'mdi mdi-home', 0, 'Backend', 1, '1', 10, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (29, 'Penyesuaian SKP', 'Penyesuaian Sasaran Kerja Pegawai', 'penyesuaian-skp', 'penyesuaian-skp', 'mdi mdi-home', 28, 'Penilaian', 2, '0', 14, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (30, 'Capaian SKP', 'Capaian Sasaran Kerja Pegawai', 'capaian-skp', 'capaian-skp', 'mdi mdi-home', 28, 'Penilaian', 2, '0', 15, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (31, 'Perilaku Kerja', 'Form Penilaian Perilaku Kerja', 'perilaku-kerja', 'perilaku-kerja', 'mdi mdi-home', 28, 'Penilaian', 2, '0', 16, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (32, 'Konfigurasi', 'konfigurasi', 'konfigurasi', 'konfigurasi', 'mdi mdi-home', 0, 'Backend', 1, '1', 11, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (33, 'Indikator Perilaku Kerja', 'Konfigurasi Indikator Perilaku Kerja', 'indikator-perilaku-kerja', 'indikator-perilaku-kerja', 'mdi mdi-home', 32, 'Konfigurasi', 2, '0', 17, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (34, 'Bobot Prosentase', 'Konfigurasi Bobot Prosentase', 'bobot-prosentase', 'bobot-prosentase', 'mdi mdi-home', 32, 'Konfigurasi', 2, '0', 18, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (35, 'Batasan', 'konfigurasi Batasan dan Target', 'batasan', 'batasan', 'mdi mdi-home', 32, 'Konfigurasi', 2, '0', 19, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (36, 'Review', 'Review Penilaian Prestasi Kerja', 'review', 'review', 'mdi mdi-home', 28, 'Penilaian', 2, '0', 17, '1', '', '', NULL, NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 85 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

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
INSERT INTO `app_role` VALUES (59, 4, 1, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (60, 4, 21, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (61, 4, 22, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (62, 4, 23, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (63, 1, 24, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (64, 1, 25, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (65, 4, 24, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (66, 4, 25, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (67, 1, 26, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (68, 4, 26, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (69, 1, 27, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (70, 4, 27, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (71, 1, 28, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (72, 1, 29, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (73, 1, 30, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (74, 4, 28, '1', '1', '1', '0', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (75, 4, 29, '1', '1', '1', '0', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (76, 4, 30, '1', '1', '1', '0', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (77, 1, 31, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (78, 4, 31, '1', '1', '1', '0', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (79, 1, 32, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (80, 1, 34, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (81, 1, 33, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (82, 1, 35, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (83, 1, 36, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (84, 4, 36, '1', '1', '1', '0', NULL, NULL, NULL);

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
-- Table structure for batasan
-- ----------------------------
DROP TABLE IF EXISTS `batasan`;
CREATE TABLE `batasan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nilai` smallint(6) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of batasan
-- ----------------------------
INSERT INTO `batasan` VALUES (1, 'BMPH', 'Batas Maksimal Poin Harian', 360, NULL, NULL, NULL);
INSERT INTO `batasan` VALUES (2, 'TPB', 'Target Poin Bulanan', 6250, NULL, NULL, NULL);
INSERT INTO `batasan` VALUES (3, 'BV', 'Batas Verifikasi', 3, NULL, NULL, NULL);
INSERT INTO `batasan` VALUES (4, 'BP', 'Batas Pengajuan', 2, NULL, NULL, NULL);
INSERT INTO `batasan` VALUES (5, 'HK', 'Hari Kerja', 20, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for bobot_prosentase
-- ----------------------------
DROP TABLE IF EXISTS `bobot_prosentase`;
CREATE TABLE `bobot_prosentase`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bulan_berlaku` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `bobot_skp` tinyint(4) NULL DEFAULT NULL,
  `bobot_perilaku_kerja` tinyint(4) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `update_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bobot_prosentase
-- ----------------------------
INSERT INTO `bobot_prosentase` VALUES (1, '1,2,3,4,5,6', 60, 40, NULL, NULL, NULL);
INSERT INTO `bobot_prosentase` VALUES (2, '7,8,9,10,11,12', 70, 30, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for indikator_perilaku_kerja
-- ----------------------------
DROP TABLE IF EXISTS `indikator_perilaku_kerja`;
CREATE TABLE `indikator_perilaku_kerja`  (
  `id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `indikator` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `urut` tinyint(1) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of indikator_perilaku_kerja
-- ----------------------------
INSERT INTO `indikator_perilaku_kerja` VALUES ('PKDIS', 'Disiplin', 4, NULL, NULL, NULL);
INSERT INTO `indikator_perilaku_kerja` VALUES ('PKIT', 'Integritas', 2, NULL, NULL, NULL);
INSERT INTO `indikator_perilaku_kerja` VALUES ('PKKOM', 'Komitmen', 3, NULL, NULL, NULL);
INSERT INTO `indikator_perilaku_kerja` VALUES ('PKKS', 'Kerjasama', 5, NULL, NULL, NULL);
INSERT INTO `indikator_perilaku_kerja` VALUES ('PKOP', 'Orientasi Pelayanan', 1, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `indikator_perilaku_kerja` VALUES ('PKPIM', 'Kepemimpinan', 6, NULL, NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of link_hirarki
-- ----------------------------
INSERT INTO `link_hirarki` VALUES (5, '199708232019082001', ' FAIRUZ NURMA HADINA S.STP.', '199111032015071003', 'MUKHAMAD ADITYA KURNIAWAN', 'Ya', '2021-04-15 09:58:15', '2021-04-15 09:58:15', NULL);
INSERT INTO `link_hirarki` VALUES (6, '199010212020121002', ' PRANTYO S.Kom.', '196907181998032004', 'MUFLICHAH ROYCHANI', 'Ya', '2021-04-16 08:46:39', '2021-04-16 08:46:39', NULL);
INSERT INTO `link_hirarki` VALUES (7, '199606102018082001', ' DYAH LAKSMI PRAKASITA S.IP.', '199111032015071003', 'MUKHAMAD ADITYA KURNIAWAN', 'Ya', '2021-04-16 14:11:59', '2021-04-16 14:11:59', NULL);
INSERT INTO `link_hirarki` VALUES (10, '199111032015071003', '  MUKHAMAD ADITYA KURNIAWAN S.STP.', '197303051998031008', 'MUSOKHIP', 'Ya', '2021-04-19 14:05:02', '2021-04-19 14:05:02', NULL);
INSERT INTO `link_hirarki` VALUES (11, '198905162011012013', '  HAYU VERIKA INDRA KATULANGI S.Akun', '198905162011012013', 'HAYU VERIKA INDRA KATULANGI', 'Ya', '2021-04-21 09:41:06', '2021-04-21 09:42:13', '2021-04-21');
INSERT INTO `link_hirarki` VALUES (12, '198905162011012013', '  HAYU VERIKA INDRA KATULANGI S.Akun', '197902211999032002', 'ASRI SARIFATUN NAFIAH', 'Ya', '2021-04-21 09:42:23', '2021-04-21 09:42:23', NULL);
INSERT INTO `link_hirarki` VALUES (13, '198905162011012013', '  HAYU VERIKA INDRA KATULANGI S.Akun', '196411231992031007', 'ARIEF KOESTANTO SETIADI', 'Ya', '2021-04-21 09:45:10', '2021-04-21 09:45:10', NULL);
INSERT INTO `link_hirarki` VALUES (15, '197707051997031003', '  MUHAMMAD KHANAFI S.H.', '197203191993031008', 'SUNGEDI', 'Ya', '2021-04-21 10:49:38', '2021-04-21 10:49:38', NULL);
INSERT INTO `link_hirarki` VALUES (16, '197707051997031003', '  MUHAMMAD KHANAFI S.H.', '196504231992031006', 'EKO TAVIP HARYANTO', 'Ya', '2021-04-21 10:49:53', '2021-04-21 10:49:53', NULL);
INSERT INTO `link_hirarki` VALUES (17, '198609232010011008', '  AHMAD EDY FITRIADI S.Kom., M.M.', '197707051997031003', 'MUHAMMAD KHANAFI', 'Ya', '2021-04-21 11:00:33', '2021-04-21 11:00:33', NULL);
INSERT INTO `link_hirarki` VALUES (18, '197203191993031008', '  SUNGEDI S.H., M.M.', '196504231992031006', 'EKO TAVIP HARYANTO', 'Ya', '2021-04-21 11:44:30', '2021-04-21 11:44:30', NULL);
INSERT INTO `link_hirarki` VALUES (19, '197203191993031008', '  SUNGEDI S.H., M.M.', '196411231992031007', 'ARIEF KOESTANTO SETIADI', 'Ya', '2021-04-21 11:47:16', '2021-04-21 11:47:16', NULL);
INSERT INTO `link_hirarki` VALUES (20, '199202062020121004', ' AHMAD SHOLIKIN S.Kom', '197707051997031003', 'MUHAMMAD KHANAFI', 'Ya', '2021-04-22 08:34:54', '2021-04-22 08:34:54', NULL);
INSERT INTO `link_hirarki` VALUES (21, '199202062020121004', ' AHMAD SHOLIKIN S.Kom', '197203191993031008', 'SUNGEDI', 'Ya', '2021-04-22 08:35:01', '2021-04-22 08:35:01', NULL);
INSERT INTO `link_hirarki` VALUES (22, '199111032015071003', '  MUKHAMAD ADITYA KURNIAWAN S.STP.', '196504231992031006', 'EKO TAVIP HARYANTO', 'Ya', '2021-04-28 09:16:04', '2021-04-28 09:16:04', NULL);

-- ----------------------------
-- Table structure for pegawai
-- ----------------------------
DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai`  (
  `nip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pangkat` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gol` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jabatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jabatan_kd` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jenis_jabatan` tinyint(3) NULL DEFAULT NULL,
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
INSERT INTO `pegawai` VALUES ('197203191993031008', '  SUNGEDI S.H., M.M.', 'Pembina', 'IV/a', 'Kepala Bidang Informasi dan Pengadaan Pegawai', '1230030003201', 11, 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', 'https://sipgan.magelangkab.go.id/sipgan/images/photo/197203191993031008.jpg', 'sung.edi.se@gmail.com', '081328071978', '2021-04-21 11:02:10', '2021-05-06 10:26:50', NULL);
INSERT INTO `pegawai` VALUES ('197208291999031009', '  A HERY PURWANTO SP.', 'Penata Tingkat I', 'III/d', 'Kepala Subbagian Perekonomian', '1020142004101', 11, 'Sekretariat Daerah', 'https://sipgan.magelangkab.go.id/sipgan/images/photo/197208291999031009.jpg', 'hery1234her@gmail.com', '081225496640', '2021-04-21 11:43:29', '2021-04-21 11:43:29', NULL);
INSERT INTO `pegawai` VALUES ('197303051998031008', '  MUSOKHIP S.Pd., M.M.', 'Penata Tingkat I', 'III/d', 'Kepala Bidang Pengembangan Karier', '1230050003201', 11, 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', 'https://sipgan.magelangkab.go.id/sipgan/images/photo/197303051998031008.jpg', 'de.ruhan123@gmail.com', '085868113021', '2021-04-28 09:46:40', '2021-04-28 09:54:32', NULL);
INSERT INTO `pegawai` VALUES ('197707051997031003', '  MUHAMMAD KHANAFI S.H.', 'Penata', 'III/c', 'Kepala Subbidang Informasi Kepegawaian', '1230031004101', 11, 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', 'https://sipgan.magelangkab.go.id/sipgan/images/photo/197707051997031003.jpg', 'muhammad.hanafi@gmail.com', '08995045302', '2021-04-19 10:19:05', '2021-05-06 09:05:08', NULL);
INSERT INTO `pegawai` VALUES ('198201132009032004', 'dr. FITRI INDRIANI  ', 'Pembina', 'IV/a', 'Dokter Umum', '1052202009905', 20, 'Dinas Kesehatan', 'https://sipgan.magelangkab.go.id/sipgan/images/photo/198201132009032004.jpg', 'findriani1301@gmail.com', '085642354430', '2021-05-03 09:27:13', '2021-05-03 09:27:13', NULL);
INSERT INTO `pegawai` VALUES ('198609232010011008', '  AHMAD EDY FITRIADI S.Kom., M.M.', 'Penata Muda Tingkat I', 'III/b', 'Pranata Komputer', '1231010009901', 40, 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', 'https://sipgan.magelangkab.go.id/sipgan/images/photo/198609232010011008.jpg', 'ahmad.edy.fitriadi@gmail.com', '08562889060', '2021-04-21 10:57:54', '2021-04-21 11:03:40', NULL);
INSERT INTO `pegawai` VALUES ('198905162011012013', '  HAYU VERIKA INDRA KATULANGI S.Akun', 'Penata Muda', 'III/a', 'Penata Laporan Keuangan', '1230022009903', 90, 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', 'https://sipgan.magelangkab.go.id/sipgan/images/photo/198905162011012013.jpg', 'hayu250211@gmail.com', '081228031313', '2021-04-21 09:36:38', '2021-04-21 10:12:54', NULL);
INSERT INTO `pegawai` VALUES ('199111032015071003', '  MUKHAMAD ADITYA KURNIAWAN S.STP.', 'Penata Muda Tingkat I', 'III/b', 'Kepala Subbidang Jabatan dan Penilaian Kinerja', '1230052004101', 11, 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', 'https://sipgan.magelangkab.go.id/sipgan/images/photo/199111032015071003.jpg', 'ronie.cr-7@yahoo.com', '085799939511', '2021-04-19 14:04:23', '2021-05-05 09:43:27', NULL);
INSERT INTO `pegawai` VALUES ('199202062020121004', ' AHMAD SHOLIKIN S.Kom', 'Penata Muda', 'III/a', 'Pranata Komputer', '1231010009901', 40, 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', 'https://sipgan.magelangkab.go.id/sipgan/images/photo/199202062020121004.jpg', 'nci.ahmad@gmail.com', '08985000788', '2021-04-14 14:12:00', '2021-05-06 08:00:16', NULL);
INSERT INTO `pegawai` VALUES ('199708232019082001', ' FAIRUZ NURMA HADINA S.STP.', 'Penata Muda', 'III/a', 'Analis Kinerja', '1230052009905', 90, 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', 'https://sipgan.magelangkab.go.id/sipgan/images/photo/199708232019082001.jpg', 'fairuznurma123@gmail.com', '081212197406', '2021-04-19 14:06:37', '2021-04-21 09:18:18', NULL);

-- ----------------------------
-- Table structure for perilaku_kerja
-- ----------------------------
DROP TABLE IF EXISTS `perilaku_kerja`;
CREATE TABLE `perilaku_kerja`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `periode_id` int(11) NULL DEFAULT NULL,
  `indikator_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `indikator_nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `indikator_urut` tinyint(4) NULL DEFAULT NULL,
  `poin` float NULL DEFAULT NULL,
  `keterangan` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perilaku_kerja
-- ----------------------------
INSERT INTO `perilaku_kerja` VALUES (4, '199202062020121004', 18, 'PKOP', 'Orientasi Pelayanan', 1, 87, 'Baik', '2021-05-03 15:29:40', '2021-05-03 15:33:33', NULL);
INSERT INTO `perilaku_kerja` VALUES (5, '199202062020121004', 18, 'PKIT', 'Integritas', 2, 90, 'Baik', '2021-05-03 15:29:43', '2021-05-03 15:33:35', NULL);
INSERT INTO `perilaku_kerja` VALUES (6, '199202062020121004', 18, 'PKKOM', 'Komitmen', 3, 86, 'Baik', '2021-05-03 15:29:46', '2021-05-03 16:14:52', NULL);
INSERT INTO `perilaku_kerja` VALUES (7, '199202062020121004', 18, 'PKDIS', 'Disiplin', 4, 86, 'Baik', '2021-05-03 15:29:48', '2021-05-03 16:04:53', NULL);
INSERT INTO `perilaku_kerja` VALUES (8, '199202062020121004', 18, 'PKKS', 'Kerjasama', 5, 88, 'Baik', '2021-05-03 15:29:51', '2021-05-03 16:01:04', NULL);
INSERT INTO `perilaku_kerja` VALUES (10, '198609232010011008', 15, 'PKKS', 'Kerjasama', 5, 77, 'Baik', '2021-05-03 15:49:11', '2021-05-03 16:04:46', NULL);
INSERT INTO `perilaku_kerja` VALUES (11, '198609232010011008', 15, 'PKDIS', 'Disiplin', 4, 80, 'Baik', '2021-05-03 15:55:01', '2021-05-03 16:17:36', NULL);
INSERT INTO `perilaku_kerja` VALUES (12, '198609232010011008', 15, 'PKKOM', 'Komitmen', 3, 85, 'Baik', '2021-05-03 15:56:18', '2021-05-03 16:17:34', NULL);
INSERT INTO `perilaku_kerja` VALUES (13, '198609232010011008', 15, 'PKIT', 'Integritas', 2, 80, 'Baik', '2021-05-03 15:58:00', '2021-05-03 15:58:02', NULL);
INSERT INTO `perilaku_kerja` VALUES (14, '198609232010011008', 15, 'PKOP', 'Orientasi Pelayanan', 1, 85, 'Baik', '2021-05-03 16:14:42', '2021-05-03 16:14:43', NULL);

-- ----------------------------
-- Table structure for periode_skp
-- ----------------------------
DROP TABLE IF EXISTS `periode_skp`;
CREATE TABLE `periode_skp`  (
  `periode_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pangkat` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gol` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jabatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jabatan_kd` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `unit_kerja` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `atasan_nip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `atasan_nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `atasan_pangkat` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `atasan_gol` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `atasan_jabatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `atasan_unit_kerja` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pejabat_penilai_nip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pejabat_penilai_nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pejabat_penilai_pangkat` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pejabat_penilai_gol` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pejabat_penilai_jabatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pejabat_penilai_unit_kerja` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `atasan_pejabat_penilai_nip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `atasan_pejabat_penilai_nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `atasan_pejabat_penilai_pangkat` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `atasan_pejabat_penilai_gol` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `atasan_pejabat_penilai_jabatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `atasan_pejabat_penilai_unit_kerja` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `periode_awal` date NULL DEFAULT NULL,
  `periode_akhir` date NULL DEFAULT NULL,
  `is_default` enum('Ya','Tidak') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'Tidak',
  `poin_tugas_tambahan` tinyint(4) NULL DEFAULT 0,
  `poin_kreativitas` tinyint(4) NULL DEFAULT 0,
  `perilaku_kerja_jumlah` float NULL DEFAULT NULL,
  `perilaku_kerja_rerata` float NULL DEFAULT NULL,
  `perilaku_kerja_sebutan` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `perilaku_kerja_prosentase` float NULL DEFAULT NULL,
  `keberatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `tanggal_keberatan` datetime(0) NULL DEFAULT NULL,
  `tanggapan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `tanggal_tanggapan` datetime(0) NULL DEFAULT NULL,
  `keputusan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `tanggal_keputusan` datetime(0) NULL DEFAULT NULL,
  `rekomendasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `tanggal_rekomendasi` datetime(0) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`periode_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of periode_skp
-- ----------------------------
INSERT INTO `periode_skp` VALUES (6, '199708232019082001', ' FAIRUZ NURMA HADINA S.STP.', 'Penata Muda', 'III/a', 'Analis Kinerja', '1230052009905', 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', NULL, NULL, NULL, NULL, NULL, NULL, '199111032015071003', '  MUKHAMAD ADITYA KURNIAWAN S.STP.', 'Penata Muda Tingkat I', 'III/b', 'Kepala Subbidang Jabatan dan Penilaian Kinerja', 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-01', '2021-12-31', 'Ya', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-15 09:59:23', '2021-04-19 14:07:03', NULL);
INSERT INTO `periode_skp` VALUES (7, '199010212020121002', ' PRANTYO S.Kom.', 'Penata Muda', 'III/a', 'Pranata Komputer', '57006000990101', 'Badan Penanggulangan Bencana Daerah', NULL, NULL, NULL, NULL, NULL, NULL, '196907181998032004', '  MUFLICHAH ROYCHANI S.T., M.M.', 'Pembina', 'IV/a', 'Kepala Sekretariat Unsur Pelaksana Badan Penanggulangan Bencana Daerah', 'Badan Penanggulangan Bencana Daerah', NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', '2021-12-31', 'Tidak', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-16 08:47:09', '2021-04-16 08:47:09', NULL);
INSERT INTO `periode_skp` VALUES (8, '199606102018082001', ' DYAH LAKSMI PRAKASITA S.IP.', 'Penata Muda', 'III/a', 'Analis Jabatan', '1230052009902', 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', NULL, NULL, NULL, NULL, NULL, NULL, '199111032015071003', '  MUKHAMAD ADITYA KURNIAWAN S.STP.', 'Penata Muda Tingkat I', 'III/b', 'Kepala Subbidang Jabatan dan Penilaian Kinerja', 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', '2021-06-30', 'Tidak', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-16 14:13:06', '2021-04-16 14:13:06', NULL);
INSERT INTO `periode_skp` VALUES (11, '199111032015071003', '  MUKHAMAD ADITYA KURNIAWAN S.STP.', 'Penata Muda Tingkat I', 'III/b', 'Kepala Subbidang Jabatan dan Penilaian Kinerja', '1230052004101', 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', NULL, NULL, NULL, NULL, NULL, NULL, '197303051998031008', '  MUSOKHIP S.Pd., M.M.', 'Penata Tingkat I', 'III/d', 'Kepala Bidang Pengembangan Karier', 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', '2021-06-30', 'Tidak', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-19 14:05:13', '2021-04-28 09:19:46', '2021-04-28 09:19:46');
INSERT INTO `periode_skp` VALUES (12, '198905162011012013', '  HAYU VERIKA INDRA KATULANGI S.Akun', 'Penata Muda', 'III/a', 'Penata Laporan Keuangan', '1230022009903', 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', NULL, NULL, NULL, NULL, NULL, NULL, '197902211999032002', '  ASRI SARIFATUN NAFIAH SE.', 'Penata Tingkat I', 'III/d', 'Kepala Subbagian Keuangan', 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', '2021-12-31', 'Ya', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-21 09:52:13', '2021-04-21 10:19:10', NULL);
INSERT INTO `periode_skp` VALUES (13, '197707051997031003', '  MUHAMMAD KHANAFI S.H.', 'Penata', 'III/c', 'Kepala Subbidang Informasi Kepegawaian', '1230031004101', 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', NULL, NULL, NULL, NULL, NULL, NULL, '197203191993031008', '  SUNGEDI S.H., M.M.', 'Pembina', 'IV/a', 'Kepala Bidang Informasi dan Pengadaan Pegawai', 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', '2021-12-31', 'Ya', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-21 10:50:45', '2021-04-21 10:50:53', NULL);
INSERT INTO `periode_skp` VALUES (14, '198609232010011008', '  AHMAD EDY FITRIADI S.Kom., M.M.', 'Penata Muda Tingkat I', 'III/b', 'Pranata Komputer', '1231010009901', 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', NULL, NULL, NULL, NULL, NULL, NULL, '197707051997031003', '  MUHAMMAD KHANAFI S.H.', 'Penata', 'III/c', 'Kepala Subbidang Informasi Kepegawaian', 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-01', '2021-04-08', 'Tidak', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-21 11:05:19', '2021-04-21 11:05:22', '2021-04-21 11:05:22');
INSERT INTO `periode_skp` VALUES (15, '198609232010011008', '  AHMAD EDY FITRIADI S.Kom., M.M.', 'Penata Muda Tingkat I', 'III/b', 'Pranata Komputer', '1231010009901', 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', NULL, NULL, NULL, NULL, NULL, NULL, '197707051997031003', '  MUHAMMAD KHANAFI S.H.', 'Penata', 'III/c', 'Kepala Subbidang Informasi Kepegawaian', 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', '2021-12-31', 'Ya', 0, 0, 407, 81.4, 'Baik', 32.56, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-21 11:06:33', '2021-05-04 09:20:05', NULL);
INSERT INTO `periode_skp` VALUES (16, '197203191993031008', '  SUNGEDI S.H., M.M.', 'Pembina', 'IV/a', 'Kepala Bidang Informasi dan Pengadaan Pegawai', '1230030003201', 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', NULL, NULL, NULL, NULL, NULL, NULL, '196504231992031006', ' EKO TAVIP HARYANTO SE.', 'Pembina Utama Muda', 'IV/c', 'Kepala Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', '2021-06-30', 'Ya', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-21 11:46:13', '2021-04-21 11:46:21', NULL);
INSERT INTO `periode_skp` VALUES (17, '197203191993031008', '  SUNGEDI S.H., M.M.', 'Pembina', 'IV/a', 'Kepala Bidang Informasi dan Pengadaan Pegawai', '1230030003201', 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', NULL, NULL, NULL, NULL, NULL, NULL, '196411231992031007', 'Drs. ARIEF KOESTANTO SETIADI  ', 'Pembina Tingkat I', 'IV/b', 'Sekretaris Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-01', '2021-08-31', 'Tidak', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-21 11:49:06', '2021-04-21 11:49:06', NULL);
INSERT INTO `periode_skp` VALUES (18, '199202062020121004', ' AHMAD SHOLIKIN S.Kom', 'Penata Muda', 'III/a', 'Pranata Komputer', '1231010009901', 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', '197707051997031003', '  MUHAMMAD KHANAFI S.H.', 'Penata', 'III/c', 'Kepala Subbidang Informasi Kepegawaian', NULL, '197707051997031003', '  MUHAMMAD KHANAFI S.H.', 'Penata', 'III/c', 'Kepala Subbidang Informasi Kepegawaian', 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', '197203191993031008', '  SUNGEDI S.H., M.M.', 'Pembina', 'IV/a', 'Kepala Bidang Informasi dan Pengadaan Pegawai', 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', '2021-01-01', '2021-06-30', 'Ya', 1, 2, 437, 87.4, 'Baik', 34.96, 'oke, keberatan diterima, saya akan perbaiki nilainya', '2021-05-06 09:24:42', 'baik, keberatan saya terima, coba nanti saya kroscek ulang penilaiannya', '2021-05-06 09:47:19', 'fix ya, nilainya sudah dinaikkan menjadi 90', '2021-05-06 09:00:00', 'penilaiannya sangat baik bisa direkomendasikan menjadi striker', '2021-05-06 09:44:15', '2021-04-22 09:27:07', '2021-05-06 09:47:19', NULL);
INSERT INTO `periode_skp` VALUES (19, '199111032015071003', '  MUKHAMAD ADITYA KURNIAWAN S.STP.', 'Penata Muda Tingkat I', 'III/b', 'Kepala Subbidang Jabatan dan Penilaian Kinerja', '1230052004101', 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', '197303051998031008', '  MUSOKHIP S.Pd., M.M.', 'Penata Tingkat I', 'III/d', 'Kepala Bidang Pengembangan Karier', NULL, '197303051998031008', '  MUSOKHIP S.Pd., M.M.', 'Penata Tingkat I', 'III/d', 'Kepala Bidang Pengembangan Karier', 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', '196504231992031006', ' EKO TAVIP HARYANTO SE.', 'Pembina Utama Muda', 'IV/c', 'Kepala Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', '2020-01-02', '2020-09-30', 'Tidak', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-28 09:18:10', '2021-04-28 09:18:10', NULL);
INSERT INTO `periode_skp` VALUES (20, '199111032015071003', '  MUKHAMAD ADITYA KURNIAWAN S.STP.', 'Penata Muda Tingkat I', 'III/b', 'Kepala Subbidang Jabatan dan Penilaian Kinerja', '1230052004101', 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', '197303051998031008', '  MUSOKHIP S.Pd., M.M.', 'Penata Tingkat I', 'III/d', 'Kepala Bidang Pengembangan Karier', NULL, '197303051998031008', '  MUSOKHIP S.Pd., M.M.', 'Penata Tingkat I', 'III/d', 'Kepala Bidang Pengembangan Karier', 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', '196504231992031006', ' EKO TAVIP HARYANTO SE.', 'Pembina Utama Muda', 'IV/c', 'Kepala Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', 'Badan Kepegawaian, Pendidikan, dan Pelatihan Daerah', '2020-10-01', '2020-12-30', 'Tidak', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-28 09:18:56', '2021-04-28 09:18:56', NULL);

-- ----------------------------
-- Table structure for susunan_skp
-- ----------------------------
DROP TABLE IF EXISTS `susunan_skp`;
CREATE TABLE `susunan_skp`  (
  `skp_id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `periode_id` smallint(6) NULL DEFAULT NULL,
  `link_skp_id` int(11) NULL DEFAULT NULL,
  `link_skp_kegiatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `kegiatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `angka_kredit` float NULL DEFAULT NULL,
  `target_kuantitas` float NULL DEFAULT NULL,
  `target_output` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `target_kualitas_mutu` tinyint(3) NULL DEFAULT 100,
  `target_waktu` smallint(6) NULL DEFAULT NULL,
  `target_satuan_waktu` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `target_biaya` double NULL DEFAULT 0,
  `target_acc` enum('Ya','Tidak','Belum') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'Belum',
  `fix_kuantitas` float NULL DEFAULT NULL,
  `fix_output` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `fix_kualitas_mutu` tinyint(3) NULL DEFAULT NULL,
  `fix_waktu` smallint(6) NULL DEFAULT NULL,
  `fix_satuan_waktu` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `fix_biaya` double NULL DEFAULT NULL,
  `realisasi_kuantitas` float NULL DEFAULT NULL,
  `realisasi_output` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `realisasi_kualitas_mutu` tinyint(3) NULL DEFAULT NULL,
  `realisasi_waktu` smallint(6) NULL DEFAULT NULL,
  `realisasi_satuan_waktu` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `realisasi_biaya` double NULL DEFAULT NULL,
  `penghitungan` float NULL DEFAULT NULL,
  `nilai` float NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`skp_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 78 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of susunan_skp
-- ----------------------------
INSERT INTO `susunan_skp` VALUES (17, '199708232019082001', 6, 0, '-', 'Mengumpulkan, Menerima, dan Mencatat Bahan Kerja, data, dan Informasi di Bidang Kinerja PNS', 0, 1, 'Dokumen', 100, 6, 'bulan', 0, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-15 10:04:00', '2021-04-20 13:37:01', NULL);
INSERT INTO `susunan_skp` VALUES (18, '199708232019082001', 6, 0, '-', 'Memberikan Layanan Data dan Informasi di Bidang Kinerja PNS', 0, 50, 'Dokumen', 100, 6, 'bulan', 0, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-15 10:05:21', '2021-04-20 13:37:01', NULL);
INSERT INTO `susunan_skp` VALUES (19, '199708232019082001', 6, 0, '-', 'Memberikan Layanan Konsultasi di Bidang Kinerja PNS', 0, 150, 'Dokumen', 100, 6, 'bulan', 0, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-15 10:05:54', '2021-04-20 13:37:01', NULL);
INSERT INTO `susunan_skp` VALUES (20, '199708232019082001', 6, 0, '-', 'Menyiapkan Bahan Fasilitasi Penyusunan Pakta Integritas ASN', 0, 48, 'Dokumen', 100, 6, 'bulan', 0, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-15 10:06:45', '2021-04-20 13:37:01', NULL);
INSERT INTO `susunan_skp` VALUES (21, '199708232019082001', 6, 0, '-', 'Melaksanakan Pengelolaan Keuangan dan Administrasi Umum Subbidang Jabatan dan Penilaian Kinerja', 0, 2, 'Dokumen', 100, 6, 'bulan', 0, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-15 10:08:54', '2021-04-20 13:37:01', NULL);
INSERT INTO `susunan_skp` VALUES (22, '199708232019082001', 6, 0, '-', 'Menyiapkan Bahan Fasilitasi di Bidang Kinerja PNS', 0, 48, 'Dokumen', 100, 6, 'bulan', 0, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-15 10:09:52', '2021-04-20 13:37:01', NULL);
INSERT INTO `susunan_skp` VALUES (23, '199708232019082001', 6, 0, '-', 'Melaksanakan Pengelolaan Administrasi, Data, dan Informasi di Bidang Kinerja PNS', 0, 1, 'Dokumen', 100, 6, 'bulan', 0, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-15 10:11:00', '2021-04-20 13:37:01', NULL);
INSERT INTO `susunan_skp` VALUES (24, '199606102018082001', 8, 0, '-', 'Melaksanakan proses administrasi kepegawaian sesuai dengan peraturan yang berlaku untuk kelancaran tugas', 0, 80, 'Layanan', 100, 6, 'Bulan', 0, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-16 14:18:58', '2021-04-16 14:18:58', NULL);
INSERT INTO `susunan_skp` VALUES (52, '198905162011012013', 12, 0, '-', 'Menghimpun dan mengolah draft  laporan keuangan SKPD sesuai ketentuan yang berlaku', 0, 80, 'Laporan Keuanga', 80, 12, 'Bulan', 0, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-21 10:45:13', '2021-04-21 10:45:42', '2021-04-21 10:45:42');
INSERT INTO `susunan_skp` VALUES (53, '198905162011012013', 12, 0, '-', 'Menghimpun dan mengolah draft  laporan keuangan SKPD sesuai ketentuan yang berlaku', 0, 8, 'Laporan Keuanga', 80, 12, 'Bulan', 0, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-21 10:48:15', '2021-04-21 10:54:03', NULL);
INSERT INTO `susunan_skp` VALUES (54, '198905162011012013', 12, 0, '-', 'Merencanakan kegiatan yang menjadi tugasnya sesuai program kerja atasannya dan ketentuan yang berlaku untuk pedoman pelaksanaan tugas.', 0, 1, 'Dokumen perenca', 80, 12, 'Bulan', 0, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-21 10:49:52', '2021-04-21 10:52:10', NULL);
INSERT INTO `susunan_skp` VALUES (55, '198905162011012013', 12, 0, '-', 'Menyusun laporan pelaksanaan tugas sesuai ketentuan yang berlaku untuk pertanggungjawaban kinerja dan rencana yang akan datang.', 0, 1, 'Dokumen laporan', 80, 12, 'Bulan', 0, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-21 10:50:31', '2021-04-21 10:51:49', NULL);
INSERT INTO `susunan_skp` VALUES (56, '198905162011012013', 12, 0, '-', 'Melaksanakan tugas kedinasan lain yang diperintahkan oleh pimpinan baik lisan maupun tertulis.', 0, 12, 'Dokumen ', 80, 12, 'Bulan', 0, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-21 10:51:17', '2021-04-21 10:56:41', NULL);
INSERT INTO `susunan_skp` VALUES (57, '197707051997031003', 13, 0, '-', 'Melaksanakan Kegiatan Evaluasi Data, informasi dan Sistem Informasi Kepegawaian', 0, 9326, 'ASN', 100, 12, 'Bulan', 178050000, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-21 10:52:54', '2021-04-21 11:03:00', NULL);
INSERT INTO `susunan_skp` VALUES (58, '197707051997031003', 13, 0, '-', 'Fasilitasi Lembaga Profesi ASN', 0, 1, 'paket', 100, 12, 'Bulan', 150000000, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-21 10:53:30', '2021-04-21 11:03:06', NULL);
INSERT INTO `susunan_skp` VALUES (59, '197707051997031003', 13, 0, '-', 'Melaksanakan kegiatan penyusunan formasi ASN', 0, 1, 'dokumen', 100, 3, 'Bulan', 0, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-21 10:54:05', '2021-04-21 11:03:12', NULL);
INSERT INTO `susunan_skp` VALUES (60, '197707051997031003', 13, 0, '-', 'Melaksanakan kegiatan penyusunan daftar urut kepangkatan', 0, 1, 'dokumen', 100, 2, 'Bulan', 0, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-21 10:54:41', '2021-04-21 11:03:18', NULL);
INSERT INTO `susunan_skp` VALUES (61, '197707051997031003', 13, 0, '-', 'Melaksanakan kegiatan penataan arsip', 0, 9101, 'dokumen', 100, 12, 'Bulan', 0, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-21 10:55:13', '2021-04-21 11:03:24', NULL);
INSERT INTO `susunan_skp` VALUES (62, '198905162011012013', 12, 0, '-', 'Melaksanakan tugas kedinasan lain yang diperintahkan oleh pimpinan baik lisan maupun tertulis.', 0, 3, 'Dokumen ', 80, 12, 'Bulan', 0, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-21 10:55:34', '2021-04-21 11:14:47', '2021-04-21 11:14:47');
INSERT INTO `susunan_skp` VALUES (63, '197707051997031003', 13, 0, '-', 'Melaksanakan pengelolaan sistem informasi kepegawaian', 0, 9, 'aplikasi', 100, 12, 'Bulan', 0, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-21 10:55:40', '2021-04-21 11:03:30', NULL);
INSERT INTO `susunan_skp` VALUES (64, '198905162011012013', 12, 0, '-', 'Mengirim dan mengarsip laporan keuangan', 0, 1, 'Laporan Keuanga', 80, 12, 'Bulan', 0, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-21 10:59:02', '2021-04-21 10:59:02', NULL);
INSERT INTO `susunan_skp` VALUES (65, '198609232010011008', 15, 63, 'Melaksanakan pengelolaan sistem informasi kepegawaian', 'Deteksi dan perbaikan aplikasi', 0.25, 2, 'Dokumentasi', 100, 12, 'Bulan', 0, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-21 11:11:03', '2021-04-21 11:12:57', NULL);
INSERT INTO `susunan_skp` VALUES (66, '199202062020121004', 18, 0, '-', 'Menetapkan program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan', 0, 1, 'Dokumen', 100, 2, 'Bulan', 8335000, 'Ya', 1, 'Dokumen', 100, 2, 'Bulan', 3520000, 1, 'Dokumen', 85, 2, 'Bulan', 3520000, 337, 84.25, '2021-04-26 08:37:02', '2021-04-27 14:16:36', NULL);
INSERT INTO `susunan_skp` VALUES (67, '199111032015071003', 19, 0, '-', 'Menyusun Konsep Rencana Kerja Subbidang Jabatan dan Penilaian Kinerja', 0, 2, 'Dokumen', 100, 3, 'Bulan', 0, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-28 09:21:10', '2021-04-28 09:21:24', NULL);
INSERT INTO `susunan_skp` VALUES (68, '199111032015071003', 19, 0, '-', 'Menyusun Konsep Tim Pelaksana Kegiatan', 0, 2, 'Draft SK', 100, 3, 'Bulan', 0, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-28 09:22:09', '2021-04-28 09:22:09', NULL);
INSERT INTO `susunan_skp` VALUES (69, '199111032015071003', 19, 0, '-', 'Melaksanakan layanan Konseling Karier di bidang Jabatan Pimpinan Tinggi dan Jabatan Administrasi', 0, 70, 'Layanan', 100, 12, 'Bulan', 0, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-28 09:23:07', '2021-04-28 09:23:07', NULL);
INSERT INTO `susunan_skp` VALUES (70, '199111032015071003', 20, 0, '-', 'Menyusun program, kegiatan, rencana kerja dan anggaran Subbidang Jabatan dan Penilaian Kinerja', 0, 2, 'Dokumen', 100, 3, 'Bulan', 0, 'Belum', 2, 'Dokumen', 100, 3, 'Bulan', 0, 2, 'Dokumen', NULL, 3, 'Bulan', 0, NULL, NULL, '2021-04-28 09:25:32', '2021-04-28 09:53:04', NULL);
INSERT INTO `susunan_skp` VALUES (71, '199111032015071003', 19, 0, '-', 'Menyusun bahan dan berita Acara Sidang Tim Penilai Kinerja (Baperjakat)', 0, 12, 'Kali', 100, 12, 'Bulan', 0, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-28 09:39:40', '2021-04-28 09:39:40', NULL);
INSERT INTO `susunan_skp` VALUES (72, '199111032015071003', 19, 0, '-', 'Menyiapkan bahan dan nominasi pelantikan pejabat Pimpinan Tinggi, Administrator, Pengawas, fungsional dan Kepala SD', 0, 7, 'Kali', 100, 12, 'Bulan', 0, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-28 09:40:44', '2021-04-28 09:40:44', NULL);
INSERT INTO `susunan_skp` VALUES (73, '199111032015071003', 20, 0, '-', 'Membagi tugas, mendelegasikan wewenang, memberi petunjuk, dan membina pelaksanaan tugas bawahan', 0, 2, 'Kegiatan', 100, 3, 'Bulan', 0, 'Belum', 2, 'Kegiatan', 100, 3, 'Bulan', 0, 2, 'Kegiatan', NULL, 3, 'Bulan', 0, NULL, NULL, '2021-04-28 09:42:00', '2021-04-28 09:53:11', NULL);
INSERT INTO `susunan_skp` VALUES (74, '199111032015071003', 20, 0, '-', 'Memberi layanan konseling karier', 0, 45, 'Layanan', 100, 3, 'Bulan', 0, 'Belum', 45, 'Layanan', 100, 3, 'Bulan', 0, 45, 'Layanan', NULL, 3, 'Bulan', 0, NULL, NULL, '2021-04-28 09:42:44', '2021-04-28 09:53:16', NULL);
INSERT INTO `susunan_skp` VALUES (75, '199111032015071003', 20, 0, '-', 'Memfasilitasi sidang Tim Penilai Kinerja PNS (Baperjakat)', 0, 2, 'Kali Sidang', 100, 3, 'Bulan', 0, 'Belum', 2, 'Kali Sidang', 100, 3, 'Bulan', 0, 2, 'Kali Sidang', NULL, 3, 'Bulan', 0, NULL, NULL, '2021-04-28 09:44:09', '2021-04-28 09:53:29', NULL);
INSERT INTO `susunan_skp` VALUES (76, '199111032015071003', 20, 0, '-', 'Melaksanakan penyiapan bahan penataan ASN', 0, 2, 'Draft SK/SPT Bupati/Sekda', 100, 3, 'Bulan', 763857000, 'Belum', 2, 'Draft SK/SPT Bupati/Sekda', 100, 3, 'Bulan', 763857000, 2, 'Draft SK/SPT Bupati/Sekda', NULL, 3, 'Bulan', 560911900, NULL, NULL, '2021-04-28 09:45:16', '2021-04-28 09:53:44', NULL);
INSERT INTO `susunan_skp` VALUES (77, '199111032015071003', 19, 0, '-', 'Fasilitasi kegiatan assesment', 0, 1, 'Kegiatan', 100, 12, 'Bulan', 0, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-28 09:49:08', '2021-04-28 09:49:08', NULL);

-- ----------------------------
-- Table structure for tambahan_kreativitas
-- ----------------------------
DROP TABLE IF EXISTS `tambahan_kreativitas`;
CREATE TABLE `tambahan_kreativitas`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `periode_id` int(11) NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `kategori` enum('Tugas Tambahan','Kreativitas') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'Tugas Tambahan',
  `is_approve` enum('Belum','Ya','Tidak') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'Belum',
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tambahan_kreativitas
-- ----------------------------
INSERT INTO `tambahan_kreativitas` VALUES (1, '199202062020121004', 18, 'Tim Penggerak Disiplin PNS', 'Tugas Tambahan', 'Ya', '2021-04-28 08:41:29', '2021-05-03 08:50:23', NULL);
INSERT INTO `tambahan_kreativitas` VALUES (2, '199202062020121004', 18, 'Panitia Penerimaan CPNS', 'Tugas Tambahan', 'Belum', '2021-04-28 08:42:00', '2021-04-28 08:56:31', '2021-04-28 08:56:31');
INSERT INTO `tambahan_kreativitas` VALUES (3, '199202062020121004', 18, 'Panitia Penerimaan CPNS', 'Tugas Tambahan', 'Ya', '2021-04-28 08:56:37', '2021-05-03 08:50:24', NULL);
INSERT INTO `tambahan_kreativitas` VALUES (4, '199202062020121004', 18, 'Tim Penyusun Formasi CPNS', 'Tugas Tambahan', 'Ya', '2021-04-28 09:11:40', '2021-05-03 08:50:25', NULL);
INSERT INTO `tambahan_kreativitas` VALUES (5, '199202062020121004', 18, 'Tim Penyusun Formasi CPNS.', 'Tugas Tambahan', 'Belum', '2021-04-28 09:11:52', '2021-04-28 09:12:04', '2021-04-28 09:12:04');
INSERT INTO `tambahan_kreativitas` VALUES (6, '199202062020121004', 18, 'Membuat SOP Anjab Model Agile', 'Kreativitas', 'Ya', '2021-04-28 09:12:29', '2021-05-03 08:50:26', NULL);
INSERT INTO `tambahan_kreativitas` VALUES (7, '199202062020121004', 18, 'Membuat SOP Anjab Model UML.', 'Kreativitas', 'Belum', '2021-04-28 09:17:01', '2021-04-28 09:17:57', '2021-04-28 09:17:57');
INSERT INTO `tambahan_kreativitas` VALUES (8, '199202062020121004', 18, 'Membuat Rancangan Alir', 'Kreativitas', 'Ya', '2021-04-28 09:19:06', '2021-05-03 08:50:28', NULL);
INSERT INTO `tambahan_kreativitas` VALUES (9, '199202062020121004', 18, 'Membuat Form Penataan Jabatan', 'Kreativitas', 'Ya', '2021-04-28 09:19:25', '2021-05-03 08:50:28', NULL);
INSERT INTO `tambahan_kreativitas` VALUES (10, '199202062020121004', 18, 'Membuat Konsep Layout Formasi Berdasarkan ABK', 'Kreativitas', 'Ya', '2021-04-28 09:19:44', '2021-05-03 08:50:30', NULL);
INSERT INTO `tambahan_kreativitas` VALUES (11, '199111032015071003', 20, 'Anggota Tim Pengadaan CPNS Tahun 2020', 'Tugas Tambahan', 'Belum', '2021-04-28 09:51:06', '2021-04-28 09:51:44', '2021-04-28 09:51:44');
INSERT INTO `tambahan_kreativitas` VALUES (12, '199111032015071003', 20, 'Anggota Tim Pengadaan CPNS Tahun 2020', 'Tugas Tambahan', 'Belum', '2021-04-28 09:51:08', '2021-04-28 09:51:08', NULL);
INSERT INTO `tambahan_kreativitas` VALUES (13, '199111032015071003', 20, 'Anggota Tim KPD Tahun 2020', 'Tugas Tambahan', 'Belum', '2021-04-28 09:51:34', '2021-04-28 09:51:34', NULL);

-- ----------------------------
-- View structure for link_skp
-- ----------------------------
DROP VIEW IF EXISTS `link_skp`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `link_skp` AS SELECT skp.* FROM susunan_skp skp
INNER JOIN periode_skp periode
ON skp.periode_id = periode.periode_id
WHERE periode.is_default='Ya' AND skp.nip IN
(SELECT link.link_atasan_id
FROM link_hirarki link
WHERE link.nip='199202062020121004' AND deleted_at IS NULL) ;

SET FOREIGN_KEY_CHECKS = 1;
