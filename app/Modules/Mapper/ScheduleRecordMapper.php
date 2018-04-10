<?php
namespace App\Modules\Mapper;

use App\Modules\ScheduleRecord;
use App\Modules\ScheduleRecordUpdateVO;
use Illuminate\Support\Facades\DB;

class ScheduleRecordMapper
{
    private $tableName = "schedule_record";

    /**
     * find by schedule id and schedule day
     *
     * @param int $scheduleId
     * @param string $scheduleDay
     * @return ScheduleRecord|null
     */
    public function find(int $scheduleId, string $scheduleDay): ?ScheduleRecord {
        $sql = "SELECT * FROM `{$this->tableName}` WHERE `schedule_id` = :scheduleId AND `schedule_day` = :scheduleDay LIMIT 1";
        $dataArray = DB::select($sql, ['scheduleId' => $scheduleId, 'scheduleDay' => $scheduleDay]);
        if (isset($dataArray[0])) {
            return $this->createRecord($dataArray[0]);
        }

        return null;
    }

    /**
     * insert record
     *
     * @param ScheduleRecord $record
     * @return bool
     */
    public function insert(ScheduleRecord $record) {
        $sql = "INSERT INTO `schedule_record` (`schedule_id`, `schedule_day`, `schedule_min`, `schedule_max`, `mac_address`, `create_time`) " .
            "VALUES(:scheduleId, :scheduleDay, :scheduleMin, :scheduleMax, :macAddress, :createTime)";

        $data = $record->toArray();
        unset($data['id']);
        return DB::insert($sql, $data);
    }

    /**
     * update min and max time
     *
     * @param ScheduleRecordUpdateVO $data
     * @return bool
     */
    public function updateMinAndMax(ScheduleRecordUpdateVO $data): bool {
        $sql = "UPDATE `{$this->tableName}` " .
            "SET `schedule_min` = :scheduleMin, `schedule_max` = :scheduleMax, `create_time` = :createTime " .
            "WHERE `schedule_id` = :scheduleId AND `schedule_day` = :scheduleDay";

        $data = [
            'scheduleId' => $data->getScheduleId(),
            'scheduleDay' => $data->getScheduleDay(),
            'scheduleMin' => $data->getScheduleMin(),
            'scheduleMax' => $data->getScheduleMax(),
            'createTime' => $data->getCreateTime(),
        ];

        return 1 == DB::update($sql, $data);
    }

    /**
     * fetch all records(60)
     * @param int $scheduleId
     * @return array
     */
    public function fetchAll(int $scheduleId): array {
        $sql = "SELECT * FROM `{$this->tableName}` WHERE `schedule_id` = :scheduleId ORDER BY `schedule_day` LIMIT 60";
        $dataArray = DB::select($sql, ['scheduleId' => $scheduleId]);
        $result = [];
        foreach ($dataArray as $data) {
            $result[] = $this->createRecord($data);
        }

        return $result;
    }

    /**
     * create ScheduleRecord
     * @param \stdClass $data
     * @return ScheduleRecord
     */
    private function createRecord(\stdClass $data): ScheduleRecord {
        $result = new ScheduleRecord();
        $result->setId(intval($data->id));
        $result->setScheduleId(intval($data->schedule_id));
        $result->setScheduleDay(trim($data->schedule_day));
        $result->setScheduleMin(trim($data->schedule_min));
        $result->setScheduleMax(trim($data->schedule_max));
        $result->setMacAddress(trim($data->mac_address));
        $result->setCreateTime(trim($data->create_time));

        return $result;
    }
}