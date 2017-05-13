/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 50635
 Source Host           : 127.0.0.1
 Source Database       : hospitalSystem

 Target Server Type    : MySQL
 Target Server Version : 50635
 File Encoding         : utf-8

 Date: 05/13/2017 13:06:26 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `competence`
-- ----------------------------
DROP TABLE IF EXISTS `competence`;
CREATE TABLE `competence` (
  `qxid` mediumint(9) NOT NULL AUTO_INCREMENT,
  `qxsm` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `qxnum` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `qxmark` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `qxdw` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`qxid`),
  KEY `id` (`qxid`),
  KEY `typeid` (`qxnum`)
) ENGINE=MyISAM AUTO_INCREMENT=117 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `competence`
-- ----------------------------
BEGIN;
INSERT INTO `competence` VALUES ('1', '超级管理员', '100', '0', ''), ('2', '管理员', '50', '1', '管理员'), ('3', '咨询员', '20', '1', '管理员'), ('4', '个人', '10', '0', '');
COMMIT;

-- ----------------------------
--  Table structure for `guahao`
-- ----------------------------
DROP TABLE IF EXISTS `guahao`;
CREATE TABLE `guahao` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `addTime` datetime DEFAULT NULL,
  `yyName` varchar(200) DEFAULT NULL,
  `hzName` varchar(200) DEFAULT NULL,
  `hzTime` date DEFAULT NULL,
  `hzContact` varchar(200) DEFAULT NULL,
  `laiyuan` varchar(250) NOT NULL DEFAULT '' COMMENT '来源网址',
  `content` mediumtext COMMENT '病情反馈',
  `hfTime` date DEFAULT NULL,
  `hfRemark` longtext,
  `isdy` mediumint(2) DEFAULT NULL,
  `datepicker_0` date DEFAULT NULL,
  `datepicker_1` date DEFAULT NULL,
  `datepicker_2` date DEFAULT NULL,
  `datepicker_3` date DEFAULT NULL,
  `isInvalid` mediumint(2) DEFAULT '0',
  `ishf` mediumint(2) DEFAULT '0',
  `bztype` int(2) DEFAULT NULL,
  `source` int(2) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `mark` int(2) DEFAULT NULL,
  `isyue` mediumint(2) DEFAULT NULL,
  `dwtype` varchar(20) DEFAULT '1',
  `u_right` int(10) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`yyName`),
  KEY `age` (`hzTime`)
) ENGINE=MyISAM AUTO_INCREMENT=8282 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `guahao`
-- ----------------------------
BEGIN;
INSERT INTO `guahao` VALUES ('8278', '2017-05-09 10:43:46', '', '测试', '2017-05-12', '18785584578', 'file:///C:/Users/Administrator/Desktop/guahao/index.html', '这里是测试的内容！', '2017-05-09', '', '0', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '3', '0', '', '0', '0', 'RAIN_qxmark', '0'), ('8280', '2017-05-09 14:17:18', '', '大海', '2017-05-09', '15478458784', 'file:///C:/Users/Administrator/Desktop/ghao/index.html', '测试乖哦啊', '2017-05-08', '', '0', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '1', '0', '', '0', '0', '1', '0'), ('8281', '2017-05-09 14:40:20', 'RAIN_NAME', '小鱼儿', '2017-05-10', '18788858303', 'file:///C:/Users/Administrator/Desktop/guahao/index.html', '小鱼儿在这里测试数据，看看这个系统到底有没有用的！', '2017-05-09', '', '0', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '1', '0', '', '0', null, 'RAIN_qxmark', '0');
COMMIT;

-- ----------------------------
--  Table structure for `t_user`
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户表',
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `relname` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_user`
-- ----------------------------
BEGIN;
INSERT INTO `t_user` VALUES ('1', '123qwe', 'e10adc3949ba59abbe56e057f20f883e', '王羽佳');
COMMIT;

-- ----------------------------
--  Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `u_right` int(11) unsigned NOT NULL,
  `qxmark` varchar(10) DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `user`
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES ('5', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '王羽佳', '100', '0');
COMMIT;

-- ----------------------------
--  Triggers structure for table user
-- ----------------------------
DROP TRIGGER IF EXISTS `InsertUser`;
delimiter ;;
CREATE TRIGGER `InsertUser` BEFORE INSERT ON `user` FOR EACH ROW Begin   
/*IF new.type=1 then   
insert into user_group(uid,gid) values(new.uid,'578d3369633b47bd9c1fe8bf905cbfb1');    
END IF;    
IF new.type=2 then   
 /*insert into user_group(uid,gid) values(new.uid,'387bcd57fc5a4c3c9de83ee210fef661');   
END IF;     */
end
 ;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
