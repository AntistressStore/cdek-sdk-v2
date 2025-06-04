<?php

/**
 * Copyright (c) Antistress.Store® 2024. All rights reserved.
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
     * Стоимость услуги с НДС и скидкой.
     *
     * @var float
     */
    protected $total_sum;

    /**
     * Процент скидки.
     *
     * @var float
     */
    protected $discount_percent;

    /**
     * Сумма скидки.
     *
     * @var float
     */
    protected $discount_sum;

    /**
     * Процент НДС.
     *
     * @var float
     */
    protected $vat_rate;

    /**
     * Сумма НДС.
     *
     * @var float
     */
    protected $vat_sum;

    /**
     * Get стоимость дополнительной услуги.
     *
     * @return float
     */ 
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * Get стоимость услуги с НДС и скидкой.
     *
     * @return float
     */
    public function getTotalSum()
    {
        return $this->total_sum;
    }

    /**
     * Get процент скидки.
     *
     * @return float
     */
    public function getDiscountPercent()
    {
        return $this->discount_percent;
    }

    /**
     * Get сумма скидки.
     *
     * @return float
     */
    public function getDiscountSum()
    {
        return $this->discount_sum;
    }

    /**
     * Get процент НДС.
     *
     * @return float
     */
    public function getVatRate()
    {
        return $this->vat_rate;
    }

    /**
     * Get сумма НДС.
     *
     * @return float
     */
    public function getVatSum()
    {
        return $this->vat_sum;
    }
}
