<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Traits;

/**
 * Class Phone
 * Номер телефона (мобильный/городской).
 */
trait PhoneTrait
{
    use ExpressTrait;
    /**
     * Номер телефона.
     *
     * @var string
     */
    protected $number;

    /**
     * Добавочный номер
     *
     * @var string
     */
    protected $additional;

    /**
     * Устанавливает номер телефона.
     *
     * @param string $number Номер телефона
     *
     * @return self
     */
    public function setNumber(string $number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Устанавливает добавочный номер
     *
     * @param string $additional Добавочный номер
     *
     * @return self
     */
    public function setAdditional(string $additional)
    {
        $this->additional = $additional;

        return $this;
    }

    /**
     * Получить параметр - номер телефона.
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Получить параметр - добавочный номер
     *
     * @return string
     */
    public function getAdditional()
    {
        return $this->additional;
    }
}
