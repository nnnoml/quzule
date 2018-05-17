/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50721
Source Host           : localhost:3306
Source Database       : quzule

Target Server Type    : MYSQL
Target Server Version : 50721
File Encoding         : 65001

Date: 2018-05-17 16:56:46
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_menu
-- ----------------------------
INSERT INTO `admin_menu` VALUES ('1', '首页', 'main', '2018-05-10 09:56:05');
INSERT INTO `admin_menu` VALUES ('2', '商品分类管理', 'itemClass', '2018-05-15 09:36:18');
INSERT INTO `admin_menu` VALUES ('3', '商品管理', 'item', '2018-05-10 09:56:59');
INSERT INTO `admin_menu` VALUES ('4', '单页管理', 'page', '2018-05-10 10:27:43');
INSERT INTO `admin_menu` VALUES ('5', '资料审核', 'apply', '2018-05-16 16:40:02');
INSERT INTO `admin_menu` VALUES ('6', '注册用户', 'indexUser', '2018-05-17 16:30:12');

-- ----------------------------
-- Table structure for `admin_role_users`
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_users`;
CREATE TABLE `admin_role_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `menu_id` int(11) NOT NULL DEFAULT '0' COMMENT '菜单id,-1为所有菜单',
  `menu_auth` int(11) NOT NULL DEFAULT '0' COMMENT '菜单权限 二进制 1创建 2更新 4读取 8删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_role_users
-- ----------------------------
INSERT INTO `admin_role_users` VALUES ('1', '1', '-1', '15');
INSERT INTO `admin_role_users` VALUES ('2', '2', '5', '15');
INSERT INTO `admin_role_users` VALUES ('3', '2', '1', '15');

-- ----------------------------
-- Table structure for `admin_users`
-- ----------------------------
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_users
-- ----------------------------
INSERT INTO `admin_users` VALUES ('1', 'a', '$2y$10$2m17CIiN6q0E101Ke1qN9u7AjblWzqFHEf6iIP3KehCrw4jP9mc9e');
INSERT INTO `admin_users` VALUES ('2', 't', '$2y$10$2m17CIiN6q0E101Ke1qN9u7AjblWzqFHEf6iIP3KehCrw4jP9mc9e');

-- ----------------------------
-- Table structure for `index_apply`
-- ----------------------------
DROP TABLE IF EXISTS `index_apply`;
CREATE TABLE `index_apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '上传用户id',
  `comp_name` varchar(255) NOT NULL COMMENT '企业名称',
  `comp_reg_num` varchar(255) NOT NULL COMMENT '工商执照注册号',
  `comp_reg_time` timestamp NOT NULL COMMENT '注册时间',
  `license` varchar(255) NOT NULL COMMENT '营业执照 url',
  `legal_person_name` varchar(255) NOT NULL COMMENT '法人名称',
  `legal_person_id` int(18) NOT NULL COMMENT '法人身份证',
  `legal_person_card_front` varchar(255) NOT NULL COMMENT '法人正面照 url',
  `legal_person_card_back` varchar(255) NOT NULL COMMENT '法人背面照 url',
  `area_img` text NOT NULL COMMENT '经营场地图片',
  `check_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '审核状态 默认0 1通过 2驳回',
  `check_user_id` int(11) NOT NULL COMMENT '审核人',
  `checked_at` timestamp NULL DEFAULT NULL COMMENT '审核日期',
  `created_at` timestamp NOT NULL COMMENT '提交时间',
  `updated_at` timestamp NOT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of index_apply
