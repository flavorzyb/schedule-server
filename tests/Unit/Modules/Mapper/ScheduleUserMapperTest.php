<?php

namespace Tests\Unit\Modules\Mapper;

use App\Modules\ScheduleUser;
use App\Modules\Mapper\ScheduleUserMapper;
use App\Modules\ScheduleUserStatus;
use Tests\TestCase;
use Tests\TestDb;
use Tests\TestObject;

class ScheduleUserMapperTest extends TestCase
{
    /**
     * @var ScheduleUserMapper
     */
    private $mapper = null;
    protected function setUp()
    {
        parent::setUp();
        TestDb::initScheduleUser();
        $this->mapper = new ScheduleUserMapper();
    }

    protected function tearDown()
    {
        $this->mapper = null;
        parent::tearDown();
    }

    public function testFindByName()
    {
        $result = $this->mapper->findByName('joe');
        $this->assertTrue($result instanceof ScheduleUser);
        $this->assertEquals(11, $result->getScheduleId());
        $this->assertEquals('2010-04-26 12:12:20', $result->getCreateTime());
        $this->assertEquals('2010-04-27 12:12:20', $result->getUpdateTime());

        $result = $this->mapper->findByName('joe222');
        $this->assertNull($result);
    }

    public function testUpdate() {
        $date = date('Y-m-d H:i:s');
        $this->assertFalse($this->mapper->updateStatus(10, new ScheduleUserStatus(ScheduleUserStatus::UNAUDITED), $date));
        $this->assertTrue($this->mapper->updateStatus(1, new ScheduleUserStatus(ScheduleUserStatus::UNAUDITED), $date));
        $this->assertFalse($this->mapper->updateStatus(1, new ScheduleUserStatus(ScheduleUserStatus::UNAUDITED), $date));
    }

    public function testDelete() {
        $this->assertFalse($this->mapper->delete(10));
        $this->assertTrue($this->mapper->delete(1));
    }

    public function testFetchAll() {
        $result = $this->mapper->fetchAll();
        $this->assertEquals(2, sizeof($result));
        foreach ($result as $user) {
            $this->assertTrue($user instanceof ScheduleUser);
        }
    }

    /**
     * @expectedException \Illuminate\Database\QueryException
     */
    public function testInsertUser() {
        $user = TestObject::createScheduleUser();
        $this->assertTrue($this->mapper->insert($user));
        $this->assertFalse($this->mapper->insert($user));
    }
}
