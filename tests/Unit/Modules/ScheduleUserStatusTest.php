<?php
namespace Tests\Unit\Modules;

use App\Modules\ScheduleUserStatus;
use Tests\TestCase;

class ScheduleUserStatusTest extends TestCase
{
    public function testOptionsIsMutable() {
        $result = new ScheduleUserStatus(ScheduleUserStatus::NORMAL);
        $this->assertTrue($result->isNormal());
        $this->assertEquals(ScheduleUserStatus::NORMAL, $result->getStatus());

        $result = new ScheduleUserStatus();
        $this->assertFalse($result->isNormal());
        $this->assertEquals(ScheduleUserStatus::UNAUDITED, $result->getStatus());

        $result->setNormal(true);
        $this->assertTrue($result->isNormal());
        $this->assertEquals(ScheduleUserStatus::NORMAL, $result->getStatus());

        $result->setNormal(false);
        $this->assertFalse($result->isNormal());
        $this->assertEquals(ScheduleUserStatus::UNAUDITED, $result->getStatus());
    }
}