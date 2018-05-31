/*
SQLyog Professional v12.08 (64 bit)
MySQL - 5.5.53 : Database - shop
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`shop` /*!40100 DEFAULT CHARACTER SET utf32 */;

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

/*Table structure for table `shop_users` */

DROP TABLE IF EXISTS `shop_users`;

CREATE TABLE `shop_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) DEFAULT NULL COMMENT '用户编号',
  `user_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '户名用',
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '一级密码密加',
  `passopen` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '二级密码',
  `bank_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '开户银行',
  `bank_card` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '银行卡号',
  `bank_address` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '支行地址',
  `user_tel` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '电话',
  `user_code` varchar(50) NOT NULL COMMENT '身份证号',
  `rdt` int(11) NOT NULL COMMENT '注册时间',
  `re_id` int(11) NOT NULL COMMENT '推荐ID',
  `re_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '推荐人名称',
  `re_level` int(10) DEFAULT '0' COMMENT '上层绝对层数',
  `father_id` int(11) DEFAULT '0' COMMENT '上层id',
  `father_name` varchar(50) DEFAULT NULL COMMENT '上层编号',
  `p_level` int(10) DEFAULT '0' COMMENT '绝对层数',
  `is_pay` tinyint(1) DEFAULT '0' COMMENT '是否开通(0,1)',
  `is_lock` int(11) DEFAULT '0' COMMENT '是否锁定(0,1)',
  `agent_status` tinyint(1) DEFAULT '0' COMMENT '报单中心级别',
  `agent_level` tinyint(1) DEFAULT '0' COMMENT '报单中心级别',
  `agent_use` decimal(12,2) DEFAULT '0.00' COMMENT '奖金币',
  `agent_cash` decimal(12,2) unsigned DEFAULT '0.00' COMMENT '电子币',
  `agent_xf` decimal(12,2) DEFAULT '0.00',
  `dongjie` decimal(12,2) DEFAULT '0.00' COMMENT '冻结账号',
  `cpzj` decimal(11,2) DEFAULT '0.00' COMMENT '注册资金',
  `u_level` tinyint(1) NOT NULL DEFAULT '0' COMMENT '等级(会员级别)',
  `pdt` int(11) DEFAULT '0' COMMENT '开通时间',
  `shop_id` int(11) NOT NULL COMMENT '隶属报单ID',
  `shop_name` varchar(50) NOT NULL COMMENT '报单中心编号',
  `zjj` decimal(12,2) DEFAULT '0.00' COMMENT '总奖金',
  `re_nums` int(5) DEFAULT '0' COMMENT '人数',
  `lock_b` tinyint(1) DEFAULT '0' COMMENT '进入B网未达标',
  `l` int(10) DEFAULT '0' COMMENT '左区人数',
  `z` int(10) DEFAULT '0' COMMENT '中间人数',
  `r` int(10) DEFAULT '0' COMMENT '右区人数',
  `treeplace` tinyint(1) DEFAULT '0' COMMENT '相对于上层的位置',
  `number` int(10) DEFAULT '0' COMMENT '激活顺序',
  `teamber` int(11) DEFAULT '0' COMMENT '团队人数',
  `kongwei` tinyint(1) DEFAULT '0' COMMENT '底下还有几个空位',
  `s_tui` int(11) DEFAULT '0' COMMENT '直推人数',
  `idt` int(11) DEFAULT '0' COMMENT '报单中心激活时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `re_id` (`re_id`)
) ENGINE=MyISAM AUTO_INCREMENT=448 DEFAULT CHARSET=utf8;

/*Data for the table `shop_users` */

