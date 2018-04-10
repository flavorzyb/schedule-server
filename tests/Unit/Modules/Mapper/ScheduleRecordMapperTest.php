<?php
namespace Tests\Unit\Modules\Mapper;

use App\Modules\Mapper\ScheduleRecordMapper;
use App\Modules\ScheduleRecord;
use Tests\TestCase;
use Tests\TestDb;
use Tests\TestObject;

class ScheduleRecordMapperTest extends TestCase
{
    /**
     * @var ScheduleRecordMapper
     */
    private $mapper = null;

    protected function setUp()
    {
        parent::setUp();
        TestDb::initScheduleRecord();
        $this->mapper = new ScheduleRecordMapper();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testFind() {
        $result = $this->mapper->find(101, '2018-04-02');
        $this->assertNull($result);

        $result = $this->mapper->find(12, '2018-04-02');
        $this->assertTrue($result instanceof ScheduleRecord);
        $this->assertEquals('2018-04-02', $result->getScheduleDay());
        $this->assertEquals('2018-04-02 08:49:42', $result->getScheduleMin());
        $this->assertEquals('2018-04-02 17:31:46', $result->getScheduleMax());
        $this->assertEquals('A0:83:B6:36:AF:0F', $result->getMacAddress());
        $this->assertEquals('2018-04-02 17:31:46', $result->getCreateTime());
    }

    /**
     * @expectedException \Illuminate\Database\QueryException
     */
    public function testInsert() {
        $result = TestObject::createScheduleRecord();
        $this->assertTrue($this->mapper->insert($result));
        $this->assertFalse($this->mapper->insert($result));
    }

    public function testUpdateMinAndMax() {
        $result = TestObject::createScheduleRecordUpdateVO(12, '2018-04-02');
        $this->assertTrue($this->mapper->updateMinAndMax($result));

        $result = TestObject::createScheduleRecordUpdateVO(12, '2008-04-02');
        $this->assertFalse($this->mapper->updateMinAndMax($result));
    }

    public function testFetchAll() {
        $result = $this->mapper->fetchAll(12);
        $this->assertEquals(3, sizeof($result));

        foreach ($result as $record) {
            $this->assertTrue($record instanceof ScheduleRecord);
        }

        $this->assertEquals([], $this->mapper->fetchAll(100));
    }
}