/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : huaxihealth

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-05-16 23:54:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `huaxi_admin`
-- ----------------------------
DROP TABLE IF EXISTS `huaxi_admin`;
CREATE TABLE `huaxi_admin` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` int(11) DEFAULT NULL COMMENT '角色（1: 超级管理员; 0:普通管理员）',
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_login` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of huaxi_admin
-- ----------------------------
INSERT INTO `huaxi_admin` VALUES ('1', '1', 'admin', '$2y$10$Mk4BtG4FAbEdkDxwqFkEhOTLzMHLNzi/Cmg.hzhWR8INm8JWxBEgq', null, '2017-12-17 15:33:07', '2018-05-16 13:57:51', '2018-05-16 13:57:51');
INSERT INTO `huaxi_admin` VALUES ('3', null, 'jkjun', '$2y$10$ZJgCpSCmx2gzQcXaTB34Ue.OiwttCMvaYGeKP9CDxTnwsuuvULJqW', null, '2017-12-17 16:01:08', '2017-12-28 21:38:55', '2017-12-28 21:38:55');
INSERT INTO `huaxi_admin` VALUES ('4', null, 'admin001', '$2y$10$dpEljg1cGCYBErXUDWqjve3XJ7hEFtFuPsa0lZXRaFvgoK/7i2J2y', null, '2018-04-06 23:13:33', '2018-05-03 22:15:12', '2018-05-03 22:15:12');

-- ----------------------------
-- Table structure for `huaxi_committee`
-- ----------------------------
DROP TABLE IF EXISTS `huaxi_committee`;
CREATE TABLE `huaxi_committee` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '专家委员会',
  `type` int(11) DEFAULT '0' COMMENT '委员类型，0主任委员 1 委员 2.。。',
  `photo` varchar(200) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `academic_title` varchar(100) DEFAULT NULL COMMENT '职称',
  `education` int(1) DEFAULT '0' COMMENT '学历0学士1硕士2博士3博士后4访问学者',
  `brief` varchar(2000) DEFAULT NULL COMMENT '个人简介',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of huaxi_committee
-- ----------------------------

-- ----------------------------
-- Table structure for `huaxi_cooperation`
-- ----------------------------
DROP TABLE IF EXISTS `huaxi_cooperation`;
CREATE TABLE `huaxi_cooperation` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '对外合作',
  `title` varchar(200) DEFAULT NULL,
  `content` longtext COMMENT '动态内容',
  `picture` varchar(1500) NOT NULL COMMENT '动态相关图片',
  `statue` int(1) DEFAULT '0' COMMENT '状态，0正常1下架',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of huaxi_cooperation
-- ----------------------------

-- ----------------------------
-- Table structure for `huaxi_datebook`
-- ----------------------------
DROP TABLE IF EXISTS `huaxi_datebook`;
CREATE TABLE `huaxi_datebook` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '大事记',
  `title` varchar(200) DEFAULT NULL,
  `content` varchar(1000) DEFAULT NULL COMMENT '事记内容',
  `picture` varchar(500) NOT NULL COMMENT '相关图片（1张）',
  `statue` int(1) DEFAULT '0' COMMENT '状态，0正常1下架',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of huaxi_datebook
-- ----------------------------

-- ----------------------------
-- Table structure for `huaxi_discuss`
-- ----------------------------
DROP TABLE IF EXISTS `huaxi_discuss`;
CREATE TABLE `huaxi_discuss` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '学术研讨',
  `title` varchar(200) DEFAULT NULL,
  `content` longtext COMMENT '动态内容',
  `picture` varchar(1500) NOT NULL COMMENT '动态相关图片',
  `statue` int(1) DEFAULT '0' COMMENT '状态，0正常1下架',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of huaxi_discuss
-- ----------------------------

-- ----------------------------
-- Table structure for `huaxi_fund`
-- ----------------------------
DROP TABLE IF EXISTS `huaxi_fund`;
CREATE TABLE `huaxi_fund` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '投资与基金',
  `title` varchar(200) DEFAULT NULL,
  `content` longtext COMMENT '动态内容',
  `picture` varchar(1500) NOT NULL COMMENT '动态相关图片',
  `statue` int(1) DEFAULT '0' COMMENT '状态，0正常1下架',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of huaxi_fund
-- ----------------------------

-- ----------------------------
-- Table structure for `huaxi_hatch`
-- ----------------------------
DROP TABLE IF EXISTS `huaxi_hatch`;
CREATE TABLE `huaxi_hatch` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '孵化培育',
  `title` varchar(200) DEFAULT NULL,
  `content` longtext COMMENT '动态内容',
  `picture` varchar(1500) NOT NULL COMMENT '动态相关图片',
  `statue` int(1) DEFAULT '0' COMMENT '状态，0正常1下架',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of huaxi_hatch
