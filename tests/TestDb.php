<?php
namespace Tests;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class TestDb extends Migration
{
    public static function initScheduleUser() {
        DB::statement('DROP TABLE IF EXISTS schedule_user;');
        DB::statement("CREATE TABLE `schedule_user` (
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
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1;");

        $sql = "INSERT INTO `schedule_user` (`schedule_id`, `schedule_name`, `password`, `nick_name`, `wx_open_id`, `create_time`, `create_ip`) " .
            "VALUES(:scheduleId, :scheduleName, :password, :nickName, :openId, :createTime, :createIp)";

        $data = ['scheduleId' => 11, 'scheduleName'=> 'joe', 'password' => 'password', 'nickName' => 'joe alex', 'openId' => 'wx1234567', 'createTime' => '2010-04-26 12:12:20', 'createIp' => '127.0.0.1'];
        DB::insert($sql, $data);
        $data = ['scheduleId' => 12, 'scheduleName'=> 'alex', 'password' => 'password', 'nickName' => 'alex wang', 'openId' => 'wx123456789', 'createTime' => '2015-04-26 12:14:20', 'createIp' => '127.0.0.1'];
        DB::insert($sql, $data);
    }
}