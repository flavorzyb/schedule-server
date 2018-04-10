<?php
namespace Tests\Unit\Modules;

use App\Modules\ScheduleUser;
use App\Modules\ScheduleUserStatus;
use Tests\TestCase;

class ScheduleUserTest extends TestCase
{
    public function testOptionsIsMutable() {
        $result = new ScheduleUser();
        $result->setId(10);
        $result->setScheduleId(11);
        $result->setScheduleName('test');
        $result->setPassword('password');
        $result->setWxOpenId('123456');
        $result->setNickName('nick');
        $result->setCreateTime('2017-04-11 10:10:10');
        $result->setUpdateTime('2017-04-11 10:10:10');
        $result->setCreateIp('127.0.0.1');
        $result->setStatus(new ScheduleUserStatus(ScheduleUserStatus::NORMAL));

        $this->assertEquals(10, $result->getId());
        $this->assertEquals(11, $result->getScheduleId());
        $this->assertEquals('test', $result->getScheduleName());
        $this->assertEquals('password', $result->getPassword());
        $this->assertEquals('123456', $result->getWxOpenId());
        $this->assertEquals('nick', $result->getNickName());
        $this->assertEquals('2017-04-11 10:10:10', $result->getCreateTime());
        $this->assertEquals('2017-04-11 10:10:10', $result->getUpdateTime());
        $this->assertEquals('127.0.0.1', $result->getCreateIp());
        $this->assertEquals(ScheduleUserStatus::NORMAL, $result->getStatus()->getStatus());

        $data = [
            'id' => 10,
            'scheduleId' => 11,
            'scheduleName' => 'test',
            'password' => 'password',
            'nickName' => 'nick',
            'wxOpenId' => '123456',
            'createTime' => '2017-04-11 10:10:10',
            'createIp' => '127.0.0.1',
            'status' => ScheduleUserStatus::NORMAL,
            'updateTime' => '2017-04-11 10:10:10',
        ];

        $this->assertEquals($data, $result->toArray());
    }
}
