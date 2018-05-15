/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50721
Source Host           : localhost:3306
Source Database       : quzule

Target Server Type    : MYSQL
Target Server Version : 50721
File Encoding         : 65001

Date: 2018-05-15 19:06:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin_menu`
-- ----------------------------
DROP TABLE IF EXISTS `admin_menu`;
CREATE TABLE `admin_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) NOT NULL COMMENT '菜单名称',
  `menu_url` text NOT NULL COMMENT '菜单调用路径',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_menu
-- ----------------------------
INSERT INTO `admin_menu` VALUES ('1', '首页', 'main', '2018-05-10 09:56:05');
INSERT INTO `admin_menu` VALUES ('2', '商品分类管理', 'itemClass', '2018-05-15 09:36:18');
INSERT INTO `admin_menu` VALUES ('3', '商品管理', 'item', '2018-05-10 09:56:59');
INSERT INTO `admin_menu` VALUES ('4', '单页管理', 'page', '2018-05-10 10:27:43');

-- ----------------------------
-- Table structure for `admin_role_users`
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_users`;
CREATE TABLE `admin_role_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_name` varchar(255) NOT NULL COMMENT '角色名称',
  `menu_id` int(11) NOT NULL DEFAULT '0' COMMENT '菜单id,-1为所有菜单',
  `menu_auth` int(11) NOT NULL DEFAULT '0' COMMENT '菜单权限 二进制 1创建 2更新 4读取 8删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_role_users
-- ----------------------------
INSERT INTO `admin_role_users` VALUES ('1', '1', '超级管理员', '-1', '15');

-- ----------------------------
-- Table structure for `admin_users`
-- ----------------------------
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_users
-- ----------------------------
INSERT INTO `admin_users` VALUES ('1', 'a', '$2y$10$2m17CIiN6q0E101Ke1qN9u7AjblWzqFHEf6iIP3KehCrw4jP9mc9e');

-- ----------------------------
-- Table structure for `index_users`
-- ----------------------------
DROP TABLE IF EXISTS `index_users`;
CREATE TABLE `index_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of index_users
-- ----------------------------
INSERT INTO `index_users` VALUES ('1', 'user', '$2y$10$2m17CIiN6q0E101Ke1qN9u7AjblWzqFHEf6iIP3KehCrw4jP9mc9e');

-- ----------------------------
-- Table structure for `item_class`
-- ----------------------------
DROP TABLE IF EXISTS `item_class`;
CREATE TABLE `item_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0',
  `class_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of item_class
-- ----------------------------
INSERT INTO `item_class` VALUES ('1', '0', '1232');
INSERT INTO `item_class` VALUES ('3', '1', '在的');

-- ----------------------------
-- Table structure for `item_imgs`
-- ----------------------------
DROP TABLE IF EXISTS `item_imgs`;
CREATE TABLE `item_imgs` (
  `item_id` int(11) NOT NULL COMMENT '项目名称',
  `img_url` text NOT NULL COMMENT '图片路径'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of item_imgs
-- ----------------------------
INSERT INTO `item_imgs` VALUES ('2', '/upload/itemImg/20180511/9OkqqUUZzYJ8JqpM3llzCRJqkYbXLgXLWbkZ6sf1.jpeg');
INSERT INTO `item_imgs` VALUES ('2', '/upload/itemImg/20180511/6cT3ENy6dEWhlR1yVvhObXybTcIUILBW9LcCJFkU.jpeg');
INSERT INTO `item_imgs` VALUES ('2', '/upload/itemImg/20180511/9FrGWkcibeQe3updXhJ43GuVGpEKHoc4Ax6XDYKv.jpeg');
INSERT INTO `item_imgs` VALUES ('1', '/upload/itemImg/20180511/9OkqqUUZzYJ8JqpM3llzCRJqkYbXLgXLWbkZ6sf1.jpeg');
INSERT INTO `item_imgs` VALUES ('1', '/upload/itemImg/20180511/6cT3ENy6dEWhlR1yVvhObXybTcIUILBW9LcCJFkU.jpeg');
INSERT INTO `item_imgs` VALUES ('1', '/upload/itemImg/20180511/9FrGWkcibeQe3updXhJ43GuVGpEKHoc4Ax6XDYKv.jpeg');

-- ----------------------------
-- Table structure for `item_lists`
-- ----------------------------
DROP TABLE IF EXISTS `item_lists`;
CREATE TABLE `item_lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) NOT NULL COMMENT '项目名称',
  `item_class` int(11) NOT NULL DEFAULT '0' COMMENT '项目类型',
  `item_price` int(11) NOT NULL DEFAULT '0' COMMENT '项目价格',
  `item_rent_price` int(11) NOT NULL DEFAULT '0' COMMENT '项目租赁价格/月',
  `item_detail` text COMMENT '项目详情',
  `item_parame` text COMMENT '项目参数',
  `is_show` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否上架 默认0不上架',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of item_lists
-- ----------------------------
INSERT INTO `item_lists` VALUES ('1', '名称21', '0', '10', '2', '<p>1</p>', '<p>22</p>', '1', '2018-05-11 03:24:26', '2018-05-11 08:23:26');
INSERT INTO `item_lists` VALUES ('2', '名称', '0', '10', '2', '<p>1</p>', '<p>22</p>', '1', '2018-05-11 03:26:28', '2018-05-11 03:26:28');
INSERT INTO `item_lists` VALUES ('4', '1', '0', '2', '23', null, null, '0', '2018-05-11 03:27:52', '2018-05-11 03:27:52');
INSERT INTO `item_lists` VALUES ('5', '1', '0', '2', '23', null, null, '0', '2018-05-11 03:31:00', '2018-05-11 03:31:00');
INSERT INTO `item_lists` VALUES ('6', '新建商品', '1', '123', '123', null, null, '1', '2018-05-15 03:48:56', '2018-05-15 04:08:55');

-- ----------------------------
-- Table structure for `item_sku`
-- ----------------------------
DROP TABLE IF EXISTS `item_sku`;
CREATE TABLE `item_sku` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of item_sku
-- ----------------------------

-- ----------------------------
-- Table structure for `page_lists`
-- ----------------------------
DROP TABLE IF EXISTS `page_lists`;
CREATE TABLE `page_lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) NOT NULL COMMENT '单页名称',
  `page_detail` text NOT NULL COMMENT '单页内容',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of page_lists
-- ----------------------------
INSERT INTO `page_lists` VALUES ('2', '123', '<p>123<strong>123<img src=\"http://qzl.com/upload/itemContent/20180514/asNBeoHYgPS4tl60PysQPhQrrmB5pSvG23HmvZ1Y.jpeg\" style=\"width: 255px; height: 121px;\"/></strong></p>', '2018-05-14 01:40:17', '2018-05-14 01:40:17');
