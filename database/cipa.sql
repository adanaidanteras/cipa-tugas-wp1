/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100418
 Source Host           : localhost:3306
 Source Schema         : cipa

 Target Server Type    : MySQL
 Target Server Version : 100418
 File Encoding         : 65001

 Date: 18/06/2021 23:52:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for parkiran_images
-- ----------------------------
DROP TABLE IF EXISTS `parkiran_images`;
CREATE TABLE `parkiran_images`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_parkiran` int(11) NULL DEFAULT NULL,
  `src` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 71 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of parkiran_images
-- ----------------------------
INSERT INTO `parkiran_images` VALUES (1, 1, 'ZxzZxZDINS.jpg');
INSERT INTO `parkiran_images` VALUES (2, 1, 'jxmTHDkgcV.jpg');
INSERT INTO `parkiran_images` VALUES (3, 2, 'NudFejZdiZ.jpg');
INSERT INTO `parkiran_images` VALUES (4, 2, 'g4IpDC4fnh.jpg');
INSERT INTO `parkiran_images` VALUES (5, 3, 'MSAmzELlID.jpeg');
INSERT INTO `parkiran_images` VALUES (6, 3, 'UYphVggKF9.jpg');
INSERT INTO `parkiran_images` VALUES (7, 4, 'ZNycucmhEF.jpg');
INSERT INTO `parkiran_images` VALUES (8, 4, 'hW5s9KDhfp.jpg');
INSERT INTO `parkiran_images` VALUES (9, 5, 'WOxJRWGsPE.jpg');
INSERT INTO `parkiran_images` VALUES (10, 5, 'VN4hr7woxR.jpg');
INSERT INTO `parkiran_images` VALUES (11, 6, 'yDbjtvdsNR.jpg');
INSERT INTO `parkiran_images` VALUES (12, 6, 'Jm9FQ7NAqh.jpg');
INSERT INTO `parkiran_images` VALUES (13, 7, 'RzymbgC4Mt.jpg');
INSERT INTO `parkiran_images` VALUES (14, 7, 'D8BtNm8NEn.jpg');
INSERT INTO `parkiran_images` VALUES (15, 8, 'o8CoNAmE0r.jpg');
INSERT INTO `parkiran_images` VALUES (16, 8, 'MmqLoyIItB.jpg');
INSERT INTO `parkiran_images` VALUES (17, 9, 'pg2NRuAcBH.png');
INSERT INTO `parkiran_images` VALUES (18, 9, 'R6NprJ6p8B.jpg');
INSERT INTO `parkiran_images` VALUES (19, 10, 'wpr5f87bya.jpg');
INSERT INTO `parkiran_images` VALUES (20, 10, 'ubMYmNIA6B.jpeg');
INSERT INTO `parkiran_images` VALUES (21, 11, 'ZxzZxZDINS.jpg');
INSERT INTO `parkiran_images` VALUES (22, 11, 'jxmTHDkgcV.jpg');
INSERT INTO `parkiran_images` VALUES (23, 12, 'NudFejZdiZ.jpg');
INSERT INTO `parkiran_images` VALUES (24, 12, 'g4IpDC4fnh.jpg');
INSERT INTO `parkiran_images` VALUES (25, 13, 'MSAmzELlID.jpeg');
INSERT INTO `parkiran_images` VALUES (26, 13, 'UYphVggKF9.jpg');
INSERT INTO `parkiran_images` VALUES (27, 14, 'ZxzZxZDINS.jpg');
INSERT INTO `parkiran_images` VALUES (28, 14, 'jxmTHDkgcV.jpg');
INSERT INTO `parkiran_images` VALUES (29, 15, 'NudFejZdiZ.jpg');
INSERT INTO `parkiran_images` VALUES (30, 15, 'g4IpDC4fnh.jpg');
INSERT INTO `parkiran_images` VALUES (31, 16, 'MSAmzELlID.jpeg');
INSERT INTO `parkiran_images` VALUES (32, 16, 'UYphVggKF9.jpg');
INSERT INTO `parkiran_images` VALUES (33, 17, 'ZNycucmhEF.jpg');
INSERT INTO `parkiran_images` VALUES (34, 17, 'hW5s9KDhfp.jpg');
INSERT INTO `parkiran_images` VALUES (35, 18, 'WOxJRWGsPE.jpg');
INSERT INTO `parkiran_images` VALUES (36, 18, 'VN4hr7woxR.jpg');
INSERT INTO `parkiran_images` VALUES (37, 19, 'yDbjtvdsNR.jpg');
INSERT INTO `parkiran_images` VALUES (38, 19, 'Jm9FQ7NAqh.jpg');
INSERT INTO `parkiran_images` VALUES (39, 20, 'RzymbgC4Mt.jpg');
INSERT INTO `parkiran_images` VALUES (40, 20, 'D8BtNm8NEn.jpg');
INSERT INTO `parkiran_images` VALUES (41, 21, 'o8CoNAmE0r.jpg');
INSERT INTO `parkiran_images` VALUES (42, 21, 'MmqLoyIItB.jpg');
INSERT INTO `parkiran_images` VALUES (43, 22, 'pg2NRuAcBH.png');
INSERT INTO `parkiran_images` VALUES (44, 22, 'R6NprJ6p8B.jpg');
INSERT INTO `parkiran_images` VALUES (45, 23, 'wpr5f87bya.jpg');
INSERT INTO `parkiran_images` VALUES (46, 23, 'ubMYmNIA6B.jpeg');
INSERT INTO `parkiran_images` VALUES (47, 24, 'ZxzZxZDINS.jpg');
INSERT INTO `parkiran_images` VALUES (48, 24, 'jxmTHDkgcV.jpg');
INSERT INTO `parkiran_images` VALUES (49, 25, 'NudFejZdiZ.jpg');
INSERT INTO `parkiran_images` VALUES (50, 25, 'g4IpDC4fnh.jpg');
INSERT INTO `parkiran_images` VALUES (51, 26, 'MSAmzELlID.jpeg');
INSERT INTO `parkiran_images` VALUES (52, 26, 'UYphVggKF9.jpg');
INSERT INTO `parkiran_images` VALUES (53, 66, 'V6ouNz31BX.jpg');
INSERT INTO `parkiran_images` VALUES (54, 66, 'oOAQd7nTzW.jpg');
INSERT INTO `parkiran_images` VALUES (55, 67, '9ZhPudc47k.jpg');
INSERT INTO `parkiran_images` VALUES (56, 67, 'qO1tmO3RFh.jpeg');
INSERT INTO `parkiran_images` VALUES (57, 68, 'kEzZQ77sKT.jpg');
INSERT INTO `parkiran_images` VALUES (58, 68, 'jm9Hh53Gb9.jpg');
INSERT INTO `parkiran_images` VALUES (59, 69, 'Kmg6KcLpM9.jpg');
INSERT INTO `parkiran_images` VALUES (60, 69, '5fmEHZmdNk.jpeg');
INSERT INTO `parkiran_images` VALUES (61, 70, '1i11fsK6DE.jpg');
INSERT INTO `parkiran_images` VALUES (62, 70, 'M9ZfuPSVST.jpg');
INSERT INTO `parkiran_images` VALUES (63, 71, 'amXRFfLzCX.jpg');
INSERT INTO `parkiran_images` VALUES (64, 71, 'c9GpG0ttSc.jpg');
INSERT INTO `parkiran_images` VALUES (65, 72, 'GiSDSOjRRY.jpg');
INSERT INTO `parkiran_images` VALUES (66, 72, '7rQFlrliAr.jpg');
INSERT INTO `parkiran_images` VALUES (67, 73, 'zXzZRO9Nbx.jpg');
INSERT INTO `parkiran_images` VALUES (68, 73, '2oAaM24XnX.png');
INSERT INTO `parkiran_images` VALUES (69, 74, '0xwtazDvpp.jpg');
INSERT INTO `parkiran_images` VALUES (70, 74, '1PLGOK0kWC.jpg');

-- ----------------------------
-- Table structure for parkirans
-- ----------------------------
DROP TABLE IF EXISTS `parkirans`;
CREATE TABLE `parkirans`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tempat` varchar(52) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `detail_alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `kapasitas_motor` int(4) NULL DEFAULT NULL,
  `kapasitas_mobil` int(4) NULL DEFAULT NULL,
  `latitude` decimal(20, 8) NULL DEFAULT NULL,
  `longitude` decimal(20, 8) NULL DEFAULT NULL,
  `id_user` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 75 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of parkirans
-- ----------------------------
INSERT INTO `parkirans` VALUES (1, 'Plaza Atrium', 'Jl. Senen Raya No.135, Senen, Kec. Senen, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10410', 340, 170, -6.17848600, 106.84129300, 1);
INSERT INTO `parkirans` VALUES (2, 'Parkiran Mobil Galur', 'Jl. Galur Jaya No.36, RW.4, Galur, Kec. Johar Baru, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10530', 100, 50, -6.17532900, 106.85433300, 1);
INSERT INTO `parkirans` VALUES (3, 'Secure Parking Hotel Grand Cempaka', 'Jl. Letjend Suprapto No.62, RT.1/RW.3, Cemp. Putih Bar., Kec. Johar Baru, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10540', 200, 100, -6.17377200, 106.86131800, 1);
INSERT INTO `parkirans` VALUES (4, 'Gedung Parkir Motor Kemenkeu', 'Jl. Gn. Sahari No.91, Gn. Sahari Sel., Kec. Kemayoran, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10610', 600, 300, -6.16875800, 106.83841000, 1);
INSERT INTO `parkirans` VALUES (5, 'Persewaan Lahan Parkir Kramat', 'Jl. Kramat Lontar Gg. III No.63A, RT.2/RW.1, Paseban, Kec. Senen, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10440', 100, 50, -6.18556900, 106.84541200, 1);
INSERT INTO `parkirans` VALUES (6, 'Parkir Mobil Unit Rawat Jalan RSCM', 'Jl. Pangeran Diponegoro No.80, RT.2/RW.6, Kenari, Kec. Senen, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10430', 200, 100, -6.19674700, 106.84811400, 1);
INSERT INTO `parkirans` VALUES (7, 'Parkir Motor 24 Jam Tebing Tinggi', 'Tebing Tinggi, RT.4/RW.1, Kb. Melati, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10230', 100, 50, -6.19657600, 106.82083100, 1);
INSERT INTO `parkirans` VALUES (8, 'Parkiran Pasar Tanah Abang', 'Jl. H. Fachrudin No.78-82, Kp. Bali, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10260', 200, 100, -6.18742900, 106.81411700, 1);
INSERT INTO `parkirans` VALUES (9, 'Parkiran The Peak at Sudirman', 'Jl. Setiabudi Raya No.9, RT.2/RW.2, Kuningan, Setia Budi, Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12910', 600, 300, -6.21060600, 106.82367400, 1);
INSERT INTO `parkirans` VALUES (10, 'Parkiran Citywalk Sudirman Jakarta', 'Jl. K.H. Mas Mansyur No.Kav 121, RT.10/RW.11, Karet Tengsin, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10220', 100, 50, -6.21090400, 106.81844100, 1);
INSERT INTO `parkirans` VALUES (11, 'Parkiran Gramedia Matraman', 'Jl. Matraman Raya No.46-48, RT.12/RW.2, Kb. Manggis, Kec. Matraman, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13150', 200, 100, -6.20166100, 106.85530400, 1);
INSERT INTO `parkirans` VALUES (12, 'Parkiran Gelora Bung Karno Sports Complex', 'Jl. Pintu Satu Senayan, Gelora, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10270', 100, 50, -6.21875000, 106.80366300, 1);
INSERT INTO `parkirans` VALUES (13, 'Parkiran Dinas Perhubungan Provinsi DKI Jakarta', 'Jl. Taman Jati Baru No.1, RT.17/RW.1, Cideng, Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10150', 200, 100, -6.18163800, 106.81062200, 1);
INSERT INTO `parkirans` VALUES (14, 'Parkiran Motor Permata', 'RT.6/RW.1, Menteng Atas, Setiabudi, South Jakarta City, Jakarta 12980', 600, 300, -6.21121500, 106.83490200, 1);
INSERT INTO `parkirans` VALUES (15, 'Parkiran Kota Kasablanka Mall', 'Jl. Casablanca Raya Kav. 88, Menteng Dalam, Kec. Tebet, Daerah Khusus Ibukota Jakarta 12870', 100, 50, -6.22320800, 106.84477700, 1);
INSERT INTO `parkirans` VALUES (16, 'Parkiran Gajah Mada Plaza', 'Jl. Gajah Mada, RT.2/RW.1, Petojo Utara, Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10130', 200, 100, -6.15820500, 106.81683100, 1);
INSERT INTO `parkirans` VALUES (17, 'Parkiran Jakarta Golf Club', 'Jl. R.Mangun Muka Raya No.1, RT.10/RW.13, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220', 100, 50, -6.20222900, 106.87702900, 1);
INSERT INTO `parkirans` VALUES (18, 'Parkiran ITC Roxy Mas', 'Jl. KH. Hasyim Ashari No.125, RW.8, Cideng, Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10150', 200, 100, -6.16508900, 106.80096000, 1);
INSERT INTO `parkirans` VALUES (19, 'Parkiran Grand Kartini', 'Jl. Kartini Raya No.57, RT.3/RW.2, Kartini, Kecamatan Sawah Besar, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10750', 600, 300, -6.15062500, 106.83426000, 1);
INSERT INTO `parkirans` VALUES (24, 'Parkiran Kelapa Gading Barat', 'Jl. Sunaryo Kelapa Gading Barat', 300, 100, -6.15651300, 106.89259500, 1);
INSERT INTO `parkirans` VALUES (25, 'Parkiran Kepapa Timur', 'Jl. Lepah Raya, Kelapa gading timur', 100, 50, -6.16598500, 106.90300200, 1);
INSERT INTO `parkirans` VALUES (26, 'Parkiran Rawak Badak', 'Jl. Urip Dede, Rawak badak', 130, 90, -6.12958900, 106.90010500, 1);
INSERT INTO `parkirans` VALUES (66, 'Parkiran Pondok Kelapa', 'Jl. Nyiur 1, pondok Kelapa', 100, 50, -6.23987917, 106.92632675, 3);
INSERT INTO `parkirans` VALUES (67, 'Parkiran Pulo Mampang', 'Jl. Bangka II, Pela Mampang', 200, 100, -6.25097094, 106.81715012, 3);
INSERT INTO `parkirans` VALUES (68, 'Parkiran Kranji', 'Jl. Kranji, Bekasi Barat', 300, 200, -6.23552772, 106.96821213, 3);
INSERT INTO `parkirans` VALUES (69, 'Parkiran Jatinegara', 'Jl. Puloayang Raya, Jatinegara', 320, 120, -6.20701844, 106.91591978, 3);
INSERT INTO `parkirans` VALUES (70, 'Parkiran Danau Sunter', 'Jl. Sky VII, Sunter Raya Jaya', 300, 100, -6.14817117, 106.86916351, 3);
INSERT INTO `parkirans` VALUES (71, 'Parkiran Universitas Jakarta', 'Jl Pemuda Rawamangun', 320, 200, -6.19192591, 106.88967705, 3);
INSERT INTO `parkirans` VALUES (72, 'Parkiran Mandaka Museum', 'Jl. Taman Widya Chandra', 200, 100, -6.23164552, 106.81697845, 3);
INSERT INTO `parkirans` VALUES (73, 'Parkiran Duren 3', 'Jl. Duren 3, Jakarta Selatan', 40, 20, -6.25412778, 106.83440208, 3);
INSERT INTO `parkirans` VALUES (74, 'Parkiran Holiday Kemayoran', 'Jl. Pademang Timur, Kemayoran', 300, 40, -6.14285891, 106.84882164, 3);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Adan Aidan Teras', 'aidanadan01@gmail.com', '25d55ad283aa400af464c76d713c07ad');
INSERT INTO `users` VALUES (3, 'Tito Bahtiar', 'titobahtiar@gmail.com', '25d55ad283aa400af464c76d713c07ad');
INSERT INTO `users` VALUES (4, 'Muhammad Tedi', 'm.tedi@gmail.com', '25d55ad283aa400af464c76d713c07ad');
INSERT INTO `users` VALUES (5, 'Basith Fikri S', 'basith.f.s@gmail.com', '25d55ad283aa400af464c76d713c07ad');
INSERT INTO `users` VALUES (6, 'M Firman', 'm.firman@gmail.com', '25d55ad283aa400af464c76d713c07ad');
INSERT INTO `users` VALUES (7, 'Kristantino', 'kristantino@gmail.com', '25d55ad283aa400af464c76d713c07ad');

SET FOREIGN_KEY_CHECKS = 1;
