<?php
namespace Tests;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class TestDb extends Migration
{
    public static function initScheduleUser() {
        DB::statement('DROP TABLE IF EXISTS `schedule_user`;');
        $sql = "CREATE TABLE `schedule_user` (
                  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
                  `schedule_id` INT(11) NOT NULL DEFAULT '0' COMMENT '登录名',
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
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1;";
        DB::statement($sql);

        $sql = "INSERT INTO `schedule_user` (`schedule_id`, `schedule_name`, `password`, `nick_name`, `wx_open_id`, `create_time`, `create_ip`, `status`, `update_time`) " .
            "VALUES(:scheduleId, :scheduleName, :password, :nickName, :openId, :createTime, :createIp, :status, :updateTime)";

        $data = ['scheduleId' => 11, 'scheduleName'=> 'joe', 'password' => 'password', 'nickName' => 'joe alex', 'openId' => 'wx1234567', 'createTime' => '2010-04-26 12:12:20', 'createIp' => '127.0.0.1', 'status' => 1, 'updateTime' => '2010-04-27 12:12:20'];
        DB::insert($sql, $data);
        $data = ['scheduleId' => 12, 'scheduleName'=> 'alex', 'password' => 'password', 'nickName' => 'alex wang', 'openId' => 'wx123456789', 'createTime' => '2015-04-26 12:14:20', 'createIp' => '127.0.0.1', 'status' => 1, 'updateTime' => '2010-04-27 12:12:20'];
        DB::insert($sql, $data);
    }

    public static function initScheduleRecord() {
        DB::statement('DROP TABLE IF EXISTS `schedule_record`;');
        $sql = "CREATE TABLE `schedule_record` (
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
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;";
        DB::statement($sql);

        $sql = "INSERT INTO `schedule_record` (`schedule_id`, `schedule_day`, `schedule_min`, `schedule_max`, `mac_address`, `create_time`) " .
            "VALUES(:scheduleId, :scheduleDay, :scheduleMin, :scheduleMax, :macAddress, :createTime)";

        $data = ['scheduleId' => 12, 'scheduleDay' => '2018-03-23', 'scheduleMin'=> '2018-03-23 08:42:19', 'scheduleMax' => '2018-03-23 19:39:52', 'macAddress' => 'A0:83:B6:36:AF:0F', 'createTime' => '2018-04-02 17:31:46'];
        DB::insert($sql, $data);

        $data = ['scheduleId' => 12, 'scheduleDay' => '2018-04-02', 'scheduleMin'=> '2018-04-02 08:49:42', 'scheduleMax' => '2018-04-02 17:31:46', 'macAddress' => 'A0:83:B6:36:AF:0F', 'createTime' => '2018-04-02 17:31:46'];
        DB::insert($sql, $data);

        $data = ['scheduleId' => 12, 'scheduleDay' => '2018-04-03', 'scheduleMin'=> '2018-04-03 08:41:08', 'scheduleMax' => '2018-04-03 17:51:58', 'macAddress' => 'A0:83:B6:36:AF:0F', 'createTime' => '2018-04-03 17:51:58'];
        DB::insert($sql, $data);
    }
}