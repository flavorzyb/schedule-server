<?php

namespace Tests\Unit\Modules\Mapper;

use App\Modules\ScheduleUser;
use App\Modules\Mapper\ScheduleUserMapper;
use Tests\TestCase;
use Tests\TestDb;

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

        $result = $this->mapper->findByName('joe222');
        $this->assertNull($result);
    }
}
