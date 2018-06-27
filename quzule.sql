/*
Navicat MySQL Data Transfer

Source Server         : 趣租乐库
Source Server Version : 50717
Source Host           : localhost:3306
Source Database       : sql568742

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2018-06-27 16:59:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_menu`;
CREATE TABLE `admin_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) NOT NULL COMMENT '菜单名称',
  `menu_url` text NOT NULL COMMENT '菜单调用路径',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_menu
-- ----------------------------
INSERT INTO `admin_menu` VALUES ('1', '首页', 'main', '2018-05-10 09:56:05');
INSERT INTO `admin_menu` VALUES ('2', '商品分类管理', 'itemClass', '2018-05-15 09:36:18');
INSERT INTO `admin_menu` VALUES ('3', '商品管理', 'item', '2018-05-10 09:56:59');
INSERT INTO `admin_menu` VALUES ('4', '单页管理', 'page', '2018-05-10 10:27:43');
INSERT INTO `admin_menu` VALUES ('5', '资料审核', 'apply', '2018-05-16 16:40:02');
INSERT INTO `admin_menu` VALUES ('6', '注册用户', 'indexUser', '2018-05-17 16:30:12');
INSERT INTO `admin_menu` VALUES ('7', '订单管理', 'order', '2018-06-19 15:55:32');

-- ----------------------------
-- Table structure for admin_role_users
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
-- Table structure for admin_users
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
-- Table structure for index_apply
-- ----------------------------
DROP TABLE IF EXISTS `index_apply`;
CREATE TABLE `index_apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '上传用户id',
  `license` varchar(255) NOT NULL COMMENT '营业执照 url',
  `wenhua_input` text COMMENT '文化许可证',
  `xiaofang_input` text COMMENT '消防合格证',
  `wangjian_input` text COMMENT '网络监察证',
  `kuandai_input` text COMMENT '宽带接入协议/证明',
  `zufang_input` text COMMENT '租房协议',
  `mentou_input` text COMMENT '门头照片',
  `neibu_input` text COMMENT '网咖内部环境照片',
  `xiaofangtongdao_input` text COMMENT '消防通道照片',
  `zhengxin_input` text COMMENT '法人个人征信',
  `other1_input` text COMMENT '其他材料1',
  `other2_input` text COMMENT '其他材料2',
  `other3_input` text COMMENT '其他材料3',
  `monitor_account` text COMMENT '监控账号',
  `mark` text NOT NULL COMMENT '备注',
  `legal_person_card_front` varchar(255) NOT NULL COMMENT '法人正面照 url',
  `legal_person_card_back` varchar(255) NOT NULL COMMENT '法人背面照 url',
  `check_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '审核状态 默认0 1通过 2驳回 3通过但需要完善',
  `check_user_id` int(11) NOT NULL COMMENT '审核人',
  `checked_at` timestamp NULL DEFAULT NULL COMMENT '审核日期',
  `created_at` timestamp NOT NULL COMMENT '提交时间',
  `updated_at` timestamp NOT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of index_apply
-- ----------------------------
INSERT INTO `index_apply` VALUES ('1', '1', '/upload/apply/20180531/JBmW6SLdhBVPFjwV5SDej4m9Z89LikztLlN3AfBJ.jpeg', '/upload/apply/20180531/gI4rITIXQSPNKHU4D8FDiL0N1egSU0x370DzkfDd.jpeg', '/upload/apply/20180531/ppJWLyov92s6t5vAwdR5FJSBgmAVHvvDlnL1h15h.jpeg', '', '/upload/apply/20180531/EUq8GtW9JxTx3AkkTOEJPhhBPnMGfQ2HZZ5uIke3.jpeg', '/upload/apply/20180531/h4fHFobZAYOBcs5J7iiPh4a2znGq7Su7Ot6mf1EP.jpeg', '/upload/apply/20180531/gUd4ruKr1BeDZ9yEQb6SBU4OBr6iWyG0pOpEVwfR.jpeg,/upload/apply/20180531/A93s76xoiW47Lgwu2OQu15z0VOIffG6QJYWuT0Lc.jpeg', '/upload/apply/20180531/I6VJKfDsjk1Wn0IUaeb86Gf8tXTNor8ZDq4nyOem.jpeg,/upload/apply/20180531/spwZMhdxuKWEnsjiMb7k2jvXzTurchj399Hzj5K3.jpeg', '/upload/apply/20180531/Bvrbg8cP9tyMeZ0SWThIlqWQQCcp388iWNJFoMJ8.jpeg', '/upload/apply/20180531/GcorrDApsVRo1XdkksSmUlvebYXFfYV6jCXsj4qx.jpeg', null, null, null, '12306', '', '/upload/apply/20180531/fJ7vsgseh0Gb8IPKkbxmqRSctyAPX3cJVPRV0LLG.jpeg', '/upload/apply/20180531/faHSwhAk79NVCU0RSXTlwMgadAJjs0rRZi8H0J92.jpeg', '0', '1', '2018-06-15 18:33:24', '2018-05-31 21:17:28', '2018-06-15 18:33:24');
INSERT INTO `index_apply` VALUES ('2', '2', '/upload/apply/20180601/VeyxM9aVnFKu2gL96ltaYWxS5flAZ1woTTcc6Uak.jpeg', '/upload/apply/20180601/7BDT53WJODe5Xs9HLtHSc497ExmkFIAoM6axhWSw.jpeg', '/upload/apply/20180601/mOlMzjPzIOvRqmRtVyo4xdm6lb6W99mpPFvNUYI8.jpeg', '', '/upload/apply/20180601/w1PFQB9fFPhjmjWkXIcMnOzHXyzTNHlVnX3FW1lz.jpeg', '/upload/apply/20180601/2mnoV44SW1Kh0laHdeyg5KRvFD1thkXEddKKj5uO.jpeg,/upload/apply/20180601/TURN3Gjg9Q1Hjgvhydt4nXksGGC3ivdvkSETfIkP.jpeg', '/upload/apply/20180601/25CL06Zt1l1coJjwYyzAGXR1sPllh0oJahpHoFSM.jpeg', '/upload/apply/20180601/Y2qYMvbHiO5THonTUFJHEv0uInBK9jIb5Zr3oAdo.jpeg,/upload/apply/20180601/ubKelcCbyBgBBDm85ExoPt0hrVEWEOPlFVNeG3bh.jpeg,/upload/apply/20180601/xj1y59Z4sc0OY8xkKL0Wafi2CymHdSQuogYhFLJE.jpeg,/upload/apply/20180601/NyEDrPsZjNUKBKzaOV5MsHHk0Ythg6PsZFnQrVGc.jpeg,/upload/apply/20180601/o1PUZSlJecl5lfy9bEfRXlobQyexzzvumYnpjUlf.jpeg,/upload/apply/20180601/6DauhI21yAKGpB7iLKTpBtorBRxHxxUZBeUs4khH.jpeg,/upload/apply/20180601/ViJwhu9asMiWK6R9g63QyNgiApR5EVWuhBd3nyp9.jpeg', '/upload/apply/20180601/Aid0aiXhDc8NgSRdtPXPJmO866NjBpu7rxjU5XHs.jpeg,/upload/apply/20180601/N6mzKze19wIjvhoL4BQxVIWnsSzOWHiE6F9LK1ck.jpeg', '/upload/apply/20180601/jSwvLkVWfqU0A4la7dptZs4kV0ZJn8m4nRIHncaI.jpeg', null, null, null, '34343434', '', '/upload/apply/20180601/OYiBjGQymIdpKKwJGZDzdQpuUSU4ecTau4DrMyad.jpeg', '/upload/apply/20180601/zu4b2EQrNgpjEp1WrL9xzSVAzELi8sMlD64ysBAA.jpeg', '0', '0', null, '2018-06-01 09:11:21', '2018-06-01 09:11:21');
INSERT INTO `index_apply` VALUES ('3', '3', '/upload/apply/20180606/jg238SzeIVGRPnYlEDM1BFH5fPgQ3vbO3jY3YqtW.jpeg', '/upload/apply/20180606/TAaSJqRBBnCT15Ya5IXUcao1USiobMR1tqm5CsB1.jpeg', '/upload/apply/20180606/5REsgUZ95zEKsnjRQsvLZdhQfQT2l6cZM2wZsjNb.jpeg', '', '/upload/apply/20180606/ZLLCayHgqfJU9unC1I2E00pWHWsnhAxUVqBi6yKx.jpeg', '/upload/apply/20180606/kRd9bBRXQUksMCIhVLNC8Dlt24wcolPkyzeBNOUc.jpeg', '/upload/apply/20180606/kfM1oxNmWpoWHMs1Y72NL3SeHFFVNNkx6GkypA6n.jpeg', '/upload/apply/20180606/cQVuNAZOFq47er3IEBST0Edwnaw7GkDbtvrgHyWt.jpeg', '/upload/apply/20180606/UXDGIdGesKierkKiOcAscdu8iZ3QIiYwkDFlgpI8.jpeg', '/upload/apply/20180606/crHM8COtXzLVgNJlAXzotkBxXlyn6lPhfRe0qWJz.jpeg', null, null, null, 'defefrg', 'qqwdwrwe', '/upload/apply/20180606/rDx0PvSINBTuH1mVmfyEtxpnn3TnuaiilvQEGJIQ.jpeg', '/upload/apply/20180606/Ba4CsxIHg3S4HuDqetEElvqt6aF4aId0FG5V38Tt.jpeg', '0', '0', null, '2018-06-06 15:40:06', '2018-06-06 15:40:06');
INSERT INTO `index_apply` VALUES ('4', '5', '/upload/apply/20180607/znsrIKWCUvQbu7SJKa0Sy74AgIv2lwOxf5gA0hw4.jpeg', '/upload/apply/20180607/rUdWZaa3fBTwQVBoD2JHRhzroP5ddNDndITKC9J3.jpeg', '/upload/apply/20180607/O6rvKQkmuAI5dJ9dxuXDeGIRpEZdb782wCdDeoig.jpeg', '', '/upload/apply/20180607/fc65zjGsIhsTufoM3encPn8LeQxBX7fYHKdCWFXD.jpeg', '/upload/apply/20180607/OyRHp2653HsiwtVLlajHmNzD5cOHTNxxoYzJ8OYz.jpeg,/upload/apply/20180607/lNi9L7l6hRsx7W3uPjXo76IuZLUncIqdLlfYJt8H.jpeg,/upload/apply/20180607/8zfUQz9gVTtNbuEB6JgMIF6trdlJyXEDjMtLmZ6C.jpeg,/upload/apply/20180607/B8SheblMNKhaVDcfXzqEQi8u0Gxtd6AXTzdjPabW.jpeg', '/upload/apply/20180607/oaTiSwWFSk4x5ha6ojRqBfs8SKgf7wj5GxTGurax.jpeg', '/upload/apply/20180607/LvnWYJbck5fbXBfOKlq8oHx6kmEUt7P6wPdJEdiN.jpeg,/upload/apply/20180607/XQrgpGkW6Xl5FxOJ3d2I0TpPxJWNbuGndsZIJvm5.jpeg,/upload/apply/20180607/tD4h0LoXGEaSnRmVjT8z6lWj5G6GeHNRKDRn2Mam.jpeg,/upload/apply/20180607/2XLsf6noEtJtuyRJWuYJwYHhRmxRStD7tnSSohV6.jpeg,/upload/apply/20180607/EbP0iyccJrjHzrk6uQNSRYNtSbtiN8f98obBeIyV.jpeg,/upload/apply/20180607/jnREeL63QwX7zg7Bum9myhBq5oX5hky0dWJtONzl.jpeg', '/upload/apply/20180607/qC5MHaU6yBcmpDL33jobQa0PgX1wqlBpRFYfzann.jpeg', '/upload/apply/20180607/IGtycxSZGPLxPMgXKC7vren4U0nNv6Q9qka0gMVZ.jpeg,/upload/apply/20180607/BupKw9jkoJXv8jmz6saP9VTQYxtOOA12p938hSy0.jpeg,/upload/apply/20180607/LC028ZNEpWIrhKGhXLALvR9wSG5uILJWHruCz9eM.jpeg,/upload/apply/20180607/WqPuRBOR3QWE0y91RvVFd3xAKACWeFQMfQcdgRp3.jpeg,/upload/apply/20180607/bZ3omQaEz3S1xgJXBLDTkC4bkSXzAD2KP7t3Oi61.jpeg,/upload/apply/20180607/WMy4Vi7f1Bs5IDCI1XClusXQEUnwccIozPV8U5Ju.jpeg', null, null, null, 'scwb', 'i5   16G内存    B360主板   1070Ti8G显卡  机箱，500W电源', '/upload/apply/20180607/i51R6BOPWZ3MguLgHQT78Bi69xI6xDIykCPSjlQN.jpeg', '/upload/apply/20180607/LW8jsgPQmer6VruKdt9wFTKrwCdkqbBKuoIa9dbk.jpeg', '0', '0', null, '2018-06-07 11:23:10', '2018-06-07 11:23:10');
INSERT INTO `index_apply` VALUES ('5', '1', '/upload/apply/20180612/w1RImCwOWF2t6fhnSYMuBxtBlv45lyDXBFu4tZZ8.jpeg', '/upload/apply/20180612/if5PxPOTtM5yewN9IzXj8qh86e3tby3xSTRsa4On.png', '/upload/apply/20180612/m18jR2IBjDVqaTNmEOaL0EaiJfQZBuEbrCZTQcuV.jpeg', '', '/upload/apply/20180612/NeQ7egq03b0KZKTYIwvUh2aAZNZXKet1CE6i9aS5.jpeg', '/upload/apply/20180612/wW7Mn0mKk6hRv9QijRHNFsC29oEON2qsNjGVRU4X.jpeg', '/upload/apply/20180612/gCmOSLp0gav8lsMWOUu2QK3vNzFvKZNtQ4Y7Au6T.jpeg', '/upload/apply/20180612/W6soCTOqiUNUfAEUBhH96P3dHOF6Jo3M264BIF6B.jpeg', '/upload/apply/20180612/hBV9CORD6XI9iVUWsWCJq9CJOqjGzmPpkKIpEZOi.jpeg', '/upload/apply/20180612/NtmU1qLMrxmjANfoL4Zda0W3sZL6T1sBLYISjOcA.png', null, null, null, '测试', '测试', '/upload/apply/20180612/qc9nEPb2Xk6AGH4nWLELF7GmtfUZxCKxJN5kzPEP.jpeg', '/upload/apply/20180612/O5lRXQpDowcz43AtxlbabxvEXrpSLxihoF5yyinQ.jpeg', '0', '0', null, '2018-06-12 18:08:00', '2018-06-12 18:08:00');
INSERT INTO `index_apply` VALUES ('6', '7', '/upload/apply/20180613/8vtodoLLCL1edBd5Kk47BeIZeZ1wOx2ZEDa3vkue.jpeg', '/upload/apply/20180613/pNNE02pnUNPh9dmA21gLrlsdlPnpdVYf3LrGwt1H.jpeg', '/upload/apply/20180613/GVnWPHLDr3B14UsmjP97JvbQ5z8tGdBBCBhRFuxM.jpeg', '', '/upload/apply/20180613/CXP6YdlZi1uHbj7dAtPAO1RXsqJpNKQc1HTaaLGd.jpeg', '/upload/apply/20180613/11qY3Q2bVmzE9AGbGzNbkkcA9ZJzQfUjn0u1ULPZ.jpeg', '/upload/apply/20180613/pdDDD7v316mB9PAEbCjEIVrlaPOCimVDgcYqi6vB.jpeg', '/upload/apply/20180613/6UfvejYGnctWGwJVqVjXnnvryy7hVPCjJQOY3pP1.jpeg,/upload/apply/20180613/SG7yntviAO0ou2e0pRVbgyre8FKBsZ1a1wbLyH35.jpeg,/upload/apply/20180613/lCpDYqYasLuFaez3KXIYoGirqIm77AQHQGSAlpcv.jpeg,/upload/apply/20180613/GfAbI3ePjrLek0HWdcabpduTuJdkrWuARPaV6ozc.jpeg,/upload/apply/20180613/JaUtmPq3WlIqwoVPxbdXd9fRB697OnRk3o10JPOo.jpeg,/upload/apply/20180613/OZAzHeMkkp1xt1QDuW428TeYKxqhk3SG0k9v4Gk0.jpeg', '/upload/apply/20180613/H3pcR3xHvRkrLp2K0SKguBYc9Za9yN8lkB6Q3xNT.jpeg', '/upload/apply/20180613/CgWfaoIlYbZAi9G54B8fL5WFCdNc8fwmEFnRMZXP.jpeg', null, null, null, '海康4200客户端219.145.166.68 账号123密码hk123456', '网吧I5 16G 1063   40台,   网吧I5 16G 1070TI    10台', '/upload/apply/20180613/fsHhtHOCrhbKIkxfZdUajswL8vZhnu8xzEU2UkYv.png', '/upload/apply/20180613/TGS9ccgher3f4DopiuuNIGqKyvzuhlEJf72OYiIc.png', '0', '0', null, '2018-06-13 16:00:31', '2018-06-13 16:00:31');
INSERT INTO `index_apply` VALUES ('7', '7', '/upload/apply/20180613/oeClaads9mesVtvRKlsDG34s5RgkTVfVAfNlinZO.jpeg', '/upload/apply/20180613/fJVCBFH9Y7Q3xu2ZG6WLDGnnDqL1mFZx2sDG4le9.jpeg', '/upload/apply/20180613/VsOJLahNeXVGNlVgebFKlXLqwzETZLpVYA5jnsHa.jpeg', '', '/upload/apply/20180613/SXZ9Wkg2KijRf7kjJDFf49D219TiIoKH3JMscsyi.jpeg', '/upload/apply/20180613/Jp5ZFyugGQkpsA1aZfAYCmWEjrZhZJT2k3zYT9vz.jpeg', '/upload/apply/20180613/HDY8nZwqYOFfb58G6EVGeqf1zQGc3khV1zpRXa9U.jpeg', '/upload/apply/20180613/6VqiMgNvKFAeaX5YD2Xxe0LqQftCfa70KsFIx0DF.jpeg,/upload/apply/20180613/E0PrtJGtdkA150P5OPFwSanDGrsLFSOujqRsDtwf.jpeg,/upload/apply/20180613/oRJsU1TKzuL0Ga81Rlmc0ujd0SW89pFSOiFRGwnv.jpeg,/upload/apply/20180613/JPkxxtNRMAALUTAhzuRJ6LpuI6Mh9UHoH1Kw958c.jpeg,/upload/apply/20180613/n4SpLNYgtc9K0BmQjuJZx4hn8P0DsEPGqrhGFuDB.jpeg,/upload/apply/20180613/pkqIc3dkKYrOd1vfy1ZF0SgVdvjJMXhJjIilZp72.jpeg', '/upload/apply/20180613/W8QGeGbqRSuxYYCEsCHj1ZZ1vXB7g96VTaN34VFY.jpeg', '/upload/apply/20180613/7S5DGhapCQEalEkr3iInx55jsxTDJBvWdiLzuNpZ.jpeg,/upload/apply/20180613/ilCaIHN2Q3LIWG8SndhutK8NqcD8NbiWU0dpF0Of.jpeg,/upload/apply/20180613/c8ykNNZX86KaY09WtbM6IMUBpIepnrpzrKFaG5Ew.jpeg', null, null, null, '海康4200客户端219.145.166.68 账号123密码hk123456', 'i5 1063  40台      i5 1070TI  10台', '/upload/apply/20180613/00eaTKXZ5VCV14ruqnP8VleLvshNM0z8ck8cqq4z.png', '/upload/apply/20180613/IW0EKqnGLv1NNqwpZcYdjKziCYzkG2mRFwS8PAVw.png', '0', '0', null, '2018-06-13 17:12:17', '2018-06-13 17:12:17');
INSERT INTO `index_apply` VALUES ('8', '9', '/upload/apply/20180614/RRIXzof3BpXgAQY9hdYTUVnCuXq2Q2C9NDC9iSL7.jpeg', '/upload/apply/20180614/GECepAFyG3bx2P13zmnlWadaLei09YPRtgawHP3R.jpeg', '/upload/apply/20180614/coeqRKPa40GWYwM7oRORc8TfNdDlp1IctRe5SynD.jpeg', '', '/upload/apply/20180614/O7HsQjDZXjtTGZI8JuTUujQKoakkiQJBbh0TR2Gq.jpeg,/upload/apply/20180614/OoBZ21Te92SgkkyhGRSNtFjAcPTQ0UemZj4oVn5e.jpeg,/upload/apply/20180614/sYqCdIg4NSvO6IYtESMrlRivDvgNXGH337eoHWz0.jpeg,/upload/apply/20180614/4ZFMjp25JJIdEc7m0UGwPC4bKqae5iOsycEjwdIQ.jpeg,/upload/apply/20180614/6E916GPjNmjQL7GZ7C5xss4T3gfPr9aWlkkzOj8W.jpeg,/upload/apply/20180614/Eqzmro3JjL8Fsq6SNPW0lYhJ8HVcO5YxChCT36sv.jpeg,/upload/apply/20180614/eoR4F83eEydTuUwsaABf6l5Cyd5Lakd5Ef0UKOR9.jpeg,/upload/apply/20180614/KrMsHDrzV37WLkkhHdLysAqiFpf1kJE6nDXxNUDW.jpeg,/upload/apply/20180614/o8oQoNCNk9fmgo0i2gVvSuM0XsRXKtwl1NqkeAx6.jpeg', '/upload/apply/20180614/AggxQrhZ0KDNxE0ztbuhSg4PGuYoiyx0l6nojlHR.jpeg,/upload/apply/20180614/SbnqAwjG5Zn4zI6lXXUurGbtJAF9PrPjjNYQrpS5.jpeg,/upload/apply/20180614/5rXYwFXU4Mwnv17XcDQ4etQdAbgaWu4Xkjp5x9zG.jpeg,/upload/apply/20180614/t9TTjHPzLvi9ijPuNvgukd18BgdHWdcCvaABnz9U.jpeg,/upload/apply/20180614/fItgNw2SnMQxepV7Ez5K6KdAFi9e8wh3ds3juGiB.jpeg', '/upload/apply/20180614/SLxCTqzJhviirRmiutLwK5BlLaHTPhZtZFGglRSS.jpeg', '/upload/apply/20180614/nprewkZLJEwKiPQQxaIasfbyycrclelsRMCCF9qo.jpeg,/upload/apply/20180614/gnRDXO8T2ACHTyVPdVoBsNbgcsfdwF8B32BmZJkA.jpeg,/upload/apply/20180614/NVlWcLLT659n3ozMHc7hKA5N7qtxUhgkMpRlWDsz.jpeg,/upload/apply/20180614/ncfe1Q9ezQuQGvSCVwakOFF7j7VuuS3U72bD7GDN.jpeg,/upload/apply/20180614/g6aoww7upF8Zirah6EZPxQhAmJFqFvjJiHHfYNNB.jpeg', '/upload/apply/20180614/GLpETSaeHMcJ6wfRtKZd8gqWRpITQOHgiLIgR2md.jpeg', '/upload/apply/20180614/YjlHymyBOWgEKKMB8SmWoTfyi4lPhSo7LVTKFJeZ.jpeg,/upload/apply/20180614/o8dkq9yTW8IuL7JXjzMsEVGlFbWWU7RWrvBvatFJ.jpeg,/upload/apply/20180614/26PlYVoR0XtjSXgyEUFWVeRK2SloZfOtpTtEwWAB.jpeg,/upload/apply/20180614/DoZ6F5zuaHYTD4Q9wmLAwpueFzCPl5QFEbWSccBJ.jpeg,/upload/apply/20180614/BFXesBf3MgsISBWmyzeCxkXMqRbapOAQJVuZOpQN.jpeg,/upload/apply/20180614/TBYbySTg0czsTUoec21SgTqtpXAzG2D4KFYblpwV.jpeg,/upload/apply/20180614/myRbOUUI8IY2QzoArtLXTcw4XgwuXbVwGJlF0s08.jpeg,/upload/apply/20180614/fCgiiCuGKs9EISZXPdsJ5PhIzpBKZIPpGm7Cvl9j.jpeg,/upload/apply/20180614/KFAtFHlO97wNZLvhWUHW2thJiIPslENRcvZVBvm8.jpeg,/upload/apply/20180614/KUct67ND4cXloDf6zVyD7cW6V2SqDKvIpMXmDlzI.jpeg', null, null, null, 'http://60.164.252.30:1234', '80台', '/upload/apply/20180614/GsTKh85bKGxnLofxv1PiRfR52iiepVzBYD72dUMx.jpeg', '/upload/apply/20180614/D3gPq6Tyu7WXIGmR1v4wJF1U9OAGvmNoypYfzTBN.jpeg', '0', '0', null, '2018-06-14 17:42:04', '2018-06-14 17:42:04');
INSERT INTO `index_apply` VALUES ('9', '1', '/upload/apply/20180615/y53XmfjqcgdiDcLaW0SSNnHlF8ohYFr9K5G6oz1i.jpeg', '/upload/apply/20180615/Am5sbaZc1m9J2q6HqhDG7XgwqBQsrzJ7ewJu0i8h.jpeg', '/upload/apply/20180615/gLNUDHbziaZB4H1RaXq7bKeNlfFAeNR6HrbVRz2k.jpeg', '/upload/apply/20180615/yrbcYUpDVMHxW1e5KXSyRkDItz7dYSMnBKH20EXP.png', '/upload/apply/20180615/MoxsRYikh75wLL637XOY3IslxtgCm4kvvaERCIre.jpeg', '/upload/apply/20180615/L7ovvCIdSkHer782PltGr4OKEMgLWpSeaeooaJer.jpeg', '/upload/apply/20180615/rv4AbWq6W0LNjm2kvStnwk1Gnv5bqIeDQ23urEFk.jpeg', '/upload/apply/20180615/BrZs8rCUvfRRcXxeeiJBEXomEjPMn5RfQgcjLcVy.jpeg', '/upload/apply/20180615/Wj61dnNJE0XrDl7walTjwOEcf1FleLTpr68sAuvN.jpeg', '/upload/apply/20180615/UCQ4xghcnKe9VYSBKxxFW6qo9vAw1kZrEk3uNBpv.jpeg', null, null, null, '123', '123', '/upload/apply/20180615/n7lSY05LsgIrxVumLPpp81Xyb6VrpbwHGvO7anuk.jpeg', '/upload/apply/20180615/4IY7lIY4JLD1i2rSHMqLjnX21NIVkizfoMD2nYZs.jpeg', '1', '1', '2018-06-15 18:49:33', '2018-06-15 18:46:15', '2018-06-15 18:49:33');
INSERT INTO `index_apply` VALUES ('10', '10', '/upload/apply/20180620/FXR0pRrXFmSeOfKcDDoZMXwzFTuavedzxbhWwsAR.jpeg', '/upload/apply/20180620/r0rp2ljL1xXVtKgfLtGa4WrIfHNQjACpBZwcBdXp.jpeg', '/upload/apply/20180620/CouS5xxvvFKENBaw5nFVTPMQfEHlPZTTuhqYwrhl.jpeg', '/upload/apply/20180620/LmRFcGuI0PCqolt4U9SFJ1txfSXPqR7ZQMisXNos.jpeg', '/upload/apply/20180620/BdnyArSSPgtV2GoKMumrDXT1OOYeXSlqqIAUx8GR.jpeg,/upload/apply/20180620/06FJv02ItBnxDlRjQTLdLuIiTSUOZ4OTqW5aM42k.jpeg,/upload/apply/20180620/IELiR7ObFhu4jchu1XgwlLWviBmLkJr6AvGuVzkU.jpeg,/upload/apply/20180620/yXVkIIFQ4d9yvAzikZJsJu819FlxYc0Pq2xq9cgs.jpeg', '/upload/apply/20180620/RKcG0D5RZFOKF2z9EDIDOSyYPWvxg6gjwgALIJpY.jpeg,/upload/apply/20180620/Kl8vsJRdYyusQrLRuQ2IypB9NkTF7HsEW3IJ4p8z.jpeg,/upload/apply/20180620/ATFE8JDnliBT7Mg16iCZTYtxgysyjRHG8KCyGflE.jpeg,/upload/apply/20180620/yBsWgXVpLV0HbEXoRUPQhLPTH9z3TLJ5Gek6bdnZ.jpeg,/upload/apply/20180620/4ISNzvCtU5MZDBp4Mos1wkt3qOvNt2UtVskiz1o1.jpeg', '/upload/apply/20180620/OAnILaAeFlu7gS2748AxU24XeFjiLPKfMbbiE1mN.jpeg', '/upload/apply/20180620/DGvrQMspgfolpWp8rg77AJU25V83Qmk9scsnflQv.jpeg,/upload/apply/20180620/Tkqbw3gQ2PK3hw8JBOTmDB3DBx7PGB0MwKjp0a82.jpeg,/upload/apply/20180620/gTDeEDJbVOiGppPjhZIfkmBQax8k15LYBR3ulF0R.jpeg,/upload/apply/20180620/JGU5bldaFSEROlDMcgJ8ZvQnqx9z8BntXz6sRQAC.jpeg,/upload/apply/20180620/hi7yOSluoFpA8j15RihMLWisVIpSUijxl3o6wmLw.jpeg,/upload/apply/20180620/hGwqfjtF8B74Ezad3XNnIWiV901m37Dc9d39C1va.jpeg', '/upload/apply/20180620/PExyktbdYVoEwuHxOcl32zpZEe9iVGvo5ydPVHVV.jpeg', '/upload/apply/20180620/ZGi17uKqC26x62mpl1UFWt3SKezrJuCpeGuLLwFu.jpeg,/upload/apply/20180620/djKeB6zF9HTKfvV9RIIGYuYR6KLRXmKNELbg80id.jpeg,/upload/apply/20180620/vZv6zCwqCtV07dW5WZ5GG4svUEERZeF9m7U3WkPw.jpeg,/upload/apply/20180620/gqgweE16557xddWodaXh4IuYJdmtfLJMNRp8JcUg.jpeg,/upload/apply/20180620/a6CUuMIrWZutdka3a29rUluJBkMCovWCAzn4yZ2N.jpeg,/upload/apply/20180620/c5cYL9T6GojKUfjZzWi2bEwEqPqV5j8WZBSj8ond.jpeg,/upload/apply/20180620/fKjNyb0Btcy7mEPkrttpR809S4kqhotPIDU3GGjE.jpeg,/upload/apply/20180620/rSgWDVl3OHdlrqX7xhYUSqVMK51BCqShsRRUTw2B.jpeg', '', '', '', '13195878880', '1070ti显卡+2K显示器，26套', '/upload/apply/20180620/gc0WXqSsDnqphdtX6VkVApPojbeILyVMxI4hxKBa.jpeg', '/upload/apply/20180620/mwXARKMAgtFht3yNACxnx0gT9lq4lZ2efJjgM2Fj.jpeg', '1', '1', '2018-06-21 12:28:02', '2018-06-20 16:00:50', '2018-06-21 12:28:02');
INSERT INTO `index_apply` VALUES ('11', '6', '/upload/apply/20180620/simzHktEZs1p0eDvZKcxVjGtvMAIYNdWTXiRCQ2t.jpeg', '/upload/apply/20180620/4qboNSwKX3TybF36I8e5g3zAPCJiBxvo1Xaxlvof.jpeg', '/upload/apply/20180620/Eh6CapRHw4DNDjEk9fCg4OtVt3a2WjnsKMXqxtJJ.jpeg', '/upload/apply/20180620/1rqqF36Kj3TsjNAueae8gfRXkoyUPupoZHmQyvz0.jpeg', '/upload/apply/20180620/lVxFjDYo5QAqNLSzKjv8IHXlFGkteA32BjgoiLLf.jpeg,/upload/apply/20180620/CufSdzyvmuWPQjCteseMwmidjDEvf9dnmrAvL9ks.jpeg,/upload/apply/20180620/hI0PXP6F8l7qCAGEsZQxn1duOvxvcmeWFA0wcIuY.jpeg', '/upload/apply/20180620/v3gf7AEcPIkUC6SHSRGdpMhmnmjPc9GBqFLgyWnP.jpeg,/upload/apply/20180620/XRbdeGYZA6234qMBspjcckdACPVnB1DqbUaOMobo.jpeg', '/upload/apply/20180620/FkkdG2Ek4Q5RNZ9q0dMWpr4oJPjq6vuxVgRjeijA.jpeg,/upload/apply/20180620/GK5hYObjhvzVKmVCFvpPTblXzHAh3JKP1HXWuY2v.jpeg', '/upload/apply/20180620/mVsHSuCJPaSULzDoNBKXG3dt3QHmPOikMxyPeXn1.jpeg,/upload/apply/20180620/UGSyMpm2SDEInfzoUTgigQvU5KFwyTzd5mGVwSrx.jpeg,/upload/apply/20180620/1lokr7xOOQmyJNfkBJkm00gkxiKkIL90rHPTnYyg.jpeg,/upload/apply/20180620/DcqpahzZuthrDvYFBEcQyr8gHERmL6HSULSO9Wnk.jpeg,/upload/apply/20180620/JBtv6cFovx2a0TWXWeEoGdYQx3Po8XDTyXscnL1f.jpeg', '/upload/apply/20180620/mHUERCfpViztDs1V2bAtVtDIjD92sNTW1RgEHZ2d.jpeg,/upload/apply/20180620/MGsUIVjKfs0VTUPEfiDLup7ckVuSSwUwQPDPURTD.jpeg', '/upload/apply/20180620/Y2TqtbQS08AlvVgJEoLqiMnQylwzfM2izruZLwyn.jpeg,/upload/apply/20180620/0TICYVKY3nraH9i20e8IWrgwwvKkeqPOKSGd8lpm.jpeg', '/upload/apply/20180620/cAqL230RiTwAlLn0yLo21QuSHWjqtknoORVQScg3.jpeg', '/upload/apply/20180620/vxzl06FsWgYr3MfQDHzjofKVwFu5TOvUZDDfnpqW.jpeg', '', '', 'i5 8500  16G  1065/81', '/upload/apply/20180620/0kEQJL6eXO2SLAl8MFnGl2R3sf87vLBQeXC7jeyy.jpeg', '/upload/apply/20180620/n7liGwbtAWXYzEI2tJpOgYbYYWwhIqRJQ8Wxzdz4.jpeg', '1', '1', '2018-06-20 16:20:31', '2018-06-20 16:05:03', '2018-06-20 16:20:31');
INSERT INTO `index_apply` VALUES ('12', '18', '/upload/apply/20180626/fBLGtGePcdlZHRZMepfQPzi8VMyOwwZxCpu7Xd0f.jpeg', '/upload/apply/20180626/w8egqZkXrAL2VZzOvL99v3wH46m2nehPp0dxFuxm.jpeg', '/upload/apply/20180626/j8UmjYe6VC7Dzo58zbn0RUMP6mTnSZuVavAbGPtq.jpeg', '/upload/apply/20180626/eDi3tLgIfm0thG2X386IOpPnzxVwEpZcy9FHuk0J.jpeg', '/upload/apply/20180626/2xokmzksqMSmaFKf1F1R0AagfiQJ4z5yBCo4T0c6.jpeg', '/upload/apply/20180626/SIUwfBaMv0u6yvQPiSbBsMzv4nXrfxGSIqD6Hwek.jpeg,/upload/apply/20180626/2rPxIRMMB90koG4hDtxmZBudtzM1WiWzcPsAApbF.jpeg,/upload/apply/20180626/rXtk7cwrfrmM8V2qq3bvo5Ps5SMsxUd4NrlbKIch.jpeg,/upload/apply/20180626/dBzmv2AdoEXcGjQDZKNS9eFvFB4kUyQmR0QumCOE.jpeg', '/upload/apply/20180626/WehiAByw9e4YM3OdMoYYy7QoZvObsPN8OkRvUXiy.jpeg', '/upload/apply/20180626/qO57C0CRNvpevxOYfL9FGo8ALHvN3tYnzKb9YgHI.jpeg,/upload/apply/20180626/UATRiERUvcS1QaAjTEpRvbNQRxdogy2yh3TkhB1q.jpeg,/upload/apply/20180626/vdJiKNJaETiVCdmmPi486E3OQ7JAyPzpmclTIFpk.jpeg,/upload/apply/20180626/t7DhV5zxdThYEM5SzMchqQjIcTi983niYJty3YPy.jpeg,/upload/apply/20180626/abW85jNJdV2oHo77E6hvw3N584vVjk4G4zqs3tRS.jpeg', '/upload/apply/20180626/J1kKjsn3gdm4ZtbRZwMZf9GsbyErm3To27e4KOs7.jpeg,/upload/apply/20180626/NV0jRmwt6esIPTnrEeCbI1CvLhCs42bQQBtivsOI.jpeg,/upload/apply/20180626/VoifmfqbpDVXlJ16rRiuBcPH2oKWkAjvUaVIgWYW.jpeg,/upload/apply/20180626/duKHdbJVkmy9xqbIffXT5n32D9N6nbqLOOeby2PY.jpeg', '/upload/apply/20180626/fnmiljPSZXoWCSW5dfhavULO5Yg2uoE5xzt8Wao9.jpeg,/upload/apply/20180626/fjcNYx70vxL5XkYG1VvIC6Wt1DjiuLQgZLOtoZC5.jpeg,/upload/apply/20180626/d33lbCj7qzRwqF1w930J9pft0mPuEpz2B1qA0A2a.jpeg,/upload/apply/20180626/A62176lq0U5h1LKCDUWTIfbJUn7NvjQLpVWxo91s.jpeg', '', '', '', '', '网吧i5 16G 1063 20台；网吧i7 16G 1070Ti 12台；网吧i7 16G 1080Ti 2K144HZ 10台；网吧单租1070Ti 16片；网吧单租1080Ti 11片', '/upload/apply/20180626/kRzEAVVhnakjQp2Uk1EPjAZJquIGk6YQe5SF1eiS.jpeg', '/upload/apply/20180626/6PKaIi1rAqYeAlPgQYLSSs0jzmEnAD7IHACeEKD1.jpeg', '2', '1', '2018-06-27 11:32:48', '2018-06-26 23:21:19', '2018-06-27 11:32:48');

-- ----------------------------
-- Table structure for index_users
-- ----------------------------
DROP TABLE IF EXISTS `index_users`;
CREATE TABLE `index_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `apply_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 未申请/申请驳回 1申请中 2申请通过',
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of index_users
-- ----------------------------
INSERT INTO `index_users` VALUES ('1', '17791867393', '$2y$10$aMRkl/3RPYUv/gnT.g6CX.8T/tFJ8qWFgvORCN3k678hSbsWPelAK', '0', '2018-05-31 21:10:43');
INSERT INTO `index_users` VALUES ('2', '18192125083', '$2y$10$xtF60sCb6MZRhNVpSv/fcOxbS2iLw8RtVOdFUo1LeWmDAKpVMU1oW', '0', '2018-06-01 09:08:14');
INSERT INTO `index_users` VALUES ('3', '18710331402', '$2y$10$vNjR1TzGAcpUuAg/eB4w5uFlQV2vFc8kcT1IHunaYlfEAzrN8RzAu', '0', '2018-06-06 15:32:01');
INSERT INTO `index_users` VALUES ('4', '15929446655', '$2y$10$NBt2Nkb0dA6uPEDZsFmF.u/rp1QndUxlZ8bvx1ZFGUhf7jl501HAi', '0', '2018-06-06 16:09:14');
INSERT INTO `index_users` VALUES ('5', '18092216950', '$2y$10$vhKNNifZshkNEmcFUS3zJuXLzG20KAVKkgdA.5cOt6m6iMQkME80W', '0', '2018-06-06 16:41:17');
INSERT INTO `index_users` VALUES ('6', '15135988999', '$2y$10$VRaL5i3q9hqrd98asGHoL.qa5YEzDA1ThmlfvLQu04xmMLb0.JgQ.', '2', '2018-06-08 11:19:21');
INSERT INTO `index_users` VALUES ('7', '13772736665', '$2y$10$nJ30AzugW3q693qnTfZGEu1Psc2vTQ/DW/s3LVkTpfwKf5rWv6mKm', '0', '2018-06-12 11:28:51');
INSERT INTO `index_users` VALUES ('8', '18793000005', '$2y$10$fHu3EtP/.oTmBEDZsbB6qOCCAiFU5nzPZ173hv5yiUZBAnaOZZ7lS', '0', '2018-06-13 10:21:08');
INSERT INTO `index_users` VALUES ('9', '15393028877', '$2y$10$C26P8DsRFpZsm2V2nrKRB.t0SiyMbkipRgyv9cQM42QMIqZhMqmli', '0', '2018-06-14 16:45:16');
INSERT INTO `index_users` VALUES ('10', '13993398338', '$2y$10$wxeUHqK9QXmzTb/LD.LBLee1oeXaZmtszSJMir4eQS310oTroiRMC', '2', '2018-06-15 17:23:21');
INSERT INTO `index_users` VALUES ('11', '15366088882', '$2y$10$2.AOSId4sRQJSqC6TTP8bOVa.uXW22ZSvmMdU8ZopC/jKlpw44PYi', '0', '2018-06-19 20:24:51');
INSERT INTO `index_users` VALUES ('12', '15332419878', '$2y$10$/xqQsIIRqF8r5EIYKCDYbuazx1LL2XhLl2OsmZS8Vm5iVeDprN3Y2', '0', '2018-06-19 21:29:13');
INSERT INTO `index_users` VALUES ('13', '18195421102', '$2y$10$CLWBbdR5GotdM7iUOVlzfuLWi.uOzOgV.a1C83fdqqByyNutTma.2', '0', '2018-06-20 11:37:00');
INSERT INTO `index_users` VALUES ('14', '18913019126', '$2y$10$hF5azYl0RuLD0xlbx6a3CeKQYST7wh1aS5JsyPmqCcPkgHEAPwZX.', '0', '2018-06-20 15:59:46');
INSERT INTO `index_users` VALUES ('15', '18700787240', '$2y$10$lvmd1w0w9TVTq29Os/wm3ONNk7uBfVDAR2z07vgmf/Lq35SwtE6nC', '0', '2018-06-20 17:04:19');
INSERT INTO `index_users` VALUES ('16', '18806133671', '$2y$10$XMnB.q3zPPIVIqmnTwOv1e48CbxeQDFRz5tfbzaRJRAseIPIgPqom', '0', '2018-06-25 22:50:50');
INSERT INTO `index_users` VALUES ('17', '15580802345', '$2y$10$fdr7kTZmq8sk23kssDF2Ge30H2yRwQaHLSD84PAhlx6lnNmE1kYkm', '0', '2018-06-26 09:28:44');
INSERT INTO `index_users` VALUES ('18', '18629292766', '$2y$10$oRM3iJrAyyIlzM5uBz4I6.h9C7..wk8QZx2VULZrqnQLfz3KWxoMO', '0', '2018-06-26 22:50:46');
INSERT INTO `index_users` VALUES ('19', '15021237746', '$2y$10$AbJX3wea9aZTacU.4wXKTuOuMgfXnP/W8MEVTXDXDWpehAu/8I5FG', '0', '2018-06-27 11:30:25');

-- ----------------------------
-- Table structure for index_user_address
-- ----------------------------
DROP TABLE IF EXISTS `index_user_address`;
CREATE TABLE `index_user_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `address` text NOT NULL COMMENT '用户地址',
  `user_name` varchar(255) NOT NULL COMMENT '用户姓名',
  `user_tel` varchar(15) NOT NULL COMMENT '用户电话',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of index_user_address
-- ----------------------------
INSERT INTO `index_user_address` VALUES ('2', '15', '西安市莲湖区西南城角人民南巷', '薄荷', '18700787240');
INSERT INTO `index_user_address` VALUES ('3', '10', '甘肃省平凉市崆峒区潮人网咖', '赵旭辉', '13993398338');
INSERT INTO `index_user_address` VALUES ('4', '15', '西南城角', '薄荷', '18700787240');

-- ----------------------------
-- Table structure for index_user_cart
-- ----------------------------
DROP TABLE IF EXISTS `index_user_cart`;
CREATE TABLE `index_user_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `item_id` int(11) NOT NULL COMMENT '商品id',
  `start_time` timestamp NOT NULL COMMENT '开始时间',
  `rent_month` int(11) NOT NULL COMMENT '出租月数',
  `rent_num` int(11) NOT NULL COMMENT '出租数量',
  `created_at` timestamp NOT NULL COMMENT '提交时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of index_user_cart
-- ----------------------------
INSERT INTO `index_user_cart` VALUES ('2', '2', '3', '2018-06-19 00:00:00', '1', '1', '2018-06-19 18:04:12');
INSERT INTO `index_user_cart` VALUES ('3', '2', '6', '2018-06-20 00:00:00', '1', '1', '2018-06-20 08:58:15');
INSERT INTO `index_user_cart` VALUES ('4', '6', '3', '2018-06-20 00:00:00', '36', '61', '2018-06-20 11:20:18');
INSERT INTO `index_user_cart` VALUES ('7', '6', '5', '2018-06-20 00:00:00', '36', '20', '2018-06-20 11:22:20');
INSERT INTO `index_user_cart` VALUES ('9', '15', '5', '2018-06-25 00:00:00', '1', '1', '2018-06-25 14:36:45');
INSERT INTO `index_user_cart` VALUES ('10', '15', '8', '2018-06-25 00:00:00', '1', '1', '2018-06-25 14:37:22');
INSERT INTO `index_user_cart` VALUES ('11', '15', '4', '2018-06-25 00:00:00', '1', '1', '2018-06-25 16:54:17');
INSERT INTO `index_user_cart` VALUES ('12', '15', '10', '2018-06-25 00:00:00', '1', '5', '2018-06-25 17:15:06');
INSERT INTO `index_user_cart` VALUES ('15', '16', '2', '2018-06-25 00:00:00', '1', '1', '2018-06-25 22:52:35');
INSERT INTO `index_user_cart` VALUES ('16', '17', '6', '2018-07-01 00:00:00', '3', '1', '2018-06-26 09:29:22');

-- ----------------------------
-- Table structure for item_class
-- ----------------------------
DROP TABLE IF EXISTS `item_class`;
CREATE TABLE `item_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0',
  `class_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of item_class
-- ----------------------------
INSERT INTO `item_class` VALUES ('1', '0', '整机租赁');
INSERT INTO `item_class` VALUES ('2', '0', '整机+显示器租赁');
INSERT INTO `item_class` VALUES ('3', '0', '显卡租赁');

-- ----------------------------
-- Table structure for item_imgs
-- ----------------------------
DROP TABLE IF EXISTS `item_imgs`;
CREATE TABLE `item_imgs` (
  `item_id` int(11) NOT NULL COMMENT '项目名称',
  `img_url` text NOT NULL COMMENT '图片路径'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of item_imgs
-- ----------------------------
INSERT INTO `item_imgs` VALUES ('2', '/upload/itemImg/20180619/1LUjRBl1LSzcCKdz0f0qV13xKbtY42WLzCwJOiN4.png');
INSERT INTO `item_imgs` VALUES ('2', '/upload/itemImg/20180619/aFaknqND2dPvKmYdLqdYQ349XkzgL5EO3DpQRzuu.png');
INSERT INTO `item_imgs` VALUES ('2', '/upload/itemImg/20180619/QVTYc6BclOv8DrS6Lmspw0tNDZ0ioiZNXt7bXX0u.jpeg');
INSERT INTO `item_imgs` VALUES ('3', '/upload/itemImg/20180619/zRWai7uObeAYwHBeWLdtDVCGtKAtuwaA25a1tk7P.png');
INSERT INTO `item_imgs` VALUES ('3', '/upload/itemImg/20180619/E3FZ0tfhPx0mG12ZjFBBDzCo6YHwAPoK8lL4EMCh.png');
INSERT INTO `item_imgs` VALUES ('3', '/upload/itemImg/20180619/xyz0H9oSJjtHp4iiCC2LtySBnGhaNRwGgRLn6Y6O.jpeg');
INSERT INTO `item_imgs` VALUES ('4', '/upload/itemImg/20180619/QI194eA7WeHmxO9nithvdT3g9LjdmXKSa44494u5.png');
INSERT INTO `item_imgs` VALUES ('4', '/upload/itemImg/20180619/1VjU3VIvB8ZM0SazfhmdaZdGnXTpX3ZmPRBhsODZ.png');
INSERT INTO `item_imgs` VALUES ('4', '/upload/itemImg/20180619/Totg0jkiFn8jnICUwBJ7wE6l0YBNe0Kwbf2PMTdm.png');
INSERT INTO `item_imgs` VALUES ('5', '/upload/itemImg/20180619/YZ8aDIiv5fLgAH5kThP7fBqvp7rrvY7cTgb1P317.png');
INSERT INTO `item_imgs` VALUES ('5', '/upload/itemImg/20180619/HFB48DJBJTj0DEL0GOCfD1erHWrEuDi6eaI2VoDm.png');
INSERT INTO `item_imgs` VALUES ('5', '/upload/itemImg/20180619/u4FQnvWkcQTukXyringcSFB2ty4q1dJ80sX6BbAb.png');
INSERT INTO `item_imgs` VALUES ('6', '/upload/itemImg/20180619/28bC0Tf01N9HldV41jmfp02AC7PyaOJPy8496zRi.png');
INSERT INTO `item_imgs` VALUES ('6', '/upload/itemImg/20180619/aDJMrDYe06gllwSrkAujCF5gBJFzZSFo05cMcAZ0.png');
INSERT INTO `item_imgs` VALUES ('6', '/upload/itemImg/20180619/Id2sz833Zicl3EJY5GQqD17gDHelEBdEhugePNJl.png');
INSERT INTO `item_imgs` VALUES ('7', '/upload/itemImg/20180619/s1fYo3bOeXjLCUykykFIVOOcRyXCbQbB0RBaNsvO.png');
INSERT INTO `item_imgs` VALUES ('7', '/upload/itemImg/20180619/nugLjKeO6hGhkvQVWZwHqsM0Q4VVNYyO4i2hJR9L.png');
INSERT INTO `item_imgs` VALUES ('7', '/upload/itemImg/20180619/GmMhyV6UCLgA5zlCKwWk4kmBORotpNoSGR0ctSRA.png');
INSERT INTO `item_imgs` VALUES ('8', '/upload/itemImg/20180619/4ESJghEh9hdHB8dBmkHqmWxkWJugjGBisiy0UfEc.png');
INSERT INTO `item_imgs` VALUES ('8', '/upload/itemImg/20180619/nELKB3ryVXnB9av6VUu9TJpIkQr6xJQ9QCVrAPsa.png');
INSERT INTO `item_imgs` VALUES ('8', '/upload/itemImg/20180619/YMuqIRvfv4Jxbx31xMHW67TWCQ1GbY4Jf5jkplDG.png');
INSERT INTO `item_imgs` VALUES ('9', '/upload/itemImg/20180619/MlvTYAEn4gVp3Iby4VEY8g0F1XokPF6zmVd0XlSX.png');
INSERT INTO `item_imgs` VALUES ('9', '/upload/itemImg/20180619/CA9WHItfZDqrmXdqUV7g7haJukyTT3XsAVTcidOd.png');
INSERT INTO `item_imgs` VALUES ('9', '/upload/itemImg/20180619/6FGkkRJ1wFGHnGwUI7yApK5h2xJqxWc1NeKFEqag.png');
INSERT INTO `item_imgs` VALUES ('10', '/upload/itemImg/20180619/cmza2wOQmBgUJr7uy1Q23yhZbzM8oYqBHx4nrDgG.png');
INSERT INTO `item_imgs` VALUES ('10', '/upload/itemImg/20180619/IDccKrttaseKl0vdf7oeqN2lIvrUsMDnhDVQA61N.png');
INSERT INTO `item_imgs` VALUES ('10', '/upload/itemImg/20180619/Aa1nl0HpleJadfs1TAs4NemG7vbs53SvTDR4vlF4.png');
INSERT INTO `item_imgs` VALUES ('11', '/upload/itemImg/20180619/l0tbQhDwvgI202MsHmCHz2jPVrYuJ5Ck3ztvydxo.png');
INSERT INTO `item_imgs` VALUES ('11', '/upload/itemImg/20180619/hFt07TdYrGLXQbGbJuMmkWvW6QVucCAwoNDKvgYw.png');
INSERT INTO `item_imgs` VALUES ('11', '/upload/itemImg/20180619/3Feo3kpVCqb5v8N7Di1cWTUrI2cAmlWYF5fbiRm1.png');

-- ----------------------------
-- Table structure for item_lists
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of item_lists
-- ----------------------------
INSERT INTO `item_lists` VALUES ('2', '网吧 I5 8G 1063', '1', '0', '210', '/upload/itemImg/20180619/FbSQt577QSZVnUT5PRsb1YwDQgdXv6cmzM0hAE55.png', '<p>网吧 I5 8G 1063</p>', '<p>网吧 I5 8G 1063</p>', '1', '2018-06-04 15:31:18', '2018-06-25 13:47:32');
INSERT INTO `item_lists` VALUES ('3', '网吧 I5 16G 1063', '1', '0', '248', '/upload/itemImg/20180619/mAVDiPtsTpgco2zMGBTv8MY6VHmyQxPekMldTzuZ.png', '<p>网吧 I5 16G 1063</p>', '<p>网吧 I5 16G 1063</p>', '1', '2018-06-04 15:52:23', '2018-06-25 13:47:48');
INSERT INTO `item_lists` VALUES ('4', '网吧 I5 16G 1070TI', '1', '0', '340', '/upload/itemImg/20180619/b8to4EpQGg4NyBiOc0yX7QLZokJTQ5o4muHSLiH6.png', '<p>网吧 I5 16G 1070TI</p>', '<p>网吧 I5 16G 1070TI</p>', '1', '2018-06-04 15:54:39', '2018-06-25 13:48:00');
INSERT INTO `item_lists` VALUES ('5', '网吧 I7 16G 1070TI', '1', '0', '398', '/upload/itemImg/20180619/p6B5Yd9V7WFnkOqO8f310jf0QTLAMLoUMjJ7KJH9.png', '<p>网吧 I7 16G 1070TI</p>', '<p>网吧 I7 16G 1070TI</p>', '1', '2018-06-04 15:56:40', '2018-06-25 13:48:09');
INSERT INTO `item_lists` VALUES ('6', '网吧 I7 16G 1080TI', '1', '0', '530', '/upload/itemImg/20180619/YCzxB7b0XWk7Y88QW1WDgl3uOmSxIdCIKhEvu03t.png', '<p>网吧 I7 16G 1080TI</p>', '<p>网吧 I7 16G 1080TI</p>', '1', '2018-06-04 16:07:02', '2018-06-25 13:48:18');
INSERT INTO `item_lists` VALUES ('7', '网吧整套+电竞显示器 1K 165HZ', '2', '0', '112', '/upload/itemImg/20180619/vEZTvGPQL20CYDGESmqVGFfVinHOBD34xyqpVZq6.png', '<p>网吧整套 电竞显示器 1K 165HZ</p>', '<p>网吧整套 电竞显示器 1K 165HZ</p>', '1', '2018-06-04 16:10:50', '2018-06-25 13:48:27');
INSERT INTO `item_lists` VALUES ('8', '网吧整套+电竞显示器 2K 144HZ', '2', '0', '168', '/upload/itemImg/20180619/mBKzioGTrgmhsGJs51QWu4bjQTEw9j5EPhI0qNfR.png', '<p>网吧整套 电竞显示器 2K 144HZ 需在整套基础上额外购买</p>', '<p>网吧整套 电竞显示器 2K 144HZ</p>', '1', '2018-06-04 16:21:43', '2018-06-25 13:48:34');
INSERT INTO `item_lists` VALUES ('9', '网吧单租1063', '3', '0', '118', '/upload/itemImg/20180619/HjKAGNjILvGzLBDpAxfJfc4GaUQZzeksxAuvhRvC.png', '<p>网吧单租1063</p>', '<p><span style=\"white-space: normal;\"></span><span style=\"white-space: normal;\">网吧单租1063</span></p>', '1', '2018-06-04 16:24:34', '2018-06-25 13:48:43');
INSERT INTO `item_lists` VALUES ('10', '网吧单租1070TI', '3', '0', '218', '/upload/itemImg/20180619/NC14cRgzIqQOpq3S8lyy6CBEdtG4siR8ljjDiDcW.png', '<p>网吧单租1070TI</p>', '<p>网吧单租1070TI</p>', '1', '2018-06-04 16:26:21', '2018-06-25 13:48:54');
INSERT INTO `item_lists` VALUES ('11', '网吧单租1080TI', '3', '0', '368', '/upload/itemImg/20180619/vSZv61iiTn5bi2yyCIYi40QlHUsFcpda1mJcHMJc.png', '<p>网吧单租1080TI</p>', '<p>网吧单租1080TI</p>', '1', '2018-06-04 16:27:42', '2018-06-25 13:49:02');

-- ----------------------------
-- Table structure for item_sku
-- ----------------------------
DROP TABLE IF EXISTS `item_sku`;
CREATE TABLE `item_sku` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of item_sku
-- ----------------------------

-- ----------------------------
-- Table structure for log_sms
-- ----------------------------
DROP TABLE IF EXISTS `log_sms`;
CREATE TABLE `log_sms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tel` varchar(15) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of log_sms
-- ----------------------------
INSERT INTO `log_sms` VALUES ('1', '17791867393', '22020187', '2018-05-31 21:10:32');
INSERT INTO `log_sms` VALUES ('2', '18192125083', '607101414', '2018-06-01 09:07:41');
INSERT INTO `log_sms` VALUES ('3', '18710331402', '607101027', '2018-06-06 15:31:42');
INSERT INTO `log_sms` VALUES ('4', '15929446655', '606614113', '2018-06-06 16:07:47');
INSERT INTO `log_sms` VALUES ('5', '15929446655', '606614113', '2018-06-06 16:09:00');
INSERT INTO `log_sms` VALUES ('6', '18092216950', '607096267', '2018-06-06 16:40:58');
INSERT INTO `log_sms` VALUES ('7', '15135988999', '2073513286', '2018-06-08 11:19:12');
INSERT INTO `log_sms` VALUES ('8', '13772736665', '607080374', '2018-06-12 11:28:40');
INSERT INTO `log_sms` VALUES ('9', '18793000005', '2073513265', '2018-06-13 10:20:57');
INSERT INTO `log_sms` VALUES ('10', '15393028877', '1017445460', '2018-06-14 16:45:04');
INSERT INTO `log_sms` VALUES ('11', '13993398338', '2073513289', '2018-06-15 17:23:08');
INSERT INTO `log_sms` VALUES ('12', '15366088882', '2045638932', '2018-06-19 20:24:36');
INSERT INTO `log_sms` VALUES ('13', '15332419878', '1863527346', '2018-06-19 21:28:59');
INSERT INTO `log_sms` VALUES ('14', '18195421102', '-1232293467', '2018-06-20 11:36:50');
INSERT INTO `log_sms` VALUES ('15', '18913019126', '1968736875', '2018-06-20 13:21:22');
INSERT INTO `log_sms` VALUES ('16', '18913019126', '828170287', '2018-06-20 15:56:54');
INSERT INTO `log_sms` VALUES ('17', '18700787240', '22020227', '2018-06-20 17:04:08');
INSERT INTO `log_sms` VALUES ('18', '18806133671', '2045675032', '2018-06-25 22:50:43');
INSERT INTO `log_sms` VALUES ('19', '15580802345', '1996059145', '2018-06-26 09:28:37');
INSERT INTO `log_sms` VALUES ('20', '18629292766', '22031116', '2018-06-26 22:50:23');
INSERT INTO `log_sms` VALUES ('21', '15021237746', '22400169', '2018-06-27 11:30:14');

-- ----------------------------
-- Table structure for order_detail
-- ----------------------------
DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL COMMENT '商品id',
  `start_time` timestamp NOT NULL COMMENT '开始时间',
  `rent_month` int(11) NOT NULL COMMENT '出租月数',
  `rent_num` int(11) NOT NULL COMMENT '出租数量',
  `month_rent_price` int(11) NOT NULL COMMENT '月租金',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_detail
-- ----------------------------
INSERT INTO `order_detail` VALUES ('1', '10', '2018-06-25 00:00:00', '12', '26', '5668');
INSERT INTO `order_detail` VALUES ('2', '8', '2018-06-25 00:00:00', '12', '26', '4368');
INSERT INTO `order_detail` VALUES ('3', '8', '2018-06-26 00:00:00', '12', '16', '2688');
INSERT INTO `order_detail` VALUES ('4', '10', '2018-06-26 00:00:00', '12', '16', '3488');

-- ----------------------------
-- Table structure for order_list
-- ----------------------------
DROP TABLE IF EXISTS `order_list`;
CREATE TABLE `order_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `order_id` varchar(32) NOT NULL COMMENT '订单号',
  `order_detail` text NOT NULL COMMENT '订单明细id 关联order_detail表 逗号分割',
  `order_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '订单状态 1下单 2取消 3完成',
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_id` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_list
-- ----------------------------
INSERT INTO `order_list` VALUES ('1', '10', '105b30d05d04bc1827', '1,2', '2', '甘肃省平凉市崆峒区潮人网咖 赵旭辉 13993398338', '2018-06-25 19:22:05', null);
INSERT INTO `order_list` VALUES ('2', '10', '105b31a013a52d5954', '3,4', '1', '甘肃省平凉市崆峒区潮人网咖 赵旭辉 13993398338', '2018-06-26 10:08:19', null);

-- ----------------------------
-- Table structure for page_lists
-- ----------------------------
DROP TABLE IF EXISTS `page_lists`;
CREATE TABLE `page_lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) NOT NULL COMMENT '单页名称',
  `page_detail` text NOT NULL COMMENT '单页内容',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of page_lists
-- ----------------------------
INSERT INTO `page_lists` VALUES ('1', '租赁规则', '<p style=\"text-align: center;\">\n    <img src=\"http://www.qzl8.com/upload/itemContent/20180606/z7o0kkjEgvxXYMv6MBv17UgojR6p0YsFN888pOEB.jpeg\"/>\n</p>\n<p>\n    乙方应向甲方提供网络文化经营许可证复印件、营业执照复印件、法定代表人身份证复印件以及签署委托代付款证明。\n</p>\n<p>\n    <br/>\n</p>\n<p>\n    租赁期内，按协议之约定按时、足额向甲方支付租金。在约定日未足额支付租金的，每日需要向甲方支付逾期手续费，金额为本合同约定的每月租金总金额的10‰/日；\n</p>\n<p>\n    <br/>\n</p>\n<p>\n    租赁期内，乙方应合理使用，妥善保管承租的电脑设备；负责电脑设备日常的保洁、摆放整理工作。\n</p>\n<p>\n    <br/>\n</p>\n<p>\n    乙方发现电脑设备发生故障或者损坏后，应当立即通知甲方，如果属人为损坏，在赔偿直接责任人没有做出赔偿前，由乙方先向甲方按损毁设备原值赔偿甲方损失，乙方对甲方进行赔偿后具有向直接责任人请求赔偿的权利。若设备在租赁期间因任何原因丢失或实质性报废，乙方应在情形发生之日起 7 日内按照附件一所列设备等同价值或当时设备市场价值进行赔偿。\n</p>\n<p>\n    <br/>\n</p>\n<p>\n    租赁期间，租赁物遗失、失窃、非正常原因损坏的(包括火灾、水灾等)，由乙方根据国家会计准则折旧后的设备价值赔偿。\n</p>\n<p>\n    <br/>\n</p>\n<p>\n    租赁期内，乙方除自用外，不得对承租电脑作任何处分（包括但不限于转让、转租、抵押、质押、赠与、信托、托管，转移地点）。\n</p>\n<p>\n    <br/>\n</p>\n<p>\n    租赁期内，乙方保证遵守中华人民共和国各项法律、法规，保证不被勒令停业整顿、吊销网吧经营许可证；保证租赁期内正常营业、不得无故歇业、停业。\n</p>\n<p>\n    <br/>\n</p>\n<p>\n    租赁期内，乙方不得与其他组织或个人进行本协议同类业务的合作，否则将视为乙方违约。\n</p>\n<p>\n    <br/>\n</p>\n<p>\n    在订单约定租期结束前承租方提前退租所产生的运费，以及由承租方人为原因导致的设备退回或维修所产生的费用均由承租方承担，若正常租期到期或正常硬件故障导致的设备退回或维修则由出租方承担；\n</p>', '2018-05-17 02:15:01', '2018-06-19 17:05:08');
INSERT INTO `page_lists` VALUES ('2', '电子合同签署流程', '<p>法大大个人版签署流程 <a href=\"http://www.qzl8.com/static/法大大个人认证流程.mp4\" target=\"_blank\">链接</a></p><p>法大大企业版签署流程 <a href=\"http://www.qzl8.com/static/法大大企业法人认证流程.pptx\" target=\"_blank\">链接</a></p>', '2018-05-17 10:56:07', '2018-06-20 17:14:05');
INSERT INTO `page_lists` VALUES ('3', '关于我们', '<p>公司名称：陕西趣租乐网络科技有限公司</p><p>账号：61050176620000000320</p><p>开户银行：中国建设银行股份有限公司西安锦业一路支行</p><p><br/></p>', '2018-06-19 17:03:00', '2018-06-20 17:19:57');
