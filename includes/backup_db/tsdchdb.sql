/*
Navicat MySQL Data Transfer

Source Server         : WEBServer
Source Server Version : 50555
Source Host           : 192.168.11.9:3306
Source Database       : tsdchdb

Target Server Type    : MYSQL
Target Server Version : 50555
File Encoding         : 65001

Date: 2017-07-13 13:40:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for amphur
-- ----------------------------
DROP TABLE IF EXISTS `amphur`;
CREATE TABLE `amphur` (
  `AMPHUR_ID` int(5) NOT NULL AUTO_INCREMENT,
  `AMPHUR_CODE` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `AMPHUR_NAME` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `GEO_ID` int(5) NOT NULL DEFAULT '0',
  `PROVINCE_ID` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`AMPHUR_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=999 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for budgets
-- ----------------------------
DROP TABLE IF EXISTS `budgets`;
CREATE TABLE `budgets` (
  `bgid` int(5) NOT NULL AUTO_INCREMENT,
  `bgcode` varchar(10) NOT NULL,
  `bdname` varchar(150) NOT NULL,
  PRIMARY KEY (`bgid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for district
-- ----------------------------
DROP TABLE IF EXISTS `district`;
CREATE TABLE `district` (
  `DISTRICT_ID` int(5) NOT NULL AUTO_INCREMENT,
  `DISTRICT_CODE` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `DISTRICT_NAME` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `AMPHUR_ID` int(5) NOT NULL DEFAULT '0',
  `PROVINCE_ID` int(5) NOT NULL DEFAULT '0',
  `GEO_ID` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`DISTRICT_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8861 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for durable
-- ----------------------------
DROP TABLE IF EXISTS `durable`;
CREATE TABLE `durable` (
  `durable_id` int(5) NOT NULL AUTO_INCREMENT,
  `durable_code` varchar(100) NOT NULL,
  `durable_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `durable_type_code` varchar(100) CHARACTER SET utf8 NOT NULL,
  `durable_status` varchar(1) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  PRIMARY KEY (`durable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for durable_device
-- ----------------------------
DROP TABLE IF EXISTS `durable_device`;
CREATE TABLE `durable_device` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `device_code` varchar(11) NOT NULL,
  `serial` varchar(100) DEFAULT NULL,
  `durable_type_code` varchar(100) NOT NULL,
  `dtype` varchar(200) NOT NULL,
  `brand` varchar(200) DEFAULT NULL,
  `model` varchar(200) DEFAULT NULL,
  `spec` text,
  `person` varchar(200) DEFAULT NULL,
  `depart` varchar(200) NOT NULL,
  `date_install` date NOT NULL,
  `price` int(6) NOT NULL,
  `get` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `serialkey` varchar(100) DEFAULT NULL,
  `file_number` varchar(200) DEFAULT NULL,
  `file_download` varchar(200) DEFAULT NULL,
  `picture` varchar(200) DEFAULT NULL,
  `budgets` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=256 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for durable_type
-- ----------------------------
DROP TABLE IF EXISTS `durable_type`;
CREATE TABLE `durable_type` (
  `durable_type_id` int(5) NOT NULL AUTO_INCREMENT,
  `durable_type_code` varchar(100) NOT NULL,
  `durable_type_name` varchar(100) NOT NULL,
  `durable_type_status` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`durable_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for it_charges
-- ----------------------------
DROP TABLE IF EXISTS `it_charges`;
CREATE TABLE `it_charges` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `detail` varchar(200) NOT NULL,
  `price` int(6) NOT NULL,
  `dupdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for it_desktop
-- ----------------------------
DROP TABLE IF EXISTS `it_desktop`;
CREATE TABLE `it_desktop` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `desktop_code` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `serial` varchar(100) NOT NULL,
  `ctype` varchar(100) DEFAULT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `mac` varchar(17) DEFAULT NULL,
  `hdd` varchar(100) DEFAULT NULL,
  `cpu` varchar(200) DEFAULT NULL,
  `board` varchar(100) DEFAULT NULL,
  `core` int(1) DEFAULT NULL,
  `ram` varchar(100) DEFAULT NULL,
  `vga` varchar(100) DEFAULT NULL,
  `dvd` varchar(50) DEFAULT NULL,
  `os` varchar(100) DEFAULT NULL,
  `program` text,
  `ups_code` varchar(100) NOT NULL,
  `monitor_code` varchar(100) NOT NULL,
  `printer` varchar(100) NOT NULL,
  `person` varchar(100) NOT NULL,
  `depart` varchar(100) NOT NULL,
  `date_install` date NOT NULL,
  `price` int(10) NOT NULL,
  `get` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `file_number` varchar(20) NOT NULL,
  `file_download` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for it_device
-- ----------------------------
DROP TABLE IF EXISTS `it_device`;
CREATE TABLE `it_device` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `device_code` varchar(11) NOT NULL,
  `serial` varchar(100) DEFAULT NULL,
  `dtype` varchar(200) NOT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `mac` varchar(100) DEFAULT NULL,
  `brand` varchar(200) DEFAULT NULL,
  `model` varchar(200) DEFAULT NULL,
  `spec` text,
  `person` varchar(200) DEFAULT NULL,
  `depart` varchar(200) NOT NULL,
  `date_install` date NOT NULL,
  `price` int(6) NOT NULL,
  `get` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `serialkey` varchar(100) DEFAULT NULL,
  `file_number` varchar(200) DEFAULT NULL,
  `file_download` varchar(200) DEFAULT NULL,
  `picture` varchar(200) DEFAULT NULL,
  `budgets` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=472 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for it_file_download
-- ----------------------------
DROP TABLE IF EXISTS `it_file_download`;
CREATE TABLE `it_file_download` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `file_title` varchar(200) NOT NULL,
  `file_number` varchar(200) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `dupdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for it_mainten
-- ----------------------------
DROP TABLE IF EXISTS `it_mainten`;
CREATE TABLE `it_mainten` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `date_mainten` varchar(200) NOT NULL,
  `detail_mainten` text NOT NULL,
  `person_mainten` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=136 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for it_monitor
-- ----------------------------
DROP TABLE IF EXISTS `it_monitor`;
CREATE TABLE `it_monitor` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `monitor_code` varchar(100) NOT NULL,
  `desktop_code` varchar(100) DEFAULT NULL,
  `serial` varchar(100) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `size` int(2) DEFAULT NULL,
  `monitor` varchar(200) DEFAULT NULL,
  `depart` varchar(200) DEFAULT NULL,
  `date_install` date DEFAULT NULL,
  `price` int(6) DEFAULT NULL,
  `get` varchar(100) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `picture` varchar(200) DEFAULT NULL,
  `file_number` varchar(200) DEFAULT NULL,
  `file_download` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for it_notebook
-- ----------------------------
DROP TABLE IF EXISTS `it_notebook`;
CREATE TABLE `it_notebook` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `notebook_code` varchar(8) NOT NULL,
  `name` varchar(200) NOT NULL,
  `serial` varchar(200) NOT NULL,
  `ctype` varchar(200) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `mac` varchar(100) DEFAULT NULL,
  `hdd` varchar(100) DEFAULT NULL,
  `cpu` varchar(100) DEFAULT NULL,
  `core` int(1) DEFAULT NULL,
  `vga` varchar(200) DEFAULT NULL,
  `ram` varchar(200) DEFAULT NULL,
  `person` varchar(13) DEFAULT NULL,
  `depart` varchar(200) DEFAULT NULL,
  `date_install` date NOT NULL,
  `price` float NOT NULL,
  `get` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `file_number` varchar(100) NOT NULL,
  `file_download` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for it_notification
-- ----------------------------
DROP TABLE IF EXISTS `it_notification`;
CREATE TABLE `it_notification` (
  `id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `date_inform` date NOT NULL,
  `time_inform` time NOT NULL,
  `depart` varchar(200) NOT NULL,
  `person` varchar(200) NOT NULL,
  `cause` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for it_plan_mainten
-- ----------------------------
DROP TABLE IF EXISTS `it_plan_mainten`;
CREATE TABLE `it_plan_mainten` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `detail` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for it_printer
-- ----------------------------
DROP TABLE IF EXISTS `it_printer`;
CREATE TABLE `it_printer` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `printer_code` varchar(8) NOT NULL,
  `desktop_code` varchar(8) NOT NULL,
  `serial` varchar(100) NOT NULL,
  `ptype` varchar(200) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `mac` varchar(100) DEFAULT NULL,
  `brand` varchar(200) DEFAULT NULL,
  `model` varchar(200) DEFAULT NULL,
  `person` varchar(200) DEFAULT NULL,
  `depart` varchar(200) DEFAULT NULL,
  `date_install` date DEFAULT NULL,
  `price` int(6) DEFAULT NULL,
  `get` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `picture` varchar(200) DEFAULT NULL,
  `file_number` varchar(200) NOT NULL,
  `file_download` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for it_repair
-- ----------------------------
DROP TABLE IF EXISTS `it_repair`;
CREATE TABLE `it_repair` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `code` varchar(9) NOT NULL,
  `date_repair` varchar(200) DEFAULT NULL,
  `detail_repair` varchar(200) DEFAULT NULL,
  `person_repair` varchar(100) DEFAULT NULL,
  `price_repair` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for it_service
-- ----------------------------
DROP TABLE IF EXISTS `it_service`;
CREATE TABLE `it_service` (
  `id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `date_inform` date NOT NULL,
  `time_inform` time NOT NULL,
  `depart` varchar(200) NOT NULL,
  `person` varchar(200) NOT NULL,
  `cause` varchar(200) NOT NULL,
  `date_service` date NOT NULL,
  `time_service` time NOT NULL,
  `detail_service` text NOT NULL,
  `person_service` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=351 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for it_ups
-- ----------------------------
DROP TABLE IF EXISTS `it_ups`;
CREATE TABLE `it_ups` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `ups_code` varchar(10) NOT NULL,
  `desktop_code` varchar(10) DEFAULT NULL,
  `serial` varchar(100) NOT NULL,
  `brand` varchar(200) NOT NULL,
  `vat` int(6) NOT NULL,
  `depart` varchar(200) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `date_install` date DEFAULT NULL,
  `price` int(6) DEFAULT NULL,
  `get` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `picture` varchar(200) DEFAULT NULL,
  `file_number` varchar(200) DEFAULT NULL,
  `file_download` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for la
-- ----------------------------
DROP TABLE IF EXISTS `la`;
CREATE TABLE `la` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `idcard` varchar(13) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `latype` varchar(250) NOT NULL,
  `dsum` float NOT NULL,
  `dupdate` date NOT NULL,
  `person` varchar(255) DEFAULT NULL,
  `ladetail` varchar(255) DEFAULT NULL,
  `laname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2271 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for meeting_list
-- ----------------------------
DROP TABLE IF EXISTS `meeting_list`;
CREATE TABLE `meeting_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `strdate` date NOT NULL,
  `enddate` date NOT NULL,
  `strtime` varchar(10) NOT NULL,
  `endtime` varchar(10) NOT NULL,
  `room` int(5) NOT NULL,
  `room_type` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `qty` int(5) NOT NULL,
  `idcard` varchar(13) NOT NULL,
  `depart` varchar(100) NOT NULL,
  `conduct` varchar(1) NOT NULL,
  `computer` varchar(1) NOT NULL,
  `conduct_1` varchar(1) NOT NULL COMMENT 'จัดสถานที่ประชุม',
  `conduct_2` varchar(1) NOT NULL COMMENT 'จัดเครื่องดื่ม(น้ำเปล่า) จำนวน',
  `conduct_3` varchar(1) NOT NULL COMMENT 'จัดเครื่องดื่มพร้อมอาหารว่าง จำนวน',
  `conduct_2_qty` int(2) NOT NULL COMMENT 'จัดเครื่องดื่ม(น้ำเปล่า) รอบเบค',
  `conduct_3_qty` int(2) NOT NULL COMMENT 'จัดเครื่องดื่มพร้อมอาหารว่าง รอบเบค',
  `budget` varchar(1) NOT NULL,
  `mstatus` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=231 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for meeting_room
-- ----------------------------
DROP TABLE IF EXISTS `meeting_room`;
CREATE TABLE `meeting_room` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=145 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for meeting_room_type
-- ----------------------------
DROP TABLE IF EXISTS `meeting_room_type`;
CREATE TABLE `meeting_room_type` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(10) NOT NULL DEFAULT '',
  `topic` varchar(255) NOT NULL DEFAULT '',
  `headline` varchar(255) NOT NULL DEFAULT '',
  `posted` longtext NOT NULL,
  `post_date` varchar(50) NOT NULL DEFAULT '',
  `update_date` varchar(50) NOT NULL DEFAULT '',
  `enable_comment` tinyint(1) NOT NULL DEFAULT '0',
  `pageview` int(11) NOT NULL DEFAULT '0',
  `attach` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `category` (`category`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=tis620;

-- ----------------------------
-- Table structure for news_category
-- ----------------------------
DROP TABLE IF EXISTS `news_category`;
CREATE TABLE `news_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL DEFAULT '',
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=tis620;

-- ----------------------------
-- Table structure for news_comment
-- ----------------------------
DROP TABLE IF EXISTS `news_comment`;
CREATE TABLE `news_comment` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `news_id` int(7) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL DEFAULT '',
  `comment` text NOT NULL,
  `ip` varchar(50) NOT NULL DEFAULT '',
  `post_date` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `news_id` (`news_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=tis620;

-- ----------------------------
-- Table structure for nutrition
-- ----------------------------
DROP TABLE IF EXISTS `nutrition`;
CREATE TABLE `nutrition` (
  `nutrition_id` int(5) NOT NULL AUTO_INCREMENT,
  `nutrition_name` varchar(255) NOT NULL,
  `nutrition_sex` varchar(10) NOT NULL,
  `nutrition_hn` varchar(10) NOT NULL,
  `nutrition_date` date NOT NULL,
  `nutrition_dx` varchar(100) NOT NULL,
  `nutrition_fbs` varchar(100) DEFAULT '0',
  `nutrition_bp` varchar(100) DEFAULT '0',
  `nutrition_bvn` varchar(100) DEFAULT '0',
  `nutrition_cr` varchar(100) DEFAULT '0',
  `nutrition_tc` varchar(100) DEFAULT '0',
  `nutrition_tg` varchar(100) DEFAULT '0',
  `nutrition_ldl` varchar(100) DEFAULT '0',
  `nutrition_status` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nutrition_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1225 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for person
-- ----------------------------
DROP TABLE IF EXISTS `person`;
CREATE TABLE `person` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `idcard` varchar(13) NOT NULL,
  `title` varchar(20) NOT NULL,
  `name` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `sex` varchar(5) NOT NULL,
  `position` varchar(250) NOT NULL,
  `addr` varchar(250) DEFAULT NULL,
  `bdate` date NOT NULL,
  `workdate` date NOT NULL,
  `depart` varchar(250) NOT NULL,
  `typetext` varchar(250) NOT NULL,
  `lasasom` float NOT NULL,
  `personla` varchar(13) DEFAULT NULL,
  `tell` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `quality` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=203 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for person_car
-- ----------------------------
DROP TABLE IF EXISTS `person_car`;
CREATE TABLE `person_car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcard` varchar(13) DEFAULT NULL,
  `car_number` varchar(255) DEFAULT NULL,
  `car_city` varchar(200) DEFAULT NULL,
  `car_yee` varchar(255) DEFAULT NULL,
  `car_ru` varchar(255) DEFAULT NULL,
  `car_colur` varchar(255) DEFAULT NULL,
  `car_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for position
-- ----------------------------
DROP TABLE IF EXISTS `position`;
CREATE TABLE `position` (
  `PosId` int(5) NOT NULL AUTO_INCREMENT,
  `PosName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`PosId`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for province
-- ----------------------------
DROP TABLE IF EXISTS `province`;
CREATE TABLE `province` (
  `PROVINCE_ID` int(5) NOT NULL AUTO_INCREMENT,
  `PROVINCE_CODE` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `PROVINCE_NAME` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `GEO_ID` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`PROVINCE_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for risk2_datarisk
-- ----------------------------
DROP TABLE IF EXISTS `risk2_datarisk`;
CREATE TABLE `risk2_datarisk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hnno` varchar(10) DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT '',
  `age` char(3) DEFAULT '',
  `gender` varchar(5) DEFAULT '',
  `departreport` longtext NOT NULL,
  `departrespon` longtext NOT NULL,
  `daterigter` date NOT NULL DEFAULT '0000-00-00',
  `timer` varchar(15) NOT NULL DEFAULT '',
  `fromevent` longtext NOT NULL,
  `dataevent` longtext NOT NULL,
  `commen` longtext COMMENT '0',
  `typereport` longtext COMMENT '0',
  `notepatient` longtext NOT NULL,
  `notehead` longtext,
  `noteceo` longtext,
  `notedepart` longtext,
  `star` varchar(100) DEFAULT '',
  `statusconfirm` char(2) DEFAULT '',
  `datereport` date DEFAULT '0000-00-00',
  `daterespon` date DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3009 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for risk2_departreport
-- ----------------------------
DROP TABLE IF EXISTS `risk2_departreport`;
CREATE TABLE `risk2_departreport` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DeptId` varchar(5) DEFAULT NULL,
  `DeptName` varchar(50) DEFAULT NULL,
  `CODE` varchar(5) DEFAULT NULL,
  `STATUS` varchar(1) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=131 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for risk2_group
-- ----------------------------
DROP TABLE IF EXISTS `risk2_group`;
CREATE TABLE `risk2_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codegroup` varchar(5) DEFAULT NULL,
  `namegroup` text,
  `grouplevel` int(2) DEFAULT NULL,
  `grouptype` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for risk2_risk
-- ----------------------------
DROP TABLE IF EXISTS `risk2_risk`;
CREATE TABLE `risk2_risk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coderisk` varchar(5) DEFAULT NULL,
  `namerisk` text,
  `codegroup` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=285 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for risk2_risk_level
-- ----------------------------
DROP TABLE IF EXISTS `risk2_risk_level`;
CREATE TABLE `risk2_risk_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(200) NOT NULL DEFAULT '',
  `grouplevel` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for rm_depart
-- ----------------------------
DROP TABLE IF EXISTS `rm_depart`;
CREATE TABLE `rm_depart` (
  `id` varchar(5) NOT NULL,
  `depart` varchar(200) NOT NULL,
  `CODE` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=914 DEFAULT CHARSET=tis620;

-- ----------------------------
-- Table structure for upload_file
-- ----------------------------
DROP TABLE IF EXISTS `upload_file`;
CREATE TABLE `upload_file` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `IDCARD` varchar(13) NOT NULL,
  `file_title` varchar(200) NOT NULL,
  `file_depart` varchar(100) NOT NULL,
  `file_type` varchar(200) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `dupdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for user_datacenter
-- ----------------------------
DROP TABLE IF EXISTS `user_datacenter`;
CREATE TABLE `user_datacenter` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `IDCARD` varchar(13) NOT NULL,
  `PASSWORD` varchar(200) NOT NULL,
  `DEPART` varchar(200) NOT NULL,
  `RISK` int(1) NOT NULL DEFAULT '0',
  `LA` int(1) NOT NULL DEFAULT '0',
  `ROOM` int(1) NOT NULL DEFAULT '0',
  `IT` int(1) NOT NULL DEFAULT '0',
  `PERSON` int(1) NOT NULL DEFAULT '0',
  `NUTRITION` int(1) NOT NULL DEFAULT '0',
  `REPORT` int(1) NOT NULL DEFAULT '0',
  `ADMIN` int(1) NOT NULL DEFAULT '0',
  `STATUS` int(1) NOT NULL DEFAULT '0',
  `ENV` int(1) NOT NULL DEFAULT '0',
  `PCT` int(1) NOT NULL DEFAULT '0',
  `PTC` int(1) NOT NULL DEFAULT '0',
  `IC` int(1) NOT NULL DEFAULT '0',
  `IM` int(1) NOT NULL DEFAULT '0',
  `HRD` int(1) NOT NULL DEFAULT '0',
  `DURABLE` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=214 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for vehicle
-- ----------------------------
DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE `vehicle` (
  `vhcid` int(5) NOT NULL AUTO_INCREMENT,
  `vhccode` varchar(10) NOT NULL,
  `vhcname` varchar(150) NOT NULL,
  PRIMARY KEY (`vhcid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
