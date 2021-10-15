<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Requests;

use AntistressStore\CdekSDK2\Constants;
use AntistressStore\CdekSDK2\Traits\LocationTrait;

class Location extends Source
{
    use LocationTrait;

    /**
     * Полный адрес с указанием страны, региона, города, и т.д.
     *
     * @var string
     */
    protected $address_full;

    /**
     * Уникальный идентификатор ФИАС региона населенного пункта.
     *
     * @deprecated
     *
     * @var string
     */
    protected $fias_region_guid;

    /**
     * Код КЛАДР региона населенного пункта.
     *
     * @deprecated
     *
     * @var string
     */
    protected $kladr_region_code;

    /**
     * Название страны населенного пункта.
     *
     * @var string
     */
    protected $country;

    /**
     * Массив кодов стран в формате  ISO_3166-1_alpha-2.
     *
     * @var string[]|null
     */
    protected $country_codes;

    /**
     * Ограничение на сумму наложенного платежа в населенном пункте.
     *
     * @deprecated
     *
     * @var float|null
     */
    protected $payment_limit;

    /**
     * Локализация по умолчанию 'rus'.
     *
     * @var string|null
     */
    protected $lang;

    /**
     * Ограничение выборки результата. По умолчанию 500.
     *
     * @var int|null
     */
    protected $size;

    /**
     * Номер страницы выборки результата. По умолчанию 0.
     *
     * @var int|null
     */
    protected $page;

    /**
     * Экспресс-метод установки кода локации.
     *
     * @param int $code - код города\региона
     */
    public static function withCode($code)
    {
        $instance = new self();

        $instance->code = $code;

        return $instance;
    }

    /**
     * Экспресс-метод установки кода локации.
     *
     * @param int   $code        - код города\региона
     * @param mixed $postal_code
     */
    public static function withPostalCode($postal_code)
    {
        $instance = new self();

        $instance->postal_code = $postal_code;

        return $instance;
    }

    /**
     * Экспресс-метод установки адреса.
     *
     * @param mixed $address
     */
    public static function withAddress($address)
    {
        $instance = new self();

        $instance->address = $address;

        return $instance;
    }

    /**
     * Экспресс-метод установки города.
     *
     * @param mixed $city
     */
    public static function withCities($city)
    {
        $instance = new self();

        $instance->city = $city;

        return $instance;
    }

    /**
     * @param int $code
     *
     * @return self
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @param string $country_code
     *
     * @return self
     */
    public function setCountryCode($country_code = 'RU')
    {
        $this->country_code = $country_code;

        return $this;
    }

    /**
     * @param mixed $country
     *
     * @return self
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @param string[] $country_codes
     *
     * @return self
     */
    public function setCountryCodes($country_codes)
    {
        $this->country_codes = $country_codes;

        return $this;
    }

    /**
     * @param string $address
     *
     * @return self
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @param int $postal_code
     *
     * @return self
     */
    public function setPostalCode($postal_code)
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    /**
     * @param string $city
     *
     * @return self
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @param string $region
     *
     * @return self
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * @param string $sub_region
     *
     * @return self
     */
    public function setSubRegion($sub_region)
    {
        $this->sub_region = $sub_region;

        return $this;
    }

    /**
     * @param int $region_code
     *
     * @return self
     */
    public function setRegionCode($region_code)
    {
        $this->region_code = $region_code;

        return $this;
    }

    /**
     * @param string $kladr_code
     *
     * @return self
     */
    public function setKladrCode($kladr_code)
    {
        $this->kladr_code = $kladr_code;

        return $this;
    }

    /**
     * @param string $kladr_region_code
     *
     * @return self
     */
    public function setKladrRegionCode($kladr_region_code)
    {
        $this->kladr_region_code = $kladr_region_code;

        return $this;
    }

    /**
     * @param string $fias_guid
     *
     * @return self
     */
    public function setFiasGuid($fias_guid)
    {
        $this->fias_guid = $fias_guid;

        return $this;
    }

    /**
     * @param string $size
     *
     * @return self
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * @param string $lang
     *
     * @return self
     */
    public function setLang($lang = 'rus')
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * @param string $time_zone
     */
    public function setTimeZone($time_zone)
    {
        $this->time_zone = $time_zone;

        return $this;
    }

    /**
     * Устанавливает ограничение на сумму наложенного платежа в населенном пункте.
     *
     * @param float|null $payment_limit Ограничение на сумму наложенного платежа в населенном пункте
     *
     * @return self
     */
    public function setPaymentLimit($payment_limit)
    {
        $this->payment_limit = $payment_limit;

        return $this;
    }

    /**
     * Устанавливает уникальный идентификатор ФИАС региона населенного пункта.
     *
     * @param string $fias_region_guid Уникальный идентификатор ФИАС региона населенного пункта
     */
    public function setFiasRegionGuid(string $fias_region_guid)
    {
        $this->fias_region_guid = $fias_region_guid;

        return $this;
    }

    /**
     * Устанавливает полный адрес с указанием страны, региона, города, и т.д.
     *
     * @param string $address_full Полный адрес с указанием страны, региона, города, и т.д.
     */
    public function setAddressFull(string $address_full)
    {
        $this->address_full = $address_full;

        return $this;
    }

    /**
     * Устанавливает настройки локации на Населенные пункты.
     *
     * @return self
     */
    public function cities()
    {
        $this->pattern = Constants::CITIES_FILTER;

        return $this;
    }

    /**
     * Устанавливает настройки локации на Регионы.
     *
     * @return self
     */
    public function regions()
    {
        $this->pattern = Constants::REGIONS_FILTER;

        return $this;
    }

    /**
     * Устанавливает номер страницы выборки результата. По умолчанию 0.
     *
     * @param int|null $page Номер страницы выборки результата. По умолчанию 0.
     *
     * @return self
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }
}
