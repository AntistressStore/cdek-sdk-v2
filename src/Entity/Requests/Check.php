<?php
/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Requests;

use AntistressStore\CdekSDK2\Traits\CommonTrait;

/**
 * Class Check.
 * используется для получения информации о чеке по заказу или за выбранный день. 
 */
class Check extends Source
{
    use CommonTrait;

    /**
     * Дата, за которую необходимо вернуть данные по чекам (дата в формате ISO 8601: YYYY-MM-DD).
     *
     * @var string
     */
    protected $date;

    /**
     * Set дата, за которую необходимо вернуть данные по чекам (дата в формате ISO 8601: YYYY-MM-DD).
     *
     * @param string $date дата, за которую необходимо вернуть данные по чекам (дата в формате ISO 8601: YYYY-MM-DD)
     *
     * @return self
     */
    public function setDate(string $date)
    {
        $this->date = $date;

        return $this;
    }
}
