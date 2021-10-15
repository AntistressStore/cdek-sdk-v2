<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Responses;

use AntistressStore\CdekSDK2\Traits\PackageTrait;

class PackagesResponse extends Source
{
    use PackageTrait;
    /**
     *Уникальный номер упаковки в ИС СДЭК.
     *
     * @var string
     */
    protected $package_id;

    /**
     * Объемный вес (в граммах).
     *
     * @var int
     */
    protected $weight_volume;

    /**
     * Расчетный вес (в граммах).
     *
     * @var int
     */
    protected $weight_calc;

    /**
     * Получить значение - объемный вес (в граммах).
     *
     * @return int
     */
    public function getWeightVolume()
    {
        return $this->weight_volume;
    }

    /**
     * Получить значение - расчетный вес (в граммах).
     *
     * @return int
     */
    public function getWeightCalc()
    {
        return $this->weight_calc;
    }

    /**
     * Получить значение - Уникальный номер упаковки в ИС СДЭК.
     *
     * @return string
     */
    public function getPackageId()
    {
        return $this->package_id;
    }
}
