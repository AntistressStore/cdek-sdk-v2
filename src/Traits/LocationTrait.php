<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Traits;

trait LocationTrait
{
    /**
     * Код населенного пункта СДЭК (метод "Список населенных пунктов").
     *
     * @var int|null
     */
    protected $code;

    /**
     * Уникальный идентификатор ФИАС
     *
     * @var string|null
     */
    protected $fias_guid;

    /**
     * Почтовый индекс
     *
     * @var string|null
     */
    protected $postal_code;

    /**
     * Долгота.
     *
     * @var float|null
     */
    protected $longitude;

    /**
     * Широта.
     *
     * @var float|null
     */
    protected $latitude;

    /**
     * Код страны в формате  ISO_3166-1_alpha-2.
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
     * Название района региона населенного пункта.
     *
     * @var string|null
     */
    protected $sub_region;

    /**
     * Название города.
     *
     * @var string|null
     */
    protected $city;

    /**
     * Код КЛАДР.
     *
     * @deprecated
     *
     * @var string|null
     */
    protected $kladr_code;

    /**
     * Строка адреса.
     *
     * @var string
     */
    protected $address;

    /**
     * Массив почтовых индексов.
     *
     * @var array|null
     */
    protected $postal_codes;

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->country_code;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getCountryCodes()
    {
        return $this->country_codes;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return int
     */
    public function getPostalCode()
    {
        return $this->postal_code;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @return int
     */
    public function getRegionCode()
    {
        return $this->region_code;
    }

    /**
     * @return string
     */
    public function getKladrCode()
    {
        return $this->kladr_code;
    }

    /**
     * @return string
     */
    public function getKladrRegionCode()
    {
        return $this->kladr_region_code;
    }

    /**
     * @return string
     */
    public function getFiasGuid()
    {
        return $this->fias_guid;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @return string|null
     */
    public function getSubRegion()
    {
        return $this->sub_region;
    }
}
