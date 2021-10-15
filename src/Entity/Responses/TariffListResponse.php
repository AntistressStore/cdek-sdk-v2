<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Responses;

class TariffListResponse extends Source
{
    /**
     * Режим тарифа.
     *
     * @var int
     */
    protected $delivery_mode;

    /**
     * Название тарифа на языке вывода.
     *
     * @var string
     */
    protected $tariff_name;

    /**
     * Описание тарифа на языке вывода.
     *
     * @var string
     */
    protected $tariff_description;

    /**
     * Код тарифа.
     *
     * @var int
     */
    protected $tariff_code;

    /**
     * Стоимость доставки.
     *
     * @var float
     */
    protected $delivery_sum;

    /**
     * Минимальное время доставки (в рабочих днях).
     *
     * @var int
     */
    protected $period_min;

    /**
     * Максимальное время доставки (в рабочих днях).
     *
     * @var int
     */
    protected $period_max;

    /**
     * Получить параметр - максимальное время доставки (в рабочих днях).
     *
     * @return int
     */
    public function getPeriodMax()
    {
        return $this->period_max;
    }

    /**
     * Получить параметр - минимальное время доставки (в рабочих днях).
     *
     * @return int
     */
    public function getPeriodMin()
    {
        return $this->period_min;
    }

    /**
     * Получить параметр - стоимость доставки.
     *
     * @return float
     */
    public function getDeliverySum()
    {
        return $this->delivery_sum;
    }

    /**
     * Получить параметр - код тарифа.
     *
     * @return int
     */
    public function getTariffCode()
    {
        return $this->tariff_code;
    }

    /**
     * Получить параметр - описание тарифа на языке вывода.
     *
     * @return string
     */
    public function getTariffDescription()
    {
        return $this->tariff_description;
    }

    /**
     * Получить параметр - название тарифа на языке вывода.
     *
     * @return string
     */
    public function getTariffName()
    {
        return $this->tariff_name;
    }

    /**
     * Получить параметр - режим тарифа.
     *
     * @return int
     */
    public function getDeliveryMode()
    {
        return $this->delivery_mode;
    }
}
