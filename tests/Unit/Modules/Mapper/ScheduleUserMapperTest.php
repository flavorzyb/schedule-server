<?php

namespace Tests\Unit\Modules\Mapper;

use App\Modules\ScheduleUser;
use App\Modules\Mapper\ScheduleUserMapper;
use Tests\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;
use Tests\TestDb;

class ScheduleUserMapperTest extends TestCase
{
    use TestCaseTrait;

    protected function getDataSet()
    {
        var_dump('11111111111');
        return $this->createFlatXMLDataSet(__DIR__ . '/../../../DbUnit/schedule-user.xml');
    }

    /**
     * @var ScheduleUserMapper
     */
    private $mapper = null;
    protected function setUp()
    {
        parent::setUp();
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
    }
}
