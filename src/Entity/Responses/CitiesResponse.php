<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
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
     * Получить часовой пояс населенного пункта.
     *
     * @return string|null
     */
    public function getTimeZone()
    {
        return $this->time_zone;
    }
}
