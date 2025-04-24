<?php
/**
 * Copyright (c) Antistress.Store® 2024. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Requests;

use AntistressStore\CdekSDK2\Constants;
use AntistressStore\CdekSDK2\Traits\LocationTrait;

class LocationSuggest extends Source
{
    use LocationTrait;

    /**
     * Наименование населенного пункта СДЭК. Может быть введено не полностью.
     *
     * @var string
     */
    protected $name;
    /**
     * Устанавливает настройки фильтрации на поиск населенных пунктов.
     *
     * @return self
     */
    public function citiesSuggest()
    {
        $this->pattern = Constants::CITIES_SUGGEST_FILTER;

        return $this;
    }
    /**
     * Set запрос названия города для поиска.
     *
     * @param string $name поисковый запрос города
     *
     * @return self
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }
}
