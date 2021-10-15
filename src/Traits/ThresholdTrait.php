<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Traits;

/**
 * trait Threshold.
 */
trait ThresholdTrait
{
    use MoneyTrait;
    use ExpressTrait;
    /**
     * Порог стоимости товара (действует по условию меньше или равно) в целых единицах валюты.
     *
     * @var int
     */
    protected $threshold;

    /**
     * Доп. сбор за доставку товаров, общая стоимость которых попадает в интервал.
     *
     * @var float
     */
    protected $sum;

    /**
     * Устанавливает порог стоимости товара (действует по условию меньше или равно) в целых единицах валюты.
     *
     * @param int $threshold Порог стоимости товара (действует по условию меньше или равно) в целых единицах валюты
     *
     * @return self
     */
    public function setThreshold(int $threshold)
    {
        $this->threshold = $threshold;

        return $this;
    }

    /**
     * Устанавливает доп. сбор за доставку товаров, общая стоимость которых попадает в интервал.
     *
     * @param float $sum Доп. сбор за доставку товаров, общая стоимость которых попадает в интервал
     *
     * @return self
     */
    public function setSum(float $sum)
    {
        $this->sum = $sum;

        return $this;
    }

    /**
     * Get порог стоимости товара (действует по условию меньше или равно) в целых единицах валюты.
     *
     * @return int
     */
    public function getThreshold()
    {
        return $this->threshold;
    }

    /**
     * Get доп. сбор за доставку товаров, общая стоимость которых попадает в интервал.
     *
     * @return float
     */
    public function getSum()
    {
        return $this->sum;
    }
}
