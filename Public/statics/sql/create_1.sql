/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : saving

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-07-10 15:13:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for buy
-- ----------------------------
DROP TABLE IF EXISTS `buy`;
CREATE TABLE `buy` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dealer_id` int(11) unsigned NOT NULL,
  `dealer_name` char(255) NOT NULL,
  `money_total` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '总金额',
  `number_total` int(11) unsigned NOT NULL COMMENT '产品数量',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态  1正常 2软删除',
  `add_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for buy_project
-- ----------------------------
DROP TABLE IF EXISTS `buy_project`;
CREATE TABLE `buy_project` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `buy_id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  `number` char(10) NOT NULL DEFAULT '0',
  `price` int(10) unsigned NOT NULL DEFAULT '0',
  `money` int(10) unsigned NOT NULL DEFAULT '0',
  `buy_type` char(255) DEFAULT NULL COMMENT '支付类型',
  `remark` char(255) DEFAULT NULL COMMENT '备注',
  `add_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for dealer
-- ----------------------------
DROP TABLE IF EXISTS `dealer`;
CREATE TABLE `dealer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '经销商名称',
  `address` char(255) DEFAULT NULL COMMENT '公司地址',
  `contact_name` char(255) DEFAULT NULL COMMENT '联系人姓名',
  `contact_tel` char(255) DEFAULT NULL COMMENT '联系人电话',
  `type` tinyint(1) unsigned NOT NULL COMMENT '商家类型  1卖出  2买入',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `status` varchar(255) DEFAULT '1' COMMENT '状态  1正常 2软删除',
  `add_time` datetime DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for project
-- ----------------------------
DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(255) NOT NULL COMMENT '产品名称',
  `number` int(10) NOT NULL DEFAULT '0' COMMENT '产品总数',
  `unit` int(11) unsigned NOT NULL COMMENT '单位',
  `standard` char(255) NOT NULL COMMENT '规格',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态  1正常 2软删除',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sale
-- ----------------------------
DROP TABLE IF EXISTS `sale`;
CREATE TABLE `sale` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dealer_id` int(11) unsigned NOT NULL,
  `dealer_name` char(255) NOT NULL,
  `money_total` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '总金额',
  `number_total` int(11) unsigned NOT NULL COMMENT '产品数量',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态  1正常 2软删除',
  `add_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sale_project
-- ----------------------------
DROP TABLE IF EXISTS `sale_project`;
CREATE TABLE `sale_project` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sale_id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  `number` char(10) NOT NULL DEFAULT '0',
  `price` int(10) unsigned NOT NULL DEFAULT '0',
  `money` int(10) unsigned NOT NULL DEFAULT '0',
  `sale_type` char(255) DEFAULT NULL COMMENT '支付类型',
  `remark` char(255) DEFAULT NULL COMMENT '备注',
  `add_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for unit
-- ----------------------------
DROP TABLE IF EXISTS `unit`;
CREATE TABLE `unit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '规格名称',
  `add_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(255) NOT NULL,
  `password` char(255) NOT NULL,
  `add_time` datetime NOT NULL,
  `login_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
