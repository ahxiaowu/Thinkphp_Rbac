/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50529
Source Host           : localhost:3306
Source Database       : rbac

Target Server Type    : MYSQL
Target Server Version : 50529
File Encoding         : 65001

Date: 2013-11-29 16:04:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tp_access`
-- ----------------------------
DROP TABLE IF EXISTS `tp_access`;
CREATE TABLE `tp_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_access
-- ----------------------------
INSERT INTO `tp_access` VALUES ('2', '1', '1', null);
INSERT INTO `tp_access` VALUES ('1', '8', '3', null);
INSERT INTO `tp_access` VALUES ('1', '6', '3', null);
INSERT INTO `tp_access` VALUES ('1', '5', '2', null);
INSERT INTO `tp_access` VALUES ('1', '1', '1', null);
INSERT INTO `tp_access` VALUES ('2', '4', '2', null);
INSERT INTO `tp_access` VALUES ('2', '5', '2', null);
INSERT INTO `tp_access` VALUES ('2', '6', '3', null);
INSERT INTO `tp_access` VALUES ('2', '7', '3', null);
INSERT INTO `tp_access` VALUES ('2', '8', '3', null);

-- ----------------------------
-- Table structure for `tp_node`
-- ----------------------------
DROP TABLE IF EXISTS `tp_node`;
CREATE TABLE `tp_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_node
-- ----------------------------
INSERT INTO `tp_node` VALUES ('1', 'Admin', '后台应用', '1', null, '1', '0', '1');
INSERT INTO `tp_node` VALUES ('2', 'Index', '前端应用', '1', null, '1', '0', '1');
INSERT INTO `tp_node` VALUES ('4', 'Index', '后台首页', '1', null, '1', '1', '2');
INSERT INTO `tp_node` VALUES ('5', 'Rbac', 'RBAC权限控制', '1', null, '1', '1', '2');
INSERT INTO `tp_node` VALUES ('6', 'role', '角色列表', '1', null, '1', '5', '3');
INSERT INTO `tp_node` VALUES ('7', 'index', '用户列表', '1', null, '1', '5', '3');
INSERT INTO `tp_node` VALUES ('8', 'node', '节点列表', '1', null, '1', '5', '3');

-- ----------------------------
-- Table structure for `tp_role`
-- ----------------------------
DROP TABLE IF EXISTS `tp_role`;
CREATE TABLE `tp_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_role
-- ----------------------------
INSERT INTO `tp_role` VALUES ('1', 'Manager', null, '1', '普通管理员');
INSERT INTO `tp_role` VALUES ('2', 'Admin', null, '1', '管理员');

-- ----------------------------
-- Table structure for `tp_role_user`
-- ----------------------------
DROP TABLE IF EXISTS `tp_role_user`;
CREATE TABLE `tp_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_role_user
-- ----------------------------
INSERT INTO `tp_role_user` VALUES ('1', '2');
INSERT INTO `tp_role_user` VALUES ('1', '3');
INSERT INTO `tp_role_user` VALUES ('2', '3');

-- ----------------------------
-- Table structure for `tp_user`
-- ----------------------------
DROP TABLE IF EXISTS `tp_user`;
CREATE TABLE `tp_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `logintime` int(10) unsigned NOT NULL DEFAULT '0',
  `loginip` varchar(30) NOT NULL,
  `lock` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_user
-- ----------------------------
INSERT INTO `tp_user` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1385692184', '127.0.0.1', '0');
INSERT INTO `tp_user` VALUES ('2', 'lisi', '96e79218965eb72c92a549dd5a330112', '1385712105', '127.0.0.1', '0');
INSERT INTO `tp_user` VALUES ('3', 'bb', '21ad0bd836b90d08f4cf640b4c298e7c', '1385712165', '127.0.0.1', '0');
