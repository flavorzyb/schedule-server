<?php
namespace App\Modules;

class ScheduleRecord
{
    private $id = 0;
    private $scheduleId = 0;
    private $scheduleDay = '';
    private $scheduleMin = '';
    private $scheduleMax = '';
    private $macAddress = '';
    private $createTime = '';

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
    public function getScheduleDay(): string
    {
        return $this->scheduleDay;
    }

    /**
     * @param string $scheduleDay
     */
    public function setScheduleDay(string $scheduleDay): void
    {
        $this->scheduleDay = $scheduleDay;
    }

    /**
     * @return string
     */
    public function getScheduleMin(): string
    {
        return $this->scheduleMin;
    }

    /**
     * @param string $scheduleMin
     */
    public function setScheduleMin(string $scheduleMin): void
    {
        $this->scheduleMin = $scheduleMin;
    }

    /**
     * @return string
     */
    public function getScheduleMax(): string
    {
        return $this->scheduleMax;
    }

    /**
     * @param string $scheduleMax
     */
    public function setScheduleMax(string $scheduleMax): void
    {
        $this->scheduleMax = $scheduleMax;
    }

    /**
     * @return string
     */
    public function getMacAddress(): string
    {
        return $this->macAddress;
    }

    /**
     * @param string $macAddress
     */
    public function setMacAddress(string $macAddress): void
    {
        $this->macAddress = $macAddress;
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
     * @return array
     */
    public function toArray(): array {
        return [
            'id' => $this->id,
            'scheduleId' => $this->scheduleId,
            'scheduleDay' => $this->scheduleDay,
            'scheduleMin' => $this->scheduleMin,
            'scheduleMax' => $this->scheduleMax,
            'macAddress' => $this->macAddress,
            'createTime' => $this->createTime,
        ];
    }
}