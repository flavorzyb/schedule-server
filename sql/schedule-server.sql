/***
 初始化环境的SQL
;################数据表##########################
--- create database scheduler_server_test DEFAULT CHARSET utf8 COLLATE utf8_general_ci;
--- GRANT ALL PRIVILEGES ON scheduler_server_test.* TO schedule_user_test@'127.0.0.1' IDENTIFIED BY 'Sh16wEkNH3pV8udy' WITH GRANT OPTION;
*/
DROP TABLE IF EXISTS schedule_user;
CREATE TABLE `schedule_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `schedule_id` int(11) NOT NULL DEFAULT '0' COMMENT '登录名',
  `schedule_name` varchar(100) NOT NULL DEFAULT '' COMMENT '登录名',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `nick_name` varchar(100) NOT NULL DEFAULT '' COMMENT '名字',
  `wx_open_id` varchar(32) NOT NULL DEFAULT '' COMMENT '微信的open id',
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '注册时间',
  `create_ip` varchar(16) NOT NULL DEFAULT '0.0.0.0' COMMENT '注册IP',
  PRIMARY KEY (`id`),
  UNIQUE KEY `schedule_name` (`schedule_name`),
  UNIQUE KEY `wx_open_id` (`wx_open_id`),
  KEY `create_time` (`create_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1;
