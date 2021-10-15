<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Traits;

use AntistressStore\CdekSDK2\Constants;
use AntistressStore\CdekSDK2\Entity\Requests\Location;
use AntistressStore\CdekSDK2\Entity\Requests\Package;
use AntistressStore\CdekSDK2\Entity\Requests\Services;

trait TariffTrait
{
    /**
     * Тип заказа (1 - "интернет-магазин", 2 - "доставка").
     *
     * @var int
     */
    protected $type;

    /**
     * Код тарифа.
     *
     * @var int
     */
    protected $tariff_code;

    /**
     * Адрес отправления.
     *
     * @var Location
     */
    protected $from_location;

    /**
     * Адрес получения.
     *
     * @var Location
     */
    protected $to_location;

    /**
     * Дополнительные услуги.
     *
     * @var Services[]
     */
    protected $services;

    /**
     * Список информации по местам (упаковкам).
     *
     * @var Package[]
     */
    protected $packages;

    /**
     * Установка даты и времени планируемой передачи заказа (дата и время в формате ISO 8601: YYYY-MM-DDThh:mm:ss±hhmm).
     *
     * @param \DateTimeInterface $date Дата и время планируемой передачи заказа (дата и время в формате ISO 8601: YYYY-MM-DDThh:mm:ss±hhmm)
     *
     * @return self
     */
    public function setDate(\DateTimeInterface $date)
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
     * Экспресс-метод. Устанавливает индексы городов отправителя и получателя.
     *
     * @param int $from индекс города отправителя
     * @param int $to   индекс города получателя
     *
     * @return self
     */
    public function setPostalCodes(int $from, int $to)
    {
        $this->from_location = (is_null($this->from_location)) ? Location::withPostalCode($from)
            : $this->from_location->setPostalCode($from);
        $this->to_location = (is_null($this->to_location)) ? Location::withPostalCode($to)
            : $this->to_location->setPostalCode($to);

        return $this;
    }

    /**
     * Экспресс-метод. Устанавливает адреса городов отправителя и получателя.
     *
     * @param string $from адрес города отправителя
     * @param string $to   адрес города получателя
     *
     * @return self
     */
    public function setAddresses(string $from, string $to)
    {
        $this->from_location = (is_null($this->from_location)) ? Location::withAddress($from)
            : $this->from_location->setAddress($from);
        $this->to_location = (is_null($this->to_location)) ? Location::withAddress($to)
            : $this->to_location->setAddress($to);

        return $this;
    }

    /**
     * Экспресс-метод. Устанавливает адреса городов отправителя и получателя.
     *
     * @param string $from адрес города отправителя
     * @param string $to   адрес города получателя
     *
     * @return self
     */
    public function setCities(string $from, string $to)
    {
        $this->from_location = (is_null($this->from_location)) ? Location::withCities($from)
            : $this->from_location->setCity($from);
        $this->to_location = (is_null($this->to_location)) ? Location::withCities($to)
            : $this->to_location->setCity($to);

        return $this;
    }

    /**
     * Экспресс-метод. Создает место с одним обязательным параметром - общий вес (в граммах).
     *
     * @param int $weight Общий вес (в граммах)
     *
     * @return self
     */
    public function setPackageWeight(int $weight)
    {
        $this->packages[] = Package::withWeight($weight);

        return $this;
    }

    /**
     * Экспресс-метод. Добавляет дополнительные услуги одним методом через массив.
     *
     * @param array $services Дополнительные услуги
     *
     * @return self
     */
    public function addServices($services)
    {
        $services_array = [];
        $services_pattern = Constants::SERVICE_CODES;
        foreach ($services as $key => $value) {
            $service_name = (!empty($key)) ? $key : $value;
            if (!empty($key) && array_key_exists($key, $services_pattern)) {
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

    /**
     * Get список информации по местам (упаковкам).
     *
     * @return Package[]
     */
    public function getPackages()
    {
        return $this->packages;
    }

    /**
     * Get дополнительные услуги.
     *
     * @return Services[]
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * Get адрес получения.
     *
     * @return Location
     */
    public function getToLocation()
    {
        return $this->to_location;
    }

    /**
     * Get адрес отправления.
     *
     * @return Location
     */
    public function getFromLocation()
    {
        return $this->from_location;
    }

    /**
     * Get код тарифа.
     *
     * @return int
     */
    public function getTariffCode()
    {
        return $this->tariff_code;
    }

    /**
     * Get тип заказа (1 - "интернет-магазин", 2 - "доставка").
     *
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }
}
