<?php

/**
 * Copyright (c) Antistress.Store® 2024. All rights reserved.
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
     * Адрес с указанием страны, региона, города, и т.д.
     *
     * @var string|null
     */
    protected $address_full;

    /**
     * Получить код города
     *
     * @return int|null
     */
    public function getCityCode()
    {
        return $this->city_code;
    }

    /**
     * Получить адрес с указанием страны, региона, города, и т.д.
     *
     * @return string|null
     */
    public function getAddressFull()
    {
        return $this->address_full;
    }
}
