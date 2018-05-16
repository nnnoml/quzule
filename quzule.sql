-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018-05-16 19:06:59
-- 服务器版本： 5.7.21
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quzule`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL COMMENT '菜单名称',
  `menu_url` text NOT NULL COMMENT '菜单调用路径',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `menu_name`, `menu_url`, `created_at`) VALUES
(1, '首页', 'main', '2018-05-10 01:56:05'),
(2, '商品分类管理', 'itemClass', '2018-05-15 01:36:18'),
(3, '商品管理', 'item', '2018-05-10 01:56:59'),
(4, '单页管理', 'page', '2018-05-10 02:27:43'),
(5, '资料审核', 'apply', '2018-05-16 08:40:02');

-- --------------------------------------------------------

--
-- 表的结构 `admin_role_users`
--

CREATE TABLE `admin_role_users` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(11) NOT NULL DEFAULT '0' COMMENT '菜单id,-1为所有菜单',
  `menu_auth` int(11) NOT NULL DEFAULT '0' COMMENT '菜单权限 二进制 1创建 2更新 4读取 8删除'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin_role_users`
--

INSERT INTO `admin_role_users` (`id`, `user_id`, `menu_id`, `menu_auth`) VALUES
(1, 1, -1, 15),
(2, 2, 5, 15),
(3, 2, 1, 15);

-- --------------------------------------------------------

--
-- 表的结构 `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin_users`
--

INSERT INTO `admin_users` (`id`, `user_name`, `password`) VALUES
(1, 'a', '$2y$10$2m17CIiN6q0E101Ke1qN9u7AjblWzqFHEf6iIP3KehCrw4jP9mc9e'),
(2, 't', '$2y$10$2m17CIiN6q0E101Ke1qN9u7AjblWzqFHEf6iIP3KehCrw4jP9mc9e');

-- --------------------------------------------------------

--
-- 表的结构 `index_apply`
--

