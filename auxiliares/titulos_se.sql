/*
 Navicat Premium Dump SQL

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50624 (5.6.24)
 Source Host           : localhost:3306
 Source Schema         : titulos_se

 Target Server Type    : MySQL
 Target Server Version : 50624 (5.6.24)
 File Encoding         : 65001

 Date: 07/01/2025 10:12:30
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for historico_entrega_titulos
-- ----------------------------
DROP TABLE IF EXISTS `historico_entrega_titulos`;
CREATE TABLE `historico_entrega_titulos`  (
  `matricula` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `grado` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `carrera` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_elaboracion` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_inicia_entrega` date NOT NULL,
  `fecha_upload` datetime NOT NULL,
  `fecha_entrega` varchar(30) NULL DEFAULT NULL,
  `titulo_entregado` int(1) NULL DEFAULT 0 COMMENT '1 - entregado, 0 - sin entregar',
  `observaciones` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`matricula`, `grado`, `fecha_elaboracion`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
