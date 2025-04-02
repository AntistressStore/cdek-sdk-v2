<?php

/**
 * Copyright (c) Antistress.Store® 2024. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Responses;

use AntistressStore\CdekSDK2\Traits\LocationTrait;

class CitiesSuggestResponse extends Source
{
    use LocationTrait;

    /**
     * Наименование населенного пункта СДЭК (город, район, регион, страна).
     *
     * @var string|null
     */

    public $full_name;

    /**
     * Получить наименование населенного пункта СДЭК (город, район, регион, страна).
     *
     * @return string|null
     */
    public function getFullName()
    {
        return $this->full_name;
    }
}