CREATE TABLE `index_apply` (
  `id` int(11) NOT NULL,
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
  `updated_at` timestamp NOT NULL COMMENT '修改时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `index_apply`
--

INSERT INTO `index_apply` (`id`, `user_id`, `comp_name`, `comp_reg_num`, `comp_reg_time`, `license`, `legal_person_name`, `legal_person_id`, `legal_person_card_front`, `legal_person_card_back`, `area_img`, `check_status`, `check_user_id`, `checked_at`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '1', '2018-05-09 16:00:00', '/upload/apply/20180516/l6IaiO2PdP0cm2uQFjQEr1eSPmF90L2AUuqzFaRv.jpeg,', '1', 1, '/upload/apply/20180516/KJ8oFFzbz9xPvxkqKsnXS3clDJrNZSQAfJi31P9s.jpeg,', '/upload/apply/20180516/vlhYic1KfzXq6XiYQ736HARIU1BoB26jVB3VKcaM.jpeg,', '/upload/apply/20180516/PjhfXZtpSXu3AdeYrNc5jY5FeZecVzgyTrZlrE8e.png,/upload/apply/20180516/h7sQ9ijHtGWuKaxyGpgEkv0wlRxPKKREojhodpqR.png,', 2, 0, '2018-05-16 00:23:38', '2018-05-16 00:23:38', '2018-05-16 02:25:46'),
(2, 1, '1', '1', '2018-05-09 16:00:00', '/upload/apply/20180516/l6IaiO2PdP0cm2uQFjQEr1eSPmF90L2AUuqzFaRv.jpeg', '1', 1, '/upload/apply/20180516/KJ8oFFzbz9xPvxkqKsnXS3clDJrNZSQAfJi31P9s.jpeg', '/upload/apply/20180516/vlhYic1KfzXq6XiYQ736HARIU1BoB26jVB3VKcaM.jpeg', '/upload/apply/20180516/PjhfXZtpSXu3AdeYrNc5jY5FeZecVzgyTrZlrE8e.png,/upload/apply/20180516/h7sQ9ijHtGWuKaxyGpgEkv0wlRxPKKREojhodpqR.png', 1, 0, '2018-05-16 00:24:33', '2018-05-16 00:24:33', '2018-05-16 02:36:54'),
(3, 1, '2', '2', '2018-05-03 16:00:00', '/upload/apply/20180516/rQIcUVoyYJWc0lYLxPlidET7mwW3QzeshKfyWgT4.jpeg', '2', 2, '/upload/apply/20180516/liZxdfX422XD4gdTviBvT74DEqjb5PT2gCNNWCr5.jpeg', '/upload/apply/20180516/FCfcyESZQUP8jAuJNnYiRxmHsavOVb7HowayXBde.jpeg', '/upload/apply/20180516/dBzYVq9xkRihnYM6IUsXzo9C3FsfXyE6CoHjfwmA.png', 1, 1, '2018-05-16 02:43:58', '2018-05-16 02:43:31', '2018-05-16 02:43:58');

-- --------------------------------------------------------

--
-- 表的结构 `index_users`
--

CREATE TABLE `index_users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `index_users`
--

INSERT INTO `index_users` (`id`, `user_name`, `password`) VALUES
(1, 'user', '$2y$10$2m17CIiN6q0E101Ke1qN9u7AjblWzqFHEf6iIP3KehCrw4jP9mc9e');

-- --------------------------------------------------------

--
-- 表的结构 `item_class`
--

CREATE TABLE `item_class` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  `class_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `item_class`
--

INSERT INTO `item_class` (`id`, `pid`, `class_name`) VALUES
(1, 0, '1232'),
(3, 1, '在的');

-- --------------------------------------------------------

--
-- 表的结构 `item_imgs`
--

CREATE TABLE `item_imgs` (
  `item_id` int(11) NOT NULL COMMENT '项目名称',
  `img_url` text NOT NULL COMMENT '图片路径'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `item_imgs`
--

INSERT INTO `item_imgs` (`item_id`, `img_url`) VALUES
(2, '/upload/itemImg/20180511/9OkqqUUZzYJ8JqpM3llzCRJqkYbXLgXLWbkZ6sf1.jpeg'),
(2, '/upload/itemImg/20180511/6cT3ENy6dEWhlR1yVvhObXybTcIUILBW9LcCJFkU.jpeg'),
(2, '/upload/itemImg/20180511/9FrGWkcibeQe3updXhJ43GuVGpEKHoc4Ax6XDYKv.jpeg'),
(1, '/upload/itemImg/20180511/9OkqqUUZzYJ8JqpM3llzCRJqkYbXLgXLWbkZ6sf1.jpeg'),
(1, '/upload/itemImg/20180511/6cT3ENy6dEWhlR1yVvhObXybTcIUILBW9LcCJFkU.jpeg'),
(1, '/upload/itemImg/20180511/9FrGWkcibeQe3updXhJ43GuVGpEKHoc4Ax6XDYKv.jpeg');

-- --------------------------------------------------------

--
-- 表的结构 `item_lists`
--

CREATE TABLE `item_lists` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL COMMENT '项目名称',
  `item_class` int(11) NOT NULL DEFAULT '0' COMMENT '项目类型',
  `item_price` int(11) NOT NULL DEFAULT '0' COMMENT '项目价格',
  `item_rent_price` int(11) NOT NULL DEFAULT '0' COMMENT '项目租赁价格/月',
  `item_detail` text COMMENT '项目详情',
  `item_parame` text COMMENT '项目参数',
  `is_show` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否上架 默认0不上架',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `item_lists`
--

INSERT INTO `item_lists` (`id`, `item_name`, `item_class`, `item_price`, `item_rent_price`, `item_detail`, `item_parame`, `is_show`, `created_at`, `updated_at`) VALUES
(1, '名称21', 0, 10, 2, '<p>1</p>', '<p>22</p>', 1, '2018-05-10 19:24:26', '2018-05-11 00:23:26'),
(2, '名称', 0, 10, 2, '<p>1</p>', '<p>22</p>', 1, '2018-05-10 19:26:28', '2018-05-10 19:26:28'),
(4, '1', 0, 2, 23, NULL, NULL, 0, '2018-05-10 19:27:52', '2018-05-10 19:27:52'),
(5, '1', 0, 2, 23, NULL, NULL, 0, '2018-05-10 19:31:00', '2018-05-10 19:31:00'),
(6, '新建商品', 1, 123, 123, NULL, NULL, 1, '2018-05-14 19:48:56', '2018-05-14 20:08:55');

-- --------------------------------------------------------

--
-- 表的结构 `item_sku`
--

CREATE TABLE `item_sku` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `page_lists`
--

CREATE TABLE `page_lists` (
  `id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL COMMENT '单页名称',
  `page_detail` text NOT NULL COMMENT '单页内容',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `page_lists`
--

INSERT INTO `page_lists` (`id`, `page_name`, `page_detail`, `created_at`, `updated_at`) VALUES
(2, '123', '<p>123<strong>123<img src=\"http://qzl.com/upload/itemContent/20180514/asNBeoHYgPS4tl60PysQPhQrrmB5pSvG23HmvZ1Y.jpeg\" style=\"width: 255px; height: 121px;\"/></strong></p>', '2018-05-13 17:40:17', '2018-05-13 17:40:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_role_users`
--
ALTER TABLE `admin_role_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `index_apply`
--
ALTER TABLE `index_apply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `index_users`
--
ALTER TABLE `index_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_class`
--
ALTER TABLE `item_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_lists`
--
ALTER TABLE `item_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_lists`
--
ALTER TABLE `page_lists`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用表AUTO_INCREMENT `admin_role_users`
--
ALTER TABLE `admin_role_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `index_apply`
--
ALTER TABLE `index_apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `index_users`
--
ALTER TABLE `index_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `item_class`
--
ALTER TABLE `item_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 使用表AUTO_INCREMENT `item_lists`
--
ALTER TABLE `item_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用表AUTO_INCREMENT `page_lists`
--
ALTER TABLE `page_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
