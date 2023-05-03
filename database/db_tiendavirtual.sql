/*
 Navicat Premium Data Transfer

 Source Server         : LARMSQL
 Source Server Type    : MySQL
 Source Server Version : 50724 (5.7.24)
 Source Host           : localhost:3306
 Source Schema         : db_tiendavirtual

 Target Server Type    : MySQL
 Target Server Version : 50724 (5.7.24)
 File Encoding         : 65001

 Date: 02/05/2023 14:22:12
*/
CREATE DATABASE db_tiendavirtual;
USE db_tiendavirtual;
SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categoria
-- ----------------------------
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria`  (
  `idcategoria` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `portada` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ruta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idcategoria`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categoria
-- ----------------------------
INSERT INTO `categoria` VALUES (1, 'Hombre', 'Artículos de moda', 'img_125e45445bd33723d025d7f815ca29f7.jpg', '2021-08-20 03:04:04', 'hombre', 1);
INSERT INTO `categoria` VALUES (2, 'Audio y Videojuegos', 'Lo mejor en tecnología', 'img_78678a3fe95890d155115d5301e0761d.jpg', '2021-08-21 00:47:10', 'audio-y-videojuegos', 1);

-- ----------------------------
-- Table structure for contacto
-- ----------------------------
DROP TABLE IF EXISTS `contacto`;
CREATE TABLE `contacto`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `mensaje` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `ip` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `dispositivo` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `useragent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contacto
-- ----------------------------
INSERT INTO `contacto` VALUES (1, 'Fernando Herrera', 'toolsfordeveloper@gmail.com', 'Mensaje del primer suscriptor!', '127.0.0.1', 'PC', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0', '2021-08-20 04:06:18');

-- ----------------------------
-- Table structure for detalle_pedido
-- ----------------------------
DROP TABLE IF EXISTS `detalle_pedido`;
CREATE TABLE `detalle_pedido`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pedidoid` bigint(20) NOT NULL,
  `productoid` bigint(20) NOT NULL,
  `precio` decimal(11, 2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `idfactura` bigint(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pedidoid`(`pedidoid`) USING BTREE,
  INDEX `productoid`(`productoid`) USING BTREE,
  INDEX `detalle_pedido_ibfk_3`(`idfactura`) USING BTREE,
  CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`pedidoid`) REFERENCES `pedido` (`idpedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`productoid`) REFERENCES `producto` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detalle_pedido_ibfk_3` FOREIGN KEY (`idfactura`) REFERENCES `factura` (`idfactura`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detalle_pedido
-- ----------------------------
INSERT INTO `detalle_pedido` VALUES (1, 1, 2, 200.00, 1, NULL);
INSERT INTO `detalle_pedido` VALUES (2, 1, 1, 100.00, 2, NULL);
INSERT INTO `detalle_pedido` VALUES (3, 2, 1, 100.00, 3, NULL);

-- ----------------------------
-- Table structure for detalle_temp
-- ----------------------------
DROP TABLE IF EXISTS `detalle_temp`;
CREATE TABLE `detalle_temp`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `personaid` bigint(20) NOT NULL,
  `productoid` bigint(20) NOT NULL,
  `precio` decimal(11, 2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `transaccionid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `productoid`(`productoid`) USING BTREE,
  INDEX `personaid`(`personaid`) USING BTREE,
  CONSTRAINT `detalle_temp_ibfk_1` FOREIGN KEY (`productoid`) REFERENCES `producto` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detalle_temp
-- ----------------------------

-- ----------------------------
-- Table structure for factura
-- ----------------------------
DROP TABLE IF EXISTS `factura`;
CREATE TABLE `factura`  (
  `idfactura` bigint(20) NOT NULL,
  `idpersona` bigint(20) NULL DEFAULT NULL,
  `fecha` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`idfactura`) USING BTREE,
  INDEX `fk_fa_per`(`idpersona`) USING BTREE,
  CONSTRAINT `fk_fa_per` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of factura
-- ----------------------------

-- ----------------------------
-- Table structure for imagen
-- ----------------------------
DROP TABLE IF EXISTS `imagen`;
CREATE TABLE `imagen`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `productoid` bigint(20) NOT NULL,
  `img` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `ruta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `productoid`(`productoid`) USING BTREE,
  CONSTRAINT `imagen_ibfk_1` FOREIGN KEY (`productoid`) REFERENCES `producto` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of imagen
-- ----------------------------
INSERT INTO `imagen` VALUES (1, 1, 'pro_1018ac4efefe93878b7468ce72c630a3.jpg', NULL);
INSERT INTO `imagen` VALUES (2, 1, 'pro_f90affec1052d2bf94047cb224d16568.jpg', NULL);
INSERT INTO `imagen` VALUES (3, 1, 'pro_053da6d3ee7d346b6577ccfef6dac02d.jpg', NULL);
INSERT INTO `imagen` VALUES (4, 2, 'pro_04e3bbf847b466de4aed691fca982d9d.jpg', NULL);
INSERT INTO `imagen` VALUES (12, 2, 'pro_bb8108451aa8a21610931110c19fb369.jpg', NULL);
INSERT INTO `imagen` VALUES (13, 3, 'pro_2b1a81cfe27f85486abbf5a7f8860cd9.jpg', NULL);
INSERT INTO `imagen` VALUES (14, 3, 'pro_ff9d29decc4d30b32e6f54f470140448.jpg', NULL);
INSERT INTO `imagen` VALUES (15, 3, 'pro_05785de7b5aad5b8db5d41c1408eb0cc.jpg', NULL);

-- ----------------------------
-- Table structure for modulo
-- ----------------------------
DROP TABLE IF EXISTS `modulo`;
CREATE TABLE `modulo`  (
  `idmodulo` bigint(20) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idmodulo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of modulo
-- ----------------------------
INSERT INTO `modulo` VALUES (1, 'Dashboard', 'Dashboard', 1);
INSERT INTO `modulo` VALUES (2, 'Usuarios', 'Usuarios del sistema', 1);
INSERT INTO `modulo` VALUES (3, 'Clientes', 'Clientes de tienda', 1);
INSERT INTO `modulo` VALUES (4, 'Productos', 'Todos los productos', 1);
INSERT INTO `modulo` VALUES (5, 'Pedidos', 'Pedidos', 1);
INSERT INTO `modulo` VALUES (6, 'Caterogías', 'Caterogías Productos', 1);
INSERT INTO `modulo` VALUES (7, 'Suscriptores', 'Suscriptores del sitio web', 1);
INSERT INTO `modulo` VALUES (8, 'Contactos', 'Mensajes del formulario contacto', 1);
INSERT INTO `modulo` VALUES (9, 'Páginas', 'Páginas del sitio web', 1);

-- ----------------------------
-- Table structure for pedido
-- ----------------------------
DROP TABLE IF EXISTS `pedido`;
CREATE TABLE `pedido`  (
  `idpedido` bigint(20) NOT NULL AUTO_INCREMENT,
  `referenciacobro` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NULL DEFAULT NULL,
  `idtransaccionpaypal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NULL DEFAULT NULL,
  `datospaypal` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NULL,
  `personaid` bigint(20) NOT NULL,
  `usuarioid` bigint(20) NULL DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `costo_envio` decimal(10, 2) NOT NULL DEFAULT 0.00,
  `monto` decimal(11, 2) NOT NULL,
  `tipopagoid` bigint(20) NOT NULL,
  `direccion_envio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `referencia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NULL DEFAULT NULL,
  `contrasena` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NULL DEFAULT NULL,
  `patron` int(9) NULL DEFAULT NULL,
  `idtipopedido` bigint(20) NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idpedido`) USING BTREE,
  INDEX `personaid`(`personaid`) USING BTREE,
  INDEX `tipopagoid`(`tipopagoid`) USING BTREE,
  INDEX `pedido_ibfk_3`(`idtipopedido`) USING BTREE,
  INDEX `pedido_ibfk_4`(`usuarioid`) USING BTREE,
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`personaid`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`tipopagoid`) REFERENCES `tipopago` (`idtipopago`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pedido_ibfk_3` FOREIGN KEY (`idtipopedido`) REFERENCES `tipo_pedido` (`id_tip_pedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `pedido_ibfk_4` FOREIGN KEY (`usuarioid`) REFERENCES `usuarios` (`idusuarios`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pedido
-- ----------------------------
INSERT INTO `pedido` VALUES (1, '4561654687', NULL, NULL, 3, NULL, '2021-08-20 03:41:57', 50.00, 450.00, 3, 'Antigua Guatemala, Antigua Guatemala', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `pedido` VALUES (2, NULL, '8XD37465755620710', '{\"id\":\"4S6284553D668511R\",\"intent\":\"CAPTURE\",\"status\":\"COMPLETED\",\"purchase_units\":[{\"reference_id\":\"default\",\"amount\":{\"currency_code\":\"USD\",\"value\":\"350.00\"},\"payee\":{\"email_address\":\"sb-6z0da4580133@business.example.com\",\"merchant_id\":\"ULNZF7CTTE748\"},\"description\":\"Compra de artículos en Tienda Virtual por $350 \",\"soft_descriptor\":\"PAYPAL *JOHNDOESTES\",\"shipping\":{\"name\":{\"full_name\":\"John Doe\"},\"address\":{\"address_line_1\":\"Free Trade Zone\",\"admin_area_2\":\"Guatemala City\",\"admin_area_1\":\"Guatemala City\",\"postal_code\":\"01001\",\"country_code\":\"GT\"}},\"payments\":{\"captures\":[{\"id\":\"8XD37465755620710\",\"status\":\"COMPLETED\",\"amount\":{\"currency_code\":\"USD\",\"value\":\"350.00\"},\"final_capture\":true,\"seller_protection\":{\"status\":\"ELIGIBLE\",\"dispute_categories\":[\"ITEM_NOT_RECEIVED\",\"UNAUTHORIZED_TRANSACTION\"]},\"create_time\":\"2021-08-20T09:48:38Z\",\"update_time\":\"2021-08-20T09:48:38Z\"}]}}],\"payer\":{\"name\":{\"given_name\":\"John\",\"surname\":\"Doe\"},\"email_address\":\"sb-iimwo4579006@personal.example.com\",\"payer_id\":\"ZTA3QXTY5JS6Q\",\"address\":{\"country_code\":\"GT\"}},\"create_time\":\"2021-08-20T09:46:25Z\",\"update_time\":\"2021-08-20T09:48:38Z\",\"links\":[{\"href\":\"https://api.sandbox.paypal.com/v2/checkout/orders/4S6284553D668511R\",\"rel\":\"self\",\"method\":\"GET\"}]}', 3, NULL, '2021-08-20 03:48:39', 50.00, 350.00, 1, 'Guatemala, Guatemala', NULL, NULL, 0, NULL, NULL);

-- ----------------------------
-- Table structure for permisos
-- ----------------------------
DROP TABLE IF EXISTS `permisos`;
CREATE TABLE `permisos`  (
  `idpermiso` bigint(20) NOT NULL AUTO_INCREMENT,
  `rolid` bigint(20) NOT NULL,
  `moduloid` bigint(20) NOT NULL,
  `r` int(11) NOT NULL DEFAULT 0,
  `w` int(11) NOT NULL DEFAULT 0,
  `u` int(11) NOT NULL DEFAULT 0,
  `d` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idpermiso`) USING BTREE,
  INDEX `rolid`(`rolid`) USING BTREE,
  INDEX `moduloid`(`moduloid`) USING BTREE,
  CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`moduloid`) REFERENCES `modulo` (`idmodulo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permisos
-- ----------------------------
INSERT INTO `permisos` VALUES (3, 1, 1, 1, 1, 1, 1);
INSERT INTO `permisos` VALUES (4, 1, 2, 1, 1, 1, 1);
INSERT INTO `permisos` VALUES (5, 1, 3, 1, 1, 1, 1);
INSERT INTO `permisos` VALUES (6, 1, 4, 1, 1, 1, 1);
INSERT INTO `permisos` VALUES (7, 1, 5, 1, 1, 1, 1);
INSERT INTO `permisos` VALUES (8, 1, 6, 1, 1, 1, 1);
INSERT INTO `permisos` VALUES (9, 1, 7, 1, 1, 1, 1);
INSERT INTO `permisos` VALUES (10, 1, 8, 1, 1, 1, 1);
INSERT INTO `permisos` VALUES (11, 1, 9, 1, 1, 1, 1);
INSERT INTO `permisos` VALUES (12, 2, 1, 1, 1, 1, 1);
INSERT INTO `permisos` VALUES (13, 2, 2, 0, 0, 0, 0);
INSERT INTO `permisos` VALUES (14, 2, 3, 1, 1, 1, 0);
INSERT INTO `permisos` VALUES (15, 2, 4, 1, 1, 1, 0);
INSERT INTO `permisos` VALUES (16, 2, 5, 1, 1, 1, 0);
INSERT INTO `permisos` VALUES (17, 2, 6, 1, 1, 1, 0);
INSERT INTO `permisos` VALUES (18, 2, 7, 1, 0, 0, 0);
INSERT INTO `permisos` VALUES (19, 2, 8, 1, 0, 0, 0);
INSERT INTO `permisos` VALUES (20, 2, 9, 1, 1, 1, 1);
INSERT INTO `permisos` VALUES (21, 3, 1, 0, 0, 0, 0);
INSERT INTO `permisos` VALUES (22, 3, 2, 0, 0, 0, 0);
INSERT INTO `permisos` VALUES (23, 3, 3, 0, 0, 0, 0);
INSERT INTO `permisos` VALUES (24, 3, 4, 0, 0, 0, 0);
INSERT INTO `permisos` VALUES (25, 3, 5, 1, 0, 0, 0);
INSERT INTO `permisos` VALUES (26, 3, 6, 0, 0, 0, 0);
INSERT INTO `permisos` VALUES (27, 3, 7, 0, 0, 0, 0);
INSERT INTO `permisos` VALUES (28, 3, 8, 0, 0, 0, 0);
INSERT INTO `permisos` VALUES (29, 3, 9, 0, 0, 0, 0);
INSERT INTO `permisos` VALUES (30, 4, 1, 1, 0, 0, 0);
INSERT INTO `permisos` VALUES (31, 4, 2, 0, 0, 0, 0);
INSERT INTO `permisos` VALUES (32, 4, 3, 1, 1, 1, 0);
INSERT INTO `permisos` VALUES (33, 4, 4, 1, 0, 0, 0);
INSERT INTO `permisos` VALUES (34, 4, 5, 1, 0, 1, 0);
INSERT INTO `permisos` VALUES (35, 4, 6, 0, 0, 0, 0);
INSERT INTO `permisos` VALUES (36, 4, 7, 1, 0, 0, 0);
INSERT INTO `permisos` VALUES (37, 4, 8, 1, 0, 0, 0);
INSERT INTO `permisos` VALUES (38, 4, 9, 0, 0, 0, 0);

-- ----------------------------
-- Table structure for persona
-- ----------------------------
DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona`  (
  `idpersona` bigint(20) NOT NULL AUTO_INCREMENT,
  `identificacion` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NULL DEFAULT NULL,
  `nombres` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `apellidos` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `password` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `nit` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NULL DEFAULT NULL,
  `nombrefiscal` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NULL DEFAULT NULL,
  `direccionfiscal` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NULL DEFAULT NULL,
  `token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NULL DEFAULT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idpersona`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of persona
-- ----------------------------
INSERT INTO `persona` VALUES (1, '24091989', 'Abel', 'OSH', 123456, 'info@abelosh.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'CF', 'Abel OSH', 'Ciudad', NULL, '2021-08-20 01:34:15', 1);
INSERT INTO `persona` VALUES (2, '24091990', 'Alex', 'Arana', 456878977, 'alex@info.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', NULL, NULL, NULL, NULL, '2021-08-20 02:58:47', 1);
INSERT INTO `persona` VALUES (3, '84654864', 'Ricardo', 'Hernández Pérez', 4687987, 'hr@info.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '468798', 'Ricardo HP', 'Ciudad de Guatemala', NULL, '2021-08-20 03:41:28', 1);
INSERT INTO `persona` VALUES (4, '798465877', 'Fernando', 'Guerra', 468498, 'fer@info.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', NULL, NULL, NULL, NULL, '2021-08-21 18:07:00', 1);
INSERT INTO `persona` VALUES (5, NULL, 'Arhyel P', 'Ramos', 235235, 'a@info.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, '2023-04-26 19:41:39', 1);

-- ----------------------------
-- Table structure for post
-- ----------------------------
DROP TABLE IF EXISTS `post`;
CREATE TABLE `post`  (
  `idpost` bigint(20) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `contenido` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `portada` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NULL DEFAULT NULL,
  `datecreate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ruta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `usario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idpost`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of post
-- ----------------------------
INSERT INTO `post` VALUES (1, 'Inicio', '<div class=\"p-t-80\"> <h3 class=\"ltext-103 cl5\">Nuestras marcas</h3> </div> <div> <p>Trabajamos con las mejores marcas del mundo ...</p> </div> <div class=\"row\"> <div class=\"col-md-3\"><img src=\"Assets/images/m1.png\" alt=\"Marca 1\" width=\"110\" height=\"110\" /></div> <div class=\"col-md-3\"><img src=\"Assets/images/m2.png\" alt=\"Marca 2\" /></div> <div class=\"col-md-3\"><img src=\"Assets/images/m3.png\" alt=\"Marca 3\" /></div> <div class=\"col-md-3\"><img src=\"Assets/images/m4.png\" alt=\"Marca 4\" /></div> </div>', '', '2021-07-20 02:40:15', 'inicio', 1, NULL);
INSERT INTO `post` VALUES (2, 'Tienda', '<p>Contenido p&aacute;gina!</p>', '', '2021-08-06 01:21:27', 'tienda', 1, NULL);
INSERT INTO `post` VALUES (3, 'Carrito', '<p>Contenido p&aacute;gina!</p>', '', '2021-08-06 01:21:52', 'carrito', 1, NULL);
INSERT INTO `post` VALUES (4, 'Nosotros', '<section class=\"bg0 p-t-75 p-b-120\"> <div class=\"container\"> <div class=\"row p-b-148\"> <div class=\"col-md-7 col-lg-8\"> <div class=\"p-t-7 p-r-85 p-r-15-lg p-r-0-md\"> <h3 class=\"mtext-111 cl2 p-b-16\">Historia</h3> <p class=\"stext-113 cl6 p-b-26\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat consequat enim, non auctor massa ultrices non. Morbi sed odio massa. Quisque at vehicula tellus, sed tincidunt augue. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius egestas diam, eu sodales metus scelerisque congue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas gravida justo eu arcu egestas convallis. Nullam eu erat bibendum, tempus ipsum eget, dictum enim. Donec non neque ut enim dapibus tincidunt vitae nec augue. Suspendisse potenti. Proin ut est diam. Donec condimentum euismod tortor, eget facilisis diam faucibus et. Morbi a tempor elit.</p> <p class=\"stext-113 cl6 p-b-26\">Donec gravida lorem elit, quis condimentum ex semper sit amet. Fusce eget ligula magna. Aliquam aliquam imperdiet sodales. Ut fringilla turpis in vehicula vehicula. Pellentesque congue ac orci ut gravida. Aliquam erat volutpat. Donec iaculis lectus a arcu facilisis, eu sodales lectus sagittis. Etiam pellentesque, magna vel dictum rutrum, neque justo eleifend elit, vel tincidunt erat arcu ut sem. Sed rutrum, turpis ut commodo efficitur, quam velit convallis ipsum, et maximus enim ligula ac ligula.</p> <p class=\"stext-113 cl6 p-b-26\">Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879</p> </div> </div> <div class=\"col-11 col-md-5 col-lg-4 m-lr-auto\"> <div class=\"how-bor1 \"> <div class=\"hov-img0\"><img src=\"https://cdn.pixabay.com/photo/2015/07/17/22/43/student-849825_1280.jpg\" alt=\"IMG\" width=\"500\" height=\"333\" /></div> </div> </div> </div> <div class=\"row\"> <div class=\"order-md-2 col-md-7 col-lg-8 p-b-30\"> <div class=\"p-t-7 p-l-85 p-l-15-lg p-l-0-md\"> <h2 class=\"mtext-111 cl2 p-b-16\"><span style=\"color: #236fa1;\">Nuestra Misi&oacute;n</span></h2> <p class=\"stext-113 cl6 p-b-26\">Mauris non lacinia magna. Sed nec lobortis dolor. Vestibulum rhoncus dignissim risus, sed consectetur erat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam maximus mauris sit amet odio convallis, in pharetra magna gravida. Praesent sed nunc fermentum mi molestie tempor. Morbi vitae viverra odio. Pellentesque ac velit egestas, luctus arcu non, laoreet mauris. Sed in ipsum tempor, consequat odio in, porttitor ante. Ut mauris ligula, volutpat in sodales in, porta non odio. Pellentesque tempor urna vitae mi vestibulum, nec venenatis nulla lobortis. Proin at gravida ante. Mauris auctor purus at lacus maximus euismod. Pellentesque vulputate massa ut nisl hendrerit, eget elementum libero iaculis.</p> <div class=\"bor16 p-l-29 p-b-9 m-t-22\"> <p class=\"stext-114 cl6 p-r-40 p-b-11\">Creativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didn\'t really do it, they just saw something. It seemed obvious to them after a while.</p> <span class=\"stext-111 cl8\"> - Steve Job&rsquo;s </span></div> </div> </div> <div class=\"order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30\"> <div class=\"how-bor2\"> <div class=\"hov-img0\"><img src=\"https://cdn.pixabay.com/photo/2015/07/17/22/43/student-849822_1280.jpg\" alt=\"IMG\" width=\"500\" height=\"333\" /></div> </div> </div> </div> </div> </section>', 'img_2f644b056a9fd3624c7595d24b1d9273.jpg', '2021-08-09 03:09:44', 'nosotros', 1, NULL);
INSERT INTO `post` VALUES (5, 'Contacto', '<div class=\"map\"><iframe style=\"border: 0;\" src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.685802352331!2d-90.73646108521129!3d14.559951589828378!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85890e74b3771e19%3A0x68ec9eeea79fd9a7!2sEl%20Arco%20de%20Santa%20Catalina!5e0!3m2!1ses!2sgt!4v1624005005655!5m2!1ses!2sgt\" width=\"100%\" height=\"600\" allowfullscreen=\"allowfullscreen\" loading=\"lazy\"></iframe></div>', 'img_3024f13dc010ffab8c22da05ac6a32b9.jpg', '2021-08-09 03:11:08', 'contacto', 1, NULL);
INSERT INTO `post` VALUES (6, 'Preguntas frecuentes', '<ol> <li><strong>&iquest;Cu&aacute;l es el tiempo de entrega de los producto? </strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis sunt, corrupti hic aspernatur cumque alias, ipsam omnis iure ipsum, nostrum labore obcaecati natus repellendus consequatur est nemo sapiente dolorem dicta. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi, voluptas, consectetur iusto delectus quaerat ullam nesciunt! Quae doloribus deserunt qui fugit illo nobis ipsum, accusamus eius perferendis beatae culpa molestias!</li> <li><strong>&iquest;C&oacute;mo es la forma de env&iacute;o de los productos?</strong> Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis sunt, corrupti hic aspernatur cumque alias, ipsam omnis iure ipsum, nostrum labore obcaecati natus repellendus consequatur est nemo sapiente dolorem dicta. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi, voluptas, consectetur.</li> <li><strong>&iquest;Cu&aacute;l es el tiempo m&aacute;ximo para solicitar un reembolso?</strong> Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis sunt, corrupti hic aspernatur cumque alias, ipsam omnis iure ipsum, nostrum labore obcaecati natus repellendus consequatur est nemo sapiente dolorem dicta. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi, voluptas, consectetur iusto delectus quaerat ullam nesciunt!</li> </ol> <p>&nbsp;</p> <p>Otras preguntas</p> <ul> <li><strong>&iquest;Qu&eacute; formas de pago aceptan? </strong><span style=\"color: #666666; font-family: Arial, sans-serif; font-size: 15px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Corrupti hic aspernatur cumque alias, ipsam omnis iure ipsum, nostrum labore obcaecati natus repellendus consequatur est nemo sapiente dolorem dicta. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi, voluptas, consectetur iusto delectus quaerat ullam nesciunt! Quae doloribus deserunt qui fugit illo nobis ipsum, accusamus eius perferendis beatae culpa molestias!</span></li> </ul>', '', '2021-08-11 01:24:19', 'preguntas-frecuentes', 1, NULL);
INSERT INTO `post` VALUES (7, 'Términos y Condiciones', '<p>A continuaci&oacute;n se describen los t&eacute;rmino y condiciones de la Tienda Virtual!</p> <ol> <li>Pol&iacute;tica uno</li> <li>Termino dos</li> <li>Condici&oacute;n tres</li> </ol> <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis sunt, corrupti hic aspernatur cumque alias, ipsam omnis iure ipsum, nostrum labore obcaecati natus repellendus consequatur est nemo sapiente dolorem dicta. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi, voluptas, consectetur iusto delectus quaerat ullam nesciunt! Quae doloribus deserunt qui fugit illo nobis ipsum, accusamus eius perferendis beatae culpa molestias!</p>', '', '2021-08-11 01:51:06', 'terminos-y-condiciones', 1, NULL);
INSERT INTO `post` VALUES (8, 'Sucursales', '<section class=\"py-5 text-center\"> <div class=\"container\"> <p>Visitanos y obten los mejores precios del mercado, cualquier art&iacute;culo que necestas para vivir mejor</p> <a class=\"btn btn-info\" href=\"../../tienda_virtual/tienda\">VER PRODUCTOS</a></div> </section> <div class=\"py-5 bg-light\"> <div class=\"container\"> <div class=\"row\"> <div class=\"col-md-4\"> <div class=\"card mb-4 box-shadow hov-img0\"><img src=\"https://abelosh.com/tienda_virtual/Assets/images/s1.jpg\" alt=\"Tienda Uno\" width=\"100%\" height=\"100%\" /> <div class=\"card-body\"> <p class=\"card-text\">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat necessitatibus eligendi, soluta ipsa natus, at earum qui enim, illum doloremque, accusantium autem nemo est esse nulla neque eaque repellendus amet.</p> <p>Direcci&oacute;n: Antigua Gautemala <br />Tel&eacute;fono: 4654645 <br />Correo: info@abelosh.com</p> </div> </div> </div> <div class=\"col-md-4\"> <div class=\"card mb-4 box-shadow hov-img0\"><img src=\"https://abelosh.com/tienda_virtual/Assets/images/s2.jpg\" alt=\"Sucural dos\" width=\"100%\" height=\"100%\" /> <div class=\"card-body\"> <p class=\"card-text\">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat necessitatibus eligendi, soluta ipsa natus, at earum qui enim, illum doloremque, accusantium autem nemo est esse nulla neque eaque repellendus amet.</p> <p>Direcci&oacute;n: Antigua Gautemala <br />Tel&eacute;fono: 4654645 <br />Correo: info@abelosh.com</p> </div> </div> </div> <div class=\"col-md-4\"> <div class=\"card mb-4 box-shadow hov-img0\"><img src=\"https://abelosh.com/tienda_virtual/Assets/images/s3.jpg\" alt=\"Sucural tres\" width=\"100%\" height=\"100%\" /> <div class=\"card-body\"> <p class=\"card-text\">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat necessitatibus eligendi, soluta ipsa natus, at earum qui enim, illum doloremque, accusantium autem nemo est esse nulla neque eaque repellendus amet.</p> <p>Direcci&oacute;n: Antigua Gautemala <br />Tel&eacute;fono: 4654645 <br />Correo: info@abelosh.com</p> </div> </div> </div> </div> </div> </div>', 'img_d72cb5712933863e051dc9c7fac5e253.jpg', '2021-08-11 02:26:45', 'sucursales', 1, NULL);
INSERT INTO `post` VALUES (9, 'Not Found', '<h1>Error 404: P&aacute;gina no encontrada</h1> <p>No se encuentra la p&aacute;gina que ha solicitado.</p>', '', '2021-08-12 02:30:49', 'not-found', 1, NULL);

-- ----------------------------
-- Table structure for producto
-- ----------------------------
DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto`  (
  `idproducto` bigint(20) NOT NULL AUTO_INCREMENT,
  `categoriaid` bigint(20) NOT NULL,
  `codigo` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `precio` decimal(11, 2) NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NULL DEFAULT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idproducto`) USING BTREE,
  INDEX `categoriaid`(`categoriaid`) USING BTREE,
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`categoriaid`) REFERENCES `categoria` (`idcategoria`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of producto
-- ----------------------------
INSERT INTO `producto` VALUES (1, 1, '2417984565', 'Chaqueta Azul', '<p><strong style=\"margin: 0px; padding: 0px; color: #000000; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Lorem Ipsum</strong><span style=\"color: #000000; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span></p>', 100.00, 50, NULL, '2021-08-20 03:12:14', 1);
INSERT INTO `producto` VALUES (2, 1, '456879878', 'Reloj', '<p><strong style=\"margin: 0px; padding: 0px; color: #000000; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Lorem Ipsum</strong><span style=\"color: #000000; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span></p>', 200.00, 100, NULL, '2021-08-20 03:14:10', 1);
INSERT INTO `producto` VALUES (3, 2, '4658798787', 'Bocina JBL Flip 5', '<p>Wireless Bluetooth streaming. 24 hours of playtime. IPX7 waterproof. JBL Connect plus. High-capacity battery. Connector type: 3.5 millimeter stereo. Power Source Type: Battery Powered.</p>', 300.00, 100, NULL, '2021-08-21 00:48:21', 1);

-- ----------------------------
-- Table structure for reembolso
-- ----------------------------
DROP TABLE IF EXISTS `reembolso`;
CREATE TABLE `reembolso`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pedidoid` bigint(20) NOT NULL,
  `idtransaccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `datosreembolso` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `observacion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pedidoid`(`pedidoid`) USING BTREE,
  CONSTRAINT `reembolso_ibfk_1` FOREIGN KEY (`pedidoid`) REFERENCES `pedido` (`idpedido`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of reembolso
-- ----------------------------

-- ----------------------------
-- Table structure for rol
-- ----------------------------
DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol`  (
  `idrol` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombrerol` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idrol`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rol
-- ----------------------------
INSERT INTO `rol` VALUES (1, 'Administrador', 'Acceso a todo el sistema', 1);
INSERT INTO `rol` VALUES (2, 'Técnico', 'Técnico reparador', 1);
INSERT INTO `rol` VALUES (3, 'Cliente', 'Clientes en general', 1);
INSERT INTO `rol` VALUES (4, 'Vendedor', 'Operador de tienda', 1);

-- ----------------------------
-- Table structure for seguimiento
-- ----------------------------
DROP TABLE IF EXISTS `seguimiento`;
CREATE TABLE `seguimiento`  (
  `id_seguimiento` int(11) NOT NULL,
  `idpedido` bigint(20) NULL DEFAULT NULL,
  `estado` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `datecreated` datetime NULL DEFAULT NULL,
  `observacion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `usuario` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_seguimiento`) USING BTREE,
  INDEX `fk_seg_ped`(`idpedido`) USING BTREE,
  INDEX `id_seguimiento`(`id_seguimiento`) USING BTREE,
  CONSTRAINT `fk_seg_ped` FOREIGN KEY (`idpedido`) REFERENCES `pedido` (`idpedido`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of seguimiento
-- ----------------------------
INSERT INTO `seguimiento` VALUES (1, 2, '1', NULL, 'solito tal ', 'cliente');
INSERT INTO `seguimiento` VALUES (2, 2, '2', NULL, '', 'ARHYEL');
INSERT INTO `seguimiento` VALUES (3, 2, '3', NULL, NULL, 'arhyel');
INSERT INTO `seguimiento` VALUES (4, 2, '', NULL, NULL, 'joel');
INSERT INTO `seguimiento` VALUES (5, 1, '', NULL, NULL, 'dueno');
INSERT INTO `seguimiento` VALUES (6, 2, '', NULL, NULL, 'pepito');

-- ----------------------------
-- Table structure for suscripciones
-- ----------------------------
DROP TABLE IF EXISTS `suscripciones`;
CREATE TABLE `suscripciones`  (
  `idsuscripcion` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idsuscripcion`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of suscripciones
-- ----------------------------
INSERT INTO `suscripciones` VALUES (1, 'Roberto', 'toolsfordeveloper@gmail.com', '2021-08-20 04:05:10');

-- ----------------------------
-- Table structure for tipo_pedido
-- ----------------------------
DROP TABLE IF EXISTS `tipo_pedido`;
CREATE TABLE `tipo_pedido`  (
  `id_tip_pedido` bigint(20) NOT NULL,
  `nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `descripcion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `observaciones` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_tip_pedido`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipo_pedido
-- ----------------------------

-- ----------------------------
-- Table structure for tipopago
-- ----------------------------
DROP TABLE IF EXISTS `tipopago`;
CREATE TABLE `tipopago`  (
  `idtipopago` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipopago` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idtipopago`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipopago
-- ----------------------------
INSERT INTO `tipopago` VALUES (1, 'PayPal', 1);
INSERT INTO `tipopago` VALUES (2, 'Efectivo', 1);
INSERT INTO `tipopago` VALUES (3, 'Tarjeta', 1);
INSERT INTO `tipopago` VALUES (4, 'Cheque', 1);
INSERT INTO `tipopago` VALUES (5, 'Despósito Bancario', 1);

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `idusuarios` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `apellidos` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telefono` int(11) NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rut` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `datecrated` datetime NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rolid` bigint(20) NULL DEFAULT NULL,
  PRIMARY KEY (`idusuarios`) USING BTREE,
  INDEX `fk_usu_rol`(`rolid`) USING BTREE,
  CONSTRAINT `fk_usu_rol` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (1, 'Arhyel', 'Ramos', NULL, 'arhyel.860@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, 1);
INSERT INTO `usuarios` VALUES (2, 'Joel Santos', 'Gomez Alanoca', NULL, 'joelgo@gmail.com', '$2y$10$Rlx.PkosbFDUMgWFgMUhn.SMhCkm51WHikIXbhGekTvFw3e7OHRgi', NULL, NULL, NULL, NULL, 2);

SET FOREIGN_KEY_CHECKS = 1;