-- ----------------------------
INSERT INTO `index_apply` VALUES ('1', '1', '1', '1', '2018-05-10 00:00:00', '/upload/apply/20180516/l6IaiO2PdP0cm2uQFjQEr1eSPmF90L2AUuqzFaRv.jpeg,', '1', '1', '/upload/apply/20180516/KJ8oFFzbz9xPvxkqKsnXS3clDJrNZSQAfJi31P9s.jpeg,', '/upload/apply/20180516/vlhYic1KfzXq6XiYQ736HARIU1BoB26jVB3VKcaM.jpeg,', '/upload/apply/20180516/PjhfXZtpSXu3AdeYrNc5jY5FeZecVzgyTrZlrE8e.png,/upload/apply/20180516/h7sQ9ijHtGWuKaxyGpgEkv0wlRxPKKREojhodpqR.png,', '2', '0', '2018-05-16 08:23:38', '2018-05-16 08:23:38', '2018-05-16 10:25:46');
INSERT INTO `index_apply` VALUES ('2', '1', '1', '1', '2018-05-10 00:00:00', '/upload/apply/20180516/l6IaiO2PdP0cm2uQFjQEr1eSPmF90L2AUuqzFaRv.jpeg', '1', '1', '/upload/apply/20180516/KJ8oFFzbz9xPvxkqKsnXS3clDJrNZSQAfJi31P9s.jpeg', '/upload/apply/20180516/vlhYic1KfzXq6XiYQ736HARIU1BoB26jVB3VKcaM.jpeg', '/upload/apply/20180516/PjhfXZtpSXu3AdeYrNc5jY5FeZecVzgyTrZlrE8e.png,/upload/apply/20180516/h7sQ9ijHtGWuKaxyGpgEkv0wlRxPKKREojhodpqR.png', '1', '0', '2018-05-16 08:24:33', '2018-05-16 08:24:33', '2018-05-16 10:36:54');
INSERT INTO `index_apply` VALUES ('3', '1', '2', '2', '2018-05-04 00:00:00', '/upload/apply/20180516/rQIcUVoyYJWc0lYLxPlidET7mwW3QzeshKfyWgT4.jpeg', '2', '2', '/upload/apply/20180516/liZxdfX422XD4gdTviBvT74DEqjb5PT2gCNNWCr5.jpeg', '/upload/apply/20180516/FCfcyESZQUP8jAuJNnYiRxmHsavOVb7HowayXBde.jpeg', '/upload/apply/20180516/dBzYVq9xkRihnYM6IUsXzo9C3FsfXyE6CoHjfwmA.png', '1', '1', '2018-05-16 10:43:58', '2018-05-16 10:43:31', '2018-05-16 10:43:58');

