<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Traits;

use AntistressStore\CdekSDK2\Entity\Requests\{Contact, Money, Seller, Threshold};

trait OrderTrait
{
    /**
     * Номер заказа в ИС Клиента.
     *
     * @var string
     */
    protected $number;

    /**
     * Ключ разработчика.
     *
     * @var string
     */
    protected $developer_key;

    /**
     * Код ПВЗ для забора.
     *
     * @var string
     */
    protected $shipment_point;

    /**
     * Код ПВЗ СДЭК для доставки.
     *
     * @var string
     */
    protected $delivery_point;

    /**
     * Код валюты объявленной стоимости заказа.
     *
     * @var string
     */
    protected $items_cost_currency;

    /**
     * Код валюты наложенного платежа.
     *
     * @var string
     */
    protected $recipient_currency;

    /**
     * Грузоотправитель.
     *
     * @var string
     */
    protected $shipper_name;

    /**
     * Адрес грузоотправителя.
     *
     * @var string
     */
    protected $shipper_address;

    /**
     * Стоимость доставки, которую ИМ берет с получателя.
     *
     * @var Money
     */
    protected $delivery_recipient_cost;

    /**
     * Доп. сбор за доставку (которую ИМ берет с получателя) в зависимости от суммы заказа.
     *
     * @var Threshold[]
     */
    protected $delivery_recipient_cost_adv;

    /**
     * Реквизиты реального продавца.
     *
     * @var Seller
     */
    protected $seller;

    /**
     * Получатель.
     *
     * @var Contact
     */
    protected $recipient;

    /**
     * Получить параметр - ключ разработчика.
     *
     * @return string
     */
    public function getDeveloperKey()
    {
        return $this->developer_key;
    }

    /**
     * Получить параметр - код ПВЗ для забора.
     *
     * @return string
     */
    public function getShipmentPoint()
    {
        return $this->shipment_point;
    }

    /**
     * Получить параметр - код ПВЗ СДЭК для доставки.
     *
     * @return string
     */
    public function getDeliveryPoint()
    {
        return $this->delivery_point;
    }

    /**
     * Получить параметр - код валюты объявленной стоимости заказа.
     *
     * @return string
     */
    public function getItemsCostCurrency()
    {
        return $this->items_cost_currency;
    }

    /**
     * Получить параметр - код валюты наложенного платежа.
     *
     * @return string
     */
    public function getRecipientCurrency()
    {
        return $this->recipient_currency;
    }

    /**
     * Получить параметр - грузоотправитель.
     *
     * @return string
     */
    public function getShipperName()
    {
        return $this->shipper_name;
    }

    /**
     * Получить параметр - адрес грузоотправителя.
     *
     * @return string
     */
    public function getShipperAddress()
    {
        return $this->shipper_address;
    }

    /**
     * Получить параметр - стоимость доставки, которую ИМ берет с получателя.
     *
     * @return Money
     */
    public function getDeliveryRecipientCost()
    {
        return $this->delivery_recipient_cost;
    }

    /**
     * Получить параметр - доп. сбор за доставку (которую ИМ берет с получателя) в зависимости от суммы заказа.
     *
     * @return Threshold[]
     */
    public function getDeliveryRecipientCostAdv()
    {
        return $this->delivery_recipient_cost_adv;
    }

    /**
     * Получить параметр - реквизиты реального продавца.
     *
     * @return Seller
     */
    public function getSeller()
    {
        return $this->seller;
    }

    /**
     * Получить параметр - получатель.
     *
     * @return Contact
     */
    public function getRecipient()
    {
        return $this->recipient;
    }
}
