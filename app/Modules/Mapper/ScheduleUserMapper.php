<?php

namespace App\Modules\Mapper;

use App\Modules\ScheduleUser;
use Illuminate\Support\Facades\DB;

class ScheduleUserMapper
{
    private $tableName = 'schedule_user';

    /**
     * 查找是否保存过改用户
     *
     * @param string $name
     * @return ScheduleUser | null
     */
    public function findByName(string  $name): ?ScheduleUser {
        $dataArray = DB::select('SELECT * FROM `' . $this->tableName . '` WHERE `schedule_name` = :name LIMIT 1', ['name' => $name]);

        if (isset($dataArray[0])) {
            return $this->createScheduleUser($dataArray[0]);
        }

        return null;
    }

    /**
     * create ScheduleUser
     * @param \stdClass $data
     * @return ScheduleUser
     */
    private function createScheduleUser(\stdClass $data): ScheduleUser {
        $result = new ScheduleUser();
        $result->setId(intval($data->id));
        $result->setScheduleId(intval($data->schedule_id));
        $result->setScheduleName($data->schedule_name);
        $result->setPassword($data->password);
        $result->setNickName($data->nick_name);
        $result->setWxOpenId($data->wx_open_id);
        $result->setCreateTime($data->create_time);
        $result->setCreateIp($data->create_ip);
        return $result;
    }
}