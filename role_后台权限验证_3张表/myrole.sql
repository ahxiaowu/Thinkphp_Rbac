/*
Navicat MySQL Data Transfer

Source Server         : 本机
Source Server Version : 50529
Source Host           : localhost:3306
Source Database       : myrole

Target Server Type    : MYSQL
Target Server Version : 50529
File Encoding         : 65001

Date: 2014-04-25 17:04:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tp_auth
-- ----------------------------
DROP TABLE IF EXISTS `tp_auth`;
CREATE TABLE `tp_auth` (
  `auth_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `auth_name` varchar(20) NOT NULL COMMENT '权限名称',
  `auth_pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父级ID',
  `auth_c` varchar(32) NOT NULL DEFAULT '' COMMENT '模块',
  `auth_a` varchar(32) NOT NULL DEFAULT '' COMMENT '操作方法',
  `auth_path` varchar(32) NOT NULL DEFAULT '' COMMENT '全路径',
  `auth_level` tinyint(10) unsigned NOT NULL DEFAULT '0' COMMENT '权限级别[0,1,2]',
  PRIMARY KEY (`auth_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='权限表';

-- ----------------------------
-- Records of tp_auth
-- ----------------------------
INSERT INTO `tp_auth` VALUES ('1', '商品管理', '0', '', '', '1', '0');
INSERT INTO `tp_auth` VALUES ('2', '商品列表', '1', 'Goods', 'index', '1-2', '1');
INSERT INTO `tp_auth` VALUES ('3', '添加商品', '1', 'Goods', 'add', '1-3', '1');
INSERT INTO `tp_auth` VALUES ('4', '用户评论', '1', 'User', 'add', '1-4', '1');
INSERT INTO `tp_auth` VALUES ('5', '订单管理', '0', '', '', '5', '0');
INSERT INTO `tp_auth` VALUES ('6', '订单列表', '5', 'Order', 'index', '5-6', '1');
INSERT INTO `tp_auth` VALUES ('7', '订单查询', '5', 'Order', 'search', '5-7', '1');
INSERT INTO `tp_auth` VALUES ('8', '文章管理', '0', '', '', '8', '0');
INSERT INTO `tp_auth` VALUES ('9', '文章列表', '8', 'Article', 'index', '8-9', '1');
INSERT INTO `tp_auth` VALUES ('10', '权限管理', '0', '', '', '10', '0');
INSERT INTO `tp_auth` VALUES ('11', '管理员列表', '10', 'Manager', 'index', '10-11', '1');
INSERT INTO `tp_auth` VALUES ('12', '角色管理', '10', 'Role', 'index', '10-12', '1');
INSERT INTO `tp_auth` VALUES ('13', '权限管理', '10', 'Auth', 'index', '10-13', '1');
INSERT INTO `tp_auth` VALUES ('16', '商品修改', '2', 'Goods', 'edit', '1-2-16', '2');
INSERT INTO `tp_auth` VALUES ('15', '商品类型', '1', 'Goods', 'type', '1-15', '1');
INSERT INTO `tp_auth` VALUES ('17', '商品删除', '2', 'Goods', 'del', '1-2-17', '2');

-- ----------------------------
-- Table structure for tp_demo_user
-- ----------------------------
DROP TABLE IF EXISTS `tp_demo_user`;
CREATE TABLE `tp_demo_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uname` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_demo_user
-- ----------------------------
INSERT INTO `tp_demo_user` VALUES ('1', '111');
INSERT INTO `tp_demo_user` VALUES ('2', '222');
INSERT INTO `tp_demo_user` VALUES ('3', '333');

-- ----------------------------
-- Table structure for tp_role
-- ----------------------------
DROP TABLE IF EXISTS `tp_role`;
CREATE TABLE `tp_role` (
  `role_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(20) NOT NULL DEFAULT '' COMMENT '角色名称',
  `role_auth_ids` varchar(200) NOT NULL COMMENT '权限ID',
  `role_auth_ac` text COMMENT '模块-操作',
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='角色表';

-- ----------------------------
-- Records of tp_role
-- ----------------------------
INSERT INTO `tp_role` VALUES ('1', '经理', '1,2,17,3,5,6,7,8,9,10,11', 'Goods-index,Goods-add,Order-index,Order-search,Article-index,Manager-index,Goods-del');
INSERT INTO `tp_role` VALUES ('2', '员工', '1,2,16,3,4,5,6', 'Goods-index,Goods-add,User-add,Order-index,Goods-edit');

-- ----------------------------
-- Table structure for tp_user
-- ----------------------------
DROP TABLE IF EXISTS `tp_user`;
CREATE TABLE `tp_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `pass` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `utime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '时间',
  `role_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '角色ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of tp_user
-- ----------------------------
INSERT INTO `tp_user` VALUES ('1', 'admin', '123', '0', '0');
INSERT INTO `tp_user` VALUES ('2', 'user1', '123', '0', '1');
INSERT INTO `tp_user` VALUES ('3', 'user2', '123', '0', '2');
