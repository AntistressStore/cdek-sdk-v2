<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Responses;

use AntistressStore\CdekSDK2\Traits\LocationTrait;

class LocationResponse extends Source
{
    use LocationTrait;

    /**
     * Код города
     *
     * @var int|null
     */
    protected $city_code;

    /**
     * Получить код города
     *
     * @return int|null
     */
    public function getCityCode()
    {
        return $this->city_code;
    }
}
