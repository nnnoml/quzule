/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50721
Source Host           : localhost:3306
Source Database       : quzule

Target Server Type    : MYSQL
Target Server Version : 50721
File Encoding         : 65001

Date: 2018-05-31 20:52:56
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_role_users
-- ----------------------------
INSERT INTO `admin_role_users` VALUES ('1', '1', '-1', '15');

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
INSERT INTO `admin_users` VALUES ('1', 'admin', '$2y$10$AWhJLQ4hJgOKgQQBwCB8eeDONbiFSb.LLLUbjyfo9HxxwaTcf/k.O');

-- ----------------------------
-- Table structure for `index_apply`
-- ----------------------------
DROP TABLE IF EXISTS `index_apply`;
CREATE TABLE `index_apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '上传用户id',
  `license` varchar(255) NOT NULL COMMENT '营业执照 url',
  `wenhua_input` text COMMENT '文化许可证',
  `xiaofang_input` text COMMENT '消防合格证',
  `kuandai_input` text COMMENT '宽带接入协议/证明',
  `zufang_input` text COMMENT '租房协议',
  `mentou_input` text COMMENT '门头照片',
  `neibu_input` text COMMENT '网咖内部环境照片',
  `xiaofangtongdao_input` text COMMENT '消防通道照片',
  `zhengxin_input` text COMMENT '法人个人征信',
  `monitor_account` text COMMENT '监控账号',
  `legal_person_card_front` varchar(255) NOT NULL COMMENT '法人正面照 url',
  `legal_person_card_back` varchar(255) NOT NULL COMMENT '法人背面照 url',
  `check_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '审核状态 默认0 1通过 2驳回',
  `check_user_id` int(11) NOT NULL COMMENT '审核人',
  `checked_at` timestamp NULL DEFAULT NULL COMMENT '审核日期',
  `created_at` timestamp NOT NULL COMMENT '提交时间',
  `updated_at` timestamp NOT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


-- ----------------------------
-- Table structure for `item_class`
-- ----------------------------
DROP TABLE IF EXISTS `item_class`;
CREATE TABLE `item_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0',
  `class_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


-- ----------------------------
-- Table structure for `item_imgs`
-- ----------------------------
DROP TABLE IF EXISTS `item_imgs`;
CREATE TABLE `item_imgs` (
  `item_id` int(11) NOT NULL COMMENT '项目名称',
  `img_url` text NOT NULL COMMENT '图片路径'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

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
-- Table structure for `log_sms`
-- ----------------------------
DROP TABLE IF EXISTS `log_sms`;
CREATE TABLE `log_sms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tel` varchar(15) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



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
INSERT INTO `page_lists` VALUES ('1', '租赁规则', '<p>\r\n    <span>选择机型：在“全部宝贝”页面选择您所需的机型，点击进入可查看并选择机器详细配置。选择好机型配置后，点击“我要免押金租赁”即可。</span>\r\n</p>\r\n<p>\r\n    <span><br/></span>\r\n</p>\r\n<p>\r\n    <span>申请免押金额度：目前租葛亮都是免押金的（在租葛亮网站-认证内提交企业营业执照、法人身份证正反面照片）。</span>\r\n</p>\r\n<p>\r\n    <span><br/></span>\r\n</p>\r\n<p>\r\n    <span>提交订单：系统将根据您选择的机型及免押金额度自动生成订单，请确认机型配置、金额、配送地址，并选择支付方式，即可提交订单。</span>\r\n</p>\r\n<p>\r\n    <span><br/></span>\r\n</p>\r\n<p>\r\n    <span>支付首期租金：通过支付宝在线支付方式支付首期租金。</span>\r\n</p>\r\n<p>\r\n    <span><br/></span>\r\n</p>\r\n<p>\r\n    <span>示例说明：</span>\r\n</p>\r\n<p>\r\n    <span><img src=\"http://192.168.1.132/upload/itemContent/20180517/6cOPcoqZSG711J1oLthJM60uCdMTYTJjoJLSZ0Hp.jpeg\"/></span>\r\n</p>\r\n<p>\r\n    <span>例如您0630下单并完成支付，起租日从您收到机器当天开始计算，如0702收到机器，那么0630当天支付的租金则为0702-0801期间的租金[即7月份账单下单时已支付]，后续在0715会出账单并短信提醒您支付0802-0901当期租金系统将在付款日自动从您的账户余额中扣除每月租金，请保证账户余额充足。若您的账户余额不足，系统将提前3天发送短信提醒您充值。扣款成功（或失败）后，系统也将发送扣款结果通知短信</span>\r\n</p>\r\n<p>\r\n    <br/>\r\n</p>', '2018-05-17 02:15:01', '2018-05-17 10:54:04');
INSERT INTO `page_lists` VALUES ('2', '关于我们', '<p>123</p>', '2018-05-17 10:56:07', '2018-05-17 10:56:07');
