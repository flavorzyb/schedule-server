<?php
namespace Tests\Unit\Modules;

use App\Modules\ScheduleRecordUpdateVO;
use Tests\TestCase;

class ScheduleRecordUpdateVOTest extends TestCase
{
    public function testOptionsIsMutable() {
        $result = new ScheduleRecordUpdateVO();
        $result->setScheduleId(11);
        $result->setScheduleDay('2010-10-21');
        $result->setScheduleMin('2010-10-21 08:19:22');
        $result->setScheduleMax('2010-10-21 18:19:22');
        $result->setCreateTime('2010-10-21 18:22:22');

        $this->assertEquals(11, $result->getScheduleId());
        $this->assertEquals('2010-10-21', $result->getScheduleDay());
        $this->assertEquals('2010-10-21 08:19:22', $result->getScheduleMin());
        $this->assertEquals('2010-10-21 18:19:22', $result->getScheduleMax());
        $this->assertEquals('2010-10-21 18:22:22', $result->getCreateTime());
    }
}