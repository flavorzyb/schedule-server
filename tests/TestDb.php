<?php
namespace Tests;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class TestDb extends Migration
{
    public static function initScheduleUser() {
        DB::statement('DROP TABLE IF EXISTS schedule_user;');
        $sql = "CREATE TABLE `schedule_user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `schedule_id` INT(11) NOT NULL DEFAULT '0' COMMENT '登录名',
  `schedule_name` VARCHAR(100) NOT NULL DEFAULT '' COMMENT '登录名',
  `password` VARCHAR(32) NOT NULL DEFAULT '' COMMENT '密码',
  `nick_name` VARCHAR(100) NOT NULL DEFAULT '' COMMENT '名字',
  `wx_open_id` VARCHAR(64) NOT NULL DEFAULT '' COMMENT '微信的open id',
  `create_time` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '注册时间',
  `create_ip` VARCHAR(16) NOT NULL DEFAULT '0.0.0.0' COMMENT '注册IP',
  `status` TINYINT(0) NOT NULL DEFAULT '0' COMMENT '状态:0-待验证;1-已通过',
  `update_time` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `schedule_name` (`schedule_name`),
  UNIQUE KEY `wx_open_id` (`wx_open_id`),
  KEY `create_time` (`create_time`),
  KEY `update_time` (`update_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1;";
        DB::statement($sql);

        $sql = "INSERT INTO `schedule_user` (`schedule_id`, `schedule_name`, `password`, `nick_name`, `wx_open_id`, `create_time`, `create_ip`, `status`, `update_time`) " .
            "VALUES(:scheduleId, :scheduleName, :password, :nickName, :openId, :createTime, :createIp, :status, :updateTime)";

        $data = ['scheduleId' => 11, 'scheduleName'=> 'joe', 'password' => 'password', 'nickName' => 'joe alex', 'openId' => 'wx1234567', 'createTime' => '2010-04-26 12:12:20', 'createIp' => '127.0.0.1', 'status' => 1, 'updateTime' => '2010-04-27 12:12:20'];
        DB::insert($sql, $data);
        $data = ['scheduleId' => 12, 'scheduleName'=> 'alex', 'password' => 'password', 'nickName' => 'alex wang', 'openId' => 'wx123456789', 'createTime' => '2015-04-26 12:14:20', 'createIp' => '127.0.0.1', 'status' => 1, 'updateTime' => '2010-04-27 12:12:20'];
        DB::insert($sql, $data);
    }
}