<?php

namespace AntistressStore\CdekSDK2\Entity\Responses;

/**
 * Class CallsResponse информация о звонках.
 */
class CallsResponse extends Source
{
    /**
     * Информация о неуспешных прозвонах (недозвонах).
     *
     * @var array
     */
    protected $failed_calls;

    /**
     * Причина недозвона.
     *
     * @var string
     */
    protected $reason_code;

    /**
     * Дата и время создания недозвона.
     *
     * @var string
     */
    protected $date_time;

    /**
     * Наименование города(места), где произошло изменение статуса.
     *
     * @var array
     */
    protected $rescheduled_calls;

    /**
     * Получить параметр - информация о неуспешных прозвонах (недозвонах).
     *
     * @return array
     */
    public function getFailedCalls()
    {
        return $this->failed_calls;
    }

    /**
     * Получить параметр - причина недозвона.
     *
     * @return string
     */
    public function getReasonCode()
    {
        return $this->reason_code;
    }

    /**
     * Получить параметр - дата и время создания недозвона.
     *
     * @return string
     */
    public function getDateTime()
    {
        return $this->date_time;
    }

    /**
     * Получить параметр - наименование города(места), где произошло изменение статуса.
     *
     * @return array
     */
    public function getRescheduledCalls()
    {
        return $this->rescheduled_calls;
    }
}
