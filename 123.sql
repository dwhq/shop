/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.5.53 : Database - shop
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_·CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`shop` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `shop`;

/*Table structure for table `shop_admin` */

DROP TABLE IF EXISTS `shop_admin`;

CREATE TABLE `shop_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL COMMENT '姓名',
  `pet_name` varchar(30) DEFAULT NULL COMMENT '昵称',
  `password` varchar(500) NOT NULL COMMENT '密码',
  `email` varchar(100) DEFAULT NULL COMMENT '邮箱',
  `mobile` varchar(20) DEFAULT NULL COMMENT '手机号码',
  `sex` int(1) DEFAULT '0' COMMENT '0保密，1男，2女',
  `last_time` int(11) DEFAULT NULL COMMENT '最后登录时间',
  `last_ip` varchar(60) DEFAULT NULL COMMENT '最后登录IP',
  `time` int(11) DEFAULT NULL COMMENT '注册时间',
  `status` int(1) DEFAULT '0' COMMENT '账户状态 0正常 1冻结',
  `auth_group_id` varchar(100) DEFAULT NULL COMMENT '账号组ID 属于多个组用逗号隔开',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `shop_admin` */

insert  into `shop_admin`(`id`,`name`,`pet_name`,`password`,`email`,`mobile`,`sex`,`last_time`,`last_ip`,`time`,`status`,`auth_group_id`) values (14,'admin','余温','$2y$10$Te71cQRWCF4psXpR2Uuqb.8HJSbqhwyv8WUJD/iV6SAtJOASTVRVS','123@qq.com',NULL,1,NULL,NULL,NULL,0,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
