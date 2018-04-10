<?php
namespace Tests;

use Faker\Generator as Faker;
use App\Modules\ScheduleUser;
use App\Modules\ScheduleUserStatus;

class TestObject
{
    public static function getFaker(): Faker {
        return \Faker\Factory::create('en_US');
    }

    public static function createScheduleUser(): ScheduleUser {
        $result = new ScheduleUser();
        $fake = self::getFaker();
        $result->setId($fake->randomNumber());
        $result->setScheduleId($fake->randomNumber());
        $result->setScheduleName($fake->name);
        $result->setPassword($fake->password);
        $result->setWxOpenId($fake->uuid);
        $result->setNickName($fake->name);
        $result->setCreateTime($fake->time('Y-m-d H:i:s'));
        $result->setUpdateTime($fake->time('Y-m-d H:i:s'));
        $result->setCreateIp($fake->ipv4);
        $result->setStatus(new ScheduleUserStatus(ScheduleUserStatus::NORMAL));
        return $result;
    }
}