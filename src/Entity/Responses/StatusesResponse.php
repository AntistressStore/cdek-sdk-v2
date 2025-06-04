<?php

/**
 * Copyright (c) Antistress.Store® 2024. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Responses;

/**
 * Class Status статус заказа, заявки.
 */
class StatusesResponse extends Source
{
    /**
     * Код статуса.
     *
     * @var string
     */
    protected $code;

    /**
     * Название статуса.
     *
     * @var string
     */
    protected $name;

    /**
     * Дополнительный код статуса.
     *
     * @var string
     */
    protected $reason_code;

    /**
     * Дата и время установки статуса.
     *
     * @var string
     */
    protected $date_time;

    /**
     * Наименование города(места), где произошло изменение статуса.
     *
     * @var string
     */
    protected $city;
    /**
     * Признак удаления статуса. Может принимать значения:
     *
     * true - статус удалён;
     * false - статус активен.
     * Значение true может быть только у финальных статусов.
     * @var boolean
     */
    protected $deleted;

    /**
     * Получить параметр - код статуса.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Получить параметр - название статуса.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Получить параметр - дополнительный код статуса.
     *
     * @return string
     */
    public function getReasonCode()
    {
        return $this->reason_code;
    }

    /**
     * Получить параметр - дата и время установки статуса.
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
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     *  Получить параметр - признак удаления статуса.
     *
     * @return bool
     */
    public function getDeleted()
    {
        return $this->deleted;
    }
}
