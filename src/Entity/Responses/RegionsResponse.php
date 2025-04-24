<?php

/**
 * Copyright (c) Antistress.Store® 2024. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Responses;

class RegionsResponse extends Source
{
    /**
     * Название страны населенного пункта.
     *
     * @var string
     */
    protected $country;

    /**
     * Код страны в формате ISO_3166-1_alpha-2.
     *
     * @example RU, DE, TR
     *
     * @var string
     */
    protected $country_code;

    /**
     * Название региона.
     *
     * @var string|null
     */
    protected $region;

    /**
     * Код региона (справочник СДЭК).
     *
     * @deprecated
     *
     * @var int|null
     */
    protected $region_code;

    /**
     * Get название страны населенного пункта.
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Get код страны в формате ISO_3166-1_alpha-2.
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->country_code;
    }

    /**
     * Get название региона.
     *
     * @return string|null
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Get код региона (справочник СДЭК).
     *
     * @return int|null
     */
    public function getRegionCode()
    {
        return $this->region_code;
    }
}
