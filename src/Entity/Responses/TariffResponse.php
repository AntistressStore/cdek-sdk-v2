<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Responses;

class TariffResponse extends Source
{
    /**
     * Стоимость доставки.
     *
     * @var float
     */
    protected $delivery_sum;

    /**
     * Минимальное время доставки (в рабочих днях).
     *
     * @var int
     */
    protected $period_min;

    /**
     * Максимальное время доставки (в рабочих днях).
     *
     * @var int
     */
    protected $period_max;

    /**
     * Расчетный вес (в граммах).
     *
     * @var int
     */
    protected $weight_calc;

    /**
     * Стоимость доставки с учетом дополнительных услуг.
     *
     * @var float
     */
    protected $total_sum;

    /**
     * Валюта, в которой рассчитана стоимость доставки (код СДЭК).
     *
     * @var string
     */
    protected $currency;

    /**
     * Дополнительные услуги.
     *
     * @var ServicesResponse[]
     */
    protected $services;

    /**
     * Get стоимость доставки.
     *
     * @return float
     */
    public function getDeliverySum()
    {
        return $this->delivery_sum;
    }

    /**
     * Get минимальное время доставки (в рабочих днях).
     *
     * @return int
     */
    public function getPeriodMin()
    {
        return $this->period_min;
    }

    /**
     * Get максимальное время доставки (в рабочих днях).
     *
     * @return int
     */
    public function getPeriodMax()
    {
        return $this->period_max;
    }

    /**
     * Get расчетный вес (в граммах).
     *
     * @return int
     */
    public function getWeightCalc()
    {
        return $this->weight_calc;
    }

    /**
     * Get стоимость доставки с учетом дополнительных услуг.
     *
     * @return float
     */
    public function getTotalSum()
    {
        return $this->total_sum;
    }

    /**
     * Get валюта, в которой рассчитана стоимость доставки (код СДЭК).
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
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
