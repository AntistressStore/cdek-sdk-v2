<?php

/**
 * Copyright (c) Antistress.Store® 2024. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Requests;

use AntistressStore\CdekSDK2\Traits\{CommonTrait, OrderTrait, TariffTrait};

class Order extends Source
{
    use CommonTrait;
    use OrderTrait;
    use TariffTrait;

    /**
     * Дата инвойса.
     *
     * @var string
     */
    protected $date_invoice;

    /**
     * Необходимость сформировать печатную форму по заказу
     * Может принимать значения:
     * barcode - ШК мест (число копий - 1)
     * waybill - квитанция (число копий - 2).
     *
     * @var string
     */
    protected $print;

    public function __construct()
    {
        $this->developer_key = 'UZ$NAOr6waZIvjbXtKR2=&FKG1XsVnhK';
    }

    /**
     * Устанавливает номер заказа в ИС Клиента.
     * Если не установлен, в этот  параметр сдэк запишет uuid.
     *
     * @param string $number Номер заказа в ИС Клиента
     *
     * @return self
     */
    public function setNumber(string $number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Устанавливает код ПВЗ для забора
     * Не может использоваться одновременно с from_location.
     *
     * @param string $shipment_point Код ПВЗ для забора
     *
     * @return self
     */
    public function setShipmentPoint(string $shipment_point)
    {
        $this->shipment_point = $shipment_point;

        return $this;
    }

    /**
     * Устанавливает код ПВЗ СДЭК для доставки
     * Не может использоваться одновременно с to_location.
     *
     * @param string $delivery_point Код ПВЗ СДЭК для доставки
     *
     * @return self
     */
    public function setDeliveryPoint(string $delivery_point)
    {
        $this->delivery_point = $delivery_point;

        return $this;
    }

    /**
     * Устанавливает код валюты объявленной стоимости заказа.
     *
     * @param string $items_cost_currency Код валюты объявленной стоимости заказа
     *
     * @return self
     */
    public function setItemsСostСurrency(string $items_cost_currency)
    {
        $this->items_cost_currency = $items_cost_currency;

        return $this;
    }

    /**
     * Устанавливает код валюты наложенного платежа.
     *
     * @param string $recipient_currency Код валюты наложенного платежа
     *
     * @return self
     */
    public function setRecipientCurrency(string $recipient_currency)
    {
        $this->recipient_currency = $recipient_currency;

        return $this;
    }

    /**
     * Экспресс-метод. Устанавливает адрес отправления.
     * Обязательно для тарифов "от двери".
     *
     * @return self
     */
    public function setShipmentAddress(string $address)
    {
        $this->from_location = (is_null($this->from_location)) ? Location::withAddress($address)
            : $this->from_location->setAddress($address);

        return $this;
    }

    /**
     * Экспресс-метод. Устанавливает код города отправления.
     * Обязательно для тарифов "от двери".
     *
     * @return self
     */
    public function setShipmentCityCode(int $code)
    {
        $this->from_location = (is_null($this->from_location)) ? Location::withCode($code)
            : $this->from_location->setCode($code);

        return $this;
    }

    /**
     * Экспресс-метод. Устанавливает адрес получателя.
     *
     * @param string $address адрес получателя
     *
     * @return self
     */
    public function setRecipientAddress(string $address)
    {
        $this->to_location = (is_null($this->to_location)) ? Location::withAddress($address)
            : $this->to_location->setAddress($address);

        return $this;
    }

    /**
     * Экспресс-метод. Устанавливает адрес получателя.
     *
     * @param int $code
     * @return self
     */
    public function setRecipientCityCode(int $code)
    {
        $this->to_location = (is_null($this->to_location)) ? Location::withCode($code)
            : $this->to_location->setCode($code);

        return $this;
    }

    /**
     * Экспресс-метод. Устанавливает код города отправителя.
     *
     * @param int $code
     * @return self
     */
    public function setSenderCityCode(int $code)
    {
        $this->from_location = (is_null($this->from_location)) ? Location::withCode($code)
            : $this->from_location->setCode($code);

        return $this;
    }

    /**
     * Устанавливает дата инвойса
     * обязетельно, если заказ - международный.
     *
     * @param string|null $date_invoice Дата инвойса
     *
     * @return self
     */
    public function setDateInvoice(string $date_invoice)
    {
        $this->date_invoice = $date_invoice;

        return $this;
    }

    /**
     * Устанавливает грузоотправитель
     * обязетельно, если заказ - международный.
     *
     * @param string $shipper_name Грузоотправитель
     *
     * @return self
     */
    public function setShipperName(string $shipper_name)
    {
        $this->shipper_name = $shipper_name;

        return $this;
    }

    /**
     * Устанавливает адрес грузоотправителя
     * обязательно, если заказ - международный.
     *
     * @param string $shipper_address Адрес грузоотправителя
     *
     * @return self
     */
    public function setShipperAddress(string $shipper_address)
    {
        $this->shipper_address = $shipper_address;

        return $this;
    }

    /**
     * Устанавливает стоимость доставки, которую ИМ берет с получателя.
     *
     * @param float      $value    Сумма дополнительного сбора
     * @param float|null $vat_sum  Сумма НДС
     * @param int|null   $vat_rate Ставка НДС (значение - 0, 10, 18, 20 и т.п., null - нет НДС)
     *
     * @return self
     */
    public function setDeliveryRecipientCost(float $value = 0.0, $vat_sum = null, $vat_rate = null)
    {
        if (is_float($value)) {
            $args = \get_defined_vars();
            $this->delivery_recipient_cost = Money::express($args);
        }

        return $this;
    }

    /**
     * Устанавливает доп. сбор за доставку (которую ИМ берет с получателя) в зависимости от суммы заказа.
     *
     * @param int        $threshold Порог стоимости товара
     * @param float      $sum       Сумма дополнительного сбора
     * @param float|null $vat_sum   Сумма НДС
     * @param int|null   $vat_rate  Ставка НДС (значение - 0, 10, 18, 20 и т.п. , null - нет НДС)
     */
    public function setDeliveryRecipientCostAdv($threshold, $sum, $vat_sum = null, $vat_rate = null)
    {
        if (!empty($threshold)) {
            $args = \get_defined_vars();
            $this->delivery_recipient_cost_adv = Threshold::express($args);
        }

        return $this;
    }

    /**
     * Устанавливает отправителя.
     *
     * @param Contact $sender Отправитель
     *
     * @return self
     */
    public function setSender(Contact $sender)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * Устанавливает реквизиты реального продавца.
     *
     * @param Seller $seller Реквизиты реального продавца
     *
     * @return self
     */
    public function setSeller(Seller $seller)
    {
        $this->seller = $seller;

        return $this;
    }

    /**
     * Устанавливает получатель.
     *
     * @param Contact $recipient Получатель
     *
     * @return self
     */
    public function setRecipient(Contact $recipient)
    {
        $this->recipient = $recipient;

        return $this;
    }

    /**
     * Устанавливает необходимость печатной формы.
     *
     * Может принимать значения:
     * barcode - ШК мест (число копий - 1)
     * waybill - квитанция (число копий - 2)
     *
     * @return self
     */
    public function setPrint(string $print)
    {
        $this->print = $print;

        return $this;
    }
}
