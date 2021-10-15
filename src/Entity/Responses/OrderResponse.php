<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Responses;

use AntistressStore\CdekSDK2\Traits\{CommonTrait, OrderTrait, TariffTrait};

/**
 * Class Orders.
 */
class OrderResponse extends Source
{
    use CommonTrait;
    use OrderTrait;
    use TariffTrait;

    /**
     * Признак возвратного заказа.
     *
     * @var bool
     */
    protected $is_return;

    /**
     * Признак возвратного заказа.
     *
     * @var bool
     */
    protected $is_reverse;

    /**
     * Истинный режим заказа.
     *
     * @var string
     */
    protected $delivery_mode;

    /**
     * Проблемы доставки.
     *
     * @var array
     */
    protected $delivery_problem;

    /**
     * Детали доставки.
     *
     * @var array
     */
    protected $delivery_detail;

    /**
     * Детали доставки.
     *
     * @var bool
     */
    protected $transacted_payment;

    /**
     * Статусы.
     *
     * @var StatusResponse[]
     */
    protected $statuses;

    /**
     * Связанные с заказом сущности.
     *
     * @var array
     */
    protected $related_entities;

    /**
     * Информация о запросе/запросах над заказом.
     *
     * @var RequestsResponse[]
     */
    protected $requests;

    public function __construct(?array $properties = null)
    {
        if (isset($properties['related_entities'])) {
            $this->related_entities = $properties['related_entities'];
        }
        parent::__construct($properties);
    }

    /**
     * Получить значение - признак возвратного заказа.
     *
     * @return bool
     */
    public function getIsReturn()
    {
        return $this->is_return;
    }

    /**
     * Получить значение - признак возвратного заказа.
     *
     * @return bool
     */
    public function getIsReverse()
    {
        return $this->is_reverse;
    }

    /**
     * Получить значение - тип заказа.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Получить значение - истинный режим заказа.
     *
     * @return string
     */
    public function getDeliveryMode()
    {
        return $this->delivery_mode;
    }

    /**
     * Получить значение - код тарифа.
     *
     * @return int
     */
    public function getTariffCode()
    {
        return $this->tariff_code;
    }

    /**
     * Получить значение - проблемы доставки.
     *
     * @return array
     */
    public function getDeliveryProblem()
    {
        return $this->delivery_problem;
    }

    /**
     * Получить значение - детали доставки.
     *
     * @return array
     */
    public function getDeliveryDetail()
    {
        return $this->delivery_detail;
    }

    /**
     * Получить значение - детали доставки.
     *
     * @return bool
     */
    public function getTransactedPayment()
    {
        return $this->transacted_payment;
    }

    /**
     * Получить значение - статусы.
     *
     * @return StatusResponse[]
     */
    public function getStatuses()
    {
        return $this->statuses;
    }

    /**
     * Получить значение - список информации по местам (упаковкам).
     *
     * @return PackageResponse[]
     */
    public function getPackages()
    {
        return $this->packages;
    }

    /**
     * Получить значение - связанные с заказом сущности.
     *
     * @return array
     */
    public function getRelatedEntities()
    {
        return $this->related_entities;
    }

    /**
     * Получить последнюю (самую новую) связанную сущность.
     *
     * @param string $type
     *
     * @return string
     */
    public function getLastRelated($type)
    {
        $newest = [];
        if (is_array($this->related_entities)) {
            foreach ($this->related_entities as $key => $value) {
                if (isset($value['type']) && $value['type'] == $type) {
                    $newest[] = $value;
                } else {
                    continue;
                }
            }
        }

        return (!empty($newest)) ? end($newest)['uuid'] : null;
    }

    /**
     * Получить значение - информация о запросе/запросах над заказом.
     *
     * @return RequestsResponse[]
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * Get дополнительные услуги.
     *
     * @return ServicesResponse[]
     */
    public function getServices()
    {
        return $this->services;
    }
}