insert  into `shop_users`(`id`,`user_id`,`user_name`,`password`,`passopen`,`bank_name`,`bank_card`,`bank_address`,`user_tel`,`user_code`,`rdt`,`re_id`,`re_name`,`re_level`,`father_id`,`father_name`,`p_level`,`is_pay`,`is_lock`,`agent_status`,`agent_level`,`agent_use`,`agent_cash`,`agent_xf`,`dongjie`,`cpzj`,`u_level`,`pdt`,`shop_id`,`shop_name`,`zjj`,`re_nums`,`lock_b`,`l`,`z`,`r`,`treeplace`,`number`,`teamber`,`kongwei`,`s_tui`,`idt`) values (33,'100000','Company','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','工商银行','222','222123123123','1370000000','',1340632828,0,'',0,0,NULL,1,1,0,2,2,'12100.00','0.00','0.00','0.00','3000.00',1,1519566483,0,'','0.00',14,2,4,4,4,0,0,60,3,2,0),(383,'2125274','2125274','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037817,377,'4564239',0,370,'8358367',4,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037823,1,'100000','0.00',2,0,1,1,1,3,15,2,3,2,0),(384,'8877746','8877746','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037817,378,'3811950',0,371,'3158264',4,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037823,1,'100000','0.00',2,0,1,1,1,1,16,2,3,2,0),(382,'3571899','3571899','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037817,377,'4564239',0,371,'3158264',4,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037824,1,'100000','0.00',2,0,1,1,1,2,17,2,3,2,0),(381,'1194183','1194183','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037817,376,'6269592',0,371,'3158264',4,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037824,1,'100000','0.00',2,0,1,1,1,3,18,2,3,2,0),(380,'4839721','4839721','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037817,376,'6269592',0,369,'9056549',4,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037824,1,'100000','0.00',2,0,1,1,1,1,19,2,3,2,0),(376,'6269592','6269592','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037771,371,'3158264',0,367,'9024414',3,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037778,1,'100000','0.00',2,0,1,1,1,1,7,6,3,2,0),(377,'4564239','4564239','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037771,371,'3158264',0,367,'9024414',3,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037778,1,'100000','0.00',2,0,1,1,1,2,8,6,3,2,0),(378,'3811950','3811950','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037771,369,'9056549',0,367,'9024414',3,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037778,1,'100000','0.00',2,0,1,1,1,3,9,6,3,2,0),(368,'2343902','2343902','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037767,366,'2418060',0,33,'100000',2,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037770,1,'100000','0.00',2,2,4,4,4,3,3,14,3,2,0),(370,'8358367','8358367','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037767,367,'9024414',0,366,'2418060',3,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037770,1,'100000','0.00',2,2,4,4,4,1,4,14,3,2,0),(371,'3158264','3158264','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037767,367,'9024414',0,366,'2418060',3,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037770,1,'100000','0.00',2,2,4,4,4,2,5,14,3,2,0),(372,'1636657','1636657','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037771,368,'2343902',0,368,'2343902',3,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037778,1,'100000','0.00',2,0,1,1,1,1,10,6,3,2,0),(373,'6218780','6218780','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037771,368,'2343902',0,368,'2343902',3,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037778,1,'100000','0.00',2,0,1,1,1,2,11,6,3,2,0),(374,'6173187','6173187','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037771,370,'8358367',0,368,'2343902',3,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037778,1,'100000','0.00',2,0,1,1,1,3,12,6,3,2,0),(375,'1538055','1538055','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037771,370,'8358367',0,370,'8358367',4,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037778,1,'100000','0.00',2,0,1,1,1,1,13,6,3,2,0),(366,'2418060','2418060','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037760,33,'100000',0,33,'100000',2,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037764,1,'100000','0.00',2,2,4,4,4,1,1,28,3,2,0),(379,'5369812','5369812','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037771,369,'9056549',0,370,'8358367',4,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037778,1,'100000','0.00',2,0,1,1,1,2,14,4,3,2,0),(369,'9056549','9056549','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037767,366,'2418060',0,366,'2418060',3,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037770,1,'100000','0.00',2,0,4,1,1,3,6,12,3,2,0),(367,'9024414','9024414','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037760,33,'100000',0,33,'100000',2,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037764,1,'100000','0.00',2,2,4,4,4,2,2,30,3,2,0),(385,'8466857','8466857','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037817,378,'3811950',0,369,'9056549',4,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037824,1,'100000','0.00',2,0,0,0,0,2,20,2,0,2,0),(386,'8408905','8408905','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037817,372,'1636657',0,369,'9056549',4,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037824,1,'100000','0.00',2,0,0,0,0,3,21,2,0,2,0),(387,'4207733','4207733','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037817,372,'1636657',0,376,'6269592',4,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037824,1,'100000','0.00',2,0,0,0,0,1,22,2,0,2,0),(388,'5181396','5181396','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037817,373,'6218780',0,376,'6269592',4,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037824,1,'100000','0.00',2,0,0,0,0,2,23,2,0,2,0),(389,'7912048','7912048','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037817,373,'6218780',0,376,'6269592',4,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037824,1,'100000','0.00',2,0,0,0,0,3,24,2,0,2,0),(390,'2975616','2975616','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037817,374,'6173187',0,377,'4564239',4,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037831,1,'100000','0.00',2,0,0,0,0,1,25,2,0,2,0),(391,'5887268','5887268','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037817,374,'6173187',0,377,'4564239',4,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037831,1,'100000','0.00',2,0,0,0,0,2,26,2,0,2,0),(392,'7739013','7739013','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037817,375,'1538055',0,377,'4564239',4,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037831,1,'100000','0.00',2,0,0,0,0,3,27,2,0,2,0),(393,'5240997','5240997','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037817,375,'1538055',0,378,'3811950',4,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037831,1,'100000','0.00',2,0,0,0,0,1,28,2,0,2,0),(394,'2610595','2610595','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037817,379,'5369812',0,378,'3811950',4,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037831,1,'100000','0.00',2,0,0,0,0,2,29,2,0,2,0),(395,'3236267','3236267','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037817,379,'5369812',0,378,'3811950',4,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037831,1,'100000','0.00',0,0,0,0,0,3,30,0,0,2,0),(396,'7531921','7531921','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037826,383,'2125274',0,372,'1636657',4,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037838,1,'100000','0.00',0,0,0,0,0,1,31,0,0,2,0),(397,'5036376','5036376','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037826,383,'2125274',0,372,'1636657',4,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037838,1,'100000','0.00',0,0,0,0,0,2,32,0,0,2,0),(398,'5526641','5526641','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037826,384,'8877746',0,372,'1636657',4,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037838,1,'100000','0.00',0,0,0,0,0,3,33,0,0,2,0),(399,'6110565','6110565','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037826,384,'8877746',0,373,'6218780',4,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037838,1,'100000','0.00',0,0,0,0,0,1,34,0,0,2,0),(400,'5502471','5502471','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037826,382,'3571899',0,373,'6218780',4,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037838,1,'100000','0.00',0,0,0,0,0,2,35,0,0,2,0),(401,'4470581','4470581','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037826,382,'3571899',0,373,'6218780',4,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037838,1,'100000','0.00',0,0,0,0,0,3,36,0,0,2,0),(402,'9906341','9906341','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037826,381,'1194183',0,374,'6173187',4,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037838,1,'100000','0.00',0,0,0,0,0,1,37,0,0,2,0),(403,'9760772','9760772','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037826,381,'1194183',0,374,'6173187',4,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037838,1,'100000','0.00',0,0,0,0,0,2,38,0,0,2,0),(404,'4668334','4668334','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037826,380,'4839721',0,374,'6173187',4,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037838,1,'100000','0.00',0,0,0,0,0,3,39,0,0,2,0),(405,'2164276','2164276','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037826,380,'4839721',0,375,'1538055',5,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037838,1,'100000','0.00',0,0,0,0,0,1,40,0,0,2,0),(406,'8629730','8629730','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037826,385,'8466857',0,375,'1538055',5,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037847,1,'100000','0.00',0,0,0,0,0,2,41,0,0,0,0),(407,'7047424','7047424','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037826,385,'8466857',0,375,'1538055',5,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037847,1,'100000','0.00',0,0,0,0,0,3,42,0,0,0,0),(408,'8831878','8831878','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037826,386,'8408905',0,379,'5369812',5,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037847,1,'100000','0.00',0,0,0,0,0,1,43,0,0,0,0),(409,'9424316','9424316','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037826,386,'8408905',0,379,'5369812',5,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037847,1,'100000','0.00',0,0,0,0,0,2,44,0,0,0,0),(410,'3129150','3129150','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037826,387,'4207733',0,379,'5369812',5,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037847,1,'100000','0.00',0,0,0,0,0,3,45,0,0,0,0),(411,'9109283','9109283','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037826,387,'4207733',0,383,'2125274',5,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037847,1,'100000','0.00',0,0,0,0,0,1,46,0,0,0,0),(412,'5763397','5763397','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037826,388,'5181396',0,383,'2125274',5,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037847,1,'100000','0.00',0,0,0,0,0,2,47,0,0,0,0),(413,'3883636','3883636','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037826,388,'5181396',0,383,'2125274',5,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037847,1,'100000','0.00',0,0,0,0,0,3,48,0,0,0,0),(414,'8180938','8180938','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037826,389,'7912048',0,384,'8877746',5,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037847,1,'100000','0.00',0,0,0,0,0,1,49,0,0,0,0),(415,'7096038','7096038','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037826,389,'7912048',0,384,'8877746',5,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037847,1,'100000','0.00',0,0,0,0,0,2,50,0,0,0,0),(416,'3287902','3287902','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037840,390,'2975616',0,384,'8877746',5,1,0,2,1,'0.00','0.00','0.00','0.00','3000.00',1,1521037852,1,'100000','0.00',0,0,0,0,0,3,51,0,0,0,0),(417,'4734527','4734527','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037840,390,'2975616',0,382,'3571899',5,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037852,1,'100000','0.00',0,0,0,0,0,1,52,0,0,0,0),(418,'2920410','2920410','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037840,391,'5887268',0,382,'3571899',5,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037852,1,'100000','0.00',0,0,0,0,0,2,53,0,0,0,0),(419,'3803161','3803161','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037840,391,'5887268',0,382,'3571899',5,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037852,1,'100000','0.00',0,0,0,0,0,3,54,0,0,0,0),(420,'1277130','1277130','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037840,392,'7739013',0,381,'1194183',5,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037852,1,'100000','0.00',0,0,0,0,0,1,55,0,0,0,0),(421,'8659118','8659118','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037840,392,'7739013',0,381,'1194183',5,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037852,1,'100000','0.00',0,0,0,0,0,2,56,0,0,0,0),(422,'9087036','9087036','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037840,393,'5240997',0,381,'1194183',5,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037853,1,'100000','0.00',0,0,0,0,0,3,57,0,0,0,0),(423,'4624664','4624664','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037840,393,'5240997',0,380,'4839721',5,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037853,1,'100000','0.00',0,0,0,0,0,1,58,0,0,0,0),(424,'9421295','9421295','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037840,394,'2610595',0,380,'4839721',5,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037853,1,'100000','0.00',0,0,0,0,0,2,59,0,0,0,0),(425,'7685180','7685180','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037840,394,'2610595',0,380,'4839721',5,1,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,1521037853,1,'100000','0.00',0,0,0,0,0,3,60,0,0,0,0),(429,'9697326','9697326','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037840,396,'7531921',0,0,NULL,0,0,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,0,1,'100000','0.00',0,0,0,0,0,0,0,0,0,0,0),(430,'7273193','7273193','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037841,397,'5036376',0,0,NULL,0,0,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,0,1,'100000','0.00',0,0,0,0,0,0,0,0,0,0,0),(431,'8170501','8170501','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037841,397,'5036376',0,0,NULL,0,0,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,0,1,'100000','0.00',0,0,0,0,0,0,0,0,0,0,0),(432,'7459960','7459960','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037841,398,'5526641',0,0,NULL,0,0,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,0,1,'100000','0.00',0,0,0,0,0,0,0,0,0,0,0),(433,'5574981','5574981','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037841,398,'5526641',0,0,NULL,0,0,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,0,1,'100000','0.00',0,0,0,0,0,0,0,0,0,0,0),(434,'3992675','3992675','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037841,399,'6110565',0,0,NULL,0,0,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,0,1,'100000','0.00',0,0,0,0,0,0,0,0,0,0,0),(435,'2814941','2814941','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037841,399,'6110565',0,0,NULL,0,0,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,0,1,'100000','0.00',0,0,0,0,0,0,0,0,0,0,0),(436,'3533172','3533172','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037841,400,'5502471',0,0,NULL,0,0,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,0,1,'100000','0.00',0,0,0,0,0,0,0,0,0,0,0),(437,'4086883','4086883','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037841,400,'5502471',0,0,NULL,0,0,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,0,1,'100000','0.00',0,0,0,0,0,0,0,0,0,0,0),(438,'7004852','7004852','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037841,401,'4470581',0,0,NULL,0,0,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,0,1,'100000','0.00',0,0,0,0,0,0,0,0,0,0,0),(439,'4900146','4900146','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037841,401,'4470581',0,0,NULL,0,0,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,0,1,'100000','0.00',0,0,0,0,0,0,0,0,0,0,0),(440,'6608245','6608245','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037841,402,'9906341',0,0,NULL,0,0,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,0,1,'100000','0.00',0,0,0,0,0,0,0,0,0,0,0),(441,'9778625','9778625','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037841,402,'9906341',0,0,NULL,0,0,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,0,1,'100000','0.00',0,0,0,0,0,0,0,0,0,0,0),(442,'5456054','5456054','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037841,403,'9760772',0,0,NULL,0,0,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,0,1,'100000','0.00',0,0,0,0,0,0,0,0,0,0,0),(443,'7142730','7142730','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037841,403,'9760772',0,0,NULL,0,0,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,0,1,'100000','0.00',0,0,0,0,0,0,0,0,0,0,0),(444,'9570983','9570983','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037841,404,'4668334',0,0,NULL,0,0,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,0,1,'100000','0.00',0,0,0,0,0,0,0,0,0,0,0),(445,'9384765','9384765','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037841,404,'4668334',0,0,NULL,0,0,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,0,1,'100000','0.00',0,0,0,0,0,0,0,0,0,0,0),(446,'3461761','3461761','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037841,405,'2164276',0,0,NULL,0,0,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,0,1,'100000','0.00',0,0,0,0,0,0,0,0,0,0,0),(447,'9733306','9733306','96e79218965eb72c92a549dd5a330112','e3ceb5881a0a1fdaad01296d7554868d','123456','123456',NULL,'13712341234','123456789123456789',1521037841,405,'2164276',0,0,NULL,0,0,0,0,0,'0.00','0.00','0.00','0.00','3000.00',1,0,1,'100000','0.00',0,0,0,0,0,0,0,0,0,0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
