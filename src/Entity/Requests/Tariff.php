<?php

/**
 * Copyright (c) Antistress.Store® 2024. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Requests;

use AntistressStore\CdekSDK2\Constants;
use AntistressStore\CdekSDK2\Traits\TariffTrait;

class Tariff extends Source
{
    use TariffTrait;

    /**
     * Дата и время планируемой передачи заказа (дата и время в формате ISO 8601: YYYY-MM-DDThh:mm:ss±hhmm).
     *
     * @var string
     */
    protected $date;

    /**
     * Валюта, в которой необходимо произвести расчет
     *
     * @var int
     */
    protected $currency;

    /**
     * Локализация по умолчанию 'rus'.
     *
     * @var string|null
     */
    protected $lang;

    /**
     * Установка даты и времени планируемой передачи заказа (дата и время в формате ISO 8601: YYYY-MM-DDThh:mm:ss±hhmm).
     *
     * @param string $date Дата и время планируемой передачи заказа (дата и время в формате ISO 8601: YYYY-MM-DDThh:mm:ss±hhmm)
     *
     * @return self
     */
    public function setDate(string $date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Установка тип заказа (1 - "интернет-магазин", 2 - "доставка").
     *
     * @param int $type Тип заказа (1 - "интернет-магазин", 2 - "доставка")
     *
     * @return self
     */
    public function setType(int $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Установка валюты, в которой необходимо произвести расчет
     *
     * @param int $currency Валюта, в которой необходимо произвести расчет
     *
     * @return self
     */
    public function setCurrency(int $currency)
    {
        $this->currency = $currency;

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
     * Установка код тарифа.
     *
     * @param int $tariff_code Код тарифа
     *
     * @return self
     */
    public function setTariffCode(int $tariff_code)
    {
        $this->tariff_code = $tariff_code;

        return $this;
    }

    /**
     * Установка адреса отправления.
     *
     * @param Location $from_location Адрес отправления
     *
     * @return self
     */
    public function setFromLocation(Location $from_location)
    {
        $this->from_location = $from_location;

        return $this;
    }

    /**
     * Установка адреса получения.
     *
     * @param Location $to_location Адрес получения
     *
     * @return self
     */
    public function setToLocation(Location $to_location)
    {
        $this->to_location = $to_location;

        return $this;
    }

    /**
     * Установка дополнительных услуг.
     *
     * @param Services[] $services Дополнительные услуги
     *
     * @return self
     */
    public function setServices(Services $services)
    {
        $this->services = $services;

        return $this;
    }

    /**
     * Экспресс-метод. Устанавливает города отправителя и получателя.
     *
     * @param int $from код города отправителя
     * @param int $to   код города получателя
     *
     * @return self
     */
    public function setCityCodes(int $from, int $to)
    {
        $this->from_location = (is_null($this->from_location)) ? Location::withCode($from)
            : $this->from_location->setCode($from);
        $this->to_location = (is_null($this->to_location)) ? Location::withCode($to)
            : $this->to_location->setCode($to);

        return $this;
    }

    /**
     * Экспресс-метод. Добавляет дополнительные услуги одним методом через массив.
     *
     * @param array $services Дополнительные услуги
     *
     * @return self
     */
    public function addServices(array $services)
    {
        $services_array = [];
        $services_pattern = Constants::SERVICE_CODES;
        foreach ($services as $key => $value) {
            $service_name = ( ! empty($key)) ? $key : $value;
            if ( ! empty($key) && array_key_exists($key, $services_pattern)) {
                $services_array[] = (new Services())->setCode($key)->setParameter($value);
            } elseif (empty($key) && array_key_exists($value, $services_pattern)) {
                $services_array[] = (new Services())->setCode($value);
            } else {
                throw new \InvalidArgumentException('Передан не допустимый код тарифа:'.$service_name, 1);
            }
        }
        $this->services = $services_array;

        return $this;
    }

    /**
     * Установка список информации по местам (упаковкам).
     *
     * @param Package[] $packages Список информации по местам (упаковкам)
     *
     * @return self
     */
    public function setPackages(Package $packages)
    {
        $this->packages[] = $packages;

        return $this;
    }
}
