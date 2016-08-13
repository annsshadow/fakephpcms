/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : jisuanji

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2016-03-30 03:29:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ls_admin_backup
-- ----------------------------
DROP TABLE IF EXISTS `ls_admin_backup`;
CREATE TABLE `ls_admin_backup` (
  `backup_id` int(5) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(50) NOT NULL,
  PRIMARY KEY (`backup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ls_admin_backup
-- ----------------------------

-- ----------------------------
-- Table structure for ls_admin_log
-- ----------------------------
DROP TABLE IF EXISTS `ls_admin_log`;
CREATE TABLE `ls_admin_log` (
  `log_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `role_id` int(5) NOT NULL,
  `role_name` varchar(30) NOT NULL,
  `behavior` varchar(50) NOT NULL,
  `operate_time` datetime NOT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=189 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ls_admin_log
-- ----------------------------
INSERT INTO `ls_admin_log` VALUES ('1', '1', 'annsshadow', '1', '超级管理员', '添加友情链接成功', '2015-11-27 02:08:48', null);
INSERT INTO `ls_admin_log` VALUES ('2', '1', 'annsshadow', '1', '超级管理员', '删除友情链接成功', '2015-11-27 02:08:58', null);
INSERT INTO `ls_admin_log` VALUES ('3', '1', 'annsshadow', '1', '超级管理员', '退出系统', '2015-11-27 02:55:56', null);
INSERT INTO `ls_admin_log` VALUES ('4', '1', 'annsshadow', '1', '超级管理员', '退出系统', '2015-11-27 02:55:56', null);
INSERT INTO `ls_admin_log` VALUES ('5', '1', 'annsshadow', '1', '超级管理员', '登录成功', '2015-11-27 13:53:40', null);
INSERT INTO `ls_admin_log` VALUES ('6', '1', 'annsshadow', '1', '超级管理员', '退出系统', '2015-11-27 14:40:19', null);
INSERT INTO `ls_admin_log` VALUES ('7', '1', 'annsshadow', '1', '超级管理员', '登录成功', '2015-11-27 14:40:23', null);
INSERT INTO `ls_admin_log` VALUES ('8', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-27 15:29:25', null);
INSERT INTO `ls_admin_log` VALUES ('9', '1', 'annsshadow', '1', '超级管理员', '登录成功', '2015-11-27 19:09:57', null);
INSERT INTO `ls_admin_log` VALUES ('10', '1', 'annsshadow', '1', '超级管理员', '添加友情链接成功', '2015-11-27 19:14:21', null);
INSERT INTO `ls_admin_log` VALUES ('11', '1', 'annsshadow', '1', '超级管理员', '添加管理员成功', '2015-11-27 20:46:46', null);
INSERT INTO `ls_admin_log` VALUES ('12', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-27 20:59:48', null);
INSERT INTO `ls_admin_log` VALUES ('13', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-27 20:59:56', null);
INSERT INTO `ls_admin_log` VALUES ('14', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-27 21:00:04', null);
INSERT INTO `ls_admin_log` VALUES ('15', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-27 21:00:13', null);
INSERT INTO `ls_admin_log` VALUES ('16', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-27 21:00:21', null);
INSERT INTO `ls_admin_log` VALUES ('17', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-27 21:00:29', null);
INSERT INTO `ls_admin_log` VALUES ('18', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-27 21:00:38', null);
INSERT INTO `ls_admin_log` VALUES ('19', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-27 21:00:48', null);
INSERT INTO `ls_admin_log` VALUES ('20', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-27 21:01:01', null);
INSERT INTO `ls_admin_log` VALUES ('21', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-27 21:01:09', null);
INSERT INTO `ls_admin_log` VALUES ('22', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-27 21:01:18', null);
INSERT INTO `ls_admin_log` VALUES ('23', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-27 21:01:27', null);
INSERT INTO `ls_admin_log` VALUES ('24', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-27 21:01:36', null);
INSERT INTO `ls_admin_log` VALUES ('25', '1', 'annsshadow', '1', '超级管理员', '添加文件成功', '2015-11-27 21:21:52', null);
INSERT INTO `ls_admin_log` VALUES ('26', '1', 'annsshadow', '1', '超级管理员', '删除文件成功', '2015-11-27 21:23:33', null);
INSERT INTO `ls_admin_log` VALUES ('27', '1', 'annsshadow', '1', '超级管理员', '添加文件成功', '2015-11-27 21:24:16', null);
INSERT INTO `ls_admin_log` VALUES ('28', '1', 'annsshadow', '1', '超级管理员', '添加文件成功', '2015-11-27 21:24:57', null);
INSERT INTO `ls_admin_log` VALUES ('29', '1', 'annsshadow', '1', '超级管理员', '添加文件成功', '2015-11-27 21:32:46', null);
INSERT INTO `ls_admin_log` VALUES ('30', '1', 'annsshadow', '1', '超级管理员', '删除文件成功', '2015-11-27 21:35:05', null);
INSERT INTO `ls_admin_log` VALUES ('31', '1', 'annsshadow', '1', '超级管理员', '删除文件成功', '2015-11-27 21:35:07', null);
INSERT INTO `ls_admin_log` VALUES ('32', '1', 'annsshadow', '1', '超级管理员', '删除文件成功', '2015-11-27 21:35:09', null);
INSERT INTO `ls_admin_log` VALUES ('33', '1', 'annsshadow', '1', '超级管理员', '添加文件成功', '2015-11-27 21:35:24', null);
INSERT INTO `ls_admin_log` VALUES ('34', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-27 22:09:32', null);
INSERT INTO `ls_admin_log` VALUES ('35', '1', 'annsshadow', '1', '超级管理员', '编辑文章成功', '2015-11-27 22:10:50', null);
INSERT INTO `ls_admin_log` VALUES ('36', '1', 'annsshadow', '1', '超级管理员', '添加文件成功', '2015-11-27 22:13:30', null);
INSERT INTO `ls_admin_log` VALUES ('37', '1', 'annsshadow', '1', '超级管理员', '退出系统', '2015-11-27 22:26:05', null);
INSERT INTO `ls_admin_log` VALUES ('38', '0', '0', '0', '0', '试图非法进入文章模块', '2015-11-28 16:32:02', null);
INSERT INTO `ls_admin_log` VALUES ('39', '0', '0', '0', '0', '试图非法进入文章模块', '2015-11-28 16:32:30', null);
INSERT INTO `ls_admin_log` VALUES ('40', '0', '0', '0', '0', '试图非法进入文章模块', '2015-11-28 16:47:22', null);
INSERT INTO `ls_admin_log` VALUES ('41', '1', 'annsshadow', '1', '超级管理员', '登录成功', '2015-11-28 19:33:54', null);
INSERT INTO `ls_admin_log` VALUES ('42', '1', 'annsshadow', '1', '超级管理员', '删除文件成功', '2015-11-28 19:34:03', null);
INSERT INTO `ls_admin_log` VALUES ('43', '1', 'annsshadow', '1', '超级管理员', '删除文件成功', '2015-11-28 19:34:45', null);
INSERT INTO `ls_admin_log` VALUES ('44', '1', 'annsshadow', '1', '超级管理员', '删除文件成功', '2015-11-28 19:34:48', null);
INSERT INTO `ls_admin_log` VALUES ('45', '1', 'annsshadow', '1', '超级管理员', '删除文件成功', '2015-11-28 19:34:50', null);
INSERT INTO `ls_admin_log` VALUES ('46', '1', 'annsshadow', '1', '超级管理员', '删除文件成功', '2015-11-28 19:34:58', null);
INSERT INTO `ls_admin_log` VALUES ('47', '1', 'annsshadow', '1', '超级管理员', '删除文件成功', '2015-11-28 19:35:50', null);
INSERT INTO `ls_admin_log` VALUES ('48', '1', 'annsshadow', '1', '超级管理员', '删除文件成功', '2015-11-28 19:35:52', null);
INSERT INTO `ls_admin_log` VALUES ('49', '1', 'annsshadow', '1', '超级管理员', '删除文件成功', '2015-11-28 19:35:54', null);
INSERT INTO `ls_admin_log` VALUES ('50', '1', 'annsshadow', '1', '超级管理员', '删除文件成功', '2015-11-28 19:35:57', null);
INSERT INTO `ls_admin_log` VALUES ('51', '1', 'annsshadow', '1', '超级管理员', '删除文件成功', '2015-11-28 19:35:59', null);
INSERT INTO `ls_admin_log` VALUES ('52', '1', 'annsshadow', '1', '超级管理员', '删除文件成功', '2015-11-28 19:36:01', null);
INSERT INTO `ls_admin_log` VALUES ('53', '1', 'annsshadow', '1', '超级管理员', '删除文件成功', '2015-11-28 19:36:03', null);
INSERT INTO `ls_admin_log` VALUES ('54', '1', 'annsshadow', '1', '超级管理员', '删除文件成功', '2015-11-28 19:36:05', null);
INSERT INTO `ls_admin_log` VALUES ('55', '1', 'annsshadow', '1', '超级管理员', '删除文件成功', '2015-11-28 19:36:07', null);
INSERT INTO `ls_admin_log` VALUES ('56', '1', 'annsshadow', '1', '超级管理员', '删除文件成功', '2015-11-28 19:36:09', null);
INSERT INTO `ls_admin_log` VALUES ('57', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 19:45:36', null);
INSERT INTO `ls_admin_log` VALUES ('58', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 19:49:26', null);
INSERT INTO `ls_admin_log` VALUES ('59', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 19:50:05', null);
INSERT INTO `ls_admin_log` VALUES ('60', '1', 'annsshadow', '1', '超级管理员', '编辑文章成功', '2015-11-28 19:50:16', null);
INSERT INTO `ls_admin_log` VALUES ('61', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 19:50:46', null);
INSERT INTO `ls_admin_log` VALUES ('62', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 19:51:27', null);
INSERT INTO `ls_admin_log` VALUES ('63', '1', 'annsshadow', '1', '超级管理员', '编辑文章成功', '2015-11-28 19:51:35', null);
INSERT INTO `ls_admin_log` VALUES ('64', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 19:52:01', null);
INSERT INTO `ls_admin_log` VALUES ('65', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 19:52:43', null);
INSERT INTO `ls_admin_log` VALUES ('66', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 19:53:06', null);
INSERT INTO `ls_admin_log` VALUES ('67', '1', 'annsshadow', '1', '超级管理员', '编辑文章成功', '2015-11-28 19:53:28', null);
INSERT INTO `ls_admin_log` VALUES ('68', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 19:53:58', null);
INSERT INTO `ls_admin_log` VALUES ('69', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 19:54:32', null);
INSERT INTO `ls_admin_log` VALUES ('70', '1', 'annsshadow', '1', '超级管理员', '编辑文章成功', '2015-11-28 19:54:46', null);
INSERT INTO `ls_admin_log` VALUES ('71', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 19:55:18', null);
INSERT INTO `ls_admin_log` VALUES ('72', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 19:55:38', null);
INSERT INTO `ls_admin_log` VALUES ('73', '0', '0', '0', '0', '试图非法添加文章', '2015-11-28 19:57:49', null);
INSERT INTO `ls_admin_log` VALUES ('74', '1', 'annsshadow', '1', '超级管理员', '登录成功', '2015-11-28 19:57:55', null);
INSERT INTO `ls_admin_log` VALUES ('75', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 20:01:46', null);
INSERT INTO `ls_admin_log` VALUES ('76', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 20:02:07', null);
INSERT INTO `ls_admin_log` VALUES ('77', '1', 'annsshadow', '1', '超级管理员', '编辑文章成功', '2015-11-28 20:02:17', null);
INSERT INTO `ls_admin_log` VALUES ('78', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 20:02:35', null);
INSERT INTO `ls_admin_log` VALUES ('79', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 20:03:06', null);
INSERT INTO `ls_admin_log` VALUES ('80', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 20:03:32', null);
INSERT INTO `ls_admin_log` VALUES ('81', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 20:04:43', null);
INSERT INTO `ls_admin_log` VALUES ('82', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 20:05:06', null);
INSERT INTO `ls_admin_log` VALUES ('83', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 20:05:27', null);
INSERT INTO `ls_admin_log` VALUES ('84', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 20:05:44', null);
INSERT INTO `ls_admin_log` VALUES ('85', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 20:06:07', null);
INSERT INTO `ls_admin_log` VALUES ('86', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 20:08:09', null);
INSERT INTO `ls_admin_log` VALUES ('87', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 20:08:29', null);
INSERT INTO `ls_admin_log` VALUES ('88', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 20:08:48', null);
INSERT INTO `ls_admin_log` VALUES ('89', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 20:09:05', null);
INSERT INTO `ls_admin_log` VALUES ('90', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 20:09:22', null);
INSERT INTO `ls_admin_log` VALUES ('91', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 20:10:10', null);
INSERT INTO `ls_admin_log` VALUES ('92', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 20:10:30', null);
INSERT INTO `ls_admin_log` VALUES ('93', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 20:10:53', null);
INSERT INTO `ls_admin_log` VALUES ('94', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 20:11:16', null);
INSERT INTO `ls_admin_log` VALUES ('95', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 20:11:34', null);
INSERT INTO `ls_admin_log` VALUES ('96', '0', '0', '0', '0', '试图非法进入文章模块', '2015-11-28 20:54:02', null);
INSERT INTO `ls_admin_log` VALUES ('97', '1', 'annsshadow', '1', '超级管理员', '登录成功', '2015-11-28 20:54:06', null);
INSERT INTO `ls_admin_log` VALUES ('98', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 20:55:18', null);
INSERT INTO `ls_admin_log` VALUES ('99', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 20:55:50', null);
INSERT INTO `ls_admin_log` VALUES ('100', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 20:56:12', null);
INSERT INTO `ls_admin_log` VALUES ('101', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 20:56:32', null);
INSERT INTO `ls_admin_log` VALUES ('102', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-11-28 20:56:51', null);
INSERT INTO `ls_admin_log` VALUES ('103', '0', '0', '0', '0', '试图非法搜索文章', '2015-11-28 20:57:40', null);
INSERT INTO `ls_admin_log` VALUES ('104', '1', 'annsshadow', '1', '超级管理员', '登录成功', '2015-11-28 20:57:42', null);
INSERT INTO `ls_admin_log` VALUES ('105', '1', 'annsshadow', '1', '超级管理员', '退出系统', '2015-11-28 21:20:26', null);
INSERT INTO `ls_admin_log` VALUES ('106', '1', 'annsshadow', '1', '超级管理员', '登录成功', '2015-11-29 21:13:00', null);
INSERT INTO `ls_admin_log` VALUES ('107', '1', 'annsshadow', '1', '超级管理员', '登录成功', '2015-11-30 10:54:39', null);
INSERT INTO `ls_admin_log` VALUES ('108', '0', '0', '0', '0', '试图非法进入文章模块', '2015-11-30 10:55:00', null);
INSERT INTO `ls_admin_log` VALUES ('109', '1', 'annsshadow', '1', '超级管理员', '登录成功', '2015-11-30 10:55:01', null);
INSERT INTO `ls_admin_log` VALUES ('110', '0', '0', '0', '0', '试图非法获取文章详情', '2015-11-30 10:55:16', null);
INSERT INTO `ls_admin_log` VALUES ('111', '1', 'annsshadow', '1', '超级管理员', '登录成功', '2015-11-30 10:55:18', null);
INSERT INTO `ls_admin_log` VALUES ('112', '1', 'annsshadow', '1', '超级管理员', '登录成功', '2015-12-01 17:28:24', null);
INSERT INTO `ls_admin_log` VALUES ('113', '1', 'annsshadow', '1', '超级管理员', '登录成功', '2015-12-01 20:45:15', null);
INSERT INTO `ls_admin_log` VALUES ('114', '1', 'annsshadow', '1', '超级管理员', '退出系统', '2015-12-01 21:01:54', null);
INSERT INTO `ls_admin_log` VALUES ('115', '1', 'annsshadow', '1', '超级管理员', '登录成功', '2015-12-27 13:22:53', null);
INSERT INTO `ls_admin_log` VALUES ('116', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-12-27 13:23:38', null);
INSERT INTO `ls_admin_log` VALUES ('117', '1', 'annsshadow', '1', '超级管理员', '添加文章成功', '2015-12-27 13:26:58', null);
INSERT INTO `ls_admin_log` VALUES ('118', '1', 'annsshadow', '1', '超级管理员', '删除文件成功', '2015-12-27 13:27:04', null);
INSERT INTO `ls_admin_log` VALUES ('119', '1', 'annsshadow', '1', '超级管理员', '删除文件失败', '2015-12-27 13:29:15', null);
INSERT INTO `ls_admin_log` VALUES ('120', '1', 'annsshadow', '1', '超级管理员', '登录成功', '2015-12-30 12:39:21', null);
INSERT INTO `ls_admin_log` VALUES ('121', '1', 'annsshadow', '1', '超级管理员', '退出系统', '2015-12-30 12:40:39', null);
INSERT INTO `ls_admin_log` VALUES ('122', '1', 'annsshadow', '1', '超级管理员', '登录成功', '2015-12-31 19:33:47', null);
INSERT INTO `ls_admin_log` VALUES ('123', '1', 'annsshadow', '1', '超级管理员', '删除文件成功', '2015-12-31 19:35:40', null);
INSERT INTO `ls_admin_log` VALUES ('124', '1', 'annsshadow', '1', '超级管理员', '删除文件成功', '2015-12-31 19:35:42', null);
INSERT INTO `ls_admin_log` VALUES ('125', '1', 'annsshadow', '1', '超级管理员', '删除文件成功', '2015-12-31 19:35:44', null);
INSERT INTO `ls_admin_log` VALUES ('126', '1', 'annsshadow', '1', '超级管理员', '删除文件成功', '2015-12-31 19:36:50', null);
INSERT INTO `ls_admin_log` VALUES ('127', '1', 'annsshadow', '1', '超级管理员', '删除文件成功', '2015-12-31 19:36:53', null);
INSERT INTO `ls_admin_log` VALUES ('128', '1', 'annsshadow', '1', '超级管理员', '删除文件成功', '2015-12-31 19:37:08', null);
INSERT INTO `ls_admin_log` VALUES ('129', '1', 'annsshadow', '1', '超级管理员', '删除文件成功', '2015-12-31 19:37:13', null);
INSERT INTO `ls_admin_log` VALUES ('130', '1', 'annsshadow', '1', '超级管理员', '删除文件成功', '2015-12-31 19:37:17', null);
INSERT INTO `ls_admin_log` VALUES ('131', '1', 'annsshadow', '1', '超级管理员', '试图非法进入下载模块', '2016-01-01 15:15:29', null);
INSERT INTO `ls_admin_log` VALUES ('132', '1', 'annsshadow', '1', '超级管理员', '试图非法进入友情链接模块', '2016-01-01 15:32:07', null);
INSERT INTO `ls_admin_log` VALUES ('133', '1', 'annsshadow', '1', '超级管理员', '删除文件成功', '2016-01-01 15:35:36', null);
INSERT INTO `ls_admin_log` VALUES ('134', '1', 'annsshadow', '1', '超级管理员', '删除文件失败', '2016-01-01 15:36:08', null);
INSERT INTO `ls_admin_log` VALUES ('135', '1', 'annsshadow', '1', '超级管理员', '删除文件成功', '2016-01-01 15:36:34', null);
INSERT INTO `ls_admin_log` VALUES ('136', '1', 'annsshadow', '1', '超级管理员', '删除文件成功', '2016-01-01 15:36:50', null);
INSERT INTO `ls_admin_log` VALUES ('137', '1', 'annsshadow', '1', '超级管理员', '编辑标签失败', '2016-01-02 13:35:48', null);
INSERT INTO `ls_admin_log` VALUES ('138', '1', 'annsshadow', '1', '超级管理员', '编辑标签失败', '2016-01-02 13:36:06', null);
INSERT INTO `ls_admin_log` VALUES ('139', '1', 'annsshadow', '1', '超级管理员', '编辑标签失败', '2016-01-02 13:36:14', null);
INSERT INTO `ls_admin_log` VALUES ('140', '1', 'annsshadow', '1', '超级管理员', '编辑标签失败', '2016-01-02 13:36:30', null);
INSERT INTO `ls_admin_log` VALUES ('141', '1', 'annsshadow', '1', '超级管理员', '编辑标签成功', '2016-01-02 13:40:08', null);
INSERT INTO `ls_admin_log` VALUES ('142', '1', 'annsshadow', '1', '超级管理员', '删除标签成功', '2016-01-02 13:41:31', null);
INSERT INTO `ls_admin_log` VALUES ('143', '1', 'annsshadow', '1', '超级管理员', '添加标签成功', '2016-01-02 13:46:24', null);
INSERT INTO `ls_admin_log` VALUES ('144', '1', 'annsshadow', '1', '超级管理员', '退出系统', '2016-01-02 16:11:02', null);
INSERT INTO `ls_admin_log` VALUES ('145', '1', 'annsshadow', '1', '超级管理员', '登录成功', '2016-01-02 16:13:22', null);
INSERT INTO `ls_admin_log` VALUES ('146', '1', 'annsshadow', '1', '超级管理员', '退出系统', '2016-01-02 16:16:59', null);
INSERT INTO `ls_admin_log` VALUES ('147', '1', 'annsshadow', '1', '超级管理员', '登录成功', '2016-03-25 00:29:05', null);
INSERT INTO `ls_admin_log` VALUES ('148', '1', 'annsshadow', '1', '超级管理员', '添加depart项目成功', '2016-03-25 02:57:34', null);
INSERT INTO `ls_admin_log` VALUES ('149', '1', 'annsshadow', '1', '超级管理员', '添加depart项目成功', '2016-03-25 02:59:22', null);
INSERT INTO `ls_admin_log` VALUES ('150', '1', 'annsshadow', '1', '超级管理员', '添加depart项目成功', '2016-03-25 03:00:26', null);
INSERT INTO `ls_admin_log` VALUES ('151', '1', 'annsshadow', '1', '超级管理员', '添加team项目成功', '2016-03-25 03:00:37', null);
INSERT INTO `ls_admin_log` VALUES ('152', '1', 'annsshadow', '1', '超级管理员', '删除team成功', '2016-03-25 03:01:02', null);
INSERT INTO `ls_admin_log` VALUES ('153', '1', 'annsshadow', '1', '超级管理员', '编辑team项目成功', '2016-03-25 03:13:53', null);
INSERT INTO `ls_admin_log` VALUES ('154', '1', 'annsshadow', '1', '超级管理员', '编辑team项目成功', '2016-03-25 03:14:05', null);
INSERT INTO `ls_admin_log` VALUES ('155', '1', 'annsshadow', '1', '超级管理员', '编辑team项目成功', '2016-03-25 03:18:25', null);
INSERT INTO `ls_admin_log` VALUES ('156', '1', 'annsshadow', '1', '超级管理员', '编辑team项目成功', '2016-03-25 03:18:30', null);
INSERT INTO `ls_admin_log` VALUES ('157', '1', 'annsshadow', '1', '超级管理员', '退出系统', '2016-03-25 03:36:22', null);
INSERT INTO `ls_admin_log` VALUES ('158', '1', 'annsshadow', '1', '超级管理员', '登录成功', '2016-03-28 22:02:25', null);
INSERT INTO `ls_admin_log` VALUES ('159', '1', 'annsshadow', '1', '超级管理员', '退出系统', '2016-03-28 22:28:04', null);
INSERT INTO `ls_admin_log` VALUES ('160', '1', 'annsshadow', '1', '超级管理员', '登录成功', '2016-03-30 00:04:21', null);
INSERT INTO `ls_admin_log` VALUES ('161', '1', 'annsshadow', '1', '超级管理员', '添加栏目成功', '2016-03-30 00:06:27', null);
INSERT INTO `ls_admin_log` VALUES ('162', '1', 'annsshadow', '1', '超级管理员', '编辑标签成功', '2016-03-30 00:07:01', null);
INSERT INTO `ls_admin_log` VALUES ('163', '1', 'annsshadow', '1', '超级管理员', '编辑标签成功', '2016-03-30 00:07:33', null);
INSERT INTO `ls_admin_log` VALUES ('164', '1', 'annsshadow', '1', '超级管理员', '编辑标签成功', '2016-03-30 00:07:52', null);
INSERT INTO `ls_admin_log` VALUES ('165', '1', 'annsshadow', '1', '超级管理员', '编辑标签成功', '2016-03-30 00:08:04', null);
INSERT INTO `ls_admin_log` VALUES ('166', '1', 'annsshadow', '1', '超级管理员', '添加标签成功', '2016-03-30 00:08:27', null);
INSERT INTO `ls_admin_log` VALUES ('167', '1', 'annsshadow', '1', '超级管理员', '添加标签成功', '2016-03-30 00:08:44', null);
INSERT INTO `ls_admin_log` VALUES ('168', '1', 'annsshadow', '1', '超级管理员', '添加标签成功', '2016-03-30 00:09:30', null);
INSERT INTO `ls_admin_log` VALUES ('169', '1', 'annsshadow', '1', '超级管理员', '添加标签成功', '2016-03-30 00:09:43', null);
INSERT INTO `ls_admin_log` VALUES ('170', '1', 'annsshadow', '1', '超级管理员', '添加标签成功', '2016-03-30 00:09:54', null);
INSERT INTO `ls_admin_log` VALUES ('171', '1', 'annsshadow', '1', '超级管理员', '添加标签成功', '2016-03-30 00:10:10', null);
INSERT INTO `ls_admin_log` VALUES ('172', '1', 'annsshadow', '1', '超级管理员', '添加标签成功', '2016-03-30 00:10:21', null);
INSERT INTO `ls_admin_log` VALUES ('173', '1', 'annsshadow', '1', '超级管理员', '编辑栏目成功', '2016-03-30 00:11:23', null);
INSERT INTO `ls_admin_log` VALUES ('174', '1', 'annsshadow', '1', '超级管理员', '添加标签成功', '2016-03-30 00:11:43', null);
INSERT INTO `ls_admin_log` VALUES ('175', '1', 'annsshadow', '1', '超级管理员', '添加标签成功', '2016-03-30 00:12:05', null);
INSERT INTO `ls_admin_log` VALUES ('176', '1', 'annsshadow', '1', '超级管理员', '添加标签成功', '2016-03-30 00:12:19', null);
INSERT INTO `ls_admin_log` VALUES ('177', '1', 'annsshadow', '1', '超级管理员', '添加标签成功', '2016-03-30 00:12:36', null);
INSERT INTO `ls_admin_log` VALUES ('178', '1', 'annsshadow', '1', '超级管理员', '添加标签成功', '2016-03-30 00:12:47', null);
INSERT INTO `ls_admin_log` VALUES ('179', '1', 'annsshadow', '1', '超级管理员', '添加标签成功', '2016-03-30 00:13:25', null);
INSERT INTO `ls_admin_log` VALUES ('180', '1', 'annsshadow', '1', '超级管理员', '添加标签成功', '2016-03-30 00:13:38', null);
INSERT INTO `ls_admin_log` VALUES ('181', '1', 'annsshadow', '1', '超级管理员', '添加标签成功', '2016-03-30 00:13:47', null);
INSERT INTO `ls_admin_log` VALUES ('182', '1', 'annsshadow', '1', '超级管理员', '添加标签成功', '2016-03-30 01:08:33', null);
INSERT INTO `ls_admin_log` VALUES ('183', '1', 'annsshadow', '1', '超级管理员', '添加标签成功', '2016-03-30 01:08:49', null);
INSERT INTO `ls_admin_log` VALUES ('184', '1', 'annsshadow', '1', '超级管理员', '编辑文章成功', '2016-03-30 01:16:30', '::1');
INSERT INTO `ls_admin_log` VALUES ('185', '1', 'annsshadow', '1', '超级管理员', '删除管理员成功', '2016-03-30 02:52:14', '::1');
INSERT INTO `ls_admin_log` VALUES ('186', '1', 'annsshadow', '1', '超级管理员', '添加管理员成功', '2016-03-30 02:52:26', '::1');
INSERT INTO `ls_admin_log` VALUES ('187', '1', 'annsshadow', '1', '超级管理员', '添加管理员成功', '2016-03-30 02:53:27', '::1');
INSERT INTO `ls_admin_log` VALUES ('188', '1', 'annsshadow', '1', '超级管理员', '退出系统', '2016-03-30 03:28:24', '::1');

-- ----------------------------
-- Table structure for ls_admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `ls_admin_menu`;
CREATE TABLE `ls_admin_menu` (
  `am_id` int(10) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(50) NOT NULL,
  `menu_level` int(1) NOT NULL,
  `menu_url` varchar(100) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `visable` smallint(2) NOT NULL,
  PRIMARY KEY (`am_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ls_admin_menu
-- ----------------------------
INSERT INTO `ls_admin_menu` VALUES ('1', '系统管理', '1', ' ', '0', '1');
INSERT INTO `ls_admin_menu` VALUES ('2', '内容管理', '1', ' ', '0', '1');
INSERT INTO `ls_admin_menu` VALUES ('3', '系统管理', '1', ' ', '0', '0');
INSERT INTO `ls_admin_menu` VALUES ('4', '管理员管理', '2', 'bluescms/index.php/user', '1', '1');
INSERT INTO `ls_admin_menu` VALUES ('5', '角色管理', '2', 'bluescms/index.php/role', '1', '1');
INSERT INTO `ls_admin_menu` VALUES ('6', '文章管理', '2', 'bluescms/index.php/article', '2', '1');
INSERT INTO `ls_admin_menu` VALUES ('7', '下载管理', '2', 'bluescms/index.php/download', '2', '1');
INSERT INTO `ls_admin_menu` VALUES ('8', '导航栏目', '2', 'bluescms/index.php/menu', '2', '1');
INSERT INTO `ls_admin_menu` VALUES ('9', '友情链接', '2', 'bluescms/index.php/friendlink', '2', '1');
INSERT INTO `ls_admin_menu` VALUES ('10', '标签管理', '2', 'bluescms/index.php/tag', '2', '1');
INSERT INTO `ls_admin_menu` VALUES ('11', '系统日志', '2', 'bluescms/index.php/log', '1', '1');
INSERT INTO `ls_admin_menu` VALUES ('12', '系所管理', '2', 'bluescms/index.php/team_depart/index/depart', '2', '1');
INSERT INTO `ls_admin_menu` VALUES ('13', ' 团队管理', '2', 'bluescms/index.php/team_depart/index/team', '2', '1');

-- ----------------------------
-- Table structure for ls_admin_right
-- ----------------------------
DROP TABLE IF EXISTS `ls_admin_right`;
CREATE TABLE `ls_admin_right` (
  `right_id` int(10) NOT NULL AUTO_INCREMENT,
  `right_name` varchar(20) NOT NULL,
  `parent_id` int(10) NOT NULL,
  PRIMARY KEY (`right_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ls_admin_right
-- ----------------------------
INSERT INTO `ls_admin_right` VALUES ('1', '权限管理', '0');
INSERT INTO `ls_admin_right` VALUES ('2', '内容管理', '0');
INSERT INTO `ls_admin_right` VALUES ('3', '系统管理', '0');
INSERT INTO `ls_admin_right` VALUES ('4', '角色管理', '1');
INSERT INTO `ls_admin_right` VALUES ('5', '管理员管理', '1');
INSERT INTO `ls_admin_right` VALUES ('6', '文章管理', '2');
INSERT INTO `ls_admin_right` VALUES ('7', '下载管理', '2');
INSERT INTO `ls_admin_right` VALUES ('8', '导航栏目', '2');
INSERT INTO `ls_admin_right` VALUES ('9', '友情链接', '2');
INSERT INTO `ls_admin_right` VALUES ('10', '标签管理', '2');
INSERT INTO `ls_admin_right` VALUES ('11', '系统日志', '2');
INSERT INTO `ls_admin_right` VALUES ('12', '角色添加', '4');
INSERT INTO `ls_admin_right` VALUES ('13', '角色编辑', '4');
INSERT INTO `ls_admin_right` VALUES ('14', '角色删除', '4');
INSERT INTO `ls_admin_right` VALUES ('15', '管理员添加', '5');
INSERT INTO `ls_admin_right` VALUES ('16', '管理员编辑', '5');
INSERT INTO `ls_admin_right` VALUES ('17', '管理员删除', '5');
INSERT INTO `ls_admin_right` VALUES ('18', '文章添加', '6');
INSERT INTO `ls_admin_right` VALUES ('19', '文章编辑', '6');
INSERT INTO `ls_admin_right` VALUES ('20', '文章删除', '6');
INSERT INTO `ls_admin_right` VALUES ('21', '下载添加', '7');
INSERT INTO `ls_admin_right` VALUES ('22', '下载删除', '7');
INSERT INTO `ls_admin_right` VALUES ('23', '导航添加', '8');
INSERT INTO `ls_admin_right` VALUES ('24', '导航编辑', '8');
INSERT INTO `ls_admin_right` VALUES ('25', '导航删除', '8');
INSERT INTO `ls_admin_right` VALUES ('26', '友链添加', '9');
INSERT INTO `ls_admin_right` VALUES ('27', '友链编辑', '9');
INSERT INTO `ls_admin_right` VALUES ('28', '友链删除', '9');
INSERT INTO `ls_admin_right` VALUES ('29', '标签添加', '10');
INSERT INTO `ls_admin_right` VALUES ('30', '标签编辑', '10');
INSERT INTO `ls_admin_right` VALUES ('31', '标签删除', '10');
INSERT INTO `ls_admin_right` VALUES ('32', '系所团队', '2');
INSERT INTO `ls_admin_right` VALUES ('33', '系所团队添加', '32');
INSERT INTO `ls_admin_right` VALUES ('34', '系所团队编辑', '32');
INSERT INTO `ls_admin_right` VALUES ('35', '系所团队删除', '32');

-- ----------------------------
-- Table structure for ls_admin_role
-- ----------------------------
DROP TABLE IF EXISTS `ls_admin_role`;
CREATE TABLE `ls_admin_role` (
  `role_id` int(5) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(30) NOT NULL,
  `role_right` varchar(255) NOT NULL,
  `role_info` varchar(255) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatetime` datetime NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ls_admin_role
-- ----------------------------
INSERT INTO `ls_admin_role` VALUES ('1', 'administrator', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35', '超级管理员', '2015-03-08 16:20:34', '2015-05-11 02:46:54');
INSERT INTO `ls_admin_role` VALUES ('2', 'content', '18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35', '内容管理员', '2015-03-12 22:16:49', '2015-05-11 02:56:38');

-- ----------------------------
-- Table structure for ls_admin_user
-- ----------------------------
DROP TABLE IF EXISTS `ls_admin_user`;
CREATE TABLE `ls_admin_user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(10) NOT NULL,
  `creattime` datetime NOT NULL,
  `updatetime` datetime NOT NULL,
  `role_name` varchar(30) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ls_admin_user
-- ----------------------------
INSERT INTO `ls_admin_user` VALUES ('1', 'annsshadow', '8314550970da44e70d61f4b5beca47ec20db2c77', '1', '2015-03-08 16:19:33', '2015-05-14 19:51:25', '超级管理员');
INSERT INTO `ls_admin_user` VALUES ('3', 'test1', '81d84525eb1499d518cf3cb3efcbe1d11c4ccf25', '2', '2016-03-30 02:52:26', '2016-03-30 02:52:26', '内容管理员');
INSERT INTO `ls_admin_user` VALUES ('4', 'test1', '81d84525eb1499d518cf3cb3efcbe1d11c4ccf25', '2', '2016-03-30 02:53:27', '2016-03-30 02:53:27', '内容管理员');

-- ----------------------------
-- Table structure for ls_article
-- ----------------------------
DROP TABLE IF EXISTS `ls_article`;
CREATE TABLE `ls_article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `headline` varchar(100) NOT NULL,
  `author` varchar(30) NOT NULL,
  `content` longtext NOT NULL,
  `menu_id` int(5) NOT NULL,
  `hit_num` int(10) NOT NULL,
  `ordernum` int(10) NOT NULL DEFAULT '0',
  `createtime` datetime NOT NULL,
  `updatetime` datetime NOT NULL,
  `creator` varchar(30) NOT NULL,
  `updater` varchar(30) NOT NULL,
  `img_url` varchar(255) DEFAULT '',
  `tag_id` tinyint(2) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=394 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ls_article
-- ----------------------------
INSERT INTO `ls_article` VALUES ('358', 'test测试4', 'annsshadow', '<p>				</p><p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448711444337024.png\" title=\"1448711444337024.png\" alt=\"red.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '12', '12', '0', '2015-11-28 19:50:46', '2015-11-28 19:50:30', '1', '1', 'resources/attachment/image/20151128/1448711444337024.png', '0');
INSERT INTO `ls_article` VALUES ('359', 'test测试5', 'annsshadow', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448711486452823.png\" title=\"1448711486452823.png\" alt=\"yellow.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '13', '0', '0', '2015-11-28 19:51:27', '2015-11-28 19:51:17', '1', '1', 'resources/attachment/image/20151128/1448711486452823.png', '0');
INSERT INTO `ls_article` VALUES ('360', 'test测试6', 'annsshadow', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448711519535014.png\" title=\"1448711519535014.png\" alt=\"black.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '14', '0', '0', '2015-11-28 19:52:01', '2015-11-28 19:51:49', '1', '1', 'resources/attachment/image/20151128/1448711519535014.png', '0');
INSERT INTO `ls_article` VALUES ('361', 'test测试7', 'annsshadow', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448711562115729.png\" title=\"1448711562115729.png\" alt=\"blue.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '15', '0', '0', '2015-11-28 19:52:43', '2015-11-28 19:52:33', '1', '1', 'resources/attachment/image/20151128/1448711562115729.png', '0');
INSERT INTO `ls_article` VALUES ('363', 'test测试9', 'annsshadow', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448711636892479.png\" title=\"1448711636892479.png\" alt=\"red.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '16', '0', '0', '2015-11-28 19:53:58', '2015-11-28 19:53:48', '1', '1', 'resources/attachment/image/20151128/1448711636892479.png', '0');
INSERT INTO `ls_article` VALUES ('365', 'test测试11', 'annsshadow', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448711716757918.png\" title=\"1448711716757918.png\" alt=\"black.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '19', '0', '0', '2015-11-28 19:55:18', '2015-11-28 19:55:06', '1', '1', 'resources/attachment/image/20151128/1448711716757918.png', '0');
INSERT INTO `ls_article` VALUES ('366', 'test测试12', 'annsshadow', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448711736387243.png\" title=\"1448711736387243.png\" alt=\"blue.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '18', '0', '0', '2015-11-28 19:55:38', '2015-11-28 19:55:30', '1', '1', 'resources/attachment/image/20151128/1448711736387243.png', '0');
INSERT INTO `ls_article` VALUES ('367', 'test测试13', 'annsshadow', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712105131629.png\" title=\"1448712105131629.png\" alt=\"black.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '19', '0', '0', '2015-11-28 20:01:46', '2015-11-28 20:01:35', '1', '1', 'resources/attachment/image/20151128/1448712105131629.png', '0');
INSERT INTO `ls_article` VALUES ('368', 'test测试14', 'annsshadow', '<p>				</p><p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712125144931.png\" title=\"1448712125144931.png\" alt=\"blue.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '19', '0', '0', '2015-11-28 20:02:06', '2015-11-28 20:01:58', '1', '1', 'resources/attachment/image/20151128/1448712125144931.png', '0');
INSERT INTO `ls_article` VALUES ('369', 'test测试15', 'annsshadow', '<p><img src=\"/jzjc/resources/attachment/image/20151128/1448712153131074.png\" title=\"1448712153131074.png\" alt=\"green.png\"/></p>', '19', '0', '0', '2015-11-28 20:02:35', '2015-11-28 20:02:29', '1', '1', 'resources/attachment/image/20151128/1448712153131074.png', '0');
INSERT INTO `ls_article` VALUES ('370', 'test测试16', 'annsshadow', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><img src=\"/jzjc/resources/attachment/image/20151128/1448712177923462.png\" title=\"1448712177923462.png\" alt=\"red.png\"/><br/></p><p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '19', '0', '0', '2015-11-28 20:03:06', '2015-11-28 20:02:52', '1', '1', 'resources/attachment/image/20151128/1448712177923462.png', '0');
INSERT INTO `ls_article` VALUES ('371', 'test测试17', 'annsshadow', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712210490562.png\" title=\"1448712210490562.png\" alt=\"yellow.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '19', '0', '0', '2015-11-28 20:03:32', '2015-11-28 20:03:23', '1', '1', 'resources/attachment/image/20151128/1448712210490562.png', '0');
INSERT INTO `ls_article` VALUES ('372', 'test测试18', 'annsshadow', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712281547966.png\" title=\"1448712281547966.png\" alt=\"black.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '19', '0', '0', '2015-11-28 20:04:43', '2015-11-28 20:04:16', '1', '1', 'resources/attachment/image/20151128/1448712281547966.png', '0');
INSERT INTO `ls_article` VALUES ('373', 'test测试19', 'annsshadow', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712305823585.png\" title=\"1448712305823585.png\" alt=\"blue.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '19', '0', '0', '2015-11-28 20:05:06', '2015-11-28 20:04:54', '1', '1', 'resources/attachment/image/20151128/1448712305823585.png', '0');
INSERT INTO `ls_article` VALUES ('375', 'test测试21', 'annsshadow', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712343161326.png\" title=\"1448712343161326.png\" alt=\"red.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '19', '2', '0', '2015-11-28 20:05:44', '2015-11-28 20:05:36', '1', '1', 'resources/attachment/image/20151128/1448712343161326.png', '0');
INSERT INTO `ls_article` VALUES ('376', 'test测试22', 'annsshadow', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712366993302.png\" title=\"1448712366993302.png\" alt=\"yellow.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '19', '0', '0', '2015-11-28 20:06:07', '2015-11-28 20:05:56', '1', '1', 'resources/attachment/image/20151128/1448712366993302.png', '0');
INSERT INTO `ls_article` VALUES ('377', 'test测试23', 'annsshadow', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712488207499.png\" title=\"1448712488207499.png\" alt=\"black.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '18', '1', '0', '2015-11-28 20:08:09', '2015-11-28 20:07:49', '1', '1', 'resources/attachment/image/20151128/1448712488207499.png', '0');
INSERT INTO `ls_article` VALUES ('378', 'test测试24', 'annsshadow', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712507135119.png\" title=\"1448712507135119.png\" alt=\"blue.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '18', '0', '0', '2015-11-28 20:08:29', '2015-11-28 20:08:21', '1', '1', 'resources/attachment/image/20151128/1448712507135119.png', '0');
INSERT INTO `ls_article` VALUES ('379', 'test测试25', 'annsshadow', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712526703139.png\" title=\"1448712526703139.png\" alt=\"green.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '18', '0', '0', '2015-11-28 20:08:48', '2015-11-28 20:08:40', '1', '1', 'resources/attachment/image/20151128/1448712526703139.png', '0');
INSERT INTO `ls_article` VALUES ('380', 'test测试26', 'annsshadow', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712544123522.png\" title=\"1448712544123522.png\" alt=\"red.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '18', '0', '0', '2015-11-28 20:09:05', '2015-11-28 20:08:58', '1', '1', 'resources/attachment/image/20151128/1448712544123522.png', '0');
INSERT INTO `ls_article` VALUES ('381', 'test测试27', 'annsshadow', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712561808825.png\" title=\"1448712561808825.png\" alt=\"yellow.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '18', '1', '0', '2015-11-28 20:09:22', '2015-11-28 20:09:15', '1', '1', 'resources/attachment/image/20151128/1448712561808825.png', '0');
INSERT INTO `ls_article` VALUES ('382', 'test测试28', 'annsshadow', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712609482386.png\" title=\"1448712609482386.png\" alt=\"black.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '15', '0', '0', '2015-11-28 20:10:10', '2015-11-28 20:10:03', '1', '1', 'resources/attachment/image/20151128/1448712609482386.png', '0');
INSERT INTO `ls_article` VALUES ('383', 'test测试29', 'annsshadow', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712629448219.png\" title=\"1448712629448219.png\" alt=\"blue.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '15', '0', '0', '2015-11-28 20:10:30', '2015-11-28 20:10:22', '1', '1', 'resources/attachment/image/20151128/1448712629448219.png', '0');
INSERT INTO `ls_article` VALUES ('384', 'test测试30', 'annsshadow', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712652426100.png\" title=\"1448712652426100.png\" alt=\"green.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '15', '0', '0', '2015-11-28 20:10:53', '2015-11-28 20:10:45', '1', '1', 'resources/attachment/image/20151128/1448712652426100.png', '0');
INSERT INTO `ls_article` VALUES ('385', 'test测试31', 'annsshadow', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712668350967.png\" title=\"1448712668350967.png\" alt=\"red.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '15', '1', '0', '2015-11-28 20:11:16', '2015-11-28 20:11:02', '1', '1', 'resources/attachment/image/20151128/1448712668350967.png', '0');
INSERT INTO `ls_article` VALUES ('386', 'test测试32', 'annsshadow', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712692140705.png\" title=\"1448712692140705.png\" alt=\"yellow.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '15', '3', '0', '2015-11-28 20:11:33', '2015-11-28 20:11:26', '1', '1', 'resources/attachment/image/20151128/1448712692140705.png', '0');
INSERT INTO `ls_article` VALUES ('387', 'test测试33', 'annsshadow', '<p style=\"margin-top: 0px; margin-bottom: 10px; padding: 0px; box-sizing: border-box; color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"margin-top: 0px; margin-bottom: 10px; padding: 0px; box-sizing: border-box; color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-top: 0px; margin-bottom: 10px; padding: 0px; box-sizing: border-box; color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><img src=\"/jzjc/resources/attachment/image/20151128/1448715308121207.png\" title=\"1448715308121207.png\" alt=\"black.png\"/></p><p style=\"margin-top: 0px; margin-bottom: 10px; padding: 0px; box-sizing: border-box; color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-top: 0px; margin-bottom: 10px; padding: 0px; box-sizing: border-box; color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '16', '0', '0', '2015-11-28 20:55:18', '2015-11-28 20:55:16', '1', '1', 'resources/attachment/image/20151128/1448715308121207.png', '0');
INSERT INTO `ls_article` VALUES ('389', 'test测试35', 'annsshadow', '<p style=\"margin-top: 0px; margin-bottom: 10px; white-space: normal; padding: 0px; box-sizing: border-box; color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"margin-top: 0px; margin-bottom: 10px; white-space: normal; padding: 0px; box-sizing: border-box; color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-top: 0px; margin-bottom: 10px; white-space: normal; padding: 0px; box-sizing: border-box; color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\"><img src=\"/jzjc/resources/attachment/image/20151128/1448715370109761.png\" title=\"1448715370109761.png\" alt=\"green.png\"/></p><p style=\"margin-top: 0px; margin-bottom: 10px; white-space: normal; padding: 0px; box-sizing: border-box; color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\"><br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\"/></p><p style=\"margin-top: 0px; margin-bottom: 10px; white-space: normal; padding: 0px; box-sizing: border-box; color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '16', '0', '0', '2015-11-28 20:56:11', '2015-11-28 20:56:03', '1', '1', 'resources/attachment/image/20151128/1448715370109761.png', '0');
INSERT INTO `ls_article` VALUES ('393', '项目销售经理', 'annsshadow', '<p>				</p><h4 style=\";margin-bottom:0;background:white\"><span style=\"font-size: 19px;font-family: 微软雅黑, sans-serif;color: red;font-weight: normal\">项目销售经理：</span></h4><p><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">职位月薪：面议</span></p><p><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">工作地点：广州</span></p><p><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">发布日期：2015-12-08</span></p><p><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">招聘人数：1人</span></p><h4 style=\";margin-bottom:0;background:white\"><span style=\"font-size: 19px;font-family: 微软雅黑, sans-serif;color: red;font-weight: normal\">职位描述：</span></h4><p><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">1</span><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">、根据公司销售目标完成销售任务；</span></p><p><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">2</span><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">、分析市场，开拓市场；</span></p><p style=\";margin-bottom:0;line-height:22px;vertical-align:baseline\"><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">3</span><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">、做好销售服务工作。</span></p><p><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">4</span><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">、负责销售部门的日常运营工作</span></p><p><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">5</span><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">、负责销售部管理（年度销售计划、目标的制定、任务分解）</span></p><h4 style=\";margin-bottom:0;background:white\"><span style=\"font-size: 19px;font-family: 微软雅黑, sans-serif;color: red;font-weight: normal\">职位要求：</span></h4><p><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">1</span><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">、对防水行业有相关了解</span></p><p><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">2</span><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">、有较强的管理能力，能熟悉工程技术方面的流程</span></p><p><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">3</span><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">、具有敬业精神，工作积极主动，责任心强，较强事业心</span></p><p>&nbsp;</p><p><br/></p>', '18', '0', '0', '2015-12-27 13:26:58', '2015-12-27 13:23:20', '1', '1', 'null_none', '0');

-- ----------------------------
-- Table structure for ls_depart
-- ----------------------------
DROP TABLE IF EXISTS `ls_depart`;
CREATE TABLE `ls_depart` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `tdname` varchar(30) NOT NULL,
  `creator` tinyint(2) NOT NULL,
  `updater` tinyint(2) NOT NULL,
  `updatetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ls_depart
-- ----------------------------
INSERT INTO `ls_depart` VALUES ('1', 'dtest', '0', '0', '0000-00-00 00:00:00');
INSERT INTO `ls_depart` VALUES ('2', 'dtest2', '1', '1', '2016-03-25 02:57:34');
INSERT INTO `ls_depart` VALUES ('3', 'dtest3', '1', '1', '2016-03-25 02:59:22');
INSERT INTO `ls_depart` VALUES ('4', 'dtest3', '1', '1', '2016-03-25 03:00:26');

-- ----------------------------
-- Table structure for ls_department
-- ----------------------------
DROP TABLE IF EXISTS `ls_department`;
CREATE TABLE `ls_department` (
  `depart_id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `department` varchar(30) NOT NULL,
  PRIMARY KEY (`depart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ls_department
-- ----------------------------

-- ----------------------------
-- Table structure for ls_download
-- ----------------------------
DROP TABLE IF EXISTS `ls_download`;
CREATE TABLE `ls_download` (
  `download_id` int(5) NOT NULL AUTO_INCREMENT,
  `menu_id` int(2) NOT NULL,
  `author` varchar(30) NOT NULL,
  `createtime` datetime NOT NULL,
  `headline` varchar(100) NOT NULL,
  `suffix` varchar(10) NOT NULL,
  `file_url` varchar(100) NOT NULL,
  PRIMARY KEY (`download_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ls_download
-- ----------------------------

-- ----------------------------
-- Table structure for ls_friendlink
-- ----------------------------
DROP TABLE IF EXISTS `ls_friendlink`;
CREATE TABLE `ls_friendlink` (
  `friendlink_id` int(10) NOT NULL AUTO_INCREMENT,
  `creator` tinyint(3) NOT NULL,
  `updater` tinyint(3) NOT NULL,
  `updatetime` datetime NOT NULL,
  `headline` varchar(30) NOT NULL,
  `url` varchar(200) NOT NULL,
  PRIMARY KEY (`friendlink_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ls_friendlink
-- ----------------------------
INSERT INTO `ls_friendlink` VALUES ('7', '1', '1', '2015-11-27 19:14:21', 'test1', '2');

-- ----------------------------
-- Table structure for ls_menu
-- ----------------------------
DROP TABLE IF EXISTS `ls_menu`;
CREATE TABLE `ls_menu` (
  `menu_id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(4) NOT NULL,
  `menu_order` int(4) NOT NULL,
  `menu_level` int(5) NOT NULL,
  `menu_name` varchar(40) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ls_menu
-- ----------------------------
INSERT INTO `ls_menu` VALUES ('1', '0', '1', '1', '学院概况');
INSERT INTO `ls_menu` VALUES ('2', '0', '2', '1', '师资队伍');
INSERT INTO `ls_menu` VALUES ('3', '0', '3', '1', '学院动态');
INSERT INTO `ls_menu` VALUES ('4', '0', '4', '1', '科研工作');
INSERT INTO `ls_menu` VALUES ('5', '0', '5', '1', '学生工作');
INSERT INTO `ls_menu` VALUES ('6', '0', '6', '1', '党建工作');
INSERT INTO `ls_menu` VALUES ('7', '0', '7', '1', '本科教学');
INSERT INTO `ls_menu` VALUES ('8', '0', '8', '1', '硕士生教学');
INSERT INTO `ls_menu` VALUES ('9', '0', '9', '1', '博士生教育');
INSERT INTO `ls_menu` VALUES ('10', '0', '10', '1', '通知公告');
INSERT INTO `ls_menu` VALUES ('11', '0', '11', '1', '校友园地');
INSERT INTO `ls_menu` VALUES ('12', '1', '1', '2', '整体概况');
INSERT INTO `ls_menu` VALUES ('13', '1', '2', '2', '办学机构');
INSERT INTO `ls_menu` VALUES ('14', '1', '3', '2', '专业介绍');
INSERT INTO `ls_menu` VALUES ('15', '1', '4', '2', '现任领导');
INSERT INTO `ls_menu` VALUES ('16', '1', '5', '2', '历任领导');
INSERT INTO `ls_menu` VALUES ('17', '2', '1', '2', '国家省部级专家');
INSERT INTO `ls_menu` VALUES ('18', '2', '2', '2', '按系所');
INSERT INTO `ls_menu` VALUES ('19', '2', '3', '2', '按团队');
INSERT INTO `ls_menu` VALUES ('20', '2', '4', '2', '按姓名拼音');
INSERT INTO `ls_menu` VALUES ('21', '3', '1', '2', '学院新闻');
INSERT INTO `ls_menu` VALUES ('22', '3', '2', '2', '教学动态');
INSERT INTO `ls_menu` VALUES ('23', '3', '3', '2', '院务公开');
INSERT INTO `ls_menu` VALUES ('24', '4', '1', '2', '科研概况');
INSERT INTO `ls_menu` VALUES ('25', '4', '2', '2', '科研动态');
INSERT INTO `ls_menu` VALUES ('26', '5', '1', '2', '学生活动');
INSERT INTO `ls_menu` VALUES ('27', '5', '2', '2', '日常管理');
INSERT INTO `ls_menu` VALUES ('28', '5', '3', '2', '学子风采');
INSERT INTO `ls_menu` VALUES ('29', '6', '1', '2', '支部概要');
INSERT INTO `ls_menu` VALUES ('30', '6', '2', '2', '理论学习');
INSERT INTO `ls_menu` VALUES ('31', '6', '3', '2', '党校');
INSERT INTO `ls_menu` VALUES ('32', '6', '4', '2', '组织活动');
INSERT INTO `ls_menu` VALUES ('33', '7', '1', '2', '专业建设');
INSERT INTO `ls_menu` VALUES ('34', '7', '2', '2', '课程建设');
INSERT INTO `ls_menu` VALUES ('35', '7', '3', '2', '实验室建设');
INSERT INTO `ls_menu` VALUES ('36', '7', '4', '2', '大学生创新实践');
INSERT INTO `ls_menu` VALUES ('37', '7', '5', '2', '教研教改');
INSERT INTO `ls_menu` VALUES ('38', '7', '6', '2', '毕业设计');
INSERT INTO `ls_menu` VALUES ('39', '7', '7', '2', '教学管理');
INSERT INTO `ls_menu` VALUES ('40', '7', '8', '2', '教学督导');
INSERT INTO `ls_menu` VALUES ('41', '8', '1', '2', '研究生概况与培养方案');
INSERT INTO `ls_menu` VALUES ('42', '8', '2', '2', ' 论文工作');
INSERT INTO `ls_menu` VALUES ('43', '8', '3', '2', '研究生招生');
INSERT INTO `ls_menu` VALUES ('44', '9', '1', '2', ' 博士生概况与培养方案');
INSERT INTO `ls_menu` VALUES ('45', '9', '2', '2', ' 博士生招生');
INSERT INTO `ls_menu` VALUES ('46', '10', '1', '2', ' 公示公告');
INSERT INTO `ls_menu` VALUES ('47', '10', '2', '2', ' 竞赛通知');
INSERT INTO `ls_menu` VALUES ('48', '10', '3', '2', ' 教师相关');
INSERT INTO `ls_menu` VALUES ('49', '10', '4', '2', ' 学生相关');
INSERT INTO `ls_menu` VALUES ('50', '10', '5', '2', ' 学籍管理相关文件');
INSERT INTO `ls_menu` VALUES ('51', '2', '0', '2', '按职称');

-- ----------------------------
-- Table structure for ls_tag
-- ----------------------------
DROP TABLE IF EXISTS `ls_tag`;
CREATE TABLE `ls_tag` (
  `tag_id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `menu_id` tinyint(3) NOT NULL,
  `tag_name` varchar(30) NOT NULL,
  `ordernum` tinyint(2) NOT NULL,
  `creator` tinyint(2) NOT NULL,
  `updater` tinyint(2) NOT NULL,
  `updatetime` datetime NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ls_tag
-- ----------------------------
INSERT INTO `ls_tag` VALUES ('1', '51', '博士生导师', '1', '1', '1', '2016-03-30 00:07:00');
INSERT INTO `ls_tag` VALUES ('2', '51', '硕士生导师', '2', '1', '1', '2016-03-30 00:07:33');
INSERT INTO `ls_tag` VALUES ('3', '51', '党政领导', '3', '1', '1', '2016-03-30 00:07:52');
INSERT INTO `ls_tag` VALUES ('5', '51', '专业教师', '2', '1', '1', '2016-03-30 00:08:04');
INSERT INTO `ls_tag` VALUES ('6', '51', '行政人员（院办）', '5', '1', '1', '2016-03-30 00:08:27');
INSERT INTO `ls_tag` VALUES ('7', '51', '行政人员（学生工作）', '6', '1', '1', '2016-03-30 00:08:44');
INSERT INTO `ls_tag` VALUES ('8', '27', '本科生规章制度', '0', '1', '1', '2016-03-30 00:09:30');
INSERT INTO `ls_tag` VALUES ('9', '27', '研究生规章制度', '0', '1', '1', '2016-03-30 00:09:43');
INSERT INTO `ls_tag` VALUES ('10', '27', '博士生规章制度', '0', '1', '1', '2016-03-30 00:09:54');
INSERT INTO `ls_tag` VALUES ('11', '27', '留学生规章制度', '0', '1', '1', '2016-03-30 00:10:10');
INSERT INTO `ls_tag` VALUES ('12', '27', '情况通报', '0', '1', '1', '2016-03-30 00:10:21');
INSERT INTO `ls_tag` VALUES ('13', '26', '重要活动', '0', '1', '1', '2016-03-30 00:11:43');
INSERT INTO `ls_tag` VALUES ('14', '26', '科技活动', '0', '1', '1', '2016-03-30 00:12:05');
INSERT INTO `ls_tag` VALUES ('15', '26', '文体活动', '0', '1', '1', '2016-03-30 00:12:19');
INSERT INTO `ls_tag` VALUES ('16', '26', '志愿活动', '0', '1', '1', '2016-03-30 00:12:35');
INSERT INTO `ls_tag` VALUES ('17', '26', '主题特色活动', '0', '1', '1', '2016-03-30 00:12:46');
INSERT INTO `ls_tag` VALUES ('18', '13', '学术机构', '0', '1', '1', '2016-03-30 00:13:25');
INSERT INTO `ls_tag` VALUES ('19', '13', '研究机构', '0', '1', '1', '2016-03-30 00:13:38');
INSERT INTO `ls_tag` VALUES ('20', '13', '三级部门', '0', '1', '1', '2016-03-30 00:13:47');
INSERT INTO `ls_tag` VALUES ('21', '28', '2013-2014学年', '0', '1', '1', '2016-03-30 01:08:33');
INSERT INTO `ls_tag` VALUES ('22', '28', '2014-2015学年', '0', '1', '1', '2016-03-30 01:08:49');

-- ----------------------------
-- Table structure for ls_team
-- ----------------------------
DROP TABLE IF EXISTS `ls_team`;
CREATE TABLE `ls_team` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `tdname` varchar(30) NOT NULL,
  `creator` tinyint(2) NOT NULL,
  `updater` tinyint(2) NOT NULL,
  `updatetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ls_team
-- ----------------------------
INSERT INTO `ls_team` VALUES ('2', 'tname1', '1', '1', '2016-03-25 03:18:30');
INSERT INTO `ls_team` VALUES ('3', 'tname2', '1', '1', '2016-03-25 03:29:23');

-- ----------------------------
-- Table structure for ls_user_admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `ls_user_admin_menu`;
CREATE TABLE `ls_user_admin_menu` (
  `user_admin_menu_id` int(10) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(50) NOT NULL,
  `menu_level` int(1) NOT NULL,
  `menu_url` varchar(100) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `visable` smallint(2) NOT NULL,
  PRIMARY KEY (`user_admin_menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ls_user_admin_menu
-- ----------------------------
INSERT INTO `ls_user_admin_menu` VALUES ('1', '个人信息', '1', '', '0', '1');
INSERT INTO `ls_user_admin_menu` VALUES ('2', '主页内容', '1', ' ', '0', '1');
INSERT INTO `ls_user_admin_menu` VALUES ('3', '信息管理', '2', ' bluescms/index.php/user/', '1', '1');
INSERT INTO `ls_user_admin_menu` VALUES ('4', '文章管理', '2', 'bluescms/index.php/user/', '2', '1');
INSERT INTO `ls_user_admin_menu` VALUES ('5', '栏目管理', '2', 'bluescms/index.php/user/', '2', '1');

-- ----------------------------
-- Table structure for ls_user_article
-- ----------------------------
DROP TABLE IF EXISTS `ls_user_article`;
CREATE TABLE `ls_user_article` (
  `user_article_id` int(11) NOT NULL AUTO_INCREMENT,
  `headline` varchar(100) NOT NULL,
  `author` varchar(30) NOT NULL,
  `user_id` tinyint(2) NOT NULL DEFAULT '0',
  `content` longtext NOT NULL,
  `user_menu_id` int(5) NOT NULL,
  `hit_num` int(10) NOT NULL,
  `ordernum` int(10) NOT NULL DEFAULT '0',
  `createtime` datetime NOT NULL,
  `updatetime` datetime NOT NULL,
  PRIMARY KEY (`user_article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=394 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ls_user_article
-- ----------------------------
INSERT INTO `ls_user_article` VALUES ('358', 'test测试4', 'annsshadow', '0', '<p>				</p><p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448711444337024.png\" title=\"1448711444337024.png\" alt=\"red.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '12', '12', '0', '2015-11-28 19:50:46', '2015-11-28 19:50:30');
INSERT INTO `ls_user_article` VALUES ('359', 'test测试5', 'annsshadow', '0', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448711486452823.png\" title=\"1448711486452823.png\" alt=\"yellow.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '13', '0', '0', '2015-11-28 19:51:27', '2015-11-28 19:51:17');
INSERT INTO `ls_user_article` VALUES ('360', 'test测试6', 'annsshadow', '0', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448711519535014.png\" title=\"1448711519535014.png\" alt=\"black.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '14', '0', '0', '2015-11-28 19:52:01', '2015-11-28 19:51:49');
INSERT INTO `ls_user_article` VALUES ('361', 'test测试7', 'annsshadow', '0', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448711562115729.png\" title=\"1448711562115729.png\" alt=\"blue.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '15', '0', '0', '2015-11-28 19:52:43', '2015-11-28 19:52:33');
INSERT INTO `ls_user_article` VALUES ('363', 'test测试9', 'annsshadow', '0', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448711636892479.png\" title=\"1448711636892479.png\" alt=\"red.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '16', '0', '0', '2015-11-28 19:53:58', '2015-11-28 19:53:48');
INSERT INTO `ls_user_article` VALUES ('365', 'test测试11', 'annsshadow', '0', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448711716757918.png\" title=\"1448711716757918.png\" alt=\"black.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '19', '0', '0', '2015-11-28 19:55:18', '2015-11-28 19:55:06');
INSERT INTO `ls_user_article` VALUES ('366', 'test测试12', 'annsshadow', '0', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448711736387243.png\" title=\"1448711736387243.png\" alt=\"blue.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '18', '0', '0', '2015-11-28 19:55:38', '2015-11-28 19:55:30');
INSERT INTO `ls_user_article` VALUES ('367', 'test测试13', 'annsshadow', '0', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712105131629.png\" title=\"1448712105131629.png\" alt=\"black.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '19', '0', '0', '2015-11-28 20:01:46', '2015-11-28 20:01:35');
INSERT INTO `ls_user_article` VALUES ('368', 'test测试14', 'annsshadow', '0', '<p>				</p><p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712125144931.png\" title=\"1448712125144931.png\" alt=\"blue.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '19', '0', '0', '2015-11-28 20:02:06', '2015-11-28 20:01:58');
INSERT INTO `ls_user_article` VALUES ('369', 'test测试15', 'annsshadow', '0', '<p><img src=\"/jzjc/resources/attachment/image/20151128/1448712153131074.png\" title=\"1448712153131074.png\" alt=\"green.png\"/></p>', '19', '0', '0', '2015-11-28 20:02:35', '2015-11-28 20:02:29');
INSERT INTO `ls_user_article` VALUES ('370', 'test测试16', 'annsshadow', '0', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><img src=\"/jzjc/resources/attachment/image/20151128/1448712177923462.png\" title=\"1448712177923462.png\" alt=\"red.png\"/><br/></p><p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '19', '0', '0', '2015-11-28 20:03:06', '2015-11-28 20:02:52');
INSERT INTO `ls_user_article` VALUES ('371', 'test测试17', 'annsshadow', '0', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712210490562.png\" title=\"1448712210490562.png\" alt=\"yellow.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '19', '0', '0', '2015-11-28 20:03:32', '2015-11-28 20:03:23');
INSERT INTO `ls_user_article` VALUES ('372', 'test测试18', 'annsshadow', '0', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712281547966.png\" title=\"1448712281547966.png\" alt=\"black.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '19', '0', '0', '2015-11-28 20:04:43', '2015-11-28 20:04:16');
INSERT INTO `ls_user_article` VALUES ('373', 'test测试19', 'annsshadow', '0', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712305823585.png\" title=\"1448712305823585.png\" alt=\"blue.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '19', '0', '0', '2015-11-28 20:05:06', '2015-11-28 20:04:54');
INSERT INTO `ls_user_article` VALUES ('375', 'test测试21', 'annsshadow', '0', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712343161326.png\" title=\"1448712343161326.png\" alt=\"red.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '19', '2', '0', '2015-11-28 20:05:44', '2015-11-28 20:05:36');
INSERT INTO `ls_user_article` VALUES ('376', 'test测试22', 'annsshadow', '0', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712366993302.png\" title=\"1448712366993302.png\" alt=\"yellow.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '19', '0', '0', '2015-11-28 20:06:07', '2015-11-28 20:05:56');
INSERT INTO `ls_user_article` VALUES ('377', 'test测试23', 'annsshadow', '0', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712488207499.png\" title=\"1448712488207499.png\" alt=\"black.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '18', '1', '0', '2015-11-28 20:08:09', '2015-11-28 20:07:49');
INSERT INTO `ls_user_article` VALUES ('378', 'test测试24', 'annsshadow', '0', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712507135119.png\" title=\"1448712507135119.png\" alt=\"blue.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '18', '0', '0', '2015-11-28 20:08:29', '2015-11-28 20:08:21');
INSERT INTO `ls_user_article` VALUES ('379', 'test测试25', 'annsshadow', '0', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712526703139.png\" title=\"1448712526703139.png\" alt=\"green.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '18', '0', '0', '2015-11-28 20:08:48', '2015-11-28 20:08:40');
INSERT INTO `ls_user_article` VALUES ('380', 'test测试26', 'annsshadow', '0', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712544123522.png\" title=\"1448712544123522.png\" alt=\"red.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '18', '0', '0', '2015-11-28 20:09:05', '2015-11-28 20:08:58');
INSERT INTO `ls_user_article` VALUES ('381', 'test测试27', 'annsshadow', '0', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712561808825.png\" title=\"1448712561808825.png\" alt=\"yellow.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '18', '1', '0', '2015-11-28 20:09:22', '2015-11-28 20:09:15');
INSERT INTO `ls_user_article` VALUES ('382', 'test测试28', 'annsshadow', '0', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712609482386.png\" title=\"1448712609482386.png\" alt=\"black.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '15', '0', '0', '2015-11-28 20:10:10', '2015-11-28 20:10:03');
INSERT INTO `ls_user_article` VALUES ('383', 'test测试29', 'annsshadow', '0', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712629448219.png\" title=\"1448712629448219.png\" alt=\"blue.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '15', '0', '0', '2015-11-28 20:10:30', '2015-11-28 20:10:22');
INSERT INTO `ls_user_article` VALUES ('384', 'test测试30', 'annsshadow', '0', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712652426100.png\" title=\"1448712652426100.png\" alt=\"green.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '15', '0', '0', '2015-11-28 20:10:53', '2015-11-28 20:10:45');
INSERT INTO `ls_user_article` VALUES ('385', 'test测试31', 'annsshadow', '0', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712668350967.png\" title=\"1448712668350967.png\" alt=\"red.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '15', '1', '0', '2015-11-28 20:11:16', '2015-11-28 20:11:02');
INSERT INTO `ls_user_article` VALUES ('386', 'test测试32', 'annsshadow', '0', '<p style=\"white-space: normal;\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"/jzjc/resources/attachment/image/20151128/1448712692140705.png\" title=\"1448712692140705.png\" alt=\"yellow.png\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '15', '3', '0', '2015-11-28 20:11:33', '2015-11-28 20:11:26');
INSERT INTO `ls_user_article` VALUES ('387', 'test测试33', 'annsshadow', '0', '<p style=\"margin-top: 0px; margin-bottom: 10px; padding: 0px; box-sizing: border-box; color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"margin-top: 0px; margin-bottom: 10px; padding: 0px; box-sizing: border-box; color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-top: 0px; margin-bottom: 10px; padding: 0px; box-sizing: border-box; color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><img src=\"/jzjc/resources/attachment/image/20151128/1448715308121207.png\" title=\"1448715308121207.png\" alt=\"black.png\"/></p><p style=\"margin-top: 0px; margin-bottom: 10px; padding: 0px; box-sizing: border-box; color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-top: 0px; margin-bottom: 10px; padding: 0px; box-sizing: border-box; color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '16', '0', '0', '2015-11-28 20:55:18', '2015-11-28 20:55:16');
INSERT INTO `ls_user_article` VALUES ('389', 'test测试35', 'annsshadow', '0', '<p style=\"margin-top: 0px; margin-bottom: 10px; white-space: normal; padding: 0px; box-sizing: border-box; color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</p><p style=\"margin-top: 0px; margin-bottom: 10px; white-space: normal; padding: 0px; box-sizing: border-box; color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-top: 0px; margin-bottom: 10px; white-space: normal; padding: 0px; box-sizing: border-box; color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\"><img src=\"/jzjc/resources/attachment/image/20151128/1448715370109761.png\" title=\"1448715370109761.png\" alt=\"green.png\"/></p><p style=\"margin-top: 0px; margin-bottom: 10px; white-space: normal; padding: 0px; box-sizing: border-box; color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\"><br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\"/></p><p style=\"margin-top: 0px; margin-bottom: 10px; white-space: normal; padding: 0px; box-sizing: border-box; color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p><p><br/></p>', '16', '0', '0', '2015-11-28 20:56:11', '2015-11-28 20:56:03');
INSERT INTO `ls_user_article` VALUES ('393', '项目销售经理', 'annsshadow', '0', '<h4 style=\";margin-bottom:0;background:white\"><span style=\"font-size: 19px;font-family: 微软雅黑, sans-serif;color: red;font-weight: normal\">项目销售经理：</span></h4><p><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">职位月薪：面议</span></p><p><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">工作地点：广州</span></p><p><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">发布日期：2015-12-08</span></p><p><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">招聘人数：1人</span></p><h4 style=\";margin-bottom:0;background:white\"><span style=\"font-size: 19px;font-family: 微软雅黑, sans-serif;color: red;font-weight: normal\">职位描述：</span></h4><p><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">1</span><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">、根据公司销售目标完成销售任务；</span></p><p><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">2</span><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">、分析市场，开拓市场；</span></p><p style=\";margin-bottom:0;line-height:22px;vertical-align:baseline\"><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">3</span><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">、做好销售服务工作。</span></p><p><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">4</span><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">、负责销售部门的日常运营工作</span></p><p><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">5</span><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">、负责销售部管理（年度销售计划、目标的制定、任务分解）</span></p><h4 style=\";margin-bottom:0;background:white\"><span style=\"font-size: 19px;font-family: 微软雅黑, sans-serif;color: red;font-weight: normal\">职位要求：</span></h4><p><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">1</span><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">、对防水行业有相关了解</span></p><p><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">2</span><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">、有较强的管理能力，能熟悉工程技术方面的流程</span></p><p><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">3</span><span style=\"font-size:12px;font-family:&#39;微软雅黑&#39;,sans-serif;color:#333333\">、具有敬业精神，工作积极主动，责任心强，较强事业心</span></p><p>&nbsp;</p><p><br/></p>', '18', '0', '0', '2015-12-27 13:26:58', '2015-12-27 13:23:20');

-- ----------------------------
-- Table structure for ls_user_info
-- ----------------------------
DROP TABLE IF EXISTS `ls_user_info`;
CREATE TABLE `ls_user_info` (
  `info_id` int(3) NOT NULL AUTO_INCREMENT,
  `user_id` int(3) NOT NULL,
  `user_photo` varchar(255) NOT NULL,
  `user_content` text NOT NULL,
  `user_photo_url` varchar(255) NOT NULL,
  PRIMARY KEY (`info_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ls_user_info
-- ----------------------------
INSERT INTO `ls_user_info` VALUES ('1', '1', 'No_photo_info', 'No_user_content', 'No_photo_url');
INSERT INTO `ls_user_info` VALUES ('2', '4', 'No_photo_info', 'No_user_content', 'No_photo_url');
INSERT INTO `ls_user_info` VALUES ('3', '3', 'No_photo_info', 'No_user_content', 'No_photo_url');

-- ----------------------------
-- Table structure for ls_user_menu
-- ----------------------------
DROP TABLE IF EXISTS `ls_user_menu`;
CREATE TABLE `ls_user_menu` (
  `user_menu_id` smallint(10) NOT NULL AUTO_INCREMENT,
  `user_id` smallint(4) NOT NULL,
  `menu_order` smallint(4) NOT NULL,
  `menu_name` varchar(40) NOT NULL,
  PRIMARY KEY (`user_menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ls_user_menu
-- ----------------------------
INSERT INTO `ls_user_menu` VALUES ('1', '0', '1', '学院概况');
INSERT INTO `ls_user_menu` VALUES ('2', '0', '2', '师资队伍');
INSERT INTO `ls_user_menu` VALUES ('3', '0', '3', '学院动态');

-- ----------------------------
-- Table structure for ls_visiter
-- ----------------------------
DROP TABLE IF EXISTS `ls_visiter`;
CREATE TABLE `ls_visiter` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) NOT NULL,
  `country` varchar(20) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `year` smallint(4) NOT NULL,
  `month` tinyint(2) NOT NULL,
  `day` tinyint(2) NOT NULL,
  `timeout` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ls_visiter
-- ----------------------------
INSERT INTO `ls_visiter` VALUES ('1', '::1', null, null, null, '2015', '11', '28', '1448713955');
INSERT INTO `ls_visiter` VALUES ('2', '::1', null, null, null, '2015', '11', '28', '1448715419');
INSERT INTO `ls_visiter` VALUES ('3', '::1', null, null, null, '2015', '11', '28', '1448716333');
INSERT INTO `ls_visiter` VALUES ('4', '::1', null, null, null, '2015', '11', '28', '1448719015');
INSERT INTO `ls_visiter` VALUES ('5', '::1', null, null, null, '2015', '11', '28', '1448723857');
INSERT INTO `ls_visiter` VALUES ('6', '::1', null, null, null, '2015', '11', '28', '1448724063');
INSERT INTO `ls_visiter` VALUES ('7', '::1', null, null, null, '2015', '11', '28', '1448724064');
INSERT INTO `ls_visiter` VALUES ('8', '::1', null, null, null, '2015', '11', '29', '1448783594');
INSERT INTO `ls_visiter` VALUES ('9', '::1', null, null, null, '2015', '11', '29', '1448789533');
INSERT INTO `ls_visiter` VALUES ('10', '::1', null, null, null, '2015', '11', '29', '1448804390');
INSERT INTO `ls_visiter` VALUES ('11', '::1', null, null, null, '2015', '11', '29', '1448807798');
INSERT INTO `ls_visiter` VALUES ('12', '::1', null, null, null, '2015', '11', '30', '1448855592');
INSERT INTO `ls_visiter` VALUES ('13', '::1', null, null, null, '2015', '11', '30', '1448855695');
INSERT INTO `ls_visiter` VALUES ('14', '::1', null, null, null, '2015', '11', '30', '1448855714');
INSERT INTO `ls_visiter` VALUES ('15', '::1', null, null, null, '2015', '11', '30', '1448856195');
INSERT INTO `ls_visiter` VALUES ('16', '::1', null, null, null, '2015', '11', '30', '1448856195');
INSERT INTO `ls_visiter` VALUES ('17', '::1', null, null, null, '2015', '11', '30', '1448856195');
INSERT INTO `ls_visiter` VALUES ('18', '::1', null, null, null, '2015', '11', '30', '1448856228');
INSERT INTO `ls_visiter` VALUES ('19', '::1', null, null, null, '2015', '11', '30', '1448867241');
INSERT INTO `ls_visiter` VALUES ('20', '::1', null, null, null, '2015', '12', '1', '1448932311');
INSERT INTO `ls_visiter` VALUES ('21', '::1', null, null, null, '2015', '12', '1', '1448956913');
INSERT INTO `ls_visiter` VALUES ('22', '::1', null, null, null, '2015', '12', '1', '1448959473');
INSERT INTO `ls_visiter` VALUES ('23', '::1', null, null, null, '2015', '12', '1', '1448965788');
INSERT INTO `ls_visiter` VALUES ('24', '::1', null, null, null, '2015', '12', '1', '1448976708');
INSERT INTO `ls_visiter` VALUES ('25', '::1', null, null, null, '2015', '12', '1', '1448978519');
INSERT INTO `ls_visiter` VALUES ('26', '::1', null, null, null, '2015', '12', '2', '1449028606');
INSERT INTO `ls_visiter` VALUES ('27', '::1', null, null, null, '2015', '12', '2', '1449036179');
INSERT INTO `ls_visiter` VALUES ('28', '::1', null, null, null, '2015', '12', '2', '1449038713');
