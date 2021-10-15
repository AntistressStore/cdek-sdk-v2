<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Responses;

/**
 * Class PaymentResponse
 * Информация о переводе наложенного платежа.
 */
class PaymentResponse extends Source
{
    /**
     * Список заказов, по которым был переведен интернет-магазину наложенный платеж.
     *
     * @var array
     */
    protected $orders;

    /**
     * Получить список заказов, по которым был переведен интернет-магазину наложенный платеж.
     *
     * @return array
     */
    public function getOrders()
    {
        return $this->orders;
    }
}
