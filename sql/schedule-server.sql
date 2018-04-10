/***
 初始化环境的SQL
;################数据表##########################
--- create database scheduler_server_test DEFAULT CHARSET utf8 COLLATE utf8_general_ci;
--- GRANT ALL PRIVILEGES ON scheduler_server_test.* TO schedule_user_test@'127.0.0.1' IDENTIFIED BY 'Sh16wEkNH3pV8udy' WITH GRANT OPTION;
*/
DROP TABLE IF EXISTS `schedule_user`;
CREATE TABLE `schedule_user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `schedule_id` INT(11) NOT NULL DEFAULT '0' COMMENT '考勤系统ID',
  `schedule_name` VARCHAR(100) NOT NULL DEFAULT '' COMMENT '登录名',
  `password` VARCHAR(32) NOT NULL DEFAULT '' COMMENT '密码',
  `nick_name` VARCHAR(100) NOT NULL DEFAULT '' COMMENT '名字',
  `wx_open_id` VARCHAR(64) NOT NULL DEFAULT '' COMMENT '微信的open id',
  `create_time` DATETIME NOT NULL DEFAULT '2000-01-01 00:00:00' COMMENT '注册时间',
  `create_ip` VARCHAR(16) NOT NULL DEFAULT '0.0.0.0' COMMENT '注册IP',
  `status` TINYINT(0) NOT NULL DEFAULT '0' COMMENT '状态:0-待验证;1-已通过',
  `update_time` DATETIME NOT NULL DEFAULT '2000-01-01 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `schedule_name` (`schedule_name`),
  UNIQUE KEY `wx_open_id` (`wx_open_id`),
  KEY `create_time` (`create_time`),
  KEY `update_time` (`update_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `schedule_record`;
CREATE TABLE `schedule_record` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `schedule_id` INT(11) NOT NULL DEFAULT '0' COMMENT '考勤系统ID',
  `schedule_day` DATE NOT NULL DEFAULT '2000-01-01' COMMENT '考勤日期',
  `schedule_min` DATETIME NOT NULL DEFAULT '2000-01-01 00:00:00' COMMENT '上班打卡时间',
  `schedule_max` DATETIME NOT NULL DEFAULT '2000-01-01 00:00:00' COMMENT '下班打卡时间',
  `mac_address` VARCHAR(64) NOT NULL DEFAULT '' COMMENT '手机WIFI的mac地址',
  `create_time` DATETIME NOT NULL DEFAULT '2000-01-01 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `schedule_id` (`schedule_id`, `schedule_day`),
  KEY `create_time` (`create_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;
