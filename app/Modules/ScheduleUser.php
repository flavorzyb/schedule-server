<?php

namespace App\Modules;

/**
 * 考勤账号和微信账号绑定关系模型
 *
 * @package App\Modules
 */
class ScheduleUser
{
    private $id = 0;
    private $scheduleId = 0;
    private $scheduleName = '';
    private $password = '';
    private $nickName = '';
    private $wxOpenId = '';
    private $createTime = '';
    private $createIp = '';
    private $status = null;
    private $updateTime = '';
    /**
     * ScheduleUser constructor.
     */
    public function __construct()
    {
        $this->status = new ScheduleUserStatus();
        $this->createTime = date('Y-m-d H:i:s');
        $this->createIp = '127.0.0.1';
        $this->updateTime = date('Y-m-d H:i:s');
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getScheduleId(): int
    {
        return $this->scheduleId;
    }

    /**
     * @param int $scheduleId
     */
    public function setScheduleId(int $scheduleId): void
    {
        $this->scheduleId = $scheduleId;
    }

    /**
     * @return string
     */
    public function getScheduleName(): string
    {
        return $this->scheduleName;
    }

    /**
     * @param string $scheduleName
     */
    public function setScheduleName(string $scheduleName): void
    {
        $this->scheduleName = $scheduleName;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getNickName(): string
    {
        return $this->nickName;
    }

    /**
     * @param string $nickName
     */
    public function setNickName(string $nickName): void
    {
        $this->nickName = $nickName;
    }

    /**
     * @return string
     */
    public function getWxOpenId(): string
    {
        return $this->wxOpenId;
    }

    /**
     * @param string $wxOpenId
     */
    public function setWxOpenId(string $wxOpenId): void
    {
        $this->wxOpenId = $wxOpenId;
    }

    /**
     * @return string
     */
    public function getCreateTime(): string
    {
        return $this->createTime;
    }

    /**
     * @param string $createTime
     */
    public function setCreateTime(string $createTime): void
    {
        $this->createTime = $createTime;
    }

    /**
     * @return string
     */
    public function getCreateIp(): string
    {
        return $this->createIp;
    }

    /**
     * @param string $createIp
     */
    public function setCreateIp(string $createIp): void
    {
        $this->createIp = $createIp;
    }

    /**
     * @return ScheduleUserStatus
     */
    public function getStatus(): ScheduleUserStatus
    {
        return $this->status;
    }

    /**
     * @param ScheduleUserStatus $status
     */
    public function setStatus(ScheduleUserStatus $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getUpdateTime()
    {
        return $this->updateTime;
    }

    /**
     * @param string $updateTime
     */
    public function setUpdateTime($updateTime): void
    {
        $this->updateTime = $updateTime;
    }

    /**
     * @return array
     */
    public function toArray(): array {
        return [
            'id' => $this->id,
            'scheduleId' => $this->scheduleId,
            'scheduleName' => $this->scheduleName,
            'password' => $this->password,
            'nickName' => $this->nickName,
            'wxOpenId' => $this->wxOpenId,
            'createTime' => $this->createTime,
            'createIp' => $this->createIp,
            'status' => $this->status->getStatus(),
            'updateTime' => $this->updateTime,
        ];
    }
}