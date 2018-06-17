/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50611
Source Host           : 127.0.0.1:3306
Source Database       : newblog

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2018-06-17 15:41:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ad
-- ----------------------------
DROP TABLE IF EXISTS `ad`;
CREATE TABLE `ad` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ad
-- ----------------------------
INSERT INTO `ad` VALUES ('1', '1', '1');

-- ----------------------------
-- Table structure for blog
-- ----------------------------
DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text,
  `image` varchar(255) DEFAULT NULL,
  `classify_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `createtime` datetime NOT NULL,
  `updatetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog
-- ----------------------------
INSERT INTO `blog` VALUES ('1', '第一天', '111111111111111111', 'blog/2017-11-05/59fecc41dda9a.jpg', '3', '0', '2017-11-05 16:30:57', null);
INSERT INTO `blog` VALUES ('2', '第二天', '22222222222222222222', 'blog/2017-11-05/59fecc51e67a9.jpg', '3', '0', '2017-11-05 16:31:13', null);
INSERT INTO `blog` VALUES ('3', '111', '11111', 'blog/2017-11-05/59fecd1edd538.jpg', '4', '0', '2017-11-05 16:34:38', null);
INSERT INTO `blog` VALUES ('4', '2', '2222222', 'blog/2017-11-05/59fecdb599b38.jpg', '4', '0', '2017-11-05 16:37:09', null);
INSERT INTO `blog` VALUES ('5', '2222', '2222222', 'blog/2017-11-05/59fecf56aef03.jpg', '6', '0', '2017-11-05 16:44:06', null);
INSERT INTO `blog` VALUES ('6', '', '', '', '0', '0', '2017-11-07 18:41:54', null);
INSERT INTO `blog` VALUES ('7', '', '', '', '0', '0', '2017-11-07 18:42:32', null);
INSERT INTO `blog` VALUES ('8', '', '', '', '0', '0', '2017-11-07 18:45:19', null);
INSERT INTO `blog` VALUES ('9', '', '', '', '0', '0', '2017-11-07 18:46:22', null);

-- ----------------------------
-- Table structure for classify
-- ----------------------------
DROP TABLE IF EXISTS `classify`;
CREATE TABLE `classify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of classify
-- ----------------------------
INSERT INTO `classify` VALUES ('1', '慢生活', '0', '1');
INSERT INTO `classify` VALUES ('2', '学无止境', '0', '1');
INSERT INTO `classify` VALUES ('3', '日记', '1', '0');
INSERT INTO `classify` VALUES ('4', '心得笔记', '2', '0');
INSERT INTO `classify` VALUES ('5', 'html', '1', '0');
INSERT INTO `classify` VALUES ('6', 'css', '2', '0');
INSERT INTO `classify` VALUES ('7', '留言', '0', '0');
INSERT INTO `classify` VALUES ('8', '其他', '7', '0');
INSERT INTO `classify` VALUES ('9', '学海', '0', '0');
INSERT INTO `classify` VALUES ('10', '啦啦啦', '0', '0');
INSERT INTO `classify` VALUES ('11', '你好', '0', '0');
INSERT INTO `classify` VALUES ('12', '333', '11', '0');
INSERT INTO `classify` VALUES ('13', '66666', '11', '0');
INSERT INTO `classify` VALUES ('14', '33333', '11', '0');
INSERT INTO `classify` VALUES ('15', '4152', '11', '0');
INSERT INTO `classify` VALUES ('16', '963', '11', '0');
INSERT INTO `classify` VALUES ('17', '33336', '1', '0');
INSERT INTO `classify` VALUES ('18', '5552', '1', '0');

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `content` text,
  `createtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('1', '1', '5', '0', '不错', '2017-10-26 13:27:38');
INSERT INTO `comment` VALUES ('2', '1', '5', '0', '不错', '2017-10-26 13:30:28');
INSERT INTO `comment` VALUES ('3', '1', '5', '0', '不错', '2017-10-26 13:30:39');
INSERT INTO `comment` VALUES ('4', '1', '5', '0', '不错', '2017-10-26 13:36:20');
INSERT INTO `comment` VALUES ('5', '1', '5', '0', '很好', '2017-10-26 13:54:24');
INSERT INTO `comment` VALUES ('6', '1', '5', '0', '很不错', '2017-10-26 13:54:35');
INSERT INTO `comment` VALUES ('7', '1', '5', '0', '很不错啊', '2017-10-26 13:56:50');
INSERT INTO `comment` VALUES ('8', '2', '5', '0', '很好', '2017-10-26 14:25:00');
INSERT INTO `comment` VALUES ('9', '1', '4', '0', '不错', '2017-10-28 08:03:56');
INSERT INTO `comment` VALUES ('10', '2', '4', '0', '哇塞', '2017-10-28 08:36:55');
INSERT INTO `comment` VALUES ('11', '0', '1', '0', '666', '2017-11-08 13:16:40');
INSERT INTO `comment` VALUES ('12', '0', '1', '0', '666', '2017-11-08 13:16:56');
INSERT INTO `comment` VALUES ('13', '0', '1', '0', '6', '2017-11-08 13:17:34');
INSERT INTO `comment` VALUES ('14', '0', '1', '0', '哇', '2018-06-17 15:15:01');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '尚子坤', '290917115@qq.com', '123123', './public/upload/img_1509172626498566.jpg', '0', '2017-10-26 12:14:06', null);
INSERT INTO `user` VALUES ('3', '你 ', '1@qq.com', '1', 'user/2017-11-08/5a028d11483aa.jpg', '0', '0000-00-00 00:00:00', null);
INSERT INTO `user` VALUES ('4', '你好', '123@qq.com', '123', 'user/2017-11-08/5a028d45d66c9.jpg', '0', '0000-00-00 00:00:00', null);
INSERT INTO `user` VALUES ('5', '政委', '123@qq.com', '123456', null, '0', '0000-00-00 00:00:00', null);
INSERT INTO `user` VALUES ('7', 'zheng', '12@qq.com', '123', null, '0', '0000-00-00 00:00:00', null);
INSERT INTO `user` VALUES ('8', '小明', '1', '11', null, '0', '0000-00-00 00:00:00', null);
