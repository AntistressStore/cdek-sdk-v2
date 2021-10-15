<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Traits;

trait MoneyTrait
{
    use ExpressTrait;
    /**
     * Сумма в валюте.
     *
     * @var float
     */
    public $value;

    /**
     * Сумма НДС
     *
     * @var float|null
     */
    public $vat_sum;

    /**
     * Ставка НДС
     *
     * @var int|null
     */
    public $vat_rate;

    /**
     * Устанавливает сумма в валюте.
     *
     * @param float $value Сумма в валюте
     *
     * @return self
     */
    public function setValue(float $value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Устанавливает сумма НДС
     *
     * @param float|null $vat_sum Сумма НДС
     *
     * @return self
     */
    public function setVatSum($vat_sum)
    {
        $this->vat_sum = $vat_sum;

        return $this;
    }

    /**
     * Устанавливает ставка НДС
     *
     * @param int|null $vat_rate Ставка НДС
     *
     * @return self
     */
    public function setVatRate($vat_rate)
    {
        $this->vat_rate = $vat_rate;

        return $this;
    }

    /**
     * Получить значение - сумма в валюте.
     *
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Получить значение - сумма НДС
     *
     * @return float|null
     */
    public function getVatSum()
    {
        return $this->vat_sum;
    }

    /**
     * Получить значение - ставка НДС
     *
     * @return int|null
     */
    public function getVatRate()
    {
        return $this->vat_rate;
    }
}
