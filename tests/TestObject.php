<?php
namespace Tests;

use App\Modules\ScheduleRecord;
use App\Modules\ScheduleRecordUpdateVO;
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

    public static function createScheduleRecord(): ScheduleRecord {
        $fake = self::getFaker();
        $day = $fake->time('Y-m-d');
        $result = new ScheduleRecord();
        $result->setId($fake->randomNumber() + 1000);
        $result->setScheduleId($fake->randomNumber() + 1000);
        $result->setScheduleDay($day);
        $result->setScheduleMin($day . ' ' .$fake->time('H:i:s'));
        $result->setScheduleMax($day . ' ' .$fake->time('H:i:s'));
        $result->setMacAddress($fake->macAddress);
        $result->setCreateTime($day . ' ' .$fake->time('H:i:s'));

        return $result;
    }

    public static function createScheduleRecordUpdateVO(int $scheduleId, string $day): ScheduleRecordUpdateVO {
        $fake = self::getFaker();
        $result = new ScheduleRecordUpdateVO();
        $result->setScheduleId($scheduleId);
        $result->setScheduleDay($day);
        $result->setScheduleMin($day . ' ' .$fake->time('H:i:s'));
        $result->setScheduleMax($day . ' ' .$fake->time('H:i:s'));
        $result->setCreateTime($day . ' ' .$fake->time('H:i:s'));

        return $result;
    }
}