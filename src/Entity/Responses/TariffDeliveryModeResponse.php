<?php

/**
 * Copyright (c) Antistress.Store® 2024. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Responses;

class TariffDeliveryModeResponse extends Source
{
    /**
     * Режим доставки.
     *
     * @var int|null
     */
    protected $delivery_mode;

    /**
     * Название режима доставки.
     *
     * @var string|null
     */
    protected $delivery_mode_name;

    /**
     * Код тарифа (сервиса), к которому относится режим доставки.
     *
     * @var int|null
     */
    protected $tariff_code;

    /**
     * Получить параметр - режим доставки.
     *
     * @return int|null
     */
    public function getDeliveryMode()
    {
        return $this->delivery_mode;
    }

    /**
     * Получить параметр - название режима доставки.
     *
     * @return string|null
     */
    public function getDeliveryModeName()
    {
        return $this->delivery_mode_name;
    }

    /**
     * Получить параметр - код тарифа (сервиса).
     *
     * @return int|null
     */
    public function getTariffCode()
    {
        return $this->tariff_code;
    }
}
