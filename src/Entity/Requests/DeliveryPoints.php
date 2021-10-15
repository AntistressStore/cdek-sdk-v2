<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Requests;

use AntistressStore\CdekSDK2\Constants;
use AntistressStore\CdekSDK2\Traits\{DeliveryPointsTrait, LocationTrait};

/**
 * Список действующих офисов СДЭК.
 */
class DeliveryPoints extends Location
{
    use LocationTrait;
    use DeliveryPointsTrait;

    public const TYPE_PVZ = 'PVZ';
    public const TYPE_ALL = 'ALL';
    public const TYPE_POSTOMAT = 'POSTOMAT';

    public const LANGUAGE_RUSSIAN = 'rus';
    public const LANGUAGE_ENGLISH = 'eng';
    public const LANGUAGE_CHINESE = 'zho';

    /**
     * Код Города.
     *
     * @var int|null
     */
    public $city_code;

    /** @var string|null */
    public $type;

    public function __construct()
    {
        $this->pattern = Constants::DELIVERY_POINTS_FILTER;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param int|null $city_code
     */
    public function setCityCode($city_code)
    {
        $this->city_code = $city_code;

        return $this;
    }

    /**
     * @param bool $have_cashless
     */
    public function setCashless($have_cashless)
    {
        $this->have_cashless = $have_cashless;

        return $this;
    }

    public function setCash($have_cash)
    {
        $this->have_cash = $have_cash;

        return $this;
    }

    /**
     * @param bool $is_dressing_room
     */
    public function setDressingRoom($is_dressing_room)
    {
        $this->is_dressing_room = $is_dressing_room;

        return $this;
    }

    /**
     * @param bool $is_handout
     */
    public function setHandout($is_handout)
    {
        $this->is_handout = $is_handout;

        return $this;
    }

    /**
     * @param bool $is_reception
     */
    public function setReception($is_reception)
    {
        $this->is_reception = $is_reception;

        return $this;
    }

    /**
     * @param bool $allowed_cod
     */
    public function setCodAllowed($allowed_cod)
    {
        $this->allowed_cod = $allowed_cod;

        return $this;
    }

    /**
     * @param int $weight_max
     */
    public function setMaxWeight($weight_max)
    {
        $this->weight_max = $weight_max;

        return $this;
    }

    /**
     * @param string $lang
     */
    public function setLanguage($lang = self::LANGUAGE_RUSSIAN)
    {
        $this->lang = $lang;

        return $this;
    }

    public function setPickupOnly($take_only)
    {
        $this->take_only = $take_only;

        return $this;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return count($this->items);
    }

    /**
     * Get код ПВЗ.
     *
     * @return string|null
     */
    public function getCode()
    {
        return $this->code;
    }
}
