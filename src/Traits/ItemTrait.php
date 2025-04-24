<?php

/**
 * Copyright (c) Antistress.Store® 2024. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Traits;

use AntistressStore\CdekSDK2\Entity\Requests\Money;

trait ItemTrait
{
    /**
     * Наименование товара.
     *
     * @var string
     */
    protected $name;

    /**
     * Идентификатор/артикул товара.
     *
     * @var string
     */
    protected $ware_key;

    /**
     * Маркировка товара/вложения.
     *
     * @var string
     */
    protected $marking;

    /**
     * Оплата за товар при получении.
     *
     * @var Money
     */
    protected $payment;

    /**
     * Объявленная стоимость товара.
     *
     * @var float
     */
    protected $cost;

    /**
     * Вес (за единицу товара, в граммах).
     *
     * @var int
     */
    protected $weight;

    /**
     * Вес брутто (только для международных заказов).
     *
     * @var int
     */
    protected $weight_gross;

    /**
     * Количество единиц товара.
     *
     * @var int
     */
    protected $amount;

    /**
     * Наименование на иностранном языке.
     *
     * @var string
     */
    protected $name_i18n;

    /**
     * Бренд на иностранном языке.
     *
     * @var string
     */
    protected $brand;

    /**
     * Код страны в формате ISO_3166-1_alpha-2.
     *
     * @var string
     */
    protected $country_code;

    /**
     * Код материала.
     *
     * @var int
     */
    protected $material;

    /**
     * Содержит ли радиочастотные модули (wifi/gsm).
     *
     * @var bool
     */
    protected $wifi_gsm;

    /**
     * Ссылка на сайт интернет-магазина с описанием товара.
     *
     * @var string
     */
    protected $url;

    /**
     * Устанавливает наименование товара.
     *
     * @param string $name Наименование товара
     *
     * @return self
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Устанавливает идентификатор/артикул товара.
     *
     * @param string $ware_key Идентификатор/артикул товара
     *
     * @return self
     */
    public function setWareKey(string $ware_key)
    {
        $this->ware_key = $ware_key;

        return $this;
    }

    /**
     * Устанавливает маркировка товара/вложения.
     *
     * @param string $marking Маркировка товара/вложения
     *
     * @return self
     */
    public function setMarking(string $marking)
    {
        $this->marking = $marking;

        return $this;
    }

    /**
     * Устанавливает параметр оплата за товар при получении.
     *
     * @param float      $value    Оплата за товар при получении
     * @param float|null $vat_sum  Сумма НДС
     * @param int|null   $vat_rate Ставка НДС (значение - 0, 10, 18, 20 и т.п. , null - нет НДС)
     *
     * @return self
     */
    public function setPayment($value, $vat_sum = null, $vat_rate = null)
    {
        if (!\is_null($value)) {
            $args = \get_defined_vars();
            $this->payment = Money::express($args);
        }

        return $this;
    }

    /**
     * Устанавливает объявленную стоимость товара.
     *
     * @param float $cost Объявленная стоимость товара
     *
     * @return self
     */
    public function setCost(float $cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Устанавливает вес (за единицу товара, в граммах).
     *
     * @param int $weight Вес (за единицу товара, в граммах)
     *
     * @return self
     */
    public function setWeight(int $weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Устанавливает вес брутто (только для международных заказов).
     *
     * @param int $weight_gross Вес брутто (только для международных заказов)
     *
     * @return self
     */
    public function setWeightGross(int $weight_gross)
    {
        $this->weight_gross = $weight_gross;

        return $this;
    }

    /**
     * Устанавливает количество единиц товара.
     *
     * @param int $amount Количество единиц товара
     *
     * @return self
     */
    public function setAmount(int $amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Устанавливает наименование на иностранном языке.
     *
     * @param string $name_i18n Наименование на иностранном языке
     *
     * @return self
     */
    public function setName_i18n(string $name_i18n)
    {
        $this->name_i18n = $name_i18n;

        return $this;
    }

    /**
     * Устанавливает бренд на иностранном языке.
     *
     * @param string $brand Бренд на иностранном языке
     *
     * @return self
     */
    public function setBrand(string $brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Устанавливает код страны в формате ISO_3166-1_alpha-2.
     *
     * @param string $country_code Код страны в формате ISO_3166-1_alpha-2
     *
     * @return self
     */
    public function setCountryCode(string $country_code)
    {
        $this->country_code = $country_code;

        return $this;
    }

    /**
     * Устанавливает код материала.
     *
     * @param int $material Код материала
     *
     * @return self
     */
    public function setMaterial(int $material)
    {
        $this->material = $material;

        return $this;
    }

    /**
     * Устанавливает наличие радиочастотных модулей (wifi/gsm).
     *
     * @param bool $wifi_gsm Содержит ли радиочастотные модули (wifi/gsm)
     *
     * @return self
     */
    public function setWifiGsm(bool $wifi_gsm = false)
    {
        $this->wifi_gsm = $wifi_gsm;

        return $this;
    }

    /**
     * Устанавливает ссылка на сайт интернет-магазина с описанием товара.
     *
     * @param string $url Ссылка на сайт интернет-магазина с описанием товара
     *
     * @return self
     */
    public function setUrl(string $url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get наименование товара.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get идентификатор/артикул товара.
     *
     * @return string
     */
    public function getWareKey()
    {
        return $this->ware_key;
    }

    /**
     * Get маркировка товара/вложения.
     *
     * @return string
     */
    public function getMarking()
    {
        return $this->marking;
    }

    /**
     * Get оплата за товар при получении.
     *
     * @return Money
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * Get объявленная стоимость товара.
     *
     * @return float
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Get вес (за единицу товара, в граммах).
     *
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Get вес брутто (только для международных заказов).
     *
     * @return int
     */
    public function getWeightGross()
    {
        return $this->weight_gross;
    }

    /**
     * Get количество единиц товара.
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Get количество врученных единиц товара (в штуках).
     *
     * @return int
     */
    public function getDeliveryAmount()
    {
        return $this->delivery_amount;
    }

    /**
     * Get наименование на иностранном языке.
     *
     * @return string
     */
    public function getNameI18n()
    {
        return $this->name_i18n;
    }

    /**
     * Get бренд на иностранном языке.
     *
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
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
     * Get код материала.
     *
     * @return int
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * Get содержит ли радиочастотные модули (wifi/gsm).
     *
     * @return bool
     */
    public function getWifiGsm()
    {
        return $this->wifi_gsm;
    }

    /**
     * Get ссылка на сайт интернет-магазина с описанием товара.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}
