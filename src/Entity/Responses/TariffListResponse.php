<?php

/**
 * Copyright (c) Antistress.Store® 2024. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Responses;

use AntistressStore\CdekSDK2\Traits\TariffTrait;

class TariffListResponse extends Source
{
    use TariffTrait;
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
