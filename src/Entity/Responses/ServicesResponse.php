<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Responses;

use AntistressStore\CdekSDK2\Traits\ServicesTrait;

class ServicesResponse extends Source
{
    use ServicesTrait;
    /**
     * Стоимость дополнительной услуги.
     *
     * @var float
     */
    protected $sum;

    /**
     * Get стоимость дополнительной услуги.
     *
     * @return float
     */ 
    public function getSum()
    {
        return $this->sum;
    }
}
