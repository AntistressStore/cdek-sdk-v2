<?php

/**
 * Copyright (c) Antistress.Store® 2024. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Responses;

class TariffAdditionalOrderTypesParamResponse extends Source
{
    /**
     * Признак “без доп. типа заказа”.
     *
     * В swagger: without_additional_order_type (any)
     *
     * @var bool|null
     */
    protected $without_additional_order_type;

    /**
     * Список дополнительных типов заказов, применимых к тарифу.
     *
     * В swagger: additional_order_types (Array of any)
     *
     * @var array
     */
    protected $additional_order_types = [];

    /**
     * Получить параметр - признак “без доп. типа заказа”.
     *
     * @return bool|null
     */
    public function getWithoutAdditionalOrderType()
    {
        return $this->without_additional_order_type;
    }

    /**
     * Получить параметр - список дополнительных типов заказов.
     *
     * @return array
     */
    public function getAdditionalOrderTypes()
    {
        return $this->additional_order_types;
    }
}
