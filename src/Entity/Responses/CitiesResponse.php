<?php

/**
 * Copyright (c) Antistress.Store® 2024. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Responses;

use AntistressStore\CdekSDK2\Traits\LocationTrait;

class CitiesResponse extends Source
{
    use LocationTrait;
    /**
     * Часовой пояс населенного пункта.
     *
     * @var string|null
     */
    public $time_zone;

    /**
     * Ограничение на сумму наложенного платежа в населенном пункте.
     *
     * @var string|null
     */

    public $payment_limit;

    /**
     * Получить часовой пояс населенного пункта.
     *
     * @return string|null
     */
    public function getTimeZone()
    {
        return $this->time_zone;
    }

    /**
     * Получить ограничение на сумму наложенного платежа в населенном пункте.
     *
     * @return string|null
     */
    public function getPaymentLimit()
    {
        return $this->payment_limit;
    }
}
