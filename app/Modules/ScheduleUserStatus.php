<?php
namespace App\Modules;

class ScheduleUserStatus
{
    /**
     * 已审核通过的
     */
    public const NORMAL = 1;
    /**
     * 未审核的
     */
    public const UNAUDITED = 0;
    /**
     * 审核状态
     * @var int
     */
    private $status = self::UNAUDITED;

    /**
     * ScheduleUserStatus constructor.
     * @param int $status
     */
    public function __construct(int $status = self::UNAUDITED)
    {
        $this->setNormal($status == self::NORMAL);
    }

    /**
     * 获取审核状态
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * 是否是审核通过的
     *
     * @return bool
     */
    public function isNormal(): bool {
        return self::NORMAL == $this->status;
    }

    /**
     * 设置审核状态
     * @param bool $isNormal
     */
    public function setNormal(bool $isNormal): void {
        $this->status = $isNormal ? self::NORMAL : self::UNAUDITED;
    }
}