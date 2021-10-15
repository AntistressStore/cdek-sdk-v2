<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Responses;

use AntistressStore\CdekSDK2\Traits\ItemTrait;

class ItemsResponse extends Source
{
    use ItemTrait;

    /**
     * Количество врученных единиц товара (в штуках).
     *
     * @var int
     */
    protected $delivery_amount;

    /**
     * Получает значение - количество врученных единиц товара (в штуках).
     *
     * @return int
     */
    public function getDelivery_amount()
    {
        return $this->delivery_amount;
    }
}
