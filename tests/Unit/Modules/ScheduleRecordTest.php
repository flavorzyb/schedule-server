<?php
namespace Tests\Unit\Modules;

use App\Modules\ScheduleRecord;
use Tests\TestCase;

class ScheduleRecordTest extends TestCase
{
    public function testOptionsIsMutable() {
        $result = new ScheduleRecord();
        $result->setId(12);
        $result->setScheduleId(21);
        $result->setScheduleDay('2014-10-10');
        $result->setScheduleMin('2014-10-10 10:12:14');
        $result->setScheduleMax('2014-10-10 20:12:14');
        $result->setMacAddress('A0:83:B6:36:AF:0F');
        $result->setCreateTime('2014-10-10 10:12:14');

        $this->assertEquals(12, $result->getId());
        $this->assertEquals(21, $result->getScheduleId());
        $this->assertEquals('2014-10-10', $result->getScheduleDay());
        $this->assertEquals('2014-10-10 10:12:14', $result->getScheduleMin());
        $this->assertEquals('2014-10-10 20:12:14', $result->getScheduleMax());
        $this->assertEquals('A0:83:B6:36:AF:0F', $result->getMacAddress());
        $this->assertEquals('2014-10-10 10:12:14', $result->getCreateTime());

        $data = [
            'id' => 12,
            'scheduleId' => 21,
            'scheduleDay' => '2014-10-10',
            'scheduleMin' => '2014-10-10 10:12:14',
            'scheduleMax' => '2014-10-10 20:12:14',
            'macAddress' => 'A0:83:B6:36:AF:0F',
            'createTime' => '2014-10-10 10:12:14',
        ];

        $this->assertEquals($data, $result->toArray());
    }
}
