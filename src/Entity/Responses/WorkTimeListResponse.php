<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Responses;

/**
 * Class WorkTimeList
 * График работы ПВЗ.
 */
class WorkTimeListResponse extends Source
{
    /**
     * Порядковый номер дня начиная с единицы. Понедельник = 1, воскресенье = 7.
     *
     * @var int
     */
    protected $day;

    /**
     * Период работы в эти дни. Если в этот день не работают, то не отображается.
     *
     * @var int
     */
    protected $time;

    /**
     * Получить параметр - Порядковый номер дня начиная с единицы. Понедельник = 1, воскресенье = 7.
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Получить параметр - Период работы в эти дни. Если в этот день не работают, то не отображается.
     *
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }
}
