<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Traits;

trait ServicesTrait
{
    /**
     * Код дополнительной услуги.
     *
     * @var string
     */
    protected $code;

    /**
     * Параметр дополнительной услуги.
     *
     * @var float
     */
    protected $parameter;

    /**
     * Устанавливает код дополнительной услуги.
     *
     * @param string $code Код дополнительной услуги
     *
     * @return self
     */
    public function setCode(string $code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Устанавливает параметр дополнительной услуги.
     *
     * @param float $parameter Параметр дополнительной услуги
     *
     * @return self
     */
    public function setParameter(float $parameter)
    {
        $this->parameter = $parameter;

        return $this;
    }

    /**
     * Установить параметр дополнительной услуги.
     *
     * @return float
     */
    public function getParameter()
    {
        return $this->parameter;
    }

    /**
     * Установить код дополнительной услуги.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
}