-- ----------------------------

-- ----------------------------
-- Table structure for `huaxi_industry`
-- ----------------------------
DROP TABLE IF EXISTS `huaxi_industry`;
CREATE TABLE `huaxi_industry` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '产业动态',
  `title` varchar(200) DEFAULT NULL,
  `content` longtext COMMENT '动态内容',
  `picture` varchar(1500) NOT NULL COMMENT '动态相关图片',
  `statue` int(1) DEFAULT '0' COMMENT '状态，0正常1下架',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of huaxi_industry
-- ----------------------------

-- ----------------------------
-- Table structure for `huaxi_news`
-- ----------------------------
DROP TABLE IF EXISTS `huaxi_news`;
CREATE TABLE `huaxi_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '公司新闻发布',
  `title` varchar(200) DEFAULT NULL,
  `content` longtext COMMENT '新闻内容',
  `picture` varchar(1500) NOT NULL COMMENT '新闻相关图片',
  `statue` int(1) DEFAULT '0' COMMENT '状态，0正常1下架',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of huaxi_news
-- ----------------------------

-- ----------------------------
-- Table structure for `huaxi_notes`
-- ----------------------------
DROP TABLE IF EXISTS `huaxi_notes`;
CREATE TABLE `huaxi_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '公告板',
  `content` varchar(1000) DEFAULT NULL COMMENT '公告内容',
  `statue` int(1) DEFAULT '0' COMMENT '状态，0正常1下架',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of huaxi_notes
-- ----------------------------

-- ----------------------------
-- Table structure for `huaxi_policy`
-- ----------------------------
DROP TABLE IF EXISTS `huaxi_policy`;
CREATE TABLE `huaxi_policy` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '政策聚焦',
  `title` varchar(200) DEFAULT NULL,
  `content` longtext COMMENT '动态内容',
  `picture` varchar(1500) NOT NULL COMMENT '动态相关图片',
  `statue` int(1) DEFAULT '0' COMMENT '状态，0正常1下架',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of huaxi_policy
-- ----------------------------

-- ----------------------------
-- Table structure for `huaxi_recruit`
-- ----------------------------
DROP TABLE IF EXISTS `huaxi_recruit`;
CREATE TABLE `huaxi_recruit` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '招聘信息发布',
  `title` varchar(200) DEFAULT NULL,
  `content` longtext COMMENT '招聘内容',
  `picture` varchar(1000) NOT NULL COMMENT '招聘相关图片',
  `statue` int(1) DEFAULT '0' COMMENT '状态，0正常1下架',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of huaxi_recruit
-- ----------------------------

-- ----------------------------
-- Table structure for `huaxi_team`
-- ----------------------------
DROP TABLE IF EXISTS `huaxi_team`;
CREATE TABLE `huaxi_team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT '姓名',
  `byname` varchar(100) DEFAULT NULL COMMENT '头衔',
  `brief` varchar(1000) DEFAULT NULL COMMENT '个人简介',
  `type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of huaxi_team
-- ----------------------------

-- ----------------------------
-- Table structure for `huaxi_webinfo`
-- ----------------------------
DROP TABLE IF EXISTS `huaxi_webinfo`;
CREATE TABLE `huaxi_webinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ename` varchar(500) DEFAULT NULL COMMENT '公司名称',
  `byname` varchar(500) DEFAULT NULL COMMENT '公司别名',
  `ebrief` longtext COMMENT '公司简介',
  `structure` varchar(500) DEFAULT NULL COMMENT '组织架构--上传图片',
  `tel` varchar(100) DEFAULT NULL COMMENT '联系电话',
  `fax` varchar(100) DEFAULT NULL COMMENT '传真',
  `email` varchar(100) DEFAULT NULL COMMENT '联系邮箱',
  `postcode` varchar(50) DEFAULT NULL COMMENT '邮编',
  `address` varchar(1000) DEFAULT NULL COMMENT '公司地址',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of huaxi_webinfo
-- ----------------------------
INSERT INTO `huaxi_webinfo` VALUES ('1', null, null, '1、沙发士大夫<br>2、噶水电费&nbsp;&nbsp;&nbsp;胜多负少', null, '17302813643', '3456789', 'test@qq.com', '653002', 'testaddress', '2018-05-16 22:08:29', '2018-05-16 14:15:03');