-- ----------------------------
-- Table structure for `index_users`
-- ----------------------------
DROP TABLE IF EXISTS `index_users`;
CREATE TABLE `index_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of index_users
-- ----------------------------
INSERT INTO `index_users` VALUES ('1', 'user', '$2y$10$2m17CIiN6q0E101Ke1qN9u7AjblWzqFHEf6iIP3KehCrw4jP9mc9e', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `item_class`
-- ----------------------------
DROP TABLE IF EXISTS `item_class`;
CREATE TABLE `item_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0',
  `class_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of item_class
-- ----------------------------
INSERT INTO `item_class` VALUES ('1', '0', '手机');
INSERT INTO `item_class` VALUES ('3', '1', 'iphone');
INSERT INTO `item_class` VALUES ('15', '0', '电脑');
INSERT INTO `item_class` VALUES ('16', '15', '台式机');

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
INSERT INTO `item_imgs` VALUES ('7', '/upload/itemImg/20180517/6h3pwAlaHWPOQ0RMAYbQZPHzUSXo3T4cMOw72rEH.png');
INSERT INTO `item_imgs` VALUES ('8', '/upload/itemImg/20180517/xPesF4uiqmm2bT91PEg8llW7dDvNVWeF9avUX9qK.jpeg');
INSERT INTO `item_imgs` VALUES ('8', '/upload/itemImg/20180517/Gf1vSsuxFGsfNvBvUeliXwrdqPAfFA44tJXDiiEM.jpeg');
INSERT INTO `item_imgs` VALUES ('8', '/upload/itemImg/20180517/uUPMn9hQnozY8fygmN5jRwrkrNyr1qADNTkf2206.png');

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
  `item_avatar` varchar(255) DEFAULT NULL COMMENT '封面图片',
  `item_detail` text COMMENT '项目详情',
  `item_parame` text COMMENT '项目参数',
  `is_show` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否上架 默认0不上架',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of item_lists
-- ----------------------------
INSERT INTO `item_lists` VALUES ('1', '名称21', '0', '10', '2', '', '<p>1</p>', '<p>22</p>', '1', '2018-05-11 03:24:26', '2018-05-11 08:23:26');
INSERT INTO `item_lists` VALUES ('2', '名称', '0', '10', '2', '', '<p>1</p>', '<p>22</p>', '1', '2018-05-11 03:26:28', '2018-05-11 03:26:28');
INSERT INTO `item_lists` VALUES ('4', '1', '0', '2', '23', '', null, null, '0', '2018-05-11 03:27:52', '2018-05-11 03:27:52');
INSERT INTO `item_lists` VALUES ('5', '1', '0', '2', '23', '', null, null, '0', '2018-05-11 03:31:00', '2018-05-11 03:31:00');
INSERT INTO `item_lists` VALUES ('6', '新建商品', '3', '123', '123', null, null, null, '1', '2018-05-15 03:48:56', '2018-05-17 15:06:57');
INSERT INTO `item_lists` VALUES ('7', '123', '16', '1', '1', '/upload/itemImg/20180517/7oaHMKMhnGhE2jAu4WGQhLRedNNUCqUweZhQOpvb.jpeg', '<p>13</p>', '<p>2</p>', '1', '2018-05-17 12:25:51', '2018-05-17 14:55:02');
INSERT INTO `item_lists` VALUES ('8', '台式机', '16', '80', '8', '/upload/itemImg/20180517/DxTGH1CHIn8FsN2FGule1bMhFnLKhKerQGZ0fHve.jpeg', '<p>22</p>', '<p>33</p>', '1', '2018-05-17 14:59:14', '2018-05-17 14:59:14');

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
INSERT INTO `page_lists` VALUES ('1', '租赁规则', '<p>\n    <span>选择机型：在“全部宝贝”页面选择您所需的机型，点击进入可查看并选择机器详细配置。选择好机型配置后，点击“我要免押金租赁”即可。</span>\n</p>\n<p>\n    <span><br/></span>\n</p>\n<p>\n    <span>申请免押金额度：目前租葛亮都是免押金的（在租葛亮网站-认证内提交企业营业执照、法人身份证正反面照片）。</span>\n</p>\n<p>\n    <span><br/></span>\n</p>\n<p>\n    <span>提交订单：系统将根据您选择的机型及免押金额度自动生成订单，请确认机型配置、金额、配送地址，并选择支付方式，即可提交订单。</span>\n</p>\n<p>\n    <span><br/></span>\n</p>\n<p>\n    <span>支付首期租金：通过支付宝在线支付方式支付首期租金。</span>\n</p>\n<p>\n    <span><br/></span>\n</p>\n<p>\n    <span>示例说明：</span>\n</p>\n<p>\n    <span><img src=\"http://qzl.com/upload/itemContent/20180517/6cOPcoqZSG711J1oLthJM60uCdMTYTJjoJLSZ0Hp.jpeg\"/></span>\n</p>\n<p>\n    <span>例如您0630下单并完成支付，起租日从您收到机器当天开始计算，如0702收到机器，那么0630当天支付的租金则为0702-0801期间的租金[即7月份账单下单时已支付]，后续在0715会出账单并短信提醒您支付0802-0901当期租金系统将在付款日自动从您的账户余额中扣除每月租金，请保证账户余额充足。若您的账户余额不足，系统将提前3天发送短信提醒您充值。扣款成功（或失败）后，系统也将发送扣款结果通知短信</span>\n</p>\n<p>\n    <br/>\n</p>', '2018-05-17 02:15:01', '2018-05-17 10:54:04');
INSERT INTO `page_lists` VALUES ('2', '关于我们', '<p>123</p>', '2018-05-17 10:56:07', '2018-05-17 10:56:07');
