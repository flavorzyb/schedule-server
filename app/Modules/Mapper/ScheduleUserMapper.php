<?php

namespace App\Modules\Mapper;

use App\Modules\ScheduleUser;
use App\Modules\ScheduleUserStatus;
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
        $dataArray = DB::select("SELECT * FROM `{$this->tableName}` WHERE `schedule_name` = :name LIMIT 1", ['name' => $name]);

        if (isset($dataArray[0])) {
            return $this->createScheduleUser($dataArray[0]);
        }

        return null;
    }

    /**
     * 插入记录
     *
     * @param ScheduleUser $user
     * @return bool
     */
    public function insert(ScheduleUser $user): bool {
        $sql = "INSERT INTO `{$this->tableName}` " .
            "(`schedule_id`, `schedule_name`, `password`, `nick_name`, `wx_open_id`, `create_time`, `create_ip`, `status`, `update_time`) " .
            "VALUES(:scheduleId, :scheduleName, :password, :nickName, :wxOpenId, :createTime, :createIp, :status, :updateTime)";
        $data = $user->toArray();
        unset($data['id']);
        return DB::insert($sql, $data);
    }

    /**
     * 更新状态
     *
     * @param int $id
     * @param ScheduleUserStatus $status
     * @param string $upTime
     * @return bool
     */
    public function updateStatus(int $id, ScheduleUserStatus $status, string $upTime): bool {
        $sql = "UPDATE `{$this->tableName}` SET `status` = :status, `update_time` = :updateTime WHERE `id` = :id";
        $data = [
            'status' => $status->getStatus(),
            'updateTime' => $upTime,
            'id' => $id,
        ];

        return 1 == DB::update($sql, $data);
    }

    /**
     * 删除记录
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool {
        $sql = "DELETE FROM `{$this->tableName}` WHERE `id` = :id";
        return 1 == DB::delete($sql, ['id' => $id]);
    }

    public function fetchAll(): array {
        $sql = "SELECT * FROM `{$this->tableName}`;";
        $dataArray = DB::select($sql);
        $result = [];
        foreach ($dataArray as $data) {
            $result[] = $this->createScheduleUser($data);
        }

        return $result;
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
        $result->setScheduleName(trim($data->schedule_name));
        $result->setPassword(trim($data->password));
        $result->setNickName(trim($data->nick_name));
        $result->setWxOpenId(trim($data->wx_open_id));
        $result->setCreateTime(trim($data->create_time));
        $result->setCreateIp(trim($data->create_ip));
        $result->setUpdateTime(trim($data->update_time));
        $result->setStatus(new ScheduleUserStatus($data->status));
        return $result;
    }
}