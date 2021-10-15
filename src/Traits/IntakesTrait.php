<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Traits;

use AntistressStore\CdekSDK2\Entity\Requests\Location;
use AntistressStore\CdekSDK2\Entity\Responses\LocationResponse;

trait IntakesTrait
{
    /**
     * Дата ожидания курьера (дата в формате ISO 8601: YYYY-MM-DD).
     *
     * @var string
     */
    protected $intake_date;

    /**
     * Время начала ожидания курьера (время в формате ISO 8601: hh:mm).
     *
     * @var string
     */
    protected $intake_time_from;

    /**
     * Время окончания ожидания курьера (время в формате ISO 8601: hh:mm).
     *
     * @var string
     */
    protected $intake_time_to;

    /**
     * Время начала обеда, должно входить в диапазон [intake_time_to;intake_time_to].
     *
     * @var string
     */
    protected $lunch_time_from;

    /**
     * Время окончания обеда, должно входить в диапазон [intake_time_to;intake_time_to].
     *
     * @var string
     */
    protected $lunch_time_to;

    /**
     * Описание груза.
     *
     * @var string
     */
    protected $name;

    /**
     * Необходим прозвон отправителя.
     *
     * @var bool
     */
    protected $need_call;

    /**
     * Адрес отправителя (забора).
     *
     * @var Location
     */
    protected $from_location;

    /**
     * Получить параметр - дата ожидания курьера (дата в формате ISO 8601: YYYY-MM-DD).
     *
     * @return string
     */
    public function getIntakeDate()
    {
        return $this->intake_date;
    }

    /**
     * Установить параметр - дата ожидания курьера (дата в формате ISO 8601: YYYY-MM-DD).
     *
     * @param string $intake_date дата ожидания курьера (дата в формате ISO 8601: YYYY-MM-DD)
     *
     * @return self
     */
    public function setIntakeDate(string $intake_date)
    {
        $this->intake_date = $intake_date;

        return $this;
    }

    /**
     * Получить параметр - время начала ожидания курьера (время в формате ISO 8601: hh:mm).
     *
     * @return string
     */
    public function getIntakeTimeFrom()
    {
        return $this->intake_time_from;
    }

    /**
     * Установить параметр - время начала ожидания курьера (время в формате ISO 8601: hh:mm).
     *
     * @param string $intake_time_from время начала ожидания курьера (время в формате ISO 8601: hh:mm)
     *
     * @return self
     */
    public function setIntakeTimeFrom(string $intake_time_from)
    {
        $this->intake_time_from = $intake_time_from;

        return $this;
    }

    /**
     * Получить параметр - время окончания ожидания курьера (время в формате ISO 8601: hh:mm).
     *
     * @return string
     */
    public function getIntakeTimeTo()
    {
        return $this->intake_time_to;
    }

    /**
     * Установить параметр - время окончания ожидания курьера (время в формате ISO 8601: hh:mm).
     *
     * @param string $intake_time_to время окончания ожидания курьера (время в формате ISO 8601: hh:mm)
     *
     * @return self
     */
    public function setIntakeTimeTo(string $intake_time_to)
    {
        $this->intake_time_to = $intake_time_to;

        return $this;
    }

    /**
     * Получить параметр - время начала обеда, должно входить в диапазон [intake_time_to;intake_time_to].
     *
     * @return string
     */
    public function getLunchTimeFrom()
    {
        return $this->lunch_time_from;
    }

    /**
     * Установить параметр - время начала обеда, должно входить в диапазон [intake_time_to;intake_time_to].
     *
     * @param string $lunch_time_from время начала обеда, должно входить в диапазон [intake_time_to;intake_time_to]
     *
     * @return self
     */
    public function setLunchTimeFrom(string $lunch_time_from)
    {
        $this->lunch_time_from = $lunch_time_from;

        return $this;
    }

    /**
     * Получить параметр - время окончания обеда, должно входить в диапазон [intake_time_to;intake_time_to].
     *
     * @return string
     */
    public function getLunchTimeTo()
    {
        return $this->lunch_time_to;
    }

    /**
     * Установить параметр - время окончания обеда, должно входить в диапазон [intake_time_to;intake_time_to].
     *
     * @param string $lunch_time_to время окончания обеда, должно входить в диапазон [intake_time_to;intake_time_to]
     *
     * @return self
     */
    public function setLunchTimeTo(string $lunch_time_to)
    {
        $this->lunch_time_to = $lunch_time_to;

        return $this;
    }

    /**
     * Получить параметр - описание груза.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Установить параметр - описание груза.
     *
     * @param string $name описание груза
     *
     * @return self
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Получить параметр - необходим прозвон отправителя.
     *
     * @return bool
     */
    public function getNeedCall()
    {
        return $this->need_call;
    }

    /**
     * Установить параметр - необходим прозвон отправителя.
     *
     * @param bool $need_call необходим прозвон отправителя
     *
     * @return self
     */
    public function setNeedCall(bool $need_call)
    {
        $this->need_call = $need_call;

        return $this;
    }

    /**
     * Получить параметр - адрес отправителя (забора).
     *
     * @return LocationResponse
     */
    public function getFromLocation()
    {
        return $this->from_location;
    }

    /**
     * Установить параметр - адрес отправителя (забора).
     *
     * @param Location $from_location адрес отправителя (забора)
     *
     * @return self
     */
    public function setFromLocation(Location $from_location)
    {
        $this->from_location = $from_location;

        return $this;
    }
}
